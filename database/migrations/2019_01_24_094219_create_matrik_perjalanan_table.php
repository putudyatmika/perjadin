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
            $table->year('tahun');
            $table->date('tanggal')->nullable();
            $table->string('peg_id')->nullable();
            $table->string('kodekab',4)->nullable();
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
