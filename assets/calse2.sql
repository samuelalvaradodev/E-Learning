-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-04-2024 a las 16:02:53
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calse2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agregar`
--

CREATE TABLE `agregar` (
  `id` int(100) NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `id_salida` int(11) NOT NULL,
  `ejercicio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `porcentaje` int(100) NOT NULL,
  `texto` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `respuestas` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estatus` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `agregar`
--

INSERT INTO `agregar` (`id`, `id_entrada`, `id_salida`, `ejercicio`, `porcentaje`, `texto`, `fecha`, `respuestas`, `estatus`) VALUES
(58, 455631129, 153637582, 'asdsad', 0, 'asdasdas', '11-11-21', NULL, 'N'),
(59, 455631129, 153637582, 'asdsa', 0, 'sadas', '11-11-21', NULL, 'N'),
(60, 455631129, 153637582, 'asdsa', 0, 'sadsa', '11-11-21', NULL, 'N'),
(61, 455631129, 153637582, 'asd', 0, 'asdasd', '11-11-21', NULL, 'N'),
(62, 455631129, 153637582, 'asdsa', 0, 'asdasd', '11-11-21', NULL, 'N'),
(63, 455631129, 153637582, 'asda', 0, 'asdas', '11-11-21', NULL, 'N'),
(64, 455631129, 153637582, 'asdas', 0, 'asdas', '11-11-21', NULL, 'N'),
(66, 455631129, 1207809256, 'dfasdas', 0, 'asdasdas', '12-11-21', NULL, 'N'),
(69, 455631129, 922323884, 'prueba3', 50, 'asdsadasdas', '12-11-21', NULL, 'N'),
(70, 455631129, 922323884, 'asdasda', 0, 'sasdsadasd', '12-11-21', NULL, 'N'),
(71, 455631129, 703779194, 'asdasdasas', 0, 'dasdasdas', '12-11-21', NULL, 'N'),
(72, 455631129, 703779194, 'asdas', 0, 'asdasd', '12-11-21', NULL, 'N'),
(73, 455631129, 922323884, 'asdsa', 0, 'asdasd', '12-11-21', NULL, 'N'),
(74, 455631129, 220197376, 'asdsad', 0, 'asdsad', '12-11-21', NULL, 'N'),
(76, 1310293273, 542680971, 'asdasd', 100, 'asdasda', '12-11-21', 'cxvcxfd', 'N'),
(77, 1310293273, 542680971, 'asdsad', 100, 'asdasdas', '12-11-21', 'cxvfrcxvcxv', 'N'),
(78, 1310293273, 542680971, 'dasdsa', 0, 'asdasd', '12-11-21', NULL, 'N'),
(79, 1310293273, 542680971, 'dasdsa', 0, 'asdasd', '12-11-21', NULL, 'N'),
(80, 1310293273, 542680971, 'asdsa', 0, 'asdsad', '12-11-21', NULL, 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `id` int(11) NOT NULL,
  `id_unica` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `act` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `perfil` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`id`, `id_unica`, `usuario`, `contrasena`, `status`, `act`, `perfil`) VALUES
(23, 1107051098, 'alexander', '$2y$10$VWbZxZlORtmNGUcB6fCcgOc8pkBDlBmQCUXVUeQtlE7wrU.rPxzBG', 'U', 'D', 'img/prede.png'),
(26, 153637582, 'leon', '$2y$10$xeFP1/AMHA2u8uOLnDhtce5D6ih9f3/GrnU2ttrzI91FS5GJXNBAS', 'U', 'D', 'img/prede.png'),
(27, 1207809256, 'prueba', '$2y$10$S4EqkZa.q8qSNY.i1P99GuER0ay2gZ8LZyzpoBkpsEN8UeFf3/R4i', 'U', 'D', 'img/prede.png'),
(28, 1128104391, 'asdsa', '$2y$10$xyY3v/0/K8LPaCjc2BLdy.2PNFQgQpdcvHLw02//dqz1WpYQ6hck2', 'U', 'D', 'img/prede.png'),
(29, 540399475, 'asdsad', '$2y$10$JtBPrBKVIsLRrISin4VkHuctd.2Oy5qAeqzDFvesV7iOZi4.JjiOm', 'U', 'D', 'img/prede.png'),
(31, 703779194, 'sadsad', '$2y$10$8a5Kx0i..zkN9B4.9YcnsexRa0bhRrSKrbAhTpVnY0kO2SiL94OQe', 'U', 'D', 'img/prede.png'),
(32, 922323884, 'sadsadasd', '$2y$10$UCU4CtJYfh7UdfaPZ1iNduHUQSipZgeP8ohD38/Bc6WrJLEe5IIAK', 'U', 'D', 'img/prede.png'),
(36, 804571460, 'zxcxzc', 'JDJ5JDEwJC5VZEtWdi9qUXJsSk1SYWc5VjMxYy5WVEM2WWl1c0trY1FCcWYwR0IvaktWQlh4QWlDQndl', 'U', 'D', 'img/prede.png'),
(37, 1310293273, 'samuel', 'sam1234', 'A', 'D', 'img/user-1.png'),
(38, 542680971, 'carlos', 'JDJ5JDEwJC9PU3dPTFpRaExmWUJLRm51MTNkTHVlczlPMGpJQUVPOXhsQXBIY0ZyckQ2N0puczgxMHdx', 'U', 'D', 'img/php.png'),
(39, 418872466, 'samuela', 'JDJ5JDEwJDB2Q1FxTjMvS0N3NlJURUxKbmEvdGVkWFguQkdCckdmd1doWENkcHUwRGZPcXRIMWEzd3dt', 'A', 'L', 'img/prede.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agregar`
--
ALTER TABLE `agregar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agregar`
--
ALTER TABLE `agregar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
