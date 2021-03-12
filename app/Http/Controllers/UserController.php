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
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Gate::allows('isAdmin') && !Gate::allows('isSuperAdmin')) {
            abort(404, 'Maaf.. anda tidak bisa mengakses halaman ini');
        }

        $DataUnitkerja = Unitkerja::where('eselon', '<', '4')->get();
        //$DataUser = User::all();
        $DataUser = DB::table('users')
            ->leftJoin('unitkerja', 'users.user_unitkerja', '=', 'unitkerja.kode')
            ->select(DB::Raw('users.*,unitkerja.id as unit_id, unitkerja.kode as unit_kode,unitkerja.nama as unit_nama'))
            ->orderBy('username', 'asc')
            ->get();
        $UserLevel = config('globalvar.LevelUser');
        $UserPengelola = config('globalvar.Pengelola');
        return view('user.index', compact('DataUser', 'UserLevel', 'UserPengelola', 'DataUnitkerja'));
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
        $count = User::where('username', $request['username'])->count();

        if ($count > 0) {
            Session::flash('message', 'User sudah ada');
            Session::flash('message_type', 'danger');
            return redirect()->to('user');
        }

        $datauser = new User();
        $datauser->username = $request['username'];
        $datauser->name = $request['name'];
        $datauser->email = $request['email'];
        $datauser->user_level = $request['user_level'];
        $datauser->pengelola = $request['pengelola'];
        $datauser->user_unitkerja = $request['unitkerja'];
        $datauser->password = Hash::make($request['password']);
        $datauser->save();

        Session::flash('message', 'Data user telah ditambahkan');
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

        if ($request['aksi'] == 'gantipassword') {
            //hanya ganti password
            $count = User::where('id', $request['id'])->count();
            if ($count < 1) {
                Session::flash('message', 'User tidak ditemukan');
                Session::flash('message_type', 'danger');
                return redirect()->to('user');
            }
            $datauser = User::findOrFail($request['id']);
            $datauser->password = Hash::make($request['password']);
            $datauser->update();

            Session::flash('message', 'Password user sudah diupdate');
            Session::flash('message_type', 'success');
            return back();
        } elseif ($request->aksi == 'update') {
            //tanpa ganti password
            $count = User::where('id', $request['id'])->count();
            if ($count < 1) {
                Session::flash('message', 'User tidak ditemukan');
                Session::flash('message_type', 'danger');
                return redirect()->to('user');
            }
            $datauser = User::findOrFail($request['id']);
            $datauser->username = $request['username'];
            $datauser->name = $request['name'];
            $datauser->email = $request['email'];
            $datauser->user_level = $request['user_level'];
            $datauser->pengelola = $request['pengelola'];
            $datauser->user_unitkerja = $request['unitkerja'];
            $datauser->update();

            Session::flash('message', 'Data user telah diupdate');
            Session::flash('message_type', 'success');
            return back();
        } elseif ($request->aksi == 'gantipasswordsendiri') {
            $datauser = User::findOrFail(Auth::user()->id);
            if (Hash::check($request->pass_lama, Auth::user()->password)) {
                if ($request->passwd_baru == $request->konfirmasi_passwd) {
                    //ganti password
                    $datauser->password = Hash::make($request->passwd_baru);
                    $datauser->update();
                    Session::flash('message', 'Password berhasil diganti');
                    Session::flash('message_type', 'success');
                    return back();
                } else {
                    //password lama tidak sama
                    Session::flash('message', 'Password baru dengan Konfirmasi password baru tidak sama');
                    Session::flash('message_type', 'danger');
                    return back();
                }
            } else {
                //password lama tidak sama
                Session::flash('message', 'Password lama tidak sama passdb ' . Auth::user()->password . ' passlama ' . Hash::make($request->passwd_lama));
                Session::flash('message_type', 'danger');
                return back();
            }
        } else {
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
        if (Auth::User()->id == $request->id) {
            Session::flash('message', 'Tidak bisa menghapus diri sendiri');
            Session::flash('message_type', 'danger');
            return back();
        }
        $datauser = User::findOrFail($request->id);
        $datauser->delete();

        Session::flash('message', 'Data user telah di delete');
        Session::flash('message_type', 'danger');
        return back();
        //dd($request->all());
    }
}
