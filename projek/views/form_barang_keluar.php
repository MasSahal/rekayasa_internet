<?php
function update_data()
{
    $db = new Database();
    $no_ref = $_GET["id"];
    $barang_keluar = $db->tampil_update_barang_keluar($no_ref);
    $data_barang = $db->data_barang();
?>
    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
            Update Barang</h3>
        <form method="post" action="<?= "../process/proces_barang_keluar.php?aksi=update"; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">No Ref</label>
                <input type="text" name="no_ref" class="form-control" placeholder="Masukkan Kode Barang" value="<?= $barang_keluar['no_ref']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Barang Keluar</label>
                <input type="date" name="tanggal_keluar" class="form-control" placeholder="Tanggal keluar" value="<?= $barang_keluar['tanggal_keluar']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <select name="kd_barang" class="form-control" required>
                    <?php foreach ($data_barang as $row) { ?>
                        <option value="<?= $row['kd_barang'] ?>" <?= $row['kd_barang'] == $barang_keluar['kd_barang'] ? "selected" : "" ?>><?php echo $row['nm_barang'] ?> - Rp<?php echo $row['harga'] ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Jumlah Keluar</label>
                <input type="number" name="jumlah" min="1" class="form-control" placeholder="Masukkan Jumlah Barang" value="<?= $barang_keluar['jumlah_keluar']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Diskon dalam %</label>
                <input type="number" name="diskon" min="1" class="form-control" placeholder="Masukkan diskon" value="<?= $barang_keluar['diskon']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Petugas</label>
                <input type="text" name="petugas" class="form-control" placeholder="Masukkan petugas" value="<?= $barang_keluar['petugas']; ?>" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="proses" value="Simpan Data">
                <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
            </div>
        </form>
    </div>

<?php
}
function tambah_data()
{
    $db = new Database();
    $data_barang = $db->data_barang();
?>

    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input
            Barang Keluar</h3>
        <form method="post" action="<?= "../process/proces_barang_keluar.php?aksi=tambah"; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">No Ref</label>
                <input type="text" name="no_ref" class="form-control" placeholder="Masukkan Kode Barang" value="<?= 'REFO' . time(); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Barang Keluar</label>
                <input type="date" name="tanggal_keluar" class="form-control" placeholder="Tanggal keluar" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <select name="kd_barang" class="form-control" required>
                    <?php
                    foreach ($data_barang as $row) {
                    ?>
                        <option value="<?php echo $row['kd_barang'] ?>"><?php echo $row['nm_barang'] ?> - Rp<?php echo $row['harga'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Jumlah Keluar</label>
                <input type="number" name="jumlah" min="1" class="form-control" placeholder="Masukkan Jumlah Barang" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Diskon dalam %</label>
                <input type="number" name="diskon" min="1" class="form-control" placeholder="Masukkan diskon" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Petugas</label>
                <input type="text" name="petugas" class="form-control" placeholder="Masukkan petugas" required>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="proses" value="Simpan Data">
                <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
            </div>

        </form>

    </div>

<?php } ?>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$edit = $_GET['edit'];
if ($edit == "update") {
    update_data();
} else {
    tambah_data();
}
?>