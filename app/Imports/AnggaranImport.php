<?php

namespace App\Imports;
use Session;
use App\Anggaran;
use App\PokProgram;
use App\PokKegiatan;
use App\PokOutput;
use App\PokKro;
use App\PokKomponen;
use App\PokSubKomponen;
use App\PokAkun;
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
                'keg_kode'=>null,
                'kro_kode'=>null,
                'output_kode'=>null,
                'komponen_kode' => null,
                'subkomponen_kode'=>null,
                'akun_kode'=>null,
                'uraian' => null,
                'pagu_utama' => null,
                'unitkerja' => 'kode bidang/bagian 5 digit',
                'unitkerja' => 'kode bidang/bagian 5 digit',
            */
            if ($row['subkomponen_kode'] != NULL)
            {
                if ($row['kro_kode'] == NULL)
                {
                    $data_detil = PokSubKomponen::where([['tahun_subkom',$tahun_anggaran],['kode_prog',$row['prog_kode']],['kode_keg',$row['keg_kode']],['kode_output',$row['output_kode']],['kode_komponen',$row['kode_komponen']],['kode_subkom',$row['subkomponen_kode']]])->first();
                }
                else
                {
                    $data_detil = PokSubKomponen::where([['tahun_subkom',$tahun_anggaran],['kode_prog',$row['prog_kode']],['kode_keg',$row['keg_kode']],['kode_output',$row['output_kode']],['kode_komponen',$row['kode_komponen']],['kode_subkom',$row['subkomponen_kode']],['kode_kro',$row['kro_kode']]])->first();
                }
                
            }
            else
            {
                if ($row['kro_kode'] == NULL)
                {
                    $data_detil = PokKomponen::where([['tahun_subkom',$tahun_anggaran],['kode_prog',$row['prog_kode']],['kode_keg',$row['keg_kode']],['kode_output',$row['output_kode']],['kode_komponen',$row['kode_komponen']]])->first();
                }
                else 
                {   
                    $data_detil = PokKomponen::where([['tahun_subkom',$tahun_anggaran],['kode_prog',$row['prog_kode']],['kode_keg',$row['keg_kode']],['kode_output',$row['output_kode']],['kode_komponen',$row['kode_komponen']],['kode_kro',$row['kro_kode']]])->first();
                }
            }

            if ($row['kro_kode'] == NULL)
            {
                //tanpa kro
                $mak = $row['prog_kode'].'.'.$row['keg_kode'].'.'.$row['output_kode'].'.'.$row['kode_komponen'];
                $kro_nama = NULL;
            }
            else 
            {
                //dengan kro
                $mak = $row['prog_kode'].'.'.$row['keg_kode'].'.'.$row['kro_kode'].'.'.$row['output_kode'].'.'.$row['kode_komponen'];
                $kro_nama = $data_detil->Kro->nama_kro;
            }

            if ($row['subkomponen_kode'] == NULL)
            {
                //tanpa subkomponen
                $mak = $mak.'.'.$row['akun_kode'];
                $subkom_nama = NULL;
                $komponen_nama = $data_detil->nama_komponen;
            }
            else 
            {
                //dengan subkomponen
                $mak = $mak.'.'.$row['subkomponen_kode'].'.'.$row['akun_kode'];
                $subkom_nama = $data_detil->nama_subkom;
                $komponen_nama = $data_detil->Komponen->nama_komponen;
            }
            /*
            $data->prog_nama = $data_detil->Program->nama_prog;
            $data->keg_kode = $request->keg_kode;
            $data->keg_nama = $data_detil->Kegiatan->nama_keg;
            $data->kro_kode = $request->kro_kode;
            $data->kro_nama = $kro_nama;
            $data->output_kode = $request->output_kode;
            $data->output_nama = $data_detil->Output->nama_output;
            $data->komponen_kode = $request->komponen_kode;
            $data->komponen_nama = $komponen_nama;
            $data->subkomponen_kode = $request->subkomponen_kode;
            $data->subkomponen_nama = $subkom_nama;
            $data->akun_kode = $request->akun_kode;
            $data->akun_nama = $data_akun->nama_akun;
            */
            $data_akun = PokAkun::where('kode_akun',$row['akun_kode'])->first();
            $dataAnggaran = new Anggaran();
            $dataAnggaran->tahun_anggaran =  $tahun_anggaran;
            $dataAnggaran->prog_kode = $row['prog_kode'];
            $dataAnggaran->prog_nama = $data_detil->Program->nama_prog;;
            $dataAnggaran->keg_kode = $row['keg_kode'];
            $dataAnggaran->keg_nama = $data_detil->Kegiatan->nama_keg;
            $dataAnggaran->kro_kode = $row['kro_kode'];
            $dataAnggaran->kro_nama = $kro_nama;
            $dataAnggaran->output_kode = $row['output_kode'];
            $dataAnggaran->output_nama = $data_detil->Output->nama_output;
            $dataAnggaran->komponen_kode = $row['kode_komponen'];
            $dataAnggaran->komponen_nama = $komponen_nama;
            $dataAnggaran->subkomponen_kode = $row['subkomponen_kode'];
            $dataAnggaran->subkomponen_nama = $subkom_nama;
            $dataAnggaran->akun_kode = $row['akun_kode'];
            $dataAnggaran->akun_nama = $data_akun->nama_akun;
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