<div class="form-group">
    <label for="username">Username</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="username" name="username" placeholder="username" required=""> </div>

</div>
<div class="form-group">
    <label for="name">Nama</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required=""> </div>

</div>
<div class="form-group">
    <label for="pagu">Email</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email"> </div>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall"></i></div>
        <input type="password" class="form-control" id="password" name="password" placeholder="password" required=""> </div>
</div>
<div class="form-group">
    <label for="password_confirmation">Konfirmasi Password</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall"></i></div>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" required=""> </div>
</div>

<div class="form-group">
    <label for="unitkerja">User Level</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <select class="form-control select2" name="user_level" required="">
            <option>Select</option>
            @for ($i = 1; $i < 6; $i++)
                <option value="{{ $i }}">{{ $UserLevel[$i] }}</option>
            @endfor
        </select>

        </div>
</div>
<div class="form-group">
    <label for="unitkerja">Pengelola</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
        <select class="form-control select2" name="pengelola" required="">
            <option>Select</option>
            @for ($i = 0; $i < 6; $i++)
                <option value="{{ $i }}">{{ $UserPengelola[$i] }}</option>
            @endfor
        </select>

        </div>
</div>
