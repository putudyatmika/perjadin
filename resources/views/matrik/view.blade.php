<!--modal view matrik-->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-white" id="exampleModalLabel1">Detil Matrik Perjalanan</h4> </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-3">Tahun Anggaran</dt>
                    <dd class="col-sm-9"><span id="tahun"></span></dd>
                    <dt class="col-sm-3">Tujuan</dt>
                    <dd class="col-sm-9"><span id="tujuan"></span></dd>

                    <dt class="col-sm-3">Lamanya</dt>
                    <dd class="col-sm-9"><span id="lamanya"></span>
                    </dd>

                    <dt class="col-sm-3">Subject Matter</dt>
                    <dd class="col-sm-9"><span id="subjectmatter"></span></dd>
                    <dt class="col-sm-3">Unit Pelaksana</dt>
                    <dd class="col-sm-9"><span id="pelaksana"></span></dd>
                    <dt class="col-sm-3 text-truncate">Waktu Pelaksanaan</dt>
                    <dd class="col-sm-9"><span id="waktu"></span></dd>
                    <dt class="col-sm-3 text-truncate">Sumber Dana</dt>
                    <dd class="col-sm-9"><span id="mak"></span></dd>
                    <dt class="col-sm-3 text-truncate">Rincian Biaya</dt>
                    <dd class="col-sm-9"><p id="harian"></p> <p id="transport"></p> <p id="hotel"></p> <p id="rill"></p></dd>
                    <dt class="col-sm-3 text-truncate">Total Biaya</dt>
                    <dd class="col-sm-9"><span id="totalbiaya"></span></dd>
                    <dt class="col-sm-3 text-truncate">Flag</dt>
                    <dd class="col-sm-9"><span id="flag"></span></dd>
                  </dl>
                  <input type="hidden" name="matrikid" id="matrikid">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-success waves-effect waves-light" id="EditView">Edit Data</button>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="DeleteView">Delete Data</button> --}}
            </div>

        </div>
    </div>
</div>
<!--end modal view matrik-->
