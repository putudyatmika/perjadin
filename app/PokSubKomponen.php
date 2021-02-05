<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;

class PokSubKomponen extends Model
{
    //
    protected $table = 'tbl_subkomponen';
    protected $primaryKey = 'id_subkom';
    
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
    public function Komponen()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        return $this->belongsTo('App\PokKomponen', 'kode_komponen', 'kode_komponen')->where('tahun_komponen',$tahun_anggaran);
    }
    public function Output()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        return $this->belongsTo('App\PokOutput', 'kode_output', 'kode_output')->where('tahun_output',$tahun_anggaran);
    }
}
