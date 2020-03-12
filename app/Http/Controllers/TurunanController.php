<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Anggaran;
use App\MatrikPerjalanan;
use App\Unitkerja;
use App\TurunanAnggaran;

class TurunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //cek dulu sisa anggaran utamanya
        //$anggaran_id = $request->a_id;
        //$count = Anggaran::where('id', '=', $request->a_id)->with('Turunan', 'Unitkerja')->count();
        $count = Anggaran::where('id', '=', $request->a_id)->count();
        if ($count > 0) {
            //anggaran id ada
            $dataAnggaran = Anggaran::where('id', '=', $request->a_id)->with('Turunan', 'Unitkerja')->first();
            $sisa = $dataAnggaran->pagu_utama - $dataAnggaran->rencana_pagu;
            if ($sisa >= $request->pagu_utama) {
                //boleh ditambahkan
                //edit rencana pagu
                $rencana_pagu = $dataAnggaran->rencana_pagu + $request->pagu_utama;
                $dataAnggaran->rencana_pagu = $rencana_pagu;
                $dataAnggaran->update();

                //cek dulu apakah unitkerja di anggaran utama sudah pernah ada
                $count = TurunanAnggaran::where([['unit_pelaksana', '=', $request->unitkerja], ['a_id', '=', $request->a_id]])->count();
                if ($count > 0) {
                    //update saja
                    $dataTurunan = TurunanAnggaran::where([['unit_pelaksana', '=', $request->unitkerja], ['a_id', '=', $request->a_id]])->first();
                    $pagu_utama = $request->pagu_utama+$dataTurunan->pagu_awal;
                    $dataTurunan->pagu_awal = $pagu_utama;
                    $dataTurunan->update();
                    $pesan_error = 'Data alokasi anggaran sudah diupdate';
                    $warna_error = 'success';
                }
                else {
                    //belum ada buat baru
                    $dataTurunan = new TurunanAnggaran();
                    $dataTurunan->a_id = $request->a_id;
                    $dataTurunan->unit_pelaksana = $request->unitkerja;
                    $dataTurunan->pagu_awal = $request->pagu_utama;
                    $dataTurunan->save();
                    $pesan_error = 'Data alokasi anggaran sudah ditambahkan';
                    $warna_error = 'success';
                }
            } else {
                //sisa pagu tidak bisa
                $pesan_error = 'Sisa Pagu Utama kurang dari alokasi yang diajukan';
                $warna_error = 'danger';
            }
        } else {
            //anggaran id tidak ada
            $pesan_error = 'ID Anggaran ini tidak tersedia';
            $warna_error = 'danger';
        }



        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('anggaran.alokasi', $request->a_id);
        //dd($request->all());
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
        $count = TurunanAnggaran::where([['t_id', '=', $request->tid], ['a_id', '=', $request->a_id]])->count();
        if ($count > 0) {
            $dataTurunan = TurunanAnggaran::where([['t_id', '=', $request->tid], ['a_id', '=', $request->a_id]])->first();
            //datanya ada dan di update
            //cek dulu sisa pagu <= (pagu_awal+rencana_pagu)
            $dataAnggaran = Anggaran::where('id', '=', $request->a_id)->with('Turunan', 'Unitkerja')->first();
            //$sisa = $dataAnggaran->pagu_utama - $dataAnggaran->rencana_pagu;
            $sisa = $dataAnggaran->pagu_utama - ($dataAnggaran->rencana_pagu - $dataTurunan->pagu_awal);
            if ($sisa >= $request->pagu_awal) {
                //update rencana pagu di anggaran
                $rencana_pagu = ($dataAnggaran->rencana_pagu - $dataTurunan->pagu_awal) + $request->pagu_utama;
                $dataAnggaran->rencana_pagu = $rencana_pagu;
                $dataAnggaran->update();

                $dataTurunan -> unit_pelaksana = $request -> unitkerja;
                $dataTurunan -> pagu_awal  = $request -> pagu_utama;
                $dataTurunan -> pagu_rencana = $request -> pagu_rencana;
                $dataTurunan->update();
                
                $pesan_error = 'Data alokasi turunan anggaran sudah diupdate';
                $warna_error = 'info';
                //Session::flash('message', 'Data alokasi anggaran sudah diupdate');
                //Session::flash('message_type', 'info');
                
            } else {
                //sisa pagu tidak bisa
                $pesan_error = 'Sisa Pagu Utama kurang dari alokasi yang diajukan';
                $warna_error = 'danger';
            }
            Session::flash('message', $pesan_error);
            Session::flash('message_type', $warna_error);
            return redirect()->route('anggaran.alokasi', $request->a_id);
            
        } else {
            //data tidak ditemukan balikin
            Session::flash('message', 'Data tidak tersedia');
            Session::flash('message_type', 'warning');
            return back();
        }
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
        // a_id
        //cari anggaran dan kurangi nilai pagu_rencana
        //cari dulu matrik yang menggunakan turunan anggaran ini 
        //kalo ada tidak bisa di hapus, kalo tidak ada hapus
        //dd($request->all());
        $cek_matrik = MatrikPerjalanan::where([
            ['mak_id','=',$request->a_id],
            ['dana_tid','=',$request->tid]
        ])->count();
        if ($cek_matrik>0) 
        {
            //masih ada
            Session::flash('message', 'Ada transaksi Perjadin menggunakan turunan anggaran ini');
            Session::flash('message_type', 'danger');
            return back();
        }
        else
        {
            //langsung hapus
            $dataAnggaran = Anggaran::where('id', '=', $request->a_id)->first();
            $pagu_rencana = $dataAnggaran->rencana_pagu - $request->pagu_utama;
            $dataAnggaran->rencana_pagu = $pagu_rencana;
            $dataAnggaran->update();
            //hapus turunan anggaran
            $dataTurunan = TurunanAnggaran::findOrFail($request->tid);
            $dataTurunan -> delete();
    
            Session::flash('message', 'Data turunan anggaran '.$request->unitkerja.' telah di hapus');
            Session::flash('message_type', 'danger');
            return back();
        }
       
        //dd($request);
    }
    public function TotalKuitansi($tid)
    {
        $arr = array(
            'status'=>false,
            'hasil'=> 'Data kuitansi tidak tersedia'
        );
        $count = MatrikPerjalanan::where('dana_tid','=',$tid)->count();
        if ($count > 0) 
        {
            $data = MatrikPerjalanan::where('dana_tid','=',$tid)->get();
            $total=0;
            foreach ($data as $item)
            {
                $total = $total + $item->Transaksi->Kuitansi->total_biaya;
            }
            dd($total);
            $arr = array(
                'status'=>true,
                'hasil'=>$data
            );
        }
        return Response()->json($arr);
    }
    public function SinkronRealiasi(Request $request)
    {
        //dd($request->all());
        /*
        "unitkerja" => "[52560] Bidang IPDS"
        "pagu_awal" => "6595000"
        "a_id" => "214"
        "t_id" => "158"
         $data_matrik = MatrikPerjalanan::with('Transaksi')->where([
            ['mak_id','=',$request->a_id],['flag_matrik','=','5']
            ])->groupBY('dana_tid')->get();
        $data_semua_tahun = DB::table('matrik')
            ->select(DB::Raw('matrik.mak_id,matrik.dana_tid,COALESCE(sum(kuitansi.total_biaya)) as totalbiaya'))
            ->leftJoin('transaksi','matrik.id','=','transaksi.matrik_id')
            ->leftJoin('kuitansi','transaksi.trx_id','=','kuitansi.trx_id')
            ->where([['flag_matrik','=','5'],['tahun_matrik','=',Session::get('tahun_anggaran')]])->groupBy('mak_id')->get(); 
        */
       
        $data_bid = DB::table('matrik')
                ->select(DB::Raw('matrik.mak_id,matrik.dana_tid,COALESCE(sum(kuitansi.total_biaya)) as totalbiaya'))
                ->leftJoin('transaksi','matrik.id','=','transaksi.matrik_id')
                ->leftJoin('kuitansi','transaksi.trx_id','=','kuitansi.trx_id')
                ->where([
                    ['mak_id','=',$request->a_id],
                    ['flag_matrik','=','5']
                    ])->groupBy('dana_tid')->get();
        $data_anggaran = DB::table('matrik')
            ->select(DB::Raw('matrik.mak_id,matrik.dana_tid,COALESCE(sum(kuitansi.total_biaya)) as totalbiaya'))
            ->leftJoin('transaksi','matrik.id','=','transaksi.matrik_id')
            ->leftJoin('kuitansi','transaksi.trx_id','=','kuitansi.trx_id')
            ->where([
                ['mak_id','=',$request->a_id],
                ['flag_matrik','=','5']
                ])->groupBy('mak_id')->first();   
       
        //update pagu_realisasi turunan anggaran
        if ($data_bid)
        {
            foreach ($data_bid as $item)
            {
                $data = TurunanAnggaran::where('t_id','=',$item->dana_tid)->first();
                $data->pagu_realisasi = $item->totalbiaya;
                $data->update();
            }
        }
        
        //update pagu_realisasi di anggaran
        if ($data_anggaran)
        {
            $dataAnggaran = Anggaran::where('id','=', $request->a_id)->first();
            $dataAnggaran->realisasi_pagu = $data_anggaran->totalbiaya;
            $dataAnggaran->update();
        }
        
        
        //dd($data_semua_tahun);
        Session::flash('message', 'Data Pagu Realisasi sudah disinkronisasi');
        Session::flash('message_type', 'danger');
        return back();
    }
}
