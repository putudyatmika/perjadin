<div class="form-group">
        <label for="tahun_anggaran">Tahun Anggaran</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-lock"></i></div>
            <input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="{{Session::get('tahun_anggaran')}}" readonly="" />
        </div>
    </div>
    <div class="form-group">
        <label for="mak">MAK</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="mak" name="mak" placeholder="Mata Anggaran Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : 054.01.06.2895.004.100.524111</span>
    </div>
    <div class="form-group">
        <label for="mak">Kode Komponen</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="komponen_kode" name="komponen_kode" placeholder="Kode Komponen Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : 100</span>
    </div>
    <div class="form-group">
        <label for="mak">Nama Komponen</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="komponen_nama" name="komponen_nama" placeholder="Nama Komponen Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : SURVEI ANGKATAN KERJA NASIONAL (SAKERNAS) SEMESTERAN</span>
    </div>
    <div class="form-group">
        <label for="uraian">Uraian</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall"></i></div>
            <input type="text" class="form-control" id="uraian" name="uraian" placeholder="Uraian Anggaran" required=""> </div>
    </div>
    <div class="form-group">
        <label for="pagu">Pagu</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <input type="number" class="form-control" id="pagu_utama" name="pagu_utama" placeholder="Pagu Anggaran" required=""> </div>
    </div>


    <div class="form-group">
        <label for="unitkerja">Unitkerja Subject Matter</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <select class="form-control select2" name="unitkerja" required="">
                <option>Select</option>
                @foreach ($DataUnitkerja as $Unit)
                    <option value="{{ $Unit -> kode }}">[{{ $Unit -> kode }}] {{ $Unit -> nama }}</option>
                @endforeach
            </select>

            </div>
    </div>
