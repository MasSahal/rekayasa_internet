<?php

//panggil dtabase
include('../model/database.php');

$db = new database();

$aksi = $_GET['aksi'];
// die(var_dump($_POST));
if ($aksi == "tambah") {

    //ambil data brang
    $barang = $db->tampil_update_barang($_POST['kd_barang']);

    //kalkulasi harga
    $total = $_POST['jumlah'] * $barang['harga'];

    $insert = $db->input_barang_masuk(
        $_POST['no_ref'],
        $_POST['kd_barang'],
        $_POST['kd_distributor'],
        $_POST['jumlah'],
        $_POST['tgl_masuk'],
        $_POST['penerima'],
        $_POST['ket'],
        $total
    );

    if ($insert) {
        // tampil pesan berhasil
        echo "<script> alert('Data berhasil disimpan!')</script>";

        // redirect jika berhasil
        echo "<script> window.location = '../views/data_barang_masuk.php'</script>";
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <strong>Data gagal melakukan proses simpan! </strong><a href=../views/data_barang_masuk.php>Klik Disini!</a>
            </div>';
    }
} else if ($aksi == "update") {

    // var_dump($_POST);
    $kd_barang = $_POST['kd_barang'];
    if ($kd_barang != null) {

        $update = $db->update_barang(
            $kd_barang,
            $_POST['nm_barang'],
            $_POST['harga'],
            $_POST['stok'],
            $_POST['distributor'],
            $_POST['ket']
        );

        if ($update) {
            // tampil pesan berhasil
            echo "<script> alert('Data berhasil disimpan!')</script>";

            // redirect jika berhasil
            echo "<script> window.location = '../views/data_barang_masuk.php'</script>";
        } else {
            echo '<div class="alert alert-danger" role="alert">
                <strong>Data gagal melakukan proses update! </strong><a href=../views/data_barang_masuk.php>Klik Disini!</a>
            </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <strong>Tidak ada data yang diupdate! </strong><a href=../views/data_barang_masuk.php>Klik Disini!</a>
            </div>';
    }
} else if ($aksi == "delete") {

    $kd_barang = $_GET['id'];
    if ($kd_barang) {
        $del = $db->delete_barang($kd_barang);
        if ($del) {
            echo "<script> alert('Data berhasil dihapus!')</script>";
            echo "<script> window.location = '../views/data_barang_masuk.php'</script>";
        } else {
            echo "<script> alert('Data gagal dihapus!')</script>";
            echo "<script> window.location = '../views/data_barang_masuk.php'</script>";
        }
    } else {
        echo "<script> alert('Data tidak ditemukan!')</script>";
        echo "<script> window.location = '../views/data_barang_masuk.php'</script>";
    }
} else {
    echo `  
            <div class="alert alert-danger" role="alert">
                <strong>Data gagal disimpan! </strong><a href=../views/>data_barang_masuk.php>Klik Disini!</a>
            </div>
        `;
};
