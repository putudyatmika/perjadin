<div class="form-group">
    <label for="kode_trx">Kode Trx</label>
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
        <label for="durasi">Durasi</label>
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
    <label for="sm">Subject Matter</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="sm" name="sm" readonly=""> </div>

</div>
<div class="form-group">
    <label for="form_nomor_surat">Nomor Surat Permintaan</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control" id="form_nomor_surat" name="form_nomor_surat" placeholder="Nomor Surat Form Permintaan" readonly="">
    </div>
    <small class="text-danger">Nomor surat Form-JLN</small>
</div>
<div class="form-group">
    <label for="form_tgl_surat">Tanggal Surat Permintaan</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control" id="form_tgl_surat" name="form_tgl_surat" placeholder="Tanggal Surat Form Permintaan" readonly="" autocomplete="off">
    </div>
    <small class="text-danger">Tanggal surat dari Form-JLN</small>
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
        <input type="text" class="form-control tglbrkt" id="tglberangkat" name="tglberangkat" placeholder="Tanggal Berangkat Perjalanan" required="" autocomplete="off">
    </div>
    <small class="text-success" id="infotgl"></small>
</div>
<div class="form-group">
        <label for="flag">Pegawai</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" name="peg_nip" id="peg_nip" required="">
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
@if (Auth::user()->user_level>4)
<div class="form-group">
    <label class="control-label">Kirim Notifikasi</label>
    <div class="radio-list">
        <label class="radio-inline p-0">
            <div class="radio radio-info">
                <input type="radio" name="kirim_notifikasi" id="kirim_notifikasi1" value="0" checked>
                <label for="kirim_notifikasi1" class="text-info">Tidak</label>
            </div>
        </label>
        <label class="radio-inline">
            <div class="radio radio-danger">
                <input type="radio" name="kirim_notifikasi" id="kirim_notifikasi2" value="1">
                <label for="kirim_notifikasi2" class="text-danger">Kirimkan</label>
            </div>
        </label>
    </div>
</div>
@else
<input type="hidden" name="kirim_notifikasi" value="1" />
@endif
<div class="form-group">
        <label class="control-label">Diajukan</label>
        <div class="radio-list">
            <label class="radio-inline p-0">
                <div class="radio radio-info">
                    <input type="radio" name="diajukan" id="diajukan1" value="0" checked>
                    <label for="diajukan1" class="text-info">Tidak, save draft</label>
                </div>
            </label>
            <label class="radio-inline">
                <div class="radio radio-danger">
                    <input type="radio" name="diajukan" id="diajukan2" value="1">
                    <label for="diajukan2" class="text-danger">Ajukan saja </label>
                </div>
            </label>
        </div>
        <span class="pull-left"><i><b>Catatan:</b> <br />-Perjadin yang sudah diajukan tidak bisa ditarik kembali</i></span>

    </div>
