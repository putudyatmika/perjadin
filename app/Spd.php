<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spd extends Model
{
    //
    protected $table = 'spd';
    protected $primaryKey = 'spd_id';
    public function Transaksi(){
        return $this->hasOne('App\Transaksi','trx_id', 'trx_id');
    }
}
