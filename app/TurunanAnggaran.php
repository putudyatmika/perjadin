<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurunanAnggaran extends Model
{
    //
    protected $table = 'turunan_anggaran';
    protected $primaryKey = 't_id';
    protected $fillable = ["a_id", "unit_pelaksana", "pagu_awal","pagu_rencana","pagu_realisasi"];

    public function Anggaran()
    {
        return $this->belongsTo('App\Anggaran', 'id', 'a_id');
    }
}
