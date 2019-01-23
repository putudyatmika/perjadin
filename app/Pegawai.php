<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $table = 'pegawai';
    protected $fillable = ["nip_baru", "nip_lama", "nama","tgl_lahir","jk","gol","unitkerja","jabatan"];
}
