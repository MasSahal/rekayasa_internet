<?php

include_once('database.php');

class voucher extends database
{
    function get_voucher($id = false)
    {
        if ($id) {
            return mysqli_fetch_assoc(mysqli_query($this->koneksi, "SELECT * FROM data_vouchers WHERE id_voucher = '$id' LIMIT 1"));
        } else {
            return mysqli_query($this->koneksi, "SELECT * FROM data_vouchers");
        }
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

    function insert_voucher($nama_voucher, $kode_voucher, $besaran_voucher, $jenis_voucher, $expired_voucher, $jumlah_voucher)
    {
        $query = "INSERT INTO data_vouchers (nama_voucher, kode_voucher, besaran_voucher, jenis_voucher, expired_voucher, jumlah_voucher) VALUES ('$nama_voucher', '$kode_voucher', '$besaran_voucher', '$jenis_voucher', '$expired_voucher', '$jumlah_voucher')";
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
}
