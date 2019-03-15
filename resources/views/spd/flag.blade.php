@if ($item->flag_spd==0)
<span class="label label-inverse">{{$FlagSrt[$item->flag_spd]}}</span>
@elseif($item->flag_spd==1)
<span class="label label-success">{{$FlagSrt[$item->flag_spd]}}</span>
@elseif($item->flag_spd==2)
<span class="label label-info">{{$FlagSrt[$item->flag_spd]}}</span>
@else
<span class="label label-danger">{{$FlagSrt[$item->flag_spd]}}</span>
@endif


