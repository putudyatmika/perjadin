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
    return view('depan');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/dashboard', function () {
    return view('layout.default');
});
/*
Route::get('/golongan', function () {
    return view('golongan');
});
*/
Route::resource('golongan','GolonganController');
Route::resource('pegawai','PegawaiController');
Route::resource('unitkerja','UnitkerjaController');


Route::get('/home', 'HomeController@index')->name('home');
