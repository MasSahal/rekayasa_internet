<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data User</h5>
                <button type="button" class="close btn-transparent" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../proses/user.php?mod=insert" method="post" class="formtambah" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="modal-body">
                    <p class="error"></p>
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Masukan nama lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="password" id="password" placeholder="Masukan password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-4 col-form-label">No Hp</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan nomor hp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-sm-4 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select name="role" id="role" class="form-control">
                                <option selected disabled>Pilih Role</option>
                                <option value="1">Akun Admin</option>
                                <option value="2">Akun User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profile" class="col-sm-4 col-form-label">Foto Profile</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="profile" id="profile">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm btnsimpan">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btnsimpan').click(function(e) {
            e.preventDefault();
            let form = $('.formtambah')[0];
            let data = new FormData(form);
            $.ajax({
                type: "post",
                url: '../proses/user_proses.php?mod=insert',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disable');
                    $('.btnsimpan').html('<span class="spinner-border spinner-grow-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable', 'disable');
                    $('.btnsimpan').html('<i class="mdi mdi-content-save-all"></i> Simpan');
                },
                success: function(response) {
                    if (response.status == "error") {
                        $('.error').html('<span class="text-danger">&bull; ' + response.message + '</span>');
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#modaltambah').modal('hide');
                        listdata();
                    }
                },
                error: function(xhr, ajaxOptions, thrownerror) {
                    Swal.fire({
                        title: "Maaf gagal proses data!",
                        html: `Silahkan Cek kembali Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
                        icon: "error",
                        showConfirmButton: false,
                        timer: 3100
                    }).then(function() {
                        window.location.reload();
                    });
                }
            });
        })
    });
</script>