<!--modal cari sumberdana-->
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
                                        <tr class="pilihSumberDana" data-makid="{{$dana->a_id}}" data-komponen="[{{$dana->komponen_kode}}] {{$dana->komponen_nama}}" data-tid="{{$dana->t_id}}" data-mak="{{$dana->mak}}" data-uraian="{{$dana->uraian}}" data-pagu="{{$dana->pagu_awal}}" data-unitkerja="{{$dana->unit_pelaksana}}" data-namaunitkerja="{{$dana->unit_nama}}" data-sisapagu="{{$dana->pagu_awal-$dana->pagu_rencana}}" data-program="[{{$dana->prog_kode}}] {{$dana->prog_nama}}" data-kegiatan="[{{$dana->keg_kode}}] {{$dana->keg_nama}}" data-output="[{{$dana->output_kode}}] {{$dana->output_nama}}" @if ($dana->kro_kode)
                                            data-kro="[{{$dana->kro_kode}}] {{$dana->kro_nama}}"
                                        @else
                                            data-kro="-"
                                        @endif @if ($dana->subkomponen_kode)
                                            data-subkomponen="[{{$dana->subkomponen_kode}}] {{$dana->subkomponen_nama}}"
                                        @else
                                            data-subkomponen="-"
                                        @endif>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{$dana->uraian}} <br />
                                                <strong>{{$dana->mak}}</strong><br />
                                                [{{$dana->prog_kode}}] {{$dana->prog_nama}} <br />
                                                [{{$dana->keg_kode}}] {{$dana->keg_nama}} <br />
                                                @if ($dana->kro_kode)
                                                [{{$dana->kro_kode}}] {{$dana->kro_nama}} <br />
                                                @endif
                                                [{{$dana->output_kode}}] {{$dana->output_nama}} <br />
                                                [{{$dana->komponen_kode}}] {{$dana->komponen_nama}} <br />
                                                @if ($dana->subkomponen_kode)
                                                [{{$dana->subkomponen_kode}}] {{$dana->subkomponen_nama}}
                                                @endif

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
<!--end modal sumberdana-->
