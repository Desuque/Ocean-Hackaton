-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-10-2018 a las 15:53:23
-- Versión del servidor: 5.7.22-0ubuntu0.17.10.1
-- Versión de PHP: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ocean`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `satellite`
--

CREATE TABLE `satellite` (
  `id` int(11) NOT NULL,
  `idSat` int(11) NOT NULL,
  `name` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `satellite`
--

INSERT INTO `satellite` (`id`, `idSat`, `name`) VALUES
(1, 40732, 'MSG 4'),
(2, 39634, 'SENTINEL 1A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tle`
--

CREATE TABLE `tle` (
  `idSatellite` int(11) NOT NULL,
  `INTLDES` char(30) DEFAULT NULL,
  `TLE_LINE1` char(255) DEFAULT NULL,
  `TLE_LINE2` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tle`
--

INSERT INTO `tle` (`idSatellite`, `INTLDES`, `TLE_LINE1`, `TLE_LINE2`) VALUES
(1, '25543U', '1 25543U 88109K   18277.81005412  .00000124  00000-0  49788-3 0  9997', '2 25543   6.8021 274.2452 7188063  17.0384 358.1181  2.29486932171955');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `satellite`
--
ALTER TABLE `satellite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `satellite`
--
ALTER TABLE `satellite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
