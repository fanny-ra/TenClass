-- phpMyAdmin SQL Dump
-- version 5.2.2deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2026 at 02:55 PM
-- Server version: 11.8.3-MariaDB-0+deb13u1 from Debian
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenclassnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `auths`
--

CREATE TABLE `auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_10_23_055345_create_study_groups_table', 1),
(4, '2025_10_23_065149_create_users_table', 1),
(5, '2025_10_23_065316_create_rooms_table', 1),
(6, '2025_10_23_065359_create_schedules_table', 1),
(7, '2025_11_20_033019_create_auths_table', 1);

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `type` enum('teori','aula','lab') NOT NULL,
  `shielded` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `capacity`, `type`, `shielded`, `created_at`, `updated_at`) VALUES
(1, 'Aula', 150, 'aula', 1, NULL, NULL),
(2, 'RT 1', 40, 'teori', 0, NULL, NULL),
(3, 'RT 2', 40, 'teori', 0, NULL, NULL),
(4, 'RT 3', 40, 'teori', 0, NULL, NULL),
(5, 'RT 4', 40, 'teori', 0, NULL, NULL),
(6, 'RT 5', 40, 'teori', 0, NULL, NULL),
(7, 'RT 6', 40, 'teori', 0, NULL, NULL),
(8, 'RT 7', 40, 'teori', 0, NULL, NULL),
(9, 'RT 8', 40, 'teori', 0, NULL, NULL),
(10, 'RT 9', 40, 'teori', 0, NULL, NULL),
(11, 'RT 10', 40, 'teori', 0, NULL, NULL),
(12, 'RT 11', 40, 'teori', 0, NULL, NULL),
(13, 'RT 12', 40, 'teori', 0, NULL, NULL),
(14, 'RT 13', 40, 'teori', 0, NULL, NULL),
(15, 'RT 14', 40, 'teori', 0, NULL, NULL),
(16, 'RT 15', 40, 'teori', 0, NULL, NULL),
(17, 'RT 16', 40, 'teori', 0, NULL, NULL),
(18, 'RT 17', 40, 'teori', 0, NULL, NULL),
(19, 'RT 18', 40, 'teori', 0, NULL, NULL),
(20, 'LAB RPL', 40, 'lab', 1, NULL, NULL),
(21, 'LAB AKL', 40, 'lab', 1, NULL, NULL),
(22, 'LAB BD/BR', 40, 'lab', 1, NULL, NULL),
(23, 'LAB MP/MLOG', 40, 'lab', 1, NULL, NULL),
(24, 'LAB Multimedia', 40, 'lab', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_session` time NOT NULL,
  `end_session` time NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `recurring` tinyint(1) NOT NULL DEFAULT 0,
  `recurring_type` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `date`, `start_session`, `end_session`, `type`, `user_id`, `room_id`, `description`, `recurring`, `recurring_type`, `status`, `created_at`, `updated_at`) VALUES
(3, '2025-10-20', '10:00:00', '15:00:00', 'Lainnya', 4, 2, 'MPK', 0, NULL, 'disetujui', '2026-02-11 20:58:36', '2026-02-11 20:58:36'),
(6, '2025-10-20', '10:00:00', '15:00:00', 'Lainnya', 4, 2, 'MPK', 0, NULL, 'disetujui', '2026-02-11 21:19:36', '2026-02-11 21:19:36'),
(8, '2026-02-13', '07:00:00', '15:00:00', 'KBM', 4, 2, 'belajar', 0, NULL, 'disetujui', '2026-02-11 21:46:15', '2026-02-23 18:18:47'),
(9, '2026-02-20', '09:00:00', '12:00:00', 'Rapat', 4, 1, 'rapat penampilan', 0, NULL, 'ditolak', '2026-03-11 21:54:09', '2026-02-12 00:07:28'),
(12, '2026-03-12', '07:00:00', '13:30:00', 'KBM', 4, 2, 'KBM', 0, NULL, 'pending', '2026-03-11 19:54:21', '2026-03-11 19:54:21'),
(13, '2026-03-12', '15:00:00', '16:45:00', 'Ekstrakurikuler', 5, 2, 'Eskul Teater', 1, 'pekanan', 'disetujui', NULL, NULL),
(14, '2026-03-12', '15:00:00', '16:45:00', 'Ekstrakurikuler', 5, 3, 'Eskul Saman', 1, 'pekanan', 'disetujui', NULL, NULL),
(19, '2026-03-12', '15:00:00', '16:45:00', 'Ekstrakurikuler', 3, 5, 'Eskul Go Green', 1, 'pekanan', 'disetujui', NULL, NULL),
(20, '2026-03-12', '15:00:00', '16:45:00', 'Ekstrakurikuler', 4, 6, 'Eskul English Club', 1, 'pekanan', 'disetujui', NULL, NULL),
(21, '2026-03-12', '15:00:00', '16:45:00', 'Ekstrakurikuler', 3, 7, 'Eskul Karya Ilmiah Remaja', 1, 'pekanan', 'disetujui', NULL, NULL),
(22, '2026-03-13', '15:00:00', '16:45:00', 'Ekstrakurikuler', 5, 6, 'Eskul Paduan Suara', 1, 'pekanan', 'disetujui', NULL, NULL),
(23, '2026-03-13', '15:00:00', '16:45:00', 'Ekstrakurikuler', 3, 8, 'Eskul Tatra Betawi', 1, 'pekanan', 'disetujui', NULL, NULL),
(24, '2026-03-16', '15:00:00', '16:45:00', 'Ekstrakurikuler', 5, 8, 'Eskul Tatra Betawi', 1, 'pekanan', 'disetujui', NULL, NULL),
(25, '2026-03-17', '15:00:00', '16:45:00', 'Ekstrakurikuler', 3, 2, 'Eskul IT Club', 1, 'pekanan', 'disetujui', NULL, NULL),
(26, '2026-03-17', '15:00:00', '16:45:00', 'Ekstrakurikuler', 5, 3, 'Eskul Saman', 1, 'pekanan', 'disetujui', NULL, NULL),
(27, '2026-03-17', '15:00:00', '16:45:00', 'Ekstrakurikuler', 4, 4, 'Eskul PMR', 1, 'pekanan', 'disetujui', NULL, NULL),
(28, '2026-03-17', '15:00:00', '16:45:00', 'Ekstrakurikuler', 3, 5, 'Eskul Mading', 1, 'pekanan', 'disetujui', NULL, NULL),
(29, '2026-03-17', '15:00:00', '16:45:00', 'Ekstrakurikuler', 5, 6, 'Eskul Bahasa Korea', 1, 'pekanan', 'disetujui', NULL, NULL),
(30, '2026-03-17', '15:00:00', '16:45:00', 'Ekstrakurikuler', 4, 8, 'Eskul PKS', 1, 'pekanan', 'disetujui', NULL, NULL),
(31, '2026-03-18', '15:00:00', '16:45:00', 'Ekstrakurikuler', 4, 2, 'Eskul Kesenian', 1, 'pekanan', 'disetujui', NULL, NULL),
(32, '2026-03-17', '15:00:00', '16:45:00', 'Lainnya', 4, 14, 'Kerja Kelompok', 0, NULL, 'pending', '2026-03-12 06:56:21', '2026-03-12 06:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7Sp6mzaAWpk4RTahWLev0Cv0OUkS7K4T96e5ntnq', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUmdyS2t0cWFoWEJvbHUwWTZ0OHZEbElNOHRVUzhOTVE3ZlFjWmdSRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwOi8vbG9jYWxob3N0OjgwMDEvc2NoZWR1bGVzL2NyZWF0ZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1773326265),
('AZYIA2cWzfE2RgHA4ejUpa1dK7LHZehDfkxMnkky', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaVRUb2hUTnE3bG4zZktBeUZmcVZUNm1rWndadzVXU0Q4ZjVRZjFadCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0OjgwMDEvc2NoZWR1bGVzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1773288707);

-- --------------------------------------------------------

--
-- Table structure for table `study_groups`
--

CREATE TABLE `study_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_groups`
--

INSERT INTO `study_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'X RPL', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(2, 'X MP', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(3, 'X Mlog', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(4, 'X AK 1', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(5, 'X AK 2', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(6, 'X BR', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(7, 'X BD', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(8, 'XI RPL', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(9, 'XI MP', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(10, 'XI Mlog', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(11, 'XI AK 1', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(12, 'XI AK 2', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(13, 'XI BR', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(14, 'XI BD', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(15, 'XII RPL', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(16, 'XII MP', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(17, 'XII Mlog', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(18, 'XII AK 1', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(19, 'XII AK 2', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(20, 'XII BR', '2026-02-11 20:58:35', '2026-02-11 20:58:35'),
(21, 'XII BD', '2026-02-11 20:58:35', '2026-02-11 20:58:35');

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
  `role` enum('murid','guru') NOT NULL,
  `is_sarpras` tinyint(1) NOT NULL DEFAULT 0,
  `is_osis` tinyint(1) NOT NULL DEFAULT 0,
  `study_groups_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `is_sarpras`, `is_osis`, `study_groups_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nurtovingah', 'sarpras@gmail.com', '2026-02-11 20:58:35', '$2y$12$QCp.Wbh72/YXTPWv0T08D.mJtZ.93UufFoalmquJ9ggOG.ZVrZEUq', 'guru', 1, 0, NULL, 'SwwedzgrtsOAT8nMw6s8XPgc8RdtlxYHd8K8qd7T1uGkQ8AXb24GKWQhBxv1', '2026-02-11 20:58:36', '2026-02-11 20:58:36'),
(2, 'Mujahid', 'mujahid_guru@gmail.com', '2026-02-11 20:58:36', '$2y$12$owQyI/d6Rd1tb8DKrRRzG.m4tl3xGtzhGyTJhaaJjA.z8GrokRDOO', 'guru', 0, 0, NULL, 'LbJIX10chx', '2026-02-11 20:58:36', '2026-02-11 20:58:36'),
(3, 'Husna', 'husna_osis@gmail.com', '2026-02-11 20:58:36', '$2y$12$aBuviP4QEK.110ZV6VWxxu6sHO8AJGOB9PRKRlIgiC4SSh46TQE0G', 'murid', 0, 1, NULL, 'O8K5up8HRi3VQ2lyMdrhi6N2wFzfM6zgkGDXaxvSj3w3Z7RMuPDodLhvUYuH', '2026-02-11 20:58:36', '2026-02-11 20:58:36'),
(4, 'Apip', 'apip@gmail.com', '2026-02-11 20:58:36', '$2y$12$Oxjv/rVjeTH/mFDmLjHyRe.a7S.Hm28G09H9Sp5AHDLckpvu9nDFq', 'murid', 0, 0, 8, 'niWueYTTLDKnG6PP8qVhIh5JWU08aM4HjAzGe7hw2AZYLy2caGg4BICsS6ku', '2026-02-11 20:58:36', '2026-02-11 20:58:36'),
(5, 'nabila', 'nabila@gmail.com', NULL, '$2y$12$I2q67c7AAzoAMLqddQW7ZuBmXRXYSZ.uIpAYng.Ux7Gbub8lb68ha', 'murid', 0, 0, 11, NULL, '2026-02-11 23:25:51', '2026-02-11 23:25:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auths`
--
ALTER TABLE `auths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_user_id_foreign` (`user_id`),
  ADD KEY `schedules_room_id_foreign` (`room_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `study_groups`
--
ALTER TABLE `study_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_study_groups_id_foreign` (`study_groups_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auths`
--
ALTER TABLE `auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `study_groups`
--
ALTER TABLE `study_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_study_groups_id_foreign` FOREIGN KEY (`study_groups_id`) REFERENCES `study_groups` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
