<script>
$('#SelesaiModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var trxid = button.data('trxid') // Extract info from data-* attributes
    var kodetrx = button.data('kodetrx')

    //load dulu transaksinya
    $.ajax({
        url : '{{route("trx.detil","")}}/'+kodetrx,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){
            if (data.status == true)
            {
            var nomor_surat = data.hasil.nomor_surat;
            var totalbiaya = number_format(data.hasil.kuitansi_totalbiaya);
            $('#SelesaiModal .modal-body #kode_trx').text(kodetrx)
            $('#SelesaiModal .modal-body #peg_nama').text(data.hasil.peg_nama)
            $('#SelesaiModal .modal-body #tujuan').text(data.hasil.tujuan_nama)
            $('#SelesaiModal .modal-body #tugas').text(data.hasil.tugas)
            $('#SelesaiModal .modal-body #brkt').text(data.hasil.tgl_brkt_nama)
            $('#SelesaiModal .modal-body #kembali').text(data.hasil.tgl_balik_nama)
            $('#SelesaiModal .modal-body #nomor_surat').text(data.hasil.nomor_surat)
            $('#SelesaiModal .modal-body #nomor_spd').text(data.hasil.nomor_spd)
            $('#SelesaiModal .modal-body #totalbiaya').text('Rp. '+totalbiaya)
            $('#SelesaiModal .modal-body #tgl_kuitansi').text(data.hasil.kuitansi_tgl_nama)
           
            $('#SelesaiModal .modal-body #kodetrx').val(kodetrx)
            $('#SelesaiModal .modal-body #trx_id').val(trxid)
            $('#SelesaiModal .modal-body #srt_id').val(data.hasil.srt_id)
            $('#SelesaiModal .modal-body #spd_id').val(data.hasil.spd_id)
            $('#SelesaiModal .modal-body #t_id').val(data.hasil.t_id)
            $('#SelesaiModal .modal-body #a_id').val(data.hasil.a_id)
            $('#SelesaiModal .modal-body #m_id').val(data.hasil.m_id)
            $('#SelesaiModal .modal-body #kuitansi_id').val(data.hasil.kuitansi_id)
            $('#SelesaiModal .modal-body #pagu_realisasi').val(data.hasil.kuitansi_totalbiaya)
            
            
           
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

$('#FlagModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var kid = button.data('kid') // Extract info from data-* attributes
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var nama = button.data('nama')
var tugas = button.data('tugas')
var tglkuitansi = button.data('tglkuitansi')
var totalbiaya = button.data('totalbiaya')

});
</script>