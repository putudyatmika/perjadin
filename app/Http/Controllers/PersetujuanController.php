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
use App\Mail\MailPersetujuan;
use Illuminate\Support\Facades\Mail;

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
                //kembalikan dana turunan anggaran karena di batalkan
                $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id','=',$request->dana_tid)->first();
                $dataTurunanAnggaran -> pagu_rencana = $dataTurunanAnggaran->pagu_rencana - $request->pagu_rencana;
                $dataTurunanAnggaran -> update();
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
            //kirim email ke ppk
            /*
            <h3>Sistem Perjalanan Dinas - BPS Provinsi NTB</h3>
                <p>Menunggu persetujuan <b>{{ $objEmail->setuju}}</b> pengajuan perjalanan dinas dari <br/>
                <strong>{{$objEmail->bidang}}</strong>
                </p>
                
                <div>
                <p>Detil perjalanan dinas :<br/>
                <b>Trx ID :</b>&nbsp;{{ $objEmail->trx_id}}<br/>
                <b>Nama :</b>&nbsp;{{ $objEmail->nama }}<br/>
                <b>NIP :</b>&nbsp;{{ $objEmail->nip }}<br/>
                <b>Tugas :</b>&nbsp;{{ $objEmail->tugas }}<br/>
                <b>Tgl berangkat :</b>&nbsp;{{ $objEmail->tgl_brkt }}<br/>
                <b>Tgl kembali :</b>&nbsp;{{ $objEmail->tgl_kembali }}<br/>
                <b>Tujuan :</b>&nbsp;{{ $objEmail->tujuan }}<br/>
                <b>Durasi :</b>&nbsp;{{ $objEmail->durasi }}<br/>
                <b>Subject Matter :</b>&nbsp;{{ $objEmail->sm }}<br/>
                <b>Unit Pelaksana :</b>&nbsp;{{ $objEmail->up }}<br/>
                </p>
                </div>
                <div>
                    <p>Sumber Dana :<br/>
                    <b>MAK :</b>&nbsp;{{ $objEmail->mak}}<br/>
                    <b>Komponen :</b>&nbsp;{{ $objEmail->komponen }}<br/>
                    <b>Detil :</b>&nbsp;{{ $objEmail->detil }}<br/>
                    <b>Total biaya :</b>&nbsp;{{ $objEmail->totalbiaya }}<br/>
                </p>
            */
            $objDemo = new \stdClass();
            $objDemo->setuju = 'PPK';
            $objDemo->bidang = ;
            $objDemo->trx_id = ;
            $objDemo->nama = ;
            $objDemo->nip = ;
            $objDemo->tugas = ;
            $objDemo->tgl_brkt = ;
            $objDemo->tgl_kembali = ;
            $objDemo->tujuan = ;
            $objDemo->durasi = ;
            $objDemo->sm = ;
            $objDemo->up = ;
            $objDemo->mak = ;
            $objDemo->komponen = ;
            $objDemo->detil = ;
            $objDemo->totalbiaya = ;

            $objDemo->Sender = 'Perjadin BPS Provinsi Nusa Tenggara Barat';
            $objDemo->Subject = '[NO REPLY - LAPORAN PENGADUAN]';

            Mail::to("pdyatmika@gmail.com")->send(new MailPersetujuan($objDemo));

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
                //kembalikan dana turunan anggaran karena di batalkan
                $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id','=',$request->dana_tid)->first();
                $dataTurunanAnggaran -> pagu_rencana = $dataTurunanAnggaran->pagu_rencana - $request->pagu_rencana;
                $dataTurunanAnggaran -> update();
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
                //kembalikan dana turunan anggaran karena di batalkan
                $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id','=',$request->dana_tid)->first();
                $dataTurunanAnggaran -> pagu_rencana = $dataTurunanAnggaran->pagu_rencana - $request->pagu_rencana;
                $dataTurunanAnggaran -> update();

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
                $datasrt -> tahun_srt = Session::get('tahun_anggaran');
                $datasrt -> update();
            }
            else {
                //data belum ada isikan
                if ($request->kpa_setuju==1) {
                    $datasrt = new SuratTugas();
                    $datasrt -> trx_id = $request->trxid;
                    $datasrt -> flag_surattugas = $flag_surattugas;
                    $datasrt -> tahun_srt = Session::get('tahun_anggaran');
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
                $dataspd -> tahun_spd = Session::get('tahun_anggaran');
                $dataspd -> update();
            }
            else {
                if ($request->kpa_setuju==1) {
                    //data belum ada isikan
                    $dataspd = new Spd();
                    $dataspd -> trx_id = $request->trxid;
                    $dataspd -> flag_spd = $flag_spd;
                    $dataspd -> flag_ttd = 0;
                    $dataspd -> tahun_spd = Session::get('tahun_anggaran');
                    $dataspd -> save();
                }
            }

            Session::flash('message', 'Data Perjalanan ke '.$request->tujuan.' tanggal '. $request->tglberangkat .' sudah di konfirmasi KPA');
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
