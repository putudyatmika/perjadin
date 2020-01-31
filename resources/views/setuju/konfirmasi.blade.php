@php
    if (Auth::user()->pengelola==1)
    {
        //flag kabid sm
        if (Auth::user()->user_unitkerja==$item->Matrik->DanaUnitkerja->kode) {
            if ($item->kabid_konfirmasi==1) {
                $sm=0;
                $ppk=0;
                $kpa=0;
            }
            else {
                $sm=1;
                $ppk=0;
                $kpa=0;
            }
        }
        else {
            $sm=0;
            $ppk=0;
            $kpa=0;
        }
    }
    elseif (Auth::user()->pengelola==2) {
        //cek dulu apakah kabid sm jg

        //flag ppk
        if ($item->kabid_konfirmasi==1) {
            if ($item->ppk_konfirmasi==1) {
                $sm=0;
                $ppk=0;
                $kpa=0;
            }
            else {
                $sm=0;
                $ppk=1;
                $kpa=0;
            }
        }
        elseif (Auth::user()->user_unitkerja==$item->Matrik->DanaUnitkerja->kode) {
            if ($item->kabid_konfirmasi==1) {
                $sm=0;
                $ppk=0;
                $kpa=0;
            }
            else {
                $sm=1;
                $ppk=0;
                $kpa=0;
            }
        }
        else {
            //kabid belum setuju / sudah ditolak
            $sm=0;
            $ppk=0;
            $kpa=0;
        }
    }
    elseif (Auth::user()->pengelola==3) {
        //flag kpa
        if ($item->ppk_konfirmasi==1) {
            $sm=0;
            $ppk=0;
            $kpa=1;
        }
        else {
            //ppk belum setuju / sudah ditolak
            $sm=0;
            $ppk=0;
            $kpa=0;
        }
    }
    elseif (Auth::user()->pengelola==5) {
        $sm=1;
        $ppk=1;
        $kpa=1;
    }
    else {
        $sm=0;
        $ppk=0;
        $kpa=0;
    }

@endphp

@if ($sm==1)
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#KonfirmasiKabidModal" data-flagkabid="{{$item->kabid_konfirmasi}}" data-flagket="{{$item->kabid_ket}}" data-tujuan="{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-infotgl="{{$item->Matrik->tgl_awal}} s/d {{$item->Matrik->tgl_akhir}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-pegawai="{{$item->peg_nip}}-{{$item->peg_nama}}" data-tglbrkt="{{$item->tgl_brkt}}" data-tglbalik="{{$item->tgl_balik}}" data-matrikid="{{$item->matrik_id}}" data-tugas="{{$item->tugas}}" data-sumberdana="{{$item->Matrik->dana_mak}} - {{$item->Matrik->DanaAnggaran->uraian}}" data-tid="{{$item->Matrik->dana_tid}}" data-pagurencana="{{$item->Matrik->total_biaya}}" data-makid="{{$item->Matrik->mak_id}}">SM</button>
@endif
@if ($ppk==1)
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#KonfirmasiPPKModal" data-flagppk="{{$item->ppk_konfirmasi}}" data-flagket="{{$item->ppk_ket}}" data-tujuan="{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-infotgl="{{$item->Matrik->tgl_awal}} s/d {{$item->Matrik->tgl_akhir}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-pegawai="{{$item->peg_nip}}-{{$item->peg_nama}}" data-tglbrkt="{{$item->tgl_brkt}}" data-tglbalik="{{$item->tgl_balik}}" data-matrikid="{{$item->matrik_id}}" data-tugas="{{$item->tugas}}" data-sumberdana="{{$item->Matrik->dana_mak}} - {{$item->Matrik->DanaAnggaran->uraian}}" data-tid="{{$item->Matrik->dana_tid}}" data-pagurencana="{{$item->Matrik->total_biaya}}" data-makid="{{$item->Matrik->mak_id}}">PPK</button>
@endif
@if ($kpa==1)
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#KonfirmasiKPAModal" data-flagkpa="{{$item->kpa_konfirmasi}}" data-flagket="{{$item->kpa_ket}}" data-tujuan="{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-infotgl="{{$item->Matrik->tgl_awal}} s/d {{$item->Matrik->tgl_akhir}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-pegawai="{{$item->peg_nip}}-{{$item->peg_nama}}" data-tglbrkt="{{$item->tgl_brkt}}" data-tglbalik="{{$item->tgl_balik}}" data-matrikid="{{$item->matrik_id}}" data-tugas="{{$item->tugas}}" data-sumberdana="{{$item->Matrik->dana_mak}} - {{$item->Matrik->DanaAnggaran->uraian}}" data-tid="{{$item->Matrik->dana_tid}}" data-pagurencana="{{$item->Matrik->total_biaya}}" data-makid="{{$item->Matrik->mak_id}}">KPA</button>
@endif
