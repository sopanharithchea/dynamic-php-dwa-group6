-- -------------------------------------------------------------
-- TablePlus 3.7.0(327)
--
-- https://tableplus.com/
--
-- Database: newproject
-- Generation Time: 2020-07-27 15:35:47.4700
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

CREATE TABLE `companies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `view` int NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int NOT NULL DEFAULT '1',
  `location` text NOT NULL,
  `photo` varchar(120) NOT NULL DEFAULT 'default.png',
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

CREATE TABLE `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` longtext,
  `company` varchar(100) NOT NULL,
  `location_id` int NOT NULL,
  `category` varchar(100) NOT NULL,
  `shift_id` int NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `feature` varchar(10) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

CREATE TABLE `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

CREATE TABLE `members` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `photo` varchar(120) DEFAULT 'uploads/members/photos/default.png',
  `address` varchar(120) DEFAULT NULL,
  `description` longtext,
  `active` tinyint NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

CREATE TABLE `shifts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL DEFAULT '0',
  `photo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `active`, `icon`, `total`, `create_at`) VALUES
('3', 'Accountant', '1', 'fa-university', '230', '2020-07-27 08:23:47'),
('4', 'Web Development', '1', 'fa-android', '109', '2020-07-27 08:23:47'),
('5', 'HR', '1', 'fa-user', '100', '2020-07-27 08:23:47'),
('6', 'Economic', '1', 'fa-usd', '50', '2020-07-27 08:23:47'),
('7', 'Customer Service/Support', '1', ' fa-comments\r\n', '44', '2020-07-27 08:23:47'),
('8', 'Law', '1', ' fa-book\r\n', '60', '2020-07-27 08:23:47'),
('9', 'Health/Medicine', '1', ' fa-hospital-o\r\n', '85', '2020-07-27 08:23:47'),
('10', 'Engineer ', '1', ' fa-cog\r\n', '102', '2020-07-27 08:23:47');

INSERT INTO `companies` (`id`, `name`, `view`, `create_at`, `active`, `location`, `photo`, `description`) VALUES
('13', 'Krawma', '0', '2020-07-27 08:24:01', '1', 'Phnom Penh', 'default.png', 'Krawma is a Cambodian company with close to 20 years of experience. We are the company that operates the BongThom.com and BongSrey.com web sites. We are regarded as the premier jobs announcements portal in Cambodia Krawma is expanding and so we now want to hire a qualified Cambodia candidate to join our team in the role described below.'),
('14', 'FTB Bank', '0', '2020-07-27 08:24:01', '1', 'Phnom Penh', 'default.png', '<p>Foreign Trade Bank of Cambodia (<strong>FTB</strong>) is Cambodia&#39;s first and foremost bank. It has been providing customers with safe and reliable banking services for over 37 years. With our head office in Phnom Penh, we currently operate eleven branches and office in Phnom Penh, Sihanoukville, Siem Reap, Battambang and Kampong Cham province and plan to continue expanding our distribution network. In order to cope with the growth, we are looking for highly motivated and qualified candidates to join with our &ldquo;<strong>Employer of Choice</strong>&nbsp;<strong>bank</strong>&rdquo;</p>'),
('15', 'SOKIMEX INVESTMENT GROUP CO., LTD', '0', '2020-07-27 08:24:01', '1', 'Phnom Penh', 'default.png', '<p>Sokimex Investment Group Co.,Ltd has founded in 1990 and the group is now the parent company manages major business divisions in Cambodia.</p>\r\n\r\n<p>We continue putting ongoing efforts to adjust our marketing strategy to cope with the industry changes and competition by adding new products, services and expanding customer base. The company incorporated improvements to the quality of its products and services and emphasized on good governance and awareness of social responsibility, environment and other stakeholder to drive the business growth and sustain</p>'),
('16', 'K.E.T IMPORT EXPORT CO., LTD', '0', '2020-07-27 08:24:01', '1', 'Phnom Penh', 'default.png', NULL),
('17', 'HRINC (CAMBODIA) CO., LTD', '0', '2020-07-27 08:24:01', '1', 'Phnom Penh', 'default.png', '<p>HRINC is the leading provider of HR Services to the Cambodia market and expanding to the South East Asia region.&nbsp; We support multinational companies and leading ASEAN conglomerates and SMEs with their Human Resource needs, from consulting and market intelligence, to outsourcing and compliance as well as recruitment</p>'),
('18', 'SOMA GROUP CO., LTD.', '0', '2020-07-27 08:24:01', '1', 'Phnom Penh', 'default.png', '<p>Soma Group Co., Ltd is a leading Cambodia company operating in various sectors ranging from agriculture to education, construction, farming, trading, consulting and energy</p>');

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
('2', 'Manager', '0'),
('6', 'Manager', '1'),
('7', 'Assistant', '1'),
('8', 'Sale', '1'),
('9', 'CEO', '1');

INSERT INTO `shifts` (`id`, `name`, `active`, `create_at`) VALUES
('2', 'Full-Time', '1', '2020-07-27 08:25:21'),
('3', 'Part-Time', '1', '2020-07-27 08:25:21'),
('4', 'Intern', '1', '2020-07-27 08:25:21'),
('5', 'Training/Workshops', '1', '2020-07-27 08:25:21');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;