-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 06:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perjadin`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_anggaran` year(4) NOT NULL,
  `mak` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagu` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rencana_pagu` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitkerja` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `tahun_anggaran`, `mak`, `uraian`, `pagu`, `rencana_pagu`, `unitkerja`, `status`, `created_at`, `updated_at`) VALUES
(1, 2019, '054.01.01.2886.970.051.524111', 'Perjalanan ke DJPB', '7330000', NULL, '52510', 1, '2019-03-07 10:39:25', '2019-03-07 10:39:25'),
(2, 2019, '054.01.01.2886.970.052.524111', 'Perjalanan ke Kabupaten Kota', '11849000', '1730000', '52510', 1, '2019-03-07 10:40:44', '2019-03-12 02:05:04'),
(3, 2019, '054.01.01.2886.970.054.524111', 'Perjalanan  dalam rangka administrasi kepegawaian', '8310000', '-2820000', '52510', 1, '2019-03-07 10:41:55', '2019-03-11 13:39:52'),
(4, 2019, '054.01.01.2886.970.055.524111', 'Perjalanan  dalam rangka administrasi BMN', '14020000', '2595000', '52510', 1, '2019-03-07 10:42:50', '2019-03-14 02:36:47'),
(5, 2019, '054.01.06.2895.004.100.524111', 'konsultasi bidang ipds dari provinsi ke bps ri', '15556000', '690000', '52560', 1, '2019-03-07 10:44:16', '2019-03-14 02:35:41'),
(6, 2019, '054.01.06.2895.006.100.524111', 'supervisi pencacahan lapangan oleh bps provinsi', '9255000', '-2295000', '52520', 1, '2019-03-07 10:45:55', '2019-03-11 13:44:01'),
(7, 2019, '054.01.06.2895.006.101.524111', 'konsultasi kepala seksi statistik kependudukan ke bps pusat', '7778000', '740000', '52520', 1, '2019-03-07 10:46:59', '2019-03-14 02:37:39'),
(8, 2019, '051.01.06.2895.004.101.524111', 'supervisi pencacahan lapangan oleh bps provinsi', '9255000', '2670000', '52520', 1, '2019-03-07 10:47:54', '2019-03-12 11:43:34'),
(9, 2019, '054.01.06.2895.009.524111', 'biaya pengawasan lapangan dari provinsi ke kab/kota', '15425000', '-3700000', '52520', 1, '2019-03-07 10:48:56', '2019-03-11 13:52:25'),
(10, 2019, '054.01.06.2895.014.051.524111', 'pengawasan serta revisit bps propinsi ke bps kab/kota', '9255000', '2870000', '52530', 1, '2019-03-07 10:49:58', '2019-03-14 06:24:52'),
(11, 2019, '054.01.06.2895.016.200.524111', 'konsultasi seksi niaga dan jasa dari provinsi ke bps ri', '7778000', NULL, '52540', 1, '2019-03-07 10:51:35', '2019-03-07 10:51:35'),
(12, 2019, '054.01.06.2895.026.051.524111', 'konsultasi kepala seksi analisis lintas sektor ke bps pusat', '7778000', '2820000', '52550', 1, '2019-03-07 10:52:49', '2019-03-12 03:57:48'),
(13, 2019, '054.01.06.2895.034.500.524111', 'Perjalanan dalam rangka supervisi dari provinsi ke kabupaten/kota', '15640000', NULL, '52550', 1, '2019-03-07 10:53:43', '2019-03-07 10:53:43'),
(14, 2019, '054.01.06.2895.032.503.524111', 'Monitoring teknis pemetaan dan pemutakhiran BS Provinsi ke Kab/Kota', '43916000', NULL, '52560', 1, '2019-03-07 10:54:40', '2019-03-07 10:54:40'),
(15, 2019, '054.01.01.2886.994.002E.524111', 'Konsultasi pimpinan BPS propinsi ke BPS pusat', '26782000', '24480000', '52510', 1, '2019-03-15 06:58:26', '2019-03-15 07:05:45'),
(16, 2019, '054.01.01.2886.994.002E.524111', 'Pengawasan prop ke kab/kota', '15900000', NULL, '52510', 1, '2019-03-15 07:00:03', '2019-03-15 07:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuitansi`
--

CREATE TABLE `kuitansi` (
  `kuitansi_id` int(10) UNSIGNED NOT NULL,
  `trx_id` int(10) UNSIGNED NOT NULL,
  `total_biaya` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_kuitansi` date DEFAULT NULL,
  `harian_rupiah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harian_lama` tinyint(4) DEFAULT NULL,
  `harian_total` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_rupiah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_lama` tinyint(4) DEFAULT NULL,
  `hotel_total` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_flag` tinyint(1) NOT NULL DEFAULT '0',
  `transport_rupiah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_ket` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_flag` tinyint(1) NOT NULL DEFAULT '0',
  `rill1_ket` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rill1_rupiah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rill1_flag` tinyint(1) NOT NULL DEFAULT '0',
  `rill2_ket` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rill2_rupiah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rill2_flag` tinyint(1) NOT NULL DEFAULT '0',
  `rill3_ket` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rill3_rupiah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rill3_flag` tinyint(1) NOT NULL DEFAULT '0',
  `rill_total` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bendahara_nip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bendahara_nama` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_kuitansi` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuitansi`
--

INSERT INTO `kuitansi` (`kuitansi_id`, `trx_id`, `total_biaya`, `tgl_kuitansi`, `harian_rupiah`, `harian_lama`, `harian_total`, `hotel_rupiah`, `hotel_lama`, `hotel_total`, `hotel_flag`, `transport_rupiah`, `transport_ket`, `transport_flag`, `rill1_ket`, `rill1_rupiah`, `rill1_flag`, `rill2_ket`, `rill2_rupiah`, `rill2_flag`, `rill3_ket`, `rill3_rupiah`, `rill3_flag`, `rill_total`, `bendahara_nip`, `bendahara_nama`, `flag_kuitansi`, `created_at`, `updated_at`) VALUES
(1, 2, '550000', '2019-03-14', '350000', 1, '350000', '0', 0, '0', 0, '200000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '200000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar, SSi', 1, '2019-03-11 02:10:08', '2019-03-11 02:40:34'),
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 3, '2019-03-11 04:06:38', '2019-03-11 14:37:49'),
(3, 4, '2820000', '2019-03-16', '440000', 3, '1320000', '450000', 2, '900000', 1, '600000', 'Transport dari Mataram ke Kabupaten Dompu', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '600000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-11 13:21:37', '2019-03-11 13:30:04'),
(4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, '2019-03-13 04:05:54', '2019-03-13 04:05:54'),
(5, 9, '690000', '2019-03-18', '440000', 1, '440000', '0', 0, '0', 0, '250000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '250000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 2, '2019-03-15 06:29:12', '2019-03-15 06:37:16'),
(6, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, '2019-03-15 06:40:57', '2019-03-15 06:40:57'),
(7, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, '2019-03-15 07:16:24', '2019-03-15 07:16:24'),
(8, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, '2019-03-15 07:16:45', '2019-03-15 07:16:45'),
(9, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, '2019-03-15 07:16:59', '2019-03-15 07:16:59'),
(10, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, '2019-03-15 07:17:14', '2019-03-15 07:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `matrik`
--

CREATE TABLE `matrik` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_matrik` year(4) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `kodekab_tujuan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lamanya` tinyint(4) NOT NULL,
  `mak_id` int(10) UNSIGNED DEFAULT NULL,
  `dana_mak` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dana_pagu` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dana_unitkerja` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_harian` tinyint(4) NOT NULL,
  `dana_harian` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harian` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dana_transport` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_hotel` tinyint(4) DEFAULT NULL,
  `dana_hotel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_hotel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengeluaran_rill` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_biaya` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_pelaksana` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_matrik` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matrik`
--

INSERT INTO `matrik` (`id`, `tahun_matrik`, `tgl_awal`, `tgl_akhir`, `kodekab_tujuan`, `lamanya`, `mak_id`, `dana_mak`, `dana_pagu`, `dana_unitkerja`, `lama_harian`, `dana_harian`, `total_harian`, `dana_transport`, `lama_hotel`, `dana_hotel`, `total_hotel`, `pengeluaran_rill`, `total_biaya`, `unit_pelaksana`, `flag_matrik`, `created_at`, `updated_at`) VALUES
(5, 2019, '2019-03-01', '2019-03-31', '5271', 1, 2, '054.01.01.2886.970.052.524111', '11849000', '52510', 1, '180000', '180000', '150000', 0, '0', '0', '0', '330000', '52510', 2, '2019-03-07 11:36:02', '2019-03-12 06:28:53'),
(6, 2019, '2019-03-01', '2019-03-31', '5203', 1, 9, '054.01.06.2895.009.524111', '15425000', '52520', 1, '440000', '440000', '300000', 0, '0', '0', '0', '740000', '52520', 5, '2019-03-11 02:02:39', '2019-03-11 13:52:10'),
(7, 2019, '2019-03-01', '2019-03-31', '5205', 3, 3, '054.01.01.2886.970.054.524111', '8310000', '52510', 3, '440000', '1320000', '600000', 2, '450000', '900000', '0', '2820000', '52510', 5, '2019-03-11 12:40:24', '2019-03-11 13:27:03'),
(8, 2019, '2019-03-01', '2019-03-31', '5205', 2, 2, '054.01.01.2886.970.052.524111', '11849000', '52510', 2, '440000', '880000', '600000', 1, '400000', '400000', '0', '1880000', '52510', 2, '2019-03-12 02:05:03', '2019-03-12 09:23:58'),
(9, 2019, '2019-03-01', '2019-03-31', '5205', 3, 12, '054.01.06.2895.026.051.524111', '7778000', '52550', 3, '440000', '1320000', '600000', 2, '450000', '900000', '0', '2820000', '52550', 2, '2019-03-12 03:57:48', '2019-03-13 04:10:49'),
(10, 2019, '2019-03-01', '2019-03-31', '5205', 2, 4, '054.01.01.2886.970.055.524111', '14020000', '52510', 2, '440000', '880000', '600000', 1, '450000', '450000', '0', '1930000', '52510', 5, '2019-03-12 06:43:09', '2019-03-15 06:40:43'),
(11, 2019, '2019-04-01', '2019-04-30', '5207', 3, 8, '051.01.06.2895.004.101.524111', '9255000', '52520', 3, '440000', '1320000', '450000', 2, '450000', '900000', '0', '2670000', '52520', 2, '2019-03-12 11:43:33', '2019-03-14 02:21:38'),
(12, 2019, '2019-04-01', '2019-04-30', '5202', 1, 5, '054.01.06.2895.004.100.524111', '15556000', '52560', 1, '440000', '440000', '250000', 0, '0', '0', '0', '690000', '52560', 5, '2019-03-14 02:35:41', '2019-03-15 06:28:56'),
(13, 2019, '2019-04-01', '2019-04-30', '5201', 1, 4, '054.01.01.2886.970.055.524111', '14020000', '52510', 1, '440000', '440000', '225000', 0, '0', '0', '0', '665000', '52510', 2, '2019-03-14 02:36:46', '2019-03-15 07:12:14'),
(14, 2019, '2019-05-01', '2019-07-31', '5203', 1, 7, '054.01.06.2895.006.101.524111', '7778000', '52520', 1, '440000', '440000', '300000', 0, '0', '0', '0', '740000', '52520', 1, '2019-03-14 02:37:39', '2019-03-14 02:37:46'),
(15, 2019, '2019-04-01', '2019-04-30', '5272', 3, 10, '054.01.06.2895.014.051.524111', '9255000', '52530', 3, '440000', '1320000', '650000', 2, '450000', '900000', '0', '2870000', '52530', 1, '2019-03-14 06:24:51', '2019-03-15 07:07:46'),
(16, 2019, '2019-03-01', '2019-03-31', '3100', 3, 15, '054.01.01.2886.994.002E.524111', '13782000', '52510', 3, '440000', '1320000', '3500000', 2, '500000', '1000000', '300000', '6120000', '52510', 5, '2019-03-15 07:01:19', '2019-03-15 07:15:04'),
(17, 2019, '2019-03-01', '2019-03-31', '3100', 3, 15, '054.01.01.2886.994.002E.524111', '13782000', '52510', 3, '440000', '1320000', '3500000', 2, '500000', '1000000', '300000', '6120000', '52510', 5, '2019-03-15 07:02:11', '2019-03-15 07:14:50'),
(18, 2019, '2019-03-01', '2019-03-31', '3100', 3, 15, '054.01.01.2886.994.002E.524111', '13782000', '52510', 3, '440000', '1320000', '3500000', 2, '500000', '1000000', '300000', '6120000', '52510', 5, '2019-03-15 07:03:10', '2019-03-15 07:14:23'),
(19, 2019, '2019-03-01', '2019-03-31', '3100', 3, 15, '054.01.01.2886.994.002E.524111', '13782000', '52510', 3, '440000', '1320000', '3500000', 2, '500000', '1000000', '300000', '6120000', '52510', 5, '2019-03-15 07:04:10', '2019-03-15 07:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_21_004344_create_tabel_pegawai', 1),
(4, '2019_01_21_005035_create_tabel_golongan', 1),
(5, '2019_01_21_023502_create_tabel_unitkerja', 1),
(6, '2019_01_24_094219_create_matrik_perjalanan_table', 1),
(7, '2019_01_24_113913_create_tujuan_table', 1),
(8, '2019_01_24_114428_create_pejabat_table', 1),
(9, '2019_01_24_115639_create_keuangan_table', 1),
(10, '2019_01_24_161516_tabel_program', 1),
(11, '2019_01_24_163329_tabel_akun', 1),
(12, '2019_01_25_083717_create_anggaran_table', 1),
(14, '2014_10_12_000000_create_users_table', 2),
(16, '2019_02_05_024613_tabel_transaksi', 3),
(19, '2019_02_22_143608_tabel_surat_tugas', 4),
(20, '2019_02_28_103652_tabel_surat_perjalan', 5),
(21, '2019_02_28_222105_tabel_kuitansi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `m_gol`
--

CREATE TABLE `m_gol` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gol` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_gol`
--

INSERT INTO `m_gol` (`id`, `kode`, `gol`, `pangkat`) VALUES
(1, '11', 'I/a', 'JURU MUDA'),
(2, '12', 'I/b', 'JURU MUDA TINGKAT I'),
(3, '13', 'I/c', 'JURU'),
(4, '14', 'I/d', 'JURU TINGKAT I'),
(5, '21', 'II/a', 'PENGATUR MUDA'),
(6, '22', 'II/b', 'PENGATUR MUDA TINGKAT I'),
(7, '23', 'II/c', 'PENGATUR'),
(8, '24', 'II/d', 'PENGATUR TINGKAT I'),
(9, '31', 'III/a', 'PENATA MUDA'),
(10, '32', 'III/b', 'PENATA MUDA TINGKAT I'),
(11, '33', 'III/c', 'PENATA'),
(12, '34', 'III/d', 'PENATA TINGKAT I'),
(13, '41', 'IV/a', 'PEMBINA'),
(14, '42', 'IV/b', 'PEMBINA TINGKAT I'),
(15, '43', 'IV/c', 'PEMBINA UTAMA MUDA'),
(16, '44', 'IV/d', 'PEMBINA UTAMA MADYA'),
(17, '45', 'IV/e', 'PEMBINA UTAMA');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip_baru` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` tinyint(1) UNSIGNED NOT NULL,
  `gol` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitkerja` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` tinyint(1) UNSIGNED NOT NULL,
  `flag_pengelola` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `flag` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip_baru`, `nama`, `tgl_lahir`, `jk`, `gol`, `unitkerja`, `jabatan`, `flag_pengelola`, `flag`, `created_at`, `updated_at`) VALUES
(1, '19660219 199401 1 001', 'Suntono', '1966-02-19', 1, '43', '52000', 1, 1, 1, '2019-03-07 10:09:52', '2019-03-11 03:54:17'),
(2, '19651231 199212 1 001', 'Lalu Supratna', '1965-12-31', 1, '42', '52510', 2, 0, 1, '2019-03-07 10:09:52', '2019-03-11 03:54:26'),
(3, '19651231 199212 2 001', 'Baiq Dewi Agustriawati', '1965-12-31', 2, '34', '52513', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(4, '19781220 200012 1 002', 'Akhmad Zammiluny', '1978-12-20', 1, '41', '52511', 3, 0, 1, '2019-03-07 10:09:52', '2019-03-11 03:54:32'),
(5, '19641231 199401 2 001', 'Baiq Kartini', '1964-12-31', 2, '34', '52515', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(6, '19751014 199401 1 001', 'Andi Guslan', '1975-10-14', 1, '34', '52512', 3, 0, 1, '2019-03-07 10:09:52', '2019-03-11 03:54:55'),
(7, '19850920 200902 1 010', 'Indra Sasmita Utama', '1985-09-20', 1, '33', '52514', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(8, '19910719 201403 1 002', 'Pande Gde Dony Gumilar', '1991-07-19', 1, '31', '52513', 4, 3, 1, '2019-03-07 10:09:52', '2019-03-11 03:55:25'),
(9, '19850823 201003 2 001', 'Arintia Dewi Heryyanti', '1985-08-23', 2, '23', '52513', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(10, '19820418 200112 1 004', 'Aris Wahyudi', '1982-04-18', 1, '31', '52513', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(11, '19830121 200701 1 001', 'Muhamad Nursan', '1983-01-21', 1, '23', '52513', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(12, '19900205 201101 2 003', 'Linna Winarni', '1990-02-05', 2, '24', '52512', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 03:55:16'),
(13, '19810727 200901 1 010', 'Lalu Sudiarta Utama', '1981-07-27', 1, '32', '52512', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 03:55:08'),
(14, '19611231 198302 2 002', 'Siti Fatimah', '1961-12-31', 2, '32', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(15, '19800807 200710 1 001', 'Sujiman', '1980-08-07', 1, '31', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(16, '19731225 201406 1 004', 'Heri Suria Wirawan', '1973-12-25', 1, '22', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(17, '19780505 200012 2 001', 'Baiq Kurniawati', '1978-05-05', 2, '41', '52511', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 04:02:07'),
(18, '19781227 199912 1 001', 'I Putu Yudhistira', '1978-12-27', 1, '32', '52511', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 03:54:48'),
(19, '19850801 200801 2 005', 'Rika Verlita', '1985-08-01', 2, '32', '52511', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 03:55:01'),
(20, '19681231 198903 1 013', 'I Wayan Wirjan', '1968-12-31', 1, '32', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(21, '19641231 200701 1 038', 'Muslimin', '1964-12-31', 1, '23', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(22, '19751231 200701 1 009', 'Rosidi', '1975-12-31', 1, '21', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(23, '19861231 200604 2 001', 'Baiq Yeni Sulistiana', '1986-12-31', 2, '31', '52514', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 04:03:04'),
(24, '19810724 201101 1 011', 'Achmad Gunawan', '1981-07-24', 1, '31', '52514', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(25, '19850102 200902 2 004', 'Ratna Asih Wulandari', '1985-01-02', 1, '32', '52521', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 04:02:38'),
(26, '19830103 200604 2 002', 'Siti Mar\'atus Sa\'adah', '1983-01-03', 2, '31', '52514', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(27, '19771225 200012 1 002', 'Arrief Chandra Setiawan', '1977-12-25', 1, '41', '52520', 2, 0, 1, '2019-03-07 10:09:52', NULL),
(28, '19811019 200312 2 002', 'Hertina Yusnissa', '1981-10-19', 2, '41', '52521', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(29, '19810514 200312 1 003', 'M Ikhsany Rusyda', '1981-05-14', 1, '41', '52523', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(30, '19820426 200412 2 001', 'Gusti Ketut Indradewi', '1982-04-26', 2, '34', '52521', 5, 0, 1, '2019-03-07 10:09:52', '2019-03-07 10:10:38'),
(31, '19840517 200701 1 003', 'Amy Wardian Pratama', '1984-05-17', 2, '34', '52522', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(32, '19610803 198203 2 001', 'Baiq Eny Sukriani', '1961-08-03', 2, '32', '52522', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(33, '19620824 198503 2 004', 'Sri Suhartini', '1962-08-24', 2, '34', '52521', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(34, '19780223 200012 1 002', 'Ahwan Hadi', '1978-02-23', 1, '34', '52521', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(35, '19870724 200912 2 006', 'Isna Zuriatina', '1987-07-24', 2, '32', '52522', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(36, '19861023 200902 2 006', 'Yati Daryati Nurmalasari', '1986-10-23', 2, '32', '52523', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(37, '19611229 198103 2 001', 'Ni Kadek Adi Madri', '1961-12-29', 2, '42', '52530', 2, 0, 1, '2019-03-07 10:09:52', NULL),
(38, '19641231 199401 1 002', 'Saan', '1964-12-31', 1, '34', '52533', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(39, '19650729 199103 2 001', 'Raehatul Jannah', '1965-07-29', 2, '41', '52532', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(40, '19860206 200902 2 005', 'Pepti Maya Puspita', '1986-02-06', 2, '32', '52531', 5, 0, 1, '2019-03-07 10:09:52', '2019-03-07 10:10:47'),
(41, '19780424 199912 2 001', 'Ike Rahayu Sri', '1978-04-24', 2, '41', '52533', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(42, '19910706 201311 2 001', 'Medhia ratna Puja Hapsari', '1991-07-06', 2, '32', '52533', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 00:41:32'),
(43, '19890529 201211 2 001', 'Meta Indriyana', '1989-05-29', 2, '32', '52531', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(44, '19690414 199003 2 001', 'Nurlailah', '1969-04-14', 2, '32', '52532', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(45, '19881215 201012 2 003', 'Anik Pratiwi', '1988-12-15', 2, '32', '52531', 5, 0, 1, '2019-03-07 10:09:52', '2019-03-07 10:10:55'),
(46, '19840128 201101 2 008', 'Murniyati', '1984-01-28', 2, '32', '52531', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(47, '19620308 198203 2 004', 'Haryani Sri Wahyuni', '1962-03-08', 2, '32', '52532', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(48, '19651015 199202 1 001', 'Lalu Putradi', '1965-10-15', 1, '42', '52540', 2, 0, 1, '2019-03-07 10:09:52', NULL),
(49, '19730405 199412 2 001', 'Sri Endah Wardanti', '1973-04-05', 2, '41', '52541', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(50, '19700313 199003 1 002', 'Didik Sutarmono', '1970-03-13', 1, '34', '52542', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(51, '19710603 199312 1 002', 'Tri Harjanto', '1971-06-03', 1, '34', '52543', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(52, '19810421 200212 2 004', 'Wini Widiastuti', '1981-04-21', 2, '41', '52543', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(53, '19860614 200902 2 009', 'Nuning Primadianti', '1986-06-14', 2, '32', '52543', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(54, '19651208 198603 2 001', 'Sri Sulastri', '1965-12-08', 2, '32', '52541', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(55, '19630604 198603 1 004', 'Islam Saribakti', '1963-06-04', 1, '34', '52542', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(56, '19850611 200604 2 003', 'Ria Kusumawati', '1985-06-11', 2, '31', '52542', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(57, '19910523 201412 1 001', 'Nurul Islamy', '1991-05-23', 2, '32', '52541', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(58, '19680817 199212 1 001', 'I Gusti Lanang Putra', '1968-08-17', 1, '42', '52550', 2, 2, 1, '2019-03-07 10:09:52', NULL),
(59, '19800505 200212 2 004', 'Yassinta Ben Katarti Latiffa Dinar', '1980-05-05', 2, '34', '52553', 3, 0, 1, '2019-03-07 10:09:52', '2019-03-11 04:00:35'),
(60, '19800827 200312 2 003', 'Suci Purnamawati', '1980-08-27', 2, '41', '52551', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(61, '19840521 200312 2 001', 'Rosita Fahmi', '1984-05-21', 2, '24', '52551', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(62, '19651231 199301 1 001', 'Muhamad Rifai', '1965-12-31', 1, '34', '52552', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(63, '19880831 201012 2 002', 'Ni Nyoman Ratna Puspitasari', '1988-08-31', 2, '32', '52552', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(64, '19861018 200902 1 001', 'Muh. Zainuri', '1986-10-18', 1, '34', '52551', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(65, '19940922 201701 2 001', 'Anisa Suciningtyas Damayanti', '1994-09-22', 2, '31', '52553', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 04:00:13'),
(66, '19670428 198901 1 001', 'Anang Zakaria', '1967-04-28', 1, '34', '52560', 2, 0, 1, '2019-03-07 10:09:52', NULL),
(67, '19870815 201012 1 005', 'Chairul Fatikhin Putra', '1987-08-15', 1, '32', '52561', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(68, '19780415 200212 1 006', 'Ahmad Sukri', '1978-04-15', 1, '34', '52562', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(69, '19820319 200412 1 002', 'I Putu Dyatmika', '1982-03-19', 1, '34', '52563', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(70, '19620612 198203 2 002', 'Subaedah', '1962-06-12', 2, '32', '52563', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(71, '19831103 201101 1 008', 'Casslirais Surawan', '1983-11-03', 1, '32', '52562', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(72, '19631225 198203 2 001', 'Tri Kadaryanti Ningtiyas', '1963-12-25', 2, '34', '52563', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(73, '19880824 201211 1 001', 'Muhammad Fathi', '1988-08-24', 1, '32', '52561', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(74, '19920910 201412 1 001', 'Wahyudi Septiawan', '1992-09-10', 1, '31', '52563', 4, 0, 1, '2019-03-07 10:09:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id`, `nama`, `nip`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Suntono', '196602191994011001', 'Kepala BPS Provinsi Nusa Tenggara Barat', '2019-02-10 13:26:55', '2019-02-10 13:26:56'),
(2, 'I Gusti Lanang Putra', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spd`
--

CREATE TABLE `spd` (
  `spd_id` int(10) UNSIGNED NOT NULL,
  `trx_id` int(10) UNSIGNED NOT NULL,
  `nomor_spd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kendaraan` tinyint(1) NOT NULL DEFAULT '1',
  `ppk_nip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppk_nama` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_ttd` tinyint(1) DEFAULT '0',
  `flag_spd` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spd`
--

INSERT INTO `spd` (`spd_id`, `trx_id`, `nomor_spd`, `kendaraan`, `ppk_nip`, `ppk_nama`, `flag_ttd`, `flag_spd`, `created_at`, `updated_at`) VALUES
(1, 2, 'B-001/BPS/52514/03/2019', 1, '19680817 199212 1 001', 'Ir. I Gusti Lanang Putra', 0, 2, '2019-03-11 02:07:43', '2019-03-11 02:11:49'),
(2, 1, NULL, 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 3, '2019-03-11 02:35:51', '2019-03-12 06:28:53'),
(3, 4, 'B-003/BPS/52514/03/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, '2019-03-11 13:20:46', '2019-03-11 13:30:06'),
(4, 6, 'B-004/BPS/52514/03/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 3, '2019-03-12 04:17:08', '2019-03-13 04:10:50'),
(5, 5, NULL, 1, NULL, NULL, 0, 3, '2019-03-12 09:23:50', '2019-03-12 09:23:58'),
(6, 7, 'B-006/BPS/52514/03/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 1, '2019-03-14 02:07:36', '2019-03-15 06:40:57'),
(7, 9, 'B-007/BPS/52514/03/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, '2019-03-14 04:43:13', '2019-03-15 06:29:35'),
(8, 13, 'B-090/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 1, '2019-03-15 07:11:49', '2019-03-15 07:17:14'),
(9, 14, 'B-088/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 1, '2019-03-15 07:12:01', '2019-03-15 07:16:45'),
(10, 15, 'B-089/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 1, '2019-03-15 07:12:27', '2019-03-15 07:16:59'),
(11, 16, 'B-087/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 1, '2019-03-15 07:12:37', '2019-03-15 07:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `surattugas`
--

CREATE TABLE `surattugas` (
  `srt_id` int(10) UNSIGNED NOT NULL,
  `trx_id` int(11) UNSIGNED NOT NULL,
  `nomor_surat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `ttd_nip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_jabatan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_nama` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `flag_surattugas` tinyint(1) NOT NULL DEFAULT '0',
  `srt_ket` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surattugas`
--

INSERT INTO `surattugas` (`srt_id`, `trx_id`, `nomor_surat`, `tgl_surat`, `ttd_nip`, `ttd_jabatan`, `ttd_nama`, `flag_ttd`, `flag_surattugas`, `srt_ket`, `created_at`, `updated_at`) VALUES
(1, 2, 'B-001/BPS/52510/03/2019', '2019-03-12', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono, SE,M.Si', 0, 2, '', '2019-03-11 02:07:43', '2019-03-11 02:11:49'),
(2, 1, 'B-002/BPS/52510/03/2019', '2019-03-12', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 3, '', '2019-03-11 02:35:51', '2019-03-12 06:28:53'),
(3, 4, 'B-003/BPS/52510/03/2019', '2019-03-12', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, '', '2019-03-11 13:20:46', '2019-03-11 13:30:06'),
(4, 6, 'B-004/BPS/52510/03/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 3, NULL, '2019-03-12 04:17:08', '2019-03-13 04:10:50'),
(5, 5, NULL, NULL, NULL, NULL, NULL, 0, 3, NULL, '2019-03-12 09:23:50', '2019-03-12 09:23:58'),
(6, 7, 'B-006/BPS/52510/03/2019', '2019-03-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, NULL, '2019-03-14 02:07:36', '2019-03-15 06:40:43'),
(7, 9, 'B-007/BPS/52510/03/2019', '2019-03-14', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-03-14 04:43:12', '2019-03-15 06:29:35'),
(8, 13, 'B-090/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, NULL, '2019-03-15 07:11:49', '2019-03-15 07:15:04'),
(9, 14, 'B-088/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, NULL, '2019-03-15 07:12:01', '2019-03-15 07:14:50'),
(10, 15, 'B-089/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, NULL, '2019-03-15 07:12:27', '2019-03-15 07:14:23'),
(11, 16, 'B-087/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, NULL, '2019-03-15 07:12:37', '2019-03-15 07:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(10) UNSIGNED NOT NULL,
  `kode_akun` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `kode_akun`, `nama_akun`) VALUES
(1, '511111', 'Belanja Gaji Pokok PNS'),
(2, '511119', 'Belanja Gaji Pembulatan PNS'),
(3, '511121', 'Belanja Tunjangan Suami Istri'),
(4, '511122', 'Belanja Tunjangan Anak PNS'),
(5, '511123', 'Belanja Tunjangan Struktural PNS'),
(6, '511124', 'Belanja Tunjangan Fungsional PNS'),
(7, '511125', 'Belanja Tunjangan PPh PNS'),
(8, '511126', 'Belanja Tunjangan Beras PNS'),
(9, '511129', 'Belanja Uang Makan PNS'),
(10, '511147', 'Belanja Belanja Tunj. Lain-lain termasuk Uang Duka PN Dalam dan Luar Negeri'),
(11, '511151', 'Belanja Tunjangan Umum PNS'),
(12, '512211', 'Belanja Uang Lembur'),
(13, '512411', 'Belanja Pegawai (Tunjangan Khusus/Kegiatan)'),
(14, '521111', 'Belanja Keperluan Perkantoran'),
(15, '521113', 'Belanja untuk Menambah Daya Tahan Tubuh'),
(16, '521114', 'Belanja Pengiriman Surat Dinas Pos Pusat'),
(17, '521115', 'Honor Operasional Satuan Kerja'),
(18, '521119', 'Belanja Barang Operasional Lainnya'),
(19, '521211', 'Belanja Bahan'),
(20, '521213', 'Honor Output Kegiatan'),
(21, '521219', 'Belanja Barang Non Operasional Lainnya'),
(22, '521811', 'Belanja Barang Persediaan Barang Konsumsi'),
(23, '522111', 'Belanja Langganan Listrik'),
(24, '522112', 'Belanja Langganan Telepon'),
(25, '522113', 'Belanja Langganan Air'),
(26, '522121', 'Belanja Jasa Pos dan Giro'),
(27, '522141', 'Belanja Sewa'),
(28, '522151', 'Belanja Jasa Profesi'),
(29, '522191', 'Belanja Jasa Lainnya'),
(30, '523111', 'Belanja Biaya Pemeliharaan Gedung dan Bangunan'),
(31, '523112', 'Belanja Barang Persediaan untuk Pemeliharaan Gedung dan Bangunan'),
(32, '523119', 'Belanja Biaya Pemeliharaan Gedung dan Bangunan Lainnya'),
(33, '523121', 'Belanja Biaya Pemeliharaan Peralatan dan Mesin'),
(34, '523123', 'Belanja Barang Persediaan Pemeliharaan Peralatan dan Mesin'),
(35, '524111', 'Belanja Perjalanan Biasa'),
(36, '524113', 'Belanja Perjalanan Dinas Dalam Kota'),
(37, '524114', 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
(38, '524119', 'Belanja Perjalanan Dinas Paket Meeting Luar Kota'),
(39, '531111', 'Belanja Modal Tanah'),
(40, '532111', 'Belanja Modal Peralatan dan Mesin'),
(41, '533111', 'Belanja Modal Gedung dan Bangunan'),
(42, '533113', 'Belanja Modal Upah Tenaga Kerja dan Honor Pengelola Teknis Gedung dan Bangunan'),
(43, '533115', 'Belanja Modal Perencanaan dan Pengawasan Gedung dan Bangunan'),
(44, '533121', 'Belanja Penambahan Nilai Gedung dan Bangunan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `id_program` int(10) UNSIGNED NOT NULL,
  `tahun_program` year(4) NOT NULL,
  `kode_program` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_program` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan_program` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `trx_id` int(10) UNSIGNED NOT NULL,
  `kode_trx` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matrik_id` int(10) UNSIGNED NOT NULL,
  `peg_nip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bnyk_hari` tinyint(4) DEFAULT NULL,
  `tgl_brkt` date DEFAULT NULL,
  `tgl_balik` date DEFAULT NULL,
  `tugas` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabid_konfirmasi` tinyint(1) NOT NULL DEFAULT '0',
  `kabid_ket` text COLLATE utf8mb4_unicode_ci,
  `ppk_konfirmasi` tinyint(1) NOT NULL DEFAULT '0',
  `ppk_ket` text COLLATE utf8mb4_unicode_ci,
  `kpa_konfirmasi` tinyint(1) NOT NULL DEFAULT '0',
  `kpa_ket` text COLLATE utf8mb4_unicode_ci,
  `flag_trx` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`trx_id`, `kode_trx`, `matrik_id`, `peg_nip`, `bnyk_hari`, `tgl_brkt`, `tgl_balik`, `tugas`, `kabid_konfirmasi`, `kabid_ket`, `ppk_konfirmasi`, `ppk_ket`, `kpa_konfirmasi`, `kpa_ket`, `flag_trx`, `created_at`, `updated_at`) VALUES
(1, 'HSVG9R', 5, '19850920 200902 1 010', 1, '2019-03-13', '2019-03-13', 'Pengawasan Pemetaan Wilkerstat 2019', 1, 'ok', 1, 'ok', 1, 'ok', 3, '2019-03-10 15:18:42', '2019-03-12 06:28:53'),
(2, 'FC2QBQ', 6, '19810514 200312 1 003', 1, '2019-03-13', '2019-03-13', 'Pengawasan Pendataan Susenas Mareti 2019', 1, 'ok', 1, 'ok', 1, 'ok', 7, '2019-03-11 02:03:21', '2019-03-11 02:11:49'),
(4, 'HE0AH7', 7, '19781220 200012 1 002', 3, '2019-03-13', '2019-03-15', 'Pengawasan lapangan Sakerans', 1, 'ok', 1, 'ok', 1, 'ok', 7, '2019-03-11 13:16:11', '2019-03-11 13:30:06'),
(5, 'N8FKJK', 8, '19910719 201403 1 002', 2, '2019-03-18', '2019-03-19', 'Pengawasan Administrasi Pemetaan 2019', 2, 'ok', 2, 'ok', 2, 'tes', 3, '2019-03-12 02:54:33', '2019-03-13 04:10:38'),
(6, 'M6PI5L', 9, '19880831 201012 2 002', 3, '2019-03-20', '2019-03-22', 'Pengawasan Pemetaan Wilkerstat 2019', 2, 'ok', 0, NULL, 0, NULL, 3, '2019-03-12 03:57:55', '2019-03-13 04:10:49'),
(7, 'V6K3X7', 10, '19651231 199212 2 001', 2, '2019-03-12', '2019-03-13', 'Pengawasan lapangan Sakerans', 1, NULL, 1, NULL, 1, NULL, 6, '2019-03-12 06:46:24', '2019-03-15 06:40:58'),
(8, 'CIFU0G', 11, '19781220 200012 1 002', 3, '2019-03-07', '2019-03-09', 'Pengawasan Pemetaan Wilkerstat 2019', 1, NULL, 2, 'belum dibayar', 0, NULL, 3, '2019-03-12 11:43:46', '2019-03-14 02:21:38'),
(9, 'TYR0K6', 12, '19831103 201101 1 008', 1, '2019-03-15', '2019-03-15', 'Pengawasan Pemetaan Wilkerstat 2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-14 02:36:07', '2019-03-15 06:29:35'),
(10, 'OM66I3', 13, '19830121 200701 1 001', 1, '2019-04-10', '2019-04-10', 'Pengawasan Pemetaan Wilkerstat 2019', 1, NULL, 2, 'tidak ada dana tersedia', 0, NULL, 3, '2019-03-14 02:36:58', '2019-03-15 07:12:14'),
(11, 'FQUCZC', 14, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2019-03-14 02:37:46', '2019-03-14 02:37:46'),
(12, 'Z02P6Y', 15, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2019-03-15 07:07:15', '2019-03-15 07:07:15'),
(13, 'DJ7BBF', 16, '19680817 199212 1 001', 3, '2019-03-13', '2019-03-15', 'Konsultasi BPS Provinsi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 6, '2019-03-15 07:07:35', '2019-03-15 07:17:14'),
(14, 'DQ53OA', 17, '19850920 200902 1 010', 3, '2019-03-13', '2019-03-15', 'Konsultasi BPS Provinsi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 6, '2019-03-15 07:07:51', '2019-03-15 07:16:45'),
(15, 'DPDELF', 18, '19781220 200012 1 002', 3, '2019-03-13', '2019-03-15', 'Konsultasi BPS Provinsi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 6, '2019-03-15 07:07:57', '2019-03-15 07:16:59'),
(16, 'KLM847', 19, '19660219 199401 1 001', 3, '2019-03-13', '2019-03-15', 'Konsultasi BPS Provinsi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 6, '2019-03-15 07:08:02', '2019-03-15 07:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_kabkota` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kabkota` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_kepala` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_darat` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id`, `kode_kabkota`, `nama_kabkota`, `kepala`, `nip_kepala`, `rate_darat`, `created_at`, `updated_at`) VALUES
(1, '5201', 'Kabupaten Lombok Barat', 'A n a s', '19641228 199103 1 004', '225000', NULL, NULL),
(2, '5202', 'Kabupaten Lombok Tengah', 'Syamsudin', '19651231 199103 1 012', '250000', NULL, NULL),
(3, '5203', 'Kabupaten Lombok Timur', 'Muhamad Saphoan', '19671231 199401 1 001', '300000', NULL, NULL),
(4, '5204', 'Kabupaten Sumbawa', 'Agus Alwi', '19641231 199103 1 022', '500000', NULL, NULL),
(5, '5205', 'Kabupaten Dompu', 'Peter Willem', '19651128 199202 1 001', '600000', NULL, NULL),
(6, '5206', 'Kabupaten Bima', 'S a p i r i n', '19661231 199401 1 002', '650000', NULL, NULL),
(7, '5207', 'Kabupaten Sumbawa Barat', 'Muhammad Ahyar', '19661231 199212 1 001', '450000', NULL, NULL),
(8, '5208', 'Kabupaten Lombok Utara', 'M u h a d i', '19661231 199401 1 001', '325000', NULL, NULL),
(9, '5271', 'Kota Mataram', 'I s a', '19680915 199112 1 001', '150000', NULL, NULL),
(10, '5272', 'Kota Bima', 'Joko Pitoyo Novarudin', '19751120 199712 1 002', '650000', NULL, '2019-01-25 16:40:15'),
(11, '3100', 'Jakarta', NULL, NULL, '3500000', '2019-02-02 11:20:15', '2019-03-10 14:08:08'),
(12, '5100', 'Denpasar Bali', NULL, NULL, NULL, '2019-02-02 11:20:29', '2019-03-10 14:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `unitkerja`
--

CREATE TABLE `unitkerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` tinyint(1) UNSIGNED NOT NULL,
  `eselon` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unitkerja`
--

INSERT INTO `unitkerja` (`id`, `kode`, `nama`, `parent`, `bidang`, `jenis`, `eselon`) VALUES
(55, '52000', 'BPS Provinsi NTB', NULL, '52000', 1, 2),
(56, '52510', 'Bagian Tata Usaha', '52000', '52510', 1, 3),
(57, '52511', 'Subbagian Bina Program', '52510', '52510', 1, 4),
(58, '52512', 'Subbagian Kepegawaian & Hukum', '52510', '52510', 1, 4),
(59, '52513', 'Subbagian Keuangan', '52510', '52510', 1, 4),
(60, '52514', 'Subbagian Umum', '52510', '52510', 1, 4),
(61, '52515', 'Subbagian Pengadaan Barang/Jasa', '52510', '52510', 1, 4),
(62, '52520', 'Bidang Statistik Sosial', '52000', '52520', 1, 3),
(63, '52521', 'Seksi Statistik Kependudukan', '52520', '52520', 1, 4),
(64, '52522', 'Seksi Statistik Ketahanan Sosial', '52520', '52520', 1, 4),
(65, '52523', 'Seksi Statistik Kesejahteraan Rakyat', '52520', '52520', 1, 4),
(66, '52530', 'Bidang Statistik Produksi', '52000', '52530', 1, 3),
(67, '52531', 'Seksi Statistik Pertanian', '52530', '52530', 1, 4),
(68, '52532', 'Seksi Statistik Industri', '52530', '52530', 1, 4),
(69, '52533', 'Seksi Statistik Pertambangan, Energi dan Konstruksi ', '52530', '52530', 1, 4),
(70, '52540', 'Bidang Statistik Distribusi', '52000', '52540', 1, 3),
(71, '52541', 'Seksi Statistik Harga Konsumen dan Harga Perdagangan Besar', '52540', '52540', 1, 4),
(72, '52542', 'Seksi Statistik Keuangan Dan Harga Produsen', '52540', '52540', 1, 4),
(73, '52543', 'Seksi Statistik Niaga dan Jasa', '52540', '52540', 1, 4),
(74, '52550', 'Bidang Nerwilis', '52000', '52550', 1, 3),
(75, '52551', 'Seksi Neraca Produksi', '52550', '52550', 1, 4),
(76, '52552', 'Seksi Neraca Konsumsi', '52550', '52550', 1, 4),
(77, '52553', 'Seksi Analisis Statistik Lintas Sektor', '52550', '52550', 1, 4),
(78, '52560', 'Bidang IPDS', '52000', '52560', 1, 3),
(79, '52561', 'Seksi Integrasi Pengolahan Data', '52560', '52560', 1, 4),
(80, '52562', 'Seksi Jaringan dan Rujukan Statistik', '52560', '52560', 1, 4),
(81, '52563', 'Seksi Diseminasi dan Layanan Statistik', '52560', '52560', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` tinyint(1) DEFAULT '1',
  `pengelola` tinyint(1) DEFAULT '0',
  `user_unitkerja` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `lastip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `user_level`, `pengelola`, `user_unitkerja`, `lastlogin`, `lastip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'admin', NULL, NULL, '$2y$10$83CnH9qWgR8VUM4ksd0MOuHCmTWb23FI4B4m2meQr2RFEVlc.y/lO', 5, 5, '52000', '2019-03-15 17:37:44', '::1', '3kIGbReYA2PVgkSDFriOUjGCDJk3aIgBwAQ3GMk5FqPPoU3U7hlbcmM79Lia', NULL, '2019-03-15 09:37:44'),
(2, 'I Putu Dyatmika', 'mika', 'pdyatmika@gmail.com', NULL, '$2y$10$IQS7Zg6r6YdnoBODIepn.ebPxiwAtiobPWBVc.cd3RnNkxngmeqvS', 4, 5, '52560', '2019-03-15 18:14:12', '::1', 'bRVeGI9HInY7PiSQjrn6z4QL0KuPlAIy07dCdpGneE1NS3NFIIzFZAMzYi78', '2019-02-02 01:42:57', '2019-03-15 10:14:12'),
(3, 'I Gusti Lanang Putra', 'lanang', NULL, NULL, '$2y$10$yaPJn5tf1/xhcZAy6nbgz.8UsB7e/OLjsmtK.UrfcGQOij.zSUMu2', 3, 1, '52550', '2019-03-14 12:37:31', '::1', 'pi3sjtavwLpcVhKLTFBAd4vHnglLI4j1RuK6wsQvKYdLq9MPePUqnjyykSaJ', '2019-02-02 01:44:11', '2019-03-14 04:37:31'),
(4, 'Suntono', 'suntono', NULL, NULL, '$2y$10$iQwE2UXxQrw93T2RVhkP4uMmg4GJFV3dV8.3SNqf9.gu/YuksTB9e', 3, 3, '52000', '2019-03-14 12:43:05', '::1', 'BSIzr9MFBjRV8yz2TKeAcsV1edmwsyfIy53BOleUXvC4XgogewwggI8TfAkj', '2019-02-02 01:46:20', '2019-03-14 04:43:05'),
(5, 'Anang Zakaria', 'anang', 'anangz@bps.go.id', NULL, '$2y$10$wNlcWp30QfOTQiD1LDc.ZOJLLs4uGD5AxpXo/07w15YHzHPmMlMaC', 3, 1, '52560', '2019-03-14 12:37:40', '::1', 'UbieWqsUjLlZrHMM83GfIpUy3DF72TanEZJMul8ue4tvA7l6k8C8UTMTSgZg', '2019-02-02 01:49:12', '2019-03-14 04:37:40'),
(6, 'Pande Dony Gumilar', 'dony', 'pande@dony.com', NULL, '$2y$10$kZlilHPVmtUquaGyPuaJuuXTGKFfEwcxyIlGVzZeun3mGGvBDVWz.', 2, 4, '52510', '2019-02-10 22:35:21', '192.168.1.9', '7rS85T0yB3xD5akhjzNANQWf0A1K8XSh81PoUZLrWaGOoVOwJSgzTzQMN3oj', '2019-02-02 02:41:41', '2019-03-12 02:09:37'),
(7, 'Ni Nyoman Ratna Puspitasari', 'omang', 'nyomanratna@bps.go.id', NULL, '$2y$10$oGpMxxXXJ4lT/brrO4ZfE.Zal/8ZgmL.yC3uvywm43tWBbC1NX6qW', 2, 0, '52550', '2019-03-14 10:28:54', '::1', 'Xyn8ehuox1sY7xvbekjbVcfLPwME5O18qUAK5DPwI8c16gBNKltYDt26kW0S', '2019-02-10 15:21:38', '2019-03-14 02:28:54'),
(8, 'Aris Wahyudi', 'aris', 'aris.wahyudi@bps.go.id', NULL, '$2y$10$AvTY27UOdj0BIADeb2/cDO/t0q8GqeiVBeT68gSh.f53C7En72oG2', 3, 4, '52510', '2019-03-15 18:16:16', '::1', 'dr1phye0nOwCHU441bTnvNynlT7vAPwIXWTapCDWE7JEGCf2YEAa4CFWDWHJ', '2019-03-11 14:00:40', '2019-03-15 10:16:16'),
(9, 'Ni Kadek Adi Madri', 'nikadek', 'nikadek.adi@bps.go.id', NULL, '$2y$10$LoqJ/9INNX80fXZlV6/Or.rZ1hIlsWQZGHGUND8Dtsf2ABxWwfzUW', 3, 1, '52530', NULL, NULL, NULL, '2019-03-11 14:20:06', '2019-03-12 01:14:05'),
(10, 'Lalu Supratna', 'supratna', 'lalu.supratna@bps.go.id', NULL, '$2y$10$It4RKgzv3eby5BdOx3HRfe6jIsekRkMmYf778Y/3AgxG.3DhfJOvW', 3, 1, '52510', '2019-03-13 12:09:15', '::1', 'Vfg4HZGYlRlt1KQXz1r8TU5lFkyABi7TfvYgZET5JChzdkJnSwUHJc5tJvLl', '2019-03-12 03:55:34', '2019-03-13 04:09:15'),
(11, 'PPK BPS Provinsi NTB', 'ppk', 'ppk@bpsntb.id', NULL, '$2y$10$DHkneorQszIqiNT5tH2VfuydVVHktDzLoQrPAo2iFno7uxeW39o2y', 3, 2, '52000', '2019-03-14 12:41:10', '::1', 'ZCE6sSKagKCkFA5OgT4lFnmorNrTWYyFGqL63JEQh5uGwQZIcv3Yr5LCieId', '2019-03-12 04:06:21', '2019-03-14 04:41:10'),
(12, 'Operator Sosial', 'sosial', 'sosial@bps.go.id', NULL, '$2y$10$f7Nv/7pBcr6wi7wqV12xhOi1gMo7jiflVu26O8SZyqh9sMpxIYQWS', 2, 0, '52520', NULL, NULL, NULL, '2019-03-14 04:14:41', '2019-03-14 04:14:41'),
(13, 'Operator TU', 'tatausaha', 'operatortu@bps.go.id', NULL, '$2y$10$EB00N196U1dbUhKIlRFc7OKLtV25wfTYJJcru//RqBk9TUiYS1Rmm', 2, 0, '52510', NULL, NULL, NULL, '2019-03-14 04:15:13', '2019-03-14 04:15:13'),
(14, 'Operator Produksi', 'produksi', 'produksi@bps.go.id', NULL, '$2y$10$WSt5boQZNxeulZfmokJI7.qaYrKkvNJKurH.Qtbz5wCeI1yL6Z0oe', 2, 0, '52530', NULL, NULL, NULL, '2019-03-14 04:16:11', '2019-03-14 04:16:11'),
(15, 'Operator Distribusi', 'distribusi', 'distribusi@bps.go.id', NULL, '$2y$10$lkKTF9FLFzd0hkV62nmroe1kIhtWj5uRJGR620l4yWdIj3uxg5bFy', 2, 0, '52540', NULL, NULL, NULL, '2019-03-14 04:16:48', '2019-03-14 04:16:48'),
(16, 'Operator NWAS', 'neraca', 'neraca@bps.go.id', NULL, '$2y$10$Wi9m7W82og8Xj8/UDT.6/e8akqXb0tM7zkkyGO268e7ub5orJtQZq', 2, 0, '52550', NULL, NULL, NULL, '2019-03-14 04:17:30', '2019-03-14 04:17:30'),
(17, 'Operator IPDS', 'ipds', 'ipds@bps.go.id', NULL, '$2y$10$XNvHcxJZJb8UWQQtxLHHGujx2hd4eUnv1qORxyOTHzWteZOwAt4Mu', 2, 0, '52560', '2019-03-14 12:19:06', '::1', 'vBmyWdo5RAONtFloh3KqJBxvUaedrglsaRdEQTQ9jCI1ne9QIVpLZEj7Rp20', '2019-03-14 04:18:06', '2019-03-14 04:19:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuitansi`
--
ALTER TABLE `kuitansi`
  ADD PRIMARY KEY (`kuitansi_id`);

--
-- Indexes for table `matrik`
--
ALTER TABLE `matrik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_gol`
--
ALTER TABLE `m_gol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_nip_baru_unique` (`nip_baru`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spd`
--
ALTER TABLE `spd`
  ADD PRIMARY KEY (`spd_id`);

--
-- Indexes for table `surattugas`
--
ALTER TABLE `surattugas`
  ADD PRIMARY KEY (`srt_id`),
  ADD KEY `FK_surattugas_transaksi` (`trx_id`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`trx_id`),
  ADD UNIQUE KEY `transaksi_kode_trx_unique` (`kode_trx`),
  ADD KEY `transaksi_matrik_id_foreign` (`matrik_id`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitkerja`
--
ALTER TABLE `unitkerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuitansi`
--
ALTER TABLE `kuitansi`
  MODIFY `kuitansi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matrik`
--
ALTER TABLE `matrik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `m_gol`
--
ALTER TABLE `m_gol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spd`
--
ALTER TABLE `spd`
  MODIFY `spd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surattugas`
--
ALTER TABLE `surattugas`
  MODIFY `srt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `id_program` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `trx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surattugas`
--
ALTER TABLE `surattugas`
  ADD CONSTRAINT `FK_surattugas_transaksi` FOREIGN KEY (`trx_id`) REFERENCES `transaksi` (`trx_id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_matrik_id_foreign` FOREIGN KEY (`matrik_id`) REFERENCES `matrik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
