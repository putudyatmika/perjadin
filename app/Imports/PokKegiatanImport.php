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

class PokKegiatanImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
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
                'keg_nama'=>null,
                'flag_kro'=>null,
                'catatan'=>'Flag kro 1 = ada, 0 = tidak ada. kolom Catatan ini dihapus saja'
            */
            $count = PokKegiatan::where([['tahun_keg',$tahun_anggaran],['kode_prog',$row['prog_kode']],['kode_keg',$row['keg_kode']]])->count();
            if ($count == 0)
            {
                $data = new PokKegiatan();
                $data->tahun_keg = $tahun_anggaran;
                $data->kode_prog = $row['prog_kode'];
                $data->kode_keg = $row['keg_kode'];
                $data->nama_keg = $row['keg_nama'];
                $data->flag_kro = $row['flag_kro'];
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
