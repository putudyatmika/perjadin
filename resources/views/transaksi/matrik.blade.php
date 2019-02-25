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

@include('transaksi.js')
@include('transaksi.jsSetuju')
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Matrik Transaksi</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Data Transaksi</li>
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
                            <h3 class="box-title m-b-0">Matrik Transaksi </h3>
                            <p class="text-muted m-b-20">Keadaan <code>tanggal hari ini</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Trx</th>
                                            <th>Tujuan</th>
                                            <th>Unit Pelaksana</th>
                                            <th>Peg Brkt</th>
                                            <th>Tanggal Brkt</th>
                                            <th>Kabid SM</th>
                                            <th>PPK</th>
                                            <th>KPA</th>
                                            <th>Status Transaksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataTransaksi as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>@include('transaksi.detil')</td>
                                            <td>{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}</td>
                                            <td>{{$item->Matrik->unit_pelaksana}}-{{$item->Matrik->UnitPelaksana->nama}}</td>
                                            <td>{{$item->Pegawai['nama']}}</td>
                                            <td>{{$item->tgl_brkt}}</td>
                                            <td>@include('transaksi.kabid')</td>
                                            <td>@include('transaksi.ppk')</td>
                                            <td>@include('transaksi.kpa')</td>
                                            <td>@include('transaksi.flagtransaksi')</td>
                                            <td><button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#AjukanModal" data-tujuan="{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-unitpelaksana="{{$item->Matrik->unit_pelaksana}}-{{$item->Matrik->UnitPelaksana->nama}}" data-tglawal="{{$item->Matrik->tgl_awal}}" data-tglakhir="{{$item->Matrik->tgl_akhir}}" data-infotgl="{{$item->Matrik->tgl_awal}} s/d {{$item->Matrik->tgl_akhir}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-matrikid="{{$item->matrik_id}}" data-pegnip="{{$item->peg_nip}}" data-tglbrkt="{{$item->tgl_brkt}}" data-tglbalik="{{$item->tgl_balik}}" data-tugas="{{$item->tugas}}">Ajukan</button>
                                                <button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#AdminKonfirmasiModal" data-trxid="{{$item->trx_id}}">Konfirmasi</button>
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
            @include('transaksi.modal')
            @include('transaksi.modalSetuju')
@endsection