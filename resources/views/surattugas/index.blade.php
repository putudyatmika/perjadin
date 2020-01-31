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
    $("#DataTableCustom").dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
        "pageLength": 15
    });
});
</script>
@include('surattugas.js')
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Surat Tugas</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Data Surat Tugas</li>
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
                            <h3 class="box-title m-b-0">Daftar Surat Tugas </h3>
                            <p class="text-muted m-b-20">@if (Session::has('tahun_anggaran')) <code>Tahun Anggaran {{Session::get('tahun_anggaran')}}</code> @endif</p>
                            <div class="table-responsive">
                                <table id="DataTableCustom" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Trx</th>
                                            <th>Nomor</th>
                                            <th>Nama Pegawai</th>
                                            <th>Tgl Surat</th>
                                            <th>TTD</th>
                                            <th>Tanggal Pergi</th>
                                            <th>Status Surat</th>
                                            <th width="13%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataSuratTugas as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>@include('surattugas.detil')</td>
                                                <td>{{$item->nomor_surat}}</td>
                                                <td>{{$item->Transaksi->peg_nama}}</td>
                                                <td>@if ($item->tgl_surat != NULL) {{Tanggal::Pendek($item->tgl_surat)}} @endif</td>
                                                <td>{{$item->ttd_jabatan}}</td>
                                                <td>{{Tanggal::Pendek($item->Transaksi->tgl_brkt)}}</td>
                                                <td>@include('surattugas.flag')</td>
                                                <td>@include('surattugas.aksi')</td>
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
            @include('surattugas.modal')
@endsection
