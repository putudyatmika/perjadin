<script>
$(document).ready(function() {
    var max_fields      = 5;
    var wrapper         = $(".gruptujuan");
    var add_button      = $(".tambahirow");

    var x = 1;
    $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++;
            $(wrapper).append('<div class="gruptujuan"><div class="form-group row">'+
                                            '<label for="nama" class="col-lg-2 col-xs-12 col-form-label">Tujuan</label>'+
                                            '<div class="input-group col-lg-7 col-sm-7 col-xs-12">'+
                                                '<div class="input-group-addon"><i class="ti-user"></i></div>'+
                                                '<input type="text" class="form-control" id="nama_tujuan['+x+']" name="nama_tujuan[]" placeholder="Tujuan" required readonly="">'+
                                                '<input id="kode_kabkota['+x+']" type="hidden" name="kode_kabkota[]" />'+
                                           ' <span class="input-group-btn">'+
                                                '<button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-idtujuan="'+x+'" data-target="#CariTujuanMulti"><i class="fa fa-search"></i></button>'+
                                            '</span>'+
                                            '</div>'+
                                            '<div class="col-lg-1 col-sm-1 col-xs-12">'+
                                                '<button type="button" id="kurangirow" class="btn waves-effect waves-light btn-danger kurangirow"><i class="fa fa-minus"></i></button>'+
                                            '</div></div>'); //add input box
        }
		else
		{
		alert('Maksimal 5 Tujuan')
		}
    });

    $(wrapper).on("click",".kurangirow", function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove();
        x--;
    });


});

$('#CariTujuanMulti').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
let x = button.data('idtujuan') // Extract info from data-* attributes
var modal = $(this)
modal.find('.modal-body #idtujuan').val(x)

$(document).on('click', '.pilihTujuanMulti', function (e) {
    var x = $("#idtujuan").val();
    document.getElementById("nama_tujuan["+x+"]").value = $(this).attr('data-tujuanmulti');
    document.getElementById("kode_kabkota["+x+"]").value = $(this).attr('data-kodekabkotamulti');
    $('#CariTujuanMulti').modal('hide');
});
});
</script>
