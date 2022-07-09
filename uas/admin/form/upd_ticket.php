<?php
include('../../model/ticket_model.php');
$db = new ticket;
// $id = mysqli_real_escape_string($db->koneksi, $_GET['id']);
// $id = htmlspecialchars($_GET['id']);
$id = $_GET['id'];

$data = $db->get_ticket($id); ?>
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Ticket</h5>
                <button type="button" class="close btn-transparent" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../proses/ticket_proses.php?mod=update" method="post" class="formedit" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="modal-body">
                    <p class="error"></p>
                    <div class="form-group row">
                        <?php $jenis = ['regular', 'silver', 'gold', 'vip']; ?>
                        <label for="jenis_ticket" class="col-sm-4 col-form-label">Jenis Ticket</label>
                        <div class="col-sm-8">
                            <select name="jenis_ticket" id="jenis_ticket" class="form-control" required>
                                <option selected disabled>Pilih Jenis Ticket</option>
                                <?php foreach ($jenis as $j) { ?>
                                    <option value="<?= $j; ?>" <?= $data['jenis_ticket'] == $j ? "selected" : ""; ?>>Tiket <?= strtoupper($j); ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_ticket" class="col-sm-4 col-form-label">Jumlah Ticket</label>
                        <div class="col-sm-8">
                            <input type="number" min="1" class="form-control" name="jumlah_ticket" id="jumlah_ticket" placeholder="Masukan jumlah ticket" required value="<?= $data['jumlah_ticket']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_ticket" class="col-sm-4 col-form-label">Harga Ticket</label>
                        <div class="col-sm-8">
                            <input type="number" min="1" class="form-control" name="harga_ticket" id="harga_ticket" placeholder="Masukan harga ticket" required value="<?= $data['harga_ticket']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expired_ticket" class="col-sm-4 col-form-label">Masa Berakhir Ticket</label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control" name="expired_ticket" id="expired_ticket" required value="<?= $data['expired_ticket']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="detail_ticket" class="col-sm-4 col-form-label">Detail Ticket</label>
                        <div class="col-sm-8">
                            <textarea name="detail_ticket" id="detail_ticket" rows="3" class="form-control" required><?= $data['detail_ticket']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm btnsimpan">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btnsimpan').click(function(e) {
            e.preventDefault();
            let form = $('.formedit')[0];
            let data = new FormData(form);
            $.ajax({
                type: "post",
                url: '../proses/ticket_proses.php?mod=update',
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
                        $('#modaledit').modal('hide');
                        listdata(<?= $id; ?>);
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