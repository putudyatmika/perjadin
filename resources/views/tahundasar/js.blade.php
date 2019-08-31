<script>
    $('#EditModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id')
      var tahun = button.data('tahun')
          
      var modal = $(this)
      modal.find('.modal-body #tahun_anggaran').val(tahun)
      modal.find('.modal-body #tahun_id').val(id)
    })
    
    $('#HapusModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id')
      var tahun = button.data('tahun')
          
      var modal = $(this)
      modal.find('.modal-body #tahun_anggaran').val(tahun)
      modal.find('.modal-body #tahun_id').val(id)
    })
    </script>