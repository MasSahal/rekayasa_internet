<?php
include 'database.php';
$db = new Database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {

    $data_barang = $db->tampil_update_barang($_POST['kd_barang']);
    $total = $data_barang['harga'] * $_POST['qty'];

    $add = $db->input_barang_masuk(
        $_POST['no_ref'],
        $_POST['kd_barang'],
        $_POST['kd_distributor'],
        $_POST['qty'],
        $_POST['tgl_masuk'],
        $_POST['penerima'],
        $_POST['ket'],
        $total,
    );
    if ($add) {
        echo "
        <script language = 'JavaScript'>
        alert('Data Berhasil Disimpan');
        document.location='data_barang_masuk.php';
        </script>
        ";
    } else {
        echo "
        <script language = 'JavaScript'>
        alert('Data Gagal Disimpan');
        document.location='data_barang_masuk.php';
        </script>
        ";
    }
} else if ($aksi == "update") {
    $upd = $db->update_barang(
        $_POST['kd_barang'],
        $_POST['nm_barang'],
        $_POST['harga'],
        $_POST['stok'],
        $_POST['distributor'],
        $_POST['ket'],
        $foto_baru
    );
    if ($upd) {
        echo "
        <script language = 'JavaScript'>
        alert('Data Berhasil Diperbarui');
        document.location='data_barang.php';
        </script>
        ";
    } else {
        echo "
        <script language = 'JavaScript'>
        alert('Data Gagal Diperbarui');
        document.location='data_barang.php';
        </script>
        ";
    }
} else if ($aksi == "delete") {
    $kd_barang =  $_GET['id'];
    $db->delete_barang($kd_barang);
    header('location:data_barang.php');
} else {
    echo "Database anda error silahkan kembali lagi <a href = 'data_barang.php?'>Klik Disini</a>";
}
