<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="{{asset('img/bps-user.png')}}" alt="user-img" class="img-circle"> <span class="hide-menu"> {{ Auth::user()->username }}<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <!--<li><a href="javascript:void(0)"><i class="ti-user"></i> Lihat Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>-->
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#GantiPasswordSendiri"><i class="ti-settings"></i> Ganti Password</a></li>
                            <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="{{url('')}}" class="waves-effect"><i class="icon-diamond fa-fw"></i><span class="hide-menu" >Dashboard</span></a> </li>

                    @if (Auth::user()->pengelola !=0 and Auth::user()->pengelola!=4)
                    <li class="nav-small-cap">--- Persetujuan</li>
                    <li> <a href="{{url('setuju')}}" class="waves-effect"><i class="icon-disc fa-fw"></i><span class="hide-menu" >Pengajuan</span>
                        @if (Jumlah::Pengajuan(Session::get('tahun_anggaran'))>0)
                        <span class="label label-rouded label-danger pull-right">{{Jumlah::Pengajuan(Session::get('tahun_anggaran'))}}</span>
                        @endif
                    </a>
                    </li>
                    @endif

                    <li class="nav-small-cap m-t-10">--- Operator Menu</li>
                    <li>
                        <a href="{{route('transaksi.kalendar')}}" class="waves-effect"><i data-icon="A" class="linea-icon linea-elaborate fa-fw"></i> <span class="hide-menu">Kalendar</span></a>
                    </li>
                    <li>
                        <a href="{{url('matrik')}}" class="waves-effect"><i class="icon-briefcase fa-fw"></i><span class="hide-menu" >Matrik</span></a>
                    </li>
                    <li>
                        <a href="{{route('permintaan.list')}}" class="waves-effect"><i class="icon-briefcase fa-fw"></i><span class="hide-menu" >Form-JLN</span></a>
                    </li>
                    <li>
                        <a href="{{url('transaksi')}}" class="waves-effect text-primary"><i class="icon-screen-desktop fa-fw"></i><span class="hide-menu" >Transaksi</span></a>
                    </li>
                    <li>
                        <a href="{{route('kelengkapan.list')}}" class="waves-effect text-success"><i class="icon-bag fa-fw"></i><span class="hide-menu" >Kelengkapan</span>
                            @if (Jumlah::SuratTugas(0,Session::get('tahun_anggaran'))>0)
                            <span class="label label-rouded label-info pull-right">{{Jumlah::SuratTugas(0,Session::get('tahun_anggaran'))}}</span>
                            @endif
                        </a>
                    </li>
                    <!--<li> <a href="{{url('surattugas')}}" class="waves-effect text-info"><i class="icon-directions fa-fw"></i><span class="hide-menu" >Surat Tugas</span>
                        @if (Jumlah::SuratTugas(0,Session::get('tahun_anggaran'))>0)
                            <span class="label label-rouded label-info pull-right">{{Jumlah::SuratTugas(0,Session::get('tahun_anggaran'))}}</span>
                        @endif
                    </a>
                    </li>
                    <li><a href="{{url('spd')}}" class="waves-effect text-danger"><i class="icon-book-open fa-fw"></i><span class="hide-menu">SPD</span>
                        @if (Jumlah::SPD(0,Session::get('tahun_anggaran'))>0)
                            <span class="label label-rouded label-danger pull-right">{{Jumlah::SPD(0,Session::get('tahun_anggaran'))}}</span>
                        @endif
                    </a></li>-->
                    <li><a href="{{url('kuitansi')}}" class="waves-effect"><i class="icon-calculator fa-fw"></i><span class="hide-menu" >Kuitansi</span>
                        @if (Jumlah::Kuitansi(0,Session::get('tahun_anggaran'))>0)
                        <span class="label label-rouded label-primary pull-right">{{Jumlah::Kuitansi(0,Session::get('tahun_anggaran'))}}</span>
                        @endif
                    </a></li>
                    <li> <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Laporan<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('lap_pegawai','')}}">Rekap pegawai</a></li>
                            <li><a href="{{route('laporan.bidang')}}">Rekap Bidang</a></li>
                            <li><a href="{{route('laporan.tujuan')}}">Rekap Tujuan</a></li>
                            <li><a href="{{route('laporan.anggaran')}}">Rekap Anggaran</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">--- Master Data</li>
                    <li> <a href="{{url('anggaran')}}" class="waves-effect"><i class="icon-support fa-fw"></i><span class="hide-menu" >Anggaran</span></a> </li>
                    <li> <a href="{{url('pegawai')}}" class="waves-effect"><i class="icon-user fa-fw"></i><span class="hide-menu" >Pegawai</span></a> </li>
                    <li><a href="{{url('tujuan')}}" class="waves-effect"><i class="icon-cursor fa-fw"></i><span class="hide-menu" >Tujuan</span></a> </li>
                    <li> <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Data Dasar<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('golongan')}}">Pangkat/Golongan</a></li>
                            <li><a href="{{url('unitkerja')}}">Unitkerja</a></li>
                            </ul>
                    </li>


                    @if (Auth::user()->user_level>3)
                    <li> <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">POK<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{route('pok.program')}}">Program</a></li>
                            <li><a href="{{route('pok.kegiatan')}}">Kegiatan</a></li>
                            <li><a href="{{route('pok.kro')}}">KRO</a></li>
                            <li><a href="{{route('pok.output')}}">Output</a></li>
                            <li><a href="{{route('pok.komponen')}}">Komponen</a></li>
                            <li><a href="{{route('pok.subkomponen')}}">Subkomponen</a></li>
                            <li><a href="{{route('pok.akun')}}">Akun</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('user')}}" class="waves-effect"><i class="icon-people fa-fw"></i><span class="hide-menu" >User</span></a> </li>
                    <li><a href="{{url('tahundasar')}}" class="waves-effect"><i class="icon-compass fa-fw"></i><span class="hide-menu" >Tahun Dasar</span></a> </li>
                    <li><a href="{{url('data')}}" class="waves-effect"><i class="icon-folder fa-fw"></i><span class="hide-menu" >Database</span></a> </li>
                    @endif
                    <li class="nav-small-cap">--- Quit</li>
                    <li><a href="{{route('logout')}}" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Logout</span></a></li>

                </ul>
            </div>
        </div>
