@section('css')
<link href="{{asset('tema/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/moment/moment.js')}}"></script>
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
 @include('kuitansi.jsModal')
 <script>
$(function () {
    $("#DataTableCustom").dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
        "pageLength": 30
    });
});
     </script>
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Kuitansi Perjalanan Dinas</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Data Kuitansi</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-12">
                                @if (Session::has('message'))
                                <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }} 
                                    @if (Session::has('flash_kodetrx'))
                                        @if (Session::get('flash_kodetrx')!= NULL )
                                        <a href="{{route('kuitansi.print',Session::get('flash_kodetrx'))}}" target="_blank" class="btn btn-circle btn-primary btn-sm"><span data-toggle="tooltip" title="Cetak Kuitansi perjadin an. {{Session::get('flash_nama')}}"><i class="fa fa-print"></i></span></a>
                                        
                                        <a href="{{route('kuitansi.unduh',Session::get('flash_kodetrx'))}}" target="_blank" class="btn btn-circle btn-warning btn-sm"><span data-toggle="tooltip" title="Download Kuitansi perjadin an. {{Session::get('flash_nama')}}"><i class="fa fa-download"></i></span></a>
                                        @endif
                                    @endif
                                </div>
                                @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="white-box">
                            @include('kuitansi.filter')
                            <h3 class="box-title m-b-0">Daftar Kuitansi</h3>
                            <p class="text-muted m-b-20">@if (Session::has('tahun_anggaran')) <code>Tahun Anggaran {{Session::get('tahun_anggaran')}}</code> @endif</p>
                            <div class="table-responsive">
                                <table id="DataTableCustom" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Trx</th>
                                            <th>Tanggal Kuitansi</th>
                                            <th>Nama Pegawai</th>
                                            <th>Tugas</th>
                                            <th>Total Biaya</th>
                                            <th>Status Kuitansi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataKuitansi as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    {{$item->Transaksi->kode_trx}}
                                                </td>
                                                <td>
                                                    @if ($item->tgl_kuitansi)
                                                    {{Tanggal::Pendek($item->tgl_kuitansi)}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <b class="text-uppercase">{{$item->Transaksi->peg_nama}}</b>
                                                    <br />
                                                    <small class="text-success">
                                                        SM: {{$item->Transaksi->Matrik->UnitPelaksana->nama}}
                                                    </small>
                                                </td>
                                                <td>
                                                    {{$item->Transaksi->tugas}} <br />
                                                    
                                                    <small class="text-danger">
                                                        ({{$item->Transaksi->Matrik->Tujuan->nama_kabkota}} ) <br />
                                                    </small>
                                                    <small class="text-primary">
                                                        Berangkat : <b>{{Tanggal::Pendek($item->Transaksi->tgl_brkt)}}</b><br />
                                                        Kembali :  <b>{{Tanggal::Pendek($item->Transaksi->tgl_balik)}}</b>
                                                    </small>
                                                </td>
                                                <td align="right">
                                                    @if ($item->total_biaya)
                                                    @duit($item->total_biaya)
                                                    @endif
                                                </td>
                                                <td>@include('kuitansi.flag')</td>
                                                <td>@include('kuitansi.aksi')</td>
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
            @include('kuitansi.modal')
@endsection
