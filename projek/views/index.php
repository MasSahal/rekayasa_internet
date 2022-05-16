<?php
class dashboard
{

    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">

    <title>CV. Maju Mundur</title>

</head>

<body>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-3">Selamat Datang</h1>
            <p class="lead">Toko Barang CV. Maju Mundur</p>
            <hr class="my-2">
            <p>More info</p>
            <p class="lead">
                <a class="btn btn-primary" href="data_barang.php" role="button">Lihat Produk</a>
            </p>
        </div>
    </div>

</body>

<script src="../js/jquery.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/fontawesome.min.js"></script>

</html>