-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2015 at 05:25 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hr_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_apis`
--

CREATE TABLE IF NOT EXISTS `hr_apis` (
  `id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_apis`
--

INSERT INTO `hr_apis` (`id`, `branch_id`, `client`, `secret`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '123456789', '123456789', '2015-05-30 23:06:46', '2015-05-30 23:06:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_applications`
--

CREATE TABLE IF NOT EXISTS `hr_applications` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_applications`
--

INSERT INTO `hr_applications` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'web', '2015-05-30 23:06:22', '2015-05-30 23:06:22', NULL),
(2, 'tracker', '2015-05-30 23:06:22', '2015-05-30 23:06:22', NULL),
(3, 'fingerprint', '2015-05-30 23:06:22', '2015-05-30 23:06:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_authentications`
--

CREATE TABLE IF NOT EXISTS `hr_authentications` (
  `id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `chart_id` int(10) unsigned NOT NULL,
  `create` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `update` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(10, 10, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_branches`
--

CREATE TABLE IF NOT EXISTS `hr_branches` (
  `id` int(10) unsigned NOT NULL,
  `organisation_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_branches`
--

INSERT INTO `hr_branches` (`id`, `organisation_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Pusat', '2015-05-30 23:06:24', '2015-05-30 23:06:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_calendars`
--

CREATE TABLE IF NOT EXISTS `hr_calendars` (
  `id` int(10) unsigned NOT NULL,
  `organisation_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `workdays` text COLLATE utf8_unicode_ci NOT NULL,
  `start` time NOT NULL,
  `end` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_charts`
--

CREATE TABLE IF NOT EXISTS `hr_charts` (
  `id` int(10) unsigned NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_charts`
--

INSERT INTO `hr_charts` (`id`, `branch_id`, `chart_id`, `name`, `path`, `grade`, `tag`, `min_employee`, `ideal_employee`, `max_employee`, `current_employee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'System Admin', '1', '', 'Admin', 1, 1, 1, 1, '2015-05-30 23:06:26', '2015-06-02 23:06:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_contacts`
--

CREATE TABLE IF NOT EXISTS `hr_contacts` (
  `id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `branch_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_contacts`
--

INSERT INTO `hr_contacts` (`id`, `branch_id`, `person_id`, `item`, `value`, `branch_type`, `person_type`, `is_default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 1, 'email', 'hr@thunderid.com', '', 'ThunderID\\Person\\Models\\Person', 1, '2015-05-30 23:06:56', '2015-05-30 23:06:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_documents`
--

CREATE TABLE IF NOT EXISTS `hr_documents` (
  `id` int(10) unsigned NOT NULL,
  `organisation_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_required` tinyint(1) NOT NULL,
  `template` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_documents`
--

INSERT INTO `hr_documents` (`id`, `organisation_id`, `name`, `tag`, `is_required`, `template`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'surat peringatan', 'SP', 0, '', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(2, 1, 'kontrak kerja', 'Kontrak', 0, '', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(3, 1, 'penilaian kinerja', 'Appraisal', 0, '', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(4, 1, 'pendidikan formal', 'Pendidikan', 0, '', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(5, 1, 'pendidikan non formal', 'Pendidikan', 0, '', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(6, 1, 'ktp', 'Identitas', 1, '', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(7, 1, 'bpjs', 'Pajak', 1, '', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(8, 1, 'npwp', 'Pajak', 0, '', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(9, 1, 'bank', 'Akun', 0, '', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(10, 1, 'reksa dana', 'Akun', 0, '', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_documents_details`
--

CREATE TABLE IF NOT EXISTS `hr_documents_details` (
  `id` int(10) unsigned NOT NULL,
  `person_document_id` int(10) unsigned NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `numeric` double NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_error_logs`
--

CREATE TABLE IF NOT EXISTS `hr_error_logs` (
  `id` int(10) unsigned NOT NULL,
  `organisation_id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `on` datetime NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_fingers`
--

CREATE TABLE IF NOT EXISTS `hr_fingers` (
  `id` int(10) unsigned NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_fingers`
--

INSERT INTO `hr_fingers` (`id`, `person_id`, `left_thumb`, `left_index_finger`, `left_middle_finger`, `left_ring_finger`, `left_little_finger`, `right_thumb`, `right_index_finger`, `right_middle_finger`, `right_ring_finger`, `right_little_finger`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '', '', '', '', '', '', '', '', '', '', '2015-05-30 23:08:40', '2015-05-30 23:08:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_finger_prints`
--

CREATE TABLE IF NOT EXISTS `hr_finger_prints` (
  `id` int(10) unsigned NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_finger_prints`
--

INSERT INTO `hr_finger_prints` (`id`, `branch_id`, `left_thumb`, `left_index_finger`, `left_middle_finger`, `left_ring_finger`, `left_little_finger`, `right_thumb`, `right_index_finger`, `right_middle_finger`, `right_ring_finger`, `right_little_finger`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_follows`
--

CREATE TABLE IF NOT EXISTS `hr_follows` (
  `id` int(10) unsigned NOT NULL,
  `calendar_id` int(10) unsigned NOT NULL,
  `chart_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_follows`
--

INSERT INTO `hr_follows` (`id`, `calendar_id`, `chart_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_logs`
--

CREATE TABLE IF NOT EXISTS `hr_logs` (
  `id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `on` datetime NOT NULL,
  `pc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_menus`
--

CREATE TABLE IF NOT EXISTS `hr_menus` (
  `id` int(10) unsigned NOT NULL,
  `application_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_menus`
--

INSERT INTO `hr_menus` (`id`, `application_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Applications', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL),
(2, 1, 'Organisations', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL),
(3, 1, 'Dashboard', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL),
(4, 1, 'Branches', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL),
(5, 1, 'Documents', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL),
(6, 1, 'Calendars', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL),
(7, 1, 'Persons', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL),
(8, 1, 'Reports', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL),
(9, 2, 'Setting', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL),
(10, 3, 'Setting', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL);

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
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_organisations`
--

INSERT INTO `hr_organisations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Thunder', '2015-05-30 23:06:23', '2015-05-30 23:06:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_persons`
--

CREATE TABLE IF NOT EXISTS `hr_persons` (
  `id` int(10) unsigned NOT NULL,
  `organisation_id` int(10) unsigned NOT NULL,
  `uniqid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_persons`
--

INSERT INTO `hr_persons` (`id`, `organisation_id`, `uniqid`, `name`, `prefix_title`, `suffix_title`, `place_of_birth`, `date_of_birth`, `gender`, `password`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1', 'Mr. Elolel', '', '', 'ThunderLAB', '2015-02-15', 'male', '$2y$10$vGMJyrhgVke8DeFmLp8LcOCeqTNIWZu6urOVyqpBtxTO6CifeZZeS', 'http://www.myfreephotoshop.com/wp-content/uploads/2015/04/446.jpg', '2015-05-30 23:06:47', '2015-05-31 01:29:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_persons_documents`
--

CREATE TABLE IF NOT EXISTS `hr_persons_documents` (
  `id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_persons_workleaves`
--

CREATE TABLE IF NOT EXISTS `hr_persons_workleaves` (
  `id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `workleave_id` int(10) unsigned NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_person_schedules`
--

CREATE TABLE IF NOT EXISTS `hr_person_schedules` (
  `id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('presence_indoor','presence_outdoor','absence_workleave','absence_not_workleave') COLLATE utf8_unicode_ci NOT NULL,
  `on` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_person_widgets`
--

CREATE TABLE IF NOT EXISTS `hr_person_widgets` (
  `id` int(10) unsigned NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_person_widgets`
--

INSERT INTO `hr_person_widgets` (`id`, `person_id`, `title`, `type`, `row`, `col`, `query`, `field`, `function`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'total surat peringatan', 'stat', 1, 1, '{"tag":"SP","organisationID":1}', '', 'total_documents', '2015-05-30 23:19:11', '2015-05-30 23:19:11', NULL),
(2, 1, 'total kontrak kerja', 'stat', 1, 2, '{"tag":"Kontrak","organisationID":1}', '', 'total_documents', '2015-05-30 23:19:11', '2015-05-30 23:19:11', NULL),
(3, 1, 'total cabang', 'stat', 1, 3, '{"organisationID":1}', '', 'total_branches', '2015-05-30 23:19:11', '2015-05-30 23:19:11', NULL),
(4, 1, 'total pegawai', 'stat', 1, 4, '{"checkwork":"active"}', '', 'total_employees', '2015-05-30 23:19:11', '2015-05-30 23:19:11', NULL),
(5, 1, 'pegawai baru 3 hari terakhir', 'panel', 2, 1, '{"checkwork":"- 3 days"}', '', 'index_employees', '2015-05-30 23:19:11', '2015-05-30 23:19:11', NULL),
(6, 1, 'pegawai berhenti 3 hari terakhir', 'panel', 2, 2, '{"checkResign":"- 3 days"}', '', 'index_employees', '2015-05-30 23:19:11', '2015-05-30 23:19:11', NULL),
(7, 1, 'surat peringatan 3 hari terakhir', 'table', 3, 1, '{"tag":"SP","organisationID":1,"checkreceiver":"- 3 days"}', '["name","created_at"]', 'index_documents', '2015-05-30 23:19:12', '2015-05-30 23:19:12', NULL),
(8, 1, 'cabang dengan pegawai berhenti terbanyak', 'table', 3, 2, '{"organisationID":1,"countResign":"inactive"}', '["name","count"]', 'index_branches', '2015-05-30 23:19:12', '2015-05-30 23:19:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_process_logs`
--

CREATE TABLE IF NOT EXISTS `hr_process_logs` (
  `id` int(10) unsigned NOT NULL,
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
  `tooltip` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_relatives`
--

CREATE TABLE IF NOT EXISTS `hr_relatives` (
  `id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `relative_id` int(10) unsigned NOT NULL,
  `relationship` enum('spouse','parent','child','partner') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_schedules`
--

CREATE TABLE IF NOT EXISTS `hr_schedules` (
  `id` int(10) unsigned NOT NULL,
  `calendar_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('presence_indoor','presence_outdoor','absence_workleave','absence_not_workleave') COLLATE utf8_unicode_ci NOT NULL,
  `on` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_templates`
--

CREATE TABLE IF NOT EXISTS `hr_templates` (
  `id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_templates`
--

INSERT INTO `hr_templates` (`id`, `document_id`, `field`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'nama', 'string', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(2, 1, 'tanggal', 'string', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(3, 1, 'content', 'string', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(4, 2, 'nama', 'string', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(5, 2, 'tanggal', 'string', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(6, 2, 'content', 'string', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(7, 3, 'nama', 'string', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(8, 3, 'tanggal', 'string', '2015-05-30 23:17:34', '2015-05-30 23:17:34', NULL),
(9, 3, 'content', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(10, 4, 'nama pendidikan', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(11, 4, 'institusi', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(12, 4, 'bidang studi', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(13, 4, 'tanggal masuk', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(14, 4, 'tanggal lulus', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(15, 4, 'grade', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(16, 5, 'nama seminar/training', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(17, 5, 'penyelenggara', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(18, 5, 'bidang', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(19, 5, 'tanggal mulai', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(20, 5, 'tanggal selesai', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(21, 6, 'ktp', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(22, 7, 'bpjs', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(23, 8, 'npwp', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(24, 9, 'nama bank', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(25, 9, 'cabang', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(26, 9, 'produk akun', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(27, 9, 'nomor akun', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(28, 10, 'nama reksa dana', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(29, 10, 'produk reksa dana', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL),
(30, 10, 'nomor reksa dana', 'string', '2015-05-30 23:17:35', '2015-05-30 23:17:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_workleaves`
--

CREATE TABLE IF NOT EXISTS `hr_workleaves` (
  `id` int(10) unsigned NOT NULL,
  `organisation_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_works`
--

CREATE TABLE IF NOT EXISTS `hr_works` (
  `id` int(10) unsigned NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hr_works`
--

INSERT INTO `hr_works` (`id`, `chart_id`, `person_id`, `calendar_id`, `status`, `start`, `end`, `position`, `organisation`, `reason_end_job`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 0, 'admin', '2015-05-15', '0000-00-00', '', '', '', '2015-05-30 23:16:38', '2015-05-30 23:16:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr_apis`
--
ALTER TABLE `hr_apis`
  ADD PRIMARY KEY (`id`), ADD KEY `apis_branch_id_index` (`branch_id`);

--
-- Indexes for table `hr_applications`
--
ALTER TABLE `hr_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_authentications`
--
ALTER TABLE `hr_authentications`
  ADD PRIMARY KEY (`id`), ADD KEY `authentications_menu_id_index` (`menu_id`), ADD KEY `authentications_chart_id_index` (`chart_id`);

--
-- Indexes for table `hr_branches`
--
ALTER TABLE `hr_branches`
  ADD PRIMARY KEY (`id`), ADD KEY `branches_deleted_at_organisation_id_index` (`deleted_at`,`organisation_id`), ADD KEY `branches_organisation_id_index` (`organisation_id`);

--
-- Indexes for table `hr_calendars`
--
ALTER TABLE `hr_calendars`
  ADD PRIMARY KEY (`id`), ADD KEY `calendars_deleted_at_index` (`deleted_at`), ADD KEY `calendars_organisation_id_index` (`organisation_id`);

--
-- Indexes for table `hr_charts`
--
ALTER TABLE `hr_charts`
  ADD PRIMARY KEY (`id`), ADD KEY `charts_deleted_at_branch_id_path_index` (`deleted_at`,`branch_id`,`path`), ADD KEY `charts_deleted_at_branch_id_tag_index` (`deleted_at`,`branch_id`,`tag`), ADD KEY `charts_branch_id_index` (`branch_id`), ADD KEY `charts_chart_id_index` (`chart_id`);

--
-- Indexes for table `hr_contacts`
--
ALTER TABLE `hr_contacts`
  ADD PRIMARY KEY (`id`), ADD KEY `contacts_deleted_at_is_default_branch_id_item_index` (`deleted_at`,`is_default`,`branch_id`,`item`), ADD KEY `contacts_deleted_at_is_default_person_id_item_index` (`deleted_at`,`is_default`,`person_id`,`item`), ADD KEY `contacts_branch_id_index` (`branch_id`), ADD KEY `contacts_person_id_index` (`person_id`);

--
-- Indexes for table `hr_documents`
--
ALTER TABLE `hr_documents`
  ADD PRIMARY KEY (`id`), ADD KEY `documents_organisation_id_tag_is_required_deleted_at_index` (`organisation_id`,`tag`,`is_required`,`deleted_at`), ADD KEY `documents_organisation_id_index` (`organisation_id`);

--
-- Indexes for table `hr_documents_details`
--
ALTER TABLE `hr_documents_details`
  ADD PRIMARY KEY (`id`), ADD KEY `documents_details_deleted_at_person_document_id_numeric_index` (`deleted_at`,`person_document_id`,`numeric`), ADD KEY `documents_details_person_document_id_index` (`person_document_id`), ADD KEY `documents_details_template_id_index` (`template_id`);

--
-- Indexes for table `hr_error_logs`
--
ALTER TABLE `hr_error_logs`
  ADD PRIMARY KEY (`id`), ADD KEY `error_logs_deleted_at_organisation_id_on_index` (`deleted_at`,`organisation_id`,`on`), ADD KEY `error_logs_organisation_id_index` (`organisation_id`);

--
-- Indexes for table `hr_fingers`
--
ALTER TABLE `hr_fingers`
  ADD PRIMARY KEY (`id`), ADD KEY `fingers_deleted_at_person_id_index` (`deleted_at`,`person_id`), ADD KEY `fingers_person_id_index` (`person_id`);

--
-- Indexes for table `hr_finger_prints`
--
ALTER TABLE `hr_finger_prints`
  ADD PRIMARY KEY (`id`), ADD KEY `finger_prints_deleted_at_branch_id_index` (`deleted_at`,`branch_id`), ADD KEY `finger_prints_branch_id_index` (`branch_id`);

--
-- Indexes for table `hr_follows`
--
ALTER TABLE `hr_follows`
  ADD PRIMARY KEY (`id`), ADD KEY `follows_deleted_at_index` (`deleted_at`), ADD KEY `follows_calendar_id_index` (`calendar_id`), ADD KEY `follows_chart_id_index` (`chart_id`);

--
-- Indexes for table `hr_logs`
--
ALTER TABLE `hr_logs`
  ADD PRIMARY KEY (`id`), ADD KEY `logs_deleted_at_person_id_on_index` (`deleted_at`,`person_id`,`on`), ADD KEY `logs_person_id_index` (`person_id`);

--
-- Indexes for table `hr_menus`
--
ALTER TABLE `hr_menus`
  ADD PRIMARY KEY (`id`), ADD KEY `menus_application_id_index` (`application_id`);

--
-- Indexes for table `hr_organisations`
--
ALTER TABLE `hr_organisations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_persons`
--
ALTER TABLE `hr_persons`
  ADD PRIMARY KEY (`id`), ADD KEY `persons_deleted_at_organisation_id_name_index` (`deleted_at`,`organisation_id`,`name`), ADD KEY `persons_deleted_at_organisation_id_uniqid_index` (`deleted_at`,`organisation_id`,`uniqid`), ADD KEY `persons_organisation_id_index` (`organisation_id`);

--
-- Indexes for table `hr_persons_documents`
--
ALTER TABLE `hr_persons_documents`
  ADD PRIMARY KEY (`id`), ADD KEY `persons_documents_document_id_index` (`document_id`), ADD KEY `persons_documents_person_id_index` (`person_id`);

--
-- Indexes for table `hr_persons_workleaves`
--
ALTER TABLE `hr_persons_workleaves`
  ADD PRIMARY KEY (`id`), ADD KEY `persons_workleaves_deleted_at_person_id_start_is_default_index` (`deleted_at`,`person_id`,`start`,`is_default`), ADD KEY `persons_workleaves_person_id_index` (`person_id`), ADD KEY `persons_workleaves_workleave_id_index` (`workleave_id`);

--
-- Indexes for table `hr_person_schedules`
--
ALTER TABLE `hr_person_schedules`
  ADD PRIMARY KEY (`id`), ADD KEY `person_schedules_deleted_at_person_id_on_status_index` (`deleted_at`,`person_id`,`on`,`status`), ADD KEY `person_schedules_person_id_index` (`person_id`);

--
-- Indexes for table `hr_person_widgets`
--
ALTER TABLE `hr_person_widgets`
  ADD PRIMARY KEY (`id`), ADD KEY `person_widgets_person_id_index` (`person_id`);

--
-- Indexes for table `hr_process_logs`
--
ALTER TABLE `hr_process_logs`
  ADD PRIMARY KEY (`id`), ADD KEY `process_logs_deleted_at_person_id_on_index` (`deleted_at`,`person_id`,`on`), ADD KEY `process_logs_person_id_index` (`person_id`), ADD KEY `process_logs_work_id_index` (`work_id`);

--
-- Indexes for table `hr_relatives`
--
ALTER TABLE `hr_relatives`
  ADD PRIMARY KEY (`id`), ADD KEY `relatives_person_id_index` (`person_id`), ADD KEY `relatives_relative_id_index` (`relative_id`);

--
-- Indexes for table `hr_schedules`
--
ALTER TABLE `hr_schedules`
  ADD PRIMARY KEY (`id`), ADD KEY `schedules_deleted_at_calendar_id_on_status_index` (`deleted_at`,`calendar_id`,`on`,`status`), ADD KEY `schedules_calendar_id_index` (`calendar_id`);

--
-- Indexes for table `hr_templates`
--
ALTER TABLE `hr_templates`
  ADD PRIMARY KEY (`id`), ADD KEY `templates_document_id_index` (`document_id`);

--
-- Indexes for table `hr_workleaves`
--
ALTER TABLE `hr_workleaves`
  ADD PRIMARY KEY (`id`), ADD KEY `workleaves_deleted_at_organisation_id_index` (`deleted_at`,`organisation_id`), ADD KEY `workleaves_organisation_id_index` (`organisation_id`);

--
-- Indexes for table `hr_works`
--
ALTER TABLE `hr_works`
  ADD PRIMARY KEY (`id`), ADD KEY `works_deleted_at_start_end_index` (`deleted_at`,`start`,`end`), ADD KEY `works_end_index` (`end`), ADD KEY `works_chart_id_index` (`chart_id`), ADD KEY `works_person_id_index` (`person_id`), ADD KEY `works_calendar_id_index` (`calendar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr_apis`
--
ALTER TABLE `hr_apis`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_applications`
--
ALTER TABLE `hr_applications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hr_authentications`
--
ALTER TABLE `hr_authentications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hr_branches`
--
ALTER TABLE `hr_branches`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_calendars`
--
ALTER TABLE `hr_calendars`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_charts`
--
ALTER TABLE `hr_charts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_contacts`
--
ALTER TABLE `hr_contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_documents`
--
ALTER TABLE `hr_documents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hr_documents_details`
--
ALTER TABLE `hr_documents_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_error_logs`
--
ALTER TABLE `hr_error_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_fingers`
--
ALTER TABLE `hr_fingers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_finger_prints`
--
ALTER TABLE `hr_finger_prints`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_follows`
--
ALTER TABLE `hr_follows`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_logs`
--
ALTER TABLE `hr_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_menus`
--
ALTER TABLE `hr_menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hr_organisations`
--
ALTER TABLE `hr_organisations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_persons`
--
ALTER TABLE `hr_persons`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_persons_documents`
--
ALTER TABLE `hr_persons_documents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_persons_workleaves`
--
ALTER TABLE `hr_persons_workleaves`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_person_schedules`
--
ALTER TABLE `hr_person_schedules`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_person_widgets`
--
ALTER TABLE `hr_person_widgets`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `hr_process_logs`
--
ALTER TABLE `hr_process_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_relatives`
--
ALTER TABLE `hr_relatives`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_schedules`
--
ALTER TABLE `hr_schedules`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_templates`
--
ALTER TABLE `hr_templates`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `hr_workleaves`
--
ALTER TABLE `hr_workleaves`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_works`
--
ALTER TABLE `hr_works`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
