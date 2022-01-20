-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 03:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `klinik` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `image_text` int(11) NOT NULL,
  `jeniskelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `klinik`, `status`, `image`, `image_text`, `jeniskelamin`) VALUES
(8, 'Dr. Boyce', 'Gigi', 'Aktif', 'dokter1.jpeg', 0, 'Laki-Laki'),
(9, 'Dr. Sukma Trutely ', 'Anak', 'Aktif', 'dokter2.jpg', 0, 'Laki-Laki'),
(10, 'Dr. jajang setiawan', 'Umum', 'Aktif', 'dokter3.jpg', 0, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `klinik` varchar(50) NOT NULL,
  `tanggal_pertemuan` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` int(11) NOT NULL,
  `tagihan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `nama_dokter`, `klinik`, `tanggal_pertemuan`, `status`, `image`, `image_text`, `tagihan`) VALUES
(23, 'solihin', 'Dr. Sukma Trutely', 'Umum', '2022-01-06', 'Ditolak', 'navy-butterfly.jpg', 0, 0),
(25, 'dadang', 'Dr. Boyce', 'Anak', '2022-01-06', 'Diterima', 'pasien1.jpg', 0, 10000000),
(28, 'Ujang Bengsin', 'Dr. Boyce', 'Anak', '2022-01-06', 'Diterima', 'pasien1.jpg', 0, 5000000),
(29, 'Muhammad Naufa Dzulfiqar', 'Dr. jajang setiawan', 'GIGI', '2022-01-06', 'Ditolak', 'pasine2.jpeg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@unikom.ac.id', 1),
(2, 'naufa', 'naufa', 'Muhammad Naufa Dzulfiqar', 'lordnaufa@gmail.com', 0),
(4, 'ujang', 'naufa123', 'Ujang Bengsin', 'ujang@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
