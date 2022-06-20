<?php

function update_data()
{
    // include('../model/database.php');
    $db = new database();
    $kd_distributor = $_GET['id'];
    $distributor = $db->tampil_update_distributor($kd_distributor);
?>
    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <form action="../../process/proces_distributor.php?aksi=update" method="post">
            <h3 style="text-align: center; background-color: seagreen; border-radius: 10px; color: white; padding: 10px;">Input Distributor</h3>
            <div class="mb-3">
                <label class="form-label">Kode Distributor</label>
                <input type="text" name="kd_distributor" class="form-control" value="<?= $distributor['kd_distributor'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Distributor</label>
                <input type="text" name="nm_distributor" class="form-control" value="<?= $distributor['nm_distributor'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Pemilik</label>
                <input type="text" name="pemilik" class="form-control" value="<?= $distributor['pemilik'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="number" min="1" name="nohp" class="form-control" value="<?= $distributor['nohp'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe Produk</label>
                <input type="text" name="tipe_produk" class="form-control" value="<?= $distributor['tipe_produk'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat"><?= $distributor['alamat']; ?></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Perubahan">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>

        </form>
    </div>
<?php }

function tambah_data()
{
?>
    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <form action="../../process/proces_distributor.php?aksi=tambah" method="post">
            <h3 style="text-align: center; background-color: seagreen; border-radius: 10px; color: white; padding: 10px;">Input Distributor</h3>
            <div class="mb-3">
                <label class="form-label">Kode Distributor</label>
                <input type="text" name="kd_distributor" class="form-control" value="<?= "DB" . rand(1000, 9999); ?>" placeholder="Masukkan Kode Distributor">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Distributor</label>
                <input type="text" name="nm_distributor" class="form-control" placeholder="Masukkan Nama Distributor">
            </div>

            <div class="mb-3">
                <label class="form-label">Pemilik</label>
                <input type="text" name="pemilik" class="form-control" placeholder="Masukkan Pemilik">
            </div>

            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="number" min="1" name="nohp" class="form-control" placeholder="Masukkan No Telepon">
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe Produk</label>
                <input type="text" name="tipe_produk" class="form-control" placeholder="Masukkan Tipe Produk">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat"></textarea>
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
?>