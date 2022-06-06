<?php
class dashboard
{

    function __construct()
    {
        // include "menu.php";
    }
}
$halaman_utama = new dashboard;

include('model/database.php');

$db = new database();
$pengunjung = $db->getPengunjung();
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include('layout/css.php'); ?>

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <?php include('layout/header.php'); ?>
        <?php include('layout/sidemenu.php'); ?>



        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="page-title">Data Pengunjung</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Pengunjung</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <?php include('form-pengunjung.php'); ?>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Data Pengunjung Terdaftar</h4>
                                        <h5 class="card-subtitle">Menampilkan data pengunjung yang terdaftar di Hotel Prima Cirebon</h5>

                                    </div>

                                    <div class="ms-auto">
                                        <a href="?aksi=tambah" class="btn btn-info float-right"><i class="mdi mdi-plus" aria-hidden="true"></i>Tambah pengunjung</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="table-responsive mx-3">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Foto</th>
                                            <th class="border-top-0">Nama</th>
                                            <th class="border-top-0">Telepon</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Alamat</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($pengunjung as $index => $p) { ?>
                                            <tr>
                                                <td><?= $index += 1; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10">
                                                            <img src="assets/images/pengunjung/<?= $p['foto']; ?>" class="img-fluid rounded-circle" width="50px" alt="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= $p['nama']; ?></td>
                                                <td><?= $p['telepon']; ?></td>
                                                <td>
                                                    <strong><?= $p['email']; ?></strong>
                                                </td>
                                                <td><?= $p['alamat']; ?></td>
                                                <td>
                                                    <a name="" id="" class="btn btn-secondary btn-sm" href="data-pengunjung.php?aksi=detail&&pengunjung_id=<?= $p['pengunjung_id']; ?>" role="button">
                                                        <i class="mdi mdi-eye" aria-hidden="true"></i> Detail
                                                    </a>
                                                    |
                                                    <a name="" id="" class="btn btn-info btn-sm" href="data-pengunjung.php?aksi=edit&&pengunjung_id=<?= $p['pengunjung_id']; ?>" role="button">
                                                        <i class="mdi mdi-account-edit" aria-hidden="true"></i> Edit
                                                    </a>
                                                    |
                                                    <a name="" id="" class="btn btn-warning btn-sm" href="process/pengunjung.php?aksi=delete&&pengunjung_id=<?= $p['pengunjung_id']; ?>" role="button" onclick="return confirm('Yakin ingin menghapus pengunjung <?= $p['nama']; ?> ?')">
                                                        <i class="mdi mdi-delete-forever" aria-hidden="true"></i> Hapus
                                                    </a>
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
            <footer class="footer text-center">
                All Rights Reserved by Ms Technoogy.</a>.
            </footer>
        </div>
    </div>
    <?php include('layout/js.php'); ?>
</body>

</html>