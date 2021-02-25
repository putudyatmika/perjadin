<!-- bila status transaksi sudah diajukan tombol ajukan mati--->
@if ($item->flag_trx<1)
    <!---cek apakah operator ato demo apa bukan--->
    @if (Auth::user()->user_level>1 && $item->flag_sudah_permintaan > 0)

        <!--- cek dulu --->
        @if (Auth::user()->pengelola>3)
            <button type="button" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#AjukanModal" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-tglawal="{{$item->Matrik->tgl_awal}}" data-tglakhir="{{$item->Matrik->tgl_akhir}}"><span data-toggle="tooltip" title="Ajukan transaksi dari {{$item->Matrik->UnitPelaksana->nama}}"><i class="fa fa-paper-plane"></i></span></button>
        @else
            <!----bukan pengelola cek unitkerjanya--->
            @if ((Auth::user()->user_unitkerja==$item->Matrik->UnitPelaksana->kode))
            <button type="button" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#AjukanModal" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->kode_trx}}" data-tglawal="{{$item->Matrik->tgl_awal}}" data-tglakhir="{{$item->Matrik->tgl_akhir}}"><span data-toggle="tooltip" title="Ajukan transaksi dari {{$item->Matrik->UnitPelaksana->nama}}"><i class="fa fa-paper-plane"></i></span></button>
            @endif
        @endif
    @endif
@endif
