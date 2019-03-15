@if ($item->tgl_kuitansi!=NULL and ($item->flag_spd!=3 and $item->flag_kuitansi!= 0 and $item->flag_kuitansi!= 3))
<a href="{{route('kuitansi.view',$item->Transaksi->kode_trx)}}" class="btn btn-rounded btn-primary btn-sm">Cetak</a>
@endif

@if ($item->Transaksi->Spd->flag_spd==1 and Auth::user()->pengelola>3)
<a href="{{route('kuitansi.edit',$item->trx_id)}}" class="btn btn-success btn-rounded btn-sm" data-trxid="{{$item->Transaksi->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}">Edit</a>
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#SelesaiModal"  data-kid="{{$item->kuitansi_id}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-nama="{{$item->Transaksi->TabelPegawai->nama}}" data-tujuan="{{$item->Transaksi->Matrik->Tujuan->nama_kabkota}}" data-tugas="{{$item->Transaksi->tugas}}" data-tglkuitansi="{{Tanggal::Panjang($item->tgl_kuitansi)}}"  data-tglbrkt="{{Tanggal::Panjang($item->Transaksi->tgl_brkt)}}" data-tglbalik="{{Tanggal::Panjang($item->Transaksi->tgl_brkt)}}" data-totalbiaya="@rupiah($item->total_biaya)">Selesai</button>
@endif
@if (Auth::user()->pengelola==5)
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#FlagModal"  data-kid="{{$item->kuitansi_id}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-nama="{{$item->Transaksi->TabelPegawai->nama}}" data-tujuan="{{$item->Transaksi->Matrik->Tujuan->nama_kabkota}}" data-tugas="{{$item->Transaksi->tugas}}" data-flagkuitansi="{{$item->flag_kuitansi}}">Flag</button>
@endif
