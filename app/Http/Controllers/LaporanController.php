<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatrikPerjalanan;
use App\Anggaran;
use App\Transaksi;
use App\Kuitansi;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$dataAnggaran = MatrikPerjalanan::with(['DanaAnggaran','Transaksi:trx_id,kode_trx,matrik_id,peg_nip','Transaksi.Kuitansi:kuitansi_id,trx_id,total_biaya'])->where('flag_matrik','>','3')->select('id','tahun_matrik','mak_id','dana_unitkerja','unit_pelaksana')->orderBy('mak_id','asc')->get()->groupBy('mak_id');
        //return view('laporan.rekap-anggaran',compact('dataAnggaran'));
        //$dataAnggaran = select(DB::Raw('SELECT anggaran.id as id, mak, uraian, pagu, sum(kuitansi.total_biaya) FROM anggaran left join matrik on matrik.mak_id=anggaran.id left join transaksi on matrik.id = transaksi.matrik_id left join kuitansi on transaksi.trx_id=kuitansi.trx_id where matrik.flag_matrik>3 group by anggaran.id'))->get();
        $dataAnggaran = DB::table('anggaran') ->
                        leftJoin('matrik','matrik.mak_id','=','anggaran.id')->
                        leftJoin('transaksi','matrik.id','=','transaksi.matrik_id')->
                        leftJoin('kuitansi','transaksi.trx_id','=','kuitansi.trx_id')->
                        leftJoin('unitkerja','anggaran.unitkerja','=','unitkerja.kode')->
                        select(DB::Raw('matrik.mak_id, dana_mak, uraian, anggaran.unitkerja,unitkerja.nama, dana_pagu , sum(kuitansi.total_biaya) as total_biaya'))->where('flag_matrik','>','3')->groupBy('matrik.mak_id')->orderBy('total_biaya','desc')->get();
        //dd($dataAnggaran);
        return view('laporan.rekap-anggaran',compact('dataAnggaran'));
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
}
