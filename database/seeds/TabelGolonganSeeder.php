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
        array('kode'=>'11', 'gol'=>'I/a', 'pangkat'=> 'JURU MUDA'),
        array('kode'=>'12', 'gol'=>'I/b', 'pangkat'=>'JURU MUDA TINGKAT I'),
        array('kode'=>'13', 'gol'=>'I/c', 'pangkat'=>'JURU'),
        array('kode'=>'14', 'gol'=>'I/d', 'pangkat'=>'JURU TINGKAT I'),
        array('kode'=>'21', 'gol'=>'II/a','pangkat'=> 'PENGATUR MUDA'),
        array('kode'=>'22', 'gol'=>'II/b', 'pangkat'=>'PENGATUR MUDA TINGKAT I'),
        array('kode'=>'23', 'gol'=>'II/c', 'pangkat'=>'PENGATUR'),
        array('kode'=>'24', 'gol'=>'II/d', 'pangkat'=>'PENGATUR TINGKAT I'),
        array('kode'=>'31', 'gol'=>'III/a', 'pangkat'=>'PENATA MUDA'),
        array('kode'=>'32', 'gol'=>'III/b', 'pangkat'=>'PENATA MUDA TINGKAT I'),
        array('kode'=> '33', 'gol'=>'III/c','pangkat'=> 'PENATA'),
        array('kode'=> '34', 'gol'=>'III/d','pangkat'=> 'PENATA TINGKAT I'),
        array('kode'=>'41', 'gol'=>'IV/a', 'pangkat'=>'PEMBINA'),
        array('kode'=> '42', 'gol'=>'IV/b', 'pangkat'=>'PEMBINA TINGKAT I'),
        array('kode'=> '43', 'gol'=>'IV/c', 'pangkat'=>'PEMBINA UTAMA MUDA'),
        array('kode'=>'44', 'gol'=>'IV/d', 'pangkat'=>'PEMBINA UTAMA MADYA'),
        array('kode'=>'45', 'gol'=>'IV/e', 'pangkat'=>'PEMBINA UTAMA'),
         ));
    }
}
