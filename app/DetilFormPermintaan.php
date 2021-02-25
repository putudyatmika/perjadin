<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilFormPermintaan extends Model
{
    //
    protected $table = 'detil_permintaan';
    protected $primaryKey = 'id_detil_permintaan';
    public function Permintaan()
    {
        return $this->belongsTo('App\FormPermintaan', 'id_permintaan', 'id_permintaan');
    }
    public function Matrik()
    {
        return $this->belongsTO('App\MatrikPerjalanan', 'matrik_id', 'id');
    }
}
