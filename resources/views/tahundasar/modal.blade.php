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
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <select name="tahun_anggaran" id="tahun_anggaran" class="form-control" required="">
                                    <option value="">Pilih Tahun</option>
                                    @php
                                        $tahun_ini = date('Y');
                                    @endphp
                                    @for ($i = $tahun_ini-2; $i <= $tahun_ini+2; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
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

<!--modal edit-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Tahun Anggaran</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="EditForm" action="{{ route('tahundasar.update','update') }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <select name="tahun_anggaran" id="tahun_anggaran" class="form-control" required="">
                                    <option value="">Pilih Tahun</option>
                                    @for ($i = $tahun_ini-2; $i <= $tahun_ini+2; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="tahun_id" id="tahun_id" value="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Update Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal edit-->

<!--modal hapus-->
<div class="modal fade" id="HapusModal" tabindex="-1" role="dialog" aria-labelledby="HapusModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Hapus Tahun Anggaran</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="HapusForm" action="{{ route('tahundasar.destroy','delete') }}">
                        @csrf
                        @method('delete')
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="text" name="tahun_anggaran" id="tahun_anggaran" class="form-control" value="" readonly="">
                            </div>
                        </div>
                        <input type="hidden" name="tahun_id" id="tahun_id" value="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Hapus Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal hapus-->