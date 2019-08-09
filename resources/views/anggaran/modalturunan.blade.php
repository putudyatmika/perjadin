<!--modal tambah anggaran-->
<div class="modal fade" id="TambahAlokasiModal" tabindex="-1" role="dialog" aria-labelledby="TambahAlokasiModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Alokasi Anggaran</h4> </div>
                <div class="modal-body">
                        <form method="POST" action="{{route('turunan.store')}}">
                        @csrf
                        @if ($dataAnggaran==null)
                                <center>Data anggaran tidak tersedia</center>
                        @else
                        <dl class="row">
                            <dt class="col-sm-3">Tahun</dt>
                            <dd class="col-sm-9">{{$dataAnggaran->tahun_anggaran}}</dd>
                            <dt class="col-sm-3">MAK</dt>
                            <dd class="col-sm-9">{{$dataAnggaran->mak}}</dd>
                            <dt class="col-sm-3">Uraian</dt>
                            <dd class="col-sm-9">{{$dataAnggaran->uraian}}</dd>
                            <dt class="col-sm-3">SM</dt>
                            <dd class="col-sm-9">[{{$dataAnggaran->unitkerja}}] {{$dataAnggaran->Unitkerja->nama}}</dd>
                            <dt class="col-sm-3">Pagu Utama</dt>
                            <dd class="col-sm-9">Rp. @duit($dataAnggaran->pagu_utama)</dd>
                            <dt class="col-sm-3">Pagu teralokasi</dt>
                            <dd class="col-sm-9">Rp. @duit($dataAnggaran->pagu_utama)</dd>
                            <dt class="col-sm-3">Sisa Pagu Utama</dt>
                            <dd class="col-sm-9">Rp. @duit($dataAnggaran->pagu_utama)</dd>
                        </dl>
                        @endif
                        <div class="form-group">
                            <label for="unitkerja">Unitkerja</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" name="unitkerja" required="">
                                    <option>Select</option>
                                    @foreach ($DataUnitkerja as $Unit)
                                        <option value="{{ $Unit -> kode }}">[{{ $Unit -> kode }}] {{ $Unit -> nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pagu">Pagu</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <input type="text" class="form-control" id="pagu_utama" name="pagu_utama" placeholder="Pagu Anggaran" required="">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="pagu">Sisa Pagu</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                    <input type="text" class="form-control" id="pagu_utama" name="pagu_utama" placeholder="Pagu Anggaran" disabled>
                                </div>
                            </div>
                        <input type="hidden" name="a_id" value="{{$dataAnggaran->id}}" />
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

<!--modal tambah anggaran-->
<div class="modal fade" id="EditAlokasiModal" tabindex="-1" role="dialog" aria-labelledby="EditAlokasiModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Edit Alokasi Anggaran</h4> </div>
                <div class="modal-body">
                        <form method="POST" action="{{route('turunan.update','update')}}">
                        @csrf
                        @method('patch')
                        @if ($dataAnggaran==null)
                                <center>Data anggaran tidak tersedia</center>
                        @else
                        <dl class="row">
                            <dt class="col-sm-3">Tahun</dt>
                            <dd class="col-sm-9">{{$dataAnggaran->tahun_anggaran}}</dd>
                            <dt class="col-sm-3">MAK</dt>
                            <dd class="col-sm-9">{{$dataAnggaran->mak}}</dd>
                            <dt class="col-sm-3">Uraian</dt>
                            <dd class="col-sm-9">{{$dataAnggaran->uraian}}</dd>
                            <dt class="col-sm-3">SM</dt>
                            <dd class="col-sm-9">[{{$dataAnggaran->unitkerja}}] {{$dataAnggaran->Unitkerja->nama}}</dd>
                            <dt class="col-sm-3">Pagu Utama</dt>
                            <dd class="col-sm-9">Rp. @duit($dataAnggaran->pagu_utama)</dd>
                            <dt class="col-sm-3">Pagu teralokasi</dt>
                            <dd class="col-sm-9">Rp. @duit($dataAnggaran->pagu_utama)</dd>
                            <dt class="col-sm-3">Sisa Pagu Utama</dt>
                            <dd class="col-sm-9">Rp. @duit($dataAnggaran->pagu_utama)</dd>
                        </dl>
                        @endif
                        <div class="form-group">
                            <label for="unitkerja">Unitkerja</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control select2" name="unitkerja" id="unitkerja" required="">
                                    <option>Select</option>
                                    @foreach ($DataUnitkerja as $Unit)
                                        <option value="{{ $Unit -> kode }}">[{{ $Unit -> kode }}] {{ $Unit -> nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pagu">Pagu</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <input type="text" class="form-control" id="pagu_utama" name="pagu_utama" placeholder="Pagu Anggaran" required="">
                            </div>
                        </div>
                        <input type="hidden" name="a_id" id="a_id" value="{{$dataAnggaran->id}}" />
                        <input type="hidden" name="tid" id="tid" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update Data</button>
                </div>
            </form>
            </div>
        </div>
</div>
<!--end modal tambah anggaran-->
