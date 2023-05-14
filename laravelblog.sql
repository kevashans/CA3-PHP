-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 09:15 PM
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
-- Database: `laravelblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_id`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, 'fuck you bitch!', '2023-05-14 12:51:39', '2023-05-14 12:51:39', NULL),
(2, 1, 1, 1, 'no Fuck you', '2023-05-14 13:24:13', '2023-05-14 13:24:13', NULL),
(3, 1, 4, NULL, 'I like Minecraft :D', '2023-05-14 17:38:05', '2023-05-14 17:38:05', NULL),
(4, 2, 5, NULL, 'A classic...\r\n\r\nI always hated the Errol race tho...', '2023-05-14 18:05:29', '2023-05-14 18:05:29', NULL),
(5, 2, 8, NULL, 'Science is Cool :D', '2023-05-14 18:08:15', '2023-05-14 18:08:15', NULL),
(6, 2, 6, NULL, '// This is a comment', '2023-05-14 18:08:57', '2023-05-14 18:08:57', NULL),
(7, 2, 6, 6, '<!-- this is also a comment -->', '2023-05-14 18:09:11', '2023-05-14 18:09:11', NULL),
(8, 2, 6, 7, '/* This is also a comment */', '2023-05-14 18:09:27', '2023-05-14 18:09:27', NULL),
(9, 2, 6, 8, '# Yet another comment :)', '2023-05-14 18:09:48', '2023-05-14 18:09:48', NULL),
(10, 2, 6, NULL, 'Assignment due @11:59pm be like', '2023-05-14 18:10:20', '2023-05-14 18:10:20', NULL),
(11, 2, 9, NULL, 'Nice!', '2023-05-14 18:13:23', '2023-05-14 18:13:23', NULL),
(12, 2, 4, NULL, 'Minecraft sucks XDDDDD', '2023-05-14 18:14:02', '2023-05-14 18:14:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE `followings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`id`, `user_id`, `topic_id`, `created_at`, `updated_at`) VALUES
(3, 1, 2, '2023-05-14 14:14:38', '2023-05-14 14:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2023_04_17_092619_create_comments_table', 2),
(7, '2023_05_09_131525_create_tags_table', 2),
(8, '2023_05_12_192145_create_following_table', 2),
(10, '2023_04_17_085027_create_topics_table', 3),
(11, '2021_02_22_174718_posts', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topics_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `image_path` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `topics_id`, `slug`, `title`, `description`, `image_path`, `created_at`, `updated_at`, `user_id`) VALUES
(4, 5, 'minecraft', 'Minecraft', 'Minecraft is so much fun :D \r\nwhat do you guys think?', '64612a79aa4ef-Minecraft.jpg', '2023-05-14 17:37:45', '2023-05-14 17:37:45', 1),
(5, 5, 'jak-2', 'Jak 2', 'One of my greatest childhood games...\r\nI used to spend countless hours running around Haven City performing trick\'s on Jak\'s Jetboard, or getting into trouble with the Krimzon Guards... This game brings back so many memories... but damn the difficulty was intense!', '64612ae34f107-Jak 2.jpg', '2023-05-14 17:39:31', '2023-05-14 17:39:31', 1),
(6, 8, 'real-dev-hours', 'Real Dev Hours', 'Sleep is for the weak...', '64612b4d97dca-Real Dev Hours.png', '2023-05-14 17:41:17', '2023-05-14 17:41:17', 1),
(7, 8, 'quantum-computing', 'Quantum Computing', 'The new age of computing is upon us...', '64612bc8a59a5-Quantum Computing.png', '2023-05-14 17:43:20', '2023-05-14 17:43:20', 1),
(8, 7, 'ai-generates-mrna-in-just-11-minutes', 'AI generates mRNA in just 11 minutes', 'A new algorithm developed by Chinese company Baidu Research is dramatically faster than prior methods and shown to boost the antibody response of mRNA vaccines by up to 128 times.', '6461319158063-AI generates mRNA in just 11 minutes.jpg', '2023-05-14 18:08:01', '2023-05-14 18:08:01', 2),
(9, 4, 'timetable-update', 'Timetable Update', 'Here is our new timetable guys...', '646132ae26093-Timetable Update.png', '2023-05-14 18:12:46', '2023-05-14 18:12:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`tag_id`, `taggable_type`, `taggable_id`) VALUES
(2, 'App\\Models\\Topics', 8),
(3, 'App\\Models\\Topics', 7),
(4, 'App\\Models\\Topics', 5),
(5, 'App\\Models\\Topics', 4),
(6, 'App\\Models\\Topics', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `slug` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`slug`)),
  `type` varchar(191) DEFAULT NULL,
  `order_column` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `type`, `order_column`, `created_at`, `updated_at`) VALUES
(2, '{\"en\":\"Technology\"}', '{\"en\":\"technology\"}', NULL, 1, '2023-05-14 17:27:22', '2023-05-14 17:27:22'),
(3, '{\"en\":\"Science\"}', '{\"en\":\"science\"}', NULL, 2, '2023-05-14 17:27:57', '2023-05-14 17:27:57'),
(4, '{\"en\":\"Games\"}', '{\"en\":\"games\"}', NULL, 3, '2023-05-14 17:28:00', '2023-05-14 17:28:00'),
(5, '{\"en\":\"News\"}', '{\"en\":\"news\"}', NULL, 4, '2023-05-14 17:28:12', '2023-05-14 17:28:12'),
(6, '{\"en\":\"Food\"}', '{\"en\":\"food\"}', NULL, 5, '2023-05-14 17:28:17', '2023-05-14 17:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_name` varchar(191) NOT NULL,
  `topic_description` longtext NOT NULL,
  `members` int(11) NOT NULL,
  `topic_image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `topic_description`, `members`, `topic_image`, `created_at`, `updated_at`) VALUES
(4, 'News', 'Talk about news', 0, '6461289fcf166-News.jpg', '2023-05-14 17:29:51', '2023-05-14 17:29:51'),
(5, 'Gaming', 'Talk about the latest videogames here...', 0, '646128bb78059-Gaming.webp', '2023-05-14 17:30:19', '2023-05-14 17:30:19'),
(6, 'Food', 'Food, eating out? fast food? Hea;thy tips and tricks...', 0, '6461298626e3c-Food.jpg', '2023-05-14 17:33:42', '2023-05-14 17:33:42'),
(7, 'Science', 'Talk about latest breakthroughs in scientific theories etc...', 0, '646129e4da1e0-Science.jpg', '2023-05-14 17:35:16', '2023-05-14 17:35:16'),
(8, 'Technology', 'Talk about the the latest tech...', 0, '64612a0576762-Technology.webp', '2023-05-14 17:35:49', '2023-05-14 17:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Matthew', 'matthew@gmail.com', NULL, '$2y$10$fcCy2XVybPIfJXa4zBnEZOJ2Q1Gs5MPxggy5Lkno4sfwIyfu.TcXe', NULL, '2023-05-14 00:37:30', '2023-05-14 00:37:30'),
(2, 'NegativeGamer69', 'gaming@gmail.com', NULL, '$2y$10$fLv/KxGn4JHz0nVpbxvFmOcD0XHnejWdMCM5ZFCyQtF8lHqmGXfPa', NULL, '2023-05-14 18:04:40', '2023-05-14 18:04:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `followings`
--
ALTER TABLE `followings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_topics_id_foreign` (`topics_id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD UNIQUE KEY `taggables_tag_id_taggable_id_taggable_type_unique` (`tag_id`,`taggable_id`,`taggable_type`),
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followings`
--
ALTER TABLE `followings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_topics_id_foreign` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
