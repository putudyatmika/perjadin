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
<!--modal view transaksi-->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-white" id="exampleModalLabel1">Detil Transaksi Perjalanan</h4> </div>
            <div class="modal-body">
                <h4 class="box-title">Transaksi Perjalanan</h4>
                <hr>
                <dl class="row">
                        <dt class="col-sm-3">Tahun Anggaran</dt>
                        <dd class="col-sm-9"><span id="tahun"></span></dd>
                        <dt class="col-sm-3">Kode Trx</dt>
                        <dd class="col-sm-9"><span id="kode_trx"></span></dd>
                        <dt class="col-sm-3">Nama Pegawai</dt>
                        <dd class="col-sm-9"><span id="nama"></span></dd>
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
                        <dt class="col-sm-3">Subject Matter</dt>
                        <dd class="col-sm-9"><span id="subjectmatter"></span></dd>
                        <dt class="col-sm-3">Unit Pelaksana</dt>
                        <dd class="col-sm-9"><span id="pelaksana"></span></dd>
                        <dt class="col-sm-3 text-truncate">Waktu Pelaksanaan</dt>
                        <dd class="col-sm-9"><span id="tgl_pelaksanaan"></span></dd>
                        <dt class="col-sm-3 text-truncate">Sumber Dana</dt>
                        <dd class="col-sm-9"><span id="sumberdana"></span></dd>
                        <dt class="col-sm-3 text-truncate">Komponen</dt>
                        <dd class="col-sm-9"><span id="komponen"></span></dd>
                        <dt class="col-sm-3 text-truncate">Rincian Biaya</dt>
                        <dd class="col-sm-9">
                            <ul class="list-icons">
                                <li><i class="ti-angle-right"></i> <span id="harian"></span></li>
                                <li><i class="ti-angle-right"></i> <span id="transport"></span></li>
                                <li><i class="ti-angle-right"></i> <span id="hotel"></span> </li>
                                <li><i class="ti-angle-right"></i> <span id="rill"></span> </li>
                            </ul>
                        </dd>
                        <dt class="col-sm-3 text-truncate">Total Biaya</dt>
                        <dd class="col-sm-9"><span id="totalbiaya"></span></dd>
                        <dt class="col-sm-3 text-truncate">Flag Matrik</dt>
                        <dd class="col-sm-9"><span id="flagmatrik" class="label label-success"></span></dd>
                        <dt class="col-sm-3 text-truncate">Flag Transaksi</dt>
                        <dd class="col-sm-9"><span id="flagtransaksi" class="label label-primary"></span> <span id="flagket"></span></dd>
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
<!--end modal view transaksi-->