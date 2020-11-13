<form action="{{url('transaksi')}}" method="GET" class="form-horizontal">
    <div class="form-group row">
        <label class="control-label text-right col-md-1">Filter</label>
        <div class="col-md-3">
           <select name="flag_trx" class="form-control">
                <option value="">Pilih Flag Transaksi</option>
                @for ($i = 0; $i <= 7; $i++)
                    <option value="{{$i}}" @if (request('flag_trx') != '')
                    @if (request('flag_trx')==$i) selected @endif
                    @endif>{{$FlagTrx[$i]}}</option>
                @endfor
           </select>
        </div>
        <div class="col-md-3">
            <select name="unitkerja" id="unitkerja" class="form-control">
             <option value="0">Pilih Bidang/Bagian</option>
             @foreach ($DataBidang as $unit)
             <option value="{{$unit->kode}}" @if (request('unitkerja')==$unit->kode or $flag_unitkerja==$unit->kode) selected @endif>{{$unit->nama}}</option>
             @endforeach
            </select>
         </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success">Filter</button>
        </div>
    </div>
</form>