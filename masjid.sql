-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2022 pada 16.31
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
(4, 10, '2023', 3300000, 1800000, '0'),
(5, 8, '2023', 3300000, 1800000, '0'),
(6, 9, '2023', 3300000, 1800000, '0'),
(7, 14, '2023', 3300000, 1800000, '0'),
(8, 15, '2023', 3300000, 1800000, '0'),
(9, 16, '2023', 3300000, 1800000, '0'),
(10, 18, '2023', 3300000, 1800000, '0'),
(11, 19, '2023', 3300000, 1800000, '0'),
(12, 21, '2023', 3300000, 1800000, '0'),
(13, 22, '2023', 3300000, 1800000, '0'),
(14, 11, '2023', 3300000, 1800000, '0'),
(15, 13, '2023', 3300000, 1800000, '0'),
(16, 17, '2023', 3300000, 1800000, '0'),
(17, 12, '2023', 3300000, 1800000, '0'),
(18, 20, '2023', 3300000, 1500000, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_donasi`
--

CREATE TABLE `berita_donasi` (
  `id_berita` int(50) NOT NULL,
  `judul_berita` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `deskripsi_berita` text NOT NULL,
  `gambar_berita` varchar(100) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita_donasi`
--

INSERT INTO `berita_donasi` (`id_berita`, `judul_berita`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi_berita`, `gambar_berita`, `status`) VALUES
(5, 'Santunan Yatim Piatu', '2022-11-13', '2023-11-13', 'Deskripsi', 'Santunan_Yatim_PiatuWhatsApp_Image_2022-11-13_at_17_45_49.jpeg', NULL),
(7, 'Arisan Kurban', '2022-06-01', '2023-04-20', 'Arisan qurban ini dilakukan untuk membantu para jamaah masjid yang ingin berqurban dengan cara para jamaah masjid mendaftar untuk berqurban pada idul Adha dengan besaran sesuai dengan harga sapi atau kambing pada saat dibeli nanti. Jamaah peserta arisan qurban memberikan atau membayar uang arisan pada setiap bulannya sesuai dengan kemauan dan kemampuan masing masing dan iuran ini harus sudah lunas satu bulan sebelum Idul Adha. Uang arisan ini dikelola oleh satu orang pengurus masjid yang sudah ditunjuk untuk bertanggung jawab sampai dengan pembelian hewan qurban nanti.', 'Arisan_KurbanWhatsApp_Image_2022-11-15_at_19_05_111.jpeg', NULL),
(9, 'Jumat Berkah', '2022-11-13', '2023-11-13', 'Kegiatan ini merupakan kegiatan rutin yang dilakukan pada hari jumat yaitu makan bersama dengan jamaah setelah selesai shalat jumat. Kegiatan ini adalah inisiatif para jamaah masjid yang mau sedekah makanan pada hari jumat kepada para jamaah masjid. Makanan ini diberikan secara sukarela dan biasanya bagi jamaah yang mau bersedekah makanan memberitahu kepada penanggung jawab kegiatan ini agar penanggung jawab dapat mengatur jadwalnya sehingga makanan tidak menumpuk pada hari jumat tertentu tetapi akan kosong pada hari jumat lainnya.', 'Jumat_BerkahWhatsApp_Image_2022-11-13_at_17_45_49.jpeg', NULL),
(10, 'Buka Puasa Bersama', '2022-11-14', '2023-04-20', 'Pada saat bulan Ramadhan para jamaah masjid ada yang melakukan buka bersama di masjid. Masing masing jamaah biasanya membawa makanan dari rumah masing masing. Ada sebagian yang membawa minuman dan ada yang membawa makanan untuk berbuka. Banyak juga masyarakat disekitar masjid setiap hari menjelang berbuka secara rutin mengantarkan makanan ataupun minuman kepada para jamaah masjid yang berbuka puasa dimasjid. Kegiatan ini terbuka bagi siapa saja dan tidak ada keharusan membawa makanan atau minuman bagi jamaah yang akan berbuka puasa dimasjid.', 'Buka_Puasa_Bersamamvc.jpg', NULL),
(11, 'Pembagian Sembako', '2022-11-14', '2022-12-31', 'Pembagian sembako dilakukan kepada keluarga yang berada dari keluarga yang kurang mampu dan juga anak yatim, piatu, yatim piatu, lansia. Sembako ini disiapkan oleh pengurus masjid yang sudah ditunjuk untuk mengelola bantuan yang bersumber dari para jamaah. Bantuan dari jamaah ada yang berupa uang dan ada juga berupa bahan bahan sembako. Bantuan yang dikumpulkan dalam bentuk uang akan dibelikan bahan bahan sembako oleh pengurus masjid. Pemberian sembako diberikan kepada masyarakat atau panti panti  baik panti asuhan maupun panti jompo.', 'Pembagian_SembakoIMG-20220204-WA0010.jpg', NULL),
(12, 'Zakat Fitrah', '2023-04-11', '2023-04-21', 'Zakat fitrah dilakukan mulai hari ke 21 pada bulan suci Ramadhan yang dilakukan dimasjid setelah selesai sholat tarawih. Panitia zakat fitrah adalah mereka yang sudah ditunjuk oleh keputusan pengurus masjid untuk mengelola zakat fitrah dari sejak penerimaan zakat fitrah yang diserahkan oleh wajib zakat sampai dengan pembagian zakat fitrah kepada yang berhak menerima. Zakat fitrah diserahkan dalam bentuk beras dan juga uang tunai. Pembagian zakat fitrah dilakukan dengan sistem para mustahiq diberikan kupon untuk dibawa pada saat pembagian. Mereka akan menerima zakat fitrah dengan mendapatkan beras dan uang dengan jumlah sesuai dengan jumlah semua zakat fitrah yang dikumpulkan dan akan dibagikan sama bagi seluruh mustahiq tanpa kecuali. Para panitia pada masjid ini tidak menerima pembagian zakat fitrah sesuai dengan aturan yang berlaku.', 'Zakat_Fitrah_Zakat_Malerror_tinta.png', NULL),
(13, 'Zakat Mal', '2022-11-15', '2022-11-15', 'Zakat mal dilakukan dengan menyampaikan zakat mal dari orang yang berkewajiban untuk mengeluarkan zakat mal dari harta kekayaan yang dimilikinya. Para pengurus masjid yang telah ditunjuk untuk mengelola dan bertanggung jawab pada kegiatan ini akan mengundang para penerima yang berhak. Pemberian bantuan yang bersumber dari zakat mal ini diberikan kepada keluarga yang kurang mampu. Pemberian bantuan ini biasanya diberikan kepada masyarakat dengan cara mendatangi langsung masyarakat penerima dari rumah ke rumah.', 'Zakat_Malpnghut_grand-mosque-of-the-sultan-riau-castle.png', NULL);

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
(1, 3, '2022-11-11', 5000000),
(2, 3, '2022-11-10', 4000000),
(3, 3, '2022-11-11', 4000000),
(4, 2, '2022-11-11', 1000000),
(5, 18, '2022-06-01', 300000),
(6, 18, '2022-07-01', 300000),
(7, 18, '2022-08-01', 300000),
(8, 18, '2022-09-01', 300000),
(9, 18, '2022-10-01', 300000),
(11, 17, '2022-06-01', 300000),
(12, 17, '2022-07-01', 300000),
(13, 17, '2022-08-01', 300000),
(14, 17, '2022-10-01', 300000),
(15, 17, '2022-11-01', 300000),
(16, 16, '2022-06-01', 300000),
(17, 16, '2022-07-01', 300000),
(18, 16, '2022-08-01', 300000),
(19, 16, '2022-09-01', 300000),
(20, 16, '2022-10-01', 300000),
(21, 16, '2022-11-01', 300000),
(22, 15, '2022-06-01', 300000),
(23, 15, '2022-07-01', 300000),
(24, 15, '2022-08-01', 300000),
(25, 15, '2022-09-01', 300000),
(26, 15, '2022-10-01', 300000),
(27, 15, '2022-11-01', 300000),
(28, 14, '2022-06-01', 300000),
(29, 14, '2022-07-01', 300000),
(30, 14, '2022-08-01', 300000),
(31, 14, '2022-09-01', 300000),
(32, 14, '2022-10-01', 300000),
(33, 14, '2022-11-01', 300000),
(36, 13, '2022-06-01', 300000),
(37, 13, '2022-07-01', 300000),
(38, 13, '2022-08-01', 300000),
(39, 13, '2022-09-01', 300000),
(40, 13, '2022-10-01', 300000),
(41, 13, '2022-11-01', 300000),
(42, 12, '2022-06-01', 300000),
(43, 12, '2022-07-01', 300000),
(44, 12, '2022-08-01', 300000),
(45, 12, '2022-09-01', 300000),
(46, 12, '2022-10-01', 300000),
(47, 12, '2022-11-01', 300000),
(48, 11, '2022-06-01', 300000),
(49, 11, '2022-07-01', 300000),
(50, 11, '2022-08-01', 300000),
(51, 11, '2022-09-01', 300000),
(52, 11, '2022-10-01', 300000),
(53, 11, '2022-11-01', 300000),
(54, 10, '2022-06-01', 300000),
(55, 10, '2022-07-01', 300000),
(56, 10, '2022-08-01', 300000),
(57, 10, '2022-09-01', 300000),
(58, 10, '2022-10-01', 300000),
(59, 10, '2022-11-01', 300000),
(60, 9, '2022-06-01', 300000),
(61, 9, '2022-07-01', 300000),
(62, 9, '2022-08-01', 300000),
(63, 9, '2022-09-01', 300000),
(64, 9, '2022-10-01', 300000),
(65, 9, '2022-11-01', 300000),
(66, 8, '2022-06-01', 300000),
(67, 8, '2022-07-01', 300000),
(68, 8, '2022-08-01', 300000),
(69, 8, '2022-09-01', 300000),
(70, 8, '2022-10-01', 300000),
(71, 8, '2022-11-01', 300000),
(72, 7, '2022-06-01', 300000),
(73, 7, '2022-07-01', 300000),
(74, 7, '2022-08-01', 300000),
(75, 7, '2022-09-01', 300000),
(76, 7, '2022-10-01', 300000),
(77, 7, '2022-11-01', 300000),
(78, 6, '2022-06-01', 300000),
(79, 6, '2022-07-01', 300000),
(80, 6, '2022-08-01', 300000),
(81, 6, '2022-09-01', 300000),
(82, 6, '2022-10-01', 300000),
(83, 6, '2022-11-01', 300000),
(84, 5, '2022-06-01', 300000),
(85, 5, '2022-07-01', 300000),
(86, 5, '2022-08-01', 300000),
(87, 5, '2022-09-01', 300000),
(88, 5, '2022-10-01', 300000),
(89, 5, '2022-11-01', 300000),
(90, 4, '2022-06-01', 300000),
(91, 4, '2022-07-01', 300000),
(92, 4, '2022-08-01', 300000),
(93, 4, '2022-09-01', 300000),
(94, 4, '2022-10-01', 300000),
(95, 4, '2022-11-01', 300000),
(96, 17, '2022-09-01', 300000);

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
(8, 'Herwandi', '081377655505', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(9, 'Pamuji', '081368459191', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(10, 'H Muchsin', '081278447809', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(11, 'Zulkipli ', '085368100795', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(12, 'H. Yusuf', '08127170776', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(13, 'Edi', '0', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(14, 'Zulfikar', '081373641082', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek	'),
(15, 'H. M Nurazazi ', '0', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(16, 'Syamsudin', '0', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(17, 'Febri', '0', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(18, 'Iskandar', '0', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(19, 'Tarmizi ', '081364749838', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(20, 'Edison', '0', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(21, 'Jarno', '0', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(22, 'Ali Akbar', '0', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek'),
(23, 'Hajar', '085369487422', 'Gg. Selangat RT 06/RW 02 Kel. Selindung Baru, Kec. Gabek');

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
(1, 'Sumbangan Masyarakat'),
(2, 'Sumbangan Pemerintah');

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
(1, 'Biaya Bulanan'),
(2, 'Perbaikan Masjid'),
(3, 'Kebutuhan Lain');

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
(3, 'Shalat Berjamaah', 'Hajar', '085369487425'),
(4, 'Santunan Anak Yatim Piatu', 'H. Muchsin', '081278447809'),
(5, 'Pemakaman', 'Herwandi', '081377655505'),
(6, 'Taman Pendidikan Al-Qur\'an', 'Hajar', '085369487425'),
(7, 'Amil Zakat', 'Hamid', '085838185435'),
(8, 'Arisan Kurban', 'Tarmizi', '081364749838'),
(9, 'Jum\'at Berkah', 'Tarmizi', '081364749838'),
(10, 'Majelis Taklim', 'Hajar', '085369487425'),
(11, 'Kegiatan Sosial', 'Pamuji', '081368459191');

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
  `jenis` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `id_kategori`, `tanggal`, `nominal`, `keterangan`, `jenis`) VALUES
(4, 1, '2022-08-25', '6833000', 'Infaq dari Wandi ', 'pemasukan'),
(5, 1, '2022-08-25', '13102000', 'Uang masuk dari bendahara lama', 'pemasukan'),
(6, 1, '2022-09-02', '1000000', 'Infaq dari Alm. Kalsum Binti Yahya, dkk', 'pemasukan'),
(7, 1, '2022-09-02', '500000', 'Infaq dari Alm. Saknia Binti Samel', 'pemasukan'),
(8, 1, '2022-09-02', '500000', 'Infaq dari Alm. Piah Binti Romli', 'pemasukan'),
(9, 1, '2022-09-02', '500000', 'Infaq dari Alm. Aceng Bin Masirak', 'pemasukan'),
(10, 1, '2022-09-09', '1000000', 'Infaq dari Alm. M. Hatta Bin Sahabudin, dkk', 'pemasukan'),
(11, 1, '2022-09-30', '7440000', 'Infaq dari Budi Herwandi', 'pemasukan'),
(12, 1, '2022-10-07', '1000000', 'Infak dari Hamba Allah', 'pemasukan'),
(13, 1, '2022-10-16', '7164000', 'Infaq dari Herwandi', 'pemasukan'),
(14, 1, '2022-11-10', '1000000', 'Infaq pembayaran seng bekas', 'pemasukan');

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
  `jenis` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `id_kategori`, `tanggal`, `nominal`, `keterangan`, `jenis`) VALUES
(3, 2, '2022-08-25', '8500000', 'Pembelian keramik (Via Zulkifli Hamid)', 'pengeluaran'),
(4, 1, '2022-08-28', '400000', 'Bayar marbot Mang Jali', 'pengeluaran'),
(5, 1, '2022-08-31', '500000', 'Bayar marbot Tomar', 'pengeluaran'),
(6, 1, '2022-09-15', '600000', 'Bayar marbot mang Jali ', 'pengeluaran'),
(7, 3, '2022-09-15', '1000000', 'Bayar Infaq Majelis Yasin Tahlil ', 'pengeluaran'),
(8, 3, '2022-09-16', '480000', 'Beli parfum masjid ', 'pengeluaran'),
(9, 2, '2022-09-17', '3350000', 'Bayar upah tukang pasang keramik', 'pengeluaran'),
(10, 2, '2022-09-17', '30000', 'Beli semen putih ', 'pengeluaran'),
(11, 3, '2022-09-22', '1000000', 'Beli alat CCTV + biaya', 'pengeluaran'),
(12, 1, '2022-09-30', '400000', 'Bayar marbot mang Jali ', 'pengeluaran'),
(13, 1, '2022-10-01', '500000', 'Bayar marbot Tomar', 'pengeluaran'),
(14, 1, '2022-10-13', '600000', 'Bayar marbot mang Jali ', 'pengeluaran'),
(15, 3, '2022-10-14', '1000000', 'Urunan tahlil Ustad Ali wafa', 'pengeluaran'),
(16, 1, '2022-10-28', '400000', 'Bayar marbot mang Jali ', 'pengeluaran'),
(17, 1, '2022-11-01', '500000', 'Bayar marbot Tomar', 'pengeluaran'),
(18, 2, '2022-11-02', '5000000', 'Beli kanal ', 'pengeluaran'),
(19, 1, '2022-11-03', '1000000', 'Bayar marbot mang Jali', 'pengeluaran'),
(20, 3, '2022-11-09', '5241500', 'Pembelian Spandek', 'pengeluaran'),
(21, 2, '2022-11-12', '2500000', 'Bayar upah tukang', 'pengeluaran');

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
(1, 'gambar_profil2.png', 'Jalan Selangkat RT 006 / RW 002 Kelurahan Selindung Baru Kecamatan Gabek Kota Pangkalpinang, 33117', '081278447809', 'yayasannurulimanpkp@gmail.com', '167601001413537 (BRI)', 'Masjid Nurul Iman adalah sebuah masjid yang dibangun pada tahun 1992 yang terletak di Jalan Selangat, RT 006/RW 002 Kelurahan Selindung Baru Kecamatan Gabek Kota Pangkalpinang Provinsi Kepulauan Bangka Belitung. Masjid ini memiliki daya tampung jamaah sebanyak 300 jamaah, memiliki 65 pengurus, 1 orang imam tetap dan 3 orang imam cadangan, jumlah khatib sebanyak 12 orang, jumlah muadzin sebanyak 12 orang, dan jumlah remaja masjid sebanyak 15 orang. Adapun program yang diadakan oleh masjid ini meliputi shalat berjamaah, majelis taklim, jum’at berkah, arisan kurban, Taman Pendidikan Al-Qur’an, kegiatan hari besar islam, pemakaman, dan kegiatan sosial lainnya. Sejak berdirinya sampai dengan sekarang sudah banyak perubahan dan perbaikan yang dilakukan baik dari kondisi fisik bangunan masjid, sarana prasarana maupun pengelolaan masjid.');

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
(1, 'bagan_pengurus1.jpg', 65, 15, 1, 3, 12, 12);

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
(4, 23, 'admin', 'admin', 'Admin'),
(5, 10, 'bendahara', 'bendahara', 'Bendahara'),
(6, 9, 'sekretaris', 'sekretaris', 'Sekretaris');

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
  MODIFY `id_arisan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `berita_donasi`
--
ALTER TABLE `berita_donasi`
  MODIFY `id_berita` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `cicil_arisan_kurban`
--
ALTER TABLE `cicil_arisan_kurban`
  MODIFY `id_cicil_arisan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  MODIFY `id_jamaah` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `kategori_pemasukan`
--
ALTER TABLE `kategori_pemasukan`
  MODIFY `id_kategori_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_pengeluaran`
--
ALTER TABLE `kategori_pengeluaran`
  MODIFY `id_kategori_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
