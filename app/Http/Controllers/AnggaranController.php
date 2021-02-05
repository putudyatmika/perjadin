<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Golongan;
use App\Unitkerja;
use App\Pegawai;
use App\MatrikPerjalanan;
use Validator;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Anggaran;
use Excel;
use App\Exports\AnggaranViewExport;
use App\Exports\AnggaranNewExport;
use App\Imports\AnggaranImport;
use App\TurunanAnggaran;
use App\Transaksi;
use App\SuratTugas;
use App\Spd;
use App\Kuitansi;
use App\PokProgram;
use App\PokKegiatan;
use App\PokOutput;
use App\PokKro;
use App\PokKomponen;
use App\PokSubKomponen;
use App\PokAkun;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tahun_anggaran=Session::get('tahun_anggaran');
        $dataProgram = PokProgram::where('tahun_prog',$tahun_anggaran)->get();
        $dataAkun = PokAkun::where('kode_akun','like','524%')->get();
        if (Auth::user()->user_level == 2)
        {
            if (request('unitkerja') == NULL)
            {
                $flag_unitkerja = Auth::user()->user_unitkerja;
            }
            else {
                $flag_unitkerja = request('unitkerja');
            }
        }
        else
        {
            if (request('unitkerja') == NULL)
            {
                $flag_unitkerja = '';
            }
            else {
                $flag_unitkerja = request('unitkerja');
            }
        }
        /*
        $DataUnitkerja = DB::table('unitkerja')->where(function ($query)
        {
            $query->where('flag_edit', '=', '0')->where('eselon', '<', '4');
        })->orWhere(function ($query){
            $query->where('flag_edit','=','1')
            ->where('tahun','=',Session::get('tahun_anggaran'));
        })->get();
        */
        $DataUnitkerja = Unitkerja::where('eselon', '<', '4')->orderBy('kode', 'asc')->get();
        $DataAnggaran = DB::table('anggaran')
            ->leftJoin('unitkerja', 'anggaran.unitkerja', '=', 'unitkerja.kode')
            ->select(DB::Raw('anggaran.*,unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
            ->orderBy('created_at', 'desc')
            ->where('anggaran.tahun_anggaran', '=', Session::get('tahun_anggaran'))
            ->when($flag_unitkerja,function ($query) use ($flag_unitkerja) {
                return $query->where('unitkerja',$flag_unitkerja);
            })
            ->get();
        //dd(session()->all());
        return view('anggaran.index', compact('DataAnggaran', 'DataUnitkerja','flag_unitkerja','dataProgram','dataAkun'));
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
        return view('anggaran.form', compact('DataUnitkerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        /*
        "tahun_anggaran" => "2020"
        "mak" => "054.01.06.2902.004.200.524111"
        "komponen_kode" => "200"
        "komponen_nama" => "SURVEI TRIWULANAN KEGIATAN USAHA TERINTEGRASI"
        "uraian" => "Pengawasan teknis dan administrasi bps provinsi ke kabupaten/kota"
        "pagu_utama" => "3131000"
        "unitkerja" => "52540"
        Anggaran::create($request->all());
        //alert()->success('Berhasil.','Data telah ditambahkan!');
        Session::flash('message', 'Data telah ditambahkan');
        Session::flash('message_type', 'success');
        return back();
        //return redirect()->route('anggaran.index');
        */
        $data = new Anggaran();
        $data->tahun_anggaran = $request->tahun_anggaran;
        $data->mak = $request->mak;
        $data->komponen_kode = $request->komponen_kode;
        $data->komponen_nama = $request->komponen_nama;
        $data->uraian = $request->uraian;
        $data->pagu_utama = $request->pagu_utama;
        $data->unitkerja = $request->unitkerja;
        $data->save();
        Session::flash('message', 'Data telah ditambahkan');
        Session::flash('message_type', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Simpan(Request $request)
    {
        //dd($request->all());
        //cek untuk eloquent yg tepat
        if ($request->subkomponen_kode != NULL)
        {
            if ($request->kro_kode == NULL)
            {
                $data_detil = PokSubKomponen::where([['tahun_subkom',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_output',$request->output_kode],['kode_komponen',$request->komponen_kode],['kode_subkom',$request->subkomponen_kode]])->first();
            }
            else
            {
                $data_detil = PokSubKomponen::where([['tahun_subkom',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_output',$request->output_kode],['kode_komponen',$request->komponen_kode],['kode_subkom',$request->subkomponen_kode],['kode_kro',$request->kro_kode]])->first();
            }
            
        }
        else
        {
            if ($request->kro_kode == NULL)
            {
                $data_detil = PokKomponen::where([['tahun_komponen',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_output',$request->output_kode],['kode_komponen',$request->komponen_kode]])->first();
            }
            else 
            {   
                $data_detil = PokKomponen::where([['tahun_komponen',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_output',$request->output_kode],['kode_kro',$request->kro_kode],['kode_komponen',$request->komponen_kode]])->first();
            }
        }

        if ($request->kro_kode == NULL)
        {
            //tanpa kro
            $mak = $request->prog_kode.'.'.$request->keg_kode.'.'.$request->output_kode.'.'.$request->komponen_kode;
            $kro_nama = NULL;
        }
        else 
        {
            //dengan kro
            $mak = $request->prog_kode.'.'.$request->keg_kode.'.'.$request->kro_kode.'.'.$request->output_kode.'.'.$request->komponen_kode;
            $kro_nama = $data_detil->Kro->nama_kro;
        }

        if ($request->subkomponen_kode == NULL)
        {
            //tanpa subkomponen
            $mak = $mak.'.'.$request->akun_kode;
            $subkom_nama = NULL;
            $komponen_nama = $data_detil->nama_komponen;
        }
        else 
        {
            //dengan subkomponen
            $mak = $mak.'.'.$request->subkomponen_kode.'.'.$request->akun_kode;
            $subkom_nama = $data_detil->nama_subkom;
            $komponen_nama = $data_detil->Komponen->nama_komponen;
        }
        $data_akun = PokAkun::where('kode_akun',$request->akun_kode)->first();
        $data = new Anggaran();
        $data->tahun_anggaran = $request->tahun_anggaran;
        $data->mak = $mak;
        $data->prog_kode = $request->prog_kode;
        $data->prog_nama = $data_detil->Program->nama_prog;
        $data->keg_kode = $request->keg_kode;
        $data->keg_nama = $data_detil->Kegiatan->nama_keg;
        $data->kro_kode = $request->kro_kode;
        $data->kro_nama = $kro_nama;
        $data->output_kode = $request->output_kode;
        $data->output_nama = $data_detil->Output->nama_output;
        $data->komponen_kode = $request->komponen_kode;
        $data->komponen_nama = $komponen_nama;
        $data->subkomponen_kode = $request->subkomponen_kode;
        $data->subkomponen_nama = $subkom_nama;
        $data->akun_kode = $request->akun_kode;
        $data->akun_nama = $data_akun->nama_akun;
        $data->uraian = $request->uraian;
        $data->pagu_utama = $request->pagu_utama;
        $data->unitkerja = $request->unitkerja;
        $data->save();
        Session::flash('message', 'Data anggaran '.$mak.' '.$request->uraian.' telah ditambahkan');
        Session::flash('message_type', 'success');
        return redirect()->route('anggaran.index');
    }
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
            ->where('eselon', '=', '3')->get();
        $DataAnggaran = Anggaran::findOrFail($id);
        return view('anggaran.editform', compact('DataAnggaran', 'DataUnitkerja'));
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
        // dd($request->all());
        /*
       $dataAnggaran = Anggaran::findOrFail($request->anggaran_id);
       $dataAnggaran -> update($request->all());
       //alert()->success('Berhasil.','Data telah ditambahkan!');
       Session::flash('message', 'Data telah diupdate');
       Session::flash('message_type', 'success');
       return back();
       "_token" => "S589TEdVimK16g0QMtR4MzEbAUdp4RLXcy86WVeo"
        "_method" => "patch"
        "anggaran_id" => "68"
        "tahun_anggaran" => "2019"
        "mak" => "054.01.06.2895.038.054.524119"
        "uraian" => "Biaya Transport INNAS Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area (KSA Jagung)"
        "pagu_utama" => "7879100"
        "pagu_rencana" => "0"
        "unitkerja" => "52530"
       */
        //cek dulu id anggaran
        $count = Anggaran::where('id', '=', $request->anggaran_id)->count();
        if ($count > 0) {
            $dataAnggaran = Anggaran::where('id', '=', $request->anggaran_id)->first();
            $dataAnggaran->tahun_anggaran = $request->tahun_anggaran;
            $dataAnggaran->mak = $request->mak;
            $dataAnggaran->uraian = $request->uraian;
            $dataAnggaran->rencana_pagu = $request->pagu_rencana;
            $dataAnggaran->pagu_utama = $request->pagu_utama;
            $dataAnggaran->unitkerja = $request->unitkerja;
            $dataAnggaran->komponen_kode = $request->komponen_kode;
            $dataAnggaran->komponen_nama = $request->komponen_nama;
            $dataAnggaran->update();

            $pesan_error = 'Data anggaran sudah diupdate';
            $warna_error = 'success';
        } else {
            //data anggaran tidak ada
            $pesan_error = 'ID Anggaran ini tidak tersedia';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //ini masih perlu diperbaiki
        //dd($request->all());
        //syarat anggaran dihapus :
        //1. Harus tidak ada Matrik Perjalanan yang menggunakan anggaran ini Flag Sudah Terlaksana
        //2. Transaksi, Kelengkapan, dan Kuitansi harus dalam posisi kosong / flag batal semua
        //3. Hapus Semua Transaksi, Kelengkapn, Matrik, Turunan yang menggunakan Anggaran ini
        //4. Hapus Kuitansi berdasarkan trx_id, Hapus Spd sesuai trx_id, hapus Kuitanasi sesuai trx_id,
        // hapus transaksi berdasarkan matrik_id, hapus matrik sesuai mak_id, hapus turunan_anggaran sesuai a_id, hapus anggaran sesuai id
        //cek dulu matrik yg menggunakan anggaran ini
        //kalo tidak ada hapus beserta turunannya
        //
        $cek_matrik = MatrikPerjalanan::where([['mak_id','=',$request->anggaran_id],['flag_matrik','>','2']])->count();
        //dd($cek_matrik);
        if ($cek_matrik > 0)
        {
            //masih ada matrik yg menggunakan anggaran ini
            Session::flash('message', 'Masih ada Matrik Perjalanan menggunakan Anggaran ini. Pastikan tidak ada matrik perjalanan menggunakan anggaran ini');
            Session::flash('message_type', 'warning');
            return back();
        }
        else
        {
            //cari matrik yang menggunakan anggaran ini
            $cek_m_delete = MatrikPerjalanan::where([['mak_id','=',$request->anggaran_id],['flag_matrik','<','3']])->count();
            if ($cek_m_delete > 0)
            {
                $d_matrik = MatrikPerjalanan::where([['mak_id','=',$request->anggaran_id],['flag_matrik','<','3']])->get();
                foreach ($d_matrik as $item) {
                    $cek_trx = Transaksi::where('matrik_id','=',$item->id)->count();
                    if ($cek_trx > 0)
                    {
                        //ada transaksi pakai matrik_id
                        $trx = Transaksi::where('matrik_id','=',$item->id)->first();

                        //hapus semua transaksi di SuratTugas, Spd, Kuitansi
                        $cek_srt = SuratTugas::where('trx_id','=',$trx->trx_id)->count();
                        if ($cek_srt > 0)
                        {
                            //hapus surat tugas pakai trx_id ini
                            SuratTugas::where('trx_id','=',$trx->trx_id)->delete();
                        }
                        $cek_spd = Spd::where('trx_id','=',$trx->trx_id)->count();
                        if ($cek_spd)
                        {
                            //hapus SPD pakai trx_id ini
                            Spd::where('trx_id','=',$trx->trx_id)->delete();
                        }
                        $cek_kuitansi = Kuitansi::where('trx_id','=',$trx->trx_id)->count();
                        if ($cek_kuitansi > 0)
                        {
                            //hapus kuitansi pakai trx_id ini
                            Kuitansi::where('trx_id','=',$trx->trx_id)->delete();
                        }

                        //hapus transaksi sesuai matrik_id
                        Transaksi::where('matrik_id','=',$item->id)->delete();
                    }
                }
                //hapus matrik perjalanan sesuai anggaran_id
                MatrikPerjalanan::where([['mak_id','=',$request->anggaran_id],['flag_matrik','<','3']])->delete();
            }
            $count = TurunanAnggaran::where('a_id','=',$request->anggaran_id)->count();
            if ($count>0) {
                //delete
                TurunanAnggaran::where('a_id','=',$request->anggaran_id)->delete();

            }
            Anggaran::where('id','=',$request->anggaran_id)->delete();

            Session::flash('message', 'Data anggaran beserta turunan anggaran, matrik dll telah di hapus');
            Session::flash('message_type', 'danger');
            return back();
        }


    }
    public function format()
    {
        $fileName = 'format-anggaran-';
        $data = [
            [
                //'tahun_anggaran' => null,
                'prog_kode'=>null,
                'keg_kode'=>null,
                'kro_kode'=>null,
                'output_kode'=>null,
                'komponen_kode' => null,
                'subkomponen_kode'=>null,
                'akun_kode'=>null,
                'uraian' => null,
                'pagu_utama' => null,
                'unitkerja' => 'kode bidang/bagian 5 digit',
                'catatan'=>'semua isian yang tidak ada dikosongkan saja. kolom Catatan ini dihapus saja'
            ]
        ];

        $namafile = $fileName . date('Y-m-d_H-i-s') . '.xlsx';
        //dd($data);
        return Excel::download(new AnggaranViewExport($data), $namafile);
    }
    public function import(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'importAnggaran' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('importAnggaran')) {
            $file = $request->file('importAnggaran'); //GET FILE
            Excel::import(new AnggaranImport, $file); //IMPORT FILE
            //return redirect()->back()->with(['success' => 'Upload success']);
            Session::flash('message', 'Data excel berhasil di import');
            Session::flash('message_type', 'info');
            return back();
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function export()
    {

        $DataAnggaran = DB::table('anggaran')
            ->leftJoin('unitkerja', 'anggaran.unitkerja', '=', 'unitkerja.kode')
            ->select(DB::Raw('anggaran.*,unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
            ->orderBy('anggaran.id', 'asc')
            ->where('anggaran.tahun_anggaran','=', Session::get('tahun_anggaran'))
            ->get()->toArray();

        //$anggaran_array[]=array('ANGGARAN ID','MAK','URAIAN','PAGU UTAMA','PAGU RENCANA','PAGU REALISASI','UNITKERJA');
        foreach ($DataAnggaran as $item) {
            $anggaran_array[] = array(
                'ANGGARAN ID' => $item->id,
                'TAHUN ANGGARAN' => $item->tahun_anggaran,
                'MAK' => $item->mak,
                'URAIAN' => $item->uraian,
                'PAGU UTAMA' => $item->pagu_utama,
                'RENCANA PAGU' => $item->rencana_pagu,
                'REALISASI PAGU' => $item->realisasi_pagu,
                'SM UNITKERJA' => "[" . $item->unit_kode . "] " . $item->unit_nama,
                'TURUNAN ID' => "",
                'PAGU AWAL' => "",
                'PAGU RENCANA' => "",
                'PAGU REALISASI' => "",
                'TURUNAN UNITKERJA' => ""
            );
            $count = \App\TurunanAnggaran::where('a_id', '=', $item->id)->count();
            if ($count > 0) {
                $dataTurunan = \App\TurunanAnggaran::where('a_id', '=', $item->id)->orderBy('unit_pelaksana', 'asc')->get();
                foreach ($dataTurunan as $r) {
                    $anggaran_array[] = array(
                        'ANGGARAN ID' => $item->id,
                        'TAHUN ANGGARAN' => "",
                        'MAK' => "",
                        'URAIAN' => "",
                        'PAGU UTAMA' => "",
                        'RENCANA PAGU' => "",
                        'REALISASI PAGU' => "",
                        'SM UNITKERJA' => "",
                        'TURUNAN ID' => $r->t_id,
                        'PAGU AWAL' => $r->pagu_awal,
                        'PAGU RENCANA' => $r->pagu_rencana,
                        'PAGU REALISASI' => $r->pagu_realisasi,
                        'TURUNAN UNITKERJA' => "[" . $r->unit_pelaksana . "] " . $r->Unitkerja->nama
                    );
                }
            }
        }
        $fileName = 'data-anggaran';
        $namafile = $fileName . date('Y-m-d_H-i-s') . '.xlsx';
        //dd($anggaran_array);
        return Excel::download(new AnggaranViewExport($anggaran_array), $namafile);
    }

    public function viewturunan($aid)
    {
        $dataAnggaran = Anggaran::where('id', '=', $aid)->with('Turunan', 'Unitkerja')->first();

        $arr = array('hasil' => 'Data tidak tersedia', 'status' => false);
        if ($dataAnggaran) {
            //$arr = array('hasil' => $dataAnggaran, 'status' => true);
            $arrTurunan = array();
            $arrTotal = array();
            $tCount = \App\TurunanAnggaran::where('a_id', '=', $aid)->count();
            if ($tCount > 0) {
                $dTurunan = \App\TurunanAnggaran::where('a_id', '=', $aid)->get();
                $i = 1;
                $tStatus = true;
                foreach ($dTurunan as $item) {
                    $arrTurunan[] = array(
                        'no' => $i,
                        't_id' => $item->t_id,
                        'a_id' => $item->a_id,
                        't_unitkode' => $item->unit_pelaksana,
                        't_unitnama' => $item->Unitkerja->nama,
                        't_paguawal' => (int) $item->pagu_awal,
                        't_pagurencana' => (int) $item->pagu_rencana,
                        't_pagurealisasi' => (int) $item->pagu_realisasi
                    );
                    $i++;
                }
                $arrTotal = array(
                    'persen' => (float) number_format(($dTurunan->sum('pagu_rencana') / $dTurunan->sum('pagu_awal')) * 100, 2),
                    'pagu_awal' => $dTurunan->sum('pagu_awal'),
                    'pagu_rencana' => $dTurunan->sum('pagu_rencana'),
                    'pagu_realisasi' => $dTurunan->sum('pagu_realisasi'),
                );
            } else {
                $tStatus = false;
            }
            $arr = array(
                'hasil' => array(
                    'id' => $dataAnggaran->id,
                    'tahun_anggaran' => $dataAnggaran->tahun_anggaran,
                    'mak' => $dataAnggaran->mak,
                    'prog_kode'=>$dataAnggaran->prog_kode,
                    'prog_nama'=>$dataAnggaran->prog_nama,
                    'keg_kode'=>$dataAnggaran->keg_kode,
                    'keg_nama'=>$dataAnggaran->keg_nama,
                    'kro_kode'=>$dataAnggaran->kro_kode,
                    'kro_nama'=>$dataAnggaran->kro_nama,
                    'output_kode'=>$dataAnggaran->output_kode,
                    'output_nama'=>$dataAnggaran->output_nama,
                    'komponen_kode' => $dataAnggaran->komponen_kode,
                    'komponen_nama' => $dataAnggaran->komponen_nama,
                    'subkomponen_kode'=>$dataAnggaran->subkomponen_kode,
                    'subkomponen_nama'=>$dataAnggaran->subkomponen_nama,
                    'akun_kode'=>$dataAnggaran->akun_kode,
                    'akun_nama'=>$dataAnggaran->akun_nama,
                    'uraian' => $dataAnggaran->uraian,
                    'pagu_utama' => (int) $dataAnggaran->pagu_utama,
                    'rencana_pagu' => (int) $dataAnggaran->rencana_pagu,
                    'unitkode' => $dataAnggaran->unitkerja,
                    'unitnama' => $dataAnggaran->Unitkerja->nama,
                    'turunan_status' => $tStatus,
                    't_jumlah' => $tCount,
                    'total' => $arrTotal,
                    'turunan' => $arrTurunan,
                ),
                'status' => true,

            );
        }
        return Response()->json($arr);
        //return response()->json($ritems);
        //return response()->json(array('data'=> $data), 200);

    }
    public function alokasi($id)
    {
        $count = Anggaran::where('id', '=', $id)->where('flag_kunci','=',0)->count();
        if ($count>0)
        {
            //bisa di buka
            $dataAnggaran = Anggaran::where('id', '=', $id)->where('flag_kunci','=',0)->with('Turunan', 'Unitkerja')->first();
            $dataTurunan = \App\TurunanAnggaran::where('a_id', '=', $id)->get();
            $dataJalan = MatrikPerjalanan::with('Transaksi')
            ->LeftJoin('transaksi','transaksi.matrik_id','=','matrik.id')
            ->where('mak_id','=',$id)
            ->orderBy('dana_tid','asc')->orderBy('transaksi.tgl_brkt','desc')->get();
            $MatrikFlag = config('globalvar.FlagMatrik');
            $FlagTrx = config('globalvar.FlagTransaksi');
            $DataUnitkerja = DB::table('unitkerja')
                ->where('eselon', '<', '4')->get();
            //dd($dataJalan);
            return view('anggaran.alokasi', compact('dataAnggaran', 'dataTurunan', 'DataUnitkerja','dataJalan','MatrikFlag','FlagTrx'));

        }
        else
        {
            //pesan error
            $pesan_error = 'Data anggaran terkunci, belum bisa di alokasi';
            $warna_error = 'danger';
            Session::flash('message', $pesan_error);
            Session::flash('message_type', $warna_error);
            return back();
        }


    }
    public function sinkron()
    {
        //sinkroninsasi data anggaran ke turunan anggaran
        $dataAnggaran = Anggaran::with('Unitkerja')->get();
        foreach ($dataAnggaran as $item) {
            $dataRencana = Anggaran::where('id','=', $item->id)->first();
            $dataRencana -> rencana_pagu = $item->pagu_utama;
            $dataRencana -> update();
            $count = \App\TurunanAnggaran::where([['a_id', '=', $item->id], ['unit_pelaksana', '=', $item->unitkerja]])->count();
            if ($count > 0) {
                //sudah ada
                $dataSinkron[] = array(
                    'id' => $item->id,
                    'mak' => $item->mak,
                    'uraian' => $item->uraian,
                    'unitkerja' => $item->unitkerja,
                    'namaunit' => $item->Unitkerja->nama,
                    'pagu_utama' => $item->pagu_utama,
                    'status' => 'Data sudah tersinkron'
                );
            } else {
                //belum ada insert
                //$dataTurunan = \App\TurunanAnggaran::where([['a_id','=',$item->id],['unit_pelaksana','=',$item->unitkerja]])->first();
                $dataTurunan = new \App\TurunanAnggaran();
                $dataTurunan->a_id = $item->id;
                $dataTurunan->unit_pelaksana = $item->unitkerja;
                $dataTurunan->pagu_awal = $item->pagu_utama;
                $dataTurunan->save();
                $dataSinkron[] = array(
                    'id' => $item->id,
                    'mak' => $item->mak,
                    'uraian' => $item->uraian,
                    'unitkerja' => $item->unitkerja,
                    'namaunit' => $item->Unitkerja->nama,
                    'pagu_utama' => $item->pagu_utama,
                    'status' => 'Data sudah ditambahkan'
                );
            }
        }
        dd($dataSinkron);
    }
    public function kunci(Request $request)
    {
        //dd($request->all());
        //cek dulu id anggaran
        //cek flag dulu
        if ($request->flag_kunci == 0)
        {
            //flag tidak terkunci
            $flag_kunci = 1;
        }
        else
        {
            //flag terkunci
            $flag_kunci = 0;
        }
        $count = Anggaran::where('id', '=', $request->anggaran_id)->count();

        if ($count > 0) {

            $dataAnggaran = Anggaran::where('id', '=', $request->anggaran_id)->first();
            $dataAnggaran->flag_kunci = $flag_kunci;
            $dataAnggaran->update();

            $count = TurunanAnggaran::where('a_id','=',$request->anggaran_id)->count();
            if ($count>0)
            {
                //ada turunan
                $dataTurunan = TurunanAnggaran::where('a_id','=',$request->anggaran_id)->get();
                foreach ($dataTurunan as $d)
                {
                    $d->flag_kunci_turunan = $flag_kunci;
                    $d->update();
                }

            }

            $pesan_error = 'Data anggaran sudah diupdate';
            $warna_error = 'success';
        } else {
            //data anggaran tidak ada
            $pesan_error = 'ID Anggaran ini tidak tersedia';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return back();
    }
    public function SinkronKode()
    {
        $tahun_anggaran = Session::get('tahun_anggaran');
        $data = Anggaran::where('tahun_anggaran',Session::get('tahun_anggaran'))->get();
        //"mak" => "054.01.06.2903.009.101.A.524111"
        foreach ($data as $item) {
            $mak = explode(".",$item->mak);
            $jumlah = count($mak);
            $data_update = Anggaran::where('id',$item->id)->first();
            if ($jumlah == 9)
            {
                //ada subkomponen kro
                $data_update->prog_kode = $mak[0].".".$mak[1].".".$mak[2];
                $data_update->keg_kode = $mak[3];
                $data_update->kro_kode = $mak[4];
                $data_update->output_kode = $mak[5];
                $data_update->komponen_kode = $mak[6];
                $data_update->subkomponen_kode = $mak[7];
                $data_update->akun_kode = $mak[8];
                $data_update->update();
            }
            elseif ($jumlah == 8)
            {
                //ada subkomponen
                $data_update->prog_kode = $mak[0].".".$mak[1].".".$mak[2];
                $data_update->keg_kode = $mak[3];
                $data_update->output_kode = $mak[4];
                $data_update->komponen_kode = $mak[5];
                $data_update->subkomponen_kode = $mak[6];
                $data_update->akun_kode = $mak[7];
                $data_update->update();
            }
            else 
            {
                //tanpa subkomponen
                $data_update->prog_kode = $mak[0].".".$mak[1].".".$mak[2];
                $data_update->keg_kode = $mak[3];
                $data_update->output_kode = $mak[4];
                $data_update->komponen_kode = $mak[5];
                $data_update->akun_kode = $mak[6];
                $data_update->update();
            }
            $data_prog = PokProgram::where([['tahun_prog',$tahun_anggaran],['kode_prog',$data_update->prog_kode]])->first();
            $data_keg = PokKegiatan::where([['tahun_keg',$tahun_anggaran],['kode_prog',$data_update->prog_kode],['kode_keg',$data_update->keg_kode]])->first();
            if ($data_update->kro_kode != NULL)
            {
                //ada kro
                $data_kro = PokKro::where('kode_kro',$data_update->kro_kode)->first();
                $data_update->kro_nama = $data_kro->nama_kro;

                $data_output = PokOutput::where([['tahun_output',$tahun_anggaran],['kode_prog',$data_update->prog_kode],['kode_keg',$data_update->keg_kode],['kode_kro',$data_update->kro_kode],['kode_output',$data_update->output_kode]])->first();
                $data_komponen = PokKomponen::where([['tahun_komponen',$tahun_anggaran],['kode_prog',$data_update->prog_kode],['kode_keg',$data_update->keg_kode],['kode_kro',$data_update->kro_kode],['kode_output',$data_update->output_kode],['kode_komponen',$data_update->komponen_kode]])->first();
            }
            else
            {
                //kro tidak ada
                $data_output = PokOutput::where([['tahun_output',$tahun_anggaran],['kode_prog',$data_update->prog_kode],['kode_keg',$data_update->keg_kode],['kode_output',$data_update->output_kode]])->first();
                $data_komponen = PokKomponen::where([['tahun_komponen',$tahun_anggaran],['kode_prog',$data_update->prog_kode],['kode_keg',$data_update->keg_kode],['kode_output',$data_update->output_kode],['kode_komponen',$data_update->komponen_kode]])->first();
            }

            if ($data_update->subkomponen_kode != NULL)
            {
                //ada sub
                $data_subkom = PokSubkomponen::where([['tahun_subkom',$tahun_anggaran],['kode_prog',$data_update->prog_kode],['kode_keg',$data_update->keg_kode],['kode_komponen',$data_update->komponen_kode],['kode_subkom',$data_update->subkomponen_kode]])->first();
                $data_update->subkomponen_nama = $data_subkom->nama_subkom;
            }
            $data_akun = PokAkun::where('kode_akun',$data_update->akun_kode)->first();
            $data_update->prog_nama = $data_prog->nama_prog;
            $data_update->keg_nama = $data_keg->nama_keg;
            $data_update->output_nama = $data_output->nama_output;
            $data_update->komponen_nama = $data_komponen->nama_komponen;
            $data_update->akun_nama = $data_akun->nama_akun;
            $data_update->update();
        }
        dd($data);
    }
    public function CariAnggaran($id)
    {
        $arr = array(
            'status'=>false,
            'hasil'=>'Anggaran tidak tersedia'
        );
        $count = Anggaran::where('id',$id)->count();
        if ($count > 0)
        {
            $data = Anggaran::where('id',$id)->first();
            $arrTurunan = array();
            $arrTotal = array();
            $tCount = TurunanAnggaran::where('a_id', '=', $id)->count();
            if ($tCount > 0) {
                $dTurunan = TurunanAnggaran::where('a_id', '=', $id)->get();
                $i = 1;
                $tStatus = true;
                foreach ($dTurunan as $item) {
                    $arrTurunan[] = array(
                        'no' => $i,
                        't_id' => $item->t_id,
                        'a_id' => $item->a_id,
                        't_unitkode' => $item->unit_pelaksana,
                        't_unitnama' => $item->Unitkerja->nama,
                        't_paguawal' => (int) $item->pagu_awal,
                        't_pagurencana' => (int) $item->pagu_rencana,
                        't_pagurealisasi' => (int) $item->pagu_realisasi
                    );
                    $i++;
                }
                $arrTotal = array(
                    'persen' => (float) number_format(($dTurunan->sum('pagu_rencana') / $dTurunan->sum('pagu_awal')) * 100, 2),
                    'pagu_awal' => $dTurunan->sum('pagu_awal'),
                    'pagu_rencana' => $dTurunan->sum('pagu_rencana'),
                    'pagu_realisasi' => $dTurunan->sum('pagu_realisasi'),
                );
            } 
            else {
                $tStatus = false;
            }
            $hasil = array(
                'id'=>$data->id,
                'tahun_anggaran'=>$data->tahun_anggaran,
                'mak'=>$data->mak,
                'prog_kode'=>$data->prog_kode,
                'prog_nama'=>$data->prog_nama,
                'keg_kode'=>$data->keg_kode,
                'keg_nama'=>$data->keg_nama,
                'kro_kode'=>$data->kro_kode,
                'kro_nama'=>$data->kro_nama,
                'output_kode'=>$data->output_kode,
                'output_nama'=>$data->output_nama,
                'komponen_kode'=>$data->komponen_kode,
                'komponen_nama'=>$data->komponen_nama,
                'subkomponen_kode'=>$data->subkomponen_kode,
                'subkomponen_nama'=>$data->subkomponen_nama,
                'akun_kode'=>$data->akun_kode,
                'akun_nama'=>$data->akun_nama,
                'uraian'=>$data->uraian,
                'pagu_utama'=>(int) $data->pagu_utama,
                'rencana_pagu'=>(int) $data->rencana_pagu,
                'realisasi_pagu'=>(int)$data->realisasi_pagu,
                'unitkerja'=>$data->unitkerja,
                'unitkerja_nama'=>$data->Unitkerja->nama,
                'status'=>$data->status,
                'flag_kunci'=>$data->flag_kunci,
                'created_at'=>$data->created_at,
                'updated_at'=>$data->updated_at
            );
            $arr = array (
                'status'=>true,
                'hasil'=>$hasil,
                'turunan_status' => $tStatus,
                't_jumlah' => $tCount,
                'total' => $arrTotal,
                'turunan' => $arrTurunan,
            );
        }
         //dd($arr);
         return Response()->json($arr);
    }
    public function SimpanUpdate(Request $request)
    {
        dd($request->all());
    }
}
