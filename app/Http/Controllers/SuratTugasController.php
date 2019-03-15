<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratTugas;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Pegawai;


class SuratTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $DataPegawai = Pegawai::where([['jabatan','<','3'],['flag','=','1']])->orderBy('unitkerja')->get();
        $DataSuratTugas = SuratTugas::orderBy('flag_surattugas','asc')->orderBy('tgl_surat','asc')->get();
        return view('surattugas.index',compact('DataSuratTugas','FlagTrx','FlagKonfirmasi','FlagSrt','MatrikFlag','FlagTTD','DataPegawai','Bilangan'));
        //dd($DataSuratTugas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if ($request->aksi == "edit") {

            $Pejabat = Pegawai::where([['jabatan','<','3'],['nip_baru','=',$request->ttd_pejabat]])->orderBy('unitkerja')->get();

            $NamaPejabat = $Pejabat[0]->nama;
            $JabatanPejabat = 'Kepala '. $Pejabat[0]->Unitkerja->nama;

            $DataSrt = SuratTugas::where('srt_id','=',$request->srtid)->first();
            $DataSrt -> nomor_surat = $request->nomor_surat;
            $DataSrt -> tgl_surat = Carbon::parse($request->tglsurat)->format('Y-m-d');
            $DataSrt -> ttd_nip = $request->ttd_pejabat;
            $DataSrt -> ttd_jabatan = $JabatanPejabat;
            $DataSrt -> ttd_nama = $NamaPejabat;
            $DataSrt -> flag_ttd = $request->ttd;
            $DataSrt -> flag_surattugas = 1;
            $DataSrt -> update();

            $dataTrx = \App\Transaksi::where('trx_id',$request->trxid)->first();
            $matrik_id = $dataTrx->matrik_id;
            $dataTrx -> flag_trx = 5;
            $dataTrx -> update();

            //update matrik perjalanan juga
            $dataMatrik = \App\MatrikPerjalanan::where('id',$matrik_id)->first();
            $dataMatrik -> flag_matrik = 5;
            $dataMatrik -> update();

            Session::flash('message', 'Data Perjalanan surat tugas an. '.$request->nama.' ke '.$request->tujuan.' untuk '.$request->tugas.' sudah di update');
            Session::flash('message_type', 'warning');
            return redirect()->route('surattugas.index');
        }
        elseif ($request->aksi == "batal") {
            //batalkan surat tugas
            $DataSrt = SuratTugas::where('srt_id','=',$request->srtid)->first();
            $DataSrt -> flag_surattugas = 3;
            $DataSrt -> update();

            //batalkan Transaksi
            $dataTrx = \App\Transaksi::where('trx_id',$request->trxid)->first();
            $matrik_id = $dataTrx->matrik_id;
            $dataTrx -> flag_trx = 3;
            $dataTrx -> update();

            //update matrik perjalanan juga
            $dataMatrik = \App\MatrikPerjalanan::where('id',$matrik_id)->first();
            $dataMatrik -> flag_matrik = 2;
            $dataMatrik -> update();

            //update flag spd
            $dataSpd = \App\Spd::where('trx_id',$request->trxid)->first();
            $dataSpd -> flag_spd = 3;
            $dataSpd -> update();

            //cek dulu sudah ada tidak kuitansinya
            $count = \App\Kuitansi::where('trx_id',$request->trxid)->count();
            if ($count>0) {
                //update flag kuitansi
                $dataKuitansi = \App\Kuitansi::where('trx_id',$request->trxid)->first();
                $dataKuitansi -> flag_kuitansi = 3;
                $dataKuitansi -> update();
            }

            Session::flash('message', 'Data Perjalanan surat tugas an. '.$request->nama.' ke '.$request->tujuan.' untuk '.$request->tugas.' sudah di update');
            Session::flash('message_type', 'warning');
            return redirect()->route('surattugas.index');
        }
        else {
            dd($request->all());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function view($kodetrx)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $Bulan = config('globalvar.Bulan');
        $dataTransaksi = \App\Transaksi::with('TabelPegawai','Matrik','SuratTugas')->where('kode_trx','=',$kodetrx)->get();
        return view('surattugas.view',compact('dataTransaksi','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','Bulan'));
        //dd($dataTransaksi);
        //dd($DataSuratTugas);
        //return view('surattugas.view');
    }
}
