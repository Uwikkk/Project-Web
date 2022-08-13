-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2022 pada 07.04
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tambak_ikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `kode` int(11) NOT NULL,
  `nama_alat` varchar(70) NOT NULL,
  `merk` varchar(70) NOT NULL,
  `status` varchar(50) NOT NULL,
  `harga_alat` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`kode`, `nama_alat`, `merk`, `status`, `harga_alat`, `denda`) VALUES
(1, 'Waring', 'Bintag Mas', '0', 5000, 2000),
(2, 'Pancing Reel', 'Tornado', '1', 10000, 2500),
(3, 'Benang Pancing', 'Wraping Metalic', '1', 5000, 1000),
(4, 'Umpan Pancing', 'Minnow Fishing Lure', '1', 7000, 2500),
(5, 'Stick Pancing', 'Saogayilang', '1', 20000, 5000),
(6, 'Pelampung Pancing', 'HaiChuan', '1', 2000, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_bayar` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_tempat` int(11) NOT NULL,
  `nama_alat_pinjam` varchar(50) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`kode_bayar`, `nama_pelanggan`, `no_tempat`, `nama_alat_pinjam`, `total_bayar`) VALUES
(4, 'Dwi Cahyono', 13, 'Benang Pancing', 176350),
(5, 'Hendra', 14, 'Stick Pancing', 121200),
(6, 'Dwi Cahyono', 15, 'Benang Pancing', 201950),
(7, 'Dwi Cahyono', 16, 'Waring', 251950),
(8, 'Dwi Cahyono', 17, 'Benang Pancing', 66950),
(9, 'Aqmal Ade Rosyid', 18, 'Benang Pancing', -648050),
(10, 'Dwi Cahyono', 19, 'Stick Pancing', 162400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `kode_pelanggan` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`kode_pelanggan`, `nama`, `nik`, `agama`, `no_hp`, `alamat`) VALUES
(1, 'Rindung Galuh Dimas', '2190312', 'Islam', '0821341231312', 'jl. abimanyu V semarang tengah'),
(2, 'Dwi Cahyono', '6289102', 'Islam', '082135332534', 'Ds. GampangSejati Rt 002 Rw 002'),
(3, 'Latifah Nur Sa\'adah', '9800876', 'Islam', '085797540622', 'Dsn Keting'),
(793, 'Hendra', '789372', 'Islam', '089212671364', 'Dsn. Gendingan'),
(794, 'Aqmal Ade Rosyid', '39123890', 'Islam', '0829019301730', 'Ds. GampangSejati Rt 001 RW 0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `kode_tempat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`kode_tempat`, `harga`, `nama_tempat`) VALUES
(1, 20000, 'Ekonomi'),
(2, 40000, 'VIP'),
(3, 60000, 'VVIP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_pemancingan` int(11) NOT NULL,
  `kode_pelanggan` int(11) NOT NULL,
  `kode_alat` int(11) NOT NULL,
  `kode_tempat` int(11) NOT NULL,
  `jam_pinjam` time NOT NULL,
  `jam_kembali` time NOT NULL,
  `jam_pengembalian` time NOT NULL,
  `jam_sewa` time NOT NULL,
  `jam_sampai` time NOT NULL,
  `jam_cek` time NOT NULL,
  `status_pengembalian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_pemancingan`, `kode_pelanggan`, `kode_alat`, `kode_tempat`, `jam_pinjam`, `jam_kembali`, `jam_pengembalian`, `jam_sewa`, `jam_sampai`, `jam_cek`, `status_pengembalian`) VALUES
(13, 2, 3, 2, '10:00:00', '13:00:00', '13:33:00', '09:00:00', '13:00:00', '13:33:00', 'Selesai'),
(14, 793, 5, 1, '07:00:00', '10:00:00', '10:23:00', '07:00:00', '10:00:00', '10:23:00', 'Selesai'),
(15, 2, 3, 3, '07:00:00', '11:00:00', '11:55:00', '08:00:00', '11:30:00', '11:59:00', 'Selesai'),
(16, 2, 1, 3, '00:00:00', '14:00:00', '14:22:00', '11:08:00', '14:22:00', '14:44:00', 'Selesai'),
(17, 2, 3, 3, '19:53:00', '21:14:00', '22:00:00', '19:53:00', '21:14:00', '22:00:00', 'Selesai'),
(18, 794, 3, 3, '10:46:00', '12:58:00', '13:05:00', '10:50:00', '12:59:00', '13:05:00', 'Selesai'),
(19, 2, 5, 3, '07:00:00', '09:15:00', '10:00:00', '07:00:00', '09:15:00', '10:00:00', 'Selesai'),
(20, 793, 1, 1, '02:09:00', '03:09:00', '00:00:00', '02:09:00', '03:09:00', '00:00:00', 'Belum Kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_api`
--

CREATE TABLE `user_api` (
  `no` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_api`
--

INSERT INTO `user_api` (`no`, `nama`, `kode`) VALUES
(1, 'wikk', 'wikk123'),
(2, 'rindung', 'rindung123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`kode`),
  ADD UNIQUE KEY `harga` (`harga_alat`,`denda`),
  ADD KEY `harga_2` (`harga_alat`,`denda`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_bayar`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indeks untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`kode_tempat`),
  ADD UNIQUE KEY `harga` (`harga`,`nama_tempat`),
  ADD KEY `denda_tempat` (`nama_tempat`),
  ADD KEY `denda_tempat_2` (`nama_tempat`),
  ADD KEY `denda_tempat_3` (`nama_tempat`),
  ADD KEY `denda_tempat_4` (`nama_tempat`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_pemancingan`);

--
-- Indeks untuk tabel `user_api`
--
ALTER TABLE `user_api`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9905;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kode_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `kode_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=795;

--
-- AUTO_INCREMENT untuk tabel `tempat`
--
ALTER TABLE `tempat`
  MODIFY `kode_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_pemancingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_api`
--
ALTER TABLE `user_api`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
