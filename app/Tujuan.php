<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    //
    protected $table = 'tujuan';
    protected $fillable = ["kode_kabkota", "nama_kabkota", "kepala","nip_kepala","rate_darat"];
    public function Matrik()
    {
        return $this->hasMany('App\MatrikPerjalanan', 'kodekab_tujuan', 'kode_kabkota');
    }
}
