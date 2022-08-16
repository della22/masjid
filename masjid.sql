-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2022 pada 08.26
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
  `id_arisan` int(50) NOT NULL,
  `id_donatur` int(50) NOT NULL,
  `tahun_periode` varchar(9) NOT NULL,
  `biaya` int(20) NOT NULL,
  `terbayar` int(20) NOT NULL,
  `status_arisan` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arisan_kurban`
--

INSERT INTO `arisan_kurban` (`id_arisan`, `id_donatur`, `tahun_periode`, `biaya`, `terbayar`, `status_arisan`) VALUES
(10, 1236, '2022', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_donasi`
--

CREATE TABLE `berita_donasi` (
  `id_berita` int(50) NOT NULL,
  `judul_berita` text NOT NULL,
  `jangka_waktu` text NOT NULL,
  `deskripsi_berita` text NOT NULL,
  `gambar_berita` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cicil_arisan_kurban`
--

CREATE TABLE `cicil_arisan_kurban` (
  `id_cicil_arisan` int(50) NOT NULL,
  `id_arisan` int(50) NOT NULL,
  `tanggal_cicil` date NOT NULL,
  `nominal_cicil` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cicil_arisan_kurban`
--

INSERT INTO `cicil_arisan_kurban` (`id_cicil_arisan`, `id_arisan`, `tanggal_cicil`, `nominal_cicil`) VALUES
(1, 10, '2022-07-07', 10000),
(3, 0, '0000-00-00', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah`
--

CREATE TABLE `jamaah` (
  `id_jamaah` int(50) NOT NULL,
  `nama_jamaah` varchar(30) NOT NULL,
  `telepon_jamaah` varchar(13) NOT NULL,
  `alamat_jamaah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jamaah`
--

INSERT INTO `jamaah` (`id_jamaah`, `nama_jamaah`, `telepon_jamaah`, `alamat_jamaah`) VALUES
(1236, 'budii', '0813', 'bb'),
(1238, 'hafizh', '0882', 'dd'),
(1239, 'test', '09', 'pp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pemasukan`
--

CREATE TABLE `kategori_pemasukan` (
  `id_kategori_masuk` int(11) NOT NULL,
  `nama_kategori_masuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_pemasukan`
--

INSERT INTO `kategori_pemasukan` (`id_kategori_masuk`, `nama_kategori_masuk`) VALUES
(9, 'infaq'),
(10, 'Arisan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pengeluaran`
--

CREATE TABLE `kategori_pengeluaran` (
  `id_kategori_keluar` int(11) NOT NULL,
  `nama_kategori_keluar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_pengeluaran`
--

INSERT INTO `kategori_pengeluaran` (`id_kategori_keluar`, `nama_kategori_keluar`) VALUES
(5, 'test'),
(7, 'keluarin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(50) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `pj_layanan` varchar(100) NOT NULL,
  `kontak_layanan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `pj_layanan`, `kontak_layanan`) VALUES
(2, 'a', 's', '33'),
(3, 'c', 'test', '86867');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `id_kategori`, `tanggal`, `nominal`, `keterangan`) VALUES
(41, 10, '2022-06-16', '66', '66'),
(43, 9, '2022-06-24', '888888', 'ket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `id_kategori`, `tanggal`, `nominal`, `keterangan`) VALUES
(8, 0, '2022-03-04', '10000', '-'),
(10, 4, '2022-02-15', '1000000', '666'),
(11, 5, '2022-06-09', '1', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_masjid`
--

CREATE TABLE `profil_masjid` (
  `id_profil` int(10) NOT NULL,
  `upload_img` varchar(100) NOT NULL,
  `alamat_profil` text NOT NULL,
  `telp_profil` varchar(13) NOT NULL,
  `email_profil` varchar(50) NOT NULL,
  `norek_profil` varchar(100) NOT NULL,
  `desk_profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_masjid`
--

INSERT INTO `profil_masjid` (`id_profil`, `upload_img`, `alamat_profil`, `telp_profil`, `email_profil`, `norek_profil`, `desk_profil`) VALUES
(1, 'gambar_profil.jpeg', 'test', '2', 'd@gmail.com', 'a', 'dd kk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sdm_masjid`
--

CREATE TABLE `sdm_masjid` (
  `id_sdm` int(3) NOT NULL,
  `foto_bagan` varchar(100) NOT NULL,
  `jumlah_pengurus` int(3) NOT NULL,
  `jumlah_remaja_masjid` int(3) NOT NULL,
  `jumlah_imam_utama` int(3) NOT NULL,
  `jumlah_imam_cadangan` int(3) NOT NULL,
  `jumlah_muadzin` int(3) NOT NULL,
  `jumlah_khatib` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sdm_masjid`
--

INSERT INTO `sdm_masjid` (`id_sdm`, `foto_bagan`, `jumlah_pengurus`, `jumlah_remaja_masjid`, `jumlah_imam_utama`, `jumlah_imam_cadangan`, `jumlah_muadzin`, `jumlah_khatib`) VALUES
(1, 'bagan_pengurus.png', 2, 2, 23, 5, 10, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profile`
--

CREATE TABLE `user_profile` (
  `id_user` int(10) NOT NULL,
  `id_jamaah` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_profile`
--

INSERT INTO `user_profile` (`id_user`, `id_jamaah`, `username`, `password`, `role`) VALUES
(19, 1238, 'aa', 'della', 'Admin');

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
-- Indeks untuk tabel `sdm_masjid`
--
ALTER TABLE `sdm_masjid`
  ADD PRIMARY KEY (`id_sdm`);

--
-- Indeks untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arisan_kurban`
--
ALTER TABLE `arisan_kurban`
  MODIFY `id_arisan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `berita_donasi`
--
ALTER TABLE `berita_donasi`
  MODIFY `id_berita` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cicil_arisan_kurban`
--
ALTER TABLE `cicil_arisan_kurban`
  MODIFY `id_cicil_arisan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  MODIFY `id_jamaah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1240;

--
-- AUTO_INCREMENT untuk tabel `kategori_pemasukan`
--
ALTER TABLE `kategori_pemasukan`
  MODIFY `id_kategori_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori_pengeluaran`
--
ALTER TABLE `kategori_pengeluaran`
  MODIFY `id_kategori_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `profil_masjid`
--
ALTER TABLE `profil_masjid`
  MODIFY `id_profil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sdm_masjid`
--
ALTER TABLE `sdm_masjid`
  MODIFY `id_sdm` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
