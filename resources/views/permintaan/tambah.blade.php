@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Form-JLN</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                         <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li><a href="{{route('permintaan.list')}}">Data Form-JLN</a></li>
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
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Form-JLN</h3>
                            <p class="text-muted m-b-30 font-13"> BPS Provinsi Nusa Tenggara Barat </p>

                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" id="formJLNTambah" name="formJLNTambah" action="{{route('permintaan.simpan') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="unitkerja" class="col-lg-2 col-xs-12 col-form-label">Unit Kerja</label>
                                            <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                @if (Auth::user()->pengelola > 3)
                                                    <select name="unitkerja" id="unitkerja" class="form-control" required="">
                                                        <option value="">Pilih Unitkerja</option>
                                                        @foreach ($dataFungsi as $item)
                                                            <option value="{{$item->kode}}">[{{$item->kode}}] {{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <input type="text" name="unitkerja_nama" id="unitkerja_nama" value="[{{Auth::user()->user_unitkerja}}] {{$dataFungsi->where('kode',Auth::user()->user_unitkerja)->first()->nama}}" disabled="" class="form-control"/>
                                                    <input type="hidden" name="unitkerja" id="unitkerja" value="{{Auth::user()->user_unitkerja}}" />
                                                @endif

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nomor_surat" class="col-lg-2 col-xs-12 col-form-label">Nomor Surat</label>
                                            <div class="col-lg-8 col-sm-8 col-xs-12">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat Form-JLN" required="">
                                            </div>
                                            <small class="text-danger">format : B-XXX/BPS/KodeFungsi/Bulan/Tahun. Harap ini diperhatikan</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tanggal_surat" class="col-lg-2 col-xs-12 col-form-label">Tanggal Surat</label>
                                            <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="text" class="form-control" id="tanggal_surat" name="tanggal_surat" placeholder="Tanggal Surat Form-JLN" autocomplete="off" required="">
                                            </div>
                                        </div>
                                        <h3 class="box-title m-t-40">Sumber Dana</h3>
                                        <hr>
                                            <div class="form-group row">
                                                    <label for="MAK" class="col-lg-2 col-xs-12 col-form-label">MAK</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_mak" name="dana_mak" placeholder="MAK Dana" required readonly="">
                                                    <span class="input-group-btn">
                                                            <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#SumberDana"><i class="fa fa-search"></i></button>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_program" class="col-lg-2 col-xs-12 col-form-label">Program</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_program" name="dana_program"  placeholder="Program Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_kegiatan" class="col-lg-2 col-xs-12 col-form-label">Kegiatan</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_kegiatan" name="dana_kegiatan"  placeholder="Kegiatan Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_kro" class="col-lg-2 col-xs-12 col-form-label">KRO</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_kro" name="dana_kro"  placeholder="KRO Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_output" class="col-lg-2 col-xs-12 col-form-label">Output</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_output" name="dana_output"  placeholder="Output Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_komponen" class="col-lg-2 col-xs-12 col-form-label">Komponen</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_komponen" name="dana_komponen"  placeholder="Komponen Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_subkomponen" class="col-lg-2 col-xs-12 col-form-label">Sub Komponen</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_subkomponen" name="dana_subkomponen"  placeholder="Sub Komponen Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                    <div class="form-group row">
                                                        <label for="dana_uraian" class="col-lg-2 col-xs-12 col-form-label">Uraian</label>
                                                        <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="dana_uraian" name="dana_uraian" required placeholder="Uraian Dana" readonly="">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="dana_pagu" class="col-lg-2 col-xs-12 col-form-label">Pagu awal</label>
                                                        <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="dana_pagu" name="dana_pagu" required placeholder="Pagu Dana" readonly="">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="dana_pagu" class="col-lg-2 col-xs-12 col-form-label">Pagu tersedia</label>
                                                        <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="dana_pagusisa" name="dana_pagusisa" placeholder="Pagu Dana yang tersedia" readonly="">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="dana_unitkerja" class="col-lg-2 col-xs-12 col-form-label">Unitkerja</label>
                                                        <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="dana_unitkerja" name="dana_unitkerja" placeholder="Unitkerja Sumber Dana" readonly="">
                                                            <input type="hidden" id="dana_kodeunit" name="dana_kodeunit">
                                                            <input type="hidden" id="dana_makid" name="dana_makid">
                                                            <input type="hidden" id="dana_tid" name="dana_tid">
                                                        </div>
                                                    </div>
                                            <h3 class="box-title m-t-40">Matrik Perjalanan</h3>
                                            <table class="table" id="tabelmatrik" name="tabelmatrik">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="semuamatrik" id="semuamatrik" value="pilihsemua"></th>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal</th>
                                                    <th>Tujuan</th>
                                                    <th>Lama</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Reset</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            @include('permintaan.modal')
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
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
 <!-- end - This is for export functionality only -->
 <!-- Clock Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('tema/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
@include('permintaan.jstambah')
<script>
    jQuery('#date-range').datepicker({
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true

    });
    @if (Auth::user()->pengelola == 0)
        var Tanggal = new Date();
        var unit = $("#unitkerja").val();
        var srtjln = 'B-xxx/BPS/'+ unit +'/'+ (Tanggal.getMonth()+1) + '/' + Tanggal.getFullYear();
        $('#nomor_surat').val(srtjln);
    @endif
</script>
@endsection
