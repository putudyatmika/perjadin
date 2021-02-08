<div class="form-group">
    <label for="tujuan">Kode Trx</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="kode_trx" name="kode_trx" readonly=""> </div>
</div>
<div class="form-group">
        <label for="tujuan">Tujuan</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="tujuan" name="tujuan" readonly=""> </div>

</div>
<div class="form-group">
        <label for="tujuan">Durasi</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="durasi" name="durasi" readonly=""> </div>

</div>
<div class="form-group">
    <label for="biaya">Biaya</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="biaya" name="biaya" readonly=""> </div>

</div>
<div class="form-group">
    <label for="biaya">Subject Matter</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="sm" name="sm" readonly=""> </div>

</div>
<div class="form-group">
    <label for="form_nomor_surat">Nomor Surat Permintaan</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control" id="form_nomor_surat" name="form_nomor_surat" placeholder="Nomor Surat Form Permintaan" required="">
    </div>
    <small class="text-danger">Harap ini disesuaikan dengan nomor bidang/bagian</small>
</div>
<div class="form-group">
    <label for="form_tgl_surat">Tanggal Surat Permintaan</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control" id="editform_tgl_surat" name="form_tgl_surat" placeholder="Tanggal Surat Form Permintaan" required="" autocomplete="off">
    </div>
    <small class="text-danger">Tanggal surat permintaan sebelum tanggal keberangkatan</small>
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