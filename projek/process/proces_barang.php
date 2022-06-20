<?php

//panggil dtabase
include('../model/database.php');

$db = new database();

$aksi = $_GET['aksi'];
// die(var_dump($_POST));
if ($aksi == "tambah") {

    // ambil nama foto
    $foto = $_FILES['foto']['name'];

    //ambil tmp/file foto
    $file_tmp = $_FILES['foto']['tmp_name'];


    $angka_acak = rand(1, 9999);

    $foto_baru = $angka_acak . '-' . $foto;

    $folder = "../views/administrator/dokumen/";

    $up_img = move_uploaded_file($file_tmp, $folder . $foto_baru);


    if ($up_img) {
        $insert = $db->input_barang(
            $_POST['kd_barang'],
            $_POST['nm_barang'],
            $_POST['harga'],
            $_POST['stok'],
            $_POST['distributor'],
            $_POST['ket'],
            $foto_baru,
        );

        if ($insert) {
            // tampil pesan berhasil
            echo "<script> alert('Data berhasil disimpan!')</script>";

            // redirect jika berhasil
            echo "<script> window.location = '../views/administrator/data_barang.php'</script>";
        } else {
            echo '<div class="alert alert-danger" role="alert">
                <strong>Data gagal melakukan proses simpan! </strong><a href=../views/administrator/data_barang.php>Klik Disini!</a>
            </div>';
        }
    } else {
        echo `  
            <div class="alert alert-danger" role="alert">
                <strong>Data foto gagal disimpan! </strong><a href=../views/administrator/>data_barang.php>Klik Disini!</a>
            </div>
        `;
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
            echo "<script> window.location = '../views/administrator/data_barang.php'</script>";
        } else {
            echo '<div class="alert alert-danger" role="alert">
                <strong>Data gagal melakukan proses update! </strong><a href=../views/administrator/data_barang.php>Klik Disini!</a>
            </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <strong>Tidak ada data yang diupdate! </strong><a href=../views/administrator/data_barang.php>Klik Disini!</a>
            </div>';
    }
} else if ($aksi == "delete") {

    $kd_barang = $_GET['id'];
    if ($kd_barang) {
        $del = $db->delete_barang($kd_barang);
        if ($del) {
            echo "<script> alert('Data berhasil dihapus!')</script>";
            echo "<script> window.location = '../views/administrator/data_barang.php'</script>";
        } else {
            echo "<script> alert('Data gagal dihapus!')</script>";
            echo "<script> window.location = '../views/administrator/data_barang.php'</script>";
        }
    } else {
        echo "<script> alert('Data tidak ditemukan!')</script>";
        echo "<script> window.location = '../views/administrator/data_barang.php'</script>";
    }
} else {
    echo `  
            <div class="alert alert-danger" role="alert">
                <strong>Data gagal disimpan! </strong><a href=../views/administrator/>data_barang.php>Klik Disini!</a>
            </div>
        `;
};
