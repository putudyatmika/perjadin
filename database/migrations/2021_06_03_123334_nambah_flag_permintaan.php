<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NambahFlagPermintaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_permintaan', function (Blueprint $table) {
            //
            $table->tinyInteger('ttd_flag_kepala_permintaan')->default(0)->after('ttd_nama_permintaan');
            $table->string('ttd_jabatan_kepala_permintaan',200)->default('Kepala Badan Pusat Statistik')->after('ttd_flag_kepala_permintaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_permintaan', function (Blueprint $table) {
            //
        });
    }
}
