-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 08:01 AM
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
(3, 2019, '051.01.06.2895.004.101.524111', 'pengawasan lapangan sakernas', '15000000', '52520', 1, '2019-01-24 15:17:31', '2019-01-24 15:17:31'),
(4, 2019, '054.01.06.2895.004.101.524111', 'konsultasi bidang dari provinsi ke bps ri', '7100000', '52530', 1, '2019-01-25 15:56:58', '2019-01-25 15:57:16');

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
-- Table structure for table `matrik`
--

CREATE TABLE `matrik` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_matrik` year(4) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `peg_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kodekab_tujuan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lamanya` tinyint(4) NOT NULL,
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

INSERT INTO `matrik` (`id`, `tahun_matrik`, `tgl_awal`, `tgl_akhir`, `peg_id`, `kodekab_tujuan`, `lamanya`, `dana_mak`, `dana_pagu`, `dana_unitkerja`, `lama_harian`, `dana_harian`, `total_harian`, `dana_transport`, `lama_hotel`, `dana_hotel`, `total_hotel`, `pengeluaran_rill`, `total_biaya`, `unit_pelaksana`, `flag_matrik`, `created_at`, `updated_at`) VALUES
(1, 2019, '2019-02-01', '2019-02-28', NULL, '5206', 3, '051.01.06.2895.004.101.524111', '15000000', '52520', 3, '440000', '1320000', '650000', 2, '500000', '1000000', '0', '3320000', '52560', 1, '2019-01-28 16:55:32', '2019-02-02 17:18:40'),
(2, 2019, '2019-02-01', '2019-04-30', NULL, '5205', 3, '051.01.06.2895.004.101.524111', '15000000', '52520', 3, '440000', '1320000', '600000', 2, '500000', '1000000', '0', '2920000', '52510', 1, '2019-01-28 20:15:31', '2019-02-02 17:18:45'),
(3, 2019, '2019-02-01', '2019-02-28', NULL, '5207', 3, '054.01.06.2895.006.100.524111', '9255000', '52560', 3, '440000', '1320000', '450000', 2, '550000', '1100000', '0', '2870000', '52540', 0, '2019-01-28 23:00:57', '2019-02-02 17:17:30'),
(4, 2019, '2019-02-01', '2019-02-01', NULL, '5201', 1, '051.01.06.2895.004.101.524111', '15000000', '52520', 1, '440000', '440000', '225000', 0, '0', '0', '0', '665000', '52530', 1, '2019-01-31 13:21:48', '2019-02-02 17:19:48'),
(5, 2019, '2019-03-01', '2019-03-31', NULL, '5100', 3, '054.01.06.2895.004.100.524111', '15556000', '52520', 3, '500000', '1500000', '3400000', 2, '500000', '1000000', '300000', '6200000', '52510', 1, '2019-02-02 11:21:17', '2019-02-02 17:18:32'),
(6, 2019, '2019-02-02', '2019-02-28', NULL, '5272', 3, '054.01.06.2895.006.100.524111', '9255000', '52560', 3, '440000', '1320000', '650000', 2, '500000', '1000000', '300000', '3270000', '52000', 0, '2019-02-02 11:23:05', '2019-02-02 17:17:44'),
(7, 2019, '2019-04-05', '2019-04-30', NULL, '3100', 3, '054.01.06.2895.004.100.524111', '7100000', '52530', 3, '550000', '1650000', '3600000', 2, '580000', '1160000', '300000', '6710000', '52550', 1, '2019-02-02 11:24:25', '2019-02-02 17:33:40'),
(8, 2019, '2019-02-02', '2019-02-27', NULL, '3100', 3, '054.01.06.2895.006.100.524111', '9255000', '52560', 3, '540000', '1620000', '3500000', 2, '580000', '1160000', '300000', '6580000', '52560', 0, '2019-02-02 11:34:59', '2019-02-02 17:17:24'),
(9, 2019, '2019-03-09', '2019-03-30', NULL, '5100', 2, '051.01.06.2895.004.101.524111', '15000000', '52520', 2, '500000', '1000000', '2000000', 1, '500000', '500000', '0', '3500000', '52550', 1, '2019-02-02 11:37:39', '2019-02-02 17:33:09');

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
(14, '2014_10_12_000000_create_users_table', 2);

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
  `nip_lama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` tinyint(1) UNSIGNED NOT NULL,
  `gol` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitkerja` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` tinyint(1) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip_baru`, `nip_lama`, `nama`, `tgl_lahir`, `jk`, `gol`, `unitkerja`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, '198203192004121002', '340017401', 'I Putu Dyatmika', '1982-03-19', 1, '34', '52563', 1, '2019-01-22 12:02:00', '2019-01-22 12:02:00'),
(2, '199209102014121001', '340057235', 'Wahyudi Septiawan', '1992-09-10', 1, '31', '52563', 4, '2019-01-22 12:19:37', '2019-02-02 06:25:43'),
(3, '198311032011011008', '340054408', 'Casslirais Surawan', '1983-11-03', 1, '32', '52562', 4, '2019-01-22 12:40:33', '2019-02-02 06:25:51'),
(4, '196602191994011001', '340014129', 'Suntono', '1966-02-19', 1, '43', '52000', 3, '2019-01-22 14:28:56', '2019-02-02 06:25:32'),
(5, '196704281989011001', '340012035', 'Anang Zakaria', '1967-04-28', 1, '34', '52560', 2, '2019-01-22 14:32:11', '2019-02-02 06:26:06');

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
(11, '3100', 'Jakarta', NULL, NULL, '3500000', '2019-02-02 11:20:15', '2019-02-02 11:34:10'),
(12, '5100', 'Bali', NULL, NULL, NULL, '2019-02-02 11:20:29', '2019-02-02 11:20:29');

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
(1, '52000', 'BPS Provinsi NTB', NULL, 1, 2),
(2, '52510', 'Bagian Tata Usaha', '52000', 1, 3),
(3, '52511', 'Subbagian Bina Program', '52510', 1, 4),
(4, '52512', 'Subbagian Kepegawaian & Hukum', '52510', 1, 4),
(5, '52513', 'Subbagian Keuangan', '52510', 1, 4),
(6, '52514', 'Subbagian Umum', '52510', 1, 4),
(7, '52515', 'Subbagian Pengadaan Barang/Jasa', '52510', 1, 4),
(8, '52520', 'Bidang Statistik Sosial', '52000', 1, 3),
(9, '52521', 'Seksi Statistik Kependudukan', '52520', 1, 4),
(10, '52522', 'Seksi Statistik Ketahanan Sosial', '52520', 1, 4),
(11, '52523', 'Seksi Statistik Kesejahteraan Rakyat', '52520', 1, 4),
(12, '52530', 'Bidang Statistik Produksi', '52000', 1, 3),
(13, '52531', 'Seksi Statistik Pertanian', '52530', 1, 4),
(14, '52532', 'Seksi Statistik Industri', '52530', 1, 4),
(15, '52533', 'Seksi Statistik PEK', '52530', 1, 4),
(16, '52540', 'Bidang Statistik Distribusi', '52000', 1, 3),
(17, '52541', 'Seksi Statistik HK dan HPB', '52540', 1, 4),
(18, '52542', 'Seksi Statistik Keuangan Dan Harga Produsen', '52540', 1, 4),
(19, '52543', 'Seksi Statistik Niaga dan Jasa', '52540', 1, 4),
(20, '52550', 'Bidang NWAS', '52000', 1, 3),
(21, '52551', 'Seksi Neraca Produksi', '52550', 1, 4),
(22, '52552', 'Seksi Neraca Konsumsi', '52550', 1, 4),
(23, '52553', 'Seksi ALS', '52550', 1, 4),
(24, '52560', 'Bidang IPDS', '52000', 1, 3),
(25, '52561', 'Seksi IPDS', '52560', 1, 4),
(26, '52562', 'Seksi JRS', '52560', 1, 4),
(27, '52563', 'Seksi DLS', '52560', 1, 4);

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
(1, 'SuperAdmin', 'admin', NULL, NULL, '$2y$10$83CnH9qWgR8VUM4ksd0MOuHCmTWb23FI4B4m2meQr2RFEVlc.y/lO', 5, 5, '52000', '2019-02-02 14:19:47', '192.168.1.9', 'feSyefzKwhaUiY1KrntxYgBeaupJUhIIrtjrveVEmreQJb2QKOtEFWbhKa1L', NULL, '2019-02-02 06:19:47'),
(2, 'I Putu Dyatmika', 'mika', 'pdyatmika@gmail.com', NULL, '$2y$10$IQS7Zg6r6YdnoBODIepn.ebPxiwAtiobPWBVc.cd3RnNkxngmeqvS', 4, 5, '52560', '2019-02-02 23:48:24', '192.168.1.9', 'YAJ1tWk7z2W7q3ZsSfElR5eG86id8Awj3RuEVDRpxxjg80hRRzWYBXOaxlSY', '2019-02-02 01:42:57', '2019-02-02 15:48:24'),
(3, 'I Gusti Lanang Putra', 'lanang', NULL, NULL, '$2y$10$yaPJn5tf1/xhcZAy6nbgz.8UsB7e/OLjsmtK.UrfcGQOij.zSUMu2', 3, 3, '52550', '2019-02-02 14:10:14', '192.168.1.9', 'upDIRt6qKZD5iEH2tZCHJrabbwUDJPWtWAE4w5ApvGj1sDyhDADMGKHNAB2P', '2019-02-02 01:44:11', '2019-02-02 11:13:38'),
(4, 'Suntono', 'suntono', NULL, NULL, '$2y$10$iQwE2UXxQrw93T2RVhkP4uMmg4GJFV3dV8.3SNqf9.gu/YuksTB9e', 3, 4, '52000', '2019-02-02 09:46:35', '192.168.1.9', 'gGsUKdk8ZuIySPpcB04S7vmrfsmhGdY5klhJkvag3vs2azTXKYaZHZbQdqhc', '2019-02-02 01:46:20', '2019-02-02 11:13:46'),
(5, 'Anang Zakaria', 'anang', 'anangz@bps.go.id', NULL, '$2y$10$wNlcWp30QfOTQiD1LDc.ZOJLLs4uGD5AxpXo/07w15YHzHPmMlMaC', 3, 1, '52560', '2019-02-02 14:09:18', '192.168.1.9', '93bEoaNiqOXYpPTx2nHicZBof3o8XuZklEsoggrQm9MufpOdtRqSg6IN95bF', '2019-02-02 01:49:12', '2019-02-02 11:13:57'),
(6, 'Pande Dony Gumilar', 'dony', 'pande@dony.com', NULL, '$2y$10$kZlilHPVmtUquaGyPuaJuuXTGKFfEwcxyIlGVzZeun3mGGvBDVWz.', 2, 2, '52510', '2019-02-02 14:18:43', '192.168.1.9', 'pL3eWfUEdPk2lc3COr4vKlQmSdA0CzCtM7ytiS6D6NnWkTmyObsmHrBZLQGC', '2019-02-02 02:41:41', '2019-02-02 06:18:43');

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
  ADD UNIQUE KEY `pegawai_nip_baru_unique` (`nip_baru`),
  ADD UNIQUE KEY `pegawai_nip_lama_unique` (`nip_lama`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matrik`
--
ALTER TABLE `matrik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `m_gol`
--
ALTER TABLE `m_gol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
