<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratTugas;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Pegawai;
use PDF;
use App\Spd;
use App\Transaksi;
use App\MatrikPerjalanan;
use App\Unitkerja;
use App\Mail\MailPersetujuan;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Tanggal;

class KelengkapanController extends Controller
{
    //
    public function list()
    {
        if (request('flag_kelengkapan') == NULL)
        {
            $flag_kelengkapan = '';
        }
        else {
            $flag_kelengkapan = request('flag_kelengkapan');
        }
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $DataPPK = Pegawai::where([['flag_pengelola','=','2'],['flag','=','1']])->orderBy('unitkerja')->first();
        $DataPegawai = Pegawai::where([['jabatan','<','3'],['flag','=','1']])->orderBy('unitkerja')->get();
        $DataBidang = Unitkerja::where('eselon', '<', '4')->orderBy('kode', 'asc')->get();
        
        //dd($data);
        if ($flag_kelengkapan=='')
        {
            //semua flag dan unitkerja 
            $data = SuratTugas::with('Transaksi')
                ->leftJoin('spd','surattugas.trx_id','=','spd.trx_id')
                ->leftJoin('transaksi','transaksi.trx_id','=','surattugas.trx_id')
                ->leftJoin(DB::raw("(select id, unit_pelaksana from matrik) as matrik"),'transaksi.matrik_id','=','matrik.id')
                ->where('tahun_srt','=',Session::get('tahun_anggaran'))
                ->when(request('unitkerja'),function($query){
                        return $query->where('unit_pelaksana',request('unitkerja'));
                })
                ->orderBy('flag_surattugas','ASC')
                ->orderBy('transaksi.tgl_brkt','desc')->get();
        }
        else
        {

        }
        return view('kelengkapan.list',[
            'data'=>$data,
            'FlagTrx'=>$FlagTrx,
            'FlagKonfirmasi'=>$FlagKonfirmasi,
            'FlagSrt'=>$FlagSrt,
            'MatrikFlag'=>$MatrikFlag,
            'FlagTTD'=>$FlagTTD,
            'Bilangan'=>$Bilangan,
            'FlagKendaraan'=>$FlagKendaraan,
            'DataPPK'=>$DataPPK,
            'DataPegawai'=>$DataPegawai,
            'DataBidang'=>$DataBidang
        ]);
    }
    public function simpan(Request $request)
    {
        //dd($request->all());
        //cek dulu surattugas
        $count = SuratTugas::where('srt_id','=',$request->srt_id)->count();
        if ($count > 0)
        {
            //ada surat tugas input
            //update surat tugas
            $DataSrt = SuratTugas::where('srt_id','=',$request->srt_id)->first();
            $DataSrt -> nomor_surat = $request->nomor_surat;
            $DataSrt -> tgl_surat = Carbon::parse($request->tglsurat)->format('Y-m-d');
            $DataSrt -> ttd_nip = $request->ttd_nip;
            $DataSrt -> ttd_jabatan = $request->ttd_jabatan;
            $DataSrt -> ttd_nama = $request->ttd_nama;
            $DataSrt -> flag_ttd = $request->ttd;
            $DataSrt -> flag_surattugas = 1;
            $DataSrt -> update();

            //update SPD
            $dataSpd = Spd::where('spd_id','=',$request->spd_id)->first();
            $dataSpd -> nomor_spd = $request->nomor_spd;
            $dataSpd -> ppk_nip = $request->ppk_nip;
            $dataSpd -> ppk_nama = $request->ppk_nama;
            $dataSpd -> flag_spd = 1;
            $dataSpd -> flag_cetak_tujuan = $request->cetaktujuan;
            $dataSpd -> kendaraan = $request->kendaraan;
            $dataSpd -> tahun_spd = Session::get('tahun_anggaran');
            $dataSpd -> update();

            //input tabel kuitansi dan set flag transaksi menunggu pembayaran
            $count = \App\Kuitansi::where('trx_id','=',$request->trx_id)->count();
            if ($count>0) {
                //sudah ada datanya
                //tidak di update
            }
            else {
                $dataKuitansi = new \App\Kuitansi();
                $dataKuitansi -> trx_id = $request->trx_id;
                $dataKuitansi -> tahun_kuitansi = Session::get('tahun_anggaran');
                $dataKuitansi -> save();
            }
            
            //update transaksi
            $dataTrx = \App\Transaksi::where('trx_id',$request->trx_id)->first();
            $matrik_id = $dataTrx->matrik_id;
            $dataTrx -> flag_trx = 6;
            $dataTrx -> update();

            //update matrik perjalanan juga
            $dataMatrik = \App\MatrikPerjalanan::where('id',$matrik_id)->first();
            $dataMatrik -> flag_matrik = 5;
            $dataMatrik -> update();
            

            $pesan_error = '('.$request->kodetrx.') Data kelengkapan perjadin an. '.$dataTrx->peg_nama.' ke '.$dataMatrik->Tujuan->nama_kabkota.' sudah di update';
            $warna_error = 'success';
            $kodetrx_error = $request->kodetrx;
            $nama_error = $dataTrx->peg_nama;
        }
        else 
        {
            //surat tugas tidak ada
            $pesan_error = 'Data surat tugas tidak tersedia';
            $warna_error = 'danger';
            $kodetrx_error = '';
            $nama_error='';

        }
        
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        Session::flash('flash_kodetrx', $kodetrx_error);
        Session::flash('flash_nama', $nama_error);
        return redirect()->route('kelengkapan.list');
    }
    public function print($kodetrx)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $count = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->count();
        if ($count > 0) 
        {
            $data = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->first();
            //dd($data);
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Helvetica','isHtml5ParserEnabled'=>true]);
            $pdf = PDF::loadView('kelengkapan.print',compact('data','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','FlagKendaraan'))->setPaper('A4');
            $nama=strtoupper($data->peg_nama);
            return $pdf->stream('PERJADIN_'.$nama.'_TRX_ID_'.$kodetrx.'.pdf');
            //return view('kelengkapan.print',compact('data','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','FlagKendaraan'));
        }
        
    }

    public function unduh($kodetrx)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $count = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->count();
        if ($count > 0) 
        {
            $data = Transaksi::where('kode_trx','=',$kodetrx)->where('flag_trx','>','3')->first();
            //dd($data);
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Helvetica','isHtml5ParserEnabled'=>true]);
            $pdf = PDF::loadView('kelengkapan.print',compact('data','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','FlagKendaraan'))->setPaper('A4');
            //return $pdf->stream();
            //return view('kelengkapan.print',compact('data','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','FlagKendaraan'));
            $nama=strtoupper($data->peg_nama);
            return $pdf->download('PERJADIN_'.$nama.'_TRX_ID_'.$kodetrx.'.pdf');
        }
        
    }
    public function batal(Request $request)
    {
        //dd($request->all());
        //cek dulu Kuitansi ada
        //batalkan surat tugas
        $count = SuratTugas::where('srt_id','=',$request->srt_id)->count();
        if ($count > 0)
        {
            $DataSrt = SuratTugas::where('srt_id','=',$request->srt_id)->first();
            $DataSrt -> flag_surattugas = 3;
            $DataSrt -> update();

            //batalkan Transaksi
            $dataTrx = \App\Transaksi::where('trx_id',$request->trx_id)->first();
            $matrik_id = $dataTrx->matrik_id;
            $dataTrx -> flag_trx = 3;
            $dataTrx -> update();

            //update matrik perjalanan juga
            $dataMatrik = \App\MatrikPerjalanan::where('id',$matrik_id)->first();
            $dataMatrik -> flag_matrik = 2;
            $dataMatrik -> update();

            //update flag spd
            $dataSpd = \App\Spd::where('trx_id',$request->trx_id)->first();
            $dataSpd -> flag_spd = 3;
            $dataSpd -> update();

            //cek dulu sudah ada tidak kuitansinya
            $count = \App\Kuitansi::where('trx_id',$request->trx_id)->count();
            if ($count>0) {
                //update flag kuitansi
                $dataKuitansi = \App\Kuitansi::where('trx_id',$request->trx_id)->first();
                $dataKuitansi -> flag_kuitansi = 3;
                $dataKuitansi -> update();
            }
            //update turunan anggaran dibalikin dananya

            $dataTurunanAnggaran = \App\TurunanAnggaran::where('t_id','=',$request->t_id)->first();
            $dataTurunanAnggaran -> pagu_rencana = $dataTurunanAnggaran->pagu_rencana - $request->pagu_rencana;
            $dataTurunanAnggaran -> update();

            $pesan_error = '('.$request->kodetrx.') Data kelengkapan perjadin an. '.$dataTrx->peg_nama.' ke '.$dataMatrik->Tujuan->nama_kabkota.' sudah dibatalkan';
            $warna_error = 'success';
        }
        else
        {
             //surat tugas tidak ada
             $pesan_error = 'Data surat tugas tidak tersedia';
             $warna_error = 'danger';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('kelengkapan.list');
    }
}
