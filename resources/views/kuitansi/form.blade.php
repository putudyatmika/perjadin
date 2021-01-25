@php
$tgl_brkt = explode('-',$dataTransaksi->tgl_brkt);
$tgl_balik = explode('-',$dataTransaksi->tgl_balik);

$bln_brkt = (int)($tgl_brkt[1]);
$bln_balik = (int)($tgl_balik[1]);

$tgl_berangkat = (int)($tgl_brkt[2]) .' '.$Bulan[$bln_brkt].' '.$tgl_brkt[0];
$tgl_blk = (int)($tgl_balik[2]) .' '.$Bulan[$bln_balik].' '.$tgl_balik[0];

if ($dataTransaksi->Matrik->tipe_perjadin==1) 
{
    $nama_tujuan = $dataTransaksi->Matrik->Tujuan->nama_kabkota;
}
    
else 
{
    $i = 0;
    $nama_tujuan='';
    foreach ($dataTransaksi->Matrik->MultiTujuan as $t) {
        if ($i == count($dataTransaksi->Matrik->MultiTujuan)-1)
        {
            $nama_tujuan .= 'dan '.$t->namakabkota_tujuan;
        }
        else 
        {   
            $nama_tujuan .= $t->namakabkota_tujuan.', ';
        }
        $i = $i+1;
    }
}

if ($dataTransaksi->Spd->kendaraan==2) {
    $flag_req='';
 }
 else {
    $flag_req='required=""';
 }
if ($dataTransaksi->Kuitansi->flag_kuitansi==0) {
    //kuitansi masih kosong
    //harian
    $harian_rupiah = $dataTransaksi->Matrik->dana_harian;
    $harian_lama = $dataTransaksi->Matrik->lama_harian;
    $harian_total = $dataTransaksi->Matrik->total_harian;
    //biaya penginapan
    $hotel_rupiah = $dataTransaksi->Matrik->dana_hotel;
    $hotel_lama = $dataTransaksi->Matrik->lama_hotel;
    $hotel_total = $dataTransaksi->Matrik->total_hotel;
    $flag_jenisperjadin = $dataTransaksi->Matrik->jenis_perjadin;
    $txt_jenisperjadin = '';
    if ($dataTransaksi->Kuitansi->hotel_flag==0) {
        $hotel_flag = "";
    }
    else {
        $hotel_flag ="checked";
    }
    //biaya transportasi
    $transport_rupiah = $dataTransaksi->Matrik->dana_transport;
    if ($dataTransaksi->Spd->kendaraan==2) {
        $transport_ket = '';
    }
    else {
        $transport_ket = 'Transport dari Mataram ke '. $nama_tujuan;
    }

    if ($dataTransaksi->Kuitansi->transport_flag==0) {
        $transport_flag = "";
    }
    else {
        $transport_flag ="checked";
    }
     //pengeluaran rill 1
    $rill1_rupiah = $dataTransaksi->Matrik->pengeluaran_rill;
    $rill1_ket = "";
    if ($dataTransaksi->Kuitansi->rill1_flag==0) {
        $rill1_flag = "";
    }
    else {
        $rill1_flag ="checked";
    }
    //pengeluaran rill 2
    $rill2_rupiah = "";
    $rill2_ket = "";
    if ($dataTransaksi->Kuitansi->rill2_flag==0) {
        $rill2_flag = "";
    }
    else {
        $rill2_flag ="checked";
    }
    //pengeluaran rill 3
    $rill3_rupiah = '';
    $rill3_ket = '';
    if ($dataTransaksi->Kuitansi->rill3_flag==0) {
        $rill3_flag = "";
    }
    else {
        $rill3_flag ="checked";
    }
    //totalbiaya
    $totalbiaya = $dataTransaksi->Matrik->total_biaya;
}
else {
    //kuitansi sudah pernah di edit
    $harian_rupiah = $dataTransaksi->Kuitansi->harian_rupiah;
    $harian_lama = $dataTransaksi->Kuitansi->harian_lama;
    $harian_total = $dataTransaksi->Kuitansi->harian_total;
    //biaya penginapan
    $hotel_rupiah = $dataTransaksi->Kuitansi->hotel_rupiah;
    $hotel_lama = $dataTransaksi->Kuitansi->hotel_lama;
    $hotel_total = $dataTransaksi->Kuitansi->hotel_total;
    $flag_jenisperjadin = $dataTransaksi->Kuitansi->flag_jenisperjadin;
    $txt_jenisperjadin = $dataTransaksi->Kuitansi->txt_jenisperjadin;
    if ($dataTransaksi->Kuitansi->hotel_flag==0) {
        $hotel_flag = "";
    }
    else {
        $hotel_flag ="checked";
    }
    //biaya transport
    $transport_rupiah = $dataTransaksi->Kuitansi->transport_rupiah;
    $transport_ket = $dataTransaksi->Kuitansi->transport_ket;
    if ($dataTransaksi->Kuitansi->transport_flag==0) {
        $transport_flag = "";
    }
    else {
        $transport_flag ="checked";
    }
    //pengeluaran rill 1
    $rill1_rupiah = $dataTransaksi->Kuitansi->rill1_rupiah;
    $rill1_ket = $dataTransaksi->Kuitansi->rill1_ket;
    if ($dataTransaksi->Kuitansi->rill1_flag==0) {
        $rill1_flag = "";
    }
    else {
        $rill1_flag ="checked";
    }
    //pengeluaran rill 2
    $rill2_rupiah = $dataTransaksi->Kuitansi->rill2_rupiah;
    $rill2_ket = $dataTransaksi->Kuitansi->rill2_ket;
    if ($dataTransaksi->Kuitansi->rill2_flag==0) {
        $rill2_flag = "";
    }
    else {
        $rill2_flag ="checked";
    }
    //pengeluaran rill 3
    $rill3_rupiah = $dataTransaksi->Kuitansi->rill3_rupiah;
    $rill3_ket = $dataTransaksi->Kuitansi->rill3_ket;
    if ($dataTransaksi->Kuitansi->rill3_flag==0) {
        $rill3_flag = "";
    }
    else {
        $rill3_flag ="checked";
    }
    //totalbiaya
    $totalbiaya = $dataTransaksi->Kuitansi->total_biaya;
}
@endphp
<div class="form-group row">
<label for="nama" class="col-2 col-form-label">Nama Pegawai</label>
<div class="input-group col-8">
    <div class="input-group-addon"><i class="ti-user"></i></div>
    <input type="text" class="form-control" id="nama" name="nama" value="{{$dataTransaksi->peg_nama}}" placeholder="Tujuan" readonly="">
</div>
</div>
<div class="form-group row">
<label for="nama" class="col-2 col-form-label">Tujuan</label>
<div class="input-group col-8">
    <div class="input-group-addon"><i class="ti-user"></i></div>
    <input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" value="{!! $nama_tujuan !!}" placeholder="Tujuan" readonly="">
</div>
</div>
<div class="form-group row">
<label for="nama" class="col-2 col-form-label">Tugas</label>
<div class="input-group col-8">
    <div class="input-group-addon"><i class="ti-user"></i></div>
    <input type="text" class="form-control" id="tugas" name="tugas" value="{{$dataTransaksi->tugas}}" placeholder="Tugas" readonly="">

</div>
</div>
<div class="form-group row">
<label for="nama" class="col-2 col-form-label">Lamanya</label>
<div class="input-group col-8">
    <div class="input-group-addon"><i class="ti-user"></i></div>
    <input type="text" class="form-control" id="lamanya_text" name="lamanya_text"  value="{{$dataTransaksi->bnyk_hari}} Hari" placeholder="Banyak hari" readonly="">
    <input type="hidden" class="form-control" id="lamanya" name="lamanya"  value="{{$dataTransaksi->bnyk_hari}}" />
</div>
</div>
<div class="form-group row">
    <label for="Pelaksanaan" class="col-2 col-form-label">Pelaksanaan</label>
    <div class="input-group col-8 input-daterange" id="date-range">
        <div class="input-group-addon" ><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="tglawal" name="tglawal" placeholder="Tgl Awal" required="" value="{{$tgl_berangkat}}" readonly="">
        <span class="input-group-addon bg-info b-0 text-white">s/d</span>
        <input type="text" class="form-control" id="tglakhir" name="tglakhir" placeholder="Tgl Akhir" value="{{$tgl_blk}}" readonly="">
    </div>
</div>
<div class="form-group row">
    <label for="nama" class="col-2 col-form-label">Nomor Surat Tugas</label>
    <div class="input-group col-8">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="nomor_surattugas" name="nomor_surattugas"  value="{{$dataTransaksi->Surattugas->nomor_surat}}" placeholder="Nomor Surat Tugas" readonly="">
    </div>
</div>
<div class="form-group row">
    <label for="nama" class="col-2 col-form-label">Nomor SPD</label>
    <div class="input-group col-8">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="nomor_spd" name="nomor_spd"  value="{{$dataTransaksi->Spd->nomor_spd}}" placeholder="Nomor SPD" readonly="">
    </div>
</div>
<div class="form-group row">
    <label for="nama" class="col-2 col-form-label">Kendaraan</label>
    <div class="input-group col-8">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="kendaraan" name="kendaraan"  value="{{$FlagKendaraan[$dataTransaksi->Spd->kendaraan]}}" placeholder="Nomor SPD" readonly="">
    </div>
</div>
<h3 class="box-title m-t-40">Sumber Dana</h3>
<hr>
<div class="form-group row">
        <label for="MAK" class="col-2 col-form-label">MAK</label>
        <div class="input-group col-8">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="dana_mak" name="dana_mak" placeholder="MAK Dana" value="{{$dataTransaksi->Matrik->dana_mak}}" required="" readonly="">
        </div>
    </div>
    <div class="form-group row">
            <label for="dana_uraian" class="col-2 col-form-label">Uraian</label>
            <div class="input-group col-8">
                <div class="input-group-addon"><i class="ti-user"></i></div>
                <input type="text" class="form-control" id="dana_uraian" name="dana_uraian" placeholder="Uraian Dana" value="{{$dataTransaksi->Matrik->DanaAnggaran->uraian}}" readonly="">

            </div>
        </div>
            <div class="form-group row">
                <label for="dana_pagu" class="col-2 col-form-label">Pagu</label>
                <div class="input-group col-8">
                    <div class="input-group-addon"><i class="ti-user"></i></div>
                    <input type="text" class="form-control" id="dana_pagu" name="dana_pagu" placeholder="Pagu Dana" value="{{$dataTransaksi->Matrik->AnggaranTurunan->pagu_awal}}" readonly="">

                </div>
            </div>
            <div class="form-group row">
                <label for="dana_pagu" class="col-2 col-form-label">Sisa Pagu</label>
                <div class="input-group col-8">
                    <div class="input-group-addon"><i class="ti-user"></i></div>
                    <input type="text" class="form-control" id="dana_pagusisa" name="dana_pagusisa" placeholder="Sisa Pagu Dana" value="{{$dataTransaksi->Matrik->AnggaranTurunan->pagu_awal-$dataTransaksi->Matrik->AnggaranTurunan->pagu_realisasi}}" readonly="">

                </div>
            </div>
            <div class="form-group row">
                <label for="dana_unitkerja" class="col-2 col-form-label">Unitkerja</label>
                <div class="input-group col-8">
                    <div class="input-group-addon"><i class="ti-user"></i></div>
                    <input type="text" class="form-control" id="dana_unitkerja" name="dana_unitkerja" placeholder="Unitkerja Sumber Dana" value="{{$dataTransaksi->Matrik->DanaUnitkerja->nama}}" readonly="">

                </div>
            </div>
<h3 class="box-title m-t-40">Input Anggaran Biaya</h3>
<hr>
<div class="form-group row">
    <label for="jenisperjadin" class="col-2 col-form-label">Jenis Perjadin</label>
    <div class="input-group col-10">
     
            <div class="radio-list">
                <label class="radio-inline p-0">
                    <div class="radio radio-success">
                        <input type="radio" name="jenis_perjadin" id="jenis1" value="1" required @if ($flag_jenisperjadin==1) checked="checked" @endif>
                        <label for="jenis1" class="text-success">Biasa</label>
                    </div>
                </label>
                <label class="radio-inline">
                    <div class="radio radio-danger">
                        <input type="radio" name="jenis_perjadin" id="jenis2" value="2" @if ($flag_jenisperjadin==2) checked="checked" @endif>
                        <label for="jenis2" class="text-danger">Paket Meeting</label>
                    </div>
                </label>
            </div>
       
    </div>
</div>
<div class="form-group row">
        <label for="tgl_kuitansi" class="col-2 col-form-label">Tanggal Kuitansi</label>
        <div class="input-group col-3 input-daterange" id="date-range">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="tgl_kuitansi" name="tgl_kuitansi" placeholder="Tanggal kuitansi" required="" value="{{$dataTransaksi->Kuitansi->tgl_kuitansi}}" autocomplete="off">

        </div>
</div>
<div class="form-group row">
    <label for="nama" class="col-2 col-form-label">Uang Harian Perjalanan</label>
    <div class="input-group col-10">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="number" class="form-control" id="uangharian" name="uangharian" placeholder="Nilai Rp." value="{{$harian_rupiah}}" required="">
        <span class="input-group-addon bg-info b-0 text-white">x</span>
        <input type="number" class="form-control" id="harian" name="harian" placeholder="Lama hari" value="{{$harian_lama}}" @if ($flag_jenisperjadin==1) readonly="" @endif required="">
        <span class="input-group-addon bg-info b-0 text-white">=</span>
        <input type="number" class="form-control" id="totalharian" name="totalharian" placeholder="" value="{{$harian_total}}" readonly="">
    </div>
</div>
<div class="form-group row">
    <label for="nama" id="penginapan_nama" class="col-2 col-form-label">
        @if ($flag_jenisperjadin==1)
            Biaya Penginapan
        @else 
            Uang Harian
        @endif
    </label>
    <div class="input-group col-10">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        
        <input type="text" class="form-control" id="txt_jenisperjadin" name="txt_jenisperjadin" placeholder="Uang Harian Apa" value="{{$txt_jenisperjadin}}" @if ($flag_jenisperjadin==1) style="display:none;"  @endif>
        <span class="input-group-addon bg-info b-0 text-white" id="batas_txt_perjadin" @if ($flag_jenisperjadin==1) style="display:none;" @endif>:</span>
       
        <input type="number" class="form-control" id="nilaihotel" name="nilaihotel" placeholder="Nilai Hotel Rp." value="{{$hotel_rupiah}}" required="">
        <span class="input-group-addon bg-info b-0 text-white">x</span>
        <input type="number" class="form-control" id="hotelhari" name="hotelhari" placeholder="Lama hari" value="{{$hotel_lama}}" @if ($flag_jenisperjadin==1) readonly="" @endif required="">
        <span class="input-group-addon bg-info b-0 text-white">=</span>
        <input type="number" class="form-control" id="totalhotel" name="totalhotel" placeholder="" value="{{$hotel_total}}" readonly="">
        <span class="input-group-addon bg-danger b-0 text-white">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" id="hotel_cek" name="hotel_cek" value="1" {{$hotel_flag}}> Ada bukti dukung
            </label>

        </span>
    </div>
</div>
<div class="form-group row">
    <label for="nilaiTransport" class="col-2 col-form-label">Biaya Transport</label>
    <div class="input-group col-10">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="transport_ket" name="transport_ket" placeholder="Keterangan Transport" value="{{$transport_ket}}" {!! $flag_req !!}>
        <span class="input-group-addon bg-info b-0 text-white">=</span>
        <input type="number" class="form-control" id="nilaiTransport" name="nilaiTransport" placeholder="Nilai transport Rp." value="{{$transport_rupiah}}" {!! $flag_req !!} autocomplete="off">
        <span class="input-group-addon bg-warning b-0 text-white">
            <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="transport_cek" name="transport_cek" value="1" {{$transport_flag}}> Ada bukti dukung
                </label>

        </span>

    </div>
</div>
<div class="form-group row">
    <label for="pengeluaranrill" class="col-2 col-form-label">Pengeluaran Rill</label>
    <div class="input-group col-10">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <span class="input-group-addon bg-info b-0 text-white">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" id="rill_cek1" name="rill_cek1" value="1" {{$rill1_flag}}> Pilih
            </label>
        </span>
        <input type="text" class="form-control" id="rill_ket1" name="rill_ket1" placeholder="ket pengeluaran rill selain transport" value="{{$rill1_ket}}">
        <span class="input-group-addon bg-info b-0 text-white">=</span>
        <input type="number" class="form-control" id="rill1" name="rill1" placeholder="Nilai pengeluaran rill Rp." value="{{$rill1_rupiah}}">
    </div>
</div>
<div class="form-group row">
    <label for="pengeluaranrill" class="col-2 col-form-label">&nbsp;</label>
    <div class="input-group col-10">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <span class="input-group-addon bg-info b-0 text-white">
                <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="rill_cek2" name="rill_cek2" value="1" {{$rill2_flag}}> Pilih
                    </label>

            </span>
            <input type="text" class="form-control" id="rill_ket2" name="rill_ket2" placeholder="ket pengeluaran rill selain transport" value="{{$rill2_ket}}">
            <span class="input-group-addon bg-info b-0 text-white">=</span>
            <input type="number" class="form-control" id="rill2" name="rill2" placeholder="Nilai pengeluaran rill Rp." value="{{$rill2_rupiah}}">
    </div>
</div>
<div class="form-group row">
        <label for="pengeluaranrill" class="col-2 col-form-label">&nbsp;</label>
        <div class="input-group col-10">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <span class="input-group-addon bg-info b-0 text-white">
                    <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="rill_cek3" name="rill_cek3" value="1" {{$rill3_flag}}> Pilih
                        </label>

                </span>
                <input type="text" class="form-control" id="rill_ket3" name="rill_ket3" placeholder="ket pengeluaran rill selain transport" value="{{$rill3_ket}}">
                <span class="input-group-addon bg-info b-0 text-white">=</span>
                <input type="number" class="form-control" id="rill3" name="rill3" placeholder="Nilai pengeluaran rill Rp." value="{{$rill3_rupiah}}">
        </div>
    </div>
<div class="form-group row">
    <label for="totalbiaya" class="col-2 col-form-label">Total Kuitansi</label>
    <div class="input-group col-10">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="totalbiaya" name="totalbiaya" placeholder="Total Biaya" required="" readonly="" value="{{$totalbiaya}}"> </div>
</div>
<div class="form-group row">
    <label for="totalbiaya" class="col-2 col-form-label">Bendahara</label>
    <div class="input-group col-5">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="bendahara_nama" name="bendahara_nama" placeholder="Nama Bendahara" required="" readonly="" value="{{$Bendahara->nama}}">
        <input type="hidden" name="bendahara_nip" id="bendahara_nip" value="{{$Bendahara->nip_baru}}" />
    </div>
</div>
