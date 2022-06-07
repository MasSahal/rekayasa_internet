-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 03:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `no_ref` int(11) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `kd_distributor` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `penerima` varchar(15) NOT NULL,
  `ket` text NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brg_masuk`
--

INSERT INTO `brg_masuk` (`no_ref`, `kd_barang`, `kd_distributor`, `jumlah`, `tgl_masuk`, `penerima`, `ket`, `total`) VALUES
(121, '5367', 'DA123', 0, '2022-06-02', 'ds', 'dscds', 117000000),
(131, '5367', 'DA123', 0, '2022-06-02', 'wwdwe', 'wdwed', 6500000),
(3432, '5367', 'DA123', 0, '2022-06-09', '', '', 15500000);

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
('123', 'wqd', 312, 132, '312', 'qwe', '6051-177592.jpg');

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
('312', 'dasd', 'qwdq', '3123', 'qdqw', 'qwd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`no_ref`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`kd_distributor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
