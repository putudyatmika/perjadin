@php
    $no=0;
@endphp
<div class="text-center namakuitansi" style="margin-bottom:30px;">
    <h2><b>DAFTAR PENGELUARAN RIIL</b></h2>
</div>
Yang bertanda tangan di bawah ini :
<table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
    <tr>
        <td height="40px" width="10%">Nama</td>
        <td width="3%">:</td>
        <td width="87%">{{strtoupper($data->peg_nama)}}</td>
    </tr>
    <tr>
        <td height="40px">NIP</td>
        <td>:</td>
        <td>{{$data->peg_nip}}</td>
    </tr>
    <tr>
        <td height="40px">Jabatan</td>
        <td>:</td>
        <td>
            @if ($data->peg_jabatan<4)
            Kepala {{$data->PegUnitkerja->nama}}
            @else
            Staf {{$data->PegUnitkerja->nama}}
            @endif
            BPS Provinsi NTB</td>
    </tr>
    <tr>
        <td height="40px" colspan="3">Berdasarkan Surat Perjalanan Dinas (SPD) Nomor : {{$data->Spd->nomor_spd}} Tanggal {{Tanggal::Panjang($data->SuratTugas->tgl_surat)}} dengan ini kami menyatakan dengan sesungguhnya bahwa :
        </td>
    </tr>
</table>

    <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:20px;line-height: normal;">
        <tr height="50px">
            <td width="5%" valign="top">1. </td>
            <td with="95%" valign="top">Biaya transport pegawai dan/atau biaya penginapan di bawah ini yang tidak diperoleh bukti-bukti pengeluarannya, meliputi :</td>
        </tr>
        <tr>
            <td valign="top"></td>
            <td>
                <table cellpadding="0" cellspacing="0" style="width:95%;margin-top:20px;margin-bottom:20px;line-height: normal;">
                    <tr class="semuagaris text-center">
                        <td width="5%" height="40px">No</td>
                        <td width="70%">Uraian</td>
                        <td width="20%">Jumlah <br />(Rp.)</td>
                    </tr>
                    @if ($data->Kuitansi->transport_flag==0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr>
                            <td height="30px" class="garis-l text-center">{{$no}}.</td>
                            <td class="garis-l" style="padding-left: 5pt !important;">{{$data->Kuitansi->transport_ket}}</td>
                            <td class="garis-l garis-r text-right" style="padding-right: 5pt !important;">@duit($data->Kuitansi->transport_rupiah)</td>
                    </tr>
                    @endif
                    @if ($data->Kuitansi->hotel_flag==0 and $data->Kuitansi->hotel_lama>0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr>
                            <td class="garis-l text-center" height="30px">{{$no}}.</td>
                            <td class="garis-l" style="padding-left: 5pt !important;">Penginapan selama {{$data->Kuitansi->hotel_lama}} ({{strtolower($Bilangan[$data->Kuitansi->hotel_lama])}}) malam</td>
                            <td class="garis-l garis-r text-right" style="padding-right: 5pt !important;">@duit($data->Kuitansi->hotel_total)</td>
                    </tr>
                    @endif
                    @if ($data->Kuitansi->rill1_flag==1 and $data->Kuitansi->rill1_rupiah>0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr>
                            <td height="30px" class="garis-l text-center">{{$no}}.</td>
                            <td class="garis-l" style="padding-left: 5pt !important;">{{$data->Kuitansi->rill1_ket}}</td>
                            <td class="garis-l garis-r text-right" style="padding-right: 5pt !important;">@duit($data->Kuitansi->rill1_rupiah)</td>
                    </tr>
                    @endif
                    @if ($data->Kuitansi->rill2_flag==1 and $data->Kuitansi->rill2_rupiah>0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr>
                            <td height="30px" class="garis-l text-center">{{$no}}.</td>
                            <td class="garis-l" style="padding-left: 5pt !important;">{{$data->Kuitansi->rill2_ket}}</td>
                            <td class="garis-l garis-r text-right" style="padding-right: 5pt !important;">@duit($data->Kuitansi->rill2_rupiah)</td>
                    </tr>
                    @endif
                    @if ($data->Kuitansi->rill3_flag==1 and $data->Kuitansi->rill3_rupiah>0)
                    @php
                        $no = $no + 1;
                    @endphp
                    <tr>
                            <td height="30px" class="garis-l text-center">{{$no}}.</td>
                            <td class="garis-l" style="padding-left: 5pt !important;">{{$data->Kuitansi->rill3_ket}}</td>
                            <td class="garis-l garis-r text-right" style="padding-right: 5pt !important;">@duit($data->Kuitansi->rill3_rupiah)</td>
                    </tr>
                    @endif
                    <tr>
                        <td height="30px" class="garis-l garis-t garis-b"></td>
                        <td class="garis-t garis-b text-center">Jumlah</td>
                        <td class="garis-l garis-t garis-b garis-r text-right" style="padding-right: 5pt !important;">@duit($data->Kuitansi->rill_total)</td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr>
            <td valign="top" height="50px">2. </td>
            <td valign="top">Jumlah uang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk atas pelaksanaan perjalanan dinas dimaksud dan apabila di kemudian hari terdapat kelebihan  pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke Kas Negara.</td>
        </tr>

        <tr>
            <td valign="top" height="40px"></td>
            <td>Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</td>
        </tr>
    </table>

    <table width="100%" style="margin-top:30px !important;line-height:normal;">
        <tr class="text-center">
            <td width="50%"></td>
            <td width="50%">Mataram, {{Tanggal::Panjang($data->Kuitansi->tgl_kuitansi)}}</td>
        </tr>
        <tr class="text-center">
            <td>Mengetahui/Menyetujui</td>
            <td>Pejabat Negara/Pegawai Negeri</td>
        </tr>
        <tr class="text-center">
            <td>Pejabat Pembuat Komitmen,</td>
            <td>Yang Melakukan Perjalanan Dinas</td>
        </tr>
        <tr>
            <td height="90px">&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="text-center">
            <td><u><b>{{strtoupper($data->Spd->ppk_nama)}}</b></u></td>
            <td><u><b>{{strtoupper($data->peg_nama)}}</b></u></td>
        </tr>
        <tr class="text-center">
            <td>NIP. {{$data->Spd->ppk_nip}}</td>
            <td>NIP. {{$data->peg_nip}}</td>
        </tr>
    </table>
