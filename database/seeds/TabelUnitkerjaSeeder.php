<?php

use Illuminate\Database\Seeder;

class TabelUnitkerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete users table records
        DB::table('unitkerja')->delete();
        //insert some dummy records
        DB::table('unitkerja')->insert(array(
        array('kode'=>'52000', 'nama'=>'BPS Provinsi Nusa Tenggara Barat', 'parent'=>NULL, 'jenis'=>'1', 'eselon'=> '2','created_at'=>'2016-12-06 08:12:08', 'updated_at'=>'2017-01-18 06:54:45',),
        array('kode'=>'52510', 'nama'=>'Bagian Tata Usaha', 'parent'=>'52000', 'jenis'=>'1','eselon'=> '3', 'created_at'=>'2016-12-06 09:35:55', 'updated_at'=>'2017-01-18 06:54:45'),
        array('kode'=>'52520', 'nama'=>'Bidang Statistik Sosial', 'parent'=>'52000', 'jenis'=>'1','eselon'=> '3', 'created_at'=>'2016-12-06 09:36:50', 'updated_at'=>'2017-01-18 06:54:45'),
        array('kode'=>'52530', 'nama'=>'Bidang Statistik Produksi', 'parent'=>'52000', 'jenis'=>'1','eselon'=> '3', 'created_at'=>'2016-12-06 09:37:57', 'updated_at'=>'2017-01-18 06:54:45'),
        array('kode'=>'52540', 'nama'=>'Bidang Statistik Distribusi', 'parent'=>'52000','jenis'=> '1', 'eselon'=> '3','created_at'=>'2016-12-07 07:42:46', 'updated_at'=>'2017-01-18 06:54:45'),
        array('kode'=>'52550', 'nama'=>'Bidang Neraca Wilayah dan Analisis Statistik', 'parent'=>'52000','jenis'=> '1', 'eselon'=> '3', 'created_at'=>'2016-12-07 07:42:25', 'updated_at'=>'2017-01-18 06:54:45'),
        array('kode'=>'52560', 'nama'=>'Bidang Integrasi Pengolahan Dan Diseminasi Statistik', 'parent'=>'52000','jenis'=> '1','eselon'=> '3', 'created_at'=>'2016-12-06 09:34:35', 'updated_at'=>'2017-01-18 06:54:45'),
         ));
    }
}
