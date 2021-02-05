    <div class="form-group">
        <label for="tahun_anggaran">Tahun Anggaran</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-lock"></i></div>
            <input type="text" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="{{Session::get('tahun_anggaran')}}" readonly="" />
        </div>
    </div>
    <div class="form-group">
        <label for="prog_kode"><span class="text-info">Kode Program</span></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="prog_kode" name="prog_kode" placeholder="Kode Program" required=""> </div>
            <span class="font-13 text-muted">cth : 054.01.01</span>
    </div>
    <div class="form-group">
        <label for="mak"><span class="text-info">Nama Program</span></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="prog_nama" name="prog_nama" placeholder="Nama Program" required=""> </div>
            <span class="font-13 text-muted">cth : Program Penyediaan dan Pelayanan Informasi Statistik</span>
    </div>
    <div class="form-group">
        <label for="mak"><span class="text-warning">Kode Kegiatan</span></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="keg_kode" name="keg_kode" placeholder="Kode Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : 2896</span>
    </div>
    <div class="form-group">
        <label for="mak"><span class="text-warning">Nama Kegiatan</span></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="keg_nama" name="keg_nama" placeholder="Nama Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : Pengembangan dan Analisis Statistik</span>
    </div>
    <div class="form-group">
        <label for="mak">Kode KRO</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="kro_kode" name="kro_kode" placeholder="Kode KRO"> </div>
            <span class="font-13 text-muted">cth : 100</span>
    </div>
    <div class="form-group">
        <label for="mak">Nama KRO</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="kro_nama" name="kro_nama" placeholder="Nama KRO"> </div>
            <span class="font-13 text-muted">cth : Data dan Informasi Publik</span>
    </div>
    <div class="form-group">
        <label for="mak"><span class="text-danger">Kode Output</span></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="output_kode" name="output_kode" placeholder="Kode Output Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : 004</span>
    </div>
    <div class="form-group">
        <label for="mak"><span class="text-danger">Nama Output</span></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="output_nama" name="output_nama" placeholder="Nama Output Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : PUBLIKASI/LAPORAN ANALISIS DAN PENGEMBANGAN STATISTIK</span>
    </div>
    <div class="form-group">
        <label for="mak"><span class="text-success">Kode Komponen</span></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="komponen_kode" name="komponen_kode" placeholder="Kode Komponen Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : 100</span>
    </div>
    <div class="form-group">
        <label for="mak"><span class="text-success">Nama Komponen</span></label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="komponen_nama" name="komponen_nama" placeholder="Nama Komponen Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : SURVEI ANGKATAN KERJA NASIONAL (SAKERNAS) SEMESTERAN</span>
    </div>
    <div class="form-group">
        <label for="mak">Kode Sub Komponen</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="subkomponen_kode" name="subkomponen_kode" placeholder="Kode Sub Komponen Kegiatan"> </div>
            <span class="font-13 text-muted">cth : A</span>
    </div>
    <div class="form-group">
        <label for="mak">Nama Sub Komponen</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="subkomponen_nama" name="subkomponen_nama" placeholder="Nama Sub Komponen Kegiatan"> </div>
            <span class="font-13 text-muted">cth : PELATIHAN INNAS, INDA, PETUGAS</span>
    </div>
    <div class="form-group">
        <label for="mak">Kode Akun</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="akun_kode" name="akun_kode" placeholder="Kode Akun Kegiatan" required=""> </div>
            <span class="font-13 text-muted">cth : 521211</span>
    </div>
    <div class="form-group">
        <label for="mak">Nama Akun</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="akun_nama" name="akun_nama" placeholder="Nama Akun Kegiatan"> </div>
            <span class="font-13 text-muted">cth : Belanja Perjalanan Dinas Biasa</span>
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
