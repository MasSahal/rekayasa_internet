<?php

//panggil dtabase
include('../model/database.php');

$db = new database();

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == "tambah") {

        $pengunjung_id = $_POST['pengunjung_id'];
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            // $db->dd($_FILES);


            $foto = $_FILES['foto']['name'];

            //ambil tmp foto
            $file_tmp = $_FILES['foto']['tmp_name'];

            //bikin nama baru
            $tmp = explode(".", $foto);

            $foto_baru = time() . '-' . str_replace([' ', '/', '_', '\\'], '-', $nama . '.' . end($tmp));

            // cek apakah ekstensi sesuai
            $allowed_ext = ['jpg', 'jpeg', 'png'];
            if (!in_array(strtolower(end($tmp)), $allowed_ext)) {
                echo "<script> alert('Silahkan upload foto! - Ekstensi diperbolehkan JPG, JPEG, PNG')</script>";
                echo "<script> window.location = '../data-pengunjung.php'</script>";
            }

            move_uploaded_file($file_tmp, '../assets/images/pengunjung/' . $foto_baru);
            $add = $db->insertPengunjung($pengunjung_id, $nama, $telepon, $email, $alamat, $foto_baru);
        } else {
            $add = $db->insertPengunjung($pengunjung_id, $nama, $telepon, $email, $alamat);
        }

        if ($add) {
            echo "<script> alert('Data Pengunjung berhasil disimpan!')</script>";
            echo "<script> window.location = '../data-pengunjung.php'</script>";
        } else {
            echo "<script> alert('Data Pengunjung gagal disimpan!')</script>";
            // echo "<script> window.location = '../data-pengunjung.php'</script>";
        }
    } elseif ($aksi == "update") {

        $pengunjung_id = $_POST['pengunjung_id'];
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {

            $foto = $_FILES['foto']['name'];

            //ambil tmp foto
            $file_tmp = $_FILES['foto']['tmp_name'];

            //bikin nama baru
            $tmp = explode(".", $foto);

            $foto_baru = time() . '-' . str_replace([' ', '/', '_', '\\'], '-', $nama . '.' . end($tmp));

            // cek apakah ekstensi sesuai
            $allowed_ext = ['jpg', 'jpeg', 'png'];
            if (!in_array(strtolower(end($tmp)), $allowed_ext)) {
                echo "<script> alert('Silahkan upload foto! - Ekstensi diperbolehkan JPG, JPEG, PNG')</script>";
                echo "<script> window.location = '../data-pengunjung.php'</script>";
            }

            $data = $db->getPengunjung($pengunjung_id);

            if ($data['foto'] != "user.jpg") {
                if (file_exists('../assets/images/pengunjung/' . $data['foto'])) {
                    unlink('../assets/images/pengunjung/' . $data['foto']);
                }
            }

            move_uploaded_file($file_tmp, '../assets/images/pengunjung/' . $foto_baru);
            $add = $db->updatePengunjung($pengunjung_id, $nama, $telepon, $email, $alamat, $foto_baru);
        } else {
            $add = $db->updatePengunjung($pengunjung_id, $nama, $telepon, $email, $alamat);
        }

        if ($add) {
            echo "<script> alert('Data Pengunjung berhasil disimpan!')</script>";
            echo "<script> window.location = '../data-pengunjung.php'</script>";
        } else {
            echo "<script> alert('Data Pengunjung gagal disimpan!')</script>";
            echo "<script> window.location = '../data-pengunjung.php'</script>";
        }
    } elseif ($aksi == "delete") {
        if (isset($_GET['pengunjung_id'])) {
            $id = $_GET['pengunjung_id'];

            $data = $db->getPengunjung($id);

            if ($data['foto'] != "user.jpg") {
                if (file_exists('../assets/images/pengunjung/' . $data['foto'])) {
                    $unlink = unlink('../assets/images/pengunjung/' . $data['foto']);
                    if (!$unlink) {
                        echo "<script> alert('Foto Pengunjung gagal dihapus!')</script>";
                        echo "<script> window.location = '../data-pengunjung.php'</script>";
                    }
                }
            }

            $del = $db->deletePengunjung($id);
            if ($del) {
                echo "<script> alert('Data berhasil dihapus!')</script>";
                echo "<script> window.location = '../data-pengunjung.php'</script>";
            } else {
                echo "<script> alert('Data gagal dihapus!')</script>";
                echo "<script> window.location = '../data-pengunjung.php'</script>";
            }
        } else {
            echo "<script> window.location = '../data-pengunjung.php'</script>";
        }
    }
}
