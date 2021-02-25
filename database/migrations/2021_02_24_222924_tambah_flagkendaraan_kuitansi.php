<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahFlagkendaraanKuitansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kuitansi', function (Blueprint $table) {
            //
            $table->boolean('flag_jeniskendaraan')->nullable()->default(1)->after('flag_jenisperjadin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kuitansi', function (Blueprint $table) {
            //
        });
    }
}
