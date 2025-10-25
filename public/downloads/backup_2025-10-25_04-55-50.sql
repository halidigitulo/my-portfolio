DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:77:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:14:\"dashboard.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"settings.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"roles.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"roles.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"roles.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"roles.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:10:\"users.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:12:\"users.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"users.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"users.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"menus.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"menus.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:12:\"menus.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"menus.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"profile.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"profile.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"profile.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:18:\"permissions.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:16:\"permissions.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:18:\"permissions.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:18:\"permissions.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:21;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:23:\"kategori-project.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:22;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:21:\"kategori-project.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:23;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:23:\"kategori-project.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:24;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:23:\"kategori-project.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:25;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:22:\"kategori-berita.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:26;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:20:\"kategori-berita.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:27;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:22:\"kategori-berita.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:28;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:22:\"kategori-berita.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:29;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:13:\"client.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:30;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:11:\"client.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:31;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:13:\"client.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:32;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:13:\"client.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:33;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:15:\"services.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:34;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:13:\"services.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:35;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:15:\"services.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:36;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:15:\"services.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:37;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:21:\"kategori-stack.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:38;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:19:\"kategori-stack.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:39;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:21:\"kategori-stack.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:40;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:21:\"kategori-stack.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:41;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:12:\"stack.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:42;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:10:\"stack.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:43;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:12:\"stack.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:44;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:12:\"stack.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:45;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:13:\"resume.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:46;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:11:\"resume.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:47;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:13:\"resume.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:48;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:13:\"resume.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:49;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:14:\"invoice.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:50;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:12:\"invoice.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:51;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:14:\"invoice.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:52;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:14:\"invoice.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:53;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:14:\"product.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:54;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:12:\"product.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:55;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:14:\"product.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:56;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:14:\"product.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:57;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:14:\"project.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:58;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:12:\"project.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:59;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:14:\"project.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:60;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:14:\"project.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:61;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:21:\"backup-restore.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:62;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:19:\"backup-restore.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:63;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:21:\"backup-restore.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:64;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:21:\"backup-restore.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:65;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:11:\"post.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:66;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:9:\"post.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:67;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:11:\"post.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:68;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:11:\"post.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:69;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:10:\"faq.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:70;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:8:\"faq.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:71;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:10:\"faq.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:72;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:10:\"faq.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:73;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:16:\"testimoni.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:74;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:14:\"testimoni.read\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:75;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:16:\"testimoni.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:76;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:16:\"testimoni.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:4:\"user\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:10:\"superadmin\";s:1:\"c\";s:3:\"web\";}}}', '1761440594');

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `clients` (`id`, `nama`, `pic`, `no_wa`, `email`, `alamat`, `logo`, `created_at`, `updated_at`) VALUES ('1', 'Hermada Care', 'Halidi', '087863657121', 'halididoank@gmail.com', 'Mataram', '1761030469.png', '2025-10-21 01:51:35', '2025-10-21 07:07:49');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE `general_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_text` text COLLATE utf8mb4_unicode_ci,
  `projects` int DEFAULT NULL,
  `experiences` int DEFAULT NULL,
  `clients` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `general_settings` (`id`, `hero_title`, `hero_text`, `projects`, `experiences`, `clients`, `created_at`, `updated_at`) VALUES ('1', 'Web Developer, UI / UX Design, Creative Ideas', 'I create digital experiences that inspire and engage. With a passion for clean design and innovative solutions, I transform ideas into beautiful, functional realities.', '6', '5', '5', '2025-10-20 14:34:23', '2025-10-20 15:01:16');

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint unsigned DEFAULT NULL,
  `terima_dari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_invoice` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoices_no_invoice_unique` (`no_invoice`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `invoices` (`id`, `no_invoice`, `client_id`, `terima_dari`, `tgl_invoice`, `due_date`, `jumlah`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES ('1', 'INV2510220001', '1', NULL, '2025-10-22', NULL, '1500000.00', '1', 'uang muka', '2025-10-22 03:03:54', '2025-10-22 07:14:35');
INSERT INTO `invoices` (`id`, `no_invoice`, `client_id`, `terima_dari`, `tgl_invoice`, `due_date`, `jumlah`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES ('2', 'INV2510220002', '1', NULL, '2025-10-22', NULL, '11000000.00', '1', 'pembayaran termin ke II', '2025-10-22 06:57:51', '2025-10-22 07:13:07');
INSERT INTO `invoices` (`id`, `no_invoice`, `client_id`, `terima_dari`, `tgl_invoice`, `due_date`, `jumlah`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES ('3', 'INV2510250001', '1', NULL, '2025-10-25', NULL, '2500000.00', '1', 'uang muka', '2025-10-25 01:23:02', '2025-10-25 01:42:08');

DROP TABLE IF EXISTS `job_batches`;
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
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `kategori_berita`;
CREATE TABLE `kategori_berita` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategori_berita` (`id`, `nama`, `created_at`, `updated_at`) VALUES ('1', 'Informasi', '2025-10-20 14:07:55', '2025-10-20 14:07:55');
INSERT INTO `kategori_berita` (`id`, `nama`, `created_at`, `updated_at`) VALUES ('2', 'Tips & Trik', '2025-10-20 14:08:02', '2025-10-20 14:08:13');

DROP TABLE IF EXISTS `kategori_project`;
CREATE TABLE `kategori_project` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategori_project` (`id`, `nama`, `created_at`, `updated_at`) VALUES ('1', 'Web Portfolio', '2025-10-20 13:22:12', '2025-10-20 13:22:12');
INSERT INTO `kategori_project` (`id`, `nama`, `created_at`, `updated_at`) VALUES ('2', 'Point of Sales', '2025-10-20 13:22:23', '2025-10-20 13:55:30');

DROP TABLE IF EXISTS `kategori_stack`;
CREATE TABLE `kategori_stack` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategori_stack` (`id`, `icon`, `nama`, `created_at`, `updated_at`) VALUES ('1', 'coding', 'Frontend Development', '2025-10-21 12:17:33', '2025-10-21 12:17:33');
INSERT INTO `kategori_stack` (`id`, `icon`, `nama`, `created_at`, `updated_at`) VALUES ('2', 'database', 'Backend Development', '2025-10-21 12:18:49', '2025-10-21 12:18:49');
INSERT INTO `kategori_stack` (`id`, `icon`, `nama`, `created_at`, `updated_at`) VALUES ('3', 'canva', 'Design & Tools', '2025-10-21 12:19:01', '2025-10-21 12:19:01');
INSERT INTO `kategori_stack` (`id`, `icon`, `nama`, `created_at`, `updated_at`) VALUES ('4', 'cloud', 'Cloud & DevOps', '2025-10-21 12:19:12', '2025-10-21 12:19:23');

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `menu_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_parent_id_foreign` (`parent_id`),
  CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('1', 'Dashboard', 'admin/dashboard', 'home-circle', NULL, 'dashboard.read', '1', NULL, '1', '2025-08-15 12:57:45', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('2', 'Settings', 'admin/settings', 'cog', NULL, NULL, '1', NULL, '2', '2025-08-15 12:57:45', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('3', 'Users', 'admin/users', 'user', '2', 'users.read', '1', NULL, '1', '2025-08-15 12:57:45', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('4', 'Roles', 'admin/roles', 'color', '2', 'roles.read', '1', NULL, '2', '2025-08-15 12:57:45', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('5', 'Menus', 'admin/menus', 'menu', '2', 'menus.read', '1', NULL, '3', '2025-08-15 12:57:45', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('6', 'Permissions', 'admin/permissions', 'mouse-alt', '2', 'permissions.read', '1', NULL, '4', '2025-08-15 12:57:45', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('7', 'Profile', 'admin/profile', 'building', NULL, 'profile.read', '1', NULL, '3', '2025-08-15 12:57:45', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('8', 'Master', '#', 'blocks', NULL, NULL, '0', NULL, '4', '2025-10-16 22:50:23', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('9', 'General', 'admin/general', 'circle-line', '8', 'general.read', '0', NULL, '1', '2025-10-16 22:57:50', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('10', 'Clients', 'admin/client', 'people-handshake', '8', 'clients.read', '0', NULL, '2', '2025-10-16 23:01:35', '2025-10-23 01:59:33');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('11', 'Services', 'admin/service', 'circle-line', '8', 'services.read', '0', NULL, '3', '2025-10-16 23:03:02', '2025-10-23 02:00:00');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('12', 'Project', 'admin/project', 'git-pull-request-closed', NULL, 'projects.read', '0', NULL, '5', '2025-10-16 23:04:07', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('13', 'Post', 'admin/post', 'book-open', NULL, 'posts.read', '0', NULL, '7', '2025-10-16 23:04:52', '2025-10-23 01:59:52');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('14', 'FAQ', 'admin/faq', 'message-question-mark', NULL, 'faqs.read', '0', NULL, '8', '2025-10-16 23:05:37', '2025-10-23 01:59:41');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('15', 'Testimonial', 'admin/testimoni', 'message-bubble-dots-2', NULL, 'testimonials.read', '0', NULL, '9', '2025-10-16 23:06:43', '2025-10-25 01:01:18');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('16', 'Invoice', 'admin/invoice', 'wallet', NULL, 'invoices.read', '0', NULL, '10', '2025-10-16 23:08:11', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('17', 'Resume', 'admin/resume', 'circle-line', '8', 'resume.read', '0', NULL, '4', '2025-10-16 23:08:41', '2025-10-23 01:53:45');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('18', 'Stack', 'admin/stack', 'circle-line', '8', 'stack.read', '0', NULL, '5', '2025-10-21 12:56:31', '2025-10-23 02:00:05');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('19', 'Product', 'admin/product', 'box', NULL, 'product.read', '0', NULL, '6', '2025-10-23 01:53:23', '2025-10-23 01:55:38');
INSERT INTO `menus` (`id`, `name`, `url`, `icon`, `parent_id`, `permission_name`, `is_protected`, `menu_group`, `sort_order`, `created_at`, `updated_at`) VALUES ('20', 'Backup & Restore', 'admin/backup-restore', 'circle-line', '2', 'backup-restore.read', '0', NULL, '0', '2025-10-24 12:48:26', '2025-10-24 12:48:26');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2025_08_01_070435_create_permission_tables', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2025_08_02_015410_create_menus_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2025_08_02_020004_create_profiles_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('7', '2025_10_17_004744_create_general_settings_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('8', '2025_10_17_005021_create_kategori_project_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('9', '2025_10_17_005035_create_kategori_berita_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('10', '2025_10_17_005822_create_clients_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('11', '2025_10_17_011057_create_services_table', '3');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('13', '2025_10_21_121241_create_kategori_stack_table', '4');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('14', '2025_10_21_125246_create_stacks_table', '5');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('15', '2025_10_22_002749_create_resumes_table', '6');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('16', '2025_10_22_021443_create_invoices_table', '7');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('17', '2025_10_23_014132_create_products_table', '8');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('18', '2025_10_24_004438_create_product_stack_table', '9');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('19', '2025_10_24_121438_create_projects_table', '10');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('20', '2025_10_24_124925_create_posts_table', '11');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('21', '2025_10_24_142542_create_faqs_table', '12');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('22', '2025_10_25_004315_create_testimonis_table', '13');

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES ('3', 'App\\Models\\User', '1');
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES ('2', 'App\\Models\\User', '2');

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('1', 'dashboard.read', 'web', '2025-08-15 12:57:45', '2025-10-06 14:09:01');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('2', 'settings.read', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('3', 'roles.create', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('4', 'roles.read', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('5', 'roles.update', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('6', 'roles.delete', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('7', 'users.read', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('8', 'users.create', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('9', 'users.update', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('10', 'users.delete', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('11', 'menus.create', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('12', 'menus.read', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('13', 'menus.update', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('14', 'menus.delete', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('15', 'profile.create', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('16', 'profile.read', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('17', 'profile.update', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('18', 'permissions.create', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('19', 'permissions.read', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('20', 'permissions.update', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('21', 'permissions.delete', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('26', 'kategori-project.create', 'web', '2025-10-20 13:13:53', '2025-10-20 13:13:53');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('27', 'kategori-project.read', 'web', '2025-10-20 13:13:53', '2025-10-20 13:13:53');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('28', 'kategori-project.update', 'web', '2025-10-20 13:13:53', '2025-10-20 13:13:53');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('29', 'kategori-project.delete', 'web', '2025-10-20 13:13:53', '2025-10-20 13:13:53');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('30', 'kategori-berita.create', 'web', '2025-10-20 14:07:23', '2025-10-20 14:07:23');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('31', 'kategori-berita.read', 'web', '2025-10-20 14:07:23', '2025-10-20 14:07:23');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('32', 'kategori-berita.update', 'web', '2025-10-20 14:07:23', '2025-10-20 14:07:23');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('33', 'kategori-berita.delete', 'web', '2025-10-20 14:07:23', '2025-10-20 14:07:23');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('34', 'client.create', 'web', '2025-10-21 00:26:53', '2025-10-21 00:26:53');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('35', 'client.read', 'web', '2025-10-21 00:26:53', '2025-10-21 00:26:53');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('36', 'client.update', 'web', '2025-10-21 00:26:53', '2025-10-21 00:26:53');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('37', 'client.delete', 'web', '2025-10-21 00:26:53', '2025-10-21 00:26:53');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('38', 'services.create', 'web', '2025-10-21 09:53:09', '2025-10-21 09:53:09');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('39', 'services.read', 'web', '2025-10-21 09:53:10', '2025-10-21 09:53:10');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('40', 'services.update', 'web', '2025-10-21 09:53:10', '2025-10-21 09:53:10');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('41', 'services.delete', 'web', '2025-10-21 09:53:10', '2025-10-21 09:53:10');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('42', 'kategori-stack.create', 'web', '2025-10-21 12:15:16', '2025-10-21 12:15:16');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('43', 'kategori-stack.read', 'web', '2025-10-21 12:15:16', '2025-10-21 12:15:16');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('44', 'kategori-stack.update', 'web', '2025-10-21 12:15:16', '2025-10-21 12:15:16');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('45', 'kategori-stack.delete', 'web', '2025-10-21 12:15:16', '2025-10-21 12:15:16');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('46', 'stack.create', 'web', '2025-10-21 12:56:04', '2025-10-21 12:56:04');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('47', 'stack.read', 'web', '2025-10-21 12:56:04', '2025-10-21 12:56:04');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('48', 'stack.update', 'web', '2025-10-21 12:56:04', '2025-10-21 12:56:04');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('49', 'stack.delete', 'web', '2025-10-21 12:56:04', '2025-10-21 12:56:04');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('50', 'resume.create', 'web', '2025-10-22 00:48:15', '2025-10-22 00:48:15');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('51', 'resume.read', 'web', '2025-10-22 00:48:15', '2025-10-22 00:48:15');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('52', 'resume.update', 'web', '2025-10-22 00:48:15', '2025-10-22 00:48:15');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('53', 'resume.delete', 'web', '2025-10-22 00:48:15', '2025-10-22 00:48:15');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('54', 'invoice.create', 'web', '2025-10-22 02:23:19', '2025-10-22 02:23:19');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('55', 'invoice.read', 'web', '2025-10-22 02:23:19', '2025-10-22 02:23:19');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('56', 'invoice.update', 'web', '2025-10-22 02:23:19', '2025-10-22 02:23:19');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('57', 'invoice.delete', 'web', '2025-10-22 02:23:19', '2025-10-22 02:23:19');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('58', 'product.create', 'web', '2025-10-23 01:52:06', '2025-10-23 01:52:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('59', 'product.read', 'web', '2025-10-23 01:52:07', '2025-10-23 01:52:07');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('60', 'product.update', 'web', '2025-10-23 01:52:07', '2025-10-23 01:52:07');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('61', 'product.delete', 'web', '2025-10-23 01:52:07', '2025-10-23 01:52:07');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('62', 'project.create', 'web', '2025-10-24 12:20:28', '2025-10-24 12:20:28');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('63', 'project.read', 'web', '2025-10-24 12:20:28', '2025-10-24 12:20:28');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('64', 'project.update', 'web', '2025-10-24 12:20:28', '2025-10-24 12:20:28');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('65', 'project.delete', 'web', '2025-10-24 12:20:28', '2025-10-24 12:20:28');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('66', 'backup-restore.create', 'web', '2025-10-24 12:47:50', '2025-10-24 12:47:50');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('67', 'backup-restore.read', 'web', '2025-10-24 12:47:50', '2025-10-24 12:47:50');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('68', 'backup-restore.update', 'web', '2025-10-24 12:47:50', '2025-10-24 12:47:50');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('69', 'backup-restore.delete', 'web', '2025-10-24 12:47:50', '2025-10-24 12:47:50');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('70', 'post.create', 'web', '2025-10-24 13:27:43', '2025-10-24 13:27:43');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('71', 'post.read', 'web', '2025-10-24 13:27:43', '2025-10-24 13:27:43');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('72', 'post.update', 'web', '2025-10-24 13:27:43', '2025-10-24 13:27:43');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('73', 'post.delete', 'web', '2025-10-24 13:27:43', '2025-10-24 13:27:43');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('74', 'faq.create', 'web', '2025-10-24 14:34:24', '2025-10-24 14:34:24');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('75', 'faq.read', 'web', '2025-10-24 14:34:24', '2025-10-24 14:34:24');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('76', 'faq.update', 'web', '2025-10-24 14:34:24', '2025-10-24 14:34:24');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('77', 'faq.delete', 'web', '2025-10-24 14:34:24', '2025-10-24 14:34:24');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('78', 'testimoni.create', 'web', '2025-10-25 01:01:57', '2025-10-25 01:02:49');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('79', 'testimoni.read', 'web', '2025-10-25 01:01:57', '2025-10-25 01:02:52');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('80', 'testimoni.update', 'web', '2025-10-25 01:01:57', '2025-10-25 01:02:55');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('81', 'testimoni.delete', 'web', '2025-10-25 01:01:57', '2025-10-25 01:02:51');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` int unsigned DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint unsigned DEFAULT NULL,
  `is_slider` tinyint NOT NULL DEFAULT '0',
  `views` int unsigned NOT NULL DEFAULT '0',
  `likes` int unsigned NOT NULL DEFAULT '0',
  `comments_count` int unsigned NOT NULL DEFAULT '0',
  `shares` int unsigned NOT NULL DEFAULT '0',
  `published_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_author_id_foreign` (`author_id`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `judul`, `slug`, `excerpt`, `kategori_id`, `isi`, `tag`, `thumbnail`, `author_id`, `is_slider`, `views`, `likes`, `comments_count`, `shares`, `published_at`, `deleted_at`, `created_at`, `updated_at`) VALUES ('1', 'ini adalah post pertama', 'ini-adalah-post-pertama', 'ini adalah contoh post yg sudah kita tambahkan tags dan post', '1', 'ini adalah contoh post yg sudah kita tambahkan tags dan post', 'tambahkan tags', '1761315842.png', '1', '1', '0', '0', '0', '0', NULL, NULL, '2025-10-24 13:32:37', '2025-10-24 14:24:02');
INSERT INTO `posts` (`id`, `judul`, `slug`, `excerpt`, `kategori_id`, `isi`, `tag`, `thumbnail`, `author_id`, `is_slider`, `views`, `likes`, `comments_count`, `shares`, `published_at`, `deleted_at`, `created_at`, `updated_at`) VALUES ('4', 'ini adalah contoh post lengkap dengan tagnya', 'ini-adalah-contoh-post-lengkap-dengan-tagnya', NULL, '1', '<p>contoh post dengan tag</p>', 'post,kedua', '1761315150.png', '1', '1', '0', '0', '0', '0', NULL, NULL, '2025-10-24 14:02:29', '2025-10-24 14:17:51');

DROP TABLE IF EXISTS `product_stack`;
CREATE TABLE `product_stack` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` tinyint unsigned NOT NULL,
  `stack_id` tinyint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_stack` (`id`, `product_id`, `stack_id`, `created_at`, `updated_at`) VALUES ('6', '14', '1', NULL, NULL);
INSERT INTO `product_stack` (`id`, `product_id`, `stack_id`, `created_at`, `updated_at`) VALUES ('7', '14', '2', NULL, NULL);
INSERT INTO `product_stack` (`id`, `product_id`, `stack_id`, `created_at`, `updated_at`) VALUES ('8', '14', '3', NULL, NULL);
INSERT INTO `product_stack` (`id`, `product_id`, `stack_id`, `created_at`, `updated_at`) VALUES ('11', '14', '4', NULL, NULL);
INSERT INTO `product_stack` (`id`, `product_id`, `stack_id`, `created_at`, `updated_at`) VALUES ('12', '15', '1', NULL, NULL);
INSERT INTO `product_stack` (`id`, `product_id`, `stack_id`, `created_at`, `updated_at`) VALUES ('13', '15', '2', NULL, NULL);
INSERT INTO `product_stack` (`id`, `product_id`, `stack_id`, `created_at`, `updated_at`) VALUES ('14', '15', '4', NULL, NULL);
INSERT INTO `product_stack` (`id`, `product_id`, `stack_id`, `created_at`, `updated_at`) VALUES ('15', '15', '3', NULL, NULL);
INSERT INTO `product_stack` (`id`, `product_id`, `stack_id`, `created_at`, `updated_at`) VALUES ('16', '15', '5', NULL, NULL);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `nama`, `slug`, `deskripsi`, `thumbnail`, `harga`, `link`, `created_at`, `updated_at`) VALUES ('14', 'produk pertama', 'produk-pertama', '<p>ini adalah contoh produk pertama</p><p><br></p><p>update</p>', '1761289178.png', '1500.00', 'Local Link', '2025-10-24 06:10:57', '2025-10-24 07:10:00');
INSERT INTO `products` (`id`, `nama`, `slug`, `deskripsi`, `thumbnail`, `harga`, `link`, `created_at`, `updated_at`) VALUES ('15', 'contoh produk kedua', 'contoh-produk-kedua', '<p>ini adalah contoh produk kedua</p>', NULL, '1500.00', 'Local', '2025-10-24 07:09:27', '2025-10-24 07:09:27');

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `profiles` (`id`, `nama`, `tagline`, `direktur`, `alamat`, `kota`, `maps`, `telp`, `hp`, `email`, `website`, `video_url`, `instagram`, `facebook`, `youtube`, `tiktok`, `isi`, `logo`, `cover`, `hero`, `pdf`, `created_at`, `updated_at`) VALUES ('1', 'Bucu Media', 'Let The Expert\'s Work', 'Haldi a.ka. Mr. Nobody', 'Jl. Ahmad Yani No. 9 Selasalas, Sandubaya, Mataram', 'Mataram', NULL, '087863657121', NULL, 'info@bucumedia.id', 'bucumedia.id', NULL, NULL, NULL, NULL, NULL, '<p>ini adalah profile</p>', 'Bucu Media_logo.png', 'default-cover.jpg', 'Bucu Media_hero.png', NULL, '2025-08-15 12:57:45', '2025-10-23 10:19:16');

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `client_id` tinyint unsigned DEFAULT NULL,
  `category_id` tinyint unsigned DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `resumes`;
CREATE TABLE `resumes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `mulai_dari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sampai_dengan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `resumes` (`id`, `judul`, `lokasi`, `deskripsi`, `mulai_dari`, `sampai_dengan`, `jenis`, `created_at`, `updated_at`) VALUES ('1', 'IT Support', 'RS. Harapan Keluarga', 'bla bla', '2016', 'Sekarang', 'profesional', '2025-10-22 01:14:01', '2025-10-22 01:17:25');

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('1', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('2', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('3', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('4', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('5', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('6', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('7', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('8', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('9', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('10', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('11', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('12', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('13', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('14', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('15', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('16', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('17', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('18', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('19', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('20', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('21', '1');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('1', '2');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('1', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('2', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('3', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('4', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('5', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('6', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('7', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('8', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('9', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('10', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('11', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('12', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('13', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('14', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('15', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('16', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('17', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('18', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('19', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('20', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('21', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('26', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('27', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('28', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('29', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('30', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('31', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('32', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('33', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('34', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('35', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('36', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('37', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('38', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('39', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('40', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('41', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('42', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('43', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('44', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('45', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('46', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('47', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('48', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('49', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('50', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('51', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('52', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('53', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('54', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('55', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('56', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('57', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('58', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('59', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('60', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('61', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('62', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('63', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('64', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('65', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('66', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('67', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('68', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('69', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('70', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('71', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('72', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('73', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('74', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('75', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('76', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('77', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('78', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('79', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('80', '3');
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('81', '3');

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('1', 'admin', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('2', 'user', 'web', '2025-08-15 12:57:45', '2025-08-15 12:57:45');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES ('3', 'superadmin', 'web', '2025-10-06 21:36:26', '2025-10-06 21:36:26');

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `judul`, `slug`, `deskripsi`, `icon`, `thumbnail`, `isi`, `created_at`, `updated_at`) VALUES ('2', 'Digital Solutions', 'digital-solutions', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa.', 'stack', NULL, NULL, '2025-10-21 12:28:22', '2025-10-21 12:36:15');
INSERT INTO `services` (`id`, `judul`, `slug`, `deskripsi`, `icon`, `thumbnail`, `isi`, `created_at`, `updated_at`) VALUES ('3', 'Secure Systems', 'secure-systems', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.', 'shield-check', NULL, NULL, '2025-10-21 12:28:43', '2025-10-21 12:37:03');
INSERT INTO `services` (`id`, `judul`, `slug`, `deskripsi`, `icon`, `thumbnail`, `isi`, `created_at`, `updated_at`) VALUES ('4', 'Growth Strategy', 'growth-strategy', 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel illum qui dolorem.', 'graph-up', NULL, NULL, '2025-10-21 12:29:01', '2025-10-21 12:37:16');
INSERT INTO `services` (`id`, `judul`, `slug`, `deskripsi`, `icon`, `thumbnail`, `isi`, `created_at`, `updated_at`) VALUES ('5', 'AI Integration', 'ai-integration', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione.', 'cpu', NULL, NULL, '2025-10-21 12:29:19', '2025-10-21 12:37:27');
INSERT INTO `services` (`id`, `judul`, `slug`, `deskripsi`, `icon`, `thumbnail`, `isi`, `created_at`, `updated_at`) VALUES ('6', 'Cloud Services', 'cloud-services', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos.', 'cloud-arrow-up', NULL, NULL, '2025-10-21 12:29:37', '2025-10-21 12:37:41');
INSERT INTO `services` (`id`, `judul`, `slug`, `deskripsi`, `icon`, `thumbnail`, `isi`, `created_at`, `updated_at`) VALUES ('7', 'Process Automation', 'process-automation', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.', 'gear', NULL, NULL, '2025-10-21 12:29:54', '2025-10-21 12:37:53');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('4DKUCbjMfgZOGUApl6SHwpnjvLaSn65F5gRuRpks', '1', '10.99.19.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieFBYaU9rYUkyMVlxeW9SVVNsUFZjR3NYNExGclBZTmpPYmdUc1NNRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMC45OS4xOS44MDo4MDAwL2FkbWluL2JhY2t1cC1yZXN0b3JlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', '1761368144');
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('Oa2QRgggPnr0lgoF3KPxqRr4mULv1dcBCCKOi2vt', '1', '10.99.19.49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaE5qM2RFV095YjM0b1lMZEtDYTQxdUpQZTczdzFjd0o5YUYzUmlmMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMC45OS4xOS44MDo4MDAwL2FkbWluL3Rlc3RpbW9uaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', '1761360694');

DROP TABLE IF EXISTS `stacks`;
CREATE TABLE `stacks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int NOT NULL,
  `kategori_id` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `stacks` (`id`, `nama`, `nilai`, `kategori_id`, `created_at`, `updated_at`) VALUES ('1', 'HTML/CSS', '90', '1', '2025-10-21 13:12:12', '2025-10-21 13:12:12');
INSERT INTO `stacks` (`id`, `nama`, `nilai`, `kategori_id`, `created_at`, `updated_at`) VALUES ('2', 'JavaScript', '75', '1', '2025-10-21 13:13:09', '2025-10-21 13:13:09');
INSERT INTO `stacks` (`id`, `nama`, `nilai`, `kategori_id`, `created_at`, `updated_at`) VALUES ('3', 'Livewire', '50', '1', '2025-10-21 13:13:37', '2025-10-21 13:13:37');
INSERT INTO `stacks` (`id`, `nama`, `nilai`, `kategori_id`, `created_at`, `updated_at`) VALUES ('4', 'Laravel', '90', '2', '2025-10-21 13:13:53', '2025-10-21 13:13:53');
INSERT INTO `stacks` (`id`, `nama`, `nilai`, `kategori_id`, `created_at`, `updated_at`) VALUES ('5', 'MySQL', '90', '2', '2025-10-21 13:14:27', '2025-10-21 13:14:27');

DROP TABLE IF EXISTS `testimonis`;
CREATE TABLE `testimonis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimoni` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `testimonis` (`id`, `nama`, `pekerjaan`, `testimoni`, `foto`, `rating`, `created_at`, `updated_at`) VALUES ('1', 'Halidi', 'IT Support', 'ini contoh testimoni', '1761354419.png', '4', '2025-10-25 01:06:59', '2025-10-25 01:06:59');
INSERT INTO `testimonis` (`id`, `nama`, `pekerjaan`, `testimoni`, `foto`, `rating`, `created_at`, `updated_at`) VALUES ('2', 'halidi', 'co workers', 'ini adalah contoh testimoni', '1761361175.png', '4', '2025-10-25 02:59:35', '2025-10-25 03:13:11');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `is_active`, `profile_picture`, `bio`, `last_login_at`, `last_login_ip`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Superadmin', 'superadmin', NULL, '$2y$12$aez3VJqFuTvXizS0CbyRceCARVq0ZvsYy0OEe41TjvngHQEsglIdq', '1', '1759808451.png', NULL, NULL, NULL, '3', NULL, '2025-08-15 12:57:45', '2025-10-20 13:52:29');
INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `is_active`, `profile_picture`, `bio`, `last_login_at`, `last_login_ip`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES ('2', 'Halidi', 'halidi', NULL, '$2y$12$/0C/E8uUVfN.wUu0ecvcKuBKgAxwmwz4M9eSAUDn8sM6yM8Z/eYfG', '1', NULL, NULL, NULL, NULL, '2', NULL, '2025-10-07 13:51:38', '2025-10-07 13:51:38');

