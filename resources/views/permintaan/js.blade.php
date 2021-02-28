<script>
$('#DeleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var pid = button.data('pid')
  var totalbiaya = button.data('totalbiaya')
  var unitkode = button.data('unitkode')
  var unitnama = button.data('unitnama')
  var nomorsurat = button.data('nomorsurat')
  var tglsurat = button.data('tglsurat')
  var tglsuratnama = button.data('tglsuratnama')


  var modal = $(this)
  modal.find('.modal-body #pid').val(pid)
  modal.find('.modal-body #totalbiaya').val(totalbiaya)
  modal.find('.modal-body #unitkerja_kode').val(unitkode)
  modal.find('.modal-body #unitkerja_nama').val(unitnama)
  modal.find('.modal-body #nomor_surat').val(nomorsurat)
  modal.find('.modal-body #tgl_surat').val(tglsuratnama)
})
</script>
