<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatrikPerjalanan extends Model
{
    //
    protected $table = 'matrik';
    protected $fillable = ["tahun_matrik", "tgl_awal", "tgl_akhir","kodekab_tujuan","lamanya","dana_mak","dana_unitkerja","lama_harian"];
}
