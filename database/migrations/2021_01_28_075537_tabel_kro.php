<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelKro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kro', function (Blueprint $table) {
            $table->increments('id_kro');
            $table->year('tahun_kro');
            $table->string('kode_prog',10);
            $table->string('kode_keg',4);
            $table->string('kode_kro',3);
            $table->string('nama_kro',254);
            $table->string('singkatan_kro',10)->nullable();
            $table->string('pagu_kro',20)->nullable();
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
        Schema::dropIfExists('tbl_kro');
    }
}
