<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrikPerjalanan extends Model
{
    //
    protected $table = 'matrik';
    protected $fillable = ["tahun_matrik", "tgl_awal", "tgl_akhir","kodekab_tujuan","lamanya","dana_mak","dana_unitkerja","lama_harian"];

    public function Transaksi()
    {
        return $this->hasOne('App\Transaksi','matrik_id', 'id');
    }
    public function Tujuan(){
        return $this->belongsTo('App\Tujuan','kodekab_tujuan', 'kode_kabkota');
    }
    public function MultiTujuan(){
        return $this->hasMany('App\MultiTujuan','matrik_id','id');
    }
    public function DanaUnitkerja()
    {
        return $this->belongsTo('App\Unitkerja', 'dana_unitkerja', 'kode');
    }
    public function UnitPelaksana()
    {
        return $this->belongsTo('App\Unitkerja', 'unit_pelaksana', 'kode');
    }
    public function DanaAnggaran()
    {
        return $this->belongsTo('App\Anggaran', 'mak_id', 'id');
    }
    public function AnggaranTurunan()
    {
        return $this->belongsTo('App\TurunanAnggaran', 'dana_tid', 't_id');
    }
}
