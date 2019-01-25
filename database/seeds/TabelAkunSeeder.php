<?php

use Illuminate\Database\Seeder;

class TabelAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //delete users table records
        DB::table('tbl_akun')->delete();
        //insert some dummy records
        DB::table('tbl_akun')->insert(array(
        array('kode_akun'=>'511111','nama_akun'=>'Belanja Gaji Pokok PNS'),
        array('kode_akun'=>'511119','nama_akun'=>'Belanja Gaji Pembulatan PNS'),
        array('kode_akun'=>'511121','nama_akun'=>'Belanja Tunjangan Suami Istri'),
        array('kode_akun'=>'511122','nama_akun'=>'Belanja Tunjangan Anak PNS'),
        array('kode_akun'=>'511123','nama_akun'=>'Belanja Tunjangan Struktural PNS'),
        array('kode_akun'=>'511124','nama_akun'=>'Belanja Tunjangan Fungsional PNS'),
        array('kode_akun'=>'511125','nama_akun'=>'Belanja Tunjangan PPh PNS'),
        array('kode_akun'=>'511126','nama_akun'=>'Belanja Tunjangan Beras PNS'),
        array('kode_akun'=>'511129','nama_akun'=>'Belanja Uang Makan PNS'),
        array('kode_akun'=>'511147','nama_akun'=>'Belanja Belanja Tunj. Lain-lain termasuk Uang Duka PN Dalam dan Luar Negeri'),
        array('kode_akun'=>'511151','nama_akun'=>'Belanja Tunjangan Umum PNS'),
        array('kode_akun'=>'512211','nama_akun'=>'Belanja Uang Lembur'),
        array('kode_akun'=>'512411','nama_akun'=>'Belanja Pegawai (Tunjangan Khusus/Kegiatan)'),
        array('kode_akun'=>'521111','nama_akun'=>'Belanja Keperluan Perkantoran'),
        array('kode_akun'=>'521113','nama_akun'=>'Belanja untuk Menambah Daya Tahan Tubuh'),
        array('kode_akun'=>'521114','nama_akun'=>'Belanja Pengiriman Surat Dinas Pos Pusat'),
        array('kode_akun'=>'521115','nama_akun'=>'Honor Operasional Satuan Kerja'),
        array('kode_akun'=>'521119','nama_akun'=>'Belanja Barang Operasional Lainnya'),
        array('kode_akun'=>'521211','nama_akun'=>'Belanja Bahan'),
        array('kode_akun'=>'521213','nama_akun'=>'Honor Output Kegiatan'),
        array('kode_akun'=>'521219','nama_akun'=>'Belanja Barang Non Operasional Lainnya'),
        array('kode_akun'=>'521811','nama_akun'=>'Belanja Barang Persediaan Barang Konsumsi'),
        array('kode_akun'=>'522111','nama_akun'=>'Belanja Langganan Listrik'),
        array('kode_akun'=>'522112','nama_akun'=>'Belanja Langganan Telepon'),
        array('kode_akun'=>'522113','nama_akun'=>'Belanja Langganan Air'),
        array('kode_akun'=>'522121','nama_akun'=>'Belanja Jasa Pos dan Giro'),
        array('kode_akun'=>'522141','nama_akun'=>'Belanja Sewa'),
        array('kode_akun'=>'522151','nama_akun'=>'Belanja Jasa Profesi'),
        array('kode_akun'=>'522191','nama_akun'=>'Belanja Jasa Lainnya'),
        array('kode_akun'=>'523111','nama_akun'=>'Belanja Biaya Pemeliharaan Gedung dan Bangunan'),
        array('kode_akun'=>'523112','nama_akun'=>'Belanja Barang Persediaan untuk Pemeliharaan Gedung dan Bangunan'),
        array('kode_akun'=>'523119','nama_akun'=>'Belanja Biaya Pemeliharaan Gedung dan Bangunan Lainnya'),
        array('kode_akun'=>'523121','nama_akun'=>'Belanja Biaya Pemeliharaan Peralatan dan Mesin'),
        array('kode_akun'=>'523123','nama_akun'=>'Belanja Barang Persediaan Pemeliharaan Peralatan dan Mesin'),
        array('kode_akun'=>'524111','nama_akun'=>'Belanja Perjalanan Biasa'),
        array('kode_akun'=>'524113','nama_akun'=>'Belanja Perjalanan Dinas Dalam Kota'),
        array('kode_akun'=>'524114','nama_akun'=>'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
        array('kode_akun'=>'524119','nama_akun'=>'Belanja Perjalanan Dinas Paket Meeting Luar Kota'),
        array('kode_akun'=>'531111','nama_akun'=>'Belanja Modal Tanah'),
        array('kode_akun'=>'532111','nama_akun'=>'Belanja Modal Peralatan dan Mesin'),
        array('kode_akun'=>'533111','nama_akun'=>'Belanja Modal Gedung dan Bangunan'),
        array('kode_akun'=>'533113','nama_akun'=>'Belanja Modal Upah Tenaga Kerja dan Honor Pengelola Teknis Gedung dan Bangunan'),
        array('kode_akun'=>'533115','nama_akun'=>'Belanja Modal Perencanaan dan Pengawasan Gedung dan Bangunan'),
        array('kode_akun'=>'533121','nama_akun'=>'Belanja Penambahan Nilai Gedung dan Bangunan'),
         ));
    }
}
