@if ($data->Anggaran->kro_kode)
@php
    $i = 1;
@endphp
@else
@php
 $i = 0;
@endphp
@endif
<div class="namatable">
    <table width="100%" class="table">
        <tr>
            <td colspan="8" height="50px"><b>{{$i+13}}. Daftar Peserta Perjalanan Dinas</b></td>
        </tr>
        <tr class="text-center">
            <td class="garis-t garis-l">No</td>
            <td class="garis-t garis-l">Nama</td>
            <td class="garis-t garis-l">NIP</td>
            <td class="garis-t garis-l">Tanggal</td>
            <td class="garis-t garis-l">Tujuan <br />(Provinsi/Kab/Kota)</td>
            <td class="garis-t garis-l">Lamanya <br />(o-h)</td>
            <td class="garis-t garis-l">Keterangan</td>
            <td class="garis-t garis-l garis-r">Perkiraan Biaya</td>
        </tr>
        <tr class="text-center tulisankecil">
            <td class="garis-t garis-l">(1)</td>
            <td class="garis-t garis-l">(2)</td>
            <td class="garis-t garis-l">(3)</td>
            <td class="garis-t garis-l">(4)</td>
            <td class="garis-t garis-l">(5)</td>
            <td class="garis-t garis-l">(6)</td>
            <td class="garis-t garis-l">(7)</td>
            <td class="garis-t garis-l garis-r">(8)</td>
        </tr>
        @foreach ($data_detil as $item)
        <tr>
            <td class="garis-t garis-l garis-b">{{$item->nomor_urut_detil}}</td>
            <td class="garis-t garis-l garis-b">{{strtoupper($item->peg_nama_detil)}}</td>
            <td class="garis-t garis-l garis-b text-center">{{$item->peg_nip_detil}}</td>
            <td class="garis-t garis-l garis-b text-center">
                @if ($item->bnyk_hari_detil==1)
                {{ Tanggal::Panjang($item->tgl_brkt_detil) }}
            @elseif (\Carbon\Carbon::parse($item->tgl_brkt_detil)->format('m') == \Carbon\Carbon::parse($item->Matrik->Transaksi->tgl_balik)->format('m'))
                {{ \Carbon\Carbon::parse($item->tgl_brkt_detil)->format('j') }} s.d. {{Tanggal::Panjang($item->Matrik->Transaksi->tgl_balik) }}
            @else
                {{ Tanggal::Panjang($item->tgl_brkt_detil) }} s.d. {{ Tanggal::Panjang($item->Matrik->Transaksi->tgl_balik) }}
            @endif
            </td>
            <td class="garis-t garis-l garis-b text-center">
                @if ($item->Matrik->tipe_perjadin==2)
                @foreach ($item->Matrik->MultiTujuan as $t)
                    @if ($loop->last)
                    dan {{$t->namakabkota_tujuan}}
                    @else
                    {{$t->namakabkota_tujuan}},
                    @endif
                @endforeach
            @else
                {{$item->Matrik->Tujuan->nama_kabkota}}
            @endif
            </td>
            <td class="garis-t garis-l garis-b text-center">
                {{$item->bnyk_hari_detil}}
            </td>
            <td class="garis-t garis-l garis-b text-center">
                Menggunakan {{$FlagKendaraan[$item->Matrik->flag_kendaraan]}}
            </td>
            <td class="garis-t garis-l garis-r garis-b text-center">
                @duit($item->Matrik->total_biaya)
            </td>
        </tr>
        @endforeach
    </table>
</div>

<div class="namatable isiminta">
    <table width="100%" class="table">
        <tr class="text-center">
            <td width="50%">

            </td>
            <td width="50%">
                Mataram, {{Tanggal::Panjang($data->tgl_permintaan)}}
            </td>
        </tr>
        <tr class="text-center">
            <td>
                Kepala Badan Pusat Statistik <br />Provinsi Nusa Tenggara Barat
                <p style="margin-top:60pt;"><b>{{strtoupper($data->ttd_kepala_nama_permintaan)}}</b></p>
            </td>
            <td>
               @if ($data->ttd_jabatan_kode_permintaan < 3)
               Kepala
               @else
               Koordinator
               @endif
               {{$data->unitkerja_nama_permintaan}}<br />
               BPS Provinsi Nusa Tenggara Barat

                <p style="margin-top:60pt;"><b>{{strtoupper($data->ttd_nama_permintaan)}}</b></p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr class="text-center">
            <td></td>
            <td>Menyetujui,<br />
                Pejabat Pembuat Komitmen<br />BPS Provinsi Nusa Tenggara Barat

                <p style="margin-top:60pt;">
                    <b>{{strtoupper($data->ttd_ppk_nama_permintaan)}}</b>
                    </p>
            </td>
        </tr>
        <tr>
            <td height="30px">&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td valign="top" style="height:70px">
                Tembusan, Yth:<br />
                1. Kuasa Pengguna Anggaran <br />
                2. Kepala Bagian Umum
            </td>
            <td valign="top" class="garis-t garis-l garis-r garis-b">
                Catatan:
            </td>
        </tr>
    </table>
</div>
