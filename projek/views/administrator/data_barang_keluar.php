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
$data_barang_keluar = $db->data_barang_keluar();

// $data_distributor = $db->data_distributor();
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
        <?php include('form_barang_keluar.php'); ?>

        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: #5D8AA8; border-radius: 10px; color: white; padding: 10px;">Data Barang Keluar</h3>
            <div class="table-responsive">
                <table class="table table-stripped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Ref</th>
                            <th scope="col">Tanggal Keluar</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga Barang</th>
                            <th scope="col">Jumlah Keluar</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Total Biaya</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_barang_keluar as $row) {;
                            #var_dump($row) 
                        ?>
                            <tr>
                                <td><?= $no += 1; ?></td>
                                <td><?= $row['no_ref']; ?></td>
                                <td><?= $row['tanggal_keluar']; ?></td>
                                <td><?= $row['nm_barang']; ?></td>
                                <td><?= $db->rupiah($row['harga']); ?></td>
                                <td><?= $row['jumlah_keluar']; ?></td>
                                <td><?= $row['diskon']; ?>%</td>
                                <td class="text-right"><?= $db->rupiah($row['total_biaya']); ?></td>
                                <td><?= $row['petugas']; ?></td>
                                <td>
                                    <a name="" id="" class="btn btn-sm btn-info" href="data_barang_keluar.php?edit=update&&id=<?= $row['no_ref']; ?>" role="button">Edit</a>
                                    <a name="" id="" class="btn btn-sm btn-danger" href="../../process/proces_barang_keluar.php?aksi=delete&&id=<?= $row['no_ref']; ?>" onclick="return confirm('Yakin ingin menghapus <?= $row['nm_barang']; ?> ?')" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

<script src="../../js/jquery.js"></script>
<script src="../../js/popper.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script>
    function img(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.foto').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</html>