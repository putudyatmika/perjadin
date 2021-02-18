<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKendaraanMatrik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matrik', function (Blueprint $table) {
            //
            $table->tinyInteger('flag_kendaraan')->nullable()->default(1)->after('tipe_perjadin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matrik', function (Blueprint $table) {
            //
        });
    }
}
