<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $table = 'transaksi';
    protected $primaryKey = 'trx_id';
    protected $fillable = ["kode_trx"];

   public function Matrik()
    {
        return $this->belongsTO('App\MatrikPerjalanan', 'matrik_id', 'id');
    }
   public function Pegawai()
    {
        return $this->belongsTO('App\Pegawai', 'peg_nip', 'nip_baru');
    }
}
