<div class="form-group">
        <label for="tujuan">Kode Trx</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="kodetrx" name="kodetrx" disabled> </div>
    </div>
    <div class="form-group">
        <label for="tujuan">Nama Pegawai</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="nama" name="nama" readonly> </div>
    </div>
    <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="ti-user"></i></div>
                <input type="text" class="form-control" id="tujuan" name="tujuan" readonly> </div>

    </div>
    <div class="form-group">
            <label for="tugas">Tugas</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="ti-lock"></i></div>
                <input type="text" class="form-control" id="tugas" name="tugas" readonly>
            </div>
    </div>
    <div class="form-group">
        <label for="tugas">Nomor SPD</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-lock"></i></div>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" required="">
        </div>
    </div>
    <div class="form-group">
            <label for="tugas">Angkutan Kendaraan</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="ti-lock"></i></div>
                <select class="form-control select2" name="kendaraan" required="" id="kendaraan">
                    <option>Select</option>
                    @for ($i = 1; $i < 4; $i++)
                        <option value="{{$i}}">{{$FlagKendaraan[$i]}}</option>
                    @endfor
                </select>
            </div>
        </div>
    <div class="form-group">
        <label for="tugas">PPK</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-lock"></i></div>
            <select class="form-control select2" name="ppk_nip" required="" id="ppk_nip">
                <option value="">Select</option>
                @foreach ($DataPPK as $peg)
                   <option value="{{$peg->nip_baru}}">{{$peg->nama}}</option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="form-group">
            <label class="control-label">Cetak BPS Tujuan</label>
            <div class="radio-list">
                <label class="radio-inline p-0">
                    <div class="radio radio-success">
                        <input type="radio" name="cetaktujuan" id="cetaktujuan0" value="0">
                        <label for="cetaktujuan0" class="text-success">Cetak Langsung</label>
                    </div>
                </label>
                <label class="radio-inline">
                    <div class="radio radio-danger">
                        <input type="radio" name="cetaktujuan" id="cetaktujuan1" value="1">
                        <label for="cetaktujuan1" class="text-danger">Kosongkan</label>
                    </div>
                </label>
            </div>
        </div>
