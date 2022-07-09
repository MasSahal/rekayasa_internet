<!DOCTYPE html>
<html lang="en">

<head>
    <title>404 NOT FOUND</title>
    <?php include('./layout/head.php'); ?>

</head>

<body>

    <div id="pcoded" class="pcoded">
        <div class="card jumbotron-fluid">
            <div class="text-center pt-5">
                <h1 class="display-3">404 Not Found</h1>
                <p class="lead"><?= $_GET['message'] ?? "Halaman yang anda cari tidak ditemukan!" ?></p>
                <hr class="my-2">
                <p>More info</p>
                <p class="lead">
                    <a class="btn btn-sm btn-danger" href="index.php" role="button">Kembali</a>
                </p>
            </div>
        </div>
    </div>
    <?php include('./layout/js.php'); ?>
</body>

</html>