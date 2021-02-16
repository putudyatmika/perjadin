<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelSuratTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surattugas', function (Blueprint $table) {
            $table->increments('srt_id');
            $table->integer('trx_id')->unsigned();
            $table->string('nomor_surat')->nullable();
            $table->date('tgl_surat')->nullable();
            $table->string('ttd_nip',25)->nullable();
            $table->string('ttd_jabatan',200)->nullable();
            $table->string('ttd_nama',200)->nullable();
            $table->boolean('flag_ttd')->default(0);
            $table->boolean('flag_surattugas')->default(0);
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
        Schema::dropIfExists('surattugas');
    }
}
