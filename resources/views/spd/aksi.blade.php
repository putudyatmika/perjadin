@if ($item->Transaksi->SuratTugas->tgl_surat!=NULL and ($item->flag_spd!=3 and $item->flag_spd !=0))
<a href="{{route('spd.view',$item->Transaksi->kode_trx)}}" class="btn btn-rounded btn-primary btn-sm"><span data-toggle="tooltip" title="Cetak SPD an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-print"></i></span></a>
@endif

@if ($item->Transaksi->SuratTugas->flag_surattugas==1)
<button type="button" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#EditModal" data-spdid="{{$item->spd_id}}" data-trxid="{{$item->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}" data-nama="{{$item->Transaksi->peg_nama}}" data-tujuan="{{$item->Transaksi->Matrik->Tujuan->nama_kabkota}}" data-tugas="{{$item->Transaksi->tugas}}" data-nomor="{{$item->nomor_spd}}" data-ttd="{{$item->flag_ttd}}" data-ppknip="{{$item->ppk_nip}}" data-tglsurat="{{$item->Transaksi->SuratTugas->tgl_surat}}" data-kendaraan="{{$item->kendaraan}}" data-flagcetaktujuan="{{$item->flag_cetak_tujuan}}"><span data-toggle="tooltip" title="Edit SPD an. {{$item->Transaksi->peg_nama}}"><i class="fa fa-pencil"></i></span></button>
@endif
