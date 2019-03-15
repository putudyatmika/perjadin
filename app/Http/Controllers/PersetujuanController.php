<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\MatrikPerjalanan;
use Illuminate\Http\Request;
use App\Pegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\SuratTugas;
use App\Spd;
use App\Unitkerja;

class PersetujuanController extends Controller
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
        $dataTransaksi = Transaksi::whereIn('flag_trx',array(1,2))->get();
        return view('setuju.index',compact('dataTransaksi','MatrikFlag','FlagTrx','FlagKonfirmasi'));
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
        if ($request->aksi == "SetujuKabid") {
            if ($request->kabidsm_setuju==1) {
                $flagtrx = 2;
                $flagmatrik=3;
                $flag_surattugas = 0;
                $flag_spd = 0;
            }
            else {
                $flagtrx = 3;
                $flagmatrik=2;
                $flag_surattugas = 3;
                $flag_spd =3;
            }
            //ubah status matrik
            $dataMatrik = MatrikPerjalanan::where('id',$request->matrikid)->first();
            $dataMatrik -> flag_matrik = $flagmatrik;
            $dataMatrik -> update();
            //ubah status transaksi
            $datatrx = Transaksi::where('trx_id','=',$request->trxid)->first();
            $datatrx -> kabid_konfirmasi = $request->kabidsm_setuju;
            $datatrx -> kabid_ket = $request->ket_kabid;
            $datatrx -> flag_trx = $flagtrx;
            $datatrx -> update();

            //flag surat tugas
            $count = SuratTugas::where('trx_id',$request->trxid)->count();
            if ($count>0) {
                //sudah ada update aja
                $datasrt = SuratTugas::where('trx_id',$request->trxid)->first();
                $datasrt -> flag_surattugas = $flag_surattugas;
                $datasrt -> update();
            }

            //flag spd
            $count = Spd::where('trx_id',$request->trxid)->count();
            if ($count>0) {
                //sudah ada update aja
                $dataspd = Spd::where('trx_id',$request->trxid)->first();
                $dataspd -> flag_spd = $flag_spd;
                $dataspd -> update();
            }

            Session::flash('message', 'Data Perjalanan ke '.$request->tujuan.' tanggal '. $request->tglberangkat .' sudah di setujui Kabid SM');
            Session::flash('message_type', 'warning');
            return redirect()->route('setuju.index');
        }
        elseif ($request->aksi == "SetujuPPK") {
            if ($request->ppk_setuju==1) {
                $flagtrx = 2;
                $flagmatrik=3;
                $flag_surattugas = 0;
                $flag_spd = 0;
            }
            else {
                $flagtrx = 3;
                $flagmatrik=2;
                $flag_surattugas = 3;
                $flag_spd =3;
            }
            //ubah status matrik
            $dataMatrik = MatrikPerjalanan::where('id',$request->matrikid)->first();
            $dataMatrik -> flag_matrik = $flagmatrik;
            $dataMatrik -> update();
            //ubah status transaksi
            $datatrx = Transaksi::where('trx_id','=',$request->trxid)->first();
            $datatrx -> ppk_konfirmasi = $request->ppk_setuju;
            $datatrx -> ppk_ket = $request->ket_ppk;
            $datatrx -> flag_trx = $flagtrx;
            $datatrx -> update();

             //flag surat tugas
             $count = SuratTugas::where('trx_id',$request->trxid)->count();
             if ($count>0) {
                 //sudah ada update aja
                 $datasrt = SuratTugas::where('trx_id',$request->trxid)->first();
                 $datasrt -> flag_surattugas = $flag_surattugas;
                 $datasrt -> update();
             }

             //flag spd
             $count = Spd::where('trx_id',$request->trxid)->count();
             if ($count>0) {
                 //sudah ada update aja
                 $dataspd = Spd::where('trx_id',$request->trxid)->first();
                 $dataspd -> flag_spd = $flag_spd;
                 $dataspd -> update();
             }

            Session::flash('message', 'Data Perjalanan ke '.$request->tujuan.' tanggal '. $request->tglberangkat .' sudah di setujui PPK');
            Session::flash('message_type', 'info');
            return redirect()->route('setuju.index');
        }
        elseif ($request->aksi == "SetujuKPA") {
            if ($request->kpa_setuju==1) {
                $flagtrx = 4;
                $flagmatrik=4;
                $flag_surattugas=0;
                $flag_spd=0;
            }
            else {
                $flagtrx = 3;
                $flagmatrik=2;
                $flag_surattugas=3;
                $flag_spd=3;

            }
            //ubah status matrik
            $dataMatrik = MatrikPerjalanan::where('id',$request->matrikid)->first();
            $dataMatrik -> flag_matrik = $flagmatrik;
            $dataMatrik -> update();
            //ubah status transaksi
            $datatrx = Transaksi::where('trx_id','=',$request->trxid)->first();
            $datatrx -> kpa_konfirmasi = $request->kpa_setuju;
            $datatrx -> kpa_ket = $request->ket_kpa;
            $datatrx -> flag_trx = $flagtrx;
            $datatrx -> update();

            $count = SuratTugas::where('trx_id',$request->trxid)->count();
            if ($count>0) {
                //sudah ada update aja
                $datasrt = SuratTugas::where('trx_id',$request->trxid)->first();
                $datasrt -> flag_surattugas = $flag_surattugas;
                $datasrt -> flag_ttd = 0;
                $datasrt -> nomor_surat = NULL;
                $datasrt -> tgl_surat = NULL;
                $datasrt -> update();
            }
            else {
                //data belum ada isikan
                if ($request->kpa_setuju==1) {
                    $datasrt = new SuratTugas();
                    $datasrt -> trx_id = $request->trxid;
                    $datasrt -> flag_surattugas = $flag_surattugas;
                    $datasrt -> save();
                }
            }
            //isi SPD juga
            $count = Spd::where('trx_id',$request->trxid)->count();
            if ($count>0) {
                //sudah ada update aja
                $dataspd = Spd::where('trx_id',$request->trxid)->first();
                $dataspd -> flag_spd = $flag_spd;
                $dataspd -> flag_ttd = 0;
                $dataspd -> nomor_spd = NULL;
                $dataspd -> update();
            }
            else {
                if ($request->kpa_setuju==1) {
                    //data belum ada isikan
                    $dataspd = new Spd();
                    $dataspd -> trx_id = $request->trxid;
                    $dataspd -> flag_spd = $flag_spd;
                    $dataspd -> flag_ttd = 0;
                    $dataspd -> save();
                }
            }

            Session::flash('message', 'Data Perjalanan ke '.$request->tujuan.' tanggal '. $request->tglberangkat .' sudah di setujui KPA');
            Session::flash('message_type', 'info');
            return redirect()->route('setuju.index');
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
    public function daftar()
    {
        //
    }
}
