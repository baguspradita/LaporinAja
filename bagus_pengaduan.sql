-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 01:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bagus_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(2, 'Jalananan'),
(4, 'Kebersihan'),
(5, 'Lalulintas'),
(6, 'Kejahatan');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `active` enum('active','suspended') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `telepon`, `active`) VALUES
(14, 2147483647, 'Yantokkkk', 'yanto', '$2y$10$cNXMIP8ZB1ed0pmZ.ifD4.9TEtkzLhEnr8ppAUgDNgP9ZNWicIQdi', '345345435646', 'active'),
(16, 345667767, 'Basna', 'basna', '$2y$10$dZaWzRPLirQGegMPdXQH9.2dFlJVSAh0CI3WdkfG3GwaJn1BKrykC', '545456425253', 'suspended'),
(17, 123, 'asep', 'asep', '$2y$10$ekyXKhW67V2Cyazph2EZ6eW.KKTb6msiuqAEKUqVWLCGedmyO8a4G', '123', 'active'),
(18, 1233445654, 'Eko', 'eko', '$2y$10$NdZlm9uINjEtkZRk589rGOHlmNgkdPHVrHZSgOTm7xndz2ovNLcpC', '7676664', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `notif_id` int(11) NOT NULL,
  `id_masyarakat` int(128) NOT NULL,
  `notif_id_pengaduan` int(11) NOT NULL,
  `read_status` enum('0','read') NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`notif_id`, `id_masyarakat`, `notif_id_pengaduan`, `read_status`, `time`) VALUES
(5, 14, 49, '0', '2023-03-08 14:05:35'),
(6, 18, 50, '0', '2023-03-08 14:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tanggal_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `subkategori` varchar(128) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tanggal_pengaduan`, `nik`, `kategori`, `subkategori`, `isi_laporan`, `foto`, `status`) VALUES
(49, '2023-03-08', '2147483647', '2', '33', ' sedang dicari', 'dimsum.PNG', 'selesai'),
(50, '2023-03-08', '1233445654', '6', '32', ' sedang di proses', 'dimsum.PNG', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `active` enum('active','suspended') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telepon`, `level`, `active`) VALUES
(9, 'bagus banget', 'bagus', '$2y$10$bBvCRMtufJ8jnShWPPgSNO1mvTTZ4GnWodf0YVZklStsLKuePDIja', '123344567', 'admin', 'active'),
(26, 'nanik', 'nanik', '$2y$10$o2NjQkqgBirmqZz6cfC3T.cOaDRxbmTU/dYOIA.WbOyTu7s6nnwL6', '0000000', 'admin', 'active'),
(33, 'joko', 'joko', '$2y$10$FA3FIym/sahYhPSToe1RVun/OzbOQIB/qZh5NkwRv1zb7JGEjVUeK', '0989878675656557657', 'petugas', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `subkategori_id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `subkategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`subkategori_id`, `id_kategori`, `subkategori`) VALUES
(17, 3, 'buang hajatasdasuu'),
(18, 2, 'buang anak hara'),
(21, 5, 'buang anakk'),
(29, 4, 'Begal '),
(30, 7, 'buang anak'),
(32, 6, 'Klitih'),
(33, 2, 'copet');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(128) NOT NULL,
  `id_pengaduan` int(128) NOT NULL,
  `id_petugas` int(128) NOT NULL,
  `tanggal_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `id_petugas`, `tanggal_tanggapan`, `tanggapan`) VALUES
(38, 34, 9, '2023-02-21', 'muntaber'),
(43, 39, 9, '2023-03-01', 'telah di tangkap'),
(44, 35, 9, '2023-03-01', 'sedang dalam pencarian'),
(45, 38, 33, '2023-03-03', 'proses pencarian'),
(46, 49, 9, '2023-03-19', 'sedang dalam pencarian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`subkategori_id`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `subkategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
