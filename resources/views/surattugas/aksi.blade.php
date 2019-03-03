@if ($item->flag_surattugas<2)
<button type="button" class="btn btn-success btn-rounded btn-sm" data-toggle="modal" data-target="#EditModal" data-srtid="{{$item->srt_id}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-nama="{{$item->Transaksi->TabelPegawai->nama}}" data-tujuan="{{$item->Transaksi->Matrik->Tujuan->nama_kabkota}}" data-tugas="{{$item->Transaksi->tugas}}" data-nomor="{{$item->nomor_surat}}" data-ttd="{{$item->flag_ttd}}" data-ttdnip="{{$item->ttd_nip}}" data-tglsurat="{{$item->tgl_surat}}" data-tglbrkt="" data-tglbalik="">Edit</button>
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#BatalModal">Batalkan</button>
@endif
