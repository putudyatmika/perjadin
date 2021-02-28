<!--modal permintaan delete-->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Hapus Form-JLN</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{route('permintaan.hapus')}}">
                    @csrf
                    <input type="hidden" name="pid" id="pid" value="" />

                    <div class="form-group">
                            <label for="nomor_surat">Nomor Surat Form-JLN</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" readonly> </div>

                    </div>
                    <div class="form-group">
                        <label for="tgl_surat">Tanggal Surat</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="tgl_surat" name="tgl_surat" readonly> </div>

                    </div>
                    <div class="form-group">
                        <label for="unitkerja_nama">Subject Matter</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="unitkerja_nama" name="unitkerja_nama" readonly> </div>

                    </div>
                    <div class="form-group">
                        <label for="totalbiaya">Total Biaya</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="totalbiaya" name="totalbiaya" readonly> </div>

                    </div>
                    <input type="hidden" id="unitkerja_kode" name="unitkerja_kode" value="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Hapus Data</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!--modal delete permintaan end-->
