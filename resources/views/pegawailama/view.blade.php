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
                        <h4 class="page-title">Data Pegawai</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Pegawai</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                        <div class="col-md-8">
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <h2>{{ $DataPegawai->nama}}</h2>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 col-xs-3">
                                            NIP Baru
                                        </div>
                                        <div class="col-sm-9 col-xs-9">
                                            {{ $DataPegawai->nip_baru}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-3">
                                            Jenis Kelamin
                                        </div>
                                        <div class="col-sm-9 col-xs-9">
                                            {{ $jkVar[$DataPegawai->jk]}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-3">
                                            Tanggal Lahir
                                        </div>
                                        <div class="col-sm-9 col-xs-9">
                                            {{ $DataPegawai->tgl_lahir}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-3">
                                            Pangkat/Golongan
                                        </div>
                                        <div class="col-sm-9 col-xs-9">
                                        {{ $DataPegawai -> pangkat }} ({{ $DataPegawai->gol}})
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-3">
                                            Bidang/Bagian
                                        </div>
                                        <div class="col-sm-9 col-xs-9">
                                            {{ $DataPegawai->bidang_nama}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-3">
                                            Jabatan
                                        </div>
                                        <div class="col-sm-9 col-xs-9">
                                        <strong>{{ $JenisJabatanVar[$DataPegawai -> jabatan] }}</strong> {{ $DataPegawai -> unit_nama}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-3">

                                        </div>
                                        <div class="col-sm-9 col-xs-9">
                                            <a href="{{ route('pegawai.edit',$DataPegawai->id) }}" class="btn btn-success pull-left"><i class="fa fa-pencil"></i> Edit </a>

                                            <form action="{{ route('pegawai.destroy', $DataPegawai->id) }}" class="pull-left" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"> Delete</i>
                                                        </button>
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
