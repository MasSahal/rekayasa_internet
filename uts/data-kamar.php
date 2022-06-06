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

    include('model/database.php');

    $db = new database();
    $kamar = $db->getKamar();
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
                        <h4 class="page-title">Data Kamar</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Kamar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <?php include('form-kamar.php'); ?>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Data Kamar Tersedia</h4>
                                        <h5 class="card-subtitle">Menampilkan data kamar yang tersedia di Hotel Prima Cirebon</h5>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="?aksi=tambah" class="btn btn-info float-right"><i class="mdi mdi-plus" aria-hidden="true"></i>Tambah Kamar</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="table-responsive mx-3">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Nomor Kamar</th>
                                            <th class="border-top-0">Nama Kamar</th>
                                            <th class="border-top-0">Harga</th>
                                            <th class="border-top-0">Detail</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($kamar as $index => $k) { ?>
                                            <tr>
                                                <td><?= $index += 1; ?></td>
                                                <td><?= $k['no_kamar']; ?></td>
                                                <td><?= $k['nama_kamar']; ?></td>
                                                <td><?= $db->harga($k['harga_kamar']); ?></td>
                                                <td><?= $k['detail']; ?></td>
                                                <td>
                                                    <a name="" id="" class="btn btn-secondary btn-sm" href="data-kamar.php?aksi=detail&&kamar_id=<?= $k['kamar_id']; ?>" role="button">
                                                        <i class="mdi mdi-eye" aria-hidden="true"></i> Detail
                                                    </a>
                                                    |
                                                    <a name="" id="" class="btn btn-info btn-sm" href="data-kamar.php?aksi=edit&&kamar_id=<?= $k['kamar_id']; ?>" role="button">
                                                        <i class="mdi mdi-account-edit" aria-hidden="true"></i> Edit
                                                    </a>
                                                    |
                                                    <a name="" id="" class="btn btn-warning btn-sm" href="process/kamar.php?aksi=delete&&kamar_id=<?= $k['kamar_id']; ?>" role="button" onclick="return confirm('Yakin ingin menghapus kamar <?= $k['nama_kamar']; ?> ?')">
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