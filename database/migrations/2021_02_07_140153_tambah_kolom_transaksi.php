<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            //
            $table->string('form_nomor_surat', 50)->nullable()->after('flag_trx');
            $table->date('form_tgl_surat')->nullable()->after('form_nomor_surat');
            $table->string('form_unitkerja_kode', 5)->nullable()->after('form_tgl_surat');
            $table->string('form_unitkerja_nama', 254)->nullable()->after('form_unitkerja_kode');
            $table->string('form_ttd_nip',20)->nullable()->after('form_unitkerja_nama');
            $table->string('form_ttd_nama',254)->nullable()->after('form_ttd_nip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            //
        });
    }
}
