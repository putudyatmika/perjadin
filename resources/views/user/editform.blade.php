<div class="form-group">
    <label for="username">Username</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="username" name="username" data-minlength="3" placeholder="username" required=""> </div>

</div>
<div class="form-group">
    <label for="name">Nama</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="name" name="name" data-minlength="3" placeholder="Nama Lengkap" required=""> </div>

</div>
<div class="form-group">
    <label for="pagu">Email</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email"> </div>
</div>
<div class="form-group">
    <label for="unitkerja">Unitkerja</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <select class="form-control select2" name="unitkerja" id="unitkerja" required="" data-match-error="Pilih salah satu">
            <option value="">Select</option>
            @foreach ($DataUnitkerja as $unit)
                <option value="{{$unit->kode}}">{{$unit->kode}}-{{$unit->nama}}</option>
            @endforeach
        </select>
        </div>
        <div class="help-block with-errors"></div>
</div>
<div class="form-group">
    <label for="unitkerja">User Level</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <select class="form-control select2" name="user_level" id="userlevel" required="" data-match-error="Pilih salah satu">
            <option value="">Select</option>
            @for ($i = 1; $i < 6; $i++)
                <option value="{{ $i }}">{{ $UserLevel[$i] }}</option>
            @endfor
        </select>
        </div>
        <div class="help-block with-errors"></div>
</div>
<div class="form-group">
    <label for="unitkerja">Pengelola</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <select class="form-control select2" name="pengelola" id="pengelola" data-toggle="validator" required="" data-match-error="Pilih salah satu">
            <option value="">Select</option>
            @for ($i = 0; $i < 6; $i++)
                <option value="{{ $i }}">{{ $UserPengelola[$i] }}</option>
            @endfor
        </select>
        </div>
        <div class="help-block with-errors"></div>
</div>
