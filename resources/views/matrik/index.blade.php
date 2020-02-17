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
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Matrik Perjalanan</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <div class="row">
                    @if (Auth::user()->pengelola>3 || Auth::user()->pengelola==0)
                    <div class="col-lg-4 col-sm-6 col-md-6">
                            <a href="{{route('matrik.baru')}}" class="btn btn-danger btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Matrik Perjalanan</a>
                    </div>
                    <div class="col-lg-4">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <form action="{{ url('import_matrik') }}" method="post" class="form" enctype="multipart/form-data">
                              @csrf
                              <div class="input-group {{ $errors->has('importMatrik') ? 'has-error' : '' }}">
                                <input type="file" class="form-control" name="importMatrik" required="">
                                <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
                                              </span>
                              </div>
                            </form>
                    </div>
                    @endif
                    <div class="col-lg-12">
                        @if (Session::has('message'))
                        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                        @endif
                    </div>

                    </div>
                    <!-- .row -->
                    <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Matrik Perjalanan Pegawai BPS Provinsi NTB</h3>  
                            @if (Auth::user()->pengelola>3 || Auth::user()->pengelola==0)
                            <a href="{{url('format_matrik')}}" class="btn btn-sm btn-info  m-b-20 pull-right">Download Format Matrik</a> 
                            @endif
                            <p class="text-muted m-b-20">@if (Session::has('tahun_anggaran')) <code>Tahun Anggaran {{Session::get('tahun_anggaran')}}</code> @endif</p>
                            <div class="table-responsive">
                                <table id="MatrikTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Trx</th>
                                            <th>Tujuan</th>
                                            <th>Lama Hari</th>
                                            <th>Subject Matter</th>
                                            <th>Unit Pelaksana</th>
                                            <th>Waktu</th>
                                            <th>Total Biaya</th>
                                            <th>Flag</th>
                                            <th width="13%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if ($DataMatrik->isEmpty())
                                        <tr>
                                            <td colspan="10">Data matrik masih kosong</td>
                                        </tr>
                                       @else 
                                            @foreach ($DataMatrik as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->kode_trx}}</td>
                                                    <td>{{$item->Tujuan->nama_kabkota}}</td>
                                                    <td>{{$item->lamanya}} hari</td>
                                                    <td>
                                                        @if ($item->dana_unitkerja)
                                                            [{{$item->dana_unitkerja}}] {{$item->DanaUnitkerja->nama}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->unit_pelaksana)
                                                            [{{$item->unit_pelaksana}}] {{$item->UnitPelaksana->nama}}
                                                        @endif
                                                    </td>
                                                    <td>{{Tanggal::Pendek($item->tgl_awal)}} s/d {{Tanggal::Pendek($item->tgl_akhir)}}</td>
                                                    <td class="text-right">@duit($item->total_biaya)</td>
                                                    <td class="text-center">
                                                        @if ($item->flag_matrik==0)
                                                        <span class="label label-rouded label-inverse">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                                        @elseif ($item->flag_matrik==1)
                                                        <span class="label label-rouded label-info">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                                        @elseif ($item->flag_matrik==2)
                                                        <span class="label label-rouded label-danger">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                                        @elseif ($item->flag_matrik==3)
                                                        <span class="label label-rouded label-warning">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                                        @else
                                                        <span class="label label-rouded label-success">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                                        @endif
                                                        <h5><small>{{$item->updated_at->diffForHumans()}}</small></h5>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-circle btn-success btn-sm" data-toggle="modal" data-target="#AlokasiModal">
                                                            <span data-toggle="tooltip" title="Alokasi matrik perjalanan ke {{$item->Tujuan->nama_kabkota}}"><i class="fa fa-bookmark"></i></span>
                                                        </button>
                                                        <a href="{{route('matrik.edit',$item->id)}}" class="btn btn-circle btn-custom btn-sm">
                                                            <span data-toggle="tooltip" title="Edit matrik perjalanan ke {{$item->Tujuan->nama_kabkota}}"><i class="fa fa-pencil"></i></span>
                                                        </a>
                                                        <button class="btn btn-circle btn-primary btn-sm" data-toggle="modal" data-target="#FlagModal">
                                                            <span data-toggle="tooltip" title="Flag matrik perjalanan ke {{$item->Tujuan->nama_kabkota}}"><i class="fa fa-flag"></i></span>
                                                        </button>
                                                        <button class="btn btn-circle btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal">
                                                            <span data-toggle="tooltip" title="Hapus matrik perjalanan ke {{$item->Tujuan->nama_kabkota}}"><i class="fa fa-trash"></i></span>
                                                        </button>
                                                    </td>
                                                </tr>   
                                            @endforeach
                                      
                                       @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
           
@endsection

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

@endsection
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
 @include('matrik.js')
@endsection