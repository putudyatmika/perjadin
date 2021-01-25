<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_program', function (Blueprint $table) {
            $table->increments('id_prog');
            $table->year('tahun_prog');
            $table->string('kode_prog',10);
            $table->string('nama_prog',100);
            $table->string('singkatan_prog',10)->nullable();
            $table->string('pagu_prog',20)->nullable();
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
        Schema::dropIfExists('tbl_program');
    }
}
