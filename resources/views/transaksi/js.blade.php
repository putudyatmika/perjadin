<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script>

$("#tglberangkat").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true,
    startDate: $('#tglstart').val(),
    endDate: $('#tglstart').val()
}).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();

});
$('#AjukanModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var sm = button.data('sm')
var biaya = button.data('biaya')
var unitpelaksana = button.data('unitpelaksana')
var infotgl = button.data('infotgl')
var matrikid = button.data('matrikid')
var lamanya = button.data('lamanya')
var pegnip = button.data('pegnip')
var tglbrkt = button.data('tglbrkt')
var tugas = button.data('tugas')
var tglawal = button.data('tglawal')
var tglakhir = button.data('tglakhir')
var tglstart = button.data('tglstart')

var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
var firstDate = new Date(tglawal);
var today = new Date();
var diffDays = Math.round(Math.round((firstDate.getTime() - today.getTime()) / (oneDay)));
if (diffDays>0) {
  var diffDays = '+'+diffDays+'d';
}
else {
    var diffDays = diffDays + 'd';
}
var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #matrikid').val(matrikid)
modal.find('.modal-body #kode_trx').val(kodetrx)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #lamanya').val(lamanya)
modal.find('.modal-body #durasi').val(lamanya)
modal.find('.modal-body #peg_nip').val(pegnip)
modal.find('.modal-body #sm').val(sm)
modal.find('.modal-body #biaya').val(biaya)
modal.find('.modal-body #tglberangkat').val(tglbrkt)
modal.find('.modal-body #unitpelaksana').val(unitpelaksana)
modal.find('.modal-body #tugas').val(tugas)
modal.find('.modal-body #infotgl').text(infotgl)
modal.find('.modal-body #tglawal').val(tglawal)
modal.find('.modal-body #tglstart').val(diffDays)
modal.find('.modal-body #tglakhir').val(tglakhir)
modal.find('.modal-body #tglberangkat').data("date-start-date", tglstart)
});

$('#EditModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var sm = button.data('sm')
var biaya = button.data('biaya')
var unitpelaksana = button.data('unitpelaksana')
var infotgl = button.data('infotgl')
var matrikid = button.data('matrikid')
var lamanya = button.data('lamanya')
var pegnip = button.data('pegnip')
var tglbrkt = button.data('tglbrkt')
var tugas = button.data('tugas')
var tglawal = button.data('tglawal')
var tglakhir = button.data('tglakhir')
var tglstart = button.data('tglstart')
var kabid_konfirmasi = button.data('kabidkonfirmasi')
var ppk_konfirmasi = button.data('ppkkonfirmasi')
var kpa_konfirmasi = button.data('kpakonfirmasi')
var flag_transaksi = button.data('flagtransaksi')

var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
var firstDate = new Date(tglawal);
var today = new Date();
var diffDays = Math.round(Math.round((firstDate.getTime() - today.getTime()) / (oneDay)));
if (diffDays>0) {
  var diffDays = '+'+diffDays+'d';
}
else {
    var diffDays = diffDays + 'd';
}
var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #matrikid').val(matrikid)
modal.find('.modal-body #kode_trx').val(kodetrx)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #lamanya').val(lamanya)
modal.find('.modal-body #durasi').val(lamanya)
modal.find('.modal-body #peg_nip').val(pegnip)
modal.find('.modal-body #sm').val(sm)
modal.find('.modal-body #biaya').val(biaya)
modal.find('.modal-body #tglberangkat').val(tglbrkt)
modal.find('.modal-body #unitpelaksana').val(unitpelaksana)
modal.find('.modal-body #tugas').val(tugas)
modal.find('.modal-body #infotgl').text(infotgl)
modal.find('.modal-body #tglawal').val(tglawal)
modal.find('.modal-body #tglstart').val(diffDays)
modal.find('.modal-body #tglakhir').val(tglakhir)
modal.find('.modal-body #tglberangkat').data("date-start-date", tglstart)
modal.find('.modal-body #kabid_setuju').val(kabid_konfirmasi)
modal.find('.modal-body #ppk_setuju').val(ppk_konfirmasi)
modal.find('.modal-body #kpa_setuju').val(kpa_konfirmasi)
modal.find('.modal-body #flag_transaksi').val(flag_transaksi)
});
$(".select2").select2();

</script>
