<?php
class Database
{

    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $db = "toko";
    var $koneksi = "";

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    }

    //  Data Barang

    function input_barang($kd_barang, $nm_barang, $harga, $stok, $distributor, $ket, $foto_baru)
    {
        mysqli_query($this->koneksi, "insert into tbl_barang values ('$kd_barang','$nm_barang', '$harga', '$stok', '$distributor', '$ket', '$foto_baru')");
    }

    function data_barang()
    {
        $data_barang = mysqli_query($this->koneksi, "select tbl_barang.*, tbl_distributor.* from tbl_barang JOIN tbl_distributor ON tbl_barang.distributor = tbl_distributor.kd_distributor");
        // while ($row = mysqli_fetch_array($data_barang)) {
        //     $hasil_barang[] = $row;
        // }
        return $data_barang;
    }

    function tampil_update_barang($kd_barang)
    {
        $query = mysqli_query($this->koneksi, "select * from tbl_barang where kd_barang = '$kd_barang' ");
        return $query->fetch_array();
    }

    function update_barang($kd_barang, $nm_barang, $harga, $stok, $distributor, $ket, $foto_baru)
    {
        $query = mysqli_query($this->koneksi, "update tbl_barang set nm_barang='$nm_barang', harga='$harga', stok='$stok', distributor='$distributor', ket='$ket', foto='$foto_baru' where kd_barang='$kd_barang'");
        return $query;
    }

    function delete_barang($kd_barang)
    {
        $dok = mysqli_query($this->koneksi, "select * from tbl_barang where kd_barang = '$kd_barang' ");
        $data_file = $dok->fetch_array();
        unlink('dokumen/' . $data_file['foto']);

        $query = mysqli_query($this->koneksi, "delete from tbl_barang where kd_barang = '$kd_barang'");
    }


    // Distributor

    function input_distributor($kd_distributor, $nm_distributor, $alamat, $nohp, $pemilik, $tipe_produk)
    {
        mysqli_query($this->koneksi, "insert into tbl_distributor values ('$kd_distributor','$nm_distributor', '$alamat', '$nohp', '$pemilik', '$tipe_produk')");
    }

    function data_distributor()
    {
        $data_distributor = mysqli_query($this->koneksi, "select * from tbl_distributor");
        // while ($row = mysqli_fetch_array($data_distributor)) {
        //     $hasil_distributor[] = $row;
        // }
        return $data_distributor;
    }

    function tampil_update_distributor($kd_distributor)
    {
        $query = mysqli_query($this->koneksi, "select * from tbl_distributor where kd_distributor = '$kd_distributor' ");
        return $query->fetch_array();
    }

    function update_distributor($kd_distributor, $nm_distributor, $alamat, $nohp, $pemilik, $tipe_produk)
    {
        $query = mysqli_query($this->koneksi, "update tbl_distributor set nm_distributor='$nm_distributor', alamat='$alamat', nohp='$nohp', pemilik='$pemilik', tipe_produk='$tipe_produk' where kd_distributor='$kd_distributor'");
        return $query;
    }

    function delete_distributor($kd_distributor)
    {
        $dok = mysqli_query($this->koneksi, "select * from tbl_distributor where kd_distributor = '$kd_distributor' ");
        $data_file = $dok->fetch_array();

        $query = mysqli_query($this->koneksi, "delete from tbl_distributor where kd_distributor = '$kd_distributor'");
    }

    //  Data Barang Masuk

    function data_barang_masuk()
    {
        $data_barang_masuk = mysqli_query($this->koneksi, "select * from brg_masuk.*, tbl_barang.*, tbl_distributor.* fro brg_masuk JOIN tbl_barang ON brg_masuk.kd_barang = tbl_barang.kd_barang JOIN tbl_distributor ON brg_masuk.kd_distributor = tbl_distributor.kd_distributor");
        while ($row = mysqli_fetch_array($data_barang_masuk)) {
            $hasil_barang_masuk[] = $row;
        }
        return $hasil_barang_masuk;
    }

    function input_barang_masuk($no_ref, $kd_barang, $kd_distributor, $jumlah, $tgl_masuk, $penerima, $ket, $total)
    {
        mysqli_query($this->koneksi, "insert into brg_masuk values ('$no_ref', '$kd_barang', '$kd_distributor', '$jumlah', '$tgl_masuk', '$penerima', '$ket', '$total')");
    }
}