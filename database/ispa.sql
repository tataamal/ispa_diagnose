-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 07:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ispa`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `nama_gejala`) VALUES
(1, 'Sesak Nafas Tiba-tiba'),
(2, 'Gelisah'),
(3, 'Sakit Tenggorokan'),
(4, 'Demam'),
(5, 'Intensitas Nafas Sesak Berat'),
(6, 'Menderita Amandel'),
(7, 'Dada Terasa Berat'),
(8, 'Suara Nafas Kasar'),
(9, 'Sakit Kepala');

-- --------------------------------------------------------

--
-- Table structure for table `gejala_jenis_ispa`
--

CREATE TABLE `gejala_jenis_ispa` (
  `id` int(11) NOT NULL,
  `gejala_id` int(11) DEFAULT NULL,
  `jenis_ispa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala_jenis_ispa`
--

INSERT INTO `gejala_jenis_ispa` (`id`, `gejala_id`, `jenis_ispa_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ispa`
--

CREATE TABLE `ispa` (
  `id_ispa` int(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `gejala1` varchar(255) NOT NULL,
  `gejala2` varchar(255) NOT NULL,
  `gejala3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ispa`
--

INSERT INTO `ispa` (`id_ispa`, `tipe`, `gejala1`, `gejala2`, `gejala3`) VALUES
(1, 'ISPA Akut', 'Sesak Nafas Tiba-tiba', 'Gelisah', 'Sakit Tenggorokan'),
(2, 'ISPA Kronis', 'Demam', 'Intensitas Nafas Sesak Berat', 'Menderita Amandel'),
(3, 'ISPA Periodik', 'Dada Terasa Berat', 'Suara Nafas Kasar', 'Sakit Kepala');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ispa`
--

CREATE TABLE `jenis_ispa` (
  `id` int(11) NOT NULL,
  `nama_ispa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_ispa`
--

INSERT INTO `jenis_ispa` (`id`, `nama_ispa`) VALUES
(1, 'ISPA Akut'),
(2, 'ISPA Kronis'),
(3, 'ISPA Periodik');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin123', '1'),
(2, 'sayu', 'sayu123', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(255) NOT NULL,
  `id_login` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `id_login`, `nama`, `email`) VALUES
(1, 1, 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(255) NOT NULL,
  `id_login` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_login`, `nama`, `email`, `alamat`) VALUES
(1, 2, 'Sayu Amani Fatiha', 'Sayuuu@gmail.com', 'Kalimantan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala_jenis_ispa`
--
ALTER TABLE `gejala_jenis_ispa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gejala_id` (`gejala_id`),
  ADD KEY `jenis_ispa_id` (`jenis_ispa_id`);

--
-- Indexes for table `ispa`
--
ALTER TABLE `ispa`
  ADD PRIMARY KEY (`id_ispa`);

--
-- Indexes for table `jenis_ispa`
--
ALTER TABLE `jenis_ispa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_login` (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gejala_jenis_ispa`
--
ALTER TABLE `gejala_jenis_ispa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ispa`
--
ALTER TABLE `ispa`
  MODIFY `id_ispa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_ispa`
--
ALTER TABLE `jenis_ispa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gejala_jenis_ispa`
--
ALTER TABLE `gejala_jenis_ispa`
  ADD CONSTRAINT `gejala_jenis_ispa_ibfk_1` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`),
  ADD CONSTRAINT `gejala_jenis_ispa_ibfk_2` FOREIGN KEY (`jenis_ispa_id`) REFERENCES `jenis_ispa` (`id`);

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
