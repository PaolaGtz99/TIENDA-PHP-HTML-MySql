-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-12-2019 a las 08:37:00
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cl` int(11) NOT NULL,
  `no_vta` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `correo` text NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `dirección` text NOT NULL,
  `cp` int(11) NOT NULL,
  `ciudad` text NOT NULL,
  `pais` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cl`, `no_vta`, `nombre`, `correo`, `telefono`, `dirección`, `cp`, `ciudad`, `pais`) VALUES
(1, 13, 'Carlos Pedroza', '', '+524491234567', 'J. Gpe Najera', 20344, 'Ags', 'Mexico'),
(2, 14, 'Carlos PC', 'el_ennano@icloud.com', '+524491234567', 'J. Gpe Najera', 20344, 'Ags', 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `no_venta` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `nombre_p` text NOT NULL,
  `subtotal_p` float NOT NULL,
  `cantidad_p` int(11) NOT NULL,
  `imagen_p` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`no_venta`, `id_p`, `nombre_p`, `subtotal_p`, `cantidad_p`, `imagen_p`) VALUES
(1, 1, 'computadora', 11000, 2, 'pc.png'),
(1, 2, 'lap top', 7000, 2, 'lap.png'),
(3, 1, 'computadora', 11000, 2, 'pc.png'),
(3, 2, 'lap top', 7000, 2, 'lap.png'),
(5, 1, 'computadora', 11000, 2, 'pc.png'),
(5, 2, 'lap top', 7000, 2, 'lap.png'),
(7, 1, 'computadora', 11000, 2, 'pc.png'),
(7, 2, 'lap top', 7000, 2, 'lap.png'),
(9, 1, 'computadora', 11000, 2, 'pc.png'),
(9, 2, 'lap top', 7000, 2, 'lap.png'),
(11, 1, 'computadora', 22000, 4, 'pc.png'),
(11, 2, 'lap top', 10500, 3, 'lap.png'),
(13, 1, 'computadora', 22000, 4, 'pc.png'),
(14, 1, 'computadora', 5500, 1, 'pc.png'),
(14, 2, 'lap top', 7000, 2, 'lap.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `existencia` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `existencia`, `descripcion`, `precio`, `imagen`) VALUES
(1, 'computadora', 9, 'jeje', 5500, 'pc.png'),
(2, 'lap top', 9, 'jeje', 3500, 'lap.png'),
(3, 'lo que sea', 10, 'jeje', 2525.25, 'lose.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cl`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
