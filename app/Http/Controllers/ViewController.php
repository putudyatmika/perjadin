<?php

namespace App\Http\Controllers;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Helpers\Tanggal;
use App\MatrikPerjalanan;
use Auth;
use Generate;
use App\TurunanAnggaran;
use App\SuratTugas;
use App\MultiTujuan;

class ViewController extends Controller
{
    //
    public function view($kodetrx)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $dataTransaksi = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->first();
        return view('verify.index',compact('dataTransaksi','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagSrt','JenisJabatanVar'));
    }
    public function viewTrx($kodetrx)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $FlagTTD = config('globalvar.FlagTTD');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $arr = array(
            'status'=>false,
            'hasil'=>'Kode trx tidak tersedia'
        );
        $count = Transaksi::where('kode_trx','=',$kodetrx)->count();
        if ($count > 0) {
            //$tgl_pelaksanaan=Tanggal::Panjang($data->tgl_awal)." s/d ".Tanggal::Panjang($data->tgl_akhir);

            $data = Transaksi::where('kode_trx','=',$kodetrx)->first();
            if ($data->peg_jabatan < 4) 
            { 
                $jabatan = 'Kepala';
            }
            else 
            {
                $jabatan = 'Staf';
            }
            if ($data->Spd->flag_cetak_tujuan==0)
            {
                $flag_cetak = 'Cetak Langsung';
            }
            else 
            {
                $flag_cetak = 'Kosongkan';
            }
            $hasil = array(
                'kode_trx'=>$kodetrx,
                'trx_id'=>$data->trx_id,
                'm_id'=>$data->matrik_id,
                'a_id'=>$data->Matrik->AnggaranTurunan->a_id,
                'dana_mak'=>$data->Matrik->DanaAnggaran->mak,
                'komponen_kode'=>$data->Matrik->DanaAnggaran->komponen_kode,
                'komponen_nama'=>$data->Matrik->DanaAnggaran->komponen_nama,
                'dana_uraian'=>$data->Matrik->DanaAnggaran->uraian,
                'dana_pagu'=> $data->Matrik->dana_pagu,
                'dana_unitkerja'=>$data->Matrik->dana_unitkerja,
                'dana_unitnama'=>$data->Matrik->DanaUnitkerja->nama,
                'tgl_awal'=> $data->Matrik->tgl_awal,
                'tgl_akhir'=> $data->Matrik->tgl_akhir,
                'lama_harian'=> $data->Matrik->lama_harian,
                'dana_harian'=>$data->Matrik->dana_harian,
                'total_harian'=>$data->Matrik->total_harian,
                'dana_transport'=>$data->Matrik->dana_transport,
                'lama_hotel'=>$data->Matrik->lama_hotel,
                'dana_hotel'=>$data->Matrik->dana_hotel,
                'total_hotel'=>$data->Matrik->total_hotel,
                'pengeluaran_rill'=>$data->Matrik->pengeluaran_rill,
                'total_biaya'=>$data->Matrik->total_biaya,
                'unit_pelaksana'=>$data->Matrik->unit_pelaksana,
                'unitnama_pelaksana'=>$data->Matrik->UnitPelaksana->nama,
                'flag_matrik'=>$data->Matrik->flag_matrik,
                'flag_matrik_nama'=>$MatrikFlag[$data->Matrik->flag_matrik],
                'matrik_dibuat'=>$data->Matrik->created_at,
                't_id'=>$data->Matrik->AnggaranTurunan->t_id,
                'tahun_trx'=>$data->tahun_trx,
                'peg_nama'=>$data->peg_nama,
                'peg_nip'=>$data->peg_nip,
                'peg_gol'=>$data->peg_gol,
                'peg_gol_nama'=>$data->PegGolongan->pangkat.' ('.$data->PegGolongan->gol.')',
                'peg_jabatan'=>$data->peg_jabatan,
                'peg_jabatan_nama'=>$jabatan,
                'peg_unitkerja'=>$data->peg_unitkerja,
                'peg_unitkerja_nama'=>$data->peg_unitkerja_nama,
                'bnyk_hari'=>$data->bnyk_hari,
                'tgl_brkt'=>$data->tgl_brkt,
                'tgl_brkt_nama'=>Tanggal::Panjang($data->tgl_brkt),
                'tgl_balik'=>$data->tgl_balik,
                'tgl_balik_nama'=>Tanggal::Panjang($data->tgl_balik),
                'tugas'=>$data->tugas,
                'kabid_konfirmasi'=>$data->kabid_konfirmasi,
                'kabid_konfirmasi_nama'=>$FlagKonfirmasi[$data->kabid_konfirmasi],
                'kabid_ket'=>$data->kabid_ket,
                'ppk_konfirmasi'=>$data->ppk_konfirmasi,
                'ppk_konfirmasi_nama'=>$FlagKonfirmasi[$data->ppk_konfirmasi],
                'ppk_ket'=>$data->ppk_ket,
                'kpa_konfirmasi'=>$data->kpa_konfirmasi,
                'kpa_konfirmasi_nama'=>$FlagKonfirmasi[$data->kpa_konfirmasi],
                'kpa_ket'=>$data->kpa_ket,
                'flag_trx'=>$data->flag_trx,
                'flag_trx_nama'=>$FlagTrx[$data->flag_trx],
                'trx_dibuat'=>$data->created_at,
                'tujuan_kode'=>$data->Matrik->kodekab_tujuan,
                'tujuan_nama'=>$data->Matrik->Tujuan->nama_kabkota,
                'tujuan_kepala'=>$data->Matrik->Tujuan->kepala,
                'tujuan_nip'=>$data->Matrik->Tujuan->nip_kepala,
                'tujuan_rate'=>$data->Matrik->Tujuan->rate_darat,
                'srt_id'=>$data->SuratTugas->srt_id,
                'nomor_surat'=>$data->SuratTugas->nomor_surat,
                'tgl_surat'=>$data->SuratTugas->tgl_surat,
                'ttd_nip'=>$data->SuratTugas->ttd_nip,
                'ttd_jabatan'=>$data->SuratTugas->ttd_jabatan,
                'ttd_nama'=>$data->SuratTugas->ttd_nama,
                'flag_ttd'=>$data->SuratTugas->flag_ttd,
                'flag_ttd_nama'=>$FlagTTD[$data->SuratTugas->flag_ttd],
                'flag_surattugas'=>$data->SuratTugas->flag_surattugas,
                'flag_surattugas_nama'=>$FlagSrt[$data->SuratTugas->flag_surattugas],
                'surattugas_dibuat'=>$data->SuratTugas->created_at,
                'spd_id'=>$data->Spd->spd_id,
                'nomor_spd'=>$data->Spd->nomor_spd,
                'kendaraan'=>$data->Spd->kendaraan,
                'kendaraan_nama'=>$FlagKendaraan[$data->Spd->kendaraan],
                'ppk_nip'=>$data->Spd->ppk_nip,
                'ppk_nama'=>$data->Spd->ppk_nama,
                'flag_cetak_tujuan'=>$data->Spd->flag_cetak_tujuan,
                'flag_cetak_tujuan_nama'=>$flag_cetak
                
            );
            $arr = array (
                'status'=>true,
                'hasil'=>$hasil
            );

        }
        //dd($arr);
        return Response()->json($arr);
    }

    public function Transaksi($kodetrx)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $FlagTTD = config('globalvar.FlagTTD');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $arr = array(
            'status'=>false,
            'hasil'=>'Kode trx tidak tersedia'
        );
        $count = Transaksi::where('kode_trx','=',$kodetrx)->count();
        if ($count > 0) {
            //$tgl_pelaksanaan=Tanggal::Panjang($data->tgl_awal)." s/d ".Tanggal::Panjang($data->tgl_akhir);

            $data = Transaksi::where('kode_trx','=',$kodetrx)->first();
            if ($data->peg_jabatan < 4) 
            { 
                $jabatan = 'Kepala';
            }
            else 
            {
                $jabatan = 'Staf';
            }
            if ($data->Spd->flag_cetak_tujuan==0)
            {
                $flag_cetak = 'Cetak Langsung';
            }
            else 
            {
                $flag_cetak = 'Kosongkan';
            }
            $hasil = array(
                'kode_trx'=>$kodetrx,
                'trx_id'=>$data->trx_id,
                'm_id'=>$data->matrik_id,
                'a_id'=>$data->Matrik->AnggaranTurunan->a_id,
                'dana_mak'=>$data->Matrik->DanaAnggaran->mak,
                'komponen_kode'=>$data->Matrik->DanaAnggaran->komponen_kode,
                'komponen_nama'=>$data->Matrik->DanaAnggaran->komponen_nama,
                'dana_uraian'=>$data->Matrik->DanaAnggaran->uraian,
                'dana_pagu'=> $data->Matrik->dana_pagu,
                'dana_unitkerja'=>$data->Matrik->dana_unitkerja,
                'dana_unitnama'=>$data->Matrik->DanaUnitkerja->nama,
                'tgl_awal'=> $data->Matrik->tgl_awal,
                'tgl_akhir'=> $data->Matrik->tgl_akhir,
                'lama_harian'=> $data->Matrik->lama_harian,
                'dana_harian'=>$data->Matrik->dana_harian,
                'total_harian'=>$data->Matrik->total_harian,
                'dana_transport'=>$data->Matrik->dana_transport,
                'lama_hotel'=>$data->Matrik->lama_hotel,
                'dana_hotel'=>$data->Matrik->dana_hotel,
                'total_hotel'=>$data->Matrik->total_hotel,
                'pengeluaran_rill'=>$data->Matrik->pengeluaran_rill,
                'total_biaya'=>$data->Matrik->total_biaya,
                'unit_pelaksana'=>$data->Matrik->unit_pelaksana,
                'unitnama_pelaksana'=>$data->Matrik->UnitPelaksana->nama,
                'flag_matrik'=>$data->Matrik->flag_matrik,
                'flag_matrik_nama'=>$MatrikFlag[$data->Matrik->flag_matrik],
                'matrik_dibuat'=>$data->Matrik->created_at,
                't_id'=>$data->Matrik->AnggaranTurunan->t_id,
                'tahun_trx'=>$data->tahun_trx,
                'peg_nama'=>$data->peg_nama,
                'peg_nip'=>$data->peg_nip,
                'peg_gol'=>$data->peg_gol,
                'peg_gol_nama'=>$data->PegGolongan->pangkat.' ('.$data->PegGolongan->gol.')',
                'peg_jabatan'=>$data->peg_jabatan,
                'peg_jabatan_nama'=>$jabatan,
                'peg_unitkerja'=>$data->peg_unitkerja,
                'peg_unitkerja_nama'=>$data->peg_unitkerja_nama,
                'bnyk_hari'=>$data->bnyk_hari,
                'tgl_brkt'=>$data->tgl_brkt,
                'tgl_brkt_nama'=>Tanggal::Panjang($data->tgl_brkt),
                'tgl_balik'=>$data->tgl_balik,
                'tgl_balik_nama'=>Tanggal::Panjang($data->tgl_balik),
                'tugas'=>$data->tugas,
                'kabid_konfirmasi'=>$data->kabid_konfirmasi,
                'kabid_konfirmasi_nama'=>$FlagKonfirmasi[$data->kabid_konfirmasi],
                'kabid_ket'=>$data->kabid_ket,
                'ppk_konfirmasi'=>$data->ppk_konfirmasi,
                'ppk_konfirmasi_nama'=>$FlagKonfirmasi[$data->ppk_konfirmasi],
                'ppk_ket'=>$data->ppk_ket,
                'kpa_konfirmasi'=>$data->kpa_konfirmasi,
                'kpa_konfirmasi_nama'=>$FlagKonfirmasi[$data->kpa_konfirmasi],
                'kpa_ket'=>$data->kpa_ket,
                'flag_trx'=>$data->flag_trx,
                'flag_trx_nama'=>$FlagTrx[$data->flag_trx],
                'trx_dibuat'=>$data->created_at,
                'tujuan_kode'=>$data->Matrik->kodekab_tujuan,
                'tujuan_nama'=>$data->Matrik->Tujuan->nama_kabkota,
                'tujuan_kepala'=>$data->Matrik->Tujuan->kepala,
                'tujuan_nip'=>$data->Matrik->Tujuan->nip_kepala,
                'tujuan_rate'=>$data->Matrik->Tujuan->rate_darat,
                'srt_id'=>$data->SuratTugas->srt_id,
                'nomor_surat'=>$data->SuratTugas->nomor_surat,
                'tgl_surat'=>$data->SuratTugas->tgl_surat,
                'ttd_nip'=>$data->SuratTugas->ttd_nip,
                'ttd_jabatan'=>$data->SuratTugas->ttd_jabatan,
                'ttd_nama'=>$data->SuratTugas->ttd_nama,
                'flag_ttd'=>$data->SuratTugas->flag_ttd,
                'flag_ttd_nama'=>$FlagTTD[$data->SuratTugas->flag_ttd],
                'flag_surattugas'=>$data->SuratTugas->flag_surattugas,
                'flag_surattugas_nama'=>$FlagSrt[$data->SuratTugas->flag_surattugas],
                'surattugas_dibuat'=>$data->SuratTugas->created_at,
                'spd_id'=>$data->Spd->spd_id,
                'nomor_spd'=>$data->Spd->nomor_spd,
                'kendaraan'=>$data->Spd->kendaraan,
                'kendaraan_nama'=>$FlagKendaraan[$data->Spd->kendaraan],
                'ppk_nip'=>$data->Spd->ppk_nip,
                'ppk_nama'=>$data->Spd->ppk_nama,
                'flag_cetak_tujuan'=>$data->Spd->flag_cetak_tujuan,
                'flag_cetak_tujuan_nama'=>$flag_cetak,
                'kuitansi_id'=>$data->Kuitansi->kuitansi_id,
                'kuitansi_totalbiaya'=>$data->Kuitansi->total_biaya,
                'kuitansi_tgl'=>$data->Kuitansi->tgl_kuitansi,
                'kuitansi_tgl_nama'=>Tanggal::Panjang($data->Kuitansi->tgl_kuitansi),
                'kuitansi_bendahara_nip'=>$data->Kuitansi->bendahara_nip,
                'kuitansi_bendahara_nama'=>$data->Kuitansi->bendahara_nama,
                'kuitansi_flag'=>$data->Kuitansi->flag_kuitansi,
                'kuitansi_flag_nama'=>$FlagSrt[$data->Kuitansi->flag_kuitansi],
                'kuitansi_lama'=>$data->Kuitansi->harian_lama,
                'kuitansi_harian'=>$data->Kuitansi->harian_rupiah
                
            );
            $arr = array (
                'status'=>true,
                'hasil'=>$hasil
            );

        }
        //dd($arr);
        return Response()->json($arr);
    }
    public function cariSrt()
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        if (request('kode_trx'))
        {
            $dataTransaksi = Transaksi::where('kode_trx','=',request('kode_trx'))->first();
        }
        else 
        {
            $dataTransaksi='';
        }
        return view('verify.cari',compact('dataTransaksi','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagSrt','JenisJabatanVar'));
    }
    public function cariTransaksi($trxid)
    {
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $Bulan = config('globalvar.Bulan');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $JenisPerjadin = config('globalvar.JenisPerjadin');
        $TipePerjadin = config('globalvar.TipePerjadin');
        $arr = array(
            'status'=>false,
            'hasil'=>'Transaksi tidak tersedia'
        );
        $count = Transaksi::where('trx_id','=',$trxid)->count();
        if ($count > 0) {
            $data = Transaksi::where('trx_id','=',$trxid)->first();
            if ($data->peg_jabatan < 4) 
            { 
                $jabatan = 'Kepala';
            }
            else 
            {
                $jabatan = 'Staf';
            }
            //cek SPD sudah ada belum
            if (!empty($data->Spd)) 
            {
                if ($data->Spd->flag_cetak_tujuan==0)
                {
                    $flag_cetak = 'Cetak Langsung';
                }
                else 
                {
                    $flag_cetak = 'Kosongkan';
                }
                $data_spd = array(
                    'spd_id'=>$data->Spd->spd_id,
                    'nomor_spd'=>$data->Spd->nomor_spd,
                    'kendaraan'=>$data->Spd->kendaraan,
                    'kendaraan_nama'=>$FlagKendaraan[$data->Spd->kendaraan],
                    'ppk_nip'=>$data->Spd->ppk_nip,
                    'ppk_nama'=>$data->Spd->ppk_nama,
                    'flag_cetak_tujuan'=>$data->Spd->flag_cetak_tujuan,
                    'flag_cetak_tujuan_nama'=>$flag_cetak
                );
                $arr_spd = array(
                    'status_spd'=>true,
                    'hasil_spd'=>$data_spd,
                );
            }
            else 
            {
                //spd belum
                $arr_spd = array(
                    'status_spd'=>false,
                    'hasil_spd'=>'SPD belum diset',
                );
            }
            //cek surat tugas sudah di set
            if (!empty($data->SuratTugas))
            {
                $data_srttugas = array(
                    'srt_id'=>$data->SuratTugas->srt_id,
                    'nomor_surat'=>$data->SuratTugas->nomor_surat,
                    'tgl_surat'=>$data->SuratTugas->tgl_surat,
                    'ttd_nip'=>$data->SuratTugas->ttd_nip,
                    'ttd_jabatan'=>$data->SuratTugas->ttd_jabatan,
                    'ttd_nama'=>$data->SuratTugas->ttd_nama,
                    'flag_ttd'=>$data->SuratTugas->flag_ttd,
                    'flag_ttd_nama'=>$FlagTTD[$data->SuratTugas->flag_ttd],
                    'flag_surattugas'=>$data->SuratTugas->flag_surattugas,
                    'flag_surattugas_nama'=>$FlagSrt[$data->SuratTugas->flag_surattugas],
                    'surattugas_dibuat'=>$data->SuratTugas->created_at,
                );
                $arr_surattugas = array(
                    'status_surattugas'=>true,
                    'hasil_surattugas'=>$data_srttugas
                );
            }
            else 
            {
                $arr_surattugas = array(
                    'status_surattugas'=>false,
                    'hasil_surattugas'=>'Surat Tugas belum diset'
                );
            }
            //cek kuitansi
            if (!empty($data->Kuitansi))
            {
                $data_kuitansi = array(
                    'kuitansi_id'=>$data->Kuitansi->kuitansi_id ,
                    'tahun_kuitansi'=>$data->Kuitansi->tahun_kuitansi,
                    'tgl_kuitansi'=>$data->Kuitansi->tgl_kuitansi,
                    'tgl_kuitansi_nama'=>Tanggal::Panjang($data->Kuitansi->tgl_kuitansi),
                    'bendahara_nip'=>$data->Kuitansi->bendahara_nip,
                    'bendahara_nama'=>$data->Kuitansi->bendahara_nama,
                    'total_biaya'=>$data->Kuitansi->total_biaya,
                    'harian_rupiah'=>$data->Kuitansi->harian_rupiah,
                    'harian_lama'=>$data->Kuitansi->harian_lama,
                    'harian_total'=>$data->Kuitansi->harian_total,
                    'hotel_rupiah'=>$data->Kuitansi->hotel_rupiah,
                    'hotel_lama'=>$data->Kuitansi->hotel_lama,
                    'hotel_total'=>$data->Kuitansi->hotel_total,
                    'hotel_flag'=>$data->Kuitansi->hotel_flag,
                    'transport_rupiah'=>$data->Kuitansi->transport_rupiah,
                    'transport_flag'=>$data->Kuitansi->transport_flag,
                    'rill1_ket'=>$data->Kuitansi->rill1_ket,
                    'rill1_ket'=>$data->Kuitansi->rill1_ket,
                    'rill1_flag'=>$data->Kuitansi->rill1_flag,
                    'rill2_ket'=>$data->Kuitansi->rill2_ket,
                    'rill2_rupiah'=>$data->Kuitansi->rill2_rupiah,
                    'rill2_flag'=>$data->Kuitansi->rill2_flag,
                    'rill3_ket'=>$data->Kuitansi->rill3_ket,
                    'rill3_rupiah'=>$data->Kuitansi->rill3_rupiah,
                    'rill3_flag'=>$data->Kuitansi->rill3_flag,
                    'rill_total'=>$data->Kuitansi->rill_total,
                    'flag_kuitansi'=>$data->Kuitansi->flag_kuitansi,
                    'flag_kuitansi_nama'=>$FlagSrt[$data->Kuitansi->flag_kuitansi],
                    'flag_jenis_kuitansi'=>$data->Kuitansi->flag_jenisperjadin,
                    'flag_jenis_kuitansi_nama'=>$JenisPerjadin[$data->Kuitansi->flag_jenisperjadin],
                    'kuitansi_dibuat'=>$data->Kuitansi->created_at,

                    
                );
                $arr_kuitansi = array(
                    'status_kuitansi'=>true,
                    'hasil_kuitansi'=>$data_kuitansi
                );
            }
            else 
            {
                $arr_kuitansi = array(
                    'status_kuitansi'=>false,
                    'hasil_kuitansi'=>'Kuitansi belum diset'
                );
            }
            //cek pegawai yang jalan sudah dialokasi
            if (!empty($data->peg_nip))
            {
                $data_pegawai = array(
                'peg_nama'=>$data->peg_nama,
                'peg_nip'=>$data->peg_nip,
                'peg_gol'=>$data->peg_gol,
                'peg_gol_nama'=>$data->PegGolongan->pangkat.' ('.$data->PegGolongan->gol.')',
                'peg_jabatan'=>$data->peg_jabatan,
                'peg_jabatan_nama'=>$jabatan,
                'peg_unitkerja'=>$data->peg_unitkerja,
                'peg_unitkerja_nama'=>$data->peg_unitkerja_nama,
                );
                $arr_pegawai = array(
                    'status_pegawai'=>true,
                    'hasil_pegawai'=>$data_pegawai
                );
            }
            else 
            {
                $arr_pegawai = array(
                    'status_pegawai'=>false,
                    'hasil_pegawai'=>'Pegawai belum diset'
                );
            }
            //cek multi tujuan apa ngga
            if ($data->Matrik->tipe_perjadin == 2)
            {
                //multitujuan
                $arr_tujuan = array();
                foreach ($data->Matrik->MultiTujuan as $item) {
                    $arr_tujuan[]=array(
                        'tujuan_nomor'=>$item->urutan_tujuan,
                        'tujuan_kode'=>$item->kodekab_tujuan,
                        'tujuan_nama'=>$item->namakabkota_tujuan,
                        'tujuan_kepala'=>$item->Tujuan->kepala,
                        'tujuan_nip'=>$item->Tujuan->nip_kepala,
                        'tujuan_rate'=>$item->Tujuan->rate_darat,
                    );
                }
                
            }
            else 
            {
                //satu tujuan
                $arr_tujuan = array(
                    'tujuan_kode'=>$data->Matrik->kodekab_tujuan,
                    'tujuan_nama'=>$data->Matrik->Tujuan->nama_kabkota,
                    'tujuan_kepala'=>$data->Matrik->Tujuan->kepala,
                    'tujuan_nip'=>$data->Matrik->Tujuan->nip_kepala,
                    'tujuan_rate'=>$data->Matrik->Tujuan->rate_darat,
                );
            }
            $hasil = array(
                'trx_id'=>$trxid,
                'kode_trx'=>$data->kode_trx,
                'tahun_trx'=>$data->tahun_trx,
                'bnyk_hari'=>$data->bnyk_hari,
                'tgl_brkt'=>$data->tgl_brkt,
                'tgl_brkt_nama'=>Tanggal::Panjang($data->tgl_brkt),
                'tgl_balik'=>$data->tgl_balik,
                'tgl_balik_nama'=>Tanggal::Panjang($data->tgl_balik),
                'tugas'=>$data->tugas,
                'kabid_konfirmasi'=>$data->kabid_konfirmasi,
                'kabid_konfirmasi_nama'=>$FlagKonfirmasi[$data->kabid_konfirmasi],
                'kabid_ket'=>$data->kabid_ket,
                'ppk_konfirmasi'=>$data->ppk_konfirmasi,
                'ppk_konfirmasi_nama'=>$FlagKonfirmasi[$data->ppk_konfirmasi],
                'ppk_ket'=>$data->ppk_ket,
                'kpa_konfirmasi'=>$data->kpa_konfirmasi,
                'kpa_konfirmasi_nama'=>$FlagKonfirmasi[$data->kpa_konfirmasi],
                'kpa_ket'=>$data->kpa_ket,
                'flag_trx'=>$data->flag_trx,
                'flag_trx_nama'=>$FlagTrx[$data->flag_trx],
                'form_nomor_surat'=>$data->form_nomor_surat,
                'form_tgl_surat'=>$data->form_tgl_surat,
                'form_unitkerja_kode'=>$data->form_unitkerja_kode,
                'form_unitkerja_nama'=>$data->form_unitkerja_nama,
                'form_ttd_nip'=>$data->form_ttd_nip,
                'form_ttd_nama'=>$data->form_ttd_nama,
                'form_ttd_kepala_nip'=>$data->form_ttd_kepala_nip,
                'form_ttd_kepala_nama'=>$data->form_ttd_kepala_nama,
                'trx_dibuat'=>$data->created_at, 
                'trx_diupdate'=>$data->updated_at
            );
            $arr_matrik = array(
                'm_id'=>$data->matrik_id,
                'a_id'=>$data->Matrik->AnggaranTurunan->a_id,
                't_id'=>$data->Matrik->AnggaranTurunan->t_id,
                'dana_mak'=>$data->Matrik->DanaAnggaran->mak,
                'prog_kode'=>$data->Matrik->DanaAnggaran->prog_kode,
                'prog_nama'=>$data->Matrik->DanaAnggaran->prog_nama,
                'keg_kode'=>$data->Matrik->DanaAnggaran->keg_kode,
                'keg_nama'=>$data->Matrik->DanaAnggaran->keg_nama,
                'kro_kode'=>$data->Matrik->DanaAnggaran->kro_kode,
                'kro_nama'=>$data->Matrik->DanaAnggaran->kro_nama,
                'output_kode'=>$data->Matrik->DanaAnggaran->output_kode,
                'output_nama'=>$data->Matrik->DanaAnggaran->output_nama,
                'komponen_kode'=>$data->Matrik->DanaAnggaran->komponen_kode,
                'komponen_nama'=>$data->Matrik->DanaAnggaran->komponen_nama,
                'subkomponen_kode'=>$data->Matrik->DanaAnggaran->subkomponen_kode,
                'subkomponen_nama'=>$data->Matrik->DanaAnggaran->subkomponen_nama,
                'dana_uraian'=>$data->Matrik->DanaAnggaran->uraian,
                'dana_pagu'=> $data->Matrik->dana_pagu,
                'dana_unitkerja'=>$data->Matrik->dana_unitkerja,
                'dana_unitnama'=>$data->Matrik->DanaUnitkerja->nama,
                'tgl_awal'=>$data->Matrik->tgl_awal,
                'tgl_awal_nama'=>Tanggal::Panjang($data->Matrik->tgl_awal),
                'tgl_akhir'=>$data->Matrik->tgl_akhir,
                'tgl_akhir_nama'=>Tanggal::Panjang($data->Matrik->tgl_akhir),
                'lama_harian'=> $data->Matrik->lama_harian,
                'dana_harian'=>$data->Matrik->dana_harian,
                'total_harian'=>$data->Matrik->total_harian,
                'dana_transport'=>$data->Matrik->dana_transport,
                'lama_hotel'=>$data->Matrik->lama_hotel,
                'dana_hotel'=>$data->Matrik->dana_hotel,
                'total_hotel'=>$data->Matrik->total_hotel,
                'pengeluaran_rill'=>$data->Matrik->pengeluaran_rill,
                'total_biaya'=>$data->Matrik->total_biaya,
                'unit_pelaksana'=>$data->Matrik->unit_pelaksana,
                'unitnama_pelaksana'=>$data->Matrik->UnitPelaksana->nama,
                'flag_matrik'=>$data->Matrik->flag_matrik,
                'flag_matrik_nama'=>$MatrikFlag[$data->Matrik->flag_matrik],
                'jenis_perjadin'=>$data->Matrik->jenis_perjadin,
                'jenis_perjadin_nama'=>$JenisPerjadin[$data->Matrik->jenis_perjadin],
                'tipe_perjadin'=>$data->Matrik->tipe_perjadin,
                'tipe_perjadin_nama'=>$TipePerjadin[$data->Matrik->tipe_perjadin],
                'matrik_dibuat'=>$data->Matrik->created_at,
                'matrik_diupdate'=>$data->Matrik->updated_at
            );
            $arr = array (
                'status'=>true,
                'hasil'=>$hasil,
                'spd'=>$arr_spd,
                'surattugas'=>$arr_surattugas,
                'kuitansi'=>$arr_kuitansi,
                'pegawai'=>$arr_pegawai,
                'tujuan'=>$arr_tujuan,
                'matrik'=>$arr_matrik
            );

        }
        //dd($arr);
        return Response()->json($arr);
    }
}
