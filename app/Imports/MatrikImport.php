<?php

namespace App\Imports;
use Generate;
use Session;
use App\MatrikPerjalanan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //TAMBAHKAN CODE INI
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class MatrikImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
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
            $kode_trx = Generate::Kode(6);
            $totalbiaya = ($row['lamanya'] * $row['dana_harian'])+$row['transport']+(($row['lamanya']-1) * $row['dana_hotel'])+$row['pengeluaran_rill'];
            $datamatrik = new MatrikPerjalanan();
            $datamatrik -> tahun_matrik = $tahun_anggaran;
            $datamatrik -> kode_trx = $kode_trx;
            $datamatrik -> tgl_awal = $row['tgl_awal'];
            $datamatrik -> tgl_akhir = $row['tgl_akhir'];
            $datamatrik -> kodekab_tujuan = $row['kodekab_tujuan'];
            $datamatrik -> lamanya = $row['lamanya'];
            $datamatrik -> lama_harian = $row['lamanya'];
            $datamatrik -> dana_harian = $row['dana_harian'];
            $datamatrik -> total_harian = $row['lamanya'] * $row['dana_harian'];
            $datamatrik -> dana_transport = $row['transport'];
            $datamatrik -> lama_hotel = $row['lamanya']-1;
            $datamatrik -> dana_hotel = $row['dana_hotel'];
            $datamatrik -> total_hotel = ($row['lamanya']-1) * $row['dana_hotel'];
            $datamatrik -> pengeluaran_rill = $row['pengeluaran_rill'];
            $datamatrik -> total_biaya = $totalbiaya;
            $datamatrik -> save();
            
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
