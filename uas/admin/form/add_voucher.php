<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Voucher</h5>
                <button type="button" class="close btn-transparent" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../proses/voucher_proses.php?mod=insert" method="post" class="formtambah" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="modal-body">
                    <p class="error"></p>
                    <div class="form-group row">
                        <label for="nama_voucher" class="col-sm-4 col-form-label">Nama Voucher</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_voucher" id="nama_voucher" placeholder="Masukan nama voucher" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode_voucher" class="col-sm-4 col-form-label">Kode Voucher</label>
                        <div class="col-sm-8">
                            <input type="text" pattern="[A-Z0-9]{5,}" title="Huruf besar dan lebih dari 5 huruf/angka" class="form-control" name="kode_voucher" id="kode_voucher" placeholder="Masukan kode voucher" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_voucher" class="col-sm-4 col-form-label">Jumlah Voucher</label>
                        <div class="col-sm-8">
                            <input type="number" min="1" class="form-control" name="jumlah_voucher" id="jumlah_voucher" placeholder="Masukan jumlah voucher" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="besaran_voucher" class="col-sm-4 col-form-label">Nominal Rupiah/Persentase Voucher</label>
                        <div class="col-sm-8">
                            <input type="number" min="1" class="form-control" name="besaran_voucher" id="besaran_voucher" placeholder="Masukan nominal/persentase voucher" required>
                        </div>
                    </div>
                    <div class="form-check form-check-inline row">
                        <label for="jenis_voucher" class="col-sm-auto col-form-label">Pilih Jenis Voucher</label>
                        <div class="col-auto">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="jenis_voucher" value="0" checked> Nominal (Rp)
                                &nbsp;&nbsp;&nbsp;
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="jenis_voucher" value="1"> Persen (%)
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expired_voucher" class="col-sm-4 col-form-label">Masa Berakhir voucher</label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control" name="expired_voucher" id="expired_voucher" required>
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
                url: '../proses/voucher_proses.php?mod=insert',
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
                            title: "Selamat!",
                            text: response.message,
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