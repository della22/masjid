-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2022 pada 14.01
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masjid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(255) NOT NULL,
  `item` varchar(100) NOT NULL,
  `jumlah_inventaris` int(11) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `keterangan_inventaris` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_imakho`
--

CREATE TABLE `jadwal_imakho` (
  `id_jadimakho` int(255) NOT NULL,
  `nik_imakho` int(20) NOT NULL,
  `tanggal_jadimakho` date NOT NULL,
  `nama_jadimakho` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_keg`
--

CREATE TABLE `jadwal_keg` (
  `id_jadkeg` int(255) NOT NULL,
  `nik_pengisi` int(20) NOT NULL,
  `nama_keg` varchar(100) NOT NULL,
  `tanggal_keg` date NOT NULL,
  `waktu_keg` text NOT NULL,
  `tempat_keg` varchar(100) NOT NULL,
  `pengisi_keg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(255) NOT NULL,
  `tanggal_pemasukan` date NOT NULL,
  `nominal_pemasukan` varchar(100) NOT NULL,
  `keterangan_pemasukan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(255) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `nominal_pengeluaran` varchar(100) NOT NULL,
  `keterangan_pengeluaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(100) NOT NULL,
  `nik_pengurus` int(20) NOT NULL,
  `nama_pengurus` varchar(100) NOT NULL,
  `jabatan_pengurus` varchar(100) NOT NULL,
  `telepon_pengurus` int(11) NOT NULL,
  `alamat_pengurus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profile`
--

CREATE TABLE `user_profile` (
  `id_user` int(255) NOT NULL,
  `nik_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ustad`
--

CREATE TABLE `ustad` (
  `nik` int(20) NOT NULL,
  `nama_ustad` varchar(100) NOT NULL,
  `telepon_ustad` int(11) NOT NULL,
  `alamat_ustad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indeks untuk tabel `jadwal_imakho`
--
ALTER TABLE `jadwal_imakho`
  ADD PRIMARY KEY (`id_jadimakho`),
  ADD KEY `nik` (`nik_imakho`);

--
-- Indeks untuk tabel `jadwal_keg`
--
ALTER TABLE `jadwal_keg`
  ADD PRIMARY KEY (`id_jadkeg`),
  ADD KEY `nik` (`nik_pengisi`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `nik_pengurus` (`nik_pengurus`);

--
-- Indeks untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nik_user` (`nik_user`);

--
-- Indeks untuk tabel `ustad`
--
ALTER TABLE `ustad`
  ADD PRIMARY KEY (`nik`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_imakho`
--
ALTER TABLE `jadwal_imakho`
  ADD CONSTRAINT `jadwal_imakho_ibfk_1` FOREIGN KEY (`nik_imakho`) REFERENCES `ustad` (`nik`);

--
-- Ketidakleluasaan untuk tabel `jadwal_keg`
--
ALTER TABLE `jadwal_keg`
  ADD CONSTRAINT `jadwal_keg_ibfk_1` FOREIGN KEY (`nik_pengisi`) REFERENCES `ustad` (`nik`);

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`nik_pengurus`) REFERENCES `ustad` (`nik`);

--
-- Ketidakleluasaan untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`nik_user`) REFERENCES `ustad` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
