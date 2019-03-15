@if ($item->Transaksi->SuratTugas->tgl_surat!=NULL and ($item->flag_spd!=3 and $item->flag_spd!=0) )
<a href="{{route('spd.view',$item->Transaksi->kode_trx)}}" class="btn btn-rounded btn-primary btn-sm">Cetak</a>
@endif
@if ($item->Transaksi->SuratTugas->flag_surattugas==1)
<button type="button" class="btn btn-success btn-rounded btn-sm" data-toggle="modal" data-target="#EditModal" data-spdid="{{$item->spd_id}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-nama="{{$item->Transaksi->TabelPegawai->nama}}" data-tujuan="{{$item->Transaksi->Matrik->Tujuan->nama_kabkota}}" data-tugas="{{$item->Transaksi->tugas}}" data-nomor="{{$item->nomor_spd}}" data-ttd="{{$item->flag_ttd}}" data-ppknip="{{$item->ppk_nip}}" data-tglsurat="{{$item->Transaksi->SuratTugas->tgl_surat}}" data-kendaraan="{{$item->kendaraan}}">Edit</button>
@endif