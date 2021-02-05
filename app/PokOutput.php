<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class PokOutput extends Model
{
    //
    protected $table = 'tbl_output';
    protected $primaryKey = 'id_output';

    public function Program()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        return $this->belongsTo('App\PokProgram', 'kode_prog', 'kode_prog')->where('tahun_prog',$tahun_anggaran);
    }
    public function Kegiatan()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        return $this->belongsTo('App\PokKegiatan', 'kode_keg', 'kode_keg')->where('tahun_keg',$tahun_anggaran);
    }
    public function Kro()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        return $this->belongsTo('App\PokKro', 'kode_kro', 'kode_kro')->where('tahun_kro',$tahun_anggaran);
    }
}
