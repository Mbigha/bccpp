-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2019 at 05:35 PM
-- Server version: 5.6.44-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smevico_bccp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimanual_examinations`
--

CREATE TABLE `bimanual_examinations` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimanual_examinations`
--

INSERT INTO `bimanual_examinations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Normal', NULL, NULL),
(2, 'Pelvic Inflammatory Disease(Cervical Motion & Adnexal Tenderness)', NULL, NULL),
(3, 'Other Abdominal Tenderness.', NULL, NULL),
(4, 'Suspected Pregnancy', NULL, NULL),
(5, 'Suspected Uterine Fibroids', NULL, NULL),
(6, 'Absent Uterus', NULL, NULL),
(7, 'Pelvic Mass.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bimanual_examination_patient`
--

CREATE TABLE `bimanual_examination_patient` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `upadated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimanual_examination_patient`
--

INSERT INTO `bimanual_examination_patient` (`id`, `patient_id`, `exam_id`, `created_at`, `upadated_at`) VALUES
(38, 1, 2, NULL, NULL),
(39, 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bimanual_examination_patients`
--

CREATE TABLE `bimanual_examination_patients` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `upadated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimanual_examination_patients`
--

INSERT INTO `bimanual_examination_patients` (`id`, `patient_id`, `exam_id`, `created_at`, `upadated_at`) VALUES
(38, 1, 2, NULL, NULL),
(39, 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `breast_examinations`
--

CREATE TABLE `breast_examinations` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breast_examinations`
--

INSERT INTO `breast_examinations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Breast exam not done', NULL, NULL),
(2, 'Normal', NULL, NULL),
(3, 'Nipple retraction', NULL, NULL),
(4, 'Discoloration', NULL, NULL),
(5, 'Mastitis', NULL, NULL),
(6, 'Dimple', NULL, NULL),
(7, 'Masses', NULL, NULL),
(8, 'Axillary lymphadenopathy', NULL, NULL),
(9, 'Nipple discharge', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `breast_examination_patient`
--

CREATE TABLE `breast_examination_patient` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `upadated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breast_examination_patient`
--

INSERT INTO `breast_examination_patient` (`id`, `patient_id`, `exam_id`, `created_at`, `upadated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cervix_examinations`
--

CREATE TABLE `cervix_examinations` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cervix_examinations`
--

INSERT INTO `cervix_examinations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Normal (includes ectropion, Nabothian cysts)', NULL, NULL),
(2, 'Absent due to surgery', NULL, NULL),
(3, 'Atrophic (post- menopausal)', NULL, NULL),
(4, 'Poly', NULL, NULL),
(5, 'Cervicitis (discharge, inflamed, bleeds easily)', NULL, NULL),
(6, 'Leukoplakia', NULL, NULL),
(7, 'Suspected Cancer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cervix_examination_patient`
--

CREATE TABLE `cervix_examination_patient` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `upadated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cervix_examination_patient`
--

INSERT INTO `cervix_examination_patient` (`id`, `patient_id`, `exam_id`, `created_at`, `upadated_at`) VALUES
(5, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_page_four`
--

CREATE TABLE `enrollment_page_four` (
  `id` int(11) NOT NULL,
  `other_biman_examination` varchar(100) DEFAULT NULL,
  `bimanual_exam_not_done` varchar(50) DEFAULT NULL,
  `treated` varchar(20) DEFAULT NULL,
  `infection` varchar(100) DEFAULT NULL,
  `prescription` text,
  `via` varchar(100) DEFAULT NULL,
  `vili` varchar(100) DEFAULT NULL,
  `diagnosis` text,
  `plan` varchar(100) DEFAULT NULL,
  `remark` text,
  `provider_name` varchar(50) DEFAULT NULL,
  `patient_id` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_page_four`
--

INSERT INTO `enrollment_page_four` (`id`, `other_biman_examination`, `bimanual_exam_not_done`, `treated`, `infection`, `prescription`, `via`, `vili`, `diagnosis`, `plan`, `remark`, `provider_name`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'test', NULL, 'Already on treatment', NULL, NULL, 'test', 'Suspicious', '<p>dfsdf dfsfsd</p>', 'LESS THAN 6 months', '<p>dfsfsd sdfsf</p>', 'sdfsdfs', 1, '2018-09-11 14:18:16', '2018-09-11 14:28:38'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2019-06-11 06:46:04', '2019-06-11 06:46:04'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, '2019-06-15 01:33:43', '2019-06-15 01:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_page_one`
--

CREATE TABLE `enrollment_page_one` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `temperature` varchar(10) DEFAULT NULL,
  `bp` varchar(10) DEFAULT NULL,
  `bw` varchar(10) DEFAULT NULL,
  `bccpp_id` varchar(30) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `tribe` varchar(100) DEFAULT NULL,
  `screening_date` varchar(20) DEFAULT NULL,
  `screening_site` varchar(20) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `dummy` int(1) NOT NULL DEFAULT '1',
  `years_of_school` varchar(10) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_page_one`
--

INSERT INTO `enrollment_page_one` (`id`, `firstname`, `middlename`, `lastname`, `temperature`, `bp`, `bw`, `bccpp_id`, `phone`, `address`, `tribe`, `screening_date`, `screening_site`, `age`, `dob`, `religion`, `dummy`, `years_of_school`, `occupation`, `created_at`, `updated_at`) VALUES
(1, 'dsfd', 'sfsdfs', NULL, 'sdfd', 'fsd', NULL, '123', 'sdfsdf', 'fsdfsd', 'sdfsd', '2018-09-06', 'sdfdsf', '20', '2018-09-12', 'Baptist', 1, 'sfsddfs', 'Housewife', '2018-09-10 02:38:56', '2018-09-10 09:33:52'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, '124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baptist', 1, NULL, NULL, '2018-09-10 15:36:49', '2018-09-10 15:36:49'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, '125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2018-09-10 19:50:09', '2018-09-10 19:50:09'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2018-09-11 11:44:18', '2018-09-11 11:44:18'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, '127', NULL, NULL, NULL, '2018-09-12', NULL, NULL, NULL, NULL, 1, NULL, 'Health Care Worker', '2018-09-11 14:40:09', '2018-09-11 14:40:09'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2019-06-11 06:43:53', '2019-06-11 06:43:53'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2019-06-15 00:35:22', '2019-06-15 00:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_page_three`
--

CREATE TABLE `enrollment_page_three` (
  `id` int(11) NOT NULL,
  `breast_cancer` varchar(20) DEFAULT NULL,
  `cervical_cancer` varchar(20) DEFAULT NULL,
  `smoking` varchar(5) DEFAULT NULL,
  `qty_smoking` varchar(20) DEFAULT NULL,
  `surgical_history` varchar(20) DEFAULT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `peer_educator` varchar(100) DEFAULT NULL,
  `other_examination` varchar(50) DEFAULT NULL,
  `other_perineum` varchar(50) DEFAULT NULL,
  `perineum_not_done` varchar(50) DEFAULT NULL,
  `other_vag_examination` varchar(50) DEFAULT NULL,
  `vagina_exam_not_done` varchar(50) DEFAULT NULL,
  `other_cerv_examination` varchar(50) DEFAULT NULL,
  `cervix_exam_not_done` varchar(50) DEFAULT NULL,
  `patient_id` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_page_three`
--

INSERT INTO `enrollment_page_three` (`id`, `breast_cancer`, `cervical_cancer`, `smoking`, `qty_smoking`, `surgical_history`, `client_name`, `peer_educator`, `other_examination`, `other_perineum`, `perineum_not_done`, `other_vag_examination`, `vagina_exam_not_done`, `other_cerv_examination`, `cervix_exam_not_done`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, 'Good', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-09-10 22:18:17', '2018-09-10 22:18:17'),
(2, NULL, NULL, 'No', NULL, NULL, NULL, NULL, 'Big Breast', NULL, NULL, NULL, NULL, NULL, NULL, 4, '2018-09-11 11:46:14', '2018-09-11 12:59:20'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2019-06-11 06:45:23', '2019-06-11 06:45:23'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, '2019-06-15 01:33:38', '2019-06-15 01:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_page_two`
--

CREATE TABLE `enrollment_page_two` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `more_than_one` varchar(5) DEFAULT NULL,
  `additional_wives` varchar(4) DEFAULT NULL,
  `regular_menst` varchar(4) DEFAULT NULL,
  `lmp` varchar(10) DEFAULT NULL,
  `period` varchar(20) DEFAULT NULL,
  `cycle` varchar(60) DEFAULT NULL,
  `period_stop_reason` varchar(150) DEFAULT NULL,
  `times_pregnant` varchar(50) DEFAULT NULL,
  `babies` varchar(50) DEFAULT NULL,
  `abortion` varchar(20) DEFAULT NULL,
  `living_children` varchar(20) DEFAULT NULL,
  `first_intercourse` varchar(50) DEFAULT NULL,
  `sexual_partners` varchar(20) DEFAULT NULL,
  `forced_sex` varchar(4) DEFAULT NULL,
  `patient_id` int(100) DEFAULT NULL,
  `sex_exchange` varchar(4) DEFAULT NULL,
  `unmarried_sex_partner` varchar(10) DEFAULT NULL,
  `family_planning` varchar(4) DEFAULT NULL,
  `other_method` varchar(100) DEFAULT NULL,
  `husband_aware` varchar(4) DEFAULT NULL,
  `hiv_tested` varchar(4) DEFAULT NULL,
  `hiv_test_date` varchar(10) DEFAULT NULL,
  `hiv_result` varchar(20) DEFAULT NULL,
  `cd_four_count` varchar(50) DEFAULT NULL,
  `on_medication` varchar(4) DEFAULT NULL,
  `medication` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_page_two`
--

INSERT INTO `enrollment_page_two` (`id`, `firstname`, `marital_status`, `more_than_one`, `additional_wives`, `regular_menst`, `lmp`, `period`, `cycle`, `period_stop_reason`, `times_pregnant`, `babies`, `abortion`, `living_children`, `first_intercourse`, `sexual_partners`, `forced_sex`, `patient_id`, `sex_exchange`, `unmarried_sex_partner`, `family_planning`, `other_method`, `husband_aware`, `hiv_tested`, `hiv_test_date`, `hiv_result`, `cd_four_count`, `on_medication`, `medication`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Married', 'No', NULL, 'No', NULL, NULL, NULL, NULL, 'dfsdf', 'dfdfd', NULL, NULL, NULL, NULL, 'Yes', 1, NULL, 'Unknown', 'Yes', 'Coitus Interuptus', 'Yes', 'Yes', NULL, 'Positive', NULL, 'Yes', NULL, '2018-09-10 06:20:18', '2018-09-30 10:51:49'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Yes', 'Coitus Interuptus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-10 15:39:38', '2018-09-10 15:39:38'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-10 19:51:22', '2018-09-10 19:51:22'),
(4, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 'Yes', NULL, NULL, 'No', NULL, 'Negative', NULL, 'No', NULL, '2018-09-11 11:45:42', '2018-09-11 12:36:56'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-11 15:43:04', '2018-09-11 15:43:04'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 06:44:24', '2019-06-11 06:44:24'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-15 00:35:29', '2019-06-15 00:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `family_planning_methods`
--

CREATE TABLE `family_planning_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family_planning_methods`
--

INSERT INTO `family_planning_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Abstinence', NULL, NULL),
(2, 'Withdrawal( puling  penis out  before  it  releases fluid)', NULL, NULL),
(3, 'Male condoms', NULL, NULL),
(4, 'Depo-provera (hormone shot every 3 months)', NULL, NULL),
(5, 'Intrauterine device (IUD, copper T, coil)', NULL, NULL),
(6, 'Implant', NULL, NULL),
(7, 'Traditional (country) medicine', NULL, NULL),
(8, 'Breastfeeding', NULL, NULL),
(9, 'Calendar Method (avoiding sex when fertile)', NULL, NULL),
(10, 'Female condoms', NULL, NULL),
(11, 'Birth control pills', NULL, NULL),
(12, 'Tubal ligation', NULL, NULL),
(13, 'Vasectomy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `family_planning_patient`
--

CREATE TABLE `family_planning_patient` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `method_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `upadated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family_planning_patient`
--

INSERT INTO `family_planning_patient` (`id`, `patient_id`, `method_id`, `created_at`, `upadated_at`) VALUES
(5, 2, 13, NULL, NULL),
(6, 1, 8, NULL, NULL),
(7, 1, 9, NULL, NULL),
(8, 1, 10, NULL, NULL),
(9, 1, 13, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
-- Table structure for table `perineums`
--

CREATE TABLE `perineums` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perineums`
--

INSERT INTO `perineums` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Normal', NULL, NULL),
(2, 'Ulcer', NULL, NULL),
(3, 'Warts', NULL, NULL),
(4, 'Suspected pre-cancer', NULL, NULL),
(5, 'Suspected cancer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perinuem_patient`
--

CREATE TABLE `perinuem_patient` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `perineum_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `upadated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perinuem_patient`
--

INSERT INTO `perinuem_patient` (`id`, `patient_id`, `perineum_id`, `created_at`, `upadated_at`) VALUES
(17, 1, 4, NULL, NULL),
(18, 4, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$wNjXfDId5wy2GHM5MDRZpOTF.Ijnh/LdPXnGcG2KfQdxM1oth0e2e', 'yqMDdqx9YqsgC7vvNSFCrnISxGrOvEURPAdmPgNgQqYLHINZp2133fsU7VoF', '2018-09-07 14:32:07', '2018-09-07 14:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `vagina_examinations`
--

CREATE TABLE `vagina_examinations` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vagina_examinations`
--

INSERT INTO `vagina_examinations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Normal', NULL, NULL),
(2, 'Vaginitis/Vaginosis', NULL, NULL),
(3, 'Warts', NULL, NULL),
(4, 'Suspected pre-cancer', NULL, NULL),
(5, 'Suspected Cancer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vagina_examination_patient`
--

CREATE TABLE `vagina_examination_patient` (
  `id` int(11) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `upadated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vagina_examination_patient`
--

INSERT INTO `vagina_examination_patient` (`id`, `patient_id`, `exam_id`, `created_at`, `upadated_at`) VALUES
(12, 1, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimanual_examinations`
--
ALTER TABLE `bimanual_examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bimanual_examination_patient`
--
ALTER TABLE `bimanual_examination_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `method_id` (`exam_id`);

--
-- Indexes for table `bimanual_examination_patients`
--
ALTER TABLE `bimanual_examination_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `method_id` (`exam_id`);

--
-- Indexes for table `breast_examinations`
--
ALTER TABLE `breast_examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breast_examination_patient`
--
ALTER TABLE `breast_examination_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `method_id` (`exam_id`);

--
-- Indexes for table `cervix_examinations`
--
ALTER TABLE `cervix_examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cervix_examination_patient`
--
ALTER TABLE `cervix_examination_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `method_id` (`exam_id`);

--
-- Indexes for table `enrollment_page_four`
--
ALTER TABLE `enrollment_page_four`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `enrollment_page_one`
--
ALTER TABLE `enrollment_page_one`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment_page_three`
--
ALTER TABLE `enrollment_page_three`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `enrollment_page_two`
--
ALTER TABLE `enrollment_page_two`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `family_planning_methods`
--
ALTER TABLE `family_planning_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_planning_patient`
--
ALTER TABLE `family_planning_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `method_id` (`method_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `perineums`
--
ALTER TABLE `perineums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perinuem_patient`
--
ALTER TABLE `perinuem_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `method_id` (`perineum_id`);

--
-- Indexes for table `vagina_examinations`
--
ALTER TABLE `vagina_examinations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment_page_four`
--
ALTER TABLE `enrollment_page_four`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollment_page_one`
--
ALTER TABLE `enrollment_page_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollment_page_three`
--
ALTER TABLE `enrollment_page_three`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollment_page_two`
--
ALTER TABLE `enrollment_page_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
