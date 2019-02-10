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

class MatrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $DataUnitkerja = DB::table('unitkerja')
                        -> where('eselon','<','4')->get();
        $MatrikFlag = config('globalvar.FlagMatrik');
        $DataMatrik = DB::table('matrik')
                        ->leftJoin('anggaran','matrik.dana_mak','=','anggaran.mak')
                        ->leftJoin('tujuan','matrik.kodekab_tujuan','=','tujuan.kode_kabkota')
                        ->leftJoin('unitkerja','matrik.dana_unitkerja','=','unitkerja.kode')
                        ->select(DB::raw('matrik.*, matrik.id as matrik_id, anggaran.*,anggaran.id as anggaran_id,tujuan.*,tujuan.id as tujuan_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                        ->get();
        return view('matrik.index',compact('DataMatrik','MatrikFlag','DataUnitkerja'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $DataUnitkerja = DB::table('unitkerja')
                        -> where('eselon','=','3')->get();
        $DataAnggaran = DB::table('anggaran')
                        -> leftJoin('unitkerja','anggaran.unitkerja','=','unitkerja.kode')
                        -> select(DB::Raw('anggaran.*,unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                        -> get();
        $DataTujuan = Tujuan::all();
        return view('matrik.create',compact('DataTujuan','DataAnggaran','DataUnitkerja'));
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
        //dd($request->all());
        $datamatrik = new MatrikPerjalanan();
        $datamatrik -> tahun_matrik = Carbon::parse($request['tglawal'])->format('Y');
        $datamatrik -> tgl_awal = $request['tglawal'];
        $datamatrik -> tgl_akhir = $request['tglakhir'];
        $datamatrik -> kodekab_tujuan = $request['kode_kabkota'];
        $datamatrik -> lamanya = $request['lamanya'];
        $datamatrik -> dana_mak = $request['dana_mak'];
        $datamatrik -> dana_pagu = $request['dana_pagu'];
        $datamatrik -> dana_unitkerja = $request['dana_kodeunit'];
        $datamatrik -> lama_harian = $request['harian'];
        $datamatrik -> dana_harian = $request['uangharian'];
        $datamatrik -> total_harian = $request['totalharian'];
        $datamatrik -> dana_transport = $request['nilaiTransport'];
        $datamatrik -> lama_hotel = $request['hotelhari'];
        $datamatrik -> dana_hotel = $request['nilaihotel'];
        $datamatrik -> total_hotel = $request['totalhotel'];
        $datamatrik -> pengeluaran_rill = $request['pengeluaranrill'];
        $datamatrik -> total_biaya = $request['totalbiaya'];
        $datamatrik -> save();
        //Pegawai::create($request->all());

        //alert()->success('Berhasil.','Data telah ditambahkan!');
        Session::flash('message', 'Data telah ditambahkan');
        Session::flash('message_type', 'success');
        return redirect()->route('matrik.index');
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
        $DataUnitkerja = DB::table('unitkerja')
        -> where('eselon','<','4')->get();
        $MatrikFlag = config('globalvar.FlagMatrik');
        $DataMatrik = DB::table('matrik')
                ->leftJoin('anggaran','matrik.dana_mak','=','anggaran.mak')
                ->leftJoin('tujuan','matrik.kodekab_tujuan','=','tujuan.kode_kabkota')
                ->leftJoin('unitkerja','matrik.dana_unitkerja','=','unitkerja.kode')
                ->select(DB::raw('matrik.*, matrik.id as matrik_id, anggaran.*,anggaran.id as anggaran_id,tujuan.*,tujuan.id as tujuan_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                ->where('matrik.id','=',$id)
                ->first();
        $DataAnggaran = DB::table('anggaran')
                -> leftJoin('unitkerja','anggaran.unitkerja','=','unitkerja.kode')
                -> select(DB::Raw('anggaran.*,unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                -> get();
        $DataTujuan = Tujuan::all();
        return view('matrik.editform',compact('DataMatrik','MatrikFlag','DataUnitkerja','DataAnggaran','DataTujuan'));
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
        $count = MatrikPerjalanan::where('id',$request['matrikid'])->count();

        if($count<1){
            Session::flash('message', 'Matrik perjalanan tidak ditemukan');
            Session::flash('message_type', 'danger');
            return redirect()->to('matrik');
        }
        $datamatrik = MatrikPerjalanan::findOrFail($request['matrikid']);
        if ($request['aksi']=='alokasi') {
            //hanya alokasi

            $datamatrik->unit_pelaksana= $request->unit_pelaksana;
            $datamatrik->flag_matrik=1;
            $datamatrik -> update();

            Session::flash('message', 'Alokasi matrik sudah diupdate');
            Session::flash('message_type', 'success');
            return back();
        }
        elseif ($request['aksi']=='updateflag') {
            //update flag untuk belum alokasi / batal
            $datamatrik->unit_pelaksana= NULL;
            $datamatrik->flag_matrik=$request->flagmatrik;
            $datamatrik -> update();

            Session::flash('message', 'Alokasi matrik sudah diupdate');
            Session::flash('message_type', 'success');
            return back();
        }
        elseif ($request['aksi']=='updatematrik') {
            $datamatrik -> tahun_matrik = Carbon::parse($request['tglawal'])->format('Y');
            $datamatrik -> tgl_awal = $request['tglawal'];
            $datamatrik -> tgl_akhir = $request['tglakhir'];
            $datamatrik -> kodekab_tujuan = $request['kode_kabkota'];
            $datamatrik -> lamanya = $request['lamanya'];
            $datamatrik -> dana_mak = $request['dana_mak'];
            $datamatrik -> dana_pagu = $request['dana_pagu'];
            $datamatrik -> dana_unitkerja = $request['dana_kodeunit'];
            $datamatrik -> lama_harian = $request['harian'];
            $datamatrik -> dana_harian = $request['uangharian'];
            $datamatrik -> total_harian = $request['totalharian'];
            $datamatrik -> dana_transport = $request['nilaiTransport'];
            $datamatrik -> lama_hotel = $request['hotelhari'];
            $datamatrik -> dana_hotel = $request['nilaihotel'];
            $datamatrik -> total_hotel = $request['totalhotel'];
            $datamatrik -> pengeluaran_rill = $request['pengeluaranrill'];
            $datamatrik -> total_biaya = $request['totalbiaya'];
            $datamatrik -> update();

            Session::flash('message', 'Data matrik perjalanan sudah diupdate');
            Session::flash('message_type', 'success');
            return redirect()->route('matrik.index');
        }
        else {
           dd($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
       $dataMatrik = MatrikPerjalanan::findOrFail($request->matrikid);
       $dataMatrik -> delete();
       $pesan='Data Matrik Perjalanan tujuan ke '.$request->tujuan .' dari '. $request->sm .' berhasil dihapus';

       Session::flash('message', $pesan);
       Session::flash('message_type', 'danger');
       return back();
    }
    public function transaksi() {
        return view('matrik.transaksi');
    }
}
