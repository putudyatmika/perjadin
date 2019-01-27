@section('js')
<script>
    $('#EditModal').on('show.bs.modal', function (event) {
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
  modal.find('.modal-body #pagu').val(pagu)
  modal.find('.modal-body #unitkerja').val(unitkerja)
  modal.find('.modal-body #anggaranid').val(anggaranid)
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
  modal.find('.modal-body #pagu').val(pagu)
  modal.find('.modal-body #unitkerja').val(unitkerja)
  modal.find('.modal-body #anggaranid').val(anggaranid)
})
</script>
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Anggaran Perjalanan</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <button type="button" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#TambahModal">Tambah Anggaran</button>
                        <!--<a href="{{ route('anggaran.create')}}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Tambah Anggaran</a>-->

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Anggaran Perjalanan</li>
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
                            <h3 class="box-title m-b-0">Data Anggaran Perjalanan BPS Provinsi NTB </h3>
                            <p class="text-muted m-b-20">Tahun <code>2019</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>MAK</th>
                                            <th>Uraian</th>
                                            <th>Unitkerja</th>
                                            <th>Pagu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataAnggaran as $item)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $item->tahun_anggaran}}</td>
                                                <td>{{ $item->mak}}</td>
                                                <td>{{ $item->uraian}}</td>
                                                <td>{{ $item->unit_nama}}</td>
                                                <td><div class="pull-right">{{ $item->pagu}}</div></td>
                                                <td><button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#EditModal" data-tahun="{{ $item->tahun_anggaran}}" data-mak="{{ $item->mak}}" data-pagu="{{ $item->pagu}}" data-uraian="{{$item->uraian}}" data-unitkode="{{$item->unitkerja}}" data-anggaranid="{{$item->id}}">Edit</button>
                                                    <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#DeleteModal" data-tahun="{{ $item->tahun_anggaran}}" data-mak="{{ $item->mak}}" data-pagu="{{ $item->pagu}}" data-uraian="{{$item->uraian}}" data-unitkode="{{$item->unit_nama}}" data-anggaranid="{{$item->id}}">Delete</button>
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
            <!---modal edit-->
            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Edit Data Anggaran</h4> </div>
                            <div class="modal-body">
                                    <form method="POST" action="{{ route('anggaran.update','update') }}">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="anggaran_id" id="anggaranid" value="">
                                            <div class="form-group">
                                                <label for="tahun_anggaran">Tahun</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                    <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" placeholder="Tahun Anggaran" data-mask="9999" required="">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mak">MAK</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                                    <input type="text" class="form-control" id="mak" name="mak" placeholder="Mata Anggaran Kegiatan" required=""> </div>
                                                    <span class="font-13 text-muted">cth : 054.01.06.2895.004.100.524111</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="uraian">Uraian</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-medall"></i></div>
                                                    <input type="text" class="form-control" id="uraian" name="uraian" placeholder="Uraian Anggaran" required=""> </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pagu">Pagu</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                                    <input type="text" class="form-control" id="pagu" name="pagu" placeholder="Pagu Anggaran" required=""> </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="unitkerja">Unitkerja</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                                    <select class="form-control select2" name="unitkerja" id="unitkerja" required="">
                                                        <option>Select</option>
                                                        @foreach ($DataUnitkerja as $Unit)
                                                            <option value="{{ $Unit -> kode }}">[{{ $Unit -> kode }}] {{ $Unit -> nama }}</option>
                                                        @endforeach
                                                    </select>

                                                    </div>
                                            </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update Data</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
            <!--end modal edit-->
            <!--modal tambah anggaran-->
            <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Anggaran</h4> </div>
                            <div class="modal-body">
                                    <form method="POST" action="{{ route('anggaran.store') }}">
                                            @csrf
                                    @include('anggaran.formdata')

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Data</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
            <!--end modal tambah anggaran-->
            <!--modal delete anggaran-->
            <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Delete Data Anggaran</h4> </div>
                            <div class="modal-body">
                                    <form method="POST" class="form" action="{{ route('anggaran.destroy','delete') }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="anggaran_id" id="anggaranid" value="">
                                    @include('anggaran.deleteform')

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Delete Data</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
            <!--end modal delete anggaran-->
@endsection

