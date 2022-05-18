<?php

//panggil dtabase
include('../model/database.php');

$db = new database();

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == "tambah") {

        $reservasi_id = $_POST['reservasi_id'];
        $pengunjung_id = $_POST['pengunjung_id'];
        $kamar_id = $_POST['kamar_id'];

        //get data kamar
        $kamar = $db->getKamar($kamar_id);

        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];

        $days = $db->days($check_out, $check_in);
        $total_biaya = $days * $kamar['harga_kamar'];
        $add = $db->insertReservasi($reservasi_id, $pengunjung_id, $kamar_id, $check_in, $check_out, $total_biaya);
        if ($add) {
            echo "<script> alert('Resrvasi berhasil!')</script>";
            echo "<script> window.location = '../admin/data-reservasi.php'</script>";
        } else {
            echo "<script> alert('Resrvasi gagal!')</script>";
            echo "<script> window.location = '../admin/data-reservasi.php'</script>";
        }

        // $data = [
        //     'reservasi_id' => $reservasi_id,
        //     'pengunjung_id' => $pengunjung_id,
        //     'kamar_id' => $kamar_id,
        //     'check_in' => $check_in,
        //     'check_out' => $check_out,
        //     'harga' => $kamar['harga_kamar'],
        //     'days' => $days,
        //     'total_biaya' => $total_biaya
        // ];
        // $db->dd($data);
    } elseif ($aksi == "delete") {
        $reservasi_id = $_GET['reservasi_id'];
        if ($reservasi_id) {
            $delete = $db->deleteReservasi($reservasi_id);
            if ($delete) {
                echo "<script> alert('Resrvasi berhasil dihapus!')</script>";
                echo "<script> window.location = '../admin/data-reservasi.php'</script>";
            } else {
                echo "<script> alert('Resrvasi gagal dihapus!')</script>";
                echo "<script> window.location = '../admin/data-reservasi.php'</script>";
            }
        } else {
            echo "<script> window.location = '../admin/data-reservasi.php'</script>";
        }
    }
}
