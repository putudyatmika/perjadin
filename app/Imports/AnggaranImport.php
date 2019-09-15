<?php

namespace App\Imports;
use Session;
use App\Anggaran;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //TAMBAHKAN CODE INI
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class AnggaranImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
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
            $dataAnggaran = new Anggaran();
            $dataAnggaran -> tahun_anggaran =  $tahun_anggaran;
            $dataAnggaran -> mak = $row['mak'];
            $dataAnggaran -> uraian = $row['uraian'];
            $dataAnggaran -> pagu_utama  = $row['pagu_utama'];
            $dataAnggaran -> unitkerja = $row['unitkerja'];
            $dataAnggaran -> save();
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