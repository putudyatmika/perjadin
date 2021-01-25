<table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
    <tr>
        <td width="50%" align="right"><span class="pull-right" style="margin-right:5px:text-align:right;">&nbsp;</span></td>
        <td width="17%">&nbsp;</td>
        <td width="3%"></td>
        <td width="30%">&nbsp;</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3">&nbsp;</td>

    </tr>
    <tr>
        <td></td>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>&nbsp;</td>
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
                &nbsp;
                <p style="margin-top:40pt;">&nbsp;</p>
        </td>
    </tr>
</table>
<div class="spdhal2">
    <table width="100%" cellpadding="0" cellspacing="0" class="pad5px" style="line-height: normal;">
        <tr>
            <td width="3%" valign="top" class="garis-t garis-l"><span class="text-center">VI.</span></td>
            <td width="45%" valign="top" class="garis-t garis-r">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="30%" style="padding:0px !important">Tiba di</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="66%" style="padding:0px !important">
                            @if (count($data->Matrik->MultiTujuan) > 4)
                            {{$data->Matrik->MultiTujuan[4]->namakabkota_tujuan}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                            <td style="padding:0px !important">Pada tanggal</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">
                                @if (count($data->Matrik->MultiTujuan) > 4)
                                {{ Tanggal::Panjang(\Carbon\Carbon::parse($data->tgl_brkt)->addDays(5)) }}
                                @endif
                            </td>
                        </tr>
                </table>
            </td>
            <td width="52%" valign="top" class="garis-t garis-r">
                <table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
                    <tr>
                        <td width="36%" style="padding:0px !important">Berangkat dari</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="60%" style="padding:0px !important">
                            @if (count($data->Matrik->MultiTujuan) > 4)
                                {{$data->Matrik->MultiTujuan[4]->namakabkota_tujuan}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Ke</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">
                            @if (count($data->Matrik->MultiTujuan) > 4)
                            Mataram
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Pada tanggal</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">
                            @if (count($data->Matrik->MultiTujuan) > 4)
                                {{ Tanggal::Panjang($data->tgl_balik) }}
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="garis-l"></td>
            <td class="garis-r" height="110px">
                @if (count($data->Matrik->MultiTujuan) > 4)
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left">
                Kepala Badan Pusat Statistik
                <br>
                {{$data->Matrik->MultiTujuan[4]->namakabkota_tujuan}}
                <br />
                </span>
                <p style="margin-top:40pt;">
                <b>{{strtoupper($data->Matrik->MultiTujuan[4]->Tujuan->kepala)}}</b>
                </p>
                @endif
                @endif
            </td>
            <td class="garis-r">
                @if (count($data->Matrik->MultiTujuan) > 4)
                @if ($data->Spd->flag_cetak_tujuan==0)
                <span class="text-left">
                    Kepala Badan Pusat Statistik
                    <br>
                    {{$data->Matrik->MultiTujuan[4]->namakabkota_tujuan}}
                    <br />
                    </span>
                    <p style="margin-top:40pt;">
                    <b>{{strtoupper($data->Matrik->MultiTujuan[4]->Tujuan->kepala)}}</b>
                    </p>
                @endif
                @endif
            </td>
    </tr>
        <tr>
            <td valign="top" class="garis-t garis-l"><span class="text-center">VII.</span></td>
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
                        <td width="36%" style="padding:0px !important">Berangkat dari</td>
                        <td width="4%" style="padding:0px !important">:</td>
                        <td width="60%" style="padding:0px !important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Ke</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="padding:0px !important">Pada tanggal</td>
                        <td style="padding:0px !important">:</td>
                        <td style="padding:0px !important">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="garis-l"></td>
            <td class="garis-r"></td>
            <td class="garis-r">&nbsp;</td>
        </tr>

        <tr>
                <td valign="top" class="garis-t garis-l"><span class="text-center">VIII.</span></td>
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
                            <td width="36%" style="padding:0px !important">Berangkat dari</td>
                            <td width="4%" style="padding:0px !important">:</td>
                            <td width="60%" style="padding:0px !important">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding:0px !important">Ke</td>
                            <td style="padding:0px !important">:</td>
                            <td style="padding:0px !important">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding:0px !important">Pada tanggal</td>
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
            <td valign="top" class="garis-t garis-l"><span class="text-center">IX.</span></td>
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
                    <span class="text-left">
                        Telah diperiksa dengan keterangan bahwa Perjalanan tersebut atas perintahnya dan semata - mata untuk kepentingan jabatan dalam waktu yang sesingkat - singkatnya.
                        </span>
            </td>
        </tr>
        
        <tr>
            <td class="garis-l"></td>
            <td class="garis-r">
                Pejabat Pembuat Komitmen


                <p style="margin-top:40pt;">
                <b>{{strtoupper($data->Spd->ppk_nama)}}</b>
                </p>
            </td>
            <td class="garis-r">
                    Pejabat Pembuat Komitmen


                    <p style="margin-top:40pt;">
                    <b>{{strtoupper($data->Spd->ppk_nama)}}</b>
                    </p>
            </td>
        </tr>
        <tr>
            <td class="garis-t garis-l"><span class="text-center">X.</span></td>
            <td colspan="2" class="garis-t garis-r">CATATAN LAIN - LAIN :</td>
        </tr>
        <tr>
            <td valign="top" class="garis-t garis-l garis-b"><span class="text-center">XI.</span></td>
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