<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\MatrikPerjalanan;
use Illuminate\Http\Request;
use App\Pegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\SuratTugas;
use App\Spd;
use App\Unitkerja;
use App\Mail\MailPersetujuan;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Tanggal;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (request('flag_trx') == NULL)
        {
            $flag_trx = '';
        }
        else {
            $flag_trx = request('flag_trx');
        }
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

        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $DataPegawai = Pegawai::where('flag', '=', '1')->where('jabatan', '<', '5')->get();
        //dd($DataPegawai);
        $DataBidang = Unitkerja::where('eselon', '<', '4')->orderBy('kode', 'asc')->get();
        if ($flag_trx=='')
        {
            $dataTransaksi = Transaksi::with('Matrik')->where('tahun_trx', '=', Session::get('tahun_anggaran'))
            ->when($flag_unitkerja,function($query) use ($flag_unitkerja){
                return $query->whereHas('matrik',function($q) use ($flag_unitkerja) {
                    return $q->where('unit_pelaksana',$flag_unitkerja);
                });
            })->orderBy('flag_trx', 'ASC')->orderBy('tgl_brkt', 'desc')->get();
        }
        else
        {
            $dataTransaksi = Transaksi::with('Matrik')->where('tahun_trx', '=', Session::get('tahun_anggaran'))
            ->when($flag_unitkerja,function($query) use ($flag_unitkerja){
                return $query->whereHas('matrik',function($q) use ($flag_unitkerja) {
                    return $q->where('unit_pelaksana',$flag_unitkerja);
                });
            })
            ->where('flag_trx',request('flag_trx'))->orderBy('flag_trx', 'ASC')->orderBy('tgl_brkt', 'desc')->get();
        }
        $TipePerjadin = config('globalvar.TipePerjadin');
        return view('transaksi.matrik', compact('dataTransaksi', 'FlagTrx', 'FlagKonfirmasi', 'DataPegawai', 'MatrikFlag', 'DataBidang','flag_unitkerja','TipePerjadin'));
        //dd($dataTransaksi);
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
    public function AjukanTransaksi(Request $request)
    {
        //dd($request->all());
        $cek_jalan_pegawai = Transaksi::where([['peg_nip','=',$request->peg_nip],['tgl_brkt','=',$request->tglberangkat],['flag_trx','<>','3']])->orWhere([['peg_nip','=',$request->peg_nip],['tgl_balik','=',$request->tglberangkat],['flag_trx','<>','3']])->count();
            //dd($cek_jalan_pegawai);
            if ($cek_jalan_pegawai > 0)
            {
                //ada pegawai dan tanggal brkt dihari yang sama
                //$dt_pegawai = Pegawai::where('nip_baru','=',$request->peg_nip)->first();
                $data = Transaksi::where([['peg_nip','=',$request->peg_nip],['tgl_brkt','=',$request->tglberangkat],['flag_trx','<>','3']])->orWhere([['peg_nip','=',$request->peg_nip],['tgl_balik','=',$request->tglberangkat],['flag_trx','<>','3']])->first();
                if ($request->trxid != $data->trx_id)
                {
                    Session::flash('message', '<strong>(ERROR)</strong> Sudah ada Data Perjalanan tanggal <i>' . Carbon::parse($request->tglberangkat)->format('j F Y') . '</i> an. <strong>'.$data->peg_nama.'</strong> ke '.$data->Matrik->Tujuan->nama_kabkota.' Tugas '.$data->tugas.', Pilih tanggal yang lain. Data perjalanan belum diajukan');
                    Session::flash('message_type', 'danger');
                    return redirect()->route('transaksi.index');
                }

            }
            //ini akan diproses kalo tidak ada perjalanan yang lain
                ///nip pegawai di tglbrkt dgn data yg ada di transaksi belum ada
                //input transaksi
            $dt_pegawai = Pegawai::where('nip_baru','=',$request->peg_nip)->first();

            $bnyk_hari = $request->lamanya - 1;
            $datatrx = Transaksi::where('trx_id', '=', $request->trxid)->first();
            $datatrx->bnyk_hari = $request->lamanya;
            $datatrx->tugas = $request->tugas;
            $datatrx->tgl_brkt = Carbon::parse($request->tglberangkat)->format('Y-m-d');
            $datatrx->tgl_balik = Carbon::parse($request->tglberangkat)->addDays($bnyk_hari)->format('Y-m-d');
            $datatrx->peg_nip = $request->peg_nip;
            $datatrx->peg_nama = $dt_pegawai->nama;
            $datatrx->peg_gol = $dt_pegawai->gol;
            $datatrx->peg_unitkerja = $dt_pegawai->unitkerja;
            $datatrx->peg_jabatan = $dt_pegawai->jabatan;
            $datatrx->peg_unitkerja_nama = $dt_pegawai->Unitkerja->nama;
            $datatrx->flag_trx = $request->diajukan;
            $datatrx->kabid_konfirmasi = 0;
            $datatrx->kabid_ket = NULL;
            $datatrx->ppk_konfirmasi = 0;
            $datatrx->ppk_ket = NULL;
            $datatrx->kpa_konfirmasi = 0;
            $datatrx->kpa_ket = NULL;
            $datatrx->form_nomor_surat = $request->form_nomor_surat;
            $datatrx->form_tgl_surat = $request->form_tgl_surat;
            $datatrx->update();
            //cek tabel surat tugas dan spd

            $count = SuratTugas::where('trx_id', $request->trxid)->count();
            if ($count > 0) {
                //sudah ada update aja
                $datasrt = SuratTugas::where('trx_id', $request->trxid)->first();
                $datasrt->flag_surattugas = 0;
                $datasrt->flag_ttd = 0;
                $datasrt->nomor_surat = NULL;
                $datasrt->tgl_surat = NULL;
                $datasrt->update();
            }

            //isi SPD juga
            $count = Spd::where('trx_id', $request->trxid)->count();
            if ($count > 0) {
                //sudah ada update aja
                $dataspd = Spd::where('trx_id', $request->trxid)->first();
                $dataspd->flag_spd = 0;
                $dataspd->flag_ttd = 0;
                $dataspd->nomor_spd = NULL;
                $dataspd->update();
            }


            if ($request->diajukan == 1) {
                $dataMatrik = MatrikPerjalanan::where('id', $request->matrikid)->first();
                $dataMatrik->flag_matrik = '3';
                $dataMatrik->update();
                //kirim mail pemberitahuan ke kabid sm

                $objEmail = new \stdClass();
                $objEmail->setuju = 'KABID/KABAG';
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

                $dataKabid = Pegawai::where('unitkerja','=',$dataMatrik->dana_unitkerja)->where('jabatan','<','3')->where('flag','=','1')->first();
                if ($request->kirim_notifikasi == 1)
                {
                    Mail::to($dataKabid->email)->send(new MailPersetujuan($objEmail));
                }
                Session::flash('message', '['.$datatrx->kode_trx.'] Data Perjalanan ke <strong>'. $dataMatrik->Tujuan->nama_kabkota .'</strong> an. <strong>'.$datatrx->peg_nama.'</strong> tanggal berangkat <strong><i>'. Tanggal::Panjang($datatrx->tgl_brkt) .'</i></strong> sudah di ajukan');
                Session::flash('message_type', 'success');
                return redirect()->route('transaksi.index');
            }
            Session::flash('message', '['.$datatrx->kode_trx.'] Data Perjalanan ke <strong>'. $datatrx->Matrik->Tujuan->nama_kabkota .'</strong> an. <strong>'.$datatrx->peg_nama.'</strong> tanggal berangkat <strong><i>'. Tanggal::Panjang($datatrx->tgl_brkt) .'</i></strong> sudah di update');
            Session::flash('message_type', 'warning');
            return redirect()->route('transaksi.index');
    }
    public function EditAjukanAdmin(Request $request)
    {
        //dd($request->all());
        $dt_pegawai = Pegawai::where('nip_baru','=',$request->peg_nip)->first();
        //menu ini hanya superadmin
        $bnyk_hari = $request->lamanya - 1;
        $datatrx = Transaksi::where('trx_id', '=', $request->trxid)->first();
        $datatrx->bnyk_hari = $request->lamanya;
        $datatrx->tugas = $request->tugas;
        $datatrx->tgl_brkt = Carbon::parse($request->edittglberangkat)->format('Y-m-d');
        $datatrx->tgl_balik = Carbon::parse($request->edittglberangkat)->addDays($bnyk_hari)->format('Y-m-d');
        $datatrx->peg_nip = $request->peg_nip;
        $datatrx->peg_nama = $dt_pegawai->nama;
        $datatrx->peg_gol = $dt_pegawai->gol;
        $datatrx->peg_unitkerja = $dt_pegawai->unitkerja;
        $datatrx->peg_jabatan = $dt_pegawai->jabatan;
        $datatrx->peg_unitkerja_nama = $dt_pegawai->Unitkerja->nama;
        $datatrx->flag_trx = $request->flag_transaksi;
        $datatrx->kabid_konfirmasi = $request->kabid_setuju;
        $datatrx->ppk_konfirmasi = $request->ppk_setuju;
        $datatrx->kpa_konfirmasi = $request->kpa_setuju;
        $datatrx->form_nomor_surat = $request->form_nomor_surat;
        $datatrx->form_tgl_surat = $request->form_tgl_surat;
        $datatrx->update();

        Session::flash('message', '['.$datatrx->kode_trx.'] Data Perjalanan ke <strong>'. $datatrx->Matrik->Tujuan->nama_kabkota .'</strong> an. <strong>'.$datatrx->peg_nama.'</strong> tanggal berangkat <strong><i>'. Tanggal::Panjang($datatrx->tgl_brkt) .'</i></strong> sudah di update');
        Session::flash('message_type', 'info');
        return redirect()->route('transaksi.index');
    }
    public function SinkronSuratPermintaan()
    {
        $tahun_anggaran = Session::get('tahun_anggaran');
        //$data = Transaksi::where([['tahun_trx',$tahun_anggaran],['flag_trx','>','3']])->orderBy('created_at','asc')->orderBy('peg_unitkerja','asc')->take(10)->get();
        $data = DB::table('transaksi')
        ->leftJoin('matrik','matrik.id','=','transaksi.matrik_id')
        ->leftJoin('unitkerja', 'matrik.unit_pelaksana', '=', 'unitkerja.kode')
        ->leftJoin(DB::raw("(select nip_baru,nama,unitkerja,jabatan from pegawai where flag=1 and jabatan < 3) as pejabat"),'pejabat.unitkerja','=','unitkerja.kode')
        ->select(DB::Raw('transaksi.trx_id, unitkerja.kode as unit_kode, unitkerja.nama as unit_nama, pejabat.nip_baru as pejabat_nip,pejabat.nama as pejabat_nama, date(transaksi.created_at) as tanggal_surat'))
        ->where([['transaksi.tahun_trx', $tahun_anggaran],['flag_trx','>','3']])
        ->orderBy('unit_kode', 'desc')
        ->get();
        $data_kepala = Pegawai::where([['flag','1'],['jabatan','1']])->first();

        //dd($data);
        foreach ($data as $item) {
            $tanggal = explode('-',$item->tanggal_surat);
            $data_sinkron = Transaksi::where('trx_id',$item->trx_id)->first();
            if (!$data_sinkron->form_nomor_surat) 
            {
                $data_sinkron->form_nomor_surat = 'B-'.$item->trx_id.'/BPS/'.$item->unit_kode.'/'.$tanggal[1].'/'.$tanggal[0];
            }
            if (!$data_sinkron->form_tgl_surat)
            {
                $data_sinkron->form_tgl_surat = $item->tanggal_surat;
            }
            
            if (!$data_sinkron->form_ttd_nip)
            {
                $data_sinkron->form_ttd_nip = $item->pejabat_nip;
                $data_sinkron->form_ttd_nama = $item->pejabat_nama;
            }
            if (!$data_sinkron->form_ttd_kepala_nip)
            {
                $data_sinkron->form_ttd_kepala_nip = $data_kepala->nip_baru;
                $data_sinkron->form_ttd_kepala_nama = $data_kepala->nama;
            }
            $data_sinkron->form_unitkerja_kode = $item->unit_kode;
            $data_sinkron->form_unitkerja_nama = $item->unit_nama;
            $data_sinkron->update();
        }
        Session::flash('message', 'Data Transaksi tahun anggaran '.$tahun_anggaran.' sudah disinkronisasi');
        Session::flash('message_type', 'info');
        return redirect()->route('transaksi.index');
    }
    public function update(Request $request)
    {
        //
        /*
        $datapeg = Pegawai::find($request->peg_id);
        $datapeg -> nip_baru = $request['nipbaru'];
        //$datapeg -> nip_lama = $request['niplama'];
        $datapeg -> nama = $request['nama'];
        $datapeg -> tgl_lahir = Carbon::parse($request['tgllahir'])->format('Y-m-d');
        $datapeg -> jk = $request['jk'];
        $datapeg -> gol = $request['gol'];
        $datapeg -> unitkerja = $request['unitkerja'];
        $datapeg -> jabatan = $request['jabatan'];
        $datapeg -> update();

        */
        dd($request->all());
        if ($request->aksi == "alokasipegawai") {
            //search pegawai
            //cek dulu nip pegawai ini tanggal sama ada perjalanan tidak
            $cek_jalan_pegawai = Transaksi::where([['peg_nip','=',$request->peg_nip],['tgl_brkt','=',$request->tglberangkat],['flag_trx','<>','3']])->orWhere([['peg_nip','=',$request->peg_nip],['tgl_balik','=',$request->tglberangkat],['flag_trx','<>','3']])->count();
            //dd($cek_jalan_pegawai);
            if ($cek_jalan_pegawai > 0)
            {
                //ada pegawai dan tanggal brkt dihari yang sama
                //$dt_pegawai = Pegawai::where('nip_baru','=',$request->peg_nip)->first();
                $data = Transaksi::where([['peg_nip','=',$request->peg_nip],['tgl_brkt','=',$request->tglberangkat],['flag_trx','<>','3']])->orWhere([['peg_nip','=',$request->peg_nip],['tgl_balik','=',$request->tglberangkat],['flag_trx','<>','3']])->first();
                if ($request->trxid != $data->trx_id)
                {
                    Session::flash('message', '<strong>(ERROR)</strong> Sudah ada Data Perjalanan tanggal <i>' . Carbon::parse($request->tglberangkat)->format('j F Y') . '</i> an. <strong>'.$data->peg_nama.'</strong> ke '.$data->Matrik->Tujuan->nama_kabkota.' Tugas '.$data->tugas.', Pilih tanggal yang lain. Data perjalanan belum diajukan');
                    Session::flash('message_type', 'danger');
                    return redirect()->route('transaksi.index');
                }

            }
            //ini akan diproses kalo tidak ada perjalanan yang lain
                ///nip pegawai di tglbrkt dgn data yg ada di transaksi belum ada
                //input transaksi
            $dt_pegawai = Pegawai::where('nip_baru','=',$request->peg_nip)->first();

            $bnyk_hari = $request->lamanya - 1;
            $datatrx = Transaksi::where('trx_id', '=', $request->trxid)->first();
            $datatrx->bnyk_hari = $request->lamanya;
            $datatrx->tugas = $request->tugas;
            $datatrx->tgl_brkt = Carbon::parse($request->tglberangkat)->format('Y-m-d');
            $datatrx->tgl_balik = Carbon::parse($request->tglberangkat)->addDays($bnyk_hari)->format('Y-m-d');
            $datatrx->peg_nip = $request->peg_nip;
            $datatrx->peg_nama = $dt_pegawai->nama;
            $datatrx->peg_gol = $dt_pegawai->gol;
            $datatrx->peg_unitkerja = $dt_pegawai->unitkerja;
            $datatrx->peg_jabatan = $dt_pegawai->jabatan;
            $datatrx->peg_unitkerja_nama = $dt_pegawai->Unitkerja->nama;
            $datatrx->flag_trx = $request->diajukan;
            $datatrx->kabid_konfirmasi = 0;
            $datatrx->kabid_ket = NULL;
            $datatrx->ppk_konfirmasi = 0;
            $datatrx->ppk_ket = NULL;
            $datatrx->kpa_konfirmasi = 0;
            $datatrx->kpa_ket = NULL;
            $datatrx->update();
            //cek tabel surat tugas dan spd

            $count = SuratTugas::where('trx_id', $request->trxid)->count();
            if ($count > 0) {
                //sudah ada update aja
                $datasrt = SuratTugas::where('trx_id', $request->trxid)->first();
                $datasrt->flag_surattugas = 0;
                $datasrt->flag_ttd = 0;
                $datasrt->nomor_surat = NULL;
                $datasrt->tgl_surat = NULL;
                $datasrt->update();
            }

            //isi SPD juga
            $count = Spd::where('trx_id', $request->trxid)->count();
            if ($count > 0) {
                //sudah ada update aja
                $dataspd = Spd::where('trx_id', $request->trxid)->first();
                $dataspd->flag_spd = 0;
                $dataspd->flag_ttd = 0;
                $dataspd->nomor_spd = NULL;
                $dataspd->update();
            }


            if ($request->diajukan == 1) {
                $dataMatrik = MatrikPerjalanan::where('id', $request->matrikid)->first();
                $dataMatrik->flag_matrik = '3';
                $dataMatrik->update();
                //kirim mail pemberitahuan ke kabid sm

                $objEmail = new \stdClass();
                $objEmail->setuju = 'KABID/KABAG';
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

                $dataKabid = Pegawai::where('unitkerja','=',$dataMatrik->dana_unitkerja)->where('jabatan','<','3')->where('flag','=','1')->first();
                if ($request->kirim_notifikasi == 1)
                {
                    Mail::to($dataKabid->email)->send(new MailPersetujuan($objEmail));
                }
                Session::flash('message', '['.$datatrx->kode_trx.'] Data Perjalanan ke <strong>'. $dataMatrik->Tujuan->nama_kabkota .'</strong> an. <strong>'.$datatrx->peg_nama.'</strong> tanggal berangkat <strong><i>'. Tanggal::Panjang($datatrx->tgl_brkt) .'</i></strong> sudah di ajukan');
                Session::flash('message_type', 'success');
                return redirect()->route('transaksi.index');
            }
            Session::flash('message', '['.$datatrx->kode_trx.'] Data Perjalanan ke <strong>'. $datatrx->Matrik->Tujuan->nama_kabkota .'</strong> an. <strong>'.$datatrx->peg_nama.'</strong> tanggal berangkat <strong><i>'. Tanggal::Panjang($datatrx->tgl_brkt) .'</i></strong> sudah di update');
            Session::flash('message_type', 'warning');
            return redirect()->route('transaksi.index');
        }
        elseif ($request->aksi == "editalokasi") {
            //search pegawai
            //dd($request->all());
            $dt_pegawai = Pegawai::where('nip_baru','=',$request->peg_nip)->first();
            //menu ini hanya superadmin
            $bnyk_hari = $request->lamanya - 1;
            $datatrx = Transaksi::where('trx_id', '=', $request->trxid)->first();
            $datatrx->bnyk_hari = $request->lamanya;
            $datatrx->tugas = $request->tugas;
            $datatrx->tgl_brkt = Carbon::parse($request->edittglberangkat)->format('Y-m-d');
            $datatrx->tgl_balik = Carbon::parse($request->edittglberangkat)->addDays($bnyk_hari)->format('Y-m-d');
            $datatrx->peg_nip = $request->peg_nip;
            $datatrx->peg_nama = $dt_pegawai->nama;
            $datatrx->peg_gol = $dt_pegawai->gol;
            $datatrx->peg_unitkerja = $dt_pegawai->unitkerja;
            $datatrx->peg_jabatan = $dt_pegawai->jabatan;
            $datatrx->peg_unitkerja_nama = $dt_pegawai->Unitkerja->nama;
            $datatrx->flag_trx = $request->flag_transaksi;
            $datatrx->kabid_konfirmasi = $request->kabid_setuju;
            $datatrx->ppk_konfirmasi = $request->ppk_setuju;
            $datatrx->kpa_konfirmasi = $request->kpa_setuju;
            $datatrx->update();

            Session::flash('message', '['.$datatrx->kode_trx.'] Data Perjalanan ke <strong>'. $datatrx->Matrik->Tujuan->nama_kabkota .'</strong> an. <strong>'.$datatrx->peg_nama.'</strong> tanggal berangkat <strong><i>'. Tanggal::Panjang($datatrx->tgl_brkt) .'</i></strong> sudah di update');
            Session::flash('message_type', 'info');
            return redirect()->route('transaksi.index');
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
    public function destroy($id)
    {
        //
    }
    public function view()
    {
        return view('transaksi.viewpage');
    }
    public function syncPegawai($tahun)
    {
        $data = Transaksi::where('tahun_trx', '=', $tahun)->get();
        $jml_record = 0 ;
        $arr = array('status'=>false,'data'=>'Tidak tersedia');
        foreach ($data as $i)
        {
            $dataPeg = Pegawai::where('nip_baru','=',$i->peg_nip)->first();
            $dataUpdate = Transaksi::where('peg_nip', '=', $i->peg_nip)->first();
            $dataUpdate->peg_nama = $dataPeg->nama;
            $dataUpdate->peg_gol = $dataPeg->gol;
            $dataUpdate->peg_jabatan = $dataPeg->jabatan;
            $dataUpdate->peg_unitkerja = $dataPeg->unitkerja;
            $dataUpdate->peg_unitkerja_nama = $dataPeg->Golongan->nama;
            $dataUpdate->update();
            $jml_record++;
        }
        return Response()->json_encode($jml_record);
    }
    public function Kalendar()
    {
        /*
        title: 'M Ikhsany Rusyda ke Sumbawa',
                        start: '2020-09-09',
                        end: '2020-09-11',
                        className: 'bg-danger'
        */
        if (request('flag_kalendar') == 1)
        {
            //diajukan
            $dataTransaksi = Transaksi::with('Matrik')->where('tahun_trx', '=', Session::get('tahun_anggaran'))->whereIn('flag_trx',[1,2])
            ->when(request('unitkerja'),function($query){
                return $query->whereHas('matrik',function($q){
                    return $q->where('unit_pelaksana',request('unitkerja'));
                });
            })->orderBy('flag_trx', 'ASC')->orderBy('tgl_brkt', 'desc')->get();
        }
        else {
            //disetujui
            $dataTransaksi = Transaksi::with('Matrik')->where('tahun_trx', '=', Session::get('tahun_anggaran'))->where('flag_trx','>','3')
            ->when(request('unitkerja'),function($query){
                return $query->whereHas('matrik',function($q){
                    return $q->where('unit_pelaksana',request('unitkerja'));
                });
            })->orderBy('flag_trx', 'ASC')->orderBy('tgl_brkt', 'desc')->get();
        }
        

        $dataPerjalan=array();
        $className='';
        foreach ($dataTransaksi as $item)
        {
            if ($item->tgl_brkt != $item->tgl_balik)
            {
                $tgl_balik = Carbon::parse($item->tgl_balik)->addDays(1)->format('Y-m-d');
            }
            else
            {
                $tgl_balik = $item->tgl_balik;
            }

            if ($item->Matrik->kodekab_tujuan == '5201' or $item->Matrik->kodekab_tujuan == '5204')
            {
                $className = 'bg-success';
            }
            elseif ($item->Matrik->kodekab_tujuan == '5202' or $item->Matrik->kodekab_tujuan == '5205')
            {
                $className = 'bg-danger';
            }
            elseif ($item->Matrik->kodekab_tujuan == '5203' or $item->Matrik->kodekab_tujuan == '5206')
            {
                $className = 'bg-warning';
            }
            elseif ($item->Matrik->kodekab_tujuan == '5271' or $item->Matrik->kodekab_tujuan == '5272')
            {
                $className = 'bg-primary';
            }
            elseif ($item->Matrik->kodekab_tujuan == '5208' or $item->Matrik->kodekab_tujuan == '5207')
            {
                $className = 'bg-info';
            }
            else
            {
                $className = 'bg-default';
            }

            if ($item->Matrik->tipe_perjadin==1)
            {
                $nama_tujuan = $item->Matrik->Tujuan->nama_kabkota;
            }
            else 
            {
                $i = 0;
                $nama_tujuan='';
                foreach ($item->Matrik->MultiTujuan as $t) {
                    if ($i == count($item->Matrik->MultiTujuan)-1)
                    {
                        $nama_tujuan .= 'dan '.$t->namakabkota_tujuan;
                    }
                    else 
                    {   
                        $nama_tujuan .= $t->namakabkota_tujuan.', ';
                    }
                    $i = $i+1;
                }
                $nama_tujuan = '(Multi Tujuan) '. $nama_tujuan;
            }

            $dataPerjalan[]=array(
                'title'=>$item->peg_nama,
                'description' => 'Tujuan: '.$nama_tujuan .' | Tugas: '.$item->tugas .' | MAK: '.$item->Matrik->DanaAnggaran->mak.' ('.$item->Matrik->DanaAnggaran->uraian.') | Komponen: ['.$item->Matrik->DanaAnggaran->komponen_kode.'] '.$item->Matrik->DanaAnggaran->komponen_nama.' | Trx: '.$item->kode_trx,
                'start'=>$item->tgl_brkt,
                'end'=>$tgl_balik,
                'className'=> $className
            );
        }
        //dd(json_encode($dataPerjalan));
        $DataBidang = Unitkerja::where('eselon', '<', '4')->orderBy('kode', 'asc')->get();
        return view('kalendar.index',['DataBidang'=>$DataBidang,'DataOrgJalan'=>json_encode($dataPerjalan)]);
    }
}
