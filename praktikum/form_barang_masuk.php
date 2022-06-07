<?php
function update_data()
{
    $db = new Database();
    $kd_barang = $_GET["id"];
    $barang = $db->tampil_update_barang($kd_barang);
    $data_distributor = $db->data_distributor();
    $data_barang = $db->data_barang();
?>
    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
            Update Barang</h3>
        <form method="post" action="<?php echo "proses_barang.php?aksi=update"; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Kode Barang</label>
                <input type="text" name="kd_barang" class="form-control" placeholder="Masukkan Kode Barang" value="<?php echo $barang['kd_barang'] ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nm_barang" class="form-control" placeholder="Masukkan Nama Barang" value="<?php echo $barang['nm_barang'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Barang</label>
                <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Barang" value="<?php echo $barang['harga'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Barang</label>
                <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok Barang" value="<?php echo $barang['stok'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Distributor</label>
                <select name="distributor" class="form-control">
                    <option value="<?php echo $barang['distributor'] ?>"><?php echo $barang['distributor'] ?></option>
                    <?php
                    foreach ($data_distributor as $row) {
                    ?>
                        <option value="<?php echo $row['kd_distributor'] ?>"><?php echo $row['nm_distributor'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan Barang</label>
                <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Barang"><?php echo $barang['ket'] ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Foto</label>
                <input type="file" name="foto" class="form-control" placeholder="Upload Foto">
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="simpan" value="Update Data">
                <a href="data_barang.php" class="btn btn-secondary">Kembali</a>
            </div>

        </form>

    </div>

<?php } ?>
<?php
function tambah_data()
{
    $db = new Database();
    $data_distributor = $db->data_distributor();
    $data_barang = $db->data_barang();
?>

    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input
            Barang Masuk</h3>
        <form method="post" action="<?php echo "proses_barang_masuk.php?aksi=tambah"; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">No Ref</label>
                <input type="text" name="no_ref" class="form-control" placeholder="Masukkan Kode Barang" value="<?= 'REF' . time(); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Barang Masuk</label>
                <input type="date" name="tgl_masuk" class="form-control" placeholder="Masukkan Nama Barang" value="<?= date("d/m/Y", strtotime(time())); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <select name="kd_barang" class="form-control">
                    <?php
                    foreach ($data_barang as $row) {
                    ?>
                        <option value="<?php echo $row['kd_barang'] ?>"><?php echo $row['nm_barang'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Distributor</label>
                <select name="kd_distributor" class="form-control">
                    <?php
                    foreach ($data_distributor as $row) {
                    ?>
                        <option value="<?php echo $row['kd_distributor'] ?>"><?php echo $row['nm_distributor'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Jumlah Masuk</label>
                <input type="number" name="qty" class="form-control" placeholder="Masukkan Jumlah Barang">
            </div>

            <div class="mb-3">
                <label class="form-label">Penerima</label>
                <input type="text" name="penerima" class="form-control" placeholder="Masukkan Stok Barang">
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea class="form-control" name="ket" rows="3" placeholder="Masukkan Keterangan Barang"></textarea>
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