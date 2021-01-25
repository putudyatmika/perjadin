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
$(function () {
    $("#TransaksiTabel").dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
        "pageLength": 20
    });
});
</script>
@include('transaksi.jsview')
@include('transaksi.js')

@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Transaksi Perjalanan Dinas</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Data Transaksi</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                        <div class="col-lg-12">
                                @if (Session::has('message'))
                                <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
                                    {!! Session::get('message') !!}
                                </div>
                                @endif
                        </div>
                    <div class="col-lg-12">
                        <div class="white-box">
                            @include('transaksi.filter')
                            <h3 class="box-title m-b-0">Transaksi Perjalanan Dinas</h3>
                            <p class="text-muted m-b-20">@if (Session::has('tahun_anggaran')) <code>Tahun Anggaran {{Session::get('tahun_anggaran')}}</code> @endif</p>
                            <div class="table-responsive">
                                <table id="TransaksiTabel" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Trx</th>
                                            <th>Tujuan</th>
                                            <th>Unit Pelaksana</th>
                                            <th>Peg Brkt</th>
                                            <th>Tanggal Brkt</th>
                                            <th>Kabid SM</th>
                                            <th>PPK</th>
                                            <th>KPA</th>
                                            <th>Status Transaksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataTransaksi as $item)
                                        @php
                                         if ($item->peg_nip!="") {
                                            $peg_nama=$item->peg_nama;
                                         }
                                         else {
                                             $peg_nama=NULL;
                                         }
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <button class="btn btn-info btn-success btn-rounded" data-toggle="modal" data-target="#ViewModal" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}">
                                                    <span data-toggle="tooltip" title="Detil Transaksi">{{$item->kode_trx}}</span>
                                                </button>
                                            </td>
                                            <td>
                                                @if ($item->Matrik->tipe_perjadin==2)
                                                    @foreach ($item->Matrik->MultiTujuan as $t)
                                                        <div class="m-b-5">{{$t->kodekab_tujuan}}-{{$t->namakabkota_tujuan}}</div> 
                                                    @endforeach
                                                    <div class="label label-info">
                                                        {{$TipePerjadin[$item->Matrik->tipe_perjadin]}}
                                                    </div>
                                                @else 
                                                {{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}
                                                @endif
                                                
                                            </td>
                                            <td>{{$item->Matrik->unit_pelaksana}}-{{$item->Matrik->UnitPelaksana->nama}}</td>
                                            <td>{{$peg_nama}}</td>
                                            <td>
                                                @if ($item->tgl_brkt!=NULL)
                                                   {{Tanggal::Panjang($item->tgl_brkt)}}
                                                @endif
                                            </td>
                                            <td>@include('transaksi.kabid')</td>
                                            <td>@include('transaksi.ppk')</td>
                                            <td>@include('transaksi.kpa')</td>
                                            <td>@include('transaksi.flagtransaksi')</td>
                                            <td>
                                                
                                                @include('transaksi.ajukan')
                                                @if (Auth::user()->pengelola>4)
                                                    @if ($item->flag_trx < 7)
                                                    <button type="button" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#EditModal" data-tujuan="{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-unitpelaksana="{{$item->Matrik->unit_pelaksana}}-{{$item->Matrik->UnitPelaksana->nama}}" data-tglawal="{{$item->Matrik->tgl_awal}}" data-tglakhir="{{$item->Matrik->tgl_akhir}}" data-infotgl="Pelaksanaan : {{Tanggal::Panjang($item->Matrik->tgl_awal)}} s/d {{Tanggal::Panjang($item->Matrik->tgl_akhir)}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-matrikid="{{$item->matrik_id}}" data-pegnip="{{$item->peg_nip}}" data-tglbrkt="{{$item->tgl_brkt}}" data-tglbalik="{{$item->tgl_balik}}" data-tugas="{{$item->tugas}}" data-kabidkonfirmasi="{{$item->kabid_konfirmasi}}" data-ppkkonfirmasi="{{$item->ppk_konfirmasi}}" data-kpakonfirmasi="{{$item->kpa_konfirmasi}}" data-flagtransaksi="{{$item->flag_trx}}"><span data-toggle="tooltip" title="Edit pengajuan transaksi dari {{$item->Matrik->UnitPelaksana->nama}}"><i class="fa fa-pencil"></i></span></button>
                                                    @endif
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
            @include('transaksi.modal')
@endsection
