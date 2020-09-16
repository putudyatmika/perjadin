
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
    <label class="control-label">Persetujuan Kabid SM</label>
    <div class="radio-list">
        <label class="radio-inline p-0">
            <div class="radio radio-info">
                <input type="radio" name="kabidsm_setuju" id="kabid1" value="1" required>
                <label for="kabid1" class="text-info">Ya, disetujui</label>
            </div>
        </label>
        <label class="radio-inline">
            <div class="radio radio-danger">
                <input type="radio" name="kabidsm_setuju" id="kabid2" value="2">
                <label for="kabid2" class="text-danger">Tidak, disetujui </label>
            </div>
        </label>
    </div>
</div>
@if (Auth::user()->user_level>4)
<div class="form-group">
    <label class="control-label">Kirim Notifikasi</label>
    <div class="radio-list">
        <label class="radio-inline p-0">
            <div class="radio radio-success">
                <input type="radio" name="kirim_notifikasi" id="kirim_notifikasi1" value="0" checked>
                <label for="kirim_notifikasi1" class="text-success">Tidak</label>
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
        <label for="biaya">Keterangan</label>
        <div class="input-group">
        <textarea name="ket_kabid" class="form-control" id="ket_kabid"></textarea>
        </div>
        <span class="pull-left"><i><b>Catatan : perjadin yang sudah disetujui/ditolak tidak bisa diubah lagi</b></i></span>
</div>
