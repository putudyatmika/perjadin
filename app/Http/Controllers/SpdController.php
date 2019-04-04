<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratTugas;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Pegawai;
use App\Spd;

class SpdController extends Controller
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
        $FlagKendaraan = config('globalvar.Kendaraan');
        $DataPPK = Pegawai::where([['flag_pengelola','=','2'],['flag','=','1']])->orderBy('unitkerja')->get();
        $DataSPD = Spd::orderBy('flag_spd','asc')->get();
        return view('spd.index',compact('DataSPD','FlagTrx','FlagKonfirmasi','FlagSrt','MatrikFlag','FlagTTD','DataPPK','FlagKendaraan'));
        //dd($DataSPD);
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

            $Pejabat = Pegawai::where([['jabatan','<','3'],['nip_baru','=',$request->ppk_nip]])->orderBy('unitkerja')->get();

            $NamaPejabat = $Pejabat[0]->nama;

            $dataSpd = Spd::where('spd_id','=',$request->spdid)->first();
            $dataSpd -> nomor_spd = $request->nomor_surat;
            $dataSpd -> ppk_nip = $request->ppk_nip;
            $dataSpd -> ppk_nama = $NamaPejabat;
            $dataSpd -> flag_spd = 1;
            $dataSpd -> flag_cetak_tujuan = $request->cetaktujuan;
            $dataSpd -> kendaraan = $request->kendaraan;
            $dataSpd -> update();

            //input tabel kuitansi dan set flag transaksi menunggu pembayaran
            $count = \App\Kuitansi::where('trx_id','=',$request->trxid)->count();
            if ($count>0) {
                //sudah ada datanya
            }
            else {
                $dataKuitansi = new \App\Kuitansi();
                $dataKuitansi -> trx_id = $request->trxid;
                $dataKuitansi -> save();
            }
            //transaksi update
            $dataTrx = \App\Transaksi::where('trx_id','=',$request->trxid)->first();
            $dataTrx -> flag_trx = 6;
            $dataTrx -> update();

            Session::flash('message', 'Data Perjalanan Surat Perjalanan Dinas an. '.$request->nama.' ke '.$request->tujuan.' untuk '.$request->tugas.' sudah di update');
            Session::flash('message_type', 'warning');
            return redirect()->route('spd.index');


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
        $FlagKendaraan = config('globalvar.Kendaraan');

        $dataTransaksi = \App\Transaksi::with('TabelPegawai','Matrik','SuratTugas','Spd')->where('kode_trx','=',$kodetrx)->orderBy('updated_at','desc')->get();
        return view('spd.view',compact('dataTransaksi','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','Bulan','FlagKendaraan'));
        //dd($dataTransaksi);
        //dd($DataSuratTugas);
        //return view('surattugas.view');
    }
}
