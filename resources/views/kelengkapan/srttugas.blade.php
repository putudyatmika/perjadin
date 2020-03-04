<!---isi yg akan diprint--->
<div class="text-center">
    <img src="{{asset('img/logo-bps.png')}}" height="80">
    <h4 class="namabps"><p><i><b>BADAN PUSAT STATISTIK <br />PROVINSI NUSA TENGGARA BARAT</b></i></p></h4>
    <span class="kopsurat"><u><b>SURAT TUGAS</b></u></span>
    <br />
    <span class="nomor">No : {{$data->SuratTugas->nomor_surat}}</span>
</div>
<div class="text-center">
    <h4><b>
        @if ($data->SuratTugas->flag_ttd==0)
        KEPALA BADAN PUSAT STATISTIK PROVINSI NUSA TENGGARA BARAT
        @else
        {{$FlagTTD[$data->SuratTugas->flag_ttd]}} KEPALA BADAN PUSAT STATISTIK PROVINSI NUSA TENGGARA BARAT
        @endif

    </b>
    </h4>
</div>
<div class="row aturan">
<table width="100%" class="table">
    <tr>
        <td>Menimbang</td>
        <td>:</td>
        <td>Bahwa untuk kelancaran pelaksanaan kegiatan di Badan Pusat Statistik Provinsi Nusa Tenggara Barat maka diperlukan dukungan administrasi perkantoran;</td>
    </tr>
    <tr>
        <td>Mengingat</td>
        <td>:</td>
        <td>
            <ol>
                <li>Undang-Undang Dasar Negara Republik Indonesia Tahun 1945;</li>
                <li>Undang-Undang Nomor 17 Tahun 2003 tentang Keuangan Negara;</li>
                <li>Undang-Undang Nomor 1 Tahun 2004 tentang Perbendaharaan Negara;</li>
                <li>Peraturan Pemerintah Nomor 51 Tahun 1999 tentang Penyelenggaraan Statistik;</li>
                <li>Peraturan Presiden Nomor 163 Tahun 2007 tentang Badan Pusat Statistik;</li>
                <li>Keputusan Kepala Badan Pusat Statistik Nomor 121 tahun 2001 tentang Organisasi dan Tata Kerja Perwakilan Badan Pusat Statistik; Negara, Pegawai Negeri, dan Pegawai Tidak Tetap;</li>
                <li>Peraturan Kepala Badan Pusat Statistik Nomor 7 Tahun 2008 tentang Organisasi dan tata Kerja Badan Pusat Statistik;</li>
                <li>Peraturan Menteri Keuangan Nomor 113/PMK.05/2012 tentang Perjalanan Dinas Dalam Negeri bagi Pejabat Negara, Pegawai Negeri, dan Pegawai Tidak Tetap;</li>
                <li>Peraturan Kepala Badan Pusat Statistik Nomor 103 Tahun 2014 tentang Pedoman Pelaksanaan Perjalanan Dinas Jabatan Di Lingkungan Badan Pusat Statistik;</li>
            </ol>

        </td>
    </tr>
</table>
</div>
<div class="text-center text-uppercase"><b>Memberikan tugas</b></div>

<div class="row namatable">
<table width="100%" class="table">
    <tr>
        <td width="17%">Kepada : </td>
        <td width="3%"></td>
        <td></td>
    </tr>
    <tr>
        <td width="17%">Nama</td>
        <td width="3%">:</td>
        <td><b>{{strtoupper($data->peg_nama)}}</b></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>
            @if ($data->peg_jabatan<4)
            Kepala {{$data->PegUnitkerja->nama}}
            @else
            Staf {{$data->PegUnitkerja->nama}}
            @endif
        </td>
    </tr>
    <tr>
        <td>Anggota</td>
        <td>:</td>
        <td>-</td>
    </tr>
    <tr>
        <td>Tujuan/Tugas</td>
        <td>:</td>
        <td>{{$data->Matrik->Tujuan->nama_kabkota}} / {{$data->tugas}}</td>
    </tr>
    <tr>
        <td>Jangka Waktu</td>
        <td>:</td>
        <td>{{$data->bnyk_hari}} ({{strtolower($Bilangan[$data->bnyk_hari])}}) hari,
            @if ($data->bnyk_hari==1)
            {{ Tanggal::Panjang($data->tgl_brkt) }}
            @else
            {{ Tanggal::Panjang($data->tgl_brkt) }} s/d {{ Tanggal::Panjang($data->tgl_balik) }}
            @endif
        </td>
    </tr>
</table>
</div>

<div class="row">
    <table width="100%" style="margin-top:22px;">
        <tr>
            <td width="50%">
                <div class="qrcode" style="margin-top:80pt;">
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                    ->size(100)->margin(0)->generate('https://perjadin.bpsntb.id/view/'.$data->kode_trx)) !!}" width="80px">

                <div style="font-size:7pt;padding-left:3px;">TRXID : {{$data->kode_trx}}</div>
            </div>
            </td>
            <td width="50%">
                <div class="text-center">
                    Mataram, {{ Tanggal::Panjang($data->SuratTugas->tgl_surat) }}
                    <br />
                    @if ($data->SuratTugas->flag_ttd>0)
                    {{$FlagTTD[$data->SuratTugas->flag_ttd]}}
                    @endif
                    Kepala Badan Pusat Statistik
                    <br />
                    Provinsi Nusa Tenggara Barat
                    <br />
                    @if ($data->SuratTugas->flag_ttd>0)
                    {{$data->SuratTugas->ttd_jabatan}}
                    @endif
                    <p style="margin-top:60pt;"><b>{{strtoupper($data->SuratTugas->ttd_nama)}}</b></p>
                </div>
            </td>
        </tr>

    </table>
</div>
<div class="kaki">
    Jl. Gunung Rinjani No. 2 Mataram 83125  Telp. (0370) 621385, 638321  Fax (0370) 623801 <br />
    Email: bps5200@bps.go.id   Website: http://ntb.bps.go.id
</div>