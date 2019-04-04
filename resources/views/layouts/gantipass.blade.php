<!--modal ganti password-->
<div class="modal fade" id="GantiPasswordSendiri" tabindex="-1" role="dialog" aria-labelledby="GantiPasswordSendiri">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel1">Ganti Password</h4> </div>
            <div class="modal-body">
                    <form name="gantipasswdsendiri" data-toggle="validator" method="POST" action="{{ route('user.update','password') }}">
                    @csrf
                    @method('put')
                     <input type="hidden" name="aksi" value="gantipasswordsendiri" />
                     <div class="form-group">
                        <label for="nama">Password Lama</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="password" class="form-control" id="passwd_lama" name="passwd_lama" placeholder="Password Lama" required="">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Password Baru</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="password" class="form-control" id="passwd_baru" name="passwd_baru" placeholder="Password Baru" required="" data-toggle="validator" data-minlength="4">

                        </div>
                        <span class="help-block">Minimal 4 karakter</span>
                    </div>
                    <div class="form-group">
                        <label for="nama">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="password" class="form-control" id="konfirmasi_passwd" data-toggle="validator" data-match-error="error, konfirmasi password baru tidak sama" name="konfirmasi_passwd" placeholder="Konfirmasi Password Baru" required="" data-match="#passwd_baru"> </div>
                            <span class="help-block with-errors"></span>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Ganti Password</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end modal ganti password-->
