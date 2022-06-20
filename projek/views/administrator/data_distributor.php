<?php
class dashboard
{

    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;

include('../../model/database.php');

$db = new database();
$data_distributor = $db->data_distributor();
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>CV. Maju Mundur</title>

</head>

<body>

    <div class="row" style="margin: 20px;">
        <?php include('form_distributor.php'); ?>

        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: seagreen; border-radius: 10px; color: white; padding: 10px;">Data Distributor</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Pemilik</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Tipe Produk</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_distributor as $r) { ?>
                        <tr>
                            <td><?= $r['kd_distributor']; ?></td>
                            <td><?= $r['nm_distributor']; ?></td>
                            <td><?= $r['pemilik']; ?></td>
                            <td><?= $r['nohp']; ?></td>
                            <td><?= $r['tipe_produk']; ?></td>
                            <td><?= $r['alamat']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-sm btn-info" href="data_distributor.php?edit=update&&id=<?= $r['kd_distributor']; ?>" role="button">Edit</a>
                                <a name="" id="" class="btn btn-sm btn-danger" href="../../process/proces_distributor.php?aksi=delete&&id=<?= $r['kd_distributor']; ?>" onclick="return confirm('Yakin ingin menghapus <?= $row['nm_distributor']; ?> ?')" role="button">Hapus</a>
                            </td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

<script src="../../js/jquery.js"></script>
<script src="../../js/popper.js"></script>
<script src="../../js/bootstrap.min.js"></script>

</html>