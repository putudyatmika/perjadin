<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TahunDasar;
use Session;
use DB;

class TahunDasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dTahunDasar = TahunDasar::orderBy('tahun', 'asc')->get();
        return view('tahundasar.index', compact('dTahunDasar'));
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
        $count = TahunDasar::where('tahun',$request->tahun_anggaran)->count();
        if ($count==0) {
            $dTahunDasar = new TahunDasar();
            $dTahunDasar -> tahun = $request->tahun_anggaran;
            $dTahunDasar -> save();

            $pesan_teks = 'Tahun anggaran '.$request->tahun_anggaran.' berhasil ditambahkan';
            $pesan_warna = 'success';
        } 
        else {
            $pesan_teks = 'Tahun anggaran '.$request->tahun_anggaran.' sudah tersedia';
            $pesan_warna = 'danger';
        }
        //dd($request->all());
        Session::flash('message', $pesan_teks);
        Session::flash('message_type', $pesan_warna);
        return back();
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
    public function update(Request $request)
    {
        //
        $count = TahunDasar::where('id',$request->tahun_id)->count();
        if ($count>0) {
            $dTahunDasar = TahunDasar::where('id',$request->tahun_id)->first();
            $dTahunDasar -> tahun = $request->tahun_anggaran;
            $dTahunDasar -> update();
            
            $pesan_teks = 'Tahun anggaran '.$request->tahun_anggaran.' berhasil di update';
            $pesan_warna = 'success';
        } 
        else {
            $pesan_teks = 'Tahun anggaran '.$request->tahun_anggaran.' tidak tersedia';
            $pesan_warna = 'danger';
        }
        //dd($request->all());
        Session::flash('message', $pesan_teks);
        Session::flash('message_type', $pesan_warna);
        return back();
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
        $count = TahunDasar::where('id',$request->tahun_id)->count();
        if ($count>0) {
            $dTahunDasar = TahunDasar::where('id',$request->tahun_id)->first();
            $dTahunDasar -> delete();
            
            $pesan_teks = 'Tahun anggaran '.$request->tahun_anggaran.' berhasil di hapus';
            $pesan_warna = 'success';
        } 
        else {
            $pesan_teks = 'Tahun anggaran '.$request->tahun_anggaran.' tidak tersedia';
            $pesan_warna = 'danger';
        }
        //dd($request->all());
        Session::flash('message', $pesan_teks);
        Session::flash('message_type', $pesan_warna);
        return back();
    }
}
