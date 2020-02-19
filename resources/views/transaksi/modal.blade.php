<!--modal Ajukan-->
<div class="modal fade" id="AjukanModal" tabindex="-1" role="dialog" aria-labelledby="AjukanModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Ajukan Perjalanan Pegawai</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="FormAjukan" action="{{ route('transaksi.update','update') }}">
                        @csrf
                        @method('patch')
                        <input type="hidden" id="trxid" name="trxid" value="">
                        <input type="hidden" id="kodetrx" name="kodetrx" value="">
                        <input type="hidden" id="matrikid" name="matrikid" value="">
                        <input type="hidden" id="lamanya" name="lamanya" value="">
                        <input type="hidden" name="aksi" value="alokasipegawai">
                        <input type="hidden" name="tglawal" id="tglawal" value="">
                        <input type="hidden" name="tglakhir" id="tglakhir" value="">
                        @include('transaksi.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light m-r-10">Save Data</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal ajukan-->
<!--modal Edit-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Edit Pengajuan Perjalanan Pegawai</h4> </div>
            <div class="modal-body">
                    <form method="POST" name="FormEditAjukan" action="{{ route('transaksi.update','update') }}">
                        @csrf
                        @method('patch')
                        <input type="hidden" id="trxid" name="trxid" value="">
                        <input type="hidden" id="kodetrx" name="kodetrx" value="">
                        <input type="hidden" id="matrikid" name="matrikid" value="">
                        <input type="hidden" id="lamanya" name="lamanya" value="">
                        <input type="hidden" name="aksi" value="editalokasi">
                        <input type="hidden" name="tglawal" id="tglawal" value="">
                        <input type="hidden" name="tglakhir" id="tglakhir" value="">
                        <div class="form-group">
                            <label for="tujuan">Kode Trx</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="kode_trx" name="kode_trx" readonly> </div>
                        </div>
                        <div class="form-group">
                                <label for="tujuan">Tujuan</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                    <input type="text" class="form-control" id="tujuan" name="tujuan" readonly> </div>

                        </div>
                        <div class="form-group">
                                <label for="tujuan">Durasi</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                    <input type="text" class="form-control" id="durasi" name="durasi" readonly> </div>

                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="biaya" name="biaya" readonly> </div>

                        </div>
                        <div class="form-group">
                            <label for="biaya">Subject Matter</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control" id="sm" name="sm" disabled> </div>

                        </div>
                        <div class="form-group">
                                <label for="tugas">Tugas</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-lock"></i></div>
                                    <input type="text" class="form-control" id="tugas" name="tugas" placeholder="Tugas Perjalanan" required="">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="tglbrkt">Tanggal Berangkat</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="text" class="form-control tglbrkt" id="edittglberangkat" name="edittglberangkat" placeholder="Tanggal Berangkat Perjalanan" required="" autocomplete="off">
                            </div>
                            <span id="infotgl"></span>
                        </div>
                        <div class="form-group">
                                <label for="flag">Pegawai</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                    <select class="form-control" name="peg_nip" id="peg_nip" required="">
                                        <option value="">Select</option>
                                        @foreach ($DataBidang as $bid)
                                        <optgroup label="{{$bid->nama}}">
                                            @foreach ($DataPegawai as $item)
                                                @if ($item->Unitkerja->bidang == $bid->bidang)
                                                    <option value="{{$item->nip_baru}}">{{$item->nama}}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="flag">Setuju Kabid SM</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control" name="kabid_setuju" id="kabid_setuju" required="">
                                    <option value="">Select</option>
                                    @for ($i = 0; $i < 3; $i++)
                                        <option value="{{$i}}">{{$FlagKonfirmasi[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="flag">Setuju PPK</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control" name="ppk_setuju" id="ppk_setuju" required="">
                                    <option value="">Select</option>
                                    @for ($i = 0; $i < 3; $i++)
                                    <option value="{{$i}}">{{$FlagKonfirmasi[$i]}}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="flag">Setuju KPA</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control" name="kpa_setuju" id="kpa_setuju" required="">
                                    <option value="">Select</option>
                                    @for ($i = 0; $i < 3; $i++)
                                    <option value="{{$i}}">{{$FlagKonfirmasi[$i]}}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="flag">Flag Transaksi</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
                                <select class="form-control" name="flag_transaksi" id="flag_transaksi" required="">
                                    <option value="">Select</option>
                                    @for ($i = 0; $i < 8; $i++)
                                        <option value="{{$i}}">{{$FlagTrx[$i]}}</option>
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
<!--end modal Edit-->
<!--modal view transaksi-->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-white" id="exampleModalLabel1">Detil Transaksi Perjalanan</h4> </div>
            <div class="modal-body">
                <h4 class="box-title">Transaksi Perjalanan</h4>
                <hr>
                <dl class="row">
                        <dt class="col-sm-3">Kode Trx</dt>
                        <dd class="col-sm-9"><span id="kode_trx"></span></dd>
                        <dt class="col-sm-3">Nama Pegawai</dt>
                        <dd class="col-sm-9"><span id="nama"></span></dd>
                        <dt class="col-sm-3">Tugas</dt>
                        <dd class="col-sm-9"><span id="tugas"></span></dd>
                        <dt class="col-sm-3">Tanggal Berangkat</dt>
                        <dd class="col-sm-9"><span id="tgl_brkt"></span></dd>
                        <dt class="col-sm-3">Tanggal Kembali</dt>
                        <dd class="col-sm-9"><span id="tgl_balik"></span></dd>
                        <dt class="col-sm-3">Tujuan</dt>
                        <dd class="col-sm-9"><span id="tujuan"></span></dd>
                        <dt class="col-sm-3">Lamanya</dt>
                        <dd class="col-sm-9"><span id="lamanya"></span></dd>
                        <dt class="col-sm-3">Subject Matter</dt>
                        <dd class="col-sm-9"><span id="subjectmatter"></span></dd>
                        <dt class="col-sm-3">Unit Pelaksana</dt>
                        <dd class="col-sm-9"><span id="pelaksana"></span></dd>
                        <dt class="col-sm-3 text-truncate">Waktu Pelaksanaan</dt>
                        <dd class="col-sm-9"><span id="tgl_pelaksanaan"></span></dd>
                        <dt class="col-sm-3 text-truncate">Sumber Dana</dt>
                        <dd class="col-sm-9"><span id="sumberdana"></span></dd>
                        <dt class="col-sm-3 text-truncate">Rincian Biaya</dt>
                        <dd class="col-sm-9">
                            <ul class="list-icons">
                                <li><i class="ti-angle-right"></i> <span id="harian"></span></li>
                                <li><i class="ti-angle-right"></i> <span id="transport"></span></li>
                                <li><i class="ti-angle-right"></i> <span id="hotel"></span> </li>
                                <li><i class="ti-angle-right"></i> <span id="rill"></span> </li>
                            </ul>
                        </dd>
                        <dt class="col-sm-3 text-truncate">Total Biaya</dt>
                        <dd class="col-sm-9"><span id="totalbiaya"></span></dd>
                        <dt class="col-sm-3 text-truncate">Flag Matrik</dt>
                        <dd class="col-sm-9"><span id="flagmatrik"></span></dd>
                        <dt class="col-sm-3 text-truncate">Flag Transaksi</dt>
                        <dd class="col-sm-9"><span id="flagtransaksi"></span> <span id="flagket"></span></dd>
                </dl>

                <input type="hidden" name="matrikid" id="matrikid">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-success waves-effect waves-light" id="EditView">Edit Data</button>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="DeleteView">Delete Data</button> --}}
            </div>

        </div>
    </div>
</div>
<!--end modal view transaksi-->
