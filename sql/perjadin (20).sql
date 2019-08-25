-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 02:55 PM
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
(1, 2019, '054.01.01.2886.970.051.524111', ' Perjalanan ke DJPB', '7330000', NULL, '52510', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(2, 2019, '054.01.01.2886.970.052.524111', ' Perjalanan ke Kabupaten Kota', '11849000', NULL, '52510', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(3, 2019, '054.01.01.2886.970.054.524111', ' Perjalanan  dalam rangka administrasi kepegawaian', '8310000', NULL, '52510', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(4, 2019, '054.01.01.2886.970.055.524111', ' Perjalanan  dalam rangka administrasi BMN', '14020000', NULL, '52510', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(5, 2019, '054.01.01.2886.994.002E.524111', ' Pengawasan prop ke kab/kota', '28900000', NULL, '52510', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(6, 2019, '054.01.01.2886.994.002E.524111', ' Konsultasi pimpinan BPS propinsi ke BPS pusat', '13782000', NULL, '52510', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(7, 2019, '054.01.06.2895.004.100.524111', ' konsultasi bidang ipds dari provinsi ke bps ri', '15556000', NULL, '52560', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(8, 2019, '054.01.06.2895.006.100.524111', ' supervisi pencacahan lapangan oleh bps provinsi', '9255000', NULL, '52520', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(9, 2019, '054.01.06.2895.006.101.524111', ' konsultasi kepala seksi statistik kependudukan ke bps pusat', '7778000', NULL, '52520', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(10, 2019, '054.01.06.2895.006.101.524111', ' supervisi pencacahan lapangan oleh bps provinsi', '9255000', NULL, '52520', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(11, 2019, '054.01.06.2895.009.051.524111', ' biaya pengawasan lapangan dari provinsi ke kab/kota', '15425000', '0', '52520', 1, '2019-03-28 03:30:40', '2019-04-16 06:36:51'),
(12, 2019, '054.01.06.2895.009.051.524111', ' konsultasi bidang statistik sosial dari provinsi ke bps ri', '7778000', NULL, '52520', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(13, 2019, '054.01.06.2895.009.205.524111', ' biaya pengawasan lapangan dari bps provinsi ke kabupaten/kota', '15425000', NULL, '52520', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(14, 2019, '054.01.06.2895.010.200.524111', ' konsultasi seksi hansos ke bps pusat', '7778000', NULL, '52520', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(15, 2019, '054.01.06.2895.011.602.524111', ' perjalanan supervisi provinsi updating infrastruktur', '19409000', NULL, '52520', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(16, 2019, '054.01.06.2895.014.051.524111', ' pengawasan administrasi bps propinsi ke bps kab/kota', '3085000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(17, 2019, '054.01.06.2895.014.051.524111', ' pengawasan serta revisit bps propinsi ke bps kab/kota', '9255000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(18, 2019, '054.01.06.2895.014.100.524111', ' perjalanan dinas supervisi provinsi ke kabupaten', '12340000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(19, 2019, '054.01.06.2895.014.200.524111', ' pengawasan bps prov ke kab/kota', '6170000', '2720000', '52530', 1, '2019-03-28 03:30:40', '2019-04-16 08:53:16'),
(20, 2019, '054.01.06.2895.015.051.524111', ' pengendalian pelaksanaan survei ibs bulanan dari prov ke kab/kota', '3085000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(21, 2019, '054.01.06.2895.015.051.524111', ' konsultasi bidang produksi dari provinsi ke bps ri', '7778000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(22, 2019, '054.01.06.2895.015.052.524111', ' pengendalian kegiatan lapangan dari provinsi ke kab', '9255000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(23, 2019, '054.01.06.2895.015.100.524111', ' pengawasan vimk 2019 tahunan bps provinsi', '6170000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(24, 2019, '054.01.06.2895.015.101.524111', ' pengawasan vimk 2019 triwulanan bps provinsi', '3085000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(25, 2019, '054.01.06.2895.015.101.524111', ' pengawasan administrasi vimk19 triwulanan bps provinsi ke kabupaten kota', '12340000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(26, 2019, '054.01.06.2895.015.301.524111', ' perjalanan dinas supervisi dari provinsi ke kabupaten/kota', '6170000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(27, 2019, '054.01.06.2895.015.301.524111', ' konsultasi statistik pertambangan dan konstruksi dari provinsi ke bps ri', '7778000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(28, 2019, '054.01.06.2895.016.200.524111', ' pengawasan administrasi bps provinsi ke kabupaten/kota', '3085000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(29, 2019, '054.01.06.2895.016.200.524111', ' pengawasan bps provinsi ke kab/kota', '6170000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(30, 2019, '054.01.06.2895.016.200.524111', ' konsultasi seksi niaga dan jasa dari provinsi ke bps ri', '7778000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(31, 2019, '054.01.06.2895.016.201.524111', ' pengawasan administrasi bps provinsi ke kabupaten/kota', '3085000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(32, 2019, '054.01.06.2895.016.201.524111', ' perjalanan dinas dalam rangka pengawasan lapangan survei pola distribusi tahun 2019 dari bps provinsi ke kabupaten', '6170000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(33, 2019, '054.01.06.2895.016.203.524111', ' pengawasan bps provinsi ke kab/kota', '3085000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(34, 2019, '054.01.06.2895.016.301.524111', ' pengawasan pelaksanaan proyek bps propinsi ke bps kab/kota', '3085000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(35, 2019, '054.01.06.2895.017.910.524111', ' perjalanan dinas dalam rangka pengawasan bps provinsi ke kabupaten', '3085000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(36, 2019, '054.01.06.2895.018.920.524111', ' perjalanan dinas pengawasan lapangan dari bps provinsi ke bps kabupaten dalam rangka updating direktori pasar', '3085000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(37, 2019, '054.01.06.2895.020.051.524111', ' pengawasan lapangan dari provinsi ke kabupaten/kota', '6170000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(38, 2019, '054.01.06.2895.020.101.524111', ' perjalanan pengawasan kegiatan teknis bps provinsi ke bps kabupaten/kota', '9255000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(39, 2019, '054.01.06.2895.020.200.524111', ' perjalanan supervisi dan konsultasi di daerah', '9255000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(40, 2019, '054.01.06.2895.020.200.524111', ' konsultasi seksi harga konsumen dan hpb ke bps pusat', '7778000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(41, 2019, '054.01.06.2895.020.300.524111', ' supervisi survei harga perdesaan dari provinsi ke kabupaten', '3085000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(42, 2019, '054.01.06.2895.022.903.524111', ' Perjalanan supervisi prov ke kab/kota', '2600000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(43, 2019, '054.01.06.2895.023.051.524111', ' konsultasi teknis seksi keuangan dari provinsi ke pusat', '7778000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(44, 2019, '054.01.06.2895.023.200.524111', ' pengawasan pelaksanaan proyek bps propinsi ke bps kab/kota', '9255000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(45, 2019, '054.01.06.2895.024.301.524111', ' konsultasi seksi neraca produksi dari provinsi ke bps ri', '7778000', NULL, '52550', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(46, 2019, '054.01.06.2895.024.301.524111', ' supervisi survei khusus neraca produksi dari provinsi ke kabupaten/kota', '3085000', NULL, '52550', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(47, 2019, '054.01.06.2895.024.301.524111', ' Konregwil Jabalnusra ke Bandung', '25560000', NULL, '52550', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(48, 2019, '054.01.06.2895.025.302.524111', ' pengawasan ke kab/kota dalam rangka penyusunan pdrb kab/kota', '6170000', NULL, '52550', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(49, 2019, '054.01.06.2895.025.302.524111', ' konsultasi seksi neraca konsumsi dari provinsi ke bps ri', '7778000', NULL, '52550', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(50, 2019, '054.01.06.2895.026.051.524111', ' konsultasi kepala seksi analisis lintas sektor ke bps pusat', '7778000', NULL, '52550', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(51, 2019, '054.01.06.2895.027.051.524111', ' pengawasan pelaksanaan kegiatan bps provinsi ke bps kab/kota', '9255000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(52, 2019, '054.01.06.2895.028.100.524111', ' konsultasi teknis seksi pertanian dari provinsi ke bps', '7778000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(53, 2019, '054.01.06.2895.028.100.524111', ' pengawasan pelaksanaan kegiatan hortikultura dari bps provinsi ke kab/kota', '9255000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(54, 2019, '054.01.06.2895.028.102.524111', ' perjalanan supervisi provinsi', '12340000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(55, 2019, '054.01.06.2895.028.200.524111', ' perjalanan dinas pengawasan pelaksanaan survei dari propinsi ke kabupaten', '3085000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(56, 2019, '054.01.06.2895.029.100.524111', ' konsultasi teknis harga dari provinsi ke pusat', '7778000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(57, 2019, '054.01.06.2895.029.100.524111', ' perjalanan pengawasan administrasi bps provinsi ke bps kabupaten/kota', '3085000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(58, 2019, '054.01.06.2895.029.100.524111', ' perjalanan pengawasan bps provinsi ke bps kabupaten/kota', '9255000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(59, 2019, '054.01.06.2895.032.503.524111', ' Monitoring teknis pemetaan dan pemutakhiran BS Provinsi ke Kab/Kota', '43916000', '-1080000', '52560', 1, '2019-03-28 03:30:40', '2019-04-18 08:42:32'),
(60, 2019, '054.01.06.2895.032.503.524111', ' Supervisi pelatihan pemetaan BPS Prov ke Kab/Kota', '24020000', NULL, '52560', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(61, 2019, '054.01.06.2895.034.500.524111', ' Perjalanan dalam rangka supervisi dari provinsi ke kabupaten/kota', '15640000', NULL, '52550', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(62, 2019, '054.01.06.2895.035.500.524111', ' perjalanan dinas dari provinsi ke kabupaten/kota', '6170000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(63, 2019, '054.01.06.2895.038.054.524111', ' pengawasan provinsi ke kab/kota', '15425000', NULL, '52530', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(64, 2019, '054.01.06.2895.039.104.524111', ' Perjalanan Pengawasan Provinsi ke Lapangan', '6256000', NULL, '52540', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(65, 2019, '054.01.06.2895.040.502.524111', ' Perjalanan konsultasi penyusunan irio ke pusat', '7778000', NULL, '52550', 1, '2019-03-28 03:30:40', '2019-03-28 03:30:40'),
(66, 2019, '054.01.06.2895.032.503.524119', 'Transport Rapat Pimpinan BPS Provinsi', '46340000', '0', '52560', 1, '2019-04-02 15:03:00', '2019-04-02 15:04:12'),
(67, 2019, '054.01.06.2895.026.051.524113', 'Translok pendataan STB Prov', '600000', NULL, '52550', 1, '2019-04-18 07:14:02', '2019-04-18 07:14:02'),
(68, 2019, '054.01.06.2895.038.054.524119', 'Biaya Transport INNAS Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area (KSA Jagung)', '7879100', NULL, '52530', 1, '2019-04-18 08:06:00', '2019-04-18 08:06:00');

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
(1, 1, '440000', '2019-01-21', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 07:17:02', '2019-03-28 08:45:09'),
(2, 2, '1565000', '2019-01-21', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, 'Sewa Boat ke tiga gili PP', '800000', 1, NULL, NULL, 0, NULL, NULL, 0, '1125000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 07:17:19', '2019-03-28 08:11:40'),
(3, 3, '440000', '2019-01-21', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 2, '2019-03-28 07:20:36', '2019-04-14 23:25:51'),
(4, 4, '10881900', '2019-01-21', '530000', 5, '2650000', '950000', 4, '3800000', 1, '3619900', 'Tiket PP Mataram - Jakarta', 1, 'Transport Mataram-BIL (PP)', '300000', 1, 'Transport Bandara Soetta ke Hotel (PP)', '512000', 1, NULL, NULL, 0, '812000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 07:23:16', '2019-03-28 08:51:43'),
(5, 5, '440000', '2019-01-24', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 07:23:38', '2019-03-28 08:52:50'),
(6, 6, '705000', '2019-01-30', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 07:23:50', '2019-03-28 08:53:32'),
(7, 7, '440000', '2019-02-04', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 07:24:05', '2019-03-28 08:54:13'),
(8, 8, '790000', '2019-02-01', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 07:24:21', '2019-03-28 08:55:14'),
(9, 9, '790000', '2019-02-04', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:32:05', '2019-03-30 03:18:47'),
(10, 10, '705000', '2019-02-04', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:32:18', '2019-03-30 03:19:13'),
(11, 11, '705000', '2019-02-04', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:32:52', '2019-03-30 03:19:31'),
(12, 12, '790000', '2019-02-01', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:33:05', '2019-03-30 03:19:52'),
(13, 23, '705000', '2019-02-18', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:33:33', '2019-03-30 03:20:17'),
(14, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 3, '2019-03-28 15:33:46', '2019-03-28 15:34:42'),
(15, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 3, '2019-03-28 15:34:05', '2019-03-28 15:43:43'),
(16, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 3, '2019-03-28 15:34:17', '2019-03-28 15:43:50'),
(17, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 3, '2019-03-28 15:34:28', '2019-03-28 15:43:57'),
(18, 17, '180000', '2019-02-18', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:39:33', '2019-03-30 03:20:38'),
(19, 18, '330000', '2019-02-18', '180000', 1, '180000', '0', 0, '0', 0, '150000', 'Transport dari Mataram ke Kota Mataram', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '150000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:39:48', '2019-03-30 03:21:04'),
(20, 19, '330000', '2019-02-18', '180000', 1, '180000', '0', 0, '0', 0, '150000', 'Transport dari Mataram ke Kota Mataram', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '150000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:39:58', '2019-03-30 03:21:27'),
(21, 20, '3582400', '2019-03-15', '440000', 3, '1320000', '450000', 2, '900000', 1, '1062400', 'Tiket PP Mataram - Sumbawa', 1, 'Taksi ke bandaara BIL PP', '300000', 1, NULL, NULL, 0, NULL, NULL, 0, '300000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:40:08', '2019-03-30 03:25:11'),
(22, 21, '3789267', '2019-02-18', '440000', 3, '1320000', '350000', 2, '700000', 1, '1269267', 'Tiket PP Mataram - Bima', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Taksi Hotel ke Bandara Bima', '200000', 1, NULL, NULL, 0, '500000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:43:12', '2019-03-30 03:23:47'),
(23, 22, '3589267', '2019-03-18', '440000', 3, '1320000', '350000', 2, '700000', 1, '1269267', 'Tiket PP Mataram - Bima', 1, 'Taksi ke bandaara BIL PP', '300000', 1, NULL, NULL, 0, NULL, NULL, 0, '300000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-03-28 15:43:25', '2019-03-30 03:24:23'),
(24, 24, '6650400', '2019-02-25', '152000', 5, '760000', '0', 4, '0', 0, '4974400', 'Transport dari Mataram ke Palembang', 1, 'Taksi Hotel ke Bandara PP', '556000', 1, 'Taksi Mataram ke LIA PP', '360000', 1, NULL, NULL, 0, '916000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 01:14:45', '2019-04-02 01:21:12'),
(25, 25, '6650400', '2019-02-25', '152000', 5, '760000', '0', 4, '0', 0, '4974400', 'Transport dari Mataram ke Palembang', 1, 'Tiket Hotel ke Bandara', '556000', 1, 'Tiket Mataram ke LIA PP', '360000', 1, NULL, NULL, 0, '916000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 01:15:01', '2019-04-02 01:22:22'),
(26, 27, '6650400', '2019-02-25', '152000', 5, '760000', '0', 4, '0', 0, '4974400', 'Transport dari Mataram ke Palembang', 1, 'Tiket Hotel ke Bandara PP', '556000', 1, 'Tiket Mataram ke LIA PP', '360000', 1, NULL, NULL, 0, '916000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 01:15:16', '2019-04-02 01:24:37'),
(27, 26, '6650400', '2019-02-25', '152000', 5, '760000', '0', 4, '0', 0, '4974400', 'Transport dari Mataram ke Palembang', 1, 'Taksi Hotel ke Bandara PP', '556000', 1, 'Taksi ke bandaara BIL PP', '360000', 1, NULL, NULL, 0, '916000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 01:15:35', '2019-04-02 01:23:48'),
(28, 28, '6650400', '2019-02-25', '152000', 5, '760000', '0', 4, '0', 0, '4974400', 'Transport dari Mataram ke Palembang', 1, 'Tiket Hotel ke Bandara PP', '556000', 1, 'Tiket Mataram ke LIA PP', '360000', 1, NULL, NULL, 0, '916000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 01:15:51', '2019-04-02 01:25:20'),
(29, 29, '6650400', '2019-02-25', '152000', 5, '760000', '0', 4, '0', 0, '4974400', 'Transport dari Mataram ke Palembang', 1, 'Tiket Hotel ke Bandara PP', '556000', 1, 'Tiket Mataram ke LIA PP', '360000', 1, NULL, NULL, 0, '916000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 01:16:06', '2019-04-02 01:25:52'),
(30, 30, '6650400', '2019-02-25', '152000', 5, '760000', '0', 4, '0', 0, '4974400', 'Transport dari Mataram ke Palembang', 1, 'Tiket Hotel ke Bandara PP', '556000', 1, 'Tiket Mataram ke LIA PP', '360000', 1, NULL, NULL, 0, '916000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 01:16:26', '2019-04-02 01:26:25'),
(31, 31, '2480000', '2019-02-22', '440000', 3, '1320000', '330000', 2, '660000', 1, '500000', 'Transport dari Mataram ke Kabupaten Sumbawa', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '500000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 15:22:13', '2019-04-02 15:23:58'),
(32, 32, '665000', '2019-02-25', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 15:22:26', '2019-04-02 15:24:31'),
(33, 33, '665000', '2019-02-22', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 15:22:40', '2019-04-02 15:24:53'),
(34, 34, '665000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-02 15:22:50', '2019-04-02 15:25:22'),
(35, 35, '705000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 09:56:23', '2019-04-03 10:01:15'),
(36, 36, '705000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 09:56:37', '2019-04-03 10:01:33'),
(37, 37, '705000', '2019-02-22', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 10:05:42', '2019-04-03 10:07:13'),
(38, 38, '705000', '2019-02-22', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 10:05:50', '2019-04-03 10:07:33'),
(39, 39, '790000', '2019-02-25', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 10:05:58', '2019-04-03 10:07:57'),
(40, 40, '790000', '2019-02-25', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 10:06:06', '2019-04-03 10:08:32'),
(41, 41, '790000', '2019-02-25', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 10:06:26', '2019-04-03 10:08:51'),
(42, 42, '440000', '2019-02-15', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 10:06:40', '2019-04-03 10:09:14'),
(43, 43, '790000', '2019-02-15', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 10:06:48', '2019-04-03 10:09:34'),
(44, 44, '765000', '2019-02-15', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:44:36', '2019-04-03 12:47:00'),
(45, 45, '765000', '2019-02-15', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:44:43', '2019-04-03 12:48:34'),
(46, 46, '665000', '2019-02-18', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:44:50', '2019-04-03 12:48:49'),
(47, 47, '665000', '2019-02-18', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:44:56', '2019-04-03 12:49:23'),
(48, 48, '665000', '2019-02-18', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:45:03', '2019-04-03 12:49:39'),
(49, 49, '665000', '2019-02-18', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:45:09', '2019-04-03 12:49:53'),
(50, 50, '440000', '2019-02-18', '440000', 1, '440000', '0', 0, '0', 0, '0', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:45:16', '2019-04-03 12:50:10'),
(51, 51, '665000', '2019-02-19', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:45:23', '2019-04-03 12:51:04'),
(52, 52, '665000', '2019-02-19', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:45:30', '2019-04-03 12:52:54'),
(53, 53, '705000', '2019-02-20', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:45:37', '2019-04-03 12:53:10'),
(54, 54, '705000', '2019-02-21', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:45:46', '2019-04-03 12:53:42'),
(55, 55, '180000', '2019-02-21', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:45:57', '2019-04-03 12:55:05'),
(56, 56, '330000', '2019-02-27', '180000', 1, '180000', '0', 0, '0', 0, '150000', 'Transport dari Mataram ke Kota Mataram', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '150000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:46:02', '2019-04-03 12:55:26'),
(57, 57, '440000', '2019-03-15', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:46:12', '2019-04-03 12:50:38'),
(58, 58, '440000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:46:19', '2019-04-03 12:54:08'),
(59, 59, '665000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-03 12:46:27', '2019-04-03 12:52:32'),
(60, 60, '665000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-04 16:27:46', '2019-04-04 16:31:19'),
(61, 61, '440000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-04 16:27:53', '2019-04-04 16:31:31'),
(62, 62, '440000', '2019-02-25', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-04 16:28:01', '2019-04-04 16:31:51'),
(63, 63, '790000', '2019-02-25', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-04 16:28:09', '2019-04-04 16:32:11'),
(64, 64, '790000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:42:52', '2019-04-05 13:45:29'),
(65, 65, '790000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:42:59', '2019-04-05 13:45:52'),
(66, 66, '790000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:43:08', '2019-04-05 13:46:12'),
(67, 67, '790000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:43:14', '2019-04-05 13:46:48'),
(68, 68, '180000', '2019-03-05', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:43:29', '2019-04-05 13:47:31'),
(69, 69, '295000', '2019-03-06', '295000', 1, '295000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:43:37', '2019-04-05 13:48:37'),
(70, 70, '765000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:43:45', '2019-04-05 13:49:05'),
(71, 73, '180000', '2019-03-07', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:43:53', '2019-04-05 13:49:35'),
(72, 71, '765000', '2019-02-27', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:43:59', '2019-04-05 13:50:39'),
(73, 72, '180000', '2019-03-07', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 13:44:19', '2019-04-05 13:50:53'),
(74, 74, '330000', '2019-03-07', '180000', 1, '180000', '0', 0, '0', 0, '150000', 'Transport dari Mataram ke Kota Mataram', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '150000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 14:07:55', '2019-04-05 14:09:13'),
(75, 75, '330000', '2019-03-07', '180000', 1, '180000', '0', 0, '0', 0, '150000', 'Transport dari Mataram ke Kota Mataram', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '150000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 14:08:01', '2019-04-05 14:09:27'),
(76, 76, '440000', '2019-03-07', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 14:08:08', '2019-04-05 14:09:42'),
(77, 77, '765000', '2019-03-11', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 14:08:14', '2019-04-05 14:10:00'),
(78, 78, '765000', '2019-03-11', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 14:08:19', '2019-04-05 14:10:13'),
(79, 79, '705000', '2019-03-13', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 14:08:25', '2019-04-05 14:10:29'),
(80, 80, '705000', '2019-03-13', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 14:08:30', '2019-04-05 14:10:44'),
(81, 81, '665000', '2019-03-14', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-05 14:08:36', '2019-04-05 14:11:00'),
(82, 82, '665000', '2019-03-14', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 2, '2019-04-05 14:08:42', '2019-04-14 23:25:44'),
(83, 83, '790000', '2019-03-15', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 2, '2019-04-05 14:08:48', '2019-04-14 23:25:36'),
(84, 84, '180000', '2019-03-18', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 2, '2019-04-05 14:08:55', '2019-04-14 23:25:30'),
(85, 85, '665000', '2019-03-15', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:41:59', '2019-04-16 06:45:49'),
(86, 86, '665000', '2019-03-15', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:42:11', '2019-04-16 06:46:15'),
(87, 87, '765000', '2019-03-26', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:42:21', '2019-04-16 06:46:36'),
(88, 88, '440000', '2019-03-26', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:42:33', '2019-04-16 06:48:02'),
(89, 102, '9281200', '2019-03-26', '530000', 4, '2120000', '850000', 3, '2550000', 1, '3799200', 'Transport dari Mataram ke Jakarta PP', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Taksi Hotel ke Bandara', '512000', 1, NULL, NULL, 0, '812000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:42:49', '2019-04-16 06:49:36'),
(90, 89, '765000', '2019-03-26', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:43:00', '2019-04-16 06:49:52'),
(91, 90, '705000', '2019-03-27', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:43:08', '2019-04-16 06:50:04'),
(92, 91, '8101200', '2019-03-18', '530000', 3, '1590000', '950000', 2, '1900000', 1, '3799200', 'Transport dari Mataram ke Jakarta PP', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Transport Bandara Soetta ke Hotel (PP)', '512000', 1, NULL, NULL, 0, '812000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:43:20', '2019-04-16 06:51:12'),
(93, 92, '8101200', '2019-03-18', '530000', 3, '1590000', '950000', 2, '1900000', 1, '3799200', 'Transport dari Mataram ke Jakarta PP', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Transport Bandara Soetta ke Hotel (PP)', '512000', 1, NULL, NULL, 0, '812000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:43:33', '2019-04-16 06:52:04'),
(94, 93, '6201200', '2019-03-18', '530000', 3, '1590000', '0', 2, '0', 0, '3799200', 'Transport dari Mataram ke Jakarta PP', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Transport Bandara Soetta ke Hotel (PP)', '512000', 1, NULL, NULL, 0, '812000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:43:46', '2019-04-16 06:52:49'),
(95, 94, '8101200', '2019-03-18', '530000', 3, '1590000', '950000', 2, '1900000', 1, '3799200', 'Transport dari Mataram ke Jakarta', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Transport Bandara Soetta ke Hotel (PP)', '512000', 1, NULL, NULL, 0, '812000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:43:57', '2019-04-16 06:53:15'),
(96, 95, '2730400', '2019-03-18', '440000', 3, '1320000', '580000', 2, '348000', 0, '1062400', 'Transport dari Mataram ke Kabupaten Sumbawa', 1, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '348000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:44:09', '2019-04-16 06:54:22'),
(97, 96, '3059800', '2019-03-18', '440000', 3, '1320000', '580000', 2, '348000', 0, '1041800', 'Transport dari Mataram ke Kota Bima PP', 1, 'Taksi ke bandaara BIL PP', '350000', 1, NULL, NULL, 0, NULL, NULL, 0, '698000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:44:19', '2019-04-16 06:55:15'),
(98, 97, '180000', '2019-03-15', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:44:30', '2019-04-16 06:55:36'),
(99, 98, '665000', '2019-03-15', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:44:39', '2019-04-16 06:55:52'),
(100, 99, '665000', '2019-03-15', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:44:48', '2019-04-16 06:56:09'),
(101, 100, '705000', '2019-03-19', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:44:57', '2019-04-16 06:56:56'),
(102, 101, '665000', '2019-03-20', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 06:45:06', '2019-04-16 06:57:12'),
(103, 103, '790000', '2019-03-20', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:11:59', '2019-04-16 07:15:03'),
(104, 104, '705000', '2019-03-20', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:12:09', '2019-04-16 07:15:16'),
(105, 105, '790000', '2019-03-20', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:12:18', '2019-04-16 07:15:42'),
(106, 106, '665000', '2019-03-25', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:12:29', '2019-04-16 07:15:59'),
(107, 107, '440000', '2019-03-25', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:12:39', '2019-04-16 07:16:11'),
(108, 108, '705000', '2019-03-25', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:13:08', '2019-04-16 07:16:25'),
(109, 109, '2879000', '2019-04-01', '440000', 3, '1320000', '350000', 2, '210000', 0, '1059000', 'Transport dari Mataram ke Kota Bima PP', 1, 'Taksi ke bandaara BIL PP', '290000', 1, NULL, NULL, 0, NULL, NULL, 0, '500000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:13:21', '2019-04-16 07:22:41'),
(110, 110, '2879000', '2019-04-01', '440000', 3, '1320000', '350000', 2, '210000', 0, '1059000', 'Transport dari Mataram ke Kota Bima', 1, 'Taksi ke bandaara BIL PP', '290000', 1, NULL, NULL, 0, NULL, NULL, 0, '500000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:13:31', '2019-04-16 07:23:05'),
(111, 111, '790000', '2019-03-26', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:13:41', '2019-04-16 07:23:22'),
(112, 112, '1620000', '2019-03-28', '440000', 3, '1320000', '500000', 2, '300000', 0, '0', 'Transport dari Mataram ke Kabupaten Sumbawa', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '300000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:13:52', '2019-04-16 07:25:21'),
(113, 113, '1620000', '2019-03-28', '440000', 3, '1320000', '500000', 2, '300000', 0, '0', 'Transport dari Mataram ke Kabupaten Sumbawa', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '300000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:14:01', '2019-04-16 07:25:39'),
(114, 114, '765000', '2019-03-28', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:14:13', '2019-04-16 07:25:53'),
(115, 115, '765000', '2019-03-28', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 07:14:25', '2019-04-16 07:26:06'),
(116, 116, '4433800', '2019-05-02', '440000', 4, '1760000', '250000', 3, '750000', 1, '1223800', 'Tiket Pesawat Mataram - Bima PP', 1, 'Taksi ke Bandara BIL PP', '300000', 1, 'Transport Dompu ke Bima', '200000', 1, 'Transport Hotel ke Bandara', '200000', 1, '700000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-16 08:57:44', '2019-05-14 02:53:35'),
(117, 117, '330000', '2019-04-01', '180000', 1, '180000', '0', 0, '0', 0, '150000', 'Transport dari Mataram ke Kota Mataram', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '150000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-18 09:10:35', '2019-04-20 15:32:52'),
(118, 118, '790000', '2019-04-05', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-18 09:10:48', '2019-04-20 15:33:10'),
(119, 119, '790000', '2019-04-05', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-18 09:11:00', '2019-04-20 15:33:26'),
(120, 120, '665000', '2019-04-08', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:10:51', '2019-04-20 15:33:57'),
(121, 121, '120000', '2019-04-10', '120000', 1, '120000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:11:03', '2019-04-20 15:35:29'),
(122, 122, '180000', '2019-04-15', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:11:33', '2019-04-20 15:35:49'),
(123, 123, '180000', '2019-04-08', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:11:45', '2019-04-20 15:36:13'),
(124, 124, '4760000', '2019-04-08', '440000', 5, '2200000', '382500', 4, '1530000', 1, '1030000', 'Biaya Penyebrangan Mobil Dinas PP', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '1030000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:13:01', '2019-04-20 15:44:36'),
(125, 125, '3183200', '2019-04-08', '440000', 3, '1320000', '480000', 2, '960000', 1, '603200', 'Tiket PP Mataram - Bima PP', 1, 'Taksi ke bandaara BIL PP', '300000', 1, NULL, NULL, 0, NULL, NULL, 0, '300000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:13:15', '2019-04-20 15:47:41'),
(126, 126, '3723100', '2019-04-10', '440000', 3, '1320000', '450000', 2, '900000', 1, '853100', 'Tiket Pesawat Mataram - Bima PP', 1, 'Taksi ke bandaara BIL', '300000', 1, 'Tiket Hotel ke Bandara Bima', '350000', 1, NULL, NULL, 0, '650000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:13:28', '2019-04-20 15:49:15'),
(127, 127, '440000', '2019-04-05', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:13:41', '2019-04-20 15:49:32'),
(128, 128, '2390000', '2019-04-11', '440000', 3, '1320000', '310000', 2, '620000', 1, '450000', 'Transport dari Mataram ke Kabupaten Sumbawa Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '450000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:14:09', '2019-04-20 15:51:22'),
(129, 129, '3000000', '2019-04-08', '440000', 5, '2200000', '200000', 4, '800000', 1, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 14:14:21', '2019-04-20 15:52:08'),
(130, 130, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 3, '2019-04-20 14:14:34', '2019-04-20 15:52:54'),
(131, 139, '7212800', '2019-04-09', '530000', 4, '2120000', '580000', 3, '1740000', 1, '2540800', 'Tiket Pesawat Mataram - Jakarta PP', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Taksi Hotel ke Bandara', '512000', 1, NULL, NULL, 0, '812000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:19:18', '2019-04-20 15:55:27'),
(132, 131, '3383200', '2019-04-11', '440000', 3, '1320000', '480000', 2, '960000', 1, '603200', 'Tiket Pesawat Mataram - Bima PP', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Taksi Hotel ke Bandara', '200000', 1, NULL, NULL, 0, '500000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:20:43', '2019-04-20 15:56:35'),
(133, 132, '180000', '2019-04-10', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:20:56', '2019-04-20 15:57:35'),
(134, 133, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 3, '2019-04-20 15:21:11', '2019-04-20 15:53:17'),
(135, 134, '440000', '2019-04-11', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:21:25', '2019-04-20 15:57:55'),
(136, 135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 3, '2019-04-20 15:21:39', '2019-04-20 15:53:40'),
(137, 136, '4784900', '2019-04-12', '440000', 3, '1320000', '990000', 2, '1980000', 1, '984900', 'Tiket Pesawat Mataram - Bima PP', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Taksi Hotel ke Bandara', '200000', 1, NULL, NULL, 0, '500000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:23:35', '2019-04-20 15:58:56'),
(138, 137, '180000', '2019-04-11', '180000', 1, '180000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:23:46', '2019-04-20 15:59:10'),
(139, 138, '440000', '2019-04-05', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:23:55', '2019-04-20 15:59:29'),
(140, 140, '665000', '2019-04-08', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:24:09', '2019-04-20 16:00:02'),
(141, 141, '705000', '2019-04-09', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:24:19', '2019-04-20 16:00:17'),
(142, 142, '705000', '2019-04-05', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:24:28', '2019-04-20 16:00:30'),
(143, 143, '7739100', '2019-04-08', '185000', 4, '740000', '495000', 3, '1485000', 1, '5004100', 'Tiket Pesawat Mataram - Solo PP', 0, 'Taksi ke bandaara BIL PP', '300000', 1, 'Taksi Hotel ke Bandara', '210000', 1, NULL, NULL, 0, '5514100', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:24:38', '2019-04-20 16:03:45'),
(144, 144, '790000', '2019-04-09', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:24:50', '2019-04-20 16:04:03'),
(145, 145, '705000', '2019-04-09', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:25:01', '2019-04-20 16:04:14'),
(146, 146, '790000', '2019-04-09', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:25:10', '2019-04-20 16:04:34'),
(147, 147, '705000', '2019-04-09', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:25:20', '2019-04-20 16:04:59'),
(148, 148, '665000', '2019-04-09', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:25:59', '2019-04-20 16:05:22'),
(149, 149, '2390000', '2019-04-15', '440000', 3, '1320000', '310000', 2, '620000', 1, '450000', 'Transport dari Mataram ke Kabupaten Sumbawa Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '450000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:26:08', '2019-04-20 16:06:15'),
(150, 150, '2390000', '2019-04-15', '440000', 3, '1320000', '310000', 2, '620000', 1, '450000', 'Transport dari Mataram ke Kabupaten Sumbawa Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '450000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:26:17', '2019-04-20 16:06:34'),
(151, 151, '3122200', '2019-04-22', '440000', 3, '1320000', '410000', 2, '820000', 1, '832200', 'Tiket Pesawat Mataram - Bima PP', 1, 'Taksi ke bandara BIL', '150000', 1, NULL, NULL, 0, NULL, NULL, 0, '150000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:26:38', '2019-05-14 01:02:36'),
(152, 152, '4483752', '2019-04-12', '440000', 3, '1320000', '770000', 2, '1540000', 1, '1123752', 'Tiket Pesawat Mataram - Bima PP', 1, 'Taksi ke bandaara BIL PP', '300000', 1, 'Taksi Hotel ke Bandara', '200000', 1, NULL, NULL, 0, '500000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:26:48', '2019-04-20 16:08:27'),
(153, 153, '765000', '2019-04-11', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:26:59', '2019-04-20 16:09:18'),
(154, 154, '765000', '2019-04-11', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:27:10', '2019-04-20 16:09:42'),
(155, 155, '765000', '2019-04-11', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:27:23', '2019-04-20 16:10:38'),
(156, 156, '440000', '2019-04-11', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:28:05', '2019-04-20 16:10:55'),
(157, 157, '665000', '2019-04-22', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:28:16', '2019-05-14 01:11:44'),
(158, 158, '705000', '2019-04-18', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:28:28', '2019-05-14 01:11:11'),
(159, 159, '705000', '2019-04-18', '440000', 1, '440000', '0', 0, '0', 0, '265000', 'Transport dari Mataram ke Kabupaten Lombok Tengah', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '265000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:28:37', '2019-05-14 01:03:50'),
(160, 160, '440000', '2019-04-22', '440000', 1, '440000', '0', 0, '0', 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '0', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:28:47', '2019-05-14 01:09:51'),
(161, 161, '665000', '2019-04-24', '440000', 1, '440000', '0', 0, '0', 0, '225000', 'Transport dari Mataram ke Kabupaten Lombok Barat', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '225000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:28:58', '2019-05-14 01:10:23'),
(162, 162, '765000', '2019-04-18', '440000', 1, '440000', '0', 0, '0', 0, '325000', 'Transport dari Mataram ke Kabupaten Lombok Utara', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '325000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:29:07', '2019-04-20 16:11:25'),
(163, 163, '790000', '2019-04-22', '440000', 1, '440000', '0', 0, '0', 0, '350000', 'Transport dari Mataram ke Kabupaten Lombok Timur', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '350000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:29:16', '2019-05-14 01:07:56'),
(164, 164, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, '2019-04-20 15:29:25', '2019-04-20 15:29:25'),
(165, 165, '150000', '2019-05-02', '0', 4, '0', '0', 3, '0', 0, '150000', 'Transport ke Kota Mataram', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '150000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:29:40', '2019-05-14 00:50:16'),
(166, 166, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, '2019-04-20 15:29:50', '2019-04-20 15:29:50'),
(167, 168, '150000', '2019-05-02', '0', 4, '0', '0', 3, '0', 0, '150000', 'Transport dari Mataram ke Kota Mataram', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, '150000', '19910719 201403 1 002', 'Pande Gde Dony Gumilar', 1, '2019-04-20 15:30:02', '2019-05-14 00:48:30'),
(168, 167, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, '2019-04-20 15:30:47', '2019-04-20 15:30:47');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `matrik`
--

INSERT INTO `matrik` (`id`, `tahun_matrik`, `tgl_awal`, `tgl_akhir`, `kodekab_tujuan`, `lamanya`, `mak_id`, `dana_mak`, `dana_pagu`, `dana_unitkerja`, `lama_harian`, `dana_harian`, `total_harian`, `dana_transport`, `lama_hotel`, `dana_hotel`, `total_hotel`, `pengeluaran_rill`, `total_biaya`, `unit_pelaksana`, `flag_matrik`, `created_at`, `updated_at`) VALUES
(1, 2019, '2019-01-10', '2019-01-10', '5208', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52540', 5, '2019-03-28 04:10:05', '2019-03-28 07:10:29'),
(2, 2019, '2019-01-10', '2019-01-10', '5208', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '1125000', '1565000', '52540', 5, '2019-03-28 04:10:05', '2019-03-28 07:11:03'),
(3, 2019, '2019-01-10', '2019-01-10', '5208', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52540', 5, '2019-03-28 04:10:05', '2019-03-28 07:11:37'),
(4, 2019, '2019-01-15', '2019-01-15', '3100', 5, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 5, '530000', '2650000', '3619900', 4, '950000', '3800000', '812000', '10881900', '52000', 5, '2019-03-28 04:10:06', '2019-03-28 07:11:54'),
(5, 2019, '2019-01-23', '2019-01-23', '5202', 1, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52510', 5, '2019-03-28 04:10:06', '2019-03-28 07:13:24'),
(6, 2019, '2019-01-23', '2019-01-23', '5202', 1, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52510', 5, '2019-03-28 04:10:06', '2019-03-28 07:14:07'),
(7, 2019, '2019-01-31', '2019-01-31', '5202', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52530', 5, '2019-03-28 04:10:06', '2019-03-28 07:14:37'),
(8, 2019, '2019-01-31', '2019-01-31', '5203', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52530', 5, '2019-03-28 04:10:06', '2019-03-28 07:15:41'),
(9, 2019, '2019-01-31', '2019-01-31', '5203', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52530', 5, '2019-03-28 04:10:06', '2019-03-28 15:23:20'),
(10, 2019, '2019-01-31', '2019-01-31', '5202', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52530', 5, '2019-03-28 04:10:06', '2019-03-28 15:23:43'),
(11, 2019, '2019-01-31', '2019-01-31', '5202', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52530', 5, '2019-03-28 04:10:06', '2019-03-28 15:24:11'),
(12, 2019, '2019-01-31', '2019-01-31', '5203', 1, 16, '054.01.06.2895.014.051.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52530', 5, '2019-03-28 04:10:06', '2019-03-28 15:24:37'),
(13, 2019, '2019-02-13', '2019-02-13', '5272', 3, 39, '054.01.06.2895.020.200.524111', '9255000', '52540', 3, '440000', '1320000', '1064100', 2, '0', '0', '700000', '3084100', '52540', 2, '2019-03-28 04:10:06', '2019-03-28 15:34:42'),
(14, 2019, '2019-02-13', '2019-02-13', '5206', 3, 37, '054.01.06.2895.020.051.524111', '6170000', '52540', 3, '440000', '1320000', '1064100', 2, '0', '0', '700000', '3084100', '52540', 2, '2019-03-28 04:10:06', '2019-03-28 15:43:43'),
(15, 2019, '2019-02-13', '2019-02-13', '5206', 3, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 3, '440000', '1320000', '1044300', 2, '0', '0', '700000', '3064300', '52540', 2, '2019-03-28 04:10:06', '2019-03-28 15:43:49'),
(16, 2019, '2019-02-13', '2019-02-13', '5272', 3, 39, '054.01.06.2895.020.200.524111', '9255000', '52540', 3, '440000', '1320000', '1064100', 2, '0', '0', '700000', '3084100', '52540', 2, '2019-03-28 04:10:06', '2019-03-28 15:43:56'),
(17, 2019, '2019-02-13', '2019-02-13', '5271', 1, 42, '054.01.06.2895.022.903.524111', '2600000', '52540', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52540', 5, '2019-03-28 04:10:06', '2019-03-28 15:30:29'),
(18, 2019, '2019-02-13', '2019-02-13', '5271', 1, 42, '054.01.06.2895.022.903.524111', '2600000', '52540', 1, '180000', '180000', '0', 0, '0', '0', '150000', '330000', '52540', 5, '2019-03-28 04:10:06', '2019-03-28 15:30:52'),
(19, 2019, '2019-02-13', '2019-02-13', '5271', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '180000', '180000', '0', 0, '0', '0', '150000', '330000', '52540', 5, '2019-03-28 04:10:06', '2019-03-28 15:36:48'),
(20, 2019, '2019-02-13', '2019-02-13', '5204', 3, 16, '054.01.06.2895.014.051.524111', '3085000', '52530', 3, '440000', '1320000', '1062400', 2, '450000', '900000', '300000', '3582400', '52530', 5, '2019-03-28 04:10:06', '2019-03-28 15:38:13'),
(21, 2019, '2019-02-14', '2019-02-14', '5272', 3, 48, '054.01.06.2895.025.302.524111', '6170000', '52550', 3, '440000', '1320000', '1269267', 2, '350000', '700000', '500000', '3789267', '52550', 5, '2019-03-28 04:10:06', '2019-03-28 15:38:36'),
(22, 2019, '2019-02-14', '2019-02-14', '5206', 3, 48, '054.01.06.2895.025.302.524111', '6170000', '52550', 3, '440000', '1320000', '1269267', 2, '350000', '700000', '300000', '3589267', '52550', 5, '2019-03-28 04:10:06', '2019-03-28 15:38:55'),
(23, 2019, '2019-02-15', '2019-02-15', '5202', 1, 26, '054.01.06.2895.015.301.524111', '6170000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52530', 5, '2019-03-28 04:10:06', '2019-03-28 15:26:33'),
(24, 2019, '2019-02-18', '2019-02-18', '1600', 5, 66, '054.01.06.2895.032.503.524119', '46340000', '52560', 5, '380000', '1900000', '4974400', 4, '0', '0', '916000', '7790400', '52000', 5, '2019-03-28 04:10:06', '2019-04-02 15:04:12'),
(25, 2019, '2019-02-18', '2019-02-18', '1600', 5, 66, '054.01.06.2895.032.503.524119', '46340000', '52560', 5, '380000', '1900000', '4974400', 4, '0', '0', '916000', '7790400', '52510', 5, '2019-03-28 04:10:06', '2019-04-02 15:05:05'),
(26, 2019, '2019-02-18', '2019-02-18', '1600', 5, 66, '054.01.06.2895.032.503.524119', '46340000', '52560', 5, '380000', '1900000', '4974400', 4, '0', '0', '916000', '7790400', '52520', 5, '2019-03-28 04:10:06', '2019-04-02 15:05:31'),
(27, 2019, '2019-02-18', '2019-02-18', '1600', 5, 66, '054.01.06.2895.032.503.524119', '46340000', '52560', 5, '380000', '1900000', '4974400', 4, '0', '0', '916000', '7790400', '52530', 5, '2019-03-28 04:10:06', '2019-04-02 15:05:52'),
(28, 2019, '2019-02-18', '2019-02-18', '1600', 5, 66, '054.01.06.2895.032.503.524119', '46340000', '52560', 5, '380000', '1900000', '4974400', 4, '0', '0', '916000', '7790400', '52540', 5, '2019-03-28 04:10:06', '2019-04-02 15:06:10'),
(29, 2019, '2019-02-18', '2019-02-18', '1600', 5, 66, '054.01.06.2895.032.503.524119', '46340000', '52560', 5, '380000', '1900000', '4974400', 4, '0', '0', '916000', '7790400', '52550', 5, '2019-03-28 04:10:06', '2019-04-02 15:06:29'),
(30, 2019, '2019-02-18', '2019-02-18', '1600', 5, 66, '054.01.06.2895.032.503.524119', '46340000', '52560', 5, '380000', '1900000', '4974400', 4, '0', '0', '916000', '7790400', '52560', 5, '2019-03-28 04:10:06', '2019-04-02 15:06:46'),
(31, 2019, '2019-02-19', '2019-02-19', '5204', 3, 45, '054.01.06.2895.024.301.524111', '7778000', '52550', 3, '440000', '1320000', '0', 2, '330000', '660000', '500000', '2480000', '52550', 5, '2019-03-28 04:10:06', '2019-04-02 15:20:43'),
(32, 2019, '2019-02-19', '2019-02-19', '5201', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52540', 5, '2019-03-28 04:10:06', '2019-04-02 15:21:03'),
(33, 2019, '2019-02-19', '2019-02-19', '5201', 1, 38, '054.01.06.2895.020.101.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52540', 5, '2019-03-28 04:10:06', '2019-04-02 15:21:19'),
(34, 2019, '2019-02-19', '2019-02-19', '5201', 1, 37, '054.01.06.2895.020.051.524111', '6170000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52540', 5, '2019-03-28 04:10:06', '2019-04-02 15:21:40'),
(35, 2019, '2019-02-21', '2019-02-21', '5202', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52540', 5, '2019-03-28 04:10:06', '2019-04-03 09:46:20'),
(36, 2019, '2019-02-21', '2019-02-21', '5202', 1, 37, '054.01.06.2895.020.051.524111', '6170000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52540', 5, '2019-03-28 04:10:06', '2019-04-03 09:46:44'),
(37, 2019, '2019-02-21', '2019-02-21', '5202', 1, 38, '054.01.06.2895.020.101.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52540', 5, '2019-03-28 04:10:06', '2019-04-03 09:47:13'),
(38, 2019, '2019-02-21', '2019-02-21', '5202', 1, 38, '054.01.06.2895.020.101.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52540', 5, '2019-03-28 04:10:06', '2019-04-03 09:47:30'),
(39, 2019, '2019-02-22', '2019-02-22', '5203', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52530', 5, '2019-03-28 04:10:06', '2019-04-03 09:47:50'),
(40, 2019, '2019-02-22', '2019-02-22', '5203', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52530', 5, '2019-03-28 04:10:06', '2019-04-03 09:48:15'),
(41, 2019, '2019-02-22', '2019-02-22', '5203', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52530', 5, '2019-03-28 04:10:06', '2019-04-03 09:48:40'),
(42, 2019, '2019-02-14', '2019-02-14', '5203', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:52:20'),
(43, 2019, '2019-02-14', '2019-02-14', '5203', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:52:40'),
(44, 2019, '2019-02-14', '2019-02-14', '5208', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:53:02'),
(45, 2019, '2019-02-14', '2019-02-14', '5208', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:53:18'),
(46, 2019, '2019-02-15', '2019-02-15', '5201', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:53:33'),
(47, 2019, '2019-02-15', '2019-02-15', '5201', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:53:50'),
(48, 2019, '2019-02-15', '2019-02-15', '5201', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:54:07'),
(49, 2019, '2019-02-15', '2019-02-15', '5201', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:54:26'),
(50, 2019, '2019-02-15', '2019-02-15', '5208', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:54:47'),
(51, 2019, '2019-02-18', '2019-02-18', '5201', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 09:55:01'),
(52, 2019, '2019-02-18', '2019-02-18', '5201', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 12:42:23'),
(53, 2019, '2019-02-19', '2019-02-19', '5202', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 12:42:37'),
(54, 2019, '2019-02-20', '2019-02-20', '5202', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 12:42:48'),
(55, 2019, '2019-02-20', '2019-02-20', '5271', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 12:43:03'),
(56, 2019, '2019-02-25', '2019-02-25', '5271', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '180000', '180000', '0', 0, '0', '0', '150000', '330000', '52530', 5, '2019-03-28 04:10:06', '2019-04-03 12:43:19'),
(57, 2019, '2019-02-26', '2019-02-26', '5201', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52530', 5, '2019-03-28 04:10:06', '2019-04-03 12:43:58'),
(58, 2019, '2019-02-26', '2019-02-26', '5201', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52530', 5, '2019-03-28 04:10:06', '2019-04-03 12:44:16'),
(59, 2019, '2019-02-26', '2019-02-26', '5201', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52530', 5, '2019-03-28 04:10:06', '2019-04-04 16:26:39'),
(60, 2019, '2019-02-26', '2019-02-26', '5201', 1, 63, '054.01.06.2895.038.054.524111', '15425000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52530', 5, '2019-03-28 04:10:06', '2019-04-04 16:26:56'),
(61, 2019, '2019-02-26', '2019-02-26', '5203', 1, 38, '054.01.06.2895.020.101.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52540', 5, '2019-03-28 04:10:06', '2019-04-04 16:27:13'),
(62, 2019, '2019-02-26', '2019-02-26', '5203', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52540', 5, '2019-03-28 04:10:06', '2019-04-04 16:27:35'),
(63, 2019, '2019-02-26', '2019-02-26', '5203', 1, 37, '054.01.06.2895.020.051.524111', '6170000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52540', 5, '2019-03-28 04:10:06', '2019-04-04 16:28:23'),
(64, 2019, '2019-02-26', '2019-02-26', '5203', 1, 38, '054.01.06.2895.020.101.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52540', 5, '2019-03-28 04:10:06', '2019-04-04 16:28:41'),
(65, 2019, '2019-02-26', '2019-02-26', '5203', 1, 38, '054.01.06.2895.020.101.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52540', 5, '2019-03-28 04:10:06', '2019-04-04 16:28:54'),
(66, 2019, '2019-02-26', '2019-02-26', '5203', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52540', 5, '2019-03-28 04:10:06', '2019-04-04 16:29:17'),
(67, 2019, '2019-03-04', '2019-03-04', '5271', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52520', 5, '2019-03-28 04:10:06', '2019-04-04 16:29:47'),
(68, 2019, '2019-03-05', '2019-03-05', '5202', 1, 8, '054.01.06.2895.006.100.524111', '9255000', '52520', 1, '295000', '295000', '0', 0, '0', '0', '0', '295000', '52520', 5, '2019-03-28 04:10:06', '2019-04-04 16:30:02'),
(69, 2019, '2019-02-26', '2019-02-26', '5208', 1, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52510', 5, '2019-03-28 04:10:06', '2019-04-04 16:30:20'),
(70, 2019, '2019-02-26', '2019-02-26', '5208', 1, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52510', 5, '2019-03-28 04:10:06', '2019-04-04 16:30:32'),
(71, 2019, '2019-03-06', '2019-03-06', '5271', 1, 42, '054.01.06.2895.022.903.524111', '2600000', '52540', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52540', 5, '2019-03-28 04:10:06', '2019-04-04 16:30:46'),
(72, 2019, '2019-03-06', '2019-03-06', '5271', 1, 42, '054.01.06.2895.022.903.524111', '2600000', '52540', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52540', 5, '2019-03-28 04:10:06', '2019-04-04 16:30:58'),
(73, 2019, '2019-03-06', '2019-03-06', '5271', 1, 42, '054.01.06.2895.022.903.524111', '2600000', '52540', 1, '180000', '180000', '0', 0, '0', '0', '150000', '330000', '52540', 5, '2019-03-28 04:10:06', '2019-04-05 14:05:35'),
(74, 2019, '2019-03-06', '2019-03-06', '5271', 1, 42, '054.01.06.2895.022.903.524111', '2600000', '52540', 1, '180000', '180000', '0', 0, '0', '0', '150000', '330000', '52540', 5, '2019-03-28 04:10:06', '2019-04-05 14:05:47'),
(75, 2019, '2019-03-08', '2019-03-08', '5208', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52520', 5, '2019-03-28 04:10:06', '2019-04-05 14:06:00'),
(76, 2019, '2019-03-08', '2019-03-08', '5208', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52520', 5, '2019-03-28 04:10:06', '2019-04-05 14:06:10'),
(77, 2019, '2019-03-08', '2019-03-08', '5208', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52520', 5, '2019-03-28 04:10:06', '2019-04-05 14:06:24'),
(78, 2019, '2019-03-12', '2019-03-12', '5202', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52520', 5, '2019-03-28 04:10:06', '2019-04-03 12:43:41'),
(79, 2019, '2019-03-12', '2019-03-12', '5202', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52520', 5, '2019-03-28 04:10:06', '2019-04-05 14:06:39'),
(80, 2019, '2019-03-12', '2019-03-12', '5202', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52520', 5, '2019-03-28 04:10:06', '2019-04-05 14:06:50'),
(81, 2019, '2019-03-13', '2019-03-13', '5201', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52520', 5, '2019-03-28 04:10:06', '2019-04-05 14:07:05'),
(82, 2019, '2019-03-13', '2019-03-13', '5201', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52520', 5, '2019-03-28 04:10:06', '2019-04-05 14:07:16'),
(83, 2019, '2019-03-14', '2019-03-14', '5203', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52520', 5, '2019-03-28 04:10:06', '2019-04-05 14:07:27'),
(84, 2019, '2019-03-15', '2019-03-15', '5271', 1, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52520', 5, '2019-03-28 04:10:06', '2019-04-05 14:07:38'),
(85, 2019, '2019-03-15', '2019-03-15', '5201', 1, 55, '054.01.06.2895.028.200.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:30:18'),
(86, 2019, '2019-03-15', '2019-03-15', '5201', 1, 51, '054.01.06.2895.027.051.524111', '9255000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:30:36'),
(87, 2019, '2019-03-25', '2019-03-25', '5208', 1, 51, '054.01.06.2895.027.051.524111', '9255000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:30:56'),
(88, 2019, '2019-03-25', '2019-03-25', '5208', 1, 52, '054.01.06.2895.028.100.524111', '7778000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:31:13'),
(89, 2019, '2019-03-25', '2019-03-25', '5208', 1, 52, '054.01.06.2895.028.100.524111', '7778000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:32:31'),
(90, 2019, '2019-03-26', '2019-03-26', '5202', 1, 26, '054.01.06.2895.015.301.524111', '6170000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:32:49'),
(91, 2019, '2019-03-13', '2019-03-13', '3100', 3, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 3, '530000', '1590000', '3799200', 2, '950000', '1900000', '812000', '8101200', '52510', 5, '2019-03-28 04:10:06', '2019-04-16 06:33:14'),
(92, 2019, '2019-03-13', '2019-03-13', '3100', 3, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 3, '530000', '1590000', '3799200', 2, '950000', '1900000', '812000', '8101200', '52510', 5, '2019-03-28 04:10:06', '2019-04-16 06:33:32'),
(93, 2019, '2019-03-13', '2019-03-13', '3100', 3, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 3, '530000', '1590000', '3799200', 2, '950000', '1900000', '812000', '8101200', '52510', 5, '2019-03-28 04:10:06', '2019-04-16 06:33:46'),
(94, 2019, '2019-03-13', '2019-03-13', '3100', 3, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 3, '530000', '1590000', '3799200', 2, '950000', '1900000', '812000', '8101200', '52510', 5, '2019-03-28 04:10:06', '2019-04-16 06:34:03'),
(95, 2019, '2019-03-13', '2019-03-13', '5204', 3, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 3, '440000', '1320000', '1062400', 2, '0', '0', '348000', '2730400', '52520', 5, '2019-03-28 04:10:06', '2019-04-16 06:34:34'),
(96, 2019, '2019-03-15', '2019-03-15', '5272', 3, 11, '054.01.06.2895.009.051.524111', '15425000', '52520', 3, '440000', '1320000', '1041800', 2, '0', '0', '698000', '3059800', '52520', 5, '2019-03-28 04:10:06', '2019-04-16 06:38:58'),
(97, 2019, '2019-03-14', '2019-03-14', '5271', 1, 24, '054.01.06.2895.015.101.524111', '3085000', '52530', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:39:17'),
(98, 2019, '2019-03-14', '2019-03-14', '5201', 1, 4, '054.01.01.2886.970.055.524111', '14020000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52510', 5, '2019-03-28 04:10:06', '2019-04-16 06:40:19'),
(99, 2019, '2019-03-14', '2019-03-14', '5201', 1, 4, '054.01.01.2886.970.055.524111', '14020000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52510', 5, '2019-03-28 04:10:06', '2019-04-16 06:40:35'),
(100, 2019, '2019-03-18', '2019-03-18', '5202', 1, 24, '054.01.06.2895.015.101.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:40:55'),
(101, 2019, '2019-03-19', '2019-03-19', '5201', 1, 24, '054.01.06.2895.015.101.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:41:06'),
(102, 2019, '2019-03-19', '2019-03-19', '3100', 4, 20, '054.01.06.2895.015.051.524111', '3085000', '52530', 4, '530000', '2120000', '3799200', 3, '850000', '2550000', '812000', '9281200', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 06:32:05'),
(103, 2019, '2019-03-19', '2019-03-19', '5203', 1, 2, '054.01.01.2886.970.052.524111', '11849000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52510', 5, '2019-03-28 04:10:06', '2019-04-16 07:07:47'),
(104, 2019, '2019-03-19', '2019-03-19', '5202', 1, 2, '054.01.01.2886.970.052.524111', '11849000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52510', 5, '2019-03-28 04:10:06', '2019-04-16 07:08:06'),
(105, 2019, '2019-03-19', '2019-03-19', '5203', 1, 56, '054.01.06.2895.029.100.524111', '7778000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:08:24'),
(106, 2019, '2019-03-22', '2019-03-22', '5201', 1, 24, '054.01.06.2895.015.101.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52530', 5, '2019-03-28 04:10:06', '2019-04-16 07:08:39'),
(107, 2019, '2019-03-22', '2019-03-22', '5202', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:08:59'),
(108, 2019, '2019-03-22', '2019-03-22', '5202', 1, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:09:12'),
(109, 2019, '2019-03-27', '2019-03-27', '5272', 3, 39, '054.01.06.2895.020.200.524111', '9255000', '52540', 3, '440000', '1320000', '1059000', 2, '0', '0', '500000', '2879000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:09:31'),
(110, 2019, '2019-03-27', '2019-03-27', '5272', 3, 39, '054.01.06.2895.020.200.524111', '9255000', '52540', 3, '440000', '1320000', '1059000', 2, '0', '0', '500000', '2879000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:09:48'),
(111, 2019, '2019-03-25', '2019-03-25', '5203', 1, 62, '054.01.06.2895.035.500.524111', '6170000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:10:08'),
(112, 2019, '2019-03-27', '2019-03-27', '5204', 3, 62, '054.01.06.2895.035.500.524111', '6170000', '52540', 3, '440000', '1320000', '0', 2, '0', '0', '300000', '1620000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:10:23'),
(113, 2019, '2019-03-27', '2019-03-27', '5204', 3, 62, '054.01.06.2895.035.500.524111', '6170000', '52540', 3, '440000', '1320000', '0', 2, '0', '0', '300000', '1620000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:10:50'),
(114, 2019, '2019-03-27', '2019-03-27', '5208', 1, 62, '054.01.06.2895.035.500.524111', '6170000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:11:09'),
(115, 2019, '2019-03-27', '2019-03-27', '5208', 1, 62, '054.01.06.2895.035.500.524111', '6170000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52540', 5, '2019-03-28 04:10:06', '2019-04-16 07:11:25'),
(116, 2019, '2019-04-24', '2019-04-27', '5205', 4, 19, '054.01.06.2895.014.200.524111', '6170000', '52530', 4, '440000', '1320000', '600000', 3, '400000', '800000', '0', '2720000', '52530', 5, '2019-04-16 08:53:16', '2019-05-14 02:14:12'),
(117, 2019, '2019-03-29', '2019-03-29', '5271', 1, 67, '054.01.06.2895.026.051.524113', '600000', '52550', 1, '180000', '180000', '0', 0, '0', '0', '150000', '330000', '52550', 5, '2019-04-18 08:29:21', '2019-04-18 09:06:24'),
(118, 2019, '2019-04-02', '2019-04-02', '5203', 1, 24, '054.01.06.2895.015.101.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52530', 5, '2019-04-18 08:29:21', '2019-04-18 09:06:48'),
(119, 2019, '2019-04-02', '2019-04-02', '5203', 1, 20, '054.01.06.2895.015.051.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52530', 5, '2019-04-18 08:29:21', '2019-04-18 09:07:03'),
(120, 2019, '2019-04-04', '2019-04-04', '5201', 1, 20, '054.01.06.2895.015.051.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52530', 5, '2019-04-18 08:29:21', '2019-04-18 09:07:18'),
(121, 2019, '2019-04-05', '2019-04-05', '5271', 1, 20, '054.01.06.2895.015.051.524111', '3085000', '52530', 1, '180000', '180000', '0', 0, '0', '0', '150000', '330000', '52530', 5, '2019-04-18 08:29:21', '2019-04-18 09:07:34'),
(122, 2019, '2019-03-30', '2019-03-30', '5271', 1, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52560', 5, '2019-04-18 08:29:21', '2019-04-18 09:07:54'),
(123, 2019, '2019-03-31', '2019-03-31', '5271', 1, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52560', 5, '2019-04-18 08:29:21', '2019-04-18 09:08:15'),
(124, 2019, '2019-04-03', '2019-04-03', '5299', 5, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 5, '440000', '2200000', '0', 4, '1530000', '6120000', '0', '8320000', '52510', 5, '2019-04-18 08:29:21', '2019-04-18 09:08:29'),
(125, 2019, '2019-04-03', '2019-04-03', '5206', 3, 18, '054.01.06.2895.014.100.524111', '12340000', '52530', 3, '440000', '1320000', '603200', 2, '480000', '960000', '700000', '3583200', '52530', 5, '2019-04-18 08:29:21', '2019-04-18 09:08:45'),
(126, 2019, '2019-04-03', '2019-04-03', '5205', 3, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 3, '440000', '1320000', '853100', 2, '450000', '900000', '650000', '3723100', '52560', 5, '2019-04-18 08:29:21', '2019-04-18 09:09:01'),
(127, 2019, '2019-04-04', '2019-04-04', '5202', 1, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52560', 5, '2019-04-18 08:29:21', '2019-04-18 09:09:13'),
(128, 2019, '2019-04-06', '2019-04-06', '5207', 3, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 3, '440000', '1320000', '0', 2, '310000', '620000', '450000', '2390000', '52560', 5, '2019-04-18 08:29:21', '2019-04-18 09:09:28'),
(129, 2019, '2019-04-03', '2019-04-03', '5299', 5, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 5, '440000', '2200000', '0', 4, '800000', '3200000', '0', '5400000', '52510', 5, '2019-04-18 08:29:21', '2019-04-18 09:09:44'),
(130, 2019, '2019-04-02', '2019-04-02', '5201', 1, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52560', 2, '2019-04-18 08:29:21', '2019-04-20 15:52:54'),
(131, 2019, '2019-04-07', '2019-04-07', '5206', 3, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 3, '440000', '1320000', '603200', 2, '480000', '960000', '700000', '3583200', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 14:43:35'),
(132, 2019, '2019-04-02', '2019-04-02', '5271', 1, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 1, '180000', '180000', '0', 0, '0', '0', '150000', '330000', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 14:44:01'),
(133, 2019, '2019-04-08', '2019-04-08', '5271', 1, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52560', 2, '2019-04-18 08:29:21', '2019-04-20 15:53:17'),
(134, 2019, '2019-04-10', '2019-04-10', '5202', 1, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 14:44:46'),
(135, 2019, '2019-04-09', '2019-04-09', '5271', 1, 18, '054.01.06.2895.014.100.524111', '12340000', '52530', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52530', 2, '2019-04-18 08:29:21', '2019-04-20 15:53:40'),
(136, 2019, '2019-04-09', '2019-04-09', '5272', 3, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 3, '440000', '1320000', '984900', 2, '990000', '1980000', '700000', '4984900', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 14:45:41'),
(137, 2019, '2019-03-26', '2019-03-26', '5271', 1, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 1, '180000', '180000', '0', 0, '0', '0', '0', '180000', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 15:03:12'),
(138, 2019, '2019-03-27', '2019-03-27', '5201', 1, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 15:03:28'),
(139, 2019, '2019-04-03', '2019-04-03', '3100', 4, 15, '054.01.06.2895.011.602.524111', '19409000', '52520', 4, '440000', '1760000', '2540800', 3, '580000', '1740000', '812000', '6852800', '52520', 5, '2019-04-18 08:29:21', '2019-04-20 14:42:41'),
(140, 2019, '2019-04-04', '2019-04-04', '5201', 1, 56, '054.01.06.2895.029.100.524111', '7778000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52540', 5, '2019-04-18 08:29:21', '2019-04-20 15:04:14'),
(141, 2019, '2019-04-08', '2019-04-08', '5202', 1, 56, '054.01.06.2895.029.100.524111', '7778000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52540', 5, '2019-04-18 08:29:21', '2019-04-20 15:04:30'),
(142, 2019, '2019-04-04', '2019-04-04', '5202', 1, 16, '054.01.06.2895.014.051.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52530', 5, '2019-04-18 08:29:21', '2019-04-20 15:04:44'),
(143, 2019, '2019-04-02', '2019-04-02', '3372', 4, 68, '054.01.06.2895.038.054.524119', '7879100', '52530', 4, '440000', '1760000', '5004100', 3, '495000', '1485000', '510000', '8759100', '52530', 5, '2019-04-18 08:29:21', '2019-04-20 15:04:58'),
(144, 2019, '2019-04-08', '2019-04-08', '5203', 1, 4, '054.01.01.2886.970.055.524111', '14020000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52510', 5, '2019-04-18 08:29:21', '2019-04-20 15:05:25'),
(145, 2019, '2019-04-08', '2019-04-08', '5202', 1, 4, '054.01.01.2886.970.055.524111', '14020000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52510', 5, '2019-04-18 08:29:21', '2019-04-20 15:05:41'),
(146, 2019, '2019-04-08', '2019-04-08', '5203', 1, 4, '054.01.01.2886.970.055.524111', '14020000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52510', 5, '2019-04-18 08:29:21', '2019-04-20 15:05:55'),
(147, 2019, '2019-04-08', '2019-04-08', '5202', 1, 56, '054.01.06.2895.029.100.524111', '7778000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52540', 5, '2019-04-18 08:29:21', '2019-04-20 15:06:08'),
(148, 2019, '2019-04-08', '2019-04-08', '5201', 1, 56, '054.01.06.2895.029.100.524111', '7778000', '52540', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52540', 5, '2019-04-18 08:29:21', '2019-04-20 15:06:23'),
(149, 2019, '2019-04-09', '2019-04-09', '5207', 3, 35, '054.01.06.2895.017.910.524111', '3085000', '52540', 3, '440000', '1320000', '0', 2, '310000', '620000', '450000', '2390000', '52540', 5, '2019-04-18 08:29:21', '2019-04-20 15:06:43'),
(150, 2019, '2019-04-09', '2019-04-09', '5207', 3, 56, '054.01.06.2895.029.100.524111', '7778000', '52540', 3, '440000', '1320000', '0', 2, '310000', '620000', '450000', '2390000', '52540', 5, '2019-04-18 08:29:21', '2019-04-20 15:06:58'),
(151, 2019, '2019-04-15', '2019-04-15', '5206', 3, 44, '054.01.06.2895.023.200.524111', '9255000', '52540', 3, '440000', '1320000', '0', 2, '0', '0', '700000', '2020000', '52540', 5, '2019-04-18 08:29:21', '2019-04-20 15:07:23'),
(152, 2019, '2019-04-09', '2019-04-09', '5272', 3, 65, '054.01.06.2895.040.502.524111', '7778000', '52550', 3, '440000', '1320000', '1123752', 2, '770000', '1540000', '700000', '4683752', '52550', 5, '2019-04-18 08:29:21', '2019-04-20 15:07:40'),
(153, 2019, '2019-04-11', '2019-04-11', '5208', 1, 52, '054.01.06.2895.028.100.524111', '7778000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52530', 5, '2019-04-18 08:29:21', '2019-04-20 15:07:52'),
(154, 2019, '2019-04-11', '2019-04-11', '5208', 1, 52, '054.01.06.2895.028.100.524111', '7778000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52530', 5, '2019-04-18 08:29:21', '2019-04-20 15:08:05'),
(155, 2019, '2019-04-11', '2019-04-11', '5208', 1, 61, '054.01.06.2895.034.500.524111', '15640000', '52550', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52550', 5, '2019-04-18 08:29:21', '2019-04-20 15:08:17'),
(156, 2019, '2019-04-10', '2019-04-10', '5202', 1, 5, '054.01.01.2886.994.002E.524111', '28900000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52510', 5, '2019-04-18 08:29:21', '2019-04-20 15:08:34'),
(157, 2019, '2019-04-18', '2019-04-18', '5201', 1, 52, '054.01.06.2895.028.100.524111', '7778000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52530', 5, '2019-04-18 08:29:21', '2019-04-20 15:08:54'),
(158, 2019, '2019-04-15', '2019-04-15', '5202', 1, 52, '054.01.06.2895.028.100.524111', '7778000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52530', 5, '2019-04-18 08:29:21', '2019-04-20 15:09:07'),
(159, 2019, '2019-04-15', '2019-04-15', '5202', 1, 61, '054.01.06.2895.034.500.524111', '15640000', '52550', 1, '440000', '440000', '0', 0, '0', '0', '265000', '705000', '52550', 5, '2019-04-18 08:29:21', '2019-04-20 15:09:27'),
(160, 2019, '2019-04-18', '2019-04-18', '5202', 1, 24, '054.01.06.2895.015.101.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '0', '440000', '52530', 5, '2019-04-18 08:29:21', '2019-04-20 15:09:39'),
(161, 2019, '2019-04-16', '2019-04-16', '5201', 1, 4, '054.01.01.2886.970.055.524111', '14020000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '225000', '665000', '52510', 5, '2019-04-18 08:29:21', '2019-04-20 15:09:52'),
(162, 2019, '2019-04-16', '2019-04-16', '5208', 1, 4, '054.01.01.2886.970.055.524111', '14020000', '52510', 1, '440000', '440000', '0', 0, '0', '0', '325000', '765000', '52510', 5, '2019-04-18 08:29:21', '2019-04-20 15:10:07'),
(163, 2019, '2019-04-18', '2019-04-18', '5203', 1, 16, '054.01.06.2895.014.051.524111', '3085000', '52530', 1, '440000', '440000', '0', 0, '0', '0', '350000', '790000', '52530', 5, '2019-04-18 08:29:21', '2019-04-20 15:10:19'),
(164, 2019, '2019-03-26', '2019-03-26', '5271', 8, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 8, '180000', '1440000', '0', 7, '0', '0', '150000', '1590000', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 15:10:47'),
(165, 2019, '2019-03-30', '2019-03-30', '5271', 4, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 4, '45000', '180000', '0', 3, '0', '0', '150000', '330000', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 15:11:05'),
(166, 2019, '2019-04-04', '2019-04-04', '5202', 3, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 3, '440000', '1320000', '0', 2, '0', '0', '265000', '1585000', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 15:11:21'),
(167, 2019, '2019-04-04', '2019-04-04', '5202', 3, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 3, '440000', '1320000', '0', 2, '0', '0', '265000', '1585000', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 15:18:11'),
(168, 2019, '2019-04-07', '2019-04-07', '5271', 4, 59, '054.01.06.2895.032.503.524111', '43916000', '52560', 4, '45000', '180000', '0', 3, '0', '0', '150000', '330000', '52560', 5, '2019-04-18 08:29:21', '2019-04-20 15:11:48');

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
(76, '19700723 199211 1 001', 'Roedi Joelianto', '1970-07-23', 1, '34', '52551', 3, 0, 0, '2019-04-02 01:33:40', '2019-04-02 01:33:40');

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
  `flag_cetak_tujuan` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spd`
--

INSERT INTO `spd` (`spd_id`, `trx_id`, `nomor_spd`, `kendaraan`, `ppk_nip`, `ppk_nama`, `flag_ttd`, `flag_spd`, `flag_cetak_tujuan`, `created_at`, `updated_at`) VALUES
(1, 1, 'B-001/BPS/52514/1/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 07:07:44', '2019-03-28 08:04:22'),
(2, 2, 'B-002/BPS/52514/1/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 07:08:02', '2019-03-28 08:11:43'),
(3, 3, 'B-003/BPS/52514/1/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 07:08:16', '2019-03-28 08:48:47'),
(4, 4, 'B-004/BPS/52514/1/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-03-28 07:08:30', '2019-03-28 08:51:43'),
(5, 5, 'B-005/BPS/52514/1/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 07:08:41', '2019-03-28 08:52:50'),
(6, 6, 'B-006/BPS/52514/1/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 07:08:55', '2019-03-28 08:53:32'),
(7, 7, 'B-007/BPS/52514/1/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 07:09:12', '2019-03-28 08:54:14'),
(8, 8, 'B-008/BPS/52514/1/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 07:09:26', '2019-03-28 08:55:14'),
(9, 9, 'B-009/BPS/52514/1/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 09:23:51', '2019-03-30 03:18:47'),
(10, 10, 'B-010/BPS/52514/1/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 09:24:01', '2019-03-30 03:19:13'),
(11, 11, 'B-011/BPS/52514/1/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 09:27:08', '2019-03-30 03:19:31'),
(12, 12, 'B-012/BPS/52514/1/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 09:27:18', '2019-03-30 03:19:52'),
(13, 23, 'B-023/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 15:04:54', '2019-03-30 03:20:17'),
(14, 13, 'B-013/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 3, 0, '2019-03-28 15:05:05', '2019-03-28 15:34:42'),
(15, 14, 'B-014/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 3, 0, '2019-03-28 15:05:14', '2019-03-28 15:43:43'),
(16, 15, 'B-015/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 3, 0, '2019-03-28 15:05:28', '2019-03-28 15:43:50'),
(17, 16, 'B-016/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 3, 0, '2019-03-28 15:05:44', '2019-03-28 15:43:56'),
(18, 17, 'B-017/BPS/52514/2/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 15:12:28', '2019-03-30 03:20:39'),
(19, 18, 'B-018/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 15:12:44', '2019-03-30 03:21:04'),
(20, 19, 'B-019/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 15:12:59', '2019-03-30 03:21:27'),
(21, 20, 'B-020/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 15:13:16', '2019-03-30 03:25:12'),
(22, 21, 'B-021/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 15:13:51', '2019-03-30 03:23:47'),
(23, 22, 'B-022/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-03-28 15:14:12', '2019-03-30 03:24:23'),
(24, 24, 'B-024/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-03-30 03:38:08', '2019-04-02 01:21:12'),
(25, 25, 'B-025/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-03-30 03:38:13', '2019-04-02 01:22:22'),
(26, 27, 'B-027/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-03-30 03:38:17', '2019-04-02 01:24:37'),
(27, 28, 'B-028/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-03-30 03:38:22', '2019-04-02 01:25:20'),
(28, 29, 'B-029/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-03-30 03:38:26', '2019-04-02 01:25:52'),
(29, 30, 'B-030/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-03-30 03:38:31', '2019-04-02 01:26:25'),
(30, 26, 'B-026/BPS/52514/2/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-04-02 01:12:59', '2019-04-02 01:23:22'),
(31, 31, 'B-031/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-02 15:19:09', '2019-04-02 15:23:59'),
(32, 32, 'B-032/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-02 15:19:20', '2019-04-02 15:24:32'),
(33, 33, 'B-033/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-02 15:19:32', '2019-04-02 15:24:53'),
(34, 34, 'B-034/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-02 15:19:42', '2019-04-02 15:25:22'),
(35, 35, 'B-035/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-02 16:10:55', '2019-04-03 10:01:15'),
(36, 36, 'B-036/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-02 16:11:27', '2019-04-03 10:01:33'),
(37, 37, 'B-037/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-02 16:11:38', '2019-04-03 10:07:13'),
(38, 38, 'B-038/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-02 16:11:51', '2019-04-03 10:07:34'),
(39, 39, 'B-039/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:03:24', '2019-04-03 10:07:57'),
(40, 40, 'B-040/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:03:41', '2019-04-03 10:08:32'),
(41, 41, 'B-041/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:03:56', '2019-04-03 10:08:52'),
(42, 42, 'B-042/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:05:05', '2019-04-03 10:09:15'),
(43, 43, 'B-043/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:05:18', '2019-04-03 10:09:34'),
(44, 44, 'B-044/BPS/52514/2/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:05:35', '2019-04-03 12:47:00'),
(45, 45, 'B-045/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:05:52', '2019-04-03 12:48:34'),
(46, 46, 'B-046/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:06:09', '2019-04-03 12:48:49'),
(47, 47, 'B-047/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:44:06', '2019-04-03 12:49:23'),
(48, 48, 'B-048/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:44:13', '2019-04-03 12:49:39'),
(49, 49, 'B-049/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:44:19', '2019-04-03 12:49:53'),
(50, 50, 'B-050/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:44:26', '2019-04-03 12:50:10'),
(51, 51, 'B-051/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 09:44:32', '2019-04-03 12:51:04'),
(52, 52, 'B-052/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:26:20', '2019-04-03 12:52:54'),
(53, 53, 'B-053/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:26:27', '2019-04-03 12:53:10'),
(54, 54, 'B-054/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:26:32', '2019-04-03 12:53:43'),
(55, 55, 'B-055/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:26:39', '2019-04-03 12:55:06'),
(56, 56, 'B-056/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:26:49', '2019-04-03 12:55:26'),
(57, 57, 'B-057/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:26:56', '2019-04-03 12:50:39'),
(58, 58, 'B-058/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:27:03', '2019-04-03 12:54:08'),
(59, 59, 'B-059/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:27:09', '2019-04-03 12:52:32'),
(60, 60, 'B-060/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:27:16', '2019-04-04 16:31:19'),
(61, 61, 'B-061/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:27:22', '2019-04-04 16:31:31'),
(62, 62, 'B-062/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:27:32', '2019-04-04 16:31:51'),
(63, 63, 'B-063/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:27:39', '2019-04-04 16:32:11'),
(64, 64, 'B-064/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:27:48', '2019-04-05 13:45:29'),
(65, 65, 'B-065/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:27:55', '2019-04-05 13:45:53'),
(66, 66, 'B-066/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:28:02', '2019-04-05 13:46:13'),
(67, 67, 'B-067/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:28:09', '2019-04-05 13:46:48'),
(68, 68, 'B-068/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:28:15', '2019-04-05 13:47:31'),
(69, 69, 'B-069/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:28:21', '2019-04-05 13:48:38'),
(70, 70, 'B-070/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:28:29', '2019-04-05 13:49:05'),
(71, 71, 'B-071/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:28:34', '2019-04-05 13:50:39'),
(72, 72, 'B-072/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:28:43', '2019-04-05 13:50:53'),
(73, 73, 'B-073/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:28:49', '2019-04-05 13:49:35'),
(74, 74, 'B-074/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:28:57', '2019-04-05 14:09:13'),
(75, 75, 'B-075/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:29:10', '2019-04-05 14:09:27'),
(76, 76, 'B-076/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:29:15', '2019-04-05 14:09:42'),
(77, 77, 'B-077/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:29:22', '2019-04-05 14:10:00'),
(78, 78, 'B-078/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:29:28', '2019-04-05 14:10:13'),
(79, 79, 'B-079/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:29:34', '2019-04-05 14:10:29'),
(80, 80, 'B-080/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:29:40', '2019-04-05 14:10:44'),
(81, 81, 'B-081/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:29:46', '2019-04-05 14:11:00'),
(82, 82, 'B-082/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:29:52', '2019-04-05 14:11:13'),
(83, 83, 'B-083/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:29:58', '2019-04-05 14:11:26'),
(84, 84, 'B-084/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-03 11:30:04', '2019-04-05 14:11:46'),
(85, 85, 'B-085/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:01:22', '2019-04-16 06:45:49'),
(86, 86, 'B-086/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:02:19', '2019-04-16 06:46:15'),
(87, 87, 'B-110/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:02:35', '2019-04-16 06:46:36'),
(88, 88, 'B-111/BPS/52514/3/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:02:49', '2019-04-16 06:48:03'),
(89, 102, 'B-098/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:03:15', '2019-04-16 06:49:36'),
(90, 89, 'B-112/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:52:12', '2019-04-16 06:49:52'),
(91, 90, 'B-113/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:52:24', '2019-04-16 06:50:04'),
(92, 91, 'B-087/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-04-07 05:52:35', '2019-04-16 06:51:12'),
(93, 92, 'B-089/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-04-07 05:52:48', '2019-04-16 06:52:05'),
(94, 93, 'B-088/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-04-07 05:53:02', '2019-04-16 06:52:50'),
(95, 94, 'B-090/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-04-07 05:53:14', '2019-04-16 06:53:15'),
(96, 95, 'B-091/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:53:27', '2019-04-16 06:54:22'),
(97, 96, 'B-092/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:53:40', '2019-04-16 06:55:15'),
(98, 97, 'B-093/BPS/52514/3/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:54:28', '2019-04-16 06:55:36'),
(99, 98, 'B-094/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:55:43', '2019-04-16 06:55:53'),
(100, 99, 'B-095/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:55:55', '2019-04-16 06:56:10'),
(101, 100, 'B-096/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:56:05', '2019-04-16 06:56:56'),
(102, 101, 'B-097/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-07 05:56:15', '2019-04-16 06:57:12'),
(103, 103, 'B-099/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:05:23', '2019-04-16 07:15:03'),
(104, 104, 'B-100/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:05:33', '2019-04-16 07:15:16'),
(105, 105, 'B-101/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:05:49', '2019-04-16 07:15:43'),
(106, 106, 'B-102/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:06:17', '2019-04-16 07:15:59'),
(107, 107, 'B-103/BPS/52514/3/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:06:20', '2019-04-16 07:16:11'),
(108, 108, 'B-104/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:06:27', '2019-04-16 07:16:25'),
(109, 109, 'B-105/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:06:34', '2019-04-16 07:22:41'),
(110, 110, 'B-106/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:06:42', '2019-04-16 07:23:05'),
(111, 111, 'B-107/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:06:52', '2019-04-16 07:23:22'),
(112, 112, 'B-108/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:07:01', '2019-04-16 07:25:21'),
(113, 113, 'B-109/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:07:10', '2019-04-16 07:25:39'),
(114, 114, 'B-110/BPS/52514/3/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:07:22', '2019-04-16 07:25:53'),
(115, 115, 'B-111/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 07:07:27', '2019-04-16 07:26:06'),
(116, 116, 'B-173/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-16 08:55:25', '2019-05-14 02:53:35'),
(117, 117, 'B-116/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:52:33', '2019-04-20 15:32:53'),
(118, 118, 'B-117/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:52:49', '2019-04-20 15:33:11'),
(119, 119, 'B-118/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:56:36', '2019-04-20 15:33:26'),
(120, 120, 'B-119/BPS/52514/3/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:56:39', '2019-04-20 15:33:57'),
(121, 121, 'B-120/BPS/52514/3/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:56:42', '2019-04-20 15:35:29'),
(122, 122, 'B-121/BPS/52514/3/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:57:42', '2019-04-20 15:35:49'),
(123, 123, 'B-122/BPS/52514/3/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:57:45', '2019-04-20 15:36:13'),
(124, 124, 'B-127/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-04-18 08:57:50', '2019-04-20 15:42:27'),
(125, 125, 'B-128/BPS/52514/4/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:57:53', '2019-04-20 15:47:41'),
(126, 126, 'B-129/BPS/52514/4/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:57:56', '2019-04-20 15:49:15'),
(127, 127, 'B-130/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:57:59', '2019-04-20 15:49:32'),
(128, 128, 'B-131/BPS/52514/4/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-18 08:58:01', '2019-04-20 15:51:22'),
(129, 129, 'B-132/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-04-18 08:58:05', '2019-04-20 15:52:08'),
(130, 130, 'B-125/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 3, 0, '2019-04-18 08:58:08', '2019-04-20 15:52:54'),
(131, 139, 'B-138/BPS/52514/4/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-04-20 14:19:16', '2019-04-20 15:55:27'),
(132, 131, 'B-133/BPS/52514/4/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:34:15', '2019-04-20 15:56:35'),
(133, 132, 'B-126/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:34:25', '2019-04-20 15:57:35'),
(134, 133, 'B-134/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 3, 0, '2019-04-20 14:34:36', '2019-04-20 15:53:17'),
(135, 134, 'B-137/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:34:46', '2019-04-20 15:57:55'),
(136, 135, 'B-135/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 3, 0, '2019-04-20 14:34:57', '2019-04-20 15:53:40'),
(137, 136, 'B-136/BPS/52514/4/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:35:07', '2019-04-20 15:58:56'),
(138, 137, 'B-123/BPS/52514/3/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:35:19', '2019-04-20 15:59:10'),
(139, 138, 'B-124/BPS/52514/3/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:35:29', '2019-04-20 15:59:29'),
(140, 140, 'B-139/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:35:39', '2019-04-20 16:00:02'),
(141, 141, 'B-140/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:35:48', '2019-04-20 16:00:17'),
(142, 142, 'B-141/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:35:57', '2019-04-20 16:00:30'),
(143, 143, 'B-142/BPS/52514/4/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 1, '2019-04-20 14:36:30', '2019-04-20 16:03:45'),
(144, 144, 'B-143/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:36:39', '2019-04-20 16:04:03'),
(145, 145, 'B-144/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:36:57', '2019-04-20 16:04:15'),
(146, 146, 'B-145/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:37:08', '2019-04-20 16:04:34'),
(147, 147, 'B-146/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:37:22', '2019-04-20 16:05:00'),
(148, 148, 'B-147/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:37:34', '2019-04-20 16:05:22'),
(149, 149, 'B-148/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:37:47', '2019-04-20 16:06:15'),
(150, 150, 'B-149/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:37:59', '2019-04-20 16:06:34'),
(151, 151, 'B-150/BPS/52514/4/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:38:12', '2019-05-14 01:02:37'),
(152, 152, 'B-151/BPS/52514/4/2019', 3, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:38:27', '2019-04-20 16:08:27'),
(153, 153, 'B-152/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:38:43', '2019-04-20 16:09:18'),
(154, 154, 'B-153/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:38:52', '2019-04-20 16:09:43'),
(155, 155, 'B-154/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:39:02', '2019-04-20 16:10:38'),
(156, 156, 'B-155/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:39:12', '2019-04-20 16:10:55'),
(157, 157, 'B-156/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:39:21', '2019-05-14 01:11:45'),
(158, 158, 'B-157/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:39:30', '2019-05-14 01:11:11'),
(159, 159, 'B-158/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:40:45', '2019-05-14 01:03:50'),
(160, 160, 'B-159/BPS/52514/4/2019', 2, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:40:52', '2019-05-14 01:09:51'),
(161, 161, 'B-160/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:41:03', '2019-05-14 01:10:24'),
(162, 162, 'B-161/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:41:07', '2019-04-20 16:11:25'),
(163, 163, 'B-162/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:41:15', '2019-05-14 01:07:56'),
(164, 164, 'B-163/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 1, 0, '2019-04-20 14:41:22', '2019-04-20 15:29:25'),
(165, 165, 'B-164/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:41:29', '2019-05-14 00:50:17'),
(166, 166, 'B-165/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 1, 0, '2019-04-20 14:41:37', '2019-04-20 15:29:50'),
(167, 168, 'B-167/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 2, 0, '2019-04-20 14:41:44', '2019-05-14 00:48:31'),
(168, 167, 'B-166/BPS/52514/4/2019', 1, '19680817 199212 1 001', 'I Gusti Lanang Putra', 0, 1, 0, '2019-04-20 15:17:24', '2019-04-20 15:30:46');

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
(1, 1, 'B-001/BPS/52510/1/2019', '2019-01-09', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 07:07:44', '2019-03-28 08:04:22'),
(2, 2, 'B-002/BPS/52510/1/2019', '2019-01-09', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 07:08:02', '2019-03-28 08:11:42'),
(3, 3, 'B-003/BPS/52510/1/2019', '2019-01-09', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 07:08:16', '2019-03-28 08:48:47'),
(4, 4, 'B-004/BPS/52510/1/2019', '2019-01-09', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 07:08:30', '2019-03-28 08:51:43'),
(5, 5, 'B-005/BPS/52510/1/2019', '2019-01-22', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-03-28 07:08:41', '2019-03-28 08:52:50'),
(6, 6, 'B-006/BPS/52510/1/2019', '2019-01-22', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 1, 2, NULL, '2019-03-28 07:08:55', '2019-03-28 08:53:32'),
(7, 7, 'B-007/BPS/52510/1/2019', '2019-01-30', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 07:09:12', '2019-03-28 08:54:14'),
(8, 8, 'B-008/BPS/52510/1/2019', '2019-01-30', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 07:09:26', '2019-03-28 08:55:14'),
(9, 9, 'B-009/BPS/52510/1/2019', '2019-01-30', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 09:23:51', '2019-03-30 03:18:47'),
(10, 10, 'B-010/BPS/52510/1/2019', '2019-01-30', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 09:24:01', '2019-03-30 03:19:13'),
(11, 11, 'B-011/BPS/52510/1/2019', '2019-01-30', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 09:27:08', '2019-03-30 03:19:31'),
(12, 12, 'B-012/BPS/52510/1/2019', '2019-01-30', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 09:27:18', '2019-03-30 03:19:52'),
(13, 23, 'B-023/BPS/52510/2/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 15:04:54', '2019-03-30 03:20:17'),
(14, 13, 'B-013/BPS/52510/1/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 3, NULL, '2019-03-28 15:05:05', '2019-03-28 15:34:42'),
(15, 14, 'B-014/BPS/52510/1/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 3, NULL, '2019-03-28 15:05:14', '2019-03-28 15:43:42'),
(16, 15, 'B-015/BPS/52510/1/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 3, NULL, '2019-03-28 15:05:28', '2019-03-28 15:43:49'),
(17, 16, 'B-016/BPS/52510/1/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 3, NULL, '2019-03-28 15:05:44', '2019-03-28 15:43:56'),
(18, 17, 'B-017/BPS/52510/2/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 15:12:28', '2019-03-30 03:20:39'),
(19, 18, 'B-018/BPS/52510/2/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 15:12:44', '2019-03-30 03:21:04'),
(20, 19, 'B-019/BPS/52510/2/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 15:12:59', '2019-03-30 03:21:27'),
(21, 20, 'B-020/BPS/52510/2/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 15:13:16', '2019-03-30 03:25:12'),
(22, 21, 'B-021/BPS/52510/2/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 15:13:51', '2019-03-30 03:23:47'),
(23, 22, 'B-022/BPS/52510/2/2019', '2019-02-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-28 15:14:11', '2019-03-30 03:24:23'),
(24, 24, 'B-024/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-30 03:38:08', '2019-04-02 01:21:12'),
(25, 25, 'B-025/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-30 03:38:13', '2019-04-02 01:22:22'),
(26, 27, 'B-027/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-30 03:38:17', '2019-04-02 01:24:37'),
(27, 28, 'B-028/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-30 03:38:22', '2019-04-02 01:25:20'),
(28, 29, 'B-029/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-30 03:38:26', '2019-04-02 01:25:52'),
(29, 30, 'B-030/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-03-30 03:38:31', '2019-04-02 01:26:25'),
(30, 26, 'B-026/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-02 01:12:59', '2019-04-02 01:23:22'),
(31, 31, 'B-031/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-02 15:19:09', '2019-04-02 15:23:59'),
(32, 32, 'B-032/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-02 15:19:20', '2019-04-02 15:24:32'),
(33, 33, 'B-033/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-02 15:19:32', '2019-04-02 15:24:53'),
(34, 34, 'B-034/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-02 15:19:42', '2019-04-02 15:25:22'),
(35, 35, 'B-035/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-02 16:10:55', '2019-04-03 10:01:15'),
(36, 36, 'B-036/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-02 16:11:27', '2019-04-03 10:01:33'),
(37, 37, 'B-037/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-02 16:11:38', '2019-04-03 10:07:13'),
(38, 38, 'B-038/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-02 16:11:51', '2019-04-03 10:07:34'),
(39, 39, 'B-039/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:03:24', '2019-04-03 10:07:57'),
(40, 40, 'B-041/BPS/52510/2/2019', '2019-03-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:03:41', '2019-04-03 10:08:32'),
(41, 41, 'B-040/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:03:56', '2019-04-03 10:08:52'),
(42, 42, 'B-042/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:05:05', '2019-04-03 10:09:15'),
(43, 43, 'B-043/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:05:18', '2019-04-03 10:09:34'),
(44, 44, 'B-044/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:05:35', '2019-04-03 12:47:00'),
(45, 45, 'B-045/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:05:52', '2019-04-03 12:48:34'),
(46, 46, 'B-046/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:06:09', '2019-04-03 12:48:49'),
(47, 47, 'B-047/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:44:05', '2019-04-03 12:49:23'),
(48, 48, 'B-048/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:44:13', '2019-04-03 12:49:39'),
(49, 49, 'B-049/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:44:19', '2019-04-03 12:49:53'),
(50, 50, 'B-050/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:44:26', '2019-04-03 12:50:10'),
(51, 51, 'B-051/BPS/52510/2/2019', '2019-02-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 09:44:32', '2019-04-03 12:51:04'),
(52, 52, 'B-052/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:26:20', '2019-04-03 12:52:54'),
(53, 53, 'B-053/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:26:26', '2019-04-03 12:53:10'),
(54, 54, 'B-054/BPS/52510/4/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:26:32', '2019-04-03 12:53:42'),
(55, 55, 'B-055/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:26:39', '2019-04-03 12:55:06'),
(56, 56, 'B-056/BPS/52510/2/2019', '2019-02-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:26:49', '2019-04-03 12:55:26'),
(57, 57, 'B-057/BPS/52510/3/2019', '2019-03-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:26:56', '2019-04-03 12:50:39'),
(58, 58, 'B-058/BPS/52510/2/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:27:02', '2019-04-03 12:54:08'),
(59, 59, 'B-059/BPS/52510/2/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:27:09', '2019-04-03 12:52:32'),
(60, 60, 'B-060/BPS/52510/2/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:27:16', '2019-04-04 16:31:19'),
(61, 61, 'B-061/BPS/52510/2/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:27:22', '2019-04-04 16:31:31'),
(62, 62, 'B-062/BPS/52510/2/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:27:32', '2019-04-04 16:31:51'),
(63, 63, 'B-063/BPS/52510/2/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:27:39', '2019-04-04 16:32:11'),
(64, 64, 'B-064/BPS/52510/4/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:27:48', '2019-04-05 13:45:29'),
(65, 65, 'B-065/BPS/52510/2/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:27:55', '2019-04-05 13:45:53'),
(66, 66, 'B-066/BPS/52510/2/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:28:02', '2019-04-05 13:46:13'),
(67, 67, 'B-067/BPS/52510/4/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:28:09', '2019-04-05 13:46:48'),
(68, 68, 'B-068/BPS/52510/4/2019', '2019-03-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:28:15', '2019-04-05 13:47:31'),
(69, 69, 'B-069/BPS/52510/4/2019', '2019-03-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:28:21', '2019-04-05 13:48:38'),
(70, 70, 'B-070/BPS/52510/4/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:28:29', '2019-04-05 13:49:05'),
(71, 71, 'B-071/BPS/52510/4/2019', '2019-02-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:28:34', '2019-04-05 13:50:39'),
(72, 72, 'B-072/BPS/52510/4/2019', '2019-03-05', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:28:43', '2019-04-05 13:50:53'),
(73, 73, 'B-073/BPS/52510/4/2019', '2019-03-05', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:28:49', '2019-04-05 13:49:35'),
(74, 74, 'B-074/BPS/52510/4/2019', '2019-03-05', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:28:57', '2019-04-05 14:09:13'),
(75, 75, 'B-075/BPS/52510/4/2019', '2019-03-05', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:29:10', '2019-04-05 14:09:27'),
(76, 76, 'B-076/BPS/52510/4/2019', '2019-03-05', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:29:15', '2019-04-05 14:09:42'),
(77, 77, 'B-077/BPS/52510/4/2019', '2019-03-07', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:29:22', '2019-04-05 14:10:00'),
(78, 78, 'B-078/BPS/52510/4/2019', '2019-03-07', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:29:28', '2019-04-05 14:10:13'),
(79, 79, 'B-079/BPS/52510/4/2019', '2019-03-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:29:34', '2019-04-05 14:10:29'),
(80, 80, 'B-080/BPS/52510/4/2019', '2019-03-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:29:40', '2019-04-05 14:10:44'),
(81, 81, 'B-081/BPS/52510/4/2019', '2019-03-12', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:29:46', '2019-04-05 14:11:00'),
(82, 82, 'B-082/BPS/52510/4/2019', '2019-03-12', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:29:52', '2019-04-05 14:11:13'),
(83, 83, 'B-083/BPS/52510/4/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:29:58', '2019-04-05 14:11:26'),
(84, 84, 'B-084/BPS/52510/4/2019', '2019-03-14', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-03 11:30:04', '2019-04-05 14:11:46'),
(85, 85, 'B-085/BPS/52510/3/2019', '2019-03-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:01:22', '2019-04-16 06:45:49'),
(86, 86, 'B-086/BPS/52510/3/2019', '2019-03-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:02:19', '2019-04-16 06:46:15'),
(87, 87, 'B-106/BPS/52510/3/2019', '2019-03-22', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:02:35', '2019-04-16 06:46:36'),
(88, 88, 'B-107/BPS/52510/3/2019', '2019-03-22', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:02:49', '2019-04-16 06:48:02'),
(89, 102, 'B-098/BPS/52510/3/2019', '2019-03-18', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:03:14', '2019-04-16 06:49:36'),
(90, 89, 'B-108/BPS/52510/3/2019', '2019-03-22', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:52:12', '2019-04-16 06:49:52'),
(91, 90, 'B-109/BPS/52510/3/2019', '2019-03-22', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:52:24', '2019-04-16 06:50:04'),
(92, 91, 'B-087/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:52:35', '2019-04-16 06:51:12'),
(93, 92, 'B-089/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:52:48', '2019-04-16 06:52:04'),
(94, 93, 'B-088/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:53:02', '2019-04-16 06:52:50'),
(95, 94, 'B-090/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:53:14', '2019-04-16 06:53:15'),
(96, 95, 'B-091/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:53:27', '2019-04-16 06:54:22'),
(97, 96, 'B-092/BPS/52510/3/2019', '2019-03-13', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:53:40', '2019-04-16 06:55:15'),
(98, 97, 'B-093/BPS/52510/3/2019', '2019-03-14', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-07 05:54:28', '2019-04-16 06:55:36'),
(99, 98, 'B-094/BPS/52510/3/2019', '2019-03-14', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-07 05:55:43', '2019-04-16 06:55:52'),
(100, 99, 'B-095/BPS/52510/3/2019', '2019-03-14', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-07 05:55:55', '2019-04-16 06:56:10'),
(101, 100, 'B-096/BPS/52510/3/2019', '2019-03-18', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:56:05', '2019-04-16 06:56:56'),
(102, 101, 'B-096/BPS/52510/3/2019', '2019-03-18', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-07 05:56:15', '2019-04-16 06:57:12'),
(103, 103, 'B-099/BPS/52510/3/2019', '2019-03-18', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:05:23', '2019-04-16 07:15:03'),
(104, 104, 'B-100/BPS/52510/3/2019', '2019-03-18', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:05:33', '2019-04-16 07:15:16'),
(105, 105, 'B-101/BPS/52510/3/2019', '2019-03-18', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:05:49', '2019-04-16 07:15:43'),
(106, 106, 'B-102/BPS/52510/3/2019', '2019-03-21', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:06:17', '2019-04-16 07:15:59'),
(107, 107, 'B-103/BPS/52510/3/2019', '2019-03-21', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:06:20', '2019-04-16 07:16:11'),
(108, 108, 'B-104/BPS/52510/3/2019', '2019-03-21', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:06:27', '2019-04-16 07:16:25'),
(109, 109, 'B-110/BPS/52510/3/2019', '2019-03-26', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:06:34', '2019-04-16 07:22:41'),
(110, 110, 'B-111/BPS/52510/3/2019', '2019-03-26', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:06:42', '2019-04-16 07:23:05'),
(111, 111, 'B-105/BPS/52510/3/2020', '2019-03-22', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:06:52', '2019-04-16 07:23:22'),
(112, 112, 'B-112/BPS/52510/3/2019', '2019-03-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:07:01', '2019-04-16 07:25:21'),
(113, 113, 'B-113/BPS/52510/3/2019', '2019-03-26', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:07:10', '2019-04-16 07:25:39'),
(114, 114, 'B-114/BPS/52510/3/2019', '2019-03-26', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:07:21', '2019-04-16 07:25:53'),
(115, 115, 'B-115/BPS/52510/3/2019', '2019-03-26', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 07:07:27', '2019-04-16 07:26:06'),
(116, 116, 'B-173/BPS/52510/4/2019', '2019-04-22', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-16 08:55:25', '2019-05-14 02:53:35'),
(117, 117, 'B-116/BPS/52510/3/2019', '2019-03-28', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:52:33', '2019-04-20 15:32:53'),
(118, 118, 'B-117/BPS/52510/3/2019', '2019-03-28', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:52:49', '2019-04-20 15:33:11'),
(119, 119, 'B-118/BPS/52510/3/2019', '2019-03-28', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:56:36', '2019-04-20 15:33:26'),
(120, 120, 'B-119/BPS/52510/3/2019', '2019-03-28', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:56:39', '2019-04-20 15:33:57'),
(121, 121, 'B-120/BPS/52510/3/2019', '2019-03-28', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:56:42', '2019-04-20 15:35:29'),
(122, 122, 'B-121/BPS/52510/3/2019', '2019-03-29', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:57:42', '2019-04-20 15:35:49'),
(123, 123, 'B-122/BPS/52510/3/2019', '2019-03-31', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:57:45', '2019-04-20 15:36:13'),
(124, 124, 'B-127/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:57:50', '2019-04-20 15:42:27'),
(125, 125, 'B-128/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:57:53', '2019-04-20 15:47:41'),
(126, 126, 'B-129/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:57:56', '2019-04-20 15:49:15'),
(127, 127, 'B-130/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:57:59', '2019-04-20 15:49:32'),
(128, 128, 'B-131/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:58:01', '2019-04-20 15:51:22'),
(129, 129, 'B-132/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-18 08:58:05', '2019-04-20 15:52:08'),
(130, 130, 'B-125/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 3, NULL, '2019-04-18 08:58:08', '2019-04-20 15:52:54'),
(131, 139, 'B-138/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:19:16', '2019-04-20 15:55:27'),
(132, 131, 'B-133/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:34:15', '2019-04-20 15:56:35'),
(133, 132, 'B-126/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:34:25', '2019-04-20 15:57:35'),
(134, 133, 'B-134/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 3, NULL, '2019-04-20 14:34:36', '2019-04-20 15:53:17'),
(135, 134, 'B-137/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:34:46', '2019-04-20 15:57:55'),
(136, 135, 'B-135/BPS/52510/4/2019', '2019-04-09', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 3, NULL, '2019-04-20 14:34:57', '2019-04-20 15:53:40'),
(137, 136, 'B-136/BPS/52510/4/2019', '2019-04-01', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:35:06', '2019-04-20 15:58:56'),
(138, 137, 'B-123/BPS/52510/3/2019', '2019-03-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:35:19', '2019-04-20 15:59:10'),
(139, 138, 'B-124/BPS/52510/3/2019', '2019-03-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:35:29', '2019-04-20 15:59:29'),
(140, 140, 'B-139/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:35:39', '2019-04-20 16:00:02'),
(141, 141, 'B-140/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:35:48', '2019-04-20 16:00:17'),
(142, 142, 'B-141/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:35:57', '2019-04-20 16:00:30'),
(143, 143, 'B-142/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:36:30', '2019-04-20 16:03:45'),
(144, 144, 'B-143/BPS/52510/4/2019', '2019-04-05', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-20 14:36:39', '2019-04-20 16:04:03'),
(145, 145, 'B-144/BPS/52510/4/2019', '2019-04-05', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-20 14:36:57', '2019-04-20 16:04:15'),
(146, 146, 'B-145/BPS/52510/4/2019', '2019-04-05', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-20 14:37:08', '2019-04-20 16:04:34'),
(147, 147, 'B-146/BPS/52510/4/2019', '2019-04-05', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-20 14:37:22', '2019-04-20 16:05:00'),
(148, 148, 'B-147/BPS/52510/4/2019', '2019-04-05', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-20 14:37:34', '2019-04-20 16:05:22'),
(149, 149, 'B-148/BPS/52510/4/2019', '2019-04-05', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-20 14:37:47', '2019-04-20 16:06:15'),
(150, 150, 'B-149/BPS/52510/4/2019', '2019-04-05', '19651231 199212 1 001', 'Kepala Bagian Tata Usaha', 'Lalu Supratna', 1, 2, NULL, '2019-04-20 14:37:59', '2019-04-20 16:06:34'),
(151, 151, 'B-150/BPS/52510/4/2019', '2019-04-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:38:11', '2019-05-14 01:02:36'),
(152, 152, 'B-151/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:38:27', '2019-04-20 16:08:27'),
(153, 153, 'B-152/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:38:43', '2019-04-20 16:09:18'),
(154, 154, 'B-153/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:38:52', '2019-04-20 16:09:43'),
(155, 155, 'B-154/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:39:02', '2019-04-20 16:10:38'),
(156, 156, 'B-155/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:39:12', '2019-04-20 16:10:55'),
(157, 157, 'B-156/BPS/52510/4/2019', '2019-04-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:39:21', '2019-05-14 01:11:45'),
(158, 158, 'B-157/BPS/52510/4/2019', '2019-04-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:39:30', '2019-05-14 01:11:11'),
(159, 159, 'B-158/BPS/52510/4/2019', '2019-04-11', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:40:45', '2019-05-14 01:03:50'),
(160, 160, 'B-159/BPS/52510/4/2019', '2019-04-12', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:40:52', '2019-05-14 01:09:51'),
(161, 161, 'B-160/BPS/52510/4/2019', '2019-04-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:41:03', '2019-05-14 01:10:24'),
(162, 162, 'B-161/BPS/52510/4/2019', '2019-04-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:41:07', '2019-04-20 16:11:25'),
(163, 163, 'B-162/BPS/52510/4/2019', '2019-04-15', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:41:15', '2019-05-14 01:07:56'),
(164, 164, 'B-163/BPS/52510/4/2019', '2019-03-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, NULL, '2019-04-20 14:41:22', '2019-04-20 15:10:47'),
(165, 165, 'B-164/BPS/52510/4/2019', '2019-03-25', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:41:29', '2019-05-14 00:50:17'),
(166, 166, 'B-165/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, NULL, '2019-04-20 14:41:37', '2019-04-20 15:11:21'),
(167, 168, 'B-167/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 2, NULL, '2019-04-20 14:41:43', '2019-05-14 00:48:31'),
(168, 167, 'B-166/BPS/52510/4/2019', '2019-04-02', '19660219 199401 1 001', 'Kepala BPS Provinsi NTB', 'Suntono', 0, 1, NULL, '2019-04-20 15:17:24', '2019-04-20 15:18:10');

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
(1, '8DMWFJ', 1, '19651015 199202 1 001', 1, '2019-01-10', '2019-01-10', 'Pengawasan Survei Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:19:39', '2019-03-28 08:04:22'),
(2, '5GJ3MJ', 2, '19710603 199312 1 002', 1, '2019-01-10', '2019-01-10', 'Pengawasan Survei Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:19:47', '2019-03-28 08:11:42'),
(3, 'UO8N8X', 3, '19660219 199401 1 001', 1, '2019-01-10', '2019-01-10', 'Pengawasan Survei Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:19:54', '2019-03-28 08:48:47'),
(4, '8G8Y70', 4, '19660219 199401 1 001', 5, '2019-03-15', '2019-03-19', 'Konsultasi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:20:00', '2019-03-28 08:51:43'),
(5, '4DK1MG', 5, '19651231 199212 1 001', 1, '2019-01-23', '2019-01-23', 'Pengawasan BPS Provinsi ke Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:20:43', '2019-03-28 08:52:50'),
(6, '198I07', 6, '19781220 200012 1 002', 1, '2019-01-23', '2019-01-23', 'Pengawasan BPS Provinsi ke Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:20:49', '2019-03-28 08:53:32'),
(7, 'W8AQ95', 7, '19611229 198103 2 001', 1, '2019-01-31', '2019-01-31', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:20:57', '2019-03-28 08:54:13'),
(8, 'XL6IN5', 8, '19641231 199401 1 002', 1, '2019-01-31', '2019-01-31', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:21:04', '2019-03-28 08:55:14'),
(9, '4J9A7M', 9, '19780424 199912 2 001', 1, '2019-01-31', '2019-01-31', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:21:10', '2019-03-30 03:18:47'),
(10, 'FV7VB9', 10, '19890529 201211 2 001', 1, '2019-01-31', '2019-01-31', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:21:17', '2019-03-30 03:19:13'),
(11, 'VJ0EV0', 11, '19910706 201311 2 001', 1, '2019-01-31', '2019-01-31', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:21:30', '2019-03-30 03:19:31'),
(12, 'ESZQ9Q', 12, '19840128 201101 2 008', 1, '2019-01-31', '2019-01-31', 'Pengawasan Pelaksanaan Survei Perusahaan Peternakan dan RPH/TPH', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 04:21:41', '2019-03-30 03:19:52'),
(13, '3U8348', 13, '19651015 199202 1 001', 3, '2019-02-13', '2019-02-15', 'Pengawasan Survei Harga Konsumen dan Survei Volume Penjualan Eceran Beras', 1, NULL, 1, NULL, 1, NULL, 3, '2019-03-28 04:21:50', '2019-03-28 15:34:42'),
(14, 'ZFUXTO', 14, '19700313 199003 1 002', 3, '2019-02-13', '2019-02-15', 'Pengawasan Survei Statistik Harga Produsen', 1, NULL, 1, NULL, 1, NULL, 3, '2019-03-28 04:22:21', '2019-03-28 15:43:43'),
(15, 'WBLPP2', 15, '19860614 200902 2 009', 3, '2019-02-13', '2019-02-15', 'Pengawasan Survei Jasa Pariwisata', 1, NULL, 1, NULL, 1, NULL, 3, '2019-03-28 04:22:30', '2019-03-28 15:43:49'),
(16, '7ORZQ2', 16, '19910523 201412 1 001', 3, '2019-02-13', '2019-02-15', 'Pengawasan Survei Harga Konsumen dan Survei Volume Penjualan Eceran Beras', 1, NULL, 1, NULL, 1, NULL, 3, '2019-03-28 06:24:27', '2019-03-28 15:43:56'),
(17, 'PVVWWM', 17, '19730405 199412 2 001', 1, '2019-02-13', '2019-02-13', 'Penghitungan Diagram Timbang SBH 2018', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:24:37', '2019-03-30 03:20:39'),
(18, 'PM1CBY', 18, '19651208 198603 2 001', 1, '2019-02-13', '2019-02-13', 'Penghitungan Diagram Timbang SBH 2018', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:24:45', '2019-03-30 03:21:04'),
(19, '9U94BD', 19, '19630604 198603 1 004', 1, '2019-02-13', '2019-02-13', 'Pengawasan Survei Jasa Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:24:53', '2019-03-30 03:21:27'),
(20, 'XNOPYY', 20, '19680817 199212 1 001', 3, '2019-02-13', '2019-02-15', 'Pengawasan Survei Perusahaan Peternakan dan RPH/TPH', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:25:51', '2019-03-30 03:25:12'),
(21, '4EC0QW', 21, '19651231 199301 1 001', 3, '2019-02-14', '2019-02-16', 'Penyusunan Konsolidasi PDRB Pengeluaran Triwulanan dan Tahunan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:26:40', '2019-03-30 03:23:47'),
(22, '506P3H', 22, '19800505 200212 2 004', 3, '2019-02-14', '2019-02-16', 'Penyusunan Konsolidasi PDRB Pengeluaran Triwulanan dan Tahunan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:26:51', '2019-03-30 03:24:23'),
(23, '0HF0R5', 23, '19641231 199401 1 002', 1, '2019-02-15', '2019-02-15', 'Pengawasan Pelaksanaan Survei Konstruksi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:27:10', '2019-03-30 03:20:17'),
(24, 'LRE8ZA', 24, '19660219 199401 1 001', 5, '2019-02-18', '2019-02-22', 'Rapat Teknis Pimpinan BPS Provinsi 2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:27:25', '2019-04-02 01:21:12'),
(25, 'LYOFEQ', 25, '19651231 199212 1 001', 5, '2019-02-18', '2019-02-22', 'Rapat Teknis Pimpinan BPS Provinsi 2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:27:37', '2019-04-02 01:22:22'),
(26, 'YE1APY', 26, '19771225 200012 1 002', 5, '2019-02-18', '2019-02-22', 'Rapat Teknis Pimpinan BPS Provinsi 2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:37:43', '2019-04-02 01:23:22'),
(27, 'MDFGC0', 27, '19611229 198103 2 001', 5, '2019-02-18', '2019-02-22', 'Rapat Teknis Pimpinan BPS Provinsi 2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:37:56', '2019-04-02 01:24:37'),
(28, '7KUSYA', 28, '19651015 199202 1 001', 5, '2019-02-18', '2019-02-22', 'Rapat Teknis Pimpinan BPS Provinsi 2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:38:06', '2019-04-02 01:25:20'),
(29, '6C0ESL', 29, '19680817 199212 1 001', 5, '2019-02-18', '2019-02-22', 'Rapat Teknis Pimpinan BPS Provinsi 2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:38:18', '2019-04-02 01:25:52'),
(30, '91PQ9W', 30, '19670428 198901 1 001', 5, '2019-02-18', '2019-02-22', 'Rapat Teknis Pimpinan BPS Provinsi 2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:38:26', '2019-04-02 01:26:25'),
(31, '3M7HRO', 31, '19700723 199211 1 001', 3, '2019-02-19', '2019-02-21', 'Penyusunan PDRB Pengeluaran Triwulanan dan Tahunan Menurut Lapangan Usaha', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:38:40', '2019-04-02 15:23:59'),
(32, 'NTTDWW', 32, '19710603 199312 1 002', 1, '2019-02-19', '2019-02-19', 'Pengawasan Survei Jasa Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:38:51', '2019-04-02 15:24:32'),
(33, 'YLA947', 33, '19730405 199412 2 001', 1, '2019-02-19', '2019-02-19', 'Pengawasan Survei Statistik Harga Perdagangan Besar', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:39:13', '2019-04-02 15:24:53'),
(34, 'UGLWT3', 34, '19700313 199003 1 002', 1, '2019-02-19', '2019-02-19', 'Pengawasan Survei Statistik Harga Produsen', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:39:22', '2019-04-02 15:25:22'),
(35, 'ISK7VP', 35, '19710603 199312 1 002', 1, '2019-02-21', '2019-02-21', 'Pengawasan Survei Jasa Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:39:31', '2019-04-03 10:01:15'),
(36, 'AR132Q', 36, '19700313 199003 1 002', 1, '2019-02-21', '2019-02-21', 'Pengawasan Survei Statistik Harga Produsen', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:39:39', '2019-04-03 10:01:33'),
(37, 'RHXN0W', 37, '19730405 199412 2 001', 1, '2019-02-21', '2019-02-21', 'Pengawasan Survei Statistik Harga Perdagangan Besar', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:39:47', '2019-04-03 10:07:13'),
(38, 'HR8KRN', 38, '19651208 198603 2 001', 1, '2019-02-21', '2019-02-21', 'Pengawasan Survei Statistik Harga Perdagangan Besar', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:39:54', '2019-04-03 10:07:34'),
(39, 'JKRLTQ', 39, '19641231 199401 1 002', 1, '2019-02-22', '2019-02-22', 'Pengawasan Pelaksanaan Survei Konstruksi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:40:01', '2019-04-03 10:07:57'),
(40, 'JYXF8K', 40, '19620308 198203 2 004', 1, '2019-02-22', '2019-02-22', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:40:07', '2019-04-03 10:08:32'),
(41, 'JK4F68', 41, '19910706 201311 2 001', 1, '2019-02-22', '2019-02-22', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:40:17', '2019-04-03 10:08:51'),
(42, 'DWKI4Q', 42, '19771225 200012 1 002', 1, '2019-02-14', '2019-02-14', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:40:32', '2019-04-03 10:09:14'),
(43, '0OLUNQ', 43, '19810514 200312 1 003', 1, '2019-02-14', '2019-02-14', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:40:46', '2019-04-03 10:09:34'),
(44, '4NW50T', 44, '19861023 200902 2 006', 1, '2019-02-14', '2019-02-14', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:40:56', '2019-04-03 12:47:00'),
(45, 'NJT08J', 45, '19870724 200912 2 006', 1, '2019-02-14', '2019-02-14', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:41:05', '2019-04-03 12:48:34'),
(46, 'U5UV5X', 46, '19811019 200312 2 002', 1, '2019-02-15', '2019-02-15', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:41:40', '2019-04-03 12:48:49'),
(47, 'A96VLP', 47, '19861023 200902 2 006', 1, '2019-02-15', '2019-02-15', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:41:47', '2019-04-03 12:49:23'),
(48, 'BU9X41', 48, '19610803 198203 2 001', 1, '2019-02-15', '2019-02-15', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:41:54', '2019-04-03 12:49:39'),
(49, 'U6QKC3', 49, '19870724 200912 2 006', 1, '2019-02-15', '2019-02-15', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:42:00', '2019-04-03 12:49:53'),
(50, '7Q2GXK', 50, '19771225 200012 1 002', 1, '2019-02-15', '2019-02-15', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:42:08', '2019-04-03 12:50:10'),
(51, 'E6W1TK', 51, '19840517 200701 1 003', 1, '2019-02-18', '2019-02-18', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:42:19', '2019-04-03 12:51:04'),
(52, '6UY2HE', 52, '19810514 200312 1 003', 1, '2019-02-18', '2019-02-18', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:42:29', '2019-04-03 12:52:54'),
(53, 'EBDWKF', 53, '19780223 200012 1 002', 1, '2019-02-19', '2019-02-19', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:42:41', '2019-04-03 12:53:10'),
(54, 'WL45U9', 54, '19620824 198503 2 004', 1, '2019-02-20', '2019-02-20', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:43:01', '2019-04-03 12:53:42'),
(55, '5SJZJJ', 55, '19811019 200312 2 002', 1, '2019-02-20', '2019-02-20', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:43:17', '2019-04-03 12:55:05'),
(56, '8FVZTA', 56, '19840128 201101 2 008', 1, '2019-02-25', '2019-02-25', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:43:30', '2019-04-03 12:55:26'),
(57, 'NBYRT0', 78, '19771225 200012 1 002', 1, '2019-03-12', '2019-03-12', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:44:14', '2019-04-03 12:50:39'),
(58, 'NFM34B', 57, '19611229 198103 2 001', 1, '2019-02-26', '2019-02-26', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:45:01', '2019-04-03 12:54:08'),
(59, '8UHGRZ', 58, '19780424 199912 2 001', 1, '2019-02-26', '2019-02-26', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:45:12', '2019-04-03 12:52:32'),
(60, '0BSKNW', 59, '19890529 201211 2 001', 1, '2019-02-26', '2019-02-26', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:45:29', '2019-04-04 16:31:19'),
(61, 'RNRT2N', 60, '19660219 199401 1 001', 1, '2019-02-26', '2019-02-26', 'Pengawasan Pelaksanaan Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:45:39', '2019-04-04 16:31:31'),
(62, 'DBZ63Y', 61, '19651015 199202 1 001', 1, '2019-02-26', '2019-02-26', 'Pengawasan Survei Statistik Harga Perdagangan Besar', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:45:53', '2019-04-04 16:31:51'),
(63, '9V1W6G', 62, '19710603 199312 1 002', 1, '2019-02-26', '2019-02-26', 'Pengawasan Survei Jasa Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:46:00', '2019-04-04 16:32:11'),
(64, 'JR5QCL', 63, '19700313 199003 1 002', 1, '2019-02-26', '2019-02-26', 'Pengawasan Survei Statistik Harga Produsen', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:46:07', '2019-04-05 13:45:29'),
(65, 'SC7T1Y', 64, '19730405 199412 2 001', 1, '2019-02-26', '2019-02-26', 'Pengawasan Survei Statistik Harga Perdagangan Besar', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:46:12', '2019-04-05 13:45:52'),
(66, 'NMN1UA', 65, '19910523 201412 1 001', 1, '2019-02-26', '2019-02-26', 'Pengawasan Survei Statistik Harga Perdagangan Besar', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:46:18', '2019-04-05 13:46:13'),
(67, '1KECLH', 66, '19860614 200902 2 009', 1, '2019-02-26', '2019-02-26', 'Pengawasan Survei Jasa Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:46:24', '2019-04-05 13:46:48'),
(68, '5B62P6', 67, '19771225 200012 1 002', 1, '2019-03-04', '2019-03-04', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:46:35', '2019-04-05 13:47:31'),
(69, 'Y70FSH', 68, '19771225 200012 1 002', 1, '2019-03-05', '2019-03-05', 'Pengawasan Survei Angkatan Kerja Nasional (Sakernas) Semesteran', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:46:42', '2019-04-05 13:48:38'),
(70, 'CJ95BH', 69, '19651231 199212 2 001', 1, '2019-02-26', '2019-02-26', 'Cek Fisik Bangunan Gedung Kantor dan Rumah Dinas BPS Kabupaten Lombok Utara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:46:48', '2019-04-05 13:49:05'),
(71, '44FVQ1', 70, '19820418 200112 1 004', 1, '2019-02-26', '2019-02-26', 'Cek Fisik Bangunan Gedung Kantor dan Rumah Dinas BPS Kabupaten Lombok Utara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:46:54', '2019-04-05 13:50:39'),
(72, 'D1Z5NW', 71, '19651015 199202 1 001', 1, '2019-03-06', '2019-03-06', 'Penghitungan Diagram Timbang SBH 2018', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:47:09', '2019-04-05 13:50:53'),
(73, '3NZ8AE', 72, '19730405 199412 2 001', 1, '2019-03-06', '2019-03-06', 'Penghitungan Diagram Timbang SBH 2018', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:47:15', '2019-04-05 13:49:35'),
(74, 'JPMF60', 73, '19910523 201412 1 001', 1, '2019-03-06', '2019-03-06', 'Penghitungan Diagram Timbang SBH 2018', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:47:31', '2019-04-05 14:09:13'),
(75, 'LMDVAZ', 74, '19651208 198603 2 001', 1, '2019-03-06', '2019-03-06', 'Penghitungan Diagram Timbang SBH 2018', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:47:38', '2019-04-05 14:09:27'),
(76, 'UJ2GTZ', 75, '19771225 200012 1 002', 1, '2019-03-06', '2019-03-06', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:47:46', '2019-04-05 14:09:42'),
(77, 'YDQR8W', 76, '19810514 200312 1 003', 1, '2019-03-08', '2019-03-08', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:47:57', '2019-04-05 14:10:00'),
(78, 'N2C4UW', 77, '19780223 200012 1 002', 1, '2019-03-08', '2019-03-08', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:48:03', '2019-04-05 14:10:13'),
(79, '1Q4F5O', 79, '19811019 200312 2 002', 1, '2019-03-12', '2019-03-12', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:48:09', '2019-04-05 14:10:29'),
(80, 'JGFXBW', 80, '19861023 200902 2 006', 1, '2019-03-12', '2019-03-12', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:48:16', '2019-04-05 14:10:44'),
(81, '9COSXN', 81, '19620824 198503 2 004', 1, '2019-03-13', '2019-03-13', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:48:24', '2019-04-05 14:11:00'),
(82, 'E5B6RO', 82, '19610803 198203 2 001', 1, '2019-03-13', '2019-03-13', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:48:30', '2019-04-05 14:11:13'),
(83, 'NANSO1', 83, '19840517 200701 1 003', 1, '2019-03-14', '2019-03-14', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:48:37', '2019-04-05 14:11:26'),
(84, 'I0QD8N', 84, '19840517 200701 1 003', 1, '2019-03-15', '2019-03-15', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:48:44', '2019-04-05 14:11:46'),
(85, 'QUZ8BS', 85, '19780424 199912 2 001', 1, '2019-03-15', '2019-03-15', 'Pengawasan Pelaksanaan Survei Perusahan Perkebunan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:48:51', '2019-04-16 06:45:49'),
(86, '4AX1GY', 86, '19840128 201101 2 008', 1, '2019-03-15', '2019-03-15', 'Pengawasan Pelaksanaan Survei Pertanian Tanaman Pangan/Ubinan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:48:59', '2019-04-16 06:46:15'),
(87, '6Q4F1Z', 87, '19890529 201211 2 001', 1, '2019-03-25', '2019-03-25', 'Pengawasan Pelaksanaan Survei Pertanian Tanaman Pangan/Ubinan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:49:14', '2019-04-16 06:46:36'),
(88, 'BYLZTU', 88, '19611229 198103 2 001', 1, '2019-03-25', '2019-03-25', 'Pengawasan Pelaksanaan Survei Hortikultura dan Indikator Pertanian', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:49:20', '2019-04-16 06:48:02'),
(89, 'EIFRQO', 89, '19641231 199401 1 002', 1, '2019-03-25', '2019-03-25', 'Pengawasan Pelaksanaan Survei Hortikultura dan Indikator Pertanian', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:49:25', '2019-04-16 06:49:52'),
(90, 'TDS8RF', 90, '19641231 199401 1 002', 1, '2019-03-26', '2019-03-26', 'Pengawasan Pelaksanaan Survei Konstruksi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:49:31', '2019-04-16 06:50:04'),
(91, 'AAROW1', 91, '19660219 199401 1 001', 3, '2019-03-13', '2019-03-15', 'Konsultasi BPS Provinsi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:50:32', '2019-04-16 06:51:12'),
(92, 'EY3BJA', 92, '19781220 200012 1 002', 3, '2019-03-13', '2019-03-15', 'Konsultasi BPS Provinsi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:50:40', '2019-04-16 06:52:04'),
(93, 'KYL7V0', 93, '19850920 200902 1 010', 3, '2019-03-13', '2019-03-15', 'Konsultasi BPS Provinsi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:50:47', '2019-04-16 06:52:50'),
(94, 'XPED3Z', 94, '19680817 199212 1 001', 3, '2019-03-13', '2019-03-15', 'Konsultasi BPS Provinsi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:50:53', '2019-04-16 06:53:15'),
(95, 'VF230M', 95, '19811019 200312 2 002', 3, '2019-03-13', '2019-03-15', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:51:00', '2019-04-16 06:54:22'),
(96, 'T42E3V', 96, '19810514 200312 1 003', 3, '2019-03-15', '2019-03-17', 'Pengawasan Survei Sosial Ekonomi Nasional Kor dan Konsumsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:51:08', '2019-04-16 06:55:15'),
(97, 'ZHI1PF', 97, '19650729 199103 2 001', 1, '2019-03-14', '2019-03-14', 'Briefing Petugas IMK Triwulanan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:51:15', '2019-04-16 06:55:36'),
(98, 'DPAQHT', 98, '19641231 199401 2 001', 1, '2019-03-14', '2019-03-14', 'Rapat Koordinasi tindak Lanjut Pemeriksaan BPK RI atas Pelaksanaan Penilaian Kembali BMN Tahun 2017-2018', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:51:23', '2019-04-16 06:55:52'),
(99, 'VEGKEG', 99, '19800807 200710 1 001', 1, '2019-03-14', '2019-03-14', 'Rapat Koordinasi tindak Lanjut Pemeriksaan BPK RI atas Pelaksanaan Penilaian Kembali BMN Tahun 2017-2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:52:28', '2019-04-16 06:56:09'),
(100, '74C3FX', 100, '19650729 199103 2 001', 1, '2019-03-18', '2019-03-18', 'Briefing Petugas IMK Triwulanan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:52:34', '2019-04-16 06:56:56'),
(101, 'SRSJ1R', 101, '19650729 199103 2 001', 1, '2019-03-19', '2019-03-19', 'Briefing Petugas IMK Triwulanan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:52:39', '2019-04-16 06:57:12'),
(102, 'VU7YTT', 102, '19611229 198103 2 001', 4, '2019-03-19', '2019-03-22', 'Konsultasi Serentak Kepala Bidang Statististik Produksi dalam rangka Persiapan KSA Jagung 2019', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:52:47', '2019-04-16 06:49:36'),
(103, 'RIPGS3', 103, '19781220 200012 1 002', 1, '2019-03-19', '2019-03-19', 'Pemantauan dan Evaluasi SAKIP', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:52:54', '2019-04-16 07:15:03'),
(104, 'HCUO0Z', 104, '19850801 200801 2 005', 1, '2019-03-19', '2019-03-19', 'Pemantauan dan Evaluasi SAKIP', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:00', '2019-04-16 07:15:16'),
(105, 'XN1AOG', 105, '19850920 200902 1 010', 1, '2019-03-19', '2019-03-19', 'Pengawasan Pelaksanaan Pengadaan Barang dan Jasa', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:06', '2019-04-16 07:15:43'),
(106, '3GPYT6', 106, '19910719 201403 1 002', 1, '2019-03-22', '2019-03-22', 'Pengawasan Administrasi BPS Propinsi ke BPS Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:12', '2019-04-16 07:15:59'),
(107, '91DVD1', 107, '19651015 199202 1 001', 1, '2019-03-22', '2019-03-22', 'Pengawasan Survei Jasa Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:19', '2019-04-16 07:16:11'),
(108, 'M5R1IB', 108, '19710603 199312 1 002', 1, '2019-03-22', '2019-03-22', 'Pengawasan Survei Jasa Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:25', '2019-04-16 07:16:25'),
(109, '03FLLF', 109, '19730405 199412 2 001', 3, '2019-03-27', '2019-03-29', 'Pengawasan Survei Harga Konsumen dan Survei Volume Penjualan Eceran Beras', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:31', '2019-04-16 07:22:41'),
(110, 'Z9SOLH', 110, '19910523 201412 1 001', 3, '2019-03-27', '2019-03-29', 'Pengawasan Survei Harga Konsumen dan Survei Volume Penjualan Eceran Beras', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:40', '2019-04-16 07:23:05'),
(111, '25IOSL', 111, '19860614 200902 2 009', 1, '2019-03-25', '2019-03-25', 'Pengawasan Survei Wisatawan Nusantara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:45', '2019-04-16 07:23:22'),
(112, 'COCHV4', 112, '19651015 199202 1 001', 3, '2019-03-27', '2019-03-29', 'Pengawasan Survei Wisatawan Nusantara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:50', '2019-04-16 07:25:21'),
(113, 'LLOVZ8', 113, '19710603 199312 1 002', 3, '2019-03-27', '2019-03-29', 'Pengawasan Survei Wisatawan Nusantara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:53:56', '2019-04-16 07:25:39'),
(114, '78292R', 114, '19630604 198603 1 004', 1, '2019-03-27', '2019-03-27', 'Pengawasan Survei Wisatawan Nusantara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:54:02', '2019-04-16 07:25:53'),
(115, 'VN7M0X', 115, '19860614 200902 2 009', 1, '2019-03-27', '2019-03-27', 'Pengawasan Survei Wisatawan Nusantara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-03-28 06:54:08', '2019-04-16 07:26:06'),
(116, '1W51HI', 116, '19840128 201101 2 008', 4, '2019-04-24', '2019-04-27', 'Pengawasan Pelaksanaan Survei Perusahaan Kehutanan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-16 08:53:39', '2019-05-14 02:53:35'),
(117, '1J6D7P', 117, '19940922 201701 2 001', 1, '2019-03-29', '2019-03-29', 'Pendataan STB Provinsi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:33:03', '2019-04-20 15:32:53'),
(118, 'H8Y4CA', 118, '19650729 199103 2 001', 1, '2019-04-02', '2019-04-02', 'Pengawasan Survei IMK Triwulanan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:34:02', '2019-04-20 15:33:11'),
(119, 'Q8DIK2', 119, '19690414 199003 2 001', 1, '2019-04-02', '2019-04-02', 'Pengawasan Survei IBS Bulanan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:34:22', '2019-04-20 15:33:26'),
(120, 'QNHP6F', 120, '19650729 199103 2 001', 1, '2019-04-04', '2019-04-04', 'Pengawasan Survei IBS Bulanan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:34:28', '2019-04-20 15:33:57'),
(121, 'INWPOX', 121, '19650729 199103 2 001', 1, '2019-04-05', '2019-04-05', 'Pengawasan Survei IBS Bulanan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:34:34', '2019-04-20 15:35:29'),
(122, 'SRA9MK', 122, '19651231 199212 1 001', 1, '2019-03-30', '2019-03-30', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:34:40', '2019-04-20 15:35:49'),
(123, 'UWI7MA', 123, '19660219 199401 1 001', 1, '2019-03-30', '2019-03-30', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:34:46', '2019-04-20 15:36:13'),
(124, 'Y9XOP0', 124, '19660219 199401 1 001', 5, '2019-04-03', '2019-04-07', 'Pengawasan BPS Provinsi ke BPS Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:34:52', '2019-04-20 15:42:27'),
(125, 'YIRQ46', 125, '19611229 198103 2 001', 3, '2019-04-03', '2019-04-05', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:34:57', '2019-04-20 15:47:41'),
(126, 'JLTIDV', 126, '19780415 200212 1 006', 3, '2019-04-03', '2019-04-05', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:35:03', '2019-04-20 15:49:15'),
(127, 'SG33EJ', 127, '19651231 199212 1 001', 1, '2019-04-04', '2019-04-04', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:35:10', '2019-04-20 15:49:32'),
(128, '1XULKM', 128, '19651231 199212 1 001', 3, '2019-04-06', '2019-04-08', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:35:15', '2019-04-20 15:51:22'),
(129, 'L60FVD', 129, '19731225 201406 1 004', 5, '2019-04-03', '2019-04-07', 'Pengawasan BPS Provinsi ke BPS Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:35:22', '2019-04-20 15:52:08'),
(130, 'RYKL5A', 130, '19651015 199202 1 001', 1, '2019-04-02', '2019-04-02', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 3, '2019-04-18 08:35:27', '2019-04-20 15:52:54'),
(131, '0XC4YT', 131, '19670428 198901 1 001', 3, '2019-04-07', '2019-04-09', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:35:33', '2019-04-20 15:56:35'),
(132, 'SVXZQO', 132, '19780415 200212 1 006', 1, '2019-04-02', '2019-04-02', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:35:38', '2019-04-20 15:57:35'),
(133, 'NBT92K', 133, '19771225 200012 1 002', 1, '2019-04-08', '2019-04-08', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 3, '2019-04-18 08:35:43', '2019-04-20 15:53:17'),
(134, '7HY6CH', 134, '19670428 198901 1 001', 1, '2019-04-10', '2019-04-10', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:35:48', '2019-04-20 15:57:55'),
(135, 'BNX656', 135, '19611229 198103 2 001', 1, '2019-04-09', '2019-04-09', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 3, '2019-04-18 08:35:53', '2019-04-20 15:53:40'),
(136, 'YHH354', 136, '19680817 199212 1 001', 3, '2019-04-09', '2019-04-11', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:35:59', '2019-04-20 15:58:56'),
(137, 'JR4BV0', 137, '19670428 198901 1 001', 1, '2019-03-26', '2019-03-26', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:36:05', '2019-04-20 15:59:10'),
(138, 'C1Z0N0', 138, '19670428 198901 1 001', 1, '2019-03-27', '2019-03-27', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:36:11', '2019-04-20 15:59:29'),
(139, 'LCFSFG', 139, '19771225 200012 1 002', 4, '2019-04-03', '2019-04-06', 'Konsultasi ke BPS RI', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:36:17', '2019-04-20 15:55:27'),
(140, '2GULNI', 140, '19810724 201101 1 011', 1, '2019-04-04', '2019-04-04', 'Pengawasan Administrasi BPS Propinsi ke BPS Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:36:23', '2019-04-20 16:00:02'),
(141, 'PQNVWF', 141, '19830103 200604 2 002', 1, '2019-04-08', '2019-04-08', 'Pengawasan Administrasi BPS Propinsi ke BPS Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:36:30', '2019-04-20 16:00:17'),
(142, 'JOESXJ', 142, '19751014 199401 1 001', 1, '2019-04-04', '2019-04-04', 'Pengawasan Administrasi BPS Propinsi ke BPS Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:36:44', '2019-04-20 16:00:30'),
(143, '38FZQ1', 143, '19890529 201211 2 001', 4, '2019-04-02', '2019-04-05', 'Pelatihan INNAS Pendataan Statistik Pertanian Tanaman Pangan Terintegrasi dengan Metode Kerangka Sampel Area (KSA Jagung)', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:36:49', '2019-04-20 16:03:45'),
(144, 'WYKY25', 144, '19641231 199401 2 001', 1, '2019-04-08', '2019-04-08', 'Pengawasan Administrasi Barang Milik Negara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:36:54', '2019-04-20 16:04:03'),
(145, 'C4I5P5', 145, '19800807 200710 1 001', 1, '2019-04-08', '2019-04-08', 'Pengawasan Administrasi Barang Milik Negara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:00', '2019-04-20 16:04:14'),
(146, 'RCK2DL', 146, '19861231 200604 2 001', 1, '2019-04-08', '2019-04-08', 'Pengawasan Administrasi Barang Milik Negara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:06', '2019-04-20 16:04:34'),
(147, '7GCII4', 147, '19730405 199412 2 001', 1, '2019-04-08', '2019-04-08', 'Pengawasan Indeks Kemahalan Konstruksi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:12', '2019-04-20 16:05:00'),
(148, 'VTKA02', 148, '19651208 198603 2 001', 1, '2019-04-08', '2019-04-08', 'Pengawasan Indeks Kemahalan Konstruksi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:19', '2019-04-20 16:05:22'),
(149, 'V34UZK', 149, '19710603 199312 1 002', 3, '2019-04-09', '2019-04-11', 'Pengawasan Survei Perdagangan Antar Wilayah', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:25', '2019-04-20 16:06:15'),
(150, '63NCTZ', 150, '19910523 201412 1 001', 3, '2019-04-09', '2019-04-11', 'Pengawasan Indeks Kemahalan Konstruksi', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:31', '2019-04-20 16:06:34'),
(151, '58Y46R', 151, '19860614 200902 2 009', 3, '2019-04-15', '2019-04-17', 'Pengawasan Survei Jasa Pariwisata', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:36', '2019-05-14 01:02:36'),
(152, '6HV2ZK', 152, '19800827 200312 2 003', 3, '2019-04-09', '2019-04-11', 'Supervisi Penyusunan IRIO BPS Provinsi ke Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:41', '2019-04-20 16:08:27'),
(153, '0BJXVY', 153, '19861018 200902 1 001', 1, '2019-04-11', '2019-04-11', 'Pengawasan Survei Hortikultura dan Indikator Pertanian', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:46', '2019-04-20 16:09:18'),
(154, 'WA11QP', 154, '19840521 200312 2 001', 1, '2019-04-11', '2019-04-11', 'Pengawasan Survei Hortikultura dan Indikator Pertanian', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:52', '2019-04-20 16:09:43'),
(155, '3PFAFW', 155, '19800505 200212 2 004', 1, '2019-04-11', '2019-04-11', 'Supervisi Penyusunan Disagregasi PMTB Menurut Institusi dan Lapangan Usaha', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:37:57', '2019-04-20 16:10:38'),
(156, 'YKV87Y', 156, '19660219 199401 1 001', 1, '2019-04-10', '2019-04-10', 'Supervisi Pelatihan Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:38:02', '2019-04-20 16:10:55'),
(157, 'PPAPXY', 157, '19940922 201701 2 001', 1, '2019-04-18', '2019-04-18', 'Pengawasan Pelaksanaan Survei Hortikultura dan Indikator Pertanian', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:38:07', '2019-05-14 01:11:44'),
(158, 'JTEE1Q', 158, '19880831 201012 2 002', 1, '2019-04-15', '2019-04-15', 'Pengawasan Pelaksanaan Survei Hortikultura dan Indikator Pertanian', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:38:12', '2019-05-14 01:11:11'),
(159, 'SRIMWQ', 159, '19800827 200312 2 003', 1, '2019-04-15', '2019-04-15', 'Supervisi Penyusunan Disagregasi PMTB Menurut Institusi dan Lapangan Usaha', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:38:18', '2019-05-14 01:03:50'),
(160, 'NGVXVG', 160, '19660219 199401 1 001', 1, '2019-04-18', '2019-04-18', 'Pengawasan BPS Provinsi ke BPS Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:38:24', '2019-05-14 01:09:51'),
(161, '62CWRG', 161, '19641231 200701 1 038', 1, '2019-04-16', '2019-04-16', 'Pengawasan Administrasi Barang Milik Negara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:38:45', '2019-05-14 01:10:24'),
(162, 'UXU2G2', 162, '19611231 198302 2 002', 1, '2019-04-16', '2019-04-16', 'Pengawasan Administrasi Barang Milik Negara', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:38:51', '2019-04-20 16:11:25'),
(163, '1LI095', 163, '19900205 201101 2 003', 1, '2019-04-18', '2019-04-18', 'Pengawasan Administrasi BPS Propinsi ke BPS Kabupaten/Kota', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:38:58', '2019-05-14 01:07:56'),
(164, 'ZS3EBL', 164, '19831103 201101 1 008', 8, '2019-03-26', '2019-04-02', 'Transport Inda Mengajar Pelatihan Petugas Pemetaan', 1, NULL, 1, NULL, 1, NULL, 6, '2019-04-18 08:39:07', '2019-04-20 15:29:25'),
(165, 'ETQ2Z2', 165, '19880824 201211 1 001', 4, '2019-03-26', '2019-03-29', 'Transport Inda Mengajar Pelatihan Petugas Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:42:03', '2019-05-14 00:50:17'),
(166, 'SZQPDK', 166, '19920910 201412 1 001', 3, '2019-04-04', '2019-04-06', 'Transport Inda Mengajar Pelatihan Petugas Pemetaan', 1, NULL, 1, NULL, 1, NULL, 6, '2019-04-18 08:42:13', '2019-04-20 15:29:50'),
(167, 'OC4QTY', 167, '19880824 201211 1 001', 3, '2019-04-04', '2019-04-06', 'Transport Inda Mengajar Pelatihan Petugas Pemetaan', 1, NULL, 1, NULL, 1, NULL, 6, '2019-04-18 08:42:19', '2019-04-20 15:30:47'),
(168, 'AT5PKC', 168, '19880824 201211 1 001', 4, '2019-04-07', '2019-04-10', 'Transport Inda Mengajar Pelatihan Petugas Pemetaan', 1, NULL, 1, NULL, 1, NULL, 7, '2019-04-18 08:42:38', '2019-05-14 00:48:31');

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
(14, '3372', 'Solo', NULL, NULL, NULL, '2019-04-18 07:32:54', '2019-04-18 07:32:54'),
(15, '5299', 'Kabupaten/Kota se-Pulau Sumbawa', NULL, NULL, NULL, '2019-04-18 07:33:43', '2019-04-18 08:11:11');

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
  `pagu_realiasi` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turunan_anggaran`
--

INSERT INTO `turunan_anggaran` (`t_id`, `a_id`, `unit_pelaksana`, `pagu_awal`, `pagu_rencana`, `pagu_realiasi`, `created_at`, `updated_at`) VALUES
(1, 1, '52510', '7330000', NULL, NULL, '2019-05-15 06:54:04', '2019-05-15 06:54:04'),
(2, 2, '52510', '11849000', NULL, NULL, '2019-05-15 06:54:04', '2019-05-15 06:54:04'),
(3, 3, '52510', '8310000', NULL, NULL, '2019-05-15 06:54:04', '2019-05-15 06:54:04'),
(4, 4, '52510', '14020000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(5, 5, '52510', '28900000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(6, 6, '52510', '13782000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(7, 7, '52560', '15556000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(8, 8, '52520', '9255000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(9, 9, '52520', '7778000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(10, 10, '52520', '9255000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(11, 11, '52520', '15425000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(12, 12, '52520', '7778000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(13, 13, '52520', '15425000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(14, 14, '52520', '7778000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(15, 15, '52520', '19409000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(16, 16, '52530', '3085000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(17, 17, '52530', '9255000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(18, 18, '52530', '12340000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(19, 19, '52530', '6170000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(20, 20, '52530', '3085000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(21, 21, '52530', '7778000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(22, 22, '52530', '9255000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(23, 23, '52530', '6170000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(24, 24, '52530', '3085000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(25, 25, '52530', '12340000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(26, 26, '52530', '6170000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(27, 27, '52530', '7778000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(28, 28, '52540', '3085000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(29, 29, '52540', '6170000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(30, 30, '52540', '7778000', NULL, NULL, '2019-05-15 06:54:05', '2019-05-15 06:54:05'),
(31, 31, '52540', '3085000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(32, 32, '52540', '6170000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(33, 33, '52540', '3085000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(34, 34, '52540', '3085000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(35, 35, '52540', '3085000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(36, 36, '52540', '3085000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(37, 37, '52540', '6170000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(38, 38, '52540', '9255000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(39, 39, '52540', '9255000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(40, 40, '52540', '7778000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(41, 41, '52540', '3085000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(42, 42, '52540', '2600000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(43, 43, '52540', '7778000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(44, 44, '52540', '9255000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(45, 45, '52550', '7778000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(46, 46, '52550', '3085000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(47, 47, '52550', '25560000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(48, 48, '52550', '6170000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(49, 49, '52550', '7778000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(50, 50, '52550', '7778000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(51, 51, '52530', '9255000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(52, 52, '52530', '7778000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(53, 53, '52530', '9255000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(54, 54, '52530', '12340000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(55, 55, '52530', '3085000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(56, 56, '52540', '7778000', NULL, NULL, '2019-05-15 06:54:06', '2019-05-15 06:54:06'),
(57, 57, '52540', '3085000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(58, 58, '52540', '9255000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(59, 59, '52560', '43916000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(60, 60, '52560', '24020000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(61, 61, '52550', '15640000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(62, 62, '52540', '6170000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(63, 63, '52530', '15425000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(64, 64, '52540', '6256000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(65, 65, '52550', '7778000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(66, 66, '52560', '46340000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(67, 67, '52550', '600000', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07'),
(68, 68, '52530', '7879100', NULL, NULL, '2019-05-15 06:54:07', '2019-05-15 06:54:07');

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
(1, 'SuperAdmin', 'admin', NULL, NULL, '$2y$10$hKhUnIjsH44miRHbQOd74O19.QzsLPqTcZbHYT2ws/ixTjs/EoAKC', 5, 5, '52000', '2019-06-17 15:22:42', '::1', 'Valsw0Fq4oFJ7pyeZl7It07imYTIP8hk9sOezbAqaVojQWHnRSixycmVORIw', NULL, NULL, '2019-06-17 07:22:42'),
(2, 'I Putu Dyatmika', 'mika', 'pdyatmika@gmail.com', NULL, '$2y$10$/Sj.c/Fs/ySGdahOBXMZX.RONUbyt3EKiyLY3LOWfjMQ517LB5vFO', 4, 5, '52560', '2019-04-18 16:52:08', '10.52.6.39', 'i0gzzAVrIh05T68xT6h4fDVZlJggNaFJRP8M5Nm9Ja6uOhy5fD9rjJT0HxnY', NULL, '2019-02-02 01:42:57', '2019-04-18 08:52:08'),
(3, 'I Gusti Lanang Putra', 'lanang', NULL, NULL, '$2y$10$yaPJn5tf1/xhcZAy6nbgz.8UsB7e/OLjsmtK.UrfcGQOij.zSUMu2', 3, 2, '52550', '2019-04-18 16:56:51', '10.52.6.39', 'zdDhKOMXu8YIUqzOQz0SrJRT3uOjtDWZ2ywxHQD6VUMWioRVj4oUXRs7LUwm', NULL, '2019-02-02 01:44:11', '2019-04-18 08:56:51'),
(4, 'Suntono', 'suntono', NULL, NULL, '$2y$10$iQwE2UXxQrw93T2RVhkP4uMmg4GJFV3dV8.3SNqf9.gu/YuksTB9e', 3, 3, '52000', '2019-04-18 16:57:35', '10.52.6.39', 'YI7jeLWMtLaYZI3lumveIPAlYH8s7jeytjhRt6l5Qf22DrDTyJL1EAcsd2H8', NULL, '2019-02-02 01:46:20', '2019-04-18 08:57:35'),
(5, 'Anang Zakaria', 'anang', 'anangz@bps.go.id', NULL, '$2y$10$wNlcWp30QfOTQiD1LDc.ZOJLLs4uGD5AxpXo/07w15YHzHPmMlMaC', 3, 1, '52560', '2019-04-18 16:54:24', '10.52.6.39', 'WOTBAfiu0SbcSASZ8dAVZ0wukvBjlRUTtP4SseSGh8p3L9fY6AeU7bELVj1h', NULL, '2019-02-02 01:49:12', '2019-04-18 08:54:24'),
(6, 'Pande Dony Gumilar', 'dony', 'pande@dony.com', NULL, '$2y$10$kZlilHPVmtUquaGyPuaJuuXTGKFfEwcxyIlGVzZeun3mGGvBDVWz.', 2, 4, '52510', '2019-02-10 22:35:21', '192.168.1.9', '7rS85T0yB3xD5akhjzNANQWf0A1K8XSh81PoUZLrWaGOoVOwJSgzTzQMN3oj', NULL, '2019-02-02 02:41:41', '2019-03-12 02:09:37'),
(7, 'Ni Nyoman Ratna Puspitasari', 'omang', 'nyomanratna@bps.go.id', NULL, '$2y$10$oGpMxxXXJ4lT/brrO4ZfE.Zal/8ZgmL.yC3uvywm43tWBbC1NX6qW', 2, 0, '52550', '2019-03-21 18:05:56', '::1', 'gBzl5HPld4VMa0ylKK8tkRlTHhAHCZrwpC5JB6DqhA6o3w6poKAIWLZAXnAZ', NULL, '2019-02-10 15:21:38', '2019-03-21 10:05:56'),
(8, 'Aris Wahyudi', 'aris', 'aris.wahyudi@bps.go.id', NULL, '$2y$10$AvTY27UOdj0BIADeb2/cDO/t0q8GqeiVBeT68gSh.f53C7En72oG2', 3, 4, '52510', '2019-04-20 19:17:59', '180.249.111.125', 'qEj8UOUW2IwwVTeKdvyM2QXOM7fMrXzZu4zgybm6sc9CLQldwMZjGgapVN7Y', NULL, '2019-03-11 14:00:40', '2019-04-20 11:17:59'),
(9, 'Ni Kadek Adi Madri', 'nikadek', 'nikadek.adi@bps.go.id', NULL, '$2y$10$LoqJ/9INNX80fXZlV6/Or.rZ1hIlsWQZGHGUND8Dtsf2ABxWwfzUW', 3, 1, '52530', '2019-04-18 16:56:14', '10.52.6.39', 'Hh3VNR8q5MNRyk8YWpqcCCVAblA4FRyZOnQhHFcuigRLxu4Qdjg8tvvWj8n0', NULL, '2019-03-11 14:20:06', '2019-04-18 08:56:14'),
(10, 'Lalu Supratna', 'supratna', 'lalu.supratna@bps.go.id', NULL, '$2y$10$It4RKgzv3eby5BdOx3HRfe6jIsekRkMmYf778Y/3AgxG.3DhfJOvW', 3, 1, '52510', '2019-04-18 16:55:53', '10.52.6.39', 'v6KyWTirgh7sqdFbnk1PZEamyaFMe9wmcaApCqdEouLIT5J7LYTd0YrhP3sB', NULL, '2019-03-12 03:55:34', '2019-04-18 08:55:53'),
(11, 'PPK BPS Provinsi NTB', 'ppk', 'ppk@bpsntb.id', NULL, '$2y$10$DHkneorQszIqiNT5tH2VfuydVVHktDzLoQrPAo2iFno7uxeW39o2y', 3, 2, '52000', '2019-03-19 15:04:32', '::1', 'CLnIzalyClkihTfxGVuewQcmzWJzbeVxAI2Pq4hTGrOsHTiSnZO9wHNt8EO3', NULL, '2019-03-12 04:06:21', '2019-03-19 07:04:32'),
(12, 'Operator Sosial', 'sosial', 'sosial@bps.go.id', NULL, '$2y$10$f7Nv/7pBcr6wi7wqV12xhOi1gMo7jiflVu26O8SZyqh9sMpxIYQWS', 2, 0, '52520', NULL, NULL, NULL, NULL, '2019-03-14 04:14:41', '2019-03-14 04:14:41'),
(13, 'Operator TU', 'tatausaha', 'operatortu@bps.go.id', NULL, '$2y$10$EB00N196U1dbUhKIlRFc7OKLtV25wfTYJJcru//RqBk9TUiYS1Rmm', 2, 0, '52510', '2019-04-18 19:44:52', '182.1.104.98', 'tz2m5vzvqQZOuhlnzNqN4GUtvkvIfUIlho1Ujd0Qn3Y9MxrniC2bUuEmscY3', NULL, '2019-03-14 04:15:13', '2019-04-18 11:44:52'),
(14, 'Operator Produksi', 'produksi', 'produksi@bps.go.id', NULL, '$2y$10$WSt5boQZNxeulZfmokJI7.qaYrKkvNJKurH.Qtbz5wCeI1yL6Z0oe', 2, 0, '52530', NULL, NULL, NULL, NULL, '2019-03-14 04:16:11', '2019-03-14 04:16:11'),
(15, 'Operator Distribusi', 'distribusi', 'distribusi@bps.go.id', NULL, '$2y$10$lkKTF9FLFzd0hkV62nmroe1kIhtWj5uRJGR620l4yWdIj3uxg5bFy', 2, 0, '52540', NULL, NULL, NULL, NULL, '2019-03-14 04:16:48', '2019-03-14 04:16:48'),
(16, 'Operator NWAS', 'neraca', 'neraca@bps.go.id', NULL, '$2y$10$Wi9m7W82og8Xj8/UDT.6/e8akqXb0tM7zkkyGO268e7ub5orJtQZq', 2, 0, '52550', NULL, NULL, NULL, NULL, '2019-03-14 04:17:30', '2019-03-14 04:17:30'),
(17, 'Operator IPDS', 'ipds', 'ipds@bps.go.id', NULL, '$2y$10$XNvHcxJZJb8UWQQtxLHHGujx2hd4eUnv1qORxyOTHzWteZOwAt4Mu', 2, 0, '52560', '2019-03-19 14:56:39', '::1', 'ibQsRoyfl3me6wt0klLPk8y0R4o5HrwHlZexEjETIAUZmYNL9aqbIuaCpa2V', NULL, '2019-03-14 04:18:06', '2019-03-19 06:56:39'),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuitansi`
--
ALTER TABLE `kuitansi`
  MODIFY `kuitansi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `matrik`
--
ALTER TABLE `matrik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spd`
--
ALTER TABLE `spd`
  MODIFY `spd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `surattugas`
--
ALTER TABLE `surattugas`
  MODIFY `srt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

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
  MODIFY `trx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `turunan_anggaran`
--
ALTER TABLE `turunan_anggaran`
  MODIFY `t_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
