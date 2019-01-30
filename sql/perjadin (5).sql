-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 06:13 PM
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
(1, 2019, '054.01.06.2895.004.100.524111', 'konsultasi bidang ipds dari provinsi ke bps ri', '15556000', '52520', 1, '2019-01-24 17:18:56', '2019-01-24 23:09:04'),
(2, 2019, '054.01.06.2895.006.100.524111', 'supervisi pencacahan lapangan oleh bps provinsi', '9255000', '52560', 1, '2019-01-24 17:26:57', '2019-01-24 23:08:55'),
(3, 2019, '051.01.06.2895.004.101.524111', 'pengawasan lapangan sakernas', '15000000', '52520', 1, '2019-01-24 23:17:31', '2019-01-24 23:17:31'),
(4, 2019, '054.01.06.2895.006.100.524111', 'perjalanan ke bumi datar', '90000000', '52510', 1, '2019-01-29 07:02:55', '2019-01-29 07:02:55');

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
(1, 2019, '2019-02-01', '2019-02-28', NULL, '5206', 3, '051.01.06.2895.004.101.524111', '15000000', '52520', 3, '440000', '1320000', '650000', 2, '500000', '1000000', '0', '3320000', NULL, 0, '2019-01-29 00:55:32', '2019-01-29 00:55:32'),
(2, 2019, '2019-02-01', '2019-04-30', NULL, '5205', 3, '051.01.06.2895.004.101.524111', '15000000', '52520', 3, '440000', '1320000', '600000', 2, '500000', '1000000', '0', '2920000', NULL, 0, '2019-01-29 04:15:31', '2019-01-29 04:15:31'),
(3, 2019, '2019-02-01', '2019-02-28', NULL, '5207', 3, '054.01.06.2895.006.100.524111', '9255000', '52560', 3, '440000', '1320000', '450000', 2, '550000', '1100000', '0', '2870000', NULL, 0, '2019-01-29 07:00:57', '2019-01-29 07:00:57');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_21_004344_create_tabel_pegawai', 1),
(4, '2019_01_21_005035_create_tabel_golongan', 1),
(5, '2019_01_21_023502_create_tabel_unitkerja', 1),
(7, '2019_01_24_113913_create_tujuan_table', 1),
(8, '2019_01_24_114428_create_pejabat_table', 1),
(9, '2019_01_24_115639_create_keuangan_table', 1),
(10, '2019_01_24_161516_tabel_program', 1),
(11, '2019_01_24_163329_tabel_akun', 1),
(12, '2019_01_25_083717_create_anggaran_table', 1),
(13, '2019_01_24_094219_create_matrik_perjalanan_table', 2);

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
(35, '11', 'I/a', 'JURU MUDA'),
(36, '12', 'I/b', 'JURU MUDA TINGKAT I'),
(37, '13', 'I/c', 'JURU'),
(38, '14', 'I/d', 'JURU TINGKAT I'),
(39, '21', 'II/a', 'PENGATUR MUDA'),
(40, '22', 'II/b', 'PENGATUR MUDA TINGKAT I'),
(41, '23', 'II/c', 'PENGATUR'),
(42, '24', 'II/d', 'PENGATUR TINGKAT I'),
(43, '31', 'III/a', 'PENATA MUDA'),
(44, '32', 'III/b', 'PENATA MUDA TINGKAT I'),
(45, '33', 'III/c', 'PENATA'),
(46, '34', 'III/d', 'PENATA TINGKAT I'),
(47, '41', 'IV/a', 'PEMBINA'),
(48, '42', 'IV/b', 'PEMBINA TINGKAT I'),
(49, '43', 'IV/c', 'PEMBINA UTAMA MUDA'),
(50, '44', 'IV/d', 'PEMBINA UTAMA MADYA'),
(51, '45', 'IV/e', 'PEMBINA UTAMA');

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
(1, '198203192004121002', '340017401', 'I Putu Dyatmika', '1982-03-19', 1, '34', '52563', 1, '2019-01-22 20:02:00', '2019-01-22 20:02:00'),
(2, '199209102014121001', '340057235', 'Wahyudi Septiawan', '1992-09-10', 1, '31', '52563', 2, '2019-01-22 20:19:37', '2019-01-23 17:28:25'),
(3, '198311032011011008', '340054408', 'Casslirais Surawan', '1983-11-03', 1, '32', '52562', 2, '2019-01-22 20:40:33', '2019-01-23 17:30:15'),
(4, '196602191994011001', '340014129', 'Suntono', '1966-02-19', 1, '43', '52000', 1, '2019-01-22 22:28:56', '2019-01-23 17:29:19'),
(5, '196704281989011001', '340012035', 'Anang Zakaria', '1967-04-28', 1, '34', '52560', 1, '2019-01-22 22:32:11', '2019-01-23 17:30:50');

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
(89, '511111', 'Belanja Gaji Pokok PNS'),
(90, '511119', 'Belanja Gaji Pembulatan PNS'),
(91, '511121', 'Belanja Tunjangan Suami Istri'),
(92, '511122', 'Belanja Tunjangan Anak PNS'),
(93, '511123', 'Belanja Tunjangan Struktural PNS'),
(94, '511124', 'Belanja Tunjangan Fungsional PNS'),
(95, '511125', 'Belanja Tunjangan PPh PNS'),
(96, '511126', 'Belanja Tunjangan Beras PNS'),
(97, '511129', 'Belanja Uang Makan PNS'),
(98, '511147', 'Belanja Belanja Tunj. Lain-lain termasuk Uang Duka PN Dalam dan Luar Negeri'),
(99, '511151', 'Belanja Tunjangan Umum PNS'),
(100, '512211', 'Belanja Uang Lembur'),
(101, '512411', 'Belanja Pegawai (Tunjangan Khusus/Kegiatan)'),
(102, '521111', 'Belanja Keperluan Perkantoran'),
(103, '521113', 'Belanja untuk Menambah Daya Tahan Tubuh'),
(104, '521114', 'Belanja Pengiriman Surat Dinas Pos Pusat'),
(105, '521115', 'Honor Operasional Satuan Kerja'),
(106, '521119', 'Belanja Barang Operasional Lainnya'),
(107, '521211', 'Belanja Bahan'),
(108, '521213', 'Honor Output Kegiatan'),
(109, '521219', 'Belanja Barang Non Operasional Lainnya'),
(110, '521811', 'Belanja Barang Persediaan Barang Konsumsi'),
(111, '522111', 'Belanja Langganan Listrik'),
(112, '522112', 'Belanja Langganan Telepon'),
(113, '522113', 'Belanja Langganan Air'),
(114, '522121', 'Belanja Jasa Pos dan Giro'),
(115, '522141', 'Belanja Sewa'),
(116, '522151', 'Belanja Jasa Profesi'),
(117, '522191', 'Belanja Jasa Lainnya'),
(118, '523111', 'Belanja Biaya Pemeliharaan Gedung dan Bangunan'),
(119, '523112', 'Belanja Barang Persediaan untuk Pemeliharaan Gedung dan Bangunan'),
(120, '523119', 'Belanja Biaya Pemeliharaan Gedung dan Bangunan Lainnya'),
(121, '523121', 'Belanja Biaya Pemeliharaan Peralatan dan Mesin'),
(122, '523123', 'Belanja Barang Persediaan Pemeliharaan Peralatan dan Mesin'),
(123, '524111', 'Belanja Perjalanan Biasa'),
(124, '524113', 'Belanja Perjalanan Dinas Dalam Kota'),
(125, '524114', 'Belanja Perjalanan Dinas Paket Meeting Dalam Kota'),
(126, '524119', 'Belanja Perjalanan Dinas Paket Meeting Luar Kota'),
(127, '531111', 'Belanja Modal Tanah'),
(128, '532111', 'Belanja Modal Peralatan dan Mesin'),
(129, '533111', 'Belanja Modal Gedung dan Bangunan'),
(130, '533113', 'Belanja Modal Upah Tenaga Kerja dan Honor Pengelola Teknis Gedung dan Bangunan'),
(131, '533115', 'Belanja Modal Perencanaan dan Pengawasan Gedung dan Bangunan'),
(132, '533121', 'Belanja Penambahan Nilai Gedung dan Bangunan');

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
(21, '5201', 'Kabupaten Lombok Barat', 'A n a s', '19641228 199103 1 004', '225000', NULL, NULL),
(22, '5202', 'Kabupaten Lombok Tengah', 'Syamsudin', '19651231 199103 1 012', '250000', NULL, NULL),
(23, '5203', 'Kabupaten Lombok Timur', 'Muhamad Saphoan', '19671231 199401 1 001', '300000', NULL, NULL),
(24, '5204', 'Kabupaten Sumbawa', 'Agus Alwi', '19641231 199103 1 022', '500000', NULL, NULL),
(25, '5205', 'Kabupaten Dompu', 'Peter Willem', '19651128 199202 1 001', '600000', NULL, NULL),
(26, '5206', 'Kabupaten Bima', 'S a p i r i n', '19661231 199401 1 002', '650000', NULL, NULL),
(27, '5207', 'Kabupaten Sumbawa Barat', 'Muhammad Ahyar', '19661231 199212 1 001', '450000', NULL, NULL),
(28, '5208', 'Kabupaten Lombok Utara', 'M u h a d i', '19661231 199401 1 001', '325000', NULL, NULL),
(29, '5271', 'Kota Mataram', 'I s a', '19680915 199112 1 001', '150000', NULL, NULL),
(30, '5272', 'Kota Bima', 'Joko Pitoyo Novarudin', '19751120 199712 1 002', '650000', NULL, NULL);

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
(55, '52000', 'BPS Provinsi NTB', NULL, 1, 2),
(56, '52510', 'Bagian Tata Usaha', '52000', 1, 3),
(57, '52511', 'Subbagian Bina Program', '52510', 1, 4),
(58, '52512', 'Subbagian Kepegawaian & Hukum', '52510', 1, 4),
(59, '52513', 'Subbagian Keuangan', '52510', 1, 4),
(60, '52514', 'Subbagian Umum', '52510', 1, 4),
(61, '52515', 'Subbagian Pengadaan Barang/Jasa', '52510', 1, 4),
(62, '52520', 'Bidang Statistik Sosial', '52000', 1, 3),
(63, '52521', 'Seksi Statistik Kependudukan', '52520', 1, 4),
(64, '52522', 'Seksi Statistik Ketahanan Sosial', '52520', 1, 4),
(65, '52523', 'Seksi Statistik Kesejahteraan Rakyat', '52520', 1, 4),
(66, '52530', 'Bidang Statistik Produksi', '52000', 1, 3),
(67, '52531', 'Seksi Statistik Pertanian', '52530', 1, 4),
(68, '52532', 'Seksi Statistik Industri', '52530', 1, 4),
(69, '52533', 'Seksi Statistik PEK', '52530', 1, 4),
(70, '52540', 'Bidang Statistik Distribusi', '52000', 1, 3),
(71, '52541', 'Seksi Statistik HK dan HPB', '52540', 1, 4),
(72, '52542', 'Seksi Statistik Keuangan Dan Harga Produsen', '52540', 1, 4),
(73, '52543', 'Seksi Statistik Niaga dan Jasa', '52540', 1, 4),
(74, '52550', 'Bidang NWAS', '52000', 1, 3),
(75, '52551', 'Seksi Neraca Produksi', '52550', 1, 4),
(76, '52552', 'Seksi Neraca Konsumsi', '52550', 1, 4),
(77, '52553', 'Seksi ALS', '52550', 1, 4),
(78, '52560', 'Bidang IPDS', '52000', 1, 3),
(79, '52561', 'Seksi IPDS', '52560', 1, 4),
(80, '52562', 'Seksi JRS', '52560', 1, 4),
(81, '52563', 'Seksi DLS', '52560', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_gol`
--
ALTER TABLE `m_gol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `id_akun` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `id_program` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
