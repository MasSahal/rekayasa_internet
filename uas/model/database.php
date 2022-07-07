<?php
class database
{

    var $host = "localhost";
    var $user = "root";
    var $pass = "root";
    var $name = "projek_uas";

    var $koneksi = "";

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->name);

        if (!$this->koneksi) {
            die("Koneksi database gagal! : " . mysqli_connect_errno() . " - " . mysqli_connect_error());
        }
    }

    function login($username, $password)
    {
        $query = "SELECT * FROM data_user WHERE username = '$username' AND password = '$password' LIMIT 1";
        return mysqli_fetch_assoc(mysqli_query($this->koneksi, $query));
    }
}
