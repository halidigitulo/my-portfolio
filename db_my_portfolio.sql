-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2025 at 02:23 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_my_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:81:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:14:\"dashboard.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"settings.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"roles.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"roles.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"roles.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"roles.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:10:\"users.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:12:\"users.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"users.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"users.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"menus.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"menus.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:12:\"menus.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"menus.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"profile.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"profile.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"profile.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:18:\"permissions.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:16:\"permissions.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:18:\"permissions.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:18:\"permissions.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:21;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:23:\"kategori-project.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:22;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:21:\"kategori-project.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:23;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:23:\"kategori-project.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:24;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:23:\"kategori-project.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:25;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:22:\"kategori-berita.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:26;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:20:\"kategori-berita.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:27;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:22:\"kategori-berita.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:28;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:22:\"kategori-berita.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:29;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:13:\"client.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:30;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:11:\"client.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:31;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:13:\"client.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:32;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:13:\"client.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:33;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:15:\"services.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:34;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:13:\"services.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:35;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:15:\"services.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:36;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:15:\"services.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:37;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:21:\"kategori-stack.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:38;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:19:\"kategori-stack.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:39;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:21:\"kategori-stack.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:40;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:21:\"kategori-stack.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:41;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:12:\"stack.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:42;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:10:\"stack.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:43;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:12:\"stack.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:44;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:12:\"stack.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:45;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:13:\"resume.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:46;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:11:\"resume.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:47;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:13:\"resume.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:48;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:13:\"resume.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:49;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:14:\"invoice.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:50;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:12:\"invoice.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:51;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:14:\"invoice.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:52;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:14:\"invoice.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:53;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:14:\"product.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:54;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:12:\"product.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:55;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:14:\"product.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:56;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:14:\"product.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:57;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:14:\"project.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:58;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:12:\"project.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:59;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:14:\"project.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:60;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:14:\"project.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:61;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:21:\"backup-restore.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:62;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:19:\"backup-restore.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:63;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:21:\"backup-restore.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:64;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:21:\"backup-restore.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:65;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:11:\"post.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:66;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:9:\"post.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:67;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:11:\"post.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:68;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:11:\"post.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:69;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:10:\"faq.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:70;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:8:\"faq.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:71;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:10:\"faq.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:72;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:10:\"faq.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:73;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:16:\"testimoni.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:74;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:14:\"testimoni.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:75;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:16:\"testimoni.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:76;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:16:\"testimoni.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:77;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:14:\"feature.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:78;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:12:\"feature.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:79;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:14:\"feature.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:80;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:14:\"feature.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:4:\"user\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:10:\"superadmin\";s:1:\"c\";s:3:\"web\";}}}', 1762351159);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(2, 'Apa saja layanan utama yang Anda tawarkan?', 'Kami berfokus pada tiga bidang profesional:\r\n\r\nMedia & Desain Kreatif – layanan desain grafis, branding, dan konten promosi.\r\n\r\nWeb Development – pembuatan website company profile, portfolio, CRM, POS, dan sistem custom.\r\n\r\nLayanan CCTV & Keamanan – pemasangan dan perawatan sistem pengawasan digital untuk rumah, toko, dan kantor.', '2025-10-27 01:21:43', '2025-10-27 01:21:43'),
(3, 'Apakah layanan Anda tersedia untuk seluruh Indonesia?', 'Ya. Kami melayani klien dari berbagai kota di Indonesia. Proses konsultasi dan pengembangan dapat dilakukan sepenuhnya secara online maupun onsite (khusus instalasi CCTV). Untuk saat ini kami fokus di wilayah Lombok, NTB.', '2025-10-27 01:22:24', '2025-10-27 01:22:24'),
(4, 'Apakah layanan dapat disesuaikan dengan kebutuhan saya?', 'Tentu. Semua layanan kami bersifat custom-made — menyesuaikan kebutuhan bisnis, tujuan promosi, dan anggaran Anda.', '2025-10-27 01:22:40', '2025-10-27 01:22:40'),
(5, 'Jenis media apa yang bisa Anda bantu buatkan?', 'Kami menyediakan berbagai layanan desain seperti:\r\n\r\nLogo, brosur, katalog, kartu nama, banner, dan feed Instagram.\r\n\r\nVideo promosi, video profil perusahaan, serta konten digital marketing.', '2025-10-27 01:22:57', '2025-10-27 01:22:57'),
(6, 'Apakah bisa membantu mengelola akun media sosial bisnis?', 'Bisa. Kami menawarkan paket manajemen media sosial meliputi pembuatan konten, desain visual, copywriting caption, dan laporan performa setiap bulan.', '2025-10-27 01:23:13', '2025-10-27 01:23:13'),
(7, 'Berapa lama proses pembuatan desain?', 'Waktu pengerjaan bergantung pada tingkat kompleksitas, namun rata-rata 2–5 hari kerja untuk desain standar.', '2025-10-27 01:23:28', '2025-10-27 01:23:28'),
(8, 'Apa keunggulan website yang Anda buat?', 'Setiap website kami dibuat dengan:\r\n\r\nDesain profesional dan responsif (mobile-friendly)\r\n\r\nStruktur SEO-friendly agar mudah ditemukan di Google\r\n\r\nSistem keamanan dan kecepatan tinggi\r\n\r\nDashboard admin yang mudah digunakan', '2025-10-27 01:23:44', '2025-10-27 01:23:44'),
(9, 'Platform apa yang digunakan?', 'Kami menggunakan teknologi modern seperti Laravel, Next.js, MySQL (database) disesuaikan dengan kebutuhan proyek Anda.', '2025-10-27 01:24:33', '2025-10-27 01:24:33'),
(10, 'Apakah Anda menyediakan layanan maintenance website?', 'Ya, kami menyediakan paket pemeliharaan rutin untuk update sistem, perbaikan bug, backup data, serta optimalisasi performa.', '2025-10-27 01:24:47', '2025-10-27 01:24:47'),
(11, 'Berapa biaya pembuatan website?', 'Biaya menyesuaikan jenis website. Untuk website portfolio atau company profile mulai dari Rp3.000.000, sedangkan sistem kompleks seperti POS atau CRM disesuaikan berdasarkan fitur.', '2025-10-27 01:25:11', '2025-10-27 01:25:11'),
(12, 'Apakah Anda melayani pemasangan CCTV untuk rumah dan kantor?', 'Ya, kami melayani pemasangan CCTV di berbagai area — rumah, toko, gudang, sekolah, hingga gedung perkantoran.', '2025-10-27 01:25:27', '2025-10-27 01:25:27'),
(13, 'Jenis kamera apa yang digunakan?', 'Kami menggunakan kamera HD, Full HD, dan IP Camera dari merek terpercaya. Semua sistem dapat diakses melalui ponsel secara real-time.', '2025-10-27 01:25:43', '2025-10-27 01:25:43'),
(14, 'Apakah ada garansi untuk CCTV yang dipasang?', 'Tentu. Setiap unit CCTV dilengkapi garansi resmi hingga 1 tahun, termasuk dukungan teknis dan layanan purna jual.', '2025-10-27 01:26:00', '2025-10-27 01:26:00'),
(15, 'Apakah Anda menyediakan perawatan rutin?', 'Ya, kami menyediakan layanan maintenance berkala agar sistem CCTV Anda selalu bekerja optimal dan stabil.', '2025-10-27 01:26:15', '2025-10-27 01:26:15'),
(16, 'Bagaimana cara memulai kerja sama proyek?', 'Anda dapat menghubungi kami melalui halaman Kontak atau WhatsApp. Tim kami akan melakukan konsultasi gratis untuk memahami kebutuhan Anda sebelum membuat penawaran resmi.', '2025-10-27 01:26:33', '2025-10-27 01:26:33'),
(17, 'Apakah bisa kerja sama jangka panjang?', 'Bisa. Kami terbuka untuk kerja sama jangka panjang baik untuk pengelolaan website, desain media, maupun sistem keamanan.', '2025-10-27 01:26:49', '2025-10-27 01:26:49'),
(18, 'Bagaimana sistem pembayaran proyek?', 'Proyek biasanya dimulai dengan DP 50%, dan pelunasan dilakukan setelah pekerjaan selesai sesuai kesepakatan.', '2025-10-27 01:27:04', '2025-10-27 01:27:04'),
(19, 'Apakah ada garansi atau revisi?', 'Ya. Kami memberikan garansi teknis untuk setiap layanan dan revisi wajar agar hasil akhir sesuai dengan ekspektasi Anda.', '2025-10-27 01:27:18', '2025-10-27 01:27:18'),
(20, 'Apakah konsultasi awal dikenakan biaya?', 'Tidak. Konsultasi awal gratis, agar Anda dapat menentukan solusi terbaik sebelum memulai proyek.', '2025-10-27 01:27:35', '2025-10-27 01:27:35'),
(21, 'Bagaimana cara menghubungi tim Anda?', 'Anda dapat menghubungi kami melalui: Nomor Whatsapp: 087863657121. Email: info@bucumedia.id cc: halididoank@gmail.com', '2025-10-27 01:28:30', '2025-10-27 01:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Responsive Design', 'Tampilan aplikasi menyusaikan dengan device yang digunakan', '2025-10-31 01:55:59', '2025-10-31 02:01:13'),
(2, 'Role-Based Access Control (RBAC)', 'Setiap user memiliki hak akses yang bisa diatur secara dinamis', '2025-10-31 01:56:27', '2025-10-31 02:01:35'),
(3, 'Secure Authentication', 'Aplikasi dengan sistem keamaan dan password yang terenkripsi', '2025-10-31 02:02:29', '2025-10-31 02:02:29'),
(4, 'Customizable Dashboards', NULL, '2025-10-31 02:02:40', '2025-10-31 02:02:40'),
(5, 'Data Export Options', NULL, '2025-10-31 02:02:49', '2025-10-31 02:02:49'),
(6, 'Real-time Data Visualization', NULL, '2025-10-31 02:03:02', '2025-10-31 02:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `feature_project`
--

CREATE TABLE `feature_project` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` tinyint UNSIGNED NOT NULL,
  `feature_id` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_project`
--

INSERT INTO `feature_project` (`id`, `project_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(2, 1, 6, NULL, NULL),
(3, 1, 2, NULL, NULL),
(4, 1, 5, NULL, NULL),
(5, 2, 5, NULL, NULL),
(6, 2, 2, NULL, NULL),
(7, 2, 1, NULL, NULL),
(8, 2, 6, NULL, NULL),
(9, 2, 4, NULL, NULL),
(10, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_text` text COLLATE utf8mb4_unicode_ci,
  `cta_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wa_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projects` int DEFAULT NULL,
  `experiences` int DEFAULT NULL,
  `clients` int DEFAULT NULL,
  `pets_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `privacy` text COLLATE utf8mb4_unicode_ci,
  `terms` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `hero_title`, `hero_text`, `cta_text`, `wa_text`, `projects`, `experiences`, `clients`, `pets_enabled`, `privacy`, `terms`, `created_at`, `updated_at`) VALUES
(1, 'Web Developer, Design, Ideas', 'Kami percaya setiap bisnis memiliki cerita dan nilai unik.\r\nMelalui desain, website, dan sistem digital yang kuat, kami bantu mewujudkan identitas merek Anda menjadi nyata.', 'Satu tim untuk kebutuhan website profesional, media kreatif dan sistem keamanan terpercaya.', 'Halo kak, saya tertarik dengan produk', 6, 5, 5, 1, '<h3 data-start=\"1926\" data-end=\"1954\">1. Pengumpulan Informasi</h3><p data-start=\"1955\" data-end=\"2227\">Kami mengumpulkan informasi pribadi secara terbatas, seperti nama, alamat email, dan pesan Anda melalui formulir kontak di Situs ini.<br data-start=\"2088\" data-end=\"2091\">\r\nInformasi tersebut digunakan semata-mata untuk keperluan komunikasi dan tidak akan dibagikan kepada pihak ketiga tanpa persetujuan Anda.</p><h3 data-start=\"2229\" data-end=\"2256\">2. Penggunaan Informasi</h3><p data-start=\"2257\" data-end=\"2307\">Informasi yang Anda berikan dapat digunakan untuk:</p><ul><li>Menanggapi pertanyaan atau permintaan Anda.</li><li>Memberikan pembaruan terkait layanan atau proyek terbaru.</li><li>Meningkatkan kualitas konten dan pengalaman pengguna di Situs.</li></ul><h3 data-start=\"2484\" data-end=\"2521\">3. Cookie dan Teknologi Pelacakan</h3><p data-start=\"2522\" data-end=\"2734\">Situs ini dapat menggunakan cookie untuk meningkatkan pengalaman pengguna.<br data-start=\"2596\" data-end=\"2599\">\r\nCookie membantu kami memahami perilaku pengunjung secara anonim. Anda dapat menonaktifkan cookie melalui pengaturan browser kapan saja.</p><h3 data-start=\"2736\" data-end=\"2756\">4. Keamanan Data</h3><p data-start=\"2757\" data-end=\"2892\">Kami berkomitmen untuk melindungi data pribadi Anda dengan menggunakan langkah-langkah keamanan yang wajar dan sesuai standar industri.</p><h3 data-start=\"2894\" data-end=\"2926\">5. Tautan ke Situs Eksternal</h3><p data-start=\"2927\" data-end=\"3068\">Situs kami dapat berisi tautan ke situs lain. Kami tidak bertanggung jawab atas praktik privasi atau konten dari situs pihak ketiga tersebut.</p><h3 data-start=\"3070\" data-end=\"3088\">6. Persetujuan</h3><p data-start=\"3089\" data-end=\"3208\">Dengan menggunakan Situs ini, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan Kebijakan Privasi ini.</p><h3 data-start=\"3210\" data-end=\"3236\">7. Perubahan Kebijakan</h3><p data-start=\"3237\" data-end=\"3447\">Kebijakan Privasi ini dapat diperbarui dari waktu ke waktu untuk menyesuaikan dengan perkembangan teknologi atau peraturan hukum.<br data-start=\"3366\" data-end=\"3369\">\r\nPerubahan akan diumumkan melalui halaman ini dengan tanggal pembaruan terbaru.</p><h3 data-start=\"3449\" data-end=\"3468\">8. Hubungi Kami</h3><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"3469\" data-end=\"3585\">Jika Anda memiliki pertanyaan tentang kebijakan privasi ini, silakan hubungi kami di:<br>\r\n<strong data-start=\"3555\" data-end=\"3565\">Email:</strong> [<a href=\"mailto://info@bucumedia.id\" target=\"_blank\">info@bucumedia.id</a>]</p>', '<h3 data-start=\"351\" data-end=\"378\">1. Penerimaan Ketentuan</h3><p data-start=\"379\" data-end=\"665\">Dengan mengakses dan menggunakan website ini (selanjutnya disebut <b>bucumedia.id</b>), Anda dianggap telah membaca, memahami, dan menyetujui untuk terikat dengan Syarat &amp; Ketentuan yang berlaku. Jika Anda tidak menyetujui salah satu ketentuan di bawah ini, mohon untuk tidak menggunakan Situs ini.</p><h3 data-start=\"667\" data-end=\"691\">2. Penggunaan Konten</h3><p data-start=\"692\" data-end=\"1005\">Seluruh konten di Situs ini, termasuk tetapi tidak terbatas pada teks, gambar, desain, proyek, logo, dan kode sumber merupakan milik dari Bucu Media, kecuali dinyatakan lain.<br data-start=\"885\" data-end=\"888\">\r\nDilarang keras untuk menyalin, mendistribusikan, atau memodifikasi konten tanpa izin tertulis dari pemilik hak cipta.</p><h3 data-start=\"1007\" data-end=\"1041\">3. Portofolio dan Proyek Klien</h3><p data-start=\"1042\" data-end=\"1277\">Proyek yang ditampilkan pada Situs ini dimaksudkan hanya untuk tujuan portofolio dan dokumentasi karya.<br data-start=\"1145\" data-end=\"1148\">\r\nSetiap logo, merek dagang, atau materi klien ditampilkan atas izin dan tetap menjadi hak milik dari masing-masing pemegang merek.</p><h3 data-start=\"1279\" data-end=\"1308\">4. Batasan Tanggung Jawab</h3><p data-start=\"1309\" data-end=\"1515\">Kami tidak bertanggung jawab atas segala kerugian yang timbul akibat penggunaan atau ketidakmampuan menggunakan Situs ini, termasuk kerusakan pada perangkat, kehilangan data, atau gangguan layanan internet.</p><h3 data-start=\"1517\" data-end=\"1543\">5. Perubahan Ketentuan</h3><p data-start=\"1544\" data-end=\"1727\">Kami berhak mengubah atau memperbarui Syarat &amp; Ketentuan ini sewaktu-waktu tanpa pemberitahuan sebelumnya. Perubahan akan langsung berlaku sejak tanggal dipublikasikan di halaman ini.</p><h3 data-start=\"1729\" data-end=\"1742\">6. Kontak</h3><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"1743\" data-end=\"1873\">Untuk pertanyaan atau klarifikasi mengenai Syarat &amp; Ketentuan, Anda dapat menghubungi kami melalui:<br>\r\n<strong data-start=\"1843\" data-end=\"1853\">Email:</strong> [<a href=\"mailto://info@bucumedia.id\" target=\"_blank\">info@bucumedia.id</a>]</p>', '2025-10-20 06:34:23', '2025-10-31 18:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `terima_dari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_invoice` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Informasi', '2025-10-20 06:07:55', '2025-10-20 06:07:55'),
(2, 'Tips & Trik', '2025-10-20 06:08:02', '2025-10-20 06:08:13'),
(4, 'Retro Tech', '2025-10-27 01:04:57', '2025-10-27 01:04:57'),
(5, 'Teknologi', '2025-10-27 01:05:04', '2025-10-27 01:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_project`
--

CREATE TABLE `kategori_project` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_project`
--

INSERT INTO `kategori_project` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Web Portfolio', '2025-10-20 05:22:12', '2025-10-20 05:22:12'),
(2, 'Point of Sales', '2025-10-20 05:22:23', '2025-10-20 05:55:30'),
(4, 'Custom Apps', '2025-10-27 01:13:06', '2025-10-27 01:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_stack`
--

CREATE TABLE `kategori_stack` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_stack`
--

INSERT INTO `kategori_stack` (`id`, `icon`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'coding', 'Frontend Development', '2025-10-21 04:17:33', '2025-10-21 04:17:33'),
(2, 'database', 'Backend & Database Development', '2025-10-21 04:18:49', '2025-10-27 06:16:43'),
(3, 'canva', 'Design & Tools', '2025-10-21 04:19:01', '2025-10-21 04:19:01'),
(4, 'cloud', 'Cloud & DevOps', '2025-10-21 04:19:12', '2025-10-21 04:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `menu_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'admin/dashboard', 'home-circle', NULL, 'dashboard.read', 1, NULL, 1, '2025-08-15 04:57:45', '2025-10-26 18:12:23'),
(2, 'Settings', 'admin/settings', 'cog', NULL, NULL, 1, NULL, 2, '2025-08-15 04:57:45', '2025-10-26 18:12:23'),
(3, 'Users', 'admin/users', 'user', 2, 'users.read', 1, NULL, 1, '2025-08-15 04:57:45', '2025-10-26 18:12:23'),
(4, 'Roles', 'admin/roles', 'color', 2, 'roles.read', 1, NULL, 2, '2025-08-15 04:57:45', '2025-10-26 18:12:23'),
(5, 'Menus', 'admin/menus', 'menu', 2, 'menus.read', 1, NULL, 3, '2025-08-15 04:57:45', '2025-10-26 18:12:23'),
(6, 'Permissions', 'admin/permissions', 'mouse-alt', 2, 'permissions.read', 1, NULL, 4, '2025-08-15 04:57:45', '2025-10-26 18:12:23'),
(7, 'Profile', 'admin/profile', 'building', NULL, 'profile.read', 1, NULL, 3, '2025-08-15 04:57:45', '2025-10-26 18:12:23'),
(8, 'Master', '#', 'blocks', NULL, NULL, 0, NULL, 4, '2025-10-16 14:50:23', '2025-10-26 18:12:23'),
(9, 'General', 'admin/general', 'circle-line', 8, 'general.read', 0, NULL, 1, '2025-10-16 14:57:50', '2025-10-26 18:12:23'),
(10, 'Client', 'admin/client', 'people-handshake', NULL, 'clients.read', 0, NULL, 5, '2025-10-16 15:01:35', '2025-10-26 18:48:31'),
(11, 'Services', 'admin/service', 'circle-line', 8, 'services.read', 0, NULL, 2, '2025-10-16 15:03:02', '2025-10-26 18:12:23'),
(12, 'Project', 'admin/project', 'git-pull-request-closed', NULL, 'projects.read', 0, NULL, 6, '2025-10-16 15:04:07', '2025-10-26 18:12:23'),
(13, 'Post', 'admin/post', 'book-open', NULL, 'posts.read', 0, NULL, 8, '2025-10-16 15:04:52', '2025-10-26 18:12:23'),
(14, 'FAQ', 'admin/faq', 'message-question-mark', NULL, 'faqs.read', 0, NULL, 9, '2025-10-16 15:05:37', '2025-10-26 18:12:23'),
(15, 'Testimonial', 'admin/testimoni', 'message-bubble-dots-2', NULL, 'testimonials.read', 0, NULL, 10, '2025-10-16 15:06:43', '2025-10-26 18:12:23'),
(16, 'Invoice', 'admin/invoice', 'wallet', NULL, 'invoices.read', 0, NULL, 11, '2025-10-16 15:08:11', '2025-10-26 18:12:23'),
(17, 'Resume', 'admin/resume', 'circle-line', 8, 'resume.read', 0, NULL, 3, '2025-10-16 15:08:41', '2025-10-26 18:12:23'),
(18, 'Stack', 'admin/stack', 'circle-line', 8, 'stack.read', 0, NULL, 4, '2025-10-21 04:56:31', '2025-10-26 18:12:23'),
(19, 'Product', 'admin/product', 'box', NULL, 'product.read', 0, NULL, 7, '2025-10-22 17:53:23', '2025-10-26 18:12:23'),
(20, 'Backup & Restore', 'admin/backup-restore', 'circle-line', 2, 'backup-restore.read', 0, NULL, 5, '2025-10-24 04:48:26', '2025-10-26 18:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjek` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_01_070435_create_permission_tables', 1),
(5, '2025_08_02_015410_create_menus_table', 1),
(6, '2025_08_02_020004_create_profiles_table', 1),
(7, '2025_10_17_004744_create_general_settings_table', 2),
(8, '2025_10_17_005021_create_kategori_project_table', 2),
(9, '2025_10_17_005035_create_kategori_berita_table', 2),
(10, '2025_10_17_005822_create_clients_table', 2),
(11, '2025_10_17_011057_create_services_table', 3),
(13, '2025_10_21_121241_create_kategori_stack_table', 4),
(14, '2025_10_21_125246_create_stacks_table', 5),
(15, '2025_10_22_002749_create_resumes_table', 6),
(16, '2025_10_22_021443_create_invoices_table', 7),
(17, '2025_10_23_014132_create_products_table', 8),
(18, '2025_10_24_004438_create_product_stack_table', 9),
(19, '2025_10_24_121438_create_projects_table', 10),
(20, '2025_10_24_124925_create_posts_table', 11),
(21, '2025_10_24_142542_create_faqs_table', 12),
(22, '2025_10_25_004315_create_testimonis_table', 13),
(24, '2025_10_31_012634_create_messages_table', 14),
(25, '2025_10_31_062040_create_project_galleries_table', 15),
(27, '2025_10_31_082151_create_project_stack_table', 16),
(28, '2025_10_31_094900_create_features_table', 17),
(29, '2025_10_31_100453_create_feature_project_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.read', 'web', '2025-08-15 04:57:45', '2025-10-06 06:09:01'),
(2, 'settings.read', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(3, 'roles.create', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(4, 'roles.read', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(5, 'roles.update', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(6, 'roles.delete', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(7, 'users.read', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(8, 'users.create', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(9, 'users.update', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(10, 'users.delete', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(11, 'menus.create', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(12, 'menus.read', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(13, 'menus.update', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(14, 'menus.delete', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(15, 'profile.create', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(16, 'profile.read', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(17, 'profile.update', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(18, 'permissions.create', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(19, 'permissions.read', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(20, 'permissions.update', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(21, 'permissions.delete', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(26, 'kategori-project.create', 'web', '2025-10-20 05:13:53', '2025-10-20 05:13:53'),
(27, 'kategori-project.read', 'web', '2025-10-20 05:13:53', '2025-10-20 05:13:53'),
(28, 'kategori-project.update', 'web', '2025-10-20 05:13:53', '2025-10-20 05:13:53'),
(29, 'kategori-project.delete', 'web', '2025-10-20 05:13:53', '2025-10-20 05:13:53'),
(30, 'kategori-berita.create', 'web', '2025-10-20 06:07:23', '2025-10-20 06:07:23'),
(31, 'kategori-berita.read', 'web', '2025-10-20 06:07:23', '2025-10-20 06:07:23'),
(32, 'kategori-berita.update', 'web', '2025-10-20 06:07:23', '2025-10-20 06:07:23'),
(33, 'kategori-berita.delete', 'web', '2025-10-20 06:07:23', '2025-10-20 06:07:23'),
(34, 'client.create', 'web', '2025-10-20 16:26:53', '2025-10-20 16:26:53'),
(35, 'client.read', 'web', '2025-10-20 16:26:53', '2025-10-20 16:26:53'),
(36, 'client.update', 'web', '2025-10-20 16:26:53', '2025-10-20 16:26:53'),
(37, 'client.delete', 'web', '2025-10-20 16:26:53', '2025-10-20 16:26:53'),
(38, 'services.create', 'web', '2025-10-21 01:53:09', '2025-10-21 01:53:09'),
(39, 'services.read', 'web', '2025-10-21 01:53:10', '2025-10-21 01:53:10'),
(40, 'services.update', 'web', '2025-10-21 01:53:10', '2025-10-21 01:53:10'),
(41, 'services.delete', 'web', '2025-10-21 01:53:10', '2025-10-21 01:53:10'),
(42, 'kategori-stack.create', 'web', '2025-10-21 04:15:16', '2025-10-21 04:15:16'),
(43, 'kategori-stack.read', 'web', '2025-10-21 04:15:16', '2025-10-21 04:15:16'),
(44, 'kategori-stack.update', 'web', '2025-10-21 04:15:16', '2025-10-21 04:15:16'),
(45, 'kategori-stack.delete', 'web', '2025-10-21 04:15:16', '2025-10-21 04:15:16'),
(46, 'stack.create', 'web', '2025-10-21 04:56:04', '2025-10-21 04:56:04'),
(47, 'stack.read', 'web', '2025-10-21 04:56:04', '2025-10-21 04:56:04'),
(48, 'stack.update', 'web', '2025-10-21 04:56:04', '2025-10-21 04:56:04'),
(49, 'stack.delete', 'web', '2025-10-21 04:56:04', '2025-10-21 04:56:04'),
(50, 'resume.create', 'web', '2025-10-21 16:48:15', '2025-10-21 16:48:15'),
(51, 'resume.read', 'web', '2025-10-21 16:48:15', '2025-10-21 16:48:15'),
(52, 'resume.update', 'web', '2025-10-21 16:48:15', '2025-10-21 16:48:15'),
(53, 'resume.delete', 'web', '2025-10-21 16:48:15', '2025-10-21 16:48:15'),
(54, 'invoice.create', 'web', '2025-10-21 18:23:19', '2025-10-21 18:23:19'),
(55, 'invoice.read', 'web', '2025-10-21 18:23:19', '2025-10-21 18:23:19'),
(56, 'invoice.update', 'web', '2025-10-21 18:23:19', '2025-10-21 18:23:19'),
(57, 'invoice.delete', 'web', '2025-10-21 18:23:19', '2025-10-21 18:23:19'),
(58, 'product.create', 'web', '2025-10-22 17:52:06', '2025-10-22 17:52:06'),
(59, 'product.read', 'web', '2025-10-22 17:52:07', '2025-10-22 17:52:07'),
(60, 'product.update', 'web', '2025-10-22 17:52:07', '2025-10-22 17:52:07'),
(61, 'product.delete', 'web', '2025-10-22 17:52:07', '2025-10-22 17:52:07'),
(62, 'project.create', 'web', '2025-10-24 04:20:28', '2025-10-24 04:20:28'),
(63, 'project.read', 'web', '2025-10-24 04:20:28', '2025-10-24 04:20:28'),
(64, 'project.update', 'web', '2025-10-24 04:20:28', '2025-10-24 04:20:28'),
(65, 'project.delete', 'web', '2025-10-24 04:20:28', '2025-10-24 04:20:28'),
(66, 'backup-restore.create', 'web', '2025-10-24 04:47:50', '2025-10-24 04:47:50'),
(67, 'backup-restore.read', 'web', '2025-10-24 04:47:50', '2025-10-24 04:47:50'),
(68, 'backup-restore.update', 'web', '2025-10-24 04:47:50', '2025-10-24 04:47:50'),
(69, 'backup-restore.delete', 'web', '2025-10-24 04:47:50', '2025-10-24 04:47:50'),
(70, 'post.create', 'web', '2025-10-24 05:27:43', '2025-10-24 05:27:43'),
(71, 'post.read', 'web', '2025-10-24 05:27:43', '2025-10-24 05:27:43'),
(72, 'post.update', 'web', '2025-10-24 05:27:43', '2025-10-24 05:27:43'),
(73, 'post.delete', 'web', '2025-10-24 05:27:43', '2025-10-24 05:27:43'),
(74, 'faq.create', 'web', '2025-10-24 06:34:24', '2025-10-24 06:34:24'),
(75, 'faq.read', 'web', '2025-10-24 06:34:24', '2025-10-24 06:34:24'),
(76, 'faq.update', 'web', '2025-10-24 06:34:24', '2025-10-24 06:34:24'),
(77, 'faq.delete', 'web', '2025-10-24 06:34:24', '2025-10-24 06:34:24'),
(78, 'testimoni.create', 'web', '2025-10-24 17:01:57', '2025-10-24 17:02:49'),
(79, 'testimoni.read', 'web', '2025-10-24 17:01:57', '2025-10-24 17:02:52'),
(80, 'testimoni.update', 'web', '2025-10-24 17:01:57', '2025-10-24 17:02:55'),
(81, 'testimoni.delete', 'web', '2025-10-24 17:01:57', '2025-10-24 17:02:51'),
(82, 'feature.create', 'web', '2025-10-31 01:55:07', '2025-10-31 01:55:07'),
(83, 'feature.read', 'web', '2025-10-31 01:55:07', '2025-10-31 01:55:07'),
(84, 'feature.update', 'web', '2025-10-31 01:55:07', '2025-10-31 01:55:07'),
(85, 'feature.delete', 'web', '2025-10-31 01:55:07', '2025-10-31 01:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` int UNSIGNED DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint UNSIGNED DEFAULT NULL,
  `is_slider` tinyint NOT NULL DEFAULT '0',
  `views` int UNSIGNED NOT NULL DEFAULT '0',
  `likes` int UNSIGNED NOT NULL DEFAULT '0',
  `comments_count` int UNSIGNED NOT NULL DEFAULT '0',
  `shares` int UNSIGNED NOT NULL DEFAULT '0',
  `published_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_stack`
--

CREATE TABLE `product_stack` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` tinyint UNSIGNED NOT NULL,
  `stack_id` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direktur` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `nama`, `tagline`, `direktur`, `alamat`, `kota`, `maps`, `telp`, `hp`, `email`, `website`, `video_url`, `instagram`, `facebook`, `youtube`, `tiktok`, `isi`, `logo`, `cover`, `hero`, `signature`, `pdf`, `created_at`, `updated_at`) VALUES
(1, 'Bucu Media', 'Let The Expert\'s Work', 'Mr. Nobody', 'Jl. Ahmad Yani No. 9 Selagalas, Sandubaya', 'Mataram', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15780.932114200874!2d116.14775960000001!3d-8.573578649999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc75745d4b527%3A0xa95646973160661e!2sRumah%20Sakit%20Harapan%20Keluarga!5e0!3m2!1sid!2sid!4v1762180685638!5m2!1sid!2sid', '087863657121', NULL, 'info@bucumedia.id', 'bucumedia.id', NULL, 'https://www.instagram.com/_halidigitulo/', 'https://www.facebook.com/halidigitulo', 'https://www.youtube.com/@_halidigitulo', 'https://www.tiktok.com/@_halidigitulo', '<p>Transformasi Bisnis Lebih Mudah Bersama Bucu Media — Solusi Digital Cerdas untuk Setiap Kebutuhan Usaha.</p><p>Kami adalah tim kreatif yang bergerak di bidang media digital, pengembangan website, dan layanan sistem keamanan CCTV. Dengan pengalaman dan komitmen tinggi, kami menghadirkan solusi digital yang inovatif, fungsional, dan terpercaya untuk mendukung pertumbuhan bisnis Anda.</p>', 'Bucu Media_logo.png', NULL, 'Bucu Media_hero.png', 'Bucu Media_signature.png', NULL, '2025-08-15 04:57:45', '2025-11-04 04:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `client_id` tinyint UNSIGNED DEFAULT NULL,
  `category_id` tinyint UNSIGNED DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_galleries`
--

CREATE TABLE `project_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_galleries`
--

INSERT INTO `project_galleries` (`id`, `project_id`, `filename`, `created_at`, `updated_at`) VALUES
(4, 2, '690459c84ccbd.png', '2025-10-30 22:40:08', '2025-10-30 22:40:08'),
(5, 2, '690459c84e64c.png', '2025-10-30 22:40:08', '2025-10-30 22:40:08'),
(6, 2, '690459c84ef66.png', '2025-10-30 22:40:08', '2025-10-30 22:40:08'),
(7, 1, '69046a94ba101.png', '2025-10-30 23:51:48', '2025-10-30 23:51:48'),
(8, 1, '69046b9fae309.png', '2025-10-30 23:56:15', '2025-10-30 23:56:15'),
(9, 6, '69046cbfb1615.png', '2025-10-31 00:01:03', '2025-10-31 00:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `project_stack`
--

CREATE TABLE `project_stack` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` tinyint UNSIGNED NOT NULL,
  `stack_id` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_stack`
--

INSERT INTO `project_stack` (`id`, `project_id`, `stack_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 2, 4, NULL, NULL),
(4, 2, 5, NULL, NULL),
(5, 1, 7, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 2, NULL, NULL),
(8, 1, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `mulai_dari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sampai_dengan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `judul`, `lokasi`, `deskripsi`, `mulai_dari`, `sampai_dengan`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'IT Support', 'RS. Harapan Keluarga', '<p>Dipercaya sebagai IT Support di salah satu Rumah Sakit Swasta di Mataram.</p><p>Adapun tugas dan tanggungjawab yang dikerjakan sebagai berikut:</p><ul><li>Mengelola SIMRS dan Website</li><li>Memastikan perangkat IT di setiap unit berfungsi dan berjalan dengan baik</li></ul>', '2016', 'Sekarang', 'profesional', '2025-10-21 17:14:01', '2025-10-28 22:36:34'),
(2, 'Web Programmer', 'Pribadi', '<p>Mulai mengembangkan usaha bidang pembuatan website profesional.</p>', '2020', 'Sekarang', 'profesional', '2025-10-27 05:51:06', '2025-10-28 22:37:15'),
(3, 'S1 Teknik Informatika', 'STMIK Bumigora Mataram', 'Berkesempatan kuliah di salah satu Perguruan Tinggi Swasta bidang Teknologi di Mataram', '2007', '2012', 'akademik', '2025-10-27 05:52:58', '2025-10-28 22:29:51'),
(4, 'SMA Negeri 1 Sikur', 'Lombok Timur', 'Pernah belajar di SMA Negeri 1 Sikur, Jurusan Ilmu Sosial.', '2004', '2007', 'akademik', '2025-10-28 22:29:21', '2025-10-28 22:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(2, 'user', 'web', '2025-08-15 04:57:45', '2025-08-15 04:57:45'),
(3, 'superadmin', 'web', '2025-10-06 13:36:26', '2025-10-06 13:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(1, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(80, 3),
(81, 3),
(82, 3),
(83, 3),
(84, 3),
(85, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `judul`, `slug`, `deskripsi`, `icon`, `thumbnail`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Pembuatan Website', 'pembuatan-website', 'Membangun website portfolio, CRM, POS, dan lainnya sesuai kebutuhan Anda.', 'code-slash', NULL, NULL, '2025-11-04 06:21:10', '2025-11-04 06:21:10'),
(2, 'Media Percetakan', 'media-percetakan', 'Percetakan berbagai material seperti ID Card, brosur, banner, dan merchandise.', 'lightning', NULL, NULL, '2025-11-04 06:22:36', '2025-11-04 06:22:36'),
(3, 'CCTV Security', 'cctv-security', 'Solusi pemasangan dan pemantauan CCTV untuk keamanan lebih baik.', 'camera-video', NULL, NULL, '2025-11-04 06:23:09', '2025-11-04 06:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('B6H5ibCTHxiN1RTkqBpili2dqscL32WDYOtF3tQC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQTRnQTJCTFhuRVgzU3BVaWkxdUxyVVJiTjBncVd1OEhwcU85Rjk0RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9nZW5lcmFsIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1762266192);

-- --------------------------------------------------------

--
-- Table structure for table `stacks`
--

CREATE TABLE `stacks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int NOT NULL,
  `kategori_id` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stacks`
--

INSERT INTO `stacks` (`id`, `nama`, `nilai`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'HTML/CSS', 90, 1, '2025-10-21 05:12:12', '2025-10-21 05:12:12'),
(2, 'JavaScript', 75, 1, '2025-10-21 05:13:09', '2025-10-21 05:13:09'),
(3, 'Livewire', 50, 1, '2025-10-21 05:13:37', '2025-10-21 05:13:37'),
(4, 'Laravel', 90, 2, '2025-10-21 05:13:53', '2025-10-21 05:13:53'),
(5, 'MySQL', 90, 2, '2025-10-21 05:14:27', '2025-10-21 05:14:27'),
(6, 'Github', 90, 4, '2025-10-28 21:35:30', '2025-10-28 21:35:30'),
(7, 'Canva', 95, 3, '2025-10-28 21:39:00', '2025-10-28 21:39:00'),
(8, 'Ubuntu Server', 80, 4, '2025-10-28 21:39:28', '2025-10-28 21:39:28'),
(9, 'Photoshop', 80, 3, '2025-10-31 19:01:32', '2025-10-31 19:01:32'),
(10, 'Corel Draw', 80, 3, '2025-10-31 19:01:48', '2025-10-31 19:01:48'),
(11, 'API', 50, 2, '2025-11-04 04:23:00', '2025-11-04 04:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimoni` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` tinyint NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `is_active`, `profile_picture`, `bio`, `last_login_at`, `last_login_ip`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin', NULL, '$2y$12$aez3VJqFuTvXizS0CbyRceCARVq0ZvsYy0OEe41TjvngHQEsglIdq', 1, '1761575693.png', NULL, NULL, NULL, 3, NULL, '2025-08-15 04:57:45', '2025-10-27 06:34:53'),
(2, 'Halidi', 'halidi', NULL, '$2y$12$/0C/E8uUVfN.wUu0ecvcKuBKgAxwmwz4M9eSAUDn8sM6yM8Z/eYfG', 1, NULL, NULL, NULL, NULL, 2, NULL, '2025-10-07 05:51:38', '2025-10-07 05:51:38');

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
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_project`
--
ALTER TABLE `feature_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_no_invoice_unique` (`no_invoice`);

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
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_project`
--
ALTER TABLE `kategori_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_stack`
--
ALTER TABLE `kategori_stack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_stack`
--
ALTER TABLE `product_stack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `project_galleries`
--
ALTER TABLE `project_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_galleries_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_stack`
--
ALTER TABLE `project_stack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stacks`
--
ALTER TABLE `stacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feature_project`
--
ALTER TABLE `feature_project`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_project`
--
ALTER TABLE `kategori_project`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_stack`
--
ALTER TABLE `kategori_stack`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_stack`
--
ALTER TABLE `product_stack`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_galleries`
--
ALTER TABLE `project_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_stack`
--
ALTER TABLE `project_stack`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stacks`
--
ALTER TABLE `stacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `project_galleries`
--
ALTER TABLE `project_galleries`
  ADD CONSTRAINT `project_galleries_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
