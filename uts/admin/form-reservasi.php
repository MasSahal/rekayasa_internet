<?php
function tambah_reservasi()
{
    $db = new database;
    $pengunjung = $db->getPengunjung();
    $kamar = $db->getKamar();
?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Form Tambah Reservasi</h4>
                        </div>
                    </div>
                    <hr>
                    <form action="../process/reservasi.php?aksi=tambah" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reservasi_id">ID reservasi</label>
                                    <input type="text" name="reservasi_id" id="reservasi_id" class="form-control" value="RSV-<?= rand(1000000, 9999999); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="pengunjung_id">Pilih Pengunjung</label>
                                    <select class="form-control" name="pengunjung_id" id="pengunjung_id">
                                        <option selected disabled>-- Select --</option>
                                        <?php foreach ($pengunjung as $p) { ?>
                                            <option value="<?= $p['pengunjung_id']; ?>"><?= $p['nama']; ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kamar_id">Pilih Kamar</label>
                                    <select class="form-control" name="kamar_id" id="kamar_id">
                                        <option selected disabled>-- Select --</option>
                                        <?php foreach ($kamar as $k) { ?>
                                            <option value="<?= $k['kamar_id']; ?>">Kamar <?= $k['nama_kamar'] . " - Harga : " . $db->harga($k['harga_kamar']) ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="check_in">Tanggal Check-In</label>
                                    <input type="date" name="check_in" id="check_in" class="form-control" placeholder="Masukan telepon" value="<?= rand(1000, 100000); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="check_out">Tanggal Check-Out</label>
                                    <input type="date" name="check_out" id="check_out" class="form-control" placeholder="Masukan telepon" value="<?= rand(1000, 100000); ?>" required>
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
                                        <button type="submit" class="btn btn-primary">Tambah reservasi</button>
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
function edit_reservasi()
{
    $db = new database();
    $p = $db->getReservasi($_GET['reservasi_id']);
    if ($p) {
    ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Form Edit reservasi</h4>
                            </div>
                        </div>
                        <hr>
                        <form action="../process/reservasi.php?aksi=update" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reservasi_id">ID reservasi</label>
                                        <input type="text" name="reservasi_id" id="reservasi_id" class="form-control" value="<?= $p['reservasi_id']; ?>" readonly>
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
                                    <img src="../assets/images/reservasi/<?= $p['foto']; ?>" class="img-fluid foto" alt="" width="150px">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-12 d-flex">
                                    <div class="ms-auto">
                                        <div class="dl">
                                            <button type="submit" class="btn btn-primary">Update reservasi</button>
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
        echo "<script> window.location = 'data-reservasi.php'</script>";
    }
}

function detail_reservasi()
{
    $db = new database();
    $p = $db->getReservasi($_GET['reservasi_id']);
    if ($p) {
    ?>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Reservasi <?= $p['reservasi_id']; ?></h4>
                        <h5 class="card-subtitle">Ini adalah bukti reservasi yang sah dan terdaftar di database Hotel Prima Cirebon</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../assets/images/kamar/<?= $p['foto_kamar']; ?>" class="img-fluid mt-3">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-borderless w-75">
                                    <tr>
                                        <th>ID reservasi</th>
                                        <td>:</td>
                                        <td><?= $p['reservasi_id']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal reservasi</th>
                                        <td>:</td>
                                        <td><?= date("D, m Y", strtotime($p['created_at'])); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td><?= $p['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>:</td>
                                        <td><?= $p['telepon']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Hari</th>
                                        <td>:</td>
                                        <td>
                                            <?= $db->days($p['check_out'], $p['check_in']); ?> Hari
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Check In</th>
                                        <td>:</td>
                                        <td><?= $p['check_in']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Check Out</th>
                                        <td>:</td>
                                        <td><?= $p['check_out']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Bayar</th>
                                        <td>:</td>
                                        <td><?= $db->harga($p['total_biaya']); ?></td>
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
        echo "<script> window.location = 'data-reservasi.php'</script>";
    }
}
?>


<?php

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == "detail") {
        detail_reservasi();
    } else if ($aksi == "edit") {
        edit_reservasi();
    } else if ($aksi == "tambah") {
        tambah_reservasi();
    }
    // } else {
    //     tambah_reservasi();
}
?>