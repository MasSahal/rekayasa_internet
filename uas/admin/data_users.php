<!DOCTYPE html>
<html lang="en">

<head>
    <title>Material Able bootstrap admin template by Codedthemes</title>
    <?php include('./layout/head.php'); ?>

</head>

<body>

    <?php
    include('./layout/loader.php');
    include('../model/user_model.php');
    $db = new user; ?>
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
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">Welcome to E-Ticket</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
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
                                        <?php if (isset($_GET['detail'])) {;
                                            $id = $_GET['detail'];
                                            $view = $db->get_user($id);
                                            if ($view) {
                                                include('./data/detail_user.php');
                                            } else { ?>
                                                <script>
                                                    window.location = '404_page.php?message=Halaman tidak ditemukan'
                                                </script>
                                        <?php }
                                        } ?>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Data Users</h5>
                                                <span>use class <code>table</code> inside table element</span>
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
                                            <div class="card-body viewtabel">

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
    <script>
        function listdata() {
            $.ajax({
                url: './data/table_user.php',
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
            listdata();
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
        });

        function uri(link) {
            window.location = link;
        }
    </script>

</body>

</html>