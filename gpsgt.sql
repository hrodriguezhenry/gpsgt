-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.33 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para gpsgt
DROP DATABASE IF EXISTS `gpsgt`;
CREATE DATABASE IF NOT EXISTS `gpsgt` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gpsgt`;

-- Volcando estructura para tabla gpsgt.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int unsigned NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT (now()),
  `created_by` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gpsgt.product: ~3 rows (aproximadamente)
DELETE FROM `product`;
INSERT INTO `product` (`id`, `name`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
	(1, 'GPS3G', 1, '2024-05-29 10:37:49', 1, '2024-05-29 10:37:49', 1, NULL, NULL),
	(2, 'GPS4G', 1, '2024-05-29 10:37:58', 1, '2024-05-29 10:37:58', 1, NULL, NULL),
	(3, 'GPS4G Motocicleta', 1, '2024-05-29 10:38:14', 1, '2024-05-29 10:38:14', 1, NULL, NULL);

-- Volcando estructura para tabla gpsgt.reservation
DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` int unsigned NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_id` int unsigned NOT NULL,
  `product_quantity` int unsigned NOT NULL,
  `reservation_hour_id` int unsigned DEFAULT NULL,
  `reservation_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT (now()),
  `created_by` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservation_product` (`product_id`),
  CONSTRAINT `fk_reservation_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gpsgt.reservation: ~8 rows (aproximadamente)
DELETE FROM `reservation`;
INSERT INTO `reservation` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `product_id`, `product_quantity`, `reservation_hour_id`, `reservation_date`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
	(1, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, '2 Calle 1-25 Zona 8, San Miguel Petapa, Guatemala', 1, 1, 1, '2024-05-30', '2024-05-30 18:37:19', 1, '2024-05-30 18:37:19', 1, NULL, NULL),
	(2, 'Henry', 'Rodriguez', 'hrodriguezhenry@gmail.com', 54573864, 'Lote 144 La Linea', 1, 2, 2, '2024-05-31', '2024-05-30 18:49:36', 1, '2024-05-30 18:49:36', 1, NULL, NULL),
	(3, 'Henry', 'Rodriguez', 'hrodriguezhenry@gmail.com', 54573864, 'Lote 144 La Linea', 2, 4, 2, '2024-05-30', '2024-05-30 18:56:15', 1, '2024-05-30 18:56:15', 1, NULL, NULL),
	(4, 'Javier', 'Rodríguez', 'henry@gmail.com', 54573864, '2 Calle 1-25 Zona 8, San Miguel Petapa, Guatemala', 3, 5, 1, '2024-06-01', '2024-05-30 18:57:51', 1, '2024-06-01 23:53:03', 1, '2024-06-01 23:53:03', 1),
	(5, 'Juan', 'Perez', 'jperez@gmail.com', 54573864, '2 Calle 1-25 Zona 8, San Miguel Petapa, Guatemala', 3, 5, 2, '2024-06-01', '2024-05-30 18:58:00', 1, '2024-06-01 23:53:51', 1, '2024-06-01 23:53:51', 1),
	(6, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, 'Villa Canales', 3, 5, 1, '2024-06-15', '2024-05-30 18:58:00', 1, '2024-06-02 01:13:10', 1, NULL, NULL),
	(7, 'Carlos', 'Lopez', 'clopez@gmail.com', 87654567, 'San Miguel Petapa, Guatemala', 3, 5, 4, '2024-06-01', '2024-05-30 18:58:00', 1, '2024-06-01 23:57:01', 1, NULL, NULL),
	(8, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, '2 Calle 1-25 Zona 8, San Miguel Petapa, Guatemala', 3, 5, 5, '2024-06-01', '2024-05-30 18:58:00', 1, '2024-05-30 21:45:58', 1, NULL, NULL),
	(9, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, 'Villa Canales', 3, 3, 1, '2024-06-02', '2024-06-01 14:48:32', 1, '2024-06-02 01:13:30', 1, '2024-06-02 01:13:30', 1),
	(10, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, 'Villa Canales', 2, 3, 2, '2024-06-02', '2024-06-01 14:50:23', 1, '2024-06-02 01:13:34', 1, '2024-06-02 01:13:34', 1),
	(11, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, 'Villa Canales', 3, 4, 3, '2024-06-02', '2024-06-01 15:24:56', 1, '2024-06-02 01:51:19', 1, NULL, NULL),
	(12, 'Javier', 'Geronimo', 'hrodriguezhenry@gmail.com', 54573864, 'Lote 144 La Linea', 2, 3, 5, '2024-06-03', '2024-06-01 16:29:19', 1, '2024-06-01 16:29:19', 1, NULL, NULL),
	(13, 'Henry', 'Rodriguez', 'hrodriguezhenrys@gmail.com', 54573864, 'Lote 144 La Linea', 2, 3, 1, '2024-06-03', '2024-06-01 16:34:38', 1, '2024-06-01 16:34:38', 1, NULL, NULL),
	(14, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, 'Villa Canales', 3, 3, 1, '2024-06-14', '2024-06-01 16:49:11', 1, '2024-06-01 16:49:11', 1, NULL, NULL),
	(16, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, 'Boca del monte', 3, 5, 5, '2024-06-02', '2024-06-01 20:31:48', 1, '2024-06-02 00:00:44', 1, NULL, NULL),
	(19, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, 'Villa Canales', 2, 1, 4, '2024-06-02', '2024-06-01 21:46:50', 1, '2024-06-02 01:55:26', 1, '2024-06-02 01:55:26', 1),
	(20, 'Carlos', 'Dominguez', 'cdominguez@gmail.com', 2541123, 'Villa Nueva', 2, 1, 1, '2024-06-04', '2024-06-01 21:54:36', 1, '2024-06-01 21:54:36', 1, NULL, NULL),
	(21, 'Juan', 'Perez', 'jperez@gmail.com', 23658456, 'Petapa', 2, 1, 4, '2024-06-04', '2024-06-01 21:55:23', 1, '2024-06-01 21:55:23', 1, NULL, NULL);

-- Volcando estructura para tabla gpsgt.reservation_hour
DROP TABLE IF EXISTS `reservation_hour`;
CREATE TABLE IF NOT EXISTS `reservation_hour` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hour_order` int unsigned DEFAULT '0',
  `active` int unsigned NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT (now()),
  `created_by` int unsigned NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int unsigned NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gpsgt.reservation_hour: ~5 rows (aproximadamente)
DELETE FROM `reservation_hour`;
INSERT INTO `reservation_hour` (`id`, `name`, `hour_order`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
	(1, '10:00am', 1, 1, '2024-05-30 17:29:44', 1, '2024-05-31 13:41:03', 1, NULL, NULL),
	(2, '11:30am', 2, 1, '2024-05-30 17:29:44', 1, '2024-05-31 13:41:04', 1, NULL, NULL),
	(3, '01:00pm', 3, 1, '2024-05-30 17:29:44', 1, '2024-05-31 13:41:04', 1, NULL, NULL),
	(4, '02:30pm', 4, 1, '2024-05-30 17:29:44', 1, '2024-05-31 13:41:05', 1, NULL, NULL),
	(5, '04:00pm', 5, 1, '2024-05-30 17:29:44', 1, '2024-05-31 13:41:07', 1, NULL, NULL);

-- Volcando estructura para tabla gpsgt.role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `view_id` int unsigned NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT (now()),
  `created_by` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_role_view` (`view_id`),
  CONSTRAINT `fk_role_view` FOREIGN KEY (`view_id`) REFERENCES `view` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gpsgt.role: ~2 rows (aproximadamente)
DELETE FROM `role`;
INSERT INTO `role` (`id`, `view_id`, `name`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
	(1, 1, 'Administrador', 1, '2024-05-21 19:00:41', 1, '2024-06-02 00:59:28', 1, NULL, NULL),
	(2, 2, 'Usuario', 1, '2024-05-23 18:05:01', 1, '2024-06-02 00:59:33', 1, NULL, NULL);

-- Volcando estructura para tabla gpsgt.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL DEFAULT '2',
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` int DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT (now()),
  `created_by` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role` (`role_id`) USING BTREE,
  CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gpsgt.user: ~5 rows (aproximadamente)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `role_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `address`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
	(1, 1, 'Administrador', '', 'admin@gpsgt', NULL, '487edeab14b06207ea401d488a42a9d8c4f58b5661e43ff4f7630ef266f3452e', NULL, 1, '2024-05-21 19:02:10', 1, '2024-06-02 01:54:32', 1, NULL, NULL),
	(2, 2, 'Henry', 'Rodríguez', 'hrodriguezhenry@gmail.com', 54573864, '487edeab14b06207ea401d488a42a9d8c4f58b5661e43ff4f7630ef266f3452e', 'Villa Canales', 1, '2024-05-23 19:42:32', 1, '2024-05-23 19:43:01', 1, NULL, NULL),
	(3, 2, 'Henry', 'Rodriguez', 'hrodriguezhenrys@gmail.com', 54573864, '487edeab14b06207ea401d488a42a9d8c4f58b5661e43ff4f7630ef266f3452e', 'Lote 144 La Linea', 1, '2024-06-01 16:33:38', 1, '2024-06-01 16:33:38', 1, NULL, NULL),
	(4, 2, 'Henry', 'Rodriguez', 'hrodriguezhenrya@gmail.com', 54573864, '487edeab14b06207ea401d488a42a9d8c4f58b5661e43ff4f7630ef266f3452e', 'Lote 144 La Linea', 1, '2024-06-01 17:04:25', 1, '2024-06-02 01:55:22', 1, '2024-06-02 01:55:22', 1),
	(5, 2, 'Juan', 'Perez', 'jperez@gmail.com', 23658456, 'cc9862d265ac0ff9ca7a46e4f0ff2adabc3399133d7134724d45bd0ec48a764c', 'Petapa', 1, '2024-06-01 21:51:02', 1, '2024-06-01 21:51:02', 1, NULL, NULL);

-- Volcando estructura para tabla gpsgt.view
DROP TABLE IF EXISTS `view`;
CREATE TABLE IF NOT EXISTS `view` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT (now()),
  `created_by` int NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int NOT NULL DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gpsgt.view: ~2 rows (aproximadamente)
DELETE FROM `view`;
INSERT INTO `view` (`id`, `name`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
	(1, 'calendario', 1, '2024-05-21 18:59:55', 1, '2024-06-01 14:53:09', 1, NULL, NULL),
	(2, 'usuario', 1, '2024-05-23 18:04:24', 1, '2024-05-23 18:04:24', 1, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
