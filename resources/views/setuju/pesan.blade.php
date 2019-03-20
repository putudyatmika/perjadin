@section('pesan')
<li class="dropdown">
        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
        @if (Jumlah::Pengajuan()>0)
        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
        @endif
        </a>
        <ul class="dropdown-menu mailbox animated bounceInDown">
            <li>
                <div class="drop-title">
                    @if (Jumlah::Pengajuan()>0)
                        Ada {{Jumlah::Pengajuan()}} Pengajuan Perjadin
                    @else
                        Belum Ada Pengajuan Perjadin
                    @endif
                </div>
            </li>
            <li>
                <div class="message-center">
                    <a href="#">
                        <div class="user-img"> <img src="{{ asset('tema/plugins/images/users/pawandeep.jpg')}}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                    </a>
                    <a href="#">
                        <div class="user-img"> <img src="{{ asset('tema/plugins/images/users/sonu.jpg')}}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                    </a>
                    <a href="#">
                        <div class="user-img"> <img src="{{ asset('tema/plugins/images/users/arijit.jpg')}}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                    </a>

                </div>
            </li>
            <li>
                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
            </li>
        </ul>
        <!-- /.dropdown-messages -->
    </li>
    <!-- /.dropdown -->
    @endsection
