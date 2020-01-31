@php
    $tgl_kuitansi = explode('-',$dataTransaksi[0]->Kuitansi->tgl_kuitansi);
    $bln_kuitansi = (int)($tgl_kuitansi[1]);
    $tanggal_kuitansi = (int)($tgl_kuitansi[2]) .' '.$Bulan[$bln_kuitansi].' '.$tgl_kuitansi[0];

    $tgl_surat = explode('-',$dataTransaksi[0]->SuratTugas->tgl_surat);
    $bln_surat = (int)($tgl_surat[1]);
    $tanggal_surat = (int)($tgl_surat[2]) .' '.$Bulan[$bln_surat].' '.$tgl_surat[0];
@endphp
<table width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <table width="100%">
                <tr>
                    <td width="30%">Tahun Anggaran</td>
                    <td width="5%">:</td>
                    <td width="65%">{{$dataTransaksi[0]->Matrik->DanaAnggaran->tahun_anggaran}}</td>
                </tr>
                <tr>
                    <td>Mata Anggaran</td>
                    <td>:</td>
                    <td>{{$dataTransaksi[0]->Matrik->DanaAnggaran->mak}}</td>
                </tr>
                <tr>
                    <td>Nomor Bukti</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class="text-center namakuitansi" style="margin:40px;">
       <h2><b>KUITANSI / BUKTI PEMBAYARAN</b></h2>
</div>
<table width="100%">
        <tr height="50px">
            <td width="20%">Sudah Terima Dari</td>
            <td width="5%">:</td>
            <td width="75%">Kuasa Pengguna Anggaran BPS Provinsi Nusa Tenggara Barat</td>
        </tr>
        <tr height="50px">
            <td>Banyaknya Uang</td>
            <td>:</td>
            <td><b>==== {{ ucwords(Terbilang::kekata($dataTransaksi[0]->Kuitansi->total_biaya)) }} Rupiah ====</b></td>
        </tr>
        <tr height="50px">
            <td>Untuk Pembayaran</td>
            <td>:</td>
            <td>Biaya perjalanan dinas dari Mataram ke {{$dataTransaksi[0]->Matrik->Tujuan->nama_kabkota}} sesuai dengan SPD Nomor {{$dataTransaksi[0]->Spd->nomor_spd}} tanggal {{$tanggal_surat}}
                </td>
        </tr>
</table>
<div class="jumlahrupiah" style="margin-top:100px;margin-bottom:100px;">
    <table width="30%">
        <tr>
            <td style="border-top:2px solid black; border-bottom:2px solid black;"><h2><b>JUMLAH @rupiah($dataTransaksi[0]->Kuitansi->total_biaya)</b></h2></td>
        </tr>
    </table>
</div>
<table width="100%" style="margin-top:50px;">
        <tr>
            <td width="30%">&nbsp;</td>
            <td width="5%">&nbsp;</td>
            <td width="30%">&nbsp;</td>
            <td width="5%">&nbsp;</td>
            <td width="30%">Mataram, {{$tanggal_kuitansi }}</td>
        </tr>
        <tr>
            <td>Setuju dibebankan pada mata anggaran berkenaan :</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Pejabat Pembuat Komitmen</td>
            <td></td>
            <td>Lunas pada tanggal : </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>BPS Provinsi NTB</td>
            <td></td>
            <td>Bendahara Pengeluaran</td>
            <td></td>
            <td>Yang Menerima Uang</td>
        </tr>
        <tr height="120px">
            <td colspan="5"></td>
        </tr>
        <tr>
            <td><u><b>{{$dataTransaksi[0]->Spd->ppk_nama}}</b></u></td>
            <td></td>
            <td><u><b>{{$dataTransaksi[0]->Kuitansi->bendahara_nama}}</b></u></td>
            <td></td>
            <td><u><b>{{$dataTransaksi[0]->peg_nama}}</b></u></td>
        </tr>
        <tr>
            <td>NIP. {{$dataTransaksi[0]->Spd->ppk_nip}}</td>
            <td></td>
            <td>NIP. {{$dataTransaksi[0]->Kuitansi->bendahara_nip}}</td>
            <td></td>
            <td>NIP. {{$dataTransaksi[0]->peg_nip}}</td>
        </tr>
</table>
<div class="text-right">
    <button id="cetak1" class="btn btn-default">Print</button>
</div>
