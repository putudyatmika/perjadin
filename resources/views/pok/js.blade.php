<script>
$('#EditModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idprog = button.data('idprog')
  var namaprog = button.data('namaprog')
  var kodeprog = button.data('kodeprog')


  var modal = $(this)
  modal.find('.modal-body #prog_kode').val(kodeprog)
  modal.find('.modal-body #prog_nama').val(namaprog)
  modal.find('.modal-body #id_prog').val(idprog)
});

$('#DeleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idprog = button.data('idprog')
  var namaprog = button.data('namaprog')
  var kodeprog = button.data('kodeprog')


  var modal = $(this)
  modal.find('.modal-body #prog_kode').val(kodeprog)
  modal.find('.modal-body #prog_nama').val(namaprog)
  modal.find('.modal-body #id_prog').val(idprog)
});

$('#EditKegModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idkeg = button.data('idkeg')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var namakeg = button.data('namakeg')
  var flagkro = button.data('flagkro')

  var modal = $(this)
  modal.find('.modal-body #prog_kode').val(kodeprog)
  modal.find('.modal-body #keg_kode').val(kodekeg)
  modal.find('.modal-body #keg_nama').val(namakeg)
  modal.find('.modal-body #idkeg').val(idkeg)
  modal.find('.modal-body #flag_kro').val(flagkro)
});

$('#DeleteKegModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idkeg = button.data('idkeg')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var namakeg = button.data('namakeg')
  var flagkro = button.data('flagkro')

  var modal = $(this)
  modal.find('.modal-body #prog_kode').val(kodeprog)
  modal.find('.modal-body #keg_kode').val(kodekeg)
  modal.find('.modal-body #keg_nama').val(namakeg)
  modal.find('.modal-body #idkeg').val(idkeg)
  modal.find('.modal-body #flag_kro').val(flagkro)
});

$('#TambahKroModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  $('#prog_kode_kro').change(function(){
        var prog_kode_kro = $('#prog_kode_kro').val();
        $.ajax({
                url : '{{route("pok.kegbyprogcari",["",""])}}/'+prog_kode_kro+'/1',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    var jumlah = data.jumlah;
                    $('#TambahKroModal .modal-body #keg_kode_kro').html("");
                    $('#TambahKroModal .modal-body #keg_kode_kro').append('<option value="">Pilih Kegiatan</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#TambahKroModal .modal-body #keg_kode_kro').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                    }
                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
});

$('#TambahKroModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #TambahKroForm')[0].reset();
});

$('#EditKroModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var idkro = button.data('idkro')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var kodekro = button.data('kodekro')
  var namakro = button.data('namakro')

  $.ajax({
          url : '{{route("pok.kegbyprogcari",["",""])}}/'+kodeprog+'/1',
          method : 'get',
          cache: false,
          dataType: 'json',
          success: function(data) {
              var jumlah = data.jumlah;
              $('#EditKroModal .modal-body #prog_kode_editkro').val(kodeprog);
              $('#EditKroModal .modal-body #kro_kode').val(kodekro);
              $('#EditKroModal .modal-body #kro_nama').val(namakro);
              $('#EditKroModal .modal-body #idkro').val(idkro);
              $('#EditKroModal .modal-body #keg_kode_editkro').html("");
              $('#EditKroModal .modal-body #keg_kode_editkro').append('<option value="">Pilih Kegiatan</option>');
              for (i = 0; i < jumlah; i++) {
                  $('#EditKroModal .modal-body #keg_kode_editkro').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
              }
              $('#EditKroModal .modal-body #keg_kode_editkro').val(kodekeg);
          },
          error: function(){
              alert("error data kegiatan");
          }

      });

  $('#prog_kode_editkro').change(function(){
        var prog_kode_kro = $('#prog_kode_editkro').val();
        $.ajax({
                url : '{{route("pok.kegbyprogcari",["",""])}}/'+prog_kode_kro+'/1',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    var jumlah = data.jumlah;
                    $('#EditKroModal .modal-body #keg_kode_editkro').html("");
                    $('#EditKroModal .modal-body #keg_kode_editkro').append('<option value="">Pilih Kegiatan</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#EditKroModal .modal-body #keg_kode_editkro').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                    }
                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
});

$('#EditKroModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #EditKroForm')[0].reset();
});

$('#DeleteKroModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idkro = button.data('idkro')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var kodekro = button.data('kodekro')
  var namakro = button.data('namakro')

  var modal = $(this)
  modal.find('.modal-body #prog_kode').val(kodeprog)
  modal.find('.modal-body #keg_kode').val(kodekeg)
  modal.find('.modal-body #kro_kode').val(kodekro)
  modal.find('.modal-body #kro_nama').val(namakro)
  modal.find('.modal-body #idkro').val(idkro)

});

$('#TambahOutputModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  $('#prog_kode_output').change(function(){
        var prog_kode = $('#prog_kode_output').val();
        $.ajax({
                url : '{{route("pok.kegbyprogcari",["",""])}}/'+prog_kode+'/2',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    var jumlah = data.jumlah;
                    $('#TambahOutputModal .modal-body #keg_kode_output').html("");
                    $('#TambahOutputModal .modal-body #keg_kode_output').append('<option value="">Pilih Kegiatan</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#TambahOutputModal .modal-body #keg_kode_output').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
    $('#keg_kode_output').change(function(){
        var prog_kode = $('#prog_kode_output').val();
        var keg_kode = $('#keg_kode_output').val();
        $.ajax({
                url : '{{route("pok.krobyprogkegcari",["",""])}}/'+prog_kode+'/'+keg_kode,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                      var jumlah = data.jumlah;
                      $('#TambahOutputModal .modal-body #kro_kode_output').html("");
                      $('#TambahOutputModal .modal-body #kro_kode_output').append('<option value="">Pilih KRO</option>');
                      for (i = 0; i < jumlah; i++) {
                          $('#TambahOutputModal .modal-body #kro_kode_output').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
                      }
                      $('#TambahOutputModal .modal-body #kro_kode_output').attr('readonly',false)
                      $('#TambahOutputModal .modal-body #kro_kode_output').attr('required',true)
                    }
                    else
                    {
                      $('#TambahOutputModal .modal-body #kro_kode_output').html("");
                      $('#TambahOutputModal .modal-body #kro_kode_output').append('<option value="">Tidak ada KRO</option>');
                      $('#TambahOutputModal .modal-body #kro_kode_output').attr('readonly',true)
                      $('#TambahOutputModal .modal-body #kro_kode_output').attr('required',false)
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
});

$('#TambahOutputModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #TambahOutputForm')[0].reset();
});

$('#EditOutputModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idoutput = button.data('idoutput')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var kodekro = button.data('kodekro')
  var kodeoutput = button.data('kodeoutput')
  var namaoutput = button.data('namaoutput')
  $.ajax({
            url : '{{route("pok.kegbyprogcari",["",""])}}/'+kodeprog+'/2',
            method : 'get',
            cache: false,
            dataType: 'json',
            success: function(data) {
                var jumlah = data.jumlah;
                $('#EditOutputModal .modal-body #prog_kode_editoutput').val(kodeprog);
                $('#EditOutputModal .modal-body #kro_kode_editoutput').val(kodekro);
                $('#EditOutputModal .modal-body #idoutput').val(idoutput);
                $('#EditOutputModal .modal-body #output_kode').val(kodeoutput);
                $('#EditOutputModal .modal-body #output_nama').val(namaoutput);
                $('#EditOutputModal .modal-body #keg_kode_editoutput').html("");
                $('#EditOutputModal .modal-body #keg_kode_editoutput').append('<option value="">Pilih Kegiatan</option>');
                for (i = 0; i < jumlah; i++) {
                    $('#EditOutputModal .modal-body #keg_kode_editoutput').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                }
                $('#EditOutputModal .modal-body #keg_kode_editoutput').val(kodekeg);
            },
            error: function(){
                alert("error data kegiatan");
            }
});

$.ajax({
                url : '{{route("pok.krobyprogkegcari",["",""])}}/'+kodeprog+'/'+kodekeg,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                      var jumlah = data.jumlah;
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').html("");
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').append('<option value="">Pilih KRO</option>');
                      for (i = 0; i < jumlah; i++) {
                          $('#EditOutputModal .modal-body #kro_kode_editoutput').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
                      }
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').attr('readonly',false)
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').attr('required',true)
                    }
                    else
                    {
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').html("");
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').append('<option value="">Tidak ada KRO</option>');
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').attr('readonly',true)
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').attr('required',false)
                    }
                    $('#EditOutputModal .modal-body #kro_kode_editoutput').val(kodekro);

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
  $('#prog_kode_editoutput').change(function(){
        var prog_kode = $('#prog_kode_editoutput').val();
        $.ajax({
                url : '{{route("pok.kegbyprogcari",["",""])}}/'+prog_kode+'/2',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    var jumlah = data.jumlah;
                    $('#EditOutputModal .modal-body #keg_kode_editoutput').html("");
                    $('#EditOutputModal .modal-body #keg_kode_editoutput').append('<option value="">Pilih Kegiatan</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#EditOutputModal .modal-body #keg_kode_editoutput').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                    }
                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
    $('#keg_kode_editoutput').change(function(){
        var prog_kode = $('#prog_kode_editoutput').val();
        var keg_kode = $('#keg_kode_editoutput').val();
        $.ajax({
                url : '{{route("pok.krobyprogkegcari",["",""])}}/'+prog_kode+'/'+keg_kode,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                      var jumlah = data.jumlah;
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').html("");
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').append('<option value="">Pilih KRO</option>');
                      for (i = 0; i < jumlah; i++) {
                          $('#EditOutputModal .modal-body #kro_kode_editoutput').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
                      }
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').attr('readonly',false)
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').attr('required',true)
                    }
                    else
                    {
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').html("");
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').append('<option value="">Tidak ada KRO</option>');
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').attr('readonly',true)
                      $('#EditOutputModal .modal-body #kro_kode_editoutput').attr('required',false)
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
});

$('#EditOutputModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #EditOutputForm')[0].reset();
});

$('#DeleteOutputModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idoutput = button.data('idoutput')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var kodekro = button.data('kodekro')
  var kodeoutput = button.data('kodeoutput')
  var namaoutput = button.data('namaoutput')

  var modal = $(this)
  modal.find('.modal-body #prog_kode_editoutput').val(kodeprog)
  modal.find('.modal-body #keg_kode').val(kodekeg)
  modal.find('.modal-body #kro_kode').val(kodekro)
  modal.find('.modal-body #output_kode').val(kodeoutput)
  modal.find('.modal-body #output_nama').val(namaoutput)
  modal.find('.modal-body #idoutput').val(idoutput)

});

$('#TambahKomponenModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  $('#prog_kode_komponen').change(function(){
        var prog_kode = $('#prog_kode_komponen').val();
        $.ajax({
                url : '{{route("pok.kegbyprogcari",["",""])}}/'+prog_kode+'/2',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    var jumlah = data.jumlah;
                    $('#TambahKomponenModal .modal-body #keg_kode_komponen').html("");
                    $('#TambahKomponenModal .modal-body #keg_kode_komponen').append('<option value="">Pilih Kegiatan</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#TambahKomponenModal .modal-body #keg_kode_komponen').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
    $('#keg_kode_komponen').change(function(){
        var prog_kode = $('#prog_kode_komponen').val();
        var keg_kode = $('#keg_kode_komponen').val();
        $.ajax({
                url : '{{route("pok.krobyprogkegcari",["",""])}}/'+prog_kode+'/'+keg_kode,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                      var jumlah = data.jumlah;
                      $('#TambahKomponenModal .modal-body #kro_kode_komponen').html("");
                      $('#TambahKomponenModal .modal-body #kro_kode_komponen').append('<option value="">Pilih KRO</option>');
                      for (i = 0; i < jumlah; i++) {
                          $('#TambahKomponenModal .modal-body #kro_kode_komponen').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
                      }
                      $('#TambahKomponenModal .modal-body #kro_kode_komponen').attr('readonly',false)
                      $('#TambahKomponenModal .modal-body #kro_kode_komponen').attr('required',true)
                    }
                    else
                    {
                      $('#TambahKomponenModal .modal-body #kro_kode_komponen').html("");
                      $('#TambahKomponenModal .modal-body #kro_kode_komponen').append('<option value="">Tidak ada KRO</option>');
                      $('#TambahKomponenModal .modal-body #kro_kode_komponen').attr('readonly',true)
                      $('#TambahKomponenModal .modal-body #kro_kode_komponen').attr('required',false)
                      $.ajax({
                            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+prog_kode+'/'+keg_kode+'/1',
                            method : 'get',
                            cache: false,
                            dataType: 'json',
                            success: function(data) {
                                if (data.status == true)
                                {
                                  var jumlah = data.jumlah;
                                  $('#TambahKomponenModal .modal-body #output_kode_komponen').html("");
                                  $('#TambahKomponenModal .modal-body #output_kode_komponen').append('<option value="">Pilih Output</option>');
                                  for (i = 0; i < jumlah; i++) {
                                      $('#TambahKomponenModal .modal-body #output_kode_komponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                                  }
                                  $('#TambahKomponenModal .modal-body #output_kode_komponen').attr('readonly',false)
                                  $('#TambahKomponenModal .modal-body #output_kode_komponen').attr('required',true)
                                }
                                else
                                {
                                  $('#TambahKomponenModal .modal-body #output_kode_komponen').html("");
                                  $('#TambahKomponenModal .modal-body #output_kode_komponen').append('<option value="">Tidak ada Output</option>');
                                  $('#TambahKomponenModal .modal-body #output_kode_komponen').attr('readonly',true)
                                  $('#TambahKomponenModal .modal-body #output_kode_komponen').attr('required',false)
                                }

                            },
                            error: function(){
                                alert("error data kegiatan");
                            }

                        });
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });

    $('#kro_kode_komponen').change(function(){
        var prog_kode = $('#prog_kode_komponen').val();
        var keg_kode = $('#keg_kode_komponen').val();
        var kro_kode = $('#kro_kode_komponen').val();
        $.ajax({
            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+prog_kode+'/'+keg_kode+'/'+kro_kode,
            method : 'get',
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.status == true)
                {
                    var jumlah = data.jumlah;
                    $('#TambahKomponenModal .modal-body #output_kode_komponen').html("");
                    $('#TambahKomponenModal .modal-body #output_kode_komponen').append('<option value="">Pilih Output</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#TambahKomponenModal .modal-body #output_kode_komponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                    }
                    $('#TambahKomponenModal .modal-body #output_kode_komponen').attr('readonly',false)
                    $('#TambahKomponenModal .modal-body #output_kode_komponen').attr('required',true)
                }
                else
                {
                    $('#TambahKomponenModal .modal-body #output_kode_komponen').html("");
                    $('#TambahKomponenModal .modal-body #output_kode_komponen').append('<option value="">Tidak ada Output</option>');
                    $('#TambahKomponenModal .modal-body #output_kode_komponen').attr('readonly',true)
                    $('#TambahKomponenModal .modal-body #output_kode_komponen').attr('required',false)
                }

            },
            error: function(){
                alert("error data kegiatan");
            }
        });
    });

});

$('#TambahKomponenModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #TambahKomponenForm')[0].reset();
});

$('#EditKomponenModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idkomponen = button.data('idkomponen')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var kodekro = button.data('kodekro')
  var kodeoutput = button.data('kodeoutput')
  var kodekomponen = button.data('kodekomponen')
  var namakomponen = button.data('namakomponen')
  var flagkomponen = button.data('flagkomponen')

$('#EditKomponenModal .modal-body #prog_kode_editkomponen').val(kodeprog);
$('#EditKomponenModal .modal-body #komponen_nama').val(namakomponen);
$('#EditKomponenModal .modal-body #komponen_kode').val(kodekomponen);
$('#EditKomponenModal .modal-body #flag_subkomponen').val(flagkomponen);
$('#EditKomponenModal .modal-body #idkomponen').val(idkomponen);
$.ajax({
            url : '{{route("pok.kegbyprogcari",["",""])}}/'+kodeprog+'/2',
            method : 'get',
            cache: false,
            dataType: 'json',
            success: function(data) {
                var jumlah = data.jumlah;
                $('#EditKomponenModal .modal-body #keg_kode_editkomponen').html("");
                $('#EditKomponenModal .modal-body #keg_kode_editkomponen').append('<option value="">Pilih Kegiatan</option>');
                for (i = 0; i < jumlah; i++) {
                    $('#EditKomponenModal .modal-body #keg_kode_editkomponen').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                }
                $('#EditKomponenModal .modal-body #keg_kode_editkomponen').val(kodekeg);

            },
            error: function(){
                alert("error data kegiatan");
            }

});
$.ajax({
    url : '{{route("pok.krobyprogkegcari",["",""])}}/'+kodeprog+'/'+kodekeg,
    method : 'get',
    cache: false,
    dataType: 'json',
    success: function(data) {
        if (data.status == true)
        {
            var jumlah = data.jumlah;
            $('#EditKomponenModal .modal-body #kro_kode_editkomponen').html("");
            $('#EditKomponenModal .modal-body #kro_kode_editkomponen').append('<option value="">Pilih KRO</option>');
            for (i = 0; i < jumlah; i++) {
                $('#EditKomponenModal .modal-body #kro_kode_editkomponen').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
            }
            $('#EditKomponenModal .modal-body #kro_kode_editkomponen').attr('readonly',false)
            $('#EditKomponenModal .modal-body #kro_kode_editkomponen').attr('required',true)

            $('#EditKomponenModal .modal-body #kro_kode_editkomponen').val(kodekro);
        }
        else
        {
            $('#EditKomponenModal .modal-body #kro_kode_editkomponen').html("");
            $('#EditKomponenModal .modal-body #kro_kode_editkomponen').append('<option value="">Tidak ada KRO</option>');
            $('#EditKomponenModal .modal-body #kro_kode_editkomponen').attr('readonly',true)
            $('#EditKomponenModal .modal-body #kro_kode_editkomponen').attr('required',false)
            $.ajax({
                url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+kodeprog+'/'+kodekeg+'/1',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(dataout) {
                    if (dataout.status == true)
                    {
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').html("");
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="">Pilih Output</option>');
                        for (i = 0; i < dataout.jumlah; i++) {
                            $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="'+ dataout.hasil[i].kode_output +'">['+ dataout.hasil[i].kode_output +'] '+ dataout.hasil[i].nama_output +'</option>');
                        }
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('readonly',false)
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('required',true)
                    }
                    else
                    {
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').html("");
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="">Tidak ada Output</option>');
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('readonly',true)
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('required',false)
                    }
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').val(kodeoutput);

                },
                error: function(){
                    alert("error data output");
                }

            });
        }

    },
    error: function(){
        alert("error data kegiatan");
    }

});
  if (kodekro != "")
  {
    $.ajax({
            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+kodeprog+'/'+kodekeg+'/'+kodekro,
            method : 'get',
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.status == true)
                {
                    var jumlah = data.jumlah;
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').html("");
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="">Pilih Output</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                    }
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('readonly',false)
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('required',true)
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').val(kodeoutput);
                }
                else
                {
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').html("");
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="">Tidak ada Output</option>');
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('readonly',true)
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('required',false)
                }

            },
            error: function(){
                alert("error data kro");
            }
        });
  }
  $('#prog_kode_editkomponen').change(function(){
        var prog_kode = $('#prog_kode_editkomponen').val();
        $.ajax({
                url : '{{route("pok.kegbyprogcari",["",""])}}/'+prog_kode+'/2',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    var jumlah = data.jumlah;
                    $('#EditKomponenModal .modal-body #keg_kode_editkomponen').html("");
                    $('#EditKomponenModal .modal-body #keg_kode_editkomponen').append('<option value="">Pilih Kegiatan</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#EditKomponenModal .modal-body #keg_kode_editkomponen').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
});

$('#keg_kode_editkomponen').change(function(){
        var prog_kode = $('#prog_kode_editkomponen').val();
        var keg_kode = $('#keg_kode_editkomponen').val();
        $.ajax({
                url : '{{route("pok.krobyprogkegcari",["",""])}}/'+prog_kode+'/'+keg_kode,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                      var jumlah = data.jumlah;
                      $('#EditKomponenModal .modal-body #kro_kode_editkomponen').html("");
                      $('#EditKomponenModal .modal-body #kro_kode_editkomponen').append('<option value="">Pilih KRO</option>');
                      for (i = 0; i < jumlah; i++) {
                          $('#EditKomponenModal .modal-body #kro_kode_editkomponen').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
                      }
                      $('#EditKomponenModal .modal-body #kro_kode_editkomponen').attr('readonly',false)
                      $('#EditKomponenModal .modal-body #kro_kode_editkomponen').attr('required',true)
                    }
                    else
                    {
                      $('#EditKomponenModal .modal-body #kro_kode_editkomponen').html("");
                      $('#EditKomponenModal .modal-body #kro_kode_editkomponen').append('<option value="">Tidak ada KRO</option>');
                      $('#EditKomponenModal .modal-body #kro_kode_editkomponen').attr('readonly',true)
                      $('#EditKomponenModal .modal-body #kro_kode_editkomponen').attr('required',false)
                      $.ajax({
                            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+prog_kode+'/'+keg_kode+'/1',
                            method : 'get',
                            cache: false,
                            dataType: 'json',
                            success: function(dataout) {
                                if (dataout.status == true)
                                {
                                  $('#EditKomponenModal .modal-body #output_kode_editkomponen').html("");
                                  $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="">Pilih Output</option>');
                                  for (i = 0; i < dataout.jumlah; i++) {
                                      $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="'+ dataout.hasil[i].kode_output +'">['+ dataout.hasil[i].kode_output +'] '+ dataout.hasil[i].nama_output +'</option>');
                                  }
                                  $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('readonly',false)
                                  $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('required',true)
                                }
                                else
                                {
                                  $('#EditKomponenModal .modal-body #output_kode_editkomponen').html("");
                                  $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="">Tidak ada Output</option>');
                                  $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('readonly',true)
                                  $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('required',false)
                                }

                            },
                            error: function(){
                                alert("error data kegiatan");
                            }

                        });
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
    $('#kro_kode_editkomponen').change(function(){
        var prog_kode = $('#prog_kode_editkomponen').val();
        var keg_kode = $('#keg_kode_editkomponen').val();
        var kro_kode = $('#kro_kode_editkomponen').val();
        $.ajax({
            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+prog_kode+'/'+keg_kode+'/'+kro_kode,
            method : 'get',
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.status == true)
                {
                    var jumlah = data.jumlah;
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').html("");
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="">Pilih Output</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                    }
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('readonly',false)
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('required',true)
                }
                else
                {
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').html("");
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').append('<option value="">Tidak ada Output</option>');
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('readonly',true)
                    $('#EditKomponenModal .modal-body #output_kode_editkomponen').attr('required',false)
                }

            },
            error: function(){
                alert("error data kegiatan");
            }
        });
    });
});

$('#EditKomponenModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #EditKomponenForm')[0].reset();
});

$('#DeleteKomponenModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idkomponen = button.data('idkomponen')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var kodekro = button.data('kodekro')
  var kodeoutput = button.data('kodeoutput')
  var kodekomponen = button.data('kodekomponen')
  var namakomponen = button.data('namakomponen')
  var flagkomponen = button.data('flagkomponen')

  var modal = $(this)
  modal.find('.modal-body #prog_kode_editkomponen').val(kodeprog)
  modal.find('.modal-body #keg_kode').val(kodekeg)
  modal.find('.modal-body #kro_kode').val(kodekro)
  modal.find('.modal-body #output_kode').val(kodeoutput)
  modal.find('.modal-body #komponen_kode').val(kodekomponen)
  modal.find('.modal-body #komponen_nama').val(namakomponen)
  modal.find('.modal-body #flag_subkomponen').val(flagkomponen)
  modal.find('.modal-body #idkomponen').val(idkomponen)
});

$('#TambahSubKomponenModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
    $('#prog_kode_subkomponen').change(function(){
        var prog_kode = $('#prog_kode_subkomponen').val();
        $.ajax({
                url : '{{route("pok.kegbyprogcari",["",""])}}/'+prog_kode+'/2',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    var jumlah = data.jumlah;
                    $('#TambahSubKomponenModal .modal-body #keg_kode_subkomponen').html("");
                    $('#TambahSubKomponenModal .modal-body #keg_kode_subkomponen').append('<option value="">Pilih Kegiatan</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#TambahSubKomponenModal .modal-body #keg_kode_subkomponen').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
    $('#keg_kode_subkomponen').change(function(){
        var prog_kode = $('#prog_kode_subkomponen').val();
        var keg_kode = $('#keg_kode_subkomponen').val();
        $.ajax({
                url : '{{route("pok.krobyprogkegcari",["",""])}}/'+prog_kode+'/'+keg_kode,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                      var jumlah = data.jumlah;
                      $('#TambahSubKomponenModal .modal-body #kro_kode_subkomponen').html("");
                      $('#TambahSubKomponenModal .modal-body #kro_kode_subkomponen').append('<option value="">Pilih KRO</option>');
                      for (i = 0; i < jumlah; i++) {
                          $('#TambahSubKomponenModal .modal-body #kro_kode_subkomponen').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
                      }
                      $('#TambahSubKomponenModal .modal-body #kro_kode_subkomponen').attr('readonly',false)
                      $('#TambahSubKomponenModal .modal-body #kro_kode_subkomponen').attr('required',true)
                    }
                    else
                    {
                      $('#TambahSubKomponenModal .modal-body #kro_kode_subkomponen').html("");
                      $('#TambahSubKomponenModal .modal-body #kro_kode_subkomponen').append('<option value="">Tidak ada KRO</option>');
                      $('#TambahSubKomponenModal .modal-body #kro_kode_subkomponen').attr('readonly',true)
                      $('#TambahSubKomponenModal .modal-body #kro_kode_subkomponen').attr('required',false)
                      $.ajax({
                            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+prog_kode+'/'+keg_kode+'/1',
                            method : 'get',
                            cache: false,
                            dataType: 'json',
                            success: function(data) {
                                if (data.status == true)
                                {
                                  var jumlah = data.jumlah;
                                  $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').html("");
                                  $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').append('<option value="">Pilih Output</option>');
                                  for (i = 0; i < jumlah; i++) {
                                      $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                                  }
                                  $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').attr('readonly',false)
                                  $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').attr('required',true)
                                }
                                else
                                {
                                  $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').html("");
                                  $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').append('<option value="">Tidak ada Output</option>');
                                  $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').attr('readonly',true)
                                  $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').attr('required',false)
                                }

                            },
                            error: function(){
                                alert("error data kegiatan");
                            }

                        });
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
    $('#kro_kode_subkomponen').change(function(){
        var prog_kode = $('#prog_kode_subkomponen').val();
        var keg_kode = $('#keg_kode_subkomponen').val();
        var kro_kode = $('#kro_kode_subkomponen').val();
        $.ajax({
            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+prog_kode+'/'+keg_kode+'/'+kro_kode,
            method : 'get',
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.status == true)
                {
                    var jumlah = data.jumlah;
                    $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').html("");
                    $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').append('<option value="">Pilih Output</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                    }
                    $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').attr('readonly',false)
                    $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').attr('required',true)
                }
                else
                {
                    $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').html("");
                    $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').append('<option value="">Tidak ada Output</option>');
                    $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').attr('readonly',true)
                    $('#TambahSubKomponenModal .modal-body #output_kode_subkomponen').attr('required',false)
                }

            },
            error: function(){
                alert("error data kegiatan");
            }
        });
    });
    $('#output_kode_subkomponen').change(function(){
        var prog_kode = $('#prog_kode_subkomponen').val();
        var keg_kode = $('#keg_kode_subkomponen').val();
        var output_kode = $('#output_kode_subkomponen').val();
        var kro_kode = $('#kro_kode_subkomponen').val();
        if (kro_kode == "")
        {
            //kosong tanpa kro
            var kro_kode = 1;
        }
        $.ajax({
                url : '{{route("pok.kompbyoutput",["","","","",""])}}/'+prog_kode+'/'+keg_kode+'/'+kro_kode+'/'+output_kode+'/1',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                        $('#TambahSubKomponenModal .modal-body #komponen_kode_subkomponen').html("");
                        $('#TambahSubKomponenModal .modal-body #komponen_kode_subkomponen').append('<option value="">Pilih Komponen</option>');
                        for (i = 0; i < data.jumlah; i++) {
                            $('#TambahSubKomponenModal .modal-body #komponen_kode_subkomponen').append('<option value="'+ data.hasil[i].kode_komponen +'">['+ data.hasil[i].kode_komponen +'] '+ data.hasil[i].nama_komponen +'</option>');
                        }
                        $('#TambahSubKomponenModal .modal-body #komponen_kode_subkomponen').attr('readonly',false)
                        $('#TambahSubKomponenModal .modal-body #komponen_kode_subkomponen').attr('required',true)
                    }
                    else
                    {
                        $('#TambahSubKomponenModal .modal-body #komponen_kode_subkomponen').html("");
                        $('#TambahSubKomponenModal .modal-body #komponen_kode_subkomponen').append('<option value="">Tidak ada Komponen</option>');
                        $('#TambahSubKomponenModal .modal-body #komponen_kode_subkomponen').attr('readonly',true)
                        $('#TambahSubKomponenModal .modal-body #komponen_kode_subkomponen').attr('required',false)
                    }



                },
                error: function(){
                    alert("error load data Komponen");
                }

            });
    });
});

$('#TambahSubKomponenModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #TambahSubKomponenForm')[0].reset();
});

$('#EditSubKomponenModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idsubkomponen = button.data('idsubkomponen')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var kodekro = button.data('kodekro')
  var kodeoutput = button.data('kodeoutput')
  var kodekomponen = button.data('kodekomponen')
  var kodesubkomponen = button.data('kodesubkomponen')
  var namasubkomponen = button.data('namasubkomponen')

$('#EditSubKomponenModal .modal-body #prog_kode_editsubkomponen').val(kodeprog);
$('#EditSubKomponenModal .modal-body #subkomponen_nama').val(namasubkomponen);
$('#EditSubKomponenModal .modal-body #subkomponen_kode').val(kodesubkomponen);
$('#EditSubKomponenModal .modal-body #idsubkomponen').val(idsubkomponen);

$.ajax({
    url : '{{route("pok.kegbyprogcari",["",""])}}/'+kodeprog+'/2',
    method : 'get',
    cache: false,
    dataType: 'json',
    success: function(data) {
        var jumlah = data.jumlah;
        $('#EditSubKomponenModal .modal-body #keg_kode_editsubkomponen').html("");
        $('#EditSubKomponenModal .modal-body #keg_kode_editsubkomponen').append('<option value="">Pilih Kegiatan</option>');
        for (i = 0; i < jumlah; i++) {
            $('#EditSubKomponenModal .modal-body #keg_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
        }
        $('#EditSubKomponenModal .modal-body #keg_kode_editsubkomponen').val(kodekeg)

    },
    error: function(){
        alert("error data kegiatan");
    }

});
$.ajax({
    url : '{{route("pok.krobyprogkegcari",["",""])}}/'+kodeprog+'/'+kodekeg,
    method : 'get',
    cache: false,
    dataType: 'json',
    success: function(data) {
        if (data.status == true)
        {
            var jumlah = data.jumlah;
            $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').html("");
            $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').append('<option value="">Pilih KRO</option>');
            for (i = 0; i < jumlah; i++) {
                $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
            }
            $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').attr('readonly',false)
            $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').attr('required',true)
            $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').val(kodekro)
        }
        else
        {
            $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').html("");
            $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').append('<option value="">Tidak ada KRO</option>');
            $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').attr('readonly',true)
            $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').attr('required',false)
            $.ajax({
                url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+kodeprog+'/'+kodekeg+'/1',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                        var jumlah = data.jumlah;
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').html("");
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="">Pilih Output</option>');
                        for (i = 0; i < jumlah; i++) {
                            $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                        }
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('readonly',false)
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('required',true)
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').val(kodeoutput);
                    }
                    else
                    {
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').html("");
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="">Tidak ada Output</option>');
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('readonly',true)
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('required',false)
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
        }

    },
    error: function(){
        alert("error data kegiatan");
    }

});
if (kodekro != "")
{
    $.ajax({
            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+kodeprog+'/'+kodekeg+'/'+kodekro,
            method : 'get',
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.status == true)
                {
                    var jumlah = data.jumlah;
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').html("");
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="">Pilih Output</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                    }
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('readonly',false)
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('required',true)
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').val(kodeoutput);
                }
                else
                {
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').html("");
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="">Tidak ada Output</option>');
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('readonly',true)
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('required',false)
                }


            },
            error: function(){
                alert("error data kegiatan");
            }
        });
}
else
{
    var kodekro=1;
}

$.ajax({
    url : '{{route("pok.kompbyoutput",["","","","",""])}}/'+kodeprog+'/'+kodekeg+'/'+kodekro+'/'+kodeoutput+'/1',
    method : 'get',
    cache: false,
    dataType: 'json',
    success: function(data) {
        if (data.status == true)
        {
            $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').html("");
            $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').append('<option value="">Pilih Komponen</option>');
            for (i = 0; i < data.jumlah; i++) {
                $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_komponen +'">['+ data.hasil[i].kode_komponen +'] '+ data.hasil[i].nama_komponen +'</option>');
            }
            $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').attr('readonly',false)
            $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').attr('required',true)
        }
        else
        {
            $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').html("");
            $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').append('<option value="">Tidak ada Komponen</option>');
            $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').attr('readonly',true)
            $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').attr('required',false)
        }
        $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').val(kodekomponen)


    },
    error: function(){
        alert("error data Komponen");
    }

});
    $('#prog_kode_editsubkomponen').change(function(){
        var prog_kode = $('#prog_kode_editsubkomponen').val();
        $.ajax({
                url : '{{route("pok.kegbyprogcari",["",""])}}/'+prog_kode+'/2',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    var jumlah = data.jumlah;
                    $('#EditSubKomponenModal .modal-body #keg_kode_editsubkomponen').html("");
                    $('#EditSubKomponenModal .modal-body #keg_kode_editsubkomponen').append('<option value="">Pilih Kegiatan</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#EditSubKomponenModal .modal-body #keg_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_keg +'">['+ data.hasil[i].kode_keg +'] '+ data.hasil[i].nama_keg +'</option>');
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
    $('#keg_kode_editsubkomponen').change(function(){
        var prog_kode = $('#prog_kode_editsubkomponen').val();
        var keg_kode = $('#keg_kode_editsubkomponen').val();
        $.ajax({
                url : '{{route("pok.krobyprogkegcari",["",""])}}/'+prog_kode+'/'+keg_kode,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                      var jumlah = data.jumlah;
                      $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').html("");
                      $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').append('<option value="">Pilih KRO</option>');
                      for (i = 0; i < jumlah; i++) {
                          $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_kro +'">['+ data.hasil[i].kode_kro +'] '+ data.hasil[i].nama_kro +'</option>');
                      }
                      $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').attr('readonly',false)
                      $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').attr('required',true)
                    }
                    else
                    {
                      $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').html("");
                      $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').append('<option value="">Tidak ada KRO</option>');
                      $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').attr('readonly',true)
                      $('#EditSubKomponenModal .modal-body #kro_kode_editsubkomponen').attr('required',false)
                      $.ajax({
                            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+prog_kode+'/'+keg_kode+'/1',
                            method : 'get',
                            cache: false,
                            dataType: 'json',
                            success: function(data) {
                                if (data.status == true)
                                {
                                  var jumlah = data.jumlah;
                                  $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').html("");
                                  $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="">Pilih Output</option>');
                                  for (i = 0; i < jumlah; i++) {
                                      $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                                  }
                                  $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('readonly',false)
                                  $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('required',true)
                                }
                                else
                                {
                                  $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').html("");
                                  $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="">Tidak ada Output</option>');
                                  $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('readonly',true)
                                  $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('required',false)
                                }

                            },
                            error: function(){
                                alert("error data kegiatan");
                            }

                        });
                    }

                },
                error: function(){
                    alert("error data kegiatan");
                }

            });
    });
    $('#kro_kode_editsubkomponen').change(function(){
        var prog_kode = $('#prog_kode_editsubkomponen').val();
        var keg_kode = $('#keg_kode_editsubkomponen').val();
        var kro_kode = $('#kro_kode_editsubkomponen').val();
        $.ajax({
            url : '{{route("pok.outputbyprogkegcari",["","",""])}}/'+prog_kode+'/'+keg_kode+'/'+kro_kode,
            method : 'get',
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.status == true)
                {
                    var jumlah = data.jumlah;
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').html("");
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="">Pilih Output</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_output +'">['+ data.hasil[i].kode_output +'] '+ data.hasil[i].nama_output +'</option>');
                    }
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('readonly',false)
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('required',true)
                }
                else
                {
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').html("");
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').append('<option value="">Tidak ada Output</option>');
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('readonly',true)
                    $('#EditSubKomponenModal .modal-body #output_kode_editsubkomponen').attr('required',false)
                }

            },
            error: function(){
                alert("error data kegiatan");
            }
        });
    });
    $('#output_kode_editsubkomponen').change(function(){
        var prog_kode = $('#prog_kode_editsubkomponen').val();
        var keg_kode = $('#keg_kode_editsubkomponen').val();
        var output_kode = $('#output_kode_editsubkomponen').val();
        var kro_kode = $('#kro_kode_editsubkomponen').val();
        if (kro_kode == null)
        {
            var kodekro = 1;
        }
        else
        {
            var kodekro = kro_kode;
        }
        $.ajax({
                url : '{{route("pok.kompbyoutput",["","","","",""])}}/'+prog_kode+'/'+keg_kode+'/'+kodekro+'/'+output_kode+'/1',
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == true)
                    {
                        $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').html("");
                        $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').append('<option value="">Pilih Komponen</option>');
                        for (i = 0; i < data.jumlah; i++) {
                            $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').append('<option value="'+ data.hasil[i].kode_komponen +'">['+ data.hasil[i].kode_komponen +'] '+ data.hasil[i].nama_komponen +'</option>');
                        }
                        $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').attr('readonly',false)
                        $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').attr('required',true)
                    }
                    else
                    {
                        $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').html("");
                        $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').append('<option value="">Tidak ada Komponen</option>');
                        $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').attr('readonly',true)
                        $('#EditSubKomponenModal .modal-body #komponen_kode_editsubkomponen').attr('required',false)
                    }



                },
                error: function(){
                    alert("error data Komponen");
                }

            });
    });
});

$('#EditSubKomponenModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #EditSubKomponenForm')[0].reset();
});

$('#DeleteSubKomponenModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var idsubkomponen = button.data('idsubkomponen')
  var kodeprog = button.data('kodeprog')
  var kodekeg = button.data('kodekeg')
  var kodekro = button.data('kodekro')
  var kodeoutput = button.data('kodeoutput')
  var kodekomponen = button.data('kodekomponen')
  var kodesubkomponen = button.data('kodesubkomponen')
  var namasubkomponen = button.data('namasubkomponen')


  var modal = $(this)
  modal.find('.modal-body #prog_kode_hapussubkomponen').val(kodeprog)
  modal.find('.modal-body #keg_kode').val(kodekeg)
  modal.find('.modal-body #kro_kode').val(kodekro)
  modal.find('.modal-body #output_kode').val(kodeoutput)
  modal.find('.modal-body #komponen_kode').val(kodekomponen)
  modal.find('.modal-body #subkomponen_kode').val(kodesubkomponen)
  modal.find('.modal-body #subkomponen_nama').val(namasubkomponen)
  modal.find('.modal-body #idsubkomponen').val(idsubkomponen)
});
</script>
