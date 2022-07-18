<?php

include_once('database.php');

class event extends database
{
    function get_event($id = false)
    {
        if ($id) {
            return mysqli_fetch_assoc(mysqli_query($this->koneksi, "SELECT * FROM data_event WHERE id_event = '$id' LIMIT 1"));
        } else {
            return mysqli_query($this->koneksi, "SELECT * FROM data_event");
        }
    }

    function cari_event($cari)
    {
        return mysqli_query($this->koneksi, "SELECT * FROM data_event WHERE nama_event LIKE '%$cari%' OR detail_event LIKE '%$cari%' OR tanggal_event LIKE '%$cari%' OR lokasi_event LIKE '%$cari%'");
    }

    function insert_event($nama_event, $detail_event, $banner_event, $tanggal_event, $jam_event, $lokasi_event, $gmap_event)
    {
        $query = "INSERT INTO data_event (nama_event, detail_event, banner_event, tanggal_event, jam_event, lokasi_event, gmap_event) VALUES ('$nama_event', '$detail_event', '$banner_event', '$tanggal_event', '$jam_event', '$lokasi_event', '$gmap_event')";
        return mysqli_query($this->koneksi, $query);
    }

    function update_event($id_event, $nama_event, $detail_event, $banner_event, $tanggal_event, $jam_event, $lokasi_event, $gmap_event)
    {
        $query = "UPDATE data_event SET nama_event = '$nama_event', detail_event = '$detail_event', banner_event = '$banner_event', tanggal_event = '$tanggal_event', jam_event = '$jam_event', lokasi_event = '$lokasi_event', gmap_event = '$gmap_event' WHERE id_event = '$id_event'";
        return mysqli_query($this->koneksi, $query);
    }

    function delete_event($id)
    {
        if (is_array($id)) {
            $query = " DELETE FROM data_event WHERE id_event IN (" . implode(',', $id) . ")";
        } else {
            $query = "DELETE FROM data_event WHERE id_event = '$id'";
        }
        return mysqli_query($this->koneksi, $query);
    }
}
