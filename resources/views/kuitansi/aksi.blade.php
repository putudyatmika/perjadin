@if ($item->tgl_kuitansi!=NULL and ($item->flag_spd!=3 and $item->flag_kuitansi!= 0 and $item->flag_kuitansi!= 3))
<a href="{{route('kuitansi.view',$item->Transaksi->kode_trx)}}" class="btn btn-circle btn-primary btn-sm"><span data-toggle="tooltip" title="Cetak kuitansi an. {{$item->Transaksi->TabelPegawai->nama}}"><i class="fa fa-print"></i></span></a>
@endif

@if (($item->flag_kuitansi==0 or $item->flag_kuitansi==1) and Auth::user()->pengelola>3)
<a href="{{route('kuitansi.edit',$item->trx_id)}}" class="btn btn-success btn-circle btn-sm" data-trxid="{{$item->Transaksi->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}"><span data-toggle="tooltip" title="Edit Kuitansi an. {{$item->Transaksi->TabelPegawai->nama}}"><i class="fa fa-pencil"></i></span></a>
@endif

@if ($item->flag_kuitansi==1 and Auth::user()->pengelola>3)
<button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#SelesaiModal"  data-kid="{{$item->kuitansi_id}}" data-pagu_realisasi="{{$item->total_biaya}}" data-tid="{{$item->Transaksi->Matrik->dana_tid}}" data-makid="{{$item->Transaksi->Matrik->mak_id}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-nama="{{$item->Transaksi->TabelPegawai->nama}}" data-tujuan="{{$item->Transaksi->Matrik->Tujuan->nama_kabkota}}" data-tugas="{{$item->Transaksi->tugas}}" data-tglkuitansi="{{Tanggal::Panjang($item->tgl_kuitansi)}}"  data-tglbrkt="{{Tanggal::Panjang($item->Transaksi->tgl_brkt)}}" data-tglbalik="{{Tanggal::Panjang($item->Transaksi->tgl_brkt)}}" data-totalbiaya="@rupiah($item->total_biaya)"><span data-toggle="tooltip" title="Selesaikan Kuitansi an. {{$item->Transaksi->TabelPegawai->nama}}"><i class="fa fa-flag-checkered"></i></span></button>
@endif

@if (Auth::user()->pengelola==5)
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#FlagModal"  data-kid="{{$item->kuitansi_id}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-nama="{{$item->Transaksi->TabelPegawai->nama}}" data-tujuan="{{$item->Transaksi->Matrik->Tujuan->nama_kabkota}}" data-tugas="{{$item->Transaksi->tugas}}" data-flagkuitansi="{{$item->flag_kuitansi}}">Flag</button>
@endif
