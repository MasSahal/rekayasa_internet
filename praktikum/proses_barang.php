<?php
include 'database.php';
$db = new Database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 9999);
    $foto_baru = $angka_acak . '-' . $foto;
    $folder = "dokumen/";

    move_uploaded_file($file_tmp, $folder . $foto_baru);

    $db->input_barang(
        $_POST['kd_barang'],
        $_POST['nm_barang'],
        $_POST['harga'],
        $_POST['stok'],
        $_POST['distributor'],
        $_POST['ket'],
        $foto_baru,
    );
    echo "
	<script language = 'JavaScript'>
	alert('Data Berhasil Disimpan');
	document.location='data_barang.php';
	</script>
	";
} else if ($aksi == "update") {
    $db->update_barang(
        $_POST['kd_barang'],
        $_POST['nm_barang'],
        $_POST['harga'],
        $_POST['stok'],
        $_POST['distributor'],
        $_POST['ket'],
        $foto_baru
    );
    echo "
	<script language = 'JavaScript'>
	alert('Data Berhasil Disimpan');
	document.location='data_barang.php';
	</script>
	";
} else if ($aksi == "delete") {
    $kd_barang =  $_GET['id'];
    $db->delete_barang($kd_barang);
    header('location:data_barang.php');
} else {
    echo "Database anda error silahkan kembali lagi <a href = 'data_barang.php?'>Klik Disini</a>";
}