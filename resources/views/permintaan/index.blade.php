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
                            <li class="active">Data Form-JLN</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <div class="row">
                    @if (Auth::user()->pengelola > 3 || Auth::user()->pengelola == 0)
                    <div class="col-lg-4 col-sm-6 col-md-6">
                            <a href="{{route('permintaan.tambah')}}" class="btn btn-danger btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Form-JLN</a>
                    </div>
                    <div class="col-lg-4">
                    </div>
                    @endif
                    <div class="col-lg-12" style="margin-top:10px;">
                        @if (Session::has('message'))
                        <div class="alert alert-rounded alert-{{ Session::get('message_type') }}" id="waktu2">
                            {!! Session::get('message') !!}
                        </div>
                        @endif
                    </div>

                    </div>
                    <!-- .row -->
                    <div class="row" style="margin-top: 10px;">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Form Permintaan Perjalanan Pegawai BPS Provinsi NTB</h3>
                            <p class="text-muted m-b-20">@if (Session::has('tahun_anggaran')) <code>Tahun Anggaran {{Session::get('tahun_anggaran')}}</code> @endif</p>
                            <div class="table-responsive">
                                <table id="MatrikTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Form-JLN</th>
                                            <th>Tanggal</th>
                                            <th>Pagu POK</th>
                                            <th>Total Biaya</th>
                                            <th>Subject Matter</th>
                                            <th>Flag</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataPermintaan as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->nomor_permintaan}}</td>
                                                <td>{{Tanggal::Panjang($item->tgl_permintaan)}}</td>
                                                <td>{{$item->pagu_utama_permintaan}}</td>
                                                <td>{{$item->total_biaya_permintaan}}</td>
                                                <td>{{$item->unitkerja_nama_permintaan}}</td>
                                                <td>@include('permintaan.flag')</td>
                                                <td>
                                                    @if ($item->t_id_permintaan)
                                                    <a href="{{route('permintaan.print',$item->id_permintaan)}}" target="_blank" class="btn btn-circle btn-primary btn-sm"><span data-toggle="tooltip" title="Cetak Form-JLN Nomor {{$item->nomor_permintaan}} tanggal {{Tanggal::Panjang($item->tgl_permintaan)}}"><i class="fa fa-print"></i></span></a>

                                                    <a href="{{route('permintaan.unduh',$item->id_permintaan)}}" target="_blank" class="btn btn-circle btn-warning btn-sm"><span data-toggle="tooltip" title="Unduh Form-JLN Nomor {{$item->nomor_permintaan}} tanggal {{Tanggal::Panjang($item->tgl_permintaan)}}"><i class="fa fa-download"></i></span></a>
                                                    @endif
                                                    @if ($item->unitkerja_kode_permintaan==Auth::user()->user_unitkerja  or Auth::user()->user_level > 3)
                                                    <a href="{{route('permintaan.edit',$item->id_permintaan)}}" class="btn btn-circle btn-custom btn-sm"><span data-toggle="tooltip" title="Edit  Form-JLN"><i class="fa fa-pencil"></i></span>
                                                    </a>
                                                    <button class="btn btn-circle btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal" data-pid="{{$item->id_permintaan}}" data-unitkode="{{$item->unitkerja_kode_permintaan}}" data-unitnama="{{$item->unitkerja_nama_permintaan}}" data-nomorsurat="{{$item->nomor_permintaan}}" data-tglsurat="{{$item->tgl_permintaan}}" data-tglsuratnama="{{Tanggal::Panjang($item->tgl_permintaan)}}" data-totalbiaya="@rupiah($item->total_biaya_permintaan)">
                                                    <span data-toggle="tooltip" title="Hapus Form-JLN Nomor {{$item->nomor_permintaan}} tanggal {{Tanggal::Panjang($item->tgl_permintaan)}}"><i class="fa fa-trash"></i></span>
                                                </button>
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
            @include('permintaan.hapusmodal')
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
 <script src="https://cdn.staticaly.com/gh/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script src="https://cdn.staticaly.com/gh/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
 <!-- end - This is for export functionality only -->
 @include('permintaan.js')
 <script>
     $("#MatrikTable").dataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy',  'pdf', 'print'
    ],
    "pageLength": 30
});
 </script>
@endsection
