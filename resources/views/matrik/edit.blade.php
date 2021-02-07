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
                            <li><a href="{{route('matrik.list')}}">Data Matrik Perjalanan</a></li>
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
                            @if ($DataMatrik == '')
                                <h3 class="box-title m-b-0">Data Matrik tidak tersedia</h3>
                            @else
                            <h3 class="box-title m-b-0">Form Matrik Perjalanan</h3>
                            <p class="text-muted m-b-30 font-13"> BPS Provinsi Nusa Tenggara Barat </p>

                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" action="{{route('matrik.update') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="nama" class="col-lg-2 col-xs-12 col-form-label">Tujuan</label>
                                            <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" placeholder="Tujuan" required readonly="" value="{{$DataMatrik->nama_kabkota}}">
                                                <input id="kode_kabkota" type="hidden" name="kode_kabkota" value="{{ $DataMatrik->kodekab_tujuan }}" required readonly="">
                                            <span class="input-group-btn">
                                                    <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#CariTujuan"><i class="fa fa-search"></i></button>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-lg-2 col-xs-12 col-form-label">Lamanya</label>
                                            <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <select name="lamanya" id="lamanya" class="form-control" required>
                                                    <option value="">Pilih</option>
                                                    @for ($i = 1; $i <= 30; $i++)
                                                        <option value="{{$i}}" @if ($DataMatrik->lamanya==$i) selected="selected"@endif>{{$i}} Hari</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="Pelaksanaan" class="col-lg-2 col-xs-12 col-form-label">Durasi Kegiatan</label>
                                                <div class="input-group col-lg-8 col-sm-8 col-xs-12 input-daterange" id="date-range">
                                                    <div class="input-group-addon" ><i class="ti-user"></i></div>
                                                    <input type="text" class="form-control" id="tglawal" name="tglawal" placeholder="Tgl Awal" required="" autocomplete="off" value="{{$DataMatrik->tgl_awal}}" >
                                                    <span class="input-group-addon bg-info b-0 text-white">s/d</span>
                                                    <input type="text" class="form-control" id="tglakhir" name="tglakhir" placeholder="Tgl Akhir" autocomplete="off" required=""  value="{{$DataMatrik->tgl_akhir}}">
                                                </div>
                                            </div>
                                        <h3 class="box-title m-t-40">Sumber Dana</h3>
                                        <hr>
                                            <div class="form-group row">
                                                    <label for="MAK" class="col-lg-2 col-xs-12 col-form-label">MAK</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_mak" name="dana_mak" placeholder="MAK Dana" required readonly="" @if ($DataMatrik->dana_tid) value="{{$DataMatrik->mak}}" @endif>
                                                    <span class="input-group-btn">
                                                            <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#SumberDana"><i class="fa fa-search"></i></button>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_program" class="col-lg-2 col-xs-12 col-form-label">Program</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_program" name="dana_program" value="[{{$DataMatrik->prog_kode}}] {{$DataMatrik->prog_nama}}" placeholder="Program Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_kegiatan" class="col-lg-2 col-xs-12 col-form-label">Kegiatan</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_kegiatan" name="dana_kegiatan" value="[{{$DataMatrik->keg_kode}}] {{$DataMatrik->keg_nama}}" placeholder="Kegiatan Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_kro" class="col-lg-2 col-xs-12 col-form-label">KRO</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_kro" name="dana_kro" @if ($DataMatrik->kro_kode) value="[{{$DataMatrik->kro_kode}}] {{$DataMatrik->kro_nama}}" @else value="-" @endif placeholder="KRO Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_output" class="col-lg-2 col-xs-12 col-form-label">Output</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_output" name="dana_output" value="[{{$DataMatrik->output_kode}}] {{$DataMatrik->output_nama}}" placeholder="Output Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_komponen" class="col-lg-2 col-xs-12 col-form-label">Komponen</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_komponen" name="dana_komponen" @if ($DataMatrik->dana_tid) value="[{{$DataMatrik->komponen_kode}}] {{$DataMatrik->komponen_nama}}" @endif placeholder="Komponen Anggaran" readonly="">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dana_subkomponen" class="col-lg-2 col-xs-12 col-form-label">Sub Komponen</label>
                                                    <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="dana_subkomponen" name="dana_subkomponen" @if ($DataMatrik->subkomponen_kode) value="[{{$DataMatrik->subkomponen_kode}}] {{$DataMatrik->subkomponen_nama}}" @else value="-" @endif placeholder="Sub Komponen Anggaran" readonly="">
                                                    </div>
                                                </div>
                                                    <div class="form-group row">
                                                        <label for="dana_uraian" class="col-lg-2 col-xs-12 col-form-label">Uraian</label>
                                                        <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="dana_uraian" name="dana_uraian" required placeholder="Uraian Dana" readonly=""  @if ($DataMatrik->dana_tid) value="{{$DataMatrik->uraian}}" @endif>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="dana_pagu" class="col-lg-2 col-xs-12 col-form-label">Pagu awal</label>
                                                        <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="dana_pagu" name="dana_pagu" required placeholder="Pagu Dana" @if ($DataMatrik->dana_tid) value="{{$DataMatrik->pagu_awal}}" @endif readonly="">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="dana_pagu" class="col-lg-2 col-xs-12 col-form-label">Pagu tersedia</label>
                                                        <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="dana_pagusisa" name="dana_pagusisa" placeholder="Pagu Dana yang tersedia" readonly=""  @if ($DataMatrik->dana_tid) value="{{$DataMatrik->pagu_awal-$DataMatrik->pagu_rencana}}" @endif>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="dana_unitkerja" class="col-lg-2 col-xs-12 col-form-label">Unitkerja</label>
                                                        <div class="input-group col-lg-8 col-sm-8 col-xs-12">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="dana_unitkerja" name="dana_unitkerja" placeholder="Unitkerja Sumber Dana" readonly="" value="{{$DataMatrik->dana_unitnama}}">
                                                            <input type="hidden" class="form-control" id="dana_kodeunit" name="dana_kodeunit" value="{{$DataMatrik->dana_unitkerja}}">
                                                            <input type="hidden" id="dana_makid" name="dana_makid" value="{{$DataMatrik->mak_id}}">
                                                            <input type="hidden" id="dana_tid" name="dana_tid" value="{{$DataMatrik->dana_tid}}" />
                                                        </div>
                                                    </div>
                                        <h3 class="box-title m-t-40">Rencana Anggaran Biaya</h3>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="jenisperjadin" class="col-lg-3 col-xs-12 col-form-label">Jenis Perjadin</label>
                                            <div class="input-group col-lg-9 col-sm-9 col-xs-12">

                                                    <div class="radio-list">
                                                        <label class="radio-inline p-0">
                                                            <div class="radio radio-success">
                                                                <input type="radio" name="jenis_perjadin" id="jenis1" value="1" required @if ($DataMatrik->jenis_perjadin==1) checked="checked" @endif>
                                                                <label for="jenis1" class="text-success">Biasa</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-danger">
                                                                <input type="radio" name="jenis_perjadin" id="jenis2" value="2" @if ($DataMatrik->jenis_perjadin==2) checked="checked" @endif>
                                                                <label for="jenis2" class="text-danger">Paket Meeting</label>
                                                            </div>
                                                        </label>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="nama" class="col-lg-3 col-xs-12 col-form-label">Uang Harian</label>
                                                <div class="input-group col-lg-9 col-sm-9 col-xs-12">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="number" class="form-control" id="uangharian" name="uangharian" placeholder="Nilai Rp." required value="{{$DataMatrik->dana_harian}}">
                                                    <span class="input-group-addon bg-info b-0 text-white">x</span>
                                                    <input type="number" class="form-control" id="harian" name="harian" placeholder="Lama hari" @if ($DataMatrik->jenis_perjadin==1) readonly="" @endif value="{{$DataMatrik->lama_harian}}" required>
                                                    <span class="input-group-addon bg-info b-0 text-white">=</span>
                                                    <input type="number" class="form-control" id="totalharian" name="totalharian" placeholder="" readonly="" value="{{$DataMatrik->total_harian}}">
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="nilaiTransport" class="col-lg-3 col-xs-12 col-form-label">Transport</label>
                                            <div class="input-group col-lg-9 col-sm-9 col-xs-12">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="number" class="form-control" id="nilaiTransport" name="nilaiTransport" placeholder="Nilai transport Rp." required autocomplete="off" value="{{$DataMatrik->dana_transport}}"> </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" id="penginapan_nama" class="col-lg-3 col-sm-3 col-xs-12 col-form-label">Penginapan</label>
                                            <div class="input-group col-lg-9 col-sm-9 col-xs-12">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="number" class="form-control" id="nilaihotel" name="nilaihotel" placeholder="Nilai Hotel Rp." value="{{$DataMatrik->dana_hotel}}" required="">
                                                <span class="input-group-addon bg-info b-0 text-white">x</span>
                                                <input type="number" class="form-control" id="hotelhari" name="hotelhari" placeholder="Lama hari" value="{{$DataMatrik->lama_hotel}}" @if ($DataMatrik->jenis_perjadin==1) readonly="" @endif required>
                                                <span class="input-group-addon bg-info b-0 text-white">=</span>
                                                <input type="number" class="form-control" id="totalhotel" name="totalhotel" value="{{$DataMatrik->total_hotel}}" placeholder="" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pengeluaranrill" class="col-lg-3 col-sm-3 col-xs-12 col-form-label">Pengeluaran Rill</label>
                                            <div class="input-group col-lg-9 col-sm-9 col-xs-12">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="number" class="form-control" id="pengeluaranrill" name="pengeluaranrill" value="{{$DataMatrik->pengeluaran_rill}}" placeholder="Nilai pengeluaran rill Rp." required=""> </div>
                                        </div>
                                                <div class="form-group row">
                                                        <label for="totalbiaya" class="col-lg-3 col-xs-12 col-form-label">Total Rencana Biaya</label>
                                                        <div class="input-group col-lg-9 col-sm-9 col-xs-12">
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                            <input type="text" class="form-control" id="totalbiaya" name="totalbiaya" placeholder="Total Biaya" value="{{$DataMatrik->total_biaya}}" required="" readonly=""> </div>
                                                    </div>




                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Reset</button>
                                        <input type="hidden" name="mid" id="mid" value="{{$DataMatrik->id}}" />
                                        <input type="hidden" name="tid_sblm" id="tid_sblm" value="{{$DataMatrik->dana_tid}}" />
                                        <input type="hidden" name="aid_sblm" id="aid_sblm" value="{{$DataMatrik->mak_id}}" />
                                        <input type="hidden" name="totalbiaya_sblm" id="totalbiaya_sblm" value="{{$DataMatrik->total_biaya}}" />
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            @include('matrik.modalmaster')
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
@include('matrik.js')
<script>
    jQuery('#date-range').datepicker({
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true

    });
</script>
@endsection
