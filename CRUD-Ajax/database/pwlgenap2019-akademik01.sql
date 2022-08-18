-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 06:53 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwlgenap2019-akademik01`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `npp` char(16) NOT NULL,
  `namadosen` varchar(50) DEFAULT NULL,
  `homebase` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`npp`, `namadosen`, `homebase`) VALUES
('0686.11.1993.03', 'Sasono wibowo, SE, M.kom', 'A12'),
('0686.11.1996.080', 'Asih Rohmani, M.kom', 'A12'),
('0686.11.1998.200', 'Affandy, Ph.D', 'A12'),
('0686.11.2004.009', 'Sudaryanto, M.kom', 'A12');

-- --------------------------------------------------------

--
-- Table structure for table `kultawar`
--

CREATE TABLE `kultawar` (
  `idkultawar` int(11) NOT NULL,
  `idmatkul` char(10) DEFAULT NULL,
  `npp` char(16) DEFAULT NULL,
  `klp` char(10) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jamkul` char(11) DEFAULT NULL,
  `ruang` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kultawar`
--

INSERT INTO `kultawar` (`idkultawar`, `idmatkul`, `npp`, `klp`, `hari`, `jamkul`, `ruang`) VALUES
(2, 'A12.74394', '0686.11.1998.200', 'A12.4301', 'Senin', '07.00-08.40', 'H.4.1');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `idmatkul` char(10) NOT NULL,
  `namamatkul` varchar(50) DEFAULT NULL,
  `sks` int(2) DEFAULT NULL,
  `jns` char(3) DEFAULT NULL,
  `smt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`idmatkul`, `namamatkul`, `sks`, `jns`, `smt`) VALUES
('A12.4628', 'Dasar Akuntansi', 2, 'T', '1'),
('A12.56107', 'Matematika Diskrit', 3, 'T', '2'),
('A12.74394', 'Bahasa Inggris', 2, 'T', '2'),
('A12.84032', 'Basis Data Lanjutan', 4, 'T/P', '5');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(10) NOT NULL,
  `nim` char(14) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nim`, `nama`, `email`, `foto`) VALUES
(75, 'A12.2018.06099', 'Siti Asnah', 'siti@gmail.com', 'Desert.jpg'),
(76, 'A12.2018.06074', 'Putri Intan', 'putri@gmail.com', 'Hydrangeas.jpg'),
(77, 'A12.2018.06080', 'Sinta Laras', 'sinta@gmail.com', 'Jellyfish.jpg'),
(79, 'A12.2018.06088', 'Nita Eviani', 'nita@gmail.com', 'Lighthouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `status`) VALUES
(2, 'yuli', 'yuli123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`npp`);

--
-- Indexes for table `kultawar`
--
ALTER TABLE `kultawar`
  ADD PRIMARY KEY (`idkultawar`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`idmatkul`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kultawar`
--
ALTER TABLE `kultawar`
  MODIFY `idkultawar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
