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
                        <h4 class="page-title">Master Data Pegawai</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Tambah Data Pegawai</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                        <div class="col-md-6">
                                <div class="white-box">
                                    <h3 class="box-title m-b-0">Form input data pegawai</h3>
                                    <p class="text-muted m-b-30 font-13"> BPS Provinsi Nusa Tenggara Barat </p>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <form method="POST" action="{{ route('pegawai.update',$DataPegawai->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $DataPegawai -> nama }}" placeholder="Nama Lengkap tanpa gelar" required=""> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="niplama">NIP Lama</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-medall"></i></div>
                                                        <input type="text" class="form-control" id="niplama" name="niplama" value="{{ $DataPegawai -> nip_lama }}" placeholder="NIP Lama" required=""> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nipbaru">NIP Baru</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                                        <input type="text" class="form-control" id="nipbaru" name="nipbaru" value="{{ $DataPegawai -> nip_baru }}" placeholder="NIP Baru" required=""> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgllahir">Tanggal Lahir</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                        <input type="text" class="form-control" id="tgllahir" name="tgllahir" value="{{ $DataPegawai -> tgl_lahir }}" placeholder="Tanggal Lahir" data-mask="9999-99-99" required="">

                                                    </div>
                                                    <span class="font-13 text-muted">yyyy-mm-dd</span>
                                                </div>
                                                <div class="form-group">
                                                        <label for="nipbaru">Jenis Kelamin</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                                            <select class="form-control select2" name="jk" required="">
                                                                <option>Select</option>
                                                                <option value="1" {{ $DataPegawai -> jk == '1' ? "selected" : "" }}>Laki-Laki</option>
                                                                <option value="2" {{ $DataPegawai -> jk == '2' ? "selected" : "" }}>Perempuan</option>
                                                            </select>

                                                            </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nipbaru">Pangkat/Gol</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                                        <select class="form-control select2" name="gol" required="">
                                                            <option>Select</option>
                                                            @foreach ($DataGol as $Gol)
                                                                <option value="{{ $Gol -> kode }}" {{ $DataPegawai->gol == $Gol->kode ? "selected" : ""}}>{{ $Gol -> pangkat }} ( {{ $Gol -> gol }})</option>
                                                            @endforeach
                                                        </select>

                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nipbaru">Unitkerja</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                                        <select class="form-control select2" name="unitkerja" required="">
                                                            <option>Select</option>
                                                            @foreach ($DataUnitkerja as $Unit)
                                                                <option value="{{ $Unit -> kode }}" {{ $DataPegawai->unitkerja == $Unit->kode ? "selected" : ""}}>[{{ $Unit -> kode }}] {{ $Unit -> nama }}</option>
                                                            @endforeach
                                                        </select>

                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nipbaru">Jabatan</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                                        <select class="form-control select2" name="jabatan" required="">
                                                            <option>Select</option>
                                                            @for ($i = 1; $i < 5; $i++)
                                                            <option value="{{ $i }}" {{ $DataPegawai->jabatan == $i ? "selected" : ""}}>{{ $JenisJabatanVar[$i] }}</option>
                                                            @endfor

                                                        </select>

                                                        </div>
                                                </div>
                                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
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
