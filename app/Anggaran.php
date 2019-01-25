<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    //
    protected $table = 'anggaran';
    protected $fillable = ["tahun_anggaran", "mak", "uraian","pagu","unitkerja"];
}
