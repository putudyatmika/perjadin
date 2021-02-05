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
use App\Exports\FormatViewImport;
use App\Imports\PokOutputImport;
use App\Imports\PokKomponenImport;
use App\Imports\PokKegiatanImport;
use App\Imports\PokKroImport;
use App\Imports\PokSubKomponenImport;
use App\TurunanAnggaran;
use App\Transaksi;
use App\SuratTugas;
use App\Spd;
use App\Kuitansi;
use App\PokProgram;
use App\PokKegiatan;
use App\PokOutput;
use App\PokKro;
use App\PokKomponen;
use App\PokSubKomponen;
use App\PokAkun;

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
       $tahun_anggaran=Session::get('tahun_anggaran');
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
            //cek dulu kegiatan dgn program ini apakah ada
            $count_keg = PokKegiatan::where([['tahun_keg',$request->tahun_anggaran],['kode_prog',$request->prog_kode]])->count();
            if ($count_keg > 0)
            {
                //masih ada kegiatan dgn kode program ini
                $pesan_error = '<b>(ERROR)</b> Masih ada '.$count_keg.' Kegiatan dengan Program <b>['.$request->prog_kode.'] '.$request->prog_nama.'</b> ini';
                $warna_error = 'danger';
            }
            else
            {
                //bisa di hapus program ini
                $data = PokProgram::where('id_prog',$request->id_prog)->first();
                $data->delete();

                $pesan_error = 'Data Program <b>['.$request->prog_kode.'] '.$request->prog_nama.'</b> berhasil di hapus';
                $warna_error = 'success';
            }

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
        $dataKegiatan = PokKegiatan::where('tahun_keg',$tahun_anggaran)->orderBy('kode_prog','asc')->orderBy('kode_keg','asc')->get();
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
             $data->flag_kro = $request->flag_kro;
             $data->save();

             $pesan_error = 'Data Kegiatan <b>['.$request->keg_kode.'] '.$request->keg_nama.'</b> berhasil di simpan';
             $warna_error = 'success';

        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.kegiatan');
    }
    public function KegiatanUpdate(Request $request)
    {
        //dd($request->all());
        $count = PokKegiatan::where('id_keg',$request->idkeg)->count();
        if ($count > 0)
        {
            //ada kegiatan yg akan di edit
            $data = PokKegiatan::where('id_keg',$request->idkeg)->first();
            $data->kode_prog = trim($request->prog_kode);
            $data->kode_keg = trim($request->keg_kode);
            $data->nama_keg = trim($request->keg_nama);
            $data->flag_kro = $request->flag_kro;
            $data->update();

            $pesan_error = 'Data Kegiatan <b>['.$request->keg_kode.'] '.$request->keg_nama.'</b> berhasil di update';
            $warna_error = 'success';

        }
        else
        {
             //tidak ada idkegiatan ini
            $pesan_error = 'Data Kegiatan <b>['.$request->keg_kode.'] '.$request->keg_nama.'</b> tidak ada';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.kegiatan');
    }
    public function KegiatanHapus(Request $request)
    {
        //dd($request->all());
        $count = PokKegiatan::where('id_keg',$request->idkeg)->count();
        if ($count > 0)
        {
            //ada kegiatan yg akan di edit
            $data = PokKegiatan::where('id_keg',$request->idkeg)->first();
            $data->delete();

            $pesan_error = 'Data Kegiatan <b>['.$request->keg_kode.'] '.$request->keg_nama.'</b> berhasil di hapus';
            $warna_error = 'success';

        }
        else
        {
             //tidak ada idkegiatan ini
            $pesan_error = 'Data Kegiatan <b>['.$request->keg_kode.'] '.$request->keg_nama.'</b> tidak ada';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.kegiatan');
    }
    public function CariProgram($kodeprog)
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $count = PokProgram::where([['tahun_prog',$tahun_anggaran],['kode_prog',$kodeprog]])->count();
        $arr = array(
            'status'=>false,
            'hasil'=>'Program tidak tersedia'
        );
        if ($count > 0)
        {
            $data = PokProgram::where([['tahun_prog',$tahun_anggaran],['kode_prog',$kodeprog]])->first();
            $arr = array(
                'status'=>true,
                'hasil'=> array(
                    'id_prog'=>$data->id_prog,
                    'kode_prog'=>$data->kode_prog,
                    'nama_prog'=>$data->nama_prog
                ),
            );
        }
        return Response()->json($arr);
    }
    public function CariKegiatanByProgram($kodeprog,$flagkro)
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        if ($flagkro > 1)
        {
            //semua di cari
            $count = PokKegiatan::where([['tahun_keg',$tahun_anggaran],['kode_prog',$kodeprog]])->count();
        }
        else
        {
            $count = PokKegiatan::where([['tahun_keg',$tahun_anggaran],['kode_prog',$kodeprog],['flag_kro',$flagkro]])->count();
        }

        $arr = array(
            'status'=>false,
            'hasil'=>'Kegiatan tidak tersedia'
        );
        if ($count > 0)
        {
            if ($flagkro > 1)
            {
                $data = PokKegiatan::where([['tahun_keg',$tahun_anggaran],['kode_prog',$kodeprog]])->get();
            }
            else
            {
                $data = PokKegiatan::where([['tahun_keg',$tahun_anggaran],['kode_prog',$kodeprog],['flag_kro',$flagkro]])->get();
            }
            $arr_kro = array();
            foreach ($data as $item) {
                if ($item->flag_kro==1)
                {
                    //ada kro
                    $count_kro = PokKro::where([['tahun_kro',$tahun_anggaran],['kode_prog',$item->kode_prog],['kode_keg',$item->kode_keg]])->count();
                    if ($count_kro>0)
                    {
                        $data_kro = PokKro::where([['tahun_kro',$tahun_anggaran],['kode_prog',$item->kode_prog],['kode_keg',$item->kode_keg]])->get();
                        foreach ($data_kro as $kro) {
                            $hasil_kro[]=array(
                                'id_kro'=>$kro->id_kro,
                                'tahun_kro'=>$kro->tahun_kro,
                                'kode_prog'=>$kro->kode_prog,
                                'kode_keg'=>$kro->kode_keg,
                                'kode_kro'=>$kro->kode_kro,
                                'nama_kro'=>$kro->nama_kro
                            );
                        }
                        $arr_kro = array(
                            'status_kro'=>true,
                            'hasil_kro'=>$hasil_kro
                        );
                    }
                    else
                    {
                        $arr_kro = array(
                            'status_kro'=>false,
                            'hasil_kro'=>'KRO masih kosong'
                        );
                    }
                }
                else
                {
                    $arr_kro = array(
                        'status_kro'=>false,
                        'hasil_kro'=>'KRO tidak tersedia'
                    );
                }
                $hasil[]=array(
                    'id_keg'=>$item->id_keg,
                    'tahun_keg'=>$item->tahun_keg,
                    'kode_prog'=>$item->kode_prog,
                    'nama_prog'=>$item->Program->nama_prog,
                    'kode_keg'=>$item->kode_keg,
                    'nama_keg'=>$item->nama_keg,
                    'flag_kro'=>$item->flag_kro,
                    'kro'=>$arr_kro
                );
            }
            $arr = array(
                'status'=>true,
                'jumlah'=>$count,
                'hasil'=> $hasil,
            );
        }
        return Response()->json($arr);
    }
    public function Kro()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $dataProgram = PokProgram::where('tahun_prog',$tahun_anggaran)->get();
        $dataKro = PokKro::where('tahun_kro',$tahun_anggaran)->get();
        return view('pok.kro',['dataProgram'=>$dataProgram,'dataKro'=>$dataKro]);
    }
    public function KroSimpan(Request $request)
    {
        //dd($request->all());
        //$tahun_anggaran=Session::get('tahun_anggaran');
        $count = PokKro::where([['tahun_kro',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_kro',$request->kro_kode]])->count();
        if ($count > 0)
        {
            //sudah ada kro ini
            $pesan_error = 'Data KRO <b>['.$request->kro_kode.'] '.$request->kro_nama.'</b> sudah pernah di entri';
            $warna_error = 'danger';
        }
        else
        {
            $data = new PokKro();
            $data->tahun_kro = $request->tahun_anggaran;
            $data->kode_prog = trim($request->prog_kode);
            $data->kode_keg = trim($request->keg_kode);
            $data->kode_kro = trim($request->kro_kode);
            $data->nama_kro = trim($request->kro_nama);
            $data->save();

            $pesan_error = 'Data KRO <b>['.$request->kro_kode.'] '.$request->kro_nama.'</b> berhasil di simpan';
            $warna_error = 'success';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.kro');
    }
    public function KroUpdate(Request $request)
    {
        //dd($request->all());
        $count = PokKro::where('id_kro',$request->idkro)->count();
        if ($count > 0)
        {
            //ada kro ini
            $data = PokKro::where('id_kro',$request->idkro)->first();
            $data->kode_prog = trim($request->prog_kode);
            $data->kode_keg = trim($request->keg_kode);
            $data->kode_kro = trim($request->kro_kode);
            $data->nama_kro = trim($request->kro_nama);
            $data->update();

            $pesan_error = 'Data KRO <b>['.$request->kro_kode.'] '.$request->kro_nama.'</b> berhasil di update';
            $warna_error = 'success';
        }
        else
        {


            $pesan_error = 'Data KRO <b>['.$request->kro_kode.'] '.$request->kro_nama.'</b> tidak ada';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.kro');
    }
    public function KroHapus(Request $request)
    {
        $count = PokKro::where('id_kro',$request->idkro)->count();
        if ($count > 0)
        {
            //ada kro ini
            $data = PokKro::where('id_kro',$request->idkro)->first();
            $data->delete();

            $pesan_error = 'Data KRO <b>['.$request->kro_kode.'] '.$request->kro_nama.'</b> berhasil di hapus';
            $warna_error = 'success';
        }
        else
        {


            $pesan_error = 'Data KRO <b>['.$request->kro_kode.'] '.$request->kro_nama.'</b> tidak ada';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.kro');
    }
    public function CariKroByProgKeg($kodeprog,$kodekeg)
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $arr = array(
            'status'=>false,
            'hasil'=>'KRO tidak tersedia'
        );
        $count = PokKro::where([['tahun_kro',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg]])->count();
        if ($count > 0)
        {
            $data = PokKro::where([['tahun_kro',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg]])->get();
            $arr_kro = array();
            foreach ($data as $item) {
                $hasil[]=array(
                    'id_kro'=>$item->id_kro,
                    'tahun_keg'=>$item->tahun_kro,
                    'kode_prog'=>$item->kode_prog,
                    'nama_prog'=>$item->Kegiatan->Program->nama_prog,
                    'kode_keg'=>$item->kode_keg,
                    'nama_keg'=>$item->Kegiatan->nama_keg,
                    'kode_kro'=>$item->kode_kro,
                    'nama_kro'=>$item->nama_kro
                );
            }
            $arr = array(
                'status'=>true,
                'jumlah'=>$count,
                'hasil'=> $hasil,
            );
        }
        return Response()->json($arr);
    }
    public function Output()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $dataProgram = PokProgram::where('tahun_prog',$tahun_anggaran)->get();
        $dataOutput = PokOutput::where('tahun_output',$tahun_anggaran)->get();
        return view('pok.output',['dataProgram'=>$dataProgram,'dataOutput'=>$dataOutput]);
    }
    public function OutputSimpan(Request $request)
    {
        //dd($request->all());
        //$tahun_anggaran=Session::get('tahun_anggaran');
        $count = PokOutput::where([['tahun_output',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_output',$request->output_kode]])->count();
        if ($count > 0)
        {
            //sudah ada kro ini
            $pesan_error = 'Data Output Kegiatan <b>['.$request->output_kode.'] '.$request->output_nama.'</b> sudah pernah di entri';
            $warna_error = 'danger';
        }
        else
        {
            if ($request->kro_kode == null)
            {
                $kro_kode = NULL;
            }
            else
            {
                $kro_kode = trim($request->kro_kode);
            }
            $data = new PokOutput();
            $data->tahun_output = $request->tahun_anggaran;
            $data->kode_prog = trim($request->prog_kode);
            $data->kode_keg = trim($request->keg_kode);
            $data->kode_kro = $kro_kode;
            $data->kode_output = trim($request->output_kode);
            $data->nama_output = trim($request->output_nama);
            $data->save();

            $pesan_error = 'Data Output Kegiatan <b>['.$request->output_kode.'] '.$request->output_nama.'</b> berhasil di simpan';
            $warna_error = 'success';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.output');
    }
    public function OutputUpdate(Request $request)
    {
        //dd($request->all());
        $count = PokOutput::where('id_output',$request->idoutput)->count();
        if ($count > 0)
        {
            //ada output ini
            if ($request->kro_kode == null)
            {
                $kro_kode = NULL;
            }
            else
            {
                $kro_kode = trim($request->kro_kode);
            }
            $data = PokOutput::where('id_output',$request->idoutput)->first();
            $data->kode_prog = trim($request->prog_kode);
            $data->kode_keg = trim($request->keg_kode);
            $data->kode_kro = $kro_kode;
            $data->kode_output = trim($request->output_kode);
            $data->nama_output = trim($request->output_nama);
            $data->update();

            $pesan_error = 'Data Output Kegiatan <b>['.$request->output_kode.'] '.$request->output_nama.'</b> berhasil di update';
            $warna_error = 'success';

        }
        else
        {
            $pesan_error = 'Data Output Kegiatan <b>['.$request->output_kode.'] '.$request->output_nama.'</b> tidak tersedia';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.output');
    }
    public function OutputHapus(Request $request)
    {
        $count = PokOutput::where('id_output',$request->idoutput)->count();
        if ($count > 0)
        {
            //ada output ini
            $data = PokOutput::where('id_output',$request->idoutput)->first();
            $data->delete();

            $pesan_error = 'Data Output Kegiatan <b>['.$request->output_kode.'] '.$request->output_nama.'</b> berhasil di hapus';
            $warna_error = 'success';

        }
        else
        {
            $pesan_error = 'Data Output Kegiatan <b>['.$request->output_kode.'] '.$request->output_nama.'</b> tidak tersedia';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.output');
    }
    public function CariOutputByProgKeg($kodeprog,$kodekeg,$kodekro)
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $arr = array(
            'status'=>false,
            'hasil'=>'Output tidak tersedia'
        );
        if ($kodekro == 1)
        {
            //tidak ada kro langsung output
            $count = PokOutput::where([['tahun_output',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg]])->count();
        }
        else
        {
            //pakai kro
            $count = PokOutput::where([['tahun_output',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg],['kode_kro',$kodekro]])->count();
        }

        if ($count > 0)
        {
            if ($kodekro == 1)
            {
                $data = PokOutput::where([['tahun_output',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg]])->get();
            }
            else
            {
                $data = PokOutput::where([['tahun_output',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg],['kode_kro',$kodekro]])->get();
            }

            foreach ($data as $item) {
                $hasil[]=array(
                    'id_output'=>$item->id_output,
                    'tahun_keg'=>$item->tahun_output,
                    'kode_prog'=>$item->kode_prog,
                    'nama_prog'=>$item->Program->nama_prog,
                    'kode_keg'=>$item->kode_keg,
                    'nama_keg'=>$item->Kegiatan->nama_keg,
                    'kode_kro'=>$item->kode_kro,
                    'kode_output'=>$item->kode_output,
                    'nama_output'=>$item->nama_output
                );
            }
            $arr = array(
                'status'=>true,
                'jumlah'=>$count,
                'hasil'=> $hasil,
            );
        }
        return Response()->json($arr);
    }
    public function Komponen()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $dataProgram = PokProgram::where('tahun_prog',$tahun_anggaran)->get();
        $dataKomponen = PokKomponen::where('tahun_komponen',$tahun_anggaran)->orderBy('kode_prog','asc')->orderBy('kode_keg','asc')->get();
        return view('pok.komponen',['dataProgram'=>$dataProgram,'dataKomponen'=>$dataKomponen]);
    }
    public function KomponenSimpan(Request $request)
    {
        //dd($request->all());
        if ($request->kro_kode == null)
            {
            $data->nama_komponen = trim($request->komponen_nama);
            $count = PokKomponen::where([['tahun_komponen',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_output',$request->output_kode],['kode_komponen',$request->komponen_kode]])->count();
                $kro_kode = NULL;
            }
        else
            {
                $kro_kode = trim($request->kro_kode);
                $count = PokKomponen::where([['tahun_komponen',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_output',$request->output_kode],['kode_kro',$request->kro_kode],['kode_komponen',$request->komponen_kode]])->count();
            }

        if ($count > 0)
        {
            //sudah ada kro ini
            $pesan_error = 'Data Komponen Kegiatan <b>['.$request->output_kode.'] '.$request->output_nama.'</b> sudah pernah di entri';
            $warna_error = 'danger';
        }
        else
        {
            $data = new PokKomponen();
            $data->tahun_komponen = $request->tahun_anggaran;
            $data->kode_prog = trim($request->prog_kode);
            $data->kode_keg = trim($request->keg_kode);
            $data->kode_kro = $kro_kode;
            $data->kode_output = trim($request->output_kode);
            $data->kode_komponen = trim($request->komponen_kode);
            $data->nama_komponen = trim($request->komponen_nama);
            $data->flag_sub = $request->flag_subkomponen;
            $data->save();

            $pesan_error = 'Data Komponen Kegiatan <b>['.$request->komponen_kode.'] '.$request->komponen_nama.'</b> berhasil di simpan';
            $warna_error = 'success';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.komponen');
    }
    public function KomponenUpdate(Request $request)
    {
        //dd($request->all());
        $count = PokKomponen::where('id_komponen',$request->idkomponen)->count();
        if ($count > 0)
        {
            //ada komponen ini

            if ($request->kro_kode == null)
            {
                $kro_kode = NULL;
            }
            else
            {
                $kro_kode = $request->kro_kode;
            }
            $data = PokKomponen::where('id_komponen',$request->idkomponen)->first();
            $data->kode_prog = trim($request->prog_kode);
            $data->kode_keg = trim($request->keg_kode);
            $data->kode_kro = $kro_kode;
            $data->kode_output = trim($request->output_kode);
            $data->kode_komponen = trim($request->komponen_kode);
            $data->nama_komponen = trim($request->komponen_nama);
            $data->flag_sub = $request->flag_subkomponen;
            $data->update();

            $pesan_error = 'Data Komponen Kegiatan <b>['.$request->komponen_kode.'] '.$request->komponen_nama.'</b> berhasil di update';
            $warna_error = 'success';

        }
        else
        {
            $pesan_error = 'Data Komponen Kegiatan <b>['.$request->output_kode.'] '.$request->output_nama.'</b> tidak tersedia';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.komponen');
    }
    public function KomponenHapus(Request $request)
    {
        //dd($request->all());
        $count = PokKomponen::where('id_komponen',$request->idkomponen)->count();
        if ($count > 0)
        {
            //ada komponen ini
            $data = PokKomponen::where('id_komponen',$request->idkomponen)->first();
            $data->delete();

            $pesan_error = 'Data Komponen Kegiatan <b>['.$request->komponen_kode.'] '.$request->komponen_nama.'</b> berhasil di hapus';
            $warna_error = 'success';

        }
        else
        {
            $pesan_error = 'Data Komponen Kegiatan <b>['.$request->output_kode.'] '.$request->output_nama.'</b> tidak tersedia';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.komponen');
    }
    public function CariKomponenByOutput($kodeprog,$kodekeg,$kodekro,$kodeoutput,$flagsub)
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $arr = array(
            'status'=>false,
            'hasil'=>'Komponen tidak tersedia'
        );
        if ($kodekro == 1)
        {
            //tidak ada kro
            $kodekro = null;
        }

        if ($flagsub > 1)
        {
            //semua komponen
                $count = PokKomponen::where([['tahun_komponen',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg],['kode_kro',$kodekro],['kode_output',$kodeoutput]])->count();
        }
        else
        {
                $count = PokKomponen::where([['tahun_komponen',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg],['kode_kro',$kodekro],['kode_output',$kodeoutput],['flag_sub',$flagsub]])->count();
        }
        if ($count > 0)
        {
            if ($flagsub > 1)
            {
                $data = PokKomponen::where([['tahun_komponen',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg],['kode_kro',$kodekro],['kode_output',$kodeoutput]])->get();
            }
            else
            {
                $data = PokKomponen::where([['tahun_komponen',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg],['kode_kro',$kodekro],['kode_output',$kodeoutput],['flag_sub',$flagsub]])->get();
            }
            foreach ($data as $item) {
                $hasil[]=array(
                    'id_komponen'=>$item->id_komponen,
                    'tahun_keg'=>$item->tahun_komponen,
                    'kode_prog'=>$item->kode_prog,
                    'nama_prog'=>$item->Program->nama_prog,
                    'kode_keg'=>$item->kode_keg,
                    'nama_keg'=>$item->Program->Kegiatan->nama_keg,
                    'kode_kro'=>$item->kode_kro,
                    'kode_output'=>$item->kode_output,
                    'nama_output'=>$item->Program->Kegiatan->Output->nama_output,
                    'kode_komponen'=>$item->kode_komponen,
                    'nama_komponen'=>$item->nama_komponen,
                    'flag_sub'=>$item->flag_sub
                );
            }
            $arr = array(
                'status'=>true,
                'jumlah' =>$count,
                'hasil'=>$hasil
            );

        }
        return Response()->json($arr);
    }
    public function SubKomponen()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $dataProgram = PokProgram::where('tahun_prog',$tahun_anggaran)->get();
        $dataSubKomponen = PokSubKomponen::where('tahun_subkom',$tahun_anggaran)->get();
        return view('pok.subkomponen',['dataProgram'=>$dataProgram,'dataSubKomponen'=>$dataSubKomponen]);
    }
    public function SubKomponenSimpan(Request $request)
    {
        //dd($request->all());
        if ($request->kro_kode == null)
            {
                $count = PokSubKomponen::where([['tahun_subkom',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_output',$request->output_kode],['kode_komponen',$request->komponen_kode],['kode_subkom',$request->subkomponen_kode]])->count();
                $kro_kode = NULL;
            }
        else
            {
                $kro_kode = trim($request->kro_kode);
                $count = PokSubKomponen::where([['tahun_subkom',$request->tahun_anggaran],['kode_prog',$request->prog_kode],['kode_keg',$request->keg_kode],['kode_output',$request->output_kode],['kode_komponen',$request->komponen_kode],['kode_subkom',$request->subkomponen_kode],['kode_kro',$request->kro_kode]])->count();
            }

        if ($count > 0)
        {
            //sudah ada kro ini
            $pesan_error = 'Data Sub Komponen Kegiatan <b>['.$request->subkomponen_kode.'] '.$request->subkomponen_nama.'</b> sudah pernah di entri';
            $warna_error = 'danger';
        }
        else
        {
            $data = new PokSubKomponen();
            $data->tahun_subkom = $request->tahun_anggaran;
            $data->kode_prog = trim($request->prog_kode);
            $data->kode_keg = trim($request->keg_kode);
            $data->kode_kro = $kro_kode;
            $data->kode_output = trim($request->output_kode);
            $data->kode_komponen = trim($request->komponen_kode);
            $data->kode_subkom = trim($request->subkomponen_kode);
            $data->nama_subkom = trim($request->subkomponen_nama);
            $data->save();

            $pesan_error = 'Data Sub Komponen Kegiatan <b>['.$request->subkomponen_kode.'] '.$request->subkomponen_nama.'</b> berhasil di simpan';
            $warna_error = 'success';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.subkomponen');
    }
    public function SubKomponenUpdate(Request $request)
    {
        //dd($request->all());
        if ($request->kro_kode == null)
            {
                $kro_kode = NULL;
            }
        else
            {
                $kro_kode = trim($request->kro_kode);
            }
        $count = PokSubKomponen::where('id_subkom',$request->idsubkomponen)->count();
        if ($count > 0)
        {
            //ada subkomponen ini
            $data = PokSubKomponen::where('id_subkom',$request->idsubkomponen)->first();
            $data->kode_prog = trim($request->prog_kode);
            $data->kode_keg = trim($request->keg_kode);
            $data->kode_kro = $kro_kode;
            $data->kode_output = trim($request->output_kode);
            $data->kode_komponen = trim($request->komponen_kode);
            $data->kode_subkom = trim($request->subkomponen_kode);
            $data->nama_subkom = trim($request->subkomponen_nama);
            $data->update();

            $pesan_error = 'Data Sub Komponen Kegiatan <b>['.$request->subkomponen_kode.'] '.$request->subkomponen_nama.'</b> berhasil di update';
            $warna_error = 'success';


        }
        else
        {
            $pesan_error = 'Data Sub Komponen Kegiatan <b>['.$request->subkomponen_kode.'] '.$request->subkomponen_nama.'</b> tidak ada';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.subkomponen');
    }
    public function SubKomponenHapus(Request $request)
    {
        //dd($request->all());
        $count = PokSubKomponen::where('id_subkom',$request->idsubkomponen)->count();
        if ($count > 0)
        {
            //ada subkomponen ini
            $data = PokSubKomponen::where('id_subkom',$request->idsubkomponen)->first();
            $data->delete();

            $pesan_error = 'Data Sub Komponen Kegiatan <b>['.$request->subkomponen_kode.'] '.$request->subkomponen_nama.'</b> berhasil di hapus';
            $warna_error = 'success';


        }
        else
        {
            $pesan_error = 'Data Sub Komponen Kegiatan <b>['.$request->subkomponen_kode.'] '.$request->subkomponen_nama.'</b> tidak ada';
            $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('pok.subkomponen');
    }
    public function Akun()
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $dataProgram = PokProgram::where('tahun_prog',$tahun_anggaran)->get();
        $dataAkun = PokAkun::get();
        return view('pok.akun',['dataAkun'=>$dataAkun]);
    }
    public function FormatKegiatanImport()
    {
        $fileName = 'format-kegiatan-';
        $data = [
            [
                'prog_kode'=>null,
                'keg_kode'=>null,
                'keg_nama'=>null,
                'flag_kro'=>null,
                'catatan'=>'Flag kro 1 = ada, 0 = tidak ada. kolom Catatan ini dihapus saja'
            ]
        ];

        $namafile = $fileName . date('Y-m-d_H-i-s') . '.xlsx';
        //dd($data);
        return Excel::download(new FormatViewImport($data), $namafile);
    }
    public function KegiatanImport(Request $request)
    {
        //dd($request->all());

        //VALIDASI
        $this->validate($request, [
            'fileKegiatanImport' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('fileKegiatanImport')) {
            $file = $request->file('fileKegiatanImport'); //GET FILE
            Excel::import(new PokKegiatanImport, $file); //IMPORT FILE
            //return redirect()->back()->with(['success' => 'Upload success']);
            Session::flash('message', 'Data excel kegiatan berhasil di import');
            Session::flash('message_type', 'info');
            return back();
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function FormatKroImport()
    {
        $fileName = 'format-kro-';
        $data = [
            [
                'prog_kode'=>null,
                'keg_kode'=>null,
                'kro_kode'=>null,
                'kro_nama'=>null,
            ]
        ];

        $namafile = $fileName . date('Y-m-d_H-i-s') . '.xlsx';
        //dd($data);
        return Excel::download(new FormatViewImport($data), $namafile);
    }
    public function KroImport(Request $request)
    {
        //dd($request->all());

        //VALIDASI
        $this->validate($request, [
            'fileKroImport' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('fileKroImport')) {
            $file = $request->file('fileKroImport'); //GET FILE
            Excel::import(new PokKroImport, $file); //IMPORT FILE
            //return redirect()->back()->with(['success' => 'Upload success']);
            Session::flash('message', 'Data excel kegiatan berhasil di import');
            Session::flash('message_type', 'info');
            return back();
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function FormatOutputImport()
    {
        $fileName = 'format-output-';
        $data = [
            [
                'prog_kode'=>null,
                'keg_kode'=>null,
                'kro_kode'=>null,
                'output_kode'=>null,
                'output_nama'=>null,
                'catatan'=>'semua isian yang tidak ada dikosongkan saja. kolom Catatan ini dihapus saja'
            ]
        ];

        $namafile = $fileName . date('Y-m-d_H-i-s') . '.xlsx';
        //dd($data);
        return Excel::download(new FormatViewImport($data), $namafile);
    }
    public function OutputImport(Request $request)
    {
        //dd($request->all());

        //VALIDASI
        $this->validate($request, [
            'fileImportOutput' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('fileImportOutput')) {
            $file = $request->file('fileImportOutput'); //GET FILE
            Excel::import(new PokOutputImport, $file); //IMPORT FILE
            //return redirect()->back()->with(['success' => 'Upload success']);
            Session::flash('message', 'Data excel output berhasil di import');
            Session::flash('message_type', 'info');
            return back();
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }

    public function FormatKomponenImport()
    {
        $fileName = 'format-komponen-';
        $data = [
            [
                'prog_kode'=>null,
                'keg_kode'=>null,
                'kro_kode'=>null,
                'output_kode'=>null,
                'komponen_kode' => null,
                'komponen_nama' => null,
                'flag_sub' => null,
                'catatan'=>'flag_sub 0=tidak ada subkomponen, 1=ada subkomponen, semua isian yang tidak ada dikosongkan saja. kolom Catatan ini dihapus saja'
            ]
        ];

        $namafile = $fileName . date('Y-m-d_H-i-s') . '.xlsx';
        //dd($data);
        return Excel::download(new FormatViewImport($data), $namafile);
    }
    public function KomponenImport(Request $request)
    {
        $this->validate($request, [
            'fileImportKomponen' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('fileImportKomponen')) {
            $file = $request->file('fileImportKomponen'); //GET FILE
            Excel::import(new PokKomponenImport, $file); //IMPORT FILE
            //return redirect()->back()->with(['success' => 'Upload success']);
            Session::flash('message', 'Data excel komponen berhasil di import');
            Session::flash('message_type', 'info');
            return back();
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function FormatSubKomponenImport()
    {
        $fileName = 'format-sub-komponen-';
        $data = [
            [
                'prog_kode'=>null,
                'keg_kode'=>null,
                'kro_kode'=>null,
                'output_kode'=>null,
                'komponen_kode' => null,
                'subkomponen_kode' => null,
                'subkomponen_nama' => null,
                'catatan'=>'semua isian yang tidak ada dikosongkan saja. kolom Catatan ini dihapus saja'
            ]
        ];

        $namafile = $fileName . date('Y-m-d_H-i-s') . '.xlsx';
        //dd($data);
        return Excel::download(new FormatViewImport($data), $namafile);
    }
    public function SubKomponenImport(Request $request)
    {
        $this->validate($request, [
            'fileImportSubKomponen' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('fileImportSubKomponen')) {
            $file = $request->file('fileImportSubKomponen'); //GET FILE
            Excel::import(new PokSubKomponenImport, $file); //IMPORT FILE
            //return redirect()->back()->with(['success' => 'Upload success']);
            Session::flash('message', 'Data excel subkomponen berhasil di import');
            Session::flash('message_type', 'info');
            return back();
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function CariSubByKomponen($kodeprog,$kodekeg,$kodekro,$kodeoutput,$kodekomponen)
    {
        $tahun_anggaran=Session::get('tahun_anggaran');
        $arr = array(
            'status'=>false,
            'hasil'=>'Komponen tidak tersedia'
        );
        if ($kodekro == 1)
        {
            $kodekro = NULL;
        }
        $count = PokSubKomponen::where([['tahun_subkom',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg],['kode_kro',$kodekro],['kode_output',$kodeoutput],['kode_komponen',$kodekomponen]])->count();
        if ($count > 0)
        {
            $data = PokSubKomponen::where([['tahun_subkom',$tahun_anggaran],['kode_prog',$kodeprog],['kode_keg',$kodekeg],['kode_kro',$kodekro],['kode_output',$kodeoutput],['kode_komponen',$kodekomponen]])->get();
            foreach ($data as $item) {
                $hasil[]=array(
                    'id_subkomponen'=>$item->id_subkom,
                    'tahun_keg'=>$item->tahun_subkom,
                    'kode_prog'=>$item->kode_prog,
                    'nama_prog'=>$item->Program->nama_prog,
                    'kode_keg'=>$item->kode_keg,
                    'nama_keg'=>$item->Kegiatan->nama_keg,
                    'kode_kro'=>$item->kode_kro,
                    'kode_output'=>$item->kode_output,
                    'nama_output'=>$item->Output->nama_output,
                    'kode_komponen'=>$item->kode_komponen,
                    'nama_komponen'=>$item->Komponen->nama_komponen,
                    'kode_subkomponen'=>$item->kode_subkom,
                    'nama_subkomponen'=>$item->nama_subkom
                );
            }
            $arr = array(
                'status'=>true,
                'jumlah' =>$count,
                'hasil'=>$hasil
            );

        }
        return Response()->json($arr);
    }

}
