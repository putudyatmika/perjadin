-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 04:04 PM
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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_01_21_004344_create_tabel_pegawai', 1),
(7, '2019_01_21_005035_create_tabel_golongan', 2),
(8, '2019_01_21_023502_create_tabel_unitkerja', 3);

-- --------------------------------------------------------

--
-- Table structure for table `m_gol`
--

CREATE TABLE `m_gol` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_gol`
--

INSERT INTO `m_gol` (`id`, `kode`, `pangkat`, `jabatan`) VALUES
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
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_lama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unitkerja`
--

CREATE TABLE `unitkerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` tinyint(3) UNSIGNED NOT NULL,
  `eselon` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unitkerja`
--

INSERT INTO `unitkerja` (`id`, `kode`, `nama`, `parent`, `jenis`, `eselon`, `created_at`, `updated_at`) VALUES
(29, '52000', 'BPS Provinsi Nusa Tenggara Barat', NULL, 1, 2, '2016-12-06 00:12:08', '2017-01-17 22:54:45'),
(30, '52510', 'Bagian Tata Usaha', '52000', 1, 3, '2016-12-06 01:35:55', '2017-01-17 22:54:45'),
(31, '52520', 'Bidang Statistik Sosial', '52000', 1, 3, '2016-12-06 01:36:50', '2017-01-17 22:54:45'),
(32, '52530', 'Bidang Statistik Produksi', '52000', 1, 3, '2016-12-06 01:37:57', '2017-01-17 22:54:45'),
(33, '52540', 'Bidang Statistik Distribusi', '52000', 1, 3, '2016-12-06 23:42:46', '2017-01-17 22:54:45'),
(34, '52550', 'Bidang Neraca Wilayah dan Analisis Statistik', '52000', 1, 3, '2016-12-06 23:42:25', '2017-01-17 22:54:45'),
(35, '52560', 'Bidang Integrasi Pengolahan Dan Diseminasi Statistik', '52000', 1, 3, '2016-12-06 01:34:35', '2017-01-17 22:54:45');

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
  ADD UNIQUE KEY `pegawai_nip_unique` (`nip`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_gol`
--
ALTER TABLE `m_gol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
