<?php

//panggil dtabase
include('../model/database.php');

$db = new database();

$aksi = $_GET['aksi'];
// die(var_dump($_POST));
if ($aksi == "tambah") {

    $data_barang = $db->tampil_update_barang($_POST['kd_barang']);

    $total_harga = $data_barang['harga'] * $_POST['jumlah'];

    $harga_diskon = $total_harga * $_POST['diskon'] / 100;

    $total_setelah_diskon = $total_harga - $harga_diskon;

    $add = $db->input_barang_keluar(
        $_POST['no_ref'],
        $_POST['kd_barang'],
        $_POST['jumlah'],
        $total_setelah_diskon,
        $_POST['tanggal_keluar'],
        $_POST['petugas'],
        $_POST['diskon'],
    );

    if ($add) {
        // tampil pesan berhasil
        echo "<script> alert('Data berhasil disimpan!')</script>";

        // redirect jika berhasil
        echo "<script> window.location = '../views/administrator/data_barang_keluar.php'</script>";
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <strong>Data gagal melakukan proses simpan! </strong><a href="../views/administrator/data_barang_keluar.php>Klik Disini!</a>
            </div>';
    }
} else if ($aksi == "update") {


    $id = $_POST['no_ref'];
    if ($id != null) {
        $data_barang = $db->tampil_update_barang_keluar($id);

        $total_harga = $data_barang['harga'] * $_POST['jumlah'];

        $harga_diskon = $total_harga * $_POST['diskon'] / 100;

        $total_setelah_diskon = $total_harga - $harga_diskon;

        $update =  $db->update_barang_keluar(
            $_POST['no_ref'],
            $_POST['kd_barang'],
            $_POST['jumlah'],
            $total_setelah_diskon,
            $_POST['tanggal_keluar'],
            $_POST['petugas'],
            $_POST['diskon'],
        );

        if ($update) {
            // tampil pesan berhasil
            echo "<script> alert('Data berhasil disimpan!')</script>";

            // redirect jika berhasil
            echo "<script> window.location = '../views/administrator/data_barang_keluar.php'</script>";
        } else {
            echo '<div class="alert alert-danger" role="alert">
                <strong>Data gagal melakukan proses update! </strong><a href="../views/administrator/data_barang_keluar.php>Klik Disini!</a>
            </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <strong>Tidak ada data yang diupdate! </strong><a href="../views/administrator/data_barang_keluar.php>Klik Disini!</a>
            </div>';
    }
} else if ($aksi == "delete") {

    $no_ref = $_GET['id'];
    if ($no_ref) {
        $del = $db->delete_barang_keluar($no_ref);
        if ($del) {
            echo "<script> alert('Data berhasil dihapus!')</script>";
            echo "<script> window.location = '../views/administrator/data_barang_keluar.php'</script>";
        } else {
            echo "<script> alert('Data gagal dihapus!')</script>";
            echo "<script> window.location = '../views/administrator/data_barang_keluar.php'</script>";
        }
    } else {
        echo "<script> alert('Data tidak ditemukan!')</script>";
        echo "<script> window.location = '../views/administrator/data_barang_keluar.php'</script>";
    }
} else {
    echo `  
            <div class="alert alert-danger" role="alert">
                <strong>Data gagal disimpan! </strong><a href=..//views/administrator/>data_barang_keluar.php>Klik Disini!</a>
            </div>
        `;
};
