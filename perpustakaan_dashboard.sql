-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 05:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `year` year(4) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `image`, `stock`, `description`, `year`, `category_id`, `created_at`, `updated_at`) VALUES
(21, 'Harry Potter dan Batu Bertuah', 'J. K. Rowling', 'images/5jsnIimYs98bHisXmASfAlfrsnhzkFS6L8QQkpim.jpg', 28, 'sebuah benda legendaris yang dapat mengubah logam menjadi emas dan, yang lebih penting, menghasilkan Ramuan Kehidupan, yang memberikan keabadian bagi peminumnya. Nicholas Flamel, seorang alkemis, berhasil menciptakan Batu Bertuah dengan bantuan Albus Dumbledore.', '2001', 1, '2025-04-27 03:29:38', '2025-04-27 03:29:38'),
(22, 'Harry Potter dan Relikui Kematian', 'J. K. Rowling', 'images/ehYJNJzzPVmoCThK6knZeDXtNbOLgOmOkcazxFo3.jpg', 13, 'Setelah kematian Dumbledore, Voldemort berupaya mengambil kendali Kementerian Sihir. Sementara itu, Harry akan berusia tujuh belas tahun dan akan kehilangan perlindungan mendiang ibunya. Anggota Orde Phoenix mengungsikan keluarga Dursley, dan bersiap untuk memindahkan Harry ke The Burrow dengan menerbangkannya ke sana, menggunakan teman-teman Harry sebagai umpan. Pelahap Maut menyerang mereka di tengah perjalanan, dan dalam pertempuran, \"Mad-Eye\" Moody dan Hedwig tewas sedangkan George Weasley terluka. Voldemort datang untuk membunuh Harry, tetapi tongkat Harry menangkis sendiri serangan Voldemort.', '2006', 1, '2025-04-27 03:31:57', '2025-04-27 03:31:57'),
(23, 'Pemograman Laravel', 'Ade Rahmat Iskandar', 'images/wWC6AhUgSI0Gtqt94F5v8i8tULlIScQ2Sfn81ODx.jpg', 7, 'Buku ini membahas tentang real cara membangun digital startup menggunakan framework laravel.penulis ini merancang buku ini dengan contoh-contoh project nyata.Sehingga dapat menuntun pembelajar yang baru didunia pemograman siap menjadi seorang fullstack developer dengan pemograman laravel', '2020', 9, '2025-04-27 03:38:36', '2025-04-27 03:38:36'),
(24, 'Masak Sehat Itu Mudah', 'Tony Stark', 'images/Oi5xDCM49uVgOTNMmK1vGku4cvXitPyETEsopbl8.jpg', 20, 'Berisi resep-resep masakan yang sehat untuk kebutuhan sehari hari', '2008', 8, '2025-04-27 03:44:19', '2025-04-27 03:44:19'),
(25, 'Bisnis Modal 10 Juta', 'Oppi Andini', 'images/Pk3Ah7ZGKIZIr87aNSevmzYDyj7ESYhSl9YMu6Uf.jpg', 43, 'berisi tentang 35 ide bisnis online offline dengan modal 10 juta', '2017', 12, '2025-04-27 03:50:47', '2025-04-27 03:50:47'),
(26, 'Between Fashion - Passion Personality', 'Salsabila Deva', 'images/7q64e0iVlCuHgJkX8KMUmuzN6vdu8aJRgnHReiMj.png', 76, 'Buku Tentang beragam busana indonesia dari sabang sampai merauke', '2019', 7, '2025-04-27 03:53:36', '2025-04-27 03:53:36'),
(27, 'Sejarah Kerajaan-Kerjaan  Besar Nusantara', 'Sri Wintala Achmad', 'images/zC5NF4GOL8GxFvGaf3CYw5hb5LZJz2oP8LEe31PB.jpg', 54, 'membedah tuntas sejarah kerajaan besar dinusatara yang meliputi masa berdiri, masa kejayaan, dan masa surut yang disebabkan disebabkan faktor extenal maupun internal', '2012', 11, '2025-04-27 03:56:14', '2025-04-27 05:49:50'),
(28, 'History of the world war', 'Saut Passaribu (Ed.)', 'images/5KjDMMJTK1RLBQqzEp3dsbp4VQzxhOB5LQlxpAjU.jpg', 22, 'tentang sejarah perang meliputi perang WW1 dan WW2', '1999', 11, '2025-04-27 03:57:54', '2025-04-27 03:57:54'),
(29, 'Sastra Indonesia Lengkap', 'Albert Einstein', 'images/ItOaW3GupCrxqjCoqS6wyQUewZmHVLu3TjhoIL3h.jpg', 82, 'berisi rangkuman pembelajaran bahasa indonesia meliputi pantun, puisi, sajak, kata mutiara dan lain-lain', '2015', 10, '2025-04-27 04:02:44', '2025-04-27 04:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `borrowings`
--

CREATE TABLE `borrowings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `borrow_date` date NOT NULL,
  `return_deadline` date NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL DEFAULT 'dipinjam',
  `add_fine` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowings`
--

INSERT INTO `borrowings` (`id`, `user_id`, `book_id`, `borrow_date`, `return_deadline`, `status`, `add_fine`, `created_at`, `updated_at`) VALUES
(11, 13, 27, '2025-04-27', '2025-05-02', 'dikembalikan', 0.00, '2025-04-27 04:03:10', '2025-04-27 05:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_tanujaya@gmail.com|127.0.0.1', 'i:1;', 1745765694),
('laravel_cache_tanujaya@gmail.com|127.0.0.1:timer', 'i:1745765694;', 1745765694);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sihir', '2025-04-23 00:50:28', '2025-04-24 17:10:37'),
(7, 'Fashion', '2025-04-25 02:01:17', '2025-04-25 02:01:17'),
(8, 'Masak', '2025-04-25 02:07:34', '2025-04-25 02:07:40'),
(9, 'Teknologi', '2025-04-26 22:51:11', '2025-04-26 22:51:11'),
(10, 'Sastra', '2025-04-26 22:51:11', '2025-04-26 22:51:11'),
(11, 'Sejarah', '2025-04-26 22:51:11', '2025-04-26 22:51:11'),
(12, 'Bisnis', '2025-04-26 22:51:11', '2025-04-26 22:51:11');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_23_072519_create_categories_table', 1),
(5, '2025_04_23_072534_create_books_table', 1),
(6, '2025_04_23_072539_create_borrowings_table', 1),
(7, '2025_04_23_072545_create_reports_table', 1),
(8, '2025_04_25_093650_add_image_to_books_table', 2),
(13, '2025_04_25_093907_add_image_to_books_table', 3),
(16, '2025_04_26_122132_add_description_to_books_table', 4),
(17, '2025_04_26_151511_add_telepon_alamat_to_users_table', 5),
(19, '2025_04_27_035155_add_add_fine_to_borrowings_table', 6),
(21, '2025_04_27_123002_create_reports_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('bintang@perpus.com', '$2y$12$gA77Z3byBpWVdO0oUDiJL.1NcIlDsDmXLFzNd5vId5Q/3a9Lv19qG', '2025-04-27 00:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_users` int(11) NOT NULL DEFAULT 0,
  `total_books` int(11) NOT NULL DEFAULT 0,
  `total_borrowings` int(11) NOT NULL DEFAULT 0,
  `total_returns` int(11) NOT NULL DEFAULT 0,
  `report_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `total_users`, `total_books`, `total_borrowings`, `total_returns`, `report_date`, `created_at`, `updated_at`) VALUES
(1, 5, 9, 1, 1, '2025-04-27', '2025-04-27 05:39:39', '2025-04-27 05:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Z5XUphSO15ue60FF9fyZrgnTLpW4mpAozdiHT3tx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVZkaG9WVzlrNWduelNKU05RUXl5QWhRNkxxWm1YY3JHQ3AzWGN0biI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1745765891);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','anggota') NOT NULL DEFAULT 'anggota',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telepon`, `alamat`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Bintang Kresna A', 'bintang@perpus.com', '087644618282', 'Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', NULL, '$2y$12$JFtIUylM4t8IUykBXswFFOL0ajUsMVseCXDV8t3oMO5/7P2QlxYm.', 'admin', 'AdP5oTq7uiMUiMhcO6A0OgYUBhkdpiOOJOJXhrRBog9BBhYbiwDYcyPrz6vn', '2025-04-26 22:51:11', '2025-04-27 02:44:39'),
(11, 'Afrian Dicky Prasetya', 'afrian@perpus.com', '08162816782', 'Jl. Brojomulyo, Gejayan, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', NULL, '$2y$12$HjKtUvP3iOPji1u.AiD/PuN4XN9TyGZh714yuhUQA7CJpORgco3ke', 'anggota', NULL, '2025-04-27 00:28:53', '2025-04-27 01:52:10'),
(12, 'Wahyu Ferdiansyah', 'wahyu@perpus.com', '0816678343', 'Jl. Colombo Jl. Karangmalang, Karang Malang, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', NULL, '$2y$12$rt9FEF0yGIhoK5Kl/iFO/.Z6m850dW8vZAytSVMQI9ck8vDmQdfji', 'anggota', NULL, '2025-04-27 02:59:54', '2025-04-27 03:03:55'),
(13, 'Tanujaya Candra Setiawan', 'tanujaya@perpus.com', '0867261221', 'Pogung Baru Blok F 36 Blok a, Jl. Pogung Baru Jl. Pogung Lor No.23, Pogung Lor, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284', NULL, '$2y$12$WLD6qVC0W4YHz8FzsTWdDuNxn9kdp4b1ElMYi.3VeI2jSVCaAgEDO', 'anggota', '7JHsVrt2KW8mUtQq82co65OOzRi9c2adyRhv5CKYSVfeEOPUiBEkBwJ247L1', '2025-04-27 03:03:44', '2025-04-27 03:03:44'),
(14, 'Muhhamad Amikatus Zaik', 'amik@perpus.com', '08746172712', 'Jl. Demangan Baru No.33, Papringan, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', NULL, '$2y$12$fF8qc1Zo2blEvrIUijoDMu.3d3Rvs/YilDr4XaZfaTsR0ihk.QSqu', 'anggota', NULL, '2025-04-27 03:04:41', '2025-04-27 03:04:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowings_user_id_foreign` (`user_id`),
  ADD KEY `borrowings_book_id_foreign` (`book_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reports_report_date_unique` (`report_date`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
