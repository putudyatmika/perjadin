<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip_baru',20)->unique();
            $table->string('nip_lama',10)->unique();
            $table->string('nama',254);
            $table->date('tgl_lahir');
            $table->boolean('jk')->unsigned();
            $table->string('gol',3);
            $table->string('unitkerja',5);
            $table->boolean('jabatan')->unsigned();
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
        Schema::dropIfExists('pegawai');
    }
}
