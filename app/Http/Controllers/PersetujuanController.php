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
use App\Helpers\Tanggal;
use App\Mail\MailPerjalanan;
use App\User;

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
        //dd($request->all());
        if ($request->aksi == "SetujuKabid") {
            if ($request->kabidsm_setuju==1) {
                $flagtrx = 2;
                $flagmatrik=3;
                $flag_surattugas = 0;
                $flag_spd = 0;
                $kirim_mail = 1;
            }
            else {
                $flagtrx = 3;
                $flagmatrik=2;
                $flag_surattugas = 3;
                $flag_spd =3;
                $kirim_mail = 0;
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
            if ($kirim_mail == 1) 
            {
                //disetujui Kabid SM dan kirim mail ke PPK
                $objEmail = new \stdClass();
                $objEmail->setuju = 'PPK';
                $objEmail->bidang = $dataMatrik->UnitPelaksana->nama;
                $objEmail->trx_id = $datatrx->kode_trx;
                $objEmail->nama = $datatrx->peg_nama;
                $objEmail->nip = $datatrx->peg_nip;
                $objEmail->tugas = $datatrx->tugas;
                $objEmail->tgl_brkt = Tanggal::Panjang($datatrx->tgl_brkt);
                $objEmail->tgl_kembali = Tanggal::Panjang($datatrx->tgl_balik);
                $objEmail->tujuan = $dataMatrik->Tujuan->nama_kabkota;
                $objEmail->durasi = $datatrx->bnyk_hari.' hari';
                $objEmail->sm = $dataMatrik->DanaUnitkerja->nama;
                $objEmail->up = $dataMatrik->UnitPelaksana->nama;
                $objEmail->mak = $dataMatrik->DanaAnggaran->mak;
                $objEmail->komponen = '['.$dataMatrik->DanaAnggaran->komponen_kode.'] '.$dataMatrik->DanaAnggaran->komponen_nama;
                $objEmail->detil = $dataMatrik->DanaAnggaran->uraian;
                $objEmail->totalbiaya = 'Rp. '.number_format($dataMatrik->total_biaya,0,',','.');

                $dataPPK = Pegawai::where('flag_pengelola','=','2')->where('flag','=','1')->first();

                Mail::to($dataPPK->email)->send(new MailPersetujuan($objEmail));
            }
            else 
            {
                //kirim mail ke pegawai yang bersangkutan bahwa di tolak
                //nanti dibuatkan
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
                $kirim_mail = 1;
            }
            else {
                $flagtrx = 3;
                $flagmatrik=2;
                $flag_surattugas = 3;
                $flag_spd =3;
                $kirim_mail = 0;
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
             //persetujuan kpa
             if ($kirim_mail == 1)
             {
                $objEmail = new \stdClass();
                $objEmail->setuju = 'KPA';
                $objEmail->bidang = $dataMatrik->UnitPelaksana->nama;
                $objEmail->trx_id = $datatrx->kode_trx;
                $objEmail->nama = $datatrx->peg_nama;
                $objEmail->nip = $datatrx->peg_nip;
                $objEmail->tugas = $datatrx->tugas;
                $objEmail->tgl_brkt = Tanggal::Panjang($datatrx->tgl_brkt);
                $objEmail->tgl_kembali = Tanggal::Panjang($datatrx->tgl_balik);
                $objEmail->tujuan = $dataMatrik->Tujuan->nama_kabkota;
                $objEmail->durasi = $datatrx->bnyk_hari.' hari';
                $objEmail->sm = $dataMatrik->DanaUnitkerja->nama;
                $objEmail->up = $dataMatrik->UnitPelaksana->nama;
                $objEmail->mak = $dataMatrik->DanaAnggaran->mak;
                $objEmail->komponen = '['.$dataMatrik->DanaAnggaran->komponen_kode.'] '.$dataMatrik->DanaAnggaran->komponen_nama;
                $objEmail->detil = $dataMatrik->DanaAnggaran->uraian;
                $objEmail->totalbiaya = 'Rp. '.number_format($dataMatrik->total_biaya,0,',','.');

                $dataKPA = Pegawai::where('flag_pengelola','=','1')->where('flag','=','1')->first();
                Mail::to($dataKPA->email)->send(new MailPersetujuan($objEmail));
             }
             else 
             {
                //kirim mail ke pegawai yang bersangkutan bahwa perjadinnya di tolak
                //dibuatkan
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
                $kirim_mail = 1;
            }
            else {
                $flagtrx = 3;
                $flagmatrik=2;
                $flag_surattugas=3;
                $flag_spd=3;
                $kirim_mail = 0;
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

            if ($kirim_mail == 1)
            {
                //kirim email ke pegawai yg mau berangkat dan aris
                $objEmail = new \stdClass();
                $objEmail->setuju = 'KPA';
                $objEmail->bidang = $dataMatrik->UnitPelaksana->nama;
                $objEmail->trx_id = $datatrx->kode_trx;
                $objEmail->nama = $datatrx->peg_nama;
                $objEmail->nip = $datatrx->peg_nip;
                $objEmail->tugas = $datatrx->tugas;
                $objEmail->tgl_brkt = Tanggal::Panjang($datatrx->tgl_brkt);
                $objEmail->tgl_kembali = Tanggal::Panjang($datatrx->tgl_balik);
                $objEmail->tujuan = $dataMatrik->Tujuan->nama_kabkota;
                $objEmail->durasi = $datatrx->bnyk_hari.' hari';
                $objEmail->sm = $dataMatrik->DanaUnitkerja->nama;
                $objEmail->up = $dataMatrik->UnitPelaksana->nama;
                $objEmail->mak = $dataMatrik->DanaAnggaran->mak;
                $objEmail->komponen = '['.$dataMatrik->DanaAnggaran->komponen_kode.'] '.$dataMatrik->DanaAnggaran->komponen_nama;
                $objEmail->detil = $dataMatrik->DanaAnggaran->uraian;
                $objEmail->totalbiaya = 'Rp. '.number_format($dataMatrik->total_biaya,0,',','.');

                $dataPegawai = Pegawai::where('nip_baru','=',$datatrx->peg_nip)->where('flag','=','1')->first();

                Mail::to($dataPegawai->email)->send(new MailPerjalanan($objEmail));
                //kirim mail ke subbag keuangan
                $Keuangan = User::where('pengelola','=','4')->get();
                foreach ($Keuangan as $k)
                {
                    Mail::to($k->email)->send(new MailPerjalanan($objEmail));
                }
            }
            else 
            {
                //kirim email berisi penolakan
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
