-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 11:22 PM
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
  `unitkerja` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `tahun_anggaran`, `mak`, `uraian`, `pagu`, `unitkerja`, `status`, `created_at`, `updated_at`) VALUES
(1, 2019, '054.01.06.2895.004.100.524111', 'konsultasi bidang ipds dari provinsi ke bps ri', '15556000', '52520', 1, '2019-01-24 09:18:56', '2019-01-24 15:09:04'),
(2, 2019, '054.01.06.2895.006.100.524111', 'supervisi pencacahan lapangan oleh bps provinsi', '9255000', '52560', 1, '2019-01-24 09:26:57', '2019-01-24 15:08:55'),
(3, 2019, '051.01.06.2895.004.101.524111', 'pengawasan lapangan sakernas', '15000000', '52510', 1, '2019-01-24 15:17:31', '2019-02-21 03:40:40'),
(4, 2019, '054.01.06.2895.004.101.524111', 'konsultasi bidang dari provinsi ke bps ri', '7100000', '52530', 1, '2019-01-25 15:56:58', '2019-01-25 15:57:16'),
(5, 2019, '054.01.06.2895.025.302.524111', 'pengawasan ke kab/kota dalam rangka penyusunan pdrb kab/kota', '6170000', '52550', 1, '2019-02-25 13:39:50', '2019-02-25 13:39:50'),
(6, 2019, '054.01.06.2895.026.051.524111', 'konsultasi kepala seksi analisis lintas sektor ke bps pusat', '7778000', '52550', 1, '2019-02-25 13:41:19', '2019-02-25 13:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `bendahara_nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bendahara_nama` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_kuitansi` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuitansi`
--

INSERT INTO `kuitansi` (`kuitansi_id`, `trx_id`, `total_biaya`, `tgl_kuitansi`, `harian_rupiah`, `harian_lama`, `harian_total`, `hotel_rupiah`, `hotel_lama`, `hotel_total`, `hotel_flag`, `transport_rupiah`, `transport_ket`, `transport_flag`, `rill1_ket`, `rill1_rupiah`, `rill1_flag`, `rill2_ket`, `rill2_rupiah`, `rill2_flag`, `rill3_ket`, `rill3_rupiah`, `rill3_flag`, `bendahara_nip`, `bendahara_nama`, `flag_kuitansi`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, NULL, NULL, 0, '2019-03-01 01:28:58', '2019-03-01 01:28:58'),
(2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, NULL, NULL, 0, '2019-03-01 01:30:00', '2019-03-01 01:30:00'),
(3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, NULL, NULL, 0, '2019-03-01 02:24:56', '2019-03-01 02:24:56'),
(4, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, NULL, NULL, 0, '2019-03-01 03:09:47', '2019-03-01 03:09:47'),
(5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, NULL, NULL, 0, '2019-03-01 06:39:05', '2019-03-01 06:39:05'),
(6, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, NULL, NULL, 0, '2019-03-01 06:39:10', '2019-03-01 06:39:10'),
(7, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, NULL, NULL, 0, '2019-03-01 06:39:14', '2019-03-01 06:39:14'),
(8, 11, '3220000', '2019-03-20', '440000', 3, '1320000', '500000', 2, '1000000', 1, '650000', 'Transport dari Mataram ke Kabupaten Bima', 1, 'taksi bandara', '250000', 1, NULL, NULL, 0, NULL, NULL, 0, '199107192014031002', 'Pande Gde Dony Gumilar', 1, '2019-03-01 08:36:47', '2019-03-03 13:08:22'),
(9, 12, '7018000', '2019-03-13', '540000', 3, '1620000', '580000', 2, '348000', 0, '3200000', 'Transport dari Mataram ke Jakarta', 1, 'taksi ke bandara pp', '450000', 1, 'boker dibandara', '1250000', 1, 'meju di pom bensis', '150000', 1, '199107192014031002', 'Pande Gde Dony Gumilar', 1, '2019-03-02 05:12:53', '2019-03-03 14:05:35');

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
(2, 2019, '2019-02-01', '2019-04-30', '5205', 3, 3, '051.01.06.2895.004.101.524111', '15000000', '52520', 3, '440000', '1320000', '600000', 2, '500000', '1000000', '0', '2920000', '52520', 4, '2019-01-28 20:15:31', '2019-03-03 14:26:47'),
(3, 2019, '2019-02-01', '2019-02-28', '5207', 3, 2, '054.01.06.2895.006.100.524111', '9255000', '52560', 3, '440000', '1320000', '450000', 2, '550000', '1100000', '0', '2870000', '52520', 4, '2019-01-28 23:00:57', '2019-03-01 01:13:58'),
(4, 2019, '2019-02-01', '2019-04-30', '5201', 1, 4, '051.01.06.2895.004.101.524111', '15000000', '52520', 1, '440000', '440000', '225000', 0, '0', '0', '0', '665000', '52510', 4, '2019-01-31 13:21:48', '2019-03-01 01:14:15'),
(6, 2019, '2019-02-02', '2019-02-28', '5272', 3, 2, '054.01.06.2895.006.100.524111', '9255000', '52560', 3, '440000', '1320000', '650000', 2, '500000', '1000000', '300000', '3270000', '52520', 4, '2019-02-02 11:23:05', '2019-02-28 06:18:48'),
(8, 2019, '2019-02-02', '2019-02-27', '3100', 3, 2, '054.01.06.2895.006.100.524111', '9255000', '52560', 3, '540000', '1620000', '3500000', 2, '580000', '1160000', '300000', '6580000', '52560', 4, '2019-02-02 11:34:59', '2019-03-02 05:12:00'),
(9, 2019, '2019-03-09', '2019-03-30', '5100', 3, 3, '051.01.06.2895.004.101.524111', '15000000', '52520', 3, '500000', '1000000', '2000000', 2, '500000', '500000', '200000', '3700000', '52000', 4, '2019-02-02 11:37:39', '2019-03-01 01:07:43'),
(10, 2019, '2019-03-01', '2019-04-30', '5206', 3, 3, '051.01.06.2895.004.101.524111', '15000000', '52520', 3, '440000', '1320000', '650000', 2, '540000', '1080000', '300000', '3350000', '52550', 2, '2019-02-04 14:38:46', '2019-03-03 14:28:38'),
(11, 2019, '2019-04-01', '2019-04-30', '5205', 3, 4, '054.01.06.2895.004.101.524111', '7100000', '52530', 3, '440000', '1320000', '600000', 2, '500000', '1000000', '300000', '3220000', '52560', 4, '2019-02-07 00:37:01', '2019-02-28 04:16:36'),
(12, 2019, '2019-03-01', '2019-03-31', '5205', 2, 2, '054.01.06.2895.006.100.524111', '9255000', '52560', 2, '440000', '880000', '600000', 1, '540000', '540000', '200000', '2220000', '52560', 4, '2019-02-21 03:46:09', '2019-03-01 01:08:23'),
(13, 2019, '2019-03-01', '2019-04-12', '5207', 3, 4, '054.01.06.2895.004.101.524111', '7100000', '52530', 3, '440000', '1320000', '450000', 2, '500000', '1000000', '300000', '3070000', '52520', 2, '2019-02-24 15:56:14', '2019-03-03 14:43:00'),
(14, 2019, '2019-03-01', '2019-04-30', '5206', 3, 5, '054.01.06.2895.025.302.524111', '6170000', '52550', 3, '440000', '1320000', '650000', 2, '540000', '1080000', '300000', '3350000', '52550', 4, '2019-02-25 13:42:20', '2019-02-28 14:18:25'),
(15, 2019, '2019-03-01', '2019-04-30', '5206', 3, 2, '054.01.06.2895.006.100.524111', '9255000', '52560', 3, '440000', '1320000', '650000', 2, '500000', '1000000', '0', '2970000', '52560', 4, '2019-03-01 08:29:41', '2019-03-01 08:34:58'),
(16, 2019, '2019-03-01', '2019-04-30', '5204', 2, 2, '054.01.06.2895.006.100.524111', '9255000', '52560', 2, '440000', '880000', '600000', 1, '500000', '500000', '0', '1980000', '52560', 2, '2019-03-03 14:23:52', '2019-03-03 15:15:49');

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
  `nip_baru` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '198203192004121002', 'I Putu Dyatmika', '1982-03-19', 1, '34', '52563', 3, 0, 1, '2019-01-22 12:02:00', '2019-02-10 13:30:20'),
(4, '196602191994011001', 'Suntono', '1966-02-19', 1, '43', '52000', 1, 1, 1, '2019-01-22 14:28:56', '2019-02-10 13:30:11'),
(10, '199209102014121001', 'Wahyudi Septiawan', '1992-09-10', 1, '32', '52563', 4, 0, 1, '2019-02-21 03:35:42', '2019-02-21 03:35:42'),
(11, '196808171992121001', 'I Gusti Lanang Putra', '1968-08-17', 1, '42', '52550', 2, 2, 1, '2019-02-21 03:37:41', '2019-03-01 06:38:08'),
(12, '198204262004122001', 'Gusti Ketut Indradewi', '1982-04-26', 2, '34', '52521', 4, 0, 1, '2019-02-22 07:43:32', '2019-02-24 05:30:14'),
(14, '196512311992121001', 'Lalu Supratna', '1965-12-31', 1, '42', '52510', 2, 0, 1, '2019-02-27 03:00:05', '2019-02-27 03:00:05'),
(15, '197712252000121002', 'Arrief Chandra Setiawan', '1977-12-25', 1, '41', '52520', 2, 0, 1, '2019-02-27 03:01:03', '2019-02-27 03:01:03'),
(16, '196112291981032001', 'Ni Kadek Adi Madri', '1961-12-29', 2, '42', '52530', 2, 0, 1, '2019-02-27 03:01:55', '2019-02-27 03:01:55'),
(17, '196510151992021001', 'Lalu Putradi', '1965-10-15', 1, '42', '52540', 2, 0, 1, '2019-02-27 03:02:42', '2019-02-27 03:02:42'),
(18, '196704281989011001', 'Anang Zakaria', '1967-04-28', 1, '34', '52560', 2, 0, 1, '2019-02-27 03:03:48', '2019-02-27 03:03:48'),
(19, '199107192014031002', 'Pande Gde Dony Gumilar', '1991-07-19', 1, '32', '52513', 4, 3, 1, '2019-03-02 06:03:21', '2019-03-02 06:03:21'),
(20, '197812202000121002', 'Akhmad Zammiluny', '1978-12-20', 1, '41', '52511', 3, 0, 1, '2019-03-02 06:06:06', '2019-03-02 06:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `ppk_nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 3, 'B-001/BPS/52514/02/2019', 1, '196808171992121001', 'I Gusti Lanang Putra', 0, 1, '2019-02-28 04:16:36', '2019-03-01 06:39:05'),
(2, 10, 'B-002/BPS/52514/02/2019', 1, '196808171992121001', 'I Gusti Lanang Putra', 0, 1, '2019-02-28 06:18:48', '2019-03-01 06:39:10'),
(3, 9, 'B-003/BPS/52514/02/2019', 1, '196808171992121001', 'I Gusti Lanang Putra', 0, 1, '2019-02-28 14:18:25', '2019-03-01 06:39:14'),
(4, 5, NULL, 1, NULL, NULL, 0, 3, '2019-03-01 01:03:06', '2019-03-03 14:42:12'),
(5, 8, NULL, 1, NULL, NULL, 0, 3, '2019-03-01 01:07:24', '2019-03-03 14:43:00'),
(6, 4, 'B-006/BPS/52514/03/2019', 1, '196808171992121001', 'I Gusti Lanang Putra', 0, 1, '2019-03-01 01:07:43', '2019-03-01 06:39:18'),
(7, 2, NULL, 1, NULL, NULL, 0, 0, '2019-03-01 01:08:03', '2019-03-01 01:08:03'),
(8, 6, 'B-008/BPS/52514/03/2019', 1, '196808171992121001', 'I Gusti Lanang Putra', 0, 1, '2019-03-01 01:08:23', '2019-03-01 06:39:23'),
(9, 7, 'B-009/BPS/52514/03/2019', 1, '196808171992121001', 'Gusti Lanang Putra', 0, 1, '2019-03-01 01:13:58', '2019-03-01 03:09:45'),
(10, 1, 'B-010/BPS/52514/03/2019', 1, '196808171992121001', 'Gusti Lanang Putra', 0, 1, '2019-03-01 01:14:15', '2019-03-01 01:24:18'),
(11, 11, 'B-011/BPS/52514/03/2019', 1, '196808171992121001', 'I Gusti Lanang Putra', 0, 1, '2019-03-01 08:34:58', '2019-03-01 08:36:47'),
(12, 12, 'B-012/BPS/52514/03/2019', 1, '196808171992121001', 'I Gusti Lanang Putra', 0, 1, '2019-03-02 05:12:00', '2019-03-02 05:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `surattugas`
--

CREATE TABLE `surattugas` (
  `srt_id` int(10) UNSIGNED NOT NULL,
  `trx_id` int(11) UNSIGNED NOT NULL,
  `nomor_surat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `ttd_nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_jabatan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd_nama` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `flag_surattugas` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surattugas`
--

INSERT INTO `surattugas` (`srt_id`, `trx_id`, `nomor_surat`, `tgl_surat`, `ttd_nip`, `ttd_jabatan`, `ttd_nama`, `flag_ttd`, `flag_surattugas`, `created_at`, `updated_at`) VALUES
(1, 8, NULL, NULL, '196512311992121001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 0, 3, '2019-02-26 04:20:07', '2019-03-03 14:43:00'),
(2, 7, 'B-002/BPS/52510/03/2019', '2019-03-06', '196704281989011001', 'Kepala Bidang IPDS', 'Anang Zakaria', 1, 1, '2019-02-26 04:32:34', '2019-03-01 03:09:34'),
(3, 9, 'B-003/BPS/52510/02/2019', '2019-03-06', '196602191994011001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, '2019-02-26 07:13:36', '2019-02-28 14:19:06'),
(4, 2, NULL, NULL, '196602191994011001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 0, '2019-02-27 14:48:52', '2019-02-28 03:56:25'),
(5, 6, 'B-005/BPS/52510/03/2019', '2019-03-13', '196602191994011001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, '2019-02-28 01:38:36', '2019-03-01 01:29:48'),
(6, 5, NULL, NULL, NULL, NULL, NULL, 0, 3, '2019-02-28 02:35:14', '2019-03-03 14:42:11'),
(7, 3, 'B-007/BPS/52510/02/2019', '2019-03-07', '196602191994011001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, '2019-02-28 04:13:50', '2019-02-28 14:00:00'),
(8, 10, 'B-008/BPS/52510/02/2019', '2019-03-04', '196602191994011001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, '2019-02-28 06:18:48', '2019-02-28 06:19:31'),
(9, 4, 'B-009/BPS/52510/03/2019', '2019-03-06', '196512311992121001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 1, '2019-03-01 01:07:43', '2019-03-01 02:24:34'),
(10, 1, 'B-010/BPS/52510/03/2019', '2019-03-14', '196602191994011001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, '2019-03-01 01:14:15', '2019-03-01 01:17:26'),
(11, 11, 'B-011/BPS/52510/03/2019', '2019-03-14', '196704281989011001', 'Kepala Bidang IPDS', 'Anang Zakaria', 1, 1, '2019-03-01 08:34:57', '2019-03-01 08:35:51'),
(12, 12, 'B-012/BPS/52510/03/2019', '2019-03-04', '196602191994011001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, '2019-03-02 05:12:00', '2019-03-02 05:12:24');

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
  `peg_nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'Q2T8ZN', 4, '199209102014121001', 1, '2019-02-14', '2019-02-14', 'Pengawasan Updating Susenas Maret 2019', 1, 'ok', 1, 'ok', 1, 'ok', 6, '2019-02-22 07:35:13', '2019-03-01 01:24:18'),
(2, 'ZZYO28', 2, '197712252000121002', 3, '2019-03-07', '2019-03-09', 'Pengawasan Pendataan Sakernas Februari 2019', 1, 'ok', 1, 'ok', 1, 'ok', 4, '2019-02-22 08:16:04', '2019-03-03 14:26:47'),
(3, 'USCGTO', 11, '198203192004121002', 3, '2019-04-11', '2019-04-13', 'Pengawasan KSA', 1, 'ok coy', 1, 'tidak ada dana nya lagi', 1, 'ga ada duit', 6, '2019-02-22 08:32:05', '2019-03-01 06:39:05'),
(4, '2UVCVE', 9, '196602191994011001', 3, '2019-03-14', '2019-03-16', 'Studi Banding SAKIP', 1, 'ok', 1, 'ok', 1, 'ok', 6, '2019-02-24 10:17:41', '2019-03-01 02:24:56'),
(5, 'DLP5UH', 10, '198203192004121002', 3, '2019-03-27', '2019-03-29', 'Perjalanan Pengawasan Pendataan Susenas', 1, 'tidak ada dana', 2, 'kurang dana', 2, 'tanggal itu tidak boleh berangkat.. ganti tanggal lain', 3, '2019-02-24 10:17:49', '2019-03-03 15:11:42'),
(6, 'NNO50S', 12, '198203192004121002', 2, '2019-03-06', '2019-03-07', 'Pengawasan Pemetaan Wilkerstat 2019', 1, 'ok', 1, 'ok', 1, 'ok', 6, '2019-02-24 14:50:43', '2019-03-01 01:30:00'),
(7, 'L72T3O', 3, '198203192004121002', 3, '2019-02-27', '2019-03-01', 'Pengawasan Pengolahan Susenas Maret 2019', 1, 'ok', 1, 'ok', 1, 'ok', 6, '2019-02-24 16:03:35', '2019-03-01 03:09:47'),
(8, 'Y27CJM', 13, '196602191994011001', 3, '2019-02-25', '2019-02-27', 'Pengawasan Ubinan', 1, 'ok', 1, 'ok', 2, 'tanggal tersebut tidak bisa berangkat', 3, '2019-02-25 12:59:44', '2019-03-03 15:18:38'),
(9, 'QID9RZ', 14, '196808171992121001', 3, '2019-03-14', '2019-03-16', 'Pengawasan PDRB', 1, 'ok', 1, 'ok', 1, 'ok', 6, '2019-02-25 13:43:01', '2019-03-01 06:39:15'),
(10, 'U7IWIF', 6, '199209102014121001', 3, '2019-03-06', '2019-03-08', 'Pengawasan lapangan Sakerans', 1, 'ok', 1, 'ok', 1, 'ok', 6, '2019-02-28 06:02:44', '2019-03-01 06:39:10'),
(11, 'N0RA6E', 15, '199209102014121001', 3, '2019-03-20', '2019-03-22', 'Pengawasan Pemetaan Wilkerstat 2019', 1, 'ok', 1, 'ok', 1, 'ok', 7, '2019-03-01 08:30:34', '2019-03-03 14:10:42'),
(12, 'DE00F9', 8, '196704281989011001', 3, '2019-03-06', '2019-03-08', 'Pengawasan Pemetaan Wilkerstat 2019', 1, 'ok', 1, 'ok', 1, 'ok', 7, '2019-03-02 05:06:20', '2019-03-03 14:11:15'),
(13, 'T9NZT2', 16, '198203192004121002', 2, '2019-04-03', '2019-04-04', 'Pengawasan SKD dan PST 2019', 2, 'tidak bisa tanggal tersebut', 0, NULL, 0, NULL, 3, '2019-03-03 14:24:08', '2019-03-03 15:15:49');

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
(11, '3100', 'Provinsi DKI Jakarta', NULL, NULL, '3500000', '2019-02-02 11:20:15', '2019-02-02 11:34:10'),
(12, '5100', 'Provinsi Bali', NULL, NULL, NULL, '2019-02-02 11:20:29', '2019-02-02 11:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `unitkerja`
--

CREATE TABLE `unitkerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` tinyint(1) UNSIGNED NOT NULL,
  `eselon` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unitkerja`
--

INSERT INTO `unitkerja` (`id`, `kode`, `nama`, `parent`, `jenis`, `eselon`) VALUES
(28, '52000', 'BPS Provinsi NTB', NULL, 1, 2),
(29, '52510', 'Bagian Tata Usaha', '52000', 1, 3),
(30, '52511', 'Subbagian Bina Program', '52510', 1, 4),
(31, '52512', 'Subbagian Kepegawaian & Hukum', '52510', 1, 4),
(32, '52513', 'Subbagian Keuangan', '52510', 1, 4),
(33, '52514', 'Subbagian Umum', '52510', 1, 4),
(34, '52515', 'Subbagian Pengadaan Barang/Jasa', '52510', 1, 4),
(35, '52520', 'Bidang Statistik Sosial', '52000', 1, 3),
(36, '52521', 'Seksi Statistik Kependudukan', '52520', 1, 4),
(37, '52522', 'Seksi Statistik Ketahanan Sosial', '52520', 1, 4),
(38, '52523', 'Seksi Statistik Kesejahteraan Rakyat', '52520', 1, 4),
(39, '52530', 'Bidang Statistik Produksi', '52000', 1, 3),
(40, '52531', 'Seksi Statistik Pertanian', '52530', 1, 4),
(41, '52532', 'Seksi Statistik Industri', '52530', 1, 4),
(42, '52533', 'Seksi Statistik PEK', '52530', 1, 4),
(43, '52540', 'Bidang Statistik Distribusi', '52000', 1, 3),
(44, '52541', 'Seksi Statistik HK dan HPB', '52540', 1, 4),
(45, '52542', 'Seksi Statistik Keuangan Dan Harga Produsen', '52540', 1, 4),
(46, '52543', 'Seksi Statistik Niaga dan Jasa', '52540', 1, 4),
(47, '52550', 'Bidang Nerwilis', '52000', 1, 3),
(48, '52551', 'Seksi Neraca Produksi', '52550', 1, 4),
(49, '52552', 'Seksi Neraca Konsumsi', '52550', 1, 4),
(50, '52553', 'Seksi Analisis Statistik Lintas Sektor', '52550', 1, 4),
(51, '52560', 'Bidang IPDS', '52000', 1, 3),
(52, '52561', 'Seksi Integrasi Pengolahan Data', '52560', 1, 4),
(53, '52562', 'Seksi Jaringan dan Rujukan Statistik', '52560', 1, 4),
(54, '52563', 'Seksi Diseminasi dan Layanan Statistik', '52560', 1, 4);

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
(1, 'SuperAdmin', 'admin', NULL, NULL, '$2y$10$83CnH9qWgR8VUM4ksd0MOuHCmTWb23FI4B4m2meQr2RFEVlc.y/lO', 5, 5, '52000', '2019-03-03 16:31:22', '::1', 'tl3m5HCAeYaoDh3yEVJdWDu3j3ur23ggWsdJhNcZcOg8xa90zMEN2R0ilMqa', NULL, '2019-03-03 08:31:22'),
(2, 'I Putu Dyatmika', 'mika', 'pdyatmika@gmail.com', NULL, '$2y$10$IQS7Zg6r6YdnoBODIepn.ebPxiwAtiobPWBVc.cd3RnNkxngmeqvS', 4, 5, '52560', '2019-03-03 16:38:10', '192.168.1.8', 'h11FwUdv0fPMMnmiqKR4erFLIgZDZOaK1Az6iOjxs5dzOah0rMHrJPXsiS46', '2019-02-02 01:42:57', '2019-03-03 08:38:10'),
(3, 'I Gusti Lanang Putra', 'lanang', NULL, NULL, '$2y$10$yaPJn5tf1/xhcZAy6nbgz.8UsB7e/OLjsmtK.UrfcGQOij.zSUMu2', 3, 3, '52550', '2019-02-02 14:10:14', '192.168.1.9', 'upDIRt6qKZD5iEH2tZCHJrabbwUDJPWtWAE4w5ApvGj1sDyhDADMGKHNAB2P', '2019-02-02 01:44:11', '2019-02-02 11:13:38'),
(4, 'Suntono', 'suntono', NULL, NULL, '$2y$10$iQwE2UXxQrw93T2RVhkP4uMmg4GJFV3dV8.3SNqf9.gu/YuksTB9e', 3, 4, '52000', '2019-02-02 09:46:35', '192.168.1.9', 'gGsUKdk8ZuIySPpcB04S7vmrfsmhGdY5klhJkvag3vs2azTXKYaZHZbQdqhc', '2019-02-02 01:46:20', '2019-02-02 11:13:46'),
(5, 'Anang Zakaria', 'anang', 'anangz@bps.go.id', NULL, '$2y$10$wNlcWp30QfOTQiD1LDc.ZOJLLs4uGD5AxpXo/07w15YHzHPmMlMaC', 3, 1, '52560', '2019-02-02 14:09:18', '192.168.1.9', '93bEoaNiqOXYpPTx2nHicZBof3o8XuZklEsoggrQm9MufpOdtRqSg6IN95bF', '2019-02-02 01:49:12', '2019-02-02 11:13:57'),
(6, 'Pande Dony Gumilar', 'dony', 'pande@dony.com', NULL, '$2y$10$kZlilHPVmtUquaGyPuaJuuXTGKFfEwcxyIlGVzZeun3mGGvBDVWz.', 2, 2, '52510', '2019-02-10 22:35:21', '192.168.1.9', '7rS85T0yB3xD5akhjzNANQWf0A1K8XSh81PoUZLrWaGOoVOwJSgzTzQMN3oj', '2019-02-02 02:41:41', '2019-02-10 14:35:21'),
(7, 'Ni Nyoman Ratna Puspitasari', 'omang', 'nyomanratna@bps.go.id', NULL, '$2y$10$oGpMxxXXJ4lT/brrO4ZfE.Zal/8ZgmL.yC3uvywm43tWBbC1NX6qW', 2, 0, '52550', '2019-02-24 20:12:22', '::1', 'cBi4OzzeqsvmymiYlbA1TI7rAaRy0sMyHSp2lBCzBRxyGzBZXDcOpdlx7os6', '2019-02-10 15:21:38', '2019-02-24 12:12:22');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuitansi`
--
ALTER TABLE `kuitansi`
  MODIFY `kuitansi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `matrik`
--
ALTER TABLE `matrik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spd`
--
ALTER TABLE `spd`
  MODIFY `spd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surattugas`
--
ALTER TABLE `surattugas`
  MODIFY `srt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `trx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
