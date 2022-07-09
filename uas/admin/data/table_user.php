<div class="table-responsive">
    <?php
    include('../../model/user_model.php');
    $db = new user()
    ?>
    <a name="" id="" class="btn btn-primary btn-sm tambah" href="#" role="button"><i class="ti-plus"></i> Tambah Data</a>
    <a name="" id="" class="btn btn-danger btn-sm" href="#" role="button"><i class="ti-trash"></i> Hapus Data</a>
    <hr>
    <div class="table-responsive">
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
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th style="min-width:100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $users = $db->get_user();
                foreach ($users as $i => $r) { ?>
                    <tr>
                        <td>
                            <div class="checkbox-fade fade-in-primary d-">
                                <label>
                                    <input type="checkbox" name="id[]" class="centangid" value="<?= $r['id_user']; ?>">
                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                </label>
                            </div>
                        </td>
                        <th><?= $i += 1; ?></th>
                        <td><a href="?detail=<?= $r['id_user']; ?>" class="font-weight-bold text-amazon text-underline"><?= $r['fullname']; ?></a></td>
                        <td><?= $r['username']; ?></td>
                        <td><?= $r['no_hp']; ?></td>
                        <td><?= $r['alamat']; ?></td>
                        <td>
                            <button class="btn btn-secondary text-black p-1" onclick="uri('data_users.php?detail=<?= $r['id_user']; ?>')" role="button"><i class="ti-eye"></i></button>
                            <button class="btn btn-info text-black p-1" onclick="edit(<?= $r['id_user']; ?>)" role="button"><i class="ti-pencil"></i></button>
                            <button class="btn btn-danger text-black p-1" onclick="hapus(<?= $r['id_user']; ?>,'<?= $r['fullname']; ?>')" role="button"><i class="ti-trash"></i></button>
                        </td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="viewmodal"></div> -->
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
                    url: './form/add_user.php',
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
                        url: '../proses/user_proses.php?mod=delete',
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
            $.ajax({
                url: './form/upd_user.php?id=' + id,
                type: 'GET',
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