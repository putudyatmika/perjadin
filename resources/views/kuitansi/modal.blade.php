<!--modal selesai-->
<div class="modal fade" id="SelesaiModal" tabindex="-1" role="dialog" aria-labelledby="SelesaiModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Kuitansi Perjalanan Dinas Sudah Selesai</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('kuitansi.selesai','') }}">
                        @csrf
                        <dl class="row">
                            <dt class="col-sm-4">Tahun</dt>
                            <dd class="col-sm-8">@if (Session::has('tahun_anggaran')) {{Session::get('tahun_anggaran')}} @endif</dd>
                            <dt class="col-sm-4">Kode Trx</dt>
                            <dd class="col-sm-8"><span id="kode_trx"></span></dd>
                            <dt class="col-sm-4">Nomor Surat Tugas</dt>
                            <dd class="col-sm-8"><span id="nomor_surat"></span></dd>
                            <dt class="col-sm-4">Nomor SPD</dt>
                            <dd class="col-sm-8"><span id="nomor_spd"></span></dd>
                            <dt class="col-sm-4">Nama Pegawai</dt>
                            <dd class="col-sm-8"><span id="peg_nama"></span></dd>
                            <dt class="col-sm-4">Tujuan</dt>
                            <dd class="col-sm-8"><span id="tujuan"></span></dd>
                            <dt class="col-sm-4">Tugas</dt>
                            <dd class="col-sm-8"><span id="tugas"></span></dd>
                            <dt class="col-sm-4">Berangkat</dt>
                            <dd class="col-sm-8"><span id="brkt"></span></dd>
                            <dt class="col-sm-4">Kembali</dt>
                            <dd class="col-sm-8"><span id="kembali"></span></dd>
                            <dt class="col-sm-4">Tanggal Kuitansi</dt>
                            <dd class="col-sm-8"><span id="tgl_kuitansi"></span></dd>
                            <dt class="col-sm-4">Total Biaya</dt>
                            <dd class="col-sm-8"><span id="totalbiaya"></span></dd>
                        </dl>
                        <i>Catatan: Kuitansi yang sudah diselesaikan tidak bisa di edit kembali
                        </i>
                        <input type="hidden" id="kodetrx" name="kodetrx" value="" />
                        <input type="hidden" id="trx_id" name="trx_id" value="" />
                        <input type="hidden" id="srt_id" name="srt_id" value="">
                        <input type="hidden" id="spd_id" name="spd_id" value="">
                        <input type="hidden" id="t_id" name="t_id" value="">
                        <input type="hidden" id="a_id" name="a_id" value="">
                        <input type="hidden" id="m_id" name="m_id" value="">
                        <input type="hidden" id="kuitansi_id" name="kuitansi_id" value="">
                        <input type="hidden" name="pagu_realisasi" id="pagu_realisasi" value="" />
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
