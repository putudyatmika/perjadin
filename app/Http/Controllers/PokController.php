<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Golongan;
use App\Unitkerja;
use App\Pegawai;
use App\MatrikPerjalanan;
use Validator;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Anggaran;
use Excel;
use App\Exports\AnggaranViewExport;
use App\Exports\AnggaranNewExport;
use App\Imports\AnggaranImport;
use App\TurunanAnggaran;
use App\Transaksi;
use App\SuratTugas;
use App\Spd;
use App\Kuitansi;
use App\PokProgram;
use App\PokKegiatan;
use App\PokOutput;

class PokController extends Controller
{
    //
    
    public function Program()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $data = PokProgram::where('tahun_prog',$tahun_anggaran)->get();
        //dd($data);
        return view('pok.program',['dataProgram'=>$data]);
    }
    public function ProgramSimpan(Request $request)
    {
       $count = PokProgram::where([['tahun_prog',$request->tahun_anggaran],['kode_prog',$request->prog_kode]])->count();
       if ($count > 0)
       {
           //sudah ada program
           $pesan_error = 'Data Program <b>'.$request->prog_nama.'</b> sudah pernah di entri';
           $warna_error = 'danger';
       }
       else 
       {
            $data = new PokProgram();
            $data->tahun_prog = $request->tahun_anggaran;
            $data->kode_prog = trim($request->prog_kode);
            $data->nama_prog = trim($request->prog_nama);
            $data->save();

            $pesan_error = 'Data Program <b>['.$request->prog_kode.'] '.$request->prog_nama.'</b> berhasil di simpan';
            $warna_error = 'success';

       }
       Session::flash('message', $pesan_error);
       Session::flash('message_type', $warna_error);
       return redirect()->route('pok.program');
    }
    public function ProgramUpdate(Request $request)
    {
       $count = PokProgram::where('id_prog',$request->id_prog)->count();
       if ($count > 0)
       {
           //ada program
            $data = PokProgram::where('id_prog',$request->id_prog)->first();
            $data->kode_prog = trim($request->prog_kode);
            $data->nama_prog = trim($request->prog_nama);
            $data->update();

            $pesan_error = 'Data Program <b>['.$request->prog_kode.'] '.$request->prog_nama.'</b> berhasil di update';
            $warna_error = 'success';
       }
       else 
       {
           $pesan_error = 'Data Program <b>'.$request->prog_nama.'</b> tidak ada';
            $warna_error = 'danger';
       }
       Session::flash('message', $pesan_error);
       Session::flash('message_type', $warna_error);
       return redirect()->route('pok.program');
    }
    public function ProgramHapus(Request $request)
    {
        $count = PokProgram::where('id_prog',$request->id_prog)->count();
        if ($count > 0)
        {
            //ada program
                $data = PokProgram::where('id_prog',$request->id_prog)->first();
                $data->delete();

                $pesan_error = 'Data Program <b>['.$request->prog_kode.'] '.$request->prog_nama.'</b> berhasil di hapus';
                $warna_error = 'success';
        }
        else 
        {
            $pesan_error = 'Data Program <b>'.$request->prog_nama.'</b> tidak ada';
            $warna_error = 'danger';
        }
       Session::flash('message', $pesan_error);
       Session::flash('message_type', $warna_error);
       return redirect()->route('pok.program');
    }

    public function Kegiatan()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $dataProgram = PokProgram::where('tahun_prog',$tahun_anggaran)->get();
        $dataKegiatan = PokKegiatan::where('tahun_keg',$tahun_anggaran)->get();
        return view('pok.kegiatan',['dataProgram'=>$dataProgram,'dataKegiatan'=>$dataKegiatan]);
    }
    public function KegiatanSimpan(Request $request)
    {
        $count = PokKegiatan::where([['tahun_keg',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode]])->count();
        if ($count > 0)
        {
            //sudah ada program
            $pesan_error = 'Data Kegiatan <b>['.$request->keg_kode.'] '.$request->keg_nama.'</b> sudah pernah di entri';
            $warna_error = 'danger';
        }
        else 
        {
             $data = new PokKegiatan();
             $data->tahun_keg = $request->tahun_anggaran;
             $data->kode_prog = trim($request->prog_kode);
             $data->kode_keg = trim($request->keg_kode);
             $data->nama_keg = trim($request->keg_nama);
             $data->save();
 
             $pesan_error = 'Data Program <b>['.$request->keg_kode.'] '.$request->keg_nama.'</b> berhasil di simpan';
             $warna_error = 'success';
 
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.kegiatan');
    }
}
