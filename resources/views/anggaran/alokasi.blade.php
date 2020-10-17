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
                                <dt class="col-sm-3">ID</dt>
                                <dd class="col-sm-9">{{$dataAnggaran->id}}</dd>
                                <dt class="col-sm-3">MAK</dt>
                                <dd class="col-sm-9">{{$dataAnggaran->mak}}</dd>
                                <dt class="col-sm-3">Komponen</dt>
                                <dd class="col-sm-9">[{{$dataAnggaran->komponen_kode}}] {{$dataAnggaran->komponen_nama}}</dd>
                                <dt class="col-sm-3">Uraian</dt>
                                <dd class="col-sm-9">{{$dataAnggaran->uraian}}</dd>
                                <dt class="col-sm-3">Subject Matter</dt>
                                <dd class="col-sm-9">[{{$dataAnggaran->unitkerja}}] {{$dataAnggaran->Unitkerja->nama}}</dd>
                                <dt class="col-sm-3">Pagu Utama</dt>
                                <dd class="col-sm-9">Rp. @duit($dataAnggaran->pagu_utama)</dd>
                                <dt class="col-sm-3">Pagu sudah teralokasi</dt>
                                <dd class="col-sm-9">Rp. @duit($dataAnggaran->rencana_pagu)</dd>
                                <dt class="col-sm-3">Pagu Realisasi</dt>
                                <dd class="col-sm-9">Rp. @duit($dataAnggaran->realisasi_pagu)</dd>
                                <dt class="col-sm-3">Sisa Pagu Utama</dt>
                                <dd class="col-sm-9">Rp. @duit(($dataAnggaran->pagu_utama-$dataAnggaran->rencana_pagu))</dd>
                            </dl>
                            @if (Auth::user()->pengelola>3)
                            <div class="text-right" style="margin-bottom:10px;">
                                <button type="button" class="btn btn-sm btn-success btn-rounded" data-toggle="modal" data-target="#TambahAlokasiModal" data-tahun="{{$dataAnggaran->tahun_anggaran}}"><i class="fa fa-plus"></i> Tambah Alokasi</button>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table id="TurunanTabel" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>t_id</th>
                                            <th>Bidang/Bagian</th>
                                            <th>%</th>
                                            <th>Pagu Alokasi</th>
                                            <th>Pagu Rencana</th>
                                            <th>Pagu Realisasi</th>
                                            <th>Sisa Rencana</th>
                                            <th>Sisa Realisasi</th>
                                            <th>aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if ($dataTurunan->isEmpty())
                                                <tr>
                                                <td colspan="8" align="center">Anggaran belum di alokasi</td>
                                                </tr>
                                            @else
                                                @foreach ($dataTurunan as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration}}</td>
                                                        <td>{{ $item->t_id}}</td>
                                                        <td>@if ($item->unit_pelaksana != "")
                                                            [{{$item->unit_pelaksana}}] {{$item->Unitkerja->nama}}
                                                            @endif
                                                        </td>
                                                        <td>{!! number_format(($item->pagu_awal/$dataAnggaran->pagu_utama)*100,2) !!}</td>
                                                        <td>@duit($item->pagu_awal)</td>
                                                        <td>@duit($item->pagu_rencana)</td>
                                                        <td>@duit($item->pagu_realisasi)</td>
                                                        <td>@duit($item->pagu_awal - $item->pagu_rencana)</td>
                                                        <td>@duit($item->pagu_awal - $item->pagu_realisasi)</td>
                                                        
                                                        <td>
                                                            @if (Auth::user()->pengelola>3)
                                                            <button type="button" class="btn btn-sm btn-primary btn-circle" data-toggle="modal" data-target="#EditAlokasiModal" data-tid="{{$item->t_id}}" data-paguawal="{{$item->pagu_awal}}"  data-pagurencana="{{$item->pagu_rencana}}" data-pagurealisasi="{{$item->pagu_realisasi}}" data-unitkode="{{$item->unit_pelaksana}}"><i class="fa fa-pencil"></i></button>
                                                            
                                                            <button type="button" class="btn btn-sm btn-danger btn-circle" data-toggle="modal" data-target="#DeleteAlokasiModal" data-tid="{{$item->t_id}}" data-paguawal="{{$item->pagu_awal}}" data-unitkode="{{$item->Unitkerja->nama}}"><i class="fa fa-trash-o"></i></button>
                                                            @endif
                                                            <button type="button" class="btn btn-sm btn-info btn-circle" data-toggle="modal" data-target="#SyncAlokasiModal" data-tid="{{$item->t_id}}" data-paguawal="{{$item->pagu_awal}}" data-unitkode="[{{$item->unit_pelaksana}}] {{$item->Unitkerja->nama}}"><i class="fa fa-refresh"></i></button>
                                                        </td>
                                                        
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" align="center"> Total </td>
                                                <td>{!! number_format(($dataTurunan->sum('pagu_awal')/$dataAnggaran->pagu_utama)*100,2) !!}</td>
                                                <td>@duit($dataTurunan->sum('pagu_awal'))</td>
                                                <td>@duit($dataTurunan->sum('pagu_rencana'))</td>
                                                <td>@duit($dataTurunan->sum('pagu_realisasi'))</td>
                                                <td>@duit($dataTurunan->sum('pagu_awal')-$dataTurunan->sum('pagu_rencana'))</td>
                                                <td>@duit($dataTurunan->sum('pagu_awal')-$dataTurunan->sum('pagu_realisasi'))</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                </table>
                            </div>
                            <div class="m-t-20">
                              <h4>Data perjalanan menggunakan anggaran ini</h4>
                              <div class="table-responsive">
                                  <table id="TurunanPerjalanan" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Trx ID</th>
                                            <th>t_id</th>
                                            <th>Nama</th>
                                            <th>Tujuan</th>
                                            <th>Tgl Brkt</th>
                                            <th>Durasi</th>
                                            <th>Rencana Biaya</th>
                                            <th>Realisasi Biaya</th>
                                            <th>Flag Trx</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                          @if ($dataJalan->isEmpty())
                                            <tr>
                                                <td colspan="9" align="center">Data perjalanan tidak tersedia</td>
                                            </tr>
                                          @else
                                              @php $total = 0; $total_real = 0;@endphp
                                              @foreach ($dataJalan as $r)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$r->kode_trx}}</td>
                                                    <td>{{$r->dana_tid}}</td>
                                                    <td>@if ($r->flag_matrik>0)
                                                        {{$r->Transaksi->peg_nama}}
                                                        @endif 
                                                        <br />
                                                        <small>
                                                            @if ($r->unit_pelaksana)
                                                        [{{$r->unit_pelaksana}}] {{$r->UnitPelaksana->nama}}
                                                        @endif
                                                        </small>
                                                    </td>
                                                    <td>{{$r->Tujuan->nama_kabkota}}</td>
                                                    <td>
                                                      @if ($r->flag_matrik>0)
                                                        @if ($r->Transaksi->tgl_brkt)
                                                        {{Tanggal::Pendek($r->Transaksi->tgl_brkt)}}
                                                        @endif
                                                      @endif
                                                    </td>
                                                    <td>
                                                        @if ($r->flag_matrik>0)
                                                            @if ($r->Transaksi->bnyk_hari)
                                                            {{$r->Transaksi->bnyk_hari}} hari   
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                      @if ($r->flag_matrik>0)
                                                        @if ($r->flag_matrik <> 2)
                                                          @duit($r->total_biaya)
                                                        @endif
                                                      @else
                                                        @duit($r->total_biaya)
                                                      @endif
                                                  </td>
                                                  <td>
                                                    @if ($r->flag_matrik>0)
                                                        @if ($r->Transaksi->flag_trx > 4)
                                                            @duit($r->Transaksi->Kuitansi->total_biaya)
                                                        @endif
                                                    @endif
                                                  </td>
                                                    <td>
                                                      @if ($r->flag_matrik>0)
                                                      @if ($r->Transaksi->flag_trx==0)
                                                      <span class="label label-inverse">{{$FlagTrx[$r->Transaksi->flag_trx]}}</span>
                                                      @elseif ($r->Transaksi->flag_trx==1)
                                                      <span class="label label-info">{{$FlagTrx[$r->Transaksi->flag_trx]}}</span>
                                                      @elseif ($r->Transaksi->flag_trx==2)
                                                      <span class="label label-warning">{{$FlagTrx[$r->Transaksi->flag_trx]}}</span>
                                                      @elseif ($r->Transaksi->flag_trx==3)
                                                      <span class="label label-danger">{{$FlagTrx[$r->Transaksi->flag_trx]}}</span>
                                                      @elseif ($r->Transaksi->flag_trx==4 or $r->Transaksi->flag_trx==5)
                                                      <span class="label label-primary">{{$FlagTrx[$r->Transaksi->flag_trx]}}</span>
                                                      @elseif ($r->Transaksi->flag_trx==6)
                                                      <span class="label label-success">{{$FlagTrx[$r->Transaksi->flag_trx]}}</span>
                                                      @elseif ($r->Transaksi->flag_trx==7)
                                                      <span class="label label-info">{{$FlagTrx[$r->Transaksi->flag_trx]}}</span>
                                                      @endif

                                                      <h5>
                                                          <small>{{$r->Transaksi->updated_at->diffForHumans()}}</small>
                                                      </h5>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @if ($r->flag_matrik>0)
                                                 @if ($r->flag_matrik <> 2)
                                                    @php 
                                                        $total = $total + $r->total_biaya; 
                                                    @endphp
                                                    @if ($r->Transaksi->flag_trx > 4)
                                                    @php
                                                    $total_real = $total_real + $r->Transaksi->Kuitansi->total_biaya;
                                                    @endphp
                                                    @endif
                                                 @endif
                                               @else
                                                    @php 
                                                        $total = $total + $r->total_biaya; 
                                                    @endphp
                                                @endif
                                              @endforeach
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                              <td colspan="6"></td>
                                              <td>Total</td>
                                              <td>@duit($total)</td>
                                              <td>@duit($total_real)</td>
                                              <td>&nbsp;</td>
                                          </tr>
                                        </tfoot>
                                        @endif
                                  </table>
                                </div>
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
