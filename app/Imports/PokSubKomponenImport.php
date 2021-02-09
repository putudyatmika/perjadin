<?php

namespace App\Imports;
use Session;
use App\PokSubkomponen;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //TAMBAHKAN CODE INI
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PokSubKomponenImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $tahun_anggaran = Session::get('tahun_anggaran');

        foreach ($rows as $row)
        {
            /*
                'prog_kode'=>null,
                'keg_kode'=>null,
                'kro_kode'=>null,
                'output_kode'=>null,
                'komponen_kode' => null,
                'subkomponen_kode' => null,
                'subkomponen_nama' => null,
            */
            $count = \App\PokSubKomponen::where([['tahun_subkom',$tahun_anggaran],['kode_prog',trim($row['prog_kode'])],['kode_keg',trim($row['keg_kode'])],['kode_kro',$row['kro_kode']],['kode_output',trim($row['output_kode'])],['kode_komponen',trim($row['komponen_kode'])],['kode_subkom',trim($row['subkomponen_kode'])]])->count();
            if ($count == 0)
            {
                if ($row['kro_kode'] == "" or $row['kro_kode']==NULL)
                {
                    $kode_kro = NULL;
                }
                else
                {
                    $kode_kro=$row['kro_kode'];
                }
                $data = new \App\PokSubKomponen();
                $data->tahun_subkom = $tahun_anggaran;
                $data->kode_prog = trim($row['prog_kode']);
                $data->kode_keg = trim($row['keg_kode']);
                $data->kode_kro = $kode_kro;
                $data->kode_output = trim($row['output_kode']);
                $data->kode_komponen = trim($row['komponen_kode']);
                $data->kode_subkom = trim($row['subkomponen_kode']);
                $data->nama_subkom = trim($row['subkomponen_nama']);
                $data->save();
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
