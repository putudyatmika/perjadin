@if ($item->nomor_surat!=NULL and $item->nomor_spd!=NULL and ($item->flag_surattugas!=3 and $item->flag_surattugas!=0) )
<a href="{{route('kelengkapan.print',$item->Transaksi->kode_trx)}}" target="_blank" class="btn btn-circle btn-primary btn-sm"><span data-toggle="tooltip" title="Cetak kelengkapan perjadin an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-print"></i></span></a>

<a href="{{route('kelengkapan.unduh',$item->Transaksi->kode_trx)}}" target="_blank" class="btn btn-circle btn-warning btn-sm"><span data-toggle="tooltip" title="Download kelengkapan perjadin an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-download"></i></span></a>
@endif
@if (($item->flag_surattugas<2 and Auth::user()->pengelola>3) or Auth::user()->pengelola==5)
<button type="button" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#EditModal" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-tahun="{{$item->tahun_srt}}" data-tglend="{{Carbon\Carbon::parse($item->Transaksi->tgl_brkt)->subDays(1)->format('Y-m-d')}}"><span data-toggle="tooltip" title="Edit kelengkapan perjadin an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-pencil"></i></span></button>

<button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#BatalModal" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-tahun="{{$item->tahun_srt}}" data-tglend="{{Carbon\Carbon::parse($item->Transaksi->tgl_brkt)->subDays(1)->format('Y-m-d')}}"><span data-toggle="tooltip" title="Batalkan perjadin an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-times"></i></span></button>
@endif

