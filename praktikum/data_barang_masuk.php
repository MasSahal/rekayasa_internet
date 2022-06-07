<?php
class dashboard
{

    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;

include "database.php";
$db = new Database();
$data_barang_masuk = $db->data_barang_masuk();

$data_distributor = $db->data_distributor();

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- name CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CV. Maju Mundur</title>
</head>

<body>

    <div class="row" style="margin: 20px;">
        <?php
        include("form_barang_masuk.php");
        ?>
        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
                Data Barang Masuk</h3>
            <div class="table-responsive mt-2">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>No Ref</th>
                            <th width="150px">Tanggal Masuk</th>
                            <th>Nama Barang</th>
                            <th>Nama Distributor</th>
                            <th>Penerima</th>
                            <th width="200px">Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_barang_masuk as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row['no_ref'] ?></td>
                                <td><?php echo date('D, M Y', strtotime($row['tgl_masuk'])) ?></td>
                                <td><?php echo $row['nm_barang'] ?></td>
                                <td><?php echo $row['nm_distributor'] ?></td>
                                <td><?php echo $row['penerima'] ?></td>
                                <td>
                                    <span>Harga : Rp<?php echo number_format($row['harga']) ?></span><br>
                                    <span>Jumlah : <?php echo $row['jumlah'] ?> item</li></span><br>
                                    <span>Total : Rp<?php echo number_format($row['total']) ?></sapn>
                                        <p>Ket : <?php echo $row['ket'] ?></p>
                                </td>
                                <td align="center" width="150px">
                                    <a class="btn btn-sm btn-warning" href="data_barang_masuk.php?&edit=update&&id=<?= $row['no_ref'] ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger " href="proses_barang_masuk.php?aksi=delete&&id=<?= $row['no_ref'] ?>" onclick="return confirm('Apakah yakin data dihapus')">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>