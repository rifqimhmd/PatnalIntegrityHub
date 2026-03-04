-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2026 at 08:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patnalintegrityhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_at`, `updated_at`) VALUES
(7, 'latjuBkeNXDkIEu55XWPx7ICj6c79zMnYmaKBs6o.png', '2026-02-27 08:25:35', '2026-02-27 08:25:35'),
(8, 'MA6vj6FFRdYfmsuW3MArTD1dn1hiPqoD8HkdZQxl.png', '2026-02-27 08:25:41', '2026-02-27 08:25:41'),
(9, 'I3ZVKCE5NJ5zSM2d2CTeyphYtnD9z10DAwRA6QGu.png', '2026-02-27 08:25:47', '2026-02-27 08:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_02_24_033341_create_tbl_user_table', 1),
(6, '2026_02_24_041913_alter_email_nullable_on_tbl_user', 1),
(7, '2026_02_25_115640_create_banners_table', 2),
(8, '2026_02_25_120219_create_banners_table', 3),
(9, '2026_02_26_141245_create_s_o_p_s_table', 4),
(10, '2026_02_26_141520_create_videos_table', 4),
(11, '2026_02_26_141742_create_peraturans_table', 5),
(12, '2026_02_27_093718_add_thumbnail_to_videos_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peraturans`
--

CREATE TABLE `peraturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peraturans`
--

INSERT INTO `peraturans` (`id`, `judul`, `file`, `created_at`, `updated_at`) VALUES
(6, 'Kode Etik Pegawai Pemasyarakatan', '1772515648_Kode Etik Pegawai Pemasyarakatan.pdf', '2026-03-03 05:27:28', '2026-03-03 05:27:28'),
(7, 'Netralitas ASN dalam Pilkada', '1772515716_Netralitas ASN dalam Pilkada.pdf', '2026-03-03 05:28:36', '2026-03-03 05:28:36'),
(8, 'Permen Iminpas No. 1 Tahun 2024', '1772515730_Permen Iminpas No. 1 Tahun 2024.pdf', '2026-03-03 05:28:50', '2026-03-03 05:28:50'),
(9, 'PP No. 94 Tahun 2021 tentang Disiplin PNS', '1772515777_PP No. 94 Tahun 2021 tentang Disiplin PNS.pdf', '2026-03-03 05:29:37', '2026-03-03 05:29:37'),
(10, 'Sanksi Pelanggaran Disiplin Berat ASN dalam Perspektif Hukum', '1772515788_Sanksi Pelanggaran Disiplin Berat ASN dalam Perspektif Hukum.pdf', '2026-03-03 05:29:48', '2026-03-03 05:29:48'),
(11, 'UU ASN No.20 Tahun 2023 Tentang ASN', '1772515800_UU ASN No.20 Tahun 2023 Tentang ASN.pdf', '2026-03-03 05:30:00', '2026-03-03 05:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_o_p_s`
--

CREATE TABLE `s_o_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_o_p_s`
--

INSERT INTO `s_o_p_s` (`id`, `judul`, `file`, `created_at`, `updated_at`) VALUES
(6, 'SOP Pelaporan Gratifikasi', '1772516369_Kode Etik Pegawai Pemasyarakatan.pdf', '2026-03-03 05:39:29', '2026-03-03 05:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `no_wa` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `institusi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_role` enum('admin','pegawai','psikolog') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `verifikasi` enum('aktif','tidak aktif') NOT NULL DEFAULT 'tidak aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nip`, `nama_lengkap`, `email`, `foto`, `no_wa`, `password`, `institusi_id`, `nama_role`, `is_active`, `verifikasi`, `created_at`, `updated_at`) VALUES
(1, '200009032025061005', 'Rifqi Muhammad', NULL, NULL, NULL, '$2y$12$hNdqzl/.smnOyTe/BU0.leLDhUOY4qPBiOmV7auVzd6X6.wUVuctS', NULL, 'pegawai', 1, 'tidak aktif', '2026-02-23 21:25:12', '2026-03-03 05:49:41'),
(2, '0000', 'Admin Patnal', NULL, NULL, NULL, '$2y$12$ePNhx3dd/Y8aHLEs95ecm.RpQNGUEYJnorf./MlwqbR27r2aZwSTy', NULL, 'admin', 0, 'aktif', '2026-02-24 04:39:58', '2026-03-04 06:44:42'),
(4, '199712082003122002', 'Winanti, S.psi., M.si', NULL, NULL, NULL, '$2y$12$KYpoKesRUTUfv8EVzO80KeX3rxPWRlqsOkSFST8ZEVwW9L/IiGPUW', NULL, 'psikolog', 0, 'tidak aktif', '2026-02-27 06:48:41', '2026-02-27 06:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `judul`, `url`, `thumbnail`, `created_at`, `updated_at`) VALUES
(9, 'Videografis Peraturan Pemerintah Nomor 94 Tahun 2021 tentang Disiplin Pegawai Negeri Sipil', 'https://www.youtube.com/embed/bFmGdzeEV0s', 'https://img.youtube.com/vi/bFmGdzeEV0s/hqdefault.jpg', '2026-02-27 06:50:43', '2026-02-27 06:50:43'),
(10, 'Pembahasan Lengkap Undang-undang ASN Terbaru ❗️UU No. 20 Tahun 2023 tentang ASN', 'https://www.youtube.com/embed/6YOkAL8BoUU', 'https://img.youtube.com/vi/6YOkAL8BoUU/hqdefault.jpg', '2026-02-27 06:52:29', '2026-02-27 06:52:29'),
(11, 'Kesehatan Mental di Tempat Kerja', 'https://www.youtube.com/embed/aVgihMIhi6c', 'https://img.youtube.com/vi/aVgihMIhi6c/hqdefault.jpg', '2026-02-27 06:52:51', '2026-02-27 06:52:51'),
(12, 'Korupsi awal dari kemunduran negeri', 'https://www.youtube.com/embed/nP94bjzVUVY', 'https://img.youtube.com/vi/nP94bjzVUVY/hqdefault.jpg', '2026-02-27 06:53:53', '2026-02-27 06:53:53'),
(13, 'INDONESIA MERDEKA TANPA KORUPSI DAN GRATIFIKASI', 'https://www.youtube.com/embed/OkgbKHkErjs', 'https://img.youtube.com/vi/OkgbKHkErjs/hqdefault.jpg', '2026-02-27 06:54:19', '2026-02-27 06:54:19'),
(14, 'AYO TOLAK GRATIFIKASI', 'https://www.youtube.com/embed/wygiJONYlQA', 'https://img.youtube.com/vi/wygiJONYlQA/hqdefault.jpg', '2026-02-27 06:54:53', '2026-02-27 06:54:53'),
(16, 'ILM | LAPOR GRATIFIKASI', 'https://www.youtube.com/embed/XyBxnqWxWns', 'https://img.youtube.com/vi/XyBxnqWxWns/hqdefault.jpg', '2026-02-27 07:01:36', '2026-02-27 07:01:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peraturans`
--
ALTER TABLE `peraturans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `s_o_p_s`
--
ALTER TABLE `s_o_p_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tbl_user_nip_unique` (`nip`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peraturans`
--
ALTER TABLE `peraturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_o_p_s`
--
ALTER TABLE `s_o_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
