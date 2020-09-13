<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {
    // Only authenticated users may enter...
    return view('dashboard');
})->middleware('auth');

Route::get('view/{kodetrx}', 'ViewController@view')->name('view.trx');
Route::get('cari', 'ViewController@cariSrt')->name('cari.srt');
Route::get('print/{kodetrx}', 'KelengkapanController@print')->name('print.srt');
Route::get('unduh/{kodetrx}', 'KelengkapanController@unduh')->name('unduh.srt');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('golongan', 'GolonganController');
    Route::get('pegawai/import', 'PegawaiController@import')->name('pegawai.import');
    Route::get('pejabat/{flagttd}', 'PegawaiController@CariPejabat')->name('cari.pejabat');
    Route::get('pegawai/{nip}', 'PegawaiController@CariPegawai')->name('cari.pegawai');
    Route::resource('pegawai', 'PegawaiController');
    Route::resource('unitkerja', 'UnitkerjaController');
    //Route::get('matrik/transaksi', 'MatrikController@transaksi')->name('matrik.transaksi');
    Route::get('matrik/baru', 'MatrikController@baru')->name('matrik.baru');
    Route::post('matrik/simpan', 'MatrikController@simpan')->name('matrik.simpan');
    Route::post('matrik/update', 'MatrikController@updateMatrik')->name('matrik.update');
    Route::get('matrik/edit/{mid}', 'MatrikController@editMatrik')->name('matrik.edit');
    Route::post('matrik/alokasi', 'MatrikController@updateAlokasi')->name('matrik.alokasi');
    Route::post('matrik/flag', 'MatrikController@updateFlag')->name('matrik.flag');
    Route::post('matrik/hapus', 'MatrikController@hapus')->name('matrik.hapus');
    Route::get('matrik/view/{mid}', 'MatrikController@view')->name('matrik.view');
    Route::get('matrik', 'MatrikController@list')->name('matrik.list');
    //Route::resource('matrik', 'MatrikController');
    Route::get('/format_matrik', 'MatrikController@format')->name('matrik.format');
    Route::post('/import_matrik', 'MatrikController@import')->name('matrik.import');
    Route::get('anggaran/sinkron', 'AnggaranController@sinkron');
    Route::get('anggaran/export', 'AnggaranController@export')->name('anggaran.export');
    Route::get('anggaran/viewturunan/{aid}', 'AnggaranController@viewturunan')->name('anggaran.turunan');
    Route::get('anggaran/alokasi/{id}', 'AnggaranController@alokasi')->name('anggaran.alokasi');
    Route::post('anggaran/kunci', 'AnggaranController@kunci')->name('anggaran.kunci');
    Route::resource('anggaran', 'AnggaranController');
    Route::get('/format_anggaran', 'AnggaranController@format');
    Route::post('/import_anggaran', 'AnggaranController@import');
    Route::get('turunan/kuitansi/{tid}', 'TurunanController@TotalKuitansi')->name('turunan.kuitansi');
    Route::post('turunan/sinkron/', 'TurunanController@SinkronRealiasi')->name('turunan.sinkron');
    Route::resource('turunan', 'TurunanController');
    Route::resource('tujuan', 'TujuanController');
    Route::resource('user', 'UserController');
    Route::resource('tahundasar', 'TahunDasarController');
    Route::get('transaksi/pegawai/sync/{tahun}', 'TransaksiController@syncPegawai')->name('transaksi.sync');
    Route::get('transaksi/view', 'TransaksiController@view')->name('transaksi.view');
    Route::get('transaksi/kalendar', 'TransaksiController@Kalendar')->name('transaksi.kalendar');
    Route::resource('transaksi', 'TransaksiController');
    Route::get('surattugas/pdf/{kodetrx}', 'SuratTugasController@UnduhPDF')->name('surattugas.pdf');
    Route::get('surattugas/view/{kodetrx}', 'SuratTugasController@view')->name('surattugas.view');
    Route::get('surattugas/nomor/{tahun}', 'SuratTugasController@nomor')->name('surattugas.nomor');
    Route::resource('surattugas', 'SuratTugasController');
    Route::get('spd/nomor/{tahun}', 'SpdController@nomor')->name('spd.nomor');
    Route::get('spd/view/{kodetrx}', 'SpdController@view')->name('spd.view');
    Route::resource('spd', 'SpdController');
    Route::get('kuitansi/view/{kodetrx}', 'KuitansiController@view')->name('kuitansi.view');
    Route::post('kuitansi/selesai', 'KuitansiController@selesai')->name('kuitansi.selesai');
    Route::get('kuitansi/print/{kodetrx}', 'KuitansiController@print')->name('kuitansi.print');
    Route::get('kuitansi/unduh/{kodetrx}', 'KuitansiController@unduh')->name('kuitansi.unduh');
    Route::resource('kuitansi', 'KuitansiController');
    Route::get('setuju/daftar', 'PersetujuanController@daftar')->name('setuju.daftar');
    Route::resource('setuju', 'PersetujuanController');
    Route::get('kelengkapan/list', 'KelengkapanController@list')->name('kelengkapan.list');
    Route::get('kelengkapan/print/{kodetrx}', 'KelengkapanController@print')->name('kelengkapan.print');
    Route::get('kelengkapan/unduh/{kodetrx}', 'KelengkapanController@unduh')->name('kelengkapan.unduh');
    Route::post('kelengkapan/simpan', 'KelengkapanController@simpan')->name('kelengkapan.simpan');
    Route::post('kelengkapan/batal', 'KelengkapanController@batal')->name('kelengkapan.batal');
    Route::get('cari/{kodetrx}', 'ViewController@viewTrx')->name('cari.trx');
    Route::get('trx/{kodetrx}', 'ViewController@Transaksi')->name('trx.detil');
    Route::get('laporan/pegawai/{idpeg?}', function ($idpeg = 0) {
        $ctrl = new \App\Http\Controllers\LaporanController();
        return $ctrl->pegawai($idpeg);
    })->name('lap_pegawai');
    Route::get('laporan/bidang/{bidangId?}', function ($bidangId = 0) {
        $ctrl = new \App\Http\Controllers\LaporanController();
        return $ctrl->bidang($bidangId);
    })->name('laporan.bidang');
    Route::get('laporan/anggaran/{aid?}', function ($aid = 0) {
        $ctrl = new \App\Http\Controllers\LaporanController();
        return $ctrl->anggaran($aid);
    })->name('laporan.anggaran');
    Route::get('laporan/tujuan/{tujuanID?}', function ($tujuanID = 0) {
        $ctrl = new \App\Http\Controllers\LaporanController();
        return $ctrl->tujuan($tujuanID);
    })->name('laporan.tujuan');
    Route::resource('laporan', 'LaporanController');
    Route::post('data/import', 'DataController@import')->name('data.import');
    Route::get('data/format', 'DataController@format')->name('data.format');
    Route::resource('data', 'DataController');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('/home', 'HomeController@index')->name('home');
