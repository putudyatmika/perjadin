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
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="{{url('transaksi')}}" class="waves-effect"><i data-icon="Q" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu" >Matrik Transaksi</span></a> </li>
                    <li> <a href="#" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu">Transaksi <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{url('surattugas')}}">Surat Tugas</a> </li>
                            <li> <a href="{{url('spd')}}">SPD</a> </li>
                            <li> <a href="{{url('kuitansi')}}">Kuitansi</a> </li>
                        </ul>
                    </li>

                    <li> <a href="forms.html" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Laporan<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="form-basic.html">Rekap pegawai</a></li>
                            <li><a href="form-layout.html">Rekap Bidang</a></li>
                            <li><a href="form-advanced.html">Rekap Transaksi</a></li>

                        </ul>
                    </li>
                    @if (Auth::user()->user_level>2)
                    <li class="nav-small-cap">--- Master Data</li>
                    <li> <a href="{{url('anggaran')}}" class="waves-effect"><i data-icon="Q" class="icon-people fa-fw"></i><span class="hide-menu" >Anggaran</span></a> </li>
                    <li> <a href="{{url('matrik')}}" class="waves-effect"><i data-icon="Q" class="icon-people fa-fw"></i><span class="hide-menu" >Matrik Perjalanan</span></a> </li>
                    <li> <a href="{{url('pegawai')}}" class="waves-effect"><i data-icon="Q" class="icon-people fa-fw"></i><span class="hide-menu" >Pegawai</span></a> </li>
                    <li> <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Data Dasar<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('golongan')}}">Pangkat/Golongan</a></li>
                            <li><a href="{{url('unitkerja')}}">Unitkerja</a></li>
                            </ul>
                    </li>
                    <li><a href="{{url('tujuan')}}" class="waves-effect"><i data-icon="Q" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu" >Tujuan</span></a> </li>
                    @endif
                    @if (Auth::user()->user_level>3)
                    <li><a href="{{url('user')}}" class="waves-effect"><i data-icon="Q" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu" >User</span></a> </li>
                    @endif
                    <li class="nav-small-cap">--- Quit</li>
                    <li><a href="{{route('logout')}}" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>

                </ul>
            </div>
        </div>
