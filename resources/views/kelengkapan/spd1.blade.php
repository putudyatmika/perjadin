<div class="text-center">
    <img src="{{asset('img/logo-bps.png')}}" height="80">
    <h4 class="namabps"><p><i><b>BADAN PUSAT STATISTIK <br />PROVINSI NUSA TENGGARA BARAT</b></i></p></h4>
</div>
<table width="100%" cellpadding="0" cellspacing="0">
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

<table width="100%" cellpadding="0" cellspacing="0">
    <tr height="20px">
        <td width="2%" valign="top" class="garis-t garis-l"><span class="pull-left">1.</span></td>
        <td width="48%" class="garis-t garis-r"><span class="pull-left">Pejabat Pembuat Komitmen</span></td>
        <td width="50%" class="garis-t garis-r">{{strtoupper($data->Spd->ppk_nama)}}</td>
    </tr>
    <tr>
        <td valign="top" class="garis-t garis-l"><span class="pull-left">2.</span></td>
        <td valign="top" height="30" class="garis-t garis-r"><div class="pull-left">Nama / NIP Pegawai yang melaksanakan perjalanan dinas</div></td>
        <td valign="top" class="garis-t garis-r">
            <table width="100%">
                <tr>
                    <td><b>{{strtoupper($data->peg_nama)}}</b></td>
                </tr>
                <tr>
                    <td><b>{{$data->peg_nip}}</b></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="garis-t garis-l"><span class="pull-left">3.</span></td>
        <td class="garis-t garis-r"><span class="pull-left">a. Pangkat dan Golongan</span></td>
        <td class="garis-t garis-r">a. {{$data->PegGolongan->pangkat}} ({{$data->PegGolongan->gol}})</td>
    </tr>
    <tr>
        <td class="garis-l"></td>
        <td class="garis-r"><span class="pull-left">b. Jabatan/Instansi</span></td>
        <td class="garis-r">b.
                @if ($data->peg_jabatan<4)
                Kepala {{$data->PegUnitkerja->nama}}
                @else
                Staf {{$data->PegUnitkerja->nama}}
                @endif
        </td>
    </tr>
    <tr>
        <td class="garis-l"></td>
        <td class="garis-r"><span class="pull-left">c.	Tingkat biaya perjalanan dinas</span></td>
        <td class="garis-r">c. C</td>
    </tr>
    <tr>
        <td class="garis-t garis-l"><span class="pull-left">4. </span></td>
        <td class="garis-t garis-r"><span class="pull-left">Maksud perjalanan dinas</span></td>
        <td class="garis-t garis-r">{{$data->tugas}}</td>
    </tr>
    <tr>
        <td class="garis-t garis-l"><span class="pull-left">5. </span></td>
        <td class="garis-t garis-r"><span class="pull-left">Alat angkutan yang dipergunakan</span></td>
        <td class="garis-t garis-r">{{$FlagKendaraan[$data->Spd->kendaraan]}}</td>
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
                <td width="50%" class="gariskiri">b. {{ Tanggal::Panjang($data->tgl_brkt) }}</td>
            </tr>
            <tr class="adagaris">
                <td width="2%"></td>
                <td width="48%"><span class="pull-left">c.	Tanggal harus kembali / tiba di tempat baru</span></td>
                <td width="50%" class="gariskiri">c.  {{ Tanggal::Panjang($data->tgl_balik) }}</td>
            </tr>
    <tr>
        <td><span class="pull-left">8. </span></td>
        <td>
            <table width="95%">
                <tr>
                    <td width="50%">
                        <span class="text-center">Pengikut</span>
                    </td>
                    <td width="50%">
                        <span class="text-center">Nama</span>
                    </td>
                </tr>
            </table>
             
        </td>
        <td>
            <table width="95%">
                <tr>
                    <td width="50%">
                        <span class="text-center">Tanggal Lahir</span>
                    </td>
                    <td width="50%">
                        <span class="text-center">Keterangan</span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>1.<br />2.</td>
        <td></td>
    </tr>
    <tr>
        <td><span class="pull-left">9. </span></td>
        <td>Pembebanan anggaran</td>
        <td></td>
    </tr>
    <tr>
        <td><span class="pull-left"></span></td>
        <td><span class="pull-left">a. Instansi</span></td>
        <td>a. BADAN PUSAT STATISTIK</td>
    </tr>
    <tr>
        <td><span class="pull-left"></span></td>
        <td><span class="pull-left">b. Akun</span></td>
        <td>b. {{$data->Matrik->DanaAnggaran->mak}}</td>
    </tr>
    <tr>
        <td><span class="pull-left">10. </span></td>
        <td><span class="pull-left">Keterangan Lain-lain</span></td>
        <td></td>
    </tr>
</table>

<div style="margin-top:20pt">
    <table width="100%">
            <tr>
                <td width="50%"></td>
                <td width="17%">Dikeluarkan di</td>
                <td width="3%">:</td>
                <td width="30%" class="gariskiri">Mataram</td>
            </tr>
            <tr>
                <td></td>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ Tanggal::Panjang($data->SuratTugas->tgl_surat) }}</td>
            </tr>
    </table>
</div>
<div style="margin-top:20pt">
    <table width="100%">
        <tr>
            <td width="50%"></td>
            <td width="50%">Pejabat Pembuat Komitmen<br />BPS Provinsi Nusa Tenggara Barat</td>
        </tr>
        <tr>
            <td height="50pt"></td>
            <td></td>
        </tr>
        <tr>
            <td width="50%"></td>
            <td width="50%"><b><span class="pull-left">{{strtoupper($data->Spd->ppk_nama)}}</span></b></td>
        </tr>
    </table>
</div>


