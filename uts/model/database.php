<?php

class database
{

    var $host = "localhost";
    var $user = "root";
    var $pass = "root";
    var $db   = "20210120016_hotel";

    var $koneksi = "";

    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (!$this->koneksi) {
            die("Koneksi database gagal! : " . mysqli_connect_errno() . " - " . mysqli_connect_error());
        }
    }

    public function insertPengunjung($pengunjung_id, $nama, $telepon, $email, $alamat, $foto = false)
    {
        if ($foto) {
            $query = "INSERT INTO data_pengunjung (pengunjung_id, nama, telepon, email, alamat, foto) VALUES ('$pengunjung_id','$nama', '$telepon','$email','$alamat','$foto')";
        } else {
            $query = "INSERT INTO data_pengunjung (pengunjung_id, nama, telepon, email, alamat, foto) VALUES ('$pengunjung_id','$nama', '$telepon','$email','$alamat','user.jpg')";
        }
        return mysqli_query($this->koneksi, $query);
    }

    public function getPengunjung($id = false)
    {
        if ($id) {
            return mysqli_fetch_array(mysqli_query($this->koneksi, "SELECT * FROM data_pengunjung WHERE pengunjung_id = '$id'"));
        } else {
            return mysqli_query($this->koneksi, "SELECT * FROM data_pengunjung");
        }
    }

    public function updatePengunjung($pengunjung_id, $nama, $telepon, $email, $alamat, $foto = false)
    {
        if ($foto) {
            $query = "UPDATE data_pengunjung SET nama='$nama', telepon='$telepon', email='$email', alamat='$alamat', foto='$foto' WHERE pengunjung_id='$pengunjung_id'";
        } else {
            $query = "UPDATE data_pengunjung SET nama='$nama', telepon='$telepon', email='$email', alamat='$alamat' WHERE pengunjung_id='$pengunjung_id'";
        }
        return mysqli_query($this->koneksi, $query);
    }

    public function deletePengunjung($id = false)
    {
        if ($id) {
            return mysqli_query($this->koneksi, "DELETE FROM data_pengunjung WHERE pengunjung_id='$id'");
        } else {
            return false;
        }
    }


    // ROLE KAMAR
    // Create
    public function insert_kamar($no_kamar, $nama_kamar, $harga_kamar, $foto_kamar, $detail)
    {
        $query = "INSERT INTO data_kamar (no_kamar, nama_kamar, harga_kamar, foto_kamar, detail) VALUES ('$no_kamar','$nama_kamar','$harga_kamar','$foto_kamar','$detail')";
        return mysqli_query($this->koneksi, $query);
    }

    public function getKamar($id = false)
    {
        if ($id) {
            return mysqli_fetch_array(mysqli_query($this->koneksi, "SELECT * FROM data_kamar WHERE kamar_id = '$id'"));
        } else {
            return mysqli_query($this->koneksi, "SELECT * FROM data_kamar");
        }
    }

    public function update_kamar($id_kamar, $no_kamar, $nama_kamar, $harga_kamar,  $detail, $foto_kamar = false)
    {
        if ($foto_kamar) {
            $query = "UPDATE data_kamar SET no_kamar='$no_kamar', nama_kamar='$nama_kamar',harga_kamar='$harga_kamar', detail='$detail',foto_kamar='$foto_kamar' WHERE kamar_id='$id_kamar'";
        } else {
            $query = "UPDATE data_kamar SET no_kamar='$no_kamar', nama_kamar='$nama_kamar',harga_kamar='$harga_kamar', detail='$detail' WHERE kamar_id='$id_kamar'";
        }
        return mysqli_query($this->koneksi, $query);
    }

    public function delete_kamar($kamar_id)
    {
        $query = "DELETE FROM data_kamar WHERE kamar_id = '$kamar_id'";
        return mysqli_query($this->koneksi, $query);
    }

    public function getLastKamar()
    {
        return mysqli_fetch_array(mysqli_query($this->koneksi, "SELECT * FROM data_kamar ORDER BY kamar_id DESC LIMIT 1"));
    }


    // ROLE RESERVASI
    // Create
    public function insertReservasi($reservasi, $pengunjung_id, $kamar_id,)
    {
    }

    public function getReservasi($id = false)
    {
        if ($id) {
            $query = "SELECT * FROM data_reservasi JOIN data_kamar ON data_reservasi.kamar_id = data_kamar.kamar_id JOIN data_pengunjung ON data_reservasi.pengunjung_id = data_pengunjung.pengunjung_id WHERE reservasi_id = '$id'";
            return mysqli_fetch_array(mysqli_query($this->koneksi, $query));
        } else {
            $query = "SELECT * FROM data_reservasi JOIN data_kamar ON data_reservasi.kamar_id = data_kamar.kamar_id JOIN data_pengunjung ON data_reservasi.pengunjung_id = data_pengunjung.pengunjung_id";
            return mysqli_query($this->koneksi, $query);
        }
    }

    public function deleteReservasi($id = false)
    {
        return mysqli_query($this->koneksi, "DELETE FROM data_reservasi WHERE reservasi_id='$id'");
    }


    public function harga($price)
    {
        return "Rp." . number_format($price, 2, ',', '.');
    }

    public function dd($data)
    {
        return die(var_dump($data));
    }

    public function days($a, $z)
    {
        $awal = strtotime($a);
        $akhir = strtotime($z);
        $datediff = $awal - $akhir;

        return round($datediff / (60 * 60 * 24));
    }
}
