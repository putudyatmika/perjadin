@if ($item->flag_surattugas==0)
<span class="label label-inverse">{{$FlagSrt[$item->flag_surattugas]}}</span>
@elseif($item->flag_surattugas==1)
<span class="label label-success">{{$FlagSrt[$item->flag_surattugas]}}</span>
@elseif($item->flag_surattugas==2)
<span class="label label-info">{{$FlagSrt[$item->flag_surattugas]}}</span>
@else
<span class="label label-danger">{{$FlagSrt[$item->flag_surattugas]}}</span>
@endif
<h5>
    <small>{{$item->created_at->diffForHumans()}}</small>
</h5>