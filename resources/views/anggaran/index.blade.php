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
$('#EditModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tahun_anggaran = button.data('tahun') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var mak = button.data('mak')
  var uraian = button.data('uraian')
  var pagu = button.data('pagu')
  var rencana_pagu = button.data('pagurencana')
  var unitkerja = button.data('unitkode')
  var anggaranid = button.data('anggaranid')
  var komponenkode = button.data('komponenkode')
  var komponennama = button.data('komponennama')

  var modal = $(this)
  modal.find('.modal-body #tahun_anggaran').val(tahun_anggaran)
  modal.find('.modal-body #mak').val(mak)
  modal.find('.modal-body #uraian').val(uraian)
  modal.find('.modal-body #pagu_utama').val(pagu)
  modal.find('.modal-body #pagu_rencana').val(rencana_pagu)
  modal.find('.modal-body #unitkerja').val(unitkerja)
  modal.find('.modal-body #anggaranid').val(anggaranid)
  modal.find('.modal-body #komponen_kode').val(komponenkode)
  modal.find('.modal-body #komponen_nama').val(komponennama)
})

$('#DeleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tahun_anggaran = button.data('tahun') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var mak = button.data('mak')
  var uraian = button.data('uraian')
  var pagu = button.data('pagu')
  var unitkerja = button.data('unitkode')
  var anggaranid = button.data('anggaranid')

  var modal = $(this)
  modal.find('.modal-body #tahun_anggaran').val(tahun_anggaran)
  modal.find('.modal-body #mak').val(mak)
  modal.find('.modal-body #uraian').val(uraian)
  modal.find('.modal-body #pagu_utama').val(pagu)
  modal.find('.modal-body #unitkerja').val(unitkerja)
  modal.find('.modal-body #anggaranid').val(anggaranid)
});
$(function () {
    $("#AnggaranTabel").dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'pdf', 'print'
        ],
        "pageLength": 30
    });
});
</script>
@include('anggaran.js')
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Anggaran Perjalanan</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Data Anggaran Perjalanan</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-6">
                <a href="{{route('anggaran.export')}}" class="btn btn-success btn-rounded btn-fw"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                @if (Auth::user()->pengelola>3)
                    <a href="" class="btn btn-danger btn-rounded btn-fw" data-toggle="modal" data-target="#TambahModal"><i class="fa fa-plus"></i> Tambah Anggaran</a>
                </div>
                <div class="col-lg-4">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                        <form action="{{ url('import_anggaran') }}" method="post" class="form" enctype="multipart/form-data">
                          @csrf
                          <div class="input-group {{ $errors->has('importAnggaran') ? 'has-error' : '' }}">
                            <input type="file" class="form-control" name="importAnggaran" required="">
                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
                            </span>
                          </div>
                        </form>
                @endif
                </div>                
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
                            <h3 class="box-title m-b-0">Data Anggaran Perjalanan BPS Provinsi NTB </h3>  @if (Auth::user()->pengelola>3)<a href="{{url('format_anggaran')}}" class="btn btn-sm btn-info pull-right">Download Format Anggaran</a> @endif
                            <p class="text-muted m-b-20">@if (Session::has('tahun_anggaran')) Tahun Anggaran {{Session::get('tahun_anggaran')}} @endif</p>

                            <div class="table-responsive">
                                <table id="AnggaranTabel" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Uraian</th>
                                            <th>Pagu Awal</th>
                                            <th>Pagu Alokasi</th>
                                            <th>Realisasi</th>
                                            <th>ID</th>
                                            <th>Tgl Dibuat</th>
                                            <th>Lock?</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataAnggaran as $item)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#ViewModal" data-anggaranid="{{$item->id}}"><span data-toggle="tooltip" title="Anggaran {{ $item->unit_nama}} : {{ $item->uraian}}">{{ $item->uraian}}</span></a>
                                                    <br />
                                                    <small>{{ $item->mak}}</small>
                                                    <br />
                                                    <small>[{{ $item->komponen_kode}}] {{$item->komponen_nama}}</small>
                                                    <br />
                                                    <small>{{ $item->unit_nama}}</small>
                                                </td>
                                                <td><div class="pull-right">{{$item->pagu_utama}}</div></td>
                                                <td><div class="pull-right">{{$item->rencana_pagu}}</div></td>
                                                <td><div class="pull-right">{{$item->realisasi_pagu}}</div></td>
                                                <td>{{ $item->id}}</td>
                                                <td>{{Tanggal::Pendek($item->created_at)}}</td>
                                                <td>
                                                    @if ((Auth::user()->pengelola==2) or ((Auth::user()->pengelola==5)))
                                                        @if ($item->flag_kunci==0)
                                                        <button class="btn btn-circle btn-info" data-toggle="modal" data-target="#KunciModal" data-tahun="{{ $item->tahun_anggaran}}" data-mak="{{ $item->mak}}" data-pagu="{{ $item->pagu_utama}}" data-uraian="{{$item->uraian}}" data-unitkode="{{$item->unit_nama}}" data-anggaranid="{{$item->id}}" data-kunci="{{$item->flag_kunci}}"><span data-toggle="tooltip" title="Kunci anggaran {{ $item->uraian}}"><i class="fa fa-unlock"></i></span></button>
                                                        @else 
                                                        <button class="btn btn-circle label-warning" data-toggle="modal" data-target="#KunciModal" data-tahun="{{ $item->tahun_anggaran}}" data-mak="{{ $item->mak}}" data-pagu="{{ $item->pagu_utama}}" data-uraian="{{$item->uraian}}" data-unitkode="{{$item->unit_nama}}" data-anggaranid="{{$item->id}}" data-kunci="{{$item->flag_kunci}}"><span data-toggle="tooltip" title="Buka kunci anggaran {{ $item->uraian}}"><i class="fa fa-lock"></i></span></button>
                                                        @endif
                                                    @else 
                                                        @if ($item->flag_kunci==0)
                                                        <button class="btn btn-circle btn-info"><span data-toggle="tooltip" title="anggaran {{ $item->uraian}} terbuka"><i class="fa fa-unlock"></i></span></button>
                                                        @else 
                                                        <button class="btn btn-circle label-warning"><span data-toggle="tooltip" title="anggaran {{ $item->uraian}} terkunci"><i class="fa fa-lock"></i></span></button>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (Auth::user()->pengelola>3 and $item->flag_kunci==0)
                                                    <a href="{{route('anggaran.alokasi',$item->id)}}" class="btn btn-sm btn-success btn-circle"><span data-toggle="tooltip" title="Alokasi anggaran {{ $item->uraian}}"><i class="fa fa-bookmark"></i></span></a>
                                                    <button type="button" class="btn btn-sm btn-primary btn-circle" data-toggle="modal" data-target="#EditModal" data-tahun="{{ $item->tahun_anggaran}}" data-mak="{{ $item->mak}}" data-komponenkode="{{ $item->komponen_kode}}" data-pagu="{{ $item->pagu_utama}}" data-komponennama="{{ $item->komponen_nama}}" data-pagurencana="{{ $item->rencana_pagu}}" data-uraian="{{$item->uraian}}" data-unitkode="{{$item->unitkerja}}" data-anggaranid="{{$item->id}}"><span data-toggle="tooltip" title="Edit anggaran {{ $item->uraian}}"><i class="fa fa-pencil"></i></span></button>
                                                    <button type="button" class="btn btn-sm btn-danger btn-circle" data-toggle="modal" data-target="#DeleteModal" data-tahun="{{ $item->tahun_anggaran}}" data-mak="{{ $item->mak}}" data-pagu="{{ $item->pagu_utama}}" data-uraian="{{$item->uraian}}" data-unitkode="{{$item->unit_nama}}" data-anggaranid="{{$item->id}}"><span data-toggle="tooltip" title="Hapus anggaran {{ $item->uraian}}"><i class="fa fa-trash-o"></i></span></button>
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
            <!-- /.container-fluid -->
            @include('anggaran.modal')
@endsection

