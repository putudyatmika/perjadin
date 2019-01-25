<?php

use Illuminate\Database\Seeder;

class TabelTujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //delete users table records
         DB::table('tujuan')->delete();
         //insert some dummy records
         DB::table('tujuan')->insert(array(
         array('kode_kabkota'=>'5201', 'nama_kabkota'=>'Kabupaten Lombok Barat', 'kepala'=>'A n a s', 'nip_kepala'=>'19641228 199103 1 004', 'rate_darat'=> '225000'),
         array('kode_kabkota'=>'5202', 'nama_kabkota'=>'Kabupaten Lombok Tengah', 'kepala'=>'Syamsudin', 'nip_kepala'=>'19651231 199103 1 012', 'rate_darat'=> '250000'),
         array('kode_kabkota'=>'5203', 'nama_kabkota'=>'Kabupaten Lombok Timur', 'kepala'=>'Muhamad Saphoan', 'nip_kepala'=>'19671231 199401 1 001', 'rate_darat'=> '300000'),
         array('kode_kabkota'=>'5204', 'nama_kabkota'=>'Kabupaten Sumbawa', 'kepala'=>'Agus Alwi', 'nip_kepala'=>'19641231 199103 1 022', 'rate_darat'=> '500000'),
         array('kode_kabkota'=>'5205', 'nama_kabkota'=>'Kabupaten Dompu', 'kepala'=>'Peter Willem', 'nip_kepala'=>'19651128 199202 1 001', 'rate_darat'=> '600000'),
         array('kode_kabkota'=>'5206', 'nama_kabkota'=>'Kabupaten Bima', 'kepala'=>'S a p i r i n', 'nip_kepala'=>'19661231 199401 1 002', 'rate_darat'=> '650000'),
         array('kode_kabkota'=>'5207', 'nama_kabkota'=>'Kabupaten Sumbawa Barat', 'kepala'=>'Muhammad Ahyar', 'nip_kepala'=>'19661231 199212 1 001', 'rate_darat'=> '450000'),
         array('kode_kabkota'=>'5208', 'nama_kabkota'=>'Kabupaten Lombok Utara', 'kepala'=>'M u h a d i', 'nip_kepala'=>'19661231 199401 1 001', 'rate_darat'=> '325000'),
         array('kode_kabkota'=>'5271', 'nama_kabkota'=>'Kota Mataram', 'kepala'=>'I s a', 'nip_kepala'=>'19680915 199112 1 001', 'rate_darat'=> '150000'),
         array('kode_kabkota'=>'5272', 'nama_kabkota'=>'Kota Bima', 'kepala'=>'Joko Pitoyo Novarudin', 'nip_kepala'=>'19751120 199712 1 002', 'rate_darat'=> '650000'),
         ));
    }
}