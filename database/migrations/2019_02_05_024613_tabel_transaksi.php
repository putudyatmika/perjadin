<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('trx_id');
            $table->string('kode_trx',6)->unique();
            $table->integer('matrik_id')->unsigned();
            $table->foreign('matrik_id')->references('id')->on('matrik');
            $table->integer('peg_id')->unsigned();
            $table->foreign('peg_id')->references('id')->on('pegawai');
            $table->boolean('kabid_konfirmasi')->default(0);
            $table->text('kabit_ket')->nullable();
            $table->boolean('ppk_konfirmasi')->default(0);
            $table->text('ppk_ket')->nullable();
            $table->boolean('kpa_konfirmasi')->default(0);
            $table->text('kpa_ket')->nullable();
            $table->boolean('flag_trx')->nullable()->default(0);
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
        Schema::dropIfExists('transaksi');
    }
}
