@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Selamat Datang {{ Auth::user()->name }}',
            text: 'di Aplikasi Perjalanan Dinas (Aladin) - BPS Provinsi NTB.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
</script>
@include('chart.depan')
@stop
@extends('layouts.default')

@section('content')

<div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4 class="page-title">Dashboard Aplikasi PerjaLAnan DINas (Aladin) - BPS Provinsi NTB @if (Session::has('tahun_anggaran')) Tahun Anggaran {{Session::get('tahun_anggaran')}} @endif </h4> </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                        <div class="col-lg-12">
                            @if (Session::has('message'))
                            <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                            @endif
                        </div>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                            <h5 class="text-muted vb">Total Perjalanan</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger">{{Jumlah::Transaksi(10,Session::get('tahun_anggaran'))}}</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                            <h5 class="text-muted vb">Sudah dilaksanakan</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-megna">{{Jumlah::Transaksi(7,Session::get('tahun_anggaran'))}}</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{(Jumlah::Transaksi(7,Session::get('tahun_anggaran'))/Jumlah::Transaksi(10,Session::get('tahun_anggaran')))*100}}%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                            <h5 class="text-muted vb">Total Anggaran</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="counter text-right m-t-15 text-primary">@rupiah(Jumlah::TotalAnggaran(Session::get('tahun_anggaran')))</h4> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{((Jumlah::TotalAnggaran(Session::get('tahun_anggaran'))-Jumlah::KuitansiCair(Session::get('tahun_anggaran')))/Jumlah::TotalAnggaran(Session::get('tahun_anggaran')))*100}}%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6  b-0">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                            <h5 class="text-muted vb">Total Dana Terserap</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="counter text-right m-t-15 text-success">@rupiah(Jumlah::KuitansiCair(Session::get('tahun_anggaran')))</h4> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{(Jumlah::KuitansiCair(Session::get('tahun_anggaran'))/Jumlah::TotalAnggaran(Session::get('tahun_anggaran')))*100}}%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                        <div class="white-box">
                            <h3 class="box-title">Banyak Perjalanan Menurut Tujuan Tahun @if (Session::has('tahun_anggaran')) {{Session::get('tahun_anggaran')}} @endif</h3>

                            <div id="chart-tujuan-depan" style="height: 340px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                        <div class="white-box">
                            <h3 class="box-title">Banyak Perjalanan Menurut Bidang Tahun @if (Session::has('tahun_anggaran')) {{Session::get('tahun_anggaran')}} @endif</h3>

                            <div id="chart-bidang-depan" style="height: 340px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Top 10 Pegawai dengan Total Biaya Terbanyak Tahun @if (Session::has('tahun_anggaran')) {{Session::get('tahun_anggaran')}} @endif</h3>

                            <div id="chart-peg-top10" style="height: 340px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Banyak Perjalanan dan Total Biaya Perbulan Tahun @if (Session::has('tahun_anggaran')) {{Session::get('tahun_anggaran')}} @endif</h3>

                            <div id="chart-bulan-depan" style="height: 340px;"></div>
                        </div>
                    </div>
                </div>

            </div>
@endsection
