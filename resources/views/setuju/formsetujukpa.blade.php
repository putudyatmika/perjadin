
<dl class="row">
        <dt class="col-sm-4">Kode Trx</dt>
        <dd class="col-sm-8"><span id="kode_trx"></span></dd>
        <dt class="col-sm-4">Tujuan</dt>
        <dd class="col-sm-8"><span id="tujuan"></span></dd>
        <dt class="col-sm-4">Nama Pegawai</dt>
        <dd class="col-sm-8"><span id="nama"></span></dd>
        <dt class="col-sm-4">Pelaksanaan</dt>
        <dd class="col-sm-8"><span id="tgl_pelaksanaan"></span></dd>
        <dt class="col-sm-4">Tugas</dt>
        <dd class="col-sm-8"><span id="tugas"></span></dd>
        <dt class="col-sm-4">Tanggal Berangkat</dt>
        <dd class="col-sm-8"><span id="tgl_brkt"></span></dd>
        <dt class="col-sm-4">Tanggal Kembali</dt>
        <dd class="col-sm-8"><span id="tgl_balik"></span></dd>
        <dt class="col-sm-4">Lamanya</dt>
        <dd class="col-sm-8"><span id="lamanya"></span></dd>
        <dt class="col-sm-4">Subject Matter</dt>
        <dd class="col-sm-8"><span id="subjectmatter"></span></dd>
        <dt class="col-sm-4 text-truncate">Sumber Dana</dt>
        <dd class="col-sm-8"><span id="sumberdana"></span></dd>
        <dt class="col-sm-4 text-truncate">Total Biaya</dt>
        <dd class="col-sm-8"><span id="totalbiaya"></span></dd>
</dl>
<div class="form-group">
    <label class="control-label">Persetujuan KPA</label>
    <div class="radio-list">
        <label class="radio-inline p-0">
            <div class="radio radio-info">
                <input type="radio" name="kpa_setuju" id="kpa1" value="1" required>
                <label for="kpa1" class="text-info">Ya, disetujui</label>
            </div>
        </label>
        <label class="radio-inline">
            <div class="radio radio-danger">
                <input type="radio" name="kpa_setuju" id="kpa2" value="2">
                <label for="kpa2" class="text-danger">Tidak, disetujui </label>
            </div>
        </label>
    </div>
</div>
<div class="form-group">
        <label for="biaya">Keterangan</label>
        <div class="input-group">
        <textarea name="ket_kpa" class="form-control" id="ket_kpa"></textarea>
        </div>
</div>
