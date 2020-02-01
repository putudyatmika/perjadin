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

/*
Route::get('/', function () {
    return view('dashboard');
});
*/
Route::get('/', function () {
    // Only authenticated users may enter...
    return view('dashboard');
})->middleware('auth');
/*
Route::get('/login', function () {
    return view('login.index');
})->name('login');
/*
Route::get('/dashboard', function () {
    return view('layout.default');
});

Route::get('/golongan', function () {
    return view('golongan');
});
Route::match(['get', 'post'], '/login', 'AdminController@login')->name('admin.login');
*/
//Route::get('/pegawai/tambah','PegawaiController@tambah');
Route::get('view/{kodetrx}', 'ViewController@view');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('golongan', 'GolonganController');
    Route::get('pegawai/import', 'PegawaiController@import')->name('pegawai.import');
    Route::resource('pegawai', 'PegawaiController');
    Route::resource('unitkerja', 'UnitkerjaController');
    Route::get('matrik/transaksi', 'MatrikController@transaksi')->name('matrik.transaksi');
    Route::resource('matrik', 'MatrikController');
    Route::get('/format_matrik', 'MatrikController@format');
    Route::post('/import_matrik', 'MatrikController@import');
    Route::get('anggaran/sinkron', 'AnggaranController@sinkron');
    Route::get('anggaran/export', 'AnggaranController@export')->name('anggaran.export');
    Route::get('anggaran/viewturunan/{aid}', 'AnggaranController@viewturunan')->name('anggaran.turunan');
    Route::get('anggaran/alokasi/{id}', 'AnggaranController@alokasi')->name('anggaran.alokasi');
    Route::post('anggaran/kunci', 'AnggaranController@kunci')->name('anggaran.kunci');
    Route::resource('anggaran', 'AnggaranController');
    Route::get('/format_anggaran', 'AnggaranController@format');
    Route::post('/import_anggaran', 'AnggaranController@import');
    Route::resource('turunan', 'TurunanController');
    Route::resource('tujuan', 'TujuanController');
    Route::resource('user', 'UserController');
    Route::resource('tahundasar', 'TahunDasarController');
    Route::get('transaksi/view', 'TransaksiController@view')->name('transaksi.view');
    Route::resource('transaksi', 'TransaksiController');
    Route::get('surattugas/view/{kodetrx}', 'SuratTugasController@view')->name('surattugas.view');
    Route::get('surattugas/nomor/{tahun}', 'SuratTugasController@nomor')->name('surattugas.nomor');
    Route::resource('surattugas', 'SuratTugasController');
    Route::get('spd/nomor/{tahun}', 'SpdController@nomor')->name('spd.nomor');
    Route::get('spd/view/{kodetrx}', 'SpdController@view')->name('spd.view');
    Route::resource('spd', 'SpdController');
    Route::get('kuitansi/view/{kodetrx}', 'KuitansiController@view')->name('kuitansi.view');
    Route::resource('kuitansi', 'KuitansiController');
    Route::get('setuju/daftar', 'PersetujuanController@daftar')->name('setuju.daftar');
    Route::resource('setuju', 'PersetujuanController');
    Route::get('laporan/pegawai/{idpeg?}', function($idpeg=0) {
        $ctrl = new \App\Http\Controllers\LaporanController();
        return $ctrl->pegawai($idpeg);
    })->name('lap_pegawai');
    //Route::get('laporan/bidang/{bidangId}', 'LaporanController@bidang')->name('laporan.bidang');
    Route::get('laporan/bidang/{bidangId?}', function($bidangId=0) {
        $ctrl = new \App\Http\Controllers\LaporanController();
        return $ctrl->bidang($bidangId);
    })->name('laporan.bidang');
    Route::get('laporan/anggaran/{aid?}', function($aid=0) {
        $ctrl = new \App\Http\Controllers\LaporanController();
        return $ctrl->anggaran($aid);
    })->name('laporan.anggaran');
    Route::get('laporan/tujuan/{tujuanID?}', function($tujuanID=0) {
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
