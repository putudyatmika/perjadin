<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class PokKro extends Model
{
    //
    protected $table = 'tbl_kro';
    protected $primaryKey = 'id_kro';

    public function Kegiatan()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        return $this->belongsTo('App\PokKegiatan', 'kode_keg', 'kode_keg')->where('tahun_keg',$tahun_anggaran);
    }

}
