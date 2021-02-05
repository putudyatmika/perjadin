@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master POK</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Master POK</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <div class="row">
                    @if (Auth::user()->pengelola>3)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                            <a href="#" class="btn btn-danger btn-rounded btn-fw" data-toggle="modal" data-target="#TambahSubKomponenModal"><i class="fa fa-plus"></i> Tambah Sub Komponen</a>
                            <a href="{{route('pok.subkomponenformat')}}" class="btn btn-success btn-rounded btn-fw">Format Import</a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <form action="{{route('pok.subkomponenimport')}}" method="post" class="form" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group {{ $errors->has('fileImportSubKomponen') ? 'has-error' : '' }}">
                              <input type="file" class="form-control" name="fileImportSubKomponen" required="">
                              <span class="input-group-btn">
                                      <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
                              </span>
                            </div>
                          </form>
                    </div>
                    @endif
                    <div class="col-lg-12">
                        @if (Session::has('message'))
                        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{!! Session::get('message') !!}</div>
                        @endif
                    </div>

                    </div>
                    <!-- .row -->
                    <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">@if (Session::has('tahun_anggaran')) Data Sub Komponen Kegiatan Tahun Anggaran {{Session::get('tahun_anggaran')}} @endif  </h3> 
                            <p class="text-muted m-b-20">Keadaan <code>{{\Carbon\Carbon::today()->format('d F Y')}}</code></p>
                            <div class="table-responsive">
                                <table class="table striped" id="DTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Program</th>
                                            <th>Kode Kegiatan</th>
                                            <th>Kode KRO</th>
                                            <th>Kode Output</th>
                                            <th>Kode Komponen</th>
                                            <th>Kode Sub Komponen</th>
                                            <th>Nama Komponen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($dataSubKomponen as $item)
                                           <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->kode_prog}}</td>
                                            <td>{{$item->kode_keg}}</td>
                                            <td>
                                             @if ($item->kode_kro == NULL)
                                                 -
                                             @else
                                                 {{$item->kode_kro}}
                                             @endif
                                            </td>
                                            <td>{{$item->kode_output}}</td>
                                            <td>{{$item->kode_komponen}}</td>
                                               <td>{{$item->kode_subkom}}</td>
                                               <td>{{$item->nama_subkom}}</td>
                                               <td>
                                                <button type="button" class="btn btn-sm btn-primary btn-circle" data-toggle="modal" data-target="#EditSubKomponenModal" data-idsubkomponen="{{$item->id_subkom}}" data-kodeprog="{{$item->kode_prog}}" data-kodekeg="{{$item->kode_keg}}" data-kodekro="{{$item->kode_kro}}" data-kodeoutput="{{$item->kode_output}}" data-kodekomponen="{{$item->kode_komponen}}" data-kodesubkomponen="{{$item->kode_subkom}}" data-namasubkomponen="{{$item->nama_subkom}}"><span data-toggle="tooltip" title="Edit Komponen {{$item->nama_komponen}}"><i class="fa fa-pencil"></i></span></button>
                                                <button type="button" class="btn btn-sm btn-danger btn-circle" data-toggle="modal" data-target="#DeleteSubKomponenModal" data-idsubkomponen="{{$item->id_subkom }}" data-kodeprog="{{$item->kode_prog}}" data-kodekeg="{{$item->kode_keg}}" data-kodekro="{{$item->kode_kro}}" data-kodeoutput="{{$item->kode_output}}" data-kodekomponen="{{$item->kode_komponen}}" data-kodesubkomponen="{{$item->kode_subkom}}" data-namasubkomponen="{{$item->nama_subkom}}"><span data-toggle="tooltip" title="Hapus Komponen {{ $item->nama_komponen}}"><i class="fa fa-trash-o"></i></span></button>
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
            @include('pok.modal')
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
@include('pok.js')
@stop