<!--modal alokasi anggaran-->
<div class="modal fade" id="AlokasiModal" tabindex="-1" role="dialog" aria-labelledby="AlokasiModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Alokasi Matrik Perjalanan</h4> </div>
                <div class="modal-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                    <label for="unitkerja">Unitkerja</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                        <select class="form-control select2" name="unitkerja" required="">
                                            <option>Select</option>

                                        </select>

                                        </div>
                                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Save Data</button>
                </div>
            </form>
            </div>
        </div>
</div>
<!--end modal alokasi anggaran-->
