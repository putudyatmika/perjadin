<script>

function tambahNol(x)
{
   y=(x>9)?(x>99)?x:'0'+x:'00'+x;
   return y;
}
$('#EditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var tahun = button.data('tahun')
    var trxid = button.data('trxid') // Extract info from data-* attributes
    var kodetrx = button.data('kodetrx')
    var tglend = button.data('tglend')

    //load dulu transaksinya
    $.ajax({
        url : '{{route("cari.trx","")}}/'+kodetrx,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){
            if (data.status == true)
            {
            var nomor_surat = data.hasil.nomor_surat;
            var nomor_spd = data.hasil.nomor_spd;
            $('#EditModal .modal-body #kode_trx').text(kodetrx)
            $('#EditModal .modal-body #peg_nama').text(data.hasil.peg_nama)
            $('#EditModal .modal-body #tujuan').text(data.hasil.tujuan_nama)
            $('#EditModal .modal-body #tugas').text(data.hasil.tugas)
            $('#EditModal .modal-body #brkt').text(data.hasil.tgl_brkt_nama)
            $('#EditModal .modal-body #kembali').text(data.hasil.tgl_balik_nama)
            $('#EditModal .modal-body #tglsurat').val(data.hasil.tgl_surat)
            $('#EditModal .modal-body #kodetrx').val(kodetrx)
            $('#EditModal .modal-body #trx_id').val(trxid)
            $('#EditModal .modal-body #srt_id').val(data.hasil.srt_id)
            $('#EditModal .modal-body #spd_id').val(data.hasil.spd_id)
            $('#EditModal .modal-body #ttd').val(data.hasil.flag_ttd)
            $('#EditModal .modal-body #ttd_nip').val(data.hasil.ttd_nip)
            $('#EditModal .modal-body #kendaraan').val(data.hasil.kendaraan)
            $('#EditModal .modal-body input[name="cetaktujuan"][value="'+data.hasil.flag_cetak_tujuan+'"]').prop('checked',true)
           
                if (data.hasil.ttd_nip != null)
                {
                    $('#EditModal .modal-body #ttd_nip').val(data.hasil.ttd_nip)
                    $('#EditModal .modal-body #ttd_nama').val(data.hasil.ttd_nama)
                    $('#EditModal .modal-body #ttd_jabatan').val(data.hasil.ttd_jabatan)
                }
                else 
                {
                    $.ajax({
                        url : '{{route("cari.pejabat","0")}}',
                        method : 'get',
                        cache: false,
                        dataType: 'json',
                        success: function(pejabat) {     
                            
                            $('#EditModal .modal-body #ttd_nip').val(pejabat.hasil[0].ttd_nip);
                            $('#EditModal .modal-body #ttd_nama').val(pejabat.hasil[0].ttd_nama);
                            $('#EditModal .modal-body #ttd_jabatan').val(pejabat.hasil[0].ttd_jabatan);
                        },
                        error: function(){
                            alert("error nomor surat");
                        }

                    });
                }

                if (nomor_surat != null)
                {
                    var srttugas = nomor_surat;
                    $('#EditModal .modal-body #nomor_surat').val(srttugas)
                }
                else {
                    $.ajax({
                        url : '{{route("surattugas.nomor","")}}/'+tahun,
                        method : 'get',
                        cache: false,
                        dataType: 'json',
                        success: function(srt) {     
                            var nomor_baru = srt.nomor+1;
                            var Tanggal = new Date();
                            var nomor_kosong = tambahNol(nomor_baru);
                            var srttugas = 'B-'+ nomor_kosong +'/52.ST/'+ (Tanggal.getMonth()+1) + '/' + Tanggal.getFullYear();
                            $('#EditModal .modal-body #nomor_surat').val(srttugas)
                        },
                        error: function(){
                            alert("error nomor surat");
                        }

                    });
                }
                if (nomor_spd != null)
                {
                    $('#EditModal .modal-body #nomor_spd').val(nomor_spd)
                }
                else {
                    $.ajax({
                        url : '{{route("spd.nomor","")}}/'+tahun,
                        method : 'get',
                        cache: false,
                        dataType: 'json',
                        success: function(srt) {     
                            var nomor_baru = srt.nomor+1;
                            var Tanggal = new Date();
                            var nomor_kosong = tambahNol(nomor_baru);
                            var srttugas = 'B-'+ nomor_kosong +'/52.SPD/'+ (Tanggal.getMonth()+1) + '/' + Tanggal.getFullYear();
                            $('#EditModal .modal-body #nomor_spd').val(srttugas)
                        },
                        error: function(){
                            alert("error nomor spd");
                        }

                    });
                }               
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

    $(".tglsurat").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true,
    endDate: tglend
}).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();

});
    //jabatan di klik
    $('#ttd').change(function(){
        var ttd = $('#ttd').val();
        $.ajax({
                url : '{{route("cari.pejabat","")}}/'+ttd,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(pejabat) {     
                    var jumlah = pejabat.count;
                    $('#EditModal .modal-body #ttd_nip').html("");
                    $('#EditModal .modal-body #ttd_nip').append('<option value="">Pilih Pejabat</option>');
                    for (i = 0; i < jumlah; i++) {
                        $('#EditModal .modal-body #ttd_nip').append('<option value="'+ pejabat.hasil[i].ttd_nip +'">'+ pejabat.hasil[i].ttd_nama +'</option>');
                    }
                },
                error: function(){
                    alert("error data pejabat");
                }

            });
    });

    $('#ttd_nip').change(function(){
       var ttd_nip = $('#ttd_nip').val();
       $.ajax({
                url : '{{route("cari.pegawai","")}}/'+ttd_nip,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {     
                    $('#EditModal .modal-body #ttd_nama').val(data.nama);
                    $('#EditModal .modal-body #ttd_jabatan').val(data.jabatan_nama+' '+data.unit_nama);
                },
                error: function(){
                    alert("error nip pegawai");
                }

            });
    });
});

$('#EditModal').on('hidden.bs.modal', function(e) {
  $(this).find('.modal-body #EditKelengkapan')[0].reset();
});

$('#BatalModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var tahun = button.data('tahun')
    var trxid = button.data('trxid') // Extract info from data-* attributes
    var kodetrx = button.data('kodetrx')
    var tglend = button.data('tglend')

    //load dulu transaksinya
    $.ajax({
        url : '{{route("cari.trx","")}}/'+kodetrx,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){
            if (data.status == true)
            {
            var nomor_surat = data.hasil.nomor_surat;
            var nomor_spd = data.hasil.nomor_spd;
            $('#BatalModal .modal-body #kode_trx').text(kodetrx)
            $('#BatalModal .modal-body #peg_nama').text(data.hasil.peg_nama)
            $('#BatalModal .modal-body #tujuan').text(data.hasil.tujuan_nama)
            $('#BatalModal .modal-body #tugas').text(data.hasil.tugas)
            $('#BatalModal .modal-body #brkt').text(data.hasil.tgl_brkt_nama)
            $('#BatalModal .modal-body #kembali').text(data.hasil.tgl_balik_nama)
            $('#BatalModal .modal-body #nomor_surat').text(data.hasil.nomor_surat)
            $('#BatalModal .modal-body #nomor_spd').text(data.hasil.nomor_spd)
            $('#BatalModal .modal-body #totalbiaya').text(data.hasil.total_biaya)
           
            $('#BatalModal .modal-body #kodetrx').val(kodetrx)
            $('#BatalModal .modal-body #trx_id').val(trxid)
            $('#BatalModal .modal-body #srt_id').val(data.hasil.srt_id)
            $('#BatalModal .modal-body #spd_id').val(data.hasil.spd_id)
            $('#BatalModal .modal-body #t_id').val(data.hasil.t_id)
            $('#BatalModal .modal-body #a_id').val(data.hasil.a_id)
            $('#BatalModal .modal-body #m_id').val(data.hasil.m_id)
            $('#BatalModal .modal-body #pagu_rencana').val(data.hasil.total_biaya)
            
            
           
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
});
</script>