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


</script>
@include('matrik.js')
@include('matrik.modal')
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Matrik Perjalanan</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                         <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li><a href="{{route('matrik.index')}}">Data Matrik Perjalanan</a></li>
                            <li class="active">Tambah Data</li>
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
                    <div class="col-lg-10">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Form Matrik Perjalanan Pegawai</h3>
                            <p class="text-muted m-b-30 font-13"> BPS Provinsi Nusa Tenggara Barat </p>

                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" action="{{ route('matrik.store') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="nama" class="col-2 col-form-label">Tujuan</label>
                                            <div class="input-group col-8">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" placeholder="Tujuan" required="" readonly="">
                                                <input id="kode_kabkota" type="hidden" name="kode_kabkota" value="{{ old('kode_kabkota') }}" required readonly="">
                                            <span class="input-group-btn">
                                                    <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#CariTujuan"><i class="fa fa-search"></i></button>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-2 col-form-label">Lamanya</label>
                                            <div class="input-group col-8">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <select name="lamanya" id="lamanya" class="form-control">
                                                    <option value="">Pilih</option>
                                                    @for ($i = 1; $i < 7; $i++)
                                                        <option value="{{$i}}">{{$i}} Hari</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="Pelaksanaan" class="col-2 col-form-label">Pelaksanaan</label>
                                                <div class="input-group col-8 input-daterange" id="date-range">
                                                    <div class="input-group-addon" ><i class="ti-user"></i></div>
                                                    <input type="text" class="form-control" id="tglawal" name="tglawal" placeholder="Tgl Awal" required="" autocomplete="off">
                                                    <span class="input-group-addon bg-info b-0 text-white">s/d</span>
                                                    <input type="text" class="form-control" id="tglakhir" name="tglakhir" placeholder="Tgl Akhir" autocomplete="off" required="">
                                                </div>
                                            </div>
                                        <h3 class="box-title m-t-40">Sumber Dana</h3>
                                        <hr>
                                            <div class="form-group row">
                                                    <label for="MAK" class="col-2 col-form-label">MAK</label>
                                                    <div class="input-group col-8">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_mak" name="dana_mak" placeholder="MAK Dana" required="" readonly="">
                                                    <span class="input-group-btn">
                                                            <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#SumberDana"><i class="fa fa-search"></i></button>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label for="dana_uraian" class="col-2 col-form-label">Uraian</label>
                                                        <div class="input-group col-8">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="dana_uraian" name="dana_uraian" placeholder="Uraian Dana" readonly="">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="dana_pagu" class="col-2 col-form-label">Pagu</label>
                                                            <div class="input-group col-8">
                                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                                <input type="text" class="form-control" id="dana_pagu" name="dana_pagu" placeholder="Pagu Dana" readonly="">

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="dana_unitkerja" class="col-2 col-form-label">Unitkerja</label>
                                                            <div class="input-group col-8">
                                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                                <input type="text" class="form-control" id="dana_unitkerja" name="dana_unitkerja" placeholder="Unitkerja Sumber Dana" readonly="">
                                                                <input type="hidden" class="form-control" id="dana_kodeunit" name="dana_kodeunit">
                                                            </div>
                                                        </div>
                                        <h3 class="box-title m-t-40">Rencana Anggaran Biaya</h3>
                                        <hr>
                                        <div class="form-group row">
                                                <label for="nama" class="col-3 col-form-label">Uang Harian</label>
                                                <div class="input-group col-9">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="number" class="form-control" id="uangharian" name="uangharian" placeholder="Nilai Rp." required="">
                                                    <span class="input-group-addon bg-info b-0 text-white">x</span>
                                                    <input type="number" class="form-control" id="harian" name="harian" placeholder="Lama hari" readonly="">
                                                    <span class="input-group-addon bg-info b-0 text-white">=</span>
                                                    <input type="number" class="form-control" id="totalharian" name="totalharian" placeholder="" readonly="">
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="nilaiTransport" class="col-3 col-form-label">Transport</label>
                                            <div class="input-group col-9">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="number" class="form-control" id="nilaiTransport" name="nilaiTransport" placeholder="Nilai transport Rp." required="" autocomplete="off"> </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="nama" class="col-3 col-form-label">Penginapan</label>
                                                <div class="input-group col-9">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="number" class="form-control" id="nilaihotel" name="nilaihotel" placeholder="Nilai Hotel Rp." required="">
                                                    <span class="input-group-addon bg-info b-0 text-white">x</span>
                                                    <input type="number" class="form-control" id="hotelhari" name="hotelhari" placeholder="Lama hari" readonly="">
                                                    <span class="input-group-addon bg-info b-0 text-white">=</span>
                                                    <input type="number" class="form-control" id="totalhotel" name="totalhotel" placeholder="" readonly="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                    <label for="pengeluaranrill" class="col-3 col-form-label">Pengeluaran Rill</label>
                                                    <div class="input-group col-9">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="number" class="form-control" id="pengeluaranrill" name="pengeluaranrill" placeholder="Nilai pengeluaran rill Rp." required=""> </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label for="totalbiaya" class="col-3 col-form-label">Total Rencana Biaya</label>
                                                        <div class="input-group col-9">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="totalbiaya" name="totalbiaya" placeholder="Total Biaya" required="" readonly=""> </div>
                                                    </div>




                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            @include('matrik.caritujuan')
            @include('matrik.sumberdana')
@endsection
