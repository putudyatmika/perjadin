<!-- Clock Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('tema/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script>
$("#tgl_kuitansi").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true,
    startDate: $('#tgl_start_kuitansi').val()
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
if ($('#rill_cek1').prop('checked') == true) {
    var rill1 = $('#rill1').val();
}
else {
    var rill1 = 0;
}
if ($('#rill_cek2').prop('checked') == true) {
    var rill2 = $('#rill2').val();
}
else {
    var rill2 = 0;
}
if ($('#rill_cek3').prop('checked') == true) {
    var rill3 = $('#rill3').val();
}
else {
    var rill3 = 0;
}
var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);

var totalbiaya = parseInt($('#nilaiTransport').val())+ parseInt(totalharian) + parseInt($('#totalhotel').val()) + parseInt(rill);

    $('#totalbiaya').val(totalbiaya);
});

$('#nilaihotel').on('change paste keyup',function(e){

var nilaihotel =  $('#nilaihotel').val();
var hotelhari = $('#hotelhari').val();
var totalhotel = nilaihotel*hotelhari;

if ($('#hotel_cek').prop('checked') == true) {
    $('#totalhotel').val(totalhotel);
}
else {
    var totalhotel = totalhotel*0.3;
    $('#totalhotel').val(totalhotel);
}

//untuk total biaya
/*
var totalhotel=$('#totalhotel').val();
var transport = $('#nilaiTransport').val();
var rill =  $('#pengeluaranrill').val(); */
if ($('#rill_cek1').prop('checked') == true) {
    var rill1 = $('#rill1').val();
}
else {
    var rill1 = 0;
}
if ($('#rill_cek2').prop('checked') == true) {
    var rill2 = $('#rill2').val();
}
else {
    var rill2 = 0;
}
if ($('#rill_cek3').prop('checked') == true) {
    var rill3 = $('#rill3').val();
}
else {
    var rill3 = 0;
}
var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);

var totalbiaya = parseInt($('#nilaiTransport').val())+ parseInt(totalhotel) + parseInt($('#totalharian').val()) + parseInt(rill);
$('#totalbiaya').val(totalbiaya);

});

$('#nilaiTransport').on('change paste keyup',function(e){

var transport =  $('#nilaiTransport').val();

//untuk total biaya
/*
var totalhotel=$('#totalhotel').val();
var transport = $('#nilaiTransport').val();
var rill =  $('#pengeluaranrill').val(); */
if ($('#rill_cek1').prop('checked') == true) {
    var rill1 = $('#rill1').val();
}
else {
    var rill1 = 0;
}
if ($('#rill_cek2').prop('checked') == true) {
    var rill2 = $('#rill2').val();
}
else {
    var rill2 = 0;
}
if ($('#rill_cek3').prop('checked') == true) {
    var rill3 = $('#rill3').val();
}
else {
    var rill3 = 0;
}
var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);

var totalbiaya = parseInt($('#totalhotel').val())+ parseInt(transport) + parseInt($('#totalharian').val()) + parseInt(rill);
$('#totalbiaya').val(totalbiaya);

});

/* jika pilihan di check / uncheck */
$('#rill_cek1').on('change', function() {
    //var rill1 = this.checked ? $('#rill1').val() : '0';
    if ($('#rill_cek1').prop('checked') == true) {
        var rill1 = $('#rill1').val();
        $('#rill_ket1').prop('required', true);
        $('#rill1').prop('required', true);
    }
    else {
        var rill1 = 0;
        $('#rill_ket1').prop('required', false);
        $('#rill1').prop('required', false);
    }

    if ($('#rill_cek2').prop('checked') == true) {
        var rill2 = $('#rill2').val();
    }
    else {
        var rill2 = 0;
    }
    if ($('#rill_cek3').prop('checked') == true) {
        var rill3 = $('#rill3').val();
    }
    else {
        var rill3 = 0;
    }
    var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);

    var totalbiaya = parseInt($('#totalhotel').val())+ parseInt($('#nilaiTransport').val()) + parseInt($('#totalharian').val()) + parseInt(rill);
    $('#totalbiaya').val(totalbiaya);
});
$('#rill_cek2').on('change', function() {
    //var rill2 = this.checked ? $('#rill2').val() : '0';
    if ($('#rill_cek2').prop('checked') == true) {
        var rill2 = $('#rill2').val();
        $('#rill_ket2').prop('required', true);
        $('#rill2').prop('required', true);
    }
    else {
        var rill2 = 0;
        $('#rill_ket2').prop('required', false);
        $('#rill2').prop('required', false);
    }

    if ($('#rill_cek1').prop('checked') == true) {
        var rill1 = $('#rill1').val();
    }
    else {
        var rill1 = 0;
    }
    if ($('#rill_cek3').prop('checked') == true) {
        var rill3 = $('#rill3').val();
    }
    else {
        var rill3 = 0;
    }
    var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);

    var totalbiaya = parseInt($('#totalhotel').val())+ parseInt($('#nilaiTransport').val()) + parseInt($('#totalharian').val()) + parseInt(rill);
    $('#totalbiaya').val(totalbiaya);
});
$('#rill_cek3').on('change', function() {
    //var rill3 = this.checked ? $('#rill3').val() : '0';
    if ($('#rill_cek3').prop('checked') == true) {
        var rill3 = $('#rill3').val();
        $('#rill_ket3').prop('required', true);
        $('#rill3').prop('required', true);
    }
    else {
        var rill3 = 0;
        $('#rill_ket3').prop('required', false);
        $('#rill3').prop('required', false);
    }

    if ($('#rill_cek1').prop('checked') == true) {
        var rill1 = $('#rill1').val();
    }
    else {
        var rill1 = 0;
    }
    if ($('#rill_cek2').prop('checked') == true) {
        var rill2 = $('#rill2').val();
    }
    else {
        var rill2 = 0;
    }
    var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);

    var totalbiaya = parseInt($('#totalhotel').val())+ parseInt($('#nilaiTransport').val()) + parseInt($('#totalharian').val()) + parseInt(rill);
    $('#totalbiaya').val(totalbiaya);
});
/* batas jika pilihan di check / uncheck */

/* jika nilai pengeluaran rill berubah*/
$('#rill1').on('change paste keyup',function(){
    if ($('#rill_cek1').prop('checked') == true) {
        var rill1 = $('#rill1').val();
    }
    else {
        var rill1 = 0;
    }
    if ($('#rill_cek2').prop('checked') == true) {
        var rill2 = $('#rill2').val();
    }
    else {
        var rill2 = 0;
    }
    if ($('#rill_cek3').prop('checked') == true) {
        var rill3 = $('#rill3').val();
    }
    else {
        var rill3 = 0;
    }
    var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);
    //untuk total biaya
    /*
    var totalhotel=$('#totalhotel').val();
    var transport = $('#nilaiTransport').val();
    var rill =  $('#pengeluaranrill').val(); */
    var totalbiaya = parseInt($('#totalhotel').val())+ parseInt(rill) + parseInt($('#totalharian').val()) + parseInt($('#nilaiTransport').val());
    $('#totalbiaya').val(totalbiaya);
});

$('#rill2').on('change paste keyup',function(){
    if ($('#rill_cek1').prop('checked') == true) {
        var rill1 = $('#rill1').val();
    }
    else {
        var rill1 = 0;
    }
    if ($('#rill_cek2').prop('checked') == true) {
        var rill2 = $('#rill2').val();
    }
    else {
        var rill2 = 0;
    }
    if ($('#rill_cek3').prop('checked') == true) {
        var rill3 = $('#rill3').val();
    }
    else {
        var rill3 = 0;
    }
    var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);
    //untuk total biaya
    /*
    var totalhotel=$('#totalhotel').val();
    var transport = $('#nilaiTransport').val();
    var rill =  $('#pengeluaranrill').val(); */
    var totalbiaya = parseInt($('#totalhotel').val())+ parseInt(rill) + parseInt($('#totalharian').val()) + parseInt($('#nilaiTransport').val());
    $('#totalbiaya').val(totalbiaya);
});

$('#rill3').on('change paste keyup',function(){
    if ($('#rill_cek1').prop('checked') == true) {
        var rill1 = $('#rill1').val();
    }
    else {
        var rill1 = 0;
    }
    if ($('#rill_cek2').prop('checked') == true) {
        var rill2 = $('#rill2').val();
    }
    else {
        var rill2 = 0;
    }
    if ($('#rill_cek3').prop('checked') == true) {
        var rill3 = $('#rill3').val();
    }
    else {
        var rill3 = 0;
    }
    var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);
    //untuk total biaya
    /*
    var totalhotel=$('#totalhotel').val();
    var transport = $('#nilaiTransport').val();
    var rill =  $('#pengeluaranrill').val(); */
    var totalbiaya = parseInt($('#totalhotel').val())+ parseInt(rill) + parseInt($('#totalharian').val()) + parseInt($('#nilaiTransport').val());
    $('#totalbiaya').val(totalbiaya);
});
/* batas nilai pengeluarna rill berubah */

$('#hotel_cek').on('change', function() {
    //var totalhotel = this.checked ? $('#rill1').val() : '0';
    var nilaihotel =  $('#nilaihotel').val();
    var hotelhari = $('#hotelhari').val();
    var totalhotel = nilaihotel*hotelhari;

    if ($('#hotel_cek').prop('checked') == true) {
        $('#totalhotel').val(totalhotel);
    }
    else {
        var totalhotel = totalhotel*0.3;
        $('#totalhotel').val(totalhotel);
    }

    if ($('#rill_cek1').prop('checked') == true) {
        var rill1 = $('#rill1').val();
    }
    else {
        var rill1 = 0;
    }
    if ($('#rill_cek2').prop('checked') == true) {
        var rill2 = $('#rill2').val();
    }
    else {
        var rill2 = 0;
    }
    if ($('#rill_cek3').prop('checked') == true) {
        var rill3 = $('#rill3').val();
    }
    else {
        var rill3 = 0;
    }
    var rill = parseInt(rill1) + parseInt(rill2) + parseInt(rill3);

    var totalbiaya = parseInt(totalhotel)+ parseInt($('#nilaiTransport').val()) + parseInt($('#totalharian').val()) + parseInt(rill);
    $('#totalbiaya').val(totalbiaya);
});
</script>

