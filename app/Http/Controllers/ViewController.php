<?php

namespace App\Http\Controllers;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Helpers\Tanggal;

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
        $count = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->count();
        if ($count > 0) {
            //$tgl_pelaksanaan=Tanggal::Panjang($data->tgl_awal)." s/d ".Tanggal::Panjang($data->tgl_akhir);

            $data = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->first();
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
        $count = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->count();
        if ($count > 0) {
            //$tgl_pelaksanaan=Tanggal::Panjang($data->tgl_awal)." s/d ".Tanggal::Panjang($data->tgl_akhir);

            $data = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->first();
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
}
