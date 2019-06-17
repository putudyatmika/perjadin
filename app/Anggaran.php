<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    //
    protected $table = 'anggaran';
    protected $fillable = ["tahun_anggaran", "mak", "uraian","pagu","unitkerja"];

    public function Matrik()
    {
        return $this->hasMany('App\MatrikPerjalanan', 'mak_id', 'id');
    }
    public function Turunan()
    {
        return $this->belongsTo('App\TurunanAnggaran', 'a_id', 'id');
    }
    public function Unitkerja()
    {
        return $this->belongsTo('App\Unitkerja', 'unitkerja', 'kode');
    }
}
