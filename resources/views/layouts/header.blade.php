<nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part hidden-xs">
                <a class="logo" href="{{url('')}}"><b><img src="{{ asset('img/perjadin-logo-putih.png')}}" alt="home" /></b><span class="hidden-xs"><img src="{{ asset('img/perjadin-text-kecil.png')}}" alt="home" /></span></a>

                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                        <li class="dropdown">
                                <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
                                @if (Auth::user()->user_level==3 and Auth::user()->pengelola>3)
                                <!--operator-->
                                    @if (Jumlah::SuratTugas(0,Session::get('tahun_anggaran'))>0)
                                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                                    @endif
                                @elseif (Auth::user()->pengelola !=0 and Auth::user()->pengelola!=4)
                                    @if (Jumlah::Pengajuan(Session::get('tahun_anggaran'))>0)
                                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                                    @endif
                                @endif
                                </a>
                                <ul class="dropdown-menu mailbox animated bounceInDown">
                                    <li>
                                        <div class="drop-title text-danger">
                                        @if (Auth::user()->user_level==3 and Auth::user()->pengelola>3)
                                        <!--operator-->
                                            @if (Jumlah::SuratTugas(0,Session::get('tahun_anggaran'))>0)
                                                Ada ({{Jumlah::SuratTugas(0,Session::get('tahun_anggaran'))}}) Perjadin disetujui
                                            @else
                                                Belum Ada Perjadin disetujui
                                            @endif
                                        @elseif (Auth::user()->pengelola !=0 and Auth::user()->pengelola!=4)
                                            @if (Jumlah::Pengajuan(Session::get('tahun_anggaran'))>0)
                                                Ada ({{Jumlah::Pengajuan(Session::get('tahun_anggaran'))}}) Pengajuan Perjadin
                                            @else
                                                Belum Ada Pengajuan Perjadin
                                            @endif
                                        @else
                                            Belum ada pesan
                                        @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            @if (Auth::user()->user_level==3 and Auth::user()->pengelola>3)
                                            <!--operator-->
                                                 @if (Jumlah::SuratTugas(0,Session::get('tahun_anggaran'))>0)
                                                    @foreach (Jumlah::Surat5Tugas(0,Session::get('tahun_anggaran')) as $item)
                                                    <a href="{{route('surattugas.index')}}">
                                                            <div class="mail-contnet">
                                                                <h5>{{$item->Transaksi->peg_nama}}</h5>
                                                            <span class="mail-desc">Perjalanan dinas ke {{$item->Transaksi->Matrik->Tujuan->nama_kabkota}} </span>
                                                            <span class="mail-desc">tanggal {{Tanggal::Panjang($item->Transaksi->tgl_brkt)}}</span> <span class="time">{{$item->updated_at->diffForHumans()}}</span>
                                                        </div>
                                                        </a>
                                                    @endforeach
                                                    @else
                                                    <a href="#">
                                                    <div class="mail-contnet"><span class="mail-desc">
                                                        Tidak ada pesan</span></div>
                                                    </a>
                                                @endif
                                            @elseif (Auth::user()->pengelola !=0 and Auth::user()->pengelola!=4)
                                                @if (Jumlah::Pengajuan(Session::get('tahun_anggaran'))>0)
                                                    @foreach (Jumlah::Ajuan5Perjadin(Session::get('tahun_anggaran')) as $item)
                                                    <a href="{{route('setuju.index')}}">
                                                            <div class="mail-contnet">
                                                                <h5>{{$item->peg_nama}}</h5>
                                                            <span class="mail-desc">Perjalanan dinas ke {{$item->Matrik->Tujuan->nama_kabkota}} </span>
                                                            <span class="mail-desc">tanggal {{Tanggal::Panjang($item->tgl_brkt)}}</span> <span class="time">{{$item->updated_at->diffForHumans()}}</span>
                                                        </div>
                                                        </a>
                                                    @endforeach
                                                @else
                                                <a href="#">
                                                <div class="mail-contnet"><span class="mail-desc">
                                                    Tidak ada pesan</span></div>
                                                </a>
                                                @endif

                                            @else
                                            <a href="#">
                                                    <div class="mail-contnet"><span class="mail-desc">
                                                        Tidak ada pesan</span></div>
                                                    </a>
                                            @endif
                                        </div>
                                    </li>
                                    @if (Auth::user()->pengelola !=0 and Auth::user()->pengelola!=4)
                                    <li>
                                        <a class="text-center" href="{{route('setuju.index')}}"> <strong>Lihat Pengajuan</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                    @endif
                                </ul>
                                <!-- /.dropdown-messages -->
                            </li>
                            <!-- /.dropdown -->
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ asset('img/bps-user.jpg')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <!--<li><a href="#"><i class="ti-user"></i> Lihat Profile</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>-->
                            <li><a href="#" data-toggle="modal" data-target="#GantiPasswordSendiri"><i class="ti-settings"></i> Ganti Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- .Megamenu -->

                    <!-- /.Megamenu -->

                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
