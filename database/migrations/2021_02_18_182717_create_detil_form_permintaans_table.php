<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetilFormPermintaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_permintaan', function (Blueprint $table) {
            $table->increments('id_detil_permintaan');
            $table->integer('id_permintaan')->unsigned();
            $table->tinyInteger('nomor_urut_detil')->nullable();
            $table->year('tahun_detil')->nullable();
            $table->integer('matrik_id')->unsigned();
            $table->string('peg_nip_detil',25)->nullable();
            $table->string('peg_nama_detil',254)->nullable();
            $table->string('peg_gol_detil',3)->nullable();
            $table->boolean('peg_jabatan_detil')->nullable();
            $table->string('peg_unitkerja_detil',5)->nullable();
            $table->string('peg_unitkerja_nama_detil',250)->nullable();
            $table->tinyInteger('bnyk_hari_detil')->nullable();
            $table->date('tgl_brkt_detil')->nullable();
            $table->boolean('flag_detil')->default(1);
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
        Schema::dropIfExists('detil_permintaan');
    }
}
