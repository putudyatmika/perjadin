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
   public function TabelPegawai()
    {
        return $this->belongsTo('App\Pegawai', 'peg_nip', 'nip_baru');
    }
    public function SuratTugas()
    {
        return $this->belongsTO('App\SuratTugas', 'trx_id', 'trx_id');
    }
    public function Spd()
    {
        return $this->belongsTO('App\Spd', 'trx_id', 'trx_id');
    }
    public function Kuitansi()
    {
        return $this->belongsTo('App\Kuitansi', 'trx_id', 'trx_id');
    }
}
