-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 04:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdbsmkmuh9`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftarakunpesertabaru`
--

CREATE TABLE `daftarakunpesertabaru` (
  `id_daftar_akun_peserta` int(10) UNSIGNED NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftarakunpesertabaru`
--

INSERT INTO `daftarakunpesertabaru` (`id_daftar_akun_peserta`, `nisn`, `nama_lengkap`, `role_akses`, `password`, `created_at`, `updated_at`) VALUES
(20, '202020', 'SUPER ADMINISTRATOR PPDB SMK MUH 9', 'Super Admin', '$2y$10$UMc8pUlavs0TPo66eAigQ.CKfC0olWjm/T9/TdUAEkZy/n71z2Gjy', '2020-11-11 12:03:14', '2020-11-12 10:06:54'),
(21, '320', 'goblok', 'Peserta Didik Baru', '$2y$10$fsn.nDNZ1E/CxzQ1Y9teZuUO2HYL31aeCeRrtsNBAcFCh6BVRvvUS', '2020-11-11 12:12:27', '2020-11-12 05:17:20'),
(25, '909090', 'Jeryan Haryogi', 'Peserta Didik Baru', '$2y$10$AQwsoV55IUGC9Y8yNLogSOJkWsmm.ChTLInOweg9yzv3NPgsJtLMa', '2020-11-13 10:38:07', '2020-11-13 10:38:07'),
(26, '9838203', 'JANCUK', 'Operator', '$2y$10$PFQcJeBwdr3sM9k866T9Se1gV9YBMZL1o878VDFf/Nf3GGcePfjxe', '2020-11-13 14:05:44', '2020-11-13 14:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `dataayahpesertadidik`
--

CREATE TABLE `dataayahpesertadidik` (
  `id_data_ayah` int(10) UNSIGNED NOT NULL,
  `id_ayah_peserta_didik` int(10) UNSIGNED NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lahir_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perkerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataayahpesertadidik`
--

INSERT INTO `dataayahpesertadidik` (`id_data_ayah`, `id_ayah_peserta_didik`, `nama_ayah`, `tahun_lahir_ayah`, `kebutuhan_khusus`, `perkerjaan_ayah`, `pendidikan_ayah`, `penghasilan_ayah`, `created_at`, `updated_at`) VALUES
(17, 17, 'ajsdkladjmadl', '2020-11-13', 'Tidak', 'Nelayan', 'D3', 'Rp. 500.000 s.d Rp. 999.999', '2020-11-13 12:12:44', '2020-11-13 12:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `databeasiswapesertadidik`
--

CREATE TABLE `databeasiswapesertadidik` (
  `id_beasiswa` int(10) UNSIGNED NOT NULL,
  `id_beasiswa_peserta_didik` int(10) UNSIGNED NOT NULL,
  `jenis_beasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_beasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_selesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `databeasiswapesertadidik`
--

INSERT INTO `databeasiswapesertadidik` (`id_beasiswa`, `id_beasiswa_peserta_didik`, `jenis_beasiswa`, `sumber_beasiswa`, `tahun_mulai`, `tahun_selesai`, `created_at`, `updated_at`) VALUES
(21, 17, '-', '-', '-', '-', '2020-11-13 12:12:44', '2020-11-13 12:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `dataibupesertadidik`
--

CREATE TABLE `dataibupesertadidik` (
  `id_data_ibu` int(10) UNSIGNED NOT NULL,
  `id_ibu_peserta_didik` int(10) UNSIGNED NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lahir_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perkerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataibupesertadidik`
--

INSERT INTO `dataibupesertadidik` (`id_data_ibu`, `id_ibu_peserta_didik`, `nama_ibu`, `tahun_lahir_ibu`, `kebutuhan_khusus`, `perkerjaan_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `created_at`, `updated_at`) VALUES
(17, 17, '984028402', '2020-11-13', 'Tidak', 'Perternak', 'D2', 'Rp. 500.000 s.d Rp. 999.999', '2020-11-13 12:12:44', '2020-11-13 12:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `dataperiodikpesertadidik`
--

CREATE TABLE `dataperiodikpesertadidik` (
  `id_data_periodik` int(10) UNSIGNED NOT NULL,
  `id_periodik_peserta_didik` int(10) UNSIGNED NOT NULL,
  `tinggi_badan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_badan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak_lebih_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_ke_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_lebih_ke_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke_berapa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari_keberapa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kandung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataperiodikpesertadidik`
--

INSERT INTO `dataperiodikpesertadidik` (`id_data_periodik`, `id_periodik_peserta_didik`, `tinggi_badan`, `berat_badan`, `jarak_sekolah`, `jarak_lebih_sekolah`, `waktu_ke_sekolah`, `waktu_lebih_ke_sekolah`, `anak_ke_berapa`, `dari_keberapa`, `kandung`, `tiri`, `angkat`, `created_at`, `updated_at`) VALUES
(2, 17, '160', '80', 'Lebih Dari 2 km', '3', 'Lebih Dari 60 Menit', '4', '2', '1', '2', '2', '2', '2020-11-13 12:12:44', '2020-11-13 12:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `dataprestasipesertadidik`
--

CREATE TABLE `dataprestasipesertadidik` (
  `id_prestasi` int(10) UNSIGNED NOT NULL,
  `id_prestasi_peserta_didik` int(10) UNSIGNED NOT NULL,
  `jenis_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_prestasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataprestasipesertadidik`
--

INSERT INTO `dataprestasipesertadidik` (`id_prestasi`, `id_prestasi_peserta_didik`, `jenis_lomba`, `tingkat`, `nama_prestasi`, `tahun`, `penyelenggara`, `created_at`, `updated_at`) VALUES
(22, 17, '-', '-', '-', '-', '-', '2020-11-13 12:12:44', '2020-11-13 12:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `datawalipesertadidik`
--

CREATE TABLE `datawalipesertadidik` (
  `id_data_wali` int(10) UNSIGNED NOT NULL,
  `id_wali_peserta_didik` int(10) UNSIGNED NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lahir_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perkerjaan_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datawalipesertadidik`
--

INSERT INTO `datawalipesertadidik` (`id_data_wali`, `id_wali_peserta_didik`, `nama_wali`, `tahun_lahir_wali`, `kebutuhan_khusus`, `perkerjaan_wali`, `pendidikan_wali`, `penghasilan_wali`, `created_at`, `updated_at`) VALUES
(16, 17, '-', '-', 'Tidak', '-', '-', '-', '2020-11-13 12:12:44', '2020-11-13 12:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `kontakkami`
--

CREATE TABLE `kontakkami` (
  `id_kontak` int(10) UNSIGNED NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontakkami`
--

INSERT INTO `kontakkami` (`id_kontak`, `nisn`, `nama_lengkap`, `email`, `pesan`, `created_at`, `updated_at`) VALUES
(3, '320', 'jeryna', 'jeryanharyogi@gmail.com', 'saya lupa password saya', '2020-11-12 02:05:54', '2020-11-12 02:05:54'),
(6, '101010', 'jsldjaljalksd', 'jeryanharyogi5@gmail.com', 'alksjdlkajsklasd', '2020-11-12 03:06:26', '2020-11-12 03:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(134, '2014_10_12_000000_create_users_table', 1),
(135, '2014_10_12_100000_create_password_resets_table', 1),
(136, '2019_08_19_000000_create_failed_jobs_table', 1),
(138, '2020_11_05_025218_pesertadidikbaru', 2),
(139, '2020_11_05_161716_data_ayah_pesertadidik', 3),
(140, '2020_11_05_162923_data_ibu_pesertadidik', 3),
(141, '2020_11_05_163053_data_wali_pesertadidik', 3),
(142, '2020_11_05_184114_data_prestasi_peserta_didik', 3),
(143, '2020_11_06_034255_tokenpilihjurusanpeserta', 3),
(144, '2020_11_06_084025_data_beasiswa_peserta_didik', 3),
(145, '2020_11_06_150645_daftar_akun_peserta_baru', 3),
(146, '2020_11_06_191224_dat_aperiodik_pesertadidik', 4),
(150, '2020_11_08_091704_responsetransaksi', 5),
(152, '2020_11_10_163332_verifiksipersertadidikbaru', 6),
(153, '2020_11_12_080602_kontak_kami', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesertadidikbaru`
--

CREATE TABLE `pesertadidikbaru` (
  `id_peserta_didik` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttgl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `perumahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelu_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alat_transpotasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlprumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlppribadi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pribadi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ujian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima_pks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesertadidikbaru`
--

INSERT INTO `pesertadidikbaru` (`id_peserta_didik`, `nama_lengkap`, `nama_panggilan`, `foto`, `jenis_kelamin`, `nisn`, `nis`, `asal_sekolah`, `nik`, `ttgl`, `jurusan`, `agama`, `kebutuhan_khusus`, `alamat`, `perumahan`, `rt`, `rw`, `provinsi`, `kabupaten`, `kelu_des`, `kecamatan`, `kodepos`, `alat_transpotasi`, `jenis_tinggal`, `no_tlprumah`, `no_tlppribadi`, `email_pribadi`, `no_ujian`, `penerima_pks`, `no_pks`, `created_at`, `updated_at`) VALUES
(17, 'Jeryan Haryogi', '928402848', '5de4704d63404274490d8e13480a2f54', 'Laki-Laki', '909090', '3840283498', 'kajdjald', '984028349028', '38432894832', 'Multimedia', 'Islam', 'Tidak', 'oadakdlasdjsl', '3409283492834', '92839482309', '27498327', '13', 'Banjarbaru', '389482084', '098394824', '39492084', 'Ojek', 'Kost', '9283408234', '9348328489234', 'jeryanharyogi@gmail.com', '92348234', 'IYA', '9384902834', '2020-11-13 12:12:44', '2020-11-13 12:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `responsetransaksi`
--

CREATE TABLE `responsetransaksi` (
  `id_transaksi` int(10) UNSIGNED NOT NULL,
  `order_by_id` int(10) UNSIGNED NOT NULL,
  `status_codes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fraud_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokenpilihjurusanpeserta`
--

CREATE TABLE `tokenpilihjurusanpeserta` (
  `id_token` int(10) UNSIGNED NOT NULL,
  `id_token_peserta_didik` int(10) UNSIGNED NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokenpilihjurusanpeserta`
--

INSERT INTO `tokenpilihjurusanpeserta` (`id_token`, `id_token_peserta_didik`, `jurusan`, `token_jurusan`, `created_at`, `updated_at`) VALUES
(16, 17, 'Multimedia', '5091', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verifiksipersertadidikbaru`
--

CREATE TABLE `verifiksipersertadidikbaru` (
  `id_verifikasi` int(10) UNSIGNED NOT NULL,
  `id_verifikasi_perserta_didik` int(10) UNSIGNED NOT NULL,
  `status_verifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verifiksipersertadidikbaru`
--

INSERT INTO `verifiksipersertadidikbaru` (`id_verifikasi`, `id_verifikasi_perserta_didik`, `status_verifikasi`, `nama_lengkap`, `nama_panggilan`, `nisn`, `nis`, `created_at`, `updated_at`) VALUES
(21, 17, 'Sudah Terverifikasi', 'Jeryan Haryogi', '928402848', '909090', '3840283498', '2020-11-13 13:49:00', '2020-11-13 13:49:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarakunpesertabaru`
--
ALTER TABLE `daftarakunpesertabaru`
  ADD PRIMARY KEY (`id_daftar_akun_peserta`),
  ADD UNIQUE KEY `daftarakunpesertabaru_nisn_unique` (`nisn`);

--
-- Indexes for table `dataayahpesertadidik`
--
ALTER TABLE `dataayahpesertadidik`
  ADD PRIMARY KEY (`id_data_ayah`),
  ADD KEY `dataayahpesertadidik_id_ayah_peserta_didik_foreign` (`id_ayah_peserta_didik`);

--
-- Indexes for table `databeasiswapesertadidik`
--
ALTER TABLE `databeasiswapesertadidik`
  ADD PRIMARY KEY (`id_beasiswa`),
  ADD KEY `databeasiswapesertadidik_id_beasiswa_peserta_didik_foreign` (`id_beasiswa_peserta_didik`);

--
-- Indexes for table `dataibupesertadidik`
--
ALTER TABLE `dataibupesertadidik`
  ADD PRIMARY KEY (`id_data_ibu`),
  ADD KEY `dataibupesertadidik_id_ibu_peserta_didik_foreign` (`id_ibu_peserta_didik`);

--
-- Indexes for table `dataperiodikpesertadidik`
--
ALTER TABLE `dataperiodikpesertadidik`
  ADD PRIMARY KEY (`id_data_periodik`),
  ADD KEY `dataperiodikpesertadidik_id_periodik_peserta_didik_foreign` (`id_periodik_peserta_didik`);

--
-- Indexes for table `dataprestasipesertadidik`
--
ALTER TABLE `dataprestasipesertadidik`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `dataprestasipesertadidik_id_prestasi_peserta_didik_foreign` (`id_prestasi_peserta_didik`);

--
-- Indexes for table `datawalipesertadidik`
--
ALTER TABLE `datawalipesertadidik`
  ADD PRIMARY KEY (`id_data_wali`),
  ADD KEY `datawalipesertadidik_id_wali_peserta_didik_foreign` (`id_wali_peserta_didik`);

--
-- Indexes for table `kontakkami`
--
ALTER TABLE `kontakkami`
  ADD PRIMARY KEY (`id_kontak`),
  ADD UNIQUE KEY `kontakkami_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `kontakkami_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesertadidikbaru`
--
ALTER TABLE `pesertadidikbaru`
  ADD PRIMARY KEY (`id_peserta_didik`),
  ADD UNIQUE KEY `pesertadidikbaru_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `pesertadidikbaru_nis_unique` (`nis`),
  ADD UNIQUE KEY `pesertadidikbaru_nik_unique` (`nik`),
  ADD UNIQUE KEY `pesertadidikbaru_email_pribadi_unique` (`email_pribadi`);

--
-- Indexes for table `responsetransaksi`
--
ALTER TABLE `responsetransaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `responsetransaksi_order_by_id_foreign` (`order_by_id`);

--
-- Indexes for table `tokenpilihjurusanpeserta`
--
ALTER TABLE `tokenpilihjurusanpeserta`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `tokenpilihjurusanpeserta_id_token_peserta_didik_foreign` (`id_token_peserta_didik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verifiksipersertadidikbaru`
--
ALTER TABLE `verifiksipersertadidikbaru`
  ADD PRIMARY KEY (`id_verifikasi`),
  ADD UNIQUE KEY `verifiksipersertadidikbaru_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `verifiksipersertadidikbaru_nis_unique` (`nis`),
  ADD KEY `verifiksipersertadidikbaru_id_verifikasi_perserta_didik_foreign` (`id_verifikasi_perserta_didik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarakunpesertabaru`
--
ALTER TABLE `daftarakunpesertabaru`
  MODIFY `id_daftar_akun_peserta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `dataayahpesertadidik`
--
ALTER TABLE `dataayahpesertadidik`
  MODIFY `id_data_ayah` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `databeasiswapesertadidik`
--
ALTER TABLE `databeasiswapesertadidik`
  MODIFY `id_beasiswa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dataibupesertadidik`
--
ALTER TABLE `dataibupesertadidik`
  MODIFY `id_data_ibu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dataperiodikpesertadidik`
--
ALTER TABLE `dataperiodikpesertadidik`
  MODIFY `id_data_periodik` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dataprestasipesertadidik`
--
ALTER TABLE `dataprestasipesertadidik`
  MODIFY `id_prestasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `datawalipesertadidik`
--
ALTER TABLE `datawalipesertadidik`
  MODIFY `id_data_wali` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kontakkami`
--
ALTER TABLE `kontakkami`
  MODIFY `id_kontak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `pesertadidikbaru`
--
ALTER TABLE `pesertadidikbaru`
  MODIFY `id_peserta_didik` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `responsetransaksi`
--
ALTER TABLE `responsetransaksi`
  MODIFY `id_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tokenpilihjurusanpeserta`
--
ALTER TABLE `tokenpilihjurusanpeserta`
  MODIFY `id_token` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifiksipersertadidikbaru`
--
ALTER TABLE `verifiksipersertadidikbaru`
  MODIFY `id_verifikasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dataayahpesertadidik`
--
ALTER TABLE `dataayahpesertadidik`
  ADD CONSTRAINT `dataayahpesertadidik_id_ayah_peserta_didik_foreign` FOREIGN KEY (`id_ayah_peserta_didik`) REFERENCES `pesertadidikbaru` (`id_peserta_didik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `databeasiswapesertadidik`
--
ALTER TABLE `databeasiswapesertadidik`
  ADD CONSTRAINT `databeasiswapesertadidik_id_beasiswa_peserta_didik_foreign` FOREIGN KEY (`id_beasiswa_peserta_didik`) REFERENCES `pesertadidikbaru` (`id_peserta_didik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dataibupesertadidik`
--
ALTER TABLE `dataibupesertadidik`
  ADD CONSTRAINT `dataibupesertadidik_id_ibu_peserta_didik_foreign` FOREIGN KEY (`id_ibu_peserta_didik`) REFERENCES `pesertadidikbaru` (`id_peserta_didik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dataperiodikpesertadidik`
--
ALTER TABLE `dataperiodikpesertadidik`
  ADD CONSTRAINT `dataperiodikpesertadidik_id_periodik_peserta_didik_foreign` FOREIGN KEY (`id_periodik_peserta_didik`) REFERENCES `pesertadidikbaru` (`id_peserta_didik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dataprestasipesertadidik`
--
ALTER TABLE `dataprestasipesertadidik`
  ADD CONSTRAINT `dataprestasipesertadidik_id_prestasi_peserta_didik_foreign` FOREIGN KEY (`id_prestasi_peserta_didik`) REFERENCES `pesertadidikbaru` (`id_peserta_didik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `datawalipesertadidik`
--
ALTER TABLE `datawalipesertadidik`
  ADD CONSTRAINT `datawalipesertadidik_id_wali_peserta_didik_foreign` FOREIGN KEY (`id_wali_peserta_didik`) REFERENCES `pesertadidikbaru` (`id_peserta_didik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `responsetransaksi`
--
ALTER TABLE `responsetransaksi`
  ADD CONSTRAINT `responsetransaksi_order_by_id_foreign` FOREIGN KEY (`order_by_id`) REFERENCES `pesertadidikbaru` (`id_peserta_didik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tokenpilihjurusanpeserta`
--
ALTER TABLE `tokenpilihjurusanpeserta`
  ADD CONSTRAINT `tokenpilihjurusanpeserta_id_token_peserta_didik_foreign` FOREIGN KEY (`id_token_peserta_didik`) REFERENCES `pesertadidikbaru` (`id_peserta_didik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verifiksipersertadidikbaru`
--
ALTER TABLE `verifiksipersertadidikbaru`
  ADD CONSTRAINT `verifiksipersertadidikbaru_id_verifikasi_perserta_didik_foreign` FOREIGN KEY (`id_verifikasi_perserta_didik`) REFERENCES `pesertadidikbaru` (`id_peserta_didik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
