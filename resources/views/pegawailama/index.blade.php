@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Pegawai</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="{{url('pegawai/create')}}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Tambah Pegawai</a>

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Pegawai</li>
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
                            <h3 class="box-title m-b-0">Data Pegawai BPS Provinsi NTB </h3>
                            <p class="text-muted m-b-20">Keadaan <code>31 Desember 2018</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <!--<th>Bidang/Bagian</th>-->
                                            <th>Pangkat/Gol</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataPegawai as $Pegawai)
                                        <tr>
                                                <td><a href="{{ route('pegawai.show',$Pegawai->id) }}">{{ $Pegawai -> nip_baru }}</a></td>
                                                <td>{{ $Pegawai -> nama}}</td>
                                                <td><strong>{{ $JenisJabatanVar[$Pegawai -> jabatan] }}</strong> {{ $Pegawai -> unit_nama}}</td>
                                                <!--<td>{{ $Pegawai -> bidang_nama}}</td>-->
                                                <td>{{ $Pegawai -> pangkat }} ({{ $Pegawai->gol}})</td>
                                                <td><a href="{{ route('pegawai.edit',$Pegawai->id) }}" class="btn btn-success btn-circle pull-left"><i class="fa fa-pencil"></i> </a>
                                                    <form action="{{ route('pegawai.destroy', $Pegawai->id) }}" class="pull-left" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-circle" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i>
                                                        </button>
                                                      </form>
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
@endsection
