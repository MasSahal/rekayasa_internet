<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Tickets - Ms Tech</title>
    <?php include('./layout/head.php'); ?>
    <style>
        .img-carousel {
            height: 450px !important;
            width: 100% !important;
        }
    </style>
    <style>
        .ticket {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 700px;
            margin: 20px auto;
            border: 1px solid black;
        }

        .ticket .stub,
        .ticket .check {
            box-sizing: border-box;
        }

        .stub {
            background: #ef5658;
            height: 250px;
            width: 250px;
            color: white;
            padding: 20px;
            position: relative;
        }

        .stub:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            border-top: 20px solid #dd3f3e;
            border-left: 20px solid #ef5658;
            width: 0;
        }

        .stub:after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            border-bottom: 20px solid #dd3f3e;
            border-left: 20px solid #ef5658;
            width: 0;
        }

        .stub .top {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 40px;
            text-transform: uppercase;
        }

        .stub .top .line {
            display: block;
            background: #fff;
            height: 40px;
            width: 3px;
            margin: 0 20px;
        }

        .stub .top .num {
            font-size: 10px;
        }

        .stub .top .num span {
            color: #000;
        }

        .stub .number {
            position: absolute;
            left: 40px;
            font-size: 150px;
        }

        .stub .invite {
            position: absolute;
            left: 150px;
            bottom: 45px;
            color: #000;
            width: 20%;
        }

        .stub .invite:before {
            content: '';
            background: #fff;
            display: block;
            width: 40px;
            height: 3px;
            margin-bottom: 5px;
        }

        .check {
            background: #fff;
            height: 250px;
            width: 450px;
            padding: 40px;
            position: relative;
        }

        .check:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            border-top: 20px solid #dd3f3e;
            border-right: 20px solid #fff;
            width: 0;
        }

        .check:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            border-bottom: 20px solid #dd3f3e;
            border-right: 20px solid #fff;
            width: 0;
        }

        .check .big {
            font-size: 80px;
            font-weight: 900;
            line-height: .8em;
        }

        .check .number {
            position: absolute;
            top: 50px;
            right: 50px;
            color: #ef5658;
            font-size: 40px;
        }

        .check .info {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            font-size: 12px;
            margin-top: 20px;
            width: 100%;
        }

        .check .info section {
            margin-right: 50px;
        }

        .check .info section:before {
            content: '';
            background: #ef5658;
            display: block;
            width: 40px;
            height: 3px;
            margin-bottom: 5px;
        }

        .check .info section .title {
            font-size: 10px;
            text-transform: uppercase;
        }
    </style>
    <link href="../assets/select2/css/select2.css" rel="stylesheet" />
</head>

<body>

    <?php
    include('./layout/loader.php');
    include('../model/event_model.php');
    $db = new event; ?>
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
                                                $view = $db->get_event($id);
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
                                                <h5>Events Terbaru!</h5>
                                                <span>Menampilkan semua event yang sedang berlangsung</span>
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
                                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php
                                                        foreach ($db->get_event() as $i => $r) { ?>
                                                            <div class="carousel-item <?= $i == 0 ? "active" : ""; ?>">
                                                                <img src="../assets/images/banner_event/<?= $r['banner_event']; ?>" class="d-block img-carousel">
                                                            </div>
                                                        <?php }; ?>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form action="">
                                                    <div class="form-group row">
                                                        <label for="id_event" class="col-auto">Pilih Events : </label>
                                                        <div class="col-auto">
                                                            <select class="select2-container" name="id_event" id="id_event" style="min-width: 250px;" onchange="listdata(this.value)">
                                                                <option value="0" selected>- Pilih Event -</option>
                                                                <?php foreach ($db->get_event() as $r) { ?>
                                                                    <option value="<?= $r['id_event']; ?>"><?= $r['nama_event']; ?></option>
                                                                <?php }; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                                <div class="viewtabel">
                                                    <div class="jumbotron text-center" style="min-height:300px ;">
                                                        <h1 class="display-5 ">Tidak ada data yang ditampilkan!</h1>
                                                        <p class="lead">Silahkan pilih data yang akan ditampilkan.</p>
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
        function listdata(id) {
            $.ajax({
                url: './data/table_tickets.php',
                type: 'GET',
                data: {
                    id_event: id
                },
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
            // $("#id_event").change(function() {
            //     $.ajax({
            //         url: './data/table_tickets.php',
            //         type: 'GET',
            //         data: {
            //             id_event: $("#id_event").val()
            //         },
            //         success: function(data) {
            //             $('.viewtabel').html(data);
            //         },
            //         error: function(xhr, ajaxOptions, thrownerror) {
            //             Swal.fire({
            //                 title: "Maaf gagal load data!",
            //                 html: `Silahkan Cek kembali Kode Error: <strong>${(xhr.status + "\n")}</strong> `,
            //                 icon: "error",
            //                 showConfirmButton: false,
            //                 timer: 3100
            //             })
            //         }
            //     });
            // });
            // listdata();
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
            $('#id_event').select2({
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