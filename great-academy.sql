-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 10:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `great-academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `level` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `section_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'course',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `image`, `price`, `level`, `hours`, `created_at`, `status`, `section_id`, `slug`, `type`, `updated_at`) VALUES
(1, 'Front End Web Developer', '- html\r\n- css\r\n- js', 'QZBTsFh11KnbpjMg.png', 2500, 3, 30, '2022-09-14 16:57:35', 1, 2, 'front-end-web-developer', 'course', '2022-09-19 13:15:52'),
(2, 'Python 2 Basics', 'jhfgjf', 'VabMxnnUSViJ8Cyi.png', 355, 1, 10, '2022-09-14 20:07:49', 1, 2, 'python-2-basics', 'course', '2022-09-17 16:29:32');

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
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `course_id` int(11) DEFAULT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_26_151003_create_permission_tables', 1);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `code` varchar(255) NOT NULL,
  `is_paid` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => false\r\n1 => true',
  `amount_paid` int(11) NOT NULL DEFAULT 0,
  `progress` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0->Not start 1->started 2->completed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `course_id`, `workshop_id`, `student_id`, `status`, `code`, `is_paid`, `amount_paid`, `progress`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 14, 2, 'FMi3GcoN', 0, 0, 0, '2022-09-26 16:31:36', '2022-09-26 14:31:36'),
(2, 2, NULL, 15, 2, 'ekqWVDdz', 0, 0, 0, '2022-09-25 11:11:07', '2022-09-25 11:11:07'),
(7, NULL, 1, 3, 2, '9Kr6vsXr', 0, 500, 0, '2022-09-26 23:53:11', '2022-09-26 21:53:11');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
(1, 'Admin', 'web', '2022-08-29 20:18:38', '2022-08-29 20:18:38'),
(2, 'student', 'web', '2022-08-29 20:18:38', '2022-08-29 20:18:38'),
(3, 'Employee', 'web', '2022-08-29 20:18:38', '2022-08-29 20:18:38'),
(4, 'instructor', 'web', '2022-08-29 20:18:38', '2022-08-29 20:18:38');

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
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `workshops` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `count`, `image`, `status`, `workshops`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'AI', 0, 'ai.png', 2, 0, 'ai', '2022-09-14 12:46:32', '2022-09-26 23:57:39'),
(2, 'برمجة الحاسب', 2, 'brmg-alhasb.jpg', 1, 1, 'brmg-alhasb', '2022-09-14 12:48:46', '2022-09-17 16:29:18'),
(3, 'المهارات الشخصية', 0, 'almharat-alshkhsy.jpg', 1, 0, 'almharat-alshkhsy', '2022-09-16 19:43:42', '2022-09-16 22:24:05'),
(4, 'المحاسبة', 0, 'almhasb.jpg', 1, 0, 'almhasb', '2022-09-16 19:56:21', '2022-09-16 22:23:58'),
(5, 'ادارة الاعمال', 0, 'adar-alaaamal.png', 2, 0, 'adar-alaaamal', '2022-09-16 20:01:41', '2022-09-16 21:15:29'),
(6, 'قواعد البيانات', 0, 'koaaad-albyanat.png', 2, 0, 'koaaad-albyanat', '2022-09-16 20:03:57', '2022-09-16 21:09:46'),
(7, 'تصميم الجرافيك', 0, 'tsmym-algrafyk.png', 2, 0, 'x1', '2022-09-16 20:06:14', '2022-09-16 21:09:50'),
(9, 'تسويق', 0, 'tsoyk.jpg', 2, 0, 'tsoyk', '2022-09-16 21:24:04', '2022-09-16 21:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `data`, `created_at`, `updated_at`) VALUES
(1, 'ana', '2022-09-25 13:06:47', NULL),
(2, 'ana', '2022-09-25 13:06:47', NULL),
(3, 'ana', '2022-09-25 13:06:47', NULL),
(4, 'ana', '2022-09-25 13:06:47', NULL),
(5, 'abc', '2022-09-25 11:06:59', '2022-09-25 11:06:59'),
(6, 'abc', '2022-09-25 11:07:02', '2022-09-25 11:07:02'),
(7, 'abc', '2022-09-25 12:52:36', '2022-09-25 12:52:36'),
(8, 'abc', '2022-09-25 16:01:45', '2022-09-25 16:01:45'),
(9, 'abc', '2022-09-26 10:18:31', '2022-09-26 10:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 active 2 Inactive 3 Suspended',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `faculty`, `university`, `address`, `phone`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nabil Hamada', 'admin@gmail.com', '2022-08-29 20:18:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'h5S1d9vUkn5OnTk6bxG5kRVhm3S7erR8xIDwD0B9mEF6JyEKsgmjCRWIQuZB', NULL, '', 'Giza', '', NULL, 1, '2022-08-29 20:18:38', '2022-09-17 17:39:59'),
(2, 'Instructor', 'instructor@gmail.com', '2022-08-29 20:18:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8Lu82pvrgtOuGZVM0Zz30Rptd9M2EsBZK2IHRG0jh0kdYe6PWY1lcYYj8oSG', NULL, '', '', '', NULL, 1, '2022-08-29 20:18:38', '2022-09-11 21:06:47'),
(3, 'Student Name', 'student@gmail.com', '2022-08-29 20:18:38', '$2y$10$gjGHp.Ex0KLVjm/K7yiHt.FeWswcQhN6gPmLrPJdZvgYi58LV9WZ.', 'O1K7M75h0ShgTyiX9K23S8Wg57A4UZA0E7GAR4sEZTGd8KhFjinNPeA2wuAx', 'MIS', 'Madina Academy', 'القطوري شارع سيد ابو يس السقاري', '01148599672', 'std-aVbsZH050IQ4sqxi@great-academy.com', 1, '2022-08-29 20:18:38', '2022-09-16 12:55:58'),
(6, 'Nabil Hamada', 'Nabilhamada421@gmail.com', NULL, '$2y$10$BunKbhysF3woulL3nax9Xef9GZhHnxMPDtn5m2vA4xkb18xgBVFbC', NULL, 'MIS', 'Madina Academy', 'القطوري شارع سيد ابو يس السقاري', '01148599674', 'std-S5Pf1CqWs9jxHN5t@great-academy.com', 2, '2022-09-09 19:03:29', '2022-09-09 21:31:30'),
(7, 'Nabil Hamada 34', 'Nabilhamadar21@gmail.com', NULL, '$2y$10$yBq9cjUH48ALQpiS.P2KSuy.3TVgd/opKFfAeCd202o3dQmOjGZd2', NULL, 'MIS', 'Cairo', 'sdnm', '78328746', 'std-xmSuCnDyaZ1TFR6v@great-academy.com', 3, '2022-09-09 19:14:24', '2022-09-17 17:44:26'),
(10, 'Nabil Hamada', 'Nabilhamada4521@gmail.com', NULL, '$2y$10$B5a7H.0xsH0otXy4jJsAveD/tvA0dcTYs2FX/g9.dIVR5sb3mmxWm', NULL, 'MIS', 'Madina Academy', 'Egypt - Giza - El Ayyat', '817263967', 'std-weHvMpyy@great-academy.com', 1, '2022-09-09 20:37:03', '2022-09-12 19:12:42'),
(11, 'Ahmed Owais', 'ahmed@gamil.com', NULL, '$2y$10$csq7RiUHhKlCRVUlX1iYpee.q5Z62IQY.D4XPexpU.z6VFB5CHRzK', NULL, 'MIS', 'Madina Academy', 'القطوري شارع سيد ابو يس السقاري', '01148599675', 'std-huSd0hGx1NU1lhJ1@great-academy.com', 1, '2022-09-09 20:53:36', '2022-09-16 12:13:06'),
(13, 'Nabil Hamada', 'Nabilhamada521@gmail.com', NULL, '$2y$10$lfVF5BSYrQGTlcNHKnEBAOVr9JOBFomEysF90.svoMCb0I89OdHjq', NULL, 'Eng', 'Giza', 'Egypt - Giza - El Ayyat', '817263911', NULL, 1, '2022-09-12 19:39:54', '2022-09-17 17:43:38'),
(14, 'Nabil Hamada', 'Nabilhamada3321@gmail.com', NULL, NULL, NULL, 'Eng', 'Cairo', NULL, '01118172630', NULL, 1, '2022-09-25 12:57:06', NULL),
(15, 'Cell Phones', 'yousef123@gamil.com', NULL, NULL, NULL, 'Eng', 'Madina Academy', 'Egypt', '01148599670', 'std-USxqYuEf0pM8L9TT@great-academy.com', 2, '2022-09-25 11:11:07', '2022-09-27 14:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `level` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id`, `name`, `description`, `image`, `price`, `level`, `hours`, `slug`, `status`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 'Programming Workshop', '_html\r\n-css\r\n-js\r\n-bootstrap\r\n-jquery\r\n- python', 'mUkjbVRENFEB7dCk.png', 1500, 5, 45, 'programming-workshop', 1, 2, '2022-09-15 20:45:01', '2022-09-19 13:19:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `section_id` (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON UPDATE CASCADE;

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

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
