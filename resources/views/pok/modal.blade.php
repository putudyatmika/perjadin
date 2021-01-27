<!--modal Tambah-->
<div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="TambahModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Program</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="FormTambah" action="{{ route('pok.programsimpan') }}">
                        @csrf
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="{{Session::get('tahun_anggaran')}}" readonly="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prog_kode"><span class="text-info">Kode Program</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="prog_kode" name="prog_kode" placeholder="Kode Program" required=""> </div>
                                <span class="font-13 text-muted">cth : 054.01.01</span>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-info">Nama Program</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="prog_nama" name="prog_nama" placeholder="Nama Program" required=""> </div>
                                <span class="font-13 text-muted">cth : Program Penyediaan dan Pelayanan Informasi Statistik</span>
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
                <h4 class="modal-title" id="exampleModalLabel1">Edit Program</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="formEdit" action="{{ route('pok.programupdate') }}">
                        @csrf
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="{{Session::get('tahun_anggaran')}}" readonly="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prog_kode"><span class="text-info">Kode Program</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="prog_kode" name="prog_kode" placeholder="Kode Program" required=""> </div>
                                <span class="font-13 text-muted">cth : 054.01.01</span>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-info">Nama Program</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="prog_nama" name="prog_nama" placeholder="Nama Program" required=""> </div>
                                <span class="font-13 text-muted">cth : Program Penyediaan dan Pelayanan Informasi Statistik</span>
                        </div>   
                        <input type="hidden" id="id_prog" name="id_prog" />
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

<!--modal delete anggaran-->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Delete Data Program</h4> </div>
            <div class="modal-body">
                    <form method="POST" class="form" action="{{route('pok.programhapus')}}">
                    @csrf
                    <input type="hidden" id="id_prog" name="id_prog" />
                    <div class="form-group">
                        <label for="tahun_anggaran">Tahun Anggaran</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                            <input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="{{Session::get('tahun_anggaran')}}" readonly="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prog_kode"><span class="text-info">Kode Program</span></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="prog_kode" name="prog_kode" placeholder="Kode Program" readonly=""> </div>
                            <span class="font-13 text-muted">cth : 054.01.01</span>
                    </div>
                    <div class="form-group">
                        <label for="mak"><span class="text-info">Nama Program</span></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="prog_nama" name="prog_nama" placeholder="Nama Program" readonly=""> </div>
                            <span class="font-13 text-muted">cth : Program Penyediaan dan Pelayanan Informasi Statistik</span>
                    </div>   
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


<!--modal Tambah-->
<div class="modal fade" id="TambahKegModal" tabindex="-1" role="dialog" aria-labelledby="TambahModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Program</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="FormTambah" action="{{ route('pok.kegiatansimpan') }}">
                        @csrf
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="{{Session::get('tahun_anggaran')}}" readonly="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Program</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" name="prog_kode" required="">
                                    <option>Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-warning">Kode Kegiatan</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="keg_kode" name="keg_kode" placeholder="Kode Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : 2896</span>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-warning">Nama Kegiatan</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="keg_nama" name="keg_nama" placeholder="Nama Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : Pengembangan dan Analisis Statistik</span>
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