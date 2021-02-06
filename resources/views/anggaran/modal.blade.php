<!---modal edit-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Data Anggaran</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="formEditAnggaran" id="formEditAnggaran" action="{{route('anggaran.simpanupdate')}}">
                            @csrf
                            <input type="hidden" name="anggaranid" id="id_editanggaran" value="">
                            @include('anggaran.formdataedit')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal edit-->
<!--modal tambah anggaran-->
<div class="modal fade" id="TambahAnggaranModal" tabindex="-1" role="dialog" aria-labelledby="TambahAnggaranModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Anggaran</h4> </div>
            <div class="modal-body">
                    <form method="POST" id="FormTambahAnggaran" name="FormTambahAnggaran" action="{{route('anggaran.simpan')}}">
                    @csrf
                    @include('anggaran.formdata')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal tambah anggaran-->
<!--modal delete anggaran-->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Delete Data Anggaran</h4> </div>
            <div class="modal-body">
                    <form method="POST" class="form" action="{{ route('anggaran.destroy','delete') }}">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="anggaran_id" id="anggaranid" value="">
                    @include('anggaran.deleteform')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Delete Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal delete anggaran-->
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
                        <dt class="col-sm-3">Program</dt>
                        <dd class="col-sm-9"><span id="program"></span></dd>
                        <dt class="col-sm-3">Kegiatan</dt>
                        <dd class="col-sm-9"><span id="kegiatan"></span></dd>
                        <dt class="col-sm-3">KRO</dt>
                        <dd class="col-sm-9"><span id="kro"></span></dd>
                        <dt class="col-sm-3">Output</dt>
                        <dd class="col-sm-9"><span id="output"></span></dd>
                        <dt class="col-sm-3">Komponen</dt>
                        <dd class="col-sm-9"><span id="komponen"></span></dd>
                        <dt class="col-sm-3">Sub Komponen</dt>
                        <dd class="col-sm-9"><span id="subkomponen"></span></dd>
                        <dt class="col-sm-3">Akun</dt>
                        <dd class="col-sm-9"><span id="akun"></span></dd>
                        <dt class="col-sm-3">Uraian</dt>
                        <dd class="col-sm-9"><span id="uraian_anggaran"></span></dd>
                        <dt class="col-sm-3">Subject Matter</dt>
                        <dd class="col-sm-9"><span id="sm_anggaran"></span></dd>
                        <dt class="col-sm-3">Pagu Utama</dt>
                        <dd class="col-sm-9"><span id="pagu_utama"></span></dd>
                        <dt class="col-sm-3">Pagu sudah teralokasi</dt>
                        <dd class="col-sm-9"><span id="pagu_rencana"></span></dd>
                        <dt class="col-sm-3">Sisa Pagu Utama</dt>
                        <dd class="col-sm-9"><span id="pagu_sisa"></span></dd>
                </dl>

                <table class="table" id="tabelturunan">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Bidang/Bagian</th>
                        <th>%</th>
                        <th>Pagu Alokasi</th>
                        <th>Pagu Rencana</th>
                        <th>Pagu Realisasi</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-success waves-effect waves-light" id="ViewAlokasi">Alokasi</a>
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-success waves-effect waves-light" id="EditView">Edit Data</button>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="DeleteView">Delete Data</button> --}}
            </div>

        </div>
    </div>
</div>
<!--end modal view transaksi-->
<!--modal kunci anggaran-->
<div class="modal fade" id="KunciModal" tabindex="-1" role="dialog" aria-labelledby="KunciModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="KunciModal">Lock/Unlock Anggaran</h4> </div>
            <div class="modal-body">
                    <form method="POST" class="form" action="{{route('anggaran.kunci')}}">
                    @csrf
                    <input type="hidden" name="anggaran_id" id="anggaranid" value="">
                    <input type="hidden" name="flag_kunci" id="flag_kunci" value="">
                    @include('anggaran.kunciform')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="btn_tulisan" id="btn_tulisan">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal kunci anggaran-->
