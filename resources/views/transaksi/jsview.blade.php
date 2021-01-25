<script>
$('#ViewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var trxid = button.data('trxid') // Extract info from data-* attributes
    var kodetrx = button.data('kodetrx')
    //load dulu transaksinya
    $.ajax({
        url : '{{route("cari.transaksi","")}}/'+trxid,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data)
        {
            if (data.status == true)
            {
                $('#ViewModal .modal-body #tahun').text(data.hasil.tahun_trx)
                $('#ViewModal .modal-body #kode_trx').text(data.hasil.kode_trx)
                if (data.pegawai.status_pegawai == true)
                {
                    $('#ViewModal .modal-body #nama').html("");
                    $('#ViewModal .modal-body #nama').append(data.pegawai.hasil_pegawai.peg_nama+"<br />")
                    $('#ViewModal .modal-body #nama').append(data.pegawai.hasil_pegawai.peg_nip+"<br />")
                    $('#ViewModal .modal-body #nama').append(data.pegawai.hasil_pegawai.peg_gol_nama)
                }
                else 
                {
                    $('#ViewModal .modal-body #nama').text("-")
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

                if (data.hasil.tgl_brkt == null)
                {   
                    $('#ViewModal .modal-body #tgl_brkt').text("-")
                }
                else 
                {
                    $('#ViewModal .modal-body #tgl_brkt').text(data.hasil.tgl_brkt_nama)
                }
                if (data.hasil.tgl_balik == null)
                {   
                    $('#ViewModal .modal-body #tgl_balik').text("-")
                }
                else 
                {
                    $('#ViewModal .modal-body #tgl_balik').text(data.hasil.tgl_balik_nama)
                }
                
                if (data.hasil.tugas == null)
                {   
                    $('#ViewModal .modal-body #tugas').text("-")
                }
                else 
                {
                    $('#ViewModal .modal-body #tugas').text(data.hasil.tugas)
                }
                
                if (data.hasil.bnyk_hari == null)
                {   
                    $('#ViewModal .modal-body #lamanya').text("-")
                }
                else 
                {
                    $('#ViewModal .modal-body #lamanya').text(data.hasil.bnyk_hari+" hari")
                }
                $('#ViewModal .modal-body #tgl_pelaksanaan').text(data.matrik.tgl_awal_nama+" s.d. "+data.matrik.tgl_akhir_nama)
                $('#ViewModal .modal-body #subjectmatter').text("["+data.matrik.dana_unitkerja+"] "+data.matrik.dana_unitnama)
                $('#ViewModal .modal-body #pelaksana').text("["+data.matrik.unit_pelaksana+"] "+data.matrik.unitnama_pelaksana)
                $('#ViewModal .modal-body #sumberdana').text(data.matrik.dana_mak+" - "+data.matrik.dana_uraian)
                $('#ViewModal .modal-body #komponen').text("["+data.matrik.komponen_kode+"] "+data.matrik.komponen_nama)
                $('#ViewModal .modal-body #harian').text("Harian : Rp. "+number_format(data.matrik.dana_harian)+" x "+data.matrik.lama_harian+" = Rp. "+ number_format(data.matrik.total_harian))
                $('#ViewModal .modal-body #transport').text("Transport : Rp. "+number_format(data.matrik.dana_transport))
                $('#ViewModal .modal-body #hotel').text("Penginapan : Rp. "+number_format(data.matrik.dana_hotel)+" x "+data.matrik.lama_hotel+" = Rp. "+number_format(data.matrik.total_hotel))
                $('#ViewModal .modal-body #rill').text("Pengeluaran Rill : Rp. "+number_format(data.matrik.pengeluaran_rill))
                $('#ViewModal .modal-body #totalbiaya').text("Rp. "+number_format(data.matrik.total_biaya))
                $('#ViewModal .modal-body #flagmatrik').text(data.matrik.flag_matrik_nama)
                $('#ViewModal .modal-body #flagtransaksi').text(data.hasil.flag_trx_nama)
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