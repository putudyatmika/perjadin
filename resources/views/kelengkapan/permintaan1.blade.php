<div class="formjln">FORM-JLN</div>

<div class="text-center">
    <b>FORMULIR PERMINTAAN <br /> BELANJA PERJALANAN DINAS BIASA <br /></b>
    <span class="nomorminta">Nomor: B-    /BPS/52550/02/2021</span>
</div>

<div class="kepadaminta">
    Kepada Yth. <br />
Pejabat Pembuat Komitmen <br />
di <br />
	<span class="tujuanminta">Badan Pusat Statistik</span> <br />
	<span class="tujuanminta">Provinsi Nusa Tenggara Barat</span>
</div>

<div class="isiminta">
    Bersama ini disampaikan permintaan perjalanan dinas dalam rangka {{$data->tugas}} dari Provinsi ke Kabupaten/Kota
</div>
<div class="namatable">
    <table width="100%" class="table">
        <tr>
            <td width="4%">1.</td>
            <td width="24%">Unit Eselon I</td>
            <td width="2%">:</td>
            <td width="70%">Badan Pusat Statistik</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Unit Eselon II</td>
            <td>:</td>
            <td>Badan Pusat Statistik Provinsi Nusa Tenggara Barat</td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Bagian/Bidang</td>
            <td>:</td>
            <td>Bidang/Bagian</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Program</td>
            <td>:</td>
            <td>({{$data->Matrik->DanaAnggaran->prog_kode}}) {{$data->Matrik->DanaAnggaran->prog_nama}}</td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Kegiatan</td>
            <td>:</td>
            <td>({{$data->Matrik->DanaAnggaran->keg_kode}}) {{$data->Matrik->DanaAnggaran->keg_nama}}</td>
        </tr>
        @if ($data->Matrik->DanaAnggaran->kro_kode)
            <tr>
                <td>6.</td>
                <td>KRO</td>
                <td>:</td>
                <td>({{$data->Matrik->DanaAnggaran->kro_kode}}) {{$data->Matrik->DanaAnggaran->kro_nama}}</td>
            </tr>
            @php
                $i = 1;
            @endphp
        @else
           @php
             $i = 0;
           @endphp
        @endif
        <tr>
            <td>{{$i+6}}.</td>
            <td>Output</td>
            <td>:</td>
            <td>({{$data->Matrik->DanaAnggaran->output_kode}}) {{$data->Matrik->DanaAnggaran->output_nama}}</td>
        </tr>
        <tr>
            <td>{{$i+7}}.</td>
            <td>Komponen</td>
            <td>:</td>
            <td>({{$data->Matrik->DanaAnggaran->komponen_kode}}) {{$data->Matrik->DanaAnggaran->komponen_nama}}</td>
        </tr>
        <tr>
            <td>{{$i+8}}.</td>
            <td>Sub Komponen</td>
            <td>:</td>
            <td>
                @if ($data->Matrik->DanaAnggaran->subkomponen_kode)
                ({{$data->Matrik->DanaAnggaran->subkomponen_kode}}) {{$data->Matrik->DanaAnggaran->subkomponen_nama}}
                @else
                -
                @endif
            </td>
        </tr>
        <tr>
            <td>{{$i+9}}.</td>
            <td>Grup AKUN</td>
            <td>:</td>
            <td>({{$data->Matrik->DanaAnggaran->akun_kode}}) {{$data->Matrik->DanaAnggaran->akun_nama}}</td>
        </tr>
        <tr>
            <td>{{$i+10}}.</td>
            <td>Item aktivitas dalam POK</td>
            <td>:</td>
            <td>{{$data->Matrik->DanaAnggaran->uraian}}</td>
        </tr>
        <tr>
            <td>{{$i+11}}.</td>
            <td>Volume yang Digunakan</td>
            <td>:</td>
            <td>{{$data->Matrik->lamanya}} O-H</td>
        </tr>
    </table>
</div>
<div class="isiminta">
    {{$i+12}}. Penggunaan Anggaran
</div>
<div class="namatable">
    <table width="100%" class="table">
        <tr class="text-center">
            <td class="garis-t garis-l">No</td>
            <td class="garis-t garis-l">Grup Akun/Item Kegiatan</td>
            <td class="garis-t garis-l">Pagu POK</td>
            <td class="garis-t garis-l">Realisasi Anggaran (Kumulatif)
                </td>
            <td class="garis-t garis-l">Sisa Anggaran yang masih dapat digunakan
                </td>
            <td class="garis-t garis-l">Anggaran yang akan digunakan</td>
            <td class="garis-t garis-l garis-r">Sisa Anggaran</td>
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
            <td class="garis-t garis-l">1.</td>
            <td class="garis-t garis-l"><b>({{$data->Matrik->DanaAnggaran->akun_kode}}) {{$data->Matrik->DanaAnggaran->akun_nama}}</b></td>
            <td class="garis-t garis-l"></td>
            <td class="garis-t garis-l"></td>
            <td class="garis-t garis-l"></td>
            <td class="garis-t garis-l"></td>
            <td class="garis-t garis-l garis-r"></td>
        </tr>
        <tr>
            <td class="garis-t garis-l">&nbsp;</td>
            <td class="garis-t garis-l">{{$data->Matrik->DanaAnggaran->uraian}}</td>
            <td class="garis-t garis-l text-center">@duit($data->Matrik->DanaAnggaran->pagu_utama)</td>
            <td class="garis-t garis-l text-center">@duit($data->Matrik->DanaAnggaran->realisasi_pagu-$data->Matrik->total_biaya)</td>
            <td class="garis-t garis-l text-center">@duit(($data->Matrik->DanaAnggaran->pagu_utama - $data->Matrik->DanaAnggaran->realisasi_pagu)+$data->Matrik->total_biaya)</td>
            <td class="garis-t garis-l text-center">@duit($data->Matrik->total_biaya)</td>
            <td class="garis-t garis-l garis-r text-center">@duit($data->Matrik->DanaAnggaran->pagu_utama - $data->Matrik->DanaAnggaran->realisasi_pagu)</td>
        </tr>
        <tr>
            <td class="garis-t garis-l garis-b">&nbsp;</td>
            <td class="garis-t garis-l garis-b text-center"><b>JUMLAH</b></td>
            <td class="garis-t garis-l garis-b text-center">@duit($data->Matrik->DanaAnggaran->pagu_utama)</td>
            <td class="garis-t garis-l garis-b text-center">@duit($data->Matrik->DanaAnggaran->realisasi_pagu-$data->Matrik->total_biaya)</td>
            <td class="garis-t garis-l garis-b text-center">@duit(($data->Matrik->DanaAnggaran->pagu_utama - $data->Matrik->DanaAnggaran->realisasi_pagu)+$data->Matrik->total_biaya)</td>
            <td class="garis-t garis-l garis-b text-center">@duit($data->Matrik->total_biaya)</td>
            <td class="garis-t garis-l garis-r garis-b text-center">@duit($data->Matrik->DanaAnggaran->pagu_utama - $data->Matrik->DanaAnggaran->realisasi_pagu)</td>
        </tr>
    </table>
</div>
