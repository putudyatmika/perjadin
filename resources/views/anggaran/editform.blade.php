@section('js')
<script>
    jQuery(document).ready(function() {

        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();

    });
    </script>

@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Anggaran</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('')}}">Dashboard</a></li>
                            <li><a href="{{ url('anggaran')}}">Data Anggaran</a></li>
                            <li class="active">Tambah Data Anggaran Perjalanan</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                        <div class="col-md-6">
                                <div class="white-box">
                                    <h3 class="box-title m-b-0">Form input Anggaran Perjalanan</h3>
                                    <p class="text-muted m-b-30 font-13"> BPS Provinsi Nusa Tenggara Barat </p>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <form method="POST" action="{{ route('anggaran.store') }}">
                                                @csrf
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
                                                        <input type="text" class="form-control" id="pagu_utama" name="pagu_utama" placeholder="Pagu Anggaran" required=""> </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="unitkerja">Unitkerja</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                                        <select class="form-control select2" name="unitkerja" required="">
                                                            <option>Select</option>
                                                            @foreach ($DataUnitkerja as $Unit)
                                                                <option value="{{ $Unit -> kode }}">[{{ $Unit -> kode }}] {{ $Unit -> nama }}</option>
                                                            @endforeach
                                                        </select>

                                                        </div>
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
@endsection
