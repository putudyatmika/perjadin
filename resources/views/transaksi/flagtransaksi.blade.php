@if ($item->flag_trx==0)
<span class="label label-inverse">{{$FlagTrx[$item->flag_trx]}}</span>
@elseif ($item->flag_trx==1)
<span class="label label-info">{{$FlagTrx[$item->flag_trx]}}</span>
@elseif ($item->flag_trx==2)
<span class="label label-warning">{{$FlagTrx[$item->flag_trx]}}</span>
@elseif ($item->flag_trx==3)
<span class="label label-danger">{{$FlagTrx[$item->flag_trx]}}</span>
@elseif ($item->flag_trx==4 or $item->flag_trx==5)
<span class="label label-primary">{{$FlagTrx[$item->flag_trx]}}</span>
@elseif ($item->flag_trx==6)
<span class="label label-success">{{$FlagTrx[$item->flag_trx]}}</span>
@elseif ($item->flag_trx==7)
<span class="label label-info">{{$FlagTrx[$item->flag_trx]}}</span>
@endif
<h5>
    <small>{{$item->updated_at->diffForHumans()}}</small>
</h5>
