<?php

namespace App\Imports;
use Session;
use App\MatrikPerjalanan;
use App\Anggaran;
use App\Transaksi;
use App\SuratTugas;
use App\Spd;
use App\Kuitansi;
use Generate;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //TAMBAHKAN CODE INI
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class DataImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $tahun_anggaran = Session::get('tahun_anggaran');
        foreach ($rows as $row)
        {
            //geneate kode transaksi
           // $hasil_kode = Generate::Kode(6)
            //batas kode trx

            /*
            langkah-langkah import data excel perjadin ke sistem perjadin
            1. Import ke Tabel Matrik generate matrik_id, kode_trx dan unit pelaksana dan insert ke tabel transaksi
            2. Update tabel transaksi sesuai kode_trx 
            3. insert tabel surattugas sesuai trx_id
            4. insert spd sesuai trx_id
            5. insert kuitansi sesuai trx_id
            $data = [
            [
                 //'tahun_matrik' => null,
                'tgl_awal' => 'Format : YYYY-MM-DD',
                'tgl_akhir' => 'Cth : 2019-12-30',
                'kodekab_tujuan' => 'kode 4 digit',
                'lamanya' => null,
                'mak_id'=> 'lihat di menu anggaran ',
                'dana_id'=> 'lihat di menu anggaran ',
                'dana_mak'=> 'lihat di menu anggaran ',
                'dana_pagu'=> 'lihat di menu anggaran ',
                'dana_unitkerja' => 'kode 5 digit',
                'peg_nip'=> 'Cth : 19900101 201001 1 002',
                'tugas'=> null,
                'peg_unitkerja'=>'kode 5 digit',
                'nomor_surat' => null,
                'tgl_surat' => 'Format : YYYY-MM-DD',
                'ttd_nip' => 'Cth : 19900101 201001 1 002',
                'ttd_jabatan' => null,
                'ttd_nama' => 'Nama Lengkap',
                'flag_ttd' => '0 : Kepala, 1 : An.',
                'nomor_spd' => null,
                'kendaraan' => '1 : Kendaraan Umum, 2 : Kendaraan Dinas, 3 : Plane',
                'ppk_nip' => 'Cth : 19900101 201001 1 002',
                'ppk_nama' => null,
                'flag_cetak_tujuan' => '0: langsung, 1 : kosongan',
                'total_biaya' => null,
                'tgl_kuitansi' => 'Format : YYYY-MM-DD',
                'harian_rupiah'=> null,
                'harian_lama' => null,
                'harian_total' => null,
                'hotel_rupiah' => null,
                'hotel_lama' => null,
                'hotel_total' => null,
                'hotel_flag' => null,
                'transport_rupiah' => null,
                'transport_ket' => null,
                'transport_flag' => null,
                'rill1_ket' => null,
                'rill1_rupiah' => null,
                'rill1_flag' => null,
                'rill2_ket' => null,
                'rill2_rupiah' => null,
                'rill2_flag' => null,
                'rill3_ket' => null,
                'rill3_rupiah'=>null,
                'rill3_flag' => null,
                'rill_total' => null,
                'bendahara_nip' => 'Cth : 19900101 201001 1 002',
                'bendahara_nama' => null,
                'flag_matrik' => '2 : terlaksana, 5 : Batal',
                'flag_trx' => '3 : batal, 7 : terlaksana',
                'flag_srt' => '2 : terlaksana, 3 : Batal',
                'flag_spd' => '2 : terlaksana, 3 : Batal',
                'flag_kuitansi' => '2 : terlaksana, 3 : Batal'
            ]
        ];
        														created_at	updated_at

            */
            //generate kodetrx 
            $kode_trx = Generate::Kode(6);
            //tambah matrik
            if ($row['kendaraan']>1) {
                $dana_transport = $row['transport_rupiah'];
                $pengeluaran_rill = $row['rill_total'];
            }
            else {
                $dana_transport = $row['rill_total'];
                $pengeluaran_rill = 0;
            }
            $datamatrik = new MatrikPerjalanan();
            $datamatrik -> tahun_matrik = $tahun_anggaran;
            $datamatrik -> kode_trx = $kode_trx;
            $datamatrik -> tgl_awal = $row['tgl_awal'];
            $datamatrik -> tgl_akhir = $row['tgl_akhir'];
            $datamatrik -> kodekab_tujuan = $row['kodekab_tujuan'];
            $datamatrik -> lamanya = $row['lamanya'];
            $datamatrik -> mak_id = $row['mak_id'];
            $datamatrik -> dana_tid = $row['dana_tid'];
            $datamatrik -> dana_mak = $row['dana_mak'];
            $datamatrik -> dana_pagu = $row['dana_pagu'];
            $datamatrik -> dana_unitkerja = $row['dana_unitkerja'];
            $datamatrik -> lama_harian = $row['harian_lama'];
            $datamatrik -> dana_harian = $row['harian_rupiah'];
            $datamatrik -> total_harian = $row['harian_total'];
            $datamatrik -> dana_transport = $dana_transport;
            $datamatrik -> lama_hotel = $row['hotel_lama'];
            $datamatrik -> dana_hotel = $row['hotel_rupiah'];
            $datamatrik -> total_hotel = $row['hotel_total'];
            $datamatrik -> pengeluaran_rill = $pengeluaran_rill;
            $datamatrik -> total_biaya = $row['total_biaya'];
            $datamatrik -> unit_pelaksana = $row['peg_unitkerja'];
            $datamatrik -> flag_matrik = $row['flag_matrik'];
            $datamatrik -> save();
            //tambah transaksi
            //												created_at	updated_at
            $datamatrik = MatrikPerjalanan::where('kode_trx','=',$kode_trx)->first();
            if ($row['flag_trx'] == 3)
            {
                $kpa_konfirmasi = 2;
                $kpa_ket = "Pembatalan";
            }
            else {
                $kpa_konfirmasi = 1;
                $kpa_ket = null;
            }
            $datatrx = new Transaksi();
            $datatrx -> kode_trx = $kode_trx;
            $datatrx -> matrik_id = $datamatrik -> id;
            $datatrx -> tahun_trx = $tahun_anggaran;
            $datatrx -> peg_nip = $row['peg_nip'];
            $datatrx -> bnyk_hari = $row['lamanya'];
            $datatrx -> tgl_brkt = $row['tgl_awal'];
            $datatrx -> tgl_balik = $row['tgl_akhir'];
            $datatrx -> tugas = $row['tugas'];
            $datatrx -> kabid_konfirmasi = 1;
            $datatrx -> ppk_konfirmasi = 1;
            $datatrx -> kpa_konfirmasi = $kpa_konfirmasi;
            $datatrx -> kpa_ket = $kpa_ket;
            $datatrx -> flag_trx = $row['flag_trx'];
            $datatrx -> save();

            //lanjut ke surat tugas apa tidak
            if ($row['flag_trx'] == 7) {
                //ambil trx_id
                $datatrx = Transaksi::where('kode_trx','=',$kode_trx)->first();
                $trx_id = $datatrx -> trx_id;
                //insert ke srt tugas
                //srt_id									srt_ket	created_at	updated_at
                $datasrt = new SuratTugas();
                $datasrt -> trx_id = $trx_id;
                $datasrt -> tahun_srt = $tahun_anggaran;
                $datasrt -> nomor_surat = $row['nomor_surat'];
                $datasrt -> tgl_surat = $row['tgl_surat'];
                $datasrt -> ttd_nip = $row['ttd_nip'];
                $datasrt -> ttd_jabatan = $row['ttd_jabatan'];
                $datasrt -> ttd_nama = $row['ttd_nama'];
                $datasrt -> flag_ttd = $row['flag_ttd'];
                $datasrt -> flag_surattugas = $row['flag_srt'];
                $datasrt -> save();

                //insert spd
                									
                $dataspd = new Spd();
                $dataspd -> trx_id = $trx_id;
                $dataspd -> tahun_spd = $tahun_anggaran;
                $dataspd -> nomor_spd = $row['nomor_spd'];
                $dataspd -> kendaraan = $row['kendaraan'];
                $dataspd -> ppk_nip = $row['ppk_nip'];
                $dataspd -> ppk_nama = $row['ppk_nama'];
                $dataspd -> flag_ttd = $row['flag_ttd'];
                $dataspd -> flag_spd = $row['flag_spd'];
                $dataspd -> flag_cetak_tujuan = $row['flag_cetak_tujuan'];
                $dataspd -> save();

                //insert kuitansi
                $dataKuitansi = new Kuitansi();
                $dataKuitansi -> trx_id = $trx_id;
                $dataKuitansi -> tahun_kuitansi = $tahun_anggaran;
                $dataKuitansi -> total_biaya = $row['total_biaya'];
                $dataKuitansi -> tgl_kuitansi = $row['tgl_kuitansi'];
                $dataKuitansi -> harian_rupiah = $row['harian_rupiah'];
                $dataKuitansi -> harian_lama = $row['harian_lama'];
                $dataKuitansi -> harian_total = $row['harian_total'];
                $dataKuitansi -> hotel_rupiah = $row['hotel_rupiah'];
                $dataKuitansi -> hotel_lama = $row['hotel_lama'];
                $dataKuitansi -> hotel_total = $row['hotel_total'];
                $dataKuitansi -> hotel_flag = $row['hotel_flag'];
                $dataKuitansi -> transport_rupiah = $row['transport_rupiah'];
                $dataKuitansi -> transport_ket = $row['transport_ket'];
                $dataKuitansi -> transport_flag = $row['transport_flag'];
                $dataKuitansi -> rill1_ket = $row['rill1_ket'];
                $dataKuitansi -> rill1_rupiah = $row['rill1_rupiah'];
                $dataKuitansi -> rill1_flag = $row['rill1_flag'];
                $dataKuitansi -> rill2_ket = $row['rill2_ket'];
                $dataKuitansi -> rill2_rupiah = $row['rill2_rupiah'];
                $dataKuitansi -> rill2_flag = $row['rill2_flag'];
                $dataKuitansi -> rill3_ket = $row['rill3_ket'];
                $dataKuitansi -> rill3_rupiah = $row['rill3_rupiah'];
                $dataKuitansi -> rill_total = $row['rill_total'];
                $dataKuitansi -> bendahara_nip = $row['bendahara_nip'];
                $dataKuitansi -> bendahara_nama = $row['bendahara_nama'];
                $dataKuitansi -> flag_kuitansi = $row['flag_kuitansi'];
                $dataKuitansi -> save();

                //update turunan anggaran
                $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id','=',$row['dana_tid'])->first();
                $dataTurunanAnggaran -> pagu_realisasi = $dataTurunanAnggaran->pagu_realisasi+$row['total_biaya'];
                $dataTurunanAnggaran -> pagu_rencana = $dataTurunanAnggaran->pagu_rencana + $row['total_biaya'];
                $dataTurunanAnggaran -> update();

                $dataAnggaran = \App\Anggaran::where('id','=',$row['mak_id'])->first();
                $dataAnggaran -> realisasi_pagu = $dataAnggaran->realisasi_pagu+$row['total_biaya'];
                $dataAnggaran -> update();
                }
            
        }
    }
    public function batchSize(): int
    {
        return 1000;
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}
