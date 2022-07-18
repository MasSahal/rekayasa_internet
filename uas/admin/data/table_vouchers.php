<form action="../proses/voucher_proses.php?mod=delete" method="post" class="formhapus">
    <?php
    include_once('../../model/voucher_model.php');
    $id = $_GET['id_voucher'] ?? 0;
    $db = new voucher;
    $voucher = $db->get_voucher();
    ?>
    <button type="button" class="btn btn-primary btn-sm tambah" href="#table" role="button"><i class="ti-plus"></i> Tambah Data</button>
    <button type="submit" class="btn btn-danger btn-sm tblhapus" href="#table" role="button"><i class="ti-trash"></i> Hapus Data</button>
    <hr>
    <div class="table-responsive" id="view">
        <table class="table mb-0 dataTable">
            <thead>
                <tr>
                    <th>
                        <div class="checkbox-fade fade-in-primary">
                            <label>
                                <input type="checkbox" id="centangSemua">
                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                            </label>
                        </div>
                    </th>
                    <th>#</th>
                    <th style="min-width:100px">Nama Voucher</th>
                    <th>Kode Voucher</th>
                    <th>Tanggal Expired</th>
                    <th>Jumlah Voucher</th>
                    <th>Besaran Voucher</th>
                    <th>Tanggal Dibuat</th>
                    <th style="min-width:100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //set default timezone
                date_default_timezone_set("asia/jakarta");
                foreach ($voucher as $i => $r) {
                    if (strtotime($r['expired_voucher']) >= time()) {
                        $expired = '<span class="badge badge-success" style="border-radius:4px">' . $db->tanggal($r['expired_voucher']) . " - Pukul : " . $db->clock($r['expired_voucher']) . '</span>';
                        $bg = "rgba(200, 255, 200, 0.3)";
                    } else {
                        $expired = '<span class="badge badge-danger" style="border-radius:4px">' . $db->tanggal($r['expired_voucher']) . " - Pukul : " . $db->clock($r['expired_voucher']) . '</span>';
                        $bg = "rgba(255, 200, 200, 0.3)";
                    }
                ?>
                    <tr style="background:<?= $bg; ?>">
                        <td>
                            <div class=" checkbox-fade fade-in-primary d-">
                                <label>
                                    <input type="checkbox" name="id[]" class="centangid" value="<?= $r['id_voucher']; ?>">
                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                </label>
                            </div>
                        </td>
                        <td><?= $i += 1; ?></td>
                        <td><?= $r['nama_voucher']; ?></td>
                        <td><?= $r['kode_voucher']; ?></td>
                        <td><?= $expired; ?></td>
                        <td><?= number_format($r['jumlah_voucher']); ?> voucher</td>
                        <td><?= $r['jenis_voucher'] == 0 ? "Rp" . number_format($r['besaran_voucher']) : $r['besaran_voucher'] . "%"; ?></td>
                        <td><?= $db->tanggal($r['created_voucher']); ?></td>
                        <td>
                            <!-- <button class="btn btn-secondary text-black p-1" onclick="uri('data_vouchers.php?detail=<?= $r['id_voucher']; ?>')" role="button"><i class="ti-eye"></i></button> -->
                            <?php if ($r['jumlah_voucher'] != 0) { ?>
                                <button type="button" class="btn btn-info text-black p-1" onclick="edit(<?= $r['id_voucher']; ?>)" role="button"><i class="ti-pencil"></i></button>
                                <button type="button" class="btn btn-danger text-black p-1" onclick="hapus(<?= $r['id_voucher']; ?>,'<?= $r['nama_voucher']; ?>')" role="button"><i class="ti-trash"></i></button>
                            <?php }; ?>
                        </td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>
</form>
<div class="row d-none">
    <?php foreach ($db->get_voucher() as $r) { ?>
        <div class="col-md-12">
            <div class="voucher">
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
                url: './form/add_voucher.php',
                type: 'GET',
                data: {
                    id_voucher: <?= $id; ?>
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
                    url: '../proses/voucher_proses.php?mod=delete',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        console.log(response.message);
                        Swal.fire({
                            title: 'Selamat!',
                            text: response.message,
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
            url: './form/upd_voucher.php',
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

    $('.formhapus').submit(function(e) {
        e.preventDefault();
        let jmldata = $('.centangid:checked');
        console.log(jmldata.length);
        if (jmldata.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Ooops!',
                text: 'Silahkan pilih data!',
                showConfirmButton: false,
                timer: 1500
            })
        } else {
            Swal.fire({
                title: `Apakah anda yakin ingin menghapus ${jmldata.length} data ini?`,
                text: 'Semua data yang terpilih akan terhapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        dataType: "json",
                        beforeSend: function() {
                            $('.tblhapus').attr('disable', 'disable');
                            $('.tblhapus').html('<span class="spinner-border spinner-grow-sm"></span> <i>Loading...</i>');
                        },
                        complete: function() {
                            $('.tblhapus').removeAttr('disable', 'disable');
                            $('.tblhapus').html('<i class="ti-trash"></i> Hapus Data');
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Selamat!',
                                text: 'Sebanyak ' + jmldata.length + ' data berhasil dihapus!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                listdata(<?= $id; ?>);
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownerror) {
                            Swal.fire({
                                title: "Maaf gagal hapus data!",
                                html: `Silahkan Cek kembali Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
                                icon: "error",
                                showConfirmButton: false,
                                timer: 3100
                            }).then(function() {
                                window.location = '';
                            })
                        }
                    });
                }
            })
        }
    });
</script>

</div>