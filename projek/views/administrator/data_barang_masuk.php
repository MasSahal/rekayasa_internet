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
$data_barang_masuk = $db->data_barang_masuk();

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
        <?php include('form_barang_masuk.php'); ?>

        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: #5D8AA8; border-radius: 10px; color: white; padding: 10px;">Data Barang Masuk</h3>
            <div class="table-responsive">
                <table class="table table-stripped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Ref</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Distributor</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah Beli</th>
                            <th scope="col">Total</th>
                            <th scope="col">Penerima</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        if ($data_barang_masuk) :
                            foreach ($data_barang_masuk as $row) {;
                                #var_dump($row) 
                        ?>
                                <tr>
                                    <td><?= $no += 1; ?></td>
                                    <td><?= $row['no_ref']; ?></td>
                                    <td><?= $row['tgl_masuk']; ?></td>
                                    <td><?= $row['nm_barang']; ?></td>
                                    <td><?= $row['nm_distributor']; ?></td>
                                    <td class="text-right"><?= $db->rupiah($row['harga']); ?></td>
                                    <td><?= $row['jumlah']; ?></td>
                                    <td class="text-right"><?= $db->rupiah($row['total']); ?></td>
                                    <td><?= $row['penerima']; ?></td>
                                    <td>
                                        <a name="" id="" class="btn btn-sm btn-info" href="data_barang.php?edit=update&&id=<?= $row['kd_barang']; ?>" role="button">Edit</a>
                                        <a name="" id="" class="btn btn-sm btn-danger" href="../../process/proces_barang.php?aksi=delete&&id=<?= $row['kd_barang']; ?>" onclick="return confirm('Yakin ingin menghapus <?= $row['nm_barang']; ?> ?')" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                    </td>
                                </tr>
                        <?php
                            };
                        endif; ?>
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