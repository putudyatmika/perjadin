<!-- Clock Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('tema/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script>

$(".tgllahir").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true
}).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();

});
$('#EditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var peg_id = button.data('pegid') // Extract info from data-* attributes
    var nip = button.data('nip')
    var nama = button.data('nama')
    var tgllahir = button.data('tgllahir')
    var jk = button.data('jk')
    var gol = button.data('gol')
    var unitkerja = button.data('unitkerja')
    var jabatan = button.data('jabatan')

    var modal = $(this)
    modal.find('.modal-body #peg_id').val(peg_id)
    modal.find('.modal-body #nipbaru').val(nip)
    modal.find('.modal-body #nama').val(nama)
    modal.find('.modal-body #tgllahir').val(tgllahir)
    modal.find('.modal-body #jk').val(jk)
    modal.find('.modal-body #gol').val(gol)
    modal.find('.modal-body #unitkerja').val(unitkerja)
    modal.find('.modal-body #jabatan').val(jabatan)
})
$('#DeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var peg_id = button.data('pegid') // Extract info from data-* attributes
    var nip = button.data('nip')
    var nama = button.data('nama')
    var unitkerja = button.data('unitkerja')

    var modal = $(this)
    modal.find('.modal-body #peg_id').val(peg_id)
    modal.find('.modal-body #nipbaru').val(nip)
    modal.find('.modal-body #nama').val(nama)
    modal.find('.modal-body #unitkerja').val(unitkerja)
})
$('#ViewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var pegid = button.data('pegid') // Extract info from data-* attributes
  var nama = button.data('nama')
  var nip = button.data('nip')
  var tgllahir = button.data('tgllahir')
  var gol = button.data('gol')
  var unitkerja = button.data('unitkerja')
  var jabatan = button.data('jabatan')
  var jk = button.data('jk')
  var bidang = button.data('bidang')

  var modal = $(this)
  modal.find('.modal-body #pegid').text(pegid)
  modal.find('.modal-body #nama').text(nama)
  modal.find('.modal-body #nip').text(nip)
  modal.find('.modal-body #tgllahir').text(tgllahir)
  modal.find('.modal-body #gol').text(gol)
  modal.find('.modal-body #unitkerja').text(unitkerja)
  modal.find('.modal-body #jabatan').text(jabatan)
  modal.find('.modal-body #jk').text(jk)
  modal.find('.modal-body #bidang').text(bidang)
})
</script>
