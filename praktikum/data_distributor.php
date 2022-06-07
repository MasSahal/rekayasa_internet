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
$data_distributor = $db->data_distributor();
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CV. Maju Mundur</title>
</head>

<body>

    <div class="row" style="margin: 20px;">
        <?php
        include("form_distributor.php");
        ?>
        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
                Data Distributor</h3>
            <div class="table-responsive mt-2">
                <table class="table table-striped  ">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Distributor</th>
                            <th>Nama Distributor</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Pemilik</th>
                            <th>Tipe Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_distributor as $row) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['kd_distributor'] ?></td>
                                <td><?php echo $row['nm_distributor'] ?></td>
                                <td><?php echo $row['alamat'] ?></td>
                                <td><?php echo $row['nohp'] ?></td>
                                <td><?php echo $row['pemilik'] ?></td>
                                <td><?php echo $row['tipe_produk'] ?></td>
                                <td align="center" width="150px">
                                    <a class="btn btn-sm btn-warning" href="data_distributor.php?&edit=update&&id=<?= $row['kd_distributor'] ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="proses_distributor.php?aksi=delete&&id=<?= $row['kd_distributor'] ?>" onclick="javascript: return confirm('Apakah yakin data dihapus')">Delete</a>
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