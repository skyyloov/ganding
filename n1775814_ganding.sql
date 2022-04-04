-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Apr 2022 pada 13.45
-- Versi server: 10.5.13-MariaDB-cll-lve
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n1775814_ganding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'majubersama'),
(3, 'ppic', 'gandingtoolsindo'),
(4, 'marketing', 'gandingtoolsindo'),
(5, 'purchasing', 'gandingtoolsindo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_type`
--

CREATE TABLE `book_type` (
  `sku` varchar(150) NOT NULL,
  `weight_stuff` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_customer` char(75) NOT NULL,
  `alamat` char(100) NOT NULL,
  `kontak` char(50) NOT NULL,
  `email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama_customer`, `alamat`, `kontak`, `email`) VALUES
(1, 'Inti Ganda Perdana', 'Jalan Penggangsaan Dua, Kelapa Gading', '021-4602755', ''),
(2, 'Panasonic Manufacturing Indonesia', 'Jl. Raya Jakarta-Bogor No. KM.29 RW. 3, Pekayon, Jakarta Timur, DKI Jakarta', '', ''),
(3, 'Sakura Manufacturing Auto Parts Indonesia', 'Jl. Akasia II Blok AE No. 47, Sukaresmi, Cikarang Selatan, Sukaresmi, Kabupaten Bekasi, Jawa Barat', '', ''),
(4, 'Sakura Java Indonesia', 'Jl. Kawasan Industri Ejip No. 1, Ciantra, Kabupaten Bekasi, Jawa Barat', '', ''),
(5, 'Sanoh Indonesia', 'Kawasan Industri Hyundai, Jl. Inti II No. 10, Sukaresmi, Kabupaten Bekasi, Jawa Barat', '', ''),
(6, 'Exedy Manufacturing Indonesia', 'Jalan Permata V Lot EE-3, Kawasan Industri KIIC, Sirnabaya, Kec. Telukjambe Tim., Kabupaten Karawang', '', ''),
(7, 'Chandra Nugerah Cemerlang', 'Jl. Akasia 2 Blok AE No. 25 Delta Silikon Industrial Park, Lippo Cikarang-Bekasi', '', ''),
(8, 'Sanden Indonesia', 'Kawasan Industri Deltamas KITIC Kav. No. 7A & 8, Nagasari, Serang Baru, Nagasari, Kec. Serang Baru,', '', ''),
(9, 'Cipta Nissin Industries', 'Jalan Raya Bekasi No. KM 23', '', ''),
(10, 'Fukoku Tokai Rubber', 'Jalan Industri Selatan 6A Blok GG No. 6A-F, Jl. Kw. Industri Jl. Jababeka Raya, Pasirsari, Cikarang', '', ''),
(11, 'Wijaya Karya Industri & Konstruksi', 'Kawasan Industri WIKA, Jl. Raya Narogong KM 26, Cileungsi - Kab. Bogor 16820', '', ''),
(14, 'Haeir Electrical Appliances Indonesia', 'EJIP Industrial Park Plot 1A no.2, Sukaresmi, Cikarang Sel., Kabupaten Bekasi, Jawa Barat 17550', '', ''),
(15, 'Tiger Sash Indonesia', 'Jl. Teuku Umar Km. 29B Telaga Asih, Cikarang Barat, Bekasi', '(021) 88395367', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disk_type`
--

CREATE TABLE `disk_type` (
  `sku` varchar(150) NOT NULL,
  `size_stuff` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `finishgood`
--

CREATE TABLE `finishgood` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_fg` int(11) NOT NULL,
  `qty_need` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `finishgood`
--

INSERT INTO `finishgood` (`id`, `id_part`, `id_fg`, `qty_need`) VALUES
(49, 181, 6, 1),
(50, 129, 6, 1),
(51, 131, 7, 1),
(52, 159, 7, 1),
(53, 13, 8, 1),
(54, 178, 8, 1),
(55, 14, 9, 1),
(56, 179, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `furniture_type`
--

CREATE TABLE `furniture_type` (
  `sku` varchar(150) NOT NULL,
  `height_stuff` float NOT NULL,
  `width_stuff` float NOT NULL,
  `lenght_stuff` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `historysubcont`
--

CREATE TABLE `historysubcont` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `no_po_supplier` char(100) NOT NULL,
  `quantitykirim` int(11) NOT NULL,
  `quantitydatang` int(11) NOT NULL,
  `ng` int(11) NOT NULL,
  `keterangan` char(150) NOT NULL,
  `status` char(50) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_pocust`
--

CREATE TABLE `history_pocust` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(70) NOT NULL,
  `idpoasli` int(11) NOT NULL,
  `tgl_po` date NOT NULL,
  `revisi_po` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `qty_pcs` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_posup`
--

CREATE TABLE `history_posup` (
  `id` int(11) NOT NULL,
  `tglpo` date NOT NULL,
  `idpolama` int(11) NOT NULL,
  `revisi_po` int(11) NOT NULL,
  `qty_po` char(10) NOT NULL,
  `tgl_dtg1` date NOT NULL,
  `qty_dtg1` int(11) NOT NULL,
  `tgl_dtg2` date NOT NULL,
  `qty_dtg2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history_posup`
--

INSERT INTO `history_posup` (`id`, `tglpo`, `idpolama`, `revisi_po`, `qty_po`, `tgl_dtg1`, `qty_dtg1`, `tgl_dtg2`, `qty_dtg2`) VALUES
(1, '2022-03-29', 11, 0, '4497', '2022-03-29', 4497, '0000-00-00', 0),
(2, '2022-03-29', 19, 0, '4530', '2022-03-29', 4530, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalproduksi`
--

CREATE TABLE `jadwalproduksi` (
  `id` int(11) NOT NULL,
  `nama_operator` char(50) NOT NULL,
  `nama_mesin` char(50) NOT NULL,
  `tanggal` date NOT NULL,
  `qty_in` int(11) NOT NULL,
  `nama_proses` char(50) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `kodepart` char(50) NOT NULL,
  `wip` char(50) NOT NULL,
  `walkinproses` char(50) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporanproduksi`
--

CREATE TABLE `laporanproduksi` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `proses` char(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ng` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporanproduksi`
--

INSERT INTO `laporanproduksi` (`id`, `id_part`, `proses`, `quantity`, `ng`, `keterangan`, `tanggal`) VALUES
(1, 128, '1', 1000, 0, '', '2022-03-29 15:39:57'),
(2, 128, '2', 1000, 0, '', '2022-03-29 15:41:50'),
(3, 128, '3', 1000, 0, '', '2022-03-29 15:42:12'),
(4, 127, '1', 1312, 0, '', '2022-03-29 15:48:25'),
(5, 127, '2', 1312, 0, '', '2022-03-29 15:48:55'),
(6, 127, '3', 1312, 0, '', '2022-03-29 15:49:27'),
(7, 4, '1', 1000, 0, '', '2022-03-29 20:36:45'),
(8, 4, '2', 1000, 0, '', '2022-03-29 20:37:05'),
(9, 4, '3', 1000, 0, '', '2022-03-29 20:37:22'),
(10, 4, '4', 1000, 0, '', '2022-03-29 20:37:49'),
(11, 140, '1', 636, 0, '', '2022-03-29 20:40:37'),
(12, 143, '1', 74, 0, '', '2022-03-29 20:41:08'),
(13, 143, '2', 74, 0, '', '2022-03-29 20:41:30'),
(14, 143, '3', 74, 0, '', '2022-03-29 20:41:55'),
(15, 143, '4', 74, 0, '', '2022-03-29 20:48:23'),
(16, 143, '5', 74, 0, '', '2022-03-29 20:48:51'),
(17, 143, '6', 74, 0, '', '2022-03-29 20:49:14'),
(18, 143, '7', 74, 0, '', '2022-03-29 20:49:32'),
(19, 142, '1', 278, 0, '', '2022-03-29 20:51:30'),
(20, 142, '2', 278, 0, '', '2022-03-29 20:51:57'),
(21, 142, '3', 278, 0, '', '2022-03-29 20:52:18'),
(22, 142, '4', 278, 0, '', '2022-03-29 20:52:43'),
(23, 142, '5', 278, 0, '', '2022-03-29 20:53:12'),
(24, 142, '6', 278, 0, '', '2022-03-29 20:53:33'),
(25, 142, '7', 278, 0, '', '2022-03-29 20:53:52'),
(26, 6, '1', 1613, 0, '', '2022-03-29 20:54:19'),
(27, 6, '2', 1252, 0, '', '2022-03-29 20:54:47'),
(28, 84, '1', 1000, 0, '', '2022-03-29 20:58:27'),
(29, 84, '2', 1000, 0, '', '2022-03-29 20:59:05'),
(30, 84, '3', 1000, 0, '', '2022-03-29 20:59:25'),
(31, 183, '1', 50, 0, '', '2022-03-29 20:59:46'),
(32, 183, '2', 50, 0, '', '2022-03-29 21:00:21'),
(33, 3, '1', 3585, 0, '', '2022-03-29 21:00:51'),
(34, 3, '2', 2585, 0, '', '2022-03-29 21:01:33'),
(35, 3, '3', 2585, 0, '', '2022-03-29 21:02:05'),
(36, 35, '1', 4483, 0, '', '2022-03-29 21:50:46'),
(37, 36, '1', 8482, 0, '', '2022-03-29 21:51:36'),
(38, 36, '2', 2116, 0, '', '2022-03-29 21:53:28'),
(39, 37, '1', 1000, 0, '', '2022-03-29 21:53:55'),
(40, 38, '1', 2667, 0, '', '2022-03-29 21:54:39'),
(41, 20, '1', 4530, 0, '', '2022-03-29 22:19:15'),
(42, 20, '2', 4530, 0, '', '2022-03-29 22:19:46'),
(43, 20, '3', 4530, 0, '', '2022-03-29 22:20:10'),
(44, 22, '1', 7239, 0, '', '2022-03-30 00:59:48'),
(45, 22, '2', 6439, 0, '', '2022-03-30 01:00:09'),
(46, 19, '1', 600, 0, '', '2022-03-30 01:01:13'),
(47, 130, '1', 500, 0, '', '2022-03-30 01:02:00'),
(48, 19, '2', 600, 0, '', '2022-03-30 01:02:46'),
(49, 130, '2', 500, 0, '', '2022-03-30 01:03:05'),
(50, 158, '1', 812, 0, '', '2022-03-30 01:06:44'),
(51, 158, '2', 700, 0, '', '2022-03-30 01:07:25'),
(52, 158, '3', 700, 0, '', '2022-03-30 01:07:50'),
(53, 23, '1', 2770, 0, '', '2022-03-30 01:32:20'),
(54, 25, '1', 8200, 0, '', '2022-03-30 01:32:54'),
(55, 31, '1', 2804, 0, '', '2022-03-30 02:11:51'),
(56, 33, '1', 8328, 0, '', '2022-03-30 02:12:36'),
(57, 33, '2', 3310, 0, '', '2022-03-30 02:13:28'),
(58, 33, '3', 3310, 0, '', '2022-03-30 08:33:33'),
(59, 34, '1', 483, 0, '', '2022-03-30 08:36:04'),
(60, 29, '1', 396, 0, '', '2022-03-30 08:38:04'),
(61, 133, '1', 702, 0, '', '2022-03-30 08:40:54'),
(62, 133, '2', 702, 0, '', '2022-03-30 08:41:12'),
(63, 27, '1', 11000, 0, '', '2022-03-30 08:43:32'),
(64, 47, '1', 3900, 0, '', '2022-03-30 08:46:18'),
(65, 47, '2', 2700, 0, '', '2022-03-30 08:49:20'),
(66, 47, '3', 2700, 0, '', '2022-03-30 08:49:50'),
(67, 47, '4', 2700, 0, '', '2022-03-30 08:50:11'),
(68, 28, '1', 138, 0, '', '2022-03-30 08:59:15'),
(69, 173, '1', 800, 0, '', '2022-03-30 09:09:21'),
(70, 173, '2', 800, 0, '', '2022-03-30 09:09:55'),
(71, 173, '3', 800, 0, '', '2022-03-30 09:10:22'),
(72, 173, '4', 800, 0, '', '2022-03-30 09:10:36'),
(73, 173, '5', 800, 0, '', '2022-03-30 09:10:50'),
(74, 173, '6', 800, 0, '', '2022-03-30 09:11:05'),
(75, 131, '1', 5000, 0, '', '2022-03-30 09:17:05'),
(76, 185, '1', 7992, 0, '', '2022-03-30 09:57:39'),
(77, 185, '2', 6450, 0, '', '2022-03-30 09:58:14'),
(78, 185, '3', 6450, 0, '', '2022-03-30 09:58:33'),
(79, 185, '4', 6450, 0, '', '2022-03-30 09:58:52'),
(80, 186, '1', 1197, 0, '', '2022-03-30 09:59:21'),
(81, 186, '2', 1197, 0, '', '2022-03-30 09:59:44'),
(82, 186, '3', 1197, 0, '', '2022-03-30 10:00:07'),
(83, 186, '4', 1197, 0, '', '2022-03-30 10:00:29'),
(84, 188, '1', 1000, 0, '', '2022-03-30 10:01:34'),
(85, 188, '2', 1000, 0, '', '2022-03-30 10:01:53'),
(86, 187, '1', 8190, 0, '', '2022-03-30 10:03:03'),
(87, 187, '2', 6599, 0, '', '2022-03-30 10:03:25'),
(88, 176, '1', 895, 0, '', '2022-03-30 10:03:52'),
(89, 176, '2', 895, 0, '', '2022-03-30 10:04:20'),
(90, 176, '3', 895, 0, '', '2022-03-30 10:04:35'),
(91, 176, '4', 895, 0, '', '2022-03-30 10:04:50'),
(92, 176, '5', 895, 0, '', '2022-03-30 10:05:05'),
(93, 177, '1', 2719, 0, '', '2022-03-30 10:05:39'),
(94, 177, '2', 2719, 0, '', '2022-03-30 10:06:00'),
(95, 177, '3', 2719, 0, '', '2022-03-30 10:06:16'),
(96, 177, '4', 2719, 0, '', '2022-03-30 10:06:31'),
(97, 177, '5', 2719, 0, '', '2022-03-30 10:06:52'),
(98, 40, '1', 702, 0, '', '2022-03-30 10:45:16'),
(99, 40, '2', 702, 0, '', '2022-03-30 10:45:39'),
(100, 41, '1', 2020, 0, '', '2022-03-30 10:46:06'),
(101, 42, '1', 471, 0, '', '2022-03-30 10:46:25'),
(102, 41, '2', 2020, 0, '', '2022-03-30 10:46:53'),
(103, 42, '2', 471, 0, '', '2022-03-30 10:47:14'),
(104, 43, '1', 712, 0, '', '2022-03-30 10:48:26'),
(105, 43, '2', 712, 0, '', '2022-03-30 10:48:55'),
(106, 44, '1', 1576, 0, '', '2022-03-30 10:49:21'),
(107, 44, '2', 1576, 0, '', '2022-03-30 10:49:40'),
(108, 44, '3', 1576, 0, '', '2022-03-30 10:49:59'),
(109, 136, '1', 2814, 0, '', '2022-03-30 10:50:43'),
(110, 137, '1', 995, 0, '', '2022-03-30 10:51:03'),
(111, 136, '2', 2814, 0, '', '2022-03-30 10:51:58'),
(112, 137, '2', 987, 0, '', '2022-03-30 10:52:14'),
(113, 136, '3', 2814, 0, '', '2022-03-30 10:52:38'),
(114, 137, '3', 987, 0, '', '2022-03-30 10:52:56'),
(115, 136, '4', 2814, 0, '', '2022-03-30 10:53:12'),
(116, 137, '4', 987, 0, '', '2022-03-30 10:53:27'),
(117, 39, '1', 269, 0, '', '2022-03-30 10:57:06'),
(118, 39, '2', 269, 0, '', '2022-03-30 10:57:20'),
(119, 138, '1', 152, 0, '', '2022-03-30 10:57:42'),
(120, 1, '1', 765, 0, '', '2022-03-30 11:15:31'),
(121, 2, '1', 500, 0, '', '2022-03-30 11:15:55'),
(122, 2, '2', 500, 0, '', '2022-03-30 11:16:12'),
(123, 2, '3', 500, 0, '', '2022-03-30 11:16:30'),
(124, 15, '1', 1415, 0, '', '2022-03-30 12:06:54'),
(125, 15, '2', 42, 0, '', '2022-03-30 13:59:38'),
(126, 15, '3', 42, 0, '', '2022-03-30 14:00:15'),
(127, 15, '4', 42, 0, '', '2022-03-30 14:00:43'),
(128, 15, '5', 42, 0, '', '2022-03-30 14:01:21'),
(129, 15, 'spot1', 42, 0, '', '2022-03-30 14:11:40'),
(130, 13, '1', 797, 0, '', '2022-03-30 15:20:07'),
(131, 13, '2', 457, 0, '', '2022-03-30 15:20:26'),
(132, 10, '1', 1660, 0, '', '2022-03-30 15:29:38'),
(133, 17, '1', 2020, 0, '', '2022-03-30 15:37:37'),
(134, 17, '2', 520, 0, '', '2022-03-30 15:38:04'),
(135, 12, '1', 430, 0, '', '2022-03-30 15:39:13'),
(136, 12, '2', 430, 0, '', '2022-03-30 15:39:34'),
(137, 178, '1', 457, 0, '', '2022-04-01 08:44:53'),
(138, 178, '2', 457, 0, '', '2022-04-01 08:45:11'),
(139, 178, '3', 457, 0, '', '2022-04-01 08:45:34'),
(140, 178, '4', 457, 0, '', '2022-04-01 08:45:49'),
(141, 13, '3', 457, 0, '', '2022-04-01 08:47:40'),
(142, 13, '4', 457, 0, '', '2022-04-01 08:47:59'),
(143, 14, '1', 4820, 0, '', '2022-04-01 08:49:18'),
(144, 14, '2', 282, 0, '', '2022-04-01 08:51:46'),
(145, 14, '3', 282, 0, '', '2022-04-01 08:52:26'),
(146, 14, '4', 282, 0, '', '2022-04-01 08:52:44'),
(147, 179, '1', 1795, 0, '', '2022-04-01 08:53:28'),
(148, 179, '2', 282, 0, '', '2022-04-01 08:53:50'),
(149, 179, '3', 282, 0, '', '2022-04-01 08:54:08'),
(150, 179, '4', 282, 0, '', '2022-04-01 08:54:25'),
(151, 129, '1', 162, 0, '', '2022-04-01 08:55:17'),
(152, 129, '2', 162, 0, '', '2022-04-01 08:55:32'),
(153, 129, '3', 162, 0, '', '2022-04-01 08:55:49'),
(154, 129, '4', 162, 0, '', '2022-04-01 08:56:04'),
(155, 181, '1', 562, 0, '', '2022-04-01 08:56:30'),
(156, 181, '2', 162, 0, '', '2022-04-01 08:56:47'),
(157, 181, '3', 162, 0, '', '2022-04-01 08:57:02'),
(158, 181, '4', 162, 0, '', '2022-04-01 08:57:18'),
(159, 11, '1', 524, 0, '', '2022-04-01 08:58:47'),
(160, 11, '2', 524, 0, '', '2022-04-01 08:59:03'),
(161, 132, '1', 2962, 0, '', '2022-04-01 09:49:08'),
(162, 156, '1', 79, 0, '', '2022-04-01 09:50:15'),
(163, 156, '2', 8, 0, '', '2022-04-01 09:50:32'),
(164, 156, '3', 8, 0, '', '2022-04-01 09:50:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `part`
--

CREATE TABLE `part` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `kode_part` char(50) NOT NULL,
  `nama_customer` char(50) NOT NULL,
  `berat_jenis` char(25) NOT NULL,
  `kg_sheet` float NOT NULL,
  `pcs_sheet` float NOT NULL,
  `kg_pcs` float NOT NULL,
  `sheet_lembar` float NOT NULL,
  `spec` char(25) NOT NULL,
  `tebal` char(25) NOT NULL,
  `lebar` char(25) NOT NULL,
  `panjang` char(25) NOT NULL,
  `proses` char(25) NOT NULL,
  `pcs_lembar` float NOT NULL,
  `spot` char(25) NOT NULL,
  `nut` int(11) NOT NULL,
  `nut2` int(11) NOT NULL,
  `unit_material` char(25) NOT NULL,
  `foto` char(100) NOT NULL,
  `diameter` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `part`
--

INSERT INTO `part` (`id`, `id_customer`, `nama_part`, `kode_part`, `nama_customer`, `berat_jenis`, `kg_sheet`, `pcs_sheet`, `kg_pcs`, `sheet_lembar`, `spec`, `tebal`, `lebar`, `panjang`, `proses`, `pcs_lembar`, `spot`, `nut`, `nut2`, `unit_material`, `foto`, `diameter`) VALUES
(1, 1, 'Bracket Tube Clamp BZ120', '47381-BZ120#106210010', 'Inti Ganda Perdana', '7.85', 1.43, 34, 0.04, 37, 'SPHCPO', '2.3', '65', '1219', '3', 1258, 'spot', 1, 0, 'lembar', '1644820999_7a3392e386813108df61.png', 0),
(2, 1, 'Bracket Flexible Hose BZ140', '47351-BZ140#199730010', 'Inti Ganda Perdana', '7.85', 1.76, 30, 0.06, 30, 'SPHCPO', '2.3', '80', '1219', '3', 900, 'nonspot', 0, 0, 'lembar', '1644823133_0f9f8927482f9fbc24a0.png', 0),
(3, 3, 'REINFORCEMENT 3', '1FD-E476F-0000-S0305', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 1.84, 20, 0.09, 18, 'SUS409L', '1.5', '130', '1219', '3', 360, 'nonspot', 0, 0, 'sheet', '1644830234_13dd25d1e4fb00395c38.png', 0),
(4, 3, 'Body Silincer 1 1WD', '1WD-E466A-0000-S0905', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 0.98, 1, 0.98, 7, 'SUS409L', '1.2', '340', '310', '4', 7, 'nonspot', 0, 0, 'sheet', '1644830298_b1f9c1dc635d6dc07aec.png', 0),
(5, 3, 'Body Silincer 2 1WD', '1WD-E466E-D000-S0905', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 1.26, 1, 1.26, 6, 'SUS409L', '1.2', '356', '380', '7', 6, 'nonspot', 0, 0, 'sheet', '1644832189_114317cae147c47bff32.png', 0),
(6, 3, 'Plate 3 1WD', '1WD-E469K-0000-S0305', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 1.59, 9, 0.18, 17, 'SUS409L', '1.2', '140', '1219', '2', 153, 'nonspot', 0, 0, 'sheet', '1644832273_cb12817db29e9c6a3b60.png', 0),
(7, 3, 'Body 2-1 1WD', '1WD-E472A-0000-S0305', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 0.18, 1, 0.18, 0, 'SUS409L', '0.8', '190', '150', '3', 0, 'nonspot', 0, 0, 'coil', '1644832341_a03ea0deff5d643bfa67.png', 0),
(8, 3, 'Body 2-2 1WD', '1WD-E472E-0000-S0305', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 0.18, 1, 0.18, 0, 'SUS409L', '0.8', '190', '150', '3', 0, 'nonspot', 0, 0, 'coil', '1644832389_8594d48e37825e5dfd6e.png', 0),
(9, 3, 'Body 2-3 1WD', '1WD-E472F-0000-S0305', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 0.33, 1, 0.33, 0, 'SUS409L', '0.8', '150', '350', '3', 0, 'nonspot', 0, 0, 'coil', '1644832447_f8bdea48d3c4f554a7c1.png', 0),
(10, 4, 'Bracket 4-1 1DY', '1DY-E474K-0000-0305', 'Sakura Java Indonesia', '7.85', 0.07, 1, 0.07, 0, 'SPHCPO', '1.6', '78', '73', '1', 0, 'nonspot', 0, 0, 'coil', '1644828441_74ea404197099875ae3a.png', 0),
(11, 4, 'Bracket 4-2 1DY', '1DY-E474L-0000-0305', 'Sakura Java Indonesia', '7.85', 0.1, 1, 0.1, 0, 'SPHCPO', '1.6', '66', '121', '2', 0, 'nonspot', 0, 0, 'coil', '1644828488_b110a1c9e03e62ff5486.png', 0),
(12, 4, 'Stay Muff 2-1 1FD', '1FD-E4781-0000-0305', 'Sakura Java Indonesia', '7.85', 0.1, 1, 0.1, 0, 'SPHCPO', '2.6', '76', '65', '2', 0, 'nonspot', 0, 0, 'coil', '1644828562_e761f34d3fab682b90ad.png', 0),
(13, 4, 'Pipe Silincer 2 CP 1WD', '1WD-E466J-0000-0305', 'Sakura Java Indonesia', '7.75', 1.17, 4, 0.29, 18, 'SUS409L', '1.2', '130', '970', '4', 72, 'nonspot', 0, 0, 'sheet', '1644828662_1886f0a98ce0bc422422.png', 0),
(14, 4, 'Pipe Silincer 5 CP 1WD', '1WD-E466M-0000-0305', 'Sakura Java Indonesia', '7.75', 2.49, 5, 0.5, 11, 'SUS409L', '1.2', '220', '1219', '4', 55, 'nonspot', 0, 0, 'sheet', '1644828731_31c89f2feee0f52bd21f.png', 0),
(15, 4, 'Bracket 3-2 CP 1WD', '1WD-E473L-0000-0310', 'Sakura Java Indonesia', '7.75', 3.83, 10, 0.38, 9, 'SUS409L', '1.5', '270', '1219', '5', 90, 'spot', 3, 0, 'sheet', '1644826227_da5e2ab0b716a81efac2.png', 0),
(16, 4, 'Stay Muff 2-1 2PH', '2PH-E4781-0000-0305', 'Sakura Java Indonesia', '7.85', 0.16, 2, 0.08, 0, 'SPHCPO', '2.6', '170', '45', '3', 0, 'nonspot', 0, 0, 'coil', '1644828876_14b75b0e09a8cd4b659c.png', 0),
(17, 4, 'Stay Muff 2-1 5D9', '5D9-E4781-0100-0305', 'Sakura Java Indonesia', '7.85', 0.1, 1, 0.1, 0, 'SPHCPO', '2.6', '76', '65', '2', 0, 'nonspot', 0, 0, 'coil', '1644828949_048884be026a2ed9c720.png', 0),
(19, 5, 'BRACKET NO. 1', '51870-73R00-B1', 'Sanoh Indonesia', '7.85', 1.29, 51, 0.03, 29, 'JSH270CN', '1.6', '84', '1219', '2', 1479, 'nonspot', 0, 0, 'lembar', '1644994207_d39705fce1ed18973abe.png', 0),
(20, 5, 'BRACKET NO 1', '17830-73R00-01', 'Sanoh Indonesia', '7.85', 1.07, 40, 0.03, 34, 'YSC270CC', '1.6', '70', '1219', '3', 1360, 'nonspot', 0, 0, 'lembar', '1644994244_e92d032c60147c809fe3.png', 0),
(21, 5, 'BRACKET NO.  2', '17830-73R00-02', 'Sanoh Indonesia', '7.85', 1.07, 26, 0.04, 34, 'YSC270CC', '1.6', '70', '1219', '2', 884, 'nonspot', 0, 0, 'lembar', '1644994293_f6c64ad1e9d345bc9545.png', 0),
(22, 5, 'BRACKET NO. 3', '17830-73R00-03', 'Sanoh Indonesia', '7.85', 1.14, 48, 0.02, 28, 'YSC270CC', '1.4', '85', '1219', '2', 1344, 'nonspot', 0, 0, 'lembar', '1644994346_6b887a33f2952ed43c9b.png', 0),
(23, 6, 'WASHER K16', '3B3101050000Q999', 'Exedy Manufacturing Indonesia', '7.85', 0.15, 1, 0.15, 0, 'SAPH440-P', '2.0', '100', '98', '1', 0, 'nonspot', 0, 0, 'coil', '1644906649_9ed5cd41bafb24104d7f.png', 0),
(24, 6, 'WASHER G20', '3B2701050000Q999', 'Exedy Manufacturing Indonesia', '7.85', 0.2, 1, 0.2, 0, 'SAPH440-P', '2.0', '115', '112', '2', 0, 'nonspot', 0, 0, 'coil', '1644906735_367232c1795404e9e2ab.png', 0),
(25, 6, 'NUT RAW EXEDY', '390250900000Q010', 'Exedy Manufacturing Indonesia', '7.85', 0.4, 5, 0.08, 0, 'JSH270C-P', '4.0', '232', '55', '1', 0, 'nonspot', 0, 0, 'coil', '1644906969_cd5005e0e52529cc8ad1.png', 0),
(26, 6, 'NUT STA EXEDY', '3B5409000000Q010', 'Exedy Manufacturing Indonesia', '7.85', 0.45, 6, 0.08, 0, 'JSH270C-P', '3.8', '273', '55', '1', 0, 'nonspot', 0, 0, 'coil', '1644907034_dd844eca74e359a03589.png', 0),
(27, 10, 'PLATE FOR INSULATOR ENGINE MTG. RR', '14-08277-A01', 'Fukoku Tokai Rubber', '7.85', 0.6, 36, 0.02, 54, 'SPCCSD', '1.4', '45', '1219', '1', 1944, 'nonspot', 0, 0, 'sheet', '1644913233_fac8654518f25345bc19.png', 0),
(28, 10, 'PLATE FOR CAB. MOUNTING UPPER', '14-07464-A00', 'Fukoku Tokai Rubber', '7.85', 3.29, 12, 0.27, 28, 'SAPH440', '4.0', '86', '1219', '1', 336, 'nonspot', 0, 0, 'sheet', '1644913354_7f96ae1aecc1c89cde7a.png', 0),
(29, 10, 'NEW CENTER CUSHION RAD SUPPORT UPPER', '13-07273-A00', 'Fukoku Tokai Rubber', '7.85', 2.49, 31, 0.08, 24, 'SPHCPO', '2.6', '100', '1219', '1', 744, 'nonspot', 0, 0, 'sheet', '1644913472_e394b23b498193d73018.png', 0),
(30, 10, 'INSULATOR ENGINE MOUNTING FR', '13-08793-A01', 'Fukoku Tokai Rubber', '7.85', 4.52, 20, 0.23, 23, 'SAPH440', '4.5', '105', '1219', '4', 460, 'nonspot', 0, 0, 'sheet', '1644913711_b8231cd28d7e3b8d6e2c.png', 0),
(31, 10, 'UPPER PLATE FOR INSULATOR ENG. MTG. RH', '12-06836-A01', 'Fukoku Tokai Rubber', '7.85', 6.37, 13, 0.49, 16, 'SPHCPO', '4.5', '148', '1219', '2', 208, 'nonspot', 0, 0, 'sheet', '1644913888_68daf05fc9fbc79a17ee.png', 0),
(32, 10, 'PLATE FOR CAB. MOUNTING LOWER', '14-07465-A00', 'Fukoku Tokai Rubber', '7.85', 4.65, 32, 0.15, 16, 'SPHCPO', '3.2', '152', '1219', '4', 512, 'nonspot', 0, 0, 'sheet', '1644914025_e458358b62ac5a0aa533.png', 0),
(33, 10, 'PLATE FOR INSULATOR ENGINE MTG. RR', '13-09070-A00', 'Fukoku Tokai Rubber', '7.85', 10.33, 10, 1.03, 13, 'SPHCPO', '6.0', '180', '1219', '3', 130, 'nonspot', 0, 0, 'sheet', '1644914172_0c0177436390407b8210.png', 0),
(34, 10, 'NEW CENTER BUMPER RUBBER FRONT', '13-07271-A02', 'Fukoku Tokai Rubber', '7.85', 5.66, 16, 0.35, 13, 'SPHCPO', '3.2', '185', '1219', '1', 208, 'nonspot', 0, 0, 'sheet', '1644914281_d3a18a5d26e349d8cf1f.png', 0),
(35, 8, 'B1M-CLAMP ASSY', 'N1451-D0360', 'Sanden Indonesia', '7.85', 0.94, 38, 0.02, 24, 'SPCC-SD', '1.0', '98', '1219', '3', 912, 'nonspot', 0, 0, 'lembar', '1644911343_0e9ff94c0921cacc7d72.png', 0),
(36, 8, 'B1M-BRACKET 2', 'N1451-D0390', 'Sanden Indonesia', '7.85', 1.39, 40, 0.03, 16, 'YSC270CC', '1.0', '145', '1219', '2', 640, 'nonspot', 0, 0, 'lembar', '1644911439_073dd0c1f53ec13e3811.png', 0),
(37, 8, 'B1M-CLAMP', 'N1451-D0400', 'Sanden Indonesia', '7.85', 1.2, 39, 0.03, 19, 'SPCC-SD', '1.0', '125', '1219', '3', 741, 'nonspot', 0, 0, 'lembar', '1644911711_155f4861f0fb29e3082a.png', 0),
(38, 8, 'B1M-CLAMP', 'N1451-D0430', 'Sanden Indonesia', '7.85', 1.53, 49, 0.03, 15, 'YSC270CC', '1.0', '160', '1219', '3', 735, 'nonspot', 0, 0, 'lembar', '1644912354_36d61cad71b7ad97cb89.png', 0),
(39, 9, 'ARM MSA-7000 LH', '30001100', 'Cipta Nissin Industries', '7.85', 1.72, 11, 0.16, 60, 'SS400', '4.5', '40', '1219', '2', 660, 'nonspot', 0, 0, 'lembar', '1644916645_fbb7af9500ff8a685580.png', 0),
(40, 9, 'BRACKET 1 INTAKE REAR', '121207032', 'Cipta Nissin Industries', '7.85', 4.65, 34, 0.14, 16, 'SPHCPO', '3.2', '152', '1219', '2', 544, 'nonspot', 0, 0, 'lembar', '1644916789_cd9809c6a6bac1905acf.png', 0),
(41, 9, 'STAY 2 INTAKE REAR', '121208032', 'Cipta Nissin Industries', '7.85', 2.88, 33, 0.09, 25, 'SPHCPO', '3.2', '94', '1219', '2', 825, 'nonspot', 0, 0, 'lembar', '1644916874_4e73b6f5a43b5326fb13.png', 0),
(42, 9, 'STAY 3 INTAKE REAR', '121209032', 'Cipta Nissin Industries', '7.85', 3.18, 33, 0.1, 23, 'SPHCPO', '3.2', '104', '1219', '2', 759, 'nonspot', 0, 0, 'lembar', '1644916930_5a64a85b608b375f4d54.png', 0),
(43, 9, 'BRACKET 4 INTAKE REAR', '121210032', 'Cipta Nissin Industries', '7.85', 3.18, 33, 0.1, 23, 'SPHCPO', '3.2', '104', '1219', '2', 759, 'nonspot', 0, 0, 'lembar', '', 0),
(44, 9, 'BRACKET INTAKE FRONT', '121234032', 'Cipta Nissin Industries', '7.85', 2.36, 14, 0.17, 31, 'SPHCPO', '3.2', '77', '1219', '3', 434, 'nonspot', 0, 0, 'lembar', '1644917181_c5d835ad6d392b710daa.png', 0),
(47, 10, 'THROWER FOR PULLEY DAMPER', 'A4-01397-Z16', 'Fukoku Tokai Rubber', '7.85', 1.05, 11, 0.1, 22, 'SPCCSD', '1.0', '110', '1219', '4', 242, 'nonspot', 0, 0, 'sheet', '1644914995_1a2492de9d937ce91d86.png', 0),
(48, 7, 'GUARD 0918A', '55020-0918A', 'Chandra Nugerah Cemerlang', '7.85', 2.27, 11, 0.21, 32, 'SPHCPO', '3.2', '74', '1219', '2', 352, 'nonspot', 0, 0, 'lembar', '1644908255_3d23ab1eab7348e118d7.png', 0),
(49, 7, 'GUARD 0919A', '55020-0919A', 'Chandra Nugerah Cemerlang', '7.85', 3.61, 11, 0.33, 20, 'SPHCPO', '3.2', '118', '1219', '2', 220, 'nonspot', 0, 0, 'lembar', '1644908356_4692f66122283d26d2d2.png', 0),
(50, 7, 'GUARD 0920A', '55020-0920A', 'Chandra Nugerah Cemerlang', '7.85', 4.47, 17, 0.26, 16, 'SPHCPO', '3.2', '146', '1219', '2', 272, 'nonspot', 0, 0, 'lembar', '1644908473_72085fbc7b0a0fde539d.png', 0),
(51, 7, 'BRKT PIPE B6G', 'B6G-F133K-00', 'Chandra Nugerah Cemerlang', '7.85', 3.1, 8, 0.39, 15, 'SPHCPO', '2.0', '162', '1219', '3', 120, 'nonspot', 0, 0, 'sheet', '1644908559_249878fc135ed3d69856.png', 0),
(52, 7, 'BRACKET 1571', '11057-1571B', 'Chandra Nugerah Cemerlang', '7.85', 2.3, 14, 0.16, 16, 'SPHCPO', '1.6', '150', '1219', '4', 224, 'nonspot', 0, 0, 'lembar', '1644908635_0b924823c2b5cdb2945c.png', 0),
(84, 3, 'BRACKET 2-2 2MS', '2MS-E472L-0000-S0605', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 3.54, 17, 0.21, 16, 'SUS409L', '2.5', '150', '1219', '3', 272, 'nonspot', 0, 0, 'sheet', '1644832514_7425a132dbf9f1eb9b1b.png', 0),
(86, 7, 'BRACKET STEP', '32054-0071A', 'Chandra Nugerah Cemerlang', '7.85', 3.66, 35, 0.1, 28, 'SPHCPO', '4.5', '85', '1219', '3', 980, 'nonspot', 0, 0, 'lembar', '', 0),
(87, 11, 'BRACKET DOWN TUBE', 'G1.20-A02-00139', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.91, 24, 0.08, 24, 'SPHC-PO', '2.0', '100', '1219', '3', 576, 'nonspot', 0, 0, 'lembar', '', 0),
(88, 11, 'BRACKET LOWER DOWN TUBE', 'G1.20-A02-00140', 'Wijaya Karya Industri & Konstruksi', '7.85', 4.55, 12, 0.38, 12, 'SPHC-PO', '2.5', '190', '1219', '2', 144, 'nonspot', 0, 0, 'lembar', '1644560941_2ac2378fee31e216eccf.png', 0),
(89, 11, 'BRACKET INNER SHIELD', 'G1.20-A02-00141', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.6, 17, 0.15, 17, 'SPHC-PO', '2.0', '136', '1219', '3', 289, 'spot', 2, 0, 'lembar', '1644561146_8bbd6cb56d5ac9deaa91.png', 0),
(91, 11, 'BRACKET HORN', 'G1.20-A02-00143', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.09, 42, 0.03, 42, 'SPHCPO', '2.0', '57', '1219', '3', 1764, 'spot', 1, 0, 'lembar', '1644896205_c8bf9a5c84f5853fa50f.png', 0),
(92, 11, 'BRACKET TOP REAR COVER', 'G1.20-A02-00144', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.45, 19, 0.13, 19, 'SPHCPO', '2.0', '128', '1219', '3', 361, 'spot', 1, 0, 'lembar', '1644896280_7dd52d02bb61017a8fdf.png', 0),
(93, 11, 'BRACKET MAIN KEY', 'G1.20-A02-00145', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.84, 25, 0.07, 25, 'SPHCPO', '2.0', '96', '1219', '3', 625, 'spot', 2, 0, 'lembar', '1644896314_b00058843201f17c1717.png', 0),
(94, 11, 'BRACKET LAMP HOLDER', 'G1.20-A02-00146', 'Wijaya Karya Industri & Konstruksi', '7.85', 3.23, 25, 0.13, 14, 'SPHC-PO', '2.0', '169', '1219', '3', 350, 'spot', 3, 0, 'lembar', '1644896354_70566d9f8d582443b254.png', 0),
(95, 11, 'STOPER STEER', 'G1.20-A02-00162', 'Wijaya Karya Industri & Konstruksi', '7.85', 4.4, 10, 0.44, 10, 'SPHC-PO', '2.0', '230', '1219', '2', 100, 'nonspot', 0, 0, 'lembar', '1644896382_be2d9323c8549795c30d.png', 0),
(96, 11, 'BRACKET FLASHER', 'G1.20-A02-00147', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.01, 46, 0.02, 46, 'SPCH-PO', '2.0', '53', '1219', '3', 2116, 'nonspot', 0, 0, 'lembar', '1644896407_d9c0d6547c1c789f93cc.png', 0),
(97, 11, 'BRACKET HANDLE SEAT RH', 'G1.20-A02-00119', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.3, 30, 0.08, 30, 'SPHC-PO', '3.0', '80', '1219', '3', 900, 'spot', 2, 0, 'lembar', '1644896471_d7911df442b261edc120.png', 0),
(98, 11, 'BRACKET HANDLE SEAT LH', 'G1.20-A02-00118', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.3, 30, 0.08, 30, 'SPCHPO', '3.0', '80', '1219', '3', 900, 'spot', 2, 0, 'lembar', '1644896502_6b115dbc87eeeef0d01c.png', 0),
(99, 11, 'BRACKET SEAT LOCK', 'G1.20-A02-00120', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.2, 21, 0.1, 21, 'SPHCPO', '2.0', '115', '1219', '3', 441, 'spot', 2, 0, 'lembar', '1644896528_c403962c03fadee41f73.png', 0),
(100, 11, 'BRACKET REAR CONTROLER RH', 'G1.20-A02-00122', 'Wijaya Karya Industri & Konstruksi', '7.85', 4.13, 16, 0.26, 16, 'SPHC-PO', '3.0', '144', '1219', '4', 256, 'spot', 1, 0, 'lembar', '1644896576_8ce134167e20131e63a1.png', 0),
(101, 11, 'BRACKET REAR CONTROLER LH', 'G1.20-A02-00121', 'Wijaya Karya Industri & Konstruksi', '7.85', 4.13, 16, 0.26, 16, 'SPHC-PO', '3.0', '144', '1219', '4', 256, 'spot', 1, 0, 'lembar', '1644565453_c6ca603db37790e815aa.png', 0),
(102, 11, 'BRACKET COVER CONTROLLER RH/LH', 'G1.20-A02-00124/23', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.45, 32, 0.05, 32, 'SPHC-PO', '2.0', '76', '1219', '3', 1024, 'nonspot', 0, 0, 'lembar', '1644896645_d952baaf824568130ccc.png', 0),
(104, 11, 'MOUNTING BRACKET LICENSE SUPPORT', 'G1.20-A02-00125', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.26, 20, 0.11, 20, 'SPHC-PO', '2.0', '118', '1219', '3', 400, 'spot', 3, 0, 'lembar', '1644896796_a34f32891f360acd8db7.png', 0),
(105, 11, 'BRACKET REAR BOTTOM COVER RH/LH', 'G1.20-A02-00127/26', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.2, 21, 0.1, 21, 'SPHC-PO', '2.0', '115', '1219', '3', 441, 'spot', 1, 0, 'lembar', '1644896850_69fbfa47a4a08c3658ad.png', 0),
(107, 11, 'BRACKET BOX BATTERY FRONT RH', 'G1.20-A02-00108', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.75, 21, 0.13, 21, 'SPHC-PO', '2.5', '115', '1219', '5', 441, 'spot', 1, 0, 'lembar', '1644896994_0e2118039e71ea6dd538.png', 0),
(108, 11, 'BRACKET BOX BATTERY FRONT LH', 'G1.20-A02-00107', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.75, 21, 0.13, 21, 'SPHC-PO', '2.5', '115', '1219', '5', 441, 'spot', 1, 0, 'lembar', '1644897053_a1486711e4fbcf9e58e9.png', 0),
(109, 11, 'BRACKET REAR SIDE REAR RH', 'G1.20-A02-00136', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.34, 34, 0.04, 34, 'SPHC-PO', '2.0', '70', '1219', '5', 1156, 'spot', 1, 0, 'lembar', '1644897134_9f38a03ff71b164056af.png', 0),
(110, 11, 'BRACKET REAR SIDE REAR LH', 'G1.20-A02-00135', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.34, 34, 0.04, 34, 'SPHC-PO', '2.0', '70', '1219', '5', 1156, 'spot', 1, 0, 'lembar', '1644897486_e0ba1df4a30d3235559e.png', 0),
(111, 11, 'BRACKET BOX BATTERY REAR RH', 'G1.20-A02-00110', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.55, 30, 0.05, 30, 'SPHCPO', '2.0', '81', '1219', '5', 900, 'spot', 1, 0, 'lembar', '1644897546_ea7443651da080ff9409.png', 0),
(112, 11, 'BRACKET BOX BATTERY REAR LH', 'G1.20-A02-00109', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.55, 30, 0.05, 30, 'SPHC-PO', '2.0', '81', '1219', '5', 900, 'spot', 1, 0, 'lembar', '1644897596_e11f30efe7be6f7d302f.png', 0),
(113, 11, 'BRACKET RIDER PLATFORM FRONT RH/LH', 'G1.20-A02-00114/13', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.07, 22, 0.09, 22, 'SPHC-PO', '2.0', '108', '1219', '3', 484, 'spot', 1, 0, 'lembar', '1644897647_548b45d7996363cf45d5.png', 0),
(115, 11, 'BRACKET BOTTOM RH', 'G1.20-A02-00104', 'Wijaya Karya Industri & Konstruksi', '7.85', 4.59, 10, 0.46, 10, 'SPHC-PO', '2.0', '240', '1219', '3', 100, 'nonspot', 0, 0, 'lembar', '1644897735_8fb943643a469df2aef6.png', 0),
(116, 11, 'BRACKET BOTTOM LH', 'G1.20-A02-00103', 'Wijaya Karya Industri & Konstruksi', '7.85', 4.59, 10, 0.46, 10, 'SPHC-PO', '2.0', '240', '1219', '3', 100, 'nonspot', 0, 0, 'lembar', '1644897770_3494bb80ec6ffe202a63.png', 0),
(117, 11, 'BRACKET RIDER PLATFORM REAR RH/LH', 'G1.20-A02-00116/15', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.68, 27, 0.06, 27, 'SPHC-PO', '2.0', '88', '1219', '3', 729, 'spot', 1, 0, 'lembar', '1644897804_b60b12b3b1e4dbb4310f.png', 0),
(119, 11, 'BRACKET UNDER SEAT RH/LH', 'G1.20-A02-00112/11', 'Wijaya Karya Industri & Konstruksi', '7.85', 1.53, 30, 0.05, 30, 'SPHC-PO', '2.0', '80', '1219', '3', 900, 'spot', 1, 0, 'lembar', '1644897880_a5aa84bbb0a4b70183e5.png', 0),
(120, 11, 'DOWN TUBE ?54', 'G1.20-A02-00137', 'Wijaya Karya Industri & Konstruksi', '7.85', 0, 8, 2.529, 0, 'STKM11AC', '2.6', '', '730', '3', 0, 'nonspot', 0, 0, 'tube', '1644820029_e63ad6363ee10e282ec5.png', 54),
(121, 11, 'CROSS TUBE �32', 'G1.20-A02-00138', 'Wijaya Karya Industri & Konstruksi', '7.85', 0, 20, 0.616, 0, 'STKM11AC', '2.6', '', '300', '3', 0, 'nonspot', 0, 0, 'tube', '1644820164_b43a5c04505206ebb33e.png', 32),
(122, 11, 'TUBE STEER �48', 'G1.20-A02-00142', 'Wijaya Karya Industri & Konstruksi', '7.85', 0, 22, 1.119, 0, 'STKM11AC', '3.5', '', '270', '6', 0, 'nonspot', 0, 0, 'tube', '1644820337_37ba4f37669049518a09.png', 48),
(123, 11, 'REAR TUBE STKM11A � 32', 'G1.20-A02-00117', 'Wijaya Karya Industri & Konstruksi', '7.85', 0, 0, 0.887, 0, 'STKM11AC', '2.0', '', '562', '3', 0, 'nonspot', 0, 0, 'tube', '1644820446_39450bcc9b0acaa2e453.png', 32),
(124, 11, 'SIDE TUBE �38 RH', 'G1.20-A02-00102', 'Wijaya Karya Industri & Konstruksi', '7.85', 0, 5, 2.119, 0, 'STKM11A', '2.0', '', '1130', '2', 0, 'nonspot', 0, 0, 'tube', '1644820559_7a0c8bd1aaeffaf5ac0f.png', 38),
(125, 11, 'SIDE TUBE �38 LH', 'G1.20-A02-00101', 'Wijaya Karya Industri & Konstruksi', '7.85', 0, 5, 2.119, 0, 'STKM11A', '2.0', '', '1130', '2', 0, 'nonspot', 0, 0, 'tube', '1644820654_8c27dd30658fb7113c08.png', 38),
(126, 2, 'BASEPAN', 'ACXD52-00130', 'Panasonic Manufacturing Indonesia', '7.85', 0, 1, 0, 0, 'NSDCD2 SZQFKXK1', '0.8', '300', '700', '3', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(127, 2, 'SOUND PROF BOARD', 'H151407', 'Panasonic Manufacturing Indonesia', '7.85', 0, 1, 0, 0, 'ST SGCC-Z22', '0.5', '250', '505', '3', 0, 'nonspot', 0, 0, 'pcs', '1645002013_575061c4c56a02e45121.png', 0),
(128, 2, 'BASE PANE', 'D521416', 'Panasonic Manufacturing Indonesia', '7.85', 0, 1, 0, 0, 'NSDCD2 SZQFKXK1', '0.8', '300', '700', '3', 0, 'nonspot', 0, 0, 'pcs', '1645002211_417f606857d0676000c2.png', 0),
(129, 4, 'BODY PIPE 1-2 2DP LH', '2DP-E461A-0000-0605-SUB', 'Sakura Java Indonesia', '7.85', 0.07, 1, 0.07, 34, 'SUS409L', '1.0', '70', '135', '4', 34, 'nonspot', 0, 0, 'sheet', '1644830119_b1ae6772166c74a8ff67.png', 0),
(130, 5, 'BRACKET NO. 2', '51870-73R00-B2', 'Sanoh Indonesia', '7.85', 1.99, 41, 0.05, 30, 'JSH270CN', '2.6', '80', '1219', '2', 1230, 'nonspot', 0, 0, 'sheet', '1644994382_f5b199baaa7ccabe3f07.png', 0),
(131, 7, 'HOLDER BRAKE HOSE 1', '2SX-F5875-00-00-80', 'Chandra Nugerah Cemerlang', '7.85', 1.06, 34, 0.03, 35, 'SPHC-PO', '1.6', '69', '1219', '3', 1190, 'nonspot', 0, 0, 'lembar', '1644910627_3b27cd6a0a22df5b7600.png', 0),
(132, 8, 'B1M-BRACKET 1 + 2 BOLT', 'N1451-D0380', 'Sanden Indonesia', '7.85', 1.25, 12, 0.1, 18, 'YSC270CC', '1.0', '131', '1219', '3', 216, '2spot', 2, 4, 'sheet', '1644912962_d0a484426725d95305d9.png', 0),
(133, 10, 'NEW CENTER CUSHION RAD SUPPORT UPPER', '13-07274-A00', 'Fukoku Tokai Rubber', '7.85', 1.74, 24, 0.07, 34, 'SPHCPO', '2.6', '70', '1219', '2', 816, 'nonspot', 0, 0, 'sheet', '', 0),
(134, 10, 'PLATE CAB. MOUNTING NO. 1', '14-08628-A00', 'Fukoku Tokai Rubber', '7.85', 1.84, 10, 0.18, 40, 'SAPH440', '3.2', '60', '1219', '4', 400, 'nonspot', 0, 0, 'sheet', '1644916384_b1557ad5a564aca260de.png', 0),
(135, 10, 'Plate Cab Mounting No. 1', '14-08627-A00', 'Fukoku Tokai Rubber', '7.85', 3.35, 10, 0.34, 34, 'SAPH440', '5.0', '70', '1219', '4', 340, 'nonspot', 0, 0, 'sheet', '1644916509_64172cc560071e2bf488.png', 0),
(136, 9, 'JOINT PIPE FR A', '99SGTSLO011400920', 'Cipta Nissin Industries', '7.85', 3.18, 8, 0.4, 14, 'SUS 409 THK', '2.0', '166', '1219', '4', 112, 'nonspot', 0, 0, 'sheet', '1644917706_5e3f59d4a3e1d3b9d19d.png', 0),
(137, 9, 'JOINT PIPE FR B', '99SGTSLO0114101920', 'Cipta Nissin Industries', '7.85', 2.76, 7, 0.39, 16, 'SUS 409 THK', '2.0', '144', '1219', '4', 112, 'nonspot', 0, 0, 'sheet', '1644917651_5a77ac1456a00129d486.png', 0),
(138, 9, 'LEVER MSA-700 SC', '35100080', 'Cipta Nissin Industries', '7.85', 20.67, 31, 0.67, 9, 'SS400', '8.0', '270', '1219', '2', 279, 'nonspot', 0, 0, 'lembar', '1644918004_4be3d32bebf3d88a2e15.png', 0),
(139, 2, 'SOUND PROF BOARD', 'ACXH15-02900', 'Panasonic Manufacturing Indonesia', '7.85', 0, 1, 0, 0, 'STEEL SGCC-Z22', '0.6', '395', '625', '3', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(140, 3, 'BODY SILINCER 2 MS', '2MS-E466E-0000-S1505', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 1.26, 1, 1.26, 6, 'SUS409L', '1.2', '356', '380', '7', 6, 'nonspot', 0, 0, 'sheet', '1645000431_f4a317412272c786bd00.png', 0),
(141, 3, 'BODY SILINCER 2 B02', 'B02-E466E-0000-S1505', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 1.26, 1, 1.26, 6, 'SUS409L', '1.2', '356', '380', '7', 6, 'nonspot', 0, 0, 'sheet', '1645000402_a4321f64da8c9397a482.png', 0),
(142, 3, 'BODY SILINCER 2 BS7', 'BS7-E466E-0000-S1505', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 1.26, 1, 1.26, 6, 'SUS409L', '1.2', '356', '380', '7', 6, 'nonspot', 0, 0, 'sheet', '1645000798_0d06da71766c7bf05dbc.png', 0),
(143, 3, 'BODY SILINCER BS8', 'BS8-E466E-0000-S1505', 'Sakura Manufacturing Auto Parts Indonesia', '7.75', 1.26, 1, 1.26, 6, 'SUS409L', '1.2', '356', '380', '7', 6, 'nonspot', 0, 0, 'sheet', '1645000886_f59e1506dc802b257e4b.png', 0),
(145, 2, 'BRACKET FAN MOTOR', 'D541250-P2', 'Panasonic Manufacturing Indonesia', '7.85', 0, 1, 0, 0, 'STEEL SGCC-Z22', '0.7', '202', '670', '3', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(146, 2, 'INSTALLING HOLDER (LONG)', 'ACXH36-00630', 'Panasonic Manufacturing Indonesia', '7.85', 0, 1, 0, 0, 'SGCC ZQZ22', '0.4', '168', '768', '2', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(152, 8, 'RUBBER (KECIL)', 'N1451-D0360-SUB1', 'Sanden Indonesia', '', 0, 1, 0, 0, '', '', '', '', '', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(153, 8, 'RUBBER (BESAR)', 'N1451-D0430-SUB1', 'Sanden Indonesia', '', 0, 1, 0, 0, '', '', '', '', '', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(154, 8, 'COLLAR', 'N1451-D0380-SUB1', 'Sanden Indonesia', '', 0, 1, 0, 0, '', '', '', '', '', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(155, 4, 'NUT M6 GRAKINDO', '1WD-E473L-0000-0310-SUB1', 'Sakura Java Indonesia', '', 0, 3, 0, 0, '', '', '', '', '', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(156, 8, 'B1M-BRACKET 1 TANPA BOLT', 'N1451-D0460', 'Sanden Indonesia', '7.85', 1.25, 12, 0.1, 18, 'YSC270CC', '1.0', '131', '1219', '3', 216, 'spot', 4, 0, 'lembar', '', 0),
(157, 1, 'NUT M6 (SAGATEK)', '47381-BZ120#106210010-SUB1', 'Inti Ganda Perdana', '', 0, 1, 0, 0, '', '', '', '', '', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(158, 5, 'BRACKET', '897529250-1', 'Sanoh Indonesia', '7.85', 2.6, 48, 0.05, 28, 'SPHCPO', '3.2', '85', '1219', '3', 1344, 'nonspot', 0, 0, 'lembar', '1645493293_e62f7afb1bf8e5ae14de.png', 0),
(159, 7, 'WIRE HOLDER BRAKE HOSE 1', '2SX-F1654-00', 'Chandra Nugerah Cemerlang', '', 0, 1, 0, 0, 'SWRM10 DIA 3,5', '', '', '', '', 0, 'nonspot', 0, 0, 'pcs', '1645494251_99ad70d6f0d3bfbf9d09.png', 0),
(161, 8, 'BOLT', 'N1451-D0380-SUB2', 'Sanden Indonesia', '', 0, 1, 0, 0, '', '', '', '', '', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(163, 9, 'HEAT PROTECTOR VCC 09-7020', '99SGTSLO0115850910', 'Cipta Nissin Industries', '', 0, 1, 0, 0, 'SUS 409 THK', '', '', '', '1', 0, 'nonspot', 0, 0, 'pcs', '1645505676_ea66e14c547ef8d15a18.png', 0),
(172, 11, 'BRACKET BOX TOOL REAR', 'G1.0-A01-00806', 'Wijaya Karya Industri & Konstruksi', '7.85', 2.35, 19, 0.12, 19, 'SPHC-PO', '2.0', '123', '1219', '3', 361, 'spot', 3, 0, 'lembar', '1646358906_dd67901c5d42c4612153.png', 0),
(173, 7, 'HOLDER BRAKE HOSE 5', '2DP-F588F-00-00-80', 'Chandra Nugerah Cemerlang', '7.85', 2.22, 16, 0.14, 21, 'SPHC-PO', '2.0', '116', '1219', '6', 336, 'nonspot', 0, 0, 'sheet', '1646644005_3d040109a5ffb6c2e263.png', 0),
(176, 15, 'Gusset RR Dr Hinge Upr R/L', '68622-73R00', 'Tiger Sash Indonesia', '7.85', 0, 1, 0, 0, 'JSC270CC', '1.0', '250', '830', '5', 0, 'nonspot', 0, 0, 'pcs', '1646982173_e721ac9d6b5fb21d25fc.png', 0),
(177, 15, 'REINF, FR DR WDW RR R/L', '68191-73R00', 'Tiger Sash Indonesia', '7.85', 0, 1, 0, 0, 'JSC270CC', '0.6', '320', '600', '5', 0, 'nonspot', 0, 0, 'pcs', '1646982404_dfe006b901489794ada3.png', 0),
(178, 4, 'Pipe Silincer 3 1WD', '1WD-E466J-0000-0305-SUB', 'Sakura Java Indonesia', '7.75', 1.17, 4, 0.29, 18, 'SUS409L', '1.2', '130', '970', '4', 72, 'nonspot', 0, 0, 'sheet', '1647402525_d4e6139607cd4745db5d.png', 0),
(179, 4, 'Pipe Silincer 6 1WD', '1WD-E466M-0000-0305-SUB', 'Sakura Java Indonesia', '7.75', 2.49, 5, 0.5, 11, 'SUS409L', '1.2', '220', '1219', '4', 55, 'nonspot', 0, 0, 'sheet', '1647402653_f1c1ba2f85e1444e78ff.png', 0),
(180, 2, 'SOUND PROF BOARD', 'ACXH15-02910', 'Panasonic Manufacturing Indonesia', '', 0, 1, 0, 0, 'STEEL SGCC-Z22', '0.6', '325', '625', '3', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(181, 4, 'BODY PIPE 1-1 2DP RH', '2DP-E461A-0000-0605', 'Sakura Java Indonesia', '7.75', 0.07, 1, 0.07, 34, 'SUS409L', '1.0', '70', '135', '4', 34, 'nonspot', 0, 0, 'sheet', '1647488508_e7e063969671ee625a32.png', 0),
(182, 7, 'WIRE HOLDER BRAKE HOSE 5', '2DP-F588F-00', 'Chandra Nugerah Cemerlang', '', 0, 1, 0, 0, '', '', '', '', '', 0, 'nonspot', 0, 0, 'pcs', '1647509026_774fbb4555721742028f.png', 0),
(183, 3, 'PIPE 7', '2PV-E475K-0000-S0305', 'Sakura Manufacturing Auto Parts Indonesia', '', 0, 1, 0, 0, '', '', '', '', '2', 0, 'nonspot', 0, 0, 'pcs', '1647913800_cdf86148faaf3cdb9d88.png', 0),
(184, 14, 'FRAME BOTTOM ASSY D270/275 (SC1)', '0060124866', 'Haeir Electrical Appliances Indonesia', '7.85', 0, 1, 0, 0, '', '0.3', '395', '568', '4', 0, 'nonspot', 0, 0, 'pcs', '1648607153_522fe1fa5019e26658df.png', 0),
(185, 14, 'FRAME BOTTOM ASSY AQR-13G(SC1)', '0060867453', 'Haeir Electrical Appliances Indonesia', '7.85', 0, 1, 0, 0, '', '0.25', '387.5', '497.5', '4', 0, 'nonspot', 0, 0, 'pcs', '1648607448_f16826b991d255e96a8f.png', 0),
(186, 14, 'FRAME BOTTOM ASSY AQR-17J/20J(SC1)', '0060867455', 'Haeir Electrical Appliances Indonesia', '7.85', 0, 1, 0, 0, '', '0.25', '388', '548', '4', 0, 'nonspot', 0, 0, 'pcs', '1648607791_3a136d857d6440f9d383.png', 0),
(187, 14, 'FRAME REAR AQR-13H ASSY (SC1)', '0060869033', 'Haeir Electrical Appliances Indonesia', '7.85', 0, 1, 0, 0, '', '0.2', '532', '925.5', '3', 0, 'nonspot', 0, 0, 'pcs', '', 0),
(188, 14, 'FRAME BOTTOM ASSY MJ-R16A (SC1)', '0060867454', 'Haeir Electrical Appliances Indonesia', '7.85', 0, 1, 0, 0, '', '0.25', '387', '548', '4', 0, 'nonspot', 0, 0, 'pcs', '1648608263_ae1558f17a9689917fb1.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `no_po` char(75) NOT NULL,
  `id_part` int(11) NOT NULL,
  `tgl_po` date NOT NULL,
  `tglterima_po` date NOT NULL,
  `revisi_po` char(5) NOT NULL,
  `nama_part` char(60) NOT NULL,
  `qty_pcs` int(11) NOT NULL,
  `deliv_act` int(11) NOT NULL,
  `outstand_qty` char(20) NOT NULL,
  `ketersediaan_material` char(50) NOT NULL,
  `nomor_po` char(50) NOT NULL,
  `status` char(50) NOT NULL,
  `schedule` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses`
--

CREATE TABLE `proses` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `qty_in` int(11) NOT NULL,
  `qty_out` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses`
--

INSERT INTO `proses` (`id`, `id_part`, `qty_in`, `qty_out`) VALUES
(1, 1, 765, 0),
(2, 2, 500, 500),
(3, 3, 3585, 2585),
(4, 4, 1000, 1000),
(5, 5, 0, 0),
(6, 6, 1613, 1252),
(7, 7, 0, 0),
(8, 8, 0, 0),
(9, 9, 0, 0),
(10, 10, 1660, 1660),
(11, 11, 524, 524),
(12, 12, 430, 430),
(13, 13, 797, 457),
(14, 14, 4820, 282),
(15, 15, 1415, 42),
(16, 16, 0, 0),
(17, 17, 2020, 520),
(18, 18, 0, 0),
(19, 19, 600, 600),
(20, 20, 4530, 4530),
(21, 21, 0, 0),
(22, 22, 7239, 6439),
(23, 23, 2770, 2770),
(24, 24, 0, 0),
(25, 25, 8200, 8200),
(26, 26, 0, 0),
(27, 27, 11000, 11000),
(28, 28, 138, 138),
(29, 29, 396, 396),
(30, 30, 0, 0),
(31, 31, 2804, 0),
(32, 32, 0, 0),
(33, 33, 8328, 3310),
(34, 34, 483, 483),
(35, 35, 4483, 0),
(36, 36, 8482, 2116),
(37, 37, 1000, 0),
(38, 38, 2667, 0),
(39, 39, 269, 269),
(40, 40, 702, 702),
(41, 41, 2020, 2020),
(42, 42, 471, 471),
(43, 43, 712, 712),
(44, 44, 1576, 1576),
(45, 45, 0, 0),
(46, 46, 0, 0),
(47, 47, 3900, 2700),
(48, 48, 0, 0),
(49, 49, 0, 0),
(50, 50, 0, 0),
(51, 51, 0, 0),
(52, 52, 0, 0),
(53, 53, 0, 0),
(54, 54, 0, 0),
(55, 55, 0, 0),
(56, 56, 0, 0),
(57, 57, 0, 0),
(58, 58, 0, 0),
(59, 59, 0, 0),
(60, 60, 0, 0),
(61, 61, 0, 0),
(62, 62, 0, 0),
(63, 63, 0, 0),
(64, 64, 0, 0),
(65, 65, 0, 0),
(66, 66, 0, 0),
(67, 67, 0, 0),
(68, 68, 0, 0),
(69, 69, 0, 0),
(70, 70, 0, 0),
(71, 71, 0, 0),
(72, 72, 0, 0),
(73, 73, 0, 0),
(74, 74, 0, 0),
(75, 75, 0, 0),
(76, 76, 0, 0),
(77, 77, 0, 0),
(78, 78, 0, 0),
(79, 79, 0, 0),
(80, 80, 0, 0),
(81, 81, 0, 0),
(82, 82, 0, 0),
(83, 83, 0, 0),
(84, 84, 1000, 1000),
(85, 85, 0, 0),
(86, 86, 0, 0),
(87, 87, 0, 0),
(88, 88, 0, 0),
(89, 89, 0, 0),
(90, 90, 0, 0),
(91, 91, 0, 0),
(92, 92, 0, 0),
(93, 93, 0, 0),
(94, 94, 0, 0),
(95, 95, 0, 0),
(96, 96, 0, 0),
(97, 97, 0, 0),
(98, 98, 0, 0),
(99, 99, 0, 0),
(100, 100, 0, 0),
(101, 101, 0, 0),
(102, 102, 0, 0),
(103, 103, 0, 0),
(104, 104, 0, 0),
(105, 105, 0, 0),
(106, 106, 0, 0),
(107, 107, 0, 0),
(108, 108, 0, 0),
(109, 109, 0, 0),
(110, 110, 0, 0),
(111, 111, 0, 0),
(112, 112, 0, 0),
(113, 113, 0, 0),
(114, 114, 0, 0),
(115, 115, 0, 0),
(116, 116, 0, 0),
(117, 117, 0, 0),
(118, 118, 0, 0),
(119, 119, 0, 0),
(120, 120, 0, 0),
(121, 121, 0, 0),
(122, 122, 0, 0),
(123, 123, 0, 0),
(124, 124, 0, 0),
(125, 125, 0, 0),
(126, 126, 0, 0),
(127, 127, 1312, 1312),
(128, 128, 1000, 1000),
(129, 129, 162, 162),
(130, 130, 500, 500),
(131, 131, 5000, 0),
(132, 132, 2962, 0),
(133, 133, 702, 702),
(134, 134, 0, 0),
(135, 135, 0, 0),
(136, 136, 2814, 2814),
(137, 137, 995, 987),
(138, 138, 152, 0),
(139, 139, 0, 0),
(140, 140, 636, 0),
(141, 141, 0, 0),
(142, 142, 278, 278),
(143, 143, 74, 74),
(144, 145, 0, 0),
(145, 146, 0, 0),
(147, 150, 0, 0),
(148, 151, 0, 0),
(149, 156, 79, 0),
(150, 158, 812, 700),
(151, 160, 0, 0),
(152, 164, 0, 0),
(153, 166, 0, 0),
(154, 167, 0, 0),
(155, 168, 0, 0),
(156, 169, 0, 0),
(157, 170, 0, 0),
(158, 171, 0, 0),
(159, 172, 0, 0),
(160, 173, 800, 800),
(161, 174, 0, 0),
(162, 175, 0, 0),
(163, 176, 895, 895),
(164, 177, 2719, 2719),
(165, 178, 457, 457),
(166, 179, 1795, 282),
(167, 180, 0, 0),
(168, 181, 562, 162),
(169, 183, 50, 50),
(170, 184, 0, 0),
(171, 185, 7992, 6450),
(172, 186, 1197, 1197),
(173, 187, 8190, 0),
(174, 188, 1000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses1`
--

CREATE TABLE `proses1` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `nama_proses` char(50) NOT NULL,
  `plan1` int(11) NOT NULL,
  `act_proses1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses1`
--

INSERT INTO `proses1` (`id`, `id_part`, `nama_part`, `nama_proses`, `plan1`, `act_proses1`) VALUES
(1, 1, 'Bracket Tube Clamp BZ120', 'BLANK', 0, 765),
(2, 2, 'Bracket Flexible Hose BZ140', 'BLANK', 0, 500),
(3, 3, 'REINFORCEMENT 3', 'BLANK', 0, 3585),
(4, 4, 'Body Silincer 1 1WD', 'Blank', 0, 1000),
(5, 5, 'Body Silincer 2 1WD', 'BLANK', 0, 0),
(6, 6, 'Plate 3 1WD', 'BLANK - PIERCING', 0, 1613),
(7, 7, 'Body 2-1 1WD', 'PUNCING', 0, 0),
(8, 8, 'Body 2-2 1WD', 'PUNCING', 0, 0),
(9, 9, 'Body 2-3 1WD', 'PUNCING', 0, 0),
(10, 10, 'Bracket 4-1 1DY', 'Feeder', 0, 1660),
(11, 11, 'Bracket 4-2 1DY', 'Feeder', 0, 524),
(12, 12, 'Stay Muff 2-1 1FD', 'Feeder', 0, 430),
(13, 13, 'Pipe Silincer 2 CP 1WD', 'BLANK', 0, 797),
(14, 14, 'Pipe Silincer 5 CP 1WD', 'Blank', 0, 4820),
(15, 15, 'Bracket 3-2 CP 1WD', 'BLANK', 0, 1415),
(16, 16, 'Stay Muff 2-1 2PH', 'Feeder', 0, 0),
(17, 17, 'Stay Muff 2-1 5D9', 'Feeder', 0, 2020),
(19, 19, 'BRACKET NO. 1', 'BLANK', 0, 600),
(20, 20, 'BRACKET NO 1', 'BLANK', 0, 4530),
(21, 21, 'BRACKET NO.  2', 'BLANK PIE', 0, 0),
(22, 22, 'BRACKET NO. 3', 'BLANK', 0, 7239),
(23, 23, 'WASHER K16', 'FEEDER', 0, 2770),
(24, 24, 'WASHER G20', 'FEEDER', 0, 0),
(25, 25, 'NUT RAW EXEDY', 'FEEDER', 0, 8200),
(26, 26, 'NUT STA EXEDY', 'FEEDER', 0, 0),
(27, 27, 'PLATE FOR INSULATOR ENGINE MTG. RR', 'BLANK PIE', 0, 11000),
(28, 28, 'PLATE FOR CAB. MOUNTING UPPER', 'BLANK', 0, 138),
(29, 29, 'NEW CENTER CUSHION RAD SUPPORT UPPER', 'BLANK PIE', 0, 396),
(30, 30, 'INSULATOR ENGINE MOUNTING FR', 'BLANK', 0, 0),
(31, 31, 'UPPER PLATE FOR INSULATOR ENG. MTG. RH', 'BLANK', 0, 2804),
(32, 32, 'PLATE FOR CAB. MOUNTING LOWER', 'BLANK', 0, 0),
(33, 33, 'PLATE FOR INSULATOR ENGINE MTG. RR', 'BLANK', 0, 8328),
(34, 34, 'NEW CENTER BUMPER RUBBER FRONT', 'BLANK', 0, 483),
(35, 35, 'B1M-CLAMP ASSY', 'BLANK PIE', 0, 4483),
(36, 36, 'B1M-BRACKET 2', 'BLANK', 0, 8482),
(37, 37, 'B1M-CLAMP', 'BLANK', 0, 1000),
(38, 38, 'B1M-CLAMP', 'BLANK', 0, 2667),
(39, 39, 'ARM MSA-7000 LH', 'BLANK', 0, 269),
(40, 40, 'BRACKET 1 INTAKE REAR', 'BLANK', 0, 702),
(41, 41, 'STAY 2 INTAKE REAR', 'BLANK', 0, 2020),
(42, 42, 'STAY 3 INTAKE REAR', 'BLANK', 0, 471),
(43, 43, 'BRACKET 4 INTAKE REAR', 'BLANK', 0, 712),
(44, 44, 'BRACKET INTAKE FRONT', 'BLANK', 0, 1576),
(47, 47, 'THROWER FOR PULLEY DAMPER', 'BLANK DRAW', 0, 3900),
(48, 48, 'GUARD 0918A', 'BLANK', 0, 0),
(49, 49, 'GUARD 0919A', 'BLANK', 0, 0),
(50, 50, 'GUARD 0920A', 'BLANK', 0, 0),
(51, 51, 'BRKT PIPE B6G', 'BLANK PIERCING', 0, 0),
(52, 52, 'BRACKET 1571', 'BLANK', 0, 0),
(84, 84, 'BRACKET 2-2 2MS', 'BLANK PIERCING', 0, 1000),
(86, 86, 'BRACKET STEP', 'BLANK PIERCING', 0, 0),
(87, 87, 'BRACKET DOWN TUBE', 'BLANK', 0, 0),
(88, 88, 'BRACKET LOWER DOWN TUBE', 'BLANK-PIE', 0, 0),
(89, 89, 'BRACKET INNER SHIELD', 'BLANK', 0, 0),
(91, 91, 'BRACKET HORN', 'BLANK', 0, 0),
(92, 92, 'BRACKET TOP REAR COVER', 'BLANK', 0, 0),
(93, 93, 'BRACKET MAIN KEY', 'BLANK', 0, 0),
(94, 94, 'BRACKET LAMP HOLDER', 'BLANK', 0, 0),
(95, 95, 'STOPER STEER', 'BLANK', 0, 0),
(96, 96, 'BRACKET FLASHER', 'BLANK', 0, 0),
(97, 97, 'BRACKET HANDLE SEAT RH', 'BLANK', 0, 0),
(98, 98, 'BRACKET HANDLE SEAT LH', 'BLANK', 0, 0),
(99, 99, 'BRACKET SEAT LOCK', 'BLANK', 0, 0),
(100, 100, 'BRACKET REAR CONTROLER RH', 'BLANK', 0, 0),
(101, 101, 'BRACKET REAR CONTROLER LH', 'BLANK', 0, 0),
(102, 102, 'BRACKET COVER CONTROLLER RH/LH', 'BLANK', 0, 0),
(104, 104, 'MOUNTING BRACKET LICENSE SUPPORT', 'BLANK', 0, 0),
(105, 105, 'BRACKET REAR BOTTOM COVER RH/LH', 'BLANK', 0, 0),
(107, 107, 'BRACKET BOX BATTERY FRONT RH', 'BLANK', 0, 0),
(108, 108, 'BRACKET BOX BATTERY FRONT LH', 'BLANK', 0, 0),
(109, 109, 'BRACKET REAR SIDE REAR RH', 'BLANK', 0, 0),
(110, 110, 'BRACKET REAR SIDE REAR LH', 'BLANK', 0, 0),
(111, 111, 'BRACKET BOX BATTERY REAR RH', 'BLANK', 0, 0),
(112, 112, 'BRACKET BOX BATTERY REAR LH', 'BLANK', 0, 0),
(113, 113, 'BRACKET RIDER PLATFORM FRONT RH/LH', 'BLANK', 0, 0),
(115, 115, 'BRACKET BOTTOM RH', 'BLANK', 0, 0),
(116, 116, 'BRACKET BOTTOM LH', 'BLANK', 0, 0),
(117, 117, 'BRACKET RIDER PLATFORM REAR RH/LH', 'BLANK', 0, 0),
(119, 119, 'BRACKET UNDER SEAT RH/LH', 'BLANK', 0, 0),
(120, 120, 'DOWN TUBE ?54', 'BENDING', 0, 0),
(121, 121, 'CROSS TUBE �32', 'BENDING 1 & 2', 0, 0),
(122, 122, 'TUBE STEER �48', 'EXPAND 1', 0, 0),
(123, 123, 'REAR TUBE STKM11A � 32', 'BENDING 1 & 2', 0, 0),
(124, 124, 'SIDE TUBE �38 RH', 'BENDING', 0, 0),
(125, 125, 'SIDE TUBE �38 LH', 'BENDING', 0, 0),
(126, 126, 'BASEPAN', 'BLANK', 0, 0),
(127, 127, 'SOUND PROF BOARD', 'BLANK', 0, 1312),
(128, 128, 'BASE PANE', 'BLANK', 0, 1000),
(129, 129, 'BODY PIPE 1-2 2DP LH', 'BLANK', 0, 162),
(130, 130, 'BRACKET NO. 2', 'BLANK', 0, 500),
(131, 131, 'HOLDER BRAKE HOSE 1', 'BLANK PIE', 0, 5000),
(132, 132, 'B1M-BRACKET 1 + 2 BOLT', 'BLANK', 0, 2962),
(133, 133, 'NEW CENTER CUSHION RAD SUPPORT UPPER', 'BLANK', 0, 702),
(134, 134, 'PLATE CAB. MOUNTING NO. 1', 'BLANK', 0, 0),
(135, 135, 'Plate Cab Mounting No. 1', 'BLANK', 0, 0),
(136, 136, 'JOINT PIPE FR A', 'BLANK', 0, 2814),
(137, 137, 'JOINT PIPE FR B', 'BLANK', 0, 995),
(138, 138, 'LEVER MSA-700 SC', 'BENDING', 0, 152),
(139, 139, 'SOUND PROF BOARD', 'BLANK', 0, 0),
(140, 140, 'BODY SILINCER 2 MS', 'BLANK', 0, 636),
(141, 141, 'BODY SILINCER 2 B02', 'BLANK', 0, 0),
(142, 142, 'BODY SILINCER 2 BS7', 'BLANK', 0, 278),
(143, 143, 'BODY SILINCER BS8', 'BLANK', 0, 74),
(144, 145, 'BRACKET FAN MOTOR', 'BLANK', 0, 0),
(145, 146, 'INSTALLING HOLDER (LONG)', 'DRAW-TRIMMING', 0, 0),
(149, 156, 'B1M-BRACKET 1 TANPA BOLT', 'BLANK', 0, 79),
(150, 158, 'BRACKET', 'BLANK', 0, 812),
(159, 172, 'BRACKET BOX TOOL REAR', 'BLANK', 0, 0),
(160, 173, 'HOLDER BRAKE HOSE 5', 'BLANK PIE', 0, 800),
(163, 176, 'Gusset RR Dr Hinge Upr R/L', 'DRAW', 0, 895),
(164, 177, 'REINF, FR DR WDW RR R/L', 'DRAW', 0, 2719),
(165, 178, 'Pipe Silincer 3 1WD', 'BLANK', 0, 457),
(166, 179, 'Pipe Silincer 6 1WD', 'BLANK', 0, 1795),
(167, 180, 'SOUND PROF BOARD', 'BLANK', 0, 0),
(168, 181, 'BODY PIPE 1-1 2DP RH', 'BLANK', 0, 562),
(169, 183, 'PIPE 7', 'SWAGING', 0, 50),
(170, 184, 'FRAME BOTTOM ASSY D270/275 (SC1)', 'BLANK', 0, 0),
(171, 185, 'FRAME BOTTOM ASSY AQR-13G(SC1)', 'BLANK', 0, 7992),
(172, 186, 'FRAME BOTTOM ASSY AQR-17J/20J(SC1)', 'BLANK', 0, 1197),
(173, 187, 'FRAME REAR AQR-13H ASSY (SC1)', 'BLANK', 0, 8190),
(174, 188, 'FRAME BOTTOM ASSY MJ-R16A (SC1)', 'BLANK', 0, 1000),
(175, 163, 'HEAT PROTECTOR VCC 09-7020', 'INSPEKSI', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses2`
--

CREATE TABLE `proses2` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `nama_proses` char(25) NOT NULL,
  `plan2` int(11) NOT NULL,
  `act_proses2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses2`
--

INSERT INTO `proses2` (`id`, `id_part`, `nama_part`, `nama_proses`, `plan2`, `act_proses2`) VALUES
(1, 1, 'Bracket Tube Clamp BZ120', 'PIERCING', 765, 0),
(2, 2, 'Bracket Flexible Hose BZ140', 'PIERCING', 0, 500),
(3, 3, 'REINFORCEMENT 3', 'FORM', 1000, 2585),
(4, 4, 'Body Silincer 1 1WD', 'Draw', 0, 1000),
(5, 5, 'Body Silincer 2 1WD', 'DRAW', 0, 0),
(6, 6, 'Plate 3 1WD', 'BENDING', 361, 1252),
(7, 7, 'Body 2-1 1WD', 'CUTING', 0, 0),
(8, 8, 'Body 2-2 1WD', 'CUTING', 0, 0),
(9, 9, 'Body 2-3 1WD', 'CUTING', 0, 0),
(10, 11, 'Bracket 4-2 1DY', 'Bend', 0, 524),
(11, 12, 'Stay Muff 2-1 1FD', 'Bend', 0, 430),
(12, 13, 'Pipe Silincer 2 CP 1WD', 'DRAW', 340, 457),
(13, 14, 'Pipe Silincer 5 CP 1WD', 'Draw', 4538, 282),
(14, 15, 'Bracket 3-2 CP 1WD', 'PIERCING 1', 1373, 42),
(15, 16, 'Stay Muff 2-1 2PH', 'Pie', 0, 0),
(16, 17, 'Stay Muff 2-1 5D9', 'Bend', 1500, 520),
(18, 19, 'BRACKET NO. 1', 'BENDING', 0, 600),
(19, 20, 'BRACKET NO 1', 'BENDING', 0, 4530),
(20, 21, 'BRACKET NO.  2', 'BENDING', 0, 0),
(21, 22, 'BRACKET NO. 3', 'BENDING', 800, 6439),
(22, 24, 'WASHER G20', 'HUMMING', 0, 0),
(23, 30, 'INSULATOR ENGINE MOUNTING FR', 'BENDING 1-2', 0, 0),
(24, 31, 'UPPER PLATE FOR INSULATOR ENG. MTG. RH', 'BEND', 2804, 0),
(25, 32, 'PLATE FOR CAB. MOUNTING LOWER', 'BENDING 1-2', 0, 0),
(26, 33, 'PLATE FOR INSULATOR ENGINE MTG. RR', 'BENDING', 5018, 3310),
(27, 35, 'B1M-CLAMP ASSY', 'BENDING 1', 4483, 0),
(28, 36, 'B1M-BRACKET 2', 'BENDING', 6366, 2116),
(29, 37, 'B1M-CLAMP', 'BENDING 1', 1000, 0),
(30, 38, 'B1M-CLAMP', 'BENDING 1', 2667, 0),
(31, 39, 'ARM MSA-7000 LH', 'PIERCING', 0, 269),
(32, 40, 'BRACKET 1 INTAKE REAR', 'BENDING', 0, 702),
(33, 41, 'STAY 2 INTAKE REAR', 'BENDING', 0, 2020),
(34, 42, 'STAY 3 INTAKE REAR', 'BENDING', 0, 471),
(35, 43, 'BRACKET 4 INTAKE REAR', 'BENDING', 0, 712),
(36, 44, 'BRACKET INTAKE FRONT', 'BENDING', 0, 1576),
(39, 47, 'THROWER FOR PULLEY DAMPER', 'TRIMMING PIERCING', 1200, 2700),
(40, 48, 'GUARD 0918A', 'BENDING', 0, 0),
(41, 49, 'GUARD 0919A', 'BENDING', 0, 0),
(42, 50, 'GUARD 0920A', 'BENDING', 0, 0),
(43, 51, 'BRKT PIPE B6G', 'BENDING  1-2', 0, 0),
(44, 52, 'BRACKET 1571', 'BENDING 1', 0, 0),
(76, 84, 'BRACKET 2-2 2MS', 'BENDING', 0, 1000),
(78, 86, 'BRACKET STEP', 'CHAMPER', 0, 0),
(79, 87, 'BRACKET DOWN TUBE', 'PIERCING', 0, 0),
(80, 88, 'BRACKET LOWER DOWN TUBE', 'BENDING', 0, 0),
(81, 89, 'BRACKET INNER SHIELD', 'PIERCING', 0, 0),
(83, 91, 'BRACKET HORN', 'PIERCING', 0, 0),
(84, 92, 'BRACKET TOP REAR COVER', 'PIERCING', 0, 0),
(85, 93, 'BRACKET MAIN KEY', 'PIERCING', 0, 0),
(86, 94, 'BRACKET LAMP HOLDER', 'PIERCING', 0, 0),
(87, 95, 'STOPER STEER', 'BENDING', 0, 0),
(88, 96, 'BRACKET FLASHER', 'PIERCING', 0, 0),
(89, 97, 'BRACKET HANDLE SEAT RH', 'PIERCING', 0, 0),
(90, 98, 'BRACKET HANDLE SEAT LH', 'PIERCING', 0, 0),
(91, 99, 'BRACKET SEAT LOCK', 'PIERCING', 0, 0),
(92, 100, 'BRACKET REAR CONTROLER RH', 'PIERCING', 0, 0),
(93, 101, 'BRACKET REAR CONTROLER LH', 'PIERCING', 0, 0),
(94, 102, 'BRACKET COVER CONTROLLER RH/LH', 'PIERCING', 0, 0),
(96, 104, 'MOUNTING BRACKET LICENSE SUPPORT', 'BENDING', 0, 0),
(97, 105, 'BRACKET REAR BOTTOM COVER RH/LH', 'PIERCING', 0, 0),
(99, 107, 'BRACKET BOX BATTERY FRONT RH', 'PIERCING 1', 0, 0),
(100, 108, 'BRACKET BOX BATTERY FRONT LH', 'PIERCING 1', 0, 0),
(101, 109, 'BRACKET REAR SIDE REAR RH', 'PIERCING 1', 0, 0),
(102, 110, 'BRACKET REAR SIDE REAR LH', 'PIERCING 1', 0, 0),
(103, 111, 'BRACKET BOX BATTERY REAR RH', 'PIERCING', 0, 0),
(104, 112, 'BRACKET BOX BATTERY REAR LH', 'PIERCING', 0, 0),
(105, 113, 'BRACKET RIDER PLATFORM FRONT RH/LH', 'PIERCING', 0, 0),
(107, 115, 'BRACKET BOTTOM RH', 'PIERCING', 0, 0),
(108, 116, 'BRACKET BOTTOM LH', 'PIERCING', 0, 0),
(109, 117, 'BRACKET RIDER PLATFORM REAR RH/LH', 'PIERCING', 0, 0),
(111, 119, 'BRACKET UNDER SEAT RH/LH', 'PIERCING', 0, 0),
(112, 120, 'DOWN TUBE ?54', 'NOCHING', 0, 0),
(113, 121, 'CROSS TUBE �32', 'MACHINING 1 & 2', 0, 0),
(114, 122, 'TUBE STEER �48', 'EXPAND 2', 0, 0),
(115, 123, 'REAR TUBE STKM11A � 32', 'HUMMING', 0, 0),
(116, 124, 'SIDE TUBE �38 RH', 'CUTTING 1-2', 0, 0),
(117, 125, 'SIDE TUBE �38 LH', 'CUTTING 1 & 2', 0, 0),
(118, 126, 'BASEPAN', 'DRAW', 0, 0),
(119, 127, 'SOUND PROF BOARD', 'DRAW', 0, 1312),
(120, 128, 'BASE PANE', 'DRAW', 0, 1000),
(121, 129, 'BODY PIPE 1-2 2DP LH', 'DRAW', 0, 162),
(122, 130, 'BRACKET NO. 2', 'BENDING', 0, 500),
(123, 131, 'HOLDER BRAKE HOSE 1', 'BENDING 1', 5000, 0),
(124, 132, 'B1M-BRACKET 1 + 2 BOLT', 'BENDING', 2962, 0),
(125, 133, 'NEW CENTER CUSHION RAD SUPPORT UPPER', 'BENDING', 0, 702),
(126, 134, 'PLATE CAB. MOUNTING NO. 1', 'BENDING 1-2', 0, 0),
(127, 135, 'Plate Cab Mounting No. 1', 'BENDING 1-2', 0, 0),
(128, 136, 'JOINT PIPE FR A', 'DRAW', 0, 2814),
(129, 137, 'JOINT PIPE FR B', 'DRAW', 8, 987),
(130, 138, 'LEVER MSA-700 SC', 'PIERCING', 152, 0),
(131, 139, 'SOUND PROF BOARD', 'DRAW', 0, 0),
(132, 140, 'BODY SILINCER 2 MS', 'DRAW', 636, 0),
(133, 141, 'BODY SILINCER 2 B02', 'DRAW', 0, 0),
(134, 142, 'BODY SILINCER 2 BS7', 'DRAW', 0, 278),
(135, 143, 'BODY SILINCER BS8', 'DRAW', 0, 74),
(136, 145, 'BRACKET FAN MOTOR', 'DRAW', 0, 0),
(137, 146, 'INSTALLING HOLDER (LONG)', 'BENDING - RESTRIK', 0, 0),
(139, 156, 'B1M-BRACKET 1 TANPA BOLT', 'BEND', 71, 8),
(140, 158, 'BRACKET', 'BENDING', 112, 700),
(148, 172, 'BRACKET BOX TOOL REAR', 'BENDING', 0, 0),
(149, 173, 'HOLDER BRAKE HOSE 5', 'BENDING 1', 0, 800),
(152, 176, 'Gusset RR Dr Hinge Upr R/L', 'TRIMMING', 0, 895),
(153, 177, 'REINF, FR DR WDW RR R/L', 'RESTRIK', 0, 2719),
(154, 178, 'Pipe Silincer 3 1WD', 'DRAW', 0, 457),
(155, 179, 'Pipe Silincer 6 1WD', 'DRAW', 1513, 282),
(156, 180, 'SOUND PROF BOARD', 'DRAW', 0, 0),
(157, 181, 'BODY PIPE 1-1 2DP RH', 'DRAW', 400, 162),
(158, 183, 'PIPE 7', 'CUTTING', 0, 50),
(159, 184, 'FRAME BOTTOM ASSY D270/275 (SC1)', 'PIERCING', 0, 0),
(160, 185, 'FRAME BOTTOM ASSY AQR-13G(SC1)', 'PIERCING', 1542, 6450),
(161, 186, 'FRAME BOTTOM ASSY AQR-17J/20J(SC1)', 'PIERCING', 0, 1197),
(162, 187, 'FRAME REAR AQR-13H ASSY (SC1)', 'PIERCING', 1591, 6599),
(163, 188, 'FRAME BOTTOM ASSY MJ-R16A (SC1)', 'PIERCING', 0, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses3`
--

CREATE TABLE `proses3` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `nama_proses` char(50) NOT NULL,
  `plan3` int(11) NOT NULL,
  `act_proses3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses3`
--

INSERT INTO `proses3` (`id`, `id_part`, `nama_part`, `nama_proses`, `plan3`, `act_proses3`) VALUES
(1, 1, 'Bracket Tube Clamp BZ120', 'BENDING', 0, 0),
(2, 2, 'Bracket Flexible Hose BZ140', 'BENDING', 0, 500),
(3, 3, 'REINFORCEMENT 3', 'PIERCING', 0, 2585),
(4, 4, 'Body Silincer 1 1WD', 'Cut', 0, 1000),
(5, 5, 'Body Silincer 2 1WD', 'TRIM', 0, 0),
(6, 7, 'Body 2-1 1WD', 'FORM', 0, 0),
(7, 8, 'Body 2-2 1WD', 'BENDING', 0, 0),
(8, 9, 'Body 2-3 1WD', 'FORM', 0, 0),
(9, 13, 'Pipe Silincer 2 CP 1WD', 'TRIM', 0, 457),
(10, 14, 'Pipe Silincer 5 CP 1WD', 'Trim', 0, 282),
(11, 15, 'Bracket 3-2 CP 1WD', 'BENDING 1', 0, 42),
(12, 16, 'Stay Muff 2-1 2PH', 'Bend', 0, 0),
(14, 20, 'BRACKET NO 1', 'PIERCING', 0, 4530),
(15, 30, 'INSULATOR ENGINE MOUNTING FR', 'HUMM', 0, 0),
(16, 32, 'PLATE FOR CAB. MOUNTING LOWER', 'HUMM', 0, 0),
(17, 33, 'PLATE FOR INSULATOR ENGINE MTG. RR', 'PIERCING', 0, 3310),
(18, 35, 'B1M-CLAMP ASSY', 'BENDING 2', 0, 0),
(20, 37, 'B1M-CLAMP', 'BENDING 2', 0, 0),
(21, 38, 'B1M-CLAMP', 'BENDING 2', 0, 0),
(22, 44, 'BRACKET INTAKE FRONT', 'PIERCING', 0, 1576),
(25, 47, 'THROWER FOR PULLEY DAMPER', 'FORMING', 0, 2700),
(26, 51, 'BRKT PIPE B6G', 'BENDING 3-4', 0, 0),
(27, 52, 'BRACKET 1571', 'BENDING 2', 0, 0),
(59, 84, 'BRACKET 2-2 2MS', 'PIERCING', 0, 1000),
(61, 86, 'BRACKET STEP', 'BENDING', 0, 0),
(62, 87, 'BRACKET DOWN TUBE', 'BENDING', 0, 0),
(63, 89, 'BRACKET INNER SHIELD', 'BENDING', 0, 0),
(65, 91, 'BRACKET HORN', 'BENDING', 0, 0),
(66, 92, 'BRACKET TOP REAR COVER', 'BENDING', 0, 0),
(67, 93, 'BRACKET MAIN KEY', 'BENDING', 0, 0),
(68, 94, 'BRACKET LAMP HOLDER', 'BENDING', 0, 0),
(69, 96, 'BRACKET FLASHER', 'BENDING', 0, 0),
(70, 97, 'BRACKET HANDLE SEAT RH', 'BENDING', 0, 0),
(71, 98, 'BRACKET HANDLE SEAT LH', 'BENDING', 0, 0),
(72, 99, 'BRACKET SEAT LOCK', 'BENDING', 0, 0),
(73, 100, 'BRACKET REAR CONTROLER RH', 'BENDING 1', 0, 0),
(74, 101, 'BRACKET REAR CONTROLER LH', 'BENDING 1', 0, 0),
(75, 102, 'BRACKET COVER CONTROLLER RH/LH', 'BENDING', 0, 0),
(77, 104, 'MOUNTING BRACKET LICENSE SUPPORT', 'PIERCING', 0, 0),
(78, 105, 'BRACKET REAR BOTTOM COVER RH/LH', 'BENDING', 0, 0),
(80, 107, 'BRACKET BOX BATTERY FRONT RH', 'BENDING 1', 0, 0),
(81, 108, 'BRACKET BOX BATTERY FRONT LH', 'BENDING 1', 0, 0),
(82, 109, 'BRACKET REAR SIDE REAR RH', 'BENDING 1', 0, 0),
(83, 110, 'BRACKET REAR SIDE REAR LH', 'BENDING 1', 0, 0),
(84, 111, 'BRACKET BOX BATTERY REAR RH', 'BENDING 1', 0, 0),
(85, 112, 'BRACKET BOX BATTERY REAR LH', 'BENDING 1', 0, 0),
(86, 113, 'BRACKET RIDER PLATFORM FRONT RH/LH', 'BENDING', 0, 0),
(88, 115, 'BRACKET BOTTOM RH', 'BENDING', 0, 0),
(89, 116, 'BRACKET BOTTOM LH', 'BENDING', 0, 0),
(90, 117, 'BRACKET RIDER PLATFORM REAR RH/LH', 'BENDING', 0, 0),
(92, 119, 'BRACKET UNDER SEAT RH/LH', 'BENDING', 0, 0),
(93, 120, 'DOWN TUBE ?54', 'CUTTING 2', 0, 0),
(94, 121, 'CROSS TUBE �32', 'BORRING �4', 0, 0),
(95, 122, 'TUBE STEER �48', 'EXPAND 3', 0, 0),
(96, 123, 'REAR TUBE STKM11A � 32', 'BORRING', 0, 0),
(97, 126, 'BASEPAN', 'PIERCING', 0, 0),
(98, 127, 'SOUND PROF BOARD', 'PIERCING', 0, 1312),
(99, 128, 'BASE PANE', 'PIERCING', 0, 1000),
(100, 129, 'BODY PIPE 1-2 2DP LH', 'TRIM', 0, 162),
(101, 131, 'HOLDER BRAKE HOSE 1', 'BENDING 2', 0, 0),
(102, 132, 'B1M-BRACKET 1 + 2 BOLT', 'PIERCING', 0, 0),
(103, 134, 'PLATE CAB. MOUNTING NO. 1', 'HUMM', 0, 0),
(104, 135, 'Plate Cab Mounting No. 1', 'HUMM', 0, 0),
(105, 136, 'JOINT PIPE FR A', 'TRIMMING', 0, 2814),
(106, 137, 'JOINT PIPE FR B', 'TRIMMING', 0, 987),
(107, 139, 'SOUND PROF BOARD', 'PIE', 0, 0),
(108, 140, 'BODY SILINCER 2 MS', 'TRIM', 0, 0),
(109, 141, 'BODY SILINCER 2 B02', 'TRIM', 0, 0),
(110, 142, 'BODY SILINCER 2 BS7', 'TRIM', 0, 278),
(111, 143, 'BODY SILINCER BS8', 'TRIM', 0, 74),
(112, 145, 'BRACKET FAN MOTOR', 'PIERCING', 0, 0),
(114, 156, 'B1M-BRACKET 1 TANPA BOLT', 'PIE', 0, 8),
(115, 158, 'BRACKET', 'PIERCING', 0, 700),
(120, 172, 'BRACKET BOX TOOL REAR', 'PIERCING', 0, 0),
(121, 173, 'HOLDER BRAKE HOSE 5', 'BENDING 2', 0, 800),
(124, 176, 'Gusset RR Dr Hinge Upr R/L', 'FLANGING', 0, 895),
(125, 177, 'REINF, FR DR WDW RR R/L', 'TRIMMING', 0, 2719),
(126, 178, 'Pipe Silincer 3 1WD', 'TRIM', 0, 457),
(127, 179, 'Pipe Silincer 6 1WD', 'TRIM', 0, 282),
(128, 180, 'SOUND PROF BOARD', 'PIE', 0, 0),
(129, 181, 'BODY PIPE 1-1 2DP RH', 'TRIM', 0, 162),
(130, 184, 'FRAME BOTTOM ASSY D270/275 (SC1)', 'BENDING V', 0, 0),
(131, 185, 'FRAME BOTTOM ASSY AQR-13G(SC1)', 'BENDING V', 0, 6450),
(132, 186, 'FRAME BOTTOM ASSY AQR-17J/20J(SC1)', 'BENDING V', 0, 1197),
(133, 187, 'FRAME REAR AQR-13H ASSY (SC1)', 'SEALTAPE', 6599, 0),
(134, 188, 'FRAME BOTTOM ASSY MJ-R16A (SC1)', 'BENDING V', 1000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses4`
--

CREATE TABLE `proses4` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `nama_proses` char(50) NOT NULL,
  `plan4` int(11) NOT NULL,
  `act_proses4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses4`
--

INSERT INTO `proses4` (`id`, `id_part`, `nama_part`, `nama_proses`, `plan4`, `act_proses4`) VALUES
(1, 4, 'Body Silincer 1 1WD', 'Rest', 0, 1000),
(2, 5, 'Body Silincer 2 1WD', 'MARKING', 0, 0),
(3, 13, 'Pipe Silincer 2 CP 1WD', 'REST', 0, 457),
(4, 14, 'Pipe Silincer 5 CP 1WD', 'Rest', 0, 282),
(5, 15, 'Bracket 3-2 CP 1WD', 'BENDING 2', 0, 42),
(7, 30, 'INSULATOR ENGINE MOUNTING FR', 'PIE', 0, 0),
(8, 32, 'PLATE FOR CAB. MOUNTING LOWER', 'PIE', 0, 0),
(15, 47, 'THROWER FOR PULLEY DAMPER', 'HUMMING', 0, 2700),
(16, 52, 'BRACKET 1571', 'BENDING 3', 0, 0),
(49, 100, 'BRACKET REAR CONTROLER RH', 'BENDING 2', 0, 0),
(50, 101, 'BRACKET REAR CONTROLER LH', 'BENDING 2', 0, 0),
(51, 107, 'BRACKET BOX BATTERY FRONT RH', 'BENDING 2', 0, 0),
(52, 108, 'BRACKET BOX BATTERY FRONT LH', 'BENDING 2', 0, 0),
(53, 109, 'BRACKET REAR SIDE REAR RH', 'BENDING 2', 0, 0),
(54, 110, 'BRACKET REAR SIDE REAR LH', 'BENDING 2', 0, 0),
(55, 111, 'BRACKET BOX BATTERY REAR RH', 'BENDING 2', 0, 0),
(56, 112, 'BRACKET BOX BATTERY REAR LH', 'BENDING 2', 0, 0),
(57, 122, 'TUBE STEER �48', 'BUBUT (MACH 1)', 0, 0),
(58, 129, 'BODY PIPE 1-2 2DP LH', 'REST', 0, 162),
(59, 134, 'PLATE CAB. MOUNTING NO. 1', 'PIE', 0, 0),
(60, 135, 'Plate Cab Mounting No. 1', 'PIE', 0, 0),
(61, 136, 'JOINT PIPE FR A', 'RESTRIK', 0, 2814),
(62, 137, 'JOINT PIPE FR B', 'RESTRIK', 0, 987),
(63, 140, 'BODY SILINCER 2 MS', 'MARK', 0, 0),
(64, 141, 'BODY SILINCER 2 B02', 'MARK', 0, 0),
(65, 142, 'BODY SILINCER 2 BS7', 'MARK', 0, 278),
(66, 143, 'BODY SILINCER BS8', 'MARK', 0, 74),
(69, 173, 'HOLDER BRAKE HOSE 5', 'BENDING 3', 0, 800),
(70, 176, 'Gusset RR Dr Hinge Upr R/L', 'BLENDING', 0, 895),
(71, 177, 'REINF, FR DR WDW RR R/L', 'SEPARING - PIERCING', 0, 2719),
(72, 178, 'Pipe Silincer 3 1WD', 'REST', 0, 457),
(73, 179, 'Pipe Silincer 6 1WD', 'REST', 0, 282),
(74, 181, 'BODY PIPE 1-1 2DP RH', 'REST', 0, 162),
(75, 184, 'FRAME BOTTOM ASSY D270/275 (SC1)', 'SEALTAPE', 0, 0),
(76, 185, 'FRAME BOTTOM ASSY AQR-13G(SC1)', 'SEALTAPE', 0, 6450),
(77, 186, 'FRAME BOTTOM ASSY AQR-17J/20J(SC1)', 'SEALTAPE', 0, 1197),
(78, 188, 'FRAME BOTTOM ASSY MJ-R16A (SC1)', 'SEALTAPE', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses5`
--

CREATE TABLE `proses5` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `nama_proses` char(25) NOT NULL,
  `plan5` int(11) NOT NULL,
  `act_proses5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses5`
--

INSERT INTO `proses5` (`id`, `id_part`, `nama_part`, `nama_proses`, `plan5`, `act_proses5`) VALUES
(1, 5, 'Body Silincer 2 1WD', 'CUTING', 0, 0),
(2, 15, 'Bracket 3-2 CP 1WD', 'PIERCING 2', 0, 42),
(15, 107, 'BRACKET BOX BATTERY FRONT RH', 'PIERCING 2', 0, 0),
(16, 108, 'BRACKET BOX BATTERY FRONT LH', 'PIERCING 2', 0, 0),
(17, 109, 'BRACKET REAR SIDE REAR RH', 'PIERCING 2', 0, 0),
(18, 110, 'BRACKET REAR SIDE REAR LH', 'PIERCING 2', 0, 0),
(19, 111, 'BRACKET BOX BATTERY REAR RH', 'PIERCING', 0, 0),
(20, 112, 'BRACKET BOX BATTERY REAR LH', 'PIERCING', 0, 0),
(21, 122, 'TUBE STEER �48', 'BORRING (MACH 2)', 0, 0),
(22, 140, 'BODY SILINCER 2 MS', 'CUTTING', 0, 0),
(23, 141, 'BODY SILINCER 2 B02', 'CUTTING', 0, 0),
(24, 142, 'BODY SILINCER 2 BS7', 'CUTTING', 0, 278),
(25, 143, 'BODY SILINCER BS8', 'CUTTING', 0, 74),
(28, 173, 'HOLDER BRAKE HOSE 5', 'BENDING 4', 0, 800),
(29, 176, 'Gusset RR Dr Hinge Upr R/L', 'CAM PIERCING', 0, 895),
(30, 177, 'REINF, FR DR WDW RR R/L', 'PIER CING KOTAK', 0, 2719);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses6`
--

CREATE TABLE `proses6` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `nama_proses` char(25) NOT NULL,
  `plan6` int(11) NOT NULL,
  `act_proses6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses6`
--

INSERT INTO `proses6` (`id`, `id_part`, `nama_part`, `nama_proses`, `plan6`, `act_proses6`) VALUES
(1, 5, 'Body Silincer 2 1WD', 'PIERCING', 0, 0),
(8, 122, 'TUBE STEER �48', 'BORRING', 0, 0),
(9, 140, 'BODY SILINCER 2 MS', 'PIERCING', 0, 0),
(10, 141, 'BODY SILINCER 2 B02', 'PIERCING', 0, 0),
(11, 142, 'BODY SILINCER 2 BS7', 'PIERCING', 0, 278),
(12, 143, 'BODY SILINCER BS8', 'PIERCING', 0, 74),
(15, 173, 'HOLDER BRAKE HOSE 5', 'BENDING 5', 0, 800);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses7`
--

CREATE TABLE `proses7` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `nama_proses` char(50) NOT NULL,
  `plan7` int(11) NOT NULL,
  `act_proses7` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses7`
--

INSERT INTO `proses7` (`id`, `id_part`, `nama_part`, `nama_proses`, `plan7`, `act_proses7`) VALUES
(1, 5, 'Body Silincer 2 1WD', 'RESTING', 0, 0),
(2, 140, 'BODY SILINCER 2 MS', 'RESTING', 0, 0),
(3, 141, 'BODY SILINCER 2 B02', 'RESTING', 0, 0),
(4, 142, 'BODY SILINCER 2 BS7', 'RESTING', 0, 278),
(5, 143, 'BODY SILINCER BS8', 'RESTING', 0, 74);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchasing`
--

CREATE TABLE `purchasing` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `no_po` char(75) NOT NULL,
  `tglkirim_po` date NOT NULL,
  `revisi_po` int(11) NOT NULL,
  `nama_part` varchar(100) NOT NULL,
  `spec` char(75) NOT NULL,
  `tebal` char(5) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `qty_po` int(11) NOT NULL,
  `unit` char(10) NOT NULL,
  `qty_act` char(10) NOT NULL,
  `outstanding_qty` char(10) NOT NULL,
  `no_po_supplier` char(75) NOT NULL,
  `tgl_dtg1` date NOT NULL,
  `qty_dtg1` int(11) NOT NULL,
  `statuspertama` char(50) NOT NULL,
  `tgl_dtg2` date NOT NULL,
  `qty_dtg2` int(11) NOT NULL,
  `statuskedua` char(50) NOT NULL,
  `status` char(50) NOT NULL,
  `konfirmasi` char(50) NOT NULL,
  `konfirmasi1` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `purchasing`
--

INSERT INTO `purchasing` (`id`, `nama_customer`, `no_po`, `tglkirim_po`, `revisi_po`, `nama_part`, `spec`, `tebal`, `nama_supplier`, `id_supplier`, `id_customer`, `qty_po`, `unit`, `qty_act`, `outstanding_qty`, `no_po_supplier`, `tgl_dtg1`, `qty_dtg1`, `statuspertama`, `tgl_dtg2`, `qty_dtg2`, `statuskedua`, `status`, `konfirmasi`, `konfirmasi1`) VALUES
(1, 'Panasonic Manufacturing Indonesia', 'D521416', '2022-03-29', 0, 'BASE PANE', 'NSDCD2 SZQFKXK1', '0.8', 'GANDING STOCK OPNAME', 13, 2, 4300, 'pcs', '4300', '0', 'STOCKOPNAME2803', '2022-03-29', 4300, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(2, 'Panasonic Manufacturing Indonesia', 'H151407', '2022-03-29', 0, 'SOUND PROF BOARD', 'ST SGCC-Z22', '0.5', 'GANDING STOCK OPNAME', 13, 2, 1312, 'pcs', '1312', '0', 'STOCKOPNAME2803', '2022-03-29', 1312, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(3, 'Sakura Manufacturing Auto Parts Indonesia', '1WD-E466A-0000-S0905', '2022-03-29', 0, 'Body Silincer 1 1WD', 'SUS409L', '1.2', 'GANDING STOCK OPNAME', 13, 3, 1000, 'pcs', '1000', '0', 'STOCKOPNAME2803', '2022-03-29', 1000, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(4, 'Sakura Manufacturing Auto Parts Indonesia', '2MS-E466E-0000-S1505', '2022-03-29', 0, 'BODY SILINCER 2 MS', 'SUS409L', '1.2', 'GANDING STOCK OPNAME', 13, 3, 636, 'pcs', '636', '0', 'STOCKOPNAME2803', '2022-03-29', 636, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(5, 'Sakura Manufacturing Auto Parts Indonesia', 'BS8-E466E-0000-S1505', '2022-03-29', 0, 'BODY SILINCER BS8', 'SUS409L', '1.2', 'GANDING STOCK OPNAME', 13, 3, 74, 'pcs', '74', '0', 'STOCKOPNAME2803', '2022-03-29', 74, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(6, 'Sakura Manufacturing Auto Parts Indonesia', 'BS7-E466E-0000-S1505', '2022-03-29', 0, 'BODY SILINCER 2 BS7', 'SUS409L', '1.2', 'GANDING STOCK OPNAME', 13, 3, 278, 'pcs', '278', '0', 'STOCKOPNAME2803', '2022-03-29', 278, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(7, 'Sakura Manufacturing Auto Parts Indonesia', '1WD-E469K-0000-S0305', '2022-03-29', 0, 'Plate 3 1WD', 'SUS409L', '1.2', 'GANDING STOCK OPNAME', 13, 3, 1613, 'pcs', '1613', '0', 'STOCKOPNAME2803', '2022-03-29', 1613, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(8, 'Sakura Manufacturing Auto Parts Indonesia', '2MS-E472L-0000-S0605', '2022-03-29', 0, 'BRACKET 2-2 2MS', 'SUS409L', '2.5', 'GANDING STOCK OPNAME', 13, 3, 1000, 'pcs', '1000', '0', 'STOCKOPNAME2803', '2022-03-29', 1000, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(9, 'Sakura Manufacturing Auto Parts Indonesia', '2PV-E475K-0000-S0305', '2022-03-29', 0, 'PIPE 7', '', '', 'GANDING STOCK OPNAME', 13, 3, 50, 'pcs', '50', '0', 'STOCKOPNAME2803', '2022-03-29', 50, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(10, 'Sakura Manufacturing Auto Parts Indonesia', '1FD-E476F-0000-S0305', '2022-03-29', 0, 'REINFORCEMENT 3', 'SUS409L', '1.5', 'GANDING STOCK OPNAME', 13, 3, 3585, 'pcs', '3585', '0', 'STOCKOPNAME2803', '2022-03-29', 3585, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(11, 'Sanden Indonesia', 'N1451-D0360', '2022-03-29', 1, 'B1M-CLAMP ASSY', 'SPCC-SD', '1.0', 'GANDING STOCK OPNAME', 13, 8, 0, 'pcs', '', '', 'STOCKOPNAME2803', '0000-00-00', 0, 'belum', '0000-00-00', 0, 'belum', 'belum', '', ''),
(12, 'Sanden Indonesia', 'N1451-D0360-SUB1', '2022-03-29', 0, 'RUBBER (KECIL)', '', '', 'GANDING STOCK OPNAME', 13, 8, 4647, 'pcs', '4647', '0', 'STOCKOPNAME2803', '2022-03-29', 4647, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(13, 'Sanden Indonesia', 'N1451-D0360', '2022-03-29', 0, 'B1M-CLAMP ASSY', 'SPCC-SD', '1.0', 'GANDING STOCK OPNAME', 13, 8, 4483, 'pcs', '4483', '0', 'STOCKOPNAME2803', '2022-03-29', 4483, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(14, 'Sanden Indonesia', 'N1451-D0380-SUB2', '2022-03-29', 0, 'BOLT', '', '', 'GANDING STOCK OPNAME', 13, 8, 8005, 'pcs', '8005', '0', 'STOCKOPNAME2803', '2022-03-29', 8005, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(15, 'Sanden Indonesia', 'N1451-D0390', '2022-03-29', 0, 'B1M-BRACKET 2', 'YSC270CC', '1.0', 'GANDING STOCK OPNAME', 13, 8, 8482, 'pcs', '8482', '0', 'STOCKOPNAME2803', '2022-03-29', 8482, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(16, 'Sanden Indonesia', 'N1451-D0400', '2022-03-29', 0, 'B1M-CLAMP', 'SPCC-SD', '1.0', 'GANDING STOCK OPNAME', 13, 8, 1000, 'pcs', '1000', '0', 'STOCKOPNAME2803', '2022-03-29', 1000, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(17, 'Sanden Indonesia', 'N1451-D0430', '2022-03-29', 0, 'B1M-CLAMP', 'YSC270CC', '1.0', 'GANDING STOCK OPNAME', 13, 8, 2667, 'pcs', '2667', '0', 'STOCKOPNAME2803', '2022-03-29', 2667, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(18, 'Sanden Indonesia', 'N1451-D0430-SUB1', '2022-03-29', 0, 'RUBBER (BESAR)', '', '', 'GANDING STOCK OPNAME', 13, 8, 5697, 'pcs', '5697', '0', 'STOCKOPNAME2803', '2022-03-29', 5697, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(19, 'Sanoh Indonesia', '17830-73R00-01', '2022-03-29', 1, 'BRACKET NO 1', 'YSC270CC', '1.6', 'GANDING STOCK OPNAME', 13, 5, 0, 'pcs', '', '', 'STOCKOPNAME2803', '0000-00-00', 0, 'belum', '0000-00-00', 0, 'belum', 'belum', '', ''),
(20, 'Sanoh Indonesia', '17830-73R00-01', '2022-03-29', 0, 'BRACKET NO 1', 'YSC270CC', '1.6', 'GANDING STOCK OPNAME', 13, 5, 4530, 'pcs', '4530', '0', 'STOCKOPNAME2803', '2022-03-29', 4530, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(21, 'Sanoh Indonesia', '17830-73R00-03', '2022-03-29', 0, 'BRACKET NO. 3', 'YSC270CC', '1.4', 'GANDING STOCK OPNAME', 13, 5, 7239, 'pcs', '7239', '0', 'STOCKOPNAME2803', '2022-03-29', 7239, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(22, 'Sanoh Indonesia', '51870-73R00-B1', '2022-03-29', 0, 'BRACKET NO. 1', 'JSH270CN', '1.6', 'GANDING STOCK OPNAME', 13, 5, 600, 'pcs', '600', '0', 'STOCKOPNAME2803', '2022-03-29', 600, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(23, 'Sanoh Indonesia', '51870-73R00-B2', '2022-03-29', 0, 'BRACKET NO. 2', 'JSH270CN', '2.6', 'GANDING STOCK OPNAME', 13, 5, 500, 'pcs', '500', '0', 'STOCKOPNAME2803', '2022-03-29', 500, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(24, 'Sanoh Indonesia', '897529250-1', '2022-03-29', 0, 'BRACKET', 'SPHCPO', '3.2', 'GANDING STOCK OPNAME', 13, 5, 812, 'pcs', '812', '0', 'STOCKOPNAME2803', '2022-03-29', 812, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(25, 'Exedy Manufacturing Indonesia', '3B3101050000Q999', '2022-03-29', 0, 'WASHER K16', 'SAPH440-P', '2.0', 'GANDING STOCK OPNAME', 13, 6, 4628, 'pcs', '4628', '0', 'STOCKOPNAME2803', '2022-03-29', 4628, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(26, 'Exedy Manufacturing Indonesia', '390250900000Q010', '2022-03-29', 0, 'NUT RAW EXEDY', 'JSH270C-P', '4.0', 'GANDING STOCK OPNAME', 13, 6, 15543, 'pcs', '15543', '0', 'STOCKOPNAME2803', '2022-03-29', 15543, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(27, 'Fukoku Tokai Rubber', '12-06836-A01', '2022-03-29', 0, 'UPPER PLATE FOR INSULATOR ENG. MTG. RH', 'SPHCPO', '4.5', 'GANDING STOCK OPNAME', 13, 10, 2804, 'pcs', '2804', '0', 'STOCKOPNAME2803', '2022-03-29', 2804, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(28, 'Fukoku Tokai Rubber', '13-09070-A00', '2022-03-29', 0, 'PLATE FOR INSULATOR ENGINE MTG. RR', 'SPHCPO', '6.0', 'GANDING STOCK OPNAME', 13, 10, 8328, 'pcs', '8328', '0', 'STOCKOPNAME2803', '2022-03-29', 8328, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(29, 'Fukoku Tokai Rubber', '13-07271-A02', '2022-03-29', 0, 'NEW CENTER BUMPER RUBBER FRONT', 'SPHCPO', '3.2', 'GANDING STOCK OPNAME', 13, 10, 483, 'pcs', '483', '0', 'STOCKOPNAME2803', '2022-03-29', 483, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(30, 'Fukoku Tokai Rubber', '13-07273-A00', '2022-03-29', 0, 'NEW CENTER CUSHION RAD SUPPORT UPPER', 'SPHCPO', '2.6', 'GANDING STOCK OPNAME', 13, 10, 396, 'pcs', '396', '0', 'STOCKOPNAME2803', '2022-03-29', 396, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(31, 'Fukoku Tokai Rubber', '13-07274-A00', '2022-03-29', 0, 'NEW CENTER CUSHION RAD SUPPORT UPPER', 'SPHCPO', '2.6', 'GANDING STOCK OPNAME', 13, 10, 702, 'pcs', '702', '0', 'STOCKOPNAME2803', '2022-03-29', 702, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(32, 'Fukoku Tokai Rubber', '14-08277-A01', '2022-03-29', 0, 'PLATE FOR INSULATOR ENGINE MTG. RR', 'SPCCSD', '1.4', 'GANDING STOCK OPNAME', 13, 10, 11000, 'pcs', '11000', '0', 'STOCKOPNAME2803', '2022-03-29', 11000, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(33, 'Fukoku Tokai Rubber', 'A4-01397-Z16', '2022-03-29', 0, 'THROWER FOR PULLEY DAMPER', 'SPCCSD', '1.0', 'GANDING STOCK OPNAME', 13, 10, 3900, 'pcs', '3900', '0', 'STOCKOPNAME2803', '2022-03-29', 3900, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(34, 'Fukoku Tokai Rubber', '14-07464-A00', '2022-03-29', 0, 'PLATE FOR CAB. MOUNTING UPPER', 'SAPH440', '4.0', 'GANDING STOCK OPNAME', 13, 10, 138, 'pcs', '138', '0', 'STOCKOPNAME2803', '2022-03-29', 138, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(35, 'Fukoku Tokai Rubber', '13-08793-A01', '2022-03-29', 0, 'INSULATOR ENGINE MOUNTING FR', 'SAPH440 X 4.5 X 105', '4.5', 'GANDING STOCK OPNAME', 13, 10, 181, 'sheet', '181', '0', 'STOCKOPNAME2803', '2022-03-29', 181, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(36, 'Fukoku Tokai Rubber', '13-09070-A00', '2022-03-29', 0, 'PLATE FOR INSULATOR ENGINE MTG. RR', 'SPHCPO X 6.0 X 180', '6.0', 'GANDING STOCK OPNAME', 13, 10, 800, 'sheet', '800', '0', 'STOCKOPNAME2803', '2022-03-29', 800, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(37, 'Fukoku Tokai Rubber', 'A4-01397-Z16', '2022-03-29', 0, 'THROWER FOR PULLEY DAMPER', 'SPCCSD X 1.0 X 110', '1.0', 'GANDING STOCK OPNAME', 13, 10, 35, 'sheet', '35', '0', 'STOCKOPNAME2803', '2022-03-29', 35, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(38, 'Chandra Nugerah Cemerlang', '2DP-F588F-00-00-80', '2022-03-29', 0, 'HOLDER BRAKE HOSE 5', 'SPHC-PO', '2.0', 'GANDING STOCK OPNAME', 13, 7, 800, 'pcs', '800', '0', 'STOCKOPNAME2803', '2022-03-29', 800, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(39, 'Chandra Nugerah Cemerlang', '2SX-F5875-00-00-80', '2022-03-29', 0, 'HOLDER BRAKE HOSE 1', 'SPHC-PO', '1.6', 'GANDING STOCK OPNAME', 13, 7, 5000, 'pcs', '5000', '0', 'STOCKOPNAME2803', '2022-03-29', 5000, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(40, 'Chandra Nugerah Cemerlang', '2DP-F588F-00', '2022-03-29', 0, 'WIRE HOLDER BRAKE HOSE 5', '', '', 'GANDING STOCK OPNAME', 13, 7, 27, 'pcs', '27', '0', 'STOCKOPNAME2803', '2022-03-29', 27, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(41, 'Haeir Electrical Appliances Indonesia', '0060124866', '2022-03-29', 0, 'FRAME BOTTOM ASSY D270/275 (SC1)', '', '0.3', 'GANDING STOCK OPNAME', 13, 14, 5000, 'pcs', '5000', '0', 'STOCKOPNAME2803', '2022-03-29', 5000, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(42, 'Haeir Electrical Appliances Indonesia', '0060867453', '2022-03-29', 0, 'FRAME BOTTOM ASSY AQR-13G(SC1)', '', '0.25', 'GANDING STOCK OPNAME', 13, 14, 7992, 'pcs', '7992', '0', 'STOCKOPNAME2803', '2022-03-29', 7992, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(43, 'Haeir Electrical Appliances Indonesia', '0060867455', '2022-03-29', 0, 'FRAME BOTTOM ASSY AQR-17J/20J(SC1)', '', '0.25', 'GANDING STOCK OPNAME', 13, 14, 1197, 'pcs', '1197', '0', 'STOCKOPNAME2803', '2022-03-29', 1197, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(44, 'Haeir Electrical Appliances Indonesia', '0060867454', '2022-03-29', 0, 'FRAME BOTTOM ASSY MJ-R16A (SC1)', '', '0.25', 'GANDING STOCK OPNAME', 13, 14, 1000, 'pcs', '1000', '0', 'STOCKOPNAME2803', '2022-03-29', 1000, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(45, 'Haeir Electrical Appliances Indonesia', '0060869033', '2022-03-29', 0, 'FRAME REAR AQR-13H ASSY (SC1)', '', '0.2', 'GANDING STOCK OPNAME', 13, 14, 10185, 'pcs', '10185', '0', 'STOCKOPNAME2803', '2022-03-29', 10185, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(46, 'Tiger Sash Indonesia', '68622-73R00', '2022-03-29', 0, 'Gusset RR Dr Hinge Upr R/L', 'JSC270CC', '1.0', 'GANDING STOCK OPNAME', 13, 15, 6188, 'pcs', '6188', '0', 'STOCKOPNAME2803', '2022-03-29', 6188, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(47, 'Tiger Sash Indonesia', '68191-73R00', '2022-03-29', 0, 'REINF, FR DR WDW RR R/L', 'JSC270CC', '0.6', 'GANDING STOCK OPNAME', 13, 15, 2719, 'pcs', '2719', '0', 'STOCKOPNAME2803', '2022-03-29', 2719, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(48, 'Cipta Nissin Industries', '121207032', '2022-03-29', 0, 'BRACKET 1 INTAKE REAR', 'SPHCPO', '3.2', 'GANDING STOCK OPNAME', 13, 9, 702, 'pcs', '702', '0', 'STOCKOPNAME2803', '2022-03-29', 702, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(49, 'Cipta Nissin Industries', '121208032', '2022-03-29', 0, 'STAY 2 INTAKE REAR', 'SPHCPO', '3.2', 'GANDING STOCK OPNAME', 13, 9, 2020, 'pcs', '2020', '0', 'STOCKOPNAME2803', '2022-03-29', 2020, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(50, 'Cipta Nissin Industries', '121209032', '2022-03-29', 0, 'STAY 3 INTAKE REAR', 'SPHCPO', '3.2', 'GANDING STOCK OPNAME', 13, 9, 471, 'pcs', '471', '0', 'STOCKOPNAME2803', '2022-03-29', 471, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(51, 'Cipta Nissin Industries', '121210032', '2022-03-29', 0, 'BRACKET 4 INTAKE REAR', 'SPHCPO', '3.2', 'GANDING STOCK OPNAME', 13, 9, 712, 'pcs', '712', '0', 'STOCKOPNAME2803', '2022-03-29', 712, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(52, 'Cipta Nissin Industries', '121234032', '2022-03-29', 0, 'BRACKET INTAKE FRONT', 'SPHCPO', '3.2', 'GANDING STOCK OPNAME', 13, 9, 1576, 'pcs', '1576', '0', 'STOCKOPNAME2803', '2022-03-29', 1576, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(53, 'Cipta Nissin Industries', '99SGTSLO011400920', '2022-03-29', 0, 'JOINT PIPE FR A', 'SUS 409 THK', '2.0', 'GANDING STOCK OPNAME', 13, 9, 2814, 'pcs', '2814', '0', 'STOCKOPNAME2803', '2022-03-29', 2814, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(54, 'Cipta Nissin Industries', '99SGTSLO0114101920', '2022-03-29', 0, 'JOINT PIPE FR B', 'SUS 409 THK', '2.0', 'GANDING STOCK OPNAME', 13, 9, 995, 'pcs', '995', '0', 'STOCKOPNAME2803', '2022-03-29', 995, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(55, 'Cipta Nissin Industries', '99SGTSLO0115850910', '2022-03-29', 0, 'HEAT PROTECTOR VCC 09-7020', 'SUS 409 THK', '', 'GANDING STOCK OPNAME', 13, 9, 49, 'pcs', '49', '0', 'STOCKOPNAME2803', '2022-03-29', 49, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(56, 'Cipta Nissin Industries', '30001100', '2022-03-29', 0, 'ARM MSA-7000 LH', 'SS400', '4.5', 'GANDING STOCK OPNAME', 13, 9, 269, 'pcs', '269', '0', 'STOCKOPNAME2803', '2022-03-29', 269, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(57, 'Cipta Nissin Industries', '35100080', '2022-03-29', 0, 'LEVER MSA-700 SC', 'SS400', '8.0', 'GANDING STOCK OPNAME', 13, 9, 152, 'pcs', '152', '0', 'STOCKOPNAME2803', '2022-03-29', 152, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(58, 'Inti Ganda Perdana', '47381-BZ120#106210010', '2022-03-29', 0, 'Bracket Tube Clamp BZ120', 'SPHCPO', '2.3', 'GANDING STOCK OPNAME', 13, 1, 765, 'pcs', '765', '0', 'STOCKOPNAME2803', '2022-03-29', 765, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(59, 'Inti Ganda Perdana', '47381-BZ120#106210010-SUB1', '2022-03-29', 0, 'NUT M6 (SAGATEK)', '', '', 'GANDING STOCK OPNAME', 13, 1, 7403, 'pcs', '7403', '0', 'STOCKOPNAME2803', '2022-03-29', 7403, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(60, 'Inti Ganda Perdana', '47351-BZ140#199730010', '2022-03-29', 0, 'Bracket Flexible Hose BZ140', 'SPHCPO', '2.3', 'GANDING STOCK OPNAME', 13, 1, 500, 'pcs', '500', '0', 'STOCKOPNAME2803', '2022-03-29', 500, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(61, 'Exedy Manufacturing Indonesia', '3B3101050000Q999', '2022-03-29', 0, 'WASHER K16', 'SAPH440-P X 2.0 X 100', '2.0', 'GANDING STOCK OPNAME', 13, 6, 1240, 'coil', '1240', '0', 'STOCKOPNAME2803', '2022-03-29', 1240, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(62, 'Exedy Manufacturing Indonesia', '3B2701050000Q999', '2022-03-29', 0, 'WASHER G20', 'SAPH440-P X 2.0 X 115', '2.0', 'GANDING STOCK OPNAME', 13, 6, 800, 'coil', '800', '0', 'STOCKOPNAME2803', '2022-03-29', 800, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(63, 'Sakura Java Indonesia', '1WD-E473L-0000-0310', '2022-03-29', 0, 'Bracket 3-2 CP 1WD', 'SUS409L', '1.5', 'GANDING STOCK OPNAME', 13, 4, 1415, 'pcs', '1415', '0', 'STOCKOPNAME2803', '2022-03-29', 1415, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(64, 'Exedy Manufacturing Indonesia', '390250900000Q010', '2022-03-29', 0, 'NUT RAW EXEDY', 'JSH270C-P X 4.0 X 232', '4.0', 'GANDING STOCK OPNAME', 13, 6, 118, 'coil', '118', '0', 'STOCKOPNAME2803', '2022-03-29', 118, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(65, 'Exedy Manufacturing Indonesia', '3B5409000000Q010', '2022-03-29', 0, 'NUT STA EXEDY', 'JSH270C-P X 3.8 X 273', '3.8', 'GANDING STOCK OPNAME', 13, 6, 486, 'coil', '486', '0', 'STOCKOPNAME2803', '2022-03-29', 486, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(66, 'Sakura Java Indonesia', '1WD-E473L-0000-0310-SUB1', '2022-03-29', 0, 'NUT M6 GRAKINDO', '', '', 'GANDING STOCK OPNAME', 13, 4, 42, 'pcs', '42', '0', 'STOCKOPNAME2803', '2022-03-29', 42, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(67, 'Sakura Java Indonesia', '1WD-E473L-0000-0310-SUB1', '2022-03-29', 0, 'NUT M6 GRAKINDO', '', '', 'GANDING STOCK OPNAME', 13, 4, 84, 'pcs', '84', '0', 'STOCKOPNAME2803', '2022-03-29', 84, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(68, 'Sakura Java Indonesia', '1WD-E473L-0000-0310', '2022-03-29', 0, 'Bracket 3-2 CP 1WD', 'SUS409L X 1.5 X 270', '1.5', 'GANDING STOCK OPNAME', 13, 4, 80, 'sheet', '80', '0', 'STOCKOPNAME2803', '2022-03-29', 80, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(69, 'Sakura Java Indonesia', '1WD-E466J-0000-0305', '2022-03-29', 0, 'Pipe Silincer 2 CP 1WD', 'SUS409L', '1.2', 'GANDING STOCK OPNAME', 13, 4, 797, 'pcs', '797', '0', 'STOCKOPNAME2803', '2022-03-29', 797, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(70, 'Sakura Java Indonesia', '1WD-E466M-0000-0305', '2022-03-29', 0, 'Pipe Silincer 5 CP 1WD', 'SUS409L', '1.2', 'GANDING STOCK OPNAME', 13, 4, 4820, 'pcs', '4820', '0', 'STOCKOPNAME2803', '2022-03-29', 4820, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(71, 'Sakura Java Indonesia', '1WD-E466J-0000-0305-SUB', '2022-03-29', 0, 'Pipe Silincer 3 1WD', 'SUS409L', '1.2', 'GANDING STOCK OPNAME', 13, 4, 457, 'pcs', '457', '0', 'STOCKOPNAME2803', '2022-03-29', 457, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(72, 'Sakura Java Indonesia', '1WD-E466M-0000-0305-SUB', '2022-03-29', 0, 'Pipe Silincer 6 1WD', 'SUS409L', '1.2', 'GANDING STOCK OPNAME', 13, 4, 1795, 'pcs', '1795', '0', 'STOCKOPNAME2803', '2022-03-29', 1795, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(73, 'Sakura Java Indonesia', '2PH-E4781-0000-0305', '2022-03-29', 0, 'Stay Muff 2-1 2PH', 'SPHCPO', '2.6', 'GANDING STOCK OPNAME', 13, 4, 10491, 'pcs', '10491', '0', 'STOCKOPNAME2803', '2022-03-29', 10491, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(74, 'Sakura Java Indonesia', '2DP-E461A-0000-0605', '2022-03-29', 0, 'BODY PIPE 1-1 2DP RH', 'SUS409L', '1.0', 'GANDING STOCK OPNAME', 13, 4, 562, 'pcs', '562', '0', 'STOCKOPNAME2803', '2022-03-29', 562, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(75, 'Sakura Java Indonesia', '2DP-E461A-0000-0605-SUB', '2022-03-29', 0, 'BODY PIPE 1-2 2DP LH', 'SUS409L', '1.0', 'GANDING STOCK OPNAME', 13, 4, 162, 'pcs', '162', '0', 'STOCKOPNAME2803', '2022-03-29', 162, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(76, 'Sakura Java Indonesia', '1DY-E474K-0000-0305', '2022-03-29', 0, 'Bracket 4-1 1DY', 'SPHCPO', '1.6', 'GANDING STOCK OPNAME', 13, 4, 1660, 'pcs', '1660', '0', 'STOCKOPNAME2803', '2022-03-29', 1660, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(77, 'Sakura Java Indonesia', '1DY-E474L-0000-0305', '2022-03-29', 0, 'Bracket 4-2 1DY', 'SPHCPO', '1.6', 'GANDING STOCK OPNAME', 13, 4, 524, 'pcs', '524', '0', 'STOCKOPNAME2803', '2022-03-29', 524, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(78, 'Sakura Java Indonesia', '5D9-E4781-0100-0305', '2022-03-29', 0, 'Stay Muff 2-1 5D9', 'SPHCPO', '2.6', 'GANDING STOCK OPNAME', 13, 4, 2020, 'pcs', '2020', '0', 'STOCKOPNAME2803', '2022-03-29', 2020, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(79, 'Sakura Java Indonesia', '1FD-E4781-0000-0305', '2022-03-29', 0, 'Stay Muff 2-1 1FD', 'SPHCPO', '2.6', 'GANDING STOCK OPNAME', 13, 4, 430, 'pcs', '430', '0', 'STOCKOPNAME2803', '2022-03-29', 430, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(80, 'Sakura Java Indonesia', '1WD-E466J-0000-0305', '2022-03-28', 0, 'Pipe Silincer 2 CP 1WD', 'SUS409L X 1.2 X 130', '1.2', 'GANDING STOCK OPNAME', 13, 4, 150, 'sheet', '150', '0', 'STOCKOPNAME2803', '2022-03-28', 150, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(81, 'Sakura Java Indonesia', '1WD-E466J-0000-0305-SUB', '2022-03-28', 0, 'Pipe Silincer 3 1WD', 'SUS409L X 1.2 X 130', '1.2', 'GANDING STOCK OPNAME', 13, 4, 100, 'sheet', '100', '0', 'STOCKOPNAME2803', '2022-03-28', 100, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(82, 'Sakura Java Indonesia', '2PH-E4781-0000-0305', '2022-03-28', 0, 'Stay Muff 2-1 2PH', 'SPHCPO X 2.6 X 170', '2.6', 'GANDING STOCK OPNAME', 13, 4, 484, 'coil', '484', '0', 'STOCKOPNAME2803', '2022-03-28', 484, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(83, 'Sanden Indonesia', 'N1451-D0460', '2022-03-28', 0, 'B1M-BRACKET 1 TANPA BOLT', 'YSC270CC', '1.0', 'GANDING STOCK OPNAME', 13, 8, 79, 'pcs', '79', '0', 'STOCKOPNAME2803', '2022-03-28', 79, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(84, 'Sanden Indonesia', 'N1451-D0380', '2022-03-28', 0, 'B1M-BRACKET 1 + 2 BOLT', 'YSC270CC', '1.0', 'GANDING STOCK OPNAME', 13, 8, 2962, 'pcs', '2962', '0', 'STOCKOPNAME2803', '2022-03-28', 2962, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', ''),
(85, 'Sanden Indonesia', 'N1451-D0380-SUB1', '2022-03-28', 0, 'COLLAR', '', '', 'GANDING STOCK OPNAME', 13, 8, 27, 'pcs', '27', '0', 'STOCKOPNAME2803', '2022-03-28', 27, 'sudah', '0000-00-00', 0, 'belum', 'sudah', 'dikonfirmasi', '');

--
-- Trigger `purchasing`
--
DELIMITER $$
CREATE TRIGGER `event` AFTER INSERT ON `purchasing` FOR EACH ROW BEGIN
insert into rencana VALUES
('', concat('Rencana Kedatangan pertama: ',New.no_po_supplier,"-", New.nama_supplier,"-", New.qty_dtg1, "-", New.unit),'kedatangan pertama', New.tgl_dtg1, New.tgl_dtg1, New.no_po,New.no_po_supplier, '');

insert into rencana VALUES
('', concat('Rencana Kedatangan kedua: ',New.no_po_supplier,"-", New.nama_supplier,"-", New.qty_dtg2, "-", New.unit),'kedatangan kedua', New.tgl_dtg2, New.tgl_dtg2, New.no_po,New.no_po_supplier, '');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana`
--

CREATE TABLE `rencana` (
  `id` int(11) NOT NULL,
  `no_po_supplier` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `qty1` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `qty2` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `rencana`
--

INSERT INTO `rencana` (`id`, `no_po_supplier`, `description`, `start_date`, `end_date`, `qty1`, `qty2`, `status`) VALUES
(21, 'Rencana Kedatangan pertama: STOCKOPNAME2803-GANDING STOCK OPNAME-4497-pcs', 'kedatangan pertama', '2022-03-29', '2022-03-29', 'N1451-D0360', 'STOCKOPNAME2803', 0),
(26, 'Rencana Kedatangan kedua: STOCKOPNAME2803-GANDING STOCK OPNAME-0-pcs', 'kedatangan kedua', '0000-00-00', '0000-00-00', 'N1451-D0360', 'STOCKOPNAME2803', 0),
(37, 'Rencana Kedatangan pertama: STOCKOPNAME2803-GANDING STOCK OPNAME-4530-pcs', 'kedatangan pertama', '2022-03-29', '2022-03-29', '17830-73R00-01', 'STOCKOPNAME2803', 0),
(40, 'Rencana Kedatangan kedua: STOCKOPNAME2803-GANDING STOCK OPNAME-0-pcs', 'kedatangan kedua', '0000-00-00', '0000-00-00', '17830-73R00-01', 'STOCKOPNAME2803', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `scheduledelivery`
--

CREATE TABLE `scheduledelivery` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_po` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` char(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `scheduleproduksi`
--

CREATE TABLE `scheduleproduksi` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `proses` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spot`
--

CREATE TABLE `spot` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `nama_part` char(50) NOT NULL,
  `nama_proses` char(50) NOT NULL,
  `qty_in` int(11) NOT NULL,
  `qty_out` int(11) NOT NULL,
  `keterangan` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spot`
--

INSERT INTO `spot` (`id`, `id_part`, `nama_part`, `nama_proses`, `qty_in`, `qty_out`, `keterangan`) VALUES
(1, 1, 'Bracket Tube Clamp BZ120', 'SPOT NUT M6 IGP', 0, 0, 'spot1'),
(2, 15, 'Bracket 3-2 CP 1WD', 'SPOT NUT M6 SJI', 0, 42, 'spot1'),
(28, 89, 'BRACKET INNER SHIELD', 'SPOT NUT M6', 0, 0, 'spot1'),
(29, 91, 'BRACKET HORN', 'SPOT NUT M6', 0, 0, 'spot1'),
(30, 92, 'BRACKET TOP REAR COVER', 'SPOT NUT M6', 0, 0, 'spot1'),
(31, 93, 'BRACKET MAIN KEY', 'SPOT NUT M6', 0, 0, 'spot1'),
(32, 94, 'BRACKET LAMP HOLDER', 'SPOT NUT M6', 0, 0, 'spot1'),
(33, 97, 'BRACKET HANDLE SEAT RH', 'SPOT M8', 0, 0, 'spot1'),
(34, 98, 'BRACKET HANDLE SEAT LH', 'SPOT NUT M8', 0, 0, 'spot1'),
(35, 99, 'BRACKET SEAT LOCK', 'SPOT NUT M6', 0, 0, 'spot1'),
(36, 100, 'BRACKET REAR CONTROLER RH', 'SPOT NUT M6', 0, 0, 'spot1'),
(37, 101, 'BRACKET REAR CONTROLER LH', 'SPOT NUT M6', 0, 0, 'spot1'),
(38, 104, 'MOUNTING BRACKET LICENSE SUPPORT', 'SPOT NUT M6', 0, 0, 'spot1'),
(39, 105, 'BRACKET REAR BOTTOM COVER RH/LH', 'SPOT NUT M6', 0, 0, 'spot1'),
(41, 107, 'BRACKET BOX BATTERY FRONT RH', 'SPOT NUT M6', 0, 0, 'spot1'),
(42, 108, 'BRACKET BOX BATTERY FRONT LH', 'SPOT NUT M6', 0, 0, 'spot1'),
(43, 109, 'BRACKET REAR SIDE REAR RH', 'SPOT NUT M6', 0, 0, 'spot1'),
(44, 110, 'BRACKET REAR SIDE REAR LH', 'SPOT NUT M6', 0, 0, 'spot1'),
(45, 111, 'BRACKET BOX BATTERY REAR RH', 'SPOT NUT M6', 0, 0, 'spot1'),
(46, 112, 'BRACKET BOX BATTERY REAR LH', 'SPOT NUT M6', 0, 0, 'spot1'),
(47, 113, 'BRACKET RIDER PLATFORM FRONT RH/LH', 'SPOT NUT M6', 0, 0, 'spot1'),
(49, 117, 'BRACKET RIDER PLATFORM REAR RH/LH', 'SPOT NUT M6', 0, 0, 'spot1'),
(51, 119, 'BRACKET UNDER SEAT RH/LH', 'SPOT NUT M6', 0, 0, 'spot1'),
(54, 156, 'B1M-BRACKET 1 TANPA BOLT', 'SPOT COLLAR', 8, 0, 'spot1'),
(65, 132, 'B1M-BRACKET 1 + 2 BOLT', 'SPOT COLLAR', 0, 0, 'spot1'),
(66, 132, 'B1M-BRACKET 1 + 2 BOLT', 'SPOT COLLAR', 0, 0, 'spot2'),
(67, 172, 'BRACKET BOX TOOL REAR', 'SPOT NUT M6', 0, 0, 'spot1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stuff`
--

CREATE TABLE `stuff` (
  `sku` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subcont`
--

CREATE TABLE `subcont` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `no_po_supplier` char(100) NOT NULL,
  `quantitykirim` int(11) NOT NULL,
  `quantitydatang` int(11) NOT NULL,
  `ng` int(11) NOT NULL,
  `keterangan` char(150) NOT NULL,
  `status` char(50) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` char(50) NOT NULL,
  `alamat` char(75) NOT NULL,
  `kontak` char(50) NOT NULL,
  `person` char(50) NOT NULL,
  `email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `kontak`, `person`, `email`) VALUES
(2, 'CV Paros Dian Wijaya', 'Jln. Bima Duta V, Perum Jl. Kota Legenda No.8, Lambangsari, Kec. Tambun Sel', ' 8265 0539, 8265 0405, 8260 7534', 'Fax : 8265 0542', 'marketing@parosdianwijaya.com   Media Sosial'),
(3, 'PT. DIKA KARYA MANDIRI', 'Kp. Pamahan Rukem RT, 001Jl. Rawa Bangkong Ds Jatireja Cikarang Timur Kab.', 'Telp. 021-897005/ 0857738000078', '', 'dkr@dikaraya.com'),
(4, 'PT. EXEDY MANUFACTURING INDONESIA', 'Kawasan Industri KIIC EE-3,5 Jl. Permata III Sinar Raya Teluk Jambe, Karawa', '', '', ''),
(5, 'PT. PERSADA PERKASA TEKNIK', 'Kp. Tembong Gunung, RT.08/RW.04, Sukamahi, Kec. Cikarang Pusat, Kabupaten B', '', '', ''),
(6, 'PT. SUPER SINAR ABADI', 'Jl. Suci 45 Cijantung Jakarta Timur 13750', '', '', ' mfg.ssa@cbn.net.id'),
(7, 'CV. TERBIT BUMI MANDIRI', 'Gedung Kirana Two Lantai 10-A Jl. Boulevard Timur No. 88 Jakarta Utara 1424', '', '', ''),
(8, 'PT. SUPER STEEL KARAWANG', 'Jl. Surya Utama Kav. 1 No. 22A Kawasan Industri Surya Cipta Karawang Barat', '', '', ''),
(9, 'PT. MAHIDARA BESI MULIA', 'Perum Kota Wisata, Ruko Trafalgar, Jl. Boulevard Kota Wisata Blok SE-I, No.', '', '', ''),
(10, 'PT. SAGA HIKARI TEKNINDO SEJATI', 'Jl. Raya Serang-Cibarusah Kp. Pagaulan RT 010/RW 002 Ds Sukasari Cikarang 1', '021-89900855', '', 'marketing@sagateknindo.co.id'),
(11, 'PT. BAHANA UNINDO TEKHNIK', 'Sentra Niaga Kalimas Jl. Raya H Noor Ali. Kav AA. 08-09 Setia Darma Tambun', '0821-2588-6336', '', ''),
(12, 'PT. STEEL PIPE INDUSTRY OF INDONESIA, Tbk', 'Kawasan Industri Mitra Karawang - Jl. Mitra Raya II Blok F2, Karawang', '', '', ''),
(13, 'GANDING STOCK OPNAME', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surjal`
--

CREATE TABLE `surjal` (
  `id` int(11) NOT NULL,
  `nomor_surjal` char(50) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `info` char(50) NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surjal`
--

INSERT INTO `surjal` (`id`, `nomor_surjal`, `id_purchase`, `id_supplier`, `info`, `tgl`) VALUES
(1, 'STOCKOPNAME2803', 1, 13, 'kedatangan pertama', '2022-03-29'),
(2, 'STOCKOPNAME2803', 2, 13, 'kedatangan pertama', '2022-03-29'),
(3, 'STOCKOPNAME2803', 3, 13, 'kedatangan pertama', '2022-03-29'),
(4, 'STOCKOPNAME2803', 4, 13, 'kedatangan pertama', '2022-03-29'),
(5, 'STOCKOPNAME2803', 5, 13, 'kedatangan pertama', '2022-03-29'),
(6, 'STOCKOPNAME2803', 6, 13, 'kedatangan pertama', '2022-03-29'),
(7, 'STOCKOPNAME2803', 7, 13, 'kedatangan pertama', '2022-03-29'),
(8, 'STOCKOPNAME2803', 8, 13, 'kedatangan pertama', '2022-03-29'),
(9, 'STOCKOPNAME2803', 9, 13, 'kedatangan pertama', '2022-03-29'),
(10, 'STOCKOPNAME2803', 10, 13, 'kedatangan pertama', '2022-03-29'),
(11, 'STOCKOPNAME2803', 12, 13, 'kedatangan pertama', '2022-03-29'),
(12, 'STOCKOPNAME2803', 13, 13, 'kedatangan pertama', '2022-03-29'),
(13, 'STOCKOPNAME2803', 14, 13, 'kedatangan pertama', '2022-03-29'),
(14, 'STOCKOPNAME2803', 15, 13, 'kedatangan pertama', '2022-03-29'),
(15, 'STOCKOPNAME2803', 16, 13, 'kedatangan pertama', '2022-03-29'),
(16, 'STOCKOPNAME2803', 17, 13, 'kedatangan pertama', '2022-03-29'),
(17, 'STOCKOPNAME2803', 18, 13, 'kedatangan pertama', '2022-03-29'),
(18, 'STOCKOPNAME2803', 20, 13, 'kedatangan pertama', '2022-03-29'),
(19, 'STOCKOPNAME2803', 21, 13, 'kedatangan pertama', '2022-03-29'),
(20, 'STOCKOPNAME2803', 22, 13, 'kedatangan pertama', '2022-03-29'),
(21, 'STOCKOPNAME2803', 23, 13, 'kedatangan pertama', '2022-03-29'),
(22, 'STOCKOPNAME2803', 24, 13, 'kedatangan pertama', '2022-03-29'),
(23, 'STOCKOPNAME2803', 25, 13, 'kedatangan pertama', '2022-03-30'),
(24, 'STOCKOPNAME2803', 26, 13, 'kedatangan pertama', '2022-03-30'),
(25, 'STOCKOPNAME2803', 27, 13, 'kedatangan pertama', '2022-03-30'),
(26, 'STOCKOPNAME2803', 28, 13, 'kedatangan pertama', '2022-03-30'),
(27, 'STOCKOPNAME2803', 29, 13, 'kedatangan pertama', '2022-03-30'),
(28, 'STOCKOPNAME2803', 30, 13, 'kedatangan pertama', '2022-03-30'),
(29, 'STOCKOPNAME2803', 31, 13, 'kedatangan pertama', '2022-03-30'),
(30, 'STOCKOPNAME2803', 32, 13, 'kedatangan pertama', '2022-03-30'),
(31, 'STOCKOPNAME2803', 33, 13, 'kedatangan pertama', '2022-03-30'),
(32, 'STOCKOPNAME2803', 34, 13, 'kedatangan pertama', '2022-03-30'),
(33, 'STOCKOPNAME2803', 35, 13, 'kedatangan pertama', '2022-03-30'),
(34, 'STOCKOPNAME2803', 36, 13, 'kedatangan pertama', '2022-03-30'),
(35, 'STOCKOPNAME2803', 37, 13, 'kedatangan pertama', '2022-03-30'),
(36, 'STOCKOPNAME2803', 38, 13, 'kedatangan pertama', '2022-03-30'),
(37, 'STOCKOPNAME2803', 39, 13, 'kedatangan pertama', '2022-03-30'),
(38, 'STOCKOPNAME2803', 40, 13, 'kedatangan pertama', '2022-03-30'),
(39, 'STOCKOPNAME2803', 41, 13, 'kedatangan pertama', '2022-03-30'),
(40, 'STOCKOPNAME2803', 42, 13, 'kedatangan pertama', '2022-03-30'),
(41, 'STOCKOPNAME2803', 43, 13, 'kedatangan pertama', '2022-03-30'),
(42, 'STOCKOPNAME2803', 44, 13, 'kedatangan pertama', '2022-03-30'),
(43, 'STOCKOPNAME2803', 45, 13, 'kedatangan pertama', '2022-03-30'),
(44, 'STOCKOPNAME2803', 46, 13, 'kedatangan pertama', '2022-03-30'),
(45, 'STOCKOPNAME2803', 47, 13, 'kedatangan pertama', '2022-03-30'),
(46, 'STOCKOPNAME2803', 48, 13, 'kedatangan pertama', '2022-03-30'),
(47, 'STOCKOPNAME2803', 49, 13, 'kedatangan pertama', '2022-03-30'),
(48, 'STOCKOPNAME2803', 50, 13, 'kedatangan pertama', '2022-03-30'),
(49, 'STOCKOPNAME2803', 51, 13, 'kedatangan pertama', '2022-03-30'),
(50, 'STOCKOPNAME2803', 52, 13, 'kedatangan pertama', '2022-03-30'),
(51, 'STOCKOPNAME2803', 53, 13, 'kedatangan pertama', '2022-03-30'),
(52, 'STOCKOPNAME2803', 54, 13, 'kedatangan pertama', '2022-03-30'),
(53, 'STOCKOPNAME2803', 55, 13, 'kedatangan pertama', '2022-03-30'),
(54, 'STOCKOPNAME2803', 56, 13, 'kedatangan pertama', '2022-03-30'),
(55, 'STOCKOPNAME2803', 57, 13, 'kedatangan pertama', '2022-03-30'),
(56, 'STOCKOPNAME2803', 58, 13, 'kedatangan pertama', '2022-03-30'),
(57, 'STOCKOPNAME2803', 59, 13, 'kedatangan pertama', '2022-03-30'),
(58, 'STOCKOPNAME2803', 60, 13, 'kedatangan pertama', '2022-03-30'),
(59, 'STOCKOPNAME2803', 63, 13, 'kedatangan pertama', '2022-03-30'),
(60, 'STOCKOPNAME2803', 61, 13, 'kedatangan pertama', '2022-03-30'),
(61, 'STOCKOPNAME2803', 62, 13, 'kedatangan pertama', '2022-03-30'),
(62, 'STOCKOPNAME2803', 64, 13, 'kedatangan pertama', '2022-03-30'),
(63, 'STOCKOPNAME2803', 65, 13, 'kedatangan pertama', '2022-03-30'),
(64, 'STOCKOPNAME2803', 66, 13, 'kedatangan pertama', '2022-03-30'),
(65, 'STOCKOPNAME2803', 67, 13, 'kedatangan pertama', '2022-03-30'),
(66, 'STOCKOPNAME2803', 69, 13, 'kedatangan pertama', '2022-03-30'),
(67, 'STOCKOPNAME2803', 70, 13, 'kedatangan pertama', '2022-03-30'),
(68, 'STOCKOPNAME2803', 71, 13, 'kedatangan pertama', '2022-03-30'),
(69, 'STOCKOPNAME2803', 72, 13, 'kedatangan pertama', '2022-03-30'),
(70, 'STOCKOPNAME2803', 73, 13, 'kedatangan pertama', '2022-03-30'),
(71, 'STOCKOPNAME2803', 74, 13, 'kedatangan pertama', '2022-03-30'),
(72, 'STOCKOPNAME2803', 75, 13, 'kedatangan pertama', '2022-03-30'),
(73, 'STOCKOPNAME2803', 76, 13, 'kedatangan pertama', '2022-03-30'),
(74, 'STOCKOPNAME2803', 77, 13, 'kedatangan pertama', '2022-03-30'),
(75, 'STOCKOPNAME2803', 78, 13, 'kedatangan pertama', '2022-03-30'),
(76, 'STOCKOPNAME2803', 79, 13, 'kedatangan pertama', '2022-03-30'),
(77, 'STOCKOPNAME2803', 68, 13, 'kedatangan pertama', '2022-04-01'),
(78, 'STOCKOPNAME2803', 80, 13, 'kedatangan pertama', '2022-04-01'),
(79, 'STOCKOPNAME2803', 81, 13, 'kedatangan pertama', '2022-04-01'),
(80, 'STOCKOPNAME2803', 82, 13, 'kedatangan pertama', '2022-04-01'),
(81, 'STOCKOPNAME2803', 83, 13, 'kedatangan pertama', '2022-04-01'),
(82, 'STOCKOPNAME2803', 84, 13, 'kedatangan pertama', '2022-04-01'),
(83, 'STOCKOPNAME2803', 85, 13, 'kedatangan pertama', '2022-04-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surjalcust`
--

CREATE TABLE `surjalcust` (
  `id` int(11) NOT NULL,
  `idpo` int(11) NOT NULL,
  `nosurjal` char(75) NOT NULL,
  `tgl` datetime NOT NULL,
  `qty` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surjaldatangsubcont`
--

CREATE TABLE `surjaldatangsubcont` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `ng` int(11) NOT NULL,
  `keterangan` char(50) NOT NULL,
  `tgl` date NOT NULL,
  `nomorsurjal` char(100) NOT NULL,
  `no_po_supplier` char(100) NOT NULL,
  `idsup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surjalsubcont`
--

CREATE TABLE `surjalsubcont` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `nomorsurjal` char(100) NOT NULL,
  `no_po_supplier` char(100) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `nama_customer` char(50) NOT NULL,
  `nama_supplier` char(50) NOT NULL,
  `no_po_supplier` char(50) NOT NULL,
  `kodepart` char(75) NOT NULL,
  `nama_material` char(75) NOT NULL,
  `spec` char(50) NOT NULL,
  `tebal` char(25) NOT NULL,
  `total_qty` char(50) NOT NULL,
  `unit` char(50) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `status` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `warehouse`
--

INSERT INTO `warehouse` (`id`, `nama_customer`, `nama_supplier`, `no_po_supplier`, `kodepart`, `nama_material`, `spec`, `tebal`, `total_qty`, `unit`, `tanggal_datang`, `id_supplier`, `id_customer`, `status`) VALUES
(1, 'Panasonic Manufacturing Indonesia', 'GANDING STOCK OPNAME', '', 'D521416', 'BASE PANE', 'NSDCD2 SZQFKXK1', '0.8', '3300', 'pcs', '2022-03-29', 13, 2, 'dikonfirmasi'),
(2, 'Panasonic Manufacturing Indonesia', 'GANDING STOCK OPNAME', '', 'H151407', 'SOUND PROF BOARD', 'ST SGCC-Z22', '0.5', '0', 'pcs', '2022-03-29', 13, 2, 'dikonfirmasi'),
(3, 'Sakura Manufacturing Auto Parts Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E466A-0000-S0905', 'Body Silincer 1 1WD', 'SUS409L', '1.2', '0', 'pcs', '2022-03-29', 13, 3, 'dikonfirmasi'),
(4, 'Sakura Manufacturing Auto Parts Indonesia', 'GANDING STOCK OPNAME', '', '2MS-E466E-0000-S1505', 'BODY SILINCER 2 MS', 'SUS409L', '1.2', '0', 'pcs', '2022-03-29', 13, 3, 'dikonfirmasi'),
(5, 'Sakura Manufacturing Auto Parts Indonesia', 'GANDING STOCK OPNAME', '', 'BS8-E466E-0000-S1505', 'BODY SILINCER BS8', 'SUS409L', '1.2', '0', 'pcs', '2022-03-29', 13, 3, 'dikonfirmasi'),
(6, 'Sakura Manufacturing Auto Parts Indonesia', 'GANDING STOCK OPNAME', '', 'BS7-E466E-0000-S1505', 'BODY SILINCER 2 BS7', 'SUS409L', '1.2', '0', 'pcs', '2022-03-29', 13, 3, 'dikonfirmasi'),
(7, 'Sakura Manufacturing Auto Parts Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E469K-0000-S0305', 'Plate 3 1WD', 'SUS409L', '1.2', '0', 'pcs', '2022-03-29', 13, 3, 'dikonfirmasi'),
(8, 'Sakura Manufacturing Auto Parts Indonesia', 'GANDING STOCK OPNAME', '', '2MS-E472L-0000-S0605', 'BRACKET 2-2 2MS', 'SUS409L', '2.5', '0', 'pcs', '2022-03-29', 13, 3, 'dikonfirmasi'),
(9, 'Sakura Manufacturing Auto Parts Indonesia', 'GANDING STOCK OPNAME', '', '2PV-E475K-0000-S0305', 'PIPE 7', '', '', '0', 'pcs', '2022-03-29', 13, 3, 'dikonfirmasi'),
(10, 'Sakura Manufacturing Auto Parts Indonesia', 'GANDING STOCK OPNAME', '', '1FD-E476F-0000-S0305', 'REINFORCEMENT 3', 'SUS409L', '1.5', '0', 'pcs', '2022-03-29', 13, 3, 'dikonfirmasi'),
(11, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0360-SUB1', 'RUBBER (KECIL)', '', '', '4647', 'pcs', '2022-03-29', 13, 8, 'dikonfirmasi'),
(12, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0360', 'B1M-CLAMP ASSY', 'SPCC-SD', '1.0', '0', 'pcs', '2022-03-29', 13, 8, 'dikonfirmasi'),
(13, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0380-SUB2', 'BOLT', '', '', '8005', 'pcs', '2022-03-29', 13, 8, 'dikonfirmasi'),
(14, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0390', 'B1M-BRACKET 2', 'YSC270CC', '1.0', '0', 'pcs', '2022-03-29', 13, 8, 'dikonfirmasi'),
(15, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0400', 'B1M-CLAMP', 'SPCC-SD', '1.0', '0', 'pcs', '2022-03-29', 13, 8, 'dikonfirmasi'),
(16, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0430', 'B1M-CLAMP', 'YSC270CC', '1.0', '0', 'pcs', '2022-03-29', 13, 8, 'dikonfirmasi'),
(17, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0430-SUB1', 'RUBBER (BESAR)', '', '', '5697', 'pcs', '2022-03-29', 13, 8, 'dikonfirmasi'),
(18, 'Sanoh Indonesia', 'GANDING STOCK OPNAME', '', '17830-73R00-01', 'BRACKET NO 1', 'YSC270CC', '1.6', '0', 'pcs', '2022-03-29', 13, 5, 'dikonfirmasi'),
(19, 'Sanoh Indonesia', 'GANDING STOCK OPNAME', '', '17830-73R00-03', 'BRACKET NO. 3', 'YSC270CC', '1.4', '0', 'pcs', '2022-03-29', 13, 5, 'dikonfirmasi'),
(20, 'Sanoh Indonesia', 'GANDING STOCK OPNAME', '', '51870-73R00-B1', 'BRACKET NO. 1', 'JSH270CN', '1.6', '0', 'pcs', '2022-03-29', 13, 5, 'dikonfirmasi'),
(21, 'Sanoh Indonesia', 'GANDING STOCK OPNAME', '', '51870-73R00-B2', 'BRACKET NO. 2', 'JSH270CN', '2.6', '0', 'pcs', '2022-03-29', 13, 5, 'dikonfirmasi'),
(22, 'Sanoh Indonesia', 'GANDING STOCK OPNAME', '', '897529250-1', 'BRACKET', 'SPHCPO', '3.2', '0', 'pcs', '2022-03-29', 13, 5, 'dikonfirmasi'),
(23, 'Exedy Manufacturing Indonesia', 'GANDING STOCK OPNAME', '', '3B3101050000Q999', 'WASHER K16', 'SAPH440-P', '2.0', '1858', 'pcs', '2022-03-30', 13, 6, 'dikonfirmasi'),
(24, 'Exedy Manufacturing Indonesia', 'GANDING STOCK OPNAME', '', '390250900000Q010', 'NUT RAW EXEDY', 'JSH270C-P', '4.0', '7343', 'pcs', '2022-03-30', 13, 6, 'dikonfirmasi'),
(25, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', '12-06836-A01', 'UPPER PLATE FOR INSULATOR ENG. MTG. RH', 'SPHCPO', '4.5', '0', 'pcs', '2022-03-30', 13, 10, 'dikonfirmasi'),
(26, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', '13-09070-A00', 'PLATE FOR INSULATOR ENGINE MTG. RR', 'SPHCPO', '6.0', '0', 'pcs', '2022-03-30', 13, 10, 'dikonfirmasi'),
(27, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', '13-07271-A02', 'NEW CENTER BUMPER RUBBER FRONT', 'SPHCPO', '3.2', '0', 'pcs', '2022-03-30', 13, 10, 'dikonfirmasi'),
(28, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', '13-07273-A00', 'NEW CENTER CUSHION RAD SUPPORT UPPER', 'SPHCPO', '2.6', '0', 'pcs', '2022-03-30', 13, 10, 'dikonfirmasi'),
(29, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', '13-07274-A00', 'NEW CENTER CUSHION RAD SUPPORT UPPER', 'SPHCPO', '2.6', '0', 'pcs', '2022-03-30', 13, 10, 'dikonfirmasi'),
(30, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', '14-08277-A01', 'PLATE FOR INSULATOR ENGINE MTG. RR', 'SPCCSD', '1.4', '0', 'pcs', '2022-03-30', 13, 10, 'dikonfirmasi'),
(31, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', 'A4-01397-Z16', 'THROWER FOR PULLEY DAMPER', 'SPCCSD', '1.0', '0', 'pcs', '2022-03-30', 13, 10, 'dikonfirmasi'),
(32, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', '14-07464-A00', 'PLATE FOR CAB. MOUNTING UPPER', 'SAPH440', '4.0', '0', 'pcs', '2022-03-30', 13, 10, 'dikonfirmasi'),
(33, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', '13-08793-A01', 'INSULATOR ENGINE MOUNTING FR', 'SAPH440 X 4.5 X 105', '4.5', '181', 'sheet', '2022-03-30', 13, 10, 'dikonfirmasi'),
(34, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', '13-09070-A00', 'PLATE FOR INSULATOR ENGINE MTG. RR', 'SPHCPO X 6.0 X 180', '6.0', '800', 'sheet', '2022-03-30', 13, 10, 'dikonfirmasi'),
(35, 'Fukoku Tokai Rubber', 'GANDING STOCK OPNAME', '', 'A4-01397-Z16', 'THROWER FOR PULLEY DAMPER', 'SPCCSD X 1.0 X 110', '1.0', '35', 'sheet', '2022-03-30', 13, 10, 'dikonfirmasi'),
(36, 'Chandra Nugerah Cemerlang', 'GANDING STOCK OPNAME', '', '2DP-F588F-00-00-80', 'HOLDER BRAKE HOSE 5', 'SPHC-PO', '2.0', '0', 'pcs', '2022-03-30', 13, 7, 'dikonfirmasi'),
(37, 'Chandra Nugerah Cemerlang', 'GANDING STOCK OPNAME', '', '2SX-F5875-00-00-80', 'HOLDER BRAKE HOSE 1', 'SPHC-PO', '1.6', '0', 'pcs', '2022-03-30', 13, 7, 'dikonfirmasi'),
(38, 'Chandra Nugerah Cemerlang', 'GANDING STOCK OPNAME', '', '2DP-F588F-00', 'WIRE HOLDER BRAKE HOSE 5', '', '', '27', 'pcs', '2022-03-30', 13, 7, 'dikonfirmasi'),
(39, 'Haeir Electrical Appliances Indonesia', 'GANDING STOCK OPNAME', '', '0060124866', 'FRAME BOTTOM ASSY D270/275 (SC1)', '', '0.3', '5000', 'pcs', '2022-03-30', 13, 14, 'dikonfirmasi'),
(40, 'Haeir Electrical Appliances Indonesia', 'GANDING STOCK OPNAME', '', '0060867453', 'FRAME BOTTOM ASSY AQR-13G(SC1)', '', '0.25', '0', 'pcs', '2022-03-30', 13, 14, 'dikonfirmasi'),
(41, 'Haeir Electrical Appliances Indonesia', 'GANDING STOCK OPNAME', '', '0060867455', 'FRAME BOTTOM ASSY AQR-17J/20J(SC1)', '', '0.25', '0', 'pcs', '2022-03-30', 13, 14, 'dikonfirmasi'),
(42, 'Haeir Electrical Appliances Indonesia', 'GANDING STOCK OPNAME', '', '0060867454', 'FRAME BOTTOM ASSY MJ-R16A (SC1)', '', '0.25', '0', 'pcs', '2022-03-30', 13, 14, 'dikonfirmasi'),
(43, 'Haeir Electrical Appliances Indonesia', 'GANDING STOCK OPNAME', '', '0060869033', 'FRAME REAR AQR-13H ASSY (SC1)', '', '0.2', '1995', 'pcs', '2022-03-30', 13, 14, 'dikonfirmasi'),
(44, 'Tiger Sash Indonesia', 'GANDING STOCK OPNAME', '', '68622-73R00', 'Gusset RR Dr Hinge Upr R/L', 'JSC270CC', '1.0', '5293', 'pcs', '2022-03-30', 13, 15, 'dikonfirmasi'),
(45, 'Tiger Sash Indonesia', 'GANDING STOCK OPNAME', '', '68191-73R00', 'REINF, FR DR WDW RR R/L', 'JSC270CC', '0.6', '0', 'pcs', '2022-03-30', 13, 15, 'dikonfirmasi'),
(46, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '121207032', 'BRACKET 1 INTAKE REAR', 'SPHCPO', '3.2', '0', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(47, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '121208032', 'STAY 2 INTAKE REAR', 'SPHCPO', '3.2', '0', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(48, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '121209032', 'STAY 3 INTAKE REAR', 'SPHCPO', '3.2', '0', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(49, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '121210032', 'BRACKET 4 INTAKE REAR', 'SPHCPO', '3.2', '0', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(50, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '121234032', 'BRACKET INTAKE FRONT', 'SPHCPO', '3.2', '0', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(51, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '99SGTSLO011400920', 'JOINT PIPE FR A', 'SUS 409 THK', '2.0', '0', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(52, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '99SGTSLO0114101920', 'JOINT PIPE FR B', 'SUS 409 THK', '2.0', '0', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(53, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '99SGTSLO0115850910', 'HEAT PROTECTOR VCC 09-7020', 'SUS 409 THK', '', '49', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(54, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '30001100', 'ARM MSA-7000 LH', 'SS400', '4.5', '0', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(55, 'Cipta Nissin Industries', 'GANDING STOCK OPNAME', '', '35100080', 'LEVER MSA-700 SC', 'SS400', '8.0', '0', 'pcs', '2022-03-30', 13, 9, 'dikonfirmasi'),
(56, 'Inti Ganda Perdana', 'GANDING STOCK OPNAME', '', '47381-BZ120#106210010', 'Bracket Tube Clamp BZ120', 'SPHCPO', '2.3', '0', 'pcs', '2022-03-30', 13, 1, 'dikonfirmasi'),
(57, 'Inti Ganda Perdana', 'GANDING STOCK OPNAME', '', '47381-BZ120#106210010-SUB1', 'NUT M6 (SAGATEK)', '', '', '7403', 'pcs', '2022-03-30', 13, 1, 'dikonfirmasi'),
(58, 'Inti Ganda Perdana', 'GANDING STOCK OPNAME', '', '47351-BZ140#199730010', 'Bracket Flexible Hose BZ140', 'SPHCPO', '2.3', '0', 'pcs', '2022-03-30', 13, 1, 'dikonfirmasi'),
(59, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E473L-0000-0310', 'Bracket 3-2 CP 1WD', 'SUS409L', '1.5', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(60, 'Exedy Manufacturing Indonesia', 'GANDING STOCK OPNAME', '', '3B3101050000Q999', 'WASHER K16', 'SAPH440-P X 2.0 X 100', '2.0', '8000', 'coil', '2022-03-30', 13, 6, 'dikonfirmasi'),
(61, 'Exedy Manufacturing Indonesia', 'GANDING STOCK OPNAME', '', '3B2701050000Q999', 'WASHER G20', 'SAPH440-P X 2.0 X 115', '2.0', '4000', 'coil', '2022-03-30', 13, 6, 'dikonfirmasi'),
(62, 'Exedy Manufacturing Indonesia', 'GANDING STOCK OPNAME', '', '390250900000Q010', 'NUT RAW EXEDY', 'JSH270C-P X 4.0 X 232', '4.0', '1500', 'coil', '2022-03-30', 13, 6, 'dikonfirmasi'),
(63, 'Exedy Manufacturing Indonesia', 'GANDING STOCK OPNAME', '', '3B5409000000Q010', 'NUT STA EXEDY', 'JSH270C-P X 3.8 X 273', '3.8', '6573', 'coil', '2022-03-30', 13, 6, 'dikonfirmasi'),
(64, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E473L-0000-0310-SUB1', 'NUT M6 GRAKINDO', '', '', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(65, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E466J-0000-0305', 'Pipe Silincer 2 CP 1WD', 'SUS409L', '1.2', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(66, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E466M-0000-0305', 'Pipe Silincer 5 CP 1WD', 'SUS409L', '1.2', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(67, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E466J-0000-0305-SUB', 'Pipe Silincer 3 1WD', 'SUS409L', '1.2', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(68, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E466M-0000-0305-SUB', 'Pipe Silincer 6 1WD', 'SUS409L', '1.2', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(69, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '2PH-E4781-0000-0305', 'Stay Muff 2-1 2PH', 'SPHCPO', '2.6', '10491', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(70, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '2DP-E461A-0000-0605', 'BODY PIPE 1-1 2DP RH', 'SUS409L', '1.0', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(71, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '2DP-E461A-0000-0605-SUB', 'BODY PIPE 1-2 2DP LH', 'SUS409L', '1.0', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(72, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1DY-E474K-0000-0305', 'Bracket 4-1 1DY', 'SPHCPO', '1.6', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(73, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1DY-E474L-0000-0305', 'Bracket 4-2 1DY', 'SPHCPO', '1.6', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(74, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '5D9-E4781-0100-0305', 'Stay Muff 2-1 5D9', 'SPHCPO', '2.6', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(75, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1FD-E4781-0000-0305', 'Stay Muff 2-1 1FD', 'SPHCPO', '2.6', '0', 'pcs', '2022-03-30', 13, 4, 'dikonfirmasi'),
(76, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E473L-0000-0310', 'Bracket 3-2 CP 1WD', 'SUS409L X 1.5 X 270', '1.5', '80', 'sheet', '2022-04-01', 13, 4, 'dikonfirmasi'),
(77, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E466J-0000-0305', 'Pipe Silincer 2 CP 1WD', 'SUS409L X 1.2 X 130', '1.2', '150', 'sheet', '2022-04-01', 13, 4, 'dikonfirmasi'),
(78, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '1WD-E466J-0000-0305-SUB', 'Pipe Silincer 3 1WD', 'SUS409L X 1.2 X 130', '1.2', '100', 'sheet', '2022-04-01', 13, 4, 'dikonfirmasi'),
(79, 'Sakura Java Indonesia', 'GANDING STOCK OPNAME', '', '2PH-E4781-0000-0305', 'Stay Muff 2-1 2PH', 'SPHCPO X 2.6 X 170', '2.6', '484', 'coil', '2022-04-01', 13, 4, 'dikonfirmasi'),
(80, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0460', 'B1M-BRACKET 1 TANPA BOLT', 'YSC270CC', '1.0', '0', 'pcs', '2022-04-01', 13, 8, 'dikonfirmasi'),
(81, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0380', 'B1M-BRACKET 1 + 2 BOLT', 'YSC270CC', '1.0', '0', 'pcs', '2022-04-01', 13, 8, 'dikonfirmasi'),
(82, 'Sanden Indonesia', 'GANDING STOCK OPNAME', '', 'N1451-D0380-SUB1', 'COLLAR', '', '', '27', 'pcs', '2022-04-01', 13, 8, 'dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warehousefg`
--

CREATE TABLE `warehousefg` (
  `id` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_fg` int(11) NOT NULL,
  `nama_part` char(75) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warehousefg`
--

INSERT INTO `warehousefg` (`id`, `id_part`, `id_fg`, `nama_part`, `qty`, `keterangan`) VALUES
(1, 128, 0, 'BASE PANE', 1000, ''),
(2, 127, 0, 'SOUND PROF BOARD', 1312, ''),
(3, 4, 0, 'Body Silincer 1 1WD', 1000, ''),
(4, 143, 0, 'BODY SILINCER BS8', 74, ''),
(5, 142, 0, 'BODY SILINCER 2 BS7', 278, ''),
(6, 6, 0, 'Plate 3 1WD', 1252, ''),
(7, 84, 0, 'BRACKET 2-2 2MS', 1000, ''),
(8, 183, 0, 'PIPE 7', 50, ''),
(9, 3, 0, 'REINFORCEMENT 3', 2585, ''),
(10, 36, 0, 'B1M-BRACKET 2', 2116, ''),
(11, 20, 0, 'BRACKET NO 1', 4530, ''),
(12, 22, 0, 'BRACKET NO. 3', 6439, ''),
(13, 19, 0, 'BRACKET NO. 1', 600, ''),
(14, 130, 0, 'BRACKET NO. 2', 500, ''),
(15, 158, 0, 'BRACKET', 700, ''),
(16, 23, 0, 'WASHER K16', 2770, ''),
(17, 25, 0, 'NUT RAW EXEDY', 8200, ''),
(18, 33, 0, 'PLATE FOR INSULATOR ENGINE MTG. RR', 3310, ''),
(19, 34, 0, 'NEW CENTER BUMPER RUBBER FRONT', 483, ''),
(20, 29, 0, 'NEW CENTER CUSHION RAD SUPPORT UPPER', 396, ''),
(21, 133, 0, 'NEW CENTER CUSHION RAD SUPPORT UPPER', 702, ''),
(22, 27, 0, 'PLATE FOR INSULATOR ENGINE MTG. RR', 11000, ''),
(23, 47, 0, 'THROWER FOR PULLEY DAMPER', 2700, ''),
(24, 28, 0, 'PLATE FOR CAB. MOUNTING UPPER', 138, ''),
(25, 173, 0, 'HOLDER BRAKE HOSE 5', 800, ''),
(26, 185, 0, 'FRAME BOTTOM ASSY AQR-13G(SC1)', 6450, ''),
(27, 186, 0, 'FRAME BOTTOM ASSY AQR-17J/20J(SC1)', 1197, ''),
(28, 176, 0, 'Gusset RR Dr Hinge Upr R/L', 895, ''),
(29, 177, 0, 'REINF, FR DR WDW RR R/L', 2719, ''),
(30, 40, 0, 'BRACKET 1 INTAKE REAR', 702, ''),
(31, 41, 0, 'STAY 2 INTAKE REAR', 2020, ''),
(32, 42, 0, 'STAY 3 INTAKE REAR', 471, ''),
(33, 43, 0, 'BRACKET 4 INTAKE REAR', 712, ''),
(34, 44, 0, 'BRACKET INTAKE FRONT', 1576, ''),
(35, 136, 0, 'JOINT PIPE FR A', 2814, ''),
(36, 137, 0, 'JOINT PIPE FR B', 987, ''),
(37, 39, 0, 'ARM MSA-7000 LH', 269, ''),
(38, 2, 0, 'Bracket Flexible Hose BZ140', 500, ''),
(39, 15, 0, 'Bracket 3-2 CP 1WD', 42, ''),
(40, 10, 0, 'Bracket 4-1 1DY', 1660, ''),
(41, 17, 0, 'Stay Muff 2-1 5D9', 520, ''),
(42, 12, 0, 'Stay Muff 2-1 1FD', 430, ''),
(43, 178, 0, 'Pipe Silincer 3 1WD', 457, ''),
(44, 13, 0, 'Pipe Silincer 2 CP 1WD', 457, ''),
(45, 14, 0, 'Pipe Silincer 5 CP 1WD', 282, ''),
(46, 179, 0, 'Pipe Silincer 6 1WD', 282, ''),
(47, 129, 0, 'BODY PIPE 1-2 2DP LH', 162, ''),
(48, 181, 0, 'BODY PIPE 1-1 2DP RH', 162, ''),
(49, 11, 0, 'Bracket 4-2 1DY', 524, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `welding`
--

CREATE TABLE `welding` (
  `id` int(11) NOT NULL,
  `nama_fg` char(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `nama_customer` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `welding`
--

INSERT INTO `welding` (`id`, `nama_fg`, `qty`, `idcustomer`, `nama_customer`) VALUES
(6, 'BODY PIPE COMP', 0, 4, 'Sakura Java Indonesia'),
(7, 'HOLDER BRAKE HOSE 1', 0, 7, 'Chandra Nugerah Cemerlang'),
(8, 'PIPE SILINCER 2 CP 1WD', 0, 4, 'Sakura Java Indonesia'),
(9, 'PIPE SILINCER 5 CP 1WD', 0, 4, 'Sakura Java Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`sku`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `disk_type`
--
ALTER TABLE `disk_type`
  ADD PRIMARY KEY (`sku`);

--
-- Indeks untuk tabel `finishgood`
--
ALTER TABLE `finishgood`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `furniture_type`
--
ALTER TABLE `furniture_type`
  ADD PRIMARY KEY (`sku`);

--
-- Indeks untuk tabel `historysubcont`
--
ALTER TABLE `historysubcont`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_pocust`
--
ALTER TABLE `history_pocust`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_posup`
--
ALTER TABLE `history_posup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwalproduksi`
--
ALTER TABLE `jadwalproduksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporanproduksi`
--
ALTER TABLE `laporanproduksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses1`
--
ALTER TABLE `proses1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses2`
--
ALTER TABLE `proses2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses3`
--
ALTER TABLE `proses3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses4`
--
ALTER TABLE `proses4`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses5`
--
ALTER TABLE `proses5`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses6`
--
ALTER TABLE `proses6`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses7`
--
ALTER TABLE `proses7`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchasing`
--
ALTER TABLE `purchasing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `scheduledelivery`
--
ALTER TABLE `scheduledelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `scheduleproduksi`
--
ALTER TABLE `scheduleproduksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `spot`
--
ALTER TABLE `spot`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`sku`);

--
-- Indeks untuk tabel `subcont`
--
ALTER TABLE `subcont`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surjal`
--
ALTER TABLE `surjal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surjalcust`
--
ALTER TABLE `surjalcust`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surjaldatangsubcont`
--
ALTER TABLE `surjaldatangsubcont`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surjalsubcont`
--
ALTER TABLE `surjalsubcont`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warehousefg`
--
ALTER TABLE `warehousefg`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `welding`
--
ALTER TABLE `welding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `finishgood`
--
ALTER TABLE `finishgood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `historysubcont`
--
ALTER TABLE `historysubcont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `history_pocust`
--
ALTER TABLE `history_pocust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_posup`
--
ALTER TABLE `history_posup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwalproduksi`
--
ALTER TABLE `jadwalproduksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `laporanproduksi`
--
ALTER TABLE `laporanproduksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT untuk tabel `part`
--
ALTER TABLE `part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT untuk tabel `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `proses`
--
ALTER TABLE `proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT untuk tabel `proses1`
--
ALTER TABLE `proses1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT untuk tabel `proses2`
--
ALTER TABLE `proses2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT untuk tabel `proses3`
--
ALTER TABLE `proses3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT untuk tabel `proses4`
--
ALTER TABLE `proses4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `proses5`
--
ALTER TABLE `proses5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `proses6`
--
ALTER TABLE `proses6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `proses7`
--
ALTER TABLE `proses7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `purchasing`
--
ALTER TABLE `purchasing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT untuk tabel `scheduledelivery`
--
ALTER TABLE `scheduledelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `scheduleproduksi`
--
ALTER TABLE `scheduleproduksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `spot`
--
ALTER TABLE `spot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `subcont`
--
ALTER TABLE `subcont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `surjal`
--
ALTER TABLE `surjal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `surjalcust`
--
ALTER TABLE `surjalcust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surjaldatangsubcont`
--
ALTER TABLE `surjaldatangsubcont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `surjalsubcont`
--
ALTER TABLE `surjalsubcont`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `warehousefg`
--
ALTER TABLE `warehousefg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `welding`
--
ALTER TABLE `welding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
