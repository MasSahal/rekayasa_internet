<?php

include_once('database.php');

class transaksi extends database
{
    function get_transaksi($id = false)
    {
        if ($id) {
            return mysqli_fetch_assoc(mysqli_query($this->koneksi, "SELECT * FROM data_transaksi JOIN data_tickets ON data_transaksi.id_ticket=data_tickets.id_ticket JOIN data_user ON data_transaksi.id_user=data_user.id_user JOIN data_event ON data_tickets.id_event=data_event.id_event WHERE id_transaksi = '$id' LIMIT 1"));
        } else {
            return mysqli_query($this->koneksi, "SELECT * FROM data_transaksi JOIN data_tickets ON data_transaksi.id_ticket=data_tickets.id_ticket JOIN data_user ON data_transaksi.id_user=data_user.id_user JOIN data_event ON data_tickets.id_event=data_event.id_event");
        }
    }

    function get_my_transaksi($id_user)
    {
        return (mysqli_query($this->koneksi, "SELECT * FROM data_transaksi JOIN data_tickets ON data_transaksi.id_ticket=data_tickets.id_ticket JOIN data_user ON data_transaksi.id_user=data_user.id_user JOIN data_event ON data_tickets.id_event=data_event.id_event WHERE data_user.id_user = '$id_user'"));
    }

    function periode_transaksi($awal, $akhir)
    {
        return mysqli_query($this->koneksi, "SELECT * FROM data_transaksi JOIN data_tickets ON data_transaksi.id_ticket=data_tickets.id_ticket JOIN data_user ON data_transaksi.id_user=data_user.id_user JOIN data_event ON data_tickets.id_event=data_event.id_event WHERE created_transaksi BETWEEN '$awal' AND '$akhir'");
    }

    function get_voucher_join_event($id = false)
    {
        if ($id) {
            $query = "SELECT * FROM data_vouchers JOIN data_event ON data_vouchers.id_event = data_event.id_event WHERE data_vouchers.id_event = '$id'";
            return mysqli_query($this->koneksi, $query);
        } else {
            $query = "SELECT * FROM data_vouchers JOIN data_event ON data_vouchers.id_event = data_event.id_event";
            return mysqli_query($this->koneksi, $query);
        }
    }

    function get_voucher_actived()
    {
        $query = "SELECT * FROM data_vouchers WHERE data_vouchers.expired_voucher >= CURDATE() AND data_vouchers.jumlah_voucher > 0";
        return mysqli_query($this->koneksi, $query);
    }

    function insert_transaksi($no_ref, $id_ticket, $id_user, $qty, $id_voucher, $status_transaksi)
    {
        // $no_ref = "REF" . time();
        $query = "INSERT INTO data_transaksi (no_ref, id_ticket, id_user, qty, id_voucher, status_transaksi) VALUES ('$no_ref','$id_ticket', '$id_user', '$qty', '$id_voucher', '$status_transaksi')";
        // var_dump($query);
        // die;
        return mysqli_query($this->koneksi, $query);
    }

    function update_voucher($id_voucher, $nama_voucher, $kode_voucher, $besaran_voucher, $jenis_voucher, $expired_voucher, $jumlah_voucher)
    {
        $query = "UPDATE data_vouchers SET nama_voucher = '$nama_voucher', kode_voucher = '$kode_voucher', besaran_voucher = '$besaran_voucher', jenis_voucher = '$jenis_voucher', expired_voucher = '$expired_voucher', jumlah_voucher = '$jumlah_voucher' WHERE id_voucher = '$id_voucher'";
        return mysqli_query($this->koneksi, $query);
    }

    function delete_voucher($id)
    {
        if (is_array($id)) {
            $query = "DELETE FROM data_vouchers WHERE id_voucher IN (" . implode(',', $id) . ")";
        } else {
            $query = "DELETE FROM data_vouchers WHERE id_voucher = '$id'";
        }
        return mysqli_query($this->koneksi, $query);
    }

    function lunas_transaksi($id)
    {
        return mysqli_query($this->koneksi, "UPDATE data_transaksi SET status_transaksi = 'Lunas' WHERE no_ref = '$id'");
    }

    function cari_transaksi($cari)
    {
        return mysqli_query($this->koneksi, "SELECT * FROM data_transaksi JOIN data_tickets ON data_transaksi.id_ticket=data_tickets.id_ticket JOIN data_user ON data_transaksi.id_user=data_user.id_user JOIN data_event ON data_tickets.id_event=data_event.id_event WHERE nama_user LIKE '%$cari%' OR nama_event LIKE '%$cari%' OR nama_ticket LIKE '%$cari%' OR no_ref LIKE '%$cari%' OR status_transaksi LIKE '%$cari%'");
    }
}
