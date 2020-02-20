<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('tema/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script>
$(".tglsurat").datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    toggleActive: true,
    todayHighlight: true
}).on('show.bs.modal', function(event) {
    // prevent datepicker from firing bootstrap modal "show.bs.modal"
    event.stopPropagation();

});
function tambahNol(x){
   y=(x>9)?(x>99)?x:'0'+x:'00'+x;
   return y;
}
$('#EditModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var trxid = button.data('trxid') // Extract info from data-* attributes
var spdid = button.data('spdid') // Extract info from data-* attributes
var tahun = button.data('tahun')
var kodetrx = button.data('kodetrx')
var tujuan = button.data('tujuan')
var nama = button.data('nama')
var tglsrt = button.data('tglsurat')
var tugas = button.data('tugas')
var nomor = button.data('nomor')
var kendaraan = button.data('kendaraan')
var ppknip = button.data('ppknip')
var flagcetaktujuan = button.data('flagcetaktujuan')
$.ajax({
        url : '{{route("spd.nomor","")}}/'+tahun,
        method : 'get',
        cache: false,
        dataType: 'json',
        success: function(data){     
            var nomor_baru = data.nomor+1;
            var Tanggal = new Date();
            //B-001/52.ST/1/2020
            //B-001/52.SPD/1/2020
            if (nomor === "") {
            var Tanggal = new Date();
            //B-001/52.SPD/1/2020
            var srttugas = 'B-'+ tambahNol(nomor_baru) +'/52.SPD/'+ (Tanggal.getMonth()+1) + '/' + Tanggal.getFullYear()
            }
            else {
                var srttugas = nomor;
            }
            
            $('#EditModal .modal-body #nomor_surat').val(srttugas)
        },
        error: function(){
            alert("error");
        }

    });
var modal = $(this)
modal.find('.modal-body #trxid').val(trxid)
modal.find('.modal-body #spdid').val(spdid)
modal.find('.modal-body #kodetrx').val(kodetrx)
modal.find('.modal-body #tujuan').val(tujuan)
modal.find('.modal-body #nama').val(nama)
modal.find('.modal-body #tglsurat').val(tglsrt)
modal.find('.modal-body #tugas').val(tugas)
modal.find('.modal-body #kendaraan').val(kendaraan)
modal.find('input[name="cetaktujuan"][value="'+flagcetaktujuan+'"]').prop('checked',true)
});
</script>
