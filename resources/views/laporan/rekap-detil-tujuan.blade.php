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
    $(function () {
        $("#DataTableCustom").dataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ],
            "pageLength": 30,
        });
    });
    </script>
@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h4 class="page-title">Laporan - Rekap Detil Perjalanan Menurut Tujuan</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li><a href="{{route('laporan.tujuan')}}">Laporan Rekap Tujuan</a></li>
                            <li class="active">Detil</li>
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
                            <h3 class="box-title m-b-0">Detil Perjalanan Dinas yang telah dilaksanakan ke {{$dataTujuan->nama_kabkota}}</h3>
                            <p class="text-muted m-b-20">@if (Session::has('tahun_anggaran')) <code>Tahun Anggaran {{Session::get('tahun_anggaran')}}</code> @endif</p>
                            <div class="table-responsive">
                                <table class="table table-striped" id="DataTableCustom">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kode Trx</th>
                                            <th>Bidang</th>
                                            <th>Tugas</th>
                                            <th class="text-right">Tgl Berangkat</th>
                                            <th class="text-right">Hari</th></th>
                                            <th class="text-right">Total Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                          $total_biaya=0;   
                                        @endphp
                                        @foreach ($rekapTujuan as $item )
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->nama}}
                                                    <br />
                                                    <small>NIP. {{$item->nip_baru}}</small>
                                                </td>
                                                <td>{{$item->kode_trx}}</td>
                                                <td>{{$item->unit_nama}}</td>
                                                <td>{{$item->tugas}}</td>
                                                <td class="text-right">{{Tanggal::Panjang($item->tgl_brkt)}}</td>
                                                <td class="text-right">{{$item->bnyk_hari}}</td>
                                                <td class="text-right">@duit($item->totalbiaya)</td>
                                            </tr>
                                            @php
                                                $total_biaya += $item->totalbiaya;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7" class="text-center">Total</th>
                                            <th class="text-right">@duit($total_biaya)</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
@endsection
