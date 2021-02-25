@if ($item->Matrik->Transaksi->flag_trx==0)
<span class="label label-inverse">{{$FlagTrx[$item->Matrik->Transaksi->flag_trx]}}</span>
@elseif ($item->Matrik->Transaksi->flag_trx==1)
<span class="label label-info">{{$FlagTrx[$item->Matrik->Transaksi->flag_trx]}}</span>
@elseif ($item->Matrik->Transaksi->flag_trx==2)
<span class="label label-warning">{{$FlagTrx[$item->Matrik->Transaksi->flag_trx]}}</span>
@elseif ($item->Matrik->Transaksi->flag_trx==3)
<span class="label label-danger">{{$FlagTrx[$item->Matrik->Transaksi->flag_trx]}}</span>
@elseif ($item->Matrik->Transaksi->flag_trx==4 or $item->Matrik->Transaksi->flag_trx==5)
<span class="label label-primary">{{$FlagTrx[$item->Matrik->Transaksi->flag_trx]}}</span>
@elseif ($item->Matrik->Transaksi->flag_trx==6)
<span class="label label-success">{{$FlagTrx[$item->Matrik->Transaksi->flag_trx]}}</span>
@elseif ($item->Matrik->Transaksi->flag_trx==7)
<span class="label label-info">{{$FlagTrx[$item->Matrik->Transaksi->flag_trx]}}</span>
@endif
