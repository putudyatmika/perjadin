@if ($item->flag_kuitansi==0)
<span class="label label-inverse">{{$FlagSrt[$item->flag_kuitansi]}}</span>
@elseif($item->flag_kuitansi==1)
<span class="label label-success">{{$FlagSrt[$item->flag_kuitansi]}}</span>
@else
<span class="label label-danger">{{$FlagSrt[$item->flag_kuitansi]}}</span>
@endif
