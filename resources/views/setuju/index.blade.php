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

@include('setuju.jsSetuju')
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Persetujuan</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Pengajuan</li>
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
                            <h3 class="box-title m-b-0">PERSETUJUAN PENGAJUAN PERJALANAN DINAS PEGAWAI</h3>
                            <p class="text-muted m-b-20">Silakan setujui atau tidak perjalanan dinas yang telah diajukan</p>
                            @if (Jumlah::Pengajuan(Session::get('tahun_anggaran'))==0)
                                <h3 class="text-center"><b>Belum ada pengajuan perjalanan dinas</b></h3>
                            @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center">#</th>
                                            <th rowspan="2" class="text-center">Nama Pegawai</th>
                                            <th rowspan="2" class="text-center">Tujuan</th>
                                            <th rowspan="2" class="text-center">Subject Matter</th>
                                            <th rowspan="2" class="text-center">Tanggal Brkt</th>
                                            <th rowspan="2" class="text-center">Tanggal Kembali</th>
                                            <th colspan="3" class="text-center">Persetujuan</th>
                                            <th rowspan="2" class="text-center">Status</th>
                                            <th rowspan="2"></th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Kabid SM</th>
                                            <th class="text-center">PPK</th>
                                            <th class="text-center">KPA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataTransaksi as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->peg_nama}}</td>
                                                <td>{{$item->Matrik->Tujuan->nama_kabkota}}</td>
                                                <td>{{$item->Matrik->DanaUnitkerja->nama}}</td>
                                                <td class="text-left">{{Tanggal::Panjang($item->tgl_brkt)}}</td>
                                                <td class="text-right">{{Tanggal::Panjang($item->tgl_balik)}}</td>
                                                <td class="text-center">@include('setuju.kabid')</td>
                                                <td class="text-center">@include('setuju.ppk')</td>
                                                <td class="text-center">@include('setuju.kpa')</td>
                                                <td class="text-center">@include('setuju.flag')</td>
                                                <td class="text-center">@include('setuju.konfirmasi')</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            @include('setuju.modalSetuju')
@endsection
