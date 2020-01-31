<script>
$('#EditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var unit_id = button.data('unit_id') // Extract info from data-* attributes
    var kode = button.data('kode')
    var nama = button.data('nama')
    var eselon = button.data('eselon')
    
    var modal = $(this)
    modal.find('.modal-body #unit_id').val(unit_id)
    modal.find('.modal-body #kode').val(kode)
    modal.find('.modal-body #nama').val(nama)
    modal.find('.modal-body #eselon').val(eselon)
})
$('#HapusModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var unit_id = button.data('unit_id') // Extract info from data-* attributes
    var kode = button.data('kode')
    var nama = button.data('nama')
    var eselon = button.data('eselon')
    
    var modal = $(this)
    modal.find('.modal-body #unit_id').val(unit_id)
    modal.find('.modal-body #kode').val(kode)
    modal.find('.modal-body #kode').prop('readonly', true);
    modal.find('.modal-body #nama').val(nama)
    modal.find('.modal-body #nama').prop('readonly', true);
    modal.find('.modal-body #eselon').val(eselon)
    modal.find('.modal-body #eselon').prop('disabled', true);
})
</script>