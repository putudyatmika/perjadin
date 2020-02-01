<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran', function (Blueprint $table) {
            $table->increments('id');
            $table->year('tahun_anggaran');
            $table->string('mak',40);
            $table->string('komponen_kode',5)->nullable();
            $table->string('komponen_nama',250)->nullable();
            $table->string('uraian',254);
            $table->string('pagu_utama',15);
            $table->string('unitkerja',5);
            $table->boolean('status')->default(1);
            $table->boolean('flag_kunci')->default(0);
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
        Schema::dropIfExists('anggaran');
    }
}
