    <?php
    include_once('../model/transaksi_model.php');
    $db = new transaksi;

    if (isset($_GET['cari'])) {
        $awal = $_GET['tgl_awal'];
        $akhir = $_GET['tgl_akhir'];

        $transaksi = $db->periode_transaksi($awal, $akhir);
        $link = "cetak_transaksi.php?cari=true&tgl_awal=$awal&tgl_akhir=$akhir";
    } else {
        $transaksi = $db->get_transaksi();
        $link = "cetak_transaksi.php";
    }
    ?>
    <form action="" method="get">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="date" name="tgl_awal" id="tgl_awal" class="form-control form-control-sm" value="" required>
                </div>
            </div>
            <div class="col-md-1">
                <span>s/d</span>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control form-control-sm" value="" required>
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" name="cari" id="" class="btn btn-info btn-sm">
                    <i class="fa fa-search" aria-hidden="true"></i> Cari Data
                </button>
                <a href="<?= $link ?>" target="_blank" class="btn btn-success btn-sm">
                    <i class="fa fa-print" aria-hidden="true"></i> Cetak Data
                </a>
            </div>
        </div>
    </form>
    <hr>
    <div class="table-responsive">
        <table class="table mb-0 dataTable" id="table">
            <thead>
                <tr class="thead-light">
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Event</th>
                    <th>Ticket</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal Transaksi</th>
                    <th>Harga Ticket</th>
                    <th>Sub-Total</th>
                    <th style="min-width:100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($transaksi as $i => $r) { ?>
                    <tr>
                        <th><?= $i += 1; ?></th>
                        <td><span class="font-weight-bold"><?= $r['fullname']; ?></span></td>
                        <td><?= $r['nama_event']; ?></td>
                        <td><span class="text-uppercase"><?= $r['jenis_ticket']; ?></span></td>
                        <td><?= $r['qty']; ?></td>
                        <td><?= $r['status_transaksi']; ?></td>
                        <td><?= $r['created_transaksi']; ?></td>
                        <td><?= $r['harga_ticket']; ?></td>
                        <td>Rp<?= number_format($r['qty'] * $r['harga_ticket']); ?></td>
                        <td>
                            <button type="button" class="btn btn-info text-black p-1" onclick="edit(<?= $r['no_ref']; ?>)" role="button"><i class="ti-check"></i></button>
                            <button type="button" class="btn btn-danger text-black p-1" onclick="hapus(<?= $r['no_ref']; ?>,'<?= $r['fullname']; ?>')" role="button"><i class="ti-trash"></i></button>
                        </td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable();
            $('#centangSemua').click(function(e) {
                if ($(this).is(':checked')) {
                    $('.centangid').prop('checked', true);
                } else {
                    $('.centangid').prop('checked', false);
                }
            });
            $('.tambah').click(function() {
                $.ajax({
                    url: './form/add_transaksi.php',
                    type: 'GET',
                    beforeSend: function() {
                        $('.viewmodal').html('<div class="preload"><div class="loader"></div></div>');
                    },
                    success: function(data) {
                        $('.viewmodal').html(data);
                        $('#modaltambah').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('#modaltambah').modal('show');
                    },
                    error: function(xhr, ajaxOptions, thrownerror) {
                        Swal.fire({
                            title: "Maaf gagal load data!",
                            html: `Silahkan Cek kembali Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
                            icon: "error",
                            showConfirmButton: false,
                            timer: 3100
                        })
                    }
                });
            });
        });

        function hapus(id, det) {
            Swal.fire({
                title: `Hapus data ${det}?`,
                text: "Tindakan tidak dapat diurungkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '../proses/transaksi_proses.php?mod=delete',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Data Berhasil dihapus!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                listdata();
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownerror) {
                            Swal.fire({
                                title: "Maaf gagal proses data!",
                                html: `Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
                                icon: "error",
                                showConfirmButton: false,
                                timer: 3100
                            }).then(function() {
                                window.location.reload();
                            })
                        }
                    });
                }
            })
        }

        function lunas(id, det) {
            Swal.fire({
                title: `Tandai data ${det} sebagai lunas?`,
                text: "Tindakan tidak dapat diurungkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '../proses/transaksi_proses.php?mod=lunas',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Selamat!',
                                text: 'Data Berhasil ditadai sebagai lunas!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                listdata();
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownerror) {
                            Swal.fire({
                                title: "Maaf gagal proses data!",
                                html: `Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
                                icon: "error",
                                showConfirmButton: false,
                                timer: 3100
                            }).then(function() {
                                window.location.reload();
                            })
                        }
                    });
                }
            })
        }
    </script>