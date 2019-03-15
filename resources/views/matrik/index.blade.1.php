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

  var modal = $(this)
  modal.find('.modal-body #tujuan').val(tujuan)
  modal.find('.modal-body #biaya').val(biaya)
  modal.find('.modal-body #unit_pelaksana').val(unitkerja)
  modal.find('.modal-body #matrikid').val(matrikid)
  modal.find('.modal-body #sm').val(sm)
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


  var modal = $(this)
  modal.find('.modal-body #tujuan').val(tujuan)
  modal.find('.modal-body #biaya').val(biaya)
  modal.find('.modal-body #flagmatrik').val(flagmatrik)
  modal.find('.modal-body #sm').val(sm)
  modal.find('.modal-body #matrikid').val(matrikid)
  modal.find('.modal-body #totalbiaya').val(totalbiaya)
  modal.find('.modal-body #dana_makid').val(makid)
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
                                            <th>Kode Trx</th>
                                            <th>Tujuan</th>
                                            <th>Lama Hari</th>
                                            <th>Subject Matter</th>
                                            <th>Unit Pelaksana</th>
                                            <th>Waktu</th>
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
                                            <td>{{$item->Transaksi->kode_trx}}</td>
                                            <td><a href="#" data-toggle="modal" data-target="#ViewModal" data-tahun="{{$item->tahun_matrik}}" data-tujuan="{{$item->nama_kabkota}}" data-waktu="{{$item->tgl_awal}} s/d {{$item->tgl_akhir}}" data-lamanya="{{$item->lamanya}} hari" data-mak="{{$item->dana_mak}} - {{$item->uraian}}" data-sm="{{$item->dana_unitkerja}}-{{$item->unit_nama}}"
                                            @if ($item->unit_pelaksana==NULL)
                                            data-pelaksana="{{$item->unit_pelaksana}}"
                                            @else
                                            data-pelaksana="{{$item->unit_pelaksana}}-{{$Unitkerja[$item->unit_pelaksana]}}"
                                            @endif
                                                 data-harian="Harian : @duit($item->dana_harian) x {{$item->lama_harian}} hari = @rupiah($item->total_harian)"
                                                data-transport="Transport : @duit($item->dana_transport)" data-rill="Pengeluaran Rill : @rupiah($item->pengeluaran_rill)"
                                                data-biaya="@rupiah($item->total_biaya)"
                                                data-hotel="Hotel : @duit($item->dana_hotel) x {{$item->lama_hotel}} hari = @rupiah($item->total_hotel)" data-flag="{{$MatrikFlag[$item->flag_matrik]}}" data-matrikid="{{$item->matrik_id}}">{{$item->nama_kabkota}}</a></td>
                                            <td>{{$item->lamanya}}</td>
                                            <td>{{$item->unit_nama}}</td>
                                            <td>
                                                @if ($item->unit_pelaksana==NULL)
                                                    {{$item->unit_pelaksana}}
                                                    @else
                                                   {{$item->unit_pelaksana}}-{{$Unitkerja[$item->unit_pelaksana]}}
                                                    @endif</td>
                                            <td>{{$item->tgl_awal}} s/d {{$item->tgl_akhir}}</td>
                                            <td> @duit($item->total_biaya)</td>
                                            <td>
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
                                                </td>
                                            <td><button class="btn btn-rounded btn-success btn-sm" data-toggle="modal" data-target="#AlokasiModal" data-tujuan="{{$item->nama_kabkota}}" data-biaya="@rupiah($item->total_biaya)" data-unitkerja="{{$item->unit_pelaksana}}" data-sm="{{$item->dana_unitkerja}}-{{$item->unit_nama}}" data-matrikid="{{$item->matrik_id}}">Alokasi</button>
                                                <a href="{{route('matrik.edit',$item->matrik_id)}}" class="btn btn-rounded btn-custom btn-sm">Edit</a>
                                                <button class="btn btn-rounded btn-primary btn-sm" data-toggle="modal" data-target="#FlagModal" data-tujuan="{{$item->nama_kabkota}}" data-biaya="@rupiah($item->total_biaya)" data-flagmatrik="{{$MatrikFlag[$item->flag_matrik]}}" data-matrikid="{{$item->matrik_id}}" @if ($item->unit_pelaksana==NULL)
                                                        data-pelaksana="{{$item->unit_pelaksana}}"
                                                        @else
                                                        data-pelaksana="{{$item->unit_pelaksana}}-{{$Unitkerja[$item->unit_pelaksana]}}"
                                                        @endif>Flag</button>
                                                        <button class="btn btn-rounded btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal" data-tujuan="{{$item->nama_kabkota}}" data-biaya="@rupiah($item->total_biaya)" data-totalbiaya="{{$item->total_biaya}}" @if ($item->unit_pelaksana==NULL)
                                                            data-pelaksana="{{$item->unit_pelaksana}}"
                                                            @else
                                                            data-pelaksana="{{$item->unit_pelaksana}}-{{$Unitkerja[$item->unit_pelaksana]}}"
                                                            @endif
                                                            data-sm="{{$item->dana_unitkerja}}-{{$item->unit_nama}}" data-flagmatrik="{{$MatrikFlag[$item->flag_matrik]}}" data-matrikid="{{$item->matrik_id}}" data-makid="{{$item->mak_id}}">Hapus</button>
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
