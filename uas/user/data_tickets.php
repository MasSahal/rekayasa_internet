<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-transaksi Online</title>
    <?php include('./layout/head.php'); ?>
    <style>
        .img-carousel {
            height: 450px !important;
            width: 100% !important;
        }

        .ratio16by9 {
            aspect-ratio: 16 / 9;
        }

        .event {
            min-height: 300px;
            border: 1px solid #e0e0e0;
            border-radius: 0;
        }

        body {
            background-color: white !important;
        }
    </style>
</head>

<body>
    <?php
    class dashboard
    {
        function __construct()
        {
            include_once('./layout/navbar.php');
            include_once('../model/user_model.php');
            include_once('../model/transaksi_model.php');
        }
    }
    new dashboard;
    $db = new transaksi;
    if (isset($_GET['cari'])) {
        $transaksi = $db->cari_transaksi($_GET['cari']);
        $judul = "Menampilkan Pencarian dari " . $_GET['cari'];
    } else {
        $transaksi = $db->get_my_transaksi($_SESSION['id_user']);
        $judul = "Menampilkan Semua transaksi Saya";
    }
    // var_dump($_SESSION) 
    ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 p-0">
                <div class="card bg-light">
                    <div class="card-body">
                        <h4 class="card-title my-4 text-center"><?= $judul; ?></h4>
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <div class="table-responsive" id="view">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('./layout/js.php'); ?>
    <script>
        function uri(link) {
            return window.location = link;
        }
    </script>
</body>

</html>