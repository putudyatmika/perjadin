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
    Route::get('pok/program', 'PokController@Program')->name('pok.program');
    Route::post('pok/program/simpan', 'PokController@ProgramSimpan')->name('pok.programsimpan');
    Route::post('pok/program/update', 'PokController@ProgramUpdate')->name('pok.programupdate');
    Route::post('pok/program/hapus', 'PokController@ProgramHapus')->name('pok.programhapus');
    Route::get('pok/program/cari/{kodeprog}', 'PokController@CariProgram')->name('pok.programcari');
    Route::get('pok/kegbyprog/cari/{kodeprog}/{flagkro}', 'PokController@CariKegiatanByProgram')->name('pok.kegbyprogcari');
    Route::get('pok/kegiatan', 'PokController@Kegiatan')->name('pok.kegiatan');
    Route::post('pok/kegiatan/simpan', 'PokController@KegiatanSimpan')->name('pok.kegiatansimpan');
    Route::post('pok/kegiatan/update', 'PokController@KegiatanUpdate')->name('pok.kegiatanupdate');
    Route::post('pok/kegiatan/hapus', 'PokController@KegiatanHapus')->name('pok.kegiatanhapus');
    Route::get('pok/kegiatan/format', 'PokController@FormatKegiatanImport')->name('pok.kegiatanformat');
    Route::post('pok/kegiatan/import', 'PokController@KegiatanImport')->name('pok.kegiatanimport');
    Route::get('pok/kro', 'PokController@Kro')->name('pok.kro');
    Route::post('pok/kro/simpan', 'PokController@KroSimpan')->name('pok.krosimpan');
    Route::post('pok/kro/update', 'PokController@KroUpdate')->name('pok.kroupdate');
    Route::post('pok/kro/hapus', 'PokController@KroHapus')->name('pok.krohapus');
    Route::get('pok/kro/format', 'PokController@FormatKroImport')->name('pok.kroformat');
    Route::post('pok/kro/import', 'PokController@KroImport')->name('pok.kroimport');
    Route::get('pok/krobykegprog/cari/{kodeprog}/{kodekeg}', 'PokController@CariKroByProgKeg')->name('pok.krobyprogkegcari');
    Route::get('pok/output', 'PokController@Output')->name('pok.output');
    Route::post('pok/output/simpan', 'PokController@OutputSimpan')->name('pok.outputsimpan');
    Route::post('pok/output/update', 'PokController@OutputUpdate')->name('pok.outputupdate');
    Route::post('pok/output/hapus', 'PokController@OutputHapus')->name('pok.outputhapus');
    Route::get('pok/outputbyprogkeg/cari/{kodeprog}/{kodekeg}/{kodekro}', 'PokController@CariOutputByProgKeg')->name('pok.outputbyprogkegcari');
    Route::get('pok/output/format', 'PokController@FormatOutputImport')->name('pok.outputformat');
    Route::post('pok/output/import', 'PokController@OutputImport')->name('pok.outputimport');
    Route::get('pok/komponen', 'PokController@Komponen')->name('pok.komponen');
    Route::get('pok/komponen/format', 'PokController@FormatKomponenImport')->name('pok.komponenformat');
    Route::post('pok/komponen/import', 'PokController@KomponenImport')->name('pok.komponenimport');
    Route::post('pok/komponen/simpan', 'PokController@KomponenSimpan')->name('pok.komponensimpan');
    Route::post('pok/komponen/update', 'PokController@KomponenUpdate')->name('pok.komponenupdate');
    Route::post('pok/komponen/hapus', 'PokController@KomponenHapus')->name('pok.komponenhapus');
    Route::get('pok/kompbyoutput/cari/{kodeprog}/{kodekeg}/{kodekro}/{kodeoutput}/{flagsub}', 'PokController@CariKomponenByOutput')->name('pok.kompbyoutput');
    Route::get('pok/subkombykomponen/cari/{kodeprog}/{kodekeg}/{kodekro}/{kodeoutput}/{kodekomponen}', 'PokController@CariSubByKomponen')->name('pok.subkombykomponen');
    Route::get('pok/subkomponen', 'PokController@SubKomponen')->name('pok.subkomponen');
    Route::get('pok/subkomponen/format', 'PokController@FormatSubKomponenImport')->name('pok.subkomponenformat');
    Route::post('pok/subkomponen/import', 'PokController@SubKomponenImport')->name('pok.subkomponenimport');
    Route::post('pok/subkomponen/simpan', 'PokController@SubKomponenSimpan')->name('pok.subkomponensimpan');
    Route::post('pok/subkomponen/update', 'PokController@SubKomponenUpdate')->name('pok.subkomponenupdate');
    Route::post('pok/subkomponen/hapus', 'PokController@SubKomponenHapus')->name('pok.subkomponenhapus');
    Route::get('pok/akun', 'PokController@Akun')->name('pok.akun');
    Route::resource('golongan', 'GolonganController');
    Route::get('pegawai/import', 'PegawaiController@import')->name('pegawai.import');
    Route::get('pejabat/{flagttd}', 'PegawaiController@CariPejabat')->name('cari.pejabat');
    Route::get('pegawai/{nip}', 'PegawaiController@CariPegawai')->name('cari.pegawai');
    Route::get('pegawai/list/{kodeunit}', 'PegawaiController@ListPegawai')->name('pegawai.list');
    Route::resource('pegawai', 'PegawaiController');
    Route::resource('unitkerja', 'UnitkerjaController');
    Route::get('permintaan/list', 'FormPermintaanController@ListPermintaan')->name('permintaan.list');
    Route::get('permintaan/tambah', 'FormPermintaanController@TambahPermintaan')->name('permintaan.tambah');
    Route::post('permintaan/simpan', 'FormPermintaanController@SimpanPermintaan')->name('permintaan.simpan');
    Route::get('permintaan/edit/{pid}', 'FormPermintaanController@EditPermintaan')->name('permintaan.edit');
    Route::post('permintaan/update', 'FormPermintaanController@UpdatePermintaan')->name('permintaan.update');
    Route::get('matrik/kendaraan', 'MatrikController@SinkronKendaraan')->name('matrik.kendaraan');
    Route::get('matrik/baru', 'MatrikController@baru')->name('matrik.baru');
    Route::get('matrik/multi', 'MatrikController@MultiTujuan')->name('matrik.multi');
    Route::post('matrik/simpan', 'MatrikController@simpan')->name('matrik.simpan');
    Route::post('matrik/simpanmulti', 'MatrikController@SimpanMulti')->name('matrik.simpanmulti');
    Route::post('matrik/update', 'MatrikController@updateMatrik')->name('matrik.update');
    Route::post('matrik/updatemulti', 'MatrikController@updateMatrikMulti')->name('matrik.updatemulti');
    Route::get('matrik/edit/{mid}', 'MatrikController@editMatrik')->name('matrik.edit');
    Route::get('matrik/editmulti/{mid}', 'MatrikController@editMatrikMulti')->name('matrik.editmulti');
    Route::post('matrik/alokasi', 'MatrikController@updateAlokasi')->name('matrik.alokasi');
    Route::post('matrik/flag', 'MatrikController@updateFlag')->name('matrik.flag');
    Route::post('matrik/hapus', 'MatrikController@hapus')->name('matrik.hapus');
    Route::get('matrik/view/{mid}', 'MatrikController@view')->name('matrik.view');
    Route::get('matrik/viewbyanggaran/{aid}/{tid}', 'MatrikController@viewByAnggaran')->name('matrik.viewbyanggaran');
    Route::get('matrik', 'MatrikController@list')->name('matrik.list');
    Route::get('/format_matrik', 'MatrikController@format')->name('matrik.format');
    Route::post('/import_matrik', 'MatrikController@import')->name('matrik.import');
    Route::get('anggaran/cari/{id}', 'AnggaranController@CariAnggaran')->name('anggaran.cari');
    Route::post('anggaran/simpanupdate', 'AnggaranController@SimpanUpdate')->name('anggaran.simpanupdate');
    Route::get('anggaran/sinkron', 'AnggaranController@sinkron')->name('anggaran.sinkron');
    Route::get('anggaran/sinkronkode', 'AnggaranController@SinkronKode')->name('anggaran.sinkronkode');
    Route::get('anggaran/export', 'AnggaranController@export')->name('anggaran.export');
    Route::get('anggaran/viewturunan/{aid}', 'AnggaranController@viewturunan')->name('anggaran.turunan');
    Route::get('anggaran/alokasi/{id}', 'AnggaranController@alokasi')->name('anggaran.alokasi');
    Route::post('anggaran/kunci', 'AnggaranController@kunci')->name('anggaran.kunci');
    Route::post('anggaran/simpan', 'AnggaranController@Simpan')->name('anggaran.simpan');
    Route::resource('anggaran', 'AnggaranController');
    Route::get('/format_anggaran', 'AnggaranController@format');
    Route::post('/import_anggaran', 'AnggaranController@import');
    Route::get('turunan/kuitansi/{tid}', 'TurunanController@TotalKuitansi')->name('turunan.kuitansi');
    Route::post('turunan/sinkron/', 'TurunanController@SinkronRealiasi')->name('turunan.sinkron');
    Route::post('turunan/sinkronkan/', 'TurunanController@SyncRealisasiDgnRencana')->name('turunan.sinkronkan');
    Route::resource('turunan', 'TurunanController');
    Route::resource('tujuan', 'TujuanController');
    Route::resource('user', 'UserController');
    Route::resource('tahundasar', 'TahunDasarController');
    Route::get('transaksi/pegawai/sync/{tahun}', 'TransaksiController@syncPegawai')->name('transaksi.sync');
    Route::get('transaksi/view', 'TransaksiController@view')->name('transaksi.view');
    Route::get('transaksi/sinkronsurat', 'TransaksiController@SinkronSuratPermintaan')->name('transaksi.surat');
    Route::get('transaksi/kalendar', 'TransaksiController@Kalendar')->name('transaksi.kalendar');
    Route::post('transaksi/ajukan', 'TransaksiController@AjukanTransaksi')->name('transaksi.ajukan');
    Route::post('transaksi/editadmin', 'TransaksiController@EditAjukanAdmin')->name('transaksi.ajukanadmin');
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
    Route::get('transaksi/cari/{trxid}', 'ViewController@cariTransaksi')->name('cari.transaksi');
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
