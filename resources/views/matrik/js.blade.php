<!-- Clock Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('tema/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script>
jQuery('#date-range').datepicker({
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true

    });

$('#lamanya').on('change paste keyup',function(e){

        var hari =  e.target.value;

        $('#harian').val(hari);
        $('#hotelhari').val(hari-1);

});
$('#uangharian').on('change paste keyup',function(e){

var uangharian =  $('#uangharian').val();
var harian = $('#harian').val();
var totalharian = uangharian*harian;
$('#totalharian').val(totalharian);

//untuk total biaya
/*
var totalhotel=$('#totalhotel').val();
var transport = $('#nilaiTransport').val();
var rill =  $('#pengeluaranrill').val(); */
var totalbiaya = parseInt($('#nilaiTransport').val())+ parseInt(totalharian) + parseInt($('#totalhotel').val()) + parseInt($('#pengeluaranrill').val());

    $('#totalbiaya').val(totalbiaya);


});

$('#nilaihotel').on('change paste keyup',function(e){

var nilaihotel =  $('#nilaihotel').val();
var hotelhari = $('#hotelhari').val();
var totalhotel = nilaihotel*hotelhari;
$('#totalhotel').val(totalhotel);

//untuk total biaya
/*
var totalhotel=$('#totalhotel').val();
var transport = $('#nilaiTransport').val();
var rill =  $('#pengeluaranrill').val(); */
var totalbiaya = parseInt($('#nilaiTransport').val())+ parseInt(totalhotel) + parseInt($('#totalharian').val()) + parseInt($('#pengeluaranrill').val());
$('#totalbiaya').val(totalbiaya);

});

$('#nilaiTransport').on('change paste keyup',function(e){

var transport =  $('#totalhotel').val()


//untuk total biaya
/*
var totalhotel=$('#totalhotel').val();
var transport = $('#nilaiTransport').val();
var rill =  $('#pengeluaranrill').val(); */
var totalbiaya = parseInt($('#totalhotel').val())+ parseInt(transport) + parseInt($('#totalharian').val()) + parseInt($('#pengeluaranrill').val());
$('#totalbiaya').val(totalbiaya);

});

$('#pengeluaranrill').on('change paste keyup',function(){

var rill =  $('#pengeluaranrill').val()


//untuk total biaya
/*
var totalhotel=$('#totalhotel').val();
var transport = $('#nilaiTransport').val();
var rill =  $('#pengeluaranrill').val(); */
var totalbiaya = parseInt($('#totalhotel').val())+ parseInt(rill) + parseInt($('#totalharian').val()) + parseInt($('#nilaiTransport').val());
$('#totalbiaya').val(totalbiaya);

});
</script>
