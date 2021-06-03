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
        url : '{{route("cari.transaksi","")}}/'+trxid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){
            if (data.status == true)
            {
            var nomor_surat = data.surattugas.hasil_surattugas.nomor_surat;
            var nomor_spd = data.spd.hasil_spd.nomor_spd;
            $('#EditModal .modal-body #kode_trx').text(data.hasil.kode_trx)
            if (data.pegawai.status_pegawai == true)
                {
                    $('#EditModal .modal-body #peg_nama').html("");
                    $('#EditModal .modal-body #peg_nama').append(data.pegawai.hasil_pegawai.peg_nama+"<br />")
                    $('#EditModal .modal-body #peg_nama').append(data.pegawai.hasil_pegawai.peg_nip+"<br />")
                    $('#EditModal .modal-body #peg_nama').append(data.pegawai.hasil_pegawai.peg_gol_nama)
                }
            else
                {
                    $('#EditModal .modal-body #peg_nama').text("-")
                }
            if (data.matrik.tipe_perjadin == 2)
            {
                $('#EditModal .modal-body #tujuan').html("");
                for (i = 0; i < data.tujuan.length; i++)
                {
                    $('#EditModal .modal-body #tujuan').append(data.tujuan[i].tujuan_kode +"-"+ data.tujuan[i].tujuan_nama+"<br />");
                }
                $('#EditModal .modal-body #tujuan').append('<div class="m-t-10"><span class="label label-info">'+data.matrik.tipe_perjadin_nama+'</span></div>');
            }
            else
            {
                $('#EditModal .modal-body #tujuan').text(data.tujuan.tujuan_kode+"-"+data.tujuan.tujuan_nama)
            }

            $('#EditModal .modal-body #tugas').text(data.hasil.tugas)
            $('#EditModal .modal-body #brkt').text(data.hasil.tgl_brkt_nama)
            $('#EditModal .modal-body #kembali').text(data.hasil.tgl_balik_nama)
            $('#EditModal .modal-body #tglsurat').val(data.surattugas.hasil_surattugas.tgl_surat)
            $('#EditModal .modal-body #kodetrx').val(data.hasil.kode_trx)
            $('#EditModal .modal-body #trx_id').val(trxid)
            $('#EditModal .modal-body #srt_id').val(data.surattugas.hasil_surattugas.srt_id)
            $('#EditModal .modal-body #spd_id').val(data.spd.hasil_spd.spd_id)
            $('#EditModal .modal-body #ttd').val(data.surattugas.hasil_surattugas.flag_ttd)
            $('#EditModal .modal-body #ttd_nip').val(data.surattugas.hasil_surattugas.ttd_nip)
            $('#EditModal .modal-body #kendaraan').val(data.spd.hasil_spd.kendaraan)
            $('#EditModal .modal-body #ppk_nip').val(data.spd.hasil_spd.ppk_nip)
            $('#EditModal .modal-body #ppk_nama').val(data.spd.hasil_spd.ppk_nama)
                if (data.surattugas.hasil_surattugas.ttd_nip != null)
                {
                    $('#EditModal .modal-body #ttd_nip').val(data.surattugas.hasil_surattugas.ttd_nip)
                    $('#EditModal .modal-body #ttd_nama').val(data.surattugas.hasil_surattugas.ttd_nama)
                    $('#EditModal .modal-body #ttd_jabatan').val(data.surattugas.hasil_surattugas.ttd_jabatan)
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
                            alert("error nip pejabat");
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
                    $('#EditModal .modal-body input[name="cetaktujuan"][value="'+data.spd.hasil_spd.flag_cetak_tujuan+'"]').prop('checked',true)
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
                    $('#EditModal .modal-body input[name="cetaktujuan"][value="1"]').prop('checked',true)
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
    $('#ppk_nip').change(function(){
       var ppk_nip = $('#ppk_nip').val();
       $.ajax({
                url : '{{route("cari.pegawai","")}}/'+ppk_nip,
                method : 'get',
                cache: false,
                dataType: 'json',
                success: function(data) {
                    $('#EditModal .modal-body #ppk_nama').val(data.nama);
                },
                error: function(){
                    alert("error nip ppk");
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

$('#ViewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var tahun = button.data('tahun')
    var trxid = button.data('trxid') // Extract info from data-* attributes
    var kodetrx = button.data('kodetrx')
    var tglend = button.data('tglend')

    //load dulu transaksinya
    $.ajax({
        url : '{{route("cari.transaksi","")}}/'+trxid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){
            if (data.status == true)
            {

            $('#ViewModal .modal-body #kode_trx').text(data.hasil.kode_trx)

            if (data.pegawai.status_pegawai == true)
                {
                    $('#ViewModal .modal-body #peg_nama').html("");
                    $('#ViewModal .modal-body #peg_nama').append(data.pegawai.hasil_pegawai.peg_nama+"<br />")
                    $('#ViewModal .modal-body #peg_nama').append(data.pegawai.hasil_pegawai.peg_nip+"<br />")
                    $('#ViewModal .modal-body #peg_nama').append(data.pegawai.hasil_pegawai.peg_gol_nama)
                }
            else
                {
                    $('#ViewModal .modal-body #peg_nama').text("-")
                }

            if (data.matrik.tipe_perjadin == 2)
            {
                $('#ViewModal .modal-body #tujuan').html("");
                for (i = 0; i < data.tujuan.length; i++)
                {
                    $('#ViewModal .modal-body #tujuan').append(data.tujuan[i].tujuan_kode +"-"+ data.tujuan[i].tujuan_nama+"<br />");
                }
                $('#ViewModal .modal-body #tujuan').append('<div class="m-t-10"><span class="label label-info">'+data.matrik.tipe_perjadin_nama+'</span></div>');
            }
            else
            {
                $('#ViewModal .modal-body #tujuan').text(data.tujuan.tujuan_kode+"-"+data.tujuan.tujuan_nama)
            }
            if (data.kuitansi.status_kuitansi == true)
            {
                $('#ViewModal .modal-body #status_kuitansi').text(data.kuitansi.hasil_kuitansi.flag_kuitansi_nama)
            }
            else
            {
                $('#ViewModal .modal-body #status_kuitansi').text(data.kuitansi.hasil_kuitansi)
            }

            if (data.surattugas.hasil_surattugas.nomor_surat == null)
                {
                    $('#ViewModal .modal-body #nomor_surat').text("-")
                }
            else
            {
                $('#ViewModal .modal-body #nomor_surat').text(data.surattugas.hasil_surattugas.nomor_surat)
            }

            if (data.spd.hasil_spd.nomor_spd == null)
                {
                    $('#ViewModal .modal-body #nomor_spd').text("-")
                    $('#ViewModal .modal-body #penandatangan').text("-")
                    $('#ViewModal .modal-body #ppk').text("-")
                }
            else
            {
                $('#ViewModal .modal-body #nomor_spd').text(data.spd.hasil_spd.nomor_spd)
                $('#ViewModal .modal-body #penandatangan').text(data.surattugas.hasil_surattugas.ttd_nama)
                $('#ViewModal .modal-body #ppk').html("");
                $('#ViewModal .modal-body #ppk').append(data.spd.hasil_spd.ppk_nama+"<br />")
                $('#ViewModal .modal-body #ppk').append(data.spd.hasil_spd.ppk_nip+"<br />")
            }
            $('#ViewModal .modal-body #tugas').text(data.hasil.tugas)
            $('#ViewModal .modal-body #brkt').text(data.hasil.tgl_brkt_nama)
            $('#ViewModal .modal-body #kembali').text(data.hasil.tgl_balik_nama)
            $('#ViewModal .modal-body #totalbiaya').text('Rp. '+number_format(data.matrik.total_biaya))
            $('#ViewModal .modal-body #sumber_dana').text(data.matrik.dana_mak +'-'+data.matrik.dana_uraian)
            $('#ViewModal .modal-body #komponen').text('['+data.matrik.komponen_kode +'] '+data.matrik.komponen_nama)
            $('#ViewModal .modal-body #status').text(data.surattugas.hasil_surattugas.flag_surattugas_nama)
            $('#ViewModal .modal-body #status_trx').text(data.hasil.flag_trx_nama)
            $('#ViewModal .modal-body #status_matrik').text(data.matrik.flag_matrik_nama)
            $('#ViewModal .modal-body #cetak_tujuan').text(data.spd.hasil_spd.flag_cetak_tujuan_nama)
            $('#ViewModal .modal-body #kendaraan').text(data.matrik.flag_kendaraan_nama)
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
