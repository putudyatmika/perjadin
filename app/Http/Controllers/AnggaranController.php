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
use DB;
use App\Anggaran;
use Excel;
use App\Exports\AnggaranViewExport;
use App\Exports\AnggaranNewExport;
use App\Imports\AnggaranImport;

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

        $DataUnitkerja = DB::table('unitkerja')
            ->where('eselon', '=', '3')->get();
        $DataAnggaran = DB::table('anggaran')
            ->leftJoin('unitkerja', 'anggaran.unitkerja', '=', 'unitkerja.kode')
            ->select(DB::Raw('anggaran.*,unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
            ->orderBy('created_at', 'desc')
            ->where('anggaran.tahun_anggaran', '=', Session::get('tahun_anggaran'))
            ->get();
        //dd(session()->all());
        return view('anggaran.index', compact('DataAnggaran', 'DataUnitkerja'));
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
        Anggaran::create($request->all());

        //alert()->success('Berhasil.','Data telah ditambahkan!');
        Session::flash('message', 'Data telah ditambahkan');
        Session::flash('message_type', 'success');
        return back();
        //return redirect()->route('anggaran.index');
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
        //
        $dataAnggaran = Anggaran::findOrFail($request->anggaran_id);
        $dataAnggaran->delete();

        Session::flash('message', 'Data telah di delete');
        Session::flash('message_type', 'danger');
        return back();
    }
    public function format()
    {
        $fileName = 'format-anggaran';
        $data = [
            [
                //'tahun_anggaran' => null,
                'mak' => null,
                'uraian' => null,
                'pagu_utama' => null,
                'unitkerja' => 'kode bidang/bagian 5 digit'
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
            ->where('anggaran.tahun_anggaran', $this->tahun_anggaran)
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
        $dataAnggaran = Anggaran::where('id', '=', $id)->with('Turunan', 'Unitkerja')->first();
        $dataTurunan = \App\TurunanAnggaran::where('a_id', '=', $id)->get();
        $DataUnitkerja = DB::table('unitkerja')
            ->where('eselon', '=', '3')->get();
        return view('anggaran.alokasi', compact('dataAnggaran', 'dataTurunan', 'DataUnitkerja'));
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
}
