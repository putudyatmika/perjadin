@php
    if ($item->kabid_konfirmasi==0) {
        $btnWarna='btn-default';
        $iconNya='<i class="ti-help"></i>';
    }
    elseif ($item->kabid_konfirmasi==1) {
        $btnWarna='btn-success';
        $iconNya='<i class="ti-check"></i>';
    }
    elseif ($item->kabid_konfirmasi==2) {
        $btnWarna='btn-danger';
        $iconNya='<i class="ti-close"></i>';
    }
@endphp
@if (Auth::user()->user_level>3)
<a href="#" class="btn btn-circle {!! $btnWarna !!}" data-toggle="modal" data-target="#KonfirmasiKabidModal" data-tujuan="{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-infotgl="{{$item->Matrik->tgl_awal}} s/d {{$item->Matrik->tgl_akhir}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-pegawai="{{$item->peg_nip}}-{{$peg_nama}}" data-tglbrkt="{{$item->tgl_brkt}}" data-tglbalik="{{$item->tgl_balik}}" data-flagkabid="{{$item->kabid_konfirmasi}}" data-flagket="{{$item->kabid_ket}}" data-matrikid="{{$item->matrik_id}}" data-tugas="{{$item->tugas}}" data-sumberdana="{{$item->Matrik->dana_mak}} - {{$item->Matrik->DanaAnggaran->uraian}}">{!! $iconNya !!}</a>
@else
<a href="#" class="btn btn-circle {!! $btnWarna !!}">{!! $iconNya !!}</a>
@endif
