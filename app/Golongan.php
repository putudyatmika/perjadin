<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    //
    public $timestamps = false;
    protected $table = "m_gol";
    protected $fillable = ["kode", "gol", "pangkat"];
}
