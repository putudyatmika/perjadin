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
                        <h4 class="page-title">Laporan - Rekap Perjalanan Menurut Pegawai</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li class="active">Laporan Rekap Pegawai</li>
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
                            @include('laporan.filter-bidang-pegawai')
                            <h3 class="box-title m-b-0">Rekap Anggaran Perjalanan Dinas yang telah dilaksanakan</h3>
                            <p class="text-muted m-b-20">@if (Session::has('tahun_anggaran')) <code>Tahun Anggaran {{Session::get('tahun_anggaran')}}</code> @endif</p>
                            <div class="table-responsive">
                                <table id="DataTableCustom" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Pegawai</th>
                                            <th>Bidang/Bagian</th>
                                            <th>Flag Pegawai</th>
                                            <th class="text-right">Jumlah Perjalanan</th>
                                            <th class="text-right">Total Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($RekapPegawai as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if ($item->jumlah>0)
                                                    <a href="{{route('lap_pegawai',$item->peg_id)}}">{{$item->nama_pegawai}}</a>
                                                    @else
                                                    {{$item->nama_pegawai}}
                                                    @endif
                                                    <br />
                                                    <small>NIP. {{$item->nip_baru}}</small>
                                                </td>
                                                <td>{{$item->nama_unitkerja}}</td>
                                                <td>
                                                    @if ($item->flag > 0)
                                                    <span class="label label-rouded label-success">{{ $FlagUmum[$item -> flag] }}</span>
                                                    @else 
                                                    <span class="label label-rouded label-danger">{{ $FlagUmum[$item -> flag] }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-right">{{$item->jumlah}}</td>
                                                <td class="text-right">{{$item->totalbiaya}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th colspan="3"><p class="text-center">TOTAL</p></th>
                                            <th class="text-right">{{$RekapPegawai->sum('jumlah')}}</th>
                                            <th class="text-right">{{$RekapPegawai->sum('totalbiaya')}}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
@endsection
