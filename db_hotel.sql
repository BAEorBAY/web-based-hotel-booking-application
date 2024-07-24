-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 08:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Yami', 'cody Rhodes', '123'),
(5, 'Hilmi', 'sang Atmin', 'atmin sudah datang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_kamar`
--

CREATE TABLE `tbl_jenis_kamar` (
  `id_kamar` int(50) NOT NULL,
  `jenis_kamar` varchar(50) NOT NULL,
  `harga` int(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_kamar`
--

INSERT INTO `tbl_jenis_kamar` (`id_kamar`, `jenis_kamar`, `harga`, `keterangan`) VALUES
(1, 'Superior Room', 1500000, 'memiliki fasilitas, seperti tempat tidur, AC, TV, perlengkapan mandi, dan air minum.'),
(2, 'Standard Room', 800000, 'memiliki fasilitas, seperti tempat tidur, AC, TV, perlengkapan mandi, dan air minum. ukuran kasur yang disediakan oleh Standard Room model single bed, queen size'),
(10, 'Deluxe Room', 1800000, 'sangat mewah sekali'),
(15, 'VIP', 1000000, 'bagus sekali');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyewa`
--

CREATE TABLE `tbl_penyewa` (
  `id_sewa` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `no_identitas` int(20) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penyewa`
--

INSERT INTO `tbl_penyewa` (`id_sewa`, `id_kamar`, `nama`, `checkin`, `checkout`, `no_identitas`, `no_hp`, `id_admin`, `jumlah`, `total`) VALUES
(1, 1, 'cody rhodes the goat', '2024-05-28', '2024-06-03', 69999, 8312323, 1, 2, 18000000),
(15, 8, 'gaylih', '2024-05-28', '2024-05-31', 69999, 2147483647, 1, 3, 3000000),
(23, 2, 'Roman Reigns', '2024-06-03', '2024-06-06', 1345, 89629281, 1, 2, 4800000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_jenis_kamar`
--
ALTER TABLE `tbl_jenis_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tbl_penyewa`
--
ALTER TABLE `tbl_penyewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_jenis_kamar`
--
ALTER TABLE `tbl_jenis_kamar`
  MODIFY `id_kamar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_penyewa`
--
ALTER TABLE `tbl_penyewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_penyewa`
--
ALTER TABLE `tbl_penyewa`
  ADD CONSTRAINT `tbl_penyewa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
