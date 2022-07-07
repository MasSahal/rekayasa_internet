<div class="card">
    <div class="card-header">
        <h5>Event <?= $view['nama_event']; ?></h5>
        <div class="card-header-right">
            <i class="fa fa-times pointer" onclick="uri('data_events.php')"></i>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <img src="../assets/images/event/<?= $view['banner_event']; ?>" class="img-fluid embed-responsive-item">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="p-3 mt-3 border">
                    <strong class="mb-3 text-muted">Google Map :</strong>
                    <style type="text/css" media="screen">
                        iframe {
                            height: 250px;
                            width: 100%;
                        }
                    </style>
                    <?= $view['gmap_event']; ?>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-borderless w-75">
                    <tr>
                        <th>Nama Event</th>
                        <td>:</td>
                        <td><?= $view['nama_event']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Diselenggarakan</th>
                        <td>:</td>
                        <td><?= $view['tanggal_event']; ?></td>
                    </tr>
                    <tr>
                        <th>Waktu</th>
                        <td>:</td>
                        <td><?= $view['jam_event']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Daftar</th>
                        <td>:</td>
                        <td><?= $view['created_event']; ?></td>
                    </tr>
                    <tr>
                        <th>Lokasi Event</th>
                        <td>:</td>
                        <td><?= $view['lokasi_event']; ?></td>
                    </tr>
                    <tr>
                        <th>Detail</th>
                        <td>:</td>
                        <td>
                            <p><?= $view['detail_event']; ?></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-sm btn-secondary" href="./data_events.php" role="button">Kembali</a>
    </div>
</div>