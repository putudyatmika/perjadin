<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/aladin.png') }}">
    <title>Login - Aplikasi Perjalanan Dinas (Aladin)</title>
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
    <section id="wrapper" class="login-register">
        <div class="login-box login-sidebar">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" method="post" action="{{ route('login') }}">
                    <a href="javascript:void(0)" class="text-center db"><img src="{{asset('img/logo-bps2.png')}}" alt="Home" /></a>
                    <h4 class="text-center"><b><i>BADAN PUSAT STATISTIK<br />PROVINSI NUSA TENGGARA BARAT</i></b></h4>
                    
                    <h4 class="text-center" style="margin-top:20px;"><img src="{{ asset('img/aladin-logo-teks.png')}}" alt="home" /> <br />APLIKASI PERJALANAN DINAS</h4>
                    @csrf
                    <div class="form-group m-t-40 {{ $errors->has('username') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" placeholder="Username" id="username" name="username" value="{{ old('username') }}" autofocus>
                        </div>
                        @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <select name="tahun_anggaran" class="form-control" required="">
                                <option value="">Tahun Anggaran</option>
                                @foreach ($dataTahunDasar as $item)
                                    <option value="{{$item->tahun}}" @if ($item->tahun==date('Y'))
                                        selected
                                    @endif>{{$item->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><i class="fa fa-sign-in"></i> MASUK</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{route('cari.srt')}}" class="btn btn-primary btn-rounded">CARI SURAT TUGAS</a>
                        </div>
                    </div>
                </form>

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
