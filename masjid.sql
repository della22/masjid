-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2022 pada 03.13
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
-- Struktur dari tabel `jadwal_imakho`
--

CREATE TABLE `jadwal_imakho` (
  `id_imakho` int(255) NOT NULL,
  `nik_imakho` varchar(20) NOT NULL,
  `nik_muadzin` varchar(20) DEFAULT NULL,
  `tanggal_imakho` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_imakho`
--

INSERT INTO `jadwal_imakho` (`id_imakho`, `nik_imakho`, `nik_muadzin`, `tanggal_imakho`) VALUES
(39, '0987', '', '2018-02-20'),
(40, '4', '0987', '2021-06-24'),
(41, '3', '1', '2018-02-22'),
(42, '0987', '1234', '2022-02-03'),
(43, '2', '3', '2022-02-24'),
(44, '1', '', '2020-05-14'),
(45, '3', '0987', '2022-02-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_keg`
--

CREATE TABLE `jadwal_keg` (
  `id_jadkeg` int(255) NOT NULL,
  `nik_pengisi` varchar(20) NOT NULL,
  `nama_keg` varchar(100) NOT NULL,
  `tanggal_keg` date NOT NULL,
  `waktu_keg` text NOT NULL,
  `tempat_keg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_keg`
--

INSERT INTO `jadwal_keg` (`id_jadkeg`, `nik_pengisi`, `nama_keg`, `tanggal_keg`, `waktu_keg`, `tempat_keg`) VALUES
(3, '3', 'nama kegiatan', '2022-02-24', '21:03 - 21:03 WIB', 'Tempat'),
(4, '1234', 'test1', '2022-01-13', '21:27 - 21:28 WIB', 'dimana'),
(5, '1', 'test2', '2021-12-25', '21:27 - 21:27 WIB', 'halaman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_rekapitulasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `tanggal`, `nominal`, `keterangan`, `id_rekapitulasi`) VALUES
(11, '2022-03-01', '50000', 'a', 19),
(12, '2022-03-04', '20000', '-', 20),
(14, '2022-03-10', '15000', '-', 22),
(15, '2022-01-01', '10000', '-', 24),
(16, '2022-02-09', '1000', 'p', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_rekapitulasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal`, `nominal`, `keterangan`, `id_rekapitulasi`) VALUES
(8, '2022-03-04', '10000', '-', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(100) NOT NULL,
  `nik_pengurus` varchar(20) NOT NULL,
  `jabatan_pengurus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nik_pengurus`, `jabatan_pengurus`) VALUES
(11, '0987', 'Bendahara'),
(12, '1234', 'Sekretaris'),
(13, '0987', 'Petugas bersih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapitulasi`
--

CREATE TABLE `rekapitulasi` (
  `id_rekapitulasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal_pemasukan` int(11) DEFAULT NULL,
  `nominal_pengeluaran` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekapitulasi`
--

INSERT INTO `rekapitulasi` (`id_rekapitulasi`, `tanggal`, `nominal_pemasukan`, `nominal_pengeluaran`, `keterangan`, `saldo`) VALUES
(19, '2022-03-01', 50000, NULL, 'a', 50000),
(20, '2022-03-04', 20000, NULL, '-', 70000),
(22, '2022-03-10', 15000, NULL, '-', 98000),
(23, '2022-03-04', NULL, 10000, '-', 70000),
(24, '2022-01-01', 10000, NULL, '-', 80000),
(25, '2022-02-09', 1000, NULL, 'p', 94000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarpras`
--

CREATE TABLE `sarpras` (
  `id_sarpras` int(255) NOT NULL,
  `item` varchar(100) NOT NULL,
  `jumlah_sarpras` int(11) NOT NULL,
  `kondisi` text NOT NULL,
  `keterangan_sarpras` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sarpras`
--

INSERT INTO `sarpras` (`id_sarpras`, `item`, `jumlah_sarpras`, `kondisi`, `keterangan_sarpras`) VALUES
(5, 'item', 1, 'Baik', '-'),
(6, 'item', 2, 'Baik', 'ket'),
(10, 'sarpras', 2, 'Baik, buruk', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profile`
--

CREATE TABLE `user_profile` (
  `id_user` int(255) NOT NULL,
  `nik_user` varchar(20) NOT NULL,
  `id_pengurus` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_profile`
--

INSERT INTO `user_profile` (`id_user`, `nik_user`, `id_pengurus`, `username`, `password`, `role`) VALUES
(8, '1234', 11, 'aa', 'della', 'Super Admin'),
(10, '1234', 12, 'admin', 'a', 'Sekretaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ustadz`
--

CREATE TABLE `ustadz` (
  `nik` varchar(20) NOT NULL,
  `nama_ustadz` varchar(30) NOT NULL,
  `telepon_ustadz` varchar(12) NOT NULL,
  `alamat_ustadz` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ustadz`
--

INSERT INTO `ustadz` (`nik`, `nama_ustadz`, `telepon_ustadz`, `alamat_ustadz`) VALUES
('0098', 'd', '08999', 'alamatt'),
('0987', 'della', '0808080', 'alamat'),
('1', 'abdul', '0812', 'aa'),
('11', 'abdul', '0812', 'aa'),
('1234', 'nama', '0812', 'qq'),
('15', 'budi', '0813', 'bb'),
('2', 'budi', '0813', 'bb'),
('3', 'ahmad', '0856', 'cc'),
('4', 'hafizh', '0882', 'dd'),
('7', 'hafizh', '0882', 'dd');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_imakho`
--
ALTER TABLE `jadwal_imakho`
  ADD PRIMARY KEY (`id_imakho`),
  ADD KEY `nik_imakho` (`nik_imakho`),
  ADD KEY `jadwal_imakho_ibfk_2` (`nik_muadzin`);

--
-- Indeks untuk tabel `jadwal_keg`
--
ALTER TABLE `jadwal_keg`
  ADD PRIMARY KEY (`id_jadkeg`),
  ADD KEY `nik_pengisi` (`nik_pengisi`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `nik_pengurus` (`nik_pengurus`);

--
-- Indeks untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  ADD PRIMARY KEY (`id_rekapitulasi`);

--
-- Indeks untuk tabel `sarpras`
--
ALTER TABLE `sarpras`
  ADD PRIMARY KEY (`id_sarpras`);

--
-- Indeks untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nik_user` (`nik_user`),
  ADD KEY `id_pengurus` (`id_pengurus`);

--
-- Indeks untuk tabel `ustadz`
--
ALTER TABLE `ustadz`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_imakho`
--
ALTER TABLE `jadwal_imakho`
  MODIFY `id_imakho` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `jadwal_keg`
--
ALTER TABLE `jadwal_keg`
  MODIFY `id_jadkeg` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  MODIFY `id_rekapitulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `sarpras`
--
ALTER TABLE `sarpras`
  MODIFY `id_sarpras` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_imakho`
--
ALTER TABLE `jadwal_imakho`
  ADD CONSTRAINT `jadwal_imakho_ibfk_1` FOREIGN KEY (`nik_imakho`) REFERENCES `ustadz` (`nik`);

--
-- Ketidakleluasaan untuk tabel `jadwal_keg`
--
ALTER TABLE `jadwal_keg`
  ADD CONSTRAINT `jadwal_keg_ibfk_1` FOREIGN KEY (`nik_pengisi`) REFERENCES `ustadz` (`nik`);

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`nik_pengurus`) REFERENCES `ustadz` (`nik`);

--
-- Ketidakleluasaan untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`nik_user`) REFERENCES `ustadz` (`nik`),
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
