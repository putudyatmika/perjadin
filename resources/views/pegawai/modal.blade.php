<!--modal tambah pegawai-->
<div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Data Pegawai</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('pegawai.store') }}">
                            @csrf
                    @include('pegawai.form')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal tambah pegawai-->
<!---modal edit pegawai-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Data Pegawai</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('pegawai.update','update') }}">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="peg_id" id="peg_id" value="">
                            @include('pegawai.form')
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
<!--modal delete pegawai-->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Delete Data Pegawai</h4> </div>
            <div class="modal-body">
                    <form method="POST" class="form" action="{{ route('pegawai.destroy','delete') }}">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="peg_id" id="peg_id" value="">
                    <input type="hidden" name="nama" id="nama" value="">
                    <input type="hidden" name="nipbaru" id="nipbaru" value="">
                    <input type="hidden" name="unitkerja" id="unitkerja" value="">
                    @include('pegawai.deleteform')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Delete Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal delete pegawai-->
<!--modal view pegawai-->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-white" id="exampleModalLabel1">Detil Pegawai</h4> </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Nama</dt>
                    <dd class="col-sm-8"><span id="nama"></span></dd>
                    <dt class="col-sm-4">NIP</dt>
                    <dd class="col-sm-8"><span id="nip"></span></dd>
                    <dt class="col-sm-4">Tgl Lahir</dt>
                    <dd class="col-sm-8"><span id="tgllahir"></span></dd>
                    <dt class="col-sm-4">Jenis Kelamin</dt>
                    <dd class="col-sm-8"><span id="jk"></span></dd>
                    <dt class="col-sm-4">Pangkat/Golongan</dt>
                    <dd class="col-sm-8"><span id="gol"></span></dd>
                    <dt class="col-sm-4">Bidang/Bagian</dt>
                    <dd class="col-sm-8"><span id="bidang"></span></dd>
                    <dt class="col-sm-4">Unitkerja</dt>
                    <dd class="col-sm-8"><span id="unitkerja"></span></dd>
                    <dt class="col-sm-4">Jabatan</dt>
                    <dd class="col-sm-8"><span id="jabatan"></span></dd>
                  </dl>
                  <input type="hidden" name="peg_id" id="peg_id">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-success waves-effect waves-light" id="EditView">Edit Data</button>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="DeleteView">Delete Data</button> --}}
            </div>

        </div>
    </div>
</div>
<!--end modal view pegawai-->
