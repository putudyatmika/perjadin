<!-- bila status transaksi sudah diajukan tombol ajukan mati--->
@if ($item->flag_trx<1)
    <!---cek apakah operator ato demo apa bukan--->
    @if (Auth::user()->user_level>1)
        @php
            $tglawal = new DateTime($item->Matrik->tgl_awal);
            $tglskrg = new DateTime(); // tanggal sekarang berdasarkan tanggal di komputer
            $selisih = $tglskrg->diff($tglawal)->format("%a");
            if ($selisih>0) {
                $tglstart = '+'.$selisih.'d';
            }
            else {
                $tglstart = $selisih.'d';
            }
        @endphp
        <!--- cek dulu --->
        @if (Auth::user()->pengelola>3)
            <button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#AjukanModal" data-tujuan="{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-unitpelaksana="{{$item->Matrik->unit_pelaksana}}-{{$item->Matrik->UnitPelaksana->nama}}" data-tglawal="{{$item->Matrik->tgl_awal}}" data-tglakhir="{{$item->Matrik->tgl_akhir}}" data-infotgl="Pelaksanaan : {{Tanggal::Panjang($item->Matrik->tgl_awal)}} s/d {{Tanggal::Panjang($item->Matrik->tgl_akhir)}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-matrikid="{{$item->matrik_id}}" data-pegnip="{{$item->peg_nip}}" data-tglbrkt="{{$item->tgl_brkt}}" data-tglbalik="{{$item->tgl_balik}}" data-tugas="{{$item->tugas}}" data-tglstart="{{$tglstart}}">Ajukan</button>
        @else
            <!----bukan pengelola cek unitkerjanya--->
            @if ((Auth::user()->user_unitkerja==$item->Matrik->UnitPelaksana->kode))
            <button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#AjukanModal" data-tujuan="{{$item->Matrik->kodekab_tujuan}}-{{$item->Matrik->Tujuan->nama_kabkota}}" data-sm="{{$item->Matrik->dana_unitkerja}}-{{$item->Matrik->DanaUnitkerja->nama}}" data-biaya="@rupiah($item->Matrik->total_biaya)" data-unitpelaksana="{{$item->Matrik->unit_pelaksana}}-{{$item->Matrik->UnitPelaksana->nama}}" data-tglawal="{{$item->Matrik->tgl_awal}}" data-tglakhir="{{$item->Matrik->tgl_akhir}}" data-infotgl="Pelaksanaan : {{Tanggal::Panjang($item->Matrik->tgl_awal)}} s/d {{Tanggal::Panjang($item->Matrik->tgl_akhir)}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-kodetransaksi="{{$item->kode_trx}}" data-lamanya="{{$item->Matrik->lamanya}}" data-matrikid="{{$item->matrik_id}}" data-pegnip="{{$item->peg_nip}}" data-tglbrkt="{{$item->tgl_brkt}}" data-tglbalik="{{$item->tgl_balik}}" data-tugas="{{$item->tugas}}" data-tglstart="{{$tglstart}}">Ajukan</button>
            @endif
        @endif
    @endif
@endif
