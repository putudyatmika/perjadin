<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PokProgram extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tbl_program';
    protected $primaryKey = 'id_prog';
}
