<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatrikPerjalananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrik', function (Blueprint $table) {
            $table->increments('id');
            $table->year('tahun_matrik');
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->string('peg_id')->nullable();
            $table->string('kodekab_tujuan',4)->nullable();
            $table->tinyInteger('lamanya');
            $table->string('dana_mak', 30)->nullable();
            $table->string('dana_pagu', 20)->nullable();
            $table->string('dana_unitkerja', 4)->nullable();
            $table->tinyInteger('lama_harian');
            $table->string('dana_harian', 20)->nullable();
            $table->string('total_harian', 20)->nullable();
            $table->string('dana_transport', 20)->nullable();
            $table->tinyInteger('lama_hotel');
            $table->string('dana_hotel', 20)->nullable();
            $table->string('total_hotel', 20)->nullable();
            $table->string('pengeluaran_rill', 20)->nullable();
            $table->string('total_biaya', 20)->nullable();
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
        Schema::dropIfExists('matrik');
    }
}
