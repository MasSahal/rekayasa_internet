<?php
function tambah_pengunjung()
{
?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Form Tambah Pengunjung</h4>
                        </div>
                    </div>
                    <hr>
                    <form action="process/pengunjung.php?aksi=tambah" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pengunjung_id">ID Pengunjung</label>
                                    <input type="text" name="pengunjung_id" id="pengunjung_id" class="form-control" value="ID-<?= rand(100000, 999999); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Masukan email" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat </label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3" required placeholder="Masukan alamat ..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="number" min="1" max="9999999999999" name="telepon" id="telepon" class="form-control" placeholder="Masukan telepon" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control form" onclick="img(this)">
                                </div>
                                <div class="form-group">
                                </div>
                                <img src="#" class="img-fluid foto" alt="" width="150px">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-md-12 d-flex">
                                <div class="ms-auto">
                                    <div class="dl">
                                        <button type="submit" class="btn btn-primary">Tambah pengunjung</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
}
function edit_pengunjung()
{
    $db = new database();
    $p = $db->getPengunjung($_GET['pengunjung_id']);
    if ($p) {
    ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Form Edit Pengunjung</h4>
                            </div>
                        </div>
                        <hr>
                        <form action="process/pengunjung.php?aksi=update" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pengunjung_id">ID Pengunjung</label>
                                        <input type="text" name="pengunjung_id" id="pengunjung_id" class="form-control" value="<?= $p['pengunjung_id']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama" value="<?= $p['nama']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Masukan email" value="<?= $p['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat </label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="3" required placeholder="Masukan alamat ..."><?= $p['alamat']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input type="number" min="1" max="9999999999999" name="telepon" id="telepon" class="form-control" placeholder="Masukan telepon" value="<?= $p['telepon']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" name="foto" id="foto" class="form-control form" onclick="img(this)">
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <img src="assets/images/pengunjung/<?= $p['foto']; ?>" class="img-fluid foto" alt="" width="150px">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-12 d-flex">
                                    <div class="ms-auto">
                                        <div class="dl">
                                            <button type="submit" class="btn btn-primary">Update Pengunjung</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "<script> window.location = 'data-pengunjung.php'</script>";
    }
}

function detail_pengunjung()
{
    $db = new database();
    $p = $db->getpengunjung($_GET['pengunjung_id']);
    if ($p) {
    ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Data Pengunjung <?= $p['pengunjung_id']; ?></h4>
                        <h5 class="card-subtitle">Ini adalah data pengunjung yang sah dan terdaftar di database Hotel Prima Cirebon</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">

                                <img src="assets/images/pengunjung/<?= $p['foto']; ?>" class="img-fluid  mt-3">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-borderless w-75">
                                    <tr>
                                        <th>ID Pengunjung</th>
                                        <td>:</td>
                                        <td><?= $p['pengunjung_id']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td><?= $p['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td><?= $p['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>:</td>
                                        <td><?= $p['telepon']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Daftar</th>
                                        <td>:</td>
                                        <td><?= $p['created_at']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td>
                                            <p><?= $p['alamat']; ?></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "<script> window.location = 'data-pengunjung.php'</script>";
    }
}
?>


<?php

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == "detail") {
        detail_pengunjung();
    } else if ($aksi == "edit") {
        edit_pengunjung();
    } else if ($aksi == "tambah") {
        tambah_pengunjung();
    }
    // } else {
    //     tambah_pengunjung();
}
?>