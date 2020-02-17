 <!--modal cari tujuan-->
 <div class="modal fade" id="CariTujuan" tabindex="-1" role="dialog" aria-labelledby="CariTujuan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Data Tujuan Perjalanan</h4> </div>
            <div class="modal-body">
                    <div class="table-responsive">
                            <table id="TabelTujuan" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kabkota</th>
                                        <th>Rate Darat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($DataTujuan as $tujuan)
                                        <tr class="pilihTujuan" data-tujuan="{{$tujuan->nama_kabkota}}" data-kodekabkota="{{$tujuan->kode_kabkota}}" data-rate="{{$tujuan->rate_darat}}">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$tujuan->nama_kabkota}}</td>
                                            <td>{{$tujuan->rate_darat}}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>
<!--end modal cari tujuan-->

 <!--modal cari tujuan-->
 <div class="modal fade" id="SumberDana" tabindex="-1" role="dialog" aria-labelledby="SumberDana">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Sumber Dana Perjalanan</h4> </div>
            <div class="modal-body">
                    <div class="table-responsive">
                            <table id="TabelSumberDana" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Uraian</th>
                                        <th>Pagu Awal</th>
                                        <th>Sisa Pagu</th>
                                        <th>Unitkerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($DataAnggaran as $dana)
                                        <tr class="pilihSumberDana" data-makid="{{$dana->a_id}}" data-komponen="[{{$dana->komponen_kode}}] {{$dana->komponen_nama}}" data-tid="{{$dana->t_id}}" data-mak="{{$dana->mak}}" data-uraian="{{$dana->uraian}}" data-pagu="{{$dana->pagu_awal}}" data-unitkerja="{{$dana->unit_pelaksana}}" data-namaunitkerja="{{$dana->unit_nama}}" data-sisapagu="{{$dana->pagu_awal-$dana->pagu_rencana}}">
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{$dana->uraian}} <br /> 
                                                <strong>{{$dana->mak}}</strong><br />
                                                [{{$dana->komponen_kode}}] {{$dana->komponen_nama}}
                                            </td>
                                            <td>{{$dana->pagu_awal}}</td>
                                            <td>{{$dana->pagu_awal-$dana->pagu_rencana}}</td>
                                            <td>{{$dana->unit_nama}}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>
<!--end modal cari tujuan-->