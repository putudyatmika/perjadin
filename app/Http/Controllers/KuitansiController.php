<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kuitansi;
use App\SuratTugas;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Pegawai;
use App\Spd;

class KuitansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $DataPPK = Pegawai::where([['jabatan','=','2'],['flag','=','1']])->orderBy('unitkerja')->get();
        $DataKuitansi = Kuitansi::orderBy('flag_kuitansi','asc')->orderBy('updated_at','desc')->get();
        return view('kuitansi.index',compact('DataKuitansi','FlagTrx','FlagKonfirmasi','FlagSrt','MatrikFlag','FlagTTD','DataPPK','FlagKendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $Bulan = config('globalvar.Bulan');
        $FlagKendaraan = config('globalvar.Kendaraan');
        $DataBendahara = Pegawai::where([['flag_pengelola','=','3'],['flag','=','1']])->get();

        $dataTransaksi = \App\Transaksi::with('TabelPegawai','Matrik','SuratTugas','Spd','Kuitansi')->where('trx_id','=',$id)->get();
        return view('kuitansi.edit',compact('dataTransaksi','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','Bulan','FlagKendaraan','DataBendahara'));
        //dd($dataTransaksi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if ($request->aksi == "update") {
            $count = Kuitansi::where('kuitansi_id','=',$request->kuitansi_id)->count();
            if ($count>0) {
                $rill_total = 0;
                //kuitansi ada
                //ambil data bendahara
                $Bendahara = Pegawai::where([['flag','=','1'],['nip_baru','=',$request->bendahara_nip]])->get();
                $NamaBendahara = $Bendahara[0]->nama;

                if (!$request->hotel_cek) {
                    //hotel_cek tidak ada ato tidak ada bukti
                    $totalhotel = ($request->nilaihotel * $request->hotelhari) * 0.3;
                    $flagHotel = 0;
                    $rill_total = $rill_total + $totalhotel;
                }
                else {
                    $totalhotel = $request->nilaihotel * $request->hotelhari;
                    $flagHotel = 1;
                }

                $flagTransport = $request->transport_cek ? '1' : '0';

                if ($flagTransport==0) {
                    $rill_total = $rill_total + $request->nilaiTransport;
                }

                if (!$request->rill_cek1) {
                    //rill 1 tidak ada
                    $rill1_ket = NULL;
                    $rill1_rupiah = NULL;
                    $rill1_flag = 0;
                }
                else {
                    $rill1_ket = $request->rill_ket1;
                    $rill1_rupiah = $request->rill1;
                    $rill1_flag = 1;
                    $rill_total = $rill_total + $request->rill1;
                }
                if (!$request->rill_cek2) {
                    //rill 2 tidak ada
                    $rill2_ket = NULL;
                    $rill2_rupiah = NULL;
                    $rill2_flag = 0;
                }
                else {
                    $rill2_ket = $request->rill_ket2;
                    $rill2_rupiah = $request->rill2;
                    $rill2_flag = 1;
                    $rill_total = $rill_total + $request->rill2;
                }
                if (!$request->rill_cek3) {
                    //rill 3 tidak ada
                    $rill3_ket = NULL;
                    $rill3_rupiah = NULL;
                    $rill3_flag = 0;
                }
                else {
                    $rill3_ket = $request->rill_ket3;
                    $rill3_rupiah = $request->rill3;
                    $rill3_flag = 1;
                    $rill_total = $rill_total + $request->rill3;
                }

                $dataKuitansi = Kuitansi::where('kuitansi_id','=',$request->kuitansi_id)->first();
                $dataKuitansi -> tgl_kuitansi = $request->tgl_kuitansi;
                $dataKuitansi -> harian_rupiah = $request->uangharian;
                $dataKuitansi -> harian_lama = $request->harian;
                $dataKuitansi -> harian_total = $request->totalharian;
                $dataKuitansi -> hotel_rupiah = $request->nilaihotel;
                $dataKuitansi -> hotel_lama = $request->hotelhari;
                $dataKuitansi -> hotel_total = $totalhotel;
                $dataKuitansi -> hotel_flag = $flagHotel;
                $dataKuitansi -> transport_rupiah = $request->nilaiTransport;
                $dataKuitansi -> transport_ket = $request->transport_ket;
                $dataKuitansi -> transport_flag = $flagTransport;
                $dataKuitansi -> bendahara_nip = $request->bendahara_nip;
                $dataKuitansi -> bendahara_nama = $NamaBendahara;
                $dataKuitansi -> flag_kuitansi = 1;
                $dataKuitansi -> total_biaya = $request->totalbiaya;
                $dataKuitansi -> rill1_ket = $rill1_ket;
                $dataKuitansi -> rill1_rupiah = $rill1_rupiah;
                $dataKuitansi -> rill1_flag = $rill1_flag;
                $dataKuitansi -> rill2_ket = $rill2_ket;
                $dataKuitansi -> rill2_rupiah = $rill2_rupiah;
                $dataKuitansi -> rill2_flag = $rill2_flag;
                $dataKuitansi -> rill3_ket = $rill3_ket;
                $dataKuitansi -> rill3_rupiah = $rill3_rupiah;
                $dataKuitansi -> rill3_flag = $rill3_flag;
                $dataKuitansi -> rill_total = $rill_total;
                $dataKuitansi -> update();

                //transaksi update
                $dataTrx = \App\Transaksi::where('trx_id','=',$request->trx_id)->first();
                $dataTrx -> flag_trx = 7;
                $dataTrx -> update();

                //surat tugas dan spd update status ke terlaksana
                $dataSuratTugas = SuratTugas::where('trx_id','=',$request->trx_id)->first();
                $dataSuratTugas -> flag_surattugas = 2;
                $dataSuratTugas -> update();

                $dataSpd = Spd::where('trx_id','=',$request->trx_id)->first();
                $dataSpd -> flag_spd = 2;
                $dataSpd -> update();

                Session::flash('message', 'Kuitansi an. '.$request->nama.' tujuan ke '. $request->nama_tujuan .' sudah diupdate');
                Session::flash('message_type', 'success');
                return redirect()->to('kuitansi');
            }
            else {
                //kuitansi tidak ada
                Session::flash('message', 'Kuitansi tidak ditemukan');
                Session::flash('message_type', 'danger');
                return redirect()->to('kuitansi');
            }
        }
        elseif ($request->aksi == "selesai") {
            //cek kuitansi dulu
            $count = Kuitansi::where('kuitansi_id','=',$request->kuitansi_id)->count();
            if ($count>0) {
                //kalo ada update flag kuitansi jadi selesai
                $dataKuitansi = Kuitansi::where('kuitansi_id','=',$request->kuitansi_id)->first();
                $dataKuitansi -> flag_kuitansi = 2;
                $dataKuitansi -> update();

                Session::flash('message', 'Kuitansi an. '.$request->nama.' tujuan ke '. $request->nama_tujuan .' sudah selesai');
                Session::flash('message_type', 'success');
                return redirect()->to('kuitansi');
            }
            else {
                 //kuitansi tidak ada
                 Session::flash('message', 'Kuitansi tidak ditemukan');
                 Session::flash('message_type', 'danger');
                 return redirect()->to('kuitansi');
            }
        }
        elseif ($request->aksi == "flag") {
            //cek kuitansi dulu hanya admin yang bisa
            $count = Kuitansi::where('kuitansi_id','=',$request->kuitansi_id)->count();
            if ($count>0) {
                //kalo ada update flag kuitansi jadi selesai
                $dataKuitansi = Kuitansi::where('kuitansi_id','=',$request->kuitansi_id)->first();
                $dataKuitansi -> flag_kuitansi = 0;
                $dataKuitansi -> update();

                Session::flash('message', 'Kuitansi an. '.$request->nama.' tujuan ke '. $request->nama_tujuan .' sudah diupdate');
                Session::flash('message_type', 'success');
                return redirect()->to('kuitansi');
            }
            else {
                 //kuitansi tidak ada
                 Session::flash('message', 'Kuitansi tidak ditemukan');
                 Session::flash('message_type', 'danger');
                 return redirect()->to('kuitansi');
            }
        }
        else {
            dd($request->all());
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function view($kodetrx)
    {
        $FlagTrx = config('globalvar.FlagTransaksi');
        $FlagKonfirmasi = config('globalvar.FlagKonfirmasi');
        $MatrikFlag = config('globalvar.FlagMatrik');
        $FlagSrt = config('globalvar.FlagSurat');
        $FlagTTD = config('globalvar.FlagTTD');
        $Bilangan = config('globalvar.Bilangan');
        $Bulan = config('globalvar.Bulan');
        $FlagKendaraan = config('globalvar.Kendaraan');

        $dataTransaksi = \App\Transaksi::with('TabelPegawai','Matrik','SuratTugas','Spd','Kuitansi')->where('kode_trx','=',$kodetrx)->get();
        return view('kuitansi.view',compact('dataTransaksi','FlagTrx','FlagKonfirmasi','MatrikFlag','FlagTTD','FlagSrt','Bilangan','Bulan','FlagKendaraan'));

    }
}
