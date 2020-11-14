<form action="{{route('laporan.tujuan')}}" method="GET" class="form-horizontal">
    <div class="form-group row">
        <label class="control-label text-right col-md-1">Filter</label>
        <div class="col-md-3">
            <select name="unitkerja" id="unitkerja" class="form-control">
             <option value="0">Pilih Bidang/Bagian</option>
             @foreach ($DataBidang as $unit)
             <option value="{{$unit->kode}}" @if (request('unitkerja')==$unit->kode or $flag_unitkerja == $unit->kode) selected @endif>{{$unit->nama}}</option>
             @endforeach
            </select>
         </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success">Filter</button>
        </div>
    </div>
</form>