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

class MatrikController extends Controller
{
    //
    public function list()
    {
        //

        $DataUnitkerja = DB::table('unitkerja')
            ->where('eselon', '<', '4')->where('flag_edit', '=', '0')->get();
        $MatrikFlag = config('globalvar.FlagMatrik');
        $DataMatrik = MatrikPerjalanan::where('tahun_matrik', Session::get('tahun_anggaran'))->orderBy('created_at', 'desc')->get();
        //dd($DataMatrik);
        return view('matrik.index', compact('DataMatrik', 'MatrikFlag', 'DataUnitkerja'));
    }
    public function baru()
    {
        //$DataUnitkerja = Unitkerja::where('eselon', '=', '3')->get();
       
        if (Auth::User()->pengelola > 3) {
            //operator keuangan atau admin
            $DataAnggaran = DB::table('turunan_anggaran')
                ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
                ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
                ->select(DB::Raw('turunan_anggaran.*, anggaran.tahun_anggaran, anggaran.mak, anggaran.komponen_kode, anggaran.komponen_nama, anggaran.uraian, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                ->where('anggaran.tahun_anggaran', Session::get('tahun_anggaran'))->where('flag_kunci_turunan', '=', 0)
                ->orderBy('a_id', 'desc')
                ->get();
        } else {
            //operator bidang
            $unit_pelaksana = Auth::User()->user_unitkerja;
            $DataAnggaran = DB::table('turunan_anggaran')
                ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
                ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
                ->select(DB::Raw('turunan_anggaran.*, anggaran.tahun_anggaran, anggaran.mak, anggaran.komponen_kode, anggaran.komponen_nama, anggaran.uraian, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                ->where([['anggaran.tahun_anggaran', Session::get('tahun_anggaran')], ['unit_pelaksana', '=', $unit_pelaksana]])->where('flag_kunci_turunan', '=', 0)
                ->orderBy('a_id', 'desc')
                ->get();
        }

        $DataTujuan = Tujuan::all();
        return view('matrik.baru', compact('DataTujuan', 'DataAnggaran'));
    }
    public function simpan(Request $request)
    {
        //dd($request->all());
        //cek dulu tid kosong apa tidak
        $totalharian = $request->uangharian * $request->harian;
        $totalhotel = $request->nilaihotel * $request->hotelhari;
        $totalbiaya = $totalharian + $totalhotel + $request->nilaiTransport + $request->pengeluaranrill;
        
        if ($request->dana_tid and $request->dana_makid)
        {
            //langsung bisa input matrik
             //hitung ulang totalharian, totalhotel, totalbiaya
            
            // cek dulu sisa anggaran di turunan_anggaran
            $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id', '=', $request->dana_tid)->first();
            $sisa_rencana = $dataTurunanAnggaran->pagu_awal - $dataTurunanAnggaran->pagu_rencana;
            if ($sisa_rencana >= $totalbiaya) {
                //tambah matrik baru
                $kode_trx = Generate::Kode(6);
                $datamatrik = new MatrikPerjalanan();
                $datamatrik->kode_trx = $kode_trx;
                $datamatrik->tahun_matrik = Session::get('tahun_anggaran');
                $datamatrik->tgl_awal = $request['tglawal'];
                $datamatrik->tgl_akhir = $request['tglakhir'];
                $datamatrik->kodekab_tujuan = $request['kode_kabkota'];
                $datamatrik->lamanya = $request['lamanya'];
                $datamatrik->mak_id = $request->dana_makid;
                $datamatrik->dana_tid = $request->dana_tid;
                $datamatrik->dana_mak = $request['dana_mak'];
                $datamatrik->dana_pagu = $request['dana_pagu'];
                $datamatrik->dana_unitkerja = $request['dana_kodeunit'];
                $datamatrik->lama_harian = $request['harian'];
                $datamatrik->dana_harian = $request['uangharian'];
                $datamatrik->total_harian = $totalharian;
                $datamatrik->dana_transport = $request['nilaiTransport'];
                $datamatrik->lama_hotel = $request['hotelhari'];
                $datamatrik->dana_hotel = $request['nilaihotel'];
                $datamatrik->total_hotel = $totalhotel;
                $datamatrik->pengeluaran_rill = $request['pengeluaranrill'];
                $datamatrik->total_biaya = $totalbiaya;
                $datamatrik->save();

                //update turunan anggaran
                $dataTurunanAnggaran->pagu_rencana = $dataTurunanAnggaran->pagu_rencana + $totalbiaya;
                $dataTurunanAnggaran->update();

                $pesan_error = 'Matrik perjalanan berhasil di tambahkan';
                $warna_error = 'success';
            } else {
                //totalbiaya lebih besar dari sisa
                $pesan_error = 'Sisa anggaran tidak mencukupi';
                $warna_error = 'danger';
            }
        }
        else 
        {
            //input matriknya saja dan belum bisa di alokasi
            $kode_trx = Generate::Kode(6);
            $datamatrik = new MatrikPerjalanan();
            $datamatrik->kode_trx = $kode_trx;
            $datamatrik->tahun_matrik = Carbon::parse($request['tglawal'])->format('Y');
            $datamatrik->tgl_awal = $request['tglawal'];
            $datamatrik->tgl_akhir = $request['tglakhir'];
            $datamatrik->kodekab_tujuan = $request['kode_kabkota'];
            $datamatrik->lamanya = $request['lamanya'];
            $datamatrik->dana_unitkerja = Auth::user()->user_unitkerja;
            $datamatrik->lama_harian = $request['harian'];
            $datamatrik->dana_harian = $request['uangharian'];
            $datamatrik->total_harian = $totalharian;
            $datamatrik->dana_transport = $request['nilaiTransport'];
            $datamatrik->lama_hotel = $request['hotelhari'];
            $datamatrik->dana_hotel = $request['nilaihotel'];
            $datamatrik->total_hotel = $totalhotel;
            $datamatrik->pengeluaran_rill = $request['pengeluaranrill'];
            $datamatrik->total_biaya = $totalbiaya;
            $datamatrik->save();

            $pesan_error = '['.$kode_trx.'] Matrik perjalanan berhasil di tambahkan dan belum bisa di alokasikan';
            $warna_error = 'warning';

        }

        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('matrik.list');
    }
    public function editMatrik($mid)
    {
        $DataMatrik = MatrikPerjalanan::where('id','=',$mid)->first();
        $MatrikFlag = config('globalvar.FlagMatrik');
        if (Auth::User()->pengelola > 3) {
            //operator keuangan atau admin
            $DataAnggaran = DB::table('turunan_anggaran')
                ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
                ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
                ->select(DB::Raw('turunan_anggaran.*, anggaran.tahun_anggaran, anggaran.mak, anggaran.komponen_kode, anggaran.komponen_nama, anggaran.uraian, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                ->where('anggaran.tahun_anggaran', Session::get('tahun_anggaran'))->where('flag_kunci_turunan', '=', 0)
                ->orderBy('a_id', 'desc')
                ->get();
        } else {
            //operator bidang
            $unit_pelaksana = Auth::User()->user_unitkerja;
            $DataAnggaran = DB::table('turunan_anggaran')
                ->leftJoin('anggaran', 'anggaran.id', '=', 'turunan_anggaran.a_id')
                ->leftJoin('unitkerja', 'turunan_anggaran.unit_pelaksana', '=', 'unitkerja.kode')
                ->select(DB::Raw('turunan_anggaran.*, anggaran.tahun_anggaran, anggaran.mak, anggaran.komponen_kode, anggaran.komponen_nama, anggaran.uraian, unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                ->where([['anggaran.tahun_anggaran', Session::get('tahun_anggaran')], ['unit_pelaksana', '=', $unit_pelaksana]])->where('flag_kunci_turunan', '=', 0)
                ->orderBy('a_id', 'desc')
                ->get();
        }

        $DataTujuan = Tujuan::all();
        return view('matrik.edit',[
            'DataAnggaran'=>$DataAnggaran,
            'DataTujuan'=>$DataTujuan,
            'DataMatrik'=>$DataMatrik
        ]);
    }
    public function updateMatrik(Request $request)
    {
        //dd($request->all());
        /*
        cek dulu matrik_id ada tidak
        1. cek dulu tid_sblm dan aid_sblm
        2. bila tid_sblm dan aid_sblm kosong
           cek dulu dana_makid & dana_tid
           bila kosong langusng update matrik aja
           bila terisi langsung update turunan_anggaran dgn dana_tid dan mak_id
        3. bila tid_sblm dan aid_sblm terisi
           bila sama dana_makid & dana_tid dgn tid_sblm dan aid_sblm
           update totalnya saja
           bila berbeda
           a. kurangi langung tid_sblm dan aid_sblm sebesar totalbiaya_sblm
           b. ambil dulu pagu_rencana dana_tid dan dana_makid trus di jumlah pagu_rencana
           sebesar totalbiaya

        */
        $data_sblm_update = 0;
        $count = MatrikPerjalanan::where('id','=',$request->mid)->count();
        if ($count > 0)
        {
            $totalharian = $request->uangharian * $request->harian;
            $totalhotel = $request->nilaihotel * $request->hotelhari;
            $totalbiaya = $totalharian + $totalhotel + $request->nilaiTransport + $request->pengeluaranrill;
            $data = MatrikPerjalanan::where('id','=',$request->mid)->first();

            if ($request->tid_sblm and $request->aid_sblm)
            {
                //turunan anggaran sblmnya sudah ada
                //cek dulu tid_sblm dngn dana_tid kode sama kah?
                if (($request->tid_sblm==$request->dana_tid) and ($request->aid_sblm==$request->dana_makid))
                {
                    $dataTurunanAnggaran = TurunanAnggaran::where('t_id', '=', $request->dana_tid)->first();
                    $rencana_berjalan = $dataTurunanAnggaran->pagu_rencana - $request->totalbiaya_sblm;
                    $sisa_rencana = $dataTurunanAnggaran->pagu_awal- $rencana_berjalan;
                    
                }
                elseif ($request->tid_sblm != $request->dana_tid)
                {
                    $dataTurunanAnggaran = TurunanAnggaran::where('t_id', '=', $request->dana_tid)->first();
                    $sisa_rencana = $dataTurunanAnggaran->pagu_awal - $dataTurunanAnggaran->pagu_rencana;
                    $rencana_berjalan = $dataTurunanAnggaran->pagu_rencana;
                    $data_sblm_update = 1;
                }


                if ($sisa_rencana>=$totalbiaya)
                    {
                        //baru bisa update matrik dan turunan anggaran
                       
                        $dataTurunanAnggaran->pagu_rencana = $rencana_berjalan + $totalbiaya;
                        $dataTurunanAnggaran->update();

                        if ($data_sblm_update==1)
                        {
                            //jika tid_sblm dan dana_tid tidak sama maka upate data turunan anggaran sebelumnya
                            $dataSblm = TurunanAnggaran::where('t_id', '=', $request->tid_sblm)->first();
                            $rencana_sblm = $dataSblm->pagu_rencana;
                            $dataSblm->pagu_rencana = $rencana_sblm - $request->totalbiaya_sblm;
                            $dataSblm->update();
                        }

                        //update data matrik
                        $data->tgl_awal = $request->tglawal;
                        $data->tgl_akhir = $request->tglakhir;
                        $data->kodekab_tujuan = $request->kode_kabkota;
                        $data->lamanya = $request->lamanya;
                        $data->lama_harian = $request->harian;
                        $data->dana_harian = $request->uangharian;
                        $data->total_harian = $totalharian;
                        $data->dana_transport = $request->nilaiTransport;
                        $data->lama_hotel = $request->hotelhari;
                        $data->dana_hotel = $request->nilaihotel;
                        $data->total_hotel = $totalhotel;
                        $data->pengeluaran_rill = $request->pengeluaranrill;
                        $data->total_biaya = $totalbiaya;
                        $data->mak_id = $request->dana_makid;
                        $data->dana_tid = $request->dana_tid;
                        $data->dana_mak = $request->dana_mak;
                        $data->dana_pagu = $request->dana_pagu;
                        $data->dana_unitkerja = $request->dana_kodeunit;
                        $data->update();

                        $pesan_error = '['.$data->kode_trx.'] Matrik perjalanan berhasil di update dan sudah bisa dialokasikan';
                        $warna_error = 'success';
                    }
                else {
                    //tampilkan error tidak bs update matrik dan turunan anggaran
                    $pesan_error = '['.$data->kode_trx.'] Anggaran Keterpaduan yang tersisa tidak mencukupi matrik yang direncanakan';
                    $warna_error = 'danger';
                }
            }
            else {
                //cek dulu apakah dana_tid dan dana_makid ada isian
                if ($request->dana_tid and $request->dana_makid)
                {
                    //turunan anggaran ada isian
                    //cek dulu ketersediaan anggaran
                    $dataTurunanAnggaran = TurunanAnggaran::where('t_id', '=', $request->dana_tid)->first();
                    $sisa_rencana = $dataTurunanAnggaran->pagu_awal - $dataTurunanAnggaran->pagu_rencana;
                    if ($sisa_rencana>=$totalbiaya)
                    {
                        //baru bisa update matrik dan turunan anggaran
                        $rencana_berjalan = $dataTurunanAnggaran->pagu_rencana;
                        $dataTurunanAnggaran->pagu_rencana = $rencana_berjalan + $totalbiaya;
                        $dataTurunanAnggaran->update();

                        //update data matrik
                        $data->tgl_awal = $request->tglawal;
                        $data->tgl_akhir = $request->tglakhir;
                        $data->kodekab_tujuan = $request->kode_kabkota;
                        $data->lamanya = $request->lamanya;
                        $data->lama_harian = $request->harian;
                        $data->dana_harian = $request->uangharian;
                        $data->total_harian = $totalharian;
                        $data->dana_transport = $request->nilaiTransport;
                        $data->lama_hotel = $request->hotelhari;
                        $data->dana_hotel = $request->nilaihotel;
                        $data->total_hotel = $totalhotel;
                        $data->pengeluaran_rill = $request->pengeluaranrill;
                        $data->total_biaya = $totalbiaya;
                        $data->mak_id = $request->dana_makid;
                        $data->dana_tid = $request->dana_tid;
                        $data->dana_mak = $request->dana_mak;
                        $data->dana_pagu = $request->dana_pagu;
                        $data->dana_unitkerja = $request->dana_kodeunit;
                        $data->update();

                        $pesan_error = '['.$data->kode_trx.'] Matrik perjalanan berhasil di update dan sudah bisa dialokasikan';
                        $warna_error = 'success';
                    }
                    else {
                        //tampilkan error tidak bs update matrik dan turunan anggaran
                        $pesan_error = '['.$data->kode_trx.'] Anggaran Keterpaduan yang tersisa tidak mencukupi matrik yang direncanakan';
                        $warna_error = 'danger';
                    }
                    
                }
                else {
                    //data turunan anggaran masih kosong
                    //update isian matrik saja
                    $data->tgl_awal = $request->tglawal;
                    $data->tgl_akhir = $request->tglakhir;
                    $data->kodekab_tujuan = $request->kode_kabkota;
                    $data->lamanya = $request->lamanya;
                    $data->lama_harian = $request->harian;
                    $data->dana_harian = $request->uangharian;
                    $data->total_harian = $totalharian;
                    $data->dana_transport = $request->nilaiTransport;
                    $data->lama_hotel = $request->hotelhari;
                    $data->dana_hotel = $request->nilaihotel;
                    $data->total_hotel = $totalhotel;
                    $data->pengeluaran_rill = $request->pengeluaranrill;
                    $data->total_biaya = $totalbiaya;
                    $data->update();
                    $pesan_error = '['.$data->kode_trx.'] Matrik perjalanan berhasil di update akan tetapi belum bisa di alokasikan';
                    $warna_error = 'warning';
                }
            }
        }
        else {
            //matrik_id tidak ditemukan
            $pesan_error = 'Matrik perjalanan tidak ditemukan';
            $warna_error = 'danger';
        }

        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('matrik.list');
    }
    public function updateAlokasi(Request $request)
    {

    }
    public function updateFlag(Request $request)
    {

    }
}
