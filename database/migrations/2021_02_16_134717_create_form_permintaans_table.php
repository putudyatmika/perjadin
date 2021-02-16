<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPermintaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_permintaan', function (Blueprint $table) {
            $table->increments('id_permintaan');
            $table->year('tahun_permintaan')->nullable();
            $table->string('nomor_permintaan')->nullable();
            $table->date('tgl_permintaan')->nullable();
            $table->integer('t_id_permintaan')->unsigned()->nullable();
            $table->integer('a_id_permintaan')->unsigned()->nullable();
            $table->string('unitkerja_kode_permintaan',5)->nullable();
            $table->string('unitkerja_nama_permintaan',200)->nullable();
            $table->string('ttd_nip_permintaan',25)->nullable();
            $table->boolean('ttd_jabatan_permintaan')->nullable();
            $table->string('ttd_nama_permintaan',200)->nullable();
            $table->string('ttd_kepala_nip_permintaan',25)->nullable();
            $table->string('ttd_kepala_nama_permintaan',200)->nullable();
            $table->boolean('flag_permintaan')->default(0);
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
        Schema::dropIfExists('surat_permintaan');
    }
}
