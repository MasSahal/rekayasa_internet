-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2022 at 12:30 PM
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
-- Database: `toko_2`
--

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
('KD7430', 'Royco Sapi 10gr', 10000, 100, 'DIS8963', 'ada', '7257-image_2022-06-07_185632592.png'),
('KD9972', 'Gula Pasir murah', 100000, 10, 'DIS8963', 'ada', '5230-image_2022-06-07_185605082.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `no_ref` varchar(30) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `kd_distributor` varchar(10) NOT NULL,
  `jumlah` double NOT NULL,
  `tgl_masuk` date NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`no_ref`, `kd_barang`, `kd_distributor`, `jumlah`, `tgl_masuk`, `penerima`, `ket`, `total`) VALUES
('REF1654603112', 'KD7430', 'DIS4123', 12, '2022-06-07', 'Sahal', '123', 120000);

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
('DIS4123', 'PT JAVA', 'Jl. Dr. Cipto Mangkusumo No 123 Kota Cirebon. Kab. Cirebon, Provinsi: Jawa Barat', '453534213211', '1234512345', 'makanan'),
('DIS8963', 'PT INDOFOOF', 'Bekasi', '21132131', 'SALA', 'Ada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
