<div class="table-responsive">
    <?php
    include_once('../../model/ticket_model.php');
    include_once('../../model/event_model.php');
    $id = $_GET['id_event'] ?? 0;
    $db = new ticket;
    $db2 = new event;
    if ($id == 0 or $id == "" or $id == NULL) {
        $ticket = $db->get_ticket_actived();
        $judul = "Menampilkan semua ticket event yang tersedia";
    } else {
        $ticket = $db->get_ticket_join_event($id);
        $tic = $db2->get_event($id);
        $judul = "Menampilkan ticket dari event $tic[nama_event]";

    ?>
        <a name="" id="" class="btn btn-primary btn-sm tambah" href="#view" role="button"><i class="ti-plus"></i> Tambah Data</a>
        <a name="" id="" class="btn btn-danger btn-sm" href="#view" role="button"><i class="ti-trash"></i> Hapus Data</a>
        <hr>
    <?php }; ?>
    <h4 class="text-center"><?= $judul; ?></h4>
    <hr>
    <div class="table-responsive" id="view">
        <table class="table mb-0 dataTable">
            <thead>
                <tr>
                    <th>
                        <div class="checkbox-fade fade-in-primary">
                            <label>
                                <input type="checkbox" id="centangSemua" class="centangid">
                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                            </label>
                        </div>
                    </th>
                    <th>#</th>
                    <th style="min-width:150px">Nama Event</th>
                    <th>Tanggal Expired</th>
                    <th>Jenis Ticket</th>
                    <th>Detail Ticket</th>
                    <th>Jumlah Ticket</th>
                    <th>Harga Ticket</th>
                    <th>Tanggal Dibuat</th>
                    <th style="min-width:100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //set default timezone
                date_default_timezone_set("asia/jakarta");
                // echo date("Y-m-d H:i:s", time());
                // echo "<br>";
                // echo time();
                // echo "<br>";
                foreach ($ticket as $i => $r) {
                    if (strtotime($r['expired_ticket']) >= time()) {
                        $expired = '<span class="badge badge-success" style="border-radius:4px">' . $db->tanggal($r['expired_ticket']) . " - Pukul : " . $db->clock($r['expired_ticket']) . '</span>';
                        $bg = "rgba(200, 255, 200, 0.3)";
                    } else {
                        $expired = '<span class="badge badge-danger" style="border-radius:4px">' . $db->tanggal($r['expired_ticket']) . " - Pukul : " . $db->clock($r['expired_ticket']) . '</span>';
                        $bg = "rgba(255, 200, 200, 0.3)";
                    }
                ?>
                    <tr style="background:<?= $bg; ?>">
                        <td>
                            <div class=" checkbox-fade fade-in-primary d-">
                                <label>
                                    <input type="checkbox" name="id[]" class="centangid" value="<?= $r['id_ticket']; ?>">
                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                </label>
                            </div>
                        </td>
                        <th><?= $i += 1; ?></th>
                        <td>Ticket <?= strtoupper($r['jenis_ticket']) . " " . $r['nama_event']; ?></td>
                        <td><?= $expired; ?></td>
                        <td><b class="text-uppercase"><?= $r['jenis_ticket']; ?></b></td>
                        <td><?= $r['detail_ticket']; ?></td>
                        <td><?= number_format($r['jumlah_ticket']); ?> Ticket</td>
                        <td>Rp<?= number_format($r['harga_ticket'], 2, ",", "."); ?></td>
                        <td><?= $db->tanggal($r['created_ticket']); ?></td>
                        <td>
                            <button class="btn btn-secondary text-black p-1" onclick="uri('data_tickets.php?detail=<?= $r['id_ticket']; ?>')" role="button"><i class="ti-eye"></i></button>
                            <?php if ($r['jumlah_ticket'] != 0) { ?>
                                <button class="btn btn-info text-black p-1" onclick="edit(<?= $r['id_ticket']; ?>)" role="button"><i class="ti-pencil"></i></button>
                                <button class="btn btn-danger text-black p-1" onclick="hapus(<?= $r['id_ticket']; ?>,'<?= $r['nama_event']; ?>')" role="button"><i class="ti-trash"></i></button>
                            <?php }; ?>
                        </td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>

    <div class="row d-none">
        <?php foreach ($db->get_ticket() as $r) { ?>
            <div class="col-md-12">
                <div class="ticket">
                    <div class="stub">
                        <div class="top">
                            <span class="admit">Admit</span>
                            <span class="line"></span>
                            <span class="num">
                                Invitation
                                <span>31415926</span>
                            </span>
                        </div>
                        <div class="number">1</div>
                        <div class="invite">
                            Invite for you
                        </div>
                    </div>
                    <div class="check">
                        <div class="big">
                            You're <br> Invited
                        </div>
                        <div class="number">#1</div>
                        <div class="info">
                            <section>
                                <div class="title">Date</div>
                                <div>4/27/2016</div>
                            </section>
                            <section>
                                <div class="title">Issued By</div>
                                <div>Ampersand</div>
                            </section>
                            <section>
                                <div class="title">Invite Number</div>
                                <div>31415926</div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>
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
                    url: './form/add_ticket.php',
                    type: 'GET',
                    data: {
                        id_event: <?= $id; ?>
                    },
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
                        url: '../proses/ticket_proses.php?mod=delete',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Loading',
                                html: 'Memproses data',
                                timer: 2000,
                            })
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

        function edit(id) {
            // alert(id);
            $.ajax({
                url: './form/upd_ticket.php',
                type: 'GET',
                data: {
                    id: id
                },
                beforeSend: function() {
                    $('.viewmodal').html('<div class="preload"><div class="loader"></div></div>');
                },
                success: function(data) {
                    $('.viewmodal').html(data);
                    $('#modaledit').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#modaledit').modal('show');
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
        }
    </script>

</div>