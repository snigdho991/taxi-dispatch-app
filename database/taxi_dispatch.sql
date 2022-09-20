-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2022 at 04:30 AM
-- Server version: 5.7.37-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi_dispatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `arrival_date` varchar(505) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(205) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_count` bigint(20) NOT NULL,
  `luggage_count` int(11) NOT NULL,
  `car_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flight_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_uber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `projected_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_clients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_06_01_032222_create_sessions_table', 1),
(7, '2021_06_01_041521_create_permission_tables', 1),
(8, '2021_06_01_042457_insert_attributes_to_users_table', 1),
(9, '2022_02_27_112704_create_feedback_table', 2),
(10, '2022_03_01_194427_create_bookings_table', 3),
(11, '2022_03_03_204021_insert_user_id_to_bookings_table', 4),
(12, '2022_03_05_105737_insert_is_uber_to_bookings_table', 5),
(13, '2022_03_17_192707_insert_projected_price_to_bookings_table', 6),
(14, '2022_03_17_221935_add_approved_at_to_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 10),
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(1, 'App\\Models\\User', 14),
(1, 'App\\Models\\User', 15),
(1, 'App\\Models\\User', 16),
(1, 'App\\Models\\User', 17),
(1, 'App\\Models\\User', 18),
(1, 'App\\Models\\User', 19),
(1, 'App\\Models\\User', 20),
(1, 'App\\Models\\User', 21),
(1, 'App\\Models\\User', 22),
(1, 'App\\Models\\User', 23),
(1, 'App\\Models\\User', 24),
(1, 'App\\Models\\User', 25),
(1, 'App\\Models\\User', 26),
(1, 'App\\Models\\User', 27),
(1, 'App\\Models\\User', 28),
(1, 'App\\Models\\User', 29),
(1, 'App\\Models\\User', 30);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Dannyyan1030@gmail.com', '$2y$10$tnMZ6xtkyWG.1mkaB4y16ecWbZ.yxusZbRS3paWSp1q/MmouQ3nxW', '2022-03-19 20:56:51'),
('rongxinzulin@126.com', '$2y$10$LJ4bqjRyydYxafV9r/JDeukQO2WFx1sHYVVTef5K3Da8rQol0zSVa', '2022-03-19 21:36:47'),
('fzj7777@gmail.com', '$2y$10$JSv1ttsm63LjfIU7MSpOmuvs4u7U79O0J72gWmmeVV2N7AF5fIosq', '2022-03-20 00:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Driver', 'sanctum', '2022-03-01 06:08:00', '2022-03-01 06:08:00'),
(2, 'Administrator', 'sanctum', '2022-03-01 06:08:00', '2022-03-01 06:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cFR2WedA8EIOEMSBO8cVNlffysj85ZY4ZgVaKdm1', NULL, '180.195.240.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0tnVUJkU0p0Yk96YjFNV1BES1FqNlBuR1RtUW9CanZpaG9XUG1ISiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9rZXRyYW5zZmVyZGlzcGF0Y2guY29tL2xvZ2luIjt9fQ==', 1650540125),
('YgUQY053JMH92pVByg20zLoqYZIPmvZVJ9VLgBX8', 3, '103.126.110.50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZVkwOUZCVnRhakg0U3lYcndvRGR6Y0JsbXlUaWtCNVI0WHZoUDgydyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9rZXRyYW5zZmVyZGlzcGF0Y2guY29tL2FkbWluaXN0cmF0b3IvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFhDbzNPMi9IaVJkNFM0UUt0aTcwUU9nclRzNGhndDQvYko0SkQvOGJlazRrUkE3eTVhZ1M2IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRYQ28zTzIvSGlSZDRTNFFLdGk3MFFPZ3JUczRoZ3Q0L2JKNEpELzhiZWs0a1JBN3k1YWdTNiI7fQ==', 1650540449);

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `approved_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `role`, `theme`, `approved_at`) VALUES
(3, 'Admin', 'admin@ketransfer.com', NULL, '$2y$10$XCo3O2/HiRd4S4QKti70QOgrTs4hgt4/bJ4JD/8bek4kRA7y5agS6', NULL, NULL, 'czoAbulfpBdl6wexil2yNyUCyOUbndgO3kbnQIHMYUbee7ZUBlaIGWeyS4xm', NULL, NULL, '2022-03-01 06:09:13', '2022-03-19 02:45:11', 'Administrator', 'default', NULL),
(4, 'Joe Driver', 'driver@example.com', NULL, '$2y$10$8RtxASzMXejE0I0kdZXc5ukNRx1KuToOQ2WHrBeeeWU0bMg6CfYaW', NULL, NULL, NULL, NULL, NULL, '2022-03-04 09:16:48', '2022-03-18 03:38:12', 'Driver', 'dark', '2022-03-18 03:38:12'),
(5, 'driver 2', 'driver2@example.com', NULL, '$2y$10$EL1bQZRL3rIbf4OMtUPPfeNV5GWc8icjnLSxYLzruDSeqmhXy2BRS', NULL, NULL, NULL, NULL, NULL, '2022-03-07 12:59:09', '2022-03-18 03:38:41', 'Driver', 'default', '2022-03-18 03:38:41'),
(7, 'driver 4', 'driver4@example.com', NULL, '$2y$10$F.hAPU/s2pnEBrvqmaypQeexyZ3dV2xMPsG9ZSfswxP4tls7kCMzC', NULL, NULL, NULL, NULL, NULL, '2022-03-07 13:14:31', '2022-03-18 03:38:43', 'Driver', 'default', '2022-03-18 03:38:43'),
(8, 'driver5', 'driver5@example.com', NULL, '$2y$10$xUQMV8yw45kDD.QrUCjzqexPnl6TzNSSaQRO4xBWFSjXmJACkwnAO', NULL, NULL, NULL, NULL, NULL, '2022-03-17 16:30:18', '2022-03-18 03:38:45', 'Driver', 'default', '2022-03-18 03:38:45'),
(9, 'driver 6', 'driver6@example.com', NULL, '$2y$10$FF5/b7NPoML8Ea6PeA0YV.Zdh2h77fsQUq2vHE/GfRIJjcYNxO.92', NULL, NULL, NULL, NULL, NULL, '2022-03-18 03:39:51', '2022-03-18 03:40:24', 'Driver', 'default', '2022-03-18 03:40:24'),
(10, 'Driver1', 'Driver1@example.com', NULL, '$2y$10$u3EnBlKKCheZVyukgVoawOOdMxo60hW7cNevvBHrUxvotZSkrXQ12', NULL, NULL, NULL, NULL, NULL, '2022-03-18 18:02:30', '2022-03-18 18:03:19', 'Driver', 'default', '2022-03-18 18:03:19'),
(11, 'tony', 'rongxinzulin@126.com', NULL, '$2y$10$cSILF9QLSqLStralhF7evO0jExe/qpJppOerAGdGw1oG38NfZ8ok2', NULL, NULL, 'M6fQjVxVCZmFyVMwrAu11f3MvIwG3WYed0XpGre3aNzj9j3VlRzCfHTh49Nc', NULL, NULL, '2022-03-19 10:09:24', '2022-03-21 17:35:59', 'Driver', 'default', '2022-03-19 19:58:18'),
(12, 'Haibin liu', 'luihaibin@gmail.com', NULL, '$2y$10$3VBzdkFhN.DqY6SmOXu2OedcHiTH8eErUeA1U1oxa2bM7zWzeZz8C', NULL, NULL, NULL, NULL, NULL, '2022-03-19 20:00:30', '2022-03-19 20:04:39', 'Driver', 'default', '2022-03-19 20:04:39'),
(13, 'Kevin ZHANG', '13901360682@139.com', NULL, '$2y$10$5AXxSHcs2qiRPNNCO4WyTOXhXEG7V0/mRlv50cu8V7Nwbb1aPRxlO', NULL, NULL, NULL, NULL, NULL, '2022-03-19 20:10:20', '2022-03-19 20:10:42', 'Driver', 'default', '2022-03-19 20:10:42'),
(14, 'Yi Hui', 'tlhuiyi@126.com', NULL, '$2y$10$sNAoO.Ijx6zL1X2A5Z8ImOR7e6yDsDgQkll4wDYBb7CcX1sMUiTqW', NULL, NULL, 'nIgnyJUwjcIfm4UrGawLDMC3LPcEmd50jBkfxVt7P7cpPeONE4mV45dPjYts', NULL, NULL, '2022-03-19 20:14:00', '2022-03-19 20:56:18', 'Driver', 'dark', '2022-03-19 20:14:48'),
(15, 'JayWong', 'jaywong808@yahoo.com', NULL, '$2y$10$tvB/Az8xH2w7bryxoYvQouQjeKcBwUtBY33uMHAIg7uYo5SqzJz6y', NULL, NULL, 'uDw3s8Y8xt9m4AhMdX5ra9CN0JhDni8WspxJPQQjVEeXrh8Y8ixjNfew0Hy0', NULL, NULL, '2022-03-19 20:44:45', '2022-03-19 20:47:32', 'Driver', 'default', '2022-03-19 20:47:32'),
(16, 'han yan', 'Dannyyan1030@gmail.com', NULL, '$2y$10$xnXh65dR5SdBTiFSjdA6kORsPEhR.HckwCaSnUeeS3ic4I0yQdoje', NULL, NULL, 'GER5J6sO9AIN59BnJ0x8rAMTlI77WtTcw3vinivHKFxzVi7Kukyery8C8WK9', NULL, NULL, '2022-03-19 20:51:52', '2022-03-19 20:52:46', 'Driver', 'default', '2022-03-19 20:52:46'),
(17, '宋兆斌', 'zhaohui2020@icloud.com', NULL, '$2y$10$wDqhbpuzoagDvciUjLlxte2euAtjqtYgaXyHy6kOpojtK/3f8yOJm', NULL, NULL, 'aocbTiUkGbS6c6gVaZpQ327yIRAGEL3ynh7E3VH16oVBCi7X0QrQyslUhpAg', NULL, NULL, '2022-03-19 20:59:38', '2022-03-19 21:24:05', 'Driver', 'default', '2022-03-19 21:24:05'),
(18, 'Thomaszhou', 'thomaschou513@gmail.com', NULL, '$2y$10$uxshegO.55LTyqVj8RNKeuu3YcvSr1vnlC5ufhekj0liyZmNUjI8e', NULL, NULL, NULL, NULL, NULL, '2022-03-19 21:01:51', '2022-03-19 21:24:11', 'Driver', 'default', '2022-03-19 21:24:11'),
(19, 'JingXian Wu', 'jing7676@hotmail.com', NULL, '$2y$10$7OC7L9KQlx8VLccWoeyuMOyqCn/Xh9xo3o1lN7GeWTmGJVovjy7ea', NULL, NULL, 'OBQ8cNsLtzlVNf8iwZP43tHXgcoGSGnxm7S6AK5WHnzCcvvJooGjgRez50yu', NULL, NULL, '2022-03-19 21:15:14', '2022-03-19 21:24:19', 'Driver', 'default', '2022-03-19 21:24:19'),
(20, 'Jason chen', 'guangdongchen010381@yahoo.com', NULL, '$2y$10$XIqVuYrkJwbV0YfrFDruf.LVon4GqTbeZC6SXJftt36miZzVlQ2VC', NULL, NULL, 'a8loCtAEXej48v9Bkeviecl0RwIdh85yUI4OxByZY3RSnUsKyqLj4x8T7s8J', NULL, NULL, '2022-03-19 21:28:23', '2022-03-27 23:45:35', 'Driver', 'dark', '2022-03-19 21:30:46'),
(21, 'LiaoLianyong', 'liaolianyong@icloud.com', NULL, '$2y$10$mN040wZrKxq3wGjBrDQLbOcykowhKTHMZS9GPjOOxXI16ll6yh2B.', NULL, NULL, 'tT3rltzrjvhD1QzNl9bDDFuk6CoYrx6wuSENXjMlqy8zy64BOiamqIpbY3nw', NULL, NULL, '2022-03-19 23:05:48', '2022-03-19 23:19:31', 'Driver', 'default', '2022-03-19 23:19:31'),
(22, 'zhenjie feng', 'fzj7777@gmail.com', NULL, '$2y$10$UgbLeX.CtkMyBjePzGOFvOKC0r7FsKFR93cazo.YMpF/x1fnyQqFi', NULL, NULL, 'f4VB4hc1Aj98ICgX1HwLSx6OIX4dihKnXeri1AOM5idS3lvfoKedtFA8SxVG', NULL, NULL, '2022-03-19 23:14:03', '2022-03-19 23:19:40', 'Driver', 'default', '2022-03-19 23:19:40'),
(23, 'Zhi jian li', 'zjian20166@gmail.com', NULL, '$2y$10$e9rkPyJiTzHNMz6.HkaQAOrNqIGGJe1xjQBMW9MFLtJbb6qmAhIaW', NULL, NULL, NULL, NULL, NULL, '2022-03-20 00:02:33', '2022-03-20 00:04:04', 'Driver', 'default', '2022-03-20 00:04:04'),
(24, '飞翔', '1449751126@qq.com', NULL, '$2y$10$fXzJFgzBbdiAGOBZqhWn5uJf1xdHbum2dcSb97sriSVwBHD2Jodj.', NULL, NULL, 'MOEaLQK29QJjvYdJ9CAqwgmj9uz5X2K0C4ljV8hPQodYja1oGg01UouCDWQP', NULL, NULL, '2022-03-20 01:25:13', '2022-03-20 01:34:14', 'Driver', 'default', '2022-03-20 01:34:14'),
(25, 'Joyee', '248174297@qq.com', NULL, '$2y$10$U/ERySbkXMin3HIT6oPBp.iC/nSyO4puCTgQD15bsV4uwz0wkxu/C', NULL, NULL, NULL, NULL, NULL, '2022-03-20 02:32:08', '2022-03-20 05:28:36', 'Driver', 'default', '2022-03-20 05:28:36'),
(26, '刘Amy', '543623804@qq.com', NULL, '$2y$10$ZdFXohkpVbvCl.QepTcC5uOU7RdwqYxzodtpQ06QfFRJ53mdOU3rC', NULL, NULL, 'ifEkKKx7VwrujhxFNqP5msmmK3dFuDZ8KTrg7kAMRkLXpzRHLx2d5cPLddKh', NULL, NULL, '2022-03-20 06:04:31', '2022-03-20 08:24:34', 'Driver', 'default', '2022-03-20 08:24:34'),
(27, 'Seven', 'seven7jiang@yahoo.com', NULL, '$2y$10$0GV25Ks4lmr8Ouzy19Xx1u.Ns.JCkFkF0wSR20b9MZnJM/om5k/sS', NULL, NULL, NULL, NULL, NULL, '2022-03-20 17:50:13', '2022-03-20 20:53:12', 'Driver', 'default', '2022-03-20 20:53:12'),
(28, 'Zhijianli', 'zjian201616@gmail.com', NULL, '$2y$10$wYE8NL8MnKuyPsZzRrCo6.7Era805E6wdX.HloeEQFzsOdD05A0tW', NULL, NULL, NULL, NULL, NULL, '2022-03-21 10:42:59', '2022-03-26 00:15:30', 'Driver', 'default', '2022-03-26 00:15:30'),
(29, 'Ryan M. Frye', 'rmfrye.extreme@gmail.com', NULL, '$2y$10$gTrRh1aJAFpI0hbqTSH3C.qC/2r314Hqxg5.fi0X9piYbzeonST0e', NULL, NULL, NULL, NULL, NULL, '2022-03-24 07:01:49', '2022-03-27 01:56:29', 'Driver', 'dark', '2022-03-26 00:16:09'),
(30, 'Darrell Spirlock', 'Darrell_spirlock@yahoo.com', NULL, '$2y$10$R/k9SpjBPGH5WiHTMVo9Iu2Z9tKGWPMjZRRev.qZMMPp.GVFP/wqW', NULL, NULL, NULL, NULL, NULL, '2022-03-24 22:49:40', '2022-03-26 00:15:49', 'Driver', 'default', '2022-03-26 00:15:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
