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
Route::get('view/{kodetrx}','ViewController@view');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('golongan','GolonganController');
    Route::get('pegawai/import','PegawaiController@import')->name('pegawai.import');
    Route::resource('pegawai','PegawaiController');
    Route::resource('unitkerja','UnitkerjaController');
    Route::get('matrik/transaksi','MatrikController@transaksi')->name('matrik.transaksi');
    Route::resource('matrik','MatrikController');
    Route::get('/format_matrik', 'MatrikController@format');
    Route::post('/import_matrik', 'MatrikController@import');
    Route::resource('anggaran','AnggaranController');
    Route::get('/format_anggaran', 'AnggaranController@format');
    Route::post('/import_anggaran', 'AnggaranController@import');
    Route::resource('tujuan','TujuanController');
    Route::resource('user','UserController');
    Route::get('transaksi/view','TransaksiController@view')->name('transaksi.view');
    Route::resource('transaksi','TransaksiController');
    Route::get('surattugas/view/{kodetrx}','SuratTugasController@view')->name('surattugas.view');
    Route::resource('surattugas','SuratTugasController');
    Route::get('spd/view/{kodetrx}','SpdController@view')->name('spd.view');
    Route::resource('spd','SpdController');
    Route::get('kuitansi/view/{kodetrx}','KuitansiController@view')->name('kuitansi.view');
    Route::resource('kuitansi','KuitansiController');
    Route::get('setuju/daftar','PersetujuanController@daftar')->name('setuju.daftar');
    Route::resource('setuju','PersetujuanController');
    Route::get('laporan/pegawai/{idpeg}','LaporanController@pegawai')->name('lap_pegawai');
    Route::get('laporan/bidang/{bidangid}','LaporanController@bidang')->name('lap_bidang');
    Route::resource('laporan','LaporanController');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('/home', 'HomeController@index')->name('home');
