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
                                <input type="text" class="form-control" id="prog_kode" name="prog_kode" placeholder="Kode Program" readonly=""> </div>
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


<!--modal Tambah kegiatan-->
<div class="modal fade" id="TambahKegModal" tabindex="-1" role="dialog" aria-labelledby="TambahKegModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Kegiatan</h4> </div>
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
                        <div class="form-group">
                            <label for="unitkerja">Flag KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="flag_kro" name="flag_kro" required="">
                                    <option value="">Pilih Flag</option>
                                    <option value="0">Tidak ada</option>
                                    <option value="1">Ada</option>
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

<!--modal edit kegiatan-->
<div class="modal fade" id="EditKegModal" tabindex="-1" role="dialog" aria-labelledby="EditKegModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Kegiatan</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="FormTambah" action="{{ route('pok.kegiatanupdate') }}">
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
                                <select class="form-control select2" id="prog_kode" name="prog_kode" required="">
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
                        <div class="form-group">
                            <label for="unitkerja">Flag KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="flag_kro" name="flag_kro" required="">
                                    <option value="">Pilih Flag</option>
                                    <option value="0">Tidak ada</option>
                                    <option value="1">Ada</option>
                                </select>
                    
                                </div>
                        </div>
                        <input type="hidden" id="idkeg" name="idkeg" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Update Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal edit kegiatan-->

<!--modal edit kegiatan-->
<div class="modal fade" id="DeleteKegModal" tabindex="-1" role="dialog" aria-labelledby="DeleteKegModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Hapus Kegiatan</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="FormTambah" action="{{ route('pok.kegiatanhapus') }}">
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
                                <select class="form-control select2" id="prog_kode" name="prog_kode" readonly="">
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
                                <input type="text" class="form-control" id="keg_kode" name="keg_kode" placeholder="Kode Kegiatan" readonly=""> </div>
                                <span class="font-13 text-muted">cth : 2896</span>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-warning">Nama Kegiatan</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="keg_nama" name="keg_nama" placeholder="Nama Kegiatan" readonly=""> </div>
                                <span class="font-13 text-muted">cth : Pengembangan dan Analisis Statistik</span>
                        </div>  
                        <div class="form-group">
                            <label for="unitkerja">Flag KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="flag_kro" name="flag_kro" readonly="">
                                    <option value="">Pilih Flag</option>
                                    <option value="0">Tidak ada</option>
                                    <option value="1">Ada</option>
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Kegiatan yang dihapus tidak bisa di kembalikan</span></label>
                            
                        </div>
                        <input type="hidden" id="idkeg" name="idkeg" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Hapus Kegiatan</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal edit kegiatan-->

<!--modal Tambah KRO-->
<div class="modal fade" id="TambahKroModal" tabindex="-1" role="dialog" aria-labelledby="TambahKroModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah KRO</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="TambahKroForm" id="TambahKroForm" action="{{ route('pok.krosimpan') }}">
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
                                <select class="form-control select2" id="prog_kode_kro" name="prog_kode" required="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="keg_kode_kro" name="keg_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kro_kode" name="kro_kode" placeholder="Kode KRO" required=""> </div>
                                <span class="font-13 text-muted">cth : 100</span>
                        </div>
                        <div class="form-group">
                            <label for="mak">Nama KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kro_nama" name="kro_nama" placeholder="Nama KRO" required=""> </div>
                                <span class="font-13 text-muted">cth : Data dan Informasi Publik</span>
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

<!--modal edit KRO-->
<div class="modal fade" id="EditKroModal" tabindex="-1" role="dialog" aria-labelledby="EditKroModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit KRO</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="EditKroForm" id="EditKroForm" action="{{ route('pok.kroupdate') }}">
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
                                <select class="form-control select2" id="prog_kode_editkro" name="prog_kode" readonly="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="keg_kode_editkro" name="keg_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kro_kode" name="kro_kode" placeholder="Kode KRO" required=""> </div>
                                <span class="font-13 text-muted">cth : 100</span>
                        </div>
                        <div class="form-group">
                            <label for="mak">Nama KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kro_nama" name="kro_nama" placeholder="Nama KRO" required=""> </div>
                                <span class="font-13 text-muted">cth : Data dan Informasi Publik</span>
                        </div>
                        <input type="hidden" id="idkro" name="idkro" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Update Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal tambah-->

<!--modal hapus KRO-->
<div class="modal fade" id="DeleteKroModal" tabindex="-1" role="dialog" aria-labelledby="DeleteKroModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Hapus KRO</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="EditKroForm" id="EditKroForm" action="{{ route('pok.krohapus') }}">
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
                                <select class="form-control select2" id="prog_kode" name="prog_kode" readonly="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="keg_kode" name="keg_kode" placeholder="Kode Kegiatan" readonly=""> </div>
                                <span class="font-13 text-muted">cth : 100</span>
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kro_kode" name="kro_kode" placeholder="Kode KRO" readonly=""> </div>
                                <span class="font-13 text-muted">cth : 100</span>
                        </div>
                        <div class="form-group">
                            <label for="mak">Nama KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kro_nama" name="kro_nama" placeholder="Nama KRO" readonly=""> </div>
                                <span class="font-13 text-muted">cth : Data dan Informasi Publik</span>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Data yang dihapus tidak bisa di kembalikan</span></label>
                            
                        </div>
                        <input type="hidden" id="idkro" name="idkro" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Hapus Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal hapus KRO-->

<!--modal Tambah output-->
<div class="modal fade" id="TambahOutputModal" tabindex="-1" role="dialog" aria-labelledby="TambahOutputModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Output</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="TambahOutputForm" id="TambahOutputForm" action="{{ route('pok.outputsimpan') }}">
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
                                <select class="form-control select2" id="prog_kode_output" name="prog_kode" required="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="keg_kode_output" name="keg_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="kro_kode_output" name="kro_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Kode Output</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="output_kode" name="output_kode" placeholder="Kode Output Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : 004</span>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Nama Output</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="output_nama" name="output_nama" placeholder="Nama Output Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : PUBLIKASI/LAPORAN ANALISIS DAN PENGEMBANGAN STATISTIK</span>
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

<!--modal Edit output-->
<div class="modal fade" id="EditOutputModal" tabindex="-1" role="dialog" aria-labelledby="EditOutputModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Output</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="EditOutputForm" id="EditOutputForm" action="{{ route('pok.outputupdate') }}">
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
                                <select class="form-control select2" id="prog_kode_editoutput" name="prog_kode" required="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="keg_kode_editoutput" name="keg_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="kro_kode_editoutput" name="kro_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Kode Output</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="output_kode" name="output_kode" placeholder="Kode Output Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : 004</span>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Nama Output</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="output_nama" name="output_nama" placeholder="Nama Output Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : PUBLIKASI/LAPORAN ANALISIS DAN PENGEMBANGAN STATISTIK</span>
                        </div>
                        <input type="hidden" id="idoutput" name="idoutput" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Update Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal tambah-->

<!--modal delete output-->
<div class="modal fade" id="DeleteOutputModal" tabindex="-1" role="dialog" aria-labelledby="DeleteOutputModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Hapus Output</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="EditOutputForm" id="EditOutputForm" action="{{ route('pok.outputhapus') }}">
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
                                <select class="form-control select2" id="prog_kode_editoutput" name="prog_kode" readonly="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="keg_kode" name="keg_kode" placeholder="Kode Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kro_kode" name="kro_kode" placeholder="Kode KRO" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Kode Output</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="output_kode" name="output_kode" placeholder="Kode Output Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Nama Output</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="output_nama" name="output_nama" placeholder="Nama Output Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Data yang dihapus tidak bisa di kembalikan</span></label>
                            
                        </div>
                        <input type="hidden" id="idoutput" name="idoutput" />
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

<!--modal Tambah Komponen-->
<div class="modal fade" id="TambahKomponenModal" tabindex="-1" role="dialog" aria-labelledby="TambahKomponenModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Komponen</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="TambahKomponenForm" id="TambahKomponenForm" action="{{ route('pok.komponensimpan') }}">
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
                                <select class="form-control select2" id="prog_kode_komponen" name="prog_kode" required="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="keg_kode_komponen" name="keg_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="kro_kode_komponen" name="kro_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Output</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="output_kode_komponen" name="output_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-success">Kode Komponen</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="komponen_kode" name="komponen_kode" placeholder="Kode Komponen Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : 100</span>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-success">Nama Komponen</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="komponen_nama" name="komponen_nama" placeholder="Nama Komponen Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : SURVEI ANGKATAN KERJA NASIONAL (SAKERNAS) SEMESTERAN</span>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Flag SubKomponen</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="flag_subkomponen" name="flag_subkomponen" required="">
                                    <option value="">Pilih Flag</option>
                                    <option value="0">Tidak ada</option>
                                    <option value="1">Ada</option>
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

<!--modal Edit Komponen-->
<div class="modal fade" id="EditKomponenModal" tabindex="-1" role="dialog" aria-labelledby="EditKomponenModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Komponen</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="EditKomponenForm" id="EditKomponenForm" action="{{ route('pok.komponenupdate') }}">
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
                                <select class="form-control select2" id="prog_kode_editkomponen" name="prog_kode" required="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="keg_kode_editkomponen" name="keg_kode" required="">
                                </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="kro_kode_editkomponen" name="kro_kode" required="">
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Output</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="output_kode_editkomponen" name="output_kode" required="">
                                </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-success">Kode Komponen</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="komponen_kode" name="komponen_kode" placeholder="Kode Komponen Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : 100</span>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-success">Nama Komponen</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="komponen_nama" name="komponen_nama" placeholder="Nama Komponen Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : SURVEI ANGKATAN KERJA NASIONAL (SAKERNAS) SEMESTERAN</span>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Flag SubKomponen</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="flag_subkomponen" name="flag_subkomponen" required="">
                                    <option value="">Pilih Flag</option>
                                    <option value="0">Tidak ada</option>
                                    <option value="1">Ada</option>
                                </select>
                    
                                </div>
                        </div>
                        <input type="hidden" id="idkomponen" name="idkomponen" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Update Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal tambah-->

<!--modal Hapus Komponen-->
<div class="modal fade" id="DeleteKomponenModal" tabindex="-1" role="dialog" aria-labelledby="DeleteKomponenModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Komponen</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="EditKomponenForm" id="EditKomponenForm" action="{{ route('pok.komponenhapus') }}">
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
                                <select class="form-control select2" id="prog_kode_editkomponen" name="prog_kode" readonly="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="keg_kode" name="keg_kode" placeholder="Kode Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kro_kode" name="kro_kode" placeholder="Kode KRO" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Kode Output</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="output_kode" name="output_kode" placeholder="Kode Output Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-success">Kode Komponen</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="komponen_kode" name="komponen_kode" placeholder="Kode Komponen Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-success">Nama Komponen</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="komponen_nama" name="komponen_nama" placeholder="Nama Komponen Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Flag SubKomponen</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="flag_subkomponen" name="flag_subkomponen" readonly="">
                                    <option value="">Pilih Flag</option>
                                    <option value="0">Tidak ada</option>
                                    <option value="1">Ada</option>
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Data yang dihapus tidak bisa di kembalikan</span></label>
                            
                        </div>
                        <input type="hidden" id="idkomponen" name="idkomponen" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Hapus Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal tambah-->

<!--modal Tambah SubKomponen-->
<div class="modal fade" id="TambahSubKomponenModal" tabindex="-1" role="dialog" aria-labelledby="TambahSubKomponenModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Tambah Sub Komponen</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="TambahSubKomponenForm" id="TambahSubKomponenForm" action="{{ route('pok.subkomponensimpan') }}">
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
                                <select class="form-control select2" id="prog_kode_subkomponen" name="prog_kode" required="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="keg_kode_subkomponen" name="keg_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="kro_kode_subkomponen" name="kro_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Output</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="output_kode_subkomponen" name="output_kode" required="">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-success">Kode Komponen</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="komponen_kode_subkomponen" name="komponen_kode" required="">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode Sub Komponen</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="subkomponen_kode" name="subkomponen_kode" placeholder="Kode Sub Komponen Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : A</span>
                        </div>
                        <div class="form-group">
                            <label for="mak">Nama Sub Komponen</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="subkomponen_nama" name="subkomponen_nama" placeholder="Nama Sub Komponen Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : PELATIHAN INNAS, INDA, PETUGAS</span>
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

<!--modal Edit SubKomponen-->
<div class="modal fade" id="EditSubKomponenModal" tabindex="-1" role="dialog" aria-labelledby="EditSubKomponenModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Sub Komponen</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="EditSubKomponenForm" id="EditSubKomponenForm" action="{{ route('pok.subkomponenupdate') }}">
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
                                <select class="form-control select2" id="prog_kode_editsubkomponen" name="prog_kode" readonly="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="keg_kode_editsubkomponen" name="keg_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="kro_kode_editsubkomponen" name="kro_kode" required="">
                                    
                                   
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="unitkerja">Output</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="output_kode_editsubkomponen" name="output_kode" required="">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-success">Kode Komponen</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" id="komponen_kode_editsubkomponen" name="komponen_kode" required="">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode Sub Komponen</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="subkomponen_kode" name="subkomponen_kode" placeholder="Kode Sub Komponen Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : A</span>
                        </div>
                        <div class="form-group">
                            <label for="mak">Nama Sub Komponen</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="subkomponen_nama" name="subkomponen_nama" placeholder="Nama Sub Komponen Kegiatan" required=""> </div>
                                <span class="font-13 text-muted">cth : PELATIHAN INNAS, INDA, PETUGAS</span>
                        </div>
                        <input type="hidden" id="idsubkomponen" name="idsubkomponen" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Update Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end edit tambah-->

<!--modal Hapus SubKomponen-->
<div class="modal fade" id="DeleteSubKomponenModal" tabindex="-1" role="dialog" aria-labelledby="DeleteSubKomponenModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Hapus Sub Komponen</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="EditSubKomponenForm" id="EditSubKomponenForm" action="{{ route('pok.subkomponenhapus') }}">
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
                                <select class="form-control select2" id="prog_kode_hapussubkomponen" name="prog_kode" readonly="">
                                    <option value="">Pilih Program</option>
                                    @foreach ($dataProgram as $prog)
                                        <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                                    @endforeach
                                </select>
                    
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode Kegiatan</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="keg_kode" name="keg_kode" placeholder="Kode Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode KRO</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kro_kode" name="kro_kode" placeholder="Kode KRO" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Kode Output</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="output_kode" name="output_kode" placeholder="Kode Output Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-success">Kode Komponen</span></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="komponen_kode" name="komponen_kode" placeholder="Kode Komponen Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak">Kode Sub Komponen</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="subkomponen_kode" name="subkomponen_kode" placeholder="Kode Sub Komponen Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak">Nama Sub Komponen</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="subkomponen_nama" name="subkomponen_nama" placeholder="Nama Sub Komponen Kegiatan" readonly=""> </div>
                                
                        </div>
                        <div class="form-group">
                            <label for="mak"><span class="text-danger">Data yang dihapus tidak bisa di kembalikan</span></label>
                            
                        </div>
                        <input type="hidden" id="idsubkomponen" name="idsubkomponen" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Hapus Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal tambah-->