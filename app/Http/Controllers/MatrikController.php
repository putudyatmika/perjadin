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
        $MatrikFlag = config('globalvar.FlagMatrik');
        $DataMatrik = DB::table('matrik')
                        ->leftJoin('unitkerja','matrik.dana_unitkerja','=','unitkerja.kode')
                        ->leftJoin('tujuan','matrik.kodekab_tujuan','=','tujuan.kode_kabkota')
                        ->leftJoin('anggaran','matrik.dana_mak','=','anggaran.mak')
                        ->select(DB::raw('matrik.*, anggaran.*,tujuan.*,unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
                        ->get();
        return view('matrik.index',compact('DataMatrik','MatrikFlag'));

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
    public function alokasi(Request $request) {

    }
}
