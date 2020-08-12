-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2020 at 10:56 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joblisting`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `icon` varchar(150) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`, `icon`, `total`, `create_at`) VALUES
(3, 'Accountant', 1, 'fa-university', 230, '2020-07-27 01:23:47'),
(4, 'Web Development', 1, 'fa-android', 109, '2020-07-27 01:23:47'),
(5, 'HR', 1, 'fa-user', 100, '2020-07-27 01:23:47'),
(6, 'Economic', 1, 'fa-usd', 50, '2020-07-27 01:23:47'),
(7, 'Customer Service/Support', 1, ' fa-comments\r\n', 44, '2020-07-27 01:23:47'),
(8, 'Law', 1, ' fa-book\r\n', 60, '2020-07-27 01:23:47'),
(9, 'Health/Medicine', 1, ' fa-hospital-o\r\n', 85, '2020-07-27 01:23:47'),
(10, 'Engineer ', 1, ' fa-cog\r\n', 102, '2020-07-27 01:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `job_desc` longtext DEFAULT NULL,
  `company` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `shift` int(11) DEFAULT NULL,
  `min_sal` varchar(10) DEFAULT NULL,
  `max_sal` varchar(10) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `job_desc`, `company`, `location`, `category`, `shift`, `min_sal`, `max_sal`, `create_by`, `create_at`) VALUES
(51, 'System Administrator', 'To manage our database', 'PWC', ' Phnom Penh ', 4, 2, NULL, NULL, 1, '2020-07-29 04:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `active`, `create_at`) VALUES
(1, 'Phnom Penh', 1, '2020-07-27 01:24:17'),
(2, 'Battambang', 1, '2020-07-27 01:24:17'),
(4, 'Siem Reap', 1, '2020-07-27 01:24:17'),
(5, 'Kompot', 1, '2020-07-27 01:24:17'),
(6, 'Keb', 1, '2020-07-27 01:24:17'),
(7, 'Pailin', 1, '2020-07-27 01:24:17'),
(8, 'Prey Veng', 1, '2020-07-27 01:24:17'),
(9, 'Banteay MeanChey', 1, '2020-07-27 01:24:17'),
(10, 'Pursat', 1, '2020-07-27 01:24:17'),
(11, 'Oddar MeacChey', 1, '2020-07-27 01:24:17'),
(12, 'Preah Vihear', 1, '2020-07-27 01:24:17'),
(13, 'Stung Treng', 1, '2020-07-27 01:24:17'),
(14, 'Ratanakiri', 1, '2020-07-27 01:24:17'),
(15, 'Mondulkiri', 1, '2020-07-27 01:24:17'),
(16, 'Kratie', 1, '2020-07-27 01:24:17'),
(17, 'Tbong Kmoum', 1, '2020-07-27 01:24:17'),
(18, 'Svay Rieng', 1, '2020-07-27 01:24:17'),
(19, 'Takeo', 1, '2020-07-27 01:24:17'),
(20, 'Kompong Spue', 1, '2020-07-27 01:24:17'),
(21, 'Koh Kong', 1, '2020-07-27 01:24:17'),
(22, 'Kompong Cham', 1, '2020-07-27 01:24:17'),
(23, 'Kom Pong Chhang', 1, '2020-07-27 01:24:17'),
(24, 'Prey Veng', 1, '2020-07-27 01:24:17'),
(25, 'Preah Sihanouk', 1, '2020-07-27 01:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `active`) VALUES
(1, 'Administrator', 0),
(10, 'User', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `val` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `active`, `create_at`, `val`) VALUES
(2, 'Full-Time', 1, '2020-07-27 01:25:21', 'info'),
(3, 'Part-Time', 1, '2020-07-27 01:25:21', 'danger'),
(4, 'Freelance', 1, '2020-07-27 01:25:21', 'warning');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'user', 'example', 'user@example.com', '110', '2020-07-27 16:32:19', '2020-07-27 16:32:19', 10),
(3, 'Admin', 'Admin', 'admin@example.com', 'admin', '2020-07-27 17:07:28', '2020-07-27 17:07:28', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `shift` (`shift`),
  ADD KEY `create_by` (`create_by`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `key_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `create_by` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shift` FOREIGN KEY (`shift`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
