<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Golongan;
use App\Unitkerja;
use App\Pegawai;
use Validator;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $DataGol = Golongan::all();
        $DataUnitkerja = Unitkerja::all();
        $UnitEselonVar = config('globalvar.UnitEselon');
        $JenisUnitVar = config('globalvar.JenisUnit');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $jkVar = config('globalvar.JenisKelamin');
        $DataPegawai = DB::table('pegawai')
                        -> leftJoin('unitkerja','pegawai.unitkerja','=','unitkerja.kode')
                        -> leftJoin('m_gol', 'pegawai.gol', '=', 'm_gol.kode')
                        -> leftJoin (\DB::Raw("(select SUBSTRING(kode,1,4) as bidang_kode, nama as bidang_nama from unitkerja where eselon < 4 order by kode asc) as unitbidang "),\DB::Raw("SUBSTRING(unitkerja.kode,1,4)"),'=','unitbidang.bidang_kode')
                        //->select('pegawai.id as id', 'pegawai.nama as nama', 'pegawai.nip_baru as nip_baru','pegawai.jabatan','m_gol.gol as gol','m_gol.pangkat as pangkat','pegawai.unitkerja as unitkerja','unitkerja.nama as unit_nama','unitbidang.bidang_kode','unitbidang.bidang_nama')
                        ->select('pegawai.*', 'm_gol.gol as nama_gol','m_gol.pangkat as pangkat','unitkerja.nama as unit_nama','unitbidang.bidang_kode','unitbidang.bidang_nama')
                        ->get();
        return view('pegawai.index',compact('DataPegawai','DataGol','DataUnitkerja','UnitEselonVar','JenisUnitVar','JenisJabatanVar','jkVar'));
        //return view('pegawai.index',compact('DataPegawai','UnitEselonVar','JenisUnitVar','JenisJabatanVar'));
        //return view('pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $DataGol = Golongan::all();
        $DataUnitkerja = Unitkerja::all();
        $UnitEselonVar = config('globalvar.UnitEselon');
        $JenisUnitVar = config('globalvar.JenisUnit');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        return view('pegawai.form',compact('DataGol','DataUnitkerja','UnitEselonVar','JenisUnitVar','JenisJabatanVar'));
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
        /*
        $count = Pegawai::where('nip',$request->input('nipbaru'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('pegawai');
        }
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'nip_baru' => 'required|integer|max:20|unique:pegawai',
            'nip_lama' => 'required|integer|max:10|unique:pegawai',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'gol' => 'required',
            'unitkerja'=> 'required',
            'jabatan' => 'required'

        ]);
            */
        $datapeg = new Pegawai();
        $datapeg -> nip_baru = $request['nipbaru'];
        //$datapeg -> nip_lama = $request['niplama'];
        $datapeg -> nama = $request['nama'];
        $datapeg -> tgl_lahir = Carbon::parse($request['tgllahir'])->format('Y-m-d');
        $datapeg -> jk = $request['jk'];
        $datapeg -> gol = $request['gol'];
        $datapeg -> unitkerja = $request['unitkerja'];
        $datapeg -> jabatan = $request['jabatan'];
        $datapeg -> flag = 1;
        $datapeg -> save();
        //Pegawai::create($request->all());

        //alert()->success('Berhasil.','Data telah ditambahkan!');
        Session::flash('message', 'Data telah ditambahkan');
        Session::flash('message_type', 'success');
        return redirect()->route('pegawai.index');
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
        $UnitEselonVar = config('globalvar.UnitEselon');
        $JenisUnitVar = config('globalvar.JenisUnit');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        $jkVar = config('globalvar.JenisKelamin');
        $DataPegawai = DB::table('pegawai')
                        -> leftJoin('unitkerja','pegawai.unitkerja','=','unitkerja.kode')
                        -> leftJoin('m_gol', 'pegawai.gol', '=', 'm_gol.kode')
                        -> leftJoin (\DB::Raw("(select SUBSTRING(kode,1,4) as bidang_kode, nama as bidang_nama from unitkerja where eselon < 4 order by kode asc) as unitbidang "),\DB::Raw("SUBSTRING(unitkerja.kode,1,4)"),'=','unitbidang.bidang_kode')
                        -> select('pegawai.id as id', 'pegawai.nama as nama', 'pegawai.nip_baru as nip_baru','tgl_lahir','jk','pegawai.jabatan','m_gol.gol as gol','m_gol.pangkat as pangkat','pegawai.unitkerja as unitkerja','unitkerja.nama as unit_nama','unitbidang.bidang_kode','unitbidang.bidang_nama')
                        -> where('pegawai.id',$id)->first();

        //return view('pegawai.index',compact('DataPegawai','DataGol','DataUnitkerja','UnitEselonVar','JenisUnitVar','JenisJabatanVar'));
        return view('pegawai.view',compact('DataPegawai','jkVar','UnitEselonVar','JenisUnitVar','JenisJabatanVar'));
        //return view('pegawai.index');
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
        $DataPegawai = Pegawai::find($id);
        $DataGol = Golongan::all();
        $DataUnitkerja = Unitkerja::all();
        $UnitEselonVar = config('globalvar.UnitEselon');
        $JenisUnitVar = config('globalvar.JenisUnit');
        $JenisJabatanVar = config('globalvar.JenisJabatan');
        return view('pegawai.editform',compact('DataPegawai','DataGol','DataUnitkerja','UnitEselonVar','JenisUnitVar','JenisJabatanVar'));
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

        $datapeg = Pegawai::find($request->peg_id);
        $datapeg -> nip_baru = $request['nipbaru'];
        //$datapeg -> nip_lama = $request['niplama'];
        $datapeg -> nama = $request['nama'];
        $datapeg -> tgl_lahir = Carbon::parse($request['tgllahir'])->format('Y-m-d');
        $datapeg -> jk = $request['jk'];
        $datapeg -> gol = $request['gol'];
        $datapeg -> unitkerja = $request['unitkerja'];
        $datapeg -> jabatan = $request['jabatan'];
        $datapeg -> update();

        Session::flash('message', 'Data telah diupdate');
        Session::flash('message_type', 'warning');
        return redirect()->route('pegawai.index');

        //dd($request->all());

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
        Pegawai::findOrFail($request->peg_id)->delete();
        Session::flash('message', 'Data pegawai <br />nama : <strong>'.$request->nama.'</strong> <br />nip : <strong>'.$request->nipbaru.'</strong><br /> unitkerja : <strong>'.$request->unitkerja.'</strong><br />telah dihapus');
        Session::flash('message_type', 'danger');
        return redirect()->route('pegawai.index');
    }

    public function tambah()
    {
        return view("pegawai.form");
    }
}
