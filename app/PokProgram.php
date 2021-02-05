<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class PokProgram extends Model
{
    //
    //public $timestamps = false;
    protected $table = 'tbl_program';
    protected $primaryKey = 'id_prog';
    public function Kegiatan()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        return $this->belongsTo('App\PokKegiatan', 'kode_prog', 'kode_prog')->where('tahun_keg',$tahun_anggaran);
    }
}
