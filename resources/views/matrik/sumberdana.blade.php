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
                                            <th>MAK</th>
                                            <th>Uraian</th>
                                            <th>Pagu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataAnggaran as $dana)
                                            <tr class="pilihSumberDana" data-mak="{{$dana->mak}}" data-uraian="{{$dana->uraian}}" data-pagu="{{$dana->pagu}}" data-unitkerja="{{$dana->unitkerja}}" data-namaunitkerja="{{$dana->unit_nama}}">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$dana->mak}}</td>
                                                <td>{{$dana->uraian}}</td>
                                                <td>{{$dana->pagu}}</td>
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
