<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiTujuan extends Model
{
    //
    protected $table = 'multi_tujuan';
    public function Matrik()
    {
        return $this->belongsTO('App\MatrikPerjalanan', 'matrik_id', 'id');
    }
    public function Tujuan(){
        return $this->belongsTo('App\Tujuan','kodekab_tujuan', 'kode_kabkota');
    }
}
