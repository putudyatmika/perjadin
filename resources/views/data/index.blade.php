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
@include('tahundasar.js')
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data Manajemen</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Data Manajemen</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <div class="row">
                   
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
                            <h3 class="box-title m-b-0">Data Sistem Manajemen </h3> 
                            <div class="row">
                                <div class="container">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <p class="pull-right">Import database to sistem</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                                <form action="{{ route('data.import') }}" method="post" class="form" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group {{ $errors->has('importData') ? 'has-error' : '' }}">
                                  <input type="file" class="form-control" name="importData" required="">
                                  <span class="input-group-btn">
                                          <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
                                  </span>
                                </div>
                              </form>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                                <a href="{{url('format_matrik')}}" class="btn btn-success  m-t-20">Backup Data</a> 
                            <a href="{{route('data.format')}}" class="btn btn-info  m-t-20">Download Format Data</a> 
                            </div>
                        </div> <!-- /.container -->
                    </div> <!-- /.row -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            
@endsection
