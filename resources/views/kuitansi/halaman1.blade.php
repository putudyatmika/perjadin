<table width="100%" cellpadding="0" cellspacing="0" style="line-height: 1.5em;">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <table width="100%">
                <tr>
                    <td width="30%">Tahun Anggaran</td>
                    <td width="5%">:</td>
                    <td width="65%">{{$data->Matrik->DanaAnggaran->tahun_anggaran}}</td>
                </tr>
                <tr>
                    <td>Mata Anggaran</td>
                    <td>:</td>
                    <td>{{$data->Matrik->DanaAnggaran->mak}}</td>
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
<table width="100%" cellpadding="0" cellspacing="0" style="line-height: 2em;">
        <tr>
            <td valign="top" width="20%" height="50px">Sudah Terima Dari</td>
            <td valign="top" width="5%">:</td>
            <td valign="top" width="75%">Kuasa Pengguna Anggaran BPS Provinsi Nusa Tenggara Barat</td>
        </tr>
        <tr>
            <td valign="top" height="50px">Banyaknya Uang</td>
            <td valign="top">:</td>
            <td valign="top"><b>==== {{ ucwords(Terbilang::kekata($data->Kuitansi->total_biaya)) }} Rupiah ====</b></td>
        </tr>
        <tr>
            <td valign="top" height="50px">Untuk Pembayaran</td>
            <td valign="top">:</td>
            <td valign="top">Biaya perjalanan dinas dari Mataram ke @if ($data->Matrik->tipe_perjadin==2)  @foreach ($data->Matrik->MultiTujuan as $t)
                @if ($loop->last)
                 dan {{$t->namakabkota_tujuan}}
                @else 
                {{$t->namakabkota_tujuan}},
                @endif
            @endforeach @else {{$data->Matrik->Tujuan->nama_kabkota}} @endif sesuai dengan SPD Nomor {{$data->Spd->nomor_spd}} tanggal {{Tanggal::Panjang($data->SuratTugas->tgl_surat)}}
                </td>
        </tr>
</table>

    <table style="margin-top:100px;margin-bottom:100px;">
        <tr>
            <td width="40%" height="50px" style="border-top:2px solid black; border-bottom:2px solid black;">
                <span style="font-size:15pt;"><b>JUMLAH @rupiah($data->Kuitansi->total_biaya)</b></span>
            </td>
            <td width="60%"></td>
        </tr>
    </table>

<table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;margin-top:50px;">
        <tr>
            <td width="30%">&nbsp;</td>
            <td width="5%">&nbsp;</td>
            <td width="30%">&nbsp;</td>
            <td width="5%">&nbsp;</td>
            <td width="30%">Mataram, {{Tanggal::Panjang($data->Kuitansi->tgl_kuitansi)}}</td>
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
        <tr>
            <td colspan="5" height="100px"></td>
        </tr>
        <tr>
            <td><u><b>{{strtoupper($data->Spd->ppk_nama)}}</b></u></td>
            <td></td>
            <td><u><b>{{strtoupper($data->Kuitansi->bendahara_nama)}}</b></u></td>
            <td></td>
            <td><u><b>{{strtoupper($data->peg_nama)}}</b></u></td>
        </tr>
        <tr>
            <td>NIP. {{$data->Spd->ppk_nip}}</td>
            <td></td>
            <td>NIP. {{$data->Kuitansi->bendahara_nip}}</td>
            <td></td>
            <td>NIP. {{$data->peg_nip}}</td>
        </tr>
</table>