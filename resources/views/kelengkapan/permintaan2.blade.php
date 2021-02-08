@if ($data->Matrik->DanaAnggaran->kro_kode)
@php
    $i = 1;
@endphp
@else
@php
 $i = 0;
@endphp
@endif
<div class="isiminta">
   <b>{{$i+13}}. Daftar Peserta Perjalanan Dinas</b>
</div>
<div class="namatable">
    <table width="100%" class="table">
        <tr class="text-center">
            <td class="garis-t garis-l">No</td>
            <td class="garis-t garis-l">Nama</td>
            <td class="garis-t garis-l">NIP</td>
            <td class="garis-t garis-l">Tanggal</td>
            <td class="garis-t garis-l">Tujuan <br />(Provinsi/Kab/Kota)</td>
            <td class="garis-t garis-l">Lamanya <br />(o-h)</td>
            <td class="garis-t garis-l garis-r">Keterangan</td>
        </tr>
        <tr class="text-center tulisankecil">
            <td class="garis-t garis-l">(1)</td>
            <td class="garis-t garis-l">(2)</td>
            <td class="garis-t garis-l">(3)</td>
            <td class="garis-t garis-l">(4)</td>
            <td class="garis-t garis-l">(5)</td>
            <td class="garis-t garis-l">(6)</td>
            <td class="garis-t garis-l garis-r">(7)</td>
        </tr>
        <tr>
            <td class="garis-t garis-l garis-b">1.</td>
            <td class="garis-t garis-l garis-b text-center"><b>{{strtoupper($data->peg_nama)}}</b></td>
            <td class="garis-t garis-l garis-b text-center">{{$data->peg_nip}}</td>
            <td class="garis-t garis-l garis-b text-center">
                @if ($data->bnyk_hari==1)
                {{ Tanggal::Panjang($data->tgl_brkt) }}
            @elseif (\Carbon\Carbon::parse($data->tgl_brkt)->format('m') == \Carbon\Carbon::parse($data->tgl_balik)->format('m'))
                {{ \Carbon\Carbon::parse($data->tgl_brkt)->format('j') }} s.d. {{ Tanggal::Panjang($data->tgl_balik) }}
            @else
                {{ Tanggal::Panjang($data->tgl_brkt) }} s.d. {{ Tanggal::Panjang($data->tgl_balik) }}
            @endif
            </td>
            <td class="garis-t garis-l garis-b text-center">
                @if ($data->Matrik->tipe_perjadin==2)
                @foreach ($data->Matrik->MultiTujuan as $t)
                    @if ($loop->last)
                    dan {{$t->namakabkota_tujuan}}
                    @else
                    {{$t->namakabkota_tujuan}},
                    @endif
                @endforeach
            @else
                {{$data->Matrik->Tujuan->nama_kabkota}}
            @endif
            </td>
            <td class="garis-t garis-l garis-b text-center">
                {{$data->bnyk_hari}}
            </td>
            <td class="garis-t garis-l garis-r garis-b text-center">
                {{$FlagKendaraan[$data->Spd->kendaraan]}}
            </td>
        </tr>
    </table>
</div>

<div class="namatable isiminta">
    <table width="100%" class="table">
        <tr class="text-center">
            <td width="50%">

            </td>
            <td width="50%">
                Mataram, {{Tanggal::Panjang($data->form_tgl_surat)}}
            </td>
        </tr>
        <tr class="text-center">
            <td>
                Kepala Badan Pusat Statistik <br />Provinsi Nusa Tenggara Barat
                <p style="margin-top:60pt;"><b>{{strtoupper($data->form_ttd_kepala_nama)}}</b></p>
            </td>
            <td>
               Kepala {{$data->form_unitkerja_nama}}<br />BPS Provinsi Nusa Tenggara Barat

                <p style="margin-top:60pt;"><b>{{strtoupper($data->form_ttd_nama)}}</b></p>
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
                    <b>{{strtoupper($data->Spd->ppk_nama)}}</b>
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
