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
    $no=0;
@endphp
<div class="text-center namakuitansi" style="margin-bottom:30px;">
    <h2><b>DAFTAR PENGELUARAN RIIL</b></h2>
</div>
Yang bertanda tangan di bawah ini :
<table width="100%">
    <tr height="40px">
        <td width="10%">Nama</td>
        <td width="3%">:</td>
        <td width="87%">{{$dataTransaksi[0]->TabelPegawai->nama}}</td>
    </tr>
    <tr height="40px">
        <td>NIP</td>
        <td>:</td>
        <td>{{$dataTransaksi[0]->TabelPegawai->nip_baru}}</td>
    </tr>
    <tr height="40px">
        <td>Jabatan</td>
        <td>:</td>
        <td>
            @if ($dataTransaksi[0]->TabelPegawai->jabatan<4)
            Kepala {{$dataTransaksi[0]->TabelPegawai->Unitkerja->nama}}
            @else
            Staf {{$dataTransaksi[0]->TabelPegawai->Unitkerja->nama}}
            @endif
            BPS Provinsi NTB</td>
    </tr>
    <tr height="40px">
        <td colspan="3">Berdasarkan Surat Perjalanan Dinas (SPD) Nomor : {{$dataTransaksi[0]->Spd->nomor_spd}} Tanggal {{$tanggal_surat}} dengan ini kami menyatakan dengan sesungguhnya bahwa :
        </td>
    </tr>
</table>
<div class="tabel3dpr" style="margin-top:20px;">
    <table width="100%">
        <tr height="50px">
            <td width="5%" valign="top">1. </td>
            <td with="95%" valign="top">Biaya transport pegawai dan/atau biaya penginapan di bawah ini yang tidak diperoleh bukti-bukti pengeluarannya, meliputi :</td>
        </tr>
        <tr>
            <td valign="top"></td>
            <td>
                <table width="95%" style="margin-top:20px;margin-bottom:20px;">
                    <tr class="adagaris text-center" height="40px">
                        <td width="5%">No</td>
                        <td width="80%" class="gariskiri">Uraian</td>
                        <td width="15%" class="gariskiri">Jumlah <br />(Rp.)</td>
                    </tr>
                    @if ($dataTransaksi[0]->Kuitansi->transport_flag==0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr height="30px">
                            <td class="text-center">{{$no}}.</td>
                            <td class="gariskiri">{{$dataTransaksi[0]->Kuitansi->transport_ket}}</td>
                            <td class="gariskiri text-right" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->transport_rupiah)</td>
                    </tr>
                    @endif
                    @if ($dataTransaksi[0]->Kuitansi->hotel_flag==0 and $dataTransaksi[0]->Kuitansi->hotel_lama>0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr height="30px">
                            <td class="text-center">{{$no}}.</td>
                            <td class="gariskiri">Penginapan selama {{$dataTransaksi[0]->Kuitansi->hotel_lama}} ({{strtolower($Bilangan[$dataTransaksi[0]->Kuitansi->hotel_lama])}}) malam</td>
                            <td class="gariskiri text-right" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->hotel_total)</td>
                    </tr>
                    @endif
                    @if ($dataTransaksi[0]->Kuitansi->rill1_flag==1 and $dataTransaksi[0]->Kuitansi->rill1_rupiah>0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr height="30px">
                            <td class="text-center">{{$no}}.</td>
                            <td class="gariskiri">{{$dataTransaksi[0]->Kuitansi->rill1_ket}}</td>
                            <td class="gariskiri text-right" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->rill1_rupiah)</td>
                    </tr>
                    @endif
                    @if ($dataTransaksi[0]->Kuitansi->rill2_flag==1 and $dataTransaksi[0]->Kuitansi->rill2_rupiah>0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr height="30px">
                            <td class="text-center">{{$no}}.</td>
                            <td class="gariskiri">{{$dataTransaksi[0]->Kuitansi->rill2_ket}}</td>
                            <td class="gariskiri text-right" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->rill2_rupiah)</td>
                    </tr>
                    @endif
                    @if ($dataTransaksi[0]->Kuitansi->rill3_flag==1 and $dataTransaksi[0]->Kuitansi->rill3_rupiah>0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr height="30px">
                            <td class="text-center">{{$no}}.</td>
                            <td class="gariskiri">{{$dataTransaksi[0]->Kuitansi->rill3_ket}}</td>
                            <td class="gariskiri text-right" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->rill3_rupiah)</td>
                    </tr>
                    @endif
                    <tr height="30px" style="border-top:1px solid black !important;">
                        <td></td>
                        <td class="text-center">Jumlah</td>
                        <td class="gariskiri text-right" style="padding-right: 5pt !important;">@duit($dataTransaksi[0]->Kuitansi->rill_total)</td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr height="50px">
            <td valign="top">2. </td>
            <td valign="top">Jumlah uang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk atas pelaksanaan perjalanan dinas dimaksud dan apabila di kemudian hari terdapat kelebihan  pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke Kas Negara.</td>
        </tr>

        <tr height="40px">
            <td valign="top"></td>
            <td>Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</td>
        </tr>
    </table>
</div>
<div class="hal3dprbawah" style="margin-top:30px !important;">
    <table width="100%">
        <tr class="text-center">
            <td width="50%"></td>
            <td width="50%">Mataram, {{$tanggal_kuitansi}}</td>
        </tr>
        <tr class="text-center">
            <td>Mengetahui/Menyetujui</td>
            <td>Pejabat Negara/Pegawai Negeri</td>
        </tr>
        <tr class="text-center">
            <td>Pejabat Pembuat Komitmen,</td>
            <td>Yang Melakukan Perjalanan Dinas</td>
        </tr>
        <tr height="100px">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="text-center">
            <td><u><b>{{$dataTransaksi[0]->Spd->ppk_nama}}</b></u></td>
            <td><u><b>{{$dataTransaksi[0]->TabelPegawai->nama}}</b></u></td>
        </tr>
        <tr class="text-center">
            <td>NIP. {{$dataTransaksi[0]->Spd->ppk_nip}}</td>
            <td>NIP. {{$dataTransaksi[0]->TabelPegawai->nip_baru}}</td>
        </tr>
    </table>
</div>

<div class="text-right">
    <button id="cetak3" class="btn btn-default">Print</button>
</div>
