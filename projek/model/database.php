<?php

class database
{

    var $host = "localhost";
    var $user = "root";
    var $pass = "root";
    var $db   = "toko";

    var $koneksi = "";

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (!$this->koneksi) {
            die("Koneksi database gagal! : " . mysqli_connect_errno() . " - " . mysqli_connect_error());
        }
    }


    // ======  ROLE BARANG ======

    # CREATE
    function input_distributor($kd_distributor, $nm_distributor, $alamat, $nohp, $pemilik, $tipe_produk)
    {
        // query sql insert ke database
        $query = "INSERT INTO tbl_distributor VALUES('$kd_distributor','$nm_distributor','$alamat', '$nohp', '$pemilik', '$tipe_produk')";

        // eksekusi query
        $insert = mysqli_query($this->koneksi, $query);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    # READ ALL DATA
    function data_distributor()
    {
        $data_distributor = mysqli_query($this->koneksi, "SELECT * FROM tbl_distributor");
        while ($row = mysqli_fetch_array($data_distributor)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    # READ
    function tampil_update_distributor($kd_distributor)
    {
        $data_distributor = mysqli_query($this->koneksi, "SELECT * FROM tbl_distributor where kd_distributor='$kd_distributor'");
        $hasil = mysqli_fetch_array($data_distributor);

        return $hasil;
    }

    # UPDATE
    function update_distributor($kd_distributor, $nm_distributor, $alamat, $nohp, $pemilik, $tipe_produk)
    {
        // query sql insert ke database
        $query = "UPDATE tbl_distributor SET nm_distributor='$nm_distributor',alamat='$alamat', nohp='$nohp', pemilik='$pemilik', tipe_produk='$tipe_produk' WHERE kd_distributor='$kd_distributor'";

        // eksekusi query
        $update = mysqli_query($this->koneksi, $query);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    # DELETE
    function delete_distributor($kd_distributor)
    {

        $query = "DELETE FROM tbl_distributor WHERE kd_distributor='$kd_distributor'";
        $delete = mysqli_query($this->koneksi, $query);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }



    // ======  ROLE BARANG ======

    # CREATE
    function input_barang($kd_barang, $nm_barang, $harga, $stok, $distributor, $ket, $foto_baru)
    {
        // query sql insert ke database
        $query = "INSERT INTO tbl_barang VALUES('$kd_barang','$nm_barang','$harga', '$stok', '$distributor', '$ket', '$foto_baru')";

        // eksekusi query
        $insert = mysqli_query($this->koneksi, $query);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    # READ ALL DATA
    function data_barang()
    {
        $query = "SELECT * FROM tbl_barang JOIN tbl_distributor ON tbl_barang.distributor=tbl_distributor.kd_distributor";
        // $data_barang = mysqli_query($this->koneksi, "SELECT * FROM tbl_barang");
        $data_barang = mysqli_query($this->koneksi, $query);

        // die(var_dump($data_barang));
        while ($row = mysqli_fetch_array($data_barang)) {
            $hasil[] = $row;
        }
        return $data_barang;
        // return $hasil;
    }

    # READ
    function tampil_update_barang($kd_barang)
    {
        $data_barang = mysqli_query($this->koneksi, "SELECT * FROM tbl_barang where kd_barang='$kd_barang'");
        $hasil = mysqli_fetch_array($data_barang);

        return $hasil;
    }

    # UPDATE
    function update_barang($kd_barang, $nm_barang, $harga, $stok, $distributor, $ket)
    {
        // query sql insert ke database
        $query = "UPDATE tbl_barang SET nm_barang='$nm_barang', harga='$harga', stok='$stok', distributor='$distributor', ket='$ket' WHERE kd_barang='$kd_barang'";

        // eksekusi query
        $update = mysqli_query($this->koneksi, $query);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    # DELETE
    function delete_barang($kd_barang)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tbl_barang WHERE kd_barang='$kd_barang'")->fetch_array();
        // die(var_dump($data));
        if (file_exists("../dokumen/" . $data['foto'])) {
            unlink("../dokumen/" . $data['foto']);
        }

        $query = "DELETE FROM tbl_barang WHERE kd_barang='$kd_barang'";
        $delete = mysqli_query($this->koneksi, $query);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }


    // ======  ROLE BARANG MASUK ======

    # CREATE
    function input_barang_masuk($no_ref, $kd_barang, $kd_distributor, $jumlah, $tgl_masuk, $penerima, $ket, $total)
    {
        // query sql insert ke database
        $query = "INSERT INTO tbl_barang_masuk VALUES('$no_ref','$kd_barang','$kd_distributor', '$jumlah', '$tgl_masuk', '$penerima', '$ket', '$total')";

        // eksekusi query
        $insert = mysqli_query($this->koneksi, $query);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    # READ ALL DATA
    function data_barang_masuk()
    {
        $query = "SELECT * FROM tbl_barang_masuk JOIN tbl_barang ON tbl_barang_masuk.kd_barang=tbl_barang.kd_barang JOIN tbl_distributor ON tbl_barang.distributor=tbl_distributor.kd_distributor";
        $result = mysqli_query($this->koneksi, $query);

        return $result;
    }




    # CUSTOM FUNCTION
    function rupiah($rupiah)
    {
        return "Rp" . number_format($rupiah, 2, ",", ".");
    }
};
