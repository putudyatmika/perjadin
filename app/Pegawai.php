<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $table = 'pegawai';
    protected $fillable = ["nip_baru", "nama","tgl_lahir","jk","gol","unitkerja","jabatan"];

    public function MatrikTransaksi()
    {
        return $this->hasMany('App\Transaksi', 'peg_nip', 'nip_baru');
    }
}
