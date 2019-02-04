<script src="{{asset('tema/js/validator.js')}}"></script>
<script>
    $('#EditModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var username = button.data('username') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var name = button.data('name')
  var email = button.data('email')
  var userlevel = button.data('userlevel')
  var pengelola = button.data('pengelola')
  var unitkode = button.data('unitkode')
  var userid = button.data('userid')

  var modal = $(this)
  modal.find('.modal-body #username').val(username)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #userlevel').val(userlevel)
  modal.find('.modal-body #pengelola').val(pengelola)
  modal.find('.modal-body #unitkerja').val(unitkode)
  modal.find('.modal-body #id').val(userid)
})

$('#GantiPassword').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var username = button.data('username') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var name = button.data('name')
  var userid = button.data('userid')

  var modal = $(this)
  modal.find('.modal-body #username').val(username)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #id').val(userid)
})

$('#DeleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var username = button.data('username') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var name = button.data('name')
  var email = button.data('email')
  var userlevel = button.data('userlevel')
  var pengelola = button.data('pengelola')
  var unitkode = button.data('unitkode')
  var userid = button.data('userid')

  var modal = $(this)
  modal.find('.modal-body #username').val(username)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #user_level').val(userlevel)
  modal.find('.modal-body #pengelola').val(pengelola)
  modal.find('.modal-body #unitkerja').val(unitkode)
  modal.find('.modal-body #id').val(userid)
})
</script>
