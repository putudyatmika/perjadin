<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelKuitansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuitansi', function (Blueprint $table) {
            $table->increments('kuitansi_id');
            $table->integer('trx_id')->unsigned();
            $table->string('total_biaya', 20)->nullable();
            $table->boolean('flag_rill')->default(0);
            $table->boolean('flag_kuitansi')->default(0);
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
        Schema::dropIfExists('kuitansi');
    }
}
