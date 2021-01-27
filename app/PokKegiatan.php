<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class PokKegiatan extends Model
{
    //
    protected $table = 'tbl_kegiatan';
    protected $primaryKey = 'id_keg';
    
    public function Program()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        return $this->belongsTo('App\PokProgram', 'kode_prog', 'kode_prog')->where('tahun_prog',$tahun_anggaran);
    }
}
