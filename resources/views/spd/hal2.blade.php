@php
    $tgl_brkt = explode('-',$dataTransaksi[0]->tgl_brkt);
    $tgl_balik = explode('-',$dataTransaksi[0]->tgl_balik);

    $bln_brkt = (int)($tgl_brkt[1]);
    $bln_balik = (int)($tgl_balik[1]);

    $tgl_surat = explode('-',$dataTransaksi[0]->SuratTugas->tgl_surat);
    $bln_surat = (int)($tgl_surat[1]);

    $tgl_berangkat = (int)($tgl_brkt[2]) .' '.$Bulan[$bln_brkt].' '.$tgl_brkt[0];
    $tgl_blk = (int)($tgl_balik[2]) .' '.$Bulan[$bln_balik].' '.$tgl_balik[0];
    $tanggal_surat = (int)($tgl_surat[2]) .' '.$Bulan[$bln_surat].' '.$tgl_surat[0];
@endphp
<table width="100%">
    <tr>
        <td width="50%"><span class="pull-right" style="margin-right:5px">I.</span></td>
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
        <td>{{$dataTransaksi[0]->Matrik->Tujuan->nama_kabkota}}</td>
    </tr>
    <tr>
        <td></td>
        <td>Pada tanggal</td>
        <td>:</td>
        <td>{{ $tgl_berangkat }}</td>
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
                @if ($dataTransaksi[0]->SuratTugas->flag_ttd>0)
                {{$FlagTTD[$dataTransaksi[0]->SuratTugas->flag_ttd]}}
                @endif
                Kepala Badan Pusat Statistik
                <br />
                Provinsi Nusa Tenggara Barat
                <br />
                @if ($dataTransaksi[0]->SuratTugas->flag_ttd>0)
                {{$dataTransaksi[0]->SuratTugas->ttd_jabatan}}
                @endif
                <p style="margin-top:40pt;">{{$dataTransaksi[0]->SuratTugas->ttd_nama}}</p>
        </td>
    </tr>
</table>
<div class="spdhal2">
    <table width="100%">
        <tr>
            <td width="3%" valign="top"><span class="text-center">II.</span></td>
            <td width="45%" valign="top">
                <table width="100%" class="isi">
                    <tr>
                        <td width="30%">Tiba di</td>
                        <td width="4%">:</td>
                        <td width="66%">{{$dataTransaksi[0]->Matrik->Tujuan->nama_kabkota}}</td>
                    </tr>
                    <tr>
                            <td>Pada tanggal</td>
                            <td>:</td>
                            <td>{{ $tgl_berangkat }}</td>
                        </tr>
                </table>
            </td>
            <td width="52%" valign="top" class="gariskiri">
                <table width="100%" class="isi">
                    <tr>
                        <td width="36%">Berangkat dari</td>
                        <td width="4%">:</td>
                        <td width="60%">{{$dataTransaksi[0]->Matrik->Tujuan->nama_kabkota}}</td>
                    </tr>
                    <tr>
                        <td>Ke</td>
                        <td>:</td>
                        <td>Mataram</td>
                    </tr>
                    <tr>
                        <td>Pada tanggal</td>
                        <td>:</td>
                        <td>{{ $tgl_blk }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="gariskiri">&nbsp;</td>
        </tr>
        <tr class="adagaris">
            <td></td>
            <td>
                <span class="text-left">
                Kepala Badan Pusat Statistik
                <br>
                {{$dataTransaksi[0]->Matrik->Tujuan->nama_kabkota}}
                <br />
                </span>
                <p style="margin-top:40pt;">
                <b>{{$dataTransaksi[0]->Matrik->Tujuan->kepala}}</b>
                </p>
            </td>
            <td class="gariskiri"> <span class="text-left">
                    Kepala Badan Pusat Statistik
                    <br>
                    {{$dataTransaksi[0]->Matrik->Tujuan->nama_kabkota}}
                    <br />
                    </span>
                    <p style="margin-top:40pt;">
                    <b>{{$dataTransaksi[0]->Matrik->Tujuan->kepala}}</b>
                    </p></td>
        </tr>
        <tr height="140px">
            <td valign="top"><span class="text-center">III.</span></td>
            <td valign="top">
                <table width="100%" class="isi">
                    <tr>
                        <td width="30%">Tiba di</td>
                        <td width="4%">:</td>
                        <td width="66%">&nbsp;</td>
                    </tr>
                    <tr>
                            <td>Pada tanggal</td>
                            <td>:</td>
                            <td>&nbsp;</td>
                        </tr>
                </table>
            </td>
            <td class="gariskiri" valign="top">
                <table width="100%" class="isi">
                    <tr>
                        <td width="36%">Berangkat dari</td>
                        <td width="4%">:</td>
                        <td width="60%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Ke</td>
                        <td>:</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Pada tanggal</td>
                        <td>:</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="adagaris">
            <td></td>
            <td></td>
            <td class="gariskiri">&nbsp;</td>
        </tr>

        <tr height="130px">
                <td valign="top"><span class="text-center">IV.</span></td>
                <td valign="top">
                    <table width="100%" class="isi">
                        <tr>
                            <td width="30%">Tiba di</td>
                            <td width="4%">:</td>
                            <td width="66%">&nbsp;</td>
                        </tr>
                        <tr>
                                <td>Pada tanggal</td>
                                <td>:</td>
                                <td>&nbsp;</td>
                            </tr>
                    </table>
                </td>
                <td class="gariskiri" valign="top">
                    <table width="100%" class="isi">
                        <tr>
                            <td width="36%">Berangkat dari</td>
                            <td width="4%">:</td>
                            <td width="60%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Ke</td>
                            <td>:</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Pada tanggal</td>
                            <td>:</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        <tr class="adagaris">
            <td></td>
            <td></td>
            <td class="gariskiri"> &nbsp;</td>
        </tr>
            <!--ppk ttd--->
        <tr>
            <td valign="top"><span class="text-center">V.</span></td>
            <td valign="top">
                <table width="100%" class="isi">
                    <tr>
                        <td width="35%">Tiba kembali di</td>
                        <td width="4%">:</td>
                        <td width="61%">Mataram</td>
                    </tr>
                    <tr>
                        <td colspan="3">( Tempat kedudukan )</td>

                    </tr>
                    <tr>
                            <td>Pada tanggal</td>
                            <td>:</td>
                            <td>{{ $tgl_blk }}</td>
                    </tr>
                </table>
            </td>
            <td class="gariskiri" valign="top">
                    <span class="text-left">
                        Telah diperiksa dengan keterangan bahwa Perjalanan tersebut atas perintahnya dan semata - mata untuk kepentingan jabatan dalam waktu yang sesingkat - singkatnya.
                        </span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="gariskiri">&nbsp;</td>
        </tr>
        <tr class="adagaris">
            <td></td>
            <td>
                Pejabat Pembuat Komitmen


                <p style="margin-top:40pt;">
                <b>{{$dataTransaksi[0]->Spd->ppk_nama}}</b>
                </p>
            </td>
            <td class="gariskiri">
                    Pejabat Pembuat Komitmen


                    <p style="margin-top:40pt;">
                    <b>{{$dataTransaksi[0]->Spd->ppk_nama}}</b>
                    </p>
            </td>
        </tr>
        <tr class="adagaris">
            <td><span class="text-center">VI.</span></td>
            <td colspan="2">CATATAN LAIN - LAIN :</td>
        </tr>
        <tr>
            <td valign="top"><span class="text-center">VII.</span></td>
            <td colspan="2">
                <table width="100%">
                    <tr>
                        <td width="12%" valign="top">PERHATIAN</td>
                        <td width="3%" valign="top">:</td>
                        <td>PPK yang menerbitkan SPD, Pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat / tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan - peraturan keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian dan kealpaannya.
                            </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</div>
<div class="text-right">
    <button id="cetak2" class="btn btn-default">Print</button>
</div>
