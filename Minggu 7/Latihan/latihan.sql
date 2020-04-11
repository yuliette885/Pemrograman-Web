-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2020 pada 08.47
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
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_plat` varchar(10) NOT NULL,
  `tahun` int(4) DEFAULT NULL,
  `tarif` int(8) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`no_plat`, `tahun`, `tarif`, `status`) VALUES
('G 2890 GL', 2011, 250000, 'baik'),
('H 3379 AA', 2014, 200000, 'baik'),
('H 4632 SA', 2016, 300000, 'baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no_ktp` int(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `telepon` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`no_ktp`, `nama`, `alamat`, `telepon`) VALUES
(45161789, 'Sutomo', 'Purwokerto', 87654234),
(216894345, 'Larasati', 'Jakarta', 85437890),
(564811293, 'Ahmad Junaedi', 'Pekalongan', 85422173);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id_sopir` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `telepon` int(15) DEFAULT NULL,
  `sim` varchar(50) DEFAULT NULL,
  `tarif` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id_sopir`, `nama`, `alamat`, `telepon`, `sim`, `tarif`) VALUES
(23805, 'Sunarto', 'Semarang', 856397471, 'Sunarto', 350000),
(45629, 'Karto', 'Kebumen', 2147483647, 'Karto', 300000),
(55289, 'Sanuri', 'Kudus', 85639234, 'Sanuri', 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kendaraan`
--

CREATE TABLE `tipe_kendaraan` (
  `id_type` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_kendaraan`
--

INSERT INTO `tipe_kendaraan` (`id_type`, `type`) VALUES
(32902, 'Mobil Minivan'),
(52773, 'Mobil Sport'),
(67890, 'Mobil Sedan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(30) NOT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali_rencana` date DEFAULT NULL,
  `jam_kembali_rencana` datetime DEFAULT NULL,
  `tanggal_kembali_realisasi` date DEFAULT NULL,
  `jam_kembali_realisasi` datetime DEFAULT NULL,
  `denda` int(10) DEFAULT NULL,
  `kilometer_pinjam` int(11) DEFAULT NULL,
  `kilometer_kembali` int(11) DEFAULT NULL,
  `bbm_pinjam` int(11) DEFAULT NULL,
  `bbm_kembali` int(11) DEFAULT NULL,
  `kondisi_mobil_pinjam` varchar(20) DEFAULT NULL,
  `kondisi_mobil_kembali` varchar(20) DEFAULT NULL,
  `kerusakan` varchar(20) DEFAULT NULL,
  `biaya_kerusakan` int(10) DEFAULT NULL,
  `biaya_bbm` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tanggal_pesan`, `tanggal_pinjam`, `tanggal_kembali_rencana`, `jam_kembali_rencana`, `tanggal_kembali_realisasi`, `jam_kembali_realisasi`, `denda`, `kilometer_pinjam`, `kilometer_kembali`, `bbm_pinjam`, `bbm_kembali`, `kondisi_mobil_pinjam`, `kondisi_mobil_kembali`, `kerusakan`, `biaya_kerusakan`, `biaya_bbm`) VALUES
(51590, '2020-04-01', '2020-04-03', '2020-04-05', '2020-04-11 11:00:00', '2020-04-05', '2020-04-09 11:30:00', 100000, 120, 120, 200000, 200000, 'Baik', 'Baik', 'Tidak Ada', 0, 200000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_plat`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indeks untuk tabel `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- Indeks untuk tabel `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD PRIMARY KEY (`id_type`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
