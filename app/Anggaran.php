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
}
