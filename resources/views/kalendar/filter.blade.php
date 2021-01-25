<form action="{{route('transaksi.kalendar')}}" method="GET" class="form-horizontal">
    <div class="form-group row">
        <label class="control-label text-right col-md-1">Filter</label>
        <div class="col-md-2">
            <select name="flag_kalendar" id="flag_kalendar" class="form-control">
             <option value="">Pilih Flag</option>
             <option value="1" @if (request('flag_kalendar')==1) selected @endif>Diajukan</option>
             <option value="2" @if (request('flag_kalendar')==2) selected @endif>Disetujui</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="unitkerja" id="unitkerja" class="form-control">
             <option value="">Pilih Bidang/Bagian</option>
             @foreach ($DataBidang as $unit)
             <option value="{{$unit->kode}}" @if (request('unitkerja')==$unit->kode) selected @endif>{{$unit->nama}}</option>
             @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success">Filter</button>
        </div>
    </div>
</form>