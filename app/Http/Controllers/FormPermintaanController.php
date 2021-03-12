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
use Generate;
use App\TurunanAnggaran;
use App\Helpers\Tanggal;
use App\SuratTugas;
use App\MultiTujuan;
use App\FormPermintaan;
use App\DetilFormPermintaan;
use PDF;

class FormPermintaanController extends Controller
{
    //
    public function ListPermintaan()
    {
        //FlagFormPermintaan
        $FlagForm = config('globalvar.FlagFormPermintaan');
        $dataPermintaan = FormPermintaan::get();
        return view('permintaan.index',[
            'dataPermintaan'=>$dataPermintaan,
            'FlagForm'=>$FlagForm
        ]);
    }
    public function TambahPermintaan()
    {
        if (Auth::User()->pengelola > 3)
        {
            //operator keuangan atau admin
            $DataAnggaran = DB::table('turunan_anggaran')
                ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
                ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
                ->select(DB::Raw('turunan_anggaran.*, anggaran.*, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                ->where('anggaran.tahun_anggaran', Session::get('tahun_anggaran'))->where('flag_kunci_turunan', '=', 0)
                ->orderBy('a_id', 'desc')
                ->get();
        }
        else
        {
            //operator bidang
            $unit_pelaksana = Auth::User()->user_unitkerja;
            $DataAnggaran = DB::table('turunan_anggaran')
                ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
                ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
                ->select(DB::Raw('turunan_anggaran.*, anggaran.*, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                ->where([['anggaran.tahun_anggaran', Session::get('tahun_anggaran')], ['unit_pelaksana', '=', $unit_pelaksana]])->where('flag_kunci_turunan', '=', 0)
                ->orderBy('a_id', 'desc')
                ->get();
        }
        $FlagKendaraan = config('globalvar.Kendaraan');
        $dataFungsi = Unitkerja::where('eselon', '=', '3')->orderBy('kode', 'asc')->get();
        $dataPegawai = Pegawai::where([['jabatan','<','6'],['flag','1']])->orderBy('unitkerja')->get();
        return view('permintaan.tambah',[
            'dataFungsi'=>$dataFungsi,
            'DataAnggaran'=>$DataAnggaran,
            'FlagKendaraan'=>$FlagKendaraan,
            'dataPegawai'=>$dataPegawai
        ]);
    }
    public function SimpanPermintaan(Request $request)
    {
        /*
         "_token" => "BKchbdyshlEqmnqw7xajiTZ9OBO3tDBeuTKnR23J"
        "unitkerja" => "52530"
        "nomor_surat" => "B-024/BPS/52530/2/2021"
        "tanggal_surat" => "2021-02-17"
        "dana_mak" => "054.01.GG.2909.BMA.005.052.A.524111"
        "dana_program" => "[054.01.GG] Program Penyediaan dan Pelayanan Informasi Statistik"
        "dana_kegiatan" => "[2909] Penyediaan dan Pengembangan Statistik Peternakan, Perikanan, dan Kehutanan"
        "dana_kro" => "[BMA] Data dan Informasi Publik"
        "dana_output" => "[005] PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN YANG TERBIT TEPAT WAKTU"
        "dana_komponen" => "[052] PENGUMPULAN DATA"
        "dana_subkomponen" => "[A] TANPA SUB KOMPONEN"
        "dana_uraian" => "1.  Pengawasan BPS provinsi ke bps kab/kota"
        "dana_pagu" => "32325000"
        "dana_pagusisa" => "30755000"
        "dana_unitkerja" => "Fungsi Statistik Produksi"
        "dana_kodeunit" => "52530"
        "dana_makid" => "310"
        "dana_tid" => "211"
        "semuamatrik" => "pilihsemua"
        "matrikid" => array:3 [▼
            0 => "2146"
            1 => "2148"
            2 => "2183"
        ]
        "pegnip2146" => "19720621 199512 1 001"
        "tgl_brkt2146" => "2021-02-22"
        "pegnip2148" => "19881215 201012 2 003"
        "tgl_brkt2148" => "2021-02-26"
        "pegnip2183" => "19850801 200801 2 005"
        "tgl_brkt2183" => "2021-02-25"

        "t_id" => 198
        "a_id" => 277
        "unit_pelaksana" => "52520"
        "pagu_awal" => "9393000"
        "pagu_rencana" => "9260000"
        "pagu_realisasi" => "5060000"
        "flag_kunci_turunan" => 0
        "created_at" => "2021-02-15 23:24:09"
        "updated_at" => "2021-02-27 13:51:31"
        */
        //dd($request->all());
        //form-jln sudah ada di transaksi nama dan tgl brkt
        //cek dulu pegid dan tgl_brkt ada di set ngga?
        //pegid dan tgl_brkt untuk update di transaksi kalo belum ada

        //simpan dulu form-jln untuk dapat idnya
        //pre simpan
        //kolom 5 = kolom 6 + kolom 7
        //kolom 6 = kolom 5 - kolom 7
        //kolom 5 = kolom 3 - kolom 4
        //kolom 4 = kolom 3 - kolom 5
        //kolom 4 = kolom 3 - (kolom 6 + kolom 7)
        //$data->pagu_realisasi_permintaan (kolom 4)
        //$data->pagu_dpt_digunakan_permintaan (kolom 5)
        //$data->total_biaya_permintaan (kolom 6)
        //$data->sisa_anggaran_permintaan (kolom 7)
        //kolom 3 = $request->dana_pagu;
        //kolom 7 = $request->dana_pagusisa
        //kolom 6 = $total_biaya_permintaan
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $data_peg = Pegawai::where([['unitkerja',$request->dana_kodeunit],['flag','1'],['jabatan','<','4']])->first();
        $data_kepala = Pegawai::where([['flag','1'],['jabatan','1']])->first();
        $dataPPK = Pegawai::where([['flag_pengelola','=','2'],['flag','=','1']])->orderBy('updated_at','desc')->first();
        $dataTurunan = TurunanAnggaran::where('t_id',$request->dana_tid)->first();
        //dd($dataTurunan,$request->all());

        $tahun_anggaran = Session::get('tahun_anggaran');
        $data = new FormPermintaan();
        $data->tahun_permintaan = $tahun_anggaran;
        $data->nomor_permintaan = $request->nomor_surat;
        $data->tgl_permintaan = $request->tanggal_surat;
        $data->t_id_permintaan = $request->dana_tid;
        $data->a_id_permintaan = $request->dana_makid;
        $data->pagu_utama_permintaan = $request->dana_pagu;
        //$data->pagu_realisasi_permintaan = $request->dana_pagu - ($request->dana_pagusisa + $total_biaya_permintaan);
        //$data->pagu_dpt_digunakan_permintaan = $request->dana_pagusisa + $total_biaya_permintaan;
        //$data->total_biaya_permintaan = $total_biaya_permintaan;
        $data->sisa_anggaran_permintaan = $request->dana_pagusisa;
        $data->unitkerja_kode_permintaan = $request->dana_kodeunit;
        $data->unitkerja_nama_permintaan = $request->dana_unitkerja;
        $data->ttd_jabatan_kode_permintaan = $data_peg->jabatan;
        $data->ttd_jabatan_nama_permintaan = $JenisJabatanVar[$data_peg->jabatan];
        $data->ttd_nip_permintaan = $data_peg->nip_baru;
        $data->ttd_nama_permintaan = $data_peg->nama;
        $data->ttd_kepala_nip_permintaan = $data_kepala->nip_baru;
        $data->ttd_kepala_nama_permintaan = $data_kepala->nama;
        $data->ttd_ppk_nip_permintaan = $dataPPK->nip_baru;
        $data->ttd_ppk_nama_permintaan = $dataPPK->nama;
        $data->save();
        if ($request->has('matrikid'))
        {
            //set idpermintaan
            $id_permintaan = $data->id_permintaan;
            $total_biaya_permintaan = 0;
            for ($i=0; $i < count($request->matrikid); $i++)
            {
                $m_id = $request->matrikid[$i];
                $pegnip = "pegnip".$m_id;
                $tgl_brkt = "tgl_brkt".$m_id;
                //cek matrik dulu
                $dataMatrik = MatrikPerjalanan::where('id',$m_id)->first();
                //update flag_sudah_permintaan di tabel transaksi set 1
                $datatrx = Transaksi::where('matrik_id',$m_id)->first();
                $datatrx->flag_sudah_permintaan = '1';
                $datatrx->update();
                //cek dulu tgl_brkt ada tidak di tabel transaksi
                if ($datatrx->tgl_brkt)
                {
                    //tgl_brkt sudah di isi
                    //ambil tanggalnya
                    $tgl_brkt_baru = $datatrx->tgl_brkt;
                }
                else
                {
                    //tgl_brkt di tabel transaksi bernilai null
                    //ambil dari request
                    if ($request->has($tgl_brkt))
                    {
                        $tgl_brkt_baru = $request->$tgl_brkt;
                        $bnyk_hari = $dataMatrik->lamanya - 1;
                        $datatrx->tgl_brkt = Carbon::parse($tgl_brkt_baru)->format('Y-m-d');
                        $datatrx->tgl_balik = Carbon::parse($tgl_brkt_baru)->addDays($bnyk_hari)->format('Y-m-d');
                        $datatrx->update();
                    }
                }
                //cek peg_nip ditabel transaksi sudah ada tidak
                if ($datatrx->peg_nip)
                {
                    //jika sudah ada ambil yg sudah ada
                    $peg_nama = $datatrx->peg_nama;
                    $peg_nip = $datatrx->peg_nip;
                    $peg_gol = $datatrx->peg_gol;
                    $peg_jabatan = $datatrx->peg_jabatan;
                    $peg_unitkerja = $datatrx->peg_unitkerja;
                    $peg_unitkerja_nama = $datatrx->peg_unitkerja_nama;
                }
                else
                {
                    //jika tidak ada ambil dari request
                    if ($request->has($pegnip))
                    {
                        $peg_nip_baru = $request->$pegnip;

                        $datapegmatrik = Pegawai::where('nip_baru',$peg_nip_baru)->first();
                        $peg_nama = $datapegmatrik->nama;
                        $peg_nip = $datapegmatrik->nip_baru;
                        $peg_gol = $datapegmatrik->gol;
                        $peg_jabatan = $datapegmatrik->jabatan;
                        $peg_unitkerja = $datapegmatrik->unitkerja;
                        $peg_unitkerja_nama = $datapegmatrik->Unitkerja->nama;
                        //update transaksi dgn pegnip
                        $datatrx->peg_nama = $peg_nama;
                        $datatrx->peg_nip = $peg_nip;
                        $datatrx->peg_gol = $peg_gol;
                        $datatrx->peg_jabatan = $peg_jabatan;
                        $datatrx->peg_unitkerja = $peg_unitkerja;
                        $datatrx->peg_unitkerja_nama = $peg_unitkerja_nama;
                        $datatrx->update();
                    }
                }

                //tambah matrik ada ke detil permintaan
                $dataDetil = new DetilFormPermintaan();
                $dataDetil->id_permintaan =  $id_permintaan;
                $dataDetil->nomor_urut_detil =  $i+1;
                $dataDetil->tahun_detil =  $tahun_anggaran;
                $dataDetil->matrik_id =  $m_id;
                $dataDetil->peg_nip_detil =  $peg_nip;
                $dataDetil->peg_nama_detil =  $peg_nama;
                $dataDetil->peg_gol_detil =  $peg_gol;
                $dataDetil->peg_jabatan_detil =  $peg_jabatan;
                $dataDetil->peg_unitkerja_detil =  $peg_unitkerja;
                $dataDetil->peg_unitkerja_nama_detil =  $peg_unitkerja_nama;
                $dataDetil->bnyk_hari_detil =  $dataMatrik->lamanya;
                $dataDetil->tgl_brkt_detil =  $tgl_brkt_baru;
                $dataDetil->save();
                $total_biaya_permintaan = $total_biaya_permintaan + $dataMatrik->total_biaya;
            }
            $data->total_biaya_permintaan = $total_biaya_permintaan;
            $data->pagu_realisasi_permintaan = $request->dana_pagu - ($request->dana_pagusisa + $total_biaya_permintaan);
            $data->pagu_dpt_digunakan_permintaan = $request->dana_pagusisa + $total_biaya_permintaan;
            $data->update();
        }
        $pesan_error = '['.$request->nomor_surat.'] Surat Permintaan Form-JLN sudah dibuat';
        $warna_error = 'success';
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('permintaan.list');
    }
    public function EditPermintaan($pid)
    {
        if (Auth::User()->pengelola > 3)
        {
            //operator keuangan atau admin
            $DataAnggaran = DB::table('turunan_anggaran')
                ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
                ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
                ->select(DB::Raw('turunan_anggaran.*, anggaran.*, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                ->where('anggaran.tahun_anggaran', Session::get('tahun_anggaran'))->where('flag_kunci_turunan', '=', 0)
                ->orderBy('a_id', 'desc')
                ->get();
            $dataFormJln = FormPermintaan::where('id_permintaan',$pid)->first();
        }
        else
        {
            //operator bidang
            $unit_pelaksana = Auth::User()->user_unitkerja;
            $DataAnggaran = DB::table('turunan_anggaran')
                ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
                ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
                ->select(DB::Raw('turunan_anggaran.*, anggaran.*, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                ->where([['anggaran.tahun_anggaran', Session::get('tahun_anggaran')], ['unit_pelaksana', '=', $unit_pelaksana]])->where('flag_kunci_turunan', '=', 0)
                ->orderBy('a_id', 'desc')
                ->get();
            $dataFormJln = FormPermintaan::where([['id_permintaan',$pid],['unitkerja_kode_permintaan',$unit_pelaksana]])->first();
        }
        $FlagKendaraan = config('globalvar.Kendaraan');
        $FlagTrx = config('globalvar.FlagTransaksi');
        $dataFungsi = Unitkerja::where('eselon', '=', '3')->orderBy('kode', 'asc')->get();
        $dataPegawai = Pegawai::where([['jabatan','<','6'],['flag','1']])->orderBy('unitkerja')->get();
        return view('permintaan.edit',[
            'dataFungsi'=>$dataFungsi,
            'DataAnggaran'=>$DataAnggaran,
            'FlagKendaraan'=>$FlagKendaraan,
            'dataPegawai'=>$dataPegawai,
            'dataFormJln'=>$dataFormJln,
            'FlagTrx'=>$FlagTrx
        ]);
    }
    public function UpdatePermintaan(Request $request)
    {

        //dd($request->all());
        /*
        for ($i=0; $i < count($request->matrikid); $i++)
            {
                $m_id = $request->matrikid[$i];
                $pegnip = "pegnip".$m_id;
                $tgl_brkt = "tgl_brkt".$m_id;
                if ($request->has($pegnip))
                {
                    $peg_nip_baru = $request->$pegnip;
                }

                if ($request->has($tgl_brkt))
                {
                    $tgl_brkt_baru = $request->$tgl_brkt;
                }

                $arr_loop[] = array(
                    'matrik_id'=>$m_id,
                    'peg_nip'=>$peg_nip_baru,
                    'tgl_brkt'=>$tgl_brkt_baru
                );

            }
        dd($request->all(),$arr_loop);

             "_token" => "H9JYFEAZgIvwpZCOZCP0I5q6GdMZ9M1efgC2kn52"
            "unitkerja" => "52520"
            "nomor_surat" => "B-002/BPS/52520/2/2021"
            "tanggal_surat" => "2021-02-15"
            "dana_mak" => "054.01.GG.2905.BMA.004.052.A.524111"
            "dana_program" => "[054.01.GG] Program Penyediaan dan Pelayanan Informasi Statistik"
            "dana_kegiatan" => "[2905] Penyediaan dan Pengembangan Statistik Kependudukan dan Ketenagakerjaan"
            "dana_kro" => "[BMA] Data dan Informasi Publik"
            "dana_output" => "[004] LAPORAN DISEMINASI DAN METADATA STATISTIK"
            "dana_komponen" => "[052] PENGUMPULAN DATA"
            "dana_subkomponen" => "[A] TANPA SUB KOMPONEN"
            "dana_uraian" => "[524111] 1. perjalanan supervisi bps provinsi (Transport Perjalanan )"
            "dana_pagu" => "9393000"
            "dana_pagusisa" => "923000"
            "dana_unitkerja" => "[52520] Fungsi Statistik Sosial"
            "dana_kodeunit" => "52520"
            "dana_makid" => "277"
            "dana_tid" => "198"
            "matrikid" => array:5 [▼
                0 => "2121"
                1 => "2122"
                2 => "2123"
                3 => "2124"
                4 => "2125"
            ]
            "pegnip2121" => "19840517 200701 1 003"
            "tgl_brkt2121" => "2021-02-18"
            "id_permintaan" => "4"
            */
        //cek dulu id_permintaan ada ngga?

        $count = FormPermintaan::where('id_permintaan',$request->id_permintaan)->count();
        if ($count > 0)
        {
            $JenisJabatanVar = config('globalvar.JenisJabatan');
            $data_peg = Pegawai::where([['unitkerja',$request->dana_kodeunit],['flag','1'],['jabatan','<','4']])->first();
            $data_kepala = Pegawai::where([['flag','1'],['jabatan','1']])->first();
            $dataPPK = Pegawai::where([['flag_pengelola','=','2'],['flag','=','1']])->orderBy('updated_at','desc')->first();
            $dataTurunan = TurunanAnggaran::where('t_id',$request->dana_tid)->first();
            $data = FormPermintaan::where('id_permintaan',$request->id_permintaan)->first();
            $tahun_anggaran = Session::get('tahun_anggaran');
            //update tabel permintaan dulu
            $data->nomor_permintaan = $request->nomor_surat;
            $data->tgl_permintaan = Carbon::parse($request->tanggal_surat)->format('Y-m-d');
            $data->t_id_permintaan = $request->dana_tid;
            $data->a_id_permintaan = $request->dana_makid;
            $data->pagu_utama_permintaan = $request->dana_pagu;
            //$data->pagu_realisasi_permintaan = $dataTurunan->pagu_realisasi;
            //$data->pagu_dpt_digunakan_permintaan = $request->dana_pagusisa;
            //$data->total_biaya_permintaan = $request->dana_pagu;
            $data->sisa_anggaran_permintaan = $request->dana_pagusisa;
            $data->unitkerja_kode_permintaan = $dataTurunan->unit_pelaksana;
            $data->unitkerja_nama_permintaan = $dataTurunan->Unitkerja->nama;
            $data->ttd_jabatan_kode_permintaan = $data_peg->jabatan;
            $data->ttd_jabatan_nama_permintaan = $JenisJabatanVar[$data_peg->jabatan];
            $data->ttd_nip_permintaan = $data_peg->nip_baru;
            $data->ttd_nama_permintaan = $data_peg->nama;
            $data->ttd_kepala_nip_permintaan = $data_kepala->nip_baru;
            $data->ttd_kepala_nama_permintaan = $data_kepala->nama;
            $data->ttd_ppk_nip_permintaan = $dataPPK->nip_baru;
            $data->ttd_ppk_nama_permintaan = $dataPPK->nama;
            //batas update permintaan

            //update detil permintaan
            $count_detil = DetilFormPermintaan::where('id_permintaan',$request->id_permintaan)->count();
            if ($count_detil > 0)
            {
                $data_detil = DetilFormPermintaan::where('id_permintaan',$request->id_permintaan)->get();
                //set flag_sudah_permintaan di tabel transaksi jadi nol
                foreach ($data_detil as $item)
                {
                    $datatrxawal = Transaksi::where('matrik_id',$item->matrik_id)->first();
                    $datatrxawal->flag_sudah_permintaan = '0';
                    $datatrxawal->update();
                }
                //batas update flag_sudah_permintaan
                DetilFormPermintaan::where('id_permintaan',$request->id_permintaan)->delete();
            }
            //tambah ulang untuk data detil permintaan
            //sesuai matrikid apa saja yg nambah
            if ($request->has('matrikid'))
            {
                //set idpermintaan
                $id_permintaan = $request->id_permintaan;
                $total_biaya_permintaan = 0;
                for ($i=0; $i < count($request->matrikid); $i++)
                {
                    $m_id = $request->matrikid[$i];
                    $pegnip = "pegnip".$m_id;
                    $tgl_brkt = "tgl_brkt".$m_id;
                    $dataMatrik = MatrikPerjalanan::where('id',$m_id)->first();
                    //update flag_sudah_permintaan di tabel transaksi set 1
                    $datatrx = Transaksi::where('matrik_id',$m_id)->first();
                    $datatrx->flag_sudah_permintaan = '1';
                    $datatrx->update();
                    //edit detil permintaan tetep akan memaksa
                    //update tabel transaksi untuk pegawai yg perjadin
                    //begitu juga dengan tgl berangkat tetep akan di update
                    if ($request->has($pegnip))
                    {
                        $peg_nip_baru = $request->$pegnip;

                        $datapegmatrik = Pegawai::where('nip_baru',$peg_nip_baru)->first();
                        $peg_nama = $datapegmatrik->nama;
                        $peg_nip = $datapegmatrik->nip_baru;
                        $peg_gol = $datapegmatrik->gol;
                        $peg_jabatan = $datapegmatrik->jabatan;
                        $peg_unitkerja = $datapegmatrik->unitkerja;
                        $peg_unitkerja_nama = $datapegmatrik->Unitkerja->nama;
                        //update transaksi dgn pegnip
                        $datatrx->peg_nama = $peg_nama;
                        $datatrx->peg_nip = $peg_nip;
                        $datatrx->peg_gol = $peg_gol;
                        $datatrx->peg_jabatan = $peg_jabatan;
                        $datatrx->peg_unitkerja = $peg_unitkerja;
                        $datatrx->peg_unitkerja_nama = $peg_unitkerja_nama;
                        $datatrx->update();
                    }

                    if ($request->has($tgl_brkt))
                    {
                        $tgl_brkt_baru = $request->$tgl_brkt;
                        $bnyk_hari = $dataMatrik->lamanya - 1;
                        $datatrx->tgl_brkt = Carbon::parse($tgl_brkt_baru)->format('Y-m-d');
                        $datatrx->tgl_balik = Carbon::parse($tgl_brkt_baru)->addDays($bnyk_hari)->format('Y-m-d');
                        $datatrx->update();
                    }

                    //tambah matrik ada ke detil permintaan
                    $dataDetil = new DetilFormPermintaan();
                    $dataDetil->id_permintaan =  $id_permintaan;
                    $dataDetil->nomor_urut_detil =  $i+1;
                    $dataDetil->tahun_detil =  $tahun_anggaran;
                    $dataDetil->matrik_id =  $m_id;
                    $dataDetil->peg_nip_detil =  $peg_nip;
                    $dataDetil->peg_nama_detil =  $peg_nama;
                    $dataDetil->peg_gol_detil =  $peg_gol;
                    $dataDetil->peg_jabatan_detil =  $peg_jabatan;
                    $dataDetil->peg_unitkerja_detil =  $peg_unitkerja;
                    $dataDetil->peg_unitkerja_nama_detil =  $peg_unitkerja_nama;
                    $dataDetil->bnyk_hari_detil =  $dataMatrik->lamanya;
                    $dataDetil->tgl_brkt_detil =  $tgl_brkt_baru;
                    $dataDetil->save();
                    $total_biaya_permintaan = $total_biaya_permintaan + $dataMatrik->total_biaya;

                }
                $data->total_biaya_permintaan = $total_biaya_permintaan;
                $data->pagu_realisasi_permintaan = $request->dana_pagu - ($request->dana_pagusisa + $total_biaya_permintaan);
                $data->pagu_dpt_digunakan_permintaan = $request->dana_pagusisa + $total_biaya_permintaan;
                $data->update();
            }
            $pesan_error = '['.$request->nomor_surat.'] Surat Permintaan Form-JLN sudah diedit';
            $warna_error = 'success';
        }
        else
        {
            $pesan_error = 'Surat Permintaan Form-JLN tidak ada';
            $warna_error = 'danger';
        }


        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('permintaan.list');
    }
    public function PrintPermintaan($pid)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $count = FormPermintaan::where('id_permintaan',$pid)->whereIn('flag_permintaan',['1','2','3','4'])->count();
        if ($count > 0)
        {
            $data = FormPermintaan::where('id_permintaan',$pid)->whereIn('flag_permintaan',['1','2','3','4'])->first();
            $data_detil = DetilFormPermintaan::where('id_permintaan',$pid)->get();
            //dd($data_detil);
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Helvetica','isHtml5ParserEnabled'=>true]);
            $pdf = PDF::loadView('permintaan.print',compact('data','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','FlagKendaraan','JenisJabatanVar','data_detil'))->setPaper('A4');
            return $pdf->stream($pid.'-Form-JLN Nomor '.$data->nomor_permintaan.'_'.$data->tgl_permintaan.'.pdf');
            //return view('kelengkapan.print',compact('data','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','FlagKendaraan'));
        }
        else
        {
            Session::flash('message', 'ID Form-JLN tidak tersedia');
            Session::flash('message_type', 'danger');
            return redirect()->route('permintaan.list');
        }
    }
    public function UnduhPermintaan($pid)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $count = FormPermintaan::where('id_permintaan',$pid)->whereIn('flag_permintaan',['1','2','3','4'])->count();
        if ($count > 0)
        {
            $data = FormPermintaan::where('id_permintaan',$pid)->whereIn('flag_permintaan',['1','2','3','4'])->first();
            $data_detil = DetilFormPermintaan::where('id_permintaan',$pid)->get();
            //dd($data_detil);
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Helvetica','isHtml5ParserEnabled'=>true]);
            $pdf = PDF::loadView('permintaan.print',compact('data','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','FlagKendaraan','JenisJabatanVar','data_detil'))->setPaper('A4');
            return $pdf->download($pid.'-Form-JLN Nomor '.$data->nomor_permintaan.'_'.$data->tgl_permintaan.'.pdf');
            //return view('kelengkapan.print',compact('data','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','FlagKendaraan'));
        }
        else
        {
            Session::flash('message', 'ID Form-JLN tidak tersedia');
            Session::flash('message_type', 'danger');
            return redirect()->route('permintaan.list');
        }
    }
    public function HapusPermintaan(Request $request)
    {
        //dd($request->all());
        /*
         "_token" => "EJYjEVKvu9itIAfxHbxl5fkgSBCbzuz09znZId1s"
        "pid" => "1"
        "nomor_surat" => "B-002/BPS/52510/2/2021"
        "tgl_surat" => "23 Februari 2021"
        "unitkerja_nama" => "Bagian Umum"
        "totalbiaya" => "Rp. 8.430.000"
        "unitkerja_kode" => "52510"
        Hapus Form-JLN
        1. count tabel detil ada tidak
        2. kalo ada detil ambil matrik_id
        3. set di tabel transaksi flag_surat_permintaan=0
        4. hapus semua di detil permintaan sesuai id_permintaan
        5. hapus form-jln di tabel permintaan
        */
        //1 cek permintaan ada tidak
        $count = FormPermintaan::where('id_permintaan',$request->pid)->count();
        if ($count > 0)
        {
            $count_detil = DetilFormPermintaan::where('id_permintaan',$request->pid)->count();
            if ($count_detil > 0)
            {
                //hapus data ditabel detil permintaan
                $data_detil = DetilFormPermintaan::where('id_permintaan',$request->pid)->get();
                foreach ($data_detil as $item)
                {
                    $data = Transaksi::where('matrik_id',$item->matrik_id)->first();
                    if ($data)
                    {
                        $data->flag_sudah_permintaan = 0;
                        $data->update();
                    }
                }
                DetilFormPermintaan::where('id_permintaan',$request->pid)->delete();

            }
            FormPermintaan::where('id_permintaan',$request->pid)->delete();
            $pesan_error = 'Surat Permintaan Form-JLN dari <b>['.$request->unitkerja_kode.'] '.$request->unitkerja_nama.'</b> Nomor <b>'.$request->nomor_surat.'</b> Tanggal <i>'.$request->tgl_surat.'</i> sudah di hapus';
            $warna_error = 'success';
        }
        else
        {
            $pesan_error = 'Surat Permintaan Form-JLN tidak ada';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('permintaan.list');
    }
    public function ImportSuratLama()
    {
        /*
        select matrik_id, form_nomor_surat, form_tgl_surat, form_unitkerja_kode, form_unitkerja_nama, form_ttd_nip, form_ttd_nama, form_ttd_jabatan, form_ttd_kepala_nip, form_ttd_kepala_nama from transaksi where tahun_trx='2021' and form_nomor_surat IS NOT NULL group by form_nomor_surat, form_tgl_surat order by form_tgl_surat, form_nomor_surat

        */
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $count = Transaksi::whereNotNull('form_nomor_surat')->count();
        if ($count > 0)
        {
            $tahun_anggaran = Session::get('tahun_anggaran');
            $datatrx = Transaksi::where('tahun_trx',$tahun_anggaran)->whereNotNull('form_nomor_surat')
                    ->select('form_nomor_surat', 'form_tgl_surat', 'form_unitkerja_kode', 'form_unitkerja_nama','form_ttd_nip', 'form_ttd_nama', 'form_ttd_jabatan', 'form_ttd_kepala_nip', 'form_ttd_kepala_nama')
                    ->groupBy('form_nomor_surat','form_tgl_surat')
                    ->orderBy('form_tgl_surat')->orderBy('form_nomor_surat')
                    ->get();
            //dd($datatrx);
            /*
            $data = new FormPermintaan();
            $data->tahun_permintaan = $tahun_anggaran;
            $data->nomor_permintaan = $request->nomor_surat;
            $data->tgl_permintaan = $request->tanggal_surat;
            $data->t_id_permintaan = $request->dana_tid;
            $data->a_id_permintaan = $request->dana_makid;
            $data->pagu_utama_permintaan = $request->dana_pagu;
            //$data->pagu_realisasi_permintaan = $request->dana_pagu - ($request->dana_pagusisa + $total_biaya_permintaan);
            //$data->pagu_dpt_digunakan_permintaan = $request->dana_pagusisa + $total_biaya_permintaan;
            //$data->total_biaya_permintaan = $total_biaya_permintaan;
            $data->sisa_anggaran_permintaan = $request->dana_pagusisa;
            $data->unitkerja_kode_permintaan = $request->dana_kodeunit;
            $data->unitkerja_nama_permintaan = $request->dana_unitkerja;
            $data->ttd_jabatan_kode_permintaan = $data_peg->jabatan;
            $data->ttd_jabatan_nama_permintaan = $JenisJabatanVar[$data_peg->jabatan];
            $data->ttd_nip_permintaan = $data_peg->nip_baru;
            $data->ttd_nama_permintaan = $data_peg->nama;
            $data->ttd_kepala_nip_permintaan = $data_kepala->nip_baru;
            $data->ttd_kepala_nama_permintaan = $data_kepala->nama;
            $data->ttd_ppk_nip_permintaan = $dataPPK->nip_baru;
            $data->ttd_ppk_nama_permintaan = $dataPPK->nama;

            "form_nomor_surat" => "B-001/BPS/52540/2/2021"
            "form_tgl_surat" => "2021-02-09"
            "form_unitkerja_kode" => "52540"
            "form_unitkerja_nama" => "Fungsi Statistik Distribusi"
            "form_ttd_nip" => "19671231 199401 1 001"
            "form_ttd_nama" => "Muhamad Saphoan"
            "form_ttd_jabatan" => 3
            "form_ttd_kepala_nip" => "19660219 199401 1 001"
            "form_ttd_kepala_nama" => "Suntono"
            */
            foreach ($datatrx as $item)
            {
                $count_data = FormPermintaan::where([['nomor_permintaan',$item->form_nomor_surat],['tgl_permintaan',$item->form_tgl_surat]])->count();
                if ($count_data == 0)
                {
                    $data = new FormPermintaan();
                    $data->tahun_permintaan = $tahun_anggaran;
                    $data->nomor_permintaan = $item->form_nomor_surat;
                    $data->tgl_permintaan = $item->form_tgl_surat;
                    $data->unitkerja_kode_permintaan = $item->form_unitkerja_kode;
                    $data->unitkerja_nama_permintaan = $item->form_unitkerja_nama;
                    $data->ttd_jabatan_kode_permintaan = $item->form_ttd_jabatan;
                    $data->ttd_jabatan_nama_permintaan = $JenisJabatanVar[$item->form_ttd_jabatan];
                    $data->ttd_nip_permintaan = $item->form_ttd_nip;
                    $data->ttd_nama_permintaan = $item->form_ttd_nama;
                    $data->ttd_kepala_nip_permintaan = $item->form_ttd_kepala_nip;
                    $data->ttd_kepala_nama_permintaan = $item->form_ttd_kepala_nama;
                    $data->save();
                }
            }
            //set semua form_nomor_surat null
            DB::table('transaksi')->update(
                        ['form_nomor_surat' => null],
                        ['form_tgl_surat' => null]
            );
            $pesan_error = 'Semua surat lama sudah di import ke Form-JLN';
            $warna_error = 'success';
        }
        else
        {
            $pesan_error = 'Semua surat diproses atau form nomor surat lama sudah kosong';
            $warna_error = 'danger';
        }


        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('permintaan.list');
    }
}
