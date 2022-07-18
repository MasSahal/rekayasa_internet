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
        }
    }
    new dashboard;
    $event = new event;

    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="card bg-light">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php foreach ($event->get_event() as $i => $r) { ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="<?= $i == 0 ? "active" : ""; ?>"></li>
                            <?php }; ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            foreach ($event->get_event() as $i => $r) { ?>
                                <div class="carousel-item <?= $i == 0 ? "active" : ""; ?>">
                                    <img src="../assets/images/banner_event/<?= $r['banner_event']; ?>" class="img-carousel">
                                    <div class=" carousel-caption d-none d-md-block">
                                        <h5><?= substr($r['nama_event'], 0, 50); ?></h5>
                                        <p><?= substr($r['detail_event'], 0, 100); ?></p>
                                    </div>
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
                    <div class="card-body">
                        <h5 class="card-title mt-5 text-center">Event Paling Popular</h5>
                        <div class="row">
                            <?php foreach ($event->get_event() as $i => $r) { ?>
                                <div class="col-md-3">
                                    <div class="card event" onclick="url('data_events.php?detail=<?= $r['id_event']; ?>')">
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
    <?php include('./layout/js.php'); ?>

</body>

</html>