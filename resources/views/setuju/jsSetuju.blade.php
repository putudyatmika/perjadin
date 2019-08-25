<script>
$('#KonfirmasiKabidModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var sm = button.data('sm')
var biaya = button.data('biaya')
var infotgl = button.data('infotgl')
var pegawai = button.data('pegawai')
var lamanya = button.data('lamanya')
var lamanya = lamanya + ' Hari'
var tglbrkt = button.data('tglbrkt')
var tglbalik = button.data('tglbalik')
var flagkabid = button.data('flagkabid')
var flagket = button.data('flagket')
var matrikid = button.data('matrikid')
var tugas = button.data('tugas')
var sumberdana = button.data('sumberdana')
var tid = button.data('tid')
var pagurencana = button.data('pagurencana')
var makid = button.data('makid')

var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #matrikid').val(matrikid)
modal.find('.modal-body #kode_trx').text(kodetrx)
modal.find('.modal-body #tujuan').text(tujuan)
modal.find('.modal-body #lamanya').text(lamanya)
modal.find('.modal-body #nama').text(pegawai)
modal.find('.modal-body #subjectmatter').text(sm)
modal.find('.modal-body #totalbiaya').text(biaya)
modal.find('.modal-body #tgl_brkt').text(tglbrkt)
modal.find('.modal-body #tgl_balik').text(tglbalik)
modal.find('.modal-body #tgl_pelaksanaan').text(infotgl)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #tglberangkat').val(tglbrkt)
modal.find('.modal-body #ket_kabid').val(flagket)
modal.find('input[name="kabidsm_setuju"][value="'+flagkabid+'"]').prop('checked',true)
modal.find('.modal-body #tugas').text(tugas)
modal.find('.modal-body #sumberdana').text(sumberdana)
modal.find('.modal-body #penugasan').val(tugas)
modal.find('.modal-body #dana_tid').val(tid)
modal.find('.modal-body #pagu_rencana').val(pagurencana)
modal.find('.modal-body #mak_id').val(makid)
});

$('#KonfirmasiPPKModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var sm = button.data('sm')
var biaya = button.data('biaya')
var infotgl = button.data('infotgl')
var pegawai = button.data('pegawai')
var lamanya = button.data('lamanya')
var lamanya = lamanya + ' Hari'
var tglbrkt = button.data('tglbrkt')
var tglbalik = button.data('tglbalik')
var flagppk = button.data('flagppk')
var flagket = button.data('flagket')
var matrikid = button.data('matrikid')
var tugas = button.data('tugas')
var sumberdana = button.data('sumberdana')
var tid = button.data('tid')
var pagurencana = button.data('pagurencana')
var makid = button.data('makid')

var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #matrikid').val(matrikid)
modal.find('.modal-body #kode_trx').text(kodetrx)
modal.find('.modal-body #tujuan').text(tujuan)
modal.find('.modal-body #lamanya').text(lamanya)
modal.find('.modal-body #nama').text(pegawai)
modal.find('.modal-body #subjectmatter').text(sm)
modal.find('.modal-body #totalbiaya').text(biaya)
modal.find('.modal-body #tgl_brkt').text(tglbrkt)
modal.find('.modal-body #tgl_balik').text(tglbalik)
modal.find('.modal-body #tgl_pelaksanaan').text(infotgl)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #tglberangkat').val(tglbrkt)
modal.find('.modal-body #ket_ppk').val(flagket)
modal.find('input[name="ppk_setuju"][value="'+flagppk+'"]').prop('checked',true)
modal.find('.modal-body #tugas').text(tugas)
modal.find('.modal-body #sumberdana').text(sumberdana)
modal.find('.modal-body #penugasan').val(tugas)
modal.find('.modal-body #dana_tid').val(tid)
modal.find('.modal-body #pagu_rencana').val(pagurencana)
modal.find('.modal-body #mak_id').val(makid)
});

$('#KonfirmasiKPAModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var sm = button.data('sm')
var biaya = button.data('biaya')
var infotgl = button.data('infotgl')
var pegawai = button.data('pegawai')
var lamanya = button.data('lamanya')
var lamanya = lamanya + ' Hari'
var tglbrkt = button.data('tglbrkt')
var tglbalik = button.data('tglbalik')
var flagkpa = button.data('flagkpa')
var flagket = button.data('flagket')
var matrikid = button.data('matrikid')
var tugas = button.data('tugas')
var sumberdana = button.data('sumberdana')
var tid = button.data('tid')
var pagurencana = button.data('pagurencana')
var makid = button.data('makid')

var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #matrikid').val(matrikid)
modal.find('.modal-body #kode_trx').text(kodetrx)
modal.find('.modal-body #tujuan').text(tujuan)
modal.find('.modal-body #lamanya').text(lamanya)
modal.find('.modal-body #nama').text(pegawai)
modal.find('.modal-body #subjectmatter').text(sm)
modal.find('.modal-body #totalbiaya').text(biaya)
modal.find('.modal-body #tgl_brkt').text(tglbrkt)
modal.find('.modal-body #tgl_balik').text(tglbalik)
modal.find('.modal-body #tgl_pelaksanaan').text(infotgl)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #tglberangkat').val(tglbrkt)
modal.find('.modal-body #ket_kpa').val(flagket)
modal.find('input[name="kpa_setuju"][value="'+flagkpa+'"]').prop('checked',true)
modal.find('.modal-body #tugas').text(tugas)
modal.find('.modal-body #penugasan').val(tugas)
modal.find('.modal-body #sumberdana').text(sumberdana)
modal.find('.modal-body #dana_tid').val(tid)
modal.find('.modal-body #pagu_rencana').val(pagurencana)
modal.find('.modal-body #mak_id').val(makid)
});

$('#ViewModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var sm = button.data('sm')
var biaya = button.data('biaya')
var infotgl = button.data('infotgl')
var pegawai = button.data('pegawai')
var lamanya = button.data('lamanya')
var lamanya = lamanya + ' Hari'
var tglbrkt = button.data('tglbrkt')
var tglbalik = button.data('tglbalik')
var flagkpa = button.data('flagkpa')
var flagket = button.data('flagket')
var matrikid = button.data('matrikid')
var tugas = button.data('tugas')
var sumberdana = button.data('sumberdana')
var pelaksana = button.data('pelaksana')
var flagmatrik = button.data('flagmatrik')
var flagtransaksi = button.data('flagtransaksi')
var harian = button.data('harian')
var transport = button.data('transport')
var rill = button.data('rill')
var hotel = button.data('hotel')
var flagket = button.data('flagket')

var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #matrikid').val(matrikid)
modal.find('.modal-body #kode_trx').text(kodetrx)
modal.find('.modal-body #tujuan').text(tujuan)
modal.find('.modal-body #lamanya').text(lamanya)
modal.find('.modal-body #nama').text(pegawai)
modal.find('.modal-body #subjectmatter').text(sm)
modal.find('.modal-body #totalbiaya').text(biaya)
modal.find('.modal-body #tgl_brkt').text(tglbrkt)
modal.find('.modal-body #tgl_balik').text(tglbalik)
modal.find('.modal-body #tgl_pelaksanaan').text(infotgl)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #tglberangkat').val(tglbrkt)
modal.find('.modal-body #ket_kpa').val(flagket)
modal.find('input[name="kpa_setuju"][value="'+flagkpa+'"]').prop('checked',true)
modal.find('.modal-body #tugas').text(tugas)
modal.find('.modal-body #sumberdana').text(sumberdana)
modal.find('.modal-body #pelaksana').text(pelaksana)
modal.find('.modal-body #flagmatrik').text(flagmatrik)
modal.find('.modal-body #flagtransaksi').text(flagtransaksi)
modal.find('.modal-body #harian').text(harian)
modal.find('.modal-body #transport').text(transport)
modal.find('.modal-body #rill').text(rill)
modal.find('.modal-body #hotel').text(hotel)
modal.find('.modal-body #flagket').text(flagket)
});

$('#kabid2').on('change', function() {
    //var rill1 = this.checked ? $('#rill1').val() : '0';
    if ($('#kabid2').prop('checked') == true) {
        $('#ket_kabid').prop('required', true);
    }
    else {
       $('#ket_kabid').prop('required', false);
    }
});
$('#kabid1').on('change', function() {
   $('#ket_kabid').prop('required', false);
});

$('#ppk2').on('change', function() {

    if ($('#ppk2').prop('checked') == true) {
        $('#ket_ppk').prop('required', true);
    }
    else {
       $('#ket_ppk').prop('required', false);
    }
});

$('#ppk1').on('change', function() {
   $('#ket_ppk').prop('required', false);
});

$('#kpa2').on('change', function() {

    if ($('#kpa2').prop('checked') == true) {
        $('#ket_kpa').prop('required', true);
    }
    else {
       $('#ket_kpa').prop('required', false);
    }
});
$('#kpa1').on('change', function() {
   $('#ket_kpa').prop('required', false);
});
</script>
