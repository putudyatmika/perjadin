<div class="text-center namakuitansi" style="margin-bottom:30px;">
    <h2><b>DAFTAR RINCIAN PERJALANAN DINAS</b></h2>
</div>
<table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
    <tr>
        <td width="25%">Lampiran SPD Nomor</td>
        <td width="5%">:</td>
        <td width="70%">{{$data->Spd->nomor_spd}}</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{Tanggal::Panjang($data->SuratTugas->tgl_surat)}}</td>
    </tr>
</table>

<table width="100%" class="pad5px" cellpadding="0" cellspacing="0" style="line-height: 1.5em;margin-top:10px;margin-bottom:10px;">
    <tr class="text-center semuagaris">
        <td width="5%" height="45px">No</td>
        <td width="60%">Rincian Biaya</td>
        <td width="13%">Jumlah <br /> (Rp.)</td>
        <td width="22%">Keterangan</td>
    </tr>
    <tr>
        <td class="garis-l" valign="top" align="center">1.</td>
        <td class="garis-l">Biaya perjalanan dinas dalam rangka {{$data->tugas}} dari Mataram ke {{$data->Matrik->Tujuan->nama_kabkota}} selama {{$data->bnyk_hari}} ({{strtolower($Bilangan[$data->bnyk_hari])}}) hari 
            @if ($data->bnyk_hari > 1)
            dari tanggal {{Tanggal::Panjang($data->tgl_brkt)}} s.d. {{Tanggal::Panjang($data->tgl_balik)}}@else
            tanggal {{Tanggal::Panjang($data->tgl_brkt)}}@endif, dengan rincian sebagai berikut :
            </td>
        <td class="garis-l">&nbsp;</td>
        <td class="garis-l garis-r">&nbsp;</td>
    </tr>
    <tr>
        <td class="garis-l" height="30px">&nbsp;</td>
        <td class="garis-l">1. Uang Harian Perjalanan selama {{$data->Kuitansi->harian_lama}} ({{strtolower($Bilangan[$data->Kuitansi->harian_lama])}}) hari @ @rupiah($data->Kuitansi->harian_rupiah)</td>
        <td class="garis-l" style="padding-right: 5pt !important;" align="right">@duit($data->Kuitansi->harian_total)</td>
        <td class="garis-l garis-r"></td>
    </tr>
    @php
        $no=1;
    @endphp
    @if ($data->Kuitansi->hotel_flag==1 and $data->Kuitansi->hotel_lama>0)
        @php
            $no = $no + 1;
        @endphp
        <tr>
                <td class="garis-l" height="30px"></td>
                <td class="garis-l">{{$no}}. 
                    @if ($data->Kuitansi->flag_jenisperjadin==1)
                    Penginapan selama {{$data->Kuitansi->hotel_lama}} ({{strtolower($Bilangan[$data->Kuitansi->hotel_lama])}}) malam 
                    @else 
                     Uang Harian  {{$data->Kuitansi->txt_jenisperjadin}} {{$data->Kuitansi->hotel_lama}} ({{strtolower($Bilangan[$data->Kuitansi->hotel_lama])}}) hari
                    @endif
                    
                    @ @rupiah($data->Kuitansi->hotel_rupiah)</td>
                <td class="garis-l" style="padding-right: 5pt !important;" align="right">@duit($data->Kuitansi->hotel_total)</td>
                <td class="garis-l garis-r"></td>
        </tr>
    @endif
    @if ($data->Kuitansi->transport_flag==1)
    @php
        $no = $no + 1;
    @endphp
    <tr>
            <td class="garis-l" height="30px"></td>
            <td class="garis-l" >{{$no}}. {{$data->Kuitansi->transport_ket}}</td>
            <td class="garis-l" style="padding-right: 5pt !important;" align="right">@duit($data->Kuitansi->transport_rupiah)</td>
            <td class="garis-l garis-r"></td>
    </tr>
    @endif
    <tr>
        <td class="garis-l" height="30px">&nbsp;</td>
        <td class="garis-l">{{$no+1}}. Pengeluaran Rill</td>
        <td class="garis-l" style="padding-right: 5pt !important;" align="right">@duit($data->Kuitansi->rill_total)</td>
        <td class="garis-l garis-r"></td>
    </tr>
    <tr>
        <td height="30px" class="garis-l garis-t garis-b"></td>
        <td class="garis-t garis-b" align="center"><b>JUMLAH</b></td>
        <td class="garis-l garis-t garis-b" style="padding-right: 5pt !important;" align="right">@duit($data->Kuitansi->total_biaya)</td>
        <td class="garis-l garis-r garis-b">&nbsp;</td>
    </tr>
</table>


<div style="margin-top:15px;margin-bottom:15px;">
    <table width="100%">
        <tr>
            <td width="5%" height="30px"></td>
            <td width="45%">Telah dibayar @rupiah($data->Kuitansi->total_biaya)<br />
                <i>{{Terbilang::kekata($data->Kuitansi->total_biaya)}} rupiah</i>
            </td>
            <td width="50%" style="padding:10px !important;">Telah diterima jumlah uang sebesar @rupiah($data->Kuitansi->total_biaya)<br />
                <i>{{Terbilang::kekata($data->Kuitansi->total_biaya)}} rupiah</i>
            </td>
        </tr>
        
        <tr class="text-center">
            <td>&nbsp;</td>
            <td>Bendahara Pengeluaran</td>
            <td>Yang Bertugas,</td>
        </tr>
        <tr>
            <td height="70px">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td><u><b>{{strtoupper($data->Kuitansi->bendahara_nama)}}</b></u></td>
            <td><u><b>{{strtoupper($data->peg_nama)}}</b></u></td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td>NIP. {{$data->Kuitansi->bendahara_nip}}</td>
            <td>NIP. {{$data->peg_nip}}</td>
        </tr>
        <tr class="text-center" >
                <td colspan="3" height="20px">&nbsp;</td>
            </tr>
        <tr class="text-center">
            <td colspan="3">PERHITUNGAN SPPD RAMPUNG</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="padding-left:80px;">1. Ditetapkan Sejumlah</td>
            <td class="text-left">@rupiah($data->Kuitansi->total_biaya)</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="padding-left:80px;">2. Dibayarkan Sejumlah</td>
            <td class="text-left">@rupiah($data->Kuitansi->total_biaya)</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="padding-left:80px;">3. Kekurangan/Kelebihan</td>
            <td class="text-left">Rp. - </td>
        </tr>
        <tr class="text-center" style="line-height: normal">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Mengetahui,</td>
        </tr>
        <tr class="text-center" style="line-height: normal">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Pejabat Pembuat Komitmen</td>
        </tr>
        <tr class="text-center" style="line-height: normal">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>BPS Provinsi Nusa Tenggara Barat</td>
        </tr>
        <tr>
            <td height="70px">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><u><b>{{strtoupper($data->Spd->ppk_nama)}}</b></u></td>
        </tr>
        <tr class="text-center">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>NIP. {{$data->Spd->ppk_nip}}</td>
            </tr>
    </table>
</div>