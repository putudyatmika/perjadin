<!--modal Tambah-->
<div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="TambahModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Tahun Anggaran</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="FormTambah" action="{{ route('tahundasar.store','') }}">
                        @csrf
                        @method('put')
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Save Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal tambah-->