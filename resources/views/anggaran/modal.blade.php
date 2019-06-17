<!--modal view transaksi-->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-white" id="exampleModalLabel1">Anggaran Keterpaduan</h4> </div>
            <div class="modal-body">
                    <dl class="row">
                            <dt class="col-sm-3">Tahun</dt>
                            <dd class="col-sm-9"><span id="tahun_anggaran"></span></dd>
                            <dt class="col-sm-3">MAK</dt>
                            <dd class="col-sm-9"><span id="mak_anggaran"></span></dd>
                            <dt class="col-sm-3">Uraian</dt>
                            <dd class="col-sm-9"><span id="uraian_anggaran"></span></dd>
                            <dt class="col-sm-3">Subject Matter</dt>
                            <dd class="col-sm-9"><span id="sm_anggaran"></span></dd>
                    </dl>

                <table class="table">
                    <tr>
                        <td>No</td>
                        <td>Bidang/Bagian</td>
                        <td>%</td>
                        <td>Pagu Alokasi</td>
                        <td>Realisasi</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-success waves-effect waves-light" id="EditView">Edit Data</button>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="DeleteView">Delete Data</button> --}}
            </div>

        </div>
    </div>
</div>
<!--end modal view transaksi-->
