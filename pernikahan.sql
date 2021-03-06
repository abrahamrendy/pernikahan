-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 05:35 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pernikahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_mempelai`
--

CREATE TABLE `calon_mempelai` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '0:pria; 1:wanita',
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `tempat_ibadah` varchar(255) DEFAULT NULL,
  `tanggal_baptis` date DEFAULT NULL,
  `gereja_baptis` varchar(255) DEFAULT NULL,
  `tanggal_berjemaat` date DEFAULT NULL,
  `no_kaj` varchar(255) DEFAULT NULL,
  `status_nikah` tinyint(4) NOT NULL COMMENT '0:belum menikah; 1: menikah; 2: cerai',
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `akte_lahir` varchar(255) DEFAULT NULL,
  `surat_baptis` varchar(255) DEFAULT NULL,
  `surat_ganti_nama` varchar(255) DEFAULT NULL,
  `surat_ganti_nama_ayah` varchar(255) DEFAULT NULL,
  `surat_ganti_nama_ibu` varchar(255) DEFAULT NULL,
  `ktp_ayah` varchar(255) DEFAULT NULL,
  `ktp_ibu` varchar(255) DEFAULT NULL,
  `akte_kematian_ayah` varchar(255) DEFAULT NULL,
  `akte_kematian_ibu` varchar(255) DEFAULT NULL,
  `surat_persetujuan_ortu` varchar(255) DEFAULT NULL,
  `surat_keterangan_belum_nikah` varchar(255) DEFAULT NULL,
  `kaj` varchar(255) DEFAULT NULL,
  `kom_100` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_mempelai`
--

INSERT INTO `calon_mempelai` (`id`, `nama`, `gender`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `tempat_ibadah`, `tanggal_baptis`, `gereja_baptis`, `tanggal_berjemaat`, `no_kaj`, `status_nikah`, `nama_ayah`, `nama_ibu`, `ktp`, `kk`, `akte_lahir`, `surat_baptis`, `surat_ganti_nama`, `surat_ganti_nama_ayah`, `surat_ganti_nama_ibu`, `ktp_ayah`, `ktp_ibu`, `akte_kematian_ayah`, `akte_kematian_ibu`, `surat_persetujuan_ortu`, `surat_keterangan_belum_nikah`, `kaj`, `kom_100`, `created_at`, `updated_at`) VALUES
(1, 'Siska', 0, 'B', '2000-09-09', 'Sjajanai', '12334556677', 'GBI ARUNA', '2012-01-23', 'Gbi', '2020-01-23', '2344', 1, 'Sd', 'We', 'https://drive.google.com/open?id=1dswRTjSYjZFcOP-51Y6T9J8ch4aNF_ry', 'https://drive.google.com/open?id=1tifD0Dny-wH5xQOeskV73kUORKWi-YCM', 'https://drive.google.com/open?id=1U0mq8P1MDScRcn_LQGU8zC2sFlyL8DtD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://drive.google.com/open?id=1-AkSAUTjqwCY6mmMk_xgvr4s82RNBMsy', NULL, NULL, NULL, '2021-06-17 10:32:23', '2022-01-05 07:12:33'),
(2, 'Siska', 1, 'B', '2001-09-09', 'Jha', '123440000', 'GBI ARUNA', '2011-02-15', 'Gbi', '2019-12-25', '2377', 0, 'Jg', 'Jh', 'https://drive.google.com/open?id=1WKkSmwljhV1tkk26VeE4hWCzQe552qm6', 'https://drive.google.com/open?id=1EH8gTT_H92aRlGVzuCmnWJRSDjLd8Ax2', 'https://drive.google.com/open?id=1T3SoWuo7-1t0XjhuKXXTf-oRzuBR7tCh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://drive.google.com/open?id=1z5btKwFl9EohqhORJXWmhNu9mmewIqT0', NULL, NULL, NULL, '2021-06-17 10:32:23', '2022-01-05 07:12:33'),
(3, 'Henry', 0, 'Bdg', '1980-04-10', 'Dadali', '10191716', 'GBI ARUNA', '1970-01-01', NULL, '1970-01-01', NULL, 0, 'Gh', 'Hg', 'https://drive.google.com/open?id=1y7omoDQWUk350xh6wVOGCj_RmgmX6WKY', NULL, 'https://drive.google.com/open?id=1Ttmy0JtPQeY_N3V-YufEKNUQDvPe7YSq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-17 11:03:38', '2022-01-05 07:12:33'),
(4, 'Siska', 1, 'Bdg', '1990-09-09', 'Basalamah', '10191716', 'GBI ARUNA', '1970-01-01', NULL, '1970-01-01', NULL, 0, 'Sh', 'Hs', 'https://drive.google.com/open?id=1a-xl9IixCG0mUg3dhmMQ-715Cbtzj_Sr', NULL, 'https://drive.google.com/open?id=1sNao30qMCbFDVRcfS9zc4BPd7mo4TEad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-17 11:03:38', '2022-01-05 07:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `pemberkatan`
--

CREATE TABLE `pemberkatan` (
  `id` int(255) NOT NULL,
  `mempelai_pria` int(11) NOT NULL,
  `mempelai_wanita` int(11) NOT NULL,
  `status_pernikahan` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `surat_pernyataan` varchar(255) DEFAULT NULL,
  `pas_foto` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemberkatan`
--

INSERT INTO `pemberkatan` (`id`, `mempelai_pria`, `mempelai_wanita`, `status_pernikahan`, `tanggal`, `tempat`, `surat_pernyataan`, `pas_foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'SP', '2022-07-03 10:00:00', 'Gbi Aruna', NULL, NULL, 0, '2021-06-17 10:32:23', '2022-01-05 07:12:33'),
(2, 3, 4, 'SP', '2022-12-03 10:00:00', 'GBI ARUNA', NULL, NULL, 2, '2021-06-17 11:03:38', '2022-01-05 07:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin@arh.com', NULL, '$2y$10$DJqQlQ0ZVUT6oDw.fNk2k.A/qbsrTZZCVU4aSJDZ8KE72hfE2Q7x2', NULL, '2021-12-28 01:12:52', '2021-12-28 01:12:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_mempelai`
--
ALTER TABLE `calon_mempelai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `pemberkatan`
--
ALTER TABLE `pemberkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `calon_mempelai`
--
ALTER TABLE `calon_mempelai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemberkatan`
--
ALTER TABLE `pemberkatan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
