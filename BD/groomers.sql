-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2021 a las 00:15:47
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `groomers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesgroomers`
--

CREATE TABLE `clientesgroomers` (
  `id` int(10) NOT NULL,
  `nameFull` varchar(150) DEFAULT NULL,
  `typeMascot` varchar(20) DEFAULT NULL,
  `raza_mascota` varchar(50) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `groomer_id` varchar(250) DEFAULT NULL,
  `photo_invoice` varchar(100) DEFAULT NULL,
  `fecha_registro` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientesgroomers`
--

INSERT INTO `clientesgroomers` (`id`, `nameFull`, `typeMascot`, `raza_mascota`, `year`, `phone`, `email`, `groomer_id`, `photo_invoice`, `fecha_registro`) VALUES
(34, 'a', 'Gato', 'Raza x', '22', '32', 'alejandro@gmail.com', '2', 'fotos_facturas/fae110c5fad3bf8.jpg', '2021-08-04'),
(35, 'SASAS', 'Perro', 'Raza x', '3', '323', '2@gmail.com', '2', 'fotos_facturas/f86be86a9728473.png', '2021-08-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoproducts`
--

CREATE TABLE `fotoproducts` (
  `id` int(10) NOT NULL,
  `products_id` int(10) DEFAULT NULL,
  `foto1` varchar(100) DEFAULT NULL,
  `foto2` varchar(100) DEFAULT NULL,
  `foto3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotoproducts`
--

INSERT INTO `fotoproducts` (`id`, `products_id`, `foto1`, `foto2`, `foto3`) VALUES
(10, 9, 'fotosProductos/ProdID_9/p1.jpg', 'fotosProductos/ProdID_9/dsad.jpg', 'fotosProductos/ProdID_9/34534.jpg'),
(11, 10, 'fotosProductos/ProdID_10/wwrqw.jpg', 'fotosProductos/ProdID_10/2.png', 'fotosProductos/ProdID_10/p7.jpg'),
(12, 11, 'fotosProductos/ProdID_11/p3.png', 'fotosProductos/ProdID_11/p4.jpeg', 'fotosProductos/ProdID_11/dsad.jpg'),
(13, 12, 'fotosProductos/ProdID_12/p7.jpg', 'fotosProductos/ProdID_12/p3.png', 'fotosProductos/ProdID_12/p5.jpg'),
(14, 13, 'fotosProductos/ProdID_13/p3.png', 'fotosProductos/ProdID_13/2121.jpg', 'fotosProductos/ProdID_13/wwrqw.jpg'),
(15, 14, 'fotosProductos/ProdID_14/p1.jpg', 'fotosProductos/ProdID_14/p3.png', 'fotosProductos/ProdID_14/wwrqw.jpg'),
(17, 16, 'fotosProductos/ProdID_16/dsad.jpg', 'fotosProductos/ProdID_16/logo.png', 'fotosProductos/ProdID_16/banner-final.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groomers`
--

CREATE TABLE `groomers` (
  `id` int(10) NOT NULL,
  `nombrePropietarioGroomer` varchar(250) DEFAULT NULL,
  `cedulaGroomer` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `celular` varchar(12) DEFAULT NULL,
  `point_groomer` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `groomers`
--

INSERT INTO `groomers` (`id`, `nombrePropietarioGroomer`, `cedulaGroomer`, `email`, `celular`, `point_groomer`) VALUES
(1, 'Junior Anibal Patiño Campos', '121184601', 'dogpatino@gmail.com', '3138108851', '20'),
(2, 'Celeste Núñez Vidal', '1000516024', 'celestevidal08@gmail.com', '3138498400', '6'),
(3, 'Luisa Fernanda Muñoz Dominguez', '1020752102', 'lufermd123@gmail.com', '3124921938', '1'),
(4, 'Leonel Alvarez Espinosa', '1018474529', 'leonel95espinosa@gmail.com', '3214614552', '5'),
(5, 'Pinilla pinilla jose Luis', '80815782', 'adminniza@animalsveterinaria.com', '3227282183', '1'),
(6, 'espita duarte yury nataly', '1022432351', 'peluqueria73@animalsveterinaria.com', '3112227488', ''),
(7, 'quijano rodriguez carlos andres', '80795440', 'peluqueriachia@animalsveterinaria.com', '322 2002725', '1'),
(8, 'moreno romero nicolas', '1023920356', 'peluqueria138@animalsveterinaria.com', '3102951787', '1'),
(9, 'bernal marin wilmar alberto', '1107507590', 'moondaily1236@gmail.com', '3226794258', '2'),
(10, 'gaviria cucunuba yuli andrea', '1019050024', 'andreayuli94@gmail.com', '3153409036', '3'),
(11, 'cative rodriguez erika milena', '1022398354', 'cativerika@gmail.com', '3214619675', '2'),
(12, 'alzate cajamarca henry andres', '1003567820', 'peluqueriaesperanza@animalsveterinaria.com', '3212244857', '1'),
(13, 'soto martinez aleajandra catalina', '1000930690', 'csoto0005@gmail.com', '3192591515', '1'),
(14, 'Wendy Yurany Muñoz Lopez', '1030628233', 'Groomerasesor@puppis.com.co', '3204023387', '1'),
(15, 'Jorge Alberto Cristancho Rozo', '1014289734', 'jorgecristancho1097@gmail.com', '3222665829', '1'),
(16, 'Luz Adriana Uyaban Ochoa', '1013627413', 'Dianauyaban5@gmail.com', '3203925463', '2'),
(17, 'Ruth mariana Sierralta agro', '946339308021987', 'ruthmarianasierraltaagro@gmail.com', '3124460781', '1'),
(18, 'Ginna zulay Zuluaga', '1122651309', 'Ginna4333@gmail.com', '3229523433', '1'),
(19, 'Henry Javier Rangel Rangel', '1002358077', 'henryrangel402@gmail.com', '3178368462', '1'),
(20, 'William Alfredo Rodríguez Aldana', '1020758329', 'Mecha1927@outlook.es', '3005668379', NULL),
(21, 'Ingrid Dayana Andrea Pinzón Fuentes', '1090469748', 'indaanpifu@gmail.com', '3183760107', '2'),
(22, 'Sergio Andres Diaz Barbosa', '1101754472', 'yeyito-21@hotmail.com', '3115056783', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidostemporales`
--

CREATE TABLE `pedidostemporales` (
  `id` int(11) NOT NULL,
  `producto_id` int(10) DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `nuevoPrecioTotal` int(50) DEFAULT NULL,
  `tokenCliente` varchar(100) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `hours` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidostemporales`
--

INSERT INTO `pedidostemporales` (`id`, `producto_id`, `cantidad`, `nuevoPrecioTotal`, `tokenCliente`, `fecha`, `hours`) VALUES
(27, 9, 3, 250, 'mEVGnHrnPbqwaJ6aJzbQkvQKnXhct0', '06/08/2021', '04:22:06 pm'),
(28, 10, 11, 250, 'mEVGnHrnPbqwaJ6aJzbQkvQKnXhct0', '06/08/2021', '04:22:25 pm'),
(29, 13, 12, 250, 'mEVGnHrnPbqwaJ6aJzbQkvQKnXhct0', '06/08/2021', '04:24:59 pm'),
(30, 14, 115, 250, 'mEVGnHrnPbqwaJ6aJzbQkvQKnXhct0', '06/08/2021', '04:25:06 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `nameProd` varchar(250) DEFAULT NULL,
  `puntos` varchar(250) DEFAULT NULL,
  `cantidadDisponible` varchar(250) DEFAULT NULL,
  `descrip_Prod` text DEFAULT NULL,
  `statusProduct` varchar(15) DEFAULT NULL,
  `fechaRegistro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nameProd`, `puntos`, `cantidadDisponible`, `descrip_Prod`, `statusProduct`, `fechaRegistro`) VALUES
(9, 'Máquina KM2', '250', '10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2021-08-05'),
(10, 'Maquina KM10 ', '250', '34', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\"\"\"', '1', '2021-08-05'),
(11, 'Furminator Perros', '250', '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2021-08-05'),
(12, 'Cepillos Grooming', '250', '14', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2021-08-05'),
(13, 'Cepillos Grooming', '250', '10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2021-08-05'),
(14, 'FURminator Cepillo para Gatos', '250', '18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2021-08-05'),
(16, 'saSAsa', '250', '12', 'SAsaSa', '1', '2021-08-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groomers`
--

CREATE TABLE `user_groomers` (
  `id` int(10) NOT NULL,
  `nameFull` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `rol` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_groomers`
--

INSERT INTO `user_groomers` (`id`, `nameFull`, `email`, `password`, `fecha`, `rol`) VALUES
(1, 'Alejandro Torres', 'alejandro@gmail.com', '123', '04/08/2021', 2),
(2, 'Urian Viera', 'admin@gmail.com', '123', '05/08/2021', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientesgroomers`
--
ALTER TABLE `clientesgroomers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fotoproducts`
--
ALTER TABLE `fotoproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groomers`
--
ALTER TABLE `groomers`
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
-- Indices de la tabla `user_groomers`
--
ALTER TABLE `user_groomers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientesgroomers`
--
ALTER TABLE `clientesgroomers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `fotoproducts`
--
ALTER TABLE `fotoproducts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `groomers`
--
ALTER TABLE `groomers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pedidostemporales`
--
ALTER TABLE `pedidostemporales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `user_groomers`
--
ALTER TABLE `user_groomers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
