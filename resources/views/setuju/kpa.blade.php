@php
    if ($item->kpa_konfirmasi==0) {
        $btnWarna='btn-default';
        $iconNya='<i class="ti-help"></i>';
        $pesan='Menunggu Persetujuan';
    }
    elseif ($item->kpa_konfirmasi==1) {
        $btnWarna='btn-success';
        $iconNya='<i class="ti-check"></i>';
        $pesan='Disetujui';
    }
    elseif ($item->kpa_konfirmasi==2) {
        $btnWarna='btn-danger';
        $iconNya='<i class="ti-close"></i>';
        $pesan = $item->kpa_ket;
    }
@endphp
<button type="button"  class="btn btn-circle {!! $btnWarna !!}" data-toggle="tooltip" data-placement="top" title="{!! $pesan !!}">{!! $iconNya !!}</button>
