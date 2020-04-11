-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2020 pada 09.44
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pribadi`
--

CREATE TABLE `data_pribadi` (
  `kd_pribadi` char(3) NOT NULL,
  `panggilan` char(4) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `No` int(3) NOT NULL,
  `Nama` varchar(35) DEFAULT NULL,
  `Alamat` varchar(60) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `No_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tamu`
--

INSERT INTO `tb_tamu` (`No`, `Nama`, `Alamat`, `Email`, `No_telp`) VALUES
(1, 'irfan nurhudin', 'ujung berung', 'bo_i77@yahoo.com', '085613548789'),
(2, 'Wasmui', 'Jatimulyo', 'boy@gmail.com', '084567897890'),
(3, 'Sumarno', 'Surodadi', 'man@gmail.com', '082469823578');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pribadi`
--
ALTER TABLE `data_pribadi`
  ADD PRIMARY KEY (`kd_pribadi`),
  ADD UNIQUE KEY `kd_pribadi` (`kd_pribadi`,`panggilan`);

--
-- Indeks untuk tabel `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
