-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for test-griya-net
CREATE DATABASE IF NOT EXISTS `test-griya-net` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `test-griya-net`;

-- Dumping structure for table test-griya-net.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(50) DEFAULT NULL,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `foto_ktp` binary(50) DEFAULT NULL,
  `foto_rumah` binary(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table test-griya-net.customers: ~2 rows (approximately)
INSERT INTO `customers` (`id`, `nama_customer`, `nomor_telepon`, `alamat`, `nama_paket`, `foto_ktp`, `foto_rumah`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Customer 1', '0748334782', 'Jl. Sukun', 'Home 1', NULL, NULL, 'Verified', NULL, '2024-02-12 01:31:48', '2024-02-11 19:24:26', NULL),
	(2, 'Customer 2', '083478947289', 'Jl. Jalan', 'Home 2', _binary 0x323032322d30362d32382e706e67000000000000000000000000000000000000000000000000000000000000000000000000, _binary 0x323032322d30372d3134202832292e706e670000000000000000000000000000000000000000000000000000000000000000, 'Verified', NULL, '2024-02-11 18:55:22', '2024-02-11 19:23:42', NULL);

-- Dumping structure for table test-griya-net.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test-griya-net.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table test-griya-net.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test-griya-net.migrations: ~4 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table test-griya-net.paket_penjualan
CREATE TABLE IF NOT EXISTS `paket_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(50) DEFAULT NULL,
  `harga_paket` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_paket` (`nama_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table test-griya-net.paket_penjualan: ~3 rows (approximately)
INSERT INTO `paket_penjualan` (`id`, `nama_paket`, `harga_paket`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Home 1', 100000, '2024-02-12 01:32:08', '2024-02-12 01:32:09', NULL),
	(2, 'Home 2', 150000, '2024-02-12 01:32:08', '2024-02-12 01:32:09', NULL),
	(3, 'Home 3', 200000, '2024-02-12 01:32:08', '2024-02-12 01:32:09', NULL);

-- Dumping structure for table test-griya-net.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test-griya-net.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table test-griya-net.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test-griya-net.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table test-griya-net.report
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_name` varchar(50) DEFAULT NULL,
  `report_view` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table test-griya-net.report: ~1 rows (approximately)
INSERT INTO `report` (`id`, `report_name`, `report_view`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Report All Sales', 'report/allsales', '2024-02-12 02:28:24', '2024-02-12 02:28:25', NULL);

-- Dumping structure for table test-griya-net.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nip` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('sales','admin') NOT NULL DEFAULT 'sales',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_nip_unique` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test-griya-net.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `nip`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@mail.com', '1234567890', NULL, '$2y$12$88pun/eboAPCOFmjF.NdSePNJUAR3uQ7533KXB6jhl1P4BEvoQSKi', 'admin', NULL, '2024-02-11 18:32:55', '2024-02-11 18:32:55'),
	(2, 'Sales 1', NULL, '987654321', NULL, '$2y$12$taQ5aVk3m80SCjz7XdrtVeqQkxaO49.EACIRQRQdK4.1V1cGi67S.', 'sales', NULL, '2024-02-11 18:34:08', '2024-02-11 18:34:08');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
