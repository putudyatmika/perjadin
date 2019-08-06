@section('js')
 @include('anggaran.jsTurunan')
@stop
@extends('layouts.default')
@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Alokasi Anggaran Perjalanan</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li><a href="{{route('anggaran.index')}}">Anggaran Perjalanan</a></li>
                            <li class="active">Alokasi Anggaran</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <div class="row">

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
                            <h3 class="box-title m-b-0">Alokasi Anggaran Perjalanan</h3>
                            @if ($dataAnggaran==null)
                                <center>Data anggaran tidak tersedia</center>
                            @else
                            <dl class="row">
                                <dt class="col-sm-3">Tahun</dt>
                                <dd class="col-sm-9">{{$dataAnggaran->tahun_anggaran}}</dd>
                                <dt class="col-sm-3">MAK</dt>
                                <dd class="col-sm-9">{{$dataAnggaran->mak}}</dd>
                                <dt class="col-sm-3">Uraian</dt>
                                <dd class="col-sm-9">{{$dataAnggaran->uraian}}</dd>
                                <dt class="col-sm-3">Subject Matter</dt>
                                <dd class="col-sm-9">[{{$dataAnggaran->unitkerja}}] {{$dataAnggaran->Unitkerja->nama}}</dd>
                                <dt class="col-sm-3">Pagu Utama</dt>
                                <dd class="col-sm-9">Rp. @duit($dataAnggaran->pagu_utama)</dd>
                            </dl>
                            <div class="text-right" style="margin-bottom:10px;"><button type="button" class="btn btn-sm btn-success btn-rounded" data-toggle="modal" data-target="#TambahAlokasiModal" data-tahun="{{$dataAnggaran->tahun_anggaran}}"><i class="fa fa-plus"></i> Tambah Alokasi</button>
                            </div>
                            <div class="table-responsive">
                                <table id="TurunanTabel" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bidang/Bagian</th>
                                            <th>%</th>
                                            <th>Pagu Alokasi</th>
                                            <th>Realisasi</th>
                                            <th>Sisa</th>
                                            <th>aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if ($dataTurunan->isEmpty())
                                                <tr>
                                                <td colspan="7" align="center">Anggaran belum di alokasi</td>
                                                </tr>
                                            @else
                                                @foreach ($dataTurunan as $item )
                                                    <tr>
                                                        <td>{{ $loop->iteration}}</td>
                                                        <td>[{{$item->unit_pelaksana}}] {{$item->Unitkerja->nama}}</td>
                                                        <td>{!! number_format(($item->pagu_awal/$dataAnggaran->pagu_utama)*100,2) !!}</td>
                                                        <td>@duit($item->pagu_awal)</td>
                                                        <td>{{($item->pagu_rencana+$dataAnggaran->pagu_realisasi)}}</td>
                                                        <td>@duit($item->pagu_awal-($item->pagu_rencana+$dataAnggaran->pagu_realisasi))</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-primary btn-rounded" data-toggle="modal" data-target="#EditAlokasiModal" data-tid="{{$item->t_id}}" data-paguawal="{{$item->pagu_awal}}" data-unitkode="{{$item->unit_pelaksana}}"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger btn-rounded" data-toggle="modal" data-target="#DeleteAlokasiModal"><i class="fa fa-trash-o"></i></button>
                                                            </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            @include('anggaran.modalturunan')
@endsection
