<div class="form-group">
    <label for="tujuan">Kode Trx</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-user"></i></div>
        <input type="text" class="form-control" id="kodetrx" name="kodetrx" disabled> </div>
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
    <label for="tugas">Nomor Surat</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" required="">
    </div>
</div>
<div class="form-group">
    <label for="tglsurat">Tanggal Surat</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <input type="text" class="form-control tglsurat" id="tglsurat" name="tglsurat" placeholder="Tanggal Surat" required="" autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="tugas">Tandatangan</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-lock"></i></div>
        <select class="form-control select2" name="ttd" required="" id="ttd">
            <option>Select</option>
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
        <select class="form-control select2" name="ttd_pejabat" required="" id="ttd_pejabat">
            <option>Select</option>
            @foreach ($DataPegawai as $peg)
               <option value="{{$peg->nip_baru}}">{{$peg->nama}}</option>
            @endforeach

        </select>
    </div>
</div>
