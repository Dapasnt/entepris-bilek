-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 07:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `kode_bhnbaku` int(4) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `tanggal_bahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`kode_bhnbaku`, `nama_bahan`, `tanggal_bahan`) VALUES
(2222, 'Gula', '2024-08-21'),
(3333, 'Ragi', '2024-07-18'),
(4444, 'Tepung', '2025-07-29'),
(5555, 'Telur', '2024-03-01'),
(6666, 'Selai Coklat', '2025-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_jadi`
--

CREATE TABLE `bahan_jadi` (
  `kode_bahanjadi` int(4) NOT NULL,
  `nama_produksi` varchar(50) NOT NULL,
  `tanggal_produksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan_jadi`
--

INSERT INTO `bahan_jadi` (`kode_bahanjadi`, `nama_produksi`, `tanggal_produksi`) VALUES
(111, 'roti', '2023-10-01'),
(222, 'donat', '2023-10-02'),
(333, 'lapis', '2023-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `kode_ekspedisi` int(4) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`kode_ekspedisi`, `nama_barang`, `alamat`, `hp`) VALUES
(100, 'Bolu', 'Jl.Melati No.20 Pekalongan', '089763561286'),
(105, 'Donat', 'Jl.Mawar No.6 Pekalongan', '088586543721'),
(120, 'Lapis', 'Jl.Sekar No.90 Pekalongan', '085432876490');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `kode_pemasok` int(4) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`kode_pemasok`, `nama_barang`, `tanggal_masuk`) VALUES
(124, 'Telor', '2023-11-02'),
(125, 'Gula', '2023-11-03'),
(126, 'Ragi', '2023-11-04'),
(127, 'Selai', '2023-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_user` int(3) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass_user` varchar(20) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_user`, `first_name`, `last_name`, `email`, `pass_user`, `deleted_at`) VALUES
(1, 'produksi', 'roti', 'produksiroti@gmail.com', 'roti123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`kode_bhnbaku`);

--
-- Indexes for table `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  ADD PRIMARY KEY (`kode_bahanjadi`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`kode_ekspedisi`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`kode_pemasok`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `kode_bhnbaku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6667;

--
-- AUTO_INCREMENT for table `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  MODIFY `kode_bahanjadi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12222223;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `kode_ekspedisi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12223;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
