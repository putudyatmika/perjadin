<script>
$('#EditModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idprog = button.data('idprog')
  var namaprog = button.data('namaprog')
  var kodeprog = button.data('kodeprog')
  

  var modal = $(this)
  modal.find('.modal-body #prog_kode').val(kodeprog)
  modal.find('.modal-body #prog_nama').val(namaprog)
  modal.find('.modal-body #id_prog').val(idprog)
});

$('#DeleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idprog = button.data('idprog')
  var namaprog = button.data('namaprog')
  var kodeprog = button.data('kodeprog')
  

  var modal = $(this)
  modal.find('.modal-body #prog_kode').val(kodeprog)
  modal.find('.modal-body #prog_nama').val(namaprog)
  modal.find('.modal-body #id_prog').val(idprog)
});
</script>