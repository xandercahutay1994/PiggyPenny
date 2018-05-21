-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 04:35 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piggypenny`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alexander Alan F. Cahutay', 'admin@gmail.com', '$2y$10$tYiK.8fCiNSuNKn0AgCRRe.USt7L84awya/TiyX.Dm5W/VC0vpkuW', NULL, '2018-04-07 01:40:28', '2018-04-07 01:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `business_tasks`
--

CREATE TABLE `business_tasks` (
  `btask_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `taskName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taskMedia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalViews` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentViews` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalPrice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notification_status` int(11) DEFAULT NULL,
  `notified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_tasks`
--

INSERT INTO `business_tasks` (`btask_id`, `task_id`, `id`, `taskName`, `taskMedia`, `totalViews`, `currentViews`, `totalPrice`, `requested_at`, `notification_status`, `notified_at`) VALUES
(1, 2, 1, 'Chocolate Butter', '1-2-ad2.jpg', '500', '0', '42.55', '2018-05-21 02:16:09', 2, '2018-05-21 02:34:59'),
(2, 2, 1, 'Home and Personal Use', '1-2-ad3.jpg', '300', '0', '25.529999999999998', '2018-05-21 02:17:50', 2, '2018-05-21 02:34:59'),
(3, 4, 1, 'Please survey what you think about our products', 'https://www.unilever.com/news/Press-releases/2017/report-shows-a-third-of-consumers-prefer-sustainable-brands.html', '400', '0', '34.04', '2018-05-21 02:19:43', NULL, NULL),
(4, 4, 1, 'Unilever Video Promotion', 'https://www.youtube.com/watch?v=utSYAkQi5hY', '450', '0', '38.294999999999995', '2018-05-21 02:24:23', 2, '2018-05-21 02:34:59');

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
(3, '2018_04_04_103651_create_tasks_table', 2),
(4, '2018_04_04_104322_create_tasks_table', 3),
(6, '2018_04_07_074746_create_admins_table', 5),
(8, '2014_10_12_100000_create_password_resets_table', 6),
(16, '2018_05_13_150038_create_notifies_table', 12),
(17, '2018_05_13_150529_add_notification_status_to_business_tasks', 13),
(22, '2018_04_05_035345_create_business_tasks_table', 14),
(23, '2018_04_15_113254_create_payments_table', 14),
(25, '2014_10_12_000000_create_users_table', 15),
(28, '2018_05_11_040841_add_status_to_users', 16);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `btask_id` int(11) NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pennyer_payments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piggypenny_earnings` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `btask_id`, `payment_status`, `payment_type`, `pennyer_payments`, `piggypenny_earnings`, `paid_at`) VALUES
(1, 1, '1', 'Peso', '21.275', '21.275', '2018-05-21 02:16:09'),
(2, 2, '1', 'Peso', '12.764999999999999', '12.764999999999999', '2018-05-21 02:17:50'),
(3, 3, '0', 'Peso', '17.02', '17.02', '2018-05-21 02:19:43'),
(4, 4, '1', 'Peso', '19.147499999999997', '19.147499999999997', '2018-05-21 02:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `task_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_type`, `task_status`, `task_price`) VALUES
(1, 'Video', 'Inactive', '0.00000020'),
(2, 'Picture', 'Inactive', '0.00000020'),
(3, 'Application', 'Inactive', '0.00000010'),
(4, 'Survey', 'Inactive', '0.00000010');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `password`, `token`, `profile`, `created_at`, `updated_at`, `remember_token`, `status`) VALUES
(1, 'Unilever Philippines', 'Makati, Metro Manila, Philippines', 'xandercahutay1994@gmail.com', '$2y$10$YGyE3RYV9ZeLSzkOCkN94eJXjMbhG.PkMZtXjLChTPVeGgMWdxG.m', NULL, 'ad1_1526868807_ad1.jpg', '2018-05-20 18:13:27', '2018-05-20 18:25:03', '2q8MrL8t7b79S20AgMxrcKz6GYAAj78GPOV1Y2FOiWrsqCOxV4OooI6hRRDF', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `business_tasks`
--
ALTER TABLE `business_tasks`
  ADD PRIMARY KEY (`btask_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_tasks`
--
ALTER TABLE `business_tasks`
  MODIFY `btask_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
