-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2022 at 04:58 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `umur`) VALUES
(1, 'Sahal', 'saha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kd_barang` varchar(15) NOT NULL,
  `nm_barang` varchar(40) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `distributor` varchar(40) NOT NULL,
  `ket` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nm_barang`, `harga`, `stok`, `distributor`, `ket`, `foto`) VALUES
('KD8489', 'Kecap', 4000, 100, 'DD9549', 'ok', '5902-image_2022-06-07_223010024.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `no_ref` varchar(30) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `jumlah_keluar` int(10) NOT NULL,
  `total_biaya` double NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`no_ref`, `kd_barang`, `jumlah_keluar`, `total_biaya`, `tanggal_keluar`, `petugas`, `diskon`) VALUES
('REFO1654615942', 'KD8489', 100, 200000, '2022-06-01', 'Sahal', 50),
('REFO1654616495', 'KD7693', 100, 5000000, '2022-06-07', 'Salman', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `no_ref` varchar(20) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `kd_distributor` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`no_ref`, `kd_barang`, `kd_distributor`, `jumlah`, `tgl_masuk`, `penerima`, `ket`, `total`) VALUES
('ID1654482622', 'KD3789', 'DD2332', 10, '2022-06-14', '10', '100', 1070000),
('ID1654482861', 'KD4755', 'DD2332', 100, '2022-06-02', 'sahal', 'ok', 1000000),
('ID1654615295', 'KD4755', 'DD2332', 100, '2022-06-01', 'sahal', 'ok', 1000000),
('ID1655095107', 'KD8489', 'DD1231', 100, '2022-06-01', 'sahal', 'oke', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor`
--

CREATE TABLE `tbl_distributor` (
  `kd_distributor` varchar(15) NOT NULL,
  `nm_distributor` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `pemilik` varchar(30) NOT NULL,
  `tipe_produk` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_distributor`
--

INSERT INTO `tbl_distributor` (`kd_distributor`, `nm_distributor`, `alamat`, `nohp`, `pemilik`, `tipe_produk`) VALUES
('DB1231', 'PT JAVA', 'Cirtim\r\n', '034242', 'Kang Yayan', 'Makanan'),
('DD1231', 'PT Gulaku Indonesia', 'Bekasi', '23432', 'Hans', 'null'),
('DD2332', 'CV Adiyana Prakarsa', 'Jakarta', '020342', 'Suhendi', 'Makanan'),
('DD7563', 'Indofood', 'Bekasi', '023453', 'Hartono', 'null'),
('DD9549', 'Wingsfood', 'Tanggerang', '02342', 'Bans', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nm_user`, `status`) VALUES
(1, 'sahal', 'sahal', 'Mas Sahal', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`no_ref`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`no_ref`);

--
-- Indexes for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`kd_distributor`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
