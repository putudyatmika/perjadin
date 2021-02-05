<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelAnggaranUbah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggaran', function (Blueprint $table) {
            //
            $table->string('prog_kode',10)->nullable()->after('mak');
            $table->string('prog_nama',250)->nullable()->after('prog_kode');
            $table->string('keg_kode',4)->nullable()->after('prog_nama');
            $table->string('keg_nama',250)->nullable()->after('keg_kode');
            $table->string('kro_kode',3)->nullable()->after('keg_nama');
            $table->string('kro_nama',250)->nullable()->after('kro_kode');
            $table->string('output_kode',3)->nullable()->after('kro_nama');
            $table->string('output_nama',250)->nullable()->after('output_kode');
            $table->string('subkomponen_kode',1)->nullable()->after('komponen_nama');
            $table->string('subkomponen_nama',250)->nullable()->after('subkomponen_kode');
            $table->string('akun_kode',7)->nullable()->after('subkomponen_nama');
            $table->string('akun_nama',250)->nullable()->after('akun_kode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anggaran', function (Blueprint $table) {
            //
        });
    }
}
