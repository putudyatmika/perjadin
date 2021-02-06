    <div class="form-group">
        <label for="tahun_anggaran">Tahun Anggaran</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-lock"></i></div>
            <input type="text" class="form-control" name="tahun_anggaran" id="tahun_editanggaran" value="{{Session::get('tahun_anggaran')}}" readonly="" />
        </div>
    </div>
    <div class="form-group">
        <label for="unitkerja">Program</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" id="prog_kode_editanggaran" name="prog_kode" required="">
                <option value="">Pilih Program</option>
                @foreach ($dataProgram as $prog)
                    <option value="{{$prog->kode_prog}}">[{{$prog->kode_prog}}] {{$prog->nama_prog}}</option>
                @endforeach
            </select>

            </div>
    </div>
    <div class="form-group">
        <label for="unitkerja">Kegiatan</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" id="keg_kode_editanggaran" name="keg_kode" required="">


            </select>

            </div>
    </div>
    <div class="form-group">
        <label for="unitkerja">KRO</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" id="kro_kode_editanggaran" name="kro_kode" required="">


            </select>

            </div>
    </div>
    <div class="form-group">
        <label for="unitkerja">Output</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" id="output_kode_editanggaran" name="output_kode" required="">
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="mak"><span class="text-success">Komponen</span></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" id="komponen_kode_editanggaran" name="komponen_kode" required="">
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="mak">Kode Sub Komponen</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" id="subkomponen_kode_editanggaran" name="subkomponen_kode" required="">
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="mak">Akun</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" id="akun_kode_editanggaran" name="akun_kode" required="">
                @foreach ($dataAkun as $akun)
                    <option value="{{$akun->kode_akun}}">[{{$akun->kode_akun}}] {{$akun->nama_akun}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="uraian">Uraian/Detil</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall"></i></div>
            <input type="text" class="form-control" id="uraian_editanggaran" name="uraian" placeholder="Uraian Anggaran" required=""> </div>
    </div>
    <div class="form-group">
        <label for="pagu">Pagu</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <input type="number" class="form-control" id="pagu_utama_editanggaran" name="pagu_utama" placeholder="Pagu Anggaran" required=""> </div>
    </div>
    <div class="form-group">
        <label for="unitkerja">Unitkerja Subject Matter</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" name="unitkerja" id="unitkerja_editanggaran" required="">
                <option>Select</option>
                @foreach ($DataUnitkerja as $Unit)
                    <option value="{{ $Unit -> kode }}">[{{ $Unit -> kode }}] {{ $Unit -> nama }}</option>
                @endforeach
            </select>

            </div>
    </div>
