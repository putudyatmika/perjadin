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
<script>
$(function () {
    $("#DTable").dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
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
                        <h4 class="page-title">Master Data Pegawai</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Data Pegawai</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <div class="row">
                    @if (Auth::user()->pengelola>3)
                    <div class="col-lg-4">
                            <a href="#" class="btn btn-danger btn-rounded btn-fw" data-toggle="modal" data-target="#TambahModal"><i class="fa fa-plus"></i> Tambah Tahun</a>
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
                    <div class="col-lg-4">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Tahun Anggaran </h3> <!--@if (Auth::user()->pengelola>3)<a href="{{url('format_pegawai')}}" class="btn btn-sm btn-info  m-b-20 pull-right">Download Format Pegawai</a> @endif -->
                            <p class="text-muted m-b-20">Keadaan <code>31 Desember 2019</code></p>
                            <div class="table-responsive">
                                <table class="table striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tahun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dTahunDasar as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->tahun}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#EditModal"><span data-toggle="tooltip" title="Edit tahun anggaran"><i class="fa fa-pencil"></i></span></button>
                                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#HapusModal"><span data-toggle="tooltip" title="Hapus tahun anggaran"><i class="fa fa-trash"></i></span></button>
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
            @include('tahundasar.modal')
@endsection
