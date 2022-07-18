<?php
require('../vendor/autoload.php');
include('../model/voucher_model.php');

use Rakit\Validation\Validator;

$db = new voucher;
$validator = new Validator;

if (isset($_GET['mod'])) {

    $mod = $_GET['mod'];
    if ($mod == "insert") {
        $nama_voucher = htmlspecialchars($_POST['nama_voucher']);
        $kode_voucher = htmlspecialchars($_POST['kode_voucher']);
        $besaran_voucher = htmlspecialchars($_POST['besaran_voucher']);
        $jenis_voucher = htmlspecialchars($_POST['jenis_voucher']);
        $expired_voucher = htmlspecialchars($_POST['expired_voucher']);
        $jumlah_voucher = htmlspecialchars($_POST['jumlah_voucher']);

        $add = $db->insert_voucher(
            $nama_voucher,
            $kode_voucher,
            $besaran_voucher,
            $jenis_voucher,
            $expired_voucher,
            $jumlah_voucher
        );

        if ($add) {
            echo json_encode(array('status' => 'success', 'message' => 'voucher berhasil ditambahkan!'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'voucher gagal ditambahkan!'));
        }
    } elseif ($mod == "update") {

        $id = htmlspecialchars($_POST['id']);
        $old_data = $db->get_voucher($id);

        $jenis_voucher = htmlspecialchars($_POST['jenis_voucher']);
        $detail_voucher = htmlspecialchars($_POST['detail_voucher']);
        $expired_voucher = htmlspecialchars($_POST['expired_voucher']);
        $jumlah_voucher = htmlspecialchars($_POST['jumlah_voucher']);
        $harga_voucher = htmlspecialchars($_POST['harga_voucher']);

        // $upd = $db->update_voucher();

        if ($upd) {
            echo json_encode(array('status' => 'success', 'message' => 'voucher berhasil diubah!'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'voucher gagal diubah!'));
        }
    } elseif ($mod == "delete") {
        $id = $_POST['id'];
        $delete = $db->delete_voucher($id);
        if ($delete) {
            return json_encode(['status' => 'success', 'message' => 'Data voucher berhasil dihapus']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Data voucher gagal dihapus']);
        }
    }
}
