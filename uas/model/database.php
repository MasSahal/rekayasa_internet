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
        //set default timezone
        date_default_timezone_set("asia/jakarta");
    }

    function login($username)
    {
        $query = "SELECT * FROM data_user WHERE username = '$username' LIMIT 1";
        return mysqli_fetch_assoc(mysqli_query($this->koneksi, $query));
    }

    function query($query, $fetch = false)
    {
        if ($fetch) {
            return mysqli_fetch_assoc(mysqli_query($this->koneksi, $query));
        } else {
            return mysqli_query($this->koneksi, $query);
        }
    }

    //helper
    function tanggal($tanggal, $day = true)
    {

        $tanggal = date('d-m-Y', strtotime($tanggal));
        $hari = array(
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $split       = explode('-', $tanggal);
        $tgl_indo = $split[0] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[2];

        $num = date('N', strtotime($tanggal)); // retrun int dari hari 1=senin as default
        if ($day) {
            return $hari[$num] . ', ' . $tgl_indo;
        } else {
            return $tgl_indo;
        }
    }

    function clock($tanggal, $pemisah = ":")
    {
        return date('H' . $pemisah . 'i', strtotime($tanggal));
    }
}
