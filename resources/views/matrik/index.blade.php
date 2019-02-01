@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Matrik Perjalanan</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="{{url('matrik/create')}}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Tambah Matrik Perjalanan</a>

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Matrik Perjalanan</li>
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
                            <h3 class="box-title m-b-0">Matrik Perjalanan Pegawai BPS Provinsi NTB</h3>
                            <p class="text-muted m-b-20">Tahun <code>2019</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tujuan</th>
                                            <th>Lama Hari</th>
                                            <th>Unitkerja</th>
                                            <th>Unit Pelaksana</th>
                                            <th>Waktu</th>
                                            <th>Sumber Dana</th>
                                            <th>Total Biaya</th>
                                            <th>Flag</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataMatrik as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nama_kabkota}}</td>
                                            <td>{{$item->lamanya}}</td>
                                            <td>{{$item->unit_nama}}</td>
                                            <td>{{$item->unit_pelaksana}}</td>
                                            <td>{{$item->tgl_awal}} s/d {{$item->tgl_akhir}}</td>
                                            <td>{{$item->dana_mak}}</td>
                                            <td>{{$item->total_biaya}}</td>
                                            <td>{{$MatrikFlag[$item->flag_matrik]}}</td>
                                            <td><button class="btn btn-rounded btn-danger btn-sm" data-toggle="modal" data-target="#AlokasiModal">Alokasi</button>
                                                <button class="btn btn-rounded btn-danger btn-sm">Edit</button>
                                                <button class="btn btn-rounded btn-danger btn-sm">Flag</button></td>
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
            @include('matrik.alokasiform')
@endsection
