<?php

//panggil dtabase
include('../model/database.php');

$db = new database();

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == "tambah") {

        // ambil nama bawaan
        $foto_kamar = $_FILES['foto_kamar']['name'];

        //ambil tmp foto
        $file_tmp = $_FILES['foto_kamar']['tmp_name'];

        $nama_kamar = $_POST['nama_kamar'];

        //bikin nama baru
        $tmp = explode(".", $foto_kamar);
        // die(var_dump($ext = pathinfo($nam, PATHINFO_EXTENSION)));

        $foto_baru = time() . '-' . str_replace([' ', '/', '_', '\\'], '-', $nama_kamar . '.' . end($tmp));
        // die(var_dump($_POST));
        // upload
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        if (in_array(strtolower(end($tmp)), $allowed_ext)) {
            $upload = move_uploaded_file($file_tmp, '../assets/images/kamar/' . $foto_baru);
            if ($upload) {
                $add = $db->insert_kamar(
                    $_POST['no_kamar'],
                    $nama_kamar,
                    $_POST['harga_kamar'],
                    $foto_baru,
                    $_POST['detail']
                );

                if ($add) {
                    echo "<script> alert('Data berhasil disimpan!')</script>";
                    echo "<script> window.location = '../admin/data-kamar.php'</script>";
                } else {
                    echo "<script> alert('Data gagal disimpan!')</script>";
                    echo "<script> window.location = '../admin/data-kamar.php'</script>";
                }
            } else {
                // tampil pesan gaagl
                echo "<script> alert('Foto gagal diupload!')</script>";

                // redirect
                // echo "<script> window.location = '../admin/data-kamar.php'</script>";
            }
        } else {
            echo "<script> alert('Silahkan upload foto! - Ekstensi diperbolehkan JPG, JPEG, PNG')</script>";

            // redirect
            echo "<script> window.location = '../admin/data-kamar.php'</script>";
        }
    } elseif ($aksi == "update") {

        $kamar_id       = $_POST['kamar_id'];
        $no_kamar       = $_POST['no_kamar'];
        $nama_kamar     = $_POST['nama_kamar'];
        $harga_kamar    = $_POST['harga_kamar'];
        $detail         = $_POST['detail'];

        if (is_uploaded_file($_FILES['foto_kamar']['tmp_name'])) {
            $foto_kamar = $_FILES['foto_kamar']['name'];

            //ambil tmp foto
            $file_tmp   = $_FILES['foto_kamar']['tmp_name'];

            //bikin nama baru
            $tmp        = explode(".", $foto_kamar);
            $foto_baru  = time() . '-' . str_replace([' ', '/', '_', '\\'], '-', $nama_kamar . '.' . end($tmp));

            $allowed_ext = ['jpg', 'jpeg', 'png'];
            if (!in_array(strtolower(end($tmp)), $allowed_ext)) {
                echo "<script> alert('Silahkan upload foto! - Ekstensi diperbolehkan JPG, JPEG, PNG')</script>";
                echo "<script> window.location = '../admin/data-kamar.php'</script>";
            }

            move_uploaded_file($file_tmp, '../assets/images/kamar/' . $foto_baru);
            $update = $db->update_kamar(
                $kamar_id,
                $no_kamar,
                $nama_kamar,
                $harga_kamar,
                $detail,
                $foto_baru,
            );
        } else {

            $update = $db->update_kamar(
                $kamar_id,
                $no_kamar,
                $nama_kamar,
                $harga_kamar,
                $detail
            );
        }

        if ($update) {
            echo "<script> alert('Data berhasil diupdate!')</script>";
            echo "<script> window.location = '../admin/data-kamar.php'</script>";
        } else {
            echo "<script> alert('Data gagal diupdate!')</script>";
            echo "<script> window.location = '../admin/data-kamar.php'</script>";
        }
    } elseif ($aksi == "delete") {
        if (isset($_GET['kamar_id'])) {
            $kamar_id = $_GET['kamar_id'];
            $delete = $db->delete_kamar($kamar_id);
            if ($delete) {
                echo "<script> alert('Data berhasil dihapus!')</script>";
                echo "<script> window.location = '../admin/data-kamar.php'</script>";
            } else {
                echo "<script> alert('Data gagal dihapus!')</script>";
                echo "<script> window.location = '../admin/data-kamar.php'</script>";
            }
        }
    } elseif ($aksi == "detail") {
        $kamar_id = $_GET['kamar_id'];
        $detail = $db->getKamar($kamar_id);
    }
}
