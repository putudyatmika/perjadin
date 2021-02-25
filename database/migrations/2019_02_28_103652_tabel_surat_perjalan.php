<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelSuratPerjalan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spd', function (Blueprint $table) {
            $table->increments('spd_id');
            $table->integer('trx_id')->unsigned();
            $table->string('nomor_spd')->nullable();
            $table->boolean('kendaraan')->default(1);
            $table->string('ppk_nip',25)->nullable();
            $table->string('ppk_nama',200)->nullable();
            $table->boolean('flag_ttd')->default(0);
            $table->boolean('flag_spd')->default(0);
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
        Schema::dropIfExists('spd');
    }
}
