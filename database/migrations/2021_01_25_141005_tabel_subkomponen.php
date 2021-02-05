<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelSubkomponen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subkomponen', function (Blueprint $table) {
            $table->increments('id_subkom');
            $table->year('tahun_subkom');
            $table->string('kode_prog',10);
            $table->string('kode_keg',4);
            $table->string('kode_kro',3)->nullable();
            $table->string('kode_output',3);
            $table->string('kode_komponen',3);
            $table->string('kode_subkom',1);
            $table->string('nama_subkom',254);
            $table->string('singkatan_subkom',10)->nullable();
            $table->string('pagu_subkom',20)->nullable();
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
        Schema::dropIfExists('tbl_subkomponen');
    }
}
