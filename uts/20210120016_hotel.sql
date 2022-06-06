-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2022 at 11:32 PM
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
-- Database: `20210120016_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kamar`
--

CREATE TABLE `data_kamar` (
  `kamar_id` int(11) NOT NULL,
  `no_kamar` varchar(10) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `foto_kamar` varchar(100) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kamar`
--

INSERT INTO `data_kamar` (`kamar_id`, `no_kamar`, `nama_kamar`, `harga_kamar`, `foto_kamar`, `detail`) VALUES
(1, '0001', 'Standard Room', 250000, '1652916061-Standard-Room.png', 'Fasilitas umum tersedia '),
(2, '0002', 'Premium Room', 600000, '1652916114-Premium-Room.png', 'Tersedia sarapan dan ruang Gym'),
(3, '0003', 'Deluxe Room', 850000, '1652916161-Deluxe-Room.png', 'fasilitas10 in 1'),
(4, '0004', 'Super VIP Room', 1250000, '1652916210-Super-VIP-Room.png', 'All in one'),
(5, '0005', 'Guest Room', 150000, '1652916271-Guest-Room.png', 'For guest');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengunjung`
--

CREATE TABLE `data_pengunjung` (
  `pengunjung_id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`pengunjung_id`, `nama`, `telepon`, `email`, `alamat`, `foto`, `created_at`) VALUES
('ID-189071', 'Danuartha', '08652112', 'danu@mail.com', 'Tegal', '1652915978-Danuartha.png', '2022-05-19 06:19:38'),
('ID-961178', 'Sahal', '085795567542', 'sahal123@mail.com', 'Gn Jati, Cirebon', '1652915572-Sahal.jpg', '2022-05-19 06:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `data_reservasi`
--

CREATE TABLE `data_reservasi` (
  `reservasi_id` varchar(20) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `pengunjung_id` varchar(20) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_reservasi`
--

INSERT INTO `data_reservasi` (`reservasi_id`, `kamar_id`, `pengunjung_id`, `check_in`, `check_out`, `total_biaya`, `created_at`) VALUES
('RSV-1375115', 2, 'ID-961178', '2022-05-20', '2022-05-22', 1200000, '2022-05-19 06:26:12'),
('RSV-8685032', 1, 'ID-189071', '2022-05-19', '2022-05-23', 1000000, '2022-05-19 06:26:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kamar`
--
ALTER TABLE `data_kamar`
  ADD PRIMARY KEY (`kamar_id`);

--
-- Indexes for table `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- Indexes for table `data_reservasi`
--
ALTER TABLE `data_reservasi`
  ADD PRIMARY KEY (`reservasi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kamar`
--
ALTER TABLE `data_kamar`
  MODIFY `kamar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
