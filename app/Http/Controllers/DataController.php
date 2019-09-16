<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\MatrikPerjalanan;
use App\Pegawai;
use App\Tujuan;
use App\Golongan;
use App\Unitkerja;
use Validator;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Anggaran;
use App\Transaksi;
use App\Kuitansi;
use Excel;
use App\Exports\FormatViewImport;
use App\Imports\DataImport;
use Auth;

class DataController extends Controller
{
    //
    public function index()
    {
        return view('data.index');
    }
    public function import(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'importData' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('importData')) {
            $file = $request->file('importData'); //GET FILE
            Excel::import(new DataImport, $file); //IMPORT FILE

            Session::flash('message', 'Data excel berhasil di import');
            Session::flash('message_type', 'info');
            return back();
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function format()
    {
        $fileName = 'format-database';
        $data = [
            [
                 //'tahun_matrik' => null,
                'tgl_awal' => 'Format : YYYY-MM-DD',
                'tgl_akhir' => 'Cth : 2019-12-30',
                'kodekab_tujuan' => 'kode 4 digit',
                'lamanya' => null,
                'mak_id'=> 'lihat di menu anggaran ',
                'dana_tid'=> 'lihat di menu anggaran ',
                'dana_mak'=> 'lihat di menu anggaran ',
                'dana_pagu'=> 'lihat di menu anggaran ',
                'dana_unitkerja' => 'kode 5 digit',
                'peg_nip'=> 'Cth : 19900101 201001 1 002',
                'tugas'=> null,
                'peg_unitkerja'=>'kode 5 digit',
                'nomor_surat' => null,
                'tgl_surat' => 'Format : YYYY-MM-DD',
                'ttd_nip' => 'Cth : 19900101 201001 1 002',
                'ttd_jabatan' => null,
                'ttd_nama' => 'Nama Lengkap',
                'flag_ttd' => '0 : Kepala, 1 : An.',
                'nomor_spd' => null,
                'kendaraan' => '1 : Kendaraan Umum, 2 : Kendaraan Dinas, 3 : Plane',
                'ppk_nip' => 'Cth : 19900101 201001 1 002',
                'ppk_nama' => null,
                'flag_cetak_tujuan' => '0: langsung, 1 : kosongan',
                'total_biaya' => null,
                'tgl_kuitansi' => 'Format : YYYY-MM-DD',
                'harian_rupiah'=> null,
                'harian_lama' => null,
                'harian_total' => null,
                'hotel_rupiah' => null,
                'hotel_lama' => null,
                'hotel_total' => null,
                'hotel_flag' => null,
                'transport_rupiah' => null,
                'transport_ket' => null,
                'transport_flag' => null,
                'rill1_ket' => null,
                'rill1_rupiah' => null,
                'rill1_flag' => null,
                'rill2_ket' => null,
                'rill2_rupiah' => null,
                'rill2_flag' => null,
                'rill3_ket' => null,
                'rill3_rupiah'=>null,
                'rill3_flag' => null,
                'rill_total' => null,
                'bendahara_nip' => 'Cth : 19900101 201001 1 002',
                'bendahara_nama' => null,
                'flag_matrik' => '2 : batal, 5 : terlaksana',
                'flag_trx' => '3 : batal, 7 : terlaksana',
                'flag_srt' => '2 : terlaksana, 3 : Batal',
                'flag_spd' => '2 : terlaksana, 3 : Batal',
                'flag_kuitansi' => '2 : terlaksana, 3 : Batal'
            ]
        ];
        $namafile = $fileName . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new FormatViewImport($data), $namafile);
    }
}
