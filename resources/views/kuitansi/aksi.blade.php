@if ($item->Transaksi->Spd->flag_spd==1)
<a href="{{route('kuitansi.edit',$item->trx_id)}}" class="btn btn-success btn-rounded btn-sm" data-trxid="{{$item->Transaksi->trx_id}}" data-kodetrx="{{$item->Transaksi->kode_trx}}">Edit</a>
@endif
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#SPDModal">SPD</button>
<button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal" data-target="#SurattugasModal">Surat Tugas</button>
