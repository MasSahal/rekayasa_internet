<div class="table-responsive">
    <?php
    include('../../model/event_model.php');
    $db = new event()
    ?>
    <a name="" id="" class="btn btn-primary btn-sm tambah" href="#" role="button"><i class="ti-plus"></i> Tambah Data</a>
    <a name="" id="" class="btn btn-danger btn-sm" href="#" role="button"><i class="ti-trash"></i> Hapus Data</a>
    <hr>
    <div class="table-responsive">
        <table class="table mb-0 dataTable">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="centangSemua" class="text-center">
                    </th>
                    <th>#</th>
                    <th>Nama Event</th>
                    <th>Tanggal Event</th>
                    <th>Jam Event</th>
                    <th>Lokasi Event</th>
                    <th>Detail Event</th>
                    <th style="min-width:100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $events = $db->get_event();
                foreach ($events as $i => $r) { ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="id[]" class="centangid" value="<?= $r['id_event']; ?>">
                        </td>
                        <th><?= $i += 1; ?></th>
                        <td><a href="?detail=<?= $r['id_event']; ?>" class="font-weight-bold text-amazon text-underline"><?= $r['nama_event']; ?></a></td>
                        <td><?= $r['tanggal_event']; ?></td>
                        <td><?= $r['jam_event']; ?></td>
                        <td><?= $r['lokasi_event']; ?></td>
                        <td><?= $r['detail_event']; ?></td>
                        <td>
                            <button class="btn btn-secondary text-black p-1" onclick="uri('data_events.php?detail=<?= $r['id_event']; ?>')" role="button"><i class="ti-eye"></i></button>
                            <button class="btn btn-info text-black p-1" onclick="edit(<?= $r['id_event']; ?>)" role="button"><i class="ti-pencil"></i></button>
                            <button class="btn btn-danger text-black p-1" onclick="hapus(<?= $r['id_event']; ?>,'<?= $r['nama_event']; ?>')" role="button"><i class="ti-trash"></i></button>
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
                    url: './form/add_event.php',
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
                title: `Hapus data event ${det}?`,
                text: "Tindakan tidak dapat diurungkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '../proses/event_proses.php?mod=delete',
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
    </script>
</div>