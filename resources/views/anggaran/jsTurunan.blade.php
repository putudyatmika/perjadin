<script>
$('#EditAlokasiModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tid = button.data('tid')
  var paguawal = button.data('paguawal')
  var unitkerja = button.data('unitkode')

  var modal = $(this)
  modal.find('.modal-body #pagu_utama').val(paguawal)
  modal.find('.modal-body #unitkerja').val(unitkerja)
  modal.find('.modal-body #tid').val(tid)
})
</script>
