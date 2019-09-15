-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2019 at 06:27 PM
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
  `pagu_utama` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rencana_pagu` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `realisasi_pagu` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitkerja` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `tahun_anggaran`, `mak`, `uraian`, `pagu_utama`, `rencana_pagu`, `realisasi_pagu`, `unitkerja`, `status`, `created_at`, `updated_at`) VALUES
(1, 2019, '054.01.01.2886.970.051.524111', ' Perjalanan ke DJPB', '7330000', '7330000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:58'),
(2, 2019, '054.01.01.2886.970.052.524111', ' Perjalanan ke Kabupaten Kota', '11849000', '11849000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:58'),
(3, 2019, '054.01.01.2886.970.054.524111', ' Perjalanan  dalam rangka administrasi kepegawaian', '8310000', '8310000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:58'),
(4, 2019, '054.01.01.2886.970.054.524111', ' Biaya trasnport calon KSKP', '2040000', '2040000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:58'),
(5, 2019, '054.01.01.2886.970.054.524111', ' Uang Harian Perjalanan calon KSKP dari pulau Sumbawa', '2640000', '2640000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:58'),
(6, 2019, '054.01.01.2886.970.054.524111', ' Uang Harian Perjalanan calon KSKP dari Pulau Lombok', '1320000', '1320000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:58'),
(7, 2019, '054.01.01.2886.970.054.524111', ' Biaya Penginapan calon KSKP dari Pulau Sumbawa (2 malam)', '1200000', '1200000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:58'),
(8, 2019, '054.01.01.2886.970.055.524111', ' Perjalanan  dalam rangka administrasi BMN', '14020000', '14020000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(9, 2019, '054.01.01.2886.994.002.E.524111', ' Pengawasan prop ke kab/kota', '28900000', '28900000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(10, 2019, '054.01.01.2886.994.002.E.524111', ' Konsultasi pimpinan BPS propinsi ke BPS pusat', '92256000', '92256000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(11, 2019, '054.01.01.2886.994.002.E.524111', ' Perjalanan penyusunan PAK SP2020', '8000000', '8000000', NULL, '52510', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(12, 2019, '054.01.06.2895.004.100.524111', ' konsultasi bidang ipds dari provinsi ke bps ri', '15556000', '15556000', NULL, '52560', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(13, 2019, '054.01.06.2895.006.100.524111', ' supervisi pencacahan lapangan oleh bps provinsi', '9255000', '9255000', NULL, '52520', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(14, 2019, '054.01.06.2895.006.101.524111', ' konsultasi kepala seksi statistik kependudukan ke bps pusat', '7778000', '7778000', NULL, '52520', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(15, 2019, '054.01.06.2895.006.101.524111', ' supervisi pencacahan lapangan oleh bps provinsi', '9255000', '9255000', NULL, '52520', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(16, 2019, '054.01.06.2895.009.051.524111', ' biaya pengawasan lapangan dari provinsi ke kab/kota', '15425000', '15425000', NULL, '52520', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(17, 2019, '054.01.06.2895.009.051.524111', ' konsultasi bidang statistik sosial dari provinsi ke bps ri', '7778000', '7778000', NULL, '52520', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(18, 2019, '054.01.06.2895.009.205.524111', ' biaya pengawasan lapangan dari bps provinsi ke kabupaten/kota', '15425000', '15425000', NULL, '52520', 1, '2019-09-12 13:55:15', '2019-09-12 13:55:59'),
(19, 2019, '054.01.06.2895.010.200.524111', ' konsultasi seksi hansos ke bps pusat', '7778000', '7778000', NULL, '52520', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(20, 2019, '054.01.06.2895.011.602.524111', ' perjalanan supervisi provinsi updating infrastruktur', '19409000', '19409000', NULL, '52520', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(21, 2019, '054.01.06.2895.011.602.524111', ' konsultasi bidang statistik sosial dari provinsi ke bps ri', '7743000', '7743000', NULL, '52520', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(22, 2019, '054.01.06.2895.014.051.524111', ' pengawasan administrasi bps propinsi ke bps kab/kota', '3085000', '3085000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(23, 2019, '054.01.06.2895.014.051.524111', ' pengawasan serta revisit bps propinsi ke bps kab/kota', '9255000', '9255000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(24, 2019, '054.01.06.2895.014.100.524111', ' perjalanan dinas supervisi provinsi ke kabupaten', '12340000', '12340000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(25, 2019, '054.01.06.2895.014.200.524111', ' pengawasan bps prov ke kab/kota', '6170000', '6170000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(26, 2019, '054.01.06.2895.015.051.524111', ' pengendalian pelaksanaan survei ibs bulanan dari prov ke kab/kota', '6170000', '6170000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(27, 2019, '054.01.06.2895.015.051.524111', ' konsultasi bidang produksi dari provinsi ke bps ri', '18564000', '18564000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(28, 2019, '054.01.06.2895.015.052.524111', ' pengendalian kegiatan lapangan dari provinsi ke kab', '9255000', '9255000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(29, 2019, '054.01.06.2895.015.100.524111', ' pengawasan vimk 2019 tahunan bps provinsi', '6170000', '6170000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(30, 2019, '054.01.06.2895.015.100.524111', ' perjalanan rekonsiliasi keg industri, pertambangan, energi, dan konstruksi', '4100000', '4100000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(31, 2019, '054.01.06.2895.015.101.524111', ' pengawasan vimk 2019 triwulanan bps provinsi', '12435000', '12435000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(32, 2019, '054.01.06.2895.015.101.524111', ' pengawasan administrasi vimk19 triwulanan bps provinsi ke kabupaten kota', '12340000', '12340000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:00'),
(33, 2019, '054.01.06.2895.015.301.524111', ' perjalanan dinas supervisi dari provinsi ke kabupaten/kota', '6170000', '6170000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(34, 2019, '054.01.06.2895.015.301.524111', ' konsultasi statistik pertambangan dan konstruksi dari provinsi ke bps ri', '7778000', '7778000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(35, 2019, '054.01.06.2895.016.200.524111', 'pengawasan administrasi bps provinsi ke kabupaten/kota', '2604100', '2604100', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-14 02:40:57'),
(36, 2019, '054.01.06.2895.016.200.524111', 'pengawasan bps provinsi ke kab/kota', '6650900', '6650900', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-14 02:39:02'),
(37, 2019, '054.01.06.2895.016.200.524111', ' konsultasi seksi niaga dan jasa dari provinsi ke bps ri', '7778000', '7778000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(38, 2019, '054.01.06.2895.016.201.524111', ' pengawasan administrasi bps provinsi ke kabupaten/kota', '3085000', '3085000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(39, 2019, '054.01.06.2895.016.201.524111', ' perjalanan dinas dalam rangka pengawasan lapangan survei pola distribusi tahun 2019 dari bps provinsi ke kabupaten', '6170000', '6170000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(40, 2019, '054.01.06.2895.016.203.524111', ' pengawasan bps provinsi ke kab/kota', '3085000', '3085000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(41, 2019, '054.01.06.2895.016.301.524111', ' pengawasan pelaksanaan proyek bps propinsi ke bps kab/kota', '3085000', '3085000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(42, 2019, '054.01.06.2895.017.910.524111', ' perjalanan dinas dalam rangka pengawasan bps provinsi ke kabupaten', '3085000', '3085000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(43, 2019, '054.01.06.2895.017.910.524111', ' transport lokal praktek lapangan pelatihan petugas PAW', '1650000', '1650000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(44, 2019, '054.01.06.2895.018.920.524111', ' perjalanan dinas pengawasan lapangan dari bps provinsi ke bps kabupaten dalam rangka updating direktori pasar', '3085000', '3085000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(45, 2019, '054.01.06.2895.020.051.524111', ' pengawasan lapangan dari provinsi ke kabupaten/kota', '6170000', '6170000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(46, 2019, '054.01.06.2895.020.101.524111', ' perjalanan pengawasan kegiatan teknis bps provinsi ke bps kabupaten/kota', '9255000', '9255000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(47, 2019, '054.01.06.2895.020.200.524111', ' perjalanan supervisi dan konsultasi di daerah', '9255000', '9255000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:01'),
(48, 2019, '054.01.06.2895.020.200.524111', ' konsultasi seksi harga konsumen dan hpb ke bps pusat', '7778000', '7778000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(49, 2019, '054.01.06.2895.020.300.524111', ' supervisi survei harga perdesaan dari provinsi ke kabupaten', '3085000', '3085000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(50, 2019, '054.01.06.2895.022.903.524111', ' Perjalanan supervisi prov ke kab/kota', '2600000', '2600000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(51, 2019, '054.01.06.2895.023.051.524111', ' konsultasi teknis seksi keuangan dari provinsi ke pusat', '7778000', '7778000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(52, 2019, '054.01.06.2895.023.100.524111', ' pengawasan pelaksanaan proyek bps propinsi ke bps kab/kota', '6170000', '6170000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(53, 2019, '054.01.06.2895.023.200.524111', ' pengawasan pelaksanaan proyek bps propinsi ke bps kab/kota', '9255000', '9255000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(54, 2019, '054.01.06.2895.024.301.524111', ' konsultasi seksi neraca produksi dari provinsi ke bps ri', '7778000', '7778000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(55, 2019, '054.01.06.2895.024.301.524111', ' supervisi survei khusus neraca produksi dari provinsi ke kabupaten/kota', '3085000', '3085000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(56, 2019, '054.01.06.2895.024.301.524111', ' Konregwil Jabalnusra ke Bandung', '25560000', '25560000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(57, 2019, '054.01.06.2895.025.302.524111', ' pengawasan ke kab/kota dalam rangka penyusunan pdrb kab/kota', '7379000', '7379000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(58, 2019, '054.01.06.2895.025.302.524111', ' konsultasi seksi neraca konsumsi dari provinsi ke bps ri', '7778000', '7778000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(59, 2019, '054.01.06.2895.026.051.524111', ' konsultasi kepala seksi analisis lintas sektor ke bps pusat', '7778000', '7778000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(60, 2019, '054.01.06.2895.027.051.524111', ' pengawasan pelaksanaan kegiatan bps provinsi ke bps kab/kota', '9255000', '9255000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(61, 2019, '054.01.06.2895.028.100.524111', ' konsultasi teknis seksi pertanian dari provinsi ke bps', '2900000', '2900000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(62, 2019, '054.01.06.2895.028.100.524111', ' pengawasan pelaksanaan kegiatan hortikultura dari bps provinsi ke kab/kota', '6333000', '6333000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(63, 2019, '054.01.06.2895.028.102.524111', ' perjalanan supervisi provinsi', '12340000', '12340000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(64, 2019, '054.01.06.2895.028.200.524111', ' perjalanan dinas pengawasan pelaksanaan survei dari propinsi ke kabupaten', '3085000', '3085000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(65, 2019, '054.01.06.2895.029.100.524111', ' konsultasi teknis harga dari provinsi ke pusat', '7778000', '7778000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(66, 2019, '054.01.06.2895.029.100.524111', ' perjalanan pengawasan administrasi bps provinsi ke bps kabupaten/kota', '3085000', '3085000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(67, 2019, '054.01.06.2895.029.100.524111', ' perjalanan pengawasan bps provinsi ke bps kabupaten/kota', '9255000', '9255000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(68, 2019, '054.01.06.2895.032.503.524111', ' Monitoring teknis pemetaan dan pemutakhiran BS Provinsi ke Kab/Kota', '43916000', '43916000', NULL, '52560', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:02'),
(69, 2019, '054.01.06.2895.032.503.524111', ' Supervisi pelatihan pemetaan BPS Prov ke Kab/Kota', '23989000', '23989000', NULL, '52560', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(70, 2019, '054.01.06.2895.032.503.524111', ' Pemanggilan Kepala Kab/Kota dalam rangka persiapan pemetaan', '17143000', '17143000', NULL, '52560', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(71, 2019, '054.01.06.2895.034.500.524111', ' Perjalanan dalam rangka supervisi dari provinsi ke kabupaten/kota', '15640000', '15640000', NULL, '52560', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(72, 2019, '054.01.06.2895.034.500.524111', ' Perjalanan dalam rangka in depth study PMTB', '23600000', '23600000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(73, 2019, '054.01.06.2895.034.500.524111', ' Perjalanan dalam rangka Rekonsiliasi Final PMTB Nasional', '34124000', '34124000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(74, 2019, '054.01.06.2895.034.500.524111', ' Perjalanan dalam rangka konsultasi PMTB Jabalnusra', '7733000', '7733000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(75, 2019, '054.01.06.2895.034.500.524111', ' Perjalanan dalam rangka operasional daerah sulit KLU dan Lobar', '1250000', '1250000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(76, 2019, '054.01.06.2895.035.500.524111', ' perjalanan dinas dari provinsi ke kabupaten/kota', '6170000', '6170000', NULL, '52540', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(77, 2019, '054.01.06.2895.038.054.524111', ' pengawasan provinsi ke kab/kota', '15425000', '15425000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(78, 2019, '054.01.06.2895.040.502.524111', ' Perjalanan supervisi SKIO', '10800000', '10800000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(79, 2019, '054.01.06.2895.040.502.524111', ' Perjalanan FGD SKIO', '9000000', '9000000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(80, 2019, '054.01.06.2895.040.502.524111', ' Perjalanan Indept Study IRIO', '12044000', '12044000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(81, 2019, '054.01.06.2895.040.502.524111', ' Perjalanan konsultasi penyusunan irio ke pusat', '7778000', '7778000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(82, 2019, '054.01.06.2895.040.502.524111', ' Perjalanan konsultasi penyusunan irio jabalnusra', '7778000', '7778000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(83, 2019, '054.01.06.2895.040.502.524111', ' Peserta tambahan rekonsiliasi IRIO Nasional', '7778000', '7778000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(84, 2019, '054.01.06.2895.026.051.524113', ' Translok pendataan STB provinsi', '600000', '600000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(85, 2019, '054.01.06.2895.038.054.524119', ' perjalanan antar wilayah pelatihan innas tambahan ksa jagung', '5200000', '5200000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(86, 2019, '054.01.06.2895.024.301.524113', ' petugas organik inventarisasi data sekunder sektor barang dan jasa regional provinsi', '540000', '540000', NULL, '52550', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:03'),
(87, 2019, '054.01.06.2895.032.503.524119', ' Transport Rapat Pimpinan BPS Provinsi', '42840000', '42840000', NULL, '52560', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:04'),
(88, 2019, '054.01.06.2895.032.503.524119', ' Perjalanan Rapat Teknis Kepala BPS Kabupaten/Kota', '34870000', '34870000', NULL, '52560', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:04'),
(89, 2019, '054.01.06.2895.032.503.524119', ' Perjalanan Rapimkab ke Bali', '10000000', '10000000', NULL, '52560', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:04'),
(90, 2019, '054.01.06.2895.032.503.524119', ' Rekonsiliasi Hasil Pengolahan Peta Digital dan Entri RD SP2020 ke BPS RI', '9322000', '9322000', NULL, '52560', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:04'),
(91, 2019, '054.01.06.2895.028.100.524119', ' perjalanan antar wilayah pembahasan ATAP Perkebunan di Batam', '7800000', '7800000', NULL, '52530', 1, '2019-09-12 13:55:15', '2019-09-12 13:56:04'),
(92, 2019, '054.01.02.2891.951.054.533111', 'Pengelolaan kegiatan pembangunan gedung kantor', '149168000', '149168000', NULL, '52510', 1, '2019-09-14 01:51:04', '2019-09-14 01:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` tinyint(2) NOT NULL,
  `nama_bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Jan'),
(2, 'Feb'),
(3, 'Mar'),
(4, 'Apr'),
(5, 'Mei'),
(6, 'Jun'),
(7, 'Jul'),
(8, 'Ags'),
(9, 'Sep'),
(10, 'Okt'),
(11, 'Nov'),
(12, 'Des');

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
  `tahun_kuitansi` year(4) DEFAULT NULL,
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

INSERT INTO `kuitansi` (`kuitansi_id`, `trx_id`, `tahun_kuitansi`, `total_biaya`, `tgl_kuitansi`, `harian_rupiah`, `harian_lama`, `harian_total`, `hotel_rupiah`, `hotel_lama`, `hotel_total`, `hotel_flag`, `transport_rupiah`, `transport_ket`, `transport_flag`, `rill1_ket`, `rill1_rupiah`, `rill1_flag`, `rill2_ket`, `rill2_rupiah`, `rill2_flag`, `rill3_ket`, `rill3_rupiah`, `rill3_flag`, `rill_total`, `bendahara_nip`, `bendahara_nama`, `flag_kuitansi`, `created_at`, `updated_at`) VALUES
(1, 1, 2019, '2820000', '2019-09-20', '440000', 3, '1320000', '500000', 2, '1000000', 1, '500000', 'Transport dari Mataram ke Kabupaten Sumbawa', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '500000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-09-14 08:54:55', '2019-09-14 09:19:20'),
(2, 2, 2019, '740000', '2019-09-20', '440000', 1, '440000', '0', 0, '0', 0, '300000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '300000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-09-14 09:16:27', '2019-09-14 09:18:28'),
(3, 3, 2019, '3920000', '2019-09-20', '440000', 3, '1320000', '500000', 2, '1000000', 1, '1300000', 'Transport dari Mataram ke Kota Bima', 1, 'Taksi Bandara PP', '300000', 1, NULL, NULL, 0, NULL, NULL, 0, '300000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-09-14 09:22:39', '2019-09-14 09:23:33');

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
  `dana_tid` int(10) UNSIGNED DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `matrik`
--

INSERT INTO `matrik` (`id`, `tahun_matrik`, `tgl_awal`, `tgl_akhir`, `kodekab_tujuan`, `lamanya`, `mak_id`, `dana_tid`, `dana_mak`, `dana_pagu`, `dana_unitkerja`, `lama_harian`, `dana_harian`, `total_harian`, `dana_transport`, `lama_hotel`, `dana_hotel`, `total_hotel`, `pengeluaran_rill`, `total_biaya`, `unit_pelaksana`, `flag_matrik`, `created_at`, `updated_at`) VALUES
(1, 2019, '2019-09-01', '2019-09-30', '5204', 3, 66, 66, '054.01.06.2895.029.100.524111', '3085000', '52540', 3, '440000', '1320000', '500000', 2, '500000', '1000000', '0', '2820000', '52540', 5, '2019-09-14 08:51:52', '2019-09-14 08:54:41'),
(2, 2019, '2019-09-09', '2019-09-30', '5203', 1, 91, 91, '054.01.06.2895.028.100.524119', '7800000', '52530', 1, '440000', '440000', '300000', 0, '0', '0', '0', '740000', '52530', 5, '2019-09-14 09:15:22', '2019-09-14 09:16:18'),
(3, 2019, '2019-09-01', '2019-09-30', '5272', 3, 76, 76, '054.01.06.2895.035.500.524111', '6170000', '52540', 3, '440000', '1320000', '1300000', 2, '500000', '1000000', '0', '3620000', '52540', 5, '2019-09-14 09:21:26', '2019-09-14 09:22:26');

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
(21, '2019_02_28_222105_tabel_kuitansi', 6),
(22, '2019_08_27_151549_tahun_dasar', 7);

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
(16, '19731225 201406 1 001', 'Heri Suria Wirawan', '1973-12-25', 1, '22', '52515', 4, 0, 1, '2019-03-07 10:09:52', '2019-09-15 03:07:10'),
(17, '19780505 200012 2 001', 'Baiq Kurniawati', '1978-05-05', 2, '41', '52511', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 04:02:07'),
(18, '19781227 199912 1 001', 'I Putu Yudhistira', '1978-12-27', 1, '32', '52511', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 03:54:48'),
(19, '19850801 200801 2 005', 'Rika Verlita', '1985-08-01', 2, '32', '52511', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 03:55:01'),
(20, '19681231 198903 1 013', 'I Wayan Wirjan', '1968-12-31', 1, '32', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(21, '19641231 200701 1 038', 'Muslimin', '1964-12-31', 1, '23', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(22, '19751231 200701 1 009', 'Rosidi', '1975-12-31', 1, '21', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(23, '19861231 200604 2 001', 'Baiq Yeni Sulistiana', '1986-12-31', 2, '31', '52514', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-11 04:03:04'),
(24, '19810724 201101 1 011', 'Achmad Gunawan', '1981-07-24', 1, '31', '52514', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(25, '19850102 200902 2 004', 'Ratna Asih Wulandari', '1985-01-02', 2, '32', '52521', 4, 0, 1, '2019-03-07 10:09:52', '2019-03-30 03:30:28'),
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
(74, '19920910 201412 1 001', 'Wahyudi Septiawan', '1992-09-10', 1, '31', '52563', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(76, '19700723 199211 1 001', 'Roedi Joelianto', '1970-07-23', 1, '34', '52551', 3, 0, 0, '2019-04-02 01:33:40', '2019-04-02 01:33:40'),
(77, '19930206 201412 1 001', 'Ahmad Faisal', '1993-02-06', 1, '32', '52542', 4, 0, 1, '2019-09-15 03:09:32', '2019-09-15 03:09:32'),
(78, '19940306 201602 2 001', 'Ayu Rosita Sari', '1994-03-06', 2, '31', '52511', 4, 0, 1, '2019-09-15 03:21:20', '2019-09-15 03:21:20');

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
  `tahun_spd` year(4) NOT NULL,
  `kendaraan` tinyint(1) NOT NULL DEFAULT '1',
  `ppk_nip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppk_nama` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_ttd` tinyint(1) DEFAULT '0',
  `flag_spd` tinyint(1) NOT NULL DEFAULT '0',
  `flag_cetak_tujuan` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spd`
--

INSERT INTO `spd` (`spd_id`, `trx_id`, `nomor_spd`, `tahun_spd`, `kendaraan`, `ppk_nip`, `ppk_nama`, `flag_ttd`, `flag_spd`, `flag_cetak_tujuan`, `created_at`, `updated_at`) VALUES
(1, 1, 'B-001/BPS/52514/9/2019', 2019, 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-09-14 08:54:11', '2019-09-14 09:19:21'),
(2, 2, 'B-002/BPS/52514/9/2019', 2019, 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-09-14 09:16:03', '2019-09-14 09:18:29'),
(3, 3, 'B-003/BPS/52514/9/2019', 2019, 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-09-14 09:22:14', '2019-09-14 09:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `surattugas`
--

CREATE TABLE `surattugas` (
  `srt_id` int(10) UNSIGNED NOT NULL,
  `trx_id` int(11) UNSIGNED NOT NULL,
  `tahun_srt` year(4) NOT NULL,
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

INSERT INTO `surattugas` (`srt_id`, `trx_id`, `tahun_srt`, `nomor_surat`, `tgl_surat`, `ttd_nip`, `ttd_jabatan`, `ttd_nama`, `flag_ttd`, `flag_surattugas`, `srt_ket`, `created_at`, `updated_at`) VALUES
(1, 1, 2019, 'B-001/BPS/52510/9/2019', '2019-09-13', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-09-14 08:54:11', '2019-09-14 09:19:21'),
(2, 2, 2019, 'B-002/BPS/52510/9/2019', '2019-09-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-09-14 09:16:03', '2019-09-14 09:18:28'),
(3, 3, 2019, 'B-003/BPS/52510/9/2019', '2019-09-13', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 2, 2, NULL, '2019-09-14 09:22:13', '2019-09-14 09:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_dasar`
--

CREATE TABLE `tahun_dasar` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_dasar`
--

INSERT INTO `tahun_dasar` (`id`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 2019, '2019-08-29 13:52:24', '2019-08-29 13:52:24'),
(3, 2018, '2019-08-31 14:48:44', '2019-08-31 14:48:44'),
(7, 2020, '2019-08-31 15:13:10', '2019-08-31 15:13:10');

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
  `tahun_trx` year(4) NOT NULL,
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

INSERT INTO `transaksi` (`trx_id`, `kode_trx`, `matrik_id`, `tahun_trx`, `peg_nip`, `bnyk_hari`, `tgl_brkt`, `tgl_balik`, `tugas`, `kabid_konfirmasi`, `kabid_ket`, `ppk_konfirmasi`, `ppk_ket`, `kpa_konfirmasi`, `kpa_ket`, `flag_trx`, `created_at`, `updated_at`) VALUES
(1, 'WL05GZ', 1, 2019, '19781227 199912 1 001', 3, '2019-09-16', '2019-09-18', 'Pengawasan bla bla bla', 1, NULL, 1, NULL, 1, NULL, 7, '2019-09-14 08:52:12', '2019-09-14 09:19:21'),
(2, 'FY0DH0', 2, 2019, '19800807 200710 1 001', 1, '2019-09-17', '2019-09-17', 'Pengawasan ble ble ble', 1, NULL, 1, NULL, 1, NULL, 7, '2019-09-14 09:15:30', '2019-09-14 09:18:28'),
(3, 'KCUUK3', 3, 2019, '19860614 200902 2 009', 3, '2019-09-16', '2019-09-18', 'pengawasan inflasi dan pesawat', 1, NULL, 1, NULL, 1, NULL, 7, '2019-09-14 09:21:33', '2019-09-14 09:23:33');

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
(2, '5202', 'Kabupaten Lombok Tengah', 'Syamsudin', '19651231 199103 1 012', '265000', NULL, '2019-04-18 07:32:18'),
(3, '5203', 'Kabupaten Lombok Timur', 'Muhamad Saphoan', '19671231 199401 1 001', '300000', NULL, NULL),
(4, '5204', 'Kabupaten Sumbawa', 'Agus Alwi', '19641231 199103 1 022', '500000', NULL, NULL),
(5, '5205', 'Kabupaten Dompu', 'Peter Willem', '19651128 199202 1 001', '600000', NULL, NULL),
(6, '5206', 'Kabupaten Bima', 'S a p i r i n', '19661231 199401 1 002', '700000', NULL, '2019-04-18 07:31:59'),
(7, '5207', 'Kabupaten Sumbawa Barat', 'Muhammad Ahyar', '19661231 199212 1 001', '450000', NULL, NULL),
(8, '5208', 'Kabupaten Lombok Utara', 'M u h a d i', '19661231 199401 1 001', '325000', NULL, NULL),
(9, '5271', 'Kota Mataram', 'I s a', '19680915 199112 1 001', '150000', NULL, NULL),
(10, '5272', 'Kota Bima', 'Joko Pitoyo Novarudin', '19751120 199712 1 002', '700000', NULL, '2019-04-18 07:31:51'),
(11, '3100', 'Jakarta', NULL, NULL, NULL, '2019-02-02 11:20:15', '2019-04-18 07:33:53'),
(13, '1600', 'Palembang', NULL, NULL, NULL, NULL, NULL),
(14, '3372', 'Kota Surakarta', NULL, NULL, NULL, '2019-04-18 07:32:54', '2019-09-08 13:21:44'),
(15, '5299', 'Kabupaten/Kota se-Pulau Sumbawa', NULL, NULL, NULL, '2019-04-18 07:33:43', '2019-04-18 08:11:11'),
(16, '5100', 'Denpasar', NULL, NULL, NULL, '2019-09-08 13:20:23', '2019-09-08 13:20:23'),
(18, '3273', 'Kota Bandung', NULL, NULL, NULL, '2019-09-08 13:22:46', '2019-09-08 13:22:46'),
(19, '3173', 'Badan Pusat Statistik Republik Indonesia', NULL, NULL, NULL, '2019-09-08 13:23:53', '2019-09-08 13:23:53'),
(20, '3578', 'Kota Surabaya', NULL, NULL, NULL, '2019-09-08 13:24:21', '2019-09-08 13:24:21'),
(21, '7371', 'Kota Makassar', NULL, NULL, NULL, '2019-09-08 13:24:49', '2019-09-08 13:24:49'),
(22, '3374', 'Kota Semarang', NULL, NULL, NULL, '2019-09-08 13:25:16', '2019-09-08 13:25:16'),
(23, '3274', 'Kota Cirebon', NULL, NULL, NULL, '2019-09-08 13:25:48', '2019-09-08 13:25:48'),
(24, '2171', 'Kota Batam', NULL, NULL, NULL, '2019-09-08 13:26:18', '2019-09-08 13:26:18'),
(25, '5298', 'Kabupaten Dompu dan Kabupaten Bima', NULL, NULL, NULL, '2019-09-08 14:24:11', '2019-09-08 14:24:11'),
(26, '5297', 'Kabupaten Sumbawa dan Bima', NULL, NULL, NULL, '2019-09-08 14:26:20', '2019-09-08 14:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `turunan_anggaran`
--

CREATE TABLE `turunan_anggaran` (
  `t_id` int(10) UNSIGNED NOT NULL,
  `a_id` int(10) UNSIGNED NOT NULL,
  `unit_pelaksana` varchar(5) NOT NULL,
  `pagu_awal` varchar(15) DEFAULT NULL,
  `pagu_rencana` varchar(15) DEFAULT NULL,
  `pagu_realisasi` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turunan_anggaran`
--

INSERT INTO `turunan_anggaran` (`t_id`, `a_id`, `unit_pelaksana`, `pagu_awal`, `pagu_rencana`, `pagu_realisasi`, `created_at`, `updated_at`) VALUES
(1, 1, '52510', '7330000', NULL, NULL, '2019-09-12 13:55:58', '2019-09-12 13:55:58'),
(2, 2, '52510', '11849000', NULL, NULL, '2019-09-12 13:55:58', '2019-09-12 13:55:58'),
(3, 3, '52510', '8310000', NULL, NULL, '2019-09-12 13:55:58', '2019-09-12 13:55:58'),
(4, 4, '52510', '2040000', NULL, NULL, '2019-09-12 13:55:58', '2019-09-12 13:55:58'),
(5, 5, '52510', '2640000', NULL, NULL, '2019-09-12 13:55:58', '2019-09-12 13:55:58'),
(6, 6, '52510', '1320000', NULL, NULL, '2019-09-12 13:55:58', '2019-09-12 13:55:58'),
(7, 7, '52510', '1200000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(8, 8, '52510', '14020000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(9, 9, '52510', '28900000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(10, 10, '52510', '92256000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(11, 11, '52510', '8000000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(12, 12, '52560', '15556000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(13, 13, '52520', '9255000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(14, 14, '52520', '7778000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(15, 15, '52520', '9255000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(16, 16, '52520', '15425000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(17, 17, '52520', '7778000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(18, 18, '52520', '15425000', NULL, NULL, '2019-09-12 13:55:59', '2019-09-12 13:55:59'),
(19, 19, '52520', '7778000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(20, 20, '52520', '19409000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(21, 21, '52520', '7743000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(22, 22, '52530', '3085000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(23, 23, '52530', '9255000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(24, 24, '52530', '12340000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(25, 25, '52530', '6170000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(26, 26, '52530', '6170000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(27, 27, '52530', '18564000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(28, 28, '52530', '9255000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(29, 29, '52530', '6170000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(30, 30, '52530', '4100000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(31, 31, '52530', '12435000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(32, 32, '52530', '12340000', NULL, NULL, '2019-09-12 13:56:00', '2019-09-12 13:56:00'),
(33, 33, '52530', '6170000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(34, 34, '52530', '7778000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(35, 35, '52540', '2604100', NULL, NULL, '2019-09-12 13:56:01', '2019-09-14 02:40:20'),
(36, 36, '52540', '6650900', NULL, NULL, '2019-09-12 13:56:01', '2019-09-14 02:39:02'),
(37, 37, '52540', '7778000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(38, 38, '52540', '3085000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(39, 39, '52540', '6170000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(40, 40, '52540', '3085000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(41, 41, '52540', '3085000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(42, 42, '52540', '3085000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(43, 43, '52540', '1650000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(44, 44, '52540', '3085000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(45, 45, '52540', '6170000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(46, 46, '52540', '9255000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(47, 47, '52540', '9255000', NULL, NULL, '2019-09-12 13:56:01', '2019-09-12 13:56:01'),
(48, 48, '52540', '7778000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(49, 49, '52540', '3085000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(50, 50, '52540', '2600000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(51, 51, '52540', '7778000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(52, 52, '52540', '6170000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(53, 53, '52540', '9255000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(54, 54, '52550', '7778000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(55, 55, '52550', '3085000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(56, 56, '52550', '25560000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(57, 57, '52550', '7379000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(58, 58, '52550', '7778000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(59, 59, '52550', '7778000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(60, 60, '52530', '9255000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(61, 61, '52530', '2900000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(62, 62, '52530', '6333000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(63, 63, '52530', '12340000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(64, 64, '52530', '3085000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(65, 65, '52540', '7778000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(66, 66, '52540', '3085000', '2820000', NULL, '2019-09-12 13:56:02', '2019-09-14 08:51:53'),
(67, 67, '52540', '9255000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(68, 68, '52560', '43916000', NULL, NULL, '2019-09-12 13:56:02', '2019-09-12 13:56:02'),
(69, 69, '52560', '23989000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(70, 70, '52560', '17143000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(71, 71, '52560', '15640000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(72, 72, '52550', '23600000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(73, 73, '52550', '34124000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(74, 74, '52550', '7733000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(75, 75, '52550', '1250000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(76, 76, '52540', '6170000', '3620000', NULL, '2019-09-12 13:56:03', '2019-09-14 09:21:27'),
(77, 77, '52530', '15425000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(78, 78, '52550', '10800000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(79, 79, '52550', '9000000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(80, 80, '52550', '12044000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(81, 81, '52550', '7778000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(82, 82, '52550', '7778000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(83, 83, '52550', '7778000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(84, 84, '52550', '600000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(85, 85, '52530', '5200000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(86, 86, '52550', '540000', NULL, NULL, '2019-09-12 13:56:03', '2019-09-12 13:56:03'),
(87, 87, '52560', '42840000', NULL, NULL, '2019-09-12 13:56:04', '2019-09-12 13:56:04'),
(88, 88, '52560', '34870000', NULL, NULL, '2019-09-12 13:56:04', '2019-09-12 13:56:04'),
(89, 89, '52560', '10000000', NULL, NULL, '2019-09-12 13:56:04', '2019-09-12 13:56:04'),
(90, 90, '52560', '9322000', NULL, NULL, '2019-09-12 13:56:04', '2019-09-12 13:56:04'),
(91, 91, '52530', '7800000', '740000', NULL, '2019-09-12 13:56:04', '2019-09-14 09:15:22'),
(92, 92, '52510', '149168000', NULL, NULL, '2019-09-14 01:51:56', '2019-09-14 01:51:56');

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
  `file_profile` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `user_level`, `pengelola`, `user_unitkerja`, `lastlogin`, `lastip`, `remember_token`, `file_profile`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'admin', NULL, NULL, '$2y$10$hKhUnIjsH44miRHbQOd74O19.QzsLPqTcZbHYT2ws/ixTjs/EoAKC', 5, 5, '52000', '2019-09-15 18:16:01', '::1', 'sOSEsYqbHjWeiLUBByRFNw6FIXChWTtVnWstZfb58UvN9c7h7k6rekL926OZ', NULL, NULL, '2019-09-15 10:16:01'),
(2, 'I Putu Dyatmika', 'mika', 'pdyatmika@gmail.com', NULL, '$2y$10$/Sj.c/Fs/ySGdahOBXMZX.RONUbyt3EKiyLY3LOWfjMQ517LB5vFO', 4, 5, '52560', '2019-09-13 08:43:57', '10.52.6.31', '950BlZEj75MYcDh6PrgMqLvONBGDGlXdiTztCB4CK8NYbFj0KYsTdl6h10v1', NULL, '2019-02-02 01:42:57', '2019-09-13 00:43:57'),
(3, 'I Gusti Lanang Putra', 'lanang', NULL, NULL, '$2y$10$yaPJn5tf1/xhcZAy6nbgz.8UsB7e/OLjsmtK.UrfcGQOij.zSUMu2', 3, 2, '52550', '2019-04-18 16:56:51', '10.52.6.39', 'zdDhKOMXu8YIUqzOQz0SrJRT3uOjtDWZ2ywxHQD6VUMWioRVj4oUXRs7LUwm', NULL, '2019-02-02 01:44:11', '2019-04-18 08:56:51'),
(4, 'Suntono', 'suntono', NULL, NULL, '$2y$10$iQwE2UXxQrw93T2RVhkP4uMmg4GJFV3dV8.3SNqf9.gu/YuksTB9e', 3, 3, '52000', '2019-08-25 13:50:53', '::1', 'JgblvnadHl9O6pwdLM52sHah7jk1NI1qzMYa2hppgJlVZMXFrVYErhG3eGIt', NULL, '2019-02-02 01:46:20', '2019-08-25 05:50:53'),
(5, 'Anang Zakaria', 'anang', 'anangz@bps.go.id', NULL, '$2y$10$wNlcWp30QfOTQiD1LDc.ZOJLLs4uGD5AxpXo/07w15YHzHPmMlMaC', 3, 1, '52560', '2019-04-18 16:54:24', '10.52.6.39', 'WOTBAfiu0SbcSASZ8dAVZ0wukvBjlRUTtP4SseSGh8p3L9fY6AeU7bELVj1h', NULL, '2019-02-02 01:49:12', '2019-04-18 08:54:24'),
(6, 'Pande Dony Gumilar', 'dony', 'pande@dony.com', NULL, '$2y$10$kZlilHPVmtUquaGyPuaJuuXTGKFfEwcxyIlGVzZeun3mGGvBDVWz.', 2, 4, '52510', '2019-02-10 22:35:21', '192.168.1.9', '7rS85T0yB3xD5akhjzNANQWf0A1K8XSh81PoUZLrWaGOoVOwJSgzTzQMN3oj', NULL, '2019-02-02 02:41:41', '2019-03-12 02:09:37'),
(7, 'Ni Nyoman Ratna Puspitasari', 'omang', 'nyomanratna@bps.go.id', NULL, '$2y$10$oGpMxxXXJ4lT/brrO4ZfE.Zal/8ZgmL.yC3uvywm43tWBbC1NX6qW', 2, 0, '52550', '2019-03-21 18:05:56', '::1', 'gBzl5HPld4VMa0ylKK8tkRlTHhAHCZrwpC5JB6DqhA6o3w6poKAIWLZAXnAZ', NULL, '2019-02-10 15:21:38', '2019-03-21 10:05:56'),
(8, 'Aris Wahyudi', 'aris', 'aris.wahyudi@bps.go.id', NULL, '$2y$10$AvTY27UOdj0BIADeb2/cDO/t0q8GqeiVBeT68gSh.f53C7En72oG2', 3, 4, '52510', '2019-09-08 14:01:16', '::1', '7jqqnGJtskk13GxTjC9LS0yz21sW4N92Er7d395oSfBaVKvFL2r9hFBimYTs', NULL, '2019-03-11 14:00:40', '2019-09-08 06:01:16'),
(9, 'Ni Kadek Adi Madri', 'nikadek', 'nikadek.adi@bps.go.id', NULL, '$2y$10$LoqJ/9INNX80fXZlV6/Or.rZ1hIlsWQZGHGUND8Dtsf2ABxWwfzUW', 3, 1, '52530', '2019-08-25 13:51:16', '::1', 'BDMmvPHnOcGelkkOn4xUnF25K9iv966zAA1ZZoI4T1upZSEPSB4eGiEAZsN7', NULL, '2019-03-11 14:20:06', '2019-08-25 05:51:16'),
(10, 'Lalu Supratna', 'supratna', 'lalu.supratna@bps.go.id', NULL, '$2y$10$It4RKgzv3eby5BdOx3HRfe6jIsekRkMmYf778Y/3AgxG.3DhfJOvW', 3, 1, '52510', '2019-04-18 16:55:53', '10.52.6.39', 'v6KyWTirgh7sqdFbnk1PZEamyaFMe9wmcaApCqdEouLIT5J7LYTd0YrhP3sB', NULL, '2019-03-12 03:55:34', '2019-04-18 08:55:53'),
(11, 'PPK BPS Provinsi NTB', 'ppk', 'ppk@bpsntb.id', NULL, '$2y$10$DHkneorQszIqiNT5tH2VfuydVVHktDzLoQrPAo2iFno7uxeW39o2y', 3, 2, '52000', '2019-03-19 15:04:32', '::1', 'CLnIzalyClkihTfxGVuewQcmzWJzbeVxAI2Pq4hTGrOsHTiSnZO9wHNt8EO3', NULL, '2019-03-12 04:06:21', '2019-03-19 07:04:32'),
(12, 'Operator Sosial', 'sosial', 'sosial@bps.go.id', NULL, '$2y$10$f7Nv/7pBcr6wi7wqV12xhOi1gMo7jiflVu26O8SZyqh9sMpxIYQWS', 2, 0, '52520', '2019-09-08 14:00:19', '::1', NULL, NULL, '2019-03-14 04:14:41', '2019-09-08 06:00:19'),
(13, 'Operator TU', 'tatausaha', 'operatortu@bps.go.id', NULL, '$2y$10$EB00N196U1dbUhKIlRFc7OKLtV25wfTYJJcru//RqBk9TUiYS1Rmm', 2, 0, '52510', '2019-04-18 19:44:52', '182.1.104.98', 'tz2m5vzvqQZOuhlnzNqN4GUtvkvIfUIlho1Ujd0Qn3Y9MxrniC2bUuEmscY3', NULL, '2019-03-14 04:15:13', '2019-04-18 11:44:52'),
(14, 'Operator Produksi', 'produksi', 'produksi@bps.go.id', NULL, '$2y$10$WSt5boQZNxeulZfmokJI7.qaYrKkvNJKurH.Qtbz5wCeI1yL6Z0oe', 2, 0, '52530', NULL, NULL, NULL, NULL, '2019-03-14 04:16:11', '2019-03-14 04:16:11'),
(15, 'Operator Distribusi', 'distribusi', 'distribusi@bps.go.id', NULL, '$2y$10$lkKTF9FLFzd0hkV62nmroe1kIhtWj5uRJGR620l4yWdIj3uxg5bFy', 2, 0, '52540', NULL, NULL, NULL, NULL, '2019-03-14 04:16:48', '2019-03-14 04:16:48'),
(16, 'Operator NWAS', 'neraca', 'neraca@bps.go.id', NULL, '$2y$10$Wi9m7W82og8Xj8/UDT.6/e8akqXb0tM7zkkyGO268e7ub5orJtQZq', 2, 0, '52550', NULL, NULL, NULL, NULL, '2019-03-14 04:17:30', '2019-03-14 04:17:30'),
(17, 'Operator IPDS', 'ipds', 'ipds@bps.go.id', NULL, '$2y$10$XNvHcxJZJb8UWQQtxLHHGujx2hd4eUnv1qORxyOTHzWteZOwAt4Mu', 2, 0, '52560', '2019-09-14 18:05:15', '192.168.1.7', '5QA0AR5pmceLzF9LZcWCMLj8oT9Yxb4eLDRs4Xiav7tOXCAVcqKPn7rmGRKs', NULL, '2019-03-14 04:18:06', '2019-09-14 10:05:15'),
(18, 'Arrief Chandra Setiawan', 'arrief', 'arrief@bps.go.id', NULL, '$2y$10$i8YpIOkfSXvR3inZINTFT.yrjfxzjyKqB409P47EPDY/HO2nwn0qC', 3, 1, '52520', NULL, NULL, NULL, NULL, '2019-03-22 03:01:38', '2019-03-22 03:01:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

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
-- Indexes for table `tahun_dasar`
--
ALTER TABLE `tahun_dasar`
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
-- Indexes for table `turunan_anggaran`
--
ALTER TABLE `turunan_anggaran`
  ADD PRIMARY KEY (`t_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuitansi`
--
ALTER TABLE `kuitansi`
  MODIFY `kuitansi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matrik`
--
ALTER TABLE `matrik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `m_gol`
--
ALTER TABLE `m_gol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spd`
--
ALTER TABLE `spd`
  MODIFY `spd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surattugas`
--
ALTER TABLE `surattugas`
  MODIFY `srt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahun_dasar`
--
ALTER TABLE `tahun_dasar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `trx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `turunan_anggaran`
--
ALTER TABLE `turunan_anggaran`
  MODIFY `t_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
