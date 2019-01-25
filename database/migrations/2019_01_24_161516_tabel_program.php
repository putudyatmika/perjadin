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
            $table->increments('id_program');
            $table->year('tahun_program');
            $table->string('kode_program',10);
            $table->string('nama_program',100);
            $table->string('singkatan_program',10);
            $table->string('pagu',20);
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
