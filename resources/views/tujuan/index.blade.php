@section('js')
<script>
    $('#EditModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var kodekabkota = button.data('kodekabkota') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var namakabkota = button.data('namakabkota')
  var kepala = button.data('kepala')
  var nipkepala = button.data('nipkepala')
  var ratedarat = button.data('ratedarat')
  var id = button.data('id')

  var modal = $(this)
  modal.find('.modal-body #kode_tujuan').val(kodekabkota)
  modal.find('.modal-body #nama_tujuan').val(namakabkota)
  modal.find('.modal-body #kepala').val(kepala)
  modal.find('.modal-body #nipkepala').val(nipkepala)
  modal.find('.modal-body #rate').val(ratedarat)
  modal.find('.modal-body #id').val(id)
})

$('#DeleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var kodekabkota = button.data('kodekabkota') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var namakabkota = button.data('namakabkota')
  var kepala = button.data('kepala')
  var nipkepala = button.data('nipkepala')
  var ratedarat = button.data('ratedarat')
  var id = button.data('id')

  var modal = $(this)
  modal.find('.modal-body #kode_tujuan').val(kodekabkota)
  modal.find('.modal-body #nama_tujuan').val(namakabkota)
  modal.find('.modal-body #kepala').val(kepala)
  modal.find('.modal-body #nipkepala').val(nipkepala)
  modal.find('.modal-body #rate').val(ratedarat)
  modal.find('.modal-body #id').val(id)
})
</script>
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Tujuan Perjalanan</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <button type="button" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#TambahModal">Tambah Tujuan</button>

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Tujuan Perjalanan</li>
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
                            <h3 class="box-title m-b-0">Data Tujuan Perjalanan BPS Provinsi NTB </h3>
                            <p class="text-muted m-b-20">Tahun <code>2019</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tujuan</th>
                                            <th>Kepala</th>
                                            <th>NIP Kepala</th>
                                            <th>Rate Darat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($DataTujuan as $item)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $item->nama_kabkota }}</td>
                                              <td>{{ $item->kepala}}</td>
                                              <td>{{ $item->nip_kepala}}</td>
                                              <td>{{ $item->rate_darat}}</td>
                                              <td><button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#EditModal" data-kodekabkota="{{ $item->kode_kabkota}}" data-namakabkota="{{ $item->nama_kabkota}}" data-kepala="{{ $item->kepala}}" data-nipkepala="{{$item->nip_kepala}}" data-ratedarat="{{$item->rate_darat}}" data-id="{{$item->id}}">Edit</button>
                                                <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#DeleteModal" data-kodekabkota="{{ $item->kode_kabkota}}" data-namakabkota="{{ $item->nama_kabkota}}" data-kepala="{{ $item->kepala}}" data-nipkepala="{{$item->nip_kepala}}" data-ratedarat="{{$item->rate_darat}}" data-id="{{$item->id}}">Delete</button>
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
            <!--modal tambah tujuan-->
            <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="TambahModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Tujuan</h4> </div>
                            <div class="modal-body">
                                    <form method="POST" action="{{ route('tujuan.store') }}">
                                    @csrf

                                    @include('tujuan.form')

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Data</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
            <!--end modal tambah tujuan-->
            <!--modal Edit tujuan-->
            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Edit Data Tujuan</h4> </div>
                            <div class="modal-body">
                                    <form method="POST" action="{{ route('tujuan.update','update') }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" id="id" value="" />
                                    @include('tujuan.form')

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update Data</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
            <!--end modal edit tujuan-->
            <!--modal hapus tujuan-->
            <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-white" id="exampleModalLabel1"><strong>Delete Data Tujuan</strong></h4> </div>
                        <div class="modal-body">
                                <form method="POST" action="{{ route('tujuan.destroy','delete') }}">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id" value="" />
                                @include('tujuan.deleteform')

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-inverse btn-rounded waves-effect waves-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light m-r-10">Delete Data</button>
                        </div>
                    </form>
                    </div>
                </div>
        </div>
        <!--end modal hapus tujuan-->
@endsection

