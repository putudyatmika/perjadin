<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Tujuan;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $DataTujuan = Tujuan::all();
        return view('tujuan.index',compact('DataTujuan'));
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
        $dataTujuan = new Tujuan();
        $dataTujuan -> kode_kabkota = $request['kode_tujuan'];
        $dataTujuan -> nama_kabkota = $request['nama_tujuan'];
        $dataTujuan -> kepala = $request['kepala'];
        $dataTujuan -> nip_kepala = $request['nipkepala'];
        $dataTujuan -> rate_darat = $request['rate'];
        $dataTujuan -> save();

        //alert()->success('Berhasil.','Data telah ditambahkan!');
        Session::flash('message', 'Data telah ditambahkan');
        Session::flash('message_type', 'success');
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
        $dataTujuan = Tujuan::findOrFail($request->id);
        $dataTujuan -> kode_kabkota = $request['kode_tujuan'];
        $dataTujuan -> nama_kabkota = $request['nama_tujuan'];
        $dataTujuan -> kepala = $request['kepala'];
        $dataTujuan -> nip_kepala = $request['nipkepala'];
        $dataTujuan -> rate_darat = $request['rate'];
        $dataTujuan -> update();

        //alert()->success('Berhasil.','Data telah ditambahkan!');
        Session::flash('message', 'Data telah di update');
        Session::flash('message_type', 'info');
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
        $dataTujuan = Tujuan::findOrFail($request->id);
        $dataTujuan -> delete();

       Session::flash('message', 'Data tujuan telah di delete');
       Session::flash('message_type', 'danger');
       return back();
    }
}
