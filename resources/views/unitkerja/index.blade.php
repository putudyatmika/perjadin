@extends('layouts.default')
@section('js')
    @include('unitkerja.js')
@endsection
@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Unitkerja</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Unitkerja</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                @if (Auth::user()->user_level>3)
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                    <a href="" class="btn btn-danger btn-rounded btn-fw" data-toggle="modal" data-target="#TambahModal"><i class="fa fa-plus"></i> Tambah Unitkerja</a>
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-12">
                        @if (Session::has('message'))
                        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                        @endif
                    </div>
                </div>
                
                @endif
                <!-- .row -->
                <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-10 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Unitkerja</h3>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Parent</th>
                                            <th>Jenis</th>
                                            <th>Eselon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataUnitkerja as $Unit)
                                        <tr>
                                            <td><a href="javascript:void(0)">{{ $Unit -> kode }}</a></td>
                                            <td>{{ $Unit -> nama }}</td>
                                            <td>{{ $Unit -> parent }} </td>
                                            <td>{{ $JenisUnitVar [$Unit -> jenis] }} </td>
                                            <td>{{ $UnitEselonVar [$Unit -> eselon] }} </td>
                                            <td>
                                                @if ($Unit->flag_edit==1)
                                                    <button class="btn btn-sm btn-success btn-rounded" data-toggle="modal" data-target="#EditModal" data-unit_id="{{$Unit->id}}" data-kode="{{$Unit->kode}}" data-nama="{{$Unit->nama}}" data-eselon="{{$Unit->eselon}}">Edit</button>
                                                    <button class="btn btn-sm btn-danger btn-rounded" data-toggle="modal" data-target="#HapusModal" data-unit_id="{{$Unit->id}}" data-kode="{{$Unit->kode}}" data-nama="{{$Unit->nama}}" data-eselon="{{$Unit->eselon}}">Hapus</button>
                                                @endif
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
            @include('unitkerja.modal')
@endsection

