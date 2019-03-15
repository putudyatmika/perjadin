@section('css')
<link href="{{asset('tema/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/moment/moment.js')}}"></script>
<!-- Page plugins css -->
<link href="{{asset('tema/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
<!-- Daterange picker plugins css -->
<link href="{{asset('tema/plugins/bower_components/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link href="{{asset('tema/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

@stop
@section('js')
<script src="{{asset('tema/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
 <!-- start - This is for export functionality only -->
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
 <!-- end - This is for export functionality only -->
@include('pegawai.js')
@stop
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
                        @if (Auth::user()->user_level>3)
                        <button type="button" class="btn btn-danger pull-right m-l-20 btn-rounded" data-toggle="modal" data-target="#TambahModal">Tambah Pegawai</button>
                        <a href="{{url('pegawai/import')}}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Import Data</a>
                        @endif
                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Data Pegawai</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                        <div class="col-lg-12">
                                @if (Session::has('message'))
                                <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{!! Session::get('message') !!}</div>
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
                                            <th>Pengelola</th>
                                            <th>Pangkat/Gol</th>
                                            @if (Auth::user()->pengelola>3)
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataPegawai as $Pegawai)
                                        <tr>
                                                <td><a href="#" data-toggle="modal" data-target="#ViewModal" data-pegid="{{$Pegawai->id}}" data-nama="{{$Pegawai->nama}}" data-nip="{{$Pegawai->nip_baru}}" data-tgllahir="{{Tanggal::HariPanjang($Pegawai->tgl_lahir)}}" data-gol="{{ $Pegawai -> pangkat }} ({{ $Pegawai->nama_gol}})" data-unitkerja="{{$Pegawai -> unit_nama}}" data-jabatan="{{$JenisJabatanVar[$Pegawai -> jabatan]}}" data-jk="{{$jkVar[$Pegawai->jk]}}" data-bidang="{{ $Pegawai -> bidang_nama}}">{{ $Pegawai -> nip_baru }}</a></td>
                                                <td>{{ $Pegawai -> nama}}</td>
                                                <td><strong>{{ $JenisJabatanVar[$Pegawai -> jabatan] }}</strong> {{ $Pegawai -> unit_nama}}</td>
                                                <td>
                                                    @if ($Pegawai -> flag_pengelola>0)
                                                        <span class="label label-rouded label-success">{{$FlagPengelola[$Pegawai -> flag_pengelola]}}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $Pegawai -> pangkat }} ({{ $Pegawai->nama_gol}})</td>
                                                @if (Auth::user()->pengelola>3)
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#EditModal" data-pegid="{{$Pegawai->id}}" data-nama="{{$Pegawai->nama}}" data-nip="{{$Pegawai->nip_baru}}" data-tgllahir="{{$Pegawai->tgl_lahir}}" data-gol="{{$Pegawai->gol}}" data-unitkerja="{{$Pegawai->unitkerja}}" data-jabatan="{{$Pegawai->jabatan}}" data-jk="{{$Pegawai->jk}}">Edit</button>
                                                    <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#DeleteModal" data-pegid="{{$Pegawai->id}}" data-nama="{{$Pegawai->nama}}" data-nip="{{$Pegawai->nip_baru}}" data-unitkerja="{{$Pegawai->unitkerja}}-{{ $Pegawai -> unit_nama}}">Delete</button>
                                                </td>
                                                @endif
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
            @include('pegawai.modal')
@endsection
