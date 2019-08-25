<!--modal konfirmasi kabid-->
<div class="modal fade" id="KonfirmasiKabidModal" tabindex="-1" role="dialog" aria-labelledby="KonfirmasiKabidModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-white" id="exampleModalLabel1">Persetujuan Kabid Subject Matter</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('setuju.update','update') }}">
                        @csrf
                        @method('patch')
                        <input type="hidden" id="trxid" name="trxid" value="">
                        <input type="hidden" id="kodetrx" name="kodetrx" value="">
                        <input type="hidden" name="aksi" value="SetujuKabid">
                        <input type="hidden" id="tujuan" name="tujuan" value="">
                        <input type="hidden" id="tglberangkat" name="tglberangkat" value="">
                        <input type="hidden" id="matrikid" name="matrikid" value="">
                        <input type="hidden" id="penugasan" name="penugasan" value="">
                        <input type="hidden" id="dana_tid" name="dana_tid" value="">
                        <input type="hidden" id="pagu_rencana" name="pagu_rencana" value="">
                        <input type="hidden" id="mak_id" name="mak_id" value="">
                        @include('setuju.formsetuju')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Save Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal kabid-->

<!--modal konfirmasi ppk-->
<div class="modal fade" id="KonfirmasiPPKModal" tabindex="-1" role="dialog" aria-labelledby="KonfirmasiPPKModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-white" id="exampleModalLabel1">Persetujuan PPK</h4> </div>
                <div class="modal-body">
                        <form method="POST" action="{{ route('setuju.update','update') }}">
                            @csrf
                            @method('patch')
                            <input type="hidden" id="trxid" name="trxid" value="">
                            <input type="hidden" id="kodetrx" name="kodetrx" value="">
                            <input type="hidden" name="aksi" value="SetujuPPK">
                            <input type="hidden" id="tujuan" name="tujuan" value="">
                            <input type="hidden" id="tglberangkat" name="tglberangkat" value="">
                            <input type="hidden" id="matrikid" name="matrikid" value="">
                            <input type="hidden" id="penugasan" name="penugasan" value="">
                            <input type="hidden" id="dana_tid" name="dana_tid" value="">
                            <input type="hidden" id="pagu_rencana" name="pagu_rencana" value="">
                            <input type="hidden" id="mak_id" name="mak_id" value="">
                            @include('setuju.formsetujuppk')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Save Data</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!--end modal ppk-->

<!--modal konfirmasi kpa-->
<div class="modal fade" id="KonfirmasiKPAModal" tabindex="-1" role="dialog" aria-labelledby="KonfirmasiKPAModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-white" id="exampleModalLabel1">Persetujuan KPA</h4> </div>
                <div class="modal-body">
                        <form method="POST" action="{{ route('setuju.update','update') }}">
                            @csrf
                            @method('patch')
                            <input type="hidden" id="trxid" name="trxid" value="">
                            <input type="hidden" id="kodetrx" name="kodetrx" value="">
                            <input type="hidden" name="aksi" value="SetujuKPA">
                            <input type="hidden" id="tujuan" name="tujuan" value="">
                            <input type="hidden" id="tglberangkat" name="tglberangkat" value="">
                            <input type="hidden" id="matrikid" name="matrikid" value="">
                            <input type="hidden" id="penugasan" name="penugasan" value="">
                            <input type="hidden" id="dana_tid" name="dana_tid" value="">
                            <input type="hidden" id="pagu_rencana" name="pagu_rencana" value="">
                            <input type="hidden" id="mak_id" name="mak_id" value="">
                            @include('setuju.formsetujukpa')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Save Data</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!--end modal ppk-->
