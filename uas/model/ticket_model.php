<?php

include_once('database.php');

class ticket extends database
{
    function get_ticket($id = false)
    {
        if ($id) {
            return mysqli_fetch_assoc(mysqli_query($this->koneksi, "SELECT * FROM data_tickets WHERE id_ticket = '$id' LIMIT 1"));
        } else {
            return mysqli_query($this->koneksi, "SELECT * FROM data_tickets");
        }
    }

    function get_ticket_join_event($id = false)
    {
        if ($id) {
            $query = "SELECT * FROM data_tickets JOIN data_event ON data_tickets.id_event = data_event.id_event WHERE data_tickets.id_event = '$id'";
            return mysqli_query($this->koneksi, $query);
        } else {
            $query = "SELECT * FROM data_tickets JOIN data_event ON data_tickets.id_event = data_event.id_event";
            return mysqli_query($this->koneksi, $query);
        }
    }

    function get_ticket_actived()
    {
        $query = "SELECT * FROM data_tickets JOIN data_event ON data_tickets.id_event = data_event.id_event WHERE data_tickets.expired_ticket >= CURDATE() AND data_tickets.jumlah_ticket > 0";
        return mysqli_query($this->koneksi, $query);
    }

    function insert_ticket($id_event, $jenis_ticket, $detail_ticket, $expired_ticket, $jumlah_ticket, $harga_ticket)
    {
        $query = "INSERT INTO data_tickets (id_event, jenis_ticket, detail_ticket, expired_ticket, jumlah_ticket, harga_ticket) VALUES ('$id_event', '$jenis_ticket', '$detail_ticket', '$expired_ticket', '$jumlah_ticket', '$harga_ticket')";
        return mysqli_query($this->koneksi, $query);
    }

    function update_ticket($id_ticket, $jenis_ticket, $detail_ticket, $expired_ticket, $jumlah_ticket, $harga_ticket)
    {
        $query = "UPDATE data_tickets SET jenis_ticket = '$jenis_ticket', detail_ticket = '$detail_ticket', expired_ticket = '$expired_ticket', jumlah_ticket = '$jumlah_ticket', harga_ticket = '$harga_ticket' WHERE id_ticket = '$id_ticket'";
        return mysqli_query($this->koneksi, $query);
    }

    function delete_ticket($id)
    {
        $query = "DELETE FROM data_tickets WHERE id_ticket = '$id'";
        return mysqli_query($this->koneksi, $query);
    }
}
