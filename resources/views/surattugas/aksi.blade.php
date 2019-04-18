@if ($item->tgl_surat!=NULL and ($item->flag_surattugas!=3 and $item->flag_surattugas!=0) )
<a href="{{route('surattugas.view',$item->Transaksi->kode_trx)}}" class="btn btn-rounded btn-primary btn-sm">Cetak</a>
@endif
@if (($item->flag_surattugas<2 and Auth::user()->pengelola>3) or Auth::user()->pengelola==5)
<button type="button" class="btn btn-success btn-rounded btn-sm" data-toggle="modal" data-target="#EditModal" data-srtid="{{$item->srt_id}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-nama="{{$item->Transaksi->TabelPegawai->nama}}" data-tujuan="{{$item->Transaksi->Matrik->Tujuan->nama_kabkota}}" data-tugas="{{$item->Transaksi->tugas}}" data-nomor="{{$item->nomor_surat}}" data-ttd="{{$item->flag_ttd}}" data-ttdnip="{{$item->ttd_nip}}" data-tglsurat="{{$item->tgl_surat}}" data-tglbrkt="{{Tanggal::Panjang($item->Transaksi->tgl_brkt)}}" data-tglbalik="{{$item->Transaksi->tgl_brkt}}">Edit</button>
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#BatalModal" data-srtid="{{$item->srt_id}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-nama="{{$item->Transaksi->TabelPegawai->nama}}" data-tujuan="{{$item->Transaksi->Matrik->Tujuan->nama_kabkota}}" data-tugas="{{$item->Transaksi->tugas}}" data-tglsurat="{{$item->tgl_surat}}" data-tglbrkt="{{$item->Transaksi->tgl_brkt}}" data-tglbalik="{{$item->Transaksi->tgl_balik}}">Batalkan</button>
@endif

