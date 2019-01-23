-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 05:02 PM
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
(5, '2019_01_21_023502_create_tabel_unitkerja', 1);

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
(1, '198203192004121002', '340017401', 'I Putu Dyatmika', '1982-03-19', 1, '34', '52563', 1, '2019-01-23 04:02:00', '2019-01-23 04:02:00'),
(2, '637466338438', '728371283', 'yudi wahyudi', '2000-03-03', 1, '12', '52512', 2, '2019-01-23 04:19:37', '2019-01-23 04:19:37'),
(3, '34274723', '2383422374', 'casslirais', '1999-11-11', 1, '31', '52523', 2, '2019-01-23 04:40:33', '2019-01-23 04:40:33'),
(4, '2332423423', '342252123', 'Suntono', '1965-01-22', 1, '43', '52000', 1, '2019-01-23 06:28:56', '2019-01-23 06:28:56'),
(5, '43252424234232', '234514141', 'Anang Zakaria', '1965-03-13', 1, '34', '52560', 1, '2019-01-23 06:32:11', '2019-01-23 06:32:11'),
(6, '198272312782378127', '3400017623', 'Sukri', '1978-05-20', 1, '34', '52562', 1, '2019-01-23 08:44:04', '2019-01-23 08:44:04');

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
(1, '52000', 'BPS Provinsi Nusa Tenggara Barat', NULL, 1, 2),
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
(15, '52533', 'Seksi Statistik Pertambangan, Energi dan Konstruksi', '52530', 1, 4),
(16, '52540', 'Bidang Statistik Distribusi', '52000', 1, 3),
(17, '52541', 'Seksi Statistik Harga Konsumen dan Harga Perdagangan Besar', '52540', 1, 4),
(18, '52542', 'Seksi Statistik Keuangan Dan Harga Produsen', '52540', 1, 4),
(19, '52543', 'Seksi Statistik Niaga dan Jasa', '52540', 1, 4),
(20, '52550', 'Bidang Neraca Wilayah dan Analisis Statistik', '52000', 1, 3),
(21, '52551', 'Seksi Neraca Produksi', '52550', 1, 4),
(22, '52552', 'Seksi Neraca Konsumsi', '52550', 1, 4),
(23, '52553', 'Seksi Analisis Statistik Lintas Sektoral', '52550', 1, 4),
(24, '52560', 'Bidang Integrasi Pengolahan Dan Diseminasi Statistik', '52000', 1, 3),
(25, '52561', 'Seksi Integrasi Pengolahan Data', '52560', 1, 4),
(26, '52562', 'Seksi Jaringan dan Rujukan Statistik', '52560', 1, 4),
(27, '52563', 'Seksi Diseminasi dan Layanan Statistik', '52560', 1, 4);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_gol`
--
ALTER TABLE `m_gol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
