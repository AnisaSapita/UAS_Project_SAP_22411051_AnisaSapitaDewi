-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2025 at 04:46 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_perusahaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cutis`
--

CREATE TABLE `cutis` (
  `id` bigint UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('diajukan','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diajukan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cutis`
--

INSERT INTO `cutis` (`id`, `karyawan_id`, `tanggal_mulai`, `tanggal_selesai`, `alasan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-07-03', '2025-07-08', 'sakit', 'disetujui', '2025-07-03 00:16:36', '2025-07-03 00:17:16'),
(2, 2, '2025-07-04', '2025-07-05', 'acara keluarga', 'diajukan', '2025-07-03 06:17:31', '2025-07-03 06:17:31'),
(3, 4, '2025-06-04', '2025-07-04', 'mau libur aja', 'disetujui', '2025-07-03 19:39:55', '2025-07-03 19:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gajis`
--

CREATE TABLE `gajis` (
  `id` bigint UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `bulan_tahun` date NOT NULL,
  `gaji_pokok` decimal(15,2) NOT NULL,
  `tunjangan` decimal(15,2) NOT NULL DEFAULT '0.00',
  `potongan` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_gaji` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gajis`
--

INSERT INTO `gajis` (`id`, `karyawan_id`, `bulan_tahun`, `gaji_pokok`, `tunjangan`, `potongan`, `total_gaji`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-07-28', '5000000.00', '500000.00', '0.00', '5500000.00', '2025-07-03 00:18:18', '2025-07-03 00:18:18'),
(2, 2, '2025-07-28', '7000000.00', '500000.00', '0.00', '7500000.00', '2025-07-03 06:23:52', '2025-07-03 06:23:52'),
(3, 3, '2025-07-28', '5000000.00', '500000.00', '200000.00', '5300000.00', '2025-07-03 06:25:03', '2025-07-03 06:25:03'),
(4, 4, '2025-12-20', '10000000.00', '50000.00', '0.00', '10050000.00', '2025-07-03 19:43:00', '2025-07-03 19:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `perusahaan_id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `user_id`, `perusahaan_id`, `nama_lengkap`, `jabatan`, `nomor_telepon`, `alamat`, `tanggal_bergabung`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'bela sofia', 'karyawan', '081234567890', 'labuhan ratu', '2025-07-03', '2025-07-03 00:15:56', '2025-07-03 00:15:56'),
(2, 5, 1, 'abidzar', 'HRD', '080987654321', 'tanggamus', '2025-07-03', '2025-07-03 06:05:53', '2025-07-03 06:05:53'),
(3, 6, 1, 'salsabila maharani', 'Karyawan', '0857123456', 'pringsewu', '2025-07-03', '2025-07-03 06:18:56', '2025-07-03 06:18:56'),
(4, 7, 1, 'liyaa', 'Bos', '081523739652', 'nona ambon', '2025-07-04', '2025-07-03 19:38:45', '2025-07-03 19:38:45'),
(5, 8, 1, 'anisa', 'dfghj', '12345687', 'dxfghjk', '2025-07-04', '2025-07-03 20:05:18', '2025-07-03 20:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_perusahaans_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2025_06_22_081200_create_companies_table', 1),
(8, '2025_06_22_110759_create_karyawans_table', 1),
(9, '2025_06_22_110900_create_gajis_table', 1),
(10, '2025_06_22_110909_create_cutis_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaans`
--

INSERT INTO `perusahaans` (`id`, `nama_perusahaan`, `email_perusahaan`, `telepon`, `alamat`, `visi`, `misi`, `npwp`, `website`, `created_at`, `updated_at`) VALUES
(1, 'PT. Makmur Sejahtera Abadi', 'contact@makmursejahtera.co.id', '(021) 555-1234', 'jl purnawirawan', 'Menjadi pilar kemakmuran yang berkelanjutan, bertumbuh bersama para mitra untuk mewujudkan kesejahteraan bagi masyarakat luas.', 'Menjalin kemitraan strategis yang kokoh dan saling menguntungkan.\r\nMenyediakan produk dan layanan unggul yang memberikan nilai tambah maksimal.\r\nMembangun sumber daya manusia yang kompeten, berintegritas, dan sejahtera.\r\nMenerapkan tata kelola perusahaan yang baik demi pertumbuhan yang solid dan abadi.', '34567', 'https://www.makmursejahteraabadi.com', '2025-07-02 21:09:34', '2025-07-03 20:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('superadmin','admin','karyawan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `perusahaan_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@perusahaan.com', NULL, '$2y$12$bDbgDv6Mvhh8CB.ku0pzj.spX2AoNxKOByHntADC8Rvl1pPgFmECS', 'superadmin', NULL, NULL, '2025-07-02 21:09:35', '2025-07-02 21:09:35'),
(2, 'anisa sapita dewi', 'anisa@gmail.com', NULL, '$2y$12$HKVXLz6h/dLXOOQXyAPBReBa.DbI03WN51MZENLniud4BmKHJsP3O', 'admin', 1, NULL, '2025-07-02 21:19:45', '2025-07-03 05:21:07'),
(3, 'bela sofia', 'bel@gmail.com', NULL, '$2y$12$w0IHLz0hO6a8.LvgeSWUiOUFvTPchHBD/K2V8Ch3r35VkE55QTVZW', 'karyawan', NULL, NULL, '2025-07-03 00:15:56', '2025-07-03 00:15:56'),
(4, 'anira safitri', 'ani@gmail.com', NULL, '$2y$12$diYL10SbPXdKDnNA59ve1u6CtiFq2wmWwMXnbKR87kijcoJ8d7bLy', 'admin', 1, NULL, '2025-07-03 05:21:54', '2025-07-03 05:21:54'),
(5, 'abidzar', 'abi@gmail.com', NULL, '$2y$12$0EaE9egTsqLKVzXmHjWsq.wBBCHKTKvBcCzXFuYVbnWUmSQm.jAu2', 'karyawan', NULL, NULL, '2025-07-03 06:05:53', '2025-07-03 06:05:53'),
(6, 'salsabila maharani', 'sal@gmail.com', NULL, '$2y$12$jnKT0vuJ7MHLvefIryfWIeW965SFJEc3viqbznpc09jBOpgobhYr6', 'karyawan', NULL, NULL, '2025-07-03 06:18:56', '2025-07-03 06:18:56'),
(7, 'liyaa', 'liya@gmail.com', NULL, '$2y$12$jMUpoe3aspxP3HZG3cByzuurKrl4cywwNm.y6vvqECgQdWqKdq20m', 'karyawan', NULL, NULL, '2025-07-03 19:38:45', '2025-07-03 19:38:45'),
(8, 'anisa', 'anisaa@gmail.com', NULL, '$2y$12$vicOjmB/nr51XAqa8.H2YOCy3CxZ.Rszqt2Rs.YU/.BmgmkslRODu', 'karyawan', NULL, NULL, '2025-07-03 20:05:18', '2025-07-03 20:05:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cutis`
--
ALTER TABLE `cutis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cutis_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gajis`
--
ALTER TABLE `gajis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gajis_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawans_user_id_foreign` (`user_id`),
  ADD KEY `karyawans_perusahaan_id_foreign` (`perusahaan_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perusahaans_email_perusahaan_unique` (`email_perusahaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_perusahaan_id_foreign` (`perusahaan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cutis`
--
ALTER TABLE `cutis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gajis`
--
ALTER TABLE `gajis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cutis`
--
ALTER TABLE `cutis`
  ADD CONSTRAINT `cutis_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gajis`
--
ALTER TABLE `gajis`
  ADD CONSTRAINT `gajis_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `karyawans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaans` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
