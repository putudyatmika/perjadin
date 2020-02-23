<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    //
    protected $table = 'surattugas';
    protected $primaryKey = 'srt_id';

    public function Transaksi()
    {
        return $this->hasOne('App\Transaksi','trx_id', 'trx_id');
    }
}
