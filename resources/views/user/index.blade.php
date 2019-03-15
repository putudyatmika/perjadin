@section('js')
@include('user.js')
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master User</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <button type="button" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#TambahModal">Tambah User</button>

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data User Perjadin</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                        <div class="col-lg-12">
                                @if (Session::has('message'))
                                <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                                @endif
                                </div>
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data User </h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Bidang Bagian</th>
                                            <th>Level</th>
                                            <th>Pengelola</th>
                                            <th>Last Login</th>
                                            <th>Last IP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataUser as $item)
                                            <tr>
                                                <td>{{$item->username}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->unit_kode}}-{{$item->unit_nama}}</td>
                                                <td>{{$UserLevel[$item->user_level]}}</td>
                                                <td>{{$UserPengelola[$item->pengelola]}}</td>
                                                <td>{{$item->lastlogin}}</td>
                                                <td>{{$item->lastip}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-xs btn-rounded" data-toggle="modal" data-target="#EditModal" data-username="{{ $item->username}}" data-name="{{ $item->name}}" data-email="{{ $item->email}}" data-userlevel="{{ $item->user_level}}" data-pengelola="{{$item->pengelola}}" data-unitkode="{{$item->user_unitkerja}}" data-userid="{{$item->id}}">Edit</button>
                                                    <button type="button" class="btn btn-info btn-xs btn-rounded" data-toggle="modal" data-target="#GantiPassword" data-username="{{ $item->username}}" data-name="{{ $item->name}}" data-email="{{ $item->email}}" data-userlevel="{{ $item->user_level}}" data-pengelola="{{$item->pengelola}}" data-unitkode="{{$item->user_unitkerja}}" data-userid="{{$item->id}}">Ganti Password</button>
                                                    <button type="button" class="btn btn-danger btn-xs btn-rounded" data-toggle="modal" data-target="#DeleteModal" data-username="{{ $item->username}}" data-name="{{ $item->name}}" data-email="{{ $item->email}}" data-userlevel="{{$UserLevel[$item->user_level]}}" data-pengelola="{{$UserPengelola[$item->pengelola]}}" data-unitkode="{{$item->unit_nama}}" data-userid="{{$item->id}}">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <!--modal tambah user-->
            <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="TambahModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Tambah Data User</h4> </div>
                            <div class="modal-body">
                                    <form method="POST" action="{{ route('user.store') }}" data-toggle="validator">
                                    @csrf
                                    <input type="hidden" name="userid" id="userid">
                                    @include('user.form')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Data</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
            <!--end modal tambah user-->
            <!--modal Edit user-->
            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Edit Data User</h4> </div>
                            <div class="modal-body">
                                    <form method="POST" action="{{ route('user.update','update') }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" id="id" value="" />
                                    <input type="hidden" name="aksi" value="update" />
                                    @include('user.editform')

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update Data</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
            <!--end modal edit users-->
            <!--modal Edit password-->
            <div class="modal fade" id="GantiPassword" tabindex="-1" role="dialog" aria-labelledby="GantiPassword">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel1">Ganti Password User</h4> </div>
                        <div class="modal-body">
                                <form method="POST" action="{{ route('user.update','password') }}">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" id="id" value="" />
                                <input type="hidden" name="aksi" value="gantipassword" />
                                @include('user.gantipass')

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update Data</button>
                        </div>
                    </form>
                    </div>
                </div>
        </div>
        <!--end modal edit password-->
            <!--modal hapus user-->
            <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-white" id="exampleModalLabel1"><strong>Delete Data User</strong></h4> </div>
                        <div class="modal-body">
                                <form method="POST" action="{{ route('user.destroy','delete') }}">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id" value="" />
                                @include('user.deleteform')

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-inverse btn-rounded waves-effect waves-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light m-r-10">Delete Data</button>
                        </div>
                    </form>
                    </div>
                </div>
        </div>
        <!--end modal hapus tujuan-->
@endsection

