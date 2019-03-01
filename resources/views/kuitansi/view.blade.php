@section('css')
<link href="{{asset('css/print.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('js')
<!-- end - This is for export functionality only -->
 <script src="{{asset('tema/js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
 <script>
             // fungsi dijalankan setelah seluruh dokumen ditampilkan
            $(document).ready(function(e) {

                // aksi ketika tombol cetak ditekan
                $("#cetak1").bind("click", function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#hal1').printArea();
                });
            });
            $(document).ready(function(e) {

// aksi ketika tombol cetak ditekan
$("#cetak2").bind("click", function(event) {
    // cetak data pada area <div id="#data-mahasiswa"></div>
    $('#hal2').printArea();
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
                        <h4 class="page-title">Print Kuitansi Pembayaran</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li><a href="{{route('kuitansi.index')}}">Data Kuitansi</a></li>
                            <li class="active">Print Kuitansi</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">
                                <!---isi yg akan diprint--->
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active nav-item"><a href="#hal1" class="nav-link" aria-controls="hal1" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Kuitansi</span></a></li>
                                    <li role="presentation" class="nav-item"><a href="#hal2" class="nav-link" aria-controls="hal2" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Daftar Rincian Perjalanan Dinas</span></a></li>
                                    <li role="presentation" class="nav-item"><a href="#hal3" class="nav-link" aria-controls="hal3" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Daftar Pengeluaran Rill</span></a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="hal1">

                                        <div class="clearfix"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="hal2">

                                        <div class="clearfix"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="hal3">

                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <!----batas isi yang diprint--->
                            </div>
                        </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

@endsection
