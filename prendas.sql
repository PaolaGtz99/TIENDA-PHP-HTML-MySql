-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2020 a las 20:35:13
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prendas`
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
  `telefono` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `cp` int(11) NOT NULL,
  `ciudad` text NOT NULL,
  `pais` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cl`, `no_vta`, `nombre`, `correo`, `telefono`, `direccion`, `cp`, `ciudad`, `pais`) VALUES
(7, 0, 'Paola Gutierrez', 'paola@mail.co', 2147483647, 'Golondrinas 155', 20212, 'Los Angeles', 'EUA'),
(8, 1, 'Paola', 'pao_gtz_1999@hotmail.com', 2147483647, 'golondrinas', 20218, 'ags', 'Mexico'),
(9, 2, 'Paola', 'pa@h', 43526789, 'gol', 2020, 'ags', 'Mexico'),
(10, 3, 'Paola', 'pa@h', 2147483647, 'gol', 20218, 'ags', 'Mexico'),
(11, 4, 'Paola', 'pa@h', 2147483647, 'gol', 20218, 'ags', 'Mexico'),
(12, 5, 'Paola', 'pa@h', 2147483647, 'gol', 20218, 'ags', 'Mexico'),
(13, 6, 'Paola', 'pa@h', 2147483647, 'gol', 20218, 'ags', 'Mexico'),
(14, 7, 'Paola', 'pa@h', 2147483647, 'gol', 20218, 'ags', 'Mexico'),
(15, 8, 'PRUEB', 'qweqweqwe@asdas.vov', 2147483647, 'pPP', 20120, 'ags', 'Mexico'),
(16, 9, 'PRUEB', 'qweqweqwe@asdas.vov', 2147483647, 'pPP', 20120, 'ags', 'Mexico'),
(17, 10, 'PRUEB', 'qweqweqwe@asdas.vov', 2147483647, 'pPP', 20120, 'ags', 'Mexico'),
(18, 11, 'PRUEB', 'qweqweqwe@asdas.vov', 2147483647, 'pPP', 20120, 'ags', 'Mexico'),
(19, 12, 'PRUEB', 'qweqweqwe@asdas.vov', 2147483647, 'pPP', 20120, 'ags', 'Mexico'),
(20, 13, 'PRUEB', 'qweqweqwe@asdas.vov', 2147483647, 'pPP', 20120, 'ags', 'Mexico'),
(21, 14, 'PRUEB', 'qweqweqwe@asdas.vov', 2147483647, 'pPP', 20120, 'ags', 'Mexico'),
(22, 15, 'PRUEB', 'qweqweqwe@asdas.vov', 2147483647, 'pPP', 20120, 'ags', 'Mexico'),
(23, 16, 'PRUEB', 'qweqweqwe@asdas.vov', 2147483647, 'pPP', 20120, 'ags', 'Mexico'),
(24, 17, 'pao', 'pa@dff', 82923093, 'jdjd', 40432, 'texas', 'EUA'),
(25, 18, 'pao', 'pa@dff', 82923093, 'jdjd', 40432, 'texas', 'EUA'),
(26, 19, 'pao', 'pa@dff', 82923093, 'jdjd', 40432, 'texas', 'EUA'),
(27, 20, 'pao', 'pa@dff', 82923093, 'jdjd', 40432, 'texas', 'EUA'),
(28, 21, 'pao', 'pa@dff', 82923093, 'jdjd', 40432, 'texas', 'EUA'),
(29, 22, 'pao', 'pa@dff', 82923093, 'jdjd', 40432, 'texas', 'EUA'),
(30, 23, 'pao', 'pa@dff', 82923093, 'jdjd', 40432, 'texas', 'EUA'),
(31, 24, '', '', 0, '', 0, '', ''),
(32, 25, 'Oscar Salas', 'oscarperezgutierrez77@gmail.com', 2147483647, 'San Rafael #132 San Cayetano', 20010, 'Aguascalientes', 'Mexico'),
(33, 26, '', '', 0, '', 0, '', ''),
(34, 27, '', '', 0, '', 0, '', ''),
(35, 28, 'Oscar Salas', 'oscarperezgutierrez77@gmail.com', 2147483647, 'San Rafael #132 San Cayetano', 20010, 'Aguascalientes', 'Mexico'),
(36, 29, 'Oscar Salas', 'oscarperezgutierrez77@gmail.com', 2147483647, 'San Rafael #132 San Cayetano', 20010, 'Aguascalientes', 'Mexico'),
(37, 30, '', '', 0, '', 0, '', ''),
(38, 31, 'Oscar Salas', 'oscarperezgutierrez77@gmail.com', 2147483647, 'San Rafael #132 San Cayetano', 20010, 'Aguascalientes', 'Mexico'),
(39, 32, '', '', 0, '', 0, '', ''),
(40, 33, 'Oscar Salas', 'oscarperezgutierrez77@gmail.com', 2147483647, 'San Rafael #132 San Cayetano', 20010, 'Aguascalientes', 'Mexico'),
(41, 34, '', '', 0, '', 0, '', ''),
(42, 35, '', '', 0, '', 0, '', ''),
(43, 36, '', '', 0, '', 0, '', ''),
(44, 37, '', '', 0, '', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_venta`
--

CREATE TABLE `datos_venta` (
  `no_venta` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `envio` varchar(15) NOT NULL,
  `envio_$` double NOT NULL,
  `enviar_a` varchar(25) NOT NULL,
  `total` double NOT NULL,
  `t_pago` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_venta`
--

INSERT INTO `datos_venta` (`no_venta`, `subtotal`, `envio`, `envio_$`, `enviar_a`, `total`, `t_pago`) VALUES
(0, 6600, 'express', 132, 'EUA', 7128, 'OXXO'),
(1, 500, 'gratis', 0, 'Mexico', 580, 'OXXO'),
(2, 200, 'gratis', 0, 'Mexico', 232, 'OXXO'),
(3, 200, 'gratis', 0, 'Mexico', 232, 'OXXO'),
(4, 200, 'gratis', 0, 'Mexico', 232, 'OXXO'),
(5, 200, 'gratis', 0, 'Mexico', 232, 'OXXO'),
(6, 200, 'gratis', 0, 'Mexico', 232, 'OXXO'),
(7, 200, 'gratis', 0, 'Mexico', 232, 'OXXO'),
(8, 650, 'gratis', 0, 'Mexico', 754, 'OXXO'),
(9, 650, 'gratis', 0, 'Mexico', 754, 'OXXO'),
(10, 650, 'gratis', 0, 'Mexico', 754, 'OXXO'),
(11, 650, 'gratis', 0, 'Mexico', 754, 'OXXO'),
(12, 650, 'gratis', 0, 'Mexico', 754, 'OXXO'),
(13, 650, 'gratis', 0, 'Mexico', 754, 'OXXO'),
(14, 650, 'gratis', 0, 'Mexico', 754, 'OXXO'),
(15, 650, 'gratis', 0, 'Mexico', 754, 'OXXO'),
(16, 650, 'gratis', 0, 'Mexico', 754, 'OXXO'),
(17, 900, 'gratis', 0, 'EUA', 954, 'OXXO'),
(18, 900, 'gratis', 0, 'EUA', 954, 'OXXO'),
(19, 900, 'gratis', 0, 'EUA', 954, 'OXXO'),
(20, 900, 'gratis', 0, 'EUA', 954, 'OXXO'),
(21, 900, 'gratis', 0, 'EUA', 954, 'OXXO'),
(22, 900, 'gratis', 0, 'EUA', 954, 'OXXO'),
(23, 900, 'gratis', 0, 'EUA', 954, 'OXXO'),
(24, 900, '', 18, '', 918, ''),
(25, 1100, 'gratis', 0, 'Mexico', 1276, 'OXXO'),
(26, 1100, '', 22, '', 1122, ''),
(27, 1100, '', 22, '', 1122, ''),
(28, 1100, 'gratis', 0, 'Mexico', 1276, 'OXXO'),
(29, 1100, 'gratis', 0, 'Mexico', 1276, 'OXXO'),
(30, 1100, '', 22, '', 1122, ''),
(31, 1100, 'gratis', 0, 'Mexico', 1276, 'OXXO'),
(32, 1100, '', 22, '', 1122, ''),
(33, 1100, 'gratis', 0, 'Mexico', 1276, 'OXXO'),
(34, 1100, '', 22, '', 1122, ''),
(35, 1100, '', 22, '', 1122, ''),
(36, 1100, '', 22, '', 1122, ''),
(37, 1100, '', 22, '', 1122, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playeras`
--

CREATE TABLE `playeras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `precio` double NOT NULL,
  `existencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `playeras`
--

INSERT INTO `playeras` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `existencia`) VALUES
(100, 'playera RayoMano', 'Playera Blanca estampada', 'playera1.jpg', 200, 4),
(101, 'Playera Universo', 'Playera negra con estampado de universo', 'playera7.jpg', 250, 8),
(102, 'Playera Piramide', 'Playera blanca con estampado', 'playera8.jpg', 200, 0),
(103, 'Playera Corazon', 'Playera negra con estampado', 'playera3.jpg', 200, 3),
(104, 'Playera Boca', 'Playera Negra con pequeño estampado ', 'playera4.jpg', 200, 5),
(105, 'Playera Gato', 'Playera negra con estampado grande de Gato', 'playera5.jpg', 200, 1),
(106, 'Playera Maceta', 'Playera Blanca con estampado de Maceta', 'Playera6.jpg', 200, 4),
(107, 'Playera PiramideN', 'Playera negra con estampado', 'playera9.jpg', 200, 9),
(108, 'Playera botellaB', 'Playera blanca con estampado', 'playera10.jpg', 2200, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sudaderas`
--

CREATE TABLE `sudaderas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `precio` double NOT NULL,
  `existencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sudaderas`
--

INSERT INTO `sudaderas` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `existencia`) VALUES
(200, 'Sudadera Gris Rayo', 'Sudadera gris con estampado Rayo', 'sudadera1.jpg', 320, 2),
(201, 'Sudadera Original', 'Sudadera gris con logo de corriente', 'sudadera2.jpg', 350, 5),
(202, 'Sudadera Alien', 'Sudadera gris con estampado', 'sudadera3.jpg', 300, 1),
(203, 'Sudadera Nave', 'Sudadera con pequeño estampado de nave', 'sudadera4.jpg', 270, 5),
(204, 'Sudadera TodoFluye', 'Sudadera con el eslogan de corriente \"todo fluye\"', 'sudadera5.jpg', 300, 3),
(205, 'Sudadera Logo', 'Sudadera con el logo de corriente en la parte de atras', 'sudadera6.jpg', 300, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `cuenta` varchar(255) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `bloqueada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `cuenta`, `contra`, `bloqueada`) VALUES
(5, 'Oscar', 'oscarperezgutierrez77@gmail.com', 'osalas', '$2y$10$YAIhpOsHwgrPdJ7Sxu51QObaaQD3ZCa9zG3BVN1klkDbFPzprmTOm', 1),
(8, 'Administrador', 'corrientefluye@gmail.com', 'Administrador', '$2y$10$.bxgId6zQpRi1b/kxaGIeeaOgWVKsKibsm5MOdg3Uf77iKwhTJnyO', 3),
(9, 'Alexia', 'aflores@gmail.com', 'aflores', '$2y$10$O/EKt77gr0HcB1uBc1R/nu46DddtfVJuPrrJvXKchsZDhNA0PiCJO', 3),
(10, 'Paola', 'peligrosa69@gmail.com', 'pgutierrez', '$2y$10$6Aj0R7fLkuC3t0Mye7ePhuRQX2cev9oP.jUyqCeKXl71mqBO0gD4O', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `no_venta` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `nombre_p` varchar(20) NOT NULL,
  `subtotal_p` double NOT NULL,
  `cantidad_p` int(11) NOT NULL,
  `imagen_p` text NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`no_venta`, `id_p`, `nombre_p`, `subtotal_p`, `cantidad_p`, `imagen_p`, `tipo`) VALUES
(0, 108, 'Playera botellaB', 6600, 3, 'playera10.jpg', ''),
(1, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(2, 4, 'sueterOscar', 3000, 25, 'sueterChido', 'sudadera'),
(3, 7, 'sueterMissu', 4500, 35, 'sueterfeo', 'sudadera'),
(4, 106, 'Playera Maceta', 200, 1, 'Playera6.jpg', ''),
(5, 106, 'Playera Maceta', 200, 1, 'Playera6.jpg', ''),
(6, 106, 'Playera Maceta', 200, 1, 'Playera6.jpg', ''),
(7, 106, 'Playera Maceta', 200, 1, 'Playera6.jpg', ''),
(8, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(9, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(10, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(10, 101, 'Playera Universo', 250, 1, 'playera7.jpg', ''),
(11, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(11, 101, 'Playera Universo', 250, 1, 'playera7.jpg', ''),
(12, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(12, 101, 'Playera Universo', 250, 1, 'playera7.jpg', ''),
(13, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(13, 101, 'Playera Universo', 250, 1, 'playera7.jpg', ''),
(14, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(14, 101, 'Playera Universo', 250, 1, 'playera7.jpg', ''),
(15, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(15, 101, 'Playera Universo', 250, 1, 'playera7.jpg', ''),
(16, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(16, 101, 'Playera Universo', 250, 1, 'playera7.jpg', ''),
(17, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(17, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(18, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(18, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(19, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(19, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(20, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(20, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(21, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(21, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(22, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(22, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(23, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(23, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(24, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(24, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(25, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(25, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(25, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(26, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(26, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(26, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(27, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(27, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(27, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(28, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(28, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(28, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(29, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(29, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(29, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(30, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(30, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(30, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(31, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(31, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(31, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(32, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(32, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(32, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(33, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(33, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(33, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(34, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(34, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(34, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(35, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(35, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(35, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(36, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(36, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(36, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', ''),
(37, 106, 'Playera Maceta', 400, 2, 'Playera6.jpg', ''),
(37, 101, 'Playera Universo', 500, 2, 'playera7.jpg', ''),
(37, 107, 'Playera PiramideN', 200, 1, 'playera9.jpg', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cl`);

--
-- Indices de la tabla `datos_venta`
--
ALTER TABLE `datos_venta`
  ADD PRIMARY KEY (`no_venta`);

--
-- Indices de la tabla `playeras`
--
ALTER TABLE `playeras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sudaderas`
--
ALTER TABLE `sudaderas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
