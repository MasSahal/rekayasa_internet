<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Tickets - Ms Tech</title>
    <?php include('./layout/head.php'); ?>
</head>

<body>

    <?php
    // include('./layout/loader.php');
    include('../model/voucher_model.php');
    $db = new voucher; ?>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php include('./layout/navbar.php'); ?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include('./layout/sidebar.php'); ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Events</h5>
                                            <p class="m-b-0">Welcome to E-Ticket</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.php"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Tickets</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">

                                        <!-- cek apakah sedang lihat detail -->
                                        <?php if (isset($_GET['detail'])) {
                                            if (is_numeric($_GET['detail']) && abs($_GET['detail'] == $_GET['detail'])) {
                                                $id = $_GET['detail'];
                                                $view = $db->get_voucher($id);
                                                if ($view) {
                                                    include('./data/detail_event.php');
                                                } else { ?>
                                                    <script>
                                                        window.location = '404_page.php?message=' + '<?= urlencode("Data event yang anda cari tidak ditemukan!") ?>';
                                                    </script>
                                                <?php }
                                                #
                                            } else { ?>
                                                <script>
                                                    window.location = '404_page.php?message=' + '<?= urlencode("Oops Halaman yang anda cari tidak ditemukan!") ?>';
                                                </script>
                                        <?php
                                            }
                                        }
                                        ?>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Data Vouchers</h5>
                                                <span>Menampilkan semua voucher yang sedang berlangsung</span>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="viewtabel">
                                                    <div class="jumbotron text-center" style="min-height:300px ;">
                                                        <h1 class="display-5 ">Tidak ada data yang ditampilkan!</h1>
                                                        <p class="lead">Silahkan reload data yang akan ditampilkan.</p>
                                                        <hr class="my-2">
                                                        <p>Selengkapnya</p>
                                                        <p class="lead">
                                                            <a class="btn btn-primary btn-sm" href="data_events.php" role="button">Lihat Events</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="viewmodal"></div>
    <?php include('./layout/js.php'); ?>
    <script src="../assets/select2/js/select2.min.js"></script>

    <script>
        function listdata() {
            $.ajax({
                url: './data/table_vouchers.php',
                type: 'GET',
                success: function(data) {
                    $('.viewtabel').html(data);
                },
                error: function(xhr, ajaxOptions, thrownerror) {
                    Swal.fire({
                        title: "Maaf gagal load data!",
                        html: `Silahkan Cek kembali Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
                        icon: "error",
                        showConfirmButton: false,
                        timer: 3100
                    })
                }
            });
        }

        $(document).ready(function() {
            $(".reload").on("click", function() {
                var $this = $(this);
                $this.parents(".card").addClass("card-load");
                $this
                    .parents(".card")
                    .append(
                        '<div class="card-loader"><i class="fa fa-circle-o-notch rotate-refresh"></div>'
                    );
                setTimeout(function() {
                    $this.parents(".card").children(".card-loader").remove();
                    $this.parents(".card").removeClass("card-load");
                }, 2000);
                listdata();
            });
            listdata();
            $('#id_voucher').select2({
                placeholder: "Pilih Event Terkait",
                allowClear: true
            });
        });

        function uri(link) {
            return window.location = link;
        }
    </script>

</body>

</html>