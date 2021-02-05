<?php

namespace App\Imports;
use Session;
use App\PokProgram;
use App\PokKegiatan;
use App\PokOutput;
use App\PokKro;
use App\PokKomponen;
use App\PokSubkomponen;
use App\PokAkun;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //TAMBAHKAN CODE INI
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PokKroImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
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
                'kro_nama'=>null,
            */
            $count = PokKro::where([['tahun_kro',$tahun_anggaran],['kode_prog',$row['prog_kode']],['kode_keg',$row['keg_kode']],['kode_kro',$row['kro_kode']]])->count();
            if ($count == 0)
            {
                $data = new PokKro();
                $data->tahun_kro= $tahun_anggaran;
                $data->kode_prog = $row['prog_kode'];
                $data->kode_keg = $row['keg_kode'];
                $data->kode_kro = $row['kro_kode'];
                $data->nama_kro = $row['kro_nama'];
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
