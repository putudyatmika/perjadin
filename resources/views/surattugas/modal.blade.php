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
