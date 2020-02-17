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

@extends('layouts.default')

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
$('#FlagModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tujuan = button.data('tujuan') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var biaya = button.data('biaya')
  var flagmatrik = button.data('flagmatrik')
  var pelaksana = button.data('pelaksana')
  var matrikid = button.data('matrikid')

  var modal = $(this)
  modal.find('.modal-body #tujuan').val(tujuan)
  modal.find('.modal-body #biaya').val(biaya)
  modal.find('.modal-body #flag_old').val(flagmatrik)
  modal.find('.modal-body #pelaksana').val(pelaksana)
  modal.find('.modal-body #matrikid').val(matrikid)
})

$('#AlokasiModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tujuan = button.data('tujuan') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var biaya = button.data('biaya')
  var unitkerja = button.data('unitkerja')
  var matrikid = button.data('matrikid')
  var sm = button.data('sm')
  var tahunmatrik = button.data('tahunmatrik')

  var modal = $(this)
  modal.find('.modal-body #tujuan').val(tujuan)
  modal.find('.modal-body #biaya').val(biaya)
  modal.find('.modal-body #unit_pelaksana').val(unitkerja)
  modal.find('.modal-body #matrikid').val(matrikid)
  modal.find('.modal-body #sm').val(sm)
  modal.find('.modal-body #tahun_matrik').val(tahunmatrik)
})
$('#ViewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tujuan = button.data('tujuan') // Extract info from data-* attributes
  var lamanya = button.data('lamanya')
  var sm = button.data('sm')
  var tahun = button.data('tahun')
  var waktu = button.data('waktu')
  var mak = button.data('mak')
  var pelaksana = button.data('pelaksana')
  var harian = button.data('harian')
  var transport = button.data('transport')
  var biaya = button.data('biaya')
  var rill = button.data('rill')
  var hotel = button.data('hotel')
  var flag = button.data('flag')
  var matrikid = button.data('matrikid')

  var modal = $(this)
  modal.find('.modal-body #tujuan').text(tujuan)
  modal.find('.modal-body #lamanya').text(lamanya)
  modal.find('.modal-body #subjectmatter').text(sm)
  modal.find('.modal-body #tahun').text(tahun)
  modal.find('.modal-body #waktu').text(waktu)
  modal.find('.modal-body #mak').text(mak)
  modal.find('.modal-body #pelaksana').text(pelaksana)
  modal.find('.modal-body #harian').text(harian)
  modal.find('.modal-body #transport').text(transport)
  modal.find('.modal-body #totalbiaya').text(biaya)
  modal.find('.modal-body #rill').text(rill)
  modal.find('.modal-body #hotel').text(hotel)
  modal.find('.modal-body #flag').text(flag)
  modal.find('.modal-body #matrikid').val(matrikid)
})

$('#DeleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tujuan = button.data('tujuan') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var biaya = button.data('biaya')
  var flagmatrik = button.data('flagmatrik')
  var sm = button.data('sm')
  var matrikid = button.data('matrikid')
  var totalbiaya = button.data('totalbiaya')
  var makid = button.data('makid')
  var dana_tid = button.data('tid')


  var modal = $(this)
  modal.find('.modal-body #tujuan').val(tujuan)
  modal.find('.modal-body #biaya').val(biaya)
  modal.find('.modal-body #flagmatrik').val(flagmatrik)
  modal.find('.modal-body #sm').val(sm)
  modal.find('.modal-body #matrikid').val(matrikid)
  modal.find('.modal-body #totalbiaya').val(totalbiaya)
  modal.find('.modal-body #dana_makid').val(makid)
  modal.find('.modal-body #dana_tid').val(dana_tid)
});
$(function () {
    $("#MatrikTable").dataTable();
});
</script>
@endsection
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
                            <li class="active">Data Matrik Perjalanan</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <div class="row">
                    @if (Auth::user()->pengelola>3 || Auth::user()->pengelola==0)
                    <div class="col-lg-4 col-sm-6 col-md-6">
                            <a href="{{url('matrik/create')}}" class="btn btn-danger btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Matrik Perjalanan</a>
                    </div>
                    <div class="col-lg-4">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <form action="{{ url('import_matrik') }}" method="post" class="form" enctype="multipart/form-data">
                              @csrf
                              <div class="input-group {{ $errors->has('importMatrik') ? 'has-error' : '' }}">
                                <input type="file" class="form-control" name="importMatrik" required="">
                                <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
                                              </span>
                              </div>
                            </form>
                    </div>
                    @endif
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
                            <h3 class="box-title m-b-0">Matrik Perjalanan Pegawai BPS Provinsi NTB</h3>  
                            @if (Auth::user()->pengelola>3 || Auth::user()->pengelola==0)
                            <a href="{{url('format_matrik')}}" class="btn btn-sm btn-info  m-b-20 pull-right">Download Format Matrik</a> 
                            @endif
                            <p class="text-muted m-b-20">@if (Session::has('tahun_anggaran')) <code>Tahun Anggaran {{Session::get('tahun_anggaran')}}</code> @endif</p>
                            <div class="table-responsive">
                                <table id="MatrikTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Trx</th>
                                            <th>Tujuan</th>
                                            <th>Lama Hari</th>
                                            <th>Subject Matter</th>
                                            <th>Unit Pelaksana</th>
                                            <th>Waktu</th>
                                            <th>Total Biaya</th>
                                            <th>Flag</th>
                                            <th width="13%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataUnitkerja as $unit)
                                           @php $Unitkerja[$unit->kode]=$unit->nama @endphp
                                        @endforeach
                                        @foreach ($DataMatrik as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                @if ($item->Transaksi!=NULL)
                                               {{$item->Transaksi->kode_trx}}
                                               @endif
                                            </td>
                                            <td><a href="#" data-toggle="modal" data-target="#ViewModal" data-tahun="{{$item->tahun_matrik}}" data-tujuan="{{$item->kodekab_tujuan}}-{{$item->Tujuan->nama_kabkota}}" data-waktu="{{Tanggal::Panjang($item->tgl_awal)}} s/d {{Tanggal::Panjang($item->tgl_akhir)}}" data-lamanya="{{$item->lamanya}} hari" data-mak="{{$item->dana_mak}} - @if ($item->mak_id!=NULL) {{$item->DanaAnggaran->uraian}} @endif" data-sm="@if ($item->mak_id!=NULL){{$item->dana_unitkerja}}-{{$item->DanaUnitkerja->nama}}@endif"
                                            @if ($item->unit_pelaksana==NULL)
                                            data-pelaksana=""
                                            @else
                                            data-pelaksana="{{$item->unit_pelaksana}}-{{$item->UnitPelaksana->nama}}"
                                            @endif
                                                 data-harian="Harian : @duit($item->dana_harian) x {{$item->lama_harian}} hari = @rupiah($item->total_harian)"
                                                data-transport="Transport : @duit($item->dana_transport)" data-rill="Pengeluaran Rill : @rupiah($item->pengeluaran_rill)"
                                                data-biaya="@rupiah($item->total_biaya)"
                                                data-hotel="Hotel : @duit($item->dana_hotel) x {{$item->lama_hotel}} hari = @rupiah($item->total_hotel)" data-flag="{{$MatrikFlag[$item->flag_matrik]}}" data-matrikid="{{$item->matrik_id}}">{{$item->Tujuan->nama_kabkota}}</a></td>
                                            <td>{{$item->lamanya}} Hari</td>
                                            <td>@if ($item->mak_id!=NULL){{$item->dana_unitkerja}}-{{$item->DanaUnitkerja->nama}}@endif</td>
                                            <td>
                                                @if ($item->UnitPelaksana!=NULL)
                                                    {{$item->unit_pelaksana}}-{{$item->UnitPelaksana->nama}}
                                                @endif
                                            </td>
                                            <td>{{Tanggal::Pendek($item->tgl_awal)}} s/d {{Tanggal::Pendek($item->tgl_akhir)}}</td>
                                            <td> @duit($item->total_biaya)</td>
                                            <td class="text-center">
                                            @if ($item->flag_matrik==0)
                                            <span class="label label-rouded label-inverse">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                            @elseif ($item->flag_matrik==1)
                                            <span class="label label-rouded label-info">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                            @elseif ($item->flag_matrik==2)
                                            <span class="label label-rouded label-danger">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                            @elseif ($item->flag_matrik==3)
                                            <span class="label label-rouded label-warning">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                            @else
                                            <span class="label label-rouded label-success">{{$MatrikFlag[$item->flag_matrik]}}</span>
                                            @endif
                                            <h5>
                                                <small>{{$item->updated_at->diffForHumans()}}</small>
                                                </h5>
                                                </td>
                                            <td>
                                                @if (($item->flag_matrik<2 and (Auth::user()->pengelola>3 or Auth::user()->user_unitkerja==$item->dana_unitkerja))  or Auth::user()->user_level>3)
                                                    @if ($item->dana_tid!=NULL) 
                                                    <button class="btn btn-circle btn-success btn-sm" data-toggle="modal" data-target="#AlokasiModal" data-tujuan="{{$item->Tujuan->nama_kabkota}}" data-biaya="@rupiah($item->total_biaya)" data-unitkerja="{{$item->unit_pelaksana}}" data-sm="@if ($item->mak_id!=NULL){{$item->dana_unitkerja}}-{{$item->DanaUnitkerja->nama}}@endif" data-matrikid="{{$item->id}}" data-tahunmatrik={{$item->tahun_matrik}}><span data-toggle="tooltip" title="Alokasi matrik perjalanan ke {{$item->Tujuan->nama_kabkota}}"><i class="fa fa-bookmark"></i></span></button>
                                                    @endif

                                                <a href="{{route('matrik.edit',$item->id)}}" class="btn btn-circle btn-custom btn-sm"><span data-toggle="tooltip" title="Edit matrik perjalanan ke {{$item->Tujuan->nama_kabkota}}"><i class="fa fa-pencil"></i></span></a>
                                                @endif
                                                @if (Auth::user()->user_level>3)
                                                <button class="btn btn-circle btn-primary btn-sm" data-toggle="modal" data-target="#FlagModal" data-tujuan="{{$item->Tujuan->nama_kabkota}}" data-biaya="@rupiah($item->total_biaya)" data-flagmatrik="{{$MatrikFlag[$item->flag_matrik]}}" data-matrikid="{{$item->id}}" @if ($item->unit_pelaksana==NULL)
                                                        data-pelaksana="{{$item->unit_pelaksana}}"
                                                        @else
                                                        data-pelaksana="{{$item->unit_pelaksana}}-{{$item->UnitPelaksana->nama}}"
                                                        @endif><span data-toggle="tooltip" title="Flag matrik perjalanan ke {{$item->Tujuan->nama_kabkota}}"><i class="fa fa-flag"></i></span></button>
                                                @endif
                                                @if (($item->flag_matrik<2 and Auth::user()->user_unitkerja==$item->dana_unitkerja) or Auth::user()->pengelola>3 or Auth::user()->user_level>3)
                                                        <button class="btn btn-circle btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal" data-tujuan="{{$item->Tujuan->nama_kabkota}}" data-biaya="@rupiah($item->total_biaya)" data-totalbiaya="{{$item->total_biaya}}" @if ($item->unit_pelaksana==NULL)
                                                            data-pelaksana="{{$item->unit_pelaksana}}"
                                                            @else
                                                            data-pelaksana="{{$item->unit_pelaksana}}-{{$Unitkerja[$item->unit_pelaksana]}}"
                                                            @endif
                                                            data-sm="@if ($item->mak_id!=NULL){{$item->dana_unitkerja}}-{{$item->DanaUnitkerja->nama}}@endif" data-flagmatrik="{{$MatrikFlag[$item->flag_matrik]}}" data-matrikid="{{$item->id}}" data-makid="{{$item->mak_id}}" data-tid="{{$item->dana_tid}}"><span data-toggle="tooltip" title="Hapus matrik perjalanan ke {{$item->Tujuan->nama_kabkota}}"><i class="fa fa-trash"></i></span></button>
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
            @include('matrik.alokasiform')
            @include('matrik.view')
@endsection
