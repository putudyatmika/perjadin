@php
 $bulan = date('n');
 $tahun = date('Y');
@endphp
<script>
    Morris.Bar({
        element: 'chart-bulan-depan',
        data: {!! Generate::ChartBarTahun($tahun) !!},
        xkey: 'y',
        ykeys: ['a','b'],
        labels: ['Jumlah Perjalanan ','Total biaya (Juta) '],
        barColors:['#fb9678','#00bfc7'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });

    Morris.Bar({
        element: 'chart-bidang-depan',
        data: {!! Generate::ChartBarBidangTahun($tahun) !!},
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Jumlah Perjalanan'],
        barColors:['#33FF64'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });

    Morris.Bar({
        element: 'chart-tujuan-depan',
        data: {!! Generate::ChartBarTujuan($tahun) !!},
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Jumlah Perjalanan'],
        barColors:['#00bfc7'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });
</script>
