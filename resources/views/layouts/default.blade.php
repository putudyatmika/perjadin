<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('tema/plugins/images/favicon.png')}}">
    <title>Sistem Informasi Perjalanan Dinas - BPS Provinsi NTB</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('tema/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('tema/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('tema/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- page CSS -->
    <link href="{{ asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('tema/plugins/bower_components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('tema/plugins/bower_components/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('tema/plugins/bower_components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('tema/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{ asset('tema/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('tema/plugins/bower_components/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <!-- toast CSS -->
    <link href="{{ asset('tema/plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('tema/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('tema/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('tema/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('tema/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @section('css')

    @show
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        @include('layouts.header')
        <!-- Left navbar-header -->
        @include('layouts.sidebar')
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <!-- container-fluid -->
            @yield('content')
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; Bidang IPDS BPS Provinsi Nusa Tenggara Barat</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @include('layouts.gantipass')
    <!-- jQuery -->
    <script src="{{ asset('tema/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('tema/bootstrap/dist/js/tether.min.js')}}"></script>
    <script src="{{ asset('tema/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('tema/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js')}}"></script>
    <!--Morris JavaScript -->
    <script src="{{ asset('tema/plugins/bower_components/raphael/raphael-min.js')}}"></script>
    <script src="{{ asset('tema/plugins/bower_components/morrisjs/morris.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('tema/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('tema/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('tema/js/waves.js')}}"></script>
    <!--Counter js -->
    <script src="{{ asset('tema/plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
    <script src="{{ asset('tema/plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('tema/js/custom.min.js')}}"></script>
    <script src="{{ asset('tema/js/mask.js') }}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{{ asset('tema/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('tema/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{ asset('tema/plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{ asset('tema/plugins/bower_components/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{ asset('tema/plugins/bower_components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('tema/plugins/bower_components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('tema/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('tema/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('tema/plugins/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>


    <!--Style Switcher -->
    <script src="{{ asset('tema/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <script src="{{ asset('js/numberformat.js') }}"></script>
    @section('js')

    @show
</body>

</html>
