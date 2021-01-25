<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran', function (Blueprint $table) {
            $table->increments('id');
            $table->year('tahun_anggaran');
            $table->string('mak',40);
            $table->string('prog_kode',10)->nullable();
            $table->string('prog_nama',250)->nullable();
            $table->string('keg_kode',5)->nullable();
            $table->string('keg_nama',250)->nullable();
            $table->string('output_kode',5)->nullable();
            $table->string('output_nama',250)->nullable();
            $table->string('komponen_kode',5)->nullable();
            $table->string('komponen_nama',250)->nullable();
            $table->string('subkomponen_kode',3)->nullable();
            $table->string('subkomponen_nama',250)->nullable();
            $table->string('uraian',254);
            $table->string('pagu_utama',15);
            $table->string('rencana_pagu',15);
            $table->string('realisasi_pagu',15);
            $table->string('unitkerja',5);
            $table->boolean('status')->default(1);
            $table->boolean('flag_kunci')->default(0);
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
        Schema::dropIfExists('anggaran');
    }
}
