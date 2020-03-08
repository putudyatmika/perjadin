<!--modal selesai-->
<div class="modal fade" id="SelesaiModal" tabindex="-1" role="dialog" aria-labelledby="SelesaiModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Kuitansi Perjalanan Dinas Sudah Selesai</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('kuitansi.update','update') }}">
                        @csrf
                        @method('patch')
                        <input type="hidden" id="trxid" name="trxid" value="">
                        <input type="hidden" id="kodetrx" name="kodetrx" value="">
                        <input type="hidden" id="kuitansi_id" name="kuitansi_id" value="">
                        <input type="hidden" name="dana_tid" id="dana_tid" value="" />
                        <input type="hidden" name="mak_id" id="mak_id" value="" />
                        <input type="hidden" name="pagu_realisasi" id="pagu_realisasi" value="" />
                        <input type="hidden" name="aksi" value="selesai">
                        @include('kuitansi.formselesai')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Transaksi Selesai</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal Batal-->
<!--modal selesai-->
<div class="modal fade" id="FlagModal" tabindex="-1" role="dialog" aria-labelledby="FlagModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Ubah Flag Kuitansi</h4> </div>
                <div class="modal-body">
                        <form method="POST" action="{{ route('kuitansi.update','update') }}">
                            @csrf
                            @method('patch')
                            <input type="hidden" id="trxid" name="trxid" value="">
                            <input type="hidden" id="kodetrx" name="kodetrx" value="">
                            <input type="hidden" id="kuitansi_id" name="kuitansi_id" value="">
                            <input type="hidden" name="aksi" value="flag">
                            @include('kuitansi.formselesai')

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Transaksi Selesai</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!--end modal Batal-->
