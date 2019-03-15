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
        array('kode'=>'52000', 'nama'=>'BPS Provinsi NTB', 'parent'=>NULL, 'bidang'=>'52000','jenis'=>'1', 'eselon'=> '2'),
        array('kode'=>'52510', 'nama'=>'Bagian Tata Usaha', 'parent'=>'52000', 'bidang'=>'52510','jenis'=>'1','eselon'=> '3'),
        array('kode'=>'52511', 'nama'=>'Subbagian Bina Program', 'parent'=>'52510', 'bidang'=>'52510','jenis'=>'1', 'eselon'=>'4'),
        array('kode'=>'52512', 'nama'=>'Subbagian Kepegawaian & Hukum', 'parent'=>'52510', 'bidang'=>'52510','jenis'=>'1',  'eselon'=>'4'),
        array('kode'=>'52513', 'nama'=>'Subbagian Keuangan', 'parent'=>'52510', 'bidang'=>'52510','jenis'=>'1', 'eselon'=>'4'),
        array('kode'=>'52514', 'nama'=>'Subbagian Umum', 'parent'=>'52510', 'bidang'=>'52510','jenis'=>'1', 'eselon'=>'4'),
        array('kode'=>'52515', 'nama'=>'Subbagian Pengadaan Barang/Jasa', 'parent'=>'52510', 'bidang'=>'52510','jenis'=>'1', 'eselon'=>'4'),
        array('kode'=>'52520', 'nama'=>'Bidang Statistik Sosial', 'parent'=>'52000', 'bidang'=>'52520', 'jenis'=>'1','eselon'=> '3'),
        array('kode'=>'52521', 'nama'=>'Seksi Statistik Kependudukan', 'parent'=>'52520','bidang'=>'52520','jenis'=>  '1',  'eselon'=>'4'),
        array('kode'=>'52522', 'nama'=>'Seksi Statistik Ketahanan Sosial', 'parent'=>'52520','bidang'=>'52520', 'jenis'=> '1',  'eselon'=>'4'),
        array('kode'=>'52523', 'nama'=>'Seksi Statistik Kesejahteraan Rakyat', 'parent'=>'52520','bidang'=>'52520', 'jenis'=> '1',  'eselon'=>'4'),
        array('kode'=>'52530', 'nama'=>'Bidang Statistik Produksi', 'parent'=>'52000', 'bidang'=>'52530','jenis'=>'1','eselon'=> '3'),
        array('kode'=>'52531', 'nama'=>'Seksi Statistik Pertanian', 'parent'=>'52530', 'bidang'=>'52530','jenis'=> '1', 'eselon'=> '4'),
        array('kode'=>'52532', 'nama'=>'Seksi Statistik Industri', 'parent'=>'52530', 'bidang'=>'52530','jenis'=> '1',  'eselon'=>'4'),
        array('kode'=>'52533', 'nama'=>'Seksi Statistik Pertambangan, Energi dan Konstruksi ','parent'=> '52530', 'bidang'=>'52530','jenis'=> '1', 'eselon'=>'4'),
        array('kode'=>'52540', 'nama'=>'Bidang Statistik Distribusi', 'parent'=>'52000', 'bidang'=>'52540','jenis'=> '1', 'eselon'=> '3'),
        array('kode'=>'52541', 'nama'=>'Seksi Statistik Harga Konsumen dan Harga Perdagangan Besar', 'parent'=>'52540','bidang'=>'52540','jenis'=>  '1','eselon'=> '4'),
        array('kode'=>'52542', 'nama'=>'Seksi Statistik Keuangan Dan Harga Produsen', 'parent'=>'52540','bidang'=>'52540','jenis'=>  '1', 'eselon'=>'4'),
        array('kode'=>'52543', 'nama'=>'Seksi Statistik Niaga dan Jasa', 'parent'=>'52540','bidang'=>'52540','jenis'=>'1','eselon'=> '4'),
        array('kode'=>'52550', 'nama'=>'Bidang Nerwilis', 'parent'=>'52000','bidang'=>'52550','jenis'=> '1','eselon'=>'3'),
        array('kode'=>'52551', 'nama'=>'Seksi Neraca Produksi','parent'=> '52550','bidang'=>'52550','jenis'=>  '1', 'eselon'=>'4'),
        array('kode'=>'52552', 'nama'=>'Seksi Neraca Konsumsi','parent'=> '52550','bidang'=>'52550', 'jenis'=> '1', 'eselon'=> '4'),
        array('kode'=>'52553', 'nama'=>'Seksi Analisis Statistik Lintas Sektor', 'parent'=>'52550','bidang'=>'52550','jenis'=>  '1', 'eselon'=> '4'),
        array('kode'=>'52560', 'nama'=>'Bidang IPDS', 'parent'=>'52000','bidang'=>'52560','jenis'=> '1','eselon'=> '3'),
        array('kode'=>'52561', 'nama'=>'Seksi Integrasi Pengolahan Data', 'parent'=>'52560', 'bidang'=>'52560','jenis'=>'1', 'eselon'=> '4'),
        array('kode'=>'52562', 'nama'=>'Seksi Jaringan dan Rujukan Statistik', 'parent'=>'52560', 'bidang'=>'52560','jenis'=>'1','eselon'=>  '4'),
        array('kode'=>'52563', 'nama'=>'Seksi Diseminasi dan Layanan Statistik', 'parent'=>'52560', 'bidang'=>'52560','jenis'=>'1', 'eselon'=> '4'),
         ));
    }
}









