@php
    if (Auth::user()->pengelola==1)
    {
        //flag kabid sm
        if (Auth::user()->user_unitkerja==$item->Matrik->DanaUnitkerja->kode) {
            $dataTarget='#KonfirmasiKabidModal';
            $dataFlag='data-flagkabid="'.$item->kabid_konfirmasi.'" data-flagket="'.$item->kabid_ket.'"';
            $tampil=1;
        }
        else {
            $dataTarget='';
            $dataFlag='';
            $tampil=0;
        }
    }
    elseif (Auth::user()->pengelola==2) {
        //flag ppk
        if ($item->kabid_konfirmasi==1) {
        $dataTarget='#KonfirmasiPPKModal';
        $dataFlag='data-flagppk="'.$item->ppk_konfirmasi.'" data-flagket="'.$item->ppk_ket.'"';
        $tampil=1;
        }
        else {
            //kabid belum setuju / sudah ditolak
            $dataTarget='';
            $dataFlag='';
            $tampil=0;
        }
    }
    elseif (Auth::user()->pengelola==3) {
        //flag kpa
        if ($item->ppk_konfirmasi==1) {
            $dataTarget='#KonfirmasiKPAModal';
            $dataFlag='data-flagkpa="'.$item->kpa_konfirmasi.'" data-flagket="'.$item->kpa_ket.'"';
            $tampil=1;
        }
        else {
            //ppk belum setuju / sudah ditolak
            $dataTarget='';
            $dataFlag='';
            $tampil=0;
        }
    }
    else {
        $dataTarget='';
        $dataFlag='';
        $tampil=0;
    }

@endphp
@if ($tampil==1)
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="{{$dataTarget}}" {!! $dataFlag !!} data-tujuan="{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-infotgl="{{$item->Matrik->tgl_awal}} s/d {{$item->Matrik->tgl_akhir}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-pegawai="{{$item->peg_nip}}-{{$peg_nama}}" data-tglbrkt="{{$item->tgl_brkt}}" data-tglbalik="{{$item->tgl_balik}}" data-matrikid="{{$item->matrik_id}}" data-tugas="{{$item->tugas}}" data-sumberdana="{{$item->Matrik->dana_mak}} - {{$item->Matrik->DanaAnggaran->uraian}}">Konfirmasi</button>
@endif
