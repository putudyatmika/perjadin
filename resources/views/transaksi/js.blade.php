<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script>
$('#AjukanModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tglawal = button.data('tglawal')
var tglakhir = button.data('tglakhir')

$.ajax({
        url : '{{route("cari.transaksi","")}}/'+trxid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){
            if (data.status == true)
            {
              $('#AjukanModal .modal-body #trxid').val(trxid)
              $('#AjukanModal .modal-body #matrikid').val(data.matrik.m_id)
              $('#AjukanModal .modal-body #kode_trx').val(data.hasil.kode_trx)
              if (data.matrik.tipe_perjadin == 2)
              {
                for (i = 0; i < data.tujuan.length; i++)
                {
                    $('#AjukanModal .modal-body #tujuan').append("["+data.tujuan[i].tujuan_kode+"]"+ data.tujuan[i].tujuan_nama);
                }
              }
              else
              {
                $('#AjukanModal .modal-body #tujuan').val("["+data.tujuan.tujuan_kode+"] "+data.tujuan.tujuan_nama)
              }

              $('#AjukanModal .modal-body #lamanya').val(data.matrik.lama_harian)
              $('#AjukanModal .modal-body #durasi').val(data.matrik.lama_harian+" Hari")
              $('#AjukanModal .modal-body #biaya').val(data.matrik.total_biaya)
              $('#AjukanModal .modal-body #sm').val("["+data.matrik.dana_unitkerja+"] "+data.matrik.dana_unitnama)
              $('#AjukanModal .modal-body #biaya').val(data.matrik.total_biaya)
              if (data.hasil.flag_sudah_permintaan == 1)
              {
                //ada isiannya
                $('#AjukanModal .modal-body #form_nomor_surat').val(data.permintaan.hasil_permintaan.nomor_surat_permintaan)
              }

              $('#AjukanModal .modal-body #form_tgl_surat').val(data.permintaan.hasil_permintaan.tanggal_permintaan_nama)
              $('#AjukanModal .modal-body #tugas').val(data.hasil.tugas)
              //Pelaksanaan : 1 Februari 2021 s/d 28 Februari 2021
              $('#AjukanModal .modal-body #tglberangkat').val(data.hasil.tgl_brkt)
              $('#AjukanModal .modal-body #infotgl').text("Pelaksanaan : "+data.matrik.tgl_awal_nama+" s/d "+data.matrik.tgl_akhir_nama)
              $('#AjukanModal .modal-body #peg_nip').select2("val",data.pegawai.hasil_pegawai.peg_nip);
            }
            else
            {
                alert(data.hasil);
            }
        },
        error: function(){
            alert("error load transaksi");
        }

    });

$("#tglberangkat").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true,
    daysOfWeekHighlighted: "0,6",
    startDate: tglawal,
    endDate: tglakhir,
    zIndex: 2048,
  }).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
  $("#form_tgl_surat").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true,
    daysOfWeekHighlighted: "0,6",
    startDate: tglawal,
    endDate: tglakhir,
    zIndex: 2048,
  }).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
});
$('#AjukanModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #FormAjukan')[0].reset();
});

$('#EditModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tglawal = button.data('tglawal')
var tglakhir = button.data('tglakhir')

$.ajax({
        url : '{{route("cari.transaksi","")}}/'+trxid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){
            if (data.status == true)
            {
              $('#EditModal .modal-body #trxid').val(trxid)
              $('#EditModal .modal-body #matrikid').val(data.matrik.m_id)
              $('#EditModal .modal-body #kode_trx').val(data.hasil.kode_trx)
              if (data.matrik.tipe_perjadin == 2)
              {
                for (i = 0; i < data.tujuan.length; i++)
                {
                    $('#EditModal .modal-body #tujuan').append("["+data.tujuan[i].tujuan_kode+"]"+ data.tujuan[i].tujuan_nama);
                }
              }
              else
              {
                $('#EditModal .modal-body #tujuan').val("["+data.tujuan.tujuan_kode+"] "+data.tujuan.tujuan_nama)
              }

              $('#EditModal .modal-body #lamanya').val(data.matrik.lama_harian)
              $('#EditModal .modal-body #durasi').val(data.matrik.lama_harian+" Hari")
              $('#EditModal .modal-body #biaya').val(data.matrik.total_biaya)
              $('#EditModal .modal-body #sm').val("["+data.matrik.dana_unitkerja+"] "+data.matrik.dana_unitnama)
              $('#EditModal .modal-body #biaya').val(data.matrik.total_biaya)
              if (data.hasil.flag_sudah_permintaan == 1)
              {
                //ada isiannya
                $('#EditModal .modal-body #form_nomor_surat').val(data.permintaan.hasil_permintaan.nomor_surat_permintaan)
              }

              $('#EditModal .modal-body #editform_tgl_surat').val(data.permintaan.hasil_permintaan.tanggal_permintaan_nama)
              $('#EditModal .modal-body #tugas').val(data.hasil.tugas)
              //Pelaksanaan : 1 Februari 2021 s/d 28 Februari 2021
              $('#EditModal .modal-body #edittglberangkat').val(data.hasil.tgl_brkt)
              $('#EditModal .modal-body #infotgl').text("Pelaksanaan : "+data.matrik.tgl_awal_nama+" s/d "+data.matrik.tgl_akhir_nama)
              $('#EditModal .modal-body #peg_nip').select2("val",data.pegawai.hasil_pegawai.peg_nip)
              $('#EditModal .modal-body #kabid_setuju').val(data.hasil.kabid_konfirmasi)
              $('#EditModal .modal-body #ppk_setuju').val(data.hasil.ppk_konfirmasi)
              $('#EditModal .modal-body #kpa_setuju').val(data.hasil.kpa_konfirmasi)
              $('#EditModal .modal-body #flag_transaksi').val(data.hasil.flag_trx)
            }
            else
            {
                alert(data.hasil);
            }
        },
        error: function(){
            alert("error load transaksi");
        }

    });

$("#edittglberangkat").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true,
    daysOfWeekHighlighted: "0,6",
    startDate: tglawal,
    endDate: tglakhir,
    zIndex: 2048,
  }).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });
  $("#editform_tgl_surat").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true,
    daysOfWeekHighlighted: "0,6",
    startDate: tglawal,
    endDate: tglakhir,
    zIndex: 2048,
  }).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();
  });

});
$(".select2").select2();

</script>
