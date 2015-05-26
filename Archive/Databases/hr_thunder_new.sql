-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2015 at 09:32 AM
-- Server version: 5.6.17-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hr_thunder_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_apis`
--

CREATE TABLE IF NOT EXISTS `hr_apis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned NOT NULL,
  `client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apis_branch_id_index` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hr_apis`
--

INSERT INTO `hr_apis` (`id`, `branch_id`, `client`, `secret`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '123456789-1', '$2y$10$xmPSWMkaKI.f7hxEvYcaTOsTnrug0OGFkpbjAFs0AcjFT4D3F8z3C', '2015-05-25 18:31:46', '2015-05-25 18:31:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_applications`
--

CREATE TABLE IF NOT EXISTS `hr_applications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hr_applications`
--

INSERT INTO `hr_applications` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'web', '2015-05-25 18:31:31', '2015-05-25 18:31:31', NULL),
(2, 'tracker', '2015-05-25 18:31:31', '2015-05-25 18:31:31', NULL),
(3, 'fingerprint', '2015-05-25 18:31:31', '2015-05-25 18:31:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_authentications`
--

CREATE TABLE IF NOT EXISTS `hr_authentications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `chart_id` int(10) unsigned NOT NULL,
  `create` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `update` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authentications_menu_id_index` (`menu_id`),
  KEY `authentications_chart_id_index` (`chart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `hr_authentications`
--

INSERT INTO `hr_authentications` (`id`, `menu_id`, `chart_id`, `create`, `read`, `update`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 2, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 3, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 4, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 5, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 6, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 7, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 8, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 9, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 10, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(12, 2, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(13, 3, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(14, 4, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(15, 5, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(16, 6, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(17, 7, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(18, 8, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(19, 9, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(20, 10, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_branches`
--

CREATE TABLE IF NOT EXISTS `hr_branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branches_name_organisation_id_index` (`name`,`organisation_id`),
  KEY `branches_organisation_id_index` (`organisation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hr_branches`
--

INSERT INTO `hr_branches` (`id`, `organisation_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Ritchie and Sons and Sons', '2015-05-25 18:31:43', '2015-05-25 18:31:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_calendars`
--

CREATE TABLE IF NOT EXISTS `hr_calendars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `workdays` text COLLATE utf8_unicode_ci NOT NULL,
  `start` time NOT NULL,
  `end` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calendars_deleted_at_index` (`deleted_at`),
  KEY `calendars_organisation_id_index` (`organisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_charts`
--

CREATE TABLE IF NOT EXISTS `hr_charts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned NOT NULL,
  `chart_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min_employee` int(11) NOT NULL,
  `ideal_employee` int(11) NOT NULL,
  `max_employee` int(11) NOT NULL,
  `current_employee` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `charts_tag_path_branch_id_index` (`tag`,`path`,`branch_id`),
  KEY `charts_branch_id_index` (`branch_id`),
  KEY `charts_chart_id_index` (`chart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `hr_charts`
--

INSERT INTO `hr_charts` (`id`, `branch_id`, `chart_id`, `name`, `path`, `grade`, `tag`, `min_employee`, `ideal_employee`, `max_employee`, `current_employee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'CEO', '1', '', 'General', 1, 1, 1, 1, '2015-05-25 18:31:43', '2015-05-25 18:31:43', NULL),
(2, 1, 1, 'Staff', '1,2', '', 'General', 1, 1, 1, 1, '2015-05-25 18:31:44', '2015-05-25 18:31:44', NULL),
(3, 1, 1, 'Staff', '1,3', '', 'General', 1, 1, 1, 1, '2015-05-25 18:31:44', '2015-05-25 18:31:44', NULL),
(4, 1, 1, 'Staff', '1,4', '', 'General', 1, 1, 1, 1, '2015-05-25 18:31:44', '2015-05-25 18:31:44', NULL),
(5, 1, 1, 'Manager', '1,5', '', 'HR', 1, 5, 12, 1, '2015-05-25 18:31:44', '2015-05-25 18:31:44', NULL),
(6, 1, 1, 'Staff', '1,6', '', 'HR', 1, 5, 12, 1, '2015-05-25 18:31:44', '2015-05-25 18:31:44', NULL),
(7, 1, 1, 'Staff', '1,7', '', 'HR', 1, 5, 12, 1, '2015-05-25 18:31:44', '2015-05-25 18:31:44', NULL),
(8, 1, 1, 'Staff', '1,8', '', 'HR', 1, 5, 12, 1, '2015-05-25 18:31:44', '2015-05-25 18:31:44', NULL),
(9, 1, 1, 'Manager', '1,9', '', 'CRM', 1, 4, 10, 1, '2015-05-25 18:31:44', '2015-05-25 18:31:44', NULL),
(10, 1, 1, 'Staff', '1,10', '', 'CRM', 1, 4, 10, 1, '2015-05-25 18:31:45', '2015-05-25 18:31:45', NULL),
(11, 1, 1, 'Staff', '1,11', '', 'CRM', 1, 4, 10, 1, '2015-05-25 18:31:45', '2015-05-25 18:31:45', NULL),
(12, 1, 1, 'Staff', '1,12', '', 'CRM', 1, 4, 10, 1, '2015-05-25 18:31:45', '2015-05-25 18:31:45', NULL),
(13, 1, 1, 'Manager', '1,13', '', 'Accounting', 1, 3, 6, 1, '2015-05-25 18:31:45', '2015-05-25 18:31:45', NULL),
(14, 1, 1, 'Staff', '1,14', '', 'Accounting', 1, 3, 6, 1, '2015-05-25 18:31:45', '2015-05-25 18:31:45', NULL),
(15, 1, 1, 'Staff', '1,15', '', 'Accounting', 1, 3, 6, 1, '2015-05-25 18:31:45', '2015-05-25 18:31:45', NULL),
(16, 1, 1, 'Staff', '1,16', '', 'Accounting', 1, 3, 6, 1, '2015-05-25 18:31:45', '2015-05-25 18:31:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_contacts`
--

CREATE TABLE IF NOT EXISTS `hr_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `branch_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_item_deleted_at_is_default_index` (`item`,`deleted_at`,`is_default`),
  KEY `contacts_branch_id_index` (`branch_id`),
  KEY `contacts_person_id_index` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=604 ;

--
-- Dumping data for table `hr_contacts`
--

INSERT INTO `hr_contacts` (`id`, `branch_id`, `person_id`, `item`, `value`, `branch_type`, `person_type`, `is_default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 1, 'phone', '(057)616-0197', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:52', '2015-05-25 18:31:52', NULL),
(2, 0, 1, 'bbm', '01436830503', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:52', '2015-05-25 18:31:52', NULL),
(3, 0, 1, 'line', '1-479-934-7889', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:52', '2015-05-25 18:31:52', NULL),
(4, 0, 1, 'whatsapp', '+26(7)0819563308', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:52', '2015-05-25 18:31:52', NULL),
(5, 0, 1, 'address', '3012 Turner Tunnel\nSouth Summerstad, AP 58384-9217', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:52', '2015-05-25 18:31:52', NULL),
(6, 0, 1, 'email', 'hr@thunderid.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:52', '2015-05-25 18:31:52', NULL),
(7, 0, 1, 'phone', '612.070.3743x99449', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:52', '2015-05-25 18:31:52', NULL),
(8, 0, 1, 'bbm', '1-116-403-3112x4525', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(9, 0, 1, 'line', '1-666-180-5735x8477', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(10, 0, 1, 'whatsapp', '(517)367-0176', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(11, 0, 1, 'address', '2249 Sanford Vista\nShaneport, OH 20167', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(12, 0, 1, 'email', 'nheaney@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(13, 0, 2, 'phone', '770-644-6005', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(14, 0, 2, 'bbm', '(742)982-8804', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(15, 0, 2, 'line', '+35(5)1724214191', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(16, 0, 2, 'whatsapp', '104.202.9573x1951', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(17, 0, 2, 'address', '471 Ivah Isle\nWest Erik, AL 57877-1416', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(18, 0, 2, 'email', 'wquitzon@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(19, 0, 2, 'phone', '754.379.6754x972', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(20, 0, 2, 'bbm', '06214793232', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(21, 0, 2, 'line', '+77(6)6524039423', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(22, 0, 2, 'whatsapp', '483.816.7113', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(23, 0, 2, 'address', '4990 Joanie Ferry\nMillerchester, NH 92920', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:53', NULL),
(24, 0, 2, 'email', 'tjaskolski@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:53', '2015-05-25 18:31:54', NULL),
(25, 0, 3, 'phone', '121-415-8176x83521', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(26, 0, 3, 'bbm', '069.244.0929x554', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(27, 0, 3, 'line', '(052)601-6741x522', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(28, 0, 3, 'whatsapp', '(793)626-0752x5046', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(29, 0, 3, 'address', '4865 Hamill Oval Suite 417\nWalterfort, VA 00207-0343', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(30, 0, 3, 'email', 'kkoss@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(31, 0, 3, 'phone', '(717)600-4079x39800', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(32, 0, 3, 'bbm', '+32(8)5513164190', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(33, 0, 3, 'line', '(331)002-6149', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(34, 0, 3, 'whatsapp', '1-835-779-3809', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(35, 0, 3, 'address', '20116 Gusikowski Alley\nLynchstad, AL 85653', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(36, 0, 3, 'email', 'bill.herman@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(37, 0, 4, 'phone', '(028)274-1056x816', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(38, 0, 4, 'bbm', '(972)195-4271', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(39, 0, 4, 'line', '04742868359', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(40, 0, 4, 'whatsapp', '01466859278', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:54', '2015-05-25 18:31:54', NULL),
(41, 0, 4, 'address', '557 Balistreri Forges Apt. 360\nNorth Tobinview, ND 48808', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(42, 0, 4, 'email', 'maye31@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(43, 0, 4, 'phone', '786.340.3008', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(44, 0, 4, 'bbm', '227-881-7904', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(45, 0, 4, 'line', '(025)671-0201x32420', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(46, 0, 4, 'whatsapp', '+73(5)7633714000', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(47, 0, 4, 'address', '16340 Ruecker Spring\nJefferyborough, VA 48051', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(48, 0, 4, 'email', 'anita.boyle@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(49, 0, 5, 'phone', '1-382-117-1601x454', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(50, 0, 5, 'bbm', '+15(3)5587298954', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(51, 0, 5, 'line', '084.648.2461', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(52, 0, 5, 'whatsapp', '498-057-1941', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(53, 0, 5, 'address', '7089 Jenkins Villages Apt. 255\nMayebury, MI 26228-0996', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(54, 0, 5, 'email', 'america47@wiegand.net', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:55', '2015-05-25 18:31:55', NULL),
(55, 0, 5, 'phone', '00765689129', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(56, 0, 5, 'bbm', '1-503-771-9528x94850', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(57, 0, 5, 'line', '1-341-199-5748', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(58, 0, 5, 'whatsapp', '871.779.6779x276', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(59, 0, 5, 'address', '082 Luz Rue Apt. 604\nNew Brookeview, NH 84458', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(60, 0, 5, 'email', 'ddubuque@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(61, 0, 6, 'phone', '1-612-194-2891', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(62, 0, 6, 'bbm', '211-268-5556x166', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(63, 0, 6, 'line', '1-770-566-6740x4218', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(64, 0, 6, 'whatsapp', '768.281.8333', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(65, 0, 6, 'address', '73239 Lesch Isle\nWest Martine, DE 70311', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(66, 0, 6, 'email', 'jwaters@gerlach.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(67, 0, 6, 'phone', '580.767.9413x011', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(68, 0, 6, 'bbm', '880.160.9812', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(69, 0, 6, 'line', '032-568-0918', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(70, 0, 6, 'whatsapp', '(817)622-3673', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(71, 0, 6, 'address', '2383 O''Hara Island\nJulieberg, MA 45770-7734', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(72, 0, 6, 'email', 'vsimonis@bergstrom.biz', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:56', '2015-05-25 18:31:56', NULL),
(73, 0, 7, 'phone', '801.464.8573', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(74, 0, 7, 'bbm', '480.761.4237', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(75, 0, 7, 'line', '+96(5)8829650569', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(76, 0, 7, 'whatsapp', '(921)662-1384x11620', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(77, 0, 7, 'address', '02212 Murazik Valleys\nNitzschemouth, MH 04879', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(78, 0, 7, 'email', 'grover.kessler@veum.net', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(79, 0, 7, 'phone', '313.672.8972x5163', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(80, 0, 7, 'bbm', '(449)146-4012x138', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(81, 0, 7, 'line', '1-044-805-3194x529', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(82, 0, 7, 'whatsapp', '1-241-396-1280', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(83, 0, 7, 'address', '442 Kris Fields\nEast Deannamouth, VI 37963-3983', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(84, 0, 7, 'email', 'manuela62@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(85, 0, 8, 'phone', '(954)213-6907x416', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(86, 0, 8, 'bbm', '603-413-3100x67679', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(87, 0, 8, 'line', '1-358-333-2158x39140', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(88, 0, 8, 'whatsapp', '(804)834-0798', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(89, 0, 8, 'address', '116 Agustin Circle\nNew Lorenz, TX 92643-2066', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:57', '2015-05-25 18:31:57', NULL),
(90, 0, 8, 'email', 'wlegros@satterfield.net', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(91, 0, 8, 'phone', '06944096299', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(92, 0, 8, 'bbm', '(260)050-4108x21083', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(93, 0, 8, 'line', '03193094660', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(94, 0, 8, 'whatsapp', '+75(3)0328958304', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(95, 0, 8, 'address', '9491 Zane Shoals\nStuarttown, MP 76684', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(96, 0, 8, 'email', 'xpfannerstill@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(97, 0, 9, 'phone', '+99(0)5949233840', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(98, 0, 9, 'bbm', '(329)217-4426x24869', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(99, 0, 9, 'line', '00855662569', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(100, 0, 9, 'whatsapp', '696-128-5864', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(101, 0, 9, 'address', '62767 Gerlach Ways\nLake Maxime, PW 32158-6198', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(102, 0, 9, 'email', 'cgerlach@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(103, 0, 9, 'phone', '(368)648-1058x35112', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:58', '2015-05-25 18:31:58', NULL),
(104, 0, 9, 'bbm', '1-800-258-8059', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:58', '2015-05-25 18:31:59', NULL),
(105, 0, 9, 'line', '1-550-066-6145x60471', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(106, 0, 9, 'whatsapp', '+09(9)0752730239', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(107, 0, 9, 'address', '65544 Mante Route Suite 544\nPort Rosetta, VA 11463', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(108, 0, 9, 'email', 'fnienow@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(109, 0, 10, 'phone', '971.841.6674x4342', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(110, 0, 10, 'bbm', '530-715-6930x89687', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(111, 0, 10, 'line', '(625)575-6211', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(112, 0, 10, 'whatsapp', '1-088-175-1890', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(113, 0, 10, 'address', '098 O''Conner Isle Apt. 941\nVioletburgh, PW 11654-5312', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(114, 0, 10, 'email', 'ezequiel.reinger@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(115, 0, 10, 'phone', '07985368597', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(116, 0, 10, 'bbm', '657.674.7617x723', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(117, 0, 10, 'line', '916.003.1065x05456', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(118, 0, 10, 'whatsapp', '499-477-8239x233', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(119, 0, 10, 'address', '202 Katlynn Glen\nEast Kendall, IN 24882-8131', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:31:59', NULL),
(120, 0, 10, 'email', 'melany.cormier@jastkunde.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:31:59', '2015-05-25 18:32:00', NULL),
(121, 0, 11, 'phone', '1-882-614-9969x50529', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(122, 0, 11, 'bbm', '(284)631-4455x06002', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(123, 0, 11, 'line', '(027)098-3821x5937', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(124, 0, 11, 'whatsapp', '897-141-8408x011', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(125, 0, 11, 'address', '65076 Dalton Court\nMooremouth, OK 93011', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(126, 0, 11, 'email', 'cornell.steuber@anderson.info', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(127, 0, 11, 'phone', '1-589-873-7843x052', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(128, 0, 11, 'bbm', '1-578-402-5427', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(129, 0, 11, 'line', '436.883.9931', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(130, 0, 11, 'whatsapp', '147.374.4585', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(131, 0, 11, 'address', '87025 Brigitte Shore Suite 829\nVerlieside, MT 57662', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(132, 0, 11, 'email', 'mauricio12@quitzonbernier.biz', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(133, 0, 12, 'phone', '835-614-1628x97695', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(134, 0, 12, 'bbm', '01754387935', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:00', '2015-05-25 18:32:00', NULL),
(135, 0, 12, 'line', '792.075.6162x5883', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:00', '2015-05-25 18:32:01', NULL),
(136, 0, 12, 'whatsapp', '(817)488-2860x089', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(137, 0, 12, 'address', '75074 Joel Ports Apt. 002\nNorth Evans, AR 59408', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(138, 0, 12, 'email', 'fd''amore@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(139, 0, 12, 'phone', '+77(9)6033800965', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(140, 0, 12, 'bbm', '1-864-035-0006x76713', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(141, 0, 12, 'line', '970-028-0213x489', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(142, 0, 12, 'whatsapp', '852-418-2720', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(143, 0, 12, 'address', '04123 Kling Row Suite 925\nLake Sydni, FM 59725', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(144, 0, 12, 'email', 'agustin.gusikowski@fritsch.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(145, 0, 13, 'phone', '+80(3)3833203387', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(146, 0, 13, 'bbm', '017.481.8075x77273', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(147, 0, 13, 'line', '170.352.4472x86462', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(148, 0, 13, 'whatsapp', '07018773120', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(149, 0, 13, 'address', '64362 Shayna Ways Apt. 031\nMalcolmburgh, VT 24354-7258', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(150, 0, 13, 'email', 'bahringer.cedrick@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:01', '2015-05-25 18:32:01', NULL),
(151, 0, 13, 'phone', '07246617803', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:02', '2015-05-25 18:32:02', NULL),
(152, 0, 13, 'bbm', '167.954.3143x07404', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:02', '2015-05-25 18:32:02', NULL),
(153, 0, 13, 'line', '(449)479-1493x6561', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:02', '2015-05-25 18:32:02', NULL),
(154, 0, 13, 'whatsapp', '472-379-5870', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:02', '2015-05-25 18:32:02', NULL),
(155, 0, 13, 'address', '891 Vada Throughway\nLake Nathanael, CT 24928', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:02', '2015-05-25 18:32:02', NULL),
(156, 0, 13, 'email', 'ezra07@schuster.info', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:02', '2015-05-25 18:32:02', NULL),
(157, 0, 14, 'phone', '1-196-419-7891', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:02', '2015-05-25 18:32:02', NULL),
(158, 0, 14, 'bbm', '(462)211-1884', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:02', '2015-05-25 18:32:02', NULL),
(159, 0, 14, 'line', '(124)961-7177x967', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:02', '2015-05-25 18:32:03', NULL),
(160, 0, 14, 'whatsapp', '(300)581-1239x1983', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:03', '2015-05-25 18:32:03', NULL),
(161, 0, 14, 'address', '1746 Wyman Cape\nRauview, OK 17129', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:03', '2015-05-25 18:32:03', NULL),
(162, 0, 14, 'email', 'conroy.juwan@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:03', '2015-05-25 18:32:03', NULL),
(163, 0, 14, 'phone', '(779)431-3618', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:03', '2015-05-25 18:32:03', NULL),
(164, 0, 14, 'bbm', '01092869171', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:03', '2015-05-25 18:32:03', NULL),
(165, 0, 14, 'line', '1-538-449-6183x9994', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:03', '2015-05-25 18:32:04', NULL),
(166, 0, 14, 'whatsapp', '1-833-593-8877x8411', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:04', '2015-05-25 18:32:04', NULL),
(167, 0, 14, 'address', '524 Bins Square\nNorth Dorian, RI 30835-0029', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:04', '2015-05-25 18:32:04', NULL),
(168, 0, 14, 'email', 'ora64@brakus.org', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:04', '2015-05-25 18:32:04', NULL),
(169, 0, 15, 'phone', '875-799-8744x2807', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:04', '2015-05-25 18:32:04', NULL),
(170, 0, 15, 'bbm', '1-467-274-6396x6993', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:04', '2015-05-25 18:32:04', NULL),
(171, 0, 15, 'line', '(672)904-7959x664', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:04', '2015-05-25 18:32:04', NULL),
(172, 0, 15, 'whatsapp', '1-003-700-5239', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:04', '2015-05-25 18:32:04', NULL),
(173, 0, 15, 'address', '366 Hartmann Camp Suite 937\nSchuppebury, MS 58354-6011', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:04', '2015-05-25 18:32:04', NULL),
(174, 0, 15, 'email', 'awillms@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(175, 0, 15, 'phone', '929-091-2462x766', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(176, 0, 15, 'bbm', '115-013-2486x190', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(177, 0, 15, 'line', '1-364-676-2837x15568', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(178, 0, 15, 'whatsapp', '1-082-284-3061', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(179, 0, 15, 'address', '9429 Nikolaus Junctions\nLake Faefurt, WY 94703-8242', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(180, 0, 15, 'email', 'bruen.pascale@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(181, 0, 16, 'phone', '758.807.3781', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(182, 0, 16, 'bbm', '(422)395-2518x5280', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(183, 0, 16, 'line', '1-071-479-2660x6651', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(184, 0, 16, 'whatsapp', '+33(2)9256392696', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(185, 0, 16, 'address', '312 Kovacek Unions Apt. 206\nElenormouth, PA 56648-6143', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(186, 0, 16, 'email', 'marvin.horacio@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:05', '2015-05-25 18:32:05', NULL),
(187, 0, 16, 'phone', '1-053-947-3796x8392', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(188, 0, 16, 'bbm', '(170)238-2519', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(189, 0, 16, 'line', '(754)735-6363x315', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(190, 0, 16, 'whatsapp', '257.823.2658', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(191, 0, 16, 'address', '962 Liliane Green\nAlexandrinetown, AA 95889-0047', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(192, 0, 16, 'email', 'tierra.mills@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(193, 0, 17, 'phone', '(449)211-4423x0341', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(194, 0, 17, 'bbm', '796.472.6173', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(195, 0, 17, 'line', '+25(0)9396319670', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(196, 0, 17, 'whatsapp', '(733)768-6836', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(197, 0, 17, 'address', '7215 Aditya Road\nHeathcoteberg, DC 52379-0369', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(198, 0, 17, 'email', 'yherzog@prosaccojast.info', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(199, 0, 17, 'phone', '645-638-6373x747', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(200, 0, 17, 'bbm', '846-864-0297', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(201, 0, 17, 'line', '867.984.3519x040', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(202, 0, 17, 'whatsapp', '876.868.1497x38686', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:06', NULL),
(203, 0, 17, 'address', '610 Bins Manors Suite 707\nWest Gonzalo, MA 59250-4097', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:06', '2015-05-25 18:32:07', NULL),
(204, 0, 17, 'email', 'caroline79@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(205, 0, 18, 'phone', '03025411012', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(206, 0, 18, 'bbm', '582.908.9402x15396', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(207, 0, 18, 'line', '294.917.9354x98690', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(208, 0, 18, 'whatsapp', '(376)057-3499x3181', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(209, 0, 18, 'address', '82005 Schmidt Locks Apt. 480\nEast Donavon, MA 79762-4912', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(210, 0, 18, 'email', 'linnie.hayes@boylebreitenberg.info', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(211, 0, 18, 'phone', '578-256-9972', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(212, 0, 18, 'bbm', '+73(1)7621961748', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(213, 0, 18, 'line', '09136045485', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(214, 0, 18, 'whatsapp', '(356)281-0207', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(215, 0, 18, 'address', '0138 Rosemary Square\nPort Marilyneton, PW 17608-4458', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(216, 0, 18, 'email', 'fkovacek@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(217, 0, 19, 'phone', '041.094.2301', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(218, 0, 19, 'bbm', '481.959.3784x3000', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:07', '2015-05-25 18:32:07', NULL),
(219, 0, 19, 'line', '09956740792', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:07', '2015-05-25 18:32:08', NULL),
(220, 0, 19, 'whatsapp', '746.164.7585', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(221, 0, 19, 'address', '19386 Jast Causeway\nRachellestad, AL 79708', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(222, 0, 19, 'email', 'rebeca23@kertzmann.org', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(223, 0, 19, 'phone', '368-533-0373x28833', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(224, 0, 19, 'bbm', '473.682.0142x449', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(225, 0, 19, 'line', '283.903.1846x4977', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(226, 0, 19, 'whatsapp', '831.581.5195x10037', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(227, 0, 19, 'address', '495 Chanel Meadows Suite 435\nSouth Arielle, GU 12580-6226', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(228, 0, 19, 'email', 'bogan.jerrell@paucek.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(229, 0, 20, 'phone', '(012)357-1518', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(230, 0, 20, 'bbm', '(768)004-4604x3843', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(231, 0, 20, 'line', '+41(4)3964070258', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(232, 0, 20, 'whatsapp', '1-061-687-7544', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(233, 0, 20, 'address', '55750 Raymundo Grove Apt. 503\nEast Shaniashire, PA 02255', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(234, 0, 20, 'email', 'lmuller@andersonarmstrong.org', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:08', '2015-05-25 18:32:08', NULL),
(235, 0, 20, 'phone', '1-415-763-0675x869', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:08', '2015-05-25 18:32:09', NULL),
(236, 0, 20, 'bbm', '626-899-7652x84231', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(237, 0, 20, 'line', '529-623-1571x31569', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(238, 0, 20, 'whatsapp', '(335)367-7419', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(239, 0, 20, 'address', '6993 Oberbrunner Camp\nNorth Ernestineshire, NY 16238-3005', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(240, 0, 20, 'email', 'zelda.bailey@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(241, 0, 21, 'phone', '358.960.7370', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(242, 0, 21, 'bbm', '+57(2)2829225540', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(243, 0, 21, 'line', '01465091961', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(244, 0, 21, 'whatsapp', '302-955-7797x0368', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(245, 0, 21, 'address', '7871 Kuhic Creek\nEast Mayland, CA 56687-3676', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(246, 0, 21, 'email', 'madelynn97@ryanlubowitz.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(247, 0, 21, 'phone', '679.340.6624x7080', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(248, 0, 21, 'bbm', '495-513-0014x1141', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:09', '2015-05-25 18:32:09', NULL),
(249, 0, 21, 'line', '1-219-111-8358x682', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:10', '2015-05-25 18:32:10', NULL),
(250, 0, 21, 'whatsapp', '1-505-863-4984', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:10', '2015-05-25 18:32:10', NULL),
(251, 0, 21, 'address', '99697 Schuppe Bypass Suite 077\nSouth Russ, AL 65992', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:10', '2015-05-25 18:32:10', NULL),
(252, 0, 21, 'email', 'stroman.una@bergstrom.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:10', '2015-05-25 18:32:10', NULL),
(253, 0, 22, 'phone', '+15(9)6050416006', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:10', '2015-05-25 18:32:10', NULL),
(254, 0, 22, 'bbm', '819-219-1715x745', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:10', '2015-05-25 18:32:10', NULL),
(255, 0, 22, 'line', '1-155-940-2278x90251', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:10', '2015-05-25 18:32:10', NULL),
(256, 0, 22, 'whatsapp', '444.302.3073x27242', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:10', '2015-05-25 18:32:10', NULL),
(257, 0, 22, 'address', '5489 Stokes Parkways\nPort Brendachester, CO 66383-6575', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:10', '2015-05-25 18:32:11', NULL),
(258, 0, 22, 'email', 'mante.josefina@fadel.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(259, 0, 22, 'phone', '1-842-262-5049x294', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(260, 0, 22, 'bbm', '1-822-913-3633x57999', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(261, 0, 22, 'line', '1-723-804-9004x54950', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(262, 0, 22, 'whatsapp', '1-113-655-1140x8488', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(263, 0, 22, 'address', '99565 Witting Trafficway Suite 896\nWillmouth, SC 34991-1534', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(264, 0, 22, 'email', 'rau.micaela@price.net', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(265, 0, 23, 'phone', '605-376-9768', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(266, 0, 23, 'bbm', '(598)696-1398x64426', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(267, 0, 23, 'line', '(776)734-2147', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(268, 0, 23, 'whatsapp', '+30(7)6212400377', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(269, 0, 23, 'address', '61780 Wehner View\nLavernatown, NJ 35706-8948', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(270, 0, 23, 'email', 'hailey68@schroeder.biz', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(271, 0, 23, 'phone', '467-533-0769x69696', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:11', '2015-05-25 18:32:11', NULL),
(272, 0, 23, 'bbm', '+84(7)2132479658', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(273, 0, 23, 'line', '+48(6)2007265168', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(274, 0, 23, 'whatsapp', '(054)430-2090', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(275, 0, 23, 'address', '75651 Christiansen Bridge\nNorth Myrnaberg, AA 62666-3650', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(276, 0, 23, 'email', 'ufeeney@dickinson.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(277, 0, 24, 'phone', '1-083-326-1409x739', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(278, 0, 24, 'bbm', '314-980-4632x43723', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(279, 0, 24, 'line', '(258)461-2729x48602', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(280, 0, 24, 'whatsapp', '1-523-574-0528x7363', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(281, 0, 24, 'address', '155 Braxton Trace\nKaiafort, WY 70181-4837', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(282, 0, 24, 'email', 'tressa.herzog@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(283, 0, 24, 'phone', '086-690-3935', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(284, 0, 24, 'bbm', '1-291-107-4723x2008', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(285, 0, 24, 'line', '619.565.0638', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:12', '2015-05-25 18:32:12', NULL),
(286, 0, 24, 'whatsapp', '+23(9)0817542896', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:12', '2015-05-25 18:32:13', NULL),
(287, 0, 24, 'address', '906 Hamill Turnpike Suite 279\nRoweville, TN 61911-2880', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(288, 0, 24, 'email', 'travon86@krajcikokeefe.net', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(289, 0, 25, 'phone', '+77(8)1127607954', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(290, 0, 25, 'bbm', '1-291-172-3022x17881', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(291, 0, 25, 'line', '(712)727-6353', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(292, 0, 25, 'whatsapp', '+64(3)5522052501', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(293, 0, 25, 'address', '623 Delia Crossing\nSouth Maybell, SD 77708-8545', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(294, 0, 25, 'email', 'georgette69@rosenbaum.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(295, 0, 25, 'phone', '759-280-4895', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(296, 0, 25, 'bbm', '908.251.9407', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(297, 0, 25, 'line', '1-164-578-3468', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(298, 0, 25, 'whatsapp', '206-280-7534x4724', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(299, 0, 25, 'address', '37339 Buddy Hill\nPort Lesley, DC 77781', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(300, 0, 25, 'email', 'margaret40@wisozkboehm.org', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(301, 0, 26, 'phone', '908.473.8620x58229', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:13', '2015-05-25 18:32:13', NULL),
(302, 0, 26, 'bbm', '1-842-146-5021x82895', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:13', '2015-05-25 18:32:14', NULL),
(303, 0, 26, 'line', '1-911-040-1177x24359', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(304, 0, 26, 'whatsapp', '1-291-813-9944x55752', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(305, 0, 26, 'address', '974 Jacobson Dam Apt. 513\nKrajcikland, KS 04872-9465', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(306, 0, 26, 'email', 'tillman.kory@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(307, 0, 26, 'phone', '(721)200-6889', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(308, 0, 26, 'bbm', '020.538.5648x963', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(309, 0, 26, 'line', '551.944.8260', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(310, 0, 26, 'whatsapp', '050-200-7647x730', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(311, 0, 26, 'address', '996 Pinkie Valley\nZellaborough, MN 05344', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(312, 0, 26, 'email', 'adriel39@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(313, 0, 27, 'phone', '(932)517-3021x3854', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(314, 0, 27, 'bbm', '03561229595', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(315, 0, 27, 'line', '484.744.5577x35669', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(316, 0, 27, 'whatsapp', '1-808-296-8115', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(317, 0, 27, 'address', '4393 Ian Shores\nSouth Keyonton, NM 54429-6659', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(318, 0, 27, 'email', 'wzemlak@nitzsche.org', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:14', '2015-05-25 18:32:14', NULL),
(319, 0, 27, 'phone', '338-206-4793', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:14', '2015-05-25 18:32:15', NULL),
(320, 0, 27, 'bbm', '1-191-928-1231x5670', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(321, 0, 27, 'line', '105-578-8249x578', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(322, 0, 27, 'whatsapp', '660-502-7375x432', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(323, 0, 27, 'address', '423 Thiel Mountains Apt. 031\nNew Anyaborough, NJ 09772-2695', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(324, 0, 27, 'email', 'hbecker@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(325, 0, 28, 'phone', '344-575-8338', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(326, 0, 28, 'bbm', '(702)296-0801', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(327, 0, 28, 'line', '1-523-077-1106', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(328, 0, 28, 'whatsapp', '00188623736', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(329, 0, 28, 'address', '3421 Fritsch Unions\nSouth Kelley, FM 24043-0294', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(330, 0, 28, 'email', 'zquitzon@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(331, 0, 28, 'phone', '1-193-911-1251x51498', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(332, 0, 28, 'bbm', '+40(3)6968518547', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(333, 0, 28, 'line', '1-459-815-3521', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(334, 0, 28, 'whatsapp', '1-683-779-9575', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:15', NULL),
(335, 0, 28, 'address', '1490 Hiram Island\nNorth Manueltown, IL 99683', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:15', '2015-05-25 18:32:16', NULL),
(336, 0, 28, 'email', 'johns.uriah@cartwrightoreilly.biz', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(337, 0, 29, 'phone', '(102)643-1959x5822', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(338, 0, 29, 'bbm', '403.272.1178x9145', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(339, 0, 29, 'line', '171-831-6884x716', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(340, 0, 29, 'whatsapp', '(859)233-3414x69355', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(341, 0, 29, 'address', '98883 Barton Fords\nWest Ahmedside, OK 64630', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(342, 0, 29, 'email', 'corkery.jose@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(343, 0, 29, 'phone', '412-370-3482x3919', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(344, 0, 29, 'bbm', '960-805-7765x431', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(345, 0, 29, 'line', '09229719170', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(346, 0, 29, 'whatsapp', '632.800.9106', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(347, 0, 29, 'address', '39967 Kaylie Trafficway\nPort Elouise, MN 58729-6861', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL),
(348, 0, 29, 'email', 'jjones@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:16', '2015-05-25 18:32:16', NULL);
INSERT INTO `hr_contacts` (`id`, `branch_id`, `person_id`, `item`, `value`, `branch_type`, `person_type`, `is_default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(349, 0, 30, 'phone', '(245)931-6221x68786', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:17', '2015-05-25 18:32:17', NULL),
(350, 0, 30, 'bbm', '(962)908-9742', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:17', '2015-05-25 18:32:17', NULL),
(351, 0, 30, 'line', '034-089-3987', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:17', '2015-05-25 18:32:17', NULL),
(352, 0, 30, 'whatsapp', '626.288.8824x721', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:17', '2015-05-25 18:32:17', NULL),
(353, 0, 30, 'address', '751 Medhurst Trace Suite 160\nElmerbury, PW 31797', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:17', '2015-05-25 18:32:17', NULL),
(354, 0, 30, 'email', 'ecollier@haleyhessel.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:17', '2015-05-25 18:32:17', NULL),
(355, 0, 30, 'phone', '1-591-555-9059', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:17', '2015-05-25 18:32:17', NULL),
(356, 0, 30, 'bbm', '(504)082-7466x8827', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:18', '2015-05-25 18:32:18', NULL),
(357, 0, 30, 'line', '166-888-1272', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:18', '2015-05-25 18:32:18', NULL),
(358, 0, 30, 'whatsapp', '403.092.7518x59276', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:18', '2015-05-25 18:32:18', NULL),
(359, 0, 30, 'address', '645 Anissa Forks Apt. 092\nAdellemouth, LA 24233', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:18', '2015-05-25 18:32:18', NULL),
(360, 0, 30, 'email', 'jonathan45@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:18', '2015-05-25 18:32:18', NULL),
(361, 0, 31, 'phone', '880-121-3436x510', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:18', '2015-05-25 18:32:18', NULL),
(362, 0, 31, 'bbm', '1-761-090-4481x32834', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:18', '2015-05-25 18:32:18', NULL),
(363, 0, 31, 'line', '003.422.1809x0830', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:18', '2015-05-25 18:32:18', NULL),
(364, 0, 31, 'whatsapp', '(079)408-9034x724', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:18', '2015-05-25 18:32:19', NULL),
(365, 0, 31, 'address', '412 Wintheiser Orchard Suite 167\nFisherburgh, PW 84903-3386', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(366, 0, 31, 'email', 'theresa30@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(367, 0, 31, 'phone', '1-654-568-0546x244', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(368, 0, 31, 'bbm', '+43(9)4604804991', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(369, 0, 31, 'line', '(185)330-1294', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(370, 0, 31, 'whatsapp', '558-371-0946x171', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(371, 0, 31, 'address', '586 Nicolas Dale Apt. 567\nWest Candidohaven, SC 55647-4936', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(372, 0, 31, 'email', 'allene61@terry.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(373, 0, 32, 'phone', '184-655-1511x53732', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(374, 0, 32, 'bbm', '(189)995-5139', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(375, 0, 32, 'line', '01393206418', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(376, 0, 32, 'whatsapp', '08746757550', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(377, 0, 32, 'address', '590 Predovic Tunnel Apt. 300\nZackaryberg, TN 78360', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(378, 0, 32, 'email', 'summer.robel@bergnaumwindler.info', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(379, 0, 32, 'phone', '866-566-9867', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(380, 0, 32, 'bbm', '(824)007-4383', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(381, 0, 32, 'line', '346-994-1338x241', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:19', NULL),
(382, 0, 32, 'whatsapp', '(884)815-8332x09954', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:19', '2015-05-25 18:32:20', NULL),
(383, 0, 32, 'address', '90366 Pollich Crossroad\nNew Ronnyshire, TX 55820', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(384, 0, 32, 'email', 'bwyman@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(385, 0, 33, 'phone', '1-521-553-5468x332', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(386, 0, 33, 'bbm', '09470134357', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(387, 0, 33, 'line', '356-895-3054x3291', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(388, 0, 33, 'whatsapp', '(596)290-4394x810', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(389, 0, 33, 'address', '4232 Russel View\nSouth Myleston, PW 33429-7384', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(390, 0, 33, 'email', 'alex.oberbrunner@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(391, 0, 33, 'phone', '1-989-157-9296x839', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(392, 0, 33, 'bbm', '532.905.6020x143', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(393, 0, 33, 'line', '(469)534-1544x6259', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(394, 0, 33, 'whatsapp', '+42(5)6200832058', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(395, 0, 33, 'address', '6973 Walker Track Apt. 688\nBergeview, SC 92873-5766', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:20', '2015-05-25 18:32:20', NULL),
(396, 0, 33, 'email', 'gustave.dicki@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:20', '2015-05-25 18:32:21', NULL),
(397, 0, 34, 'phone', '(183)773-1645', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(398, 0, 34, 'bbm', '(786)713-3323', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(399, 0, 34, 'line', '948.881.2909', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(400, 0, 34, 'whatsapp', '1-575-371-3875x67853', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(401, 0, 34, 'address', '642 Roman Ville Apt. 884\nEstevanchester, OR 42555-3457', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(402, 0, 34, 'email', 'seth.dietrich@schneider.biz', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(403, 0, 34, 'phone', '1-392-621-7890x6723', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(404, 0, 34, 'bbm', '(804)271-3716', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(405, 0, 34, 'line', '666.600.6285', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(406, 0, 34, 'whatsapp', '584.303.8011', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(407, 0, 34, 'address', '701 Powlowski Ramp\nPaulaville, MP 45858-3966', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(408, 0, 34, 'email', 'bemard@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(409, 0, 35, 'phone', '(722)550-8924x545', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(410, 0, 35, 'bbm', '1-018-390-9787x7669', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(411, 0, 35, 'line', '030.212.0806', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(412, 0, 35, 'whatsapp', '+55(6)6443733542', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(413, 0, 35, 'address', '443 Addie Inlet Suite 230\nNorth Rick, MP 70596-9551', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(414, 0, 35, 'email', 'george.koch@rogahn.net', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:21', '2015-05-25 18:32:21', NULL),
(415, 0, 35, 'phone', '744.165.4392x272', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:21', '2015-05-25 18:32:22', NULL),
(416, 0, 35, 'bbm', '103.528.2753x7927', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(417, 0, 35, 'line', '1-957-419-3315', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(418, 0, 35, 'whatsapp', '(177)995-6368', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(419, 0, 35, 'address', '3344 Juliana Estates\nSouth Harmonton, TN 01108-6858', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(420, 0, 35, 'email', 'pietro.bechtelar@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(421, 0, 36, 'phone', '732-272-3483', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(422, 0, 36, 'bbm', '(030)124-3852x5153', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(423, 0, 36, 'line', '225.022.2019', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(424, 0, 36, 'whatsapp', '114.144.1722x49908', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(425, 0, 36, 'address', '0281 Eula Spring\nLeslieburgh, MI 02177-9926', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(426, 0, 36, 'email', 'nkessler@towne.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:22', '2015-05-25 18:32:22', NULL),
(427, 0, 36, 'phone', '428.365.7994', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:22', '2015-05-25 18:32:23', NULL),
(428, 0, 36, 'bbm', '+93(8)0580469109', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(429, 0, 36, 'line', '1-243-444-6887x0320', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(430, 0, 36, 'whatsapp', '997.219.4357x862', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(431, 0, 36, 'address', '270 Priscilla Point\nWest Patriciaborough, NE 73782-2449', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(432, 0, 36, 'email', 'treutel.janice@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(433, 0, 37, 'phone', '1-954-241-4597x469', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(434, 0, 37, 'bbm', '00397342758', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(435, 0, 37, 'line', '795.008.8487x05283', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(436, 0, 37, 'whatsapp', '1-327-830-7278x35588', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(437, 0, 37, 'address', '1637 Diego Freeway\nPort Tobyhaven, ND 23585-8472', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(438, 0, 37, 'email', 'keebler.terrence@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(439, 0, 37, 'phone', '1-078-399-9696x29098', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(440, 0, 37, 'bbm', '234.621.2415x5707', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(441, 0, 37, 'line', '436.001.0874x530', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:23', '2015-05-25 18:32:23', NULL),
(442, 0, 37, 'whatsapp', '1-601-681-6591', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(443, 0, 37, 'address', '6127 Verlie Way\nEast Ambrose, OK 10113', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(444, 0, 37, 'email', 'howell66@trantow.org', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(445, 0, 38, 'phone', '552-998-7565x5515', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(446, 0, 38, 'bbm', '1-927-746-4813x96289', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(447, 0, 38, 'line', '1-889-087-8363x552', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(448, 0, 38, 'whatsapp', '07561760810', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(449, 0, 38, 'address', '2764 Celestine Greens Suite 271\nMathewberg, MO 43824-9560', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(450, 0, 38, 'email', 'bnitzsche@cassin.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(451, 0, 38, 'phone', '(317)043-8227x428', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(452, 0, 38, 'bbm', '(539)937-0051x781', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(453, 0, 38, 'line', '250-899-9149', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(454, 0, 38, 'whatsapp', '1-317-108-1706x9236', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:24', '2015-05-25 18:32:24', NULL),
(455, 0, 38, 'address', '417 Roberts Isle Suite 331\nAhmedhaven, MN 74521-3701', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(456, 0, 38, 'email', 'caleb.reichel@parisian.info', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(457, 0, 39, 'phone', '1-066-841-6344', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(458, 0, 39, 'bbm', '(096)904-6403x647', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(459, 0, 39, 'line', '757.817.7552', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(460, 0, 39, 'whatsapp', '1-475-324-3583x021', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(461, 0, 39, 'address', '54839 Brekke Plains\nFadelland, DC 40157', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(462, 0, 39, 'email', 'plemke@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(463, 0, 39, 'phone', '970-477-3104x092', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(464, 0, 39, 'bbm', '1-373-841-2283x157', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(465, 0, 39, 'line', '672-919-7275', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(466, 0, 39, 'whatsapp', '04060122176', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(467, 0, 39, 'address', '249 Yost Garden\nRoelview, WA 93145', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(468, 0, 39, 'email', 'zhauck@ratke.net', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:25', '2015-05-25 18:32:25', NULL),
(469, 0, 40, 'phone', '844-956-5630', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:25', '2015-05-25 18:32:26', NULL),
(470, 0, 40, 'bbm', '05322137850', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(471, 0, 40, 'line', '559-435-9845x752', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(472, 0, 40, 'whatsapp', '1-275-467-0017x5935', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(473, 0, 40, 'address', '4801 Hintz Unions Suite 554\nLake Joana, OK 74038-8463', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(474, 0, 40, 'email', 'mledner@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(475, 0, 40, 'phone', '1-953-327-2848', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(476, 0, 40, 'bbm', '(157)654-1830x015', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(477, 0, 40, 'line', '142-107-2029', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(478, 0, 40, 'whatsapp', '801-410-3261', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(479, 0, 40, 'address', '62102 Kerluke Circles\nPort Orinhaven, ID 50433-7083', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(480, 0, 40, 'email', 'linda97@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(481, 0, 41, 'phone', '04173985952', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:26', '2015-05-25 18:32:26', NULL),
(482, 0, 41, 'bbm', '444-260-9647x76439', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(483, 0, 41, 'line', '1-734-230-7242x216', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(484, 0, 41, 'whatsapp', '408-792-3229x63388', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(485, 0, 41, 'address', '84921 Schaefer Falls Apt. 985\nOfeliaport, IL 18072-9376', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(486, 0, 41, 'email', 'samantha.feest@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(487, 0, 41, 'phone', '406-940-8478x42025', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(488, 0, 41, 'bbm', '(653)665-8375', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(489, 0, 41, 'line', '440.539.3449x687', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(490, 0, 41, 'whatsapp', '377-823-9484', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(491, 0, 41, 'address', '59158 Daniel Locks Apt. 486\nJaredton, LA 44441-7865', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(492, 0, 41, 'email', 'virgie.armstrong@gibsonthiel.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(493, 0, 42, 'phone', '1-302-848-9305', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(494, 0, 42, 'bbm', '1-274-276-2401', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(495, 0, 42, 'line', '605.986.5513x52113', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(496, 0, 42, 'whatsapp', '1-733-554-2181', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(497, 0, 42, 'address', '35004 Louie Via Apt. 276\nAnastasialand, TN 10347', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(498, 0, 42, 'email', 'wilton.veum@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:27', '2015-05-25 18:32:27', NULL),
(499, 0, 42, 'phone', '751-294-8923x56513', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:28', '2015-05-25 18:32:28', NULL),
(500, 0, 42, 'bbm', '(854)337-5969x14338', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:28', '2015-05-25 18:32:28', NULL),
(501, 0, 42, 'line', '1-364-656-9227x3661', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:28', '2015-05-25 18:32:28', NULL),
(502, 0, 42, 'whatsapp', '(549)115-6089x00982', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:28', '2015-05-25 18:32:28', NULL),
(503, 0, 42, 'address', '22304 Zachary Wall\nDaijastad, ID 96010', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:28', '2015-05-25 18:32:28', NULL),
(504, 0, 42, 'email', 'itzel69@borerferry.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:28', '2015-05-25 18:32:28', NULL),
(505, 0, 43, 'phone', '+34(3)3970754974', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:28', '2015-05-25 18:32:28', NULL),
(506, 0, 43, 'bbm', '+57(2)4177060241', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:28', '2015-05-25 18:32:28', NULL),
(507, 0, 43, 'line', '590-093-7806', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:28', '2015-05-25 18:32:28', NULL),
(508, 0, 43, 'whatsapp', '+19(8)8237819710', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:29', '2015-05-25 18:32:29', NULL),
(509, 0, 43, 'address', '19004 Kihn Point\nPort Orrinchester, NY 61728-9286', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:29', '2015-05-25 18:32:29', NULL),
(510, 0, 43, 'email', 'kaycee.heller@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:29', '2015-05-25 18:32:29', NULL),
(511, 0, 43, 'phone', '1-490-990-6286', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:29', '2015-05-25 18:32:29', NULL),
(512, 0, 43, 'bbm', '760.255.2444', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:29', '2015-05-25 18:32:29', NULL),
(513, 0, 43, 'line', '1-790-078-9412x134', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:29', '2015-05-25 18:32:29', NULL),
(514, 0, 43, 'whatsapp', '1-171-875-1906x75298', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:29', '2015-05-25 18:32:29', NULL),
(515, 0, 43, 'address', '2474 Hermiston Shore Suite 197\nWest Glenna, NC 52317', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:29', '2015-05-25 18:32:29', NULL),
(516, 0, 43, 'email', 'sanford.muriel@harber.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:30', '2015-05-25 18:32:30', NULL),
(517, 0, 44, 'phone', '1-217-441-5954', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:30', '2015-05-25 18:32:30', NULL),
(518, 0, 44, 'bbm', '629-387-9751x900', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:30', '2015-05-25 18:32:30', NULL),
(519, 0, 44, 'line', '184.279.2239', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:30', '2015-05-25 18:32:30', NULL),
(520, 0, 44, 'whatsapp', '816.899.7773x289', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:30', '2015-05-25 18:32:30', NULL),
(521, 0, 44, 'address', '1477 Leffler Stream Suite 327\nWest Jerel, KS 63237-0826', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:30', '2015-05-25 18:32:30', NULL),
(522, 0, 44, 'email', 'cleta.macejkovic@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:30', '2015-05-25 18:32:30', NULL),
(523, 0, 44, 'phone', '(840)816-1116', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:30', '2015-05-25 18:32:30', NULL),
(524, 0, 44, 'bbm', '995-555-9297x038', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:30', '2015-05-25 18:32:30', NULL),
(525, 0, 44, 'line', '06750698781', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(526, 0, 44, 'whatsapp', '(691)263-0886x07139', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(527, 0, 44, 'address', '0020 Jaydon Pine\nLake Jade, FL 42196-9004', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(528, 0, 44, 'email', 'hodkiewicz.elisa@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(529, 0, 45, 'phone', '1-199-318-8367', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(530, 0, 45, 'bbm', '864.551.0172x547', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(531, 0, 45, 'line', '(418)963-9843', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(532, 0, 45, 'whatsapp', '(152)467-9909', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(533, 0, 45, 'address', '413 Tomasa Ramp Suite 854\nLittlefurt, CA 18452', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(534, 0, 45, 'email', 'schmidt.daron@streich.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(535, 0, 45, 'phone', '(892)297-4230', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(536, 0, 45, 'bbm', '825-141-6946x625', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(537, 0, 45, 'line', '082.208.8430', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(538, 0, 45, 'whatsapp', '237.269.1486', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(539, 0, 45, 'address', '0146 Zulauf Lodge Apt. 231\nNorth Phyllis, ID 55113', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(540, 0, 45, 'email', 'joel.russel@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:31', '2015-05-25 18:32:31', NULL),
(541, 0, 46, 'phone', '126-269-5863', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:31', '2015-05-25 18:32:32', NULL),
(542, 0, 46, 'bbm', '581.836.3811x9484', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(543, 0, 46, 'line', '02645362825', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(544, 0, 46, 'whatsapp', '00792988809', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(545, 0, 46, 'address', '041 Dalton Shore Apt. 274\nSwaniawskimouth, GU 05155-9158', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(546, 0, 46, 'email', 'gzulauf@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(547, 0, 46, 'phone', '+78(7)4210164293', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(548, 0, 46, 'bbm', '070.465.4853', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(549, 0, 46, 'line', '618.051.6375x5205', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(550, 0, 46, 'whatsapp', '(534)636-7497', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(551, 0, 46, 'address', '5943 Wehner Falls Apt. 366\nNew Itzelmouth, CO 09122-8237', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(552, 0, 46, 'email', 'rgreenfelder@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(553, 0, 47, 'phone', '1-201-054-4351x439', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(554, 0, 47, 'bbm', '517-159-3893', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(555, 0, 47, 'line', '1-788-948-2858', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(556, 0, 47, 'whatsapp', '036-238-5417x8538', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:32', '2015-05-25 18:32:32', NULL),
(557, 0, 47, 'address', '2755 Corrine Throughway\nGuyburgh, OR 50434', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(558, 0, 47, 'email', 'maryse97@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(559, 0, 47, 'phone', '(846)434-0864x1183', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(560, 0, 47, 'bbm', '786-305-7732x5256', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(561, 0, 47, 'line', '792.767.8827', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(562, 0, 47, 'whatsapp', '(445)676-5861x69209', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(563, 0, 47, 'address', '030 Christiansen Road Suite 338\nLake Mario, HI 72656-0067', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(564, 0, 47, 'email', 'freeman.mccullough@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(565, 0, 48, 'phone', '1-542-973-2397x34956', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(566, 0, 48, 'bbm', '1-648-967-9179x75949', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(567, 0, 48, 'line', '03283681369', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(568, 0, 48, 'whatsapp', '311-841-9878x98305', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(569, 0, 48, 'address', '0893 Braeden Isle Suite 690\nWildermanton, GU 13440', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(570, 0, 48, 'email', 'boyle.rebeca@collier.net', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(571, 0, 48, 'phone', '+93(3)2679779698', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(572, 0, 48, 'bbm', '+81(9)7802953591', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:33', '2015-05-25 18:32:33', NULL),
(573, 0, 48, 'line', '086-590-5229x81125', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:33', '2015-05-25 18:32:34', NULL),
(574, 0, 48, 'whatsapp', '178.755.7831x51821', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(575, 0, 48, 'address', '215 Hilll Villages Apt. 955\nNew Jacintheport, SC 03140', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(576, 0, 48, 'email', 'joel74@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(577, 0, 49, 'phone', '069.293.5894x55043', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(578, 0, 49, 'bbm', '(119)426-6403', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(579, 0, 49, 'line', '629.304.9876', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(580, 0, 49, 'whatsapp', '1-823-182-0944', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(581, 0, 49, 'address', '053 Hills Ridges\nPort Lilliana, GA 27845-0430', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(582, 0, 49, 'email', 'schowalter.beth@hotmail.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(583, 0, 49, 'phone', '180-682-8730', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(584, 0, 49, 'bbm', '(686)672-5428', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(585, 0, 49, 'line', '1-667-736-4307x83381', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(586, 0, 49, 'whatsapp', '(223)261-8485x352', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(587, 0, 49, 'address', '5599 Maggio Inlet Suite 714\nSammieport, NJ 14741', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:34', '2015-05-25 18:32:34', NULL),
(588, 0, 49, 'email', 'hamill.kaleigh@yahoo.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:34', '2015-05-25 18:32:35', NULL),
(589, 0, 50, 'phone', '05113983041', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(590, 0, 50, 'bbm', '385.429.3054', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(591, 0, 50, 'line', '539-099-7437', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(592, 0, 50, 'whatsapp', '06765994228', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(593, 0, 50, 'address', '6848 Crona Haven\nHegmannmouth, KS 64792', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(594, 0, 50, 'email', 'schmidt.fiona@beatty.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(595, 0, 50, 'phone', '491.743.6651', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(596, 0, 50, 'bbm', '1-457-260-8074x1162', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(597, 0, 50, 'line', '991.612.4119', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(598, 0, 50, 'whatsapp', '785-338-7642x01444', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(599, 0, 50, 'address', '2360 Adolfo View\nPort Katelynn, AP 28446', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(600, 0, 50, 'email', 'johnnie.schultz@gmail.com', '', 'ThunderID\\Person\\Models\\Person', 0, '2015-05-25 18:32:35', '2015-05-25 18:32:35', NULL),
(601, 1, 0, 'phone', '1-178-407-5946', 'ThunderID\\Organisation\\Models\\Branch', '', 1, '2015-05-25 18:32:35', '2015-05-25 18:32:36', NULL),
(602, 1, 0, 'email', 'rcrist@wilderman.com', 'ThunderID\\Organisation\\Models\\Branch', '', 1, '2015-05-25 18:32:36', '2015-05-25 18:32:36', NULL),
(603, 1, 0, 'address', '17029 Roberto Mountain Suite 382\nSouth Beaufurt, TX 08407', 'ThunderID\\Organisation\\Models\\Branch', '', 1, '2015-05-25 18:32:36', '2015-05-25 18:32:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_documents`
--

CREATE TABLE IF NOT EXISTS `hr_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_required` tinyint(1) NOT NULL,
  `template` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_tag_is_required_deleted_at_index` (`tag`,`is_required`,`deleted_at`),
  KEY `documents_organisation_id_index` (`organisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_documents_details`
--

CREATE TABLE IF NOT EXISTS `hr_documents_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_document_id` int(10) unsigned NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `numeric` double NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_details_numeric_deleted_at_index` (`numeric`,`deleted_at`),
  KEY `documents_details_person_document_id_index` (`person_document_id`),
  KEY `documents_details_template_id_index` (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_error_logs`
--

CREATE TABLE IF NOT EXISTS `hr_error_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `on` datetime NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `error_logs_deleted_at_on_email_index` (`deleted_at`,`on`,`email`),
  KEY `error_logs_organisation_id_index` (`organisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_fingers`
--

CREATE TABLE IF NOT EXISTS `hr_fingers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `left_thumb` text COLLATE utf8_unicode_ci NOT NULL,
  `left_index_finger` text COLLATE utf8_unicode_ci NOT NULL,
  `left_middle_finger` text COLLATE utf8_unicode_ci NOT NULL,
  `left_ring_finger` text COLLATE utf8_unicode_ci NOT NULL,
  `left_little_finger` text COLLATE utf8_unicode_ci NOT NULL,
  `right_thumb` text COLLATE utf8_unicode_ci NOT NULL,
  `right_index_finger` text COLLATE utf8_unicode_ci NOT NULL,
  `right_middle_finger` text COLLATE utf8_unicode_ci NOT NULL,
  `right_ring_finger` text COLLATE utf8_unicode_ci NOT NULL,
  `right_little_finger` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fingers_deleted_at_index` (`deleted_at`),
  KEY `fingers_person_id_index` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_finger_prints`
--

CREATE TABLE IF NOT EXISTS `hr_finger_prints` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned NOT NULL,
  `left_thumb` tinyint(1) NOT NULL,
  `left_index_finger` tinyint(1) NOT NULL,
  `left_middle_finger` tinyint(1) NOT NULL,
  `left_ring_finger` tinyint(1) NOT NULL,
  `left_little_finger` tinyint(1) NOT NULL,
  `right_thumb` tinyint(1) NOT NULL,
  `right_index_finger` tinyint(1) NOT NULL,
  `right_middle_finger` tinyint(1) NOT NULL,
  `right_ring_finger` tinyint(1) NOT NULL,
  `right_little_finger` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `finger_prints_deleted_at_index` (`deleted_at`),
  KEY `finger_prints_branch_id_index` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hr_finger_prints`
--

INSERT INTO `hr_finger_prints` (`id`, `branch_id`, `left_thumb`, `left_index_finger`, `left_middle_finger`, `left_ring_finger`, `left_little_finger`, `right_thumb`, `right_index_finger`, `right_middle_finger`, `right_ring_finger`, `right_little_finger`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-05-25 18:31:42', '2015-05-25 18:31:42', NULL),
(2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-05-25 18:31:43', '2015-05-25 18:31:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_follows`
--

CREATE TABLE IF NOT EXISTS `hr_follows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calendar_id` int(10) unsigned NOT NULL,
  `chart_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `follows_deleted_at_index` (`deleted_at`),
  KEY `follows_calendar_id_index` (`calendar_id`),
  KEY `follows_chart_id_index` (`chart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_logs`
--

CREATE TABLE IF NOT EXISTS `hr_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `on` datetime NOT NULL,
  `pc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_deleted_at_on_name_index` (`deleted_at`,`on`,`name`),
  KEY `logs_person_id_index` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_menus`
--

CREATE TABLE IF NOT EXISTS `hr_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_application_id_index` (`application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hr_menus`
--

INSERT INTO `hr_menus` (`id`, `application_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Applications', '2015-05-25 18:31:31', '2015-05-25 18:31:31', NULL),
(2, 1, 'Organisations', '2015-05-25 18:31:32', '2015-05-25 18:31:32', NULL),
(3, 1, 'Dashboard', '2015-05-25 18:31:32', '2015-05-25 18:31:32', NULL),
(4, 1, 'Branches', '2015-05-25 18:31:32', '2015-05-25 18:31:32', NULL),
(5, 1, 'Documents', '2015-05-25 18:31:32', '2015-05-25 18:31:32', NULL),
(6, 1, 'Calendars', '2015-05-25 18:31:32', '2015-05-25 18:31:32', NULL),
(7, 1, 'Persons', '2015-05-25 18:31:32', '2015-05-25 18:31:32', NULL),
(8, 1, 'Reports', '2015-05-25 18:31:32', '2015-05-25 18:31:32', NULL),
(9, 2, 'Setting', '2015-05-25 18:31:32', '2015-05-25 18:31:32', NULL),
(10, 3, 'Setting', '2015-05-25 18:31:32', '2015-05-25 18:31:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_migrations`
--

CREATE TABLE IF NOT EXISTS `hr_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_migrations`
--

INSERT INTO `hr_migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_branches_table', 1),
('2014_10_12_000000_create_charts_table', 1),
('2014_10_12_000000_create_organisations_table', 1),
('2014_10_12_000000_create_persons_table', 2),
('2014_10_12_000000_create_relatives_table', 2),
('2014_10_12_000000_create_contacts_table', 3),
('2014_10_12_000000_create_works_table', 4),
('2014_10_12_000000_create_documents_details_table', 5),
('2014_10_12_000000_create_documents_table', 5),
('2014_10_12_000000_create_persons_documents_table', 5),
('2014_10_12_000000_create_templates_table', 5),
('2014_10_12_000000_create_apis_table', 6),
('2014_10_12_000000_create_applications_table', 6),
('2014_10_12_000000_create_authentications_table', 6),
('2014_10_12_000000_create_menus_table', 6),
('2014_10_12_000000_create_person_widgets_table', 7),
('2014_10_12_000000_create_calendars_table', 8),
('2014_10_12_000000_create_follows_table', 8),
('2014_10_12_000000_create_person_schedules_table', 8),
('2014_10_12_000000_create_schedules_table', 8),
('2014_10_12_000000_create_error_logs_table', 9),
('2014_10_12_000000_create_logs_table', 9),
('2014_10_12_000000_create_process_logs_table', 9),
('2014_10_12_000000_create_persons_workleaves_table', 10),
('2014_10_12_000000_create_workleaves_table', 10),
('2014_10_12_000000_create_finger_prints_table', 11),
('2014_10_12_000000_create_fingers_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `hr_organisations`
--

CREATE TABLE IF NOT EXISTS `hr_organisations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hr_organisations`
--

INSERT INTO `hr_organisations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ritchie and Sons', '2015-05-25 18:31:42', '2015-05-25 18:31:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_persons`
--

CREATE TABLE IF NOT EXISTS `hr_persons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prefix_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `persons_name_deleted_at_index` (`name`,`deleted_at`),
  KEY `persons_gender_index` (`gender`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `hr_persons`
--

INSERT INTO `hr_persons` (`id`, `name`, `prefix_title`, `suffix_title`, `place_of_birth`, `date_of_birth`, `gender`, `password`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Miss Cletus Hirthe III', 'Dr.', 'SH.', 'Goldnerfort', '2014-05-28', 'male', '$2y$10$MfW6qKX6Rtm5b/KSHOM4XuGru74mOCj5KjtGQ3err9FvJ8hE9EiRK', '', '2015-05-25 18:31:33', '2015-05-25 18:31:33', NULL),
(2, 'Isai Ryan', 'Ir.', 'BSi.', 'Wendyview', '2003-01-03', 'female', '$2y$10$iXwLBRW.WHw8UNe7qgFjPeivLfLIJzBdyoUdOz0k.aDmB5BLJKgne', '', '2015-05-25 18:31:33', '2015-05-25 18:31:33', NULL),
(3, 'Joana Roob', 'Dr.', 'SE.', 'Elfriedafurt', '2012-08-02', 'male', '$2y$10$AtGQRmB86EN72pCvxj8./edFN9SiBhPi3/REFoDrK1fL7H08qCe7q', '', '2015-05-25 18:31:33', '2015-05-25 18:31:33', NULL),
(4, 'Carmen Morar PhD', 'Prof.', 'PhD.', 'Nataliafurt', '1970-04-27', 'female', '$2y$10$0gO9MHYky89.8cRKYcIpaeOw0NoMOR1HfByuHuyFt95caXQiZbHR2', '', '2015-05-25 18:31:33', '2015-05-25 18:31:33', NULL),
(5, 'Giovanna Howe', 'Ir.', 'MSc.', 'Theodoraland', '2004-01-08', 'female', '$2y$10$MgRyYiJwSxTVylnIIpCU3ulI8wRldSRajD8xCSvaAkPTP4AI1e/m2', '', '2015-05-25 18:31:33', '2015-05-25 18:31:33', NULL),
(6, 'Ubaldo Jakubowski PhD', 'Ir.', 'MSi.', 'West Ari', '1992-02-02', 'female', '$2y$10$wQrZWxmPLEFZnYW5ytraTeY1dsfxQeYsy2iox14dfgVpj0oI15wku', '', '2015-05-25 18:31:33', '2015-05-25 18:31:33', NULL),
(7, 'Marguerite Douglas', 'Ir.', 'MSi.', 'Wolffport', '2010-03-19', 'male', '$2y$10$mqgg14pRruGP6RagJNvn8ORf5AF1ddNjzNAy8Ad1gLkmrq007TyLi', '', '2015-05-25 18:31:33', '2015-05-25 18:31:33', NULL),
(8, 'Dr. Rickey Schmitt III', 'Ir.', 'SH.', 'New Rosaliachester', '1982-09-26', 'female', '$2y$10$p6lbrYYz/Maf2PUZrWXzRe8rCJtY/kmZgif6NxyRzqJOpUj3OcqgW', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(9, 'Gail Beier', 'Ir.', 'BSi.', 'Boyerborough', '1972-06-17', 'female', '$2y$10$B2L2JDrPCglS7L8jePdBjOQQ6iNMvXhLBHDCk63i3X8cgRxvmxTTe', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(10, 'Ramiro Williamson', 'Ir.', 'PhD.', 'West Cheyenne', '1980-10-18', 'male', '$2y$10$dOMwHSz07D.kY707nvD5bOE1YNIPAEubpk.fINh28aPaMpeoBxHg6', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(11, 'Hudson D''Amore', 'Dr.', 'MT.', 'Jeramyland', '1989-08-15', 'male', '$2y$10$M0IQDu6Br21CfxWB1l5EFOSxxjSX4TnR7CSYZ7jOvCgSPz5uWKzrC', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(12, 'Ms. Bruce Shields V', 'Ir.', 'SKom.', 'Howeside', '1976-01-17', 'female', '$2y$10$/Pzn2dbk729YXjxNUE9knuLaZw04aG7tYW05MNPnGVRTKYYM.UrDm', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(13, 'Miss Jamison Carroll II', 'Ir.', 'BSc.', 'Port Darrell', '1975-10-31', 'female', '$2y$10$pR09mTjnUKSkbkx6QwU7C.52XZB3q6sDSG1enRIam4Z30ireIXuIO', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(14, 'Idell Murazik', 'Prof.', 'SE.', 'Nikkoton', '1998-11-13', 'female', '$2y$10$1Wbg2IcaWsFgVTFqsHFIou6FCg0mWR1ZLZzB33mFGEEk/0oQOQBNG', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(15, 'Ms. Leon Jast V', 'Dr.', 'SE.', 'Schuliststad', '1981-05-28', 'female', '$2y$10$mLlyP8Y2GUpmjom1S7Vlf.uYpfVuzjZBkTEuYigggkkj6cOWGVNhi', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(16, 'Miss Weston Donnelly Sr.', 'Prof.', 'BSc.', 'Beerport', '1981-01-15', 'male', '$2y$10$V/P9iCJN.88K4xvGL1EYsuwGiYgyLwzJ4lPoOpyXRA4DTcceVKNn2', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(17, 'Lura Pfannerstill', 'Prof.', 'BSc.', 'Naomietown', '2003-11-06', 'male', '$2y$10$RbjDGgLyOIrxJf1cNPoSReDs2A0pkf1SiElfyeZqaSeLt3vT5twzW', '', '2015-05-25 18:31:34', '2015-05-25 18:31:34', NULL),
(18, 'Joany Jones', 'Dr.', 'MT.', 'Port Martaborough', '2010-08-07', 'male', '$2y$10$..bUn7S4NLa41we/eVEAQ.xi71krv62XD8TpgbCNibwBIa2iar6r.', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(19, 'Boris Adams', 'Dr.', 'SKom.', 'Wisokychester', '1980-06-18', 'female', '$2y$10$zBZMi69Ox0ZVULZFz7/CqOS08uEaggskQoAGB.lWYwCyr0wqk5mse', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(20, 'Mrs. Dayne Kunde', 'Dr.', 'BSi.', 'North Marion', '2012-12-11', 'male', '$2y$10$xjZk470gU4xEBQf2rbyy9OQoYGU0eVGWpZtaPYYvPVgeiBAGjXape', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(21, 'Gunnar Sipes', 'Ir.', 'BA.', 'East Leoneberg', '1973-10-31', 'male', '$2y$10$lMMYiiKTEmXv4dQFO2nB9OC11fKpOCvoUrjmBUoMkhXgQXCiajBeW', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(22, 'Burnice Kautzer', 'Ir.', 'SKom.', 'Daphneberg', '1999-08-30', 'female', '$2y$10$xFjUnYpW8fWLm4nF8wpAAOhSRwwLSxyGWnoIbn0h48bme2qkrRsgy', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(23, 'Murl Hodkiewicz', 'Dr.', 'PhD.', 'New Hiltonchester', '2000-12-01', 'male', '$2y$10$8.Sa55nejIyhWCq7JU4mkO3i8d379Af8aFLaGmIYdc/hl6I1PLDcC', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(24, 'Miss Faye Feest', 'Dr.', 'PhD.', 'Moniquehaven', '1973-08-31', 'female', '$2y$10$9HXWlsgGNj99pa0Yh38qI.hDyKebzqyOAFy.xJ3YQMQPiFS6bLl/G', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(25, 'Mrs. Timmy Wunsch Sr.', 'Ir.', 'BSc.', 'Port Reginaldbury', '1999-08-18', 'male', '$2y$10$bYjAzi1argrt0T7BpcfO0uwGDHrqnpbqqf1v1qzqWsW65oEx5V51.', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(26, 'Sven Greenfelder', 'Ir.', 'PhD.', 'Miltonside', '1979-09-03', 'male', '$2y$10$ryejfgp.k6bRT3RwOcnvQOB576tfW2mkCUjeXtfyYPBOTjDv5T6fi', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(27, 'Furman Schmidt', 'Ir.', 'SH.', 'North Ona', '1970-10-24', 'female', '$2y$10$nqnMGjlFtj.2nkOW8GaT5uzXex6jSVkOf2vk4I2VDDy4qS.jAN9Da', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(28, 'Amos Franecki', 'Prof.', 'BSc.', 'North Graham', '1989-07-14', 'female', '$2y$10$xQ/TFgKx0aKgY4G.IGW8Z.yQg9LgW1hw2USCjl6yNS9BRrkOg3Jkq', '', '2015-05-25 18:31:35', '2015-05-25 18:31:35', NULL),
(29, 'Beau Rath', 'Dr.', 'PhD.', 'West Damian', '1976-02-21', 'female', '$2y$10$CyST42tBzlUTFb8ITokLuuv9kgL9/piH1nBqoy8X3yBcAy29msUjy', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(30, 'Hortense Zulauf Sr.', 'Ir.', 'BA.', 'North Camilla', '1983-08-12', 'male', '$2y$10$YLMci3f9jzwwhkKamgwjj.kTnxnhdkKvhGpaya6PyrcwU.HzNtJzq', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(31, 'Vicky Heathcote', 'Prof.', 'SKom.', 'Corkeryville', '1989-07-28', 'female', '$2y$10$c27pXApfR9KiuP1B50UBmeD6xU1GquUdie3RVyxLmpHY/ShPiRTvS', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(32, 'Katlyn Emard', 'Prof.', 'SH.', 'Port Niachester', '1970-05-15', 'female', '$2y$10$lDMjrOWF0GEcs5pz3Ctg1ePsNFn5OZ4B7KPECl8xUkRaC/GftD0PK', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(33, 'Mr. Margarette Lynch', 'Prof.', 'MSc.', 'Morrisberg', '1985-12-23', 'male', '$2y$10$S2QTaYlO6S2h76nOjsB2rOqjpjRbLqf2804QypLnN6AQtiliD5P4m', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(34, 'Shirley Fritsch', 'Dr.', 'SE.', 'Gayletown', '2010-01-23', 'female', '$2y$10$QDu36yqn9yyAKSF5Uv0avOMo2ndW6zJZpdcCezoSmyxQTnAoRfSRq', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(35, 'Gia Becker', 'Prof.', 'SE.', 'Merlfort', '1984-10-31', 'male', '$2y$10$cHqAo2TzV0v73tZ9JmXLfexcWAsa2Bwccen5aovJ0JR6EUdZcc85.', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(36, 'Tavares Fisher', 'Dr.', 'BSc.', 'East Benjamintown', '2011-09-07', 'female', '$2y$10$nc4nhABN8eXsfDrZHkZ91.XECzLEI.CkYswO62DIMrMsPfor.A70u', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(37, 'Vernon Ziemann', 'Ir.', 'MT.', 'North Chelsieberg', '1978-08-26', 'male', '$2y$10$wiO4C5D/HgpvWcSq1MBLbuDzJyy5H5P/d8kwa4SQ.IOhuxkK/ZPo6', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(38, 'Estefania Renner', 'Dr.', 'MSi.', 'Port Gwendolyn', '2009-12-19', 'female', '$2y$10$JzbxLvYRJCKNQUmCHyPiduSA8edE14GKKtFXi5hQxEKF0S0.U.qc2', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(39, 'Rey Jaskolski', 'Dr.', 'SH.', 'South Zella', '1981-08-17', 'male', '$2y$10$ZMF4aceFgJ76MdfS4vURj.ZzK3V4nHaAN4jEfE0OktO2rhM0pdiEC', '', '2015-05-25 18:31:36', '2015-05-25 18:31:36', NULL),
(40, 'Meredith Cummerata', 'Ir.', 'PhD.', 'Naderchester', '1973-07-04', 'male', '$2y$10$HpHL0XNP.jaYvs1UUpsIh.jcCdYN6VZ96OmxAHk5noCts43Gm.I0K', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(41, 'Sterling Ortiz', 'Ir.', 'PhD.', 'Port Maud', '2003-01-27', 'male', '$2y$10$2.AO0uM6ccvQHoqgJ.lP/OGrSgb9/XIxVVikSHUaBTI0VGFrgPTvC', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(42, 'Octavia Ferry', 'Ir.', 'SKom.', 'Flatleystad', '1980-12-01', 'female', '$2y$10$kx9BD5kho2tYdItEAM0LbuyP8vo4j.9WuY4iarF9EM9g5oiEMIXja', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(43, 'Raymundo Pouros III', 'Ir.', 'MT.', 'South Zoratown', '1995-01-26', 'female', '$2y$10$Oe/ylu4AuXCjrxTmNNPDWe/HUh9BJHA1amDBNe2/LsH2GITV/7GMC', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(44, 'Mrs. Jasper Ritchie', 'Prof.', 'BSi.', 'Katarinahaven', '2011-03-24', 'male', '$2y$10$Mpg75pHhi/3OYNzt6e1Kf.qHZskTTKlXKIqJeobFB6Q0NInvx4ZmC', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(45, 'Owen Wunsch', 'Ir.', 'PhD.', 'Casimerland', '2015-04-17', 'female', '$2y$10$Qwj76PFSwg2PbHX3rAM2huiiDyMfiF7qyb6cBqTwBkuHr6FS9ol9O', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(46, 'Abigale Marquardt', 'Prof.', 'BA.', 'Harberland', '1996-05-11', 'male', '$2y$10$Xl2Ow.lpf4zjXdlzg4DB8.aHN.6Qq2OMQEqs.r0OV7FjIC8Gg3YJC', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(47, 'Thad Becker', 'Ir.', 'SKom.', 'Danielaview', '2007-03-27', 'male', '$2y$10$ow.IG4Ti8fk0CqE9BkHXAe7YkqisFAd3oo/lCmQleKjedGW50fzzy', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(48, 'Ladarius Bergnaum', 'Prof.', 'BSi.', 'North Tressaland', '1995-05-09', 'female', '$2y$10$b.yxk2nqacHpfVyLNGCAyeV7b66uMrad3foU4jbqlv2aMzt5m/tC6', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(49, 'Ms. Miles Kuphal', 'Ir.', 'SH.', 'Cortneyborough', '1988-01-10', 'male', '$2y$10$r7qNFozHIL6gGYAha4zB4.TqUzp.zD8bcLFGCfZO5n.Z8olKEBazG', '', '2015-05-25 18:31:37', '2015-05-25 18:31:37', NULL),
(50, 'Zelda Hills', 'Prof.', 'SH.', 'South Jaclyn', '2008-07-09', 'female', '$2y$10$g4vVm.yEilmCZTLy21KX5OLMXsuCPKTZAyMONOpyO.RYS9Sff3Z4q', '', '2015-05-25 18:31:38', '2015-05-25 18:31:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_persons_documents`
--

CREATE TABLE IF NOT EXISTS `hr_persons_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document_id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `persons_documents_document_id_index` (`document_id`),
  KEY `persons_documents_person_id_index` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_persons_workleaves`
--

CREATE TABLE IF NOT EXISTS `hr_persons_workleaves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `workleave_id` int(10) unsigned NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `persons_workleaves_deleted_at_start_is_default_index` (`deleted_at`,`start`,`is_default`),
  KEY `persons_workleaves_person_id_index` (`person_id`),
  KEY `persons_workleaves_workleave_id_index` (`workleave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_person_schedules`
--

CREATE TABLE IF NOT EXISTS `hr_person_schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `on` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `is_affect_workleave` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `person_schedules_deleted_at_on_index` (`deleted_at`,`on`),
  KEY `person_schedules_person_id_index` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_person_widgets`
--

CREATE TABLE IF NOT EXISTS `hr_person_widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('panel','table','stat') COLLATE utf8_unicode_ci NOT NULL,
  `row` tinyint(4) NOT NULL,
  `col` tinyint(4) NOT NULL,
  `query` text COLLATE utf8_unicode_ci NOT NULL,
  `field` text COLLATE utf8_unicode_ci NOT NULL,
  `function` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `person_widgets_person_id_index` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_process_logs`
--

CREATE TABLE IF NOT EXISTS `hr_process_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `work_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `on` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `fp_start` time NOT NULL,
  `fp_end` time NOT NULL,
  `schedule_start` time NOT NULL,
  `schedule_end` time NOT NULL,
  `margin_start` double NOT NULL,
  `margin_end` double NOT NULL,
  `total_idle` double NOT NULL,
  `total_sleep` double NOT NULL,
  `total_active` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `process_logs_deleted_at_on_name_index` (`deleted_at`,`on`,`name`),
  KEY `process_logs_person_id_index` (`person_id`),
  KEY `process_logs_work_id_index` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_relatives`
--

CREATE TABLE IF NOT EXISTS `hr_relatives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `relative_id` int(10) unsigned NOT NULL,
  `relationship` enum('spouse','parent','child','partner') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relatives_organisation_id_index` (`organisation_id`),
  KEY `relatives_person_id_index` (`person_id`),
  KEY `relatives_relative_id_index` (`relative_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `hr_relatives`
--

INSERT INTO `hr_relatives` (`id`, `organisation_id`, `person_id`, `relative_id`, `relationship`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 1, 25, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 0, 2, 18, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 0, 3, 25, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 0, 4, 17, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 0, 5, 8, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 0, 6, 9, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 0, 7, 35, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 0, 8, 7, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 0, 9, 10, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 0, 10, 44, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 0, 11, 43, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(12, 0, 12, 18, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(13, 0, 13, 33, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(14, 0, 14, 47, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(15, 0, 15, 26, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(16, 0, 16, 29, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(17, 0, 17, 8, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(18, 0, 18, 28, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(19, 0, 19, 4, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(20, 0, 20, 41, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(21, 0, 21, 7, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(22, 0, 22, 40, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(23, 0, 23, 4, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(24, 0, 24, 25, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(25, 0, 25, 49, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(26, 0, 26, 15, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(27, 0, 27, 25, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(28, 0, 28, 3, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(29, 0, 29, 47, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(30, 0, 30, 49, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(31, 0, 31, 29, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(32, 0, 32, 22, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(33, 0, 33, 23, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(34, 0, 34, 19, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(35, 0, 35, 44, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(36, 0, 36, 38, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(37, 0, 37, 8, 'child', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(38, 0, 38, 42, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(39, 0, 39, 23, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(40, 0, 40, 23, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(41, 0, 41, 35, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(42, 0, 42, 14, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(43, 0, 43, 20, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(44, 0, 44, 16, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(45, 0, 45, 15, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(46, 0, 46, 38, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(47, 0, 47, 41, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(48, 0, 48, 30, 'parent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(49, 0, 49, 10, 'partner', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(50, 0, 50, 40, 'spouse', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_schedules`
--

CREATE TABLE IF NOT EXISTS `hr_schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calendar_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `on` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `is_affect_workleave` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedules_deleted_at_on_name_index` (`deleted_at`,`on`,`name`),
  KEY `schedules_calendar_id_index` (`calendar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_templates`
--

CREATE TABLE IF NOT EXISTS `hr_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `templates_document_id_index` (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_workleaves`
--

CREATE TABLE IF NOT EXISTS `hr_workleaves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workleaves_deleted_at_name_index` (`deleted_at`,`name`),
  KEY `workleaves_organisation_id_index` (`organisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_works`
--

CREATE TABLE IF NOT EXISTS `hr_works` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chart_id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `calendar_id` int(10) unsigned NOT NULL,
  `status` enum('contract','trial','internship','permanent','previous','admin') COLLATE utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organisation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason_end_job` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `works_start_end_deleted_at_index` (`start`,`end`,`deleted_at`),
  KEY `works_end_index` (`end`),
  KEY `works_chart_id_index` (`chart_id`),
  KEY `works_person_id_index` (`person_id`),
  KEY `works_calendar_id_index` (`calendar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
