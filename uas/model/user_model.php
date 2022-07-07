<?php

include('database.php');

class user extends database
{
    function get_user($id = false)
    {
        if ($id) {
            return mysqli_fetch_assoc(mysqli_query($this->koneksi, "SELECT * FROM data_user WHERE id_user = '$id' LIMIT 1"));
        } else {
            return mysqli_query($this->koneksi, "SELECT * FROM data_user");
        }
    }

    function insert_user($fullname, $username, $password, $profile, $no_hp, $alamat, $role)
    {
        $query = "INSERT INTO data_user (fullname, username, password, profile, no_hp, alamat, role) VALUES ('$fullname', '$username', '$password', '$profile', '$no_hp', '$alamat', '$role')";
        return mysqli_query($this->koneksi, $query);
    }

    function update_user($id, $fullname, $username, $password, $profile, $no_hp, $alamat, $role)
    {
        $query = "UPDATE data_user SET fullname = '$fullname', username = '$username', password = '$password', profile = '$profile', no_hp = '$no_hp', alamat = '$alamat', role = '$role' WHERE id_user = '$id'";
        return mysqli_query($this->koneksi, $query);
    }

    function delete_user($id)
    {
        $query = "DELETE FROM data_user WHERE id_user = '$id'";
        return mysqli_query($this->koneksi, $query);
    }
}
