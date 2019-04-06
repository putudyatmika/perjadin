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
    public static function Surat5Tugas($flag) {
        $Data = \App\SuratTugas::where('flag_surattugas','=',$flag)->orderBy('updated_at','desc')->take(5)->get();
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
    public static function ChartBarTahun($tahun) {
        $bln_panjang = array(1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");
        /*
        $Data = \DB::table('transaksi')->
        select(\DB::Raw('month(transaksi.tgl_brkt) as bulan, count(*) as jumlah'))->
        where([['flag_trx','>','3'],[\DB::Raw('year(transaksi.tgl_brkt)'),'=',$tahun]])->
        groupBy('bulan')->orderBy('bulan','asc')->get()->toJson();
        for ($i=1;$i<=12;$i++) {

        }
        select * from bulan left join (select month(tgl_brkt) as bln, count(*) as jumlah from transaksi where flag_trx > 3 GROUP by bln) as trx on bulan.id_bulan = trx.bln

        select month(tgl_brkt) as bln, count(*) as jumlah, sum(kuitansi.total_biaya) as totalbiaya  from transaksi left join kuitansi on kuitansi.trx_id=transaksi.trx_id where flag_trx > 3 GROUP by bln

        $Data = \DB::table('bulan')->
                leftJoin(\DB::Raw("(select month(tgl_brkt) as bln, count(*) as jumlah from transaksi where flag_trx > 3 and year(tgl_brkt)='".$tahun."' GROUP by bln) as trx"),'bulan.id_bulan','=','trx.bln')->select(\DB::Raw('nama_bulan as y,  COALESCE(jumlah,0) as a'))->get()->toJson();
        */
        $Data = \DB::table('bulan')->
                leftJoin(\DB::Raw("(select month(tgl_brkt) as bln, count(*) as jumlah,format((sum(kuitansi.total_biaya)/1000000),2) as totalbiaya from transaksi left join kuitansi on kuitansi.trx_id=transaksi.trx_id where flag_trx > 3 and year(tgl_brkt)='".$tahun."' GROUP by bln) as trx"),'bulan.id_bulan','=','trx.bln')->select(\DB::Raw('nama_bulan as y,  COALESCE(jumlah,0) as a,COALESCE(totalbiaya,0) as b'))->get()->toJson();
        //dd($Data);
        return $Data;
    }
    public static function ChartBarBidang($bulan,$tahun) {
        /*
        select nama, COALESCE(jumlah,0) as a from unitkerja left join (SELECT month(transaksi.tgl_brkt) as bulan, year(transaksi.tgl_brkt) as tahun, matrik.unit_pelaksana, COUNT(*) as jumlah FROM `matrik` left join transaksi on transaksi.matrik_id=matrik.id where transaksi.flag_trx > 3 and month(transaksi.tgl_brkt) = '2' and year(transaksi.tgl_brkt) = '2019' GROUP by matrik.unit_pelaksana order by bulan,tahun asc) as trx on trx.unit_pelaksana=unitkerja.kode where unitkerja.eselon < 4
        */
        $Data = \DB::table('unitkerja')->
                leftJoin(\DB::Raw("(SELECT month(transaksi.tgl_brkt) as bulan, year(transaksi.tgl_brkt) as tahun, matrik.unit_pelaksana, COUNT(*) as jumlah FROM `matrik` left join transaksi on transaksi.matrik_id=matrik.id where transaksi.flag_trx > 3 and month(transaksi.tgl_brkt) = '".$bulan."' and year(transaksi.tgl_brkt) = '".$tahun."' GROUP by matrik.unit_pelaksana order by bulan,tahun asc) as trx"),'trx.unit_pelaksana','=','unitkerja.kode')->
                select(\DB::Raw('nama as y, COALESCE(jumlah,0) as a'))->
                where('unitkerja.eselon','<','4')->
                get()->toJson();
        //dd($Data);
        return $Data;

    }
    public static function ChartBarBidangTahun($tahun) {
        /*
        select nama, COALESCE(jumlah,0) as a from unitkerja left join (SELECT month(transaksi.tgl_brkt) as bulan, year(transaksi.tgl_brkt) as tahun, matrik.unit_pelaksana, COUNT(*) as jumlah FROM `matrik` left join transaksi on transaksi.matrik_id=matrik.id where transaksi.flag_trx > 3 and month(transaksi.tgl_brkt) = '2' and year(transaksi.tgl_brkt) = '2019' GROUP by matrik.unit_pelaksana order by bulan,tahun asc) as trx on trx.unit_pelaksana=unitkerja.kode where unitkerja.eselon < 4
        */
        $Data = \DB::table('unitkerja')->
                leftJoin(\DB::Raw("(SELECT year(transaksi.tgl_brkt) as tahun, matrik.unit_pelaksana, COUNT(*) as jumlah FROM `matrik` left join transaksi on transaksi.matrik_id=matrik.id where transaksi.flag_trx > 3 and year(transaksi.tgl_brkt) = '".$tahun."' GROUP by matrik.unit_pelaksana order by tahun asc) as trx"),'trx.unit_pelaksana','=','unitkerja.kode')->
                select(\DB::Raw('nama as y, COALESCE(jumlah,0) as a'))->
                where('unitkerja.eselon','<','4')->
                get()->toJson();
        //dd($Data);
        return $Data;

    }
    public static function ChartBarTujuan($tahun) {
       /*
       select nama_kabkota, jumlah from tujuan LEFT join (SELECT matrik.kodekab_tujuan, COUNT(*) as jumlah FROM matrik left join transaksi on transaksi.matrik_id=matrik.id where transaksi.flag_trx > 3 and year(transaksi.tgl_brkt) = '2019' GROUP by matrik.kodekab_tujuan) as trx on trx.kodekab_tujuan = tujuan.kode_kabkota
        */
        $Data = \DB::table('tujuan')->
                leftJoin(\DB::Raw("(SELECT matrik.kodekab_tujuan, COUNT(*) as jumlah FROM matrik left join transaksi on transaksi.matrik_id=matrik.id where transaksi.flag_trx > 3 and year(transaksi.tgl_brkt) = '".$tahun."' GROUP by matrik.kodekab_tujuan) as trx"),'tujuan.kode_kabkota','=','trx.kodekab_tujuan')->select(\DB::Raw('nama_kabkota as y,  COALESCE(jumlah,0) as a'))->get()->toJson();
        //dd($Data);
        return $Data;
    }
}
