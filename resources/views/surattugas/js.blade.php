<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script>
$(".tglsurat").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true,
    startDate: $('#minHari').val(),
    endDate: $('#maxHari').val()
}).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();

});
function tambahNol(x){
   y=(x>9)?(x>99)?x:'0'+x:'00'+x;
   return y;
}
$('#EditModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var srtid = button.data('srtid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var nama = button.data('nama')
var tglsrt = button.data('tglsurat')
var tglbrkt = button.data('tglbrkt')
var tugas = button.data('tugas')
var nomor = button.data('nomor')
var ttd = button.data('ttd')
var ttdnip = button.data('ttdnip')
if (nomor === "") {
var Tanggal = new Date();
var srttugas = 'B-'+ tambahNol(srtid) +'/BPS/52510/'+ (Tanggal.getMonth()+1) + '/' + Tanggal.getFullYear()
}
else {
    var srttugas = nomor
}
var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #srtid').val(srtid)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #nama').val(nama)
modal.find('.modal-body #tglsurat').val(tglsrt)
modal.find('.modal-body #tgl_pergi').val(tglbrkt)
modal.find('.modal-body #tugas').val(tugas)
modal.find('.modal-body #nomor_surat').val(srttugas)
modal.find('.modal-body #ttd').val(ttd)
modal.find('.modal-body #ttd_pejabat').val(ttdnip)
});

$('#BatalModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var srtid = button.data('srtid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var nama = button.data('nama')
var tugas = button.data('tugas')
var tgl_brkt = button.data('tglbrkt')
var tgl_balik = button.data('tglbalik')

var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #srtid').val(srtid)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #nama').val(nama)
modal.find('.modal-body #tugas').val(tugas)
modal.find('.modal-body #tgl_brkt').val(tgl_brkt)
modal.find('.modal-body #tgl_balik').val(tgl_balik)
});

$('#ViewModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var srtid = button.data('srtid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var nama = button.data('nama')
var nip = button.data('nip')
var tglsrt = button.data('tglsurat')
var tugas = button.data('tugas')
var nomor = button.data('nomor')
var tgl_brkt = button.data('tglbrkt')
var tgl_balik = button.data('tglbalik')
var ttd = button.data('ttd')
var status = button.data('status')
var lamanya = button.data('lamanya')

var modal = $(this)
modal.find('.modal-body #kode_trx').text(kodetrx)
modal.find('.modal-body #tujuan').text(tujuan)
modal.find('.modal-body #nama').text(nama)
modal.find('.modal-body #nip').text(nip)
modal.find('.modal-body #tglsurat').text(tglsrt)
modal.find('.modal-body #tugas').text(tugas)
modal.find('.modal-body #nomor_surat').text(nomor)
modal.find('.modal-body #tgl_brkt').text(tgl_brkt)
modal.find('.modal-body #tgl_balik').text(tgl_balik)
modal.find('.modal-body #ttd').text(ttd)
modal.find('.modal-body #status').text(status)
modal.find('.modal-body #lamanya').text(lamanya)
});
</script>
