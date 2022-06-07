<?php
function update_data()
{
    $db = new Database();
    $kd_distributor = $_GET["id"];
    $distributor = $db->tampil_update_distributor($kd_distributor);
    $data_distributor = $db->data_distributor();
?>
    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
            Update Distributor</h3>
        <form method="post" action="<?php echo "proses_distributor.php?aksi=update"; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Kode Distributor</label>
                <input type="text" name="kd_distributor" class="form-control" placeholder="Masukkan Kode Distributor" value="<?php echo $distributor['kd_distributor'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Distributor</label>
                <input type="text" name="nm_distributor" class="form-control" placeholder="Masukkan Nama Distributor" value="<?php echo $distributor['nm_distributor'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?php echo $distributor['alamat'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="nohp" class="form-control" placeholder="Masukkan Nomor" value="<?php echo $distributor['nohp'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Pemilik</label>
                <input type="text" name="pemilik" class="form-control" placeholder="Masukkan Pemilik" value="<?php echo $distributor['pemilik'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe Produk</label>
                <input type="text" name="tipe_produk" class="form-control" placeholder="Masukkan Tipe Produk" value="<?php echo $distributor['tipe_produk'] ?>">
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="simpan" value="Update Data">
                <a href="data_distributor.php" class="btn btn-secondary">Kembali</a>
            </div>

        </form>

    </div>

<?php } ?>
<?php
function tambah_data()
{
    $db = new Database();
    $data_distributor = $db->data_distributor();
?>

    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input
            Distributor</h3>
        <form method="post" action="<?php echo "proses_distributor.php?aksi=tambah"; ?>">
            <div class="mb-3">
                <label class="form-label">Kode Distributor</label>
                <input type="text" name="kd_distributor" class="form-control" placeholder="Masukkan Kode Barang" value="DIS<?= rand(1000, 9999) ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Distributor</label>
                <input type="text" name="nm_distributor" class="form-control" placeholder="Masukkan Nama Barang">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Harga Barang">
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="nohp" class="form-control" placeholder="Masukkan Stok Barang">
            </div>

            <div class="mb-3">
                <label class="form-label">Pemilik</label>
                <input type="text" name="pemilik" class="form-control" placeholder="Masukkan Distributor">
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe Produk</label>
                <textarea class="form-control" name="tipe_produk" rows="3" placeholder="Masukkan Keterangan Barang"></textarea>
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