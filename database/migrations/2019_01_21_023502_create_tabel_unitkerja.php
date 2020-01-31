<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelUnitkerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitkerja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode',5);
            $table->string('nama',254);
            $table->string('parent',5)->nullable();
            $table->boolean('jenis')->unsigned();
            $table->boolean('eselon')->unsigned();
            $table->boolean('flag')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unitkerja');
    }
}
