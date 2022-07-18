<?php
require('../vendor/autoload.php');
include_once('../model/ticket_model.php');
include_once('../model/transaksi_model.php');


$db = new transaksi;
$db2 = new ticket;

if (isset($_GET['mod'])) {

    $mod = $_GET['mod'];
    if ($mod == "insert") {

        $id_ticket = $_POST['id_ticket'];
        $id_user = $_POST['id_user'];
        $qty = $_POST['qty'];
        $id_voucher = $_POST['id_voucher'] ?? null;
        $status_transaksi = "unpaid";


        // var_dump(array(
        //     $id_ticket,
        //     $id_user,
        //     $qty,
        //     $id_voucher,
        //     $status_transaksi
        // ));

        $add = $db->insert_transaksi(
            "REF" . time(),
            $id_ticket,
            $id_user,
            $qty,
            $id_voucher,
            $status_transaksi
        );

        //kurangi stok
        $old_qty = $db2->get_ticket($id_ticket);
        $jumlah_baru = $old_qty['jumlah_ticket'] - $qty;
        $db2->update_ticket_qty($id_ticket, $jumlah_baru);

        if ($add) {
            echo json_encode(array('status' => 'success', 'message' => 'Transaksi berhasil dibuat!'));
            header("location:../user/data_tickets.php");
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Transaksi gagal dibuat!'));
            header("location:../user/data_tickets.php");
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
    } elseif ($mod == "lunas") {
        $id = $_POST['id'];
        $delete = $db->lunas_transaksi($id);
        if ($delete) {
            echo json_encode(array('status' => 'success', 'message' => 'Data ticket berhasil dihapus'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Data ticket gagal dihapus'));
        }
    }
}
