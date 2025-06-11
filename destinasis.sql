-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 09:34 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasis`
--
ALTER TABLE `destinasis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasis`
--
ALTER TABLE `destinasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
