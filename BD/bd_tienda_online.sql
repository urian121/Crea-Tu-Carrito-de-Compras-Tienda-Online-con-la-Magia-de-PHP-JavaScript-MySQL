-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-08-2023 a las 06:14:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoproducts`
--

CREATE TABLE `fotoproducts` (
  `id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `foto1` varchar(100) DEFAULT NULL,
  `foto2` varchar(100) DEFAULT NULL,
  `foto3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fotoproducts`
--

INSERT INTO `fotoproducts` (`id`, `products_id`, `foto1`, `foto2`, `foto3`) VALUES
(1, 1, 'fotosProductos/1/1.jpg', 'fotosProductos/1/2.jpg', 'fotosProductos/1/3.jpg'),
(2, 2, 'fotosProductos/2/1.jpg', 'fotosProductos/2/2.png', 'fotosProductos/2/3.png'),
(3, 3, 'fotosProductos/3/1.jpg', 'fotosProductos/3/2.png', 'fotosProductos/3/3.jpeg'),
(4, 4, 'fotosProductos/4/1.jpg', 'fotosProductos/4/2.png', 'fotosProductos/4/3.jpg'),
(5, 5, 'fotosProductos/5/1.jpg', 'fotosProductos/5/2.png', 'fotosProductos/5/3.jpg'),
(6, 6, 'fotosProductos/6/1.jpg', 'fotosProductos/6/2.jpg', 'fotosProductos/6/3.png'),
(7, 7, 'fotosProductos/7/1.jpg', 'fotosProductos/7/2.jpg', 'fotosProductos/7/3.jpg'),
(8, 8, 'fotosProductos/8/1.jpg', 'fotosProductos/8/2.jpg', 'fotosProductos/8/3.jpg'),
(9, 9, 'fotosProductos/9/1.webp', 'fotosProductos/9/2.webp', 'fotosProductos/9/3.webp'),
(10, 10, 'fotosProductos/10/1.webp', 'fotosProductos/10/2.webp', 'fotosProductos/10/3.webp'),
(11, 11, 'fotosProductos/11/1.webp', 'fotosProductos/11/2.webp', 'fotosProductos/11/3.webp'),
(12, 12, 'fotosProductos/12/1.webp', 'fotosProductos/12/2.webp', 'fotosProductos/12/3.webp'),
(13, 13, 'fotosProductos/13/1.webp', 'fotosProductos/13/2.webp', 'fotosProductos/13/3.webp'),
(14, 14, 'fotosProductos/14/1.webp', 'fotosProductos/14/2.webp', 'fotosProductos/14/3.webp'),
(15, 15, 'fotosProductos/15/1.webp', 'fotosProductos/15/2.webp', 'fotosProductos/15/3.webp'),
(16, 16, 'fotosProductos/16/1.webp', 'fotosProductos/16/2.webp', 'fotosProductos/16/3.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidostemporales`
--

CREATE TABLE `pedidostemporales` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tokenCliente` varchar(100) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidostemporales`
--

INSERT INTO `pedidostemporales` (`id`, `producto_id`, `cantidad`, `tokenCliente`, `fecha`) VALUES
(2, 2, 1, 'KNtyv7nNpxmChftyWgmprPCHw36RRDpN', '2023-08-21 03:31:24'),
(4, 14, 1, 'KNtyv7nNpxmChftyWgmprPCHw36RRDpN', '2023-08-21 03:55:00'),
(9, 7, 3, 'izYmjf3jT9XP984DveGtQGFM2FtF9Pn7', '2023-08-21 04:00:50'),
(10, 5, 2, 'izYmjf3jT9XP984DveGtQGFM2FtF9Pn7', '2023-08-21 04:01:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nameProd` varchar(250) DEFAULT NULL,
  `precio` varchar(250) DEFAULT NULL,
  `description_Prod` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nameProd`, `precio`, `description_Prod`) VALUES
(1, 'Donka', '250000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'Alimento nutricional', '340000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"\"\"'),
(3, 'Cachorro Pedigree', '70000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'Chunky', '140000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'Purina Gatsy', '50000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(6, 'Felix', '25000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(7, 'Ringo', '85000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(8, 'Chunky', '340000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(9, 'Besties', '45000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
(10, 'Cachorro', '125000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
(11, 'True Nature', '95000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
(12, 'Nutrique', '284200', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
(13, 'Nutrique Cat', '123250', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
(14, 'Purina Proplan', '360230', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
(15, 'Furry Blue Label', '36200', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
(16, 'Purina Cat Chow', '190000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fotoproducts`
--
ALTER TABLE `fotoproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidostemporales`
--
ALTER TABLE `pedidostemporales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fotoproducts`
--
ALTER TABLE `fotoproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pedidostemporales`
--
ALTER TABLE `pedidostemporales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
