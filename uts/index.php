<!-- <script>
    window.location = 'data-reservasi.php'
</script> -->

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
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="display-5">Selamat Datang di Aplikasi Hotel Prima Cirebon</h3>
                                <p class="lead">Kemudahan memesan hotel berada dalam dunia Anda.</p>
                                <hr class="my-2">
                                <p>More info</p>
                                <p class="lead">
                                    <a class="btn btn-primary btn-lg" href="data-reservasi.php" role="button">Reservasi Sekarang!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer text-center">
                    All Rights Reserved by Ms Technoogy.</a>.
                </footer>
            </div>
        </div>
    </div>
    <?php include('layout/js.php'); ?>
</body>

</html>