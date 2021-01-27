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
            /*
                'prog_kode'=>null,
                'prog_nama'=>null,
                'keg_kode'=>null,
                'keg_nama'=>null,
                'kro_kode'=>null,
                'kro_nama'=>null,
                'output_kode'=>null,
                'output_nama'=>null,
                'komponen_kode' => null,
                'komponen_nama' => null,
                'subkomponen_kode'=>null,
                'subkomponen_nama'=>null,
                'akun_kode'=>null,
                'uraian' => null,
                'pagu_utama' => null,
                'unitkerja' => 'kode bidang/bagian 5 digit',
            */
            $dataAnggaran = new Anggaran();
            $dataAnggaran->tahun_anggaran =  $tahun_anggaran;
            $dataAnggaran->prog_kode = $row['prog_kode'];
            $dataAnggaran->prog_nama = $row['prog_nama'];
            $dataAnggaran->keg_kode = $row['keg_kode'];
            $dataAnggaran->keg_nama = $row['keg_nama'];
            $dataAnggaran->kro_kode = $row['kro_kode'];
            $dataAnggaran->kro_nama = $row['kro_nama'];
            $dataAnggaran->output_kode = $row['output_kode'];
            $dataAnggaran->output_nama = $row['output_nama'];
            $dataAnggaran->komponen_kode = $row['kode_komponen'];
            $dataAnggaran->komponen_nama = $row['nama_komponen'];
            $dataAnggaran->subkomponen_kode = $row['subkomponen_kode'];
            $dataAnggaran->subkomponen_nama = $row['subkomponen_nama'];
            $dataAnggaran->akun_kode = $row['akun_kode'];
            $dataAnggaran->uraian = $row['uraian'];
            $dataAnggaran->pagu_utama  = $row['pagu_utama'];
            $dataAnggaran->unitkerja = $row['unitkerja'];
            $dataAnggaran->save();
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