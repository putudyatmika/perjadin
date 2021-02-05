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

class PokKomponenImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
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
                'komponen_nama' => null,
            */
            $count = PokKomponen::where([['tahun_komponen',$tahun_anggaran],['kode_prog',$row['prog_kode']],['kode_keg',$row['keg_kode']],['kode_kro',$row['kro_kode']],['kode_output',$row['output_kode']],['kode_komponen',$row['komponen_kode']]])->count();
            if ($count == 0)
            {
                $data = new PokKomponen();
                $data->tahun_komponen = $tahun_anggaran;
                $data->kode_prog = $row['prog_kode'];
                $data->kode_keg = $row['keg_kode'];
                $data->kode_kro = $row['kro_kode'];
                $data->kode_output = $row['output_kode'];
                $data->kode_komponen = $row['komponen_kode'];
                $data->nama_komponen = $row['komponen_nama'];
                $data->flag_sub = $row['flag_sub'];
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
