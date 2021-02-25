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
        "_token" => "YWafrA5fUSC0WJymzUW9t7H2nSQcGwotVKDQXoyf"
        "unitkerja" => "52560"
        "nomor_surat" => "B-003/BPS/52560/2/2021"
        "tanggal_surat" => "2021-02-15"
        "dana_mak" => "054.01.GG.2900.BMA.005.052.A.524111"
        "dana_program" => "[054.01.GG] Program Penyediaan dan Pelayanan Informasi Statistik"
        "dana_kegiatan" => "[2900] Pengembangan Metodologi Sensus dan Survei"
        "dana_kro" => "[BMA] Data dan Informasi Publik"
        "dana_output" => "[005] DOKUMEN, LAPORAN, DAN PUBLIKASI PENGEMBANGAN METODOLOGI SENSUS DAN SURVEI"
        "dana_komponen" => "[052] PENGUMPULAN DATA"
        "dana_subkomponen" => "[A] TANPA SUB KOMPONEN"
        "dana_uraian" => "1.  Perjalanan supervisi"
        "dana_pagu" => "6262000"
        "dana_pagusisa" => "6260610"
        "dana_unitkerja" => "Fungsi IPDS"
        "dana_kodeunit" => "52560"
        "dana_makid" => "280"
        "dana_tid" => "217"
        "matrikid" => array:2 [▶]
        "pegid" => array:2 [▶]
        "tgl_brkt" => array:2 [▶]
        */
        //dd($request->all());
        //form-jln sudah ada di transaksi nama dan tgl brkt
        //cek dulu pegid dan tgl_brkt ada di set ngga?
        //pegid dan tgl_brkt untuk update di transaksi kalo belum ada

        //simpan dulu form-jln untuk dapat idnya
        //pre simpan
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $data_peg = Pegawai::where([['unitkerja',$request->dana_kodeunit],['flag','1'],['jabatan','<','4']])->first();
        $data_kepala = Pegawai::where([['flag','1'],['jabatan','1']])->first();
        $dataPPK = Pegawai::where([['flag_pengelola','=','2'],['flag','=','1']])->orderBy('updated_at','desc')->first();
        $dataTurunan = TurunanAnggaran::where('t_id',$request->dana_tid)->first();

        $tahun_anggaran = Session::get('tahun_anggaran');
        $data = new FormPermintaan();
        $data->tahun_permintaan = $tahun_anggaran;
        $data->nomor_permintaan = $request->nomor_surat;
        $data->tgl_permintaan = $request->tanggal_surat;
        $data->t_id_permintaan = $request->dana_tid;
        $data->a_id_permintaan = $request->dana_makid;
        $data->pagu_utama_permintaan = $request->dana_pagu;
        $data->pagu_realisasi_permintaan = $dataTurunan->pagu_realisasi;
        $data->pagu_dpt_digunakan_permintaan = $request->dana_pagusisa;
        //$data->total_biaya_permintaan = $request->dana_pagu;
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
                //$count = DetilFormPermintaan::where([['id_permintaan',$data->id_permintaan],['matrik_id',$request->matrikid[$i]]])->count();
                $dataMatrik = MatrikPerjalanan::where('id',$request->matrikid[$i])->first();
                //update flag_sudah_permintaan di tabel transaksi set 1
                $datatrx = Transaksi::where('matrik_id',$request->matrikid[$i])->first();
                $datatrx->flag_sudah_permintaan = '1';
                $datatrx->update();
                if ($request->has('tgl_brkt'))
                {
                    //tgl_brkt sudah di belum ada di transaksi
                    $tglbrkt = $request->tgl_brkt[$i];
                    $datatrx->tgl_brkt = Carbon::parse($tglbrkt)->format('Y-m-d');
                    $datatrx->tgl_balik = Carbon::parse($tglbrkt)->addDays($dataMatrik->lamanya)->format('Y-m-d');
                    $datatrx->update();
                }
                else
                {
                    $tglbrkt = $dataMatrik->Transaksi->tgl_brkt;
                }
                if ($request->has('pegid'))
                {
                    //peg_id sudah diset dan belum ada di transaksi
                    $datapegmatrik = Pegawai::where('id',$request->pegid[$i])->first();
                    $peg_nama = $datapegmatrik->nama;
                    $peg_nip = $datapegmatrik->nip_baru;
                    $peg_gol = $datapegmatrik->gol;
                    $peg_jabatan = $datapegmatrik->jabatan;
                    $peg_unitkerja = $datapegmatrik->unitkerja;
                    $peg_unitkerja_nama = $datapegmatrik->Unitkerja->nama;
                    //update transaksi dgn peg ini
                    $datatrx->peg_nama = $peg_nama;
                    $datatrx->peg_nip = $peg_nip;
                    $datatrx->peg_gol = $peg_gol;
                    $datatrx->peg_jabatan = $peg_jabatan;
                    $datatrx->peg_unitkerja = $peg_unitkerja;
                    $datatrx->peg_unitkerja_nama = $peg_unitkerja_nama;
                    $datatrx->update();
                }
                else
                {
                    $peg_nama = $dataMatrik->Transaksi->peg_nama;
                    $peg_nip = $dataMatrik->Transaksi->peg_nip;
                    $peg_gol = $dataMatrik->Transaksi->peg_gol;
                    $peg_jabatan = $dataMatrik->Transaksi->peg_jabatan;
                    $peg_unitkerja = $dataMatrik->Transaksi->peg_unitkerja;
                    $peg_unitkerja_nama = $dataMatrik->Transaksi->peg_unitkerja_nama;
                }
                //tambah matrik ada ke detil permintaan
                $dataDetil = new DetilFormPermintaan();
                $dataDetil->id_permintaan =  $id_permintaan;
                $dataDetil->nomor_urut_detil =  $i+1;
                $dataDetil->tahun_detil =  $tahun_anggaran;
                $dataDetil->matrik_id =  $request->matrikid[$i];
                $dataDetil->peg_nip_detil =  $peg_nip;
                $dataDetil->peg_nama_detil =  $peg_nama;
                $dataDetil->peg_gol_detil =  $peg_gol;
                $dataDetil->peg_jabatan_detil =  $peg_jabatan;
                $dataDetil->peg_unitkerja_detil =  $peg_unitkerja;
                $dataDetil->peg_unitkerja_nama_detil =  $peg_unitkerja_nama;
                $dataDetil->bnyk_hari_detil =  $dataMatrik->lamanya;
                $dataDetil->tgl_brkt_detil =  $tglbrkt;
                $dataDetil->save();
                $total_biaya_permintaan = $total_biaya_permintaan + $dataMatrik->total_biaya;
            }
            $data->total_biaya_permintaan = $total_biaya_permintaan;
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
        $dataFungsi = Unitkerja::where('eselon', '=', '3')->orderBy('kode', 'asc')->get();
        $dataPegawai = Pegawai::where([['jabatan','<','6'],['flag','1']])->orderBy('unitkerja')->get();
        return view('permintaan.edit',[
            'dataFungsi'=>$dataFungsi,
            'DataAnggaran'=>$DataAnggaran,
            'FlagKendaraan'=>$FlagKendaraan,
            'dataPegawai'=>$dataPegawai,
            'dataFormJln'=>$dataFormJln
        ]);
    }
    public function UpdatePermintaan(Request $request)
    {
        dd($request->all());
    }
}
