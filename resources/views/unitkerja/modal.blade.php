<!--modal tambah unitkerja-->
<div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="TambahModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Unitkerja</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('unitkerja.store') }}">
                    @csrf
                    
                    @include('unitkerja.form')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal tambah unitkerja-->

<!--modal edit unitkerja-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Unitkerja</h4> </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('unitkerja.update','update') }}">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="unit_id" id="unit_id" value="">
                    @include('unitkerja.form')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal edit unitkerja-->

<!--modal delete unitkerja-->
<div class="modal fade" id="HapusModal" tabindex="-1" role="dialog" aria-labelledby="HapusModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Delete Data Unitkerja</h4> </div>
            <div class="modal-body">
                    <form method="POST" class="form" action="{{ route('unitkerja.destroy','delete') }}">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="unit_id" id="unit_id" value="">
                    @include('unitkerja.form')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Delete Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal delete unitkerja-->