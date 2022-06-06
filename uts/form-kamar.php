<?php
function tambah_kamar()
{
    $db = new database();
    $res = $db->getLastKamar();
    if ($res) {
        $no_kamar = sprintf("%04s", intval($res['no_kamar']) + 1);
    } else {
        $no_kamar = "0001";
    }
?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Form Tambah Kamar</h4>
                        </div>
                    </div>
                    <hr>
                    <form action="process/kamar.php?aksi=tambah" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_kamar">No Kamar</label>
                                    <input type="text" name="no_kamar" id="no_kamar" class="form-control" value="<?= $no_kamar ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kamar">Nama Kamar</label>
                                    <input type="text" name="nama_kamar" id="nama_kamar" class="form-control" placeholder="Masukan nama kamar" required>
                                </div>
                                <div class="form-group">
                                    <label for="detail">Detail Kamar</label>
                                    <textarea class="form-control" name="detail" id="detail" rows="3" required placeholder="Detail kamar ..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_kamar">Harga</label>
                                    <input type="number" min="1" max="99999999" name="harga_kamar" id="harga_kamar" class="form-control" placeholder="Masukan harga kamar" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto_kamar">Foto Kamar</label>
                                    <input type="file" name="foto_kamar" id="foto_kamar" class="form-control form" required onclick="img(this)">
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
                                        <button type="submit" class="btn btn-primary">Tambah Kamar</button>
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
function edit_kamar()
{
    $db = new database();
    $kamar = $db->getKamar($_GET['kamar_id']);
    if ($kamar) {
    ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Form Edit Kamar</h4>
                            </div>
                        </div>
                        <hr>
                        <form action="process/kamar.php?aksi=update" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="kamar_id" value="<?= $kamar['kamar_id']; ?>">
                                    <div class="form-group">
                                        <label for="no_kamar">No Kamar</label>
                                        <input type="text" name="no_kamar" id="no_kamar" class="form-control" value="<?= $kamar['no_kamar']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kamar">Nama Kamar</label>
                                        <input type="text" name="nama_kamar" id="nama_kamar" class="form-control" placeholder="Masukan nama kamar" value="<?= $kamar['nama_kamar']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="detail">Detail Kamar</label>
                                        <textarea class="form-control" name="detail" id="detail" rows="3" required placeholder="Detail kamar ..."><?= $kamar['detail']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga_kamar">Harga</label>
                                        <input type="number" min="1" max="99999999" name="harga_kamar" id="harga_kamar" class="form-control" placeholder="Masukan harga kamar" value="<?= $kamar['harga_kamar']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto_kamar">Foto Kamar</label>
                                        <input type="file" name="foto_kamar" id="foto_kamar" class="form-control form" onclick="img(this)">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="assets/images/kamar/<?= $kamar['foto_kamar']; ?>" class="img-fluid foto" width="150px">

                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                    <img src="assets/images/kamar/<?= $kamar['nama_kamar']; ?>" class="img-fluid foto" alt="" width="100px">
                                </div> -->
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-12 d-flex">
                                    <div class="ms-auto">
                                        <div class="dl">
                                            <button type="submit" class="btn btn-primary">Update Kamar</button>
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
        echo "<script> window.location = 'data-kamar.php'</script>";
    }
}

function detail_kamar()
{
    $db = new database();
    $kamar = $db->getKamar($_GET['kamar_id']);
    if ($kamar) {
    ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Kamar Nomor <?= $kamar['no_kamar']; ?></h4>
                        <h5 class="card-subtitle">Ini adalah data kamar yang sah dan terdaftar di database Hotel Prima Cirebon</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">

                                <img src="assets/images/kamar/<?= $kamar['foto_kamar']; ?>" class="img-fluid mt-3">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-borderless w-75">
                                    <tr>
                                        <th>Nomor Kamar</th>
                                        <td>:</td>
                                        <td><?= $kamar['no_kamar']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Kamar</th>
                                        <td>:</td>
                                        <td><?= $kamar['nama_kamar']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga Kamar</th>
                                        <td>:</td>
                                        <td><?= $kamar['harga_kamar']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Detail</th>
                                        <td>:</td>
                                        <td>
                                            <p><?= $kamar['detail']; ?></p>
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
        echo "<script> window.location = 'data-kamar.php'</script>";
    }
}
?>


<?php

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == "detail") {
        detail_kamar();
    } else if ($aksi == "edit") {
        edit_kamar();
    } else if ($aksi == "tambah") {
        tambah_kamar();
    }
    // } else {
    //     tambah_kamar();
}
?>