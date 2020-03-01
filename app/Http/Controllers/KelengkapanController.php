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
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $DataPPK = Pegawai::where([['flag_pengelola','=','2'],['flag','=','1']])->orderBy('unitkerja')->first();
        $data = SuratTugas::leftJoin('spd','surattugas.trx_id','=','spd.trx_id')->where('tahun_srt','=',Session::get('tahun_anggaran'))->orderBy('flag_surattugas','ASC')->orderBy('surattugas.created_at','desc')->get();
        //dd($data);
        return view('kelengkapan.list',[
            'data'=>$data,
            'FlagTrx'=>$FlagTrx,
            'FlagKonfirmasi'=>$FlagKonfirmasi,
            'FlagSrt'=>$FlagSrt,
            'MatrikFlag'=>$MatrikFlag,
            'FlagTTD'=>$FlagTTD,
            'Bilangan'=>$Bilangan,
            'FlagKendaraan'=>$FlagKendaraan,
            'DataPPK'=>$DataPPK
        ]);
    }
}
