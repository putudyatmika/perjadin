<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PokAkun extends Model
{
    //
    protected $table = 'tbl_akun';
    protected $primaryKey = 'id_akun ';
    public $timestamps = false;
}
