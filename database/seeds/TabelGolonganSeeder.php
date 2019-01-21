<?php

use Illuminate\Database\Seeder;

class TabelGolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete users table records
        DB::table('m_gol')->delete();
        //insert some dummy records
        DB::table('m_gol')->insert(array(
        array('kode'=>'11', 'pangkat'=>'I/a', 'jabatan'=> 'JURU MUDA'),
        array('kode'=>'12', 'pangkat'=>'I/b', 'jabatan'=>'JURU MUDA TINGKAT I'),
        array('kode'=>'13', 'pangkat'=>'I/c', 'jabatan'=>'JURU'),
        array('kode'=>'14', 'pangkat'=>'I/d', 'jabatan'=>'JURU TINGKAT I'),
        array('kode'=>'21', 'pangkat'=>'II/a','jabatan'=> 'PENGATUR MUDA'),
        array('kode'=>'22', 'pangkat'=>'II/b', 'jabatan'=>'PENGATUR MUDA TINGKAT I'),
        array('kode'=>'23', 'pangkat'=>'II/c', 'jabatan'=>'PENGATUR'),
        array('kode'=>'24', 'pangkat'=>'II/d', 'jabatan'=>'PENGATUR TINGKAT I'),
        array('kode'=>'31', 'pangkat'=>'III/a', 'jabatan'=>'PENATA MUDA'),
        array('kode'=>'32', 'pangkat'=>'III/b', 'jabatan'=>'PENATA MUDA TINGKAT I'),
        array('kode'=> '33', 'pangkat'=>'III/c','jabatan'=> 'PENATA'),
        array('kode'=> '34', 'pangkat'=>'III/d','jabatan'=> 'PENATA TINGKAT I'),
        array('kode'=>'41', 'pangkat'=>'IV/a', 'jabatan'=>'PEMBINA'),
        array('kode'=> '42', 'pangkat'=>'IV/b', 'jabatan'=>'PEMBINA TINGKAT I'),
        array('kode'=> '43', 'pangkat'=>'IV/c', 'jabatan'=>'PEMBINA UTAMA MUDA'),
        array('kode'=>'44', 'pangkat'=>'IV/d', 'jabatan'=>'PEMBINA UTAMA MADYA'),
        array('kode'=>'45', 'pangkat'=>'IV/e', 'jabatan'=>'PEMBINA UTAMA'),
         ));
    }
}
