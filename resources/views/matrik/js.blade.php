<script>
$('#ViewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var mid = button.data('mid')
  var user_unitkerja = button.data('userunitkerja')
  $.ajax({
        url : '{{route("matrik.view","")}}/'+mid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){

            $('#ViewModal .modal-body #tahun').text(data.hasil.tahun_matrik+" ("+mid+")")
            if (data.hasil.tipe_perjadin == 2)
            {
                //multi tujuan
                var teks ="";
                //var multi_tujuan = data.multi_tujuan;
                $('#ViewModal .modal-body #tujuan').html("");
                for (i = 0; i < data.bnyk_tujuan; i++)
                {
                    $('#ViewModal .modal-body #tujuan').append("["+ data.multi_tujuan[i].kodekab_tujuan +"] "+ data.multi_tujuan[i].namakabkota_tujuan+"<br />");
                }
                //$('#ViewModal .modal-body #tujuan').text(teks)
            }
            if (data.hasil.tipe_perjadin == 1)
            {
                $('#ViewModal .modal-body #tujuan').text("["+data.hasil.kode_kabkota+"] "+data.hasil.nama_kabkota)
            }
            $('#ViewModal .modal-body #lamanya').text(data.hasil.lamanya+" hari")
            if (data.hasil.t_id != null)
            {
                $('#ViewModal .modal-body #subjectmatter').text("["+data.hasil.dana_unitkode+"] "+data.hasil.dana_unitnama)
                $('#ViewModal .modal-body #komponen').text("["+data.hasil.komponen_kode+"] "+data.hasil.komponen_nama)
                $('#ViewModal .modal-body #mak').text(data.hasil.dana_mak)
            }
            if (data.hasil.pelaksana_unitkode != null)
            {
                $('#ViewModal .modal-body #pelaksana').text("["+ data.hasil.pelaksana_unitkode +"] "+data.hasil.pelaksana_unitnama)
            }
            $('#ViewModal .modal-body #program').text("["+data.hasil.prog_kode+"] "+data.hasil.prog_nama)
            $('#ViewModal .modal-body #kegiatan').text("["+data.hasil.keg_kode+"] "+data.hasil.keg_nama)
            $('#ViewModal .modal-body #kro').text("["+data.hasil.kro_kode+"] "+data.hasil.kro_nama)
            $('#ViewModal .modal-body #output').text("["+data.hasil.output_kode+"] "+data.hasil.output_nama)
            $('#ViewModal .modal-body #subkomponen').text("["+data.hasil.subkomponen_kode+"] "+data.hasil.subkomponen_nama)
            $('#ViewModal .modal-body #akun').text(data.hasil.akun_kode)
            $('#ViewModal .modal-body #uraian').text(data.hasil.uraian)
            $('#ViewModal .modal-body #pagu_rencana').text(data.hasil.pagu_rencana)
            $('#ViewModal .modal-body #totalbiaya').text("Rp. "+number_format(data.hasil.total_biaya))
            $('#ViewModal .modal-body #flag').text(data.flag)
            $('#ViewModal .modal-body #jenis').text(data.flag_jenisperjadin)
            $('#ViewModal .modal-body #waktu').text(data.tanggal)
            $('#ViewModal .modal-body #kendaraan').text(data.flag_kendaraan_nama)
            $('#ViewModal .modal-body #harian').text("> Harian : Rp. "+number_format(data.hasil.dana_harian)+" x "+data.hasil.lama_harian+" hari = Rp. "+number_format(data.hasil.total_harian))
            if (data.hasil.dana_transport != 0)
            {
                $('#ViewModal .modal-body #transport').text("> Transport : Rp. "+number_format(data.hasil.dana_transport))
            }
            if (data.hasil.total_hotel != 0)
            {
                $('#ViewModal .modal-body #hotel').text("> Penginapan : Rp. "+number_format(data.hasil.dana_hotel)+" x "+data.hasil.lama_hotel+" hari = Rp. "+number_format(data.hasil.total_hotel))
            }
            if (data.hasil.pengeluaran_rill != 0)
            {
                $('#ViewModal .modal-body #rill').text("> Pengeluaran Rill : Rp. "+number_format(data.hasil.pengeluaran_rill))
            }
            $('#ViewModal .modal-footer #EditMatrik').toggle(false);
            if (data.hasil.flag_matrik < 2 && data.hasil.dana_unitkerja==user_unitkerja)
            {
                $('#ViewModal .modal-footer #EditMatrik').toggle(true);
                $('#ViewModal .modal-footer #EditMatrik').attr("href","{{route('matrik.edit','')}}/"+mid)
            }


        },
        error: function(){
            alert("error");
        }

    });
});

$('#AlokasiModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var mid = button.data('mid')
  $.ajax({
        url : '{{route("matrik.view","")}}/'+mid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){

            $('#AlokasiModal .modal-body #tujuan').val("["+data.hasil.kode_kabkota+"] "+data.hasil.nama_kabkota)
            $('#AlokasiModal .modal-body #biaya').val("Rp. "+number_format(data.hasil.total_biaya))
            $('#AlokasiModal .modal-body #sm').val("["+data.hasil.turunan_unitkode+"] "+data.hasil.turunan_unitnama)
            $('#AlokasiModal .modal-body #mid').val(mid)
            $('#AlokasiModal .modal-body #unit_pelaksana').val(data.hasil.pelaksana_unitkode)

        },
        error: function(){
            alert("error");
        }

    });
});
$('#FlagModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var mid = button.data('mid')
  $.ajax({
        url : '{{route("matrik.view","")}}/'+mid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){

            $('#FlagModal .modal-body #tujuan').val("["+data.hasil.kode_kabkota+"] "+data.hasil.nama_kabkota)
            $('#FlagModal .modal-body #biaya').val("Rp. "+number_format(data.hasil.total_biaya))
            $('#FlagModal .modal-body #sm').val("["+data.hasil.dana_unitkode+"] "+data.hasil.dana_unitnama)
            $('#FlagModal .modal-body #pelaksana').val("["+data.hasil.pelaksana_unitkode+"] "+data.hasil.pelaksana_unitnama)
            $('#FlagModal .modal-body #mid').val(mid)
            $('#FlagModal .modal-body #flag_old').val(data.flag)

        },
        error: function(){
            alert("error");
        }

    });
});

$('#DeleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var mid = button.data('mid')
  var flagurl = button.data('flagurl')
  $.ajax({
        url : '{{route("matrik.view","")}}/'+mid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){

            $('#DeleteModal .modal-body #tujuan').val("["+data.hasil.kode_kabkota+"] "+data.hasil.nama_kabkota)
            $('#DeleteModal .modal-body #biaya').val("Rp. "+number_format(data.hasil.total_biaya))
            $('#DeleteModal .modal-body #sm').val("["+data.hasil.dana_unitkode+"] "+data.hasil.dana_unitnama)
            $('#DeleteModal .modal-body #pelaksana').val("["+data.hasil.pelaksana_unitkode+"] "+data.hasil.pelaksana_unitnama)
            $('#DeleteModal .modal-body #mid').val(mid)
            $('#DeleteModal .modal-body #flagmatrik').val(data.flag)
            $('#DeleteModal .modal-body #flagurl').val(flagurl)

        },
        error: function(){
            alert("error");
        }

    });
});
$('#jenis2').on('click change', function(e) {
    $('#harian').prop('readonly', false);
    $('#hotelhari').prop('readonly', false);
    $('#penginapan_nama').text('Uang Harian Fullboard/FullDay');
    $('#nilaihotel').attr("placeholder", "Harian Fullboard/FullDay");
});

$('#jenis1').on('click change', function(e) {
    $('#harian').prop('readonly', true);
    $('#hotelhari').prop('readonly', true);
    $('#penginapan_nama').text('Penginapan');
    $('#nilaihotel').attr("placeholder", "Nilai Hotel Rp.");
    var hari = $('#lamanya').val();
    $('#harian').val(hari);
    $('#hotelhari').val(hari-1);
    var uangharian =  $('#uangharian').val();
    var totalharian = uangharian*hari;
    $('#totalharian').val(totalharian);

    var nilaihotel =  $('#nilaihotel').val();
    var totalhotel = nilaihotel*(hari-1);
    $('#totalhotel').val(totalhotel);
    var totalbiaya = parseInt($('#nilaiTransport').val())+ parseInt(totalharian) + parseInt(totalhotel) + parseInt($('#pengeluaranrill').val());
    $('#totalbiaya').val(totalbiaya);
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

$('#hotelhari').on('change paste keyup',function(e){

var nilaihotel =  $('#nilaihotel').val();
var hotelhari = $('#hotelhari').val();
var totalhotel = nilaihotel*hotelhari;
$('#totalhotel').val(totalhotel);

//untuk total biaya
/*
var totalhotel=$('#totalhotel').val();
var transport = $('#nilaiTransport').val();
var rill =  $('#pengeluaranrill').val(); */
var totalbiaya = parseInt($('#nilaiTransport').val())+ parseInt(totalhotel) + parseInt(totalhotel) + parseInt($('#pengeluaranrill').val());
$('#totalbiaya').val(totalbiaya);

});

$('#nilaiTransport').on('change paste keyup',function(e){

var transport =  $('#nilaiTransport').val();


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
/*
jscript untuk tujuan dan sumberdana
*/
$(document).on('click', '.pilihTujuan', function (e) {
    document.getElementById("nama_tujuan").value = $(this).attr('data-tujuan');
    document.getElementById("kode_kabkota").value = $(this).attr('data-kodekabkota');
    document.getElementById("nilaiTransport").value = $(this).attr('data-rate');
    $('#CariTujuan').modal('hide');
});
$(document).on('click', '.pilihSumberDana', function (e) {
    //var sumberdana = $(this).attr('data-mak') + " " + $(this).attr('data-uraian');
    document.getElementById("dana_makid").value = $(this).attr('data-makid');
    document.getElementById("dana_tid").value = $(this).attr('data-tid');
    document.getElementById("dana_mak").value = $(this).attr('data-mak');
    document.getElementById("dana_program").value = $(this).attr('data-program');
    document.getElementById("dana_kegiatan").value = $(this).attr('data-kegiatan');
    document.getElementById("dana_kro").value = $(this).attr('data-kro');
    document.getElementById("dana_output").value = $(this).attr('data-output');
    document.getElementById("dana_komponen").value = $(this).attr('data-komponen');
    document.getElementById("dana_subkomponen").value = $(this).attr('data-subkomponen');
    document.getElementById("dana_uraian").value = $(this).attr('data-uraian');
    document.getElementById("dana_pagu").value = $(this).attr('data-pagu');
    document.getElementById("dana_kodeunit").value = $(this).attr('data-unitkerja');
    document.getElementById("dana_unitkerja").value = $(this).attr('data-namaunitkerja');
    document.getElementById("dana_pagusisa").value = $(this).attr('data-sisapagu');
    $('#SumberDana').modal('hide');
});
//batas tujuan dan sumber dana //
$(function () {
    $("#TabelSumberDana").dataTable();
});
</script>
