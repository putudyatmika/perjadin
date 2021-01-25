<table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
    <tr>
        <td width="50%" align="right"><span class="pull-right" style="margin-right:5px:text-align:right;">I.</span></td>
        <td width="17%">Berangkat dari</td>
        <td width="3%">:</td>
        <td width="30%">Mataram</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3">( tempat kedudukan )</td>

    </tr>
    <tr>
        <td></td>
        <td>Ke</td>
        <td>:</td>
        <td>{{$data->Matrik->MultiTujuan[0]->namakabkota_tujuan}}</td>
    </tr>
    <tr>
        <td></td>
        <td>Pada tanggal</td>
        <td>:</td>
        <td>{{ Tanggal::Panjang($data->tgl_brkt) }}</td>
    </tr>
    <tr>
            <td></td>
            <td></td>
            <td>&nbsp;</td>
            <td></td>
        </tr>
    <tr>
        <td></td>
        <td colspan="3">
                @if ($data->SuratTugas->flag_ttd>0)
                {{$FlagTTD[$data->SuratTugas->flag_ttd]}}
                @endif
                Kepala Badan Pusat Statistik
                <br />
                Provinsi Nusa Tenggara Barat
                <br />
                @if ($data->SuratTugas->flag_ttd>0)
                {{$data->SuratTugas->ttd_jabatan}}
                @endif
                <p style="margin-top:40pt;"><b>{{strtoupper($data->SuratTugas->ttd_nama)}}</b></p>
        </td>
    </tr>
</table>
<div class="spdhal2">
    <table width="100%" cellpadding="0" cellspacing="0" class="pad5px" style="line-height: normal;">
        <tr>
            <td width="3%" valign="top" class="garis-t garis-l"><span class="text-center">II.</span></td>
            <td width="45%" valign="top" class="garis-t garis-r">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="30%" style="padding:0px !important">Tiba di</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="66%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[0]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                            <td style="padding:0px !important">Pada tanggal</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">{{ Tanggal::Panjang($data->tgl_brkt) }}</td>
                        </tr>
                </table>
            </td>
            <td width="52%" valign="top" class="garis-t garis-r">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="36%" style="padding:0px !important">Berangkat dari</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="60%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[0]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Ke</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">{{$data->Matrik->MultiTujuan[1]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Pada tanggal</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">{{ Tanggal::Panjang(\Carbon\Carbon::parse($data->tgl_brkt)->addDays(2)) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="garis-l"></td>
            <td class="garis-r" height="110px">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left">
                Kepala Badan Pusat Statistik
                <br>
                {{$data->Matrik->MultiTujuan[0]->namakabkota_tujuan}}
                <br />
                </span>
                <p style="margin-top:40pt;">
                <b>{{strtoupper($data->Matrik->MultiTujuan[0]->Tujuan->kepala)}}</b>
                </p>
                @endif
            </td>
            <td class="garis-r">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left">
                    Kepala Badan Pusat Statistik
                    <br>
                    {{$data->Matrik->MultiTujuan[0]->namakabkota_tujuan}}
                    <br />
                    </span>
                    <p style="margin-top:40pt;">
                    <b>{{strtoupper($data->Matrik->MultiTujuan[0]->Tujuan->kepala)}}</b>
                    </p>
                @endif
            </td>
        </tr>
        <tr>
            <td valign="top" class="garis-t garis-l"><span class="text-center">III.</span></td>
            <td valign="top" class="garis-t garis-r">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="30%" style="padding:0px !important">Tiba di</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="66%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[1]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                            <td style="padding:0px !important">Pada tanggal</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">{{ Tanggal::Panjang(\Carbon\Carbon::parse($data->tgl_brkt)->addDays(2)) }}</td>
                        </tr>
                </table>
            </td>
            <td valign="top" class="garis-t garis-r">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="36%" style="padding:0px !important">Berangkat dari</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="60%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[1]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Ke</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">{{$data->Matrik->MultiTujuan[2]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Pada tanggal</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">{{ Tanggal::Panjang(\Carbon\Carbon::parse($data->tgl_brkt)->addDays(3)) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="garis-l"></td>
            <td class="garis-r" height="110px">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left">
                Kepala Badan Pusat Statistik
                <br>
                {{$data->Matrik->MultiTujuan[1]->namakabkota_tujuan}}
                <br />
                </span>
                <p style="margin-top:40pt;">
                <b>{{strtoupper($data->Matrik->MultiTujuan[1]->Tujuan->kepala)}}</b>
                </p>
                @endif
            </td>
            <td class="garis-r">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left">
                    Kepala Badan Pusat Statistik
                    <br>
                    {{$data->Matrik->MultiTujuan[1]->namakabkota_tujuan}}
                    <br />
                    </span>
                    <p style="margin-top:40pt;">
                    <b>{{strtoupper($data->Matrik->MultiTujuan[1]->Tujuan->kepala)}}</b>
                    </p>
                @endif
            </td>
        </tr>
        <tr>
                <td valign="top" class="garis-t garis-l"><span class="text-center">IV.</span></td>
                <td valign="top" class="garis-t garis-r">
                    <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                        <tr>
                            <td width="30%" style="padding:0px !important">Tiba di</td>
                            <td width="4%" style="padding:0px !important">:</td>
                            <td width="66%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[2]->namakabkota_tujuan}}</td>
                        </tr>
                        <tr>
                                <td style="padding:0px !important">Pada tanggal</td>
                                <td style="padding:0px !important">:</td>
                                <td style="padding:0px !important">{{ Tanggal::Panjang(\Carbon\Carbon::parse($data->tgl_brkt)->addDays(3)) }}</td>
                            </tr>
                    </table>
                </td>
                <td valign="top" class="garis-t garis-r">
                    <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                        <tr>
                            <td width="36%" style="padding:0px !important">Berangkat dari</td>
                            <td width="4%" style="padding:0px !important">:</td>
                            <td width="60%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[2]->namakabkota_tujuan}}</td>
                        </tr>
                        <tr>
                            <td style="padding:0px !important">Ke</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">{{$data->Matrik->MultiTujuan[3]->namakabkota_tujuan}}</td>
                        </tr>
                        <tr>
                            <td style="padding:0px !important">Pada tanggal</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">{{ Tanggal::Panjang(\Carbon\Carbon::parse($data->tgl_brkt)->addDays(4)) }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="garis-l"></td>
                <td class="garis-r" height="110px">
                    @if ($data->Spd->flag_cetak_tujuan==0)
                    <span class="text-left">
                    Kepala Badan Pusat Statistik
                    <br>
                    {{$data->Matrik->MultiTujuan[2]->namakabkota_tujuan}}
                    <br />
                    </span>
                    <p style="margin-top:40pt;">
                    <b>{{strtoupper($data->Matrik->MultiTujuan[2]->Tujuan->kepala)}}</b>
                    </p>
                    @endif
                </td>
                <td class="garis-r">
                    @if ($data->Spd->flag_cetak_tujuan==0)
                    <span class="text-left">
                        Kepala Badan Pusat Statistik
                        <br>
                        {{$data->Matrik->MultiTujuan[2]->namakabkota_tujuan}}
                        <br />
                        </span>
                        <p style="margin-top:40pt;">
                        <b>{{strtoupper($data->Matrik->MultiTujuan[2]->Tujuan->kepala)}}</b>
                        </p>
                    @endif
                </td>
        </tr>
        <tr>
            <td valign="top" class="garis-t garis-l"><span class="text-center">V.</span></td>
            <td valign="top" class="garis-t garis-r">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="30%" style="padding:0px !important">Tiba di</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="66%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[3]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                            <td style="padding:0px !important">Pada tanggal</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">{{ Tanggal::Panjang(\Carbon\Carbon::parse($data->tgl_brkt)->addDays(4)) }}</td>
                        </tr>
                </table>
            </td>
            <td valign="top" class="garis-t garis-r">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="36%" style="padding:0px !important">Berangkat dari</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="60%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[3]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Ke</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">
                            @if (count($data->Matrik->MultiTujuan) > 4)
                                {{$data->Matrik->MultiTujuan[4]->namakabkota_tujuan}}
                            @else
                                Mataram
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Pada tanggal</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">{{ Tanggal::Panjang(\Carbon\Carbon::parse($data->tgl_brkt)->addDays(5)) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="garis-l garis-b"></td>
            <td class="garis-r garis-b" height="110px">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left">
                Kepala Badan Pusat Statistik
                <br>
                {{$data->Matrik->MultiTujuan[3]->namakabkota_tujuan}}
                <br />
                </span>
                <p style="margin-top:40pt;">
                <b>{{strtoupper($data->Matrik->MultiTujuan[3]->Tujuan->kepala)}}</b>
                </p>
                @endif
            </td>
            <td class="garis-r garis-b">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left">
                    Kepala Badan Pusat Statistik
                    <br>
                    {{$data->Matrik->MultiTujuan[3]->namakabkota_tujuan}}
                    <br />
                    </span>
                    <p style="margin-top:40pt;">
                    <b>{{strtoupper($data->Matrik->MultiTujuan[3]->Tujuan->kepala)}}</b>
                    </p>
                @endif
            </td>
        </tr>
    
    </table>
</div>