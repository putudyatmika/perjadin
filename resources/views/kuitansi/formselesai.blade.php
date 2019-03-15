<div class="form-group">
        <label for="tujuan">Kode Trx</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-user"></i></div>
            <input type="text" class="form-control" id="kodetrx" name="kodetrx" readonly> </div>
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
    <label for="tgl_brkt">Tanggal Kuitansi</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control" id="tgl_kuitansi" name="tgl_kuitansi" placeholder="Tanggal Kuitansi" readonly>
    </div>
</div>
<div class="form-group">
        <label for="tgl_balik">Total Biaya</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-lock"></i></div>
            <input type="text" class="form-control" id="totalbiaya" name="totalbiaya" placeholder="Total Biaya" readonly>
        </div>
</div>
<div class="form-group">
       <span><i>Catatan: Kuitansi yang sudah diselesaikan tidak bisa di edit kembali</i></span>
</div>
@if (Auth::user()->pengelola==5)
<div class="form-group">
        <label for="tgl_balik">Flag Transaksi</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-lock"></i></div>
            <select name="flag_kuitansi" id="flag_kuitansi" class="form-control">
                <option value="">Pilih Flag</option>
                @for ($i=0;$i<=3;$i++)
                    <option value="{{$i}}">{{$FlagSrt[$i]}}</option>
                @endfor
            </select>

        </div>
</div>
@endif

