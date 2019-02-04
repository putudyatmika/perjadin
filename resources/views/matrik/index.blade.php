@extends('layouts.default')

@section('js')
<script>
$('#FlagModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tujuan = button.data('tujuan') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var biaya = button.data('biaya')
  var flagmatrik = button.data('flagmatrik')
  var matrikid = button.data('matrikid')

  var modal = $(this)
  modal.find('.modal-body #tujuan').val(tujuan)
  modal.find('.modal-body #biaya').val(biaya)
  modal.find('.modal-body #flagmatrik').val(flagmatrik)
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

  var modal = $(this)
  modal.find('.modal-body #tujuan').val(tujuan)
  modal.find('.modal-body #biaya').val(biaya)
  modal.find('.modal-body #unit_pelaksana').val(unitkerja)
  modal.find('.modal-body #matrikid').val(matrikid)
})
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
                        <a href="{{url('matrik/create')}}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Tambah Matrik Perjalanan</a>

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Matrik Perjalanan</li>
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
                            <h3 class="box-title m-b-0">Matrik Perjalanan Pegawai BPS Provinsi NTB</h3>
                            <p class="text-muted m-b-20">Tahun <code>2019</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tujuan</th>
                                            <th>Lama Hari</th>
                                            <th>Subject Matter</th>
                                            <th>Unit Pelaksana</th>
                                            <th>Waktu</th>
                                            <th>Sumber Dana</th>
                                            <th>Total Biaya</th>
                                            <th>Flag</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataUnitkerja as $unit)
                                           @php $Unitkerja[$unit->kode]=$unit->nama @endphp
                                        @endforeach
                                        @foreach ($DataMatrik as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="#" data-toggle="modal" data-target="#ViewModal">{{$item->nama_kabkota}}</a></td>
                                            <td>{{$item->lamanya}}</td>
                                            <td>{{$item->unit_nama}}</td>
                                            <td>{{$Unitkerja[$item->unit_pelaksana]}}</td>
                                            <td>{{$item->tgl_awal}} s/d {{$item->tgl_akhir}}</td>
                                            <td>{{$item->dana_mak}}</td>
                                            <td>{{$item->total_biaya}}</td>
                                            <td>{{$MatrikFlag[$item->flag_matrik]}}</td>
                                            <td><button class="btn btn-rounded btn-danger btn-sm" data-toggle="modal" data-target="#AlokasiModal" data-tujuan="{{$item->nama_kabkota}}" data-biaya="{{$item->total_biaya}}" data-unitkerja="{{$item->unit_pelaksana}}" data-matrikid="{{$item->matrik_id}}">Alokasi</button>
                                                <button class="btn btn-rounded btn-danger btn-sm">Edit</button>
                                                <button class="btn btn-rounded btn-danger btn-sm" data-toggle="modal" data-target="#FlagModal" data-tujuan="{{$item->nama_kabkota}}" data-biaya="{{$item->total_biaya}}" data-flagmatrik="{{$item->flag_matrik}}" data-matrikid="{{$item->matrik_id}}">Flag</button></td>
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
