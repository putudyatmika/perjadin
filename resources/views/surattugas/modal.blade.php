<!--modal edit-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Surat Tugas</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('surattugas.update','update') }}">
                        @csrf
                        @method('patch')
                        <input type="hidden" id="trxid" name="trxid" value="">
                        <input type="hidden" id="kodetrx" name="kodetrx" value="">
                        <input type="hidden" id="srtid" name="srtid" value="">
                        <input type="hidden" name="aksi" value="edit">
                        <input type="hidden" id="minHari" name="minHari" value="">
                        <input type="hidden" id="maxHari" name="maxHari" value="">
                        @include('surattugas.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Save Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal edit-->
<!--modal batal-->
<div class="modal fade" id="BatalModal" tabindex="-1" role="dialog" aria-labelledby="BatalModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Pembatalan Surat Tugas</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('surattugas.update','update') }}">
                        @csrf
                        @method('patch')
                        <input type="hidden" id="trxid" name="trxid" value="">
                        <input type="hidden" id="kodetrx" name="kodetrx" value="">
                        <input type="hidden" id="srtid" name="srtid" value="">
                        <input type="hidden" name="aksi" value="batal">
                        @include('surattugas.formbatal')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Batalkan</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal Batal-->
<!--modal view surattugas-->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-white" id="exampleModalLabel1">Detil Surat Tugas</h4> </div>
                <div class="modal-body">
                    <h4 class="box-title">Surat Tugas an. <b><span id="nama"></span></b></h4>
                    <hr>
                    <dl class="row">
                            <dt class="col-sm-3">Kode Trx</dt>
                            <dd class="col-sm-9"><span id="kode_trx"></span></dd>
                            <dt class="col-sm-3">Nomor Surat</dt>
                            <dd class="col-sm-9"><span id="nomor_surat"></span></dd>
                            <dt class="col-sm-3">NIP</dt>
                            <dd class="col-sm-9"><span id="nip"></span></dd>
                            <dt class="col-sm-3">Tugas</dt>
                            <dd class="col-sm-9"><span id="tugas"></span></dd>
                            <dt class="col-sm-3">Tanggal Berangkat</dt>
                            <dd class="col-sm-9"><span id="tgl_brkt"></span></dd>
                            <dt class="col-sm-3">Tanggal Kembali</dt>
                            <dd class="col-sm-9"><span id="tgl_balik"></span></dd>
                            <dt class="col-sm-3">Tujuan</dt>
                            <dd class="col-sm-9"><span id="tujuan"></span></dd>
                            <dt class="col-sm-3">Lamanya</dt>
                            <dd class="col-sm-9"><span id="lamanya"></span></dd>
                            <dt class="col-sm-3">Tanggal Surat</dt>
                            <dd class="col-sm-9"><span id="tglsurat"></span></dd>
                            <dt class="col-sm-3">Penandatangan</dt>
                            <dd class="col-sm-9"><span id="ttd"></span></dd>
                            <dt class="col-sm-3 text-truncate">Status Surat Tugas</dt>
                            <dd class="col-sm-9"><span id="status"></span></dd>

                    </dl>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-success waves-effect waves-light" id="EditView">Edit Data</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" id="DeleteView">Delete Data</button> --}}
                </div>

            </div>
        </div>
    </div>
    <!--end modal view surattugas-->
