-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2022 pada 17.26
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
-- Struktur dari tabel `arisan_kurban`
--

CREATE TABLE `arisan_kurban` (
  `id_arisan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_donasi`
--

CREATE TABLE `berita_donasi` (
  `id_berita` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cicil_arisan_kurban`
--

CREATE TABLE `cicil_arisan_kurban` (
  `id_cicil_arisan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah`
--

CREATE TABLE `jamaah` (
  `id_jamaah` varchar(10) NOT NULL,
  `nama_jamaah` varchar(30) NOT NULL,
  `telepon_jamaah` varchar(12) NOT NULL,
  `alamat_jamaah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jamaah`
--

INSERT INTO `jamaah` (`id_jamaah`, `nama_jamaah`, `telepon_jamaah`, `alamat_jamaah`) VALUES
('0987', 'della', '0808080', 'alamat'),
('1', 'abdul', '0812', 'aa'),
('11', 'abdul', '0812', 'aa'),
('1234', 'nama', '0812', 'qq'),
('15', 'budi', '0813', 'bb'),
('2', 'budi', '0813', 'bb'),
('3', 'ahmad', '0856', 'cc'),
('4', 'hafizh', '0882', 'dd'),
('7', 'hafizh', '0882', 'dd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pemasukan`
--

CREATE TABLE `kategori_pemasukan` (
  `id_kategori_masuk` int(11) NOT NULL,
  `nama_kategori_masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pengeluaran`
--

CREATE TABLE `kategori_pengeluaran` (
  `id_kategori_keluar` int(11) NOT NULL,
  `nama_kategori_keluar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(50) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `pj_layanan` varchar(100) NOT NULL,
  `kontak_layanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_rekapitulasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `id_kategori`, `tanggal`, `nominal`, `keterangan`, `id_rekapitulasi`) VALUES
(11, 0, '2022-03-01', '50000', 'a', 19),
(12, 0, '2022-03-04', '20000', '-', 20),
(14, 0, '2022-03-10', '15000', '-', 22),
(15, 0, '2022-01-01', '10000', '-', 24),
(16, 0, '2022-02-09', '1000', 'p', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_rekapitulasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `id_kategori`, `tanggal`, `nominal`, `keterangan`, `id_rekapitulasi`) VALUES
(8, 0, '2022-03-04', '10000', '-', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_masjid`
--

CREATE TABLE `profil_masjid` (
  `id_profil` int(11) NOT NULL,
  `foto_profil` int(11) NOT NULL,
  `alamat_profil` text NOT NULL,
  `telp_profil` text NOT NULL,
  `email_profil` varchar(50) NOT NULL,
  `norek_profil` varchar(100) NOT NULL,
  `desk_profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `sdm_masjid`
--

CREATE TABLE `sdm_masjid` (
  `id_sdm` int(100) NOT NULL,
  `foto_sdm` int(11) NOT NULL,
  `jumlah_pengurus` int(10) NOT NULL,
  `jumlah_remaja_masjid` int(10) NOT NULL,
  `jumlah_imam_utama` int(10) NOT NULL,
  `jumlah_imam_cadangan` int(10) NOT NULL,
  `jumlah_muadzin` int(10) NOT NULL,
  `jumlah_khatib` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profile`
--

CREATE TABLE `user_profile` (
  `id_user` int(255) NOT NULL,
  `id_jamaah` varchar(20) NOT NULL,
  `jabatan` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_profile`
--

INSERT INTO `user_profile` (`id_user`, `id_jamaah`, `jabatan`, `username`, `password`, `role`) VALUES
(8, '1234', 'Ketua', 'aa', 'della', 'Super Admin'),
(10, '1234', 'Sekretaris', 'admin', 'a', 'Sekretaris');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arisan_kurban`
--
ALTER TABLE `arisan_kurban`
  ADD PRIMARY KEY (`id_arisan`);

--
-- Indeks untuk tabel `berita_donasi`
--
ALTER TABLE `berita_donasi`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `cicil_arisan_kurban`
--
ALTER TABLE `cicil_arisan_kurban`
  ADD PRIMARY KEY (`id_cicil_arisan`);

--
-- Indeks untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  ADD PRIMARY KEY (`id_jamaah`);

--
-- Indeks untuk tabel `kategori_pemasukan`
--
ALTER TABLE `kategori_pemasukan`
  ADD PRIMARY KEY (`id_kategori_masuk`);

--
-- Indeks untuk tabel `kategori_pengeluaran`
--
ALTER TABLE `kategori_pengeluaran`
  ADD PRIMARY KEY (`id_kategori_keluar`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

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
-- Indeks untuk tabel `profil_masjid`
--
ALTER TABLE `profil_masjid`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  ADD PRIMARY KEY (`id_rekapitulasi`);

--
-- Indeks untuk tabel `sdm_masjid`
--
ALTER TABLE `sdm_masjid`
  ADD PRIMARY KEY (`id_sdm`);

--
-- Indeks untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jamaah` (`id_jamaah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori_pemasukan`
--
ALTER TABLE `kategori_pemasukan`
  MODIFY `id_kategori_masuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_pengeluaran`
--
ALTER TABLE `kategori_pengeluaran`
  MODIFY `id_kategori_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(50) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `profil_masjid`
--
ALTER TABLE `profil_masjid`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  MODIFY `id_rekapitulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `sdm_masjid`
--
ALTER TABLE `sdm_masjid`
  MODIFY `id_sdm` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`id_jamaah`) REFERENCES `jamaah` (`id_jamaah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
