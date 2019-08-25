<!--modal alokasi anggaran-->
<div class="modal fade" id="AlokasiModal" tabindex="-1" role="dialog" aria-labelledby="AlokasiModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Alokasi Matrik Perjalanan</h4> </div>
                <div class="modal-body">
                        <form method="POST" action="{{ route('matrik.update','update') }}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="matrikid" id="matrikid" value="" />
                        <input type="hidden" name="aksi" value="alokasi" />
                        <div class="form-group">
                                <label for="tujuan">Tujuan</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" disabled> </div>

                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="biaya" name="biaya" disabled> </div>

                        </div>
                        <div class="form-group">
                            <label for="biaya">Subject Matter</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="sm" name="sm" disabled> </div>

                        </div>
                        <div class="form-group">
                                <label for="flag">Unit Pelaksana</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                    <select class="form-control select2" name="unit_pelaksana" id="unit_pelaksana" required="">
                                        <option value="">Select</option>
                                        @foreach ($DataUnitkerja as $item)
                                            <option value="{{$item->kode}}">{{$item->kode}}-{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update Data</button>
                </div>
            </form>
            </div>
        </div>
</div>
<!--end modal alokasi anggaran-->
<!--modal Edit Flag-->
<div class="modal fade" id="FlagModal" tabindex="-1" role="dialog" aria-labelledby="FlagModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Edit Flag Matrik Perjalanan</h4> </div>
                <div class="modal-body">
                        <form method="POST" action="{{ route('matrik.update','update') }}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="matrikid" id="matrikid" value="" />
                        <input type="hidden" name="aksi" value="updateflag" />
                        <div class="form-group">
                                <label for="tujuan">Tujuan</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" disabled> </div>

                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="biaya" name="biaya" disabled> </div>

                        </div>
                        <div class="form-group">
                                <label for="biaya">Unit Pelaksana</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                    <input type="text" class="form-control" id="pelaksana" name="pelaksana" disabled> </div>

                            </div>
                            <div class="form-group">
                                    <label for="biaya">Flag Sebelumnya</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                        <input type="text" class="form-control" id="flag_old" name="flag_old" disabled> </div>

                                </div>
                        <div class="form-group">
                                <label for="flag">Flag Baru</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                    <select class="form-control select2" name="flagmatrik" id="flagmatrik" required="">
                                        <option value="">Select</option>
                                        @for ($i=0;$i<=5;$i++)
                                        <option value="{{$i}}">{{$MatrikFlag[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update Data</button>
                </div>
            </form>
            </div>
        </div>
</div>
<!--modal Edit Flag end-->
<!--modal matrik delete-->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Delete Matrik Perjalanan</h4> </div>
            <div class="modal-body">
                    <form method="POST" action="{{ route('matrik.destroy','delete') }}">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="matrikid" id="matrikid" value="" />
                    <input type="hidden" name="tujuan" id="tujuan" value="" />
                    <input type="hidden" id="sm" name="sm" value="" />
                    <input type="hidden" id="totalbiaya" name="totalbiaya" value="" />
                    <input type="hidden" id="dana_makid" name="dana_makid" value="" />
                    <input type="hidden" id="dana_tid" name="dana_tid" value="" />
                    <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="tujuan" name="tujuan" disabled> </div>

                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="biaya" name="biaya" disabled> </div>

                    </div>
                    <div class="form-group">
                        <label for="biaya">Subject Matter</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="sm" name="sm" disabled> </div>

                    </div>
                    <div class="form-group">
                        <label for="biaya">Flag</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="flagmatrik" name="flagmatrik" disabled> </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Delete Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--modal delete matrik end-->
