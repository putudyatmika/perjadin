<div class="text-center">
    <img src="{{asset('img/logo-bps.png')}}" height="80">
    <h4 class="namabps"><p><i><b>BADAN PUSAT STATISTIK <br />PROVINSI NUSA TENGGARA BARAT</b></i></p></h4>
</div>
<table width="100%" cellpadding="0" cellspacing="0" style="line-height: normal;">
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

<div class="text-center" style="margin:15px;"><h4><u><b>SURAT PERJALANAN DINAS (SPD)</b></u></h4></div>

<table width="100%" cellpadding="0" cellspacing="0" class="pad5px" style="line-height: normal;">
    <tr>
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
                    <td style="padding:0px !important"><b>{{strtoupper($data->peg_nama)}}</b></td>
                </tr>
                <tr>
                    <td style="padding:0px !important"><b>{{$data->peg_nip}}</b></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top" class="garis-t garis-l"><span class="pull-left">3.</span></td>
        <td valign="top" class="garis-t garis-r"><span class="pull-left">a. Pangkat dan Golongan</span></td>
        <td valign="top" class="garis-t garis-r">a. {{$data->PegGolongan->pangkat}} ({{$data->PegGolongan->gol}})</td>
    </tr>
    <tr>
        <td class="garis-l"></td>
        <td valign="top" class="garis-r"><span class="pull-left">b. Jabatan/Instansi</span></td>
        <td valign="top" class="garis-r">
            @if (strlen($data->PegUnitkerja->nama)>40)
            <div class="pull-left">
            @endif
                b.
                @if ($data->peg_jabatan<4)
                Kepala {{$data->PegUnitkerja->nama}}
                @else
                Staf {{$data->PegUnitkerja->nama}}
                @endif
            @if (strlen($data->PegUnitkerja->nama)>28)
            </div>
            @endif
        </td>
    </tr>
    <tr>
        <td class="garis-l"></td>
        <td class="garis-r"><span class="pull-left">c.	Tingkat biaya perjalanan dinas</span></td>
        <td class="garis-r">c. C</td>
    </tr>
    <tr>
        <td valign="top" class="garis-t garis-l"><span class="pull-left">4. </span></td>
        <td valign="top" class="garis-t garis-r"><span class="pull-left">Maksud perjalanan dinas</span></td>
        <td valign="top" class="garis-t garis-r">
            <div class="pull-left">
                {{$data->tugas}}
            </div>
        </td>
    </tr>
    <tr>
        <td class="garis-t garis-l"><span class="pull-left">5. </span></td>
        <td class="garis-t garis-r"><span class="pull-left">Alat angkutan yang dipergunakan</span></td>
        <td class="garis-t garis-r">{{$FlagKendaraan[$data->Spd->kendaraan]}}</td>
    </tr>
    <tr>
        <td class="garis-t garis-l"><span class="pull-left">6. </span></td>
        <td class="garis-t garis-r"><span class="pull-left">a. Tempat berangkat</span></td>
        <td class="garis-t garis-r">a. Mataram</td>
    </tr>
    <tr>
        <td class="garis-l"></td>
        <td class="garis-r"><span class="pull-left">b. Tempat tujuan</span></td>
        <td class="garis-r">b.
            @if ($data->Matrik->tipe_perjadin == 1)
                {{$data->Matrik->Tujuan->nama_kabkota}}
            @else
                @foreach ($data->Matrik->MultiTujuan as $t)
                    @if ($loop->last)
                     dan {{$t->namakabkota_tujuan}}
                    @else
                    {{$t->namakabkota_tujuan}},
                    @endif
                @endforeach
            @endif
        </td>
    </tr>
    <tr>
            <td class="garis-t garis-l"><span class="pull-left">7.</span></td>
            <td class="garis-t garis-r"><span class="pull-left">a. Lama perjalanan dinas</span></td>
            <td class="garis-t garis-r">a. {{$data->bnyk_hari}} ({{strtolower($Bilangan[$data->bnyk_hari])}}) Hari</td>
    </tr>
    <tr>
            <td class="garis-l"></td>
            <td class="garis-r">b. Tanggal berangkat</span></td>
            <td class="garis-r">b. {{ Tanggal::Panjang($data->tgl_brkt) }}</td>
    </tr>
    <tr>
            <td class="garis-l"></td>
            <td class="garis-r"><span class="pull-left">c.	Tanggal harus kembali / tiba di tempat baru</span></td>
            <td class="garis-r">c.  {{ Tanggal::Panjang($data->tgl_balik) }}</td>
    </tr>
    <tr>
        <td class="garis-t garis-l" height="20px"><span class="pull-left">8. </span></td>
        <td class="garis-t garis-r">
            <span class="pull-left">Pengikut</span>
            <span style="margin-left:120px"  class="pull-right">Nama</span>
        </td>
        <td class="garis-t garis-r" valign="top">
            <span style="margin-left:20px" class="pull-left">Tanggal Lahir</span><span style="margin-left:100px">Keterangan</span>
        </td>
    </tr>
    <tr>
        <td class="garis-t garis-l" height="30px">&nbsp;</td>
        <td class="garis-t garis-r">
            <div class="pull-left">
            1. <br />
            2.
            </div>
         </td>
        <td class="garis-t garis-r">&nbsp;</td>
    </tr>
    <tr>
        <td class="garis-t garis-l"><span class="pull-left">9. </span></td>
        <td class="garis-t garis-r">Pembebanan anggaran</td>
        <td class="garis-t garis-r"></td>
    </tr>
    <tr>
        <td class="garis-l"><span class="pull-left"></span></td>
        <td class="garis-r"><span class="pull-left">a. Instansi</span></td>
        <td class="garis-r">a. BADAN PUSAT STATISTIK</td>
    </tr>
    <tr>
        <td class="garis-l garis-b"><span class="pull-left"></span></td>
        <td class="garis-r garis-b"><span class="pull-left">b. Akun</span></td>
        <td class="garis-r garis-b">b. {{$data->Matrik->DanaAnggaran->mak}}</td>
    </tr>
    <tr>
        <td class="garis-b garis-l"><span class="pull-left">10. </span></td>
        <td class="garis-b garis-r"><span class="pull-left">Keterangan Lain-lain</span></td>
        <td class="garis-b garis-r">&nbsp;</td>
    </tr>
</table>

<div style="margin-top:10pt">
    <table width="100%" style="line-height: normal;">
            <tr>
                <td width="50%"></td>
                <td width="17%">Dikeluarkan di</td>
                <td width="3%">:</td>
                <td width="30%">Mataram</td>
            </tr>
            <tr>
                <td></td>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ Tanggal::Panjang($data->SuratTugas->tgl_surat) }}</td>
            </tr>
    </table>
</div>
<div style="margin-top:10pt">
    <table width="100%" >
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


