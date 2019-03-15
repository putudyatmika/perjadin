@section('css')
<link href="{{asset('tema/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/moment/moment.js')}}"></script>
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
     $('#SelesaiModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kid = button.data('kid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var nama = button.data('nama')
var tugas = button.data('tugas')
var tglkuitansi = button.data('tglkuitansi')
var totalbiaya = button.data('totalbiaya')

var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #kuitansi_id').val(kid)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #nama').val(nama)
modal.find('.modal-body #tugas').val(tugas)
modal.find('.modal-body #tgl_kuitansi').val(tglkuitansi)
modal.find('.modal-body #totalbiaya').val(totalbiaya)
});
     </script>
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Kuitansi Perjalanan Dinas</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Data Kuitansi</li>
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
                            <h3 class="box-title m-b-0">Daftar Kuitansi</h3>
                            <p class="text-muted m-b-20">Keadaan <code>tanggal hari ini</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode Trx</th>
                                            <th>Tanggal Kuitansi</th>
                                            <th>Nama Pegawai</th>
                                            <th>Tugas</th>
                                            <th>Tanggal Pergi</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status Kuitansi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataKuitansi as $item)
                                            <tr>
                                                <td>
                                                    @if ($item->tgl_kuitansi=="")
                                                    {{$item->Transaksi->kode_trx}}
                                                    @else
                                                    <a href="{{route('kuitansi.view',$item->Transaksi->kode_trx)}}">{{$item->Transaksi->kode_trx}}</a>
                                                    @endif
                                                </td>
                                                <td>{{$item->tgl_kuitansi}}</td>
                                                <td>{{$item->Transaksi->TabelPegawai->nama}}</td>
                                                <td>{{$item->Transaksi->tugas}}</td>
                                                <td>{{$item->Transaksi->tgl_brkt}}</td>
                                                <td>{{$item->Transaksi->tgl_balik}}</td>
                                                <td>@include('kuitansi.flag')</td>
                                                <td>@include('kuitansi.aksi')</td>
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
            @include('kuitansi.modal')
@endsection
