@php
    if ($item->kabid_konfirmasi==2) {
        $flag_ket='(Kabid SM : '.$item->kabid_ket.')';
    }
    else {
        $flag_ket='';
    }
    if ($item->ppk_konfirmasi==2) {
        $flag_ket='(PPK: '.$item->ppk_ket.')';
    }

    if ($item->kpa_konfirmasi==2) {
        $flag_ket='(KPA: '.$item->kpa_ket.')';
    }

@endphp
<a href="#" data-toggle="modal" data-target="#ViewModal" data-tujuan="@if (isset($item->Matrik->Tujuan->nama_kabkota)) {{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}} @endif" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-infotgl="{{Tanggal::Panjang($item->Matrik->tgl_awal)}} s/d {{Tanggal::Panjang($item->Matrik->tgl_akhir)}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-pegawai="{{$peg_nama}}-{{$item->peg_nip}}" data-tglbrkt="@if ($item->tgl_brkt) {{Tanggal::Panjang($item->tgl_brkt)}} @endif" data-tglbalik="@if ($item->tgl_balik) {{Tanggal::Panjang($item->tgl_balik)}} @endif" data-matrikid="{{$item->matrik_id}}" data-tugas="{{$item->tugas}}" data-sumberdana="{{$item->Matrik->dana_mak}} - {{$item->Matrik->DanaAnggaran->uraian}}" data-komponen="[{{$item->Matrik->DanaAnggaran->komponen_kode}}] {{$item->Matrik->DanaAnggaran->komponen_nama}}" data-pelaksana="{{$item->Matrik->unit_pelaksana}}-{{$item->Matrik->UnitPelaksana->nama}}" data-flagmatrik="{{$MatrikFlag[$item->Matrik->flag_matrik]}}" data-flagtransaksi="{{$FlagTrx[$item->flag_trx]}}" data-flagket="{{$flag_ket}}" data-harian="Harian : @duit($item->Matrik->dana_harian) x {{$item->Matrik->lama_harian}} hari = @rupiah($item->Matrik->total_harian)" data-transport="Transport : @rupiah($item->Matrik->dana_transport)" data-rill="Pengeluaran Rill : @rupiah($item->Matrik->pengeluaran_rill)" data-hotel="Hotel : @duit($item->Matrik->dana_hotel) x {{$item->Matrik->lama_hotel}} hari = @rupiah($item->Matrik->total_hotel)">{{$item->kode_trx}}</a>
