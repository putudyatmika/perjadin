<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    //
    protected $table = 'anggaran';
    protected $fillable = ["tahun_anggaran", "mak", "uraian","pagu_utama","rencana_pagu","unitkerja"];
    protected $dates =[
        'created_at','updated_at',
    ];
    public function Matrik()
    {
        return $this->hasMany('App\MatrikPerjalanan', 'id', 'mak_id');
    }
    public function Turunan()
    {
        return $this->belongsTo('App\TurunanAnggaran', 'id', 'a_id');
    }
    public function Unitkerja()
    {
        return $this->belongsTo('App\Unitkerja', 'unitkerja', 'kode');
    }
}
