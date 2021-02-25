@if ($item->flag_permintaan == 1)
    <span class="label label-info">{{$FlagForm[$item->flag_permintaan]}}</span>
@elseif ($item->flag_permintaan == 2)
    <span class="label label-primary">{{$FlagForm[$item->flag_permintaan]}}</span>
@elseif ($item->flag_permintaan == 3)
    <span class="label label-warning">{{$FlagForm[$item->flag_permintaan]}}</span>
@elseif ($item->flag_permintaan == 4)
    <span class="label label-success">{{$FlagForm[$item->flag_permintaan]}}</span>
@else
    <span class="label label-danger">{{$FlagForm[$item->flag_permintaan]}}</span>
@endif
