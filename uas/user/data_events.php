<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-ticket Online</title>
    <?php include('./layout/head.php'); ?>
    <style>
        .img-carousel {
            height: 450px !important;
            width: 100% !important;
        }

        .ratio16by9 {
            aspect-ratio: 16 / 9;
        }

        .event {
            min-height: 300px;
            border: 1px solid #e0e0e0;
            border-radius: 0;
        }

        body {
            background-color: white !important;
        }
    </style>
</head>

<body>
    <?php
    class dashboard
    {
        function __construct()
        {
            include_once('./layout/navbar.php');
            include_once('../model/user_model.php');
            include_once('../model/event_model.php');
            include_once('../model/ticket_model.php');
        }
    }
    new dashboard;
    $event = new event;
    $tic = new ticket;
    if (isset($_GET['cari'])) {
        $events = $event->cari_event($_GET['cari']);
        $judul = "Menampilkan Pencarian dari " . $_GET['cari'];
    } else {
        $events = $event->get_event();
        $judul = "Menampilkan Semua Event";
    }

    if (isset($_GET['detail'])) {
        $event_id = $_GET['detail'];
        $view = $event->get_event($event_id);
        include('data/detail_event.php');
    } else { ?>



        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-0">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h4 class="card-title my-4 text-center"><?= $judul; ?></h4>
                            <div class="row">
                                <?php foreach ($events as $i => $r) { ?>
                                    <div class="col-md-3">
                                        <div class="card event" onclick="return url('data_event.php?detail=<?= $r['id_event']; ?>')">
                                            <img src="../assets/images/banner_event/<?= $r['banner_event']; ?>" class="ratio16by9" alt="<?= $r['banner_event']; ?>">
                                            <div class="card-body">
                                                <h6 class="card-title"><?= $r['nama_event']; ?></h6>
                                                <p class="card-text"><?= $r['detail_event']; ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="data_events.php?detail=<?= $r['id_event']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    <?php include('./layout/js.php'); ?>
    <script>
        function uri(link) {
            return window.location = link;
        }
    </script>
</body>

</html>