<!--modal view matrik-->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-white" id="exampleModalLabel1">Detil Matrik Perjalanan</h4> </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-3">Tahun Anggaran</dt>
                    <dd class="col-sm-9"><span id="tahun"></span></dd>
                    <dt class="col-sm-3">Tujuan</dt>
                    <dd class="col-sm-9"><span id="tujuan"></span></dd>

                    <dt class="col-sm-3">Lamanya</dt>
                    <dd class="col-sm-9"><span id="lamanya"></span>
                    </dd>

                    <dt class="col-sm-3">Subject Matter</dt>
                    <dd class="col-sm-9"><span id="subjectmatter"></span></dd>
                    <dt class="col-sm-3">Unit Pelaksana</dt>
                    <dd class="col-sm-9"><span id="pelaksana"></span></dd>
                    <dt class="col-sm-3 text-truncate">Waktu Pelaksanaan</dt>
                    <dd class="col-sm-9"><span id="waktu"></span></dd>
                    <dt class="col-sm-3 text-truncate">Sumber Dana</dt>
                    <dd class="col-sm-9"><span id="mak"></span></dd>
                    <dt class="col-sm-3 text-truncate">Komponen</dt>
                    <dd class="col-sm-9"><span id="komponen"></span></dd>
                    <dt class="col-sm-3 text-truncate">Rincian Biaya</dt>
                    <dd class="col-sm-9"><p id="harian"></p> <p id="transport"></p> <p id="hotel"></p> <p id="rill"></p></dd>
                    <dt class="col-sm-3 text-truncate">Total Biaya</dt>
                    <dd class="col-sm-9"><span id="totalbiaya"></span></dd>
                    <dt class="col-sm-3 text-truncate">Flag</dt>
                    <dd class="col-sm-9"><span id="flag"></span></dd>
                  </dl>
                  <input type="hidden" name="mid" id="mid">

            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-success waves-effect waves-light" id="EditMatrik">Edit Matrik</a>
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!--end modal view matrik-->

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
                    <input type="hidden" name="tahun_matrik" id="tahun_matrik" value="" />
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
