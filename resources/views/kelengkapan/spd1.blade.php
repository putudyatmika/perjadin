<div class="text-center">
    <img src="{{asset('img/logo-bps.png')}}" height="80">
    <h4 class="namabps"><p><i><b>BADAN PUSAT STATISTIK <br />PROVINSI NUSA TENGGARA BARAT</b></i></p></h4>
</div>
<table width="100%">
<tr>
<td width="50%"></td>
<td width="17%">Lembar Ke</td>
<td width="3%">:</td>
<td width="30%"></td>
</tr>
<tr>
<td></td>
<td>Kode Nomor</td>
<td>:</td>
<td></td>
</tr>
<tr>
<td></td>
<td>Nomor</td>
<td>:</td>
<td>{{$data->Spd->nomor_spd}}</td>
</tr>
</table>

<div class="text-center" style="margin:30px;"><h4><u><b>SURAT PERJALANAN DINAS (SPD)</b></u></h4></div>

<table width="100%">
    <tr>
        <td width="2%" valign="top"><span class="pull-left">1.</span></td>
        <td width="48%"><span class="pull-left">Pejabat Pembuat Komitmen</span></td>
        <td width="50%" class="gariskiri">{{strtoupper($data->Spd->ppk_nama)}}</td>
    </tr>
<tr class="adagaris">
    <td width="2%" valign="top"><span class="pull-left">2.</span></td>
    <td width="48%"><span class="pull-left" class="adagaris">Nama / NIP Pegawai yang melaksanakan perjalanan dinas</span></td>
    <td width="50%" class="gariskiri"><b><span class="pull-left">{{strtoupper($data->peg_nama)}}</span> <span class="pull-right">{{$data->peg_nip}}</span></b></td>
</tr>
<tr>
    <td width="2%"><span class="pull-left">3.</span></td>
    <td width="48%"><span class="pull-left">a. Pangkat dan Golongan</span></td>
    <td width="50%" class="gariskiri">a. {{$data->PegGolongan->pangkat}} ({{$data->PegGolongan->gol}})</td>
</tr>
<tr>
    <td width="2%"></td>
    <td width="48%"><span class="pull-left">b. Jabatan/Instansi</span></td>
    <td width="50%" class="gariskiri">b.
            @if ($data->peg_jabatan<4)
            Kepala {{$data->PegUnitkerja->nama}}
            @else
            Staf {{$data->PegUnitkerja->nama}}
            @endif
    </td>
</tr>
<tr class="adagaris">
    <td width="2%"></td>
    <td width="48%"><span class="pull-left">c.	Tingkat biaya perjalanan dinas</span></td>
    <td width="50%" class="gariskiri">c. C</td>
</tr>
    <tr class="adagaris">
        <td width="2%"><span class="pull-left">4. </span></td>
        <td width="48%"><span class="pull-left">Maksud perjalanan dinas</span></td>
        <td width="50%" class="gariskiri">{{$data->tugas}}</td>
    </tr>
    <tr class="adagaris">
        <td width="2%"><span class="pull-left">5. </span></td>
        <td width="48%"><span class="pull-left">Alat angkutan yang dipergunakan</span></td>
        <td width="50%" class="gariskiri">{{$FlagKendaraan[$data->Spd->kendaraan]}}</td>
    </tr>
    <tr>
        <td width="2%"><span class="pull-left">6. </span></td>
        <td width="48%"><span class="pull-left">a. Tempat berangkat</span></td>
        <td width="50%" class="gariskiri">a. Mataram</td>
    </tr>
    <tr class="adagaris">
        <td width="2%"></td>
        <td width="48%"><span class="pull-left">b. Tempat tujuan</span></td>
        <td width="50%" class="gariskiri">b. {{$data->Matrik->Tujuan->nama_kabkota}}</td>
    </tr>
    <tr>
            <td width="2%"><span class="pull-left">7.</span></td>
            <td width="48%"><span class="pull-left">a. Lama perjalanan dinas</span></td>
            <td width="50%" class="gariskiri">a. {{$data->bnyk_hari}} ({{$Bilangan[$data->bnyk_hari]}}) Hari</td>
        </tr>
        <tr>
            <td width="2%"></td>
            <td width="48%"><span class="pull-left">b. Tanggal berangkat</span></td>
                <td width="50%" class="gariskiri">b. {{ $data->tgl_brkt }}</td>
            </tr>
            <tr class="adagaris">
                <td width="2%"></td>
                <td width="48%"><span class="pull-left">c.	Tanggal harus kembali / tiba di tempat baru</span></td>
                <td width="50%" class="gariskiri">c.  {{ $data->tgl_balik }}</td>
            </tr>
    <tr class="adagaris">
        <td width="2%"><span class="pull-left">8. </span></td>
        <td width="48%"><span class="pull-left">Pengikut</span> <span class="pull-right" style="padding-right:150px;">Nama</span></td>
        <td width="50%" class="gariskiri"><span class="pull-left">Tanggal Lahir</span> <span class="pull-right" style="padding-right:150px;">Keterangan</span></td>
    </tr>
    <tr class="adagaris">
        <td width="2%"></td>
        <td width="48%"><span class="pull-left">1.</span> <br /><span class="pull-left">2.</span></td>
        <td width="50%" class="gariskiri"></td>
    </tr>
    <tr>
        <td width="2%"><span class="pull-left">9. </span></td>
        <td width="48%"><span class="pull-left">Pembebanan anggaran</span></td>
        <td width="50%" class="gariskiri"></td>
    </tr>
    <tr>
        <td width="2%"><span class="pull-left"></span></td>
        <td width="48%"><span class="pull-left">a. Instansi</span></td>
        <td width="50%" class="gariskiri">a. BADAN PUSAT STATISTIK</td>
    </tr>
    <tr class="adagaris">
        <td width="2%"><span class="pull-left"></span></td>
        <td width="48%"><span class="pull-left">b. Akun</span></td>
        <td width="50%" class="gariskiri">b. {{$data->Matrik->DanaAnggaran->mak}}</td>
    </tr>
    <tr class="adagaris">
        <td width="2%"><span class="pull-left">10. </span></td>
        <td width="48%"><span class="pull-left">Keterangan Lain-lain</span></td>
        <td width="50%" class="gariskiri"></td>
    </tr>
</table>



