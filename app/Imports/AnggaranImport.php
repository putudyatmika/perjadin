<?php

namespace App\Imports;

use App\Anggaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //TAMBAHKAN CODE INI

class AnggaranImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Anggaran([
            //
            'tahun_anggaran' => $row['tahun_anggaran'],
            'mak' => $row['mak'],
            'uraian' => $row['uraian'],
            'pagu_utama' => $row['pagu_utama'],
            'unitkerja' => $row['unitkerja']
        ]);
    }
}
