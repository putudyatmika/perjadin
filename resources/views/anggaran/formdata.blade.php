@php
    $tahun_skrg=date('Y');
@endphp
<div class="form-group">
        <label for="tahun_anggaran">Tahun</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-lock"></i></div>
            <select class="form-control" name="tahun_anggaran" id="tahun_anggaran">
                <option value="">Pilih</option>
                @for ($i=$tahun_skrg-1;$i<=$tahun_skrg+1;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
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
        <label for="uraian">Uraian</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall"></i></div>
            <input type="text" class="form-control" id="uraian" name="uraian" placeholder="Uraian Anggaran" required=""> </div>
    </div>
    <div class="form-group">
        <label for="pagu">Pagu</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="ti-medall-alt"></i></div>
            <input type="text" class="form-control" id="pagu_utama" name="pagu_utama" placeholder="Pagu Anggaran" required=""> </div>
    </div>


    <div class="form-group">
        <label for="unitkerja">Unitkerja</label>
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
