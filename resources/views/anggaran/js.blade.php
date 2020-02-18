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
            $('#ViewModal .modal-body #komponen').text("["+data.hasil.komponen_kode+"] "+data.hasil.komponen_nama)
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
});

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
$('#KunciModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tahun_anggaran = button.data('tahun') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var mak = button.data('mak')
  var uraian = button.data('uraian')
  var pagu = button.data('pagu')
  var unitkerja = button.data('unitkode')
  var anggaranid = button.data('anggaranid')
  var flag_kunci = button.data('kunci')
  if (flag_kunci == 0)
  {
      var btn_text = 'Kunci';
  }
  else {
      var btn_text = 'Buka kunci';
  }

  var modal = $(this)
  modal.find('.modal-body #tahun_anggaran').val(tahun_anggaran)
  modal.find('.modal-body #mak').val(mak)
  modal.find('.modal-body #uraian').val(uraian)
  modal.find('.modal-body #pagu_utama').val(pagu)
  modal.find('.modal-body #unitkerja').val(unitkerja)
  modal.find('.modal-body #anggaranid').val(anggaranid)
  modal.find('.modal-body #flag_kunci').val(flag_kunci)
  modal.find('.modal-footer #btn_tulisan').html(btn_text)
});
</script>
