-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2021 at 09:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chatbot_ukdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `idadmin` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`idadmin`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kata_kunci`
--

CREATE TABLE `tb_kata_kunci` (
  `idkatakunci` char(5) NOT NULL,
  `katakunci` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kata_kunci`
--

INSERT INTO `tb_kata_kunci` (`idkatakunci`, `katakunci`) VALUES
('K0001', 'Beasiswa'),
('K0002', 'Mahasiswa'),
('K0003', 'Baru'),
('K0004', 'Bidikmisi'),
('K0005', 'Prestasi'),
('K0006', 'Jurusan'),
('K0007', 'Paling'),
('K0008', 'Minat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `idpertanyaan` char(5) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `pertanyaan` varchar(500) DEFAULT NULL,
  `jawaban` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`idpertanyaan`, `jenis`, `pertanyaan`, `jawaban`) VALUES
('P0001', 'Program Studi', 'Apa jurusan yang paling diminati ?', 'Teknik Informatika'),
('P0002', 'Beasiswa', 'Apa beasiswa bidikmisi ada', 'ya ada, meaknismenya bisa di cek di lamab berikut');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan_rule`
--

CREATE TABLE `tb_pertanyaan_rule` (
  `idpertanyaan` char(5) DEFAULT NULL,
  `idkatakunci` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pertanyaan_rule`
--

INSERT INTO `tb_pertanyaan_rule` (`idpertanyaan`, `idkatakunci`) VALUES
('P0001', 'K0006'),
('P0001', 'K0007'),
('P0001', 'K0008'),
('P0002', 'K0001'),
('P0002', 'K0002'),
('P0002', 'K0004');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_pesan`
--

CREATE TABLE `tb_riwayat_pesan` (
  `idpesan` int(11) NOT NULL,
  `idunikpesan` varchar(16) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_pesan_gagal`
--

CREATE TABLE `tb_riwayat_pesan_gagal` (
  `idpesan` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tb_kata_kunci`
--
ALTER TABLE `tb_kata_kunci`
  ADD PRIMARY KEY (`idkatakunci`);

--
-- Indexes for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`idpertanyaan`);

--
-- Indexes for table `tb_riwayat_pesan`
--
ALTER TABLE `tb_riwayat_pesan`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indexes for table `tb_riwayat_pesan_gagal`
--
ALTER TABLE `tb_riwayat_pesan_gagal`
  ADD PRIMARY KEY (`idpesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_riwayat_pesan_gagal`
--
ALTER TABLE `tb_riwayat_pesan_gagal`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
