<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrikPerjalanan;
use App\Anggaran;
use App\TurunanAnggaran;
use App\Transaksi;
use App\Kuitansi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Unitkerja;
use App\Tujuan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function tujuan($tujuanID)
    {
        if ($tujuanID>0)
        {
            //semua pegawai di tujuan yang sama
            /*
            SELECT transaksi.tahun_trx, transaksi.peg_nip, matrik.unit_pelaksana, unitkerja.nama as unit_nama, transaksi.tugas, transaksi.tgl_brkt, transaksi.bnyk_hari, kuitansi.total_biaya as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id left join unitkerja on matrik.unit_pelaksana=unitkerja.kode where transaksi.flag_trx > 3 and transaksi.tahun_trx = '2019' and matrik.kodekab_tujuan='5201' order by transaksi.tgl_brkt asc
            */
            $dataTujuan = Tujuan::where('kode_kabkota','=',$tujuanID)->first();
            $rekapTujuan = DB::table('pegawai')->
                           leftJoin(DB::Raw("(SELECT transaksi.tahun_trx, transaksi.kode_trx, transaksi.peg_nip, matrik.unit_pelaksana, unitkerja.nama as unit_nama, transaksi.tugas, transaksi.tgl_brkt, transaksi.bnyk_hari, kuitansi.total_biaya as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id left join unitkerja on matrik.unit_pelaksana=unitkerja.kode where transaksi.flag_trx > 3 and transaksi.tahun_trx = '".Session::get('tahun_anggaran')."' and matrik.kodekab_tujuan='".$tujuanID."' order by transaksi.tgl_brkt asc) as trx"),'trx.peg_nip','=','pegawai.nip_baru')->
                           select(DB::Raw('tahun_trx,kode_trx,pegawai.nama, pegawai.nip_baru,unit_pelaksana, unit_nama,tugas,tgl_brkt,bnyk_hari,totalbiaya'))->where('tahun_trx','>','0')->orderBy('tgl_brkt','asc')->get();
            //dd($rekapTujuan);
            return view('laporan.rekap-detil-tujuan',compact('dataTujuan','rekapTujuan'));
        }
        else {
            /*
            SELECT transaksi.tahun_trx, matrik.kodekab_tujuan, COUNT(*) as jumlah, sum(kuitansi.total_biaya) as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id where transaksi.flag_trx > 3 and transaksi.tahun_trx = '2019' GROUP by matrik.kodekab_tujuan order by matrik.kodekab_tujuan asc
            */
            $rekapTujuan = DB::table('tujuan')->
                           leftJoin(DB::Raw("(SELECT transaksi.tahun_trx, matrik.kodekab_tujuan, COUNT(*) as jumlah, sum(kuitansi.total_biaya) as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id where transaksi.flag_trx > 3 and transaksi.tahun_trx = '".Session::get('tahun_anggaran')."' GROUP by matrik.kodekab_tujuan order by matrik.kodekab_tujuan asc) as trx"),'trx.kodekab_tujuan','=','tujuan.kode_kabkota')->
                           select(DB::Raw('nama_kabkota as nama, kode_kabkota,COALESCE(jumlah,0) as jumlah, COALESCE(totalbiaya,0) as total_biaya'))->where('tahun_trx','>','0')->orderBy('jumlah','desc')->get();
            //dd($rekapTujuan);
                           return view('laporan.rekap-tujuan',compact('rekapTujuan'));
        }
    }
    public function anggaran($aid)
    {
        if ($aid>0) {
                $dataAnggaran = Anggaran::where('id','=',$aid)->first();
                /*
                SELECT transaksi.tahun_trx, transaksi.peg_nip, matrik.unit_pelaksana, unitkerja.nama as unit_nama, matrik.kodekab_tujuan, tujuan.nama_kabkota, transaksi.tugas, transaksi.tgl_brkt, transaksi.bnyk_hari, kuitansi.total_biaya as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id left join unitkerja on matrik.unit_pelaksana=unitkerja.kode LEFT join tujuan on matrik.kodekab_tujuan=tujuan.kode_kabkota where transaksi.flag_trx > 3 and transaksi.tahun_trx = '2019' and matrik.mak_id='8' order by transaksi.tgl_brkt asc
                */
                $rekapAnggaran = DB::table('pegawai')->
                           leftJoin(DB::Raw("(SELECT transaksi.tahun_trx, transaksi.kode_trx, transaksi.peg_nip, matrik.unit_pelaksana, unitkerja.nama as unit_nama, matrik.kodekab_tujuan, tujuan.nama_kabkota, transaksi.tugas, transaksi.tgl_brkt, transaksi.bnyk_hari, kuitansi.total_biaya as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id left join unitkerja on matrik.unit_pelaksana=unitkerja.kode LEFT join tujuan on matrik.kodekab_tujuan=tujuan.kode_kabkota where transaksi.flag_trx > 3 and  transaksi.tahun_trx = '".Session::get('tahun_anggaran')."' and matrik.mak_id='".$aid."' order by transaksi.tgl_brkt asc) as trx"),'trx.peg_nip','=','pegawai.nip_baru')->
                           select(DB::Raw('tahun_trx,kode_trx,pegawai.nama, pegawai.nip_baru,unit_pelaksana, unit_nama,kodekab_tujuan, nama_kabkota,tugas,tgl_brkt,bnyk_hari,totalbiaya'))->where('tahun_trx','>','0')->orderBy('tgl_brkt','asc')->get();
                return view('laporan.rekap-detil-anggaran',compact('dataAnggaran','rekapAnggaran'));
        }
        else {
            //semua anggaran
            
            $dataAnggaran = Anggaran::with('Turunan','Matrik','Unitkerja')->where('tahun_anggaran','=',Session::get('tahun_anggaran'))->get();
            //dd($dataAnggaran);
            return view('laporan.rekap-anggaran',compact('dataAnggaran'));
        }
    }
    public function pegawai($idpeg)
    {
        /*
        select nip_baru, pegawai.nama as nama_pegawai, unitkerja.nama as nama_unitkerja, jumlah, totalbiaya from pegawai left join unitkerja on pegawai.unitkerja=unitkerja.kode LEFT join (SELECT peg_nip, COUNT(*) as jumlah, sum(kuitansi.total_biaya) as totalbiaya FROM transaksi LEFT join kuitansi on transaksi.trx_id=kuitansi.trx_id where flag_trx>3 GROUP by peg_nip order by jumlah desc) as trx on pegawai.nip_baru=trx.peg_nip order by jumlah desc
        */
        if ($idpeg>0) {
            $count = \App\Pegawai::where('id','=',$idpeg)->count();
            if ($count>0) {
                $DataPegawai = \App\Pegawai::where('id','=',$idpeg)->first();
                $RekapPegawai = Transaksi::where([['peg_nip','=',$DataPegawai->nip_baru],['flag_trx','=',7]])->orderBy('tgl_brkt','asc')->get();
                //dd($RekapPegawai);
                return view('laporan.rekap-detil-pegawai',compact('DataPegawai','RekapPegawai'));
            }
            else {
                //Session::flash('message', 'ID Pegawai tidak tersedia');
                //Session::flash('message_type', 'error');
                //return redirect('laporan/pegawai/');
                return view('laporan.error');
            }
        }
        else {
            $RekapPegawai = DB::table('pegawai')->
            leftJoin('unitkerja','pegawai.unitkerja','=','unitkerja.kode')->
            leftJoin(DB::Raw("(SELECT peg_nip, COUNT(*) as jumlah, sum(kuitansi.total_biaya) as totalbiaya FROM transaksi LEFT join kuitansi on transaksi.trx_id=kuitansi.trx_id where flag_trx>3 GROUP by peg_nip order by jumlah desc) as trx"),'trx.peg_nip','=','pegawai.nip_baru')->
            select(DB::Raw('pegawai.id as peg_id,nip_baru, pegawai.nama as nama_pegawai, unitkerja.nama as nama_unitkerja, COALESCE(jumlah,0) as jumlah,COALESCE(totalbiaya,0) as totalbiaya'))->
            where('jabatan','<','5')->where('flag','=','1')->orderBy('jumlah','desc')->get();

            return view('laporan.rekap-pegawai',compact('RekapPegawai'));
        }
        
        
        //dd($idpeg);

    }
    public function bidang($bidangId)
    {
        if ($bidangId>0) {
            //1 bidang saja
            /*
            SELECT transaksi.tahun_trx, transaksi.peg_nip, matrik.kodekab_tujuan, tujuan.nama_kabkota, transaksi.tugas, transaksi.tgl_brkt, transaksi.bnyk_hari, kuitansi.total_biaya as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id left join tujuan on matrik.kodekab_tujuan=tujuan.kode_kabkota where transaksi.flag_trx > 3 and transaksi.tahun_trx = '2019' and matrik.unit_pelaksana='52550' order by transaksi.tgl_brkt asc
            */
            $rekapBidang = DB::table('pegawai')->
                           leftJoin(DB::Raw("(SELECT transaksi.tahun_trx, transaksi.kode_trx, transaksi.peg_nip, matrik.kodekab_tujuan, tujuan.nama_kabkota, transaksi.tugas, transaksi.tgl_brkt, transaksi.bnyk_hari, kuitansi.total_biaya as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id left join tujuan on matrik.kodekab_tujuan=tujuan.kode_kabkota where transaksi.flag_trx > 3 and transaksi.tahun_trx = '".Session::get('tahun_anggaran')."' and matrik.unit_pelaksana='".$bidangId."' order by transaksi.tgl_brkt asc) as trx"),'trx.peg_nip','=','pegawai.nip_baru')->
                           select(DB::Raw('tahun_trx,kode_trx,pegawai.nama, pegawai.nip_baru,kodekab_tujuan,nama_kabkota,tugas,tgl_brkt,bnyk_hari,totalbiaya'))->where('tahun_trx','>','0')->orderBy('tgl_brkt','asc')->get();
            $dataBidang = Unitkerja::where('kode','=',$bidangId)->first();
            //dd($rekapBidang);
            return view('laporan.rekap-detil-bidang',compact('dataBidang','rekapBidang'));
        }
        else {
            //semua bidang ditampilkan
            //$rekapBidang = Transaksi::with('Matrik','Kuitansi')->where([['tahun_trx','=',Session::get('tahun_anggaran')],['flag_trx','=',7]])->all(); 
            /*
            select nama, COALESCE(jumlah,0) as jumlah, COALESCE(totalbiaya,0) as totalbiaya from unitkerja left join (SELECT transaksi.tahun_trx, matrik.unit_pelaksana, COUNT(*) as jumlah, sum(kuitansi.total_biaya) as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id where transaksi.flag_trx > 3 and transaksi.tahun_trx = '2019' GROUP by matrik.unit_pelaksana order by matrik.unit_pelaksana asc) as trx on trx.unit_pelaksana=unitkerja.kode where unitkerja.eselon < 4
            */
            $rekapBidang = DB::table('unitkerja')->
            leftJoin(DB::Raw("(SELECT transaksi.tahun_trx, matrik.unit_pelaksana, COUNT(*) as jumlah, sum(kuitansi.total_biaya) as totalbiaya FROM matrik left join transaksi on transaksi.matrik_id=matrik.id left join kuitansi on kuitansi.trx_id=transaksi.trx_id where transaksi.flag_trx > 3 and transaksi.tahun_trx = '".Session::get('tahun_anggaran')."' GROUP by matrik.unit_pelaksana order by matrik.unit_pelaksana asc) as trx"),'trx.unit_pelaksana','=','unitkerja.kode')->
            select(\DB::Raw('kode,nama, COALESCE(jumlah,0) as jumlah, COALESCE(totalbiaya,0) as total_biaya'))->
            where('unitkerja.eselon','<','4')->
            get();
            //dd($rekapBidang);
            return view('laporan.rekap-bidang',compact('rekapBidang'));
        }
    }
}
