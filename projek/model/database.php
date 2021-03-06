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
    function data_distributor($cari = false)
    {
        if ($cari) {
            $query = "SELECT * FROM tbl_distributor WHERE kd_distributor LIKE '%$cari%' OR nm_distributor LIKE '%$cari%' OR pemilik LIKE '%$cari%' OR nohp LIKE '%$cari%' OR tipe_produk LIKE '%$cari%' OR alamat LIKE '%$cari%'";
        } else {
            $query = "SELECT * FROM tbl_distributor";
        }
        return mysqli_query($this->koneksi, $query);
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
    function data_barang($cari = false)
    {
        if ($cari) {
            $cari = $_POST['cari'];
            $query = "SELECT * FROM tbl_barang JOIN tbl_distributor ON tbl_barang.distributor=tbl_distributor.kd_distributor WHERE tbl_barang.kd_barang LIKE '%" . $cari . "%' OR tbl_barang.nm_barang LIKE '%" . $cari . "%'";
        } else {
            $query = "SELECT * FROM tbl_barang JOIN tbl_distributor ON tbl_barang.distributor=tbl_distributor.kd_distributor";
        }

        return mysqli_query($this->koneksi, $query);
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
        if (file_exists("../views/administrator/dokumen/" . $data['foto'])) {
            unlink("../views/administrator/dokumen/" . $data['foto']);
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
    function input_barang_masuk($no_ref, $kd_barang, $kd_distributor, $jumlah, $tgl_masuk, $penerima, $ket, $total, $sisa_stok)
    {
        // query sql insert ke database
        $query = "INSERT INTO tbl_barang_masuk VALUES('$no_ref','$kd_barang','$kd_distributor', '$jumlah', '$tgl_masuk', '$penerima', '$ket', '$total')";

        // eksekusi query
        $insert = mysqli_query($this->koneksi, $query);
        $update = mysqli_query($this->koneksi, "UPDATE tbl_barang SET stok='$sisa_stok' WHERE kd_barang='$kd_barang'");
        if ($insert && $update) {
            return true;
        } else {
            return false;
        }
    }

    # READ ALL DATA
    function data_barang_masuk($dari = false, $sampai = false)
    {
        if ($dari && $sampai) {
            $query = "SELECT * FROM tbl_barang_masuk LEFT JOIN tbl_barang ON tbl_barang_masuk.kd_barang=tbl_barang.kd_barang LEFT JOIN tbl_distributor ON tbl_barang_masuk.kd_distributor=tbl_distributor.kd_distributor WHERE tbl_barang_masuk.tgl_masuk BETWEEN '$dari' AND '$sampai'";
        } else {
            $query = "SELECT * FROM tbl_barang_masuk LEFT JOIN tbl_barang ON tbl_barang_masuk.kd_barang=tbl_barang.kd_barang LEFT JOIN tbl_distributor ON tbl_barang.distributor=tbl_distributor.kd_distributor";
        }
        $result = mysqli_query($this->koneksi, $query);

        return $result;
    }

    function data_barang_keluar($cari = false)
    {
        if ($cari) {
            $query = "SELECT * FROM tbl_barang_keluar JOIN tbl_barang ON tbl_barang_keluar.kd_barang=tbl_barang.kd_barang WHERE tbl_barang.nm_barang LIKE '%$cari%' OR tbl_barang_keluar.jumlah_keluar LIKE '%$cari%' tbl_barang_keluar.petugas LIKE '%$cari%'";
        } else {
            $query = "SELECT * FROM tbl_barang_keluar JOIN tbl_barang ON tbl_barang_keluar.kd_barang=tbl_barang.kd_barang";
        }
        return mysqli_query($this->koneksi, $query);
    }

    function input_barang_keluar($no_ref, $kd_barang, $jumlah, $total, $tanggal_keluar, $petugas, $diskon)
    {
        return mysqli_query($this->koneksi, "insert into tbl_barang_keluar values ('$no_ref', '$kd_barang', '$jumlah', '$total', '$tanggal_keluar', '$petugas', '$diskon')");
    }

    function delete_barang_keluar($no_ref)
    {
        return mysqli_query($this->koneksi, "delete from tbl_barang_keluar where no_ref = '$no_ref'");
    }

    public function tampil_update_barang_keluar($no_ref)
    {
        $query = mysqli_query($this->koneksi, "select * from tbl_barang_keluar JOIN tbl_barang ON tbl_barang_keluar.kd_barang = tbl_barang.kd_barang where no_ref = '$no_ref' ");

        return mysqli_fetch_assoc($query);
    }

    public function update_barang_keluar($no_ref, $kd_barang, $jumlah, $total, $tanggal_keluar, $petugas, $diskon)
    {
        return mysqli_query($this->koneksi, "update tbl_barang_keluar set kd_barang = '$kd_barang', jumlah_keluar = '$jumlah', total_biaya = '$total', tanggal_keluar = '$tanggal_keluar', petugas = '$petugas', diskon = '$diskon' where no_ref = '$no_ref'");
    }


    # CUSTOM FUNCTION
    function rupiah($rupiah)
    {
        return "Rp" . number_format($rupiah, 2, ",", ".");
    }
};
