<?php

function update_data()
{
    // include('../model/database.php');
    $db = new database();
    $kd_barang = $_GET['id'];
    $data_distributor = $db->data_distributor();
    $barang = $db->tampil_update_barang($kd_barang);
?>
    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <form action="../process/proces_barang.php?aksi=update" method="post" enctype="multipart/form-data">
            <h3 style="text-align: center; background-color: #5D8AA8; border-radius: 10px; color: white; padding: 10px;">Update Barang</h3>
            <div class="mb-3">
                <label class="form-label">Kode Barang</label>
                <input type="text" name="kd_barang" class="form-control" placeholder="Masukkan Kode Barang" value="<?= $barang['kd_barang'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nm_barang" class="form-control" placeholder="Masukkan Nama Barang" value="<?= $barang['nm_barang'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Barang</label>
                <input type="number" min="1" name="harga" class="form-control" placeholder="Masukkan Harga Barang" value="<?= $barang['harga'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Barang</label>
                <input type="number" min="1" name="stok" class="form-control" placeholder="Masukkan Stok Barang" value="<?= $barang['stok'] ?>">
            </div>

            <div class="mb-3">
                <label for="distributor">Distributor</label>
                <select class="form-control" name="distributor" id="distributor">
                    <option selected disabled>-- Pilih -- </option>
                    <?php foreach ($data_distributor as $row) :; ?>
                        <option value="<?= $row['kd_distributor']; ?>" <?= $row['kd_distributor'] == $barang['distributor'] ? "selected" : ""; ?>><?= $row['nm_distributor']; ?></option>
                    <?php endforeach;; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan Barang</label>
                <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Barang"><?= $barang['ket']; ?></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
                <a href="data_barang.php" class="btn btn-secondary">Cancel</a>
            </div>

        </form>
    </div>
<?php }

function tambah_data()
{
    $db = new database();
    $data_distributor = $db->data_distributor();
?>
    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <form action="../process/proces_barang.php?aksi=tambah" method="post" enctype="multipart/form-data">
            <h3 style="text-align: center; background-color: #5D8AA8; border-radius: 10px; color: white; padding: 10px;">Input Barang</h3>
            <div class="mb-3">
                <label class="form-label">Kode Barang</label>
                <input type="text" name="kd_barang" class="form-control" placeholder="Masukkan Kode Barang" value="<?= "KD" . rand(1000, 9999); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nm_barang" class="form-control" placeholder="Masukkan Nama Barang">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Barang</label>
                <input type="number" min="1" name="harga" class="form-control" placeholder="Masukkan Harga Barang">
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Barang</label>
                <input type="number" min="1" name="stok" class="form-control" placeholder="Masukkan Stok Barang">
            </div>

            <div class="mb-3">
                <label for="distributor">Distributor</label>
                <select class="form-control" name="distributor" id="distributor">
                    <option selected disabled>-- Pilih -- </option>
                    <?php foreach ($data_distributor as $row) :; ?>
                        <option value="<?= $row['kd_distributor']; ?>"><?= $row['nm_distributor']; ?></option>
                    <?php endforeach;; ?>
                </select>
            </div>

            <div class="form-group">
                <img src="" class="img-fluid foto" alt="">
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Gambar</label>
                <input type="file" name="foto" class="form-control" onclick="img(this)">
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan Barang</label>
                <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Barang"></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>

        </form>
    </div>
<?php }

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$edit = $_GET['edit'];
if ($edit == 'update') {
    update_data();
} else {
    tambah_data();
}
