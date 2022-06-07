<?php
class dashboard
{

    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;

include('../model/database.php');

$db = new database();
$data_barang = $db->data_barang();

// $data_distributor = $db->data_distributor();
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>CV. Maju Mundur</title>

</head>

<body>

    <div class="row" style="margin: 20px;">
        <?php include('form_barang.php'); ?>

        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: #5D8AA8; border-radius: 10px; color: white; padding: 10px;">Data Barang</h3>
            <div class="table-responsive">
                <table class="table table-stripped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Distributor</th>
                            <!-- <th scope="col">Ket</th> -->
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_barang as $row) {;
                        ?>
                            <tr>
                                <td><?= $no += 1; ?></td>
                                <td>
                                    <a href="#">

                                        <img src="../dokumen/<?= $row['foto']; ?>" alt="<?= $row['foto']; ?>" class="img-fluid" width="100px">
                                    </a>
                                </td>
                                <td><?= $row['kd_barang']; ?></td>
                                <td><?= $row['nm_barang']; ?></td>
                                <td class="text-right"><?= $db->rupiah($row['harga']); ?></td>
                                <td class=" <?= $row['stok'] < 10 ? 'text-danger font-weight-bold' : ''; ?>"><?= $row['stok']; ?></td>
                                <td><?= $row['nm_distributor']; ?></td>
                                <!-- <td><?= $row['ket']; ?></td> -->
                                <td>
                                    <a name="" id="" class="btn btn-sm btn-info" href="data_barang.php?edit=update&&id=<?= $row['kd_barang']; ?>" role="button">Edit</a>
                                    <a name="" id="" class="btn btn-sm btn-danger" href="../process/proces_barang.php?aksi=delete&&id=<?= $row['kd_barang']; ?>" onclick="return confirm('Yakin ingin menghapus <?= $row['nm_barang']; ?> ?')" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

<script src="../js/jquery.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
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