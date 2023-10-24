-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 12:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'admin@gmail.com', NULL, '$2y$10$4rrCrmBHsreGmrSjrKfSS.Knc.uhHP6DwlPzwHu6svLFkZ1VhFTwC', NULL, '2023-10-16 15:18:31', '2023-10-16 15:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `drives`
--

CREATE TABLE `drives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `file` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'private',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drives`
--

INSERT INTO `drives` (`id`, `tittle`, `description`, `file`, `status`, `created_at`, `updated_at`, `userId`) VALUES
(10, 'lec 2', 'software 3rd level term 1', '1698165350ch 2.pdf', 'public', '2023-10-24 13:35:50', '2023-10-24 13:37:20', 2),
(11, 'ali photo', 'photo', '1698165416ali.jpg', 'private', '2023-10-24 13:36:56', '2023-10-24 13:36:56', 2),
(12, 'chapter 1 computer network', 'computer network 3rd level term 1', '1698165578Solutions 6thEd computer-and-networking.pdf', 'public', '2023-10-24 13:39:38', '2023-10-24 13:41:45', 1);

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
-- Stand-in structure for view `joinuserwithpublicdrives`
-- (See below for the actual view)
--
CREATE TABLE `joinuserwithpublicdrives` (
`userid` bigint(20)
,`useremail` varchar(255)
,`username` varchar(255)
,`driveid` bigint(20) unsigned
,`drivetittle` varchar(255)
,`status` varchar(10)
,`drivefile` text
,`drivedesc` varchar(3000)
);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_16_183445_create_drives_controllers_table', 2),
(6, '2023_10_16_183531_create_drives_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `theem` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) NOT NULL DEFAULT 'fakeimage.jpg',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `theem`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed', 'ahmed@gmail.com', '2023-10-24 13:00:14', '$2y$10$sJzvQYf4E/ocxBIRAEVvXuZoIBGflEFTc5N7OCBf2CPqCywZ8tEz2', 0, '16981852223baky.jpg', '2UuRpq3L2jg3OemDOydX1P7rFw7DjY1HhQFlIUoobob92G2T2ftOPXdxQdw5', '2023-10-16 15:18:31', '2023-10-24 19:07:15'),
(2, 'ali', 'ali@gmail.com', '2023-10-24 13:12:54', '$2y$10$poVd51C7SZ0FVb/4ETrPuulAw3QXm7FiGVqWCxI4Q.FxfJ2znh4y2', 0, '1698164258ali.jpg', 'ThfCV2H7AWKUXeJ64d3aWcInRP6FFvUAHJ3Nd73CkvOxuTpRjiMO7EP33w1s', '2023-10-16 20:19:25', '2023-10-24 13:18:07'),
(3, 'mohamed', 'mohamed@gmail.com', NULL, '$2y$10$Lvi5fYhW6r9gr3mza12AIurcnmJKI9xjA1OgrBaOqTAzsRzMypw1m', 0, 'fakeimage.jpg', NULL, '2023-10-17 11:22:14', '2023-10-17 11:22:14'),
(14, 'jooo', 'yousef@gmail.com', NULL, '$2y$10$oMIbsmCVIeVPtFM955IQ4.uRXKS6xyWEQ.UQMuZx6fKZXZuGojsRS', 0, 'fakeimage.jpg', NULL, '2023-10-24 13:43:26', '2023-10-24 13:44:07');

-- --------------------------------------------------------

--
-- Structure for view `joinuserwithpublicdrives`
--
DROP TABLE IF EXISTS `joinuserwithpublicdrives`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `joinuserwithpublicdrives`  AS SELECT `users`.`id` AS `userid`, `users`.`email` AS `useremail`, `users`.`name` AS `username`, `drives`.`id` AS `driveid`, `drives`.`tittle` AS `drivetittle`, `drives`.`status` AS `status`, `drives`.`file` AS `drivefile`, `drives`.`description` AS `drivedesc` FROM (`users` join `drives` on(`users`.`id` = `drives`.`userId`)) WHERE `drives`.`status` = 'public' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drives`
--
ALTER TABLE `drives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drives`
--
ALTER TABLE `drives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drives`
--
ALTER TABLE `drives`
  ADD CONSTRAINT `drives_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
