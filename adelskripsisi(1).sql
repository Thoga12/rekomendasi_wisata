-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 11:48 AM
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
-- Database: `adelskripsisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `destinasis`
--

CREATE TABLE `destinasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinasis`
--

INSERT INTO `destinasis` (`id`, `name`, `description`, `image`, `latitude`, `longitude`, `region`, `created_at`, `updated_at`) VALUES
(1, 'Pulau Labengki', 'Gugusan pulau karang eksotis dengan pantai pasir putih, air laut jernih, dan spot snorkeling serta diving yang menakjubkan. Sering disebut \"Raja Ampat-nya Sulawesi\".', 'images/labengki.jpg', -3.4240000, 122.3850000, 'Konawe Utara', NULL, NULL),
(2, 'Pantai Nambo', 'Salah satu pantai populer di Kendari dengan pasir putih lembut, air tenang, dan fasilitas yang cukup lengkap. Cocok untuk bersantai dan menikmati matahari terbit atau terbenam.', 'images/nambo_beach.jpg', -4.0150000, 122.6100000, 'Kendari', NULL, NULL),
(3, 'Air Terjun Moramo', 'Air terjun bertingkat dengan tujuh tingkatan utama dan puluhan tingkatan kecil, membentuk kolam-kolam alami yang jernih. Terletak di kawasan hutan lindung.', 'images/moramo_waterfall.jpg', -4.3940000, 122.3480000, 'Konawe Selatan', NULL, NULL),
(4, 'Taman Nasional Wakatobi', 'Destinasi selam kelas dunia yang meliputi empat pulau utama: Wangi-Wangi, Kaledupa, Tomia, dan Binongko. Memiliki keanekaragaman hayati laut yang sangat tinggi.', 'images/wakatobi.webp', -5.9220000, 123.7070000, 'Wakatobi', NULL, NULL),
(5, 'Danau Napabale', 'Danau air asin yang terhubung dengan laut melalui sebuah terowongan alami, yang bisa dilalui saat air surut. Dikelilingi oleh perbukitan karst yang indah.', 'images/napabale_lake.jpg', -5.1970000, 122.7560000, 'Muna', NULL, NULL),
(6, 'Benteng Keraton Buton', 'Benteng terluas di dunia dengan luas sekitar 23,3 hektar, peninggalan Kesultanan Buton. Menawarkan pemandangan kota Baubau dan sejarah yang kaya.', 'images/buton_fortress.jpg', -5.4670000, 122.6350000, 'Baubau', NULL, NULL),
(7, 'Pulau Bokori', 'Pulau kecil yang sangat indah dengan pasir putih bersih dan air laut biru jernih, sering disebut \"Maldives-nya Kendari\". Cocok untuk bersantai, berenang, dan menikmati keindahan alam.', 'images/bokori_island.jpg', -3.8820000, 122.5690000, 'Konawe', NULL, NULL),
(8, 'Puncak Ahuawali', 'Spot terbaik untuk menikmati pemandangan kota Kendari dari ketinggian, terutama saat matahari terbit atau terbenam. Cocok untuk para pencinta fotografi.', 'images/ahuawali_peak.png', -3.9920000, 122.5020000, 'Kendari', NULL, NULL),
(9, 'Pantai Toronipa', 'Pantai panjang dengan pasir kecoklatan dan ombak yang tenang, menjadikannya tempat favorit keluarga untuk piknik dan berenang. Banyak pohon kelapa di sepanjang pantai.', 'images/toronipa_beach.png', -3.8400000, 122.6840000, 'Konawe', NULL, NULL),
(10, 'Danau Biru Kolaka Utara', 'Danau kecil dengan air yang sangat jernih dan berwarna biru kehijauan, dikelilingi pepohonan rindang. Airnya terasa sejuk dan segar, cocok untuk berenang.', 'images/danau_biru_kolut.jpeg', -3.3760000, 121.3980000, 'Kolaka Utara', NULL, NULL),
(11, 'Gua Liang Kabori', 'Situs gua prasejarah dengan peninggalan lukisan dinding purba. Memberikan wawasan tentang kehidupan manusia di masa lalu dan keindahan stalaktit serta stalagmit.', 'images/liang_kabori_cav.jpeg', -5.0930000, 122.6970000, 'Muna', NULL, NULL),
(12, 'Pulau Padamarang', 'Pulau tak berpenghuni dengan pantai-pantai perawan dan spot snorkeling yang indah. Cocok untuk petualangan dan melarikan diri dari keramaian.', 'images/padamarang_island.jpeg', -5.6020000, 122.7560000, 'Bombana', NULL, NULL),
(13, 'Pantai Dodol', 'Pantai dengan pasir putih yang indah dan air laut yang tenang, cocok untuk berenang dan bersantai. Menawarkan pemandangan sunset yang memukau.', 'images/pantai_dodol.webp\r\n', -4.9570000, 121.7240000, 'Buton Utara', NULL, NULL),
(14, 'Air Terjun Tirtayasa', 'Air terjun dengan kolam alami yang jernih dan suasana alam yang asri, cocok untuk rekreasi dan piknik keluarga.', 'images/air_terjun_tirtayasa.jpg', -4.0120000, 121.9870000, 'Kolaka', NULL, NULL),
(15, 'Pulau Segori', 'Pulau kecil dengan keindahan bawah laut yang menakjubkan, sering menjadi spot favorit bagi para penyelam dan snorkeler.', 'images/pulau_segori.jpg', -5.8760000, 123.8900000, 'Wakatobi', NULL, NULL),
(16, 'Pemandian Air Panas Wawotobi', 'Pemandian air panas alami yang dipercaya memiliki khasiat untuk kesehatan, dikelilingi oleh pepohonan rindang.', 'images/pemandian_wawotobi.jpg', -3.9540000, 122.2130000, 'Konawe', NULL, NULL),
(17, 'Pantai Lakeba', 'Pantai berpasir putih yang panjang dengan ombak yang tenang, cocok untuk berenang dan berbagai aktivitas air lainnya.', 'images/pantai_lakeba.jpg', -5.4870000, 122.6090000, 'Baubau', NULL, NULL),
(18, 'Jembatan Bahteramas', 'Ikon kota Kendari yang membentang di atas Teluk Kendari, menawarkan pemandangan kota dan laut yang indah, terutama di malam hari dengan lampu-lampunya.', 'images/jembatan_bahteramas.jpg', -3.9870000, 122.5670000, 'Kendari', NULL, NULL),
(19, 'Taman Wisata Alam Puncak Wolasi', 'Kawasan pegunungan dengan udara sejuk dan pemandangan alam yang indah, cocok untuk trekking dan menikmati keindahan alam dari ketinggian.', 'images/puncak_wolasi.png', -4.0980000, 122.3450000, 'Konawe Selatan', NULL, NULL),
(20, 'Pantai Meleura', 'Pantai dengan pasir putih dan air biru jernih, terkenal dengan tebing-tebing karstnya yang menawan dan spot diving yang menarik.', 'images/pantai_meleura.jpg', -5.0120000, 122.9870000, 'Muna Barat', NULL, NULL);

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
(4, '2025_05_29_021913_create_destinasions_table', 1),
(5, '2025_05_29_023820_create_ratings_table', 1);

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
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `destinasi_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `destinasi_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(2, 1, 7, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(3, 1, 8, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(4, 1, 10, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(5, 1, 13, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(6, 1, 14, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(7, 1, 18, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(8, 1, 20, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(9, 2, 1, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(10, 2, 4, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(11, 2, 5, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(12, 2, 8, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(13, 2, 12, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(14, 2, 13, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(15, 2, 15, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(16, 2, 16, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(17, 3, 6, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(18, 3, 7, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(19, 3, 9, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(20, 3, 10, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(21, 3, 14, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(22, 3, 20, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(23, 4, 6, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(24, 4, 7, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(25, 4, 11, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(26, 4, 14, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(27, 4, 20, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(28, 5, 7, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(29, 5, 10, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(30, 5, 16, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(31, 5, 17, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(32, 5, 18, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(33, 5, 19, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(34, 6, 9, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(35, 6, 15, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(36, 6, 16, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(37, 6, 18, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(38, 6, 19, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(39, 7, 6, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(40, 7, 7, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(41, 7, 11, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(42, 7, 12, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:33', '2025-06-18 19:36:33'),
(43, 7, 13, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(44, 7, 15, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(45, 7, 16, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(46, 7, 17, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(47, 8, 3, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(48, 8, 4, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(49, 8, 14, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(50, 8, 16, 4, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(51, 8, 17, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(52, 9, 4, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(53, 9, 8, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(54, 9, 10, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(55, 9, 11, 3, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34'),
(56, 9, 17, 5, 'Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini', '2025-06-18 19:36:34', '2025-06-18 19:36:34');

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
('izOjlBeNZvqGDoCRDr7LtWEm957YAqi2CChnf5R5', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU0J1c2lBS0hvcmt5SnlCU0hXZ21kOEFxYXEyUlNCRjYxRTRLdU84dyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXN0aW5hc2kiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1752164610);

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
  `role` enum('admin','user') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Deontae Pfannerstill', 'boyle.kennedy@example.com', '2025-06-18 19:29:40', '$2y$12$S.a1nXw8Lw.moe7imzDGXuny6UMmjyY7CNxZw8jD.87x75GTm1aHu', 'admin', '8V5Izns0fB', '2025-06-18 19:29:40', '2025-06-18 19:29:40'),
(2, 'Chance Murazik', 'erica01@example.org', '2025-06-18 19:29:40', '$2y$12$S.a1nXw8Lw.moe7imzDGXuny6UMmjyY7CNxZw8jD.87x75GTm1aHu', 'admin', 'kGUZLyYrJW', '2025-06-18 19:29:40', '2025-06-18 19:29:40'),
(3, 'Paolo O\'Keefe DVM', 'nyah.toy@example.org', '2025-06-18 19:29:40', '$2y$12$S.a1nXw8Lw.moe7imzDGXuny6UMmjyY7CNxZw8jD.87x75GTm1aHu', 'admin', 'SOUuKC067T', '2025-06-18 19:29:40', '2025-06-18 19:29:40'),
(4, 'Dr. Libby Runte II', 'kerluke.nina@example.org', '2025-06-18 19:29:40', '$2y$12$S.a1nXw8Lw.moe7imzDGXuny6UMmjyY7CNxZw8jD.87x75GTm1aHu', 'admin', 'SMOOdHSrZT', '2025-06-18 19:29:40', '2025-06-18 19:29:40'),
(5, 'Sigurd Yost II', 'florine96@example.net', '2025-06-18 19:29:40', '$2y$12$S.a1nXw8Lw.moe7imzDGXuny6UMmjyY7CNxZw8jD.87x75GTm1aHu', 'admin', 'k0lVP9hBqr', '2025-06-18 19:29:40', '2025-06-18 19:29:40'),
(6, 'Will Wintheiser II', 'ebednar@example.com', '2025-06-18 19:29:40', '$2y$12$S.a1nXw8Lw.moe7imzDGXuny6UMmjyY7CNxZw8jD.87x75GTm1aHu', 'admin', 'xvKs3WjbRx', '2025-06-18 19:29:40', '2025-06-18 19:29:40'),
(7, 'Test User', 'test@example.com', '2025-06-18 19:29:40', '$2y$12$wuZKYc1lVwAHE4RChwVZSenvmGvDc.GbwRuLqQf8DD69/JxM1aZLi', 'user', 'znwl0cpRJbwDT9HwaOgrK5TuA96NHoQ7ZBvxa7bTmJ8AhfFblPgi4hvYhMK1', '2025-06-18 19:29:40', '2025-06-18 19:29:40'),
(8, 'User', 'test@gmail.com', '2025-06-18 19:29:40', '$2y$12$Yo7v1QeZji6jy3z/H81BL./Uau65RHcmjpMh9A7QY0l6g4CJtt/iC', 'user', '2cXzb2Zbb5', '2025-06-18 19:29:41', '2025-06-18 19:29:41'),
(9, 'Admins', 'admin@gmail.com', '2025-06-18 19:29:41', '$2y$12$P7F1NJI3c5WtgVVVe1rFh.mOuvcebF/6HLdnkUCQldN7HPRTF9fVa', 'admin', 'kINeVmTh5j', '2025-06-18 19:29:41', '2025-06-18 19:29:41');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `destinasis`
--
ALTER TABLE `destinasis`
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
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `destinasis`
--
ALTER TABLE `destinasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
