<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unitkerja;
use Session;

class UnitkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    private $tahun; // tahun anggaran

    public function __construct()
    {
       $this->tahun = Session::get('tahun_anggaran');
     }
    //Session::get('tahun_anggaran'))
    */
    public function index()
    {
        //
        $DataUnitkerja = Unitkerja::all();
        $UnitEselonVar = config('globalvar.UnitEselon');
        $JenisUnitVar = config('globalvar.JenisUnit');
        return view('unitkerja.index',compact('DataUnitkerja','UnitEselonVar','JenisUnitVar'));
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
        $count = Unitkerja::where('kode','=',$request->kode)->count();
        if ($count>0) {
            //sudah ada kodenya
            $pesan_error ='(error) Kode unitkerja sudah ada';
            $pesan_warna ='danger';
        }
        else {
            $dt_unit = new Unitkerja();
            $dt_unit -> kode = $request->kode;
            $dt_unit -> nama = $request->nama;
            $dt_unit -> eselon = $request->eselon;
            $dt_unit -> parent = '52000';
            $dt_unit -> bidang = $request->kode;
            $dt_unit -> jenis = 1;
            $dt_unit -> flag_edit = 1;
            $dt_unit -> tahun = Session::get('tahun_anggaran');
            $dt_unit -> save();
            $pesan_error ='Data sudah disimpan';
            $pesan_warna ='success';
        }
        
        

        //alert()->success('Berhasil.','Data telah ditambahkan!');
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $pesan_warna);
        return redirect()->route('unitkerja.index');
        
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
        //dd($request->all());
        
        $count = Unitkerja::where('id','=',$request->unit_id)->count();
        if ($count>0) {
            //sudah ada kodenya
            $dt_unit = Unitkerja::where('id','=',$request->unit_id)->first();
            $dt_unit -> kode = $request->kode;
            $dt_unit -> nama = $request->nama;
            $dt_unit -> eselon = $request->eselon;
            $dt_unit -> bidang = $request->kode;
            $dt_unit -> update();
            $pesan_error ='Data sudah diupdate';
            $pesan_warna ='success';
            
        }
        else {
            $pesan_error ='(error) Kode unitkerja tidak ada';
            $pesan_warna ='danger';
        }
        
        

        //alert()->success('Berhasil.','Data telah ditambahkan!');
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $pesan_warna);
        return redirect()->route('unitkerja.index');
        
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
        //dd($request->all());
        $count = Unitkerja::where('id','=',$request->unit_id)->count();
        if ($count>0) {
            //kode ada dan dihapus
            $dt = Unitkerja::where('id','=',$request->unit_id)->first();
            $dt -> delete();
            $pesan_error ='Data unitkerja ('.$request->kode.') '.$request->nama;
            $pesan_warna ='success';
        }
        else {
            $pesan_error ='Data tidak tersedia';
            $pesan_warna ='warning';
        }
        
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $pesan_warna);
        return redirect()->route('unitkerja.index');
    }
}
