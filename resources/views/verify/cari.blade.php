<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/aladin.png')}}">
    <title>Aplikasi Perjalanan Dinas (Aladin) - BPS Provinsi NTB</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('tema/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tema/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('tema/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('tema/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('tema/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper">
        <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="white-box">
            <h3 class="text-center"><img src="{{ asset('img/aladin-logo-teks.png')}}" alt="home" /> <br />Aplikasi Perjalanan Dinas - BPS Provinsi NTB</h3>
            <form action="" method="get" class="text-center">
               <div>Pencarian surat tugas</div>
               KodeTrx : <input type="text" name="kode_trx" value="{{request('kode_trx')}}">
               <button class="btn btn-info" type="submit"><i class="fa fa-lup"></i> CARI</button>
            </form>
            @if (request('kode_trx'))
                <div class="text-center" style="margin-top:30px;">
                    @if ($dataTransaksi)
                        Trx ID : {{request('kode_trx')}} <br /> an. <b>{{$dataTransaksi->peg_nama}}</b> <br /> 
                        @if ($dataTransaksi->SuratTugas->flag_surattugas==0)
                            <span class="label label-inverse">{{$FlagSrt[$dataTransaksi->SuratTugas->flag_surattugas]}}</span>
                            @elseif($dataTransaksi->SuratTugas->flag_surattugas==1)
                            <span class="label label-success">{{$FlagSrt[$dataTransaksi->SuratTugas->flag_surattugas]}}</span>
                            @elseif($dataTransaksi->SuratTugas->flag_surattugas==2)
                            <span class="label label-info">{{$FlagSrt[$dataTransaksi->SuratTugas->flag_surattugas]}}</span>
                            @else
                            <span class="label label-danger">{{$FlagSrt[$dataTransaksi->SuratTugas->flag_surattugas]}}</span>
                            @endif
                        <div style="margin-top:20px;">
                        @if ($dataTransaksi->SuratTugas->flag_surattugas!=3)
                            <a href="{{route('view.trx',$dataTransaksi->kode_trx)}}" target="_blank" class="btn btn-success btn-sm"><span data-toggle="tooltip" title="View perjadin an. {{$dataTransaksi->peg_nama}}"><i class="fa fa-link"></i> View</span></a>
                        @endif
                        @if ($dataTransaksi->SuratTugas->nomor_surat!=NULL and $dataTransaksi->Spd->nomor_spd!=NULL and ($dataTransaksi->SuratTugas->flag_surattugas!=3 and $dataTransaksi->SuratTugas->flag_surattugas!=0) )
                        <a href="{{route('print.srt',$dataTransaksi->kode_trx)}}" target="_blank" class="btn btn-primary btn-sm"><span data-toggle="tooltip" title="Cetak kelengkapan perjadin an. {{$dataTransaksi->peg_nama}}"><i class="fa fa-print"></i> Cetak</span></a>

                        <a href="{{route('unduh.srt',$dataTransaksi->kode_trx)}}" target="_blank" class="btn btn-warning btn-sm"><span data-toggle="tooltip" title="Download kelengkapan perjadin an. {{$dataTransaksi->peg_nama}}"><i class="fa fa-download"></i> Unduh</span></a>
                        @endif
                        </div>
                    @else
                        Data transaksi {{request('kode_trx')}} <b>tidak tersedia</b>
                    @endif
                </div>
            @endif
            
        </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="{{ asset('tema/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('tema/bootstrap/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('tema/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tema/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js') }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('tema/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('tema/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('tema/js/waves.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('tema/js/custom.min.js') }}"></script>
    <!--Style Switcher -->
    <script src="{{ asset('tema/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>

</html>
