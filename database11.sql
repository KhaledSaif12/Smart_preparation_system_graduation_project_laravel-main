-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 04:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database11`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ImageUrl` varchar(255) DEFAULT NULL,
  `DownloadedImagePath` varchar(255) DEFAULT NULL,
  `StrTime` varchar(255) DEFAULT NULL,
  `Similarity` varchar(255) DEFAULT NULL,
  `SnapFacePicID` varchar(255) DEFAULT NULL,
  `TempFDIDString` varchar(255) DEFAULT NULL,
  `TempPIDString` varchar(255) DEFAULT NULL,
  `Glasses` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `ImageUrl`, `DownloadedImagePath`, `StrTime`, `Similarity`, `SnapFacePicID`, `TempFDIDString`, `TempPIDString`, `Glasses`, `created_at`, `updated_at`) VALUES
(361, 'C:\\FaceSnapshots\\SnapFace_2024-07-13 09-00-59.txt', 'C:\\FaceSnapshots\\BlockList_2024-07-13 09-00-59.jpg', '2024-07-13 09:00:59', '0.91', '78', '8D7C137970F14E3CB58DB82BCD2E5D83', 'ADAF7ED8BC2140E5B024B2655B7ECB51', '1', NULL, NULL),
(366, 'C:\\FaceSnapshots\\SnapFace_2024-07-13 09-07-40.txt', 'C:\\FaceSnapshots\\BlockList_2024-07-13 09-07-40.jpg', '2024-07-13 09:07:40', '0.92', '85', '8D7C137970F14E3CB58DB82BCD2E5D83', '3617B69CCBCB4B7482805CFA5D0CB65F', '2', NULL, NULL),
(371, 'C:\\FaceSnapshots\\SnapFace_2024-07-13 09-09-01.txt', 'C:\\FaceSnapshots\\BlockList_2024-07-13 09-09-01.jpg', '2024-07-13 09:09:01', '0.91', '93', '8D7C137970F14E3CB58DB82BCD2E5D83', 'ADAF7ED8BC2140E5B024B2655B7ECB51', '1', NULL, NULL),
(387, 'C:\\FaceSnapshots\\SnapFace_2024-07-13 18-26-10.txt', 'C:\\FaceSnapshots\\BlockList_2024-07-13 18-26-10.jpg', '2024-07-13 18:26:10', '0.94', '4', '8D7C137970F14E3CB58DB82BCD2E5D83', '972C6C8028E846DDA654C564C3F9604C', '2', NULL, NULL),
(389, 'C:\\FaceSnapshots\\SnapFace_2024-07-13 18-26-33.txt', 'C:\\FaceSnapshots\\BlockList_2024-07-13 18-26-33.jpg', '2024-07-13 18:26:33', '0.94', '6', '8D7C137970F14E3CB58DB82BCD2E5D83', '972C6C8028E846DDA654C564C3F9604C', '2', NULL, NULL),
(390, '1720597779.jpg', '1720597779.jpg', '2024-07-13 18:26:00', '0.94', NULL, '8D7C137970F14E3CB58DB82BCD2E5D83', 'A0A2C597B1004CDDA7B00A7BB9890CBA', '2', '2024-07-13 12:26:55', '2024-07-13 12:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'information technologe', '2024-06-12 22:16:40', '2024-06-12 22:16:40'),
(2, 'IS', 'information system', '2024-06-12 22:17:00', '2024-06-12 22:17:00'),
(3, 'CS', 'computer since', '2024-06-12 22:17:19', '2024-06-12 22:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `job_number` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `gender` enum('ذكر','انثئ') NOT NULL,
  `period_id` bigint(20) UNSIGNED NOT NULL,
  `Nationalit` varchar(255) DEFAULT NULL,
  `FPID` varchar(255) DEFAULT NULL,
  `FDID` varchar(255) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone_number`, `job_number`, `job_type`, `gender`, `period_id`, `Nationalit`, `FPID`, `FDID`, `department_id`, `image`, `created_at`, `updated_at`) VALUES
(11, 'رائد', 773551738, 43537589, 'مبرمج', 'ذكر', 2, 'يمني', '1CCB348E7F1D499BB09D535360D3D730', '8D7C137970F14E3CB58DB82BCD2E5D83', 1, '1720597421.jpg', '2024-07-10 04:43:41', '2024-07-10 04:43:41'),
(12, 'الحسين', 775076388, 43536869, 'مبرمج', 'ذكر', 2, 'يمني', '2A51791BBC20493C9A8233F220B025CC', '8D7C137970F14E3CB58DB82BCD2E5D83', 1, '1720597561.jpg', '2024-07-10 04:46:01', '2024-07-10 04:46:01'),
(13, 'صلاح منصور', 777111585, 43532456, 'مبرمج', 'ذكر', 2, 'يمني', 'A0A2C597B1004CDDA7B00A7BB9890CBA', '8D7C137970F14E3CB58DB82BCD2E5D83', 1, '1720597779.jpg', '2024-07-10 04:49:39', '2024-07-10 04:49:39'),
(14, 'Ahmed Ali', 772217257, 43532689, 'مبرمج', 'ذكر', 2, 'يمني', '816DEEA9E8104F579FEA2B9270BAE965', '8D7C137970F14E3CB58DB82BCD2E5D83', 1, '1720837722.jpg', '2024-07-12 23:28:42', '2024-07-12 23:28:42'),
(17, 'احمد منصور هزاع عبد الباري العفوري', 778138445, 4353145, 'مبرمج', 'ذكر', 2, 'يمني', '972C6C8028E846DDA654C564C3F9604C', '8D7C137970F14E3CB58DB82BCD2E5D83', 1, '1720838366.jpg', '2024-07-12 23:39:26', '2024-07-12 23:39:26'),
(18, 'khaled', 778881384, 4353589, 'مبرمج', 'ذكر', 2, 'يمني', 'ADAF7ED8BC2140E5B024B2655B7ECB51', '8D7C137970F14E3CB58DB82BCD2E5D83', 1, '1720838673.jpg', '2024-07-12 23:44:33', '2024-07-12 23:44:33'),
(19, 'احمد علي الخدري', 778881578, 4353445, 'مبرمج', 'ذكر', 2, 'يمني', '3617B69CCBCB4B7482805CFA5D0CB65F', '8D7C137970F14E3CB58DB82BCD2E5D83', 1, '1720839427.jpg', '2024-07-12 23:57:07', '2024-07-12 23:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdids`
--

CREATE TABLE `fdids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name_Fdid` varchar(255) NOT NULL,
  `Value_Fdid` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fdids`
--

INSERT INTO `fdids` (`id`, `Name_Fdid`, `Value_Fdid`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed', '8D7C137970F14E3CB58DB82BCD2E5D83', NULL, NULL),
(2, 'احمد منصور هزاع عبد  العفوري', 'D6A1766481634804890F1934601AC4FF', NULL, NULL),
(3, 'احمد منصور', '7A2BF5DBB52F4E62B53582502F669DB9', NULL, NULL),
(4, 'Noon88', 'D0475C09DC554899AE99D062210A168D', NULL, NULL),
(5, 'sssFDS', 'AB1F931817DC41C3B6AA8B3CDD574D0B', NULL, NULL),
(6, 'Noon89', 'D0475C09DC554899AE99D062210A168D', NULL, NULL);

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
(148, '2014_10_12_000000_create_users_table', 1),
(149, '2014_10_12_100000_create_password_resets_table', 1),
(150, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(151, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(152, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(153, '2016_06_01_000004_create_oauth_clients_table', 1),
(154, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(155, '2019_08_19_000000_create_failed_jobs_table', 1),
(156, '2020_03_09_135529_create_permission_tables', 1),
(157, '2024_05_01_005304_create_departments_table', 1),
(158, '2024_05_01_005421_create_shifts_table', 1),
(159, '2024_05_02_004650_create_employees_table', 1),
(160, '2024_06_11_212901_create_fdids_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 19),
(9, 'App\\Models\\User', 18),
(10, 'App\\Models\\User', 17);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ahmedalafoori@gmail.com', '$2y$10$E5tUcolSqEwqXETM2DyKu.PwzgBCtwiPEBuEvqEanyglMfsJYY2ca', '2024-07-13 00:30:19'),
('admin@test.com', '$2y$10$gaiciZaIBgD0F3pGCV0UBeJ.PGMQkfydoaMr1IcCnaAMiLRbV6O0u', '2024-07-13 00:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'manage_role', 'web', NULL, NULL),
(3, 'manage_permission', 'web', NULL, NULL),
(4, 'manage_user', 'web', NULL, NULL),
(5, 'manage_hr', 'web', NULL, '2024-07-12 21:19:20'),
(6, 'manage_employee', 'web', NULL, '2024-07-12 21:19:34'),
(8, 'manage_shift', 'web', '2024-07-12 21:20:02', '2024-07-12 21:20:02'),
(9, 'manage_department', 'web', '2024-07-12 21:22:17', '2024-07-12 21:22:17'),
(10, 'manage_attendance', 'web', '2024-07-12 21:23:17', '2024-07-12 21:23:17'),
(11, 'manage_database', 'web', '2024-07-12 21:23:47', '2024-07-12 21:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', NULL, NULL),
(2, 'Admin', 'web', NULL, NULL),
(3, 'Employee Manager', 'web', NULL, '2024-07-12 21:17:48'),
(4, 'HR Manager', 'web', NULL, '2024-07-12 21:18:06'),
(5, 'Member', 'web', NULL, NULL),
(8, 'Shift Manager', 'web', '2024-07-12 21:20:41', '2024-07-12 21:20:41'),
(9, 'Department Manager', 'web', '2024-07-12 21:21:23', '2024-07-12 21:21:23'),
(10, 'Attendance Manager', 'web', '2024-07-12 21:21:38', '2024-07-12 21:21:38'),
(11, 'Database Manager', 'web', '2024-07-12 21:21:49', '2024-07-12 21:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2),
(5, 4),
(6, 2),
(6, 3),
(8, 8),
(9, 9),
(10, 10),
(11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `total_hours` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `type`, `from_time`, `to_time`, `total_hours`, `status`, `created_at`, `updated_at`) VALUES
(2, 'صباحي', '07:00:00', '13:00:00', NULL, 1, '2024-06-27 11:13:22', '2024-06-27 11:13:22'),
(3, 'مسائي', '14:00:00', '17:00:00', NULL, 1, '2024-06-27 11:14:01', '2024-06-27 11:14:01');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@test.com', NULL, '$2y$10$P0nJN2lM10dMrC4S6YRlhO55XV1dmSQxURKgFIuJLQmpsuoNkz2Ai', NULL, NULL, NULL),
(2, 'Project Manager', 'pm@test.com', NULL, '$2y$10$ufrRypPiRPpsanqjAXZGJO9XnfyqGlYBfwl0u2Daf6x.eL6U5qinK', NULL, NULL, NULL),
(3, 'Ahmed', 'sm@test.com', NULL, '$2y$10$FFkX/09/z4XBFddOVALhEe2Np81frx1rpGQnXQ3bHC1WykUkFFnf.', NULL, NULL, NULL),
(4, 'Ahmed ali', 'aljamraahmed@gmail.com', NULL, '$2y$10$woWYRjwn.SgmJoOei5QHaO57fHDuJzBEJqbViOJudkrtFrrXYls7m', NULL, NULL, NULL),
(17, 'Khaled', 'khalidathe5thh@gmail.com', NULL, '$2y$10$xnYN0s.7VnrhXnYax7W6nesqW0OOhW6Q99Ne69uFezseNK5eopKse', NULL, NULL, NULL),
(18, 'Ahmed alkhudri', 'alkhdry834@gmail.com', NULL, '$2y$10$orADH0z8riEpm1skOjX6FevnalUxXwd5G0A8im2P90PdpWm7DVcUK', NULL, NULL, NULL),
(19, 'Ahmed Alafoori', 'ahmedalafoori@gmail.com', NULL, '$2y$10$F3Mt0bU31vYbBQeNAdcqO.KqWWJRPxgY8zPhQtuJeFYXYWaTlBK4S', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `employees_job_number_unique` (`job_number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdids`
--
ALTER TABLE `fdids`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdids`
--
ALTER TABLE `fdids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
