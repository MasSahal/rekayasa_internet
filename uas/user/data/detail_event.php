<div class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="card">
                <div class="card-body">
                    <h4>Detail dari Event <?= $view['nama_event']; ?></h4>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="embed-responsive embed-responsive-16by9">
                                <img src="../assets/images/banner_event/<?= $view['banner_event']; ?>" class="img-fluid embed-responsive-item">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-3 mt-3 border">
                                <strong class="mb-3 text-muted">Google Map :</strong>
                                <style type="text/css" media="screen">
                                    iframe {
                                        height: 250px;
                                        width: 100%;
                                    }
                                </style>
                                <?= $view['gmap_event']; ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Event</th>
                                    <td>:</td>
                                    <td><?= $view['nama_event']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Diselenggarakan</th>
                                    <td>:</td>
                                    <td><?= $view['tanggal_event'] ?></td>
                                </tr>
                                <tr>
                                    <th>Waktu</th>
                                    <td>:</td>
                                    <td><?= $view['jam_event']; ?></td>
                                </tr>
                                <tr>
                                    <th>Lokasi Event</th>
                                    <td>:</td>
                                    <td><?= $view['lokasi_event']; ?></td>
                                </tr>
                                <tr>
                                    <th>Created Event</th>
                                    <td>:</td>
                                    <td><?= $view['created_event']; ?></td>
                                </tr>
                                <tr>
                                    <th>Detail</th>
                                    <td>:</td>
                                    <td>
                                        <p><?= $view['detail_event']; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah">
                                            Beli Ticket
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Form Pembelian Ticket</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="../proses/transaksi_proses.php?mod=insert" class="formtambah" method="post">
                                                        <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="id_ticket">Pilih ticket</label>
                                                                <select class="form-control" name="id_ticket" id="id_ticket">
                                                                    <?php foreach ($tic->get_ticket_actived($view['id_event']) as $r) { ?>
                                                                        <option value="<?= $r['id_ticket']; ?>">TICKET <?= strtoupper($r['jenis_ticket']); ?> - Sisa Ticket : <?= $r['jumlah_ticket']; ?></option>
                                                                    <?php }; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="qty">Jumlah Ticket</label>
                                                                <input type="number" name="qty" id="qty" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btnsimpan">Checkout</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                url: '../proses/transaksi_proses.php?mod=insert',
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
                        lwindow.reload();
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