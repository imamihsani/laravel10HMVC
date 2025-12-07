/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `laravel10modular` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `laravel10modular`;

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(50) DEFAULT NULL,
  `permissions` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

REPLACE INTO `role` (`id`, `nama_role`, `permissions`, `created_at`, `updated_at`) VALUES
	(1, 'Superadmin', '["admin\\/admin\\/view","auth\\/login\\/show-login-form","auth\\/login\\/logout","pengguna\\/pengguna","pengguna\\/pengguna\\/create","pengguna\\/pengguna\\/store","pengguna\\/pengguna\\/show","profile\\/profile","superadmin\\/superadmin","superadmin\\/superadmin\\/view","superadmin\\/superadmin\\/role","superadmin\\/superadmin\\/store"]', NULL, '2025-12-07 09:41:08'),
	(2, 'Common User', '["profile\\/profile","profile\\/profile\\/upload","profile\\/profile\\/view","profile\\/profile\\/show","profile\\/profile\\/update","profile\\/profile\\/change"]', NULL, '2025-12-06 17:49:43');

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_sekolah` varchar(50) DEFAULT NULL,
  `id_qr` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `pp` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

REPLACE INTO `users` (`id`, `id_sekolah`, `id_qr`, `name`, `username`, `gender`, `email`, `email_verified_at`, `password`, `role`, `pp`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'SMKNUIM1-00000001', 'SUPERADMIN-00000001.0.25.S', 'Superadmin', 'superadmin', 'Laki-Laki', 'superadmin@example.com', NULL, '$2y$12$pbwyEGhHEIWjdaAXgN021u7TAOGgr7Ks1K5mdiiWba04EjU3hin0S', 'Superadmin', '1_20250914041630.jpg', NULL, '2025-05-13 06:55:03', '2025-09-13 21:16:30'),
	(2, NULL, NULL, 'Pengguna', 'pengguna', 'Laki-Laki', 'pengguna@example.com', NULL, '$2y$12$H/6eDdho891U6v.6Knt.Eu3t7u/BhHqoRJRB5N/cSmPxLc/tAnflm', 'Common User', '2_20251204135055.jpg', NULL, '2025-12-04 06:49:13', '2025-12-04 06:50:55'),
	(3, NULL, NULL, 'Pengguna 2', 'pengguna2', 'Laki-Laki', 'pengguna2@example.com', NULL, '$2y$12$nRDXudV33/O4qqfBoVteAeG8HXtzY5qY4bFENq4kSRN4eH7ZHjlgy', 'Common User', NULL, NULL, '2025-12-04 06:49:13', '2025-12-04 06:49:13'),
	(4, NULL, NULL, 'Pengguna 3', 'pengguna3', 'Laki-Laki', 'pengguna3@example.com', NULL, '$2y$12$MYP1MmO3K3mHx25Q5O/rhOfG8Byr0HMOrc3LDSAUzxlhQccv0ARxq', 'Common User', NULL, NULL, '2025-12-07 02:50:56', '2025-12-07 02:50:56');

CREATE TABLE IF NOT EXISTS `users_clean` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `password` varchar(100) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

REPLACE INTO `users_clean` (`id`, `id_user`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 1, 'superadmin', 'superadmin@example.com', '1q2w3e4r', '2025-09-14 05:22:31', '2025-09-14 05:22:32'),
	(2, 2, 'pengguna', 'pengguna@example.com', '1q2w3e4r', '2025-12-04 06:49:13', '2025-12-04 06:49:13'),
	(3, 3, 'pengguna2', 'pengguna2@example.com', '1q2w3e4r', '2025-12-04 06:49:13', '2025-12-04 06:49:13'),
	(4, 4, 'pengguna3', 'pengguna3@example.com', '1q2w3e4r', '2025-12-07 02:50:56', '2025-12-07 02:50:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
