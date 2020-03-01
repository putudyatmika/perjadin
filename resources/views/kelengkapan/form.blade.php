<div class="form-group">
    <label for="tglsurat">Tanggal Surat</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control tglsurat" id="tglsurat" name="tglsurat" placeholder="Tanggal Surat" required="" autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="nomor_surat">Nomor Surat Tugas</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor surat tugas" required="">
    </div>
</div>
<div class="form-group">
    <label for="nomor_spd">Nomor SPD</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control" id="nomor_spd" name="nomor_spd" placeholder="Nomor SPD" required="">
    </div>
</div>
<div class="form-group">
    <label for="tugas">Tandatangan</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <select class="form-control select2" name="ttd" id="ttd" required>
            <option value="">Select</option>
            @for ($i = 0; $i < 4; $i++)
            <option value="{{ $i }}">{{ $FlagTTD[$i] }}</option>
            @endfor

        </select>
    </div>
</div>
<div class="form-group">
    <label for="tugas">Pejabat Tandatangan</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <select class="form-control select2" name="ttd_pejabat" id="ttd_pejabat" required>
            <option value="">Select</option>
            @foreach ($DataPegawai as $peg)
               <option value="{{$peg->nip_baru}}">{{$peg->nama}}</option>
            @endforeach

        </select>
    </div>
</div>
<div class="form-group">
        <label for="tugas">Angkutan Kendaraan</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-lock"></i></div>
            <select class="form-control" name="kendaraan"  id="kendaraan" required>
                <option value="">Select</option>
                @for ($j = 1; $j < 4; $j++)
                    <option value="{{$j}}">{{$FlagKendaraan[$j]}}</option>
                @endfor
            </select>
        </div>
    </div>
<div class="form-group">
    <label for="tugas">PPK</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control" id="ppk_nama" name="ppk_nama" placeholder="PPK NIP" value="{{$DataPPK->nama}}" readonly>
    </div>
</div>
<div class="form-group">
        <label class="control-label">Cetak BPS Tujuan di SPD</label>
        <div class="radio-list">
            <label class="radio-inline p-0">
                <div class="radio radio-success">
                    <input type="radio" name="cetaktujuan" id="cetaktujuan0" value="0" required>
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