-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:970
-- Generation Time: Mar 20, 2023 at 08:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking-db`
--

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `n_id` int(11) NOT NULL,
  `n_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`n_id`, `n_text`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Tracking Note !', '2023-03-17 23:26:54', '2023-03-17 23:26:54', 2, 3),
(2, 'tester', '2023-03-18 00:15:34', '2023-03-18 00:15:34', 1, NULL),
(3, 'dadawdwad', '2023-03-18 00:22:02', '2023-03-18 00:22:02', 1, NULL),
(4, 'ทดสอบ รอบที่ 3', '2023-03-18 01:19:44', '2023-03-18 01:19:44', 1, 1),
(7, '‘ให้อภัยตัวเอง – รู้จักคุณค่าตัวเอง – มีชีวิตเพื่อตัวเอง’\nแต่แทนที่จะโยนทิ้งและปล่อยให้เป็นเรื่องราวในอดีตเฉยๆ อย่าลืมว่าจริงๆ แล้วการเดินทางอันยาวนานตลอด 1 ปีที่ผ่านมาให้อะไรเรามากมาย  มาร่วมส่งท้ายปีเก่าด้วยการรู้จักตัวเอง ย้อนมองบทเรียน และรับกำลังใจดีๆ\nก่อนจะโอบรับการเดินทางครั้งใหม่ด้วยกำลังใจเต็มเปี่ยมไปด้วยกัน', '2023-03-18 01:28:06', '2023-03-18 01:28:06', 1, 3),
(8, 'Apps', '2023-03-18 01:29:04', '2023-03-18 01:29:04', 1, 1),
(10, 'testscsacasc', '2023-03-18 01:49:15', '2023-03-18 01:49:15', 1, NULL),
(16, 'Computer Notebook', '2023-03-18 05:32:29', '2023-03-18 05:32:29', 1, 1),
(17, 'ทดสอบข้อความ', '2023-03-18 09:31:36', '2023-03-18 09:31:36', 1, 2),
(18, 'ทดสอบครั้งที่ 2', '2023-03-18 09:34:47', '2023-03-18 09:34:47', 2, NULL),
(19, 'ทดสอบครั้งที่ 3', '2023-03-18 09:35:03', '2023-03-18 09:35:03', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `note_history`
--

CREATE TABLE `note_history` (
  `nh_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `before_change` text NOT NULL,
  `after_change` text NOT NULL,
  `added_line` text DEFAULT NULL,
  `deleted_line` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `note_history`
--

INSERT INTO `note_history` (`nh_id`, `n_id`, `user_id`, `before_change`, `after_change`, `added_line`, `deleted_line`, `updated_at`) VALUES
(1, 1, 1, 'test', 'test by admin', NULL, '', '2023-03-18 10:10:40'),
(2, 1, 1, 'test', 'test by admin v2', NULL, '', '2023-03-18 10:14:13'),
(3, 16, 1, 'Notebook', 'Computer Notebook', NULL, '', '2023-03-18 14:41:13'),
(4, 1, 2, 'test by admin v2', 'Tracking', NULL, '', '2023-03-18 14:51:45'),
(5, 8, 1, '12321', 'Apps', NULL, '', '2023-03-18 16:14:00'),
(6, 17, 2, 'ทดสอบ', 'ทดสอบข้อความ', NULL, '', '2023-03-18 16:33:59'),
(7, 7, 1, 'adawd', 'tsgsrbxbsdgs', NULL, '', '2023-03-18 16:40:01'),
(8, 4, 1, 'wdawd2d', 'แก้ไขครั้งที่ 95', NULL, '', '2023-03-18 16:42:02'),
(9, 4, 1, 'แก้ไขครั้งที่ 95', 'ทดสอบ รอบที่ 3', NULL, '', '2023-03-18 18:05:35'),
(10, 1, 3, 'Tracking', 'Tracking Dashboard', NULL, '', '2023-03-19 06:47:21'),
(11, 7, 3, 'tsgsrbxbsdgs', '‘ให้อภัยตัวเอง – รู้จักคุณค่าตัวเอง – มีชีวิตเพื่อตัวเอง’\nการเดินทางตลอดหนึ่งปีที่ผ่านมา เราต้องเจอกับเรื่องราวมากมาย เผชิญหน้ากับเหตุการณ์ไม่คาดคิด และรับมือกับหลายความรู้สึกที่เกาะกุมอยู่ในใจ ด้วยเหตุนี้ ยิ่งใกล้ช่วงท้ายปี หลายคนเลยอยากปล่อยให้ ‘ปีเก่า’ เป็นเรื่องราวของ ‘ปีเก่า’ พร้อมทิ้งเรื่องราวเดิมๆ ไว้ข้างหลังและมุ่งหน้าสู่การเดินทางใหม่ที่กำลังจะมาถึง', NULL, '', '2023-03-19 07:13:33'),
(12, 7, 3, '‘ให้อภัยตัวเอง – รู้จักคุณค่าตัวเอง – มีชีวิตเพื่อตัวเอง’\nการเดินทางตลอดหนึ่งปีที่ผ่านมา เราต้องเจอกับเรื่องราวมากมาย เผชิญหน้ากับเหตุการณ์ไม่คาดคิด และรับมือกับหลายความรู้สึกที่เกาะกุมอยู่ในใจ ด้วยเหตุนี้ ยิ่งใกล้ช่วงท้ายปี หลายคนเลยอยากปล่อยให้ ‘ปีเก่า’ เป็นเรื่องราวของ ‘ปีเก่า’ พร้อมทิ้งเรื่องราวเดิมๆ ไว้ข้างหลังและมุ่งหน้าสู่การเดินทางใหม่ที่กำลังจะมาถึง', '‘ให้อภัยตัวเอง – รู้จักคุณค่าตัวเอง – มีชีวิตเพื่อตัวเอง’\nแต่แทนที่จะโยนทิ้งและปล่อยให้เป็นเรื่องราวในอดีตเฉยๆ อย่าลืมว่าจริงๆ แล้วการเดินทางอันยาวนานตลอด 1 ปีที่ผ่านมาให้อะไรเรามากมาย  มาร่วมส่งท้ายปีเก่าด้วยการรู้จักตัวเอง ย้อนมองบทเรียน และรับกำลังใจดีๆ ผ่าน 12 บทความให้กำลังใจจาก Mission To The Moon', NULL, '', '2023-03-19 07:14:02'),
(13, 1, 3, 'Tracking Dashboard', 'Tracking Note', NULL, 'Dashboard', '2023-03-19 08:16:03'),
(14, 1, 3, 'Tracking Note', 'Tracking Note !', '!', NULL, '2023-03-19 08:30:43'),
(15, 7, 3, '‘ให้อภัยตัวเอง – รู้จักคุณค่าตัวเอง – มีชีวิตเพื่อตัวเอง’\nแต่แทนที่จะโยนทิ้งและปล่อยให้เป็นเรื่องราวในอดีตเฉยๆ อย่าลืมว่าจริงๆ แล้วการเดินทางอันยาวนานตลอด 1 ปีที่ผ่านมาให้อะไรเรามากมาย  มาร่วมส่งท้ายปีเก่าด้วยการรู้จักตัวเอง ย้อนมองบทเรียน และรับกำลังใจดีๆ ผ่าน 12 บทความให้กำลังใจจาก Mission To The Moon', '‘ให้อภัยตัวเอง – รู้จักคุณค่าตัวเอง – มีชีวิตเพื่อตัวเอง’\nแต่แทนที่จะโยนทิ้งและปล่อยให้เป็นเรื่องราวในอดีตเฉยๆ อย่าลืมว่าจริงๆ แล้วการเดินทางอันยาวนานตลอด 1 ปีที่ผ่านมาให้อะไรเรามากมาย  มาร่วมส่งท้ายปีเก่าด้วยการรู้จักตัวเอง ย้อนมองบทเรียน และรับกำลังใจดีๆ\nก่อนจะโอบรับการเดินทางครั้งใหม่ด้วยกำลังใจเต็มเปี่ยมไปด้วยกัน', NULL, 'ผ่าน 12 บทความให้กำลังใจจาก Mission To The Moon', '2023-03-19 08:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@tracking.co.th', NULL, '$2y$10$u0JdcGyz9Ki0LBtMAmGtN.IksMKqfehmUD6y/xN4kEi80ux1U42kG', NULL, '2023-03-17 20:59:50', '2023-03-17 20:59:50'),
(2, 'guest', 'guest@tracking.co.th', NULL, '$2y$10$949nMMUEzx6QDOt4mSaT8.ii3c2rnrUi5erCaMfj2y5tj1RVUv47O', NULL, '2023-03-17 23:00:15', '2023-03-17 23:00:15'),
(3, 'pandora', 'pandora@tracking.co.th', NULL, '$2y$10$WfKNxtZpybGgetlrJeLrneNK8wX9zlGHM070Dh5E32qz6Tnxl5kDa', NULL, '2023-03-18 23:46:43', '2023-03-18 23:46:43');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `note_history`
--
ALTER TABLE `note_history`
  ADD PRIMARY KEY (`nh_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `note_history`
--
ALTER TABLE `note_history`
  MODIFY `nh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
