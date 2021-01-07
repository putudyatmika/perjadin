<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MultiTujuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_tujuan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matrik_id')->unsigned();
            $table->tinyInteger('urutan_tujuan')->unsigned();
            $table->string('kodekab_tujuan', 4);
            $table->string('namakabkota_tujuan', 254)->nullable();
            $table->string('kepala_tujuan', 200)->nullable();
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
        Schema::dropIfExists('multi_tujuan');
    }
}
