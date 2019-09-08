@php
 $bulan = date('n');
 //$tahun = date('Y');
 $tahun = Session::get('tahun_anggaran');
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
        ykeys: ['a','b'],
        labels: ['Jumlah Perjalanan','Total biaya (Juta) '],
        barColors:['#D9AE79','#465973'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });

    Morris.Bar({
        element: 'chart-peg-top10',
        data: {!! Generate::ChartBarPegawaiTop10Tahun($tahun) !!},
        xkey: 'y',
        ykeys: ['a','b'],
        labels: ['Jumlah Perjalanan','Total biaya (Juta) '],
        barColors:['#53A668','#024059'],
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
