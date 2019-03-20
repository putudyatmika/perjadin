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
    public static function Ajuan5Perjadin() {
        $Data = \App\Transaksi::whereIn('flag_trx',array(1,2))->orderBy('updated_at','desc')->take(5)->get();
        return $Data;
    }
}

Class Generate {
    public static function Kode($length) {
        $kata='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code_gen = '';
        for ($i = 0; $i < $length; $i++) {
            $pos = rand(0, strlen($kata)-1);
            $code_gen .= $kata{$pos};
            }
        return $code_gen;
    }
}
