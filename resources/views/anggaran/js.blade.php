<script>
$('#ViewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var anggaranid = button.data('anggaranid')

  $.ajax({
        url : '{{route("anggaran.turunan","")}}/'+anggaranid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){
            var pagu_utama = number_format(data.hasil.pagu_utama)
            var pagu_rencana = number_format(data.hasil.rencana_pagu)
            var pagu_sisa = number_format(data.hasil.pagu_utama - data.hasil.rencana_pagu);
            $('#ViewModal .modal-body #tahun_anggaran').text(data.hasil.tahun_anggaran)
            $('#ViewModal .modal-body #mak_anggaran').text(data.hasil.mak)
            $('#ViewModal .modal-body #uraian_anggaran').text(data.hasil.uraian)
            $('#ViewModal .modal-body #sm_anggaran').text("["+ data.hasil.unitkode +"] "+data.hasil.unitnama)
            $('#ViewModal .modal-body #pagu_utama').text(pagu_utama)
            $('#ViewModal .modal-body #pagu_rencana').text(pagu_rencana)
            $('#ViewModal .modal-body #pagu_sisa').text(pagu_sisa)
            
            $('#ViewModal .modal-footer #ViewAlokasi').attr("href","{{route('anggaran.alokasi','')}}/"+anggaranid)
            if (data.hasil.turunan_status==false) {
                $('#ViewModal .modal-body #tabelturunan tbody').html("<tr><td colspan='6' align='center'>Belum ada alokasi</td></tr>")
                $('#ViewModal .modal-body #tabelturunan tfoot').html("")
            }
            else {
                var tmax = data.hasil.t_jumlah;
                var i;
                var dTurunan = data.hasil.turunan;
                var text = "";
                var persen;
                for (i = 0; i < tmax; i++) {
                    persen = (dTurunan[i].t_paguawal/data.hasil.pagu_utama)*100;
                    text += "<tr><td>"+ dTurunan[i].no +"</td><td>" + dTurunan[i].t_unitnama + "</td><td>" + number_format(persen, 2) + "</td><td>" + number_format(dTurunan[i].t_paguawal) + "</td><td>" + number_format(dTurunan[i].t_pagurencana) + "</td><td>" + number_format(dTurunan[i].t_pagurealisasi) + "</td></tr>";
                }
                $('#ViewModal .modal-body #tabelturunan tbody').html(text)
                var tFooter = "<tr><th colspan='2'><center>Total</center></th><th>"+ data.hasil.total.persen +"</th><th>"+ data.hasil.total.pagu_awal +"</th><th>"+ data.hasil.total.pagu_rencana +"</th><th>"+ data.hasil.total.pagu_realisasi +"</th></tr>";
                $('#ViewModal .modal-body #tabelturunan tfoot').html(tFooter)
            }

        },
        error: function(){
            alert("error");
        }

    });
})

/*
$(document).ready(function(){

$('.turunan').click(function(){
  var id = this.id;
  var splitid = id.split('_');
  var anggaranid = splitid[1];

  // AJAX request
  $.ajax({
    url : '{{route("anggaran.turunan","")}}/'+anggaranid,
    method : 'get',
    dataType: 'json',
    success: function(data){
     // Add response in Modal body
     //$('.modal-body').html(result);
     //console.log(data)
     alert(data)
     // Display Modal
     //$('#ViewModal').modal('show');
   }
 });
});
});
*/
</script>
