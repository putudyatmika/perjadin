<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelMatrikUbah extends Migration
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
            $table->tinyInteger('tipe_perjadin')->nullable()->default(1)->after('jenis_perjadin');
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
