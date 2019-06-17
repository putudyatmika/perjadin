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
});
$(function () {
    $("#AnggaranTabel").dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
        "pageLength": 30
    });
});
</script>
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
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Anggaran Perjalanan</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <div class="row">
                @if (Auth::user()->pengelola>3)
                <div class="col-lg-4 col-sm-6 col-md-6">
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
                            <h3 class="box-title m-b-0">Data Anggaran Perjalanan BPS Provinsi NTB </h3>  @if (Auth::user()->pengelola>3)<a href="{{url('format_anggaran')}}" class="btn btn-sm btn-info pull-right">Download Format Anggaran</a> @endif
                            <p class="text-muted m-b-20">Tahun <code>2019</code></p>

                            <div class="table-responsive">
                                <table id="AnggaranTabel" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Tahun</th>
                                            <th>Uraian</th>
                                            <th>Unitkerja</th>
                                            <th>Pagu Awal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataAnggaran as $item)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $item->id}}</td>
                                                <td>{{ $item->tahun_anggaran}}</td>
                                                <td><a href="" data-toggle="modal" data-target="#ViewModal">{{ $item->uraian}}</a>
                                                    <br />
                                                <small>{{ $item->mak}}</small></td>
                                                <td>{{ $item->unit_nama}}</td>
                                                <td><div class="pull-right">@duit($item->pagu)</div></td>
                                                <td>
                                                    @if (Auth::user()->pengelola>3)
                                                    <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#EditModal" data-tahun="{{ $item->tahun_anggaran}}" data-mak="{{ $item->mak}}" data-pagu="{{ $item->pagu}}" data-uraian="{{$item->uraian}}" data-unitkode="{{$item->unitkerja}}" data-anggaranid="{{$item->id}}">Edit</button>
                                                    <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#DeleteModal" data-tahun="{{ $item->tahun_anggaran}}" data-mak="{{ $item->mak}}" data-pagu="{{ $item->pagu}}" data-uraian="{{$item->uraian}}" data-unitkode="{{$item->unit_nama}}" data-anggaranid="{{$item->id}}">Delete</button>
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
            <!---modal edit-->
            @php
                $tahun_skrg=date('Y');
            @endphp
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
                                                <label for="tahun_anggaran">Tahun Anggaran</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                    <select class="form-control" name="tahun_anggaran" id="tahun_anggaran">
                                                        <option value="">Pilih</option>
                                                        @for ($i=$tahun_skrg-1;$i<=$tahun_skrg+1;$i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
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
            @include('anggaran.modal')
@endsection

