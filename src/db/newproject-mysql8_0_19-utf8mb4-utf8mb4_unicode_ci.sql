-- -------------------------------------------------------------
-- TablePlus 3.7.0(330)
--
-- https://tableplus.com/
--
-- Database: joblisting
-- Generation Time: 2020-08-05 17:27:24.3400
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `icon` varchar(150) DEFAULT NULL,
  `total` int DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

CREATE TABLE `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `job_desc` longtext,
  `company` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `category` int NOT NULL,
  `shift` int DEFAULT NULL,
  `min_sal` varchar(10) DEFAULT NULL,
  `max_sal` varchar(10) DEFAULT NULL,
  `create_by` int NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `shift` (`shift`),
  KEY `create_by` (`create_by`),
  CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`shift`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

CREATE TABLE `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

CREATE TABLE `shifts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `val` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `active`, `icon`, `total`, `create_at`) VALUES
('3', 'Accountant', '1', 'fa-university', '230', '2020-07-27 08:23:47'),
('4', 'Web Development', '1', 'fa-android', '109', '2020-07-27 08:23:47'),
('5', 'HR', '1', 'fa-user', '100', '2020-07-27 08:23:47'),
('6', 'Economic', '1', 'fa-usd', '50', '2020-07-27 08:23:47'),
('7', 'Customer Service/Support', '1', ' fa-comments\r\n', '44', '2020-07-27 08:23:47'),
('8', 'Law', '1', ' fa-book\r\n', '60', '2020-07-27 08:23:47'),
('9', 'Health/Medicine', '1', ' fa-hospital-o\r\n', '85', '2020-07-27 08:23:47'),
('10', 'Engineer ', '1', ' fa-cog\r\n', '102', '2020-07-27 08:23:47');

INSERT INTO `jobs` (`id`, `name`, `job_desc`, `company`, `location`, `category`, `shift`, `min_sal`, `max_sal`, `create_by`, `create_at`) VALUES
('51', 'System Administrator', 'To manage our database', 'PWC', ' Phnom Penh ', '4', '2', NULL, NULL, '1', '2020-07-29 11:31:27');

INSERT INTO `locations` (`id`, `name`, `active`, `create_at`) VALUES
('1', 'Phnom Penh', '1', '2020-07-27 08:24:17'),
('2', 'Battambang', '1', '2020-07-27 08:24:17'),
('4', 'Siem Reap', '1', '2020-07-27 08:24:17'),
('5', 'Kompot', '1', '2020-07-27 08:24:17'),
('6', 'Keb', '1', '2020-07-27 08:24:17'),
('7', 'Pailin', '1', '2020-07-27 08:24:17'),
('8', 'Prey Veng', '1', '2020-07-27 08:24:17'),
('9', 'Banteay MeanChey', '1', '2020-07-27 08:24:17'),
('10', 'Pursat', '1', '2020-07-27 08:24:17'),
('11', 'Oddar MeacChey', '1', '2020-07-27 08:24:17'),
('12', 'Preah Vihear', '1', '2020-07-27 08:24:17'),
('13', 'Stung Treng', '1', '2020-07-27 08:24:17'),
('14', 'Ratanakiri', '1', '2020-07-27 08:24:17'),
('15', 'Mondulkiri', '1', '2020-07-27 08:24:17'),
('16', 'Kratie', '1', '2020-07-27 08:24:17'),
('17', 'Tbong Kmoum', '1', '2020-07-27 08:24:17'),
('18', 'Svay Rieng', '1', '2020-07-27 08:24:17'),
('19', 'Takeo', '1', '2020-07-27 08:24:17'),
('20', 'Kompong Spue', '1', '2020-07-27 08:24:17'),
('21', 'Koh Kong', '1', '2020-07-27 08:24:17'),
('22', 'Kompong Cham', '1', '2020-07-27 08:24:17'),
('23', 'Kom Pong Chhang', '1', '2020-07-27 08:24:17'),
('24', 'Prey Veng', '1', '2020-07-27 08:24:17'),
('25', 'Preah Sihanouk', '1', '2020-07-27 08:24:17');

INSERT INTO `roles` (`id`, `name`, `active`) VALUES
('1', 'Administrator', '0'),
('10', 'User', '0');

INSERT INTO `shifts` (`id`, `name`, `active`, `create_at`, `val`) VALUES
('2', 'Full-Time', '1', '2020-07-27 08:25:21', 'info'),
('3', 'Part-Time', '1', '2020-07-27 08:25:21', 'danger'),
('4', 'Freelance', '1', '2020-07-27 08:25:21', 'warning');

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`, `role_id`) VALUES
('1', 'user', 'example', 'user@example.com', '110', '2020-07-27 23:32:19', '2020-07-27 23:32:19', '10'),
('3', 'Admin', 'Admin', 'admin@example.com', 'admin', '2020-07-28 00:07:28', '2020-07-28 00:07:28', '1');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;