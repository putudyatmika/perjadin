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
        <td>{{$data->Matrik->Tujuan->nama_kabkota}}</td>
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
                <table  cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="36%" style="padding:0px 0px 0px 6px !important">Berangkat dari</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="60%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[0]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                        <td style="padding:0px 0px 0px 6px !important">Ke</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">{{$data->Matrik->MultiTujuan[1]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                        <td style="padding:0px 0px 0px 6px !important">Pada tanggal</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">{{ Tanggal::Panjang(\Carbon\Carbon::parse($data->tgl_brkt)->addDays(2)) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="garis-l"></td>
            <td class="garis-r" height="120px">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left pad5x">
                Kepala Badan Pusat Statistik
                <br>
                <span class="pad5x">{{$data->Matrik->MultiTujuan[0]->namakabkota_tujuan}}</span>
                <br />
                </span>
                <p class="pad5x" style="margin-top:50pt;">
                <b>{{strtoupper($data->Matrik->MultiTujuan[0]->Tujuan->kepala)}}</b>
                </p>
                @endif
            </td>
            <td class="garis-r">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left pad10px">
                    Kepala Badan Pusat Statistik
                    <br>
                    <span class="pad10px">{{$data->Matrik->MultiTujuan[0]->namakabkota_tujuan}}</span>
                    <br />
                    </span>
                    <p class="pad10px" style="margin-top:50pt;">
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
                        <td width="36%" style="padding:0px 0px 0px 6px !important">Berangkat dari</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="60%" style="padding:0px !important">{{$data->Matrik->MultiTujuan[1]->namakabkota_tujuan}}</td>
                    </tr>
                    <tr>
                        <td style="padding:0px 0px 0px 6px !important">Ke</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">Mataram</td>
                    </tr>
                    <tr>
                        <td style="padding:0px 0px 0px 6px !important">Pada tanggal</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">{{ Tanggal::Panjang($data->tgl_balik) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="garis-l"></td>
            <td class="garis-r" height="120px">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left pad5x">
                Kepala Badan Pusat Statistik
                <br>
                <span class="pad5x">{{$data->Matrik->MultiTujuan[1]->namakabkota_tujuan}}</span>
                <br />
                </span>
                <p class="pad5x" style="margin-top:50pt;">
                <b>{{strtoupper($data->Matrik->MultiTujuan[1]->Tujuan->kepala)}}</b>
                </p>
                @endif
            </td>
            <td class="garis-r">
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left pad10px">
                    Kepala Badan Pusat Statistik
                    <br>
                    <span class="pad10px">{{$data->Matrik->MultiTujuan[1]->namakabkota_tujuan}}</span>
                    <br />
                    </span>
                    <p class="pad10px" style="margin-top:50pt;">
                    <b>{{strtoupper($data->Matrik->MultiTujuan[1]->Tujuan->kepala)}}</b>
                    </p>
                @endif
            </td>
        </tr>

        <tr>
                <td valign="top" class="garis-t garis-l"><span class="text-center">IV.</span></td>
                <td valign="top" class="garis-t garis-r" height="130px">
                    <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                        <tr>
                            <td width="30%" style="padding:0px !important">Tiba di</td>
                            <td width="4%" style="padding:0px !important">:</td>
                            <td width="66%" style="padding:0px !important">&nbsp;</td>
                        </tr>
                        <tr>
                                <td style="padding:0px !important">Pada tanggal</td>
                                <td style="padding:0px !important">:</td>
                                <td style="padding:0px !important">&nbsp;</td>
                            </tr>
                    </table>
                </td>
                <td valign="top" class="garis-t garis-r">
                    <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                        <tr>
                            <td width="36%" style="padding:0px 0px 0px 6px !important">Berangkat dari</td>
                            <td width="4%" style="padding:0px !important">:</td>
                            <td width="60%" style="padding:0px !important">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding:0px 0px 0px 6px !important">Ke</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding:0px 0px 0px 6px !important">Pada tanggal</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        <tr>
            <td class="garis-l"></td>
            <td class="garis-r"></td>
            <td class="garis-r"> &nbsp;</td>
        </tr>
            <!--ppk ttd--->
        <tr>
            <td valign="top" class="garis-t garis-l"><span class="text-center">V.</span></td>
            <td valign="top" class="garis-t garis-r">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="35%" style="padding:0px !important">Tiba kembali di</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="61%" style="padding:0px !important">Mataram</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding:0px !important">( Tempat kedudukan )</td>

                    </tr>
                    <tr>
                            <td style="padding:0px !important">Pada tanggal</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">{{ Tanggal::Panjang($data->tgl_balik) }}</td>
                    </tr>
                </table>
            </td>
            <td valign="top" class="garis-t garis-r">
                    <div class="text-left pad10px">
                        Telah diperiksa dengan keterangan bahwa Perjalanan tersebut atas perintahnya dan semata - mata untuk kepentingan jabatan dalam waktu yang sesingkat - singkatnya.
                        </div>
            </td>
        </tr>
        
        <tr>
            <td class="garis-l"></td>
            <td class="garis-r">
                <span class="pad5x">Pejabat Pembuat Komitmen</span>
                <p class="pad5x" style="margin-top:40pt;">
                <b>{{strtoupper($data->Spd->ppk_nama)}}</b>
                </p>
            </td>
            <td class="garis-r">
                    <span class="pad10px">Pejabat Pembuat Komitmen</span>


                    <p class="pad10px" style="margin-top:40pt;">
                    <b>{{strtoupper($data->Spd->ppk_nama)}}</b>
                    </p>
            </td>
        </tr>
        <tr>
            <td class="garis-t garis-l"><span class="text-center">VI.</span></td>
            <td colspan="2" class="garis-t garis-r">CATATAN LAIN - LAIN :</td>
        </tr>
        <tr>
            <td valign="top" class="garis-t garis-l garis-b"><span class="text-center">VII.</span></td>
            <td colspan="2" class="garis-t garis-r garis-b">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="12%" valign="top" style="padding:0px !important">PERHATIAN</td>
                        <td width="3%" valign="top" style="padding:0px !important">:</td>
                        <td>PPK yang menerbitkan SPD, Pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat / tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan - peraturan keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian dan kealpaannya.
                            </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</div>