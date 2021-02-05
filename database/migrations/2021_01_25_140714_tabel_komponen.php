<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelKomponen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_komponen', function (Blueprint $table) {
            $table->increments('id_komponen');
            $table->year('tahun_komponen');
            $table->string('kode_prog',10);
            $table->string('kode_keg',4);
            $table->string('kode_kro',3)->nullable();
            $table->string('kode_output',3);
            $table->string('kode_komponen',10);
            $table->string('nama_komponen',254);
            $table->string('singkatan_komponen',10)->nullable();
            $table->boolean('flag_sub')->default(0);
            $table->string('pagu_komponen',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_komponen');
    }
}
