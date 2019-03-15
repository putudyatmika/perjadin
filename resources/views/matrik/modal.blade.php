<script>
$(document).on('click', '.pilihTujuan', function (e) {
    document.getElementById("nama_tujuan").value = $(this).attr('data-tujuan');
    document.getElementById("kode_kabkota").value = $(this).attr('data-kodekabkota');
    document.getElementById("nilaiTransport").value = $(this).attr('data-rate');
    $('#CariTujuan').modal('hide');
});

$(document).on('click', '.pilihSumberDana', function (e) {
    //var sumberdana = $(this).attr('data-mak') + " " + $(this).attr('data-uraian');
    document.getElementById("dana_makid").value = $(this).attr('data-makid');
    document.getElementById("dana_mak").value = $(this).attr('data-mak');
    document.getElementById("dana_uraian").value = $(this).attr('data-uraian');
    document.getElementById("dana_pagu").value = $(this).attr('data-pagu');
    document.getElementById("dana_kodeunit").value = $(this).attr('data-unitkerja');
    document.getElementById("dana_unitkerja").value = $(this).attr('data-namaunitkerja');
    document.getElementById("dana_pagusisa").value = $(this).attr('data-sisapagu');
    $('#SumberDana').modal('hide');
});

$(function () {
    $("#TabelSumberDana").dataTable();
});
</script>
