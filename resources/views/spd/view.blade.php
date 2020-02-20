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

$(document).ready(function () {
    
    window.onload = $('#hal1').printArea();
    setTimeout(function(){ $('#hal2').printArea(); }, 2000);
    window.onfocus = setTimeout(function () { window.close(); }, 9000); 
    
});
 </script>

@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h4 class="page-title">Print Surat Perjalanan Dinas (SPD)</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li><a href="{{route('spd.index')}}">Data SPD</a></li>
                            <li class="active">Print SPD</li>
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
                                    <li role="presentation" class="active nav-item"><a href="#hal1" class="nav-link" aria-controls="hal1" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Hal 1</span></a></li>
                                    <li role="presentation" class="nav-item"><a href="#hal2" class="nav-link" aria-controls="hal2" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Hal 2</span></a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="hal1">
                                        @include('spd.hal1')
                                        <div class="clearfix"></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="hal2">
                                            @include('spd.hal2')
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
