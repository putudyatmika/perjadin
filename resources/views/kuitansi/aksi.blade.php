@if ($item->tgl_kuitansi!=NULL and ($item->flag_spd!=3 and $item->flag_kuitansi!= 0 and $item->flag_kuitansi!= 3))
<a href="{{route('kuitansi.print',$item->Transaksi->kode_trx)}}" target="_blank" class="btn btn-circle btn-primary btn-sm"><span data-toggle="tooltip" title="Cetak kuitansi perjadin an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-print"></i></span></a>

<a href="{{route('kuitansi.unduh',$item->Transaksi->kode_trx)}}" target="_blank" class="btn btn-circle btn-warning btn-sm"><span data-toggle="tooltip" title="Download kuitansi perjadin an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-download"></i></span></a>
@endif

@if ((($item->flag_kuitansi==0 or $item->flag_kuitansi==1) and Auth::user()->pengelola>3) or Auth::user()->user_level == 5)
    @if (Carbon\Carbon::parse($item->Transaksi->tgl_balik) < Carbon\Carbon::today())
<a href="{{route('kuitansi.edit',$item->trx_id)}}" class="btn btn-success btn-circle btn-sm" data-trxid="{{$item->Transaksi->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}"><span data-toggle="tooltip" title="Edit Kuitansi an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-pencil"></i></span></a>
    @endif
@endif

@if ($item->flag_kuitansi==1 and Auth::user()->pengelola>3)
<button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#SelesaiModal" data-trxid="{{$item->Transaksi->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}"><span data-toggle="tooltip" title="Selesaikan Kuitansi an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-flag-checkered"></i></span></button>
@endif

@if (Auth::user()->pengelola==5)
<!--<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#FlagModal" data-trxid="{{$item->Transaksi->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}"><span data-toggle="tooltip" title="Edit Flag Kuitansi an. {{$item->Transaksi->peg_nama}}">Flag</span></button>-->
@endif
