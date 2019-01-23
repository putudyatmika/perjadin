<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unitkerja extends Model
{
    //
    public $timestamps = false;
    protected $table = "unitkerja";
    protected $fillable = ["kode", "nama", "parent","jenis","eselon"];
}
