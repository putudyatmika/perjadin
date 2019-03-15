<?php
namespace App\Helpers;

Class Jumlah {
    public static function Pengajuan() {
        $count = \App\Transaksi::whereIn('flag_trx',array(1,2))->count();
        return $count;
    }
    public static function SuratTugas($flag) {
        $count = \App\SuratTugas::where('flag_surattugas','=',$flag)->count();
        return $count;
    }
    public static function SPD($flag) {
        $count = \App\Spd::where('flag_spd','=',$flag)->count();
        return $count;
    }
    public static function Kuitansi($flag) {
        $count = \App\Kuitansi::where('flag_kuitansi','=',$flag)->count();
        return $count;
    }
    public static function Matrik($flag) {
        if ($flag<10) {
            $count = \App\MatrikPerjalanan::where('flag_matrik','=',$flag)->count();
        }
        else {
            $count = \App\MatrikPerjalanan::count();
        }
        return $count;
    }
    public static function Transaksi($flag) {
        if ($flag<10) {
            $count = \App\Transaksi::where('flag_trx','=',$flag)->count();
        }
        else {
            $count = \App\Transaksi::count();
        }
        return $count;
    }
    public static function KuitansiCair() {
        $sum = \App\Kuitansi::where('flag_kuitansi','<',3)->sum('total_biaya');
        return $sum;
    }
}
