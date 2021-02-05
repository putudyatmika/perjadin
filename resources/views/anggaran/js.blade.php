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

$('#EditModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var aid = button.data('aid')

  $.ajax({
        url : '{{route("anggaran.cari","")}}/'+aid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){
            $('#EditModal .modal-body #tahun_anggaran').val(data.hasil.tahun_anggaran)
            $('#EditModal .modal-body #mak').val(data.hasil.mak)
            $('#EditModal .modal-body #prog_kode').val(data.hasil.prog_kode)
            $('#EditModal .modal-body #prog_nama').val(data.hasil.prog_nama)
            $('#EditModal .modal-body #keg_kode').val(data.hasil.keg_kode)
            $('#EditModal .modal-body #keg_nama').val(data.hasil.keg_nama)
            $('#EditModal .modal-body #kro_kode').val(data.hasil.kro_kode)
            $('#EditModal .modal-body #kro_nama').val(data.hasil.kro_nama)
            $('#EditModal .modal-body #output_kode').val(data.hasil.output_kode)
            $('#EditModal .modal-body #output_nama').val(data.hasil.output_nama)
            $('#EditModal .modal-body #komponen_kode').val(data.hasil.komponen_kode)
            $('#EditModal .modal-body #komponen_nama').val(data.hasil.komponen_nama)
            $('#EditModal .modal-body #subkomponen_kode').val(data.hasil.subkomponen_kode)
            $('#EditModal .modal-body #subkomponen_nama').val(data.hasil.subkomponen_nama)
            $('#EditModal .modal-body #akun_kode').val(data.hasil.akun_kode)
            $('#EditModal .modal-body #uraian').val(data.hasil.uraian)
            $('#EditModal .modal-body #pagu_utama').val(data.hasil.pagu_utama)
            $('#EditModal .modal-body #pagu_rencana').val(data.hasil.rencana_pagu)
            $('#EditModal .modal-body #unitkerja').val(data.hasil.unitkerja)
            $('#EditModal .modal-body #anggaranid').val(aid)
            
           

        },
        error: function(){
            alert("error");
        }

    });
});

$('#TambahAnggaranModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
    $('#prog_kode_anggaran').change(function(){
        var prog_kode = $('#prog_kode_anggaran').val();
        $.ajax({
                url : '{{route("pok.kegbyprogcari",["",""])}}/'+prog_kode+'/2',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {     
                    var jumlah = data.jumlah;
                    $('#TambahAnggaranModal .modal-body #keg_kode_anggaran').html("");
                    $('#TambahAnggaranModal .modal-body #keg_kode_anggaran').append('<option value="">Pilih Kegiatan</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#TambahAnggaranModal .modal-body #keg_kode_anggaran').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                    }
                    
                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
    $('#keg_kode_anggaran').change(function(){
        var prog_kode = $('#prog_kode_anggaran').val();
        var keg_kode = $('#keg_kode_anggaran').val();
        $.ajax({
                url : '{{route("pok.krobyprogkegcari",["",""])}}/'+prog_kode+'/'+keg_kode,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {     
                    if (data.status == true)
                    {
                      var jumlah = data.jumlah;
                      $('#TambahAnggaranModal .modal-body #kro_kode_anggaran').html("");
                      $('#TambahAnggaranModal .modal-body #kro_kode_anggaran').append('<option value="">Pilih KRO</option>');
                      for (i = 0; i < jumlah; i++) {
                          $('#TambahAnggaranModal .modal-body #kro_kode_anggaran').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
                      }
                      $('#TambahAnggaranModal .modal-body #kro_kode_anggaran').attr('readonly',false)
                      $('#TambahAnggaranModal .modal-body #kro_kode_anggaran').attr('required',true)
                    }
                    else 
                    {
                      $('#TambahAnggaranModal .modal-body #kro_kode_anggaran').html("");
                      $('#TambahAnggaranModal .modal-body #kro_kode_anggaran').append('<option value="">Tidak ada KRO</option>');
                      $('#TambahAnggaranModal .modal-body #kro_kode_anggaran').attr('readonly',true)
                      $('#TambahAnggaranModal .modal-body #kro_kode_anggaran').attr('required',false)
                      $.ajax({
                            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+prog_kode+'/'+keg_kode+'/0',
                            method : 'get',
                            cache: false,
                            dataType: 'json',
                            success: function(data) {     
                                if (data.status == true)
                                {
                                  var jumlah = data.jumlah;
                                  $('#TambahAnggaranModal .modal-body #output_kode_anggaran').html("");
                                  $('#TambahAnggaranModal .modal-body #output_kode_anggaran').append('<option value="">Pilih Output</option>');
                                  for (i = 0; i < jumlah; i++) {
                                      $('#TambahAnggaranModal .modal-body #output_kode_anggaran').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                                  }
                                  $('#TambahAnggaranModal .modal-body #output_kode_anggaran').attr('readonly',false)
                                  $('#TambahAnggaranModal .modal-body #output_kode_anggaran').attr('required',true)
                                }
                                else 
                                {
                                  $('#TambahAnggaranModal .modal-body #output_kode_anggaran').html("");
                                  $('#TambahAnggaranModal .modal-body #output_kode_anggaran').append('<option value="">Tidak ada Output</option>');
                                  $('#TambahAnggaranModal .modal-body #output_kode_anggaran').attr('readonly',true)
                                  $('#TambahAnggaranModal .modal-body #output_kode_anggaran').attr('required',false)
                                }
                                
                            },
                            error: function(){
                                alert("error data output");
                            }

                        });
                    }
                    
                },
                error: function(){
                    alert("error data kro");
                }

            });
    });
    $('#output_kode_anggaran').change(function(){
        var prog_kode = $('#prog_kode_anggaran').val();
        var keg_kode = $('#keg_kode_anggaran').val();
        var output_kode = $('#output_kode_anggaran').val();
        $.ajax({
                url : '{{route("pok.kompbyoutput",["","","",""])}}/'+prog_kode+'/'+keg_kode+'/'+output_kode+'/2',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {     
                    if (data.status == true)
                    {
                        $('#TambahAnggaranModal .modal-body #komponen_kode_anggaran').html("");
                        $('#TambahAnggaranModal .modal-body #komponen_kode_anggaran').append('<option value="">Pilih Komponen</option>');
                        for (i = 0; i < data.jumlah; i++) {
                            $('#TambahAnggaranModal .modal-body #komponen_kode_anggaran').append('<option value="'+ data.hasil[i].kode_komponen +'">['+ data.hasil[i].kode_komponen +'] '+ data.hasil[i].nama_komponen +'</option>');
                        }
                        $('#TambahAnggaranModal .modal-body #komponen_kode_anggaran').attr('readonly',false)
                        $('#TambahAnggaranModal .modal-body #komponen_kode_anggaran').attr('required',true)
                    }
                    else 
                    {
                        $('#TambahAnggaranModal .modal-body #komponen_kode_anggaran').html("");
                        $('#TambahAnggaranModal .modal-body #komponen_kode_anggaran').append('<option value="">Tidak ada Komponen</option>');
                        $('#TambahAnggaranModal .modal-body #komponen_kode_anggaran').attr('readonly',true)
                        $('#TambahAnggaranModal .modal-body #komponen_kode_anggaran').attr('required',false)
                    }

                    
                    
                },
                error: function(){
                    alert("error data Komponen");
                }

            });
    });
    $('#komponen_kode_anggaran').change(function(){
        var prog_kode = $('#prog_kode_anggaran').val();
        var keg_kode = $('#keg_kode_anggaran').val();
        var output_kode = $('#output_kode_anggaran').val();
        var komponen_kode = $('#komponen_kode_anggaran').val();
        $.ajax({
                url : '{{route("pok.subkombykomponen",["","","",""])}}/'+prog_kode+'/'+keg_kode+'/'+output_kode+'/'+komponen_kode,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {     
                    if (data.status == true)
                    {
                        $('#TambahAnggaranModal .modal-body #subkomponen_kode_anggaran').html("");
                        $('#TambahAnggaranModal .modal-body #subkomponen_kode_anggaran').append('<option value="">Pilih Sub Komponen</option>');
                        for (i = 0; i < data.jumlah; i++) {
                            $('#TambahAnggaranModal .modal-body #subkomponen_kode_anggaran').append('<option value="'+ data.hasil[i].kode_subkomponen +'">['+ data.hasil[i].kode_subkomponen +'] '+ data.hasil[i].nama_subkomponen +'</option>');
                        }
                        $('#TambahAnggaranModal .modal-body #subkomponen_kode_anggaran').attr('readonly',false)
                        $('#TambahAnggaranModal .modal-body #subkomponen_kode_anggaran').attr('required',true)
                    }
                    else 
                    {
                        $('#TambahAnggaranModal .modal-body #subkomponen_kode_anggaran').html("");
                        $('#TambahAnggaranModal .modal-body #subkomponen_kode_anggaran').append('<option value="">Tidak ada Sub Komponen</option>');
                        $('#TambahAnggaranModal .modal-body #subkomponen_kode_anggaran').attr('readonly',true)
                        $('#TambahAnggaranModal .modal-body #subkomponen_kode_anggaran').attr('required',false)
                    }

                    
                    
                },
                error: function(){
                    alert("error data subKomponen");
                }

            });
    });
});

$('#TambahModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #FormTambahAnggaran')[0].reset();
});
</script>
