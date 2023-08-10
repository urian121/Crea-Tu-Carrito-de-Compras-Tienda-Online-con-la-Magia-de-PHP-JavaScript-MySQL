-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bd_tienda_online
CREATE DATABASE IF NOT EXISTS `bd_tienda_online` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bd_tienda_online`;

-- Volcando estructura para tabla bd_tienda_online.fotoproducts
CREATE TABLE IF NOT EXISTS `fotoproducts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `products_id` int DEFAULT NULL,
  `foto1` varchar(100) DEFAULT NULL,
  `foto2` varchar(100) DEFAULT NULL,
  `foto3` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_tienda_online.fotoproducts: ~8 rows (aproximadamente)
INSERT INTO `fotoproducts` (`id`, `products_id`, `foto1`, `foto2`, `foto3`) VALUES
	(1, 1, 'fotosProductos/1/1.jpg', 'fotosProductos/1/2.jpg', 'fotosProductos/1/3.jpg'),
	(2, 2, 'fotosProductos/2/1.jpg', 'fotosProductos/2/2.png', 'fotosProductos/2/3.png'),
	(3, 3, 'fotosProductos/3/1.jpg', 'fotosProductos/3/2.png', 'fotosProductos/3/3.jpeg'),
	(4, 8, 'fotosProductos/4/1.jpg', 'fotosProductos/4/2.png', 'fotosProductos/4/3.jpg'),
	(5, 6, 'fotosProductos/5/1.jpg', 'fotosProductos/5/2.png', 'fotosProductos/5/3.jpg'),
	(6, 4, 'fotosProductos/6/1.jpg', 'fotosProductos/6/2.jpg', 'fotosProductos/6/3.png'),
	(7, 5, 'fotosProductos/7/1.jpg', 'fotosProductos/7/2.jpg', 'fotosProductos/7/3.jpg'),
	(8, 7, 'fotosProductos/8/1.jpg', 'fotosProductos/8/2.jpg', 'fotosProductos/8/3.jpg'),
	(9, 8, 'fotosProductos/9/1.webp', 'fotosProductos/9/2.webp', 'fotosProductos/9/3.webp'),
	(10, 9, 'fotosProductos/10/1.webp', 'fotosProductos/10/2.webp', 'fotosProductos/10/3.webp'),
	(11, 10, 'fotosProductos/11/1.webp', 'fotosProductos/11/2.webp', 'fotosProductos/11/3.webp'),
	(12, 11, 'fotosProductos/12/1.webp', 'fotosProductos/12/2.webp', 'fotosProductos/12/3.webp'),
	(13, 12, 'fotosProductos/13/1.webp', 'fotosProductos/13/2.webp', 'fotosProductos/13/3.webp'),
	(14, 14, 'fotosProductos/14/1.webp', 'fotosProductos/14/2.webp', 'fotosProductos/14/3.webp'),
	(15, 16, 'fotosProductos/15/1.webp', 'fotosProductos/15/2.webp', 'fotosProductos/15/3.webp'),
	(16, 13, 'fotosProductos/16/1.webp', 'fotosProductos/16/2.webp', 'fotosProductos/16/3.webp');

-- Volcando estructura para tabla bd_tienda_online.pedidostemporales
CREATE TABLE IF NOT EXISTS `pedidostemporales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `producto_id` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `nuevoPrecioTotal` int DEFAULT NULL,
  `tokenCliente` varchar(100) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_tienda_online.pedidostemporales: ~7 rows (aproximadamente)
INSERT INTO `pedidostemporales` (`id`, `producto_id`, `cantidad`, `nuevoPrecioTotal`, `tokenCliente`, `fecha`) VALUES
	(1, 7, 2, 170000, '3U336aJ0yiBxc3v3bmf3MDuv7nYRUYZa', '2023-08-10 06:25:01'),
	(2, 2, 21, 7140000, '3U336aJ0yiBxc3v3bmf3MDuv7nYRUYZa', '2023-08-10 06:40:39'),
	(3, 8, 1, 340000, '3U336aJ0yiBxc3v3bmf3MDuv7nYRUYZa', '2023-08-10 06:40:54'),
	(4, 3, 1, 70000, '3U336aJ0yiBxc3v3bmf3MDuv7nYRUYZa', '2023-08-10 07:09:34'),
	(5, 2, 13, 4420000, '7W8fKYnAP7DU2cg4kd4ZyA697eHaQrMw', '2023-08-10 07:34:10'),
	(6, 8, 12, 4080000, '7W8fKYnAP7DU2cg4kd4ZyA697eHaQrMw', '2023-08-10 07:36:48'),
	(7, 5, 1, 50000, '7W8fKYnAP7DU2cg4kd4ZyA697eHaQrMw', '2023-08-10 07:50:27'),
	(8, 4, 2, 280000, '9duZ68e6EvEUT0kPVHiu4Aaf4YMZMj9E', '2023-08-10 14:27:52'),
	(9, 3, 15, 70000, 'Auw49n7FGCJVV0yGvmXuhnmMi0vhvupQ', '2023-08-10 14:31:32'),
	(10, 3, 12, 70000, 'q6RF3vUtqwaQCuibpFXvntmYAcxQ39hy', '2023-08-10 14:37:17'),
	(11, 1, 4, 750000, 'JDEiFat0wJgRnFD8vmQewZzbMbr7ir90', '2023-08-10 14:56:49'),
	(12, 6, 5, 25000, 'JDEiFat0wJgRnFD8vmQewZzbMbr7ir90', '2023-08-10 15:04:11'),
	(13, 5, 1, 50000, 'JDEiFat0wJgRnFD8vmQewZzbMbr7ir90', '2023-08-10 15:04:13'),
	(14, 7, 3, 85000, 'JDEiFat0wJgRnFD8vmQewZzbMbr7ir90', '2023-08-10 15:04:14'),
	(15, 3, 0, 70000, 'JDEiFat0wJgRnFD8vmQewZzbMbr7ir90', '2023-08-10 15:04:16'),
	(16, 8, 0, 340000, 'JDEiFat0wJgRnFD8vmQewZzbMbr7ir90', '2023-08-10 15:26:14'),
	(17, 14, 1, 360230, 'JDEiFat0wJgRnFD8vmQewZzbMbr7ir90', '2023-08-10 16:14:54');

-- Volcando estructura para tabla bd_tienda_online.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameProd` varchar(250) DEFAULT NULL,
  `precio` varchar(250) DEFAULT NULL,
  `cantidadDisponible` varchar(250) DEFAULT NULL,
  `descrip_Prod` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_tienda_online.products: ~8 rows (aproximadamente)
INSERT INTO `products` (`id`, `nameProd`, `precio`, `cantidadDisponible`, `descrip_Prod`) VALUES
	(1, 'Donka', '250000', '10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
	(2, 'Alimento nutricional', '340000', '34', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.""""'),
	(3, 'Pedigree', '70000', '82', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
	(4, 'Chunky', '140000', '14', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
	(5, 'Purina Cat', '50000', '63', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
	(6, 'Felix', '25000', '18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
	(7, 'Ringo', '85000', '12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
	(8, 'Gatsy', '340000', '34', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
	(9, 'Besties', '45000', '10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
	(10, 'Cachorro', '125000', '84', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
	(11, 'True Nature', '95000', '14', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
	(12, 'Nutrique', '284200', '56', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
	(13, 'Nutrique Cat', '123250', '36', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
	(14, 'Purina Proplan', '360230', '41', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
	(15, 'Furry Blue Label', '36200', '36', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
	(16, 'Purina Cat Chow', '190000', '84', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
