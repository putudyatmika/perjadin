<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrikPerjalanan;
use App\Pegawai;
use App\Tujuan;
use App\Golongan;
use App\Unitkerja;
use Validator;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Anggaran;
use App\Transaksi;
use Excel;
use App\Exports\MatrikViewExport;
use App\Imports\MatrikImport;
use Auth;

class MatrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $DataUnitkerja = DB::table('unitkerja')
            ->where('eselon', '<', '4')->get();
        $MatrikFlag = config('globalvar.FlagMatrik');
        /*$DataMatrik = DB::table('matrik')
                        ->leftJoin('anggaran','matrik.dana_mak','=','anggaran.mak')
                        ->leftJoin('tujuan','matrik.kodekab_tujuan','=','tujuan.kode_kabkota')
                        ->leftJoin('unitkerja','matrik.dana_unitkerja','=','unitkerja.kode')
                        ->select(DB::raw('matrik.*, matrik.id as matrik_id, anggaran.*,anggaran.id as anggaran_id,tujuan.*,tujuan.id as tujuan_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                        ->get();
                        */
        $DataMatrik = MatrikPerjalanan::where('tahun_matrik', Session::get('tahun_anggaran'))->orderBy('created_at', 'desc')->get();
        return view('matrik.index', compact('DataMatrik', 'MatrikFlag', 'DataUnitkerja'));
        //dd($DataMatrik);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $DataUnitkerja = DB::table('unitkerja')
            ->where('eselon', '=', '3')->get();
        /*
        $DataAnggaran = DB::table('anggaran')
                        -> leftJoin('unitkerja','anggaran.unitkerja','=','unitkerja.kode')
                        -> select(DB::Raw('anggaran.*,unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                        -> get();
                        */
        if (Auth::User()->pengelola > 3) {
            //operator keuangan atau admin
            $DataAnggaran = DB::table('turunan_anggaran')
            ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
            ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
            ->select(DB::Raw('turunan_anggaran.*, anggaran.tahun_anggaran, anggaran.mak, anggaran.uraian, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
            ->where('anggaran.tahun_anggaran', Session::get('tahun_anggaran'))
            ->orderBy('a_id', 'desc')
            ->get();
        }
        else {
            //operator bidang
            $unit_pelaksana = Auth::User()->user_unitkerja;
            $DataAnggaran = DB::table('turunan_anggaran')
            ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
            ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
            ->select(DB::Raw('turunan_anggaran.*, anggaran.tahun_anggaran, anggaran.mak, anggaran.uraian, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
            ->where([['anggaran.tahun_anggaran', Session::get('tahun_anggaran')],['unit_pelaksana','=',$unit_pelaksana]])
            ->orderBy('a_id', 'desc')
            ->get();
        }
        
        $DataTujuan = Tujuan::all();
        return view('matrik.create', compact('DataTujuan', 'DataAnggaran', 'DataUnitkerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());

        // cek dulu sisa anggaran di turunan_anggaran
        $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id', '=', $request->dana_tid)->first();
        $sisa_rencana = $dataTurunanAnggaran->pagu_awal - $dataTurunanAnggaran->pagu_rencana;
        if ($sisa_rencana >= $request->totalbiaya) {
            //tambah matrik baru
            $datamatrik = new MatrikPerjalanan();
            $datamatrik->tahun_matrik = Carbon::parse($request['tglawal'])->format('Y');
            $datamatrik->tgl_awal = $request['tglawal'];
            $datamatrik->tgl_akhir = $request['tglakhir'];
            $datamatrik->kodekab_tujuan = $request['kode_kabkota'];
            $datamatrik->lamanya = $request['lamanya'];
            $datamatrik->mak_id = $request->dana_makid;
            $datamatrik->dana_tid = $request->dana_tid;
            $datamatrik->dana_mak = $request['dana_mak'];
            $datamatrik->dana_pagu = $request['dana_pagu'];
            $datamatrik->dana_unitkerja = $request['dana_kodeunit'];
            $datamatrik->lama_harian = $request['harian'];
            $datamatrik->dana_harian = $request['uangharian'];
            $datamatrik->total_harian = $request['totalharian'];
            $datamatrik->dana_transport = $request['nilaiTransport'];
            $datamatrik->lama_hotel = $request['hotelhari'];
            $datamatrik->dana_hotel = $request['nilaihotel'];
            $datamatrik->total_hotel = $request['totalhotel'];
            $datamatrik->pengeluaran_rill = $request['pengeluaranrill'];
            $datamatrik->total_biaya = $request['totalbiaya'];
            $datamatrik->save();

            //update turunan anggaran
            $dataTurunanAnggaran->pagu_rencana = $dataTurunanAnggaran->pagu_rencana + $request->totalbiaya;
            $dataTurunanAnggaran->update();

            $pesan_error = 'Matrik perjalanan berhasil di tambahkan';
            $warna_error = 'success';
        } else {
            //totalbiaya lebih besar dari sisa
            $pesan_error = 'Sisa anggaran tidak mencukupi';
            $warna_error = 'danger';
        }


        //Pegawai::create($request->all());

        //update alokasi pagu di anggaran dan turunan anggaran
        /*
        $dataPagu = Anggaran::where('id','=',$request->dana_makid)->get();
        $realisasi_pagu = $dataPagu[0]->rencana_pagu + $request->totalbiaya;
        $inputPagu = Anggaran::where('id','=',$request->dana_makid)->first();
        $inputPagu -> rencana_pagu = $realisasi_pagu;
        $inputPagu -> update();
        */

        //alert()->success('Berhasil.','Data telah ditambahkan!');

        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('matrik.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $DataUnitkerja = DB::table('unitkerja')
            ->where('eselon', '<', '4')->get();
        $MatrikFlag = config('globalvar.FlagMatrik');
        $DataMatrik = DB::table('matrik')
            ->leftJoin('anggaran', 'matrik.dana_mak', '=', 'anggaran.mak')
            ->leftJoin('turunan_anggaran', 'matrik.dana_tid', '=', 'turunan_anggaran.t_id')
            ->leftJoin('tujuan', 'matrik.kodekab_tujuan', '=', 'tujuan.kode_kabkota')
            ->leftJoin('unitkerja', 'matrik.dana_unitkerja', '=', 'unitkerja.kode')
            ->select(DB::raw('matrik.*, matrik.id as matrik_id, anggaran.*,anggaran.id as anggaran_id,tujuan.*,tujuan.id as tujuan_id, turunan_anggaran.*, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
            ->where('matrik.id', '=', $id)
            ->first();
        /*
        $DataAnggaran = DB::table('anggaran')
                -> leftJoin('unitkerja','anggaran.unitkerja','=','unitkerja.kode')
                -> select(DB::Raw('anggaran.*,unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                -> get(); */
        $DataAnggaran = DB::table('turunan_anggaran')
            ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
            ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
            ->select(DB::Raw('turunan_anggaran.*, anggaran.tahun_anggaran, anggaran.mak, anggaran.uraian, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
            ->where('anggaran.tahun_anggaran', Session::get('tahun_anggaran'))
            ->orderBy('a_id', 'desc')
            ->get();
        $DataTujuan = Tujuan::all();
        return view('matrik.editform', compact('DataMatrik', 'MatrikFlag', 'DataUnitkerja', 'DataAnggaran', 'DataTujuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        function gencode($length)
        {

            $kata = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $code_gen = '';
            for ($i = 0; $i < $length; $i++) {
                $pos = rand(0, strlen($kata) - 1);
                $code_gen .= $kata{
                    $pos};
            }
            return $code_gen;
        }
        $count = MatrikPerjalanan::where('id', $request['matrikid'])->count();

        if ($count < 1) {
            Session::flash('message', 'Matrik perjalanan tidak ditemukan');
            Session::flash('message_type', 'danger');
            return redirect()->to('matrik.index');
        }
        $datamatrik = MatrikPerjalanan::findOrFail($request['matrikid']);
        if ($request['aksi'] == 'alokasi') {
            //hanya alokasi
            $count = Transaksi::where('matrik_id', $request['matrikid'])->count();
            $kode_trx = gencode(6);
            if ($count > 0) {
                //data sudah ada tinggal update
                $dataTrx = Transaksi::where('matrik_id', $request->matrikid)->first();
                if ($dataTrx->flag_trx > 0) {
                    //trx sudah diajukan
                    Session::flash('message', 'Alokasi matrik dengan ' . $kode_trx . ' sudah diajukan oleh unit pelaksana');
                    Session::flash('message_type', 'warning');
                    return back();
                }
            } else {
                //data belum ada insert data ke transaksi
                $dataTrx = new Transaksi();
                $dataTrx->kode_trx = $kode_trx;
                $dataTrx->matrik_id = $request->matrikid;
                $dataTrx->tahun_trx = $request->tahun_matrik;
                $dataTrx->save();
            }
            $datamatrik->unit_pelaksana = $request->unit_pelaksana;
            $datamatrik->flag_matrik = 1;
            $datamatrik->update();

            Session::flash('message', 'Alokasi matrik sudah diupdate ' . $kode_trx . '');
            Session::flash('message_type', 'success');
            return back();
        } elseif ($request['aksi'] == 'updateflag') {
            //update flag untuk belum alokasi / batal
            //$datamatrik->unit_pelaksana= NULL;
            $datamatrik->flag_matrik = $request->flagmatrik;
            $datamatrik->update();

            Session::flash('message', 'Alokasi matrik sudah diupdate');
            Session::flash('message_type', 'success');
            return back();
        } elseif ($request->aksi == 'updatematrik') {
            //update alokasi pagu di turunan anggaran
            /*
            $dataPagu = Anggaran::where('id','=',$request->dana_makid)->get();
            //$realisasi_pagu = $dataPagu[0]->rencana_pagu + $request->totalbiaya;
            $pagu_db = $dataPagu[0]->rencana_pagu;
            $pagu_db = $pagu_db - $request->totalbiaya_sblmnya;
            $realisasi_pagu = $pagu_db + $request->totalbiaya;

            $inputPagu = Anggaran::where('id','=',$request->dana_makid)->first();
            $inputPagu -> rencana_pagu = $realisasi_pagu;
            $inputPagu -> update();
            $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id','=',$request->dana_tid)->first();
            $sisa_rencana = $dataTurunanAnggaran->pagu_awal - $dataTurunanAnggaran->pagu_rencana;
            */
            //cek dulu sisanya apakah cukup dgn totalbiaya baru
            //$dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id','=',$request->dana_tid)->first();
            //kondisi 1
            //matrik dari hasil import dimana mak_id dan dana_tid_sblm kosong
            if ($request->dana_tid_sblm == "") {
                //kosong
                $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id', '=', $request->dana_tid)->first();
                $sisa_rencana = $dataTurunanAnggaran->pagu_awal - $dataTurunanAnggaran->pagu_rencana;
                $rencana_awal = 0;
                $dana_tid_berbeda = 0;
            } elseif ($request->dana_tid_sblm == $request->dana_tid) {
                //dana_tid sama
                $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id', '=', $request->dana_tid)->first();
                $rencana_awal = $dataTurunanAnggaran->pagu_rencana - $request->totalbiaya_sblmnya;
                $sisa_rencana = $dataTurunanAnggaran->pagu_awal - $rencana_awal;
                $dana_tid_berbeda = 0;
            } else {
                //dana_tid berbeda
                $dataTurunanAwal = \App\TurunanAnggaran::where('t_id', '=', $request->dana_tid_sblm)->first();
                $dana_awal = $dataTurunanAwal->pagu_rencana - $request->totalbiaya_sblmnya;
                $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id', '=', $request->dana_tid)->first();
                $rencana_awal = $dataTurunanAwal->pagu_rencana;
                $sisa_rencana = $dataTurunanAnggaran->pagu_awal - $dataTurunanAnggaran->pagu_rencana;
                $dana_tid_berbeda = 1;
            }

            if ($sisa_rencana >= $request->totalbiaya) {
                //totalbiaya baru bisa diupdate
                $datamatrik->tahun_matrik = Carbon::parse($request['tglawal'])->format('Y');
                $datamatrik->tgl_awal = $request['tglawal'];
                $datamatrik->tgl_akhir = $request['tglakhir'];
                $datamatrik->kodekab_tujuan = $request['kode_kabkota'];
                $datamatrik->lamanya = $request['lamanya'];
                $datamatrik->mak_id = $dataTurunanAnggaran->a_id;
                $datamatrik->dana_tid = $request->dana_tid;
                $datamatrik->dana_mak = $request['dana_mak'];
                $datamatrik->dana_pagu = $request['dana_pagu'];
                $datamatrik->dana_unitkerja = $request['dana_kodeunit'];
                $datamatrik->lama_harian = $request['harian'];
                $datamatrik->dana_harian = $request['uangharian'];
                $datamatrik->total_harian = $request['totalharian'];
                $datamatrik->dana_transport = $request['nilaiTransport'];
                $datamatrik->lama_hotel = $request['hotelhari'];
                $datamatrik->dana_hotel = $request['nilaihotel'];
                $datamatrik->total_hotel = $request['totalhotel'];
                $datamatrik->pengeluaran_rill = $request['pengeluaranrill'];
                $datamatrik->total_biaya = $request['totalbiaya'];
                $datamatrik->update();

                $dataTurunanAnggaran->pagu_rencana = $rencana_awal + $request->totalbiaya;
                $dataTurunanAnggaran->update();

                if ($dana_tid_berbeda == 1) {
                    $dataTurunanAwal->pagu_rencana = $dana_awal;
                    $dataTurunanAwal->update();
                }

                Session::flash('message', 'Data matrik perjalanan sudah diupdate ' . $rencana_awal . ' ' . $request->totalbiaya);
                Session::flash('message_type', 'success');
                return redirect()->route('matrik.index');
            } else {
                //totalbiaya baru lebih besar dari sisanya
                Session::flash('message', 'Total biaya baru lebih besar dari Sisa Anggaran');
                Session::flash('message_type', 'danger');
                return redirect()->route('matrik.index');
            }
        } else {
            dd($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        //update alokasi pagu di turunan anggaran
        /*
        $dataPagu = Anggaran::where('id','=',$request->dana_makid)->get();
        $pagu_db = $dataPagu[0]->rencana_pagu;
        $realisasi_pagu = $pagu_db - $request->totalbiaya;

        $inputPagu = Anggaran::where('id','=',$request->dana_makid)->first();
        $inputPagu -> rencana_pagu = $realisasi_pagu;
        $inputPagu -> update();
        */
        $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id', '=', $request->dana_tid)->first();
        $rencana_awal = $dataTurunanAnggaran->pagu_rencana - $request->totalbiaya;
        $dataTurunanAnggaran->pagu_rencana = $rencana_awal;
        $dataTurunanAnggaran->update();

        $count = Transaksi::where('matrik_id', '=', $request->matrikid)->count();
        if ($count > 0) {
            $dataTrx = Transaksi::where('matrik_id', '=', $request->matrikid)->first();
            $dataTrx->delete();
        }

        $dataMatrik = MatrikPerjalanan::findOrFail($request->matrikid);
        $dataMatrik->delete();
        $pesan = 'Data Matrik Perjalanan tujuan ke ' . $request->tujuan . ' dari ' . $request->sm . ' berhasil dihapus';

        Session::flash('message', $pesan);
        Session::flash('message_type', 'danger');
        return back();

        //dd($request->all());
    }
    public function format()
    {
        $fileName = 'format-matrik';
        $data = [
            [
                //'tahun_matrik' => null,
                'tgl_awal' => 'Format : YYYY-MM-DD',
                'tgl_akhir' => 'Cth : 2019-12-30',
                'kodekab_tujuan' => 'kode 4 digit',
                'lamanya' => null,
                //'mak_id'=> 'lihat di menu anggaran ',
                'dana_harian' => null,
                'dana_hotel' => null,
                'transport' => null,
                'pengeluaran_rill' => null
            ]
        ];
        $namafile = $fileName . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new MatrikViewExport($data), $namafile);
    }
    public function import(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'importMatrik' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('importMatrik')) {
            $file = $request->file('importMatrik'); //GET FILE
            Excel::import(new MatrikImport, $file); //IMPORT FILE

            Session::flash('message', 'Data excel berhasil di import');
            Session::flash('message_type', 'info');
            return back();
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}
