<?php

//panggil dtabase
include('../model/database.php');

$db = new database();

$aksi = $_GET['aksi'];
// die(var_dump($_POST));
if ($aksi == "tambah") {
    $insert = $db->input_distributor(
        $_POST['kd_distributor'],
        $_POST['nm_distributor'],
        $_POST['alamat'],
        $_POST['nohp'],
        $_POST['pemilik'],
        $_POST['tipe_produk']
    );

    if ($insert) {

        // tampil pesan berhasil
        echo "<script> alert('Data berhasil disimpan!')</script>";

        // redirect
        echo "<script> window.location = '../views/administrator/data_distributor.php'</script>";
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <strong>Data gagal melakukan proses simpan! </strong><a href=../views/administrator/data_distributor.php>Klik Disini!</a>
            </div>';
    }
} else if ($aksi == "update") {
    $update = $db->update_distributor(
        $_POST['kd_distributor'],
        $_POST['nm_distributor'],
        $_POST['alamat'],
        $_POST['nohp'],
        $_POST['pemilik'],
        $_POST['tipe_produk']
    );

    if ($update) {

        // tampil pesan berhasil
        echo "<script> alert('Data berhasil diperbarui!')</script>";

        // redirect
        echo "<script> window.location = '../views/administrator/data_distributor.php'</script>";
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <strong>Data gagal melakukan proses pembaruan! </strong><a href=../views/administrator/data_distributor.php>Klik Disini!</a>
            </div>';
    }
} else if ($aksi == "delete") {

    $kd_distributor = $_GET['id'];
    if ($kd_distributor) {
        $del = $db->delete_distributor($kd_distributor);
        if ($del) {
            echo "<script> alert('Data berhasil dihapus!')</script>";
            echo "<script> window.location = '../views/administrator/data_distributor.php'</script>";
        } else {
            echo "<script> alert('Data gagal dihapus!')</script>";
            echo "<script> window.location = '../views/administrator/data_distributor.php'</script>";
        }
    } else {
        echo "<script> alert('Data tidak ditemukan!')</script>";
        echo "<script> window.location = '../views/administrator/data_distributor.php'</script>";
    }
} else {
    echo `  
            <div class="alert alert-danger" role="alert">
                <strong>Data gagal disimpan! </strong><a href=../views/administrator/>data_distributor.php>Klik Disini!</a>
            </div>
        `;
};


$harga = 10_000;
$diskon = $_POST['diskon'];

$harga_diskon = $diskon / 100 * $harga; #1000
$jumlah_bayar = $harga - $harga_diskon; #9000
