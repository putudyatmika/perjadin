<?php

namespace App\Http\Controllers;
use App\Transaksi;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    public function view($kodetrx)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $dataTransaksi = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->first();
        return view('verify.index',compact('dataTransaksi','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagSrt','JenisJabatanVar'));

    }
}
