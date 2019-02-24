<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script>
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

var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #matrikid').val(matrikid)
modal.find('.modal-body #kode_trx').val(kodetrx)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #lamanya').val(lamanya)
modal.find('.modal-body #peg_nip').val(pegnip)
modal.find('.modal-body #sm').val(sm)
modal.find('.modal-body #biaya').val(biaya)
modal.find('.modal-body #tglberangkat').val(tglbrkt)
modal.find('.modal-body #unitpelaksana').val(unitpelaksana)
modal.find('.modal-body #tugas').val(tugas)
modal.find('.modal-body #infotgl').text(infotgl)
});

$(".tglbrkt").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true
}).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();

});
</script>
