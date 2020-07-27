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
        $FlagPengelola = config('globalvar.FlagPengelola');
        $FlagUmum = config('globalvar.FlagUmum');
        $DataPegawai = DB::table('pegawai')
                        -> leftJoin('unitkerja','pegawai.unitkerja','=','unitkerja.kode')
                        -> leftJoin('m_gol', 'pegawai.gol', '=', 'm_gol.kode')
                        -> leftJoin (\DB::Raw("(select SUBSTRING(kode,1,4) as bidang_kode, nama as bidang_nama from unitkerja where eselon < 4 order by kode asc) as unitbidang "),\DB::Raw("SUBSTRING(unitkerja.kode,1,4)"),'=','unitbidang.bidang_kode')
                        //->select('pegawai.id as id', 'pegawai.nama as nama', 'pegawai.nip_baru as nip_baru','pegawai.jabatan','m_gol.gol as gol','m_gol.pangkat as pangkat','pegawai.unitkerja as unitkerja','unitkerja.nama as unit_nama','unitbidang.bidang_kode','unitbidang.bidang_nama')
                        ->select('pegawai.*', 'm_gol.gol as nama_gol','m_gol.pangkat as pangkat','unitkerja.nama as unit_nama','unitbidang.bidang_kode','unitbidang.bidang_nama')
                        ->orderBy('unitkerja','asc')->orderBy('jabatan','asc')
                        ->get();
        return view('pegawai.index',compact('DataPegawai','FlagUmum','FlagPengelola','DataGol','DataUnitkerja','UnitEselonVar','JenisUnitVar','JenisJabatanVar','jkVar'));
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
        $datapeg -> email = $request['email'];
        $datapeg -> flag = 1;
        $datapeg -> flag_pengelola = $request->flag_pengelola;
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
        $FlagPengelola = config('globalvar.FlagPengelola');
        $DataPegawai = DB::table('pegawai')
                        -> leftJoin('unitkerja','pegawai.unitkerja','=','unitkerja.kode')
                        -> leftJoin('m_gol', 'pegawai.gol', '=', 'm_gol.kode')
                        -> leftJoin (\DB::Raw("(select SUBSTRING(kode,1,4) as bidang_kode, nama as bidang_nama from unitkerja where eselon < 4 order by kode asc) as unitbidang "),\DB::Raw("SUBSTRING(unitkerja.kode,1,4)"),'=','unitbidang.bidang_kode')
                        -> select('pegawai.id as id', 'pegawai.nama as nama', 'pegawai.nip_baru as nip_baru','tgl_lahir','jk','pegawai.jabatan','m_gol.gol as gol','m_gol.pangkat as pangkat','pegawai.unitkerja as unitkerja','unitkerja.nama as unit_nama','unitbidang.bidang_kode','unitbidang.bidang_nama')
                        -> where('pegawai.id',$id)->first();

        //return view('pegawai.index',compact('DataPegawai','DataGol','DataUnitkerja','UnitEselonVar','JenisUnitVar','JenisJabatanVar'));
        return view('pegawai.view',compact('DataPegawai','FlagPengelola','jkVar','UnitEselonVar','JenisUnitVar','JenisJabatanVar'));
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
        $datapeg -> flag_pengelola = $request->flag_pengelola;
        $datapeg -> flag = $request->flag;
        $datapeg -> email = $request['email'];
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
        Session::flash('message', 'Data pegawai nama : '.$request->nama.' nip : '.$request->nipbaru.' unitkerja : '.$request->unitkerja.' telah dihapus');
        Session::flash('message_type', 'danger');
        return redirect()->route('pegawai.index');
    }

    public function import()
    {
        return view("pegawai.import");
    }
    public function CariPejabat($flagttd)
    {
        if ($flagttd==0)
        {
            //hanya kepala bps
            $DataPegawai = Pegawai::where([['jabatan','=','1'],['flag','=','1']])->orderBy('unitkerja')->get();
            $count = Pegawai::where([['jabatan','=','1'],['flag','=','1']])->orderBy('unitkerja')->count();
        }
        else 
        {
            //pejabat eselon 3
            $DataPegawai = Pegawai::where([['jabatan','=','2'],['flag','=','1']])->orderBy('unitkerja')->get();
            $count = Pegawai::where([['jabatan','=','2'],['flag','=','1']])->orderBy('unitkerja')->count();
        }
        //dd($DataPegawai);
        foreach ($DataPegawai as $item)
        {
            $data[] = array(
                'ttd_nip' => $item->nip_baru,
                'ttd_nama' => $item->nama,
                'ttd_jabatan' => 'Kepala '. $item->Unitkerja->nama,
                'ttd_gol'=> $item->Golongan->pangkat .' ('.$item->Golongan->gol.')'
            );
        }
        $arr = array(
            'status'=>true,
            'count'=>$count,
            'hasil'=>$data
        );
        return Response()->json($arr);
    }
    public function CariPegawai($nip)
    {
        $count = Pegawai::where([['nip_baru','=',$nip],['flag','=','1']])->orderBy('unitkerja')->count();
        $arr = array(
            'status'=>false,
            'hasil'=>'Data tidak tersedia'
        );
        if ($count > 0) 
        {
            //ada nip pegawai ini
            $data = Pegawai::where([['nip_baru','=',$nip],['flag','=','1']])->orderBy('unitkerja')->first();
            if ($data->jabatan<4)
            {
                $jabatan_nama = 'Kepala';
            }
            else 
            {
                $jabatan_nama = 'Staf';
            }
            $arr = array(
                'status'=>true,
                'peg_id'=>$data->id,
                'nama'=>$data->nama,
                'nip_baru'=>$data->nip_baru,
                'email'=>$data->email,
                'jabatan_kode'=>$data->jabatan,
                'jabatan_nama'=>$jabatan_nama,
                'unit_kode'=>$data->unitkerja,
                'unit_nama'=>$data->Unitkerja->nama,
                'golongan'=>$data->Golongan->pangkat .' ('. $data->Golongan->gol.')',
                'tgl_lahir'=>$data->tgl_lahir,
                'flag_pengelola'=>$data->flag_pengelola,
                'tgl_dibuat'=>$data->created_at

            );
        }
        return Response()->json($arr);
    }
}
