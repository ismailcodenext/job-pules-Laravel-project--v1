-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 06:50 PM
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
-- Database: `job_pulse`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_homes`
--

CREATE TABLE `about_homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_homes`
--

INSERT INTO `about_homes` (`id`, `img_url`, `logo`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/banner-img/1-1710523085-home_banner-01.png', 'uploads/logo-img/1-1710523085-Job_Pulse_Logo.webp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2024-03-15 11:18:05', '2024-03-15 11:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_profiles`
--

CREATE TABLE `candidate_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `dof` date NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `nid_number` varchar(255) NOT NULL,
  `passport_no` varchar(255) DEFAULT NULL,
  `cell_no` varchar(255) DEFAULT NULL,
  `emergency_contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `whatsapp_number` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `github_link` varchar(255) NOT NULL,
  `portfolio_link` varchar(255) NOT NULL,
  `portfolio_website` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_profiles`
--

INSERT INTO `candidate_profiles` (`id`, `full_name`, `father_name`, `mother_name`, `dof`, `blood_group`, `nid_number`, `passport_no`, `cell_no`, `emergency_contact_no`, `email`, `whatsapp_number`, `linkedin_link`, `facebook_link`, `github_link`, `portfolio_link`, `portfolio_website`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 'MD Robiul Islam', 'Rafiqul Islam', 'Shilpi Begum', '2024-03-13', 'vfdsv', 'dfvdsv', 'fdsv', 'vfdsa', 'avsv', 'codenextit@gmail.com', 'sdavasdv', 'dscvdsac', 'dsacasdc', 'dscasdc', 'dvcdsc', 'dscsac', 4, '2024-03-14 05:32:31', '2024-03-14 05:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `companie_histories`
--

CREATE TABLE `companie_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_headings`
--

CREATE TABLE `company_headings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_headings`
--

INSERT INTO `company_headings` (`id`, `heading`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Top Companies', 1, '2024-03-10 07:43:32', '2024-03-10 07:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `education_information`
--

CREATE TABLE `education_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degreeType` varchar(255) NOT NULL,
  `schoolName` text NOT NULL,
  `major` text DEFAULT NULL,
  `passYear` varchar(255) NOT NULL,
  `gpa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `img_url`, `logo`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/banner-img/1-1710522201-home_banner (2).png', 'uploads/logo-img/1-1710522201-Job_Pulse_Logo.webp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2024-03-15 11:03:21', '2024-03-15 11:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `benefits` text DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  `job_type` varchar(255) NOT NULL,
  `job_skills` varchar(255) DEFAULT NULL,
  `job_category` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `job_description`, `benefits`, `location`, `deadline`, `status`, `job_type`, `job_skills`, `job_category`, `salary`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Full Stack Developer', 'Full Stack Developer', 'abc', 'Pabna', '2024-03-04 10:02:44', 'approved', 'Remote', '<a href=\"#\"> Html</a>\n<a href=\"#\"> Html</a>\n<a href=\"#\"> Html</a>\n<a href=\"#\"> Html</a>', 'category1', 20000.00, 2, '2024-03-04 03:54:51', '2024-03-04 10:02:44'),
(2, 'UI/UX Designer', 'UI/UX Designer', 'abc', 'Pabna', '2024-03-04 10:16:21', 'approved', 'Full Time', '<a href=\"#\"> PHP</a> <a href=\"#\"> Laravel</a>', 'category1', 20000.00, 2, '2024-03-04 04:15:21', '2024-03-04 04:16:21'),
(3, 'Laravel Developer', 'Laravel Developer', 'abc', 'Dhaka', '2024-03-15 17:33:51', 'approved', 'Remote', '<a href=\"#\"> Php</a> <a href=\"#\"> Laravel</a>', 'category1', 25000.00, 6, '2024-03-15 11:32:54', '2024-03-15 11:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `job_applies`
--

CREATE TABLE `job_applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_experiences`
--

CREATE TABLE `job_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `institutionName` text DEFAULT NULL,
  `companyName` text DEFAULT NULL,
  `joiningDate` date DEFAULT NULL,
  `departureDate` date DEFAULT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_07_11_152531_create_users', 1),
(3, '2024_02_21_105641_create_home_pages_table', 1),
(7, '2024_02_27_130155_create_jobs_table', 2),
(8, '2024_03_02_112134_create_permission_tables', 3),
(11, '2024_03_03_182050_add_additional_field_to_permissions_table', 4),
(12, '2024_03_04_073903_create_jobs_table', 5),
(13, '2024_03_06_103909_create_candidate_profiles_table', 6),
(14, '2024_03_06_104040_create_education_information_table', 6),
(15, '2024_03_06_104324_create_trainings_table', 6),
(16, '2024_03_06_104703_create_job_experiences_table', 6),
(17, '2024_03_07_115903_create_homes_table', 7),
(18, '2024_03_08_174411_create_top_companies_table', 7),
(19, '2024_03_08_192128_create_companie_histories_table', 7),
(20, '2024_03_09_120717_create_company_headings_table', 7),
(21, '2024_03_14_113609_create_job_applies_table', 8),
(22, '2024_03_15_100804_create_about_homes_table', 9);

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

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.menu', 'sanctum', 'Dashboard', '2024-03-04 05:04:54', '2024-03-04 05:04:54'),
(2, 'employer.menu', 'sanctum', 'Employer', '2024-03-04 05:05:24', '2024-03-04 05:05:24'),
(3, 'jobs.menu', 'sanctum', 'Jobs', '2024-03-04 05:05:53', '2024-03-04 05:05:53'),
(4, 'candidate.menu', 'sanctum', 'Candidate', '2024-03-04 05:06:16', '2024-03-05 22:54:16'),
(7, 'candidate.list.menu', 'sanctum', 'Candidate', '2024-03-13 03:11:59', '2024-03-13 03:11:59'),
(8, 'candidate.add.menu', 'sanctum', 'Candidate', '2024-03-13 03:43:45', '2024-03-13 03:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(89, 'App\\Models\\User', 4, 'authToken', 'c648fa1bbf623f8dc7d254387d9f8e02c04596b979ddde8253a63596ead1c4a5', '[\"*\"]', '2024-03-15 10:46:15', NULL, '2024-03-14 05:06:09', '2024-03-15 10:46:15'),
(97, 'App\\Models\\User', 1, 'authToken', '74f8aad65ddf91ced21c52d9d542217e959d3d10d823aa17e125bd2acb0c9216', '[\"*\"]', '2024-03-15 11:31:45', NULL, '2024-03-15 11:31:30', '2024-03-15 11:31:45'),
(100, 'App\\Models\\User', 4, 'authToken', 'a42e2f80876cf55529a69d6506e4fbd53d72de542a72ef5a7ec7facda1c877ef', '[\"*\"]', '2024-03-15 11:37:19', NULL, '2024-03-15 11:35:22', '2024-03-15 11:37:19');

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
(1, 'Super-Admin', 'sanctum', '2024-03-05 23:41:06', '2024-03-05 23:41:06'),
(3, 'Admin', 'sanctum', '2024-03-06 00:08:29', '2024-03-06 00:08:38');

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
(1, 1),
(2, 1),
(2, 3),
(3, 3),
(4, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `top_companies`
--

CREATE TABLE `top_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `top_companies`
--

INSERT INTO `top_companies` (`id`, `img_url`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/uploads/companie-img/1-1710523284-compaine_logo_03.png', 1, '2024-03-10 07:43:59', '2024-03-15 11:21:24'),
(2, 'uploads/companie-img/1-1710523275-compaine_logo_02.png', 1, '2024-03-15 11:21:15', '2024-03-15 11:21:15'),
(3, 'uploads/companie-img/1-1710523294-compaine_logo_01.png', 1, '2024-03-15 11:21:34', '2024-03-15 11:21:34'),
(4, 'uploads/companie-img/1-1710523302-compaine_logo_04.png', 1, '2024-03-15 11:21:42', '2024-03-15 11:21:42'),
(5, 'uploads/companie-img/1-1710523313-compaine_logo_05.png', 1, '2024-03-15 11:21:53', '2024-03-15 11:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainingName` varchar(255) DEFAULT NULL,
  `institutionName` text DEFAULT NULL,
  `completionYear` text DEFAULT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  `role` enum('employer','candidate','admin') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `mobile`, `password`, `otp`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Md Ismail', 'Hossain', 'engr.ismail348@gmail.com', '01300793313', '$2y$10$C61oJAVxJy6bzD8JBr7LRedeFPe6ANi.rOlXhgwU9ivVDV2VCV83G', '0', 'approved', 'admin', '2024-02-26 00:08:29', '2024-02-26 00:08:29'),
(2, 'Md Ismail', 'Hossain', 'ismail.cnits@gmail.com', '01300793313', '$2y$10$i4EnOhPmZMc9LhjdQqgqt.ZlXyNX16CMl8.ViV3xdO9JO4QqnuViG', '0', 'approved', 'employer', '2024-02-26 00:55:14', '2024-02-27 05:52:01'),
(4, 'Md robiul', 'robi', 'robi.cnits@gmail.com', '+880101010', '$2y$10$ZdO8qEb9YIs2yQf0C6TxQufCMJ86qWHZtdz9mlty56f/anwk60XJu', '0', 'approved', 'candidate', '2024-02-26 03:38:08', '2024-03-05 23:18:03'),
(6, 'abc', 'abc', 'abc@gmail.com', '012832123112', '$2y$10$IpTToBWqUG4VLU6sIS6kveI55OmaJNYK8lyF3fQKVItKwO3COVUeS', '0', 'approved', 'employer', '2024-03-15 11:30:13', '2024-03-15 11:31:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_homes`
--
ALTER TABLE `about_homes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_homes_user_id_foreign` (`user_id`);

--
-- Indexes for table `candidate_profiles`
--
ALTER TABLE `candidate_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `companie_histories`
--
ALTER TABLE `companie_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companie_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `company_headings`
--
ALTER TABLE `company_headings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_headings_user_id_foreign` (`user_id`);

--
-- Indexes for table `education_information`
--
ALTER TABLE `education_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_information_user_id_foreign` (`user_id`),
  ADD KEY `education_information_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homes_user_id_foreign` (`user_id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_pages_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applies_candidate_id_foreign` (`candidate_id`),
  ADD KEY `job_applies_job_id_foreign` (`job_id`),
  ADD KEY `job_applies_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_experiences`
--
ALTER TABLE `job_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_experiences_user_id_foreign` (`user_id`),
  ADD KEY `job_experiences_profile_id_foreign` (`profile_id`);

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
-- Indexes for table `top_companies`
--
ALTER TABLE `top_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `top_companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_user_id_foreign` (`user_id`),
  ADD KEY `trainings_profile_id_foreign` (`profile_id`);

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
-- AUTO_INCREMENT for table `about_homes`
--
ALTER TABLE `about_homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate_profiles`
--
ALTER TABLE `candidate_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `companie_histories`
--
ALTER TABLE `companie_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_headings`
--
ALTER TABLE `company_headings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education_information`
--
ALTER TABLE `education_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_applies`
--
ALTER TABLE `job_applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_experiences`
--
ALTER TABLE `job_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `top_companies`
--
ALTER TABLE `top_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_homes`
--
ALTER TABLE `about_homes`
  ADD CONSTRAINT `about_homes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `candidate_profiles`
--
ALTER TABLE `candidate_profiles`
  ADD CONSTRAINT `candidate_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `companie_histories`
--
ALTER TABLE `companie_histories`
  ADD CONSTRAINT `companie_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `company_headings`
--
ALTER TABLE `company_headings`
  ADD CONSTRAINT `company_headings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `education_information`
--
ALTER TABLE `education_information`
  ADD CONSTRAINT `education_information_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `candidate_profiles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `education_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `homes`
--
ALTER TABLE `homes`
  ADD CONSTRAINT `homes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD CONSTRAINT `home_pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD CONSTRAINT `job_applies_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidate_profiles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `job_applies_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `job_applies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `job_experiences`
--
ALTER TABLE `job_experiences`
  ADD CONSTRAINT `job_experiences_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `candidate_profiles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `job_experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

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
-- Constraints for table `top_companies`
--
ALTER TABLE `top_companies`
  ADD CONSTRAINT `top_companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `candidate_profiles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trainings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
