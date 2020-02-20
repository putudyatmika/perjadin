@php
    $tgl_kuitansi = explode('-',$dataTransaksi[0]->Kuitansi->tgl_kuitansi);
    $bln_kuitansi = (int)($tgl_kuitansi[1]);
    $tanggal_kuitansi = (int)($tgl_kuitansi[2]) .' '.$Bulan[$bln_kuitansi].' '.$tgl_kuitansi[0];

    $tgl_surat = explode('-',$dataTransaksi[0]->SuratTugas->tgl_surat);
    $bln_surat = (int)($tgl_surat[1]);
    $tanggal_surat = (int)($tgl_surat[2]) .' '.$Bulan[$bln_surat].' '.$tgl_surat[0];

    $tgl_brkt = explode('-',$dataTransaksi[0]->tgl_brkt);
    $tgl_balik = explode('-',$dataTransaksi[0]->tgl_balik);

    $bln_brkt = (int)($tgl_brkt[1]);
    $bln_balik = (int)($tgl_balik[1]);

    $tgl_berangkat = (int)($tgl_brkt[2]) .' '.$Bulan[$bln_brkt].' '.$tgl_brkt[0];
    $tgl_blk = (int)($tgl_balik[2]) .' '.$Bulan[$bln_balik].' '.$tgl_balik[0];
    $no=1;
@endphp
<div class="text-center namakuitansi" style="margin-bottom:30px;">
    <h2><b>DAFTAR RINCIAN PERJALANAN DINAS</b></h2>
</div>
<table width="100%">
    <tr>
        <td width="25%">Lampiran SPD Nomor</td>
        <td width="5%">:</td>
        <td width="70%">{{$dataTransaksi[0]->Spd->nomor_spd}}</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{$tanggal_surat}}</td>
    </tr>
</table>
<div class="tabeldrpd" style="margin-top:20px;margin-bottom:20px;">
<table width="100%">
    <tr height="60px" class="adagaris text-center">
        <td width="5%">No</td>
        <td width="57%" class="gariskiri">Rincian Biaya</td>
        <td width="13%" class="gariskiri">Jumlah <br /> (Rp.)</td>
        <td width="25%" class="gariskiri">Keterangan</td>
    </tr>
    <tr>
        <td valign="top" class="text-center">1.</td>
        <td class="gariskiri">Biaya perjalanan dinas dalam rangka {{$dataTransaksi[0]->tugas}} dari Mataram ke {{$dataTransaksi[0]->Matrik->Tujuan->nama_kabkota}} selama {{$dataTransaksi[0]->bnyk_hari}} ({{strtolower($Bilangan[$dataTransaksi[0]->bnyk_hari])}}) Hari dari tanggal  {{$tgl_berangkat}} s/d {{$tgl_blk}}, dengan rincian sebagai berikut :
            </td>
        <td class="gariskiri">&nbsp;</td>
        <td class="gariskiri">&nbsp;</td>
    </tr>
    <tr height="40px">
        <td></td>
        <td class="gariskiri">1. Uang Harian Selama {{$dataTransaksi[0]->Kuitansi->harian_lama}} ({{strtolower($Bilangan[$dataTransaksi[0]->Kuitansi->harian_lama])}}) Hari @ @rupiah($dataTransaksi[0]->Kuitansi->harian_rupiah)</td>
        <td class="gariskiri text-right" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->harian_total)</td>
        <td class="gariskiri"></td>
    </tr>
    @if ($dataTransaksi[0]->Kuitansi->hotel_flag==1 and $dataTransaksi[0]->Kuitansi->hotel_lama>0)
    @php
        $no = $no + 1;
    @endphp
    <tr height="40px">
            <td></td>
            <td class="gariskiri">{{$no}}. Penginapan selama {{$dataTransaksi[0]->Kuitansi->hotel_lama}} ({{strtolower($Bilangan[$dataTransaksi[0]->Kuitansi->hotel_lama])}}) malam @ @rupiah($dataTransaksi[0]->Kuitansi->hotel_rupiah)</td>
            <td class="gariskiri text-right" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->hotel_total)</td>
            <td class="gariskiri"></td>
    </tr>
    @endif
    @if ($dataTransaksi[0]->Kuitansi->transport_flag==1)
    @php
        $no = $no + 1;
    @endphp
    <tr height="40px">
            <td></td>
            <td class="gariskiri">{{$no}}. {{$dataTransaksi[0]->Kuitansi->transport_ket}}</td>
            <td class="gariskiri text-right" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->transport_rupiah)</td>
            <td class="gariskiri"></td>
    </tr>
    @endif
    <tr height="40px">
        <td class="adagaris">&nbsp;</td>
        <td class="gariskiri adagaris">{{$no+1}}. Pengeluaran Rill</td>
        <td class="gariskiri text-right adagaris" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->rill_total)</td>
        <td class="gariskiri"></td>
    </tr>
    <tr height="40px">
        <td></td>
        <td class="text-center">JUMLAH</td>
        <td class="text-right gariskiri" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->total_biaya)</td>
        <td class="gariskiri">&nbsp;</td>
    </tr>
</table>
</div>
<div style="margin-top:20px;margin-bottom:20px;">
    <table width="100%">
        <tr height="40px">
            <td width="5%"></td>
            <td width="45%">Telah dibayar @rupiah($dataTransaksi[0]->Kuitansi->total_biaya)<br />
                {{Terbilang::kekata($dataTransaksi[0]->Kuitansi->total_biaya)}} rupiah</td>
            <td width="50%">Telah diterima jumlah uang sebesar @rupiah($dataTransaksi[0]->Kuitansi->total_biaya)<br />
                {{Terbilang::kekata($dataTransaksi[0]->Kuitansi->total_biaya)}} rupiah</td>
        </tr>
        <tr height="20px">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td>Bendahara Pengeluaran</td>
            <td>Yang Bertugas,</td>
        </tr>
        <tr height="70px">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td><u><b>{{strtoupper($dataTransaksi[0]->Kuitansi->bendahara_nama)}}</b></u></td>
            <td><u><b>{{strtoupper($dataTransaksi[0]->peg_nama)}}</b></u></td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td>NIP. {{$dataTransaksi[0]->Kuitansi->bendahara_nip}}</td>
            <td>NIP. {{$dataTransaksi[0]->peg_nip}}</td>
        </tr>
        <tr class="text-center" height="25px">
                <td colspan="3">&nbsp;</td>
            </tr>
        <tr class="text-center">
            <td colspan="3">PERHITUNGAN  SPPD RAMPUNG</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="padding-left:80px;">1. Ditetapkan Sejumlah</td>
            <td class="text-left">@rupiah($dataTransaksi[0]->Kuitansi->total_biaya)</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="padding-left:80px;">2. Dibayarkan Sejumlah</td>
            <td class="text-left">@rupiah($dataTransaksi[0]->Kuitansi->total_biaya)</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="padding-left:80px;">3. Kekurangan/Kelebihan</td>
            <td class="text-left">Rp. - </td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Mengetahui,</td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Pejabat Pembuat Komitmen</td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>BPS Provinsi Nusa Tenggara Barat</td>
        </tr>
        <tr height="80px">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="text-center">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><u><b>{{strtoupper($dataTransaksi[0]->Spd->ppk_nama)}}</b></u></td>
        </tr>
        <tr class="text-center">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>NIP. {{$dataTransaksi[0]->Spd->ppk_nip}}</td>
            </tr>
    </table>
</div>
<div class="text-right">
    <button id="cetak2" class="btn btn-default">Print</button>
</div>
