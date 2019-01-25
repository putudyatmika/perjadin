<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTujuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_kabkota',4);
            $table->string('nama_kabkota',254);
            $table->string('kepala',200)->nullable();
            $table->string('nip_kepala',30)->nullable();
            $table->string('rate_darat',10)->nullable();
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
        Schema::dropIfExists('tujuan');
    }
}
