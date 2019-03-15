-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 06:14 PM
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
(1, '19660219 199401 1 001', 'Suntono, SE,M.Si', '1966-02-19', 1, '43', '52000', 1, 1, 1, '2019-03-07 10:09:52', NULL),
(2, '19651231 199212 1 001', 'Ir. Lalu Supratna', '1965-12-31', 1, '42', '52510', 2, 0, 1, '2019-03-07 10:09:52', NULL),
(3, '19651231 199212 2 001', 'Ir. Baiq Dewi Agustriawati', '1965-12-31', 2, '34', '52513', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(4, '19781220 200012 1 002', 'Akhmad Zammiluny, MM', '1978-12-20', 1, '41', '52511', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(5, '19641231 199401 2 001', 'Baiq Kartini, SE', '1964-12-31', 2, '34', '52515', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(6, '19751014 199401 1 001', 'Andi Guslan, SE', '1975-10-14', 1, '34', '52512', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(7, '19850920 200902 1 010', 'Indra Sasmita Utama, SST', '1985-09-20', 1, '33', '52514', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(8, '19910719 201403 1 002', 'Pande Gde Dony Gumilar, SSi', '1991-07-19', 1, '31', '52513', 4, 3, 1, '2019-03-07 10:09:52', NULL),
(9, '19850823 201003 2 001', 'Arintia Dewi Heryyanti, A.Md', '1985-08-23', 2, '23', '52513', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(10, '19820418 200112 1 004', 'Aris Wahyudi, SP, M.Ak', '1982-04-18', 1, '31', '52513', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(11, '19830121 200701 1 001', 'Muhamad Nursan', '1983-01-21', 1, '23', '52513', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(12, '19900205 201101 2 003', 'Linna Winarni, A.Md', '1990-02-05', 2, '24', '52512', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(13, '19810727 200901 1 010', 'Lalu Sudiarta Utama, S.Adm', '1981-07-27', 1, '32', '52512', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(14, '19611231 198302 2 002', 'Siti Fatimah', '1961-12-31', 2, '32', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(15, '19800807 200710 1 001', 'Sujiman', '1980-08-07', 1, '31', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(16, '19731225 201406 1 004', 'Heri Suria Wirawan', '1973-12-25', 1, '22', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(17, '19780505 200012 2 001', 'Bq Kurniawati, S.ST, M.Ak', '1978-05-05', 2, '41', '52511', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(18, '19781227 199912 1 001', 'I Putu Yudhistira, SE', '1978-12-27', 1, '32', '52511', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(19, '19850801 200801 2 005', 'Rika Verlita, SST', '1985-08-01', 2, '32', '52511', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(20, '19681231 198903 1 013', 'I Wayan Wirjan, SE', '1968-12-31', 1, '32', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(21, '19641231 200701 1 038', 'Muslimin', '1964-12-31', 1, '23', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(22, '19751231 200701 1 009', 'Rosidi', '1975-12-31', 1, '21', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(23, '19861231 200604 2 001', 'Bq. Yeni Sulistiana, S.Adm, M.Ak', '1986-12-31', 2, '31', '52515', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(24, '19810724 201101 1 011', 'Achmad Gunawan, S.Adm', '1981-07-24', 1, '31', '52514', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(25, '19850102 200902 2 004', 'Ratna Asih Wulandari, S.ST, M.Ak', '1985-01-02', 1, '32', '52514', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(26, '19830103 200604 2 002', 'Siti Mar\'atus Sa\'adah, SE, M.Ak', '1983-01-03', 2, '31', '52514', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(27, '19771225 200012 1 002', 'Arrief Chandra Setiawan S.ST, M.Si', '1977-12-25', 1, '41', '52520', 2, 0, 1, '2019-03-07 10:09:52', NULL),
(28, '19811019 200312 2 002', 'Hertina Yusnissa, SST, MM', '1981-10-19', 2, '41', '52521', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(29, '19810514 200312 1 003', 'M Ikhsany Rusyda, SST, M.Si', '1981-05-14', 1, '41', '52523', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(30, '19820426 200412 2 001', 'Gusti Ketut Indradewi, SST', '1982-04-26', 2, '34', '52521', 5, 0, 1, '2019-03-07 10:09:52', '2019-03-07 10:10:38'),
(31, '19840517 200701 1 003', 'Amy Wardian Pratama, S.ST', '1984-05-17', 2, '34', '52522', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(32, '19610803 198203 2 001', 'Baiq Eny Sukriani', '1961-08-03', 2, '32', '52522', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(33, '19620824 198503 2 004', 'Sri Suhartini, S.Sos', '1962-08-24', 2, '34', '52521', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(34, '19780223 200012 1 002', 'Ahwan Hadi, S. ST, M.Ak', '1978-02-23', 1, '34', '52521', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(35, '19870724 200912 2 006', 'Isna Zuriatina, S.ST, MT', '1987-07-24', 2, '32', '52522', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(36, '19861023 200902 2 006', 'Yati Daryati Nurmalasari, SST', '1986-10-23', 2, '32', '52523', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(37, '19611229 198103 2 001', 'Ni Kadek Adi Madri, SE', '1961-12-29', 2, '42', '52530', 2, 0, 1, '2019-03-07 10:09:52', NULL),
(38, '19641231 199401 1 002', 'Ir. Saan', '1964-12-31', 1, '34', '52533', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(39, '19650729 199103 2 001', 'Ir. Raehatul Jannah', '1965-07-29', 2, '41', '52532', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(40, '19860206 200902 2 005', 'Pepti Maya Puspita, SST', '1986-02-06', 2, '32', '52531', 5, 0, 1, '2019-03-07 10:09:52', '2019-03-07 10:10:47'),
(41, '19780424 199912 2 001', 'Ike Rahayu Sri, SST, MM', '1978-04-24', 2, '41', '52533', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(42, '19910706 201311 2 001', 'Medhia ratna Puja Hapsari,SST', '1991-07-06', 2, '32', '52533', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(43, '19890529 201211 2 001', 'Meta Indriyana, SST', '1989-05-29', 2, '32', '52531', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(44, '19690414 199003 2 001', 'Nurlailah', '1969-04-14', 2, '32', '52532', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(45, '19881215 201012 2 003', 'Anik Pratiwi, S.ST', '1988-12-15', 2, '32', '52531', 5, 0, 1, '2019-03-07 10:09:52', '2019-03-07 10:10:55'),
(46, '19840128 201101 2 008', 'Murniyati, S.Si, M.Ak', '1984-01-28', 2, '32', '52531', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(47, '19620308 198203 2 004', 'Haryani Sri Wahyuni', '1962-03-08', 2, '32', '52532', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(48, '19651015 199202 1 001', 'Ir. Lalu Putradi', '1965-10-15', 1, '42', '52540', 2, 0, 1, '2019-03-07 10:09:52', NULL),
(49, '19730405 199412 2 001', 'Sri Endah Wardanti, S. ST, MM', '1973-04-05', 2, '41', '52541', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(50, '19700313 199003 1 002', 'Didik Sutarmono, SE', '1970-03-13', 1, '34', '52542', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(51, '19710603 199312 1 002', 'Tri Harjanto', '1971-06-03', 1, '34', '52543', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(52, '19810421 200212 2 004', 'Wini Widiastuti, SST, M.Sc', '1981-04-21', 2, '41', '52543', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(53, '19860614 200902 2 009', 'Nuning Primadianti, S.ST, M.Ec.Dev', '1986-06-14', 2, '32', '52543', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(54, '19651208 198603 2 001', 'Sri Sulastri', '1965-12-08', 2, '32', '52541', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(55, '19630604 198603 1 004', 'Islam Saribakti, SP', '1963-06-04', 1, '34', '52542', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(56, '19850611 200604 2 003', 'Ria Kusumawati', '1985-06-11', 2, '31', '52542', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(57, '19910523 201412 1 001', 'Nurul Islamy, SST', '1991-05-23', 2, '32', '52541', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(58, '19680817 199212 1 001', 'Ir. I Gusti Lanang Putra', '1968-08-17', 1, '42', '52550', 2, 2, 1, '2019-03-07 10:09:52', NULL),
(59, '19800505 200212 2 004', 'Yassinta Ben K, SST. M.Si', '1980-05-05', 2, '34', '52553', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(60, '19800827 200312 2 003', 'Suci Purnamawati, S.ST,MM', '1980-08-27', 2, '41', '52551', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(61, '19840521 200312 2 001', 'Rosita Fahmi', '1984-05-21', 2, '24', '52551', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(62, '19651231 199301 1 001', 'Ir. Muhamad Rifai', '1965-12-31', 1, '34', '52552', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(63, '19880831 201012 2 002', 'Ni Nyoman Ratna Puspitasari, SST', '1988-08-31', 2, '32', '52552', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(64, '19861018 200902 1 001', 'Muh. Zainuri. S.ST, M. Stat', '1986-10-18', 1, '34', '52551', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(65, '19940922 201701 2 001', 'Anisa Suciningtyas D, SST', '1994-09-22', 2, '31', '52553', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(66, '19670428 198901 1 001', 'Anang Zakaria, S.Si.', '1967-04-28', 1, '34', '52560', 2, 0, 1, '2019-03-07 10:09:52', NULL),
(67, '19870815 201012 1 005', 'Chairul Fatikhin Putra, S.ST', '1987-08-15', 1, '32', '52561', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(68, '19780415 200212 1 006', 'Ahmad Sukri, S. Kom', '1978-04-15', 1, '34', '52562', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(69, '19820319 200412 1 002', 'I Putu Dyatmika, SST', '1982-03-19', 1, '34', '52563', 3, 0, 1, '2019-03-07 10:09:52', NULL),
(70, '19620612 198203 2 002', 'Subaedah', '1962-06-12', 2, '32', '52563', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(71, '19831103 201101 1 008', 'Casslirais Surawan, S.Si', '1983-11-03', 1, '32', '52562', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(72, '19631225 198203 2 001', 'Tri Kadaryanti Ningtiyas, S.Sos', '1963-12-25', 2, '34', '52563', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(73, '19880824 201211 1 001', 'Muhammad Fathi, SST', '1988-08-24', 1, '32', '52561', 4, 0, 1, '2019-03-07 10:09:52', NULL),
(74, '19920910 201412 1 001', 'Wahyudi Septiawan, SST', '1992-09-10', 1, '31', '52563', 4, 0, 1, '2019-03-07 10:09:52', NULL);

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
(1, 'SuperAdmin', 'admin', NULL, NULL, '$2y$10$83CnH9qWgR8VUM4ksd0MOuHCmTWb23FI4B4m2meQr2RFEVlc.y/lO', 5, 5, '52000', '2019-03-07 14:05:21', '::1', 'tl3m5HCAeYaoDh3yEVJdWDu3j3ur23ggWsdJhNcZcOg8xa90zMEN2R0ilMqa', NULL, '2019-03-07 06:05:21'),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuitansi`
--
ALTER TABLE `kuitansi`
  MODIFY `kuitansi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matrik`
--
ALTER TABLE `matrik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `spd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surattugas`
--
ALTER TABLE `surattugas`
  MODIFY `srt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `trx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
