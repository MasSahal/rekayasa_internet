<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-ticket Online</title>
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
        }
    }
    include_once('../model/transaksi_model.php');
    $db = new transaksi;

    if (isset($_GET['cari'])) {
        $awal = $_GET['tgl_awal'];
        $akhir = $_GET['tgl_akhir'];

        $transaksi = $db->periode_transaksi($awal, $akhir);
        $judul = "Laporan transaksi peride dari " . $awal . " s/d " . $akhir;
    } else {
        $transaksi = $db->get_transaksi();
        $judul = "Laporan seluruh transaksi";
    }

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h3 class="mt-4">Aplikasi E-ticket Office</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. obcaecati eum reprehenderit officia quo similique. Reprehenderit velit iure aperiam quasi aspernatur cum!</p>
                    <hr>
                    <div class="font-weight-bold"><?= $judul; ?></div>
                </center>
                <br>
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
                                <th>Sub-Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($transaksi as $i => $r) {
                                $total = $total + ($r['qty'] * $r['harga_ticket']);
                            ?>
                                <tr>
                                    <th><?= $i += 1; ?></th>
                                    <td><span class="font-weight-bold"><?= $r['fullname']; ?></span></td>
                                    <td><?= $r['nama_event']; ?></td>
                                    <td><span class="text-uppercase"><?= $r['jenis_ticket']; ?></span></td>
                                    <td><?= $r['qty']; ?></td>
                                    <td><?= $r['status_transaksi']; ?></td>
                                    <td><?= $r['created_transaksi']; ?></td>
                                    <td>Rp<?= number_format($r['qty'] * $r['harga_ticket']); ?></td>
                                </tr>
                            <?php }; ?>
                            <tr>
                                <td colspan="7" class="text-right">
                                    <span class="font-weight-bold">Total</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">Rp<?= number_format($total); ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>

</body>

</html>