<?php
require('../vendor/autoload.php');
include('../model/ticket_model.php');

use Rakit\Validation\Validator;

$db = new ticket;
$validator = new Validator;

if (isset($_GET['mod'])) {

    $mod = $_GET['mod'];
    if ($mod == "insert") {
        $id_event = htmlspecialchars($_POST['id_event']);
        $jenis_ticket = htmlspecialchars($_POST['jenis_ticket']);
        $detail_ticket = htmlspecialchars($_POST['detail_ticket']);
        $expired_ticket = htmlspecialchars($_POST['expired_ticket']);
        $jumlah_ticket = htmlspecialchars($_POST['jumlah_ticket']);
        $harga_ticket = htmlspecialchars($_POST['harga_ticket']);

        $add = $db->insert_ticket(
            $id_event,
            $jenis_ticket,
            $detail_ticket,
            $expired_ticket,
            $jumlah_ticket,
            $harga_ticket
        );

        if ($add) {
            echo json_encode(array('status' => 'success', 'message' => 'Ticket berhasil ditambahkan!'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Ticket gagal ditambahkan!'));
        }
    } elseif ($mod == "update") {

        $id = htmlspecialchars($_POST['id']);
        $old_data = $db->get_ticket($id);
        $jenis_ticket = htmlspecialchars($_POST['jenis_ticket']);
        $detail_ticket = htmlspecialchars($_POST['detail_ticket']);
        $expired_ticket = htmlspecialchars($_POST['expired_ticket']);
        $jumlah_ticket = htmlspecialchars($_POST['jumlah_ticket']);
        $harga_ticket = htmlspecialchars($_POST['harga_ticket']);

        $upd = $db->update_ticket(
            $id,
            $jenis_ticket,
            $detail_ticket,
            $expired_ticket,
            $jumlah_ticket,
            $harga_ticket,
        );

        if ($upd) {
            echo json_encode(array('status' => 'success', 'message' => 'Ticket berhasil diubah!'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Ticket gagal diubah!'));
        }
    } elseif ($mod == "delete") {
        $id = $_POST['id'];
        $delete = $db->delete_ticket($id);
        if ($delete) {
            echo json_encode(array('status' => 'success', 'message' => 'Data ticket berhasil dihapus'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Data ticket gagal dihapus'));
        }
    }
}
