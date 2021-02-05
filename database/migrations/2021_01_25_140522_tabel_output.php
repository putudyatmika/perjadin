<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelOutput extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_output', function (Blueprint $table) {
            $table->increments('id_output');
            $table->year('tahun_output');
            $table->string('kode_prog',10);
            $table->string('kode_keg',4);
            $table->string('kode_kro',3)->nullable();
            $table->string('kode_output',3);
            $table->string('nama_output',254);
            $table->string('singkatan_output',10)->nullable();
            $table->string('pagu_output',20)->nullable();
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
        Schema::dropIfExists('tbl_output');
    }
}
