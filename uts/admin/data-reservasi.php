<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php
    class dashboard
    {

        function __construct()
        {
            include('layout/css.php');
        }
    }
    $halaman_utama = new dashboard;

    include('../model/database.php');

    $db = new database();
    $reservasi = $db->getReservasi();
    // $db->dd($kamar);
    ?>
</head>

<body>

    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <?php include('layout/header.php'); ?>
        <?php include('layout/sidemenu.php'); ?>



        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="page-title">Data Reservasi</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Reservasi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <?php include('form-reservasi.php'); ?>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Data Reservasi</h4>
                                        <h5 class="card-subtitle">Menampilkan data reservasi yang masuk ke database Hotel Prima Cirebon</h5>
                                    </div>
                                    <div class="ms-auto">
                                        <?php if (!isset($_GET['aksi'])) { ?>
                                            <a href="?aksi=tambah" class="btn btn-primary float-right"><i class="mdi mdi-plus" aria-hidden="true"></i>Tambah Reservasi</a>
                                        <?php }; ?>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="table-responsive mx-3">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">ID Reservasi</th>
                                            <th class="border-top-0">Tgl Reservasi</th>
                                            <th class="border-top-0">Pengunjung</th>
                                            <th class="border-top-0">Total Hari</th>
                                            <th class="border-top-0">Total Biaya</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($reservasi as $index => $k) {

                                        ?>
                                            <tr>
                                                <td><?= $index += 1; ?></td>
                                                <td><?= $k['reservasi_id']; ?></td>
                                                <td><?= date("D, m Y", strtotime($k['created_at'])); ?></td>
                                                <td><?= $k['nama']; ?></td>
                                                <td><?= $db->days($k['check_out'], $k['check_in']) ?> Hari</td>
                                                <td><?= $db->harga($k['total_biaya']); ?></td>
                                                <td>
                                                    <a name="" id="" class="btn btn-secondary btn-sm" href="?aksi=detail&&reservasi_id=<?= $k['reservasi_id']; ?>" role="button">
                                                        <i class="mdi mdi-eye" aria-hidden="true"></i> Detail
                                                    </a>
                                                    |
                                                    <a name="" id="" class="btn btn-info btn-sm" href="?aksi=edit&&reservasi_id=<?= $k['reservasi_id']; ?>" role="button">
                                                        <i class="mdi mdi-account-edit" aria-hidden="true"></i> Edit
                                                    </a>
                                                    |
                                                    <a name="" id="" class="btn btn-warning btn-sm" href="../process/reservasi.php?aksi=delete&&reservasi_id=<?= $k['reservasi_id']; ?>" role="button" onclick="return confirm('Yakin ingin menghapus kamar <?= $k['nama_kamar']; ?> ?')">
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
</body>

</html>