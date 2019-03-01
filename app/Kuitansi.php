<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuitansi extends Model
{
    //
    protected $table = 'kuitansi';
    protected $primaryKey = 'kuitansi_id';
    public function Transaksi(){
        return $this->hasOne('App\Transaksi','trx_id', 'trx_id');
    }
}
