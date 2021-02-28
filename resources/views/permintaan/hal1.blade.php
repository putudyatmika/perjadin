<div class="formjln">FORM-JLN</div>

<div class="text-center">
    <b>FORMULIR PERMINTAAN <br /> BELANJA PERJALANAN DINAS BIASA <br /></b>
    <span class="nomorminta">Nomor: {{$data->nomor_permintaan}}</span>
</div>

<div class="kepadaminta">
    Kepada Yth. <br />
Pejabat Pembuat Komitmen <br />
di <br />
	<span class="tujuanminta">Badan Pusat Statistik</span> <br />
	<span class="tujuanminta">Provinsi Nusa Tenggara Barat</span>
</div>

<div class="isiminta">
    Bersama ini disampaikan permintaan perjalanan dinas dari Provinsi ke Kabupaten/Kota
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
            <td>Bagian/Fungsi</td>
            <td>:</td>
            <td>{{$data->unitkerja_nama_permintaan}}</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Program</td>
            <td>:</td>
            <td>({{$data->Anggaran->prog_kode}}) {{$data->Anggaran->prog_nama}}</td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Kegiatan</td>
            <td>:</td>
            <td>({{$data->Anggaran->keg_kode}}) {{$data->Anggaran->keg_nama}}</td>
        </tr>
        @if ($data->Anggaran->kro_kode)
            <tr>
                <td>6.</td>
                <td>KRO</td>
                <td>:</td>
                <td>({{$data->Anggaran->kro_kode}}) {{$data->Anggaran->kro_nama}}</td>
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
            <td>({{$data->Anggaran->output_kode}}) {{$data->Anggaran->output_nama}}</td>
        </tr>
        <tr>
            <td>{{$i+7}}.</td>
            <td>Komponen</td>
            <td>:</td>
            <td>({{$data->Anggaran->komponen_kode}}) {{$data->Anggaran->komponen_nama}}</td>
        </tr>
        <tr>
            <td>{{$i+8}}.</td>
            <td>Sub Komponen</td>
            <td>:</td>
            <td>
                @if ($data->Anggaran->subkomponen_kode)
                ({{$data->Anggaran->subkomponen_kode}}) {{$data->Anggaran->subkomponen_nama}}
                @else
                -
                @endif
            </td>
        </tr>
        <tr>
            <td>{{$i+9}}.</td>
            <td>Grup AKUN</td>
            <td>:</td>
            <td>({{$data->Anggaran->akun_kode}}) {{$data->Anggaran->akun_nama}}</td>
        </tr>
        <tr>
            <td>{{$i+10}}.</td>
            <td>Item aktivitas dalam POK</td>
            <td>:</td>
            <td>{{$data->Anggaran->uraian}}</td>
        </tr>
        <tr>
            <td>{{$i+11}}.</td>
            <td>Volume yang Digunakan</td>
            <td>:</td>
            <td>{{$data_detil->sum('bnyk_hari_detil')}} O-H</td>
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
            <td class="garis-t garis-l"><b>({{$data->Anggaran->akun_kode}}) {{$data->Anggaran->akun_nama}}</b></td>
            <td class="garis-t garis-l"></td>
            <td class="garis-t garis-l"></td>
            <td class="garis-t garis-l"></td>
            <td class="garis-t garis-l"></td>
            <td class="garis-t garis-l garis-r"></td>
        </tr>
        <tr>
            <td class="garis-t garis-l">&nbsp;</td>
            <td class="garis-t garis-l">{{$data->Anggaran->uraian}}</td>
            <td class="garis-t garis-l text-center">@duit($data->pagu_utama_permintaan)</td>
            <td class="garis-t garis-l text-center">
                @duit($data->pagu_realisasi_permintaan)
            </td>
            <td class="garis-t garis-l text-center">
                @duit($data->pagu_dpt_digunakan_permintaan)
            </td>
            <td class="garis-t garis-l text-center">@duit($data->total_biaya_permintaan)</td>
            <td class="garis-t garis-l garis-r text-center">
                @duit($data->sisa_anggaran_permintaan)
            </td>
        </tr>
        <tr>
            <td class="garis-t garis-l garis-b">&nbsp;</td>
            <td class="garis-t garis-l garis-b text-center"><b>JUMLAH</b></td>
            <td class="garis-t garis-l garis-b text-center">@duit($data->pagu_utama_permintaan)</td>
            <td class="garis-t garis-l garis-b text-center">
                @duit($data->pagu_realisasi_permintaan)
            </td>
            <td class="garis-t garis-l garis-b text-center">
                @duit($data->pagu_dpt_digunakan_permintaan)
            </td>
            <td class="garis-t garis-l garis-b text-center">
                @duit($data->total_biaya_permintaan)
            </td>
            <td class="garis-t garis-l garis-r garis-b text-center">
                @duit($data->sisa_anggaran_permintaan)
            </td>
        </tr>
    </table>
</div>
