<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormPermintaan extends Model
{
    //
    protected $table = 'surat_permintaan';
    protected $primaryKey = 'id_permintaan';
    public function Detil()
    {
        return $this->hasMany('App\DetilFormPermintaan', 'id_permintaan', 'id_permintaan');
    }
    public function Anggaran()
    {
        return $this->belongsTo('App\Anggaran', 'a_id_permintaan', 'id');
    }
    public function AnggaranTurunan()
    {
        return $this->belongsTo('App\TurunanAnggaran', 't_id_permintaan', 't_id');
    }
}
