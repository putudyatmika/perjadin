<div class="form-group">
    <label for="nama">Nama</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap tanpa gelar" required=""> </div>
</div>
<div class="form-group">
    <label for="nipbaru">NIP</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <input type="text" class="form-control" id="nipbaru" name="nipbaru" placeholder="NIP" required=""> </div>
</div>
<div class="form-group">
    <label for="tgllahir">Tanggal Lahir</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control tgllahir" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" required="" autocomplete="off">
    </div>
</div>
<div class="form-group">
        <label for="nipbaru">Jenis Kelamin</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" name="jk" id="jk" required="">
                <option>Select</option>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
            </select>

            </div>
</div>
<div class="form-group">
    <label for="nipbaru">Pangkat/Gol</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <select class="form-control select2" name="gol" required="" id="gol">
            <option>Select</option>
            @foreach ($DataGol as $Gol)
                <option value="{{ $Gol -> kode }}">{{ $Gol -> pangkat }} ( {{ $Gol -> gol }})</option>
            @endforeach
        </select>

        </div>
</div>
<div class="form-group">
    <label for="nipbaru">Unitkerja</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <select class="form-control select2" name="unitkerja" required="" id="unitkerja">
            <option>Select</option>
            @foreach ($DataUnitkerja as $Unit)
                <option value="{{ $Unit -> kode }}">{{ $Unit -> kode }}-{{ $Unit -> nama }}</option>
            @endforeach
        </select>

        </div>
</div>
<div class="form-group">
    <label for="nipbaru">Jabatan</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <select class="form-control select2" name="jabatan" required="" id="jabatan">
            <option>Select</option>
            @for ($i = 1; $i < 7; $i++)
            <option value="{{ $i }}">{{ $JenisJabatanVar[$i] }}</option>
            @endfor
        </select>
    </div>
</div>
<div class="form-group">
        <label for="nipbaru">Pengelola</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" name="flag_pengelola" required="" id="flag_pengelola">
                <option value="">Select</option>
                @for ($i = 0; $i <= 3; $i++)
                <option value="{{ $i }}">{{ $FlagPengelola[$i] }}</option>
                @endfor
            </select>
        </div>
    </div>
