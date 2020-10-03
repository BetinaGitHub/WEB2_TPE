-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2020 a las 00:59:53
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_maqagricolas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinaria`
--

CREATE TABLE `maquinaria` (
  `id` int(11) NOT NULL,
  `idRubro` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `modelo` int(4) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  `foto` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maquinaria`
--

INSERT INTO `maquinaria` (`id`, `idRubro`, `descripcion`, `modelo`, `notas`, `foto`) VALUES
(3, 2, 'CRUCIANELLI GRINGA II', 2016, 'Sembradora de 10 a 70cm. Mecánica con alas. Fertilización con algo', NULL),
(4, 3, 'MAINERO 2921 PLUS CON BALANZA', 2015, 'Mixer Pampero 4010 de 10 mts. cúbicos, con balanza ', NULL),
(5, 4, 'Akron E9700HE', 2018, 'Embolsadora De Granos Secos semi nueva con garantía de 12 meses', NULL),
(6, 2, 'CRUCIANELLI 3520', 2014, 'Sembradora Crucianelli Pionera de 35 líneas a 20 cm. ', NULL),
(7, 4, 'MARTÍNEZ & STANECK MARTÍNEZ & STANECK', 2020, 'Embolsadora Martínez & staneck de 9 pies! 6 meses de uso- completamente nueva', NULL),
(8, 6, 'PLATAFORMA ARTICULADA DIÉSEL 200 ATJ', 2013, 'Marca: Manitou Modelo: 200 ATJ Años: 2013 / 2011', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`id`, `descripcion`) VALUES
(2, 'SEMBRADORAS'),
(3, 'MIXERS'),
(4, 'EMBOLSADORAS'),
(5, 'DESMALEZADORAS'),
(6, 'PLATAFORMAS'),
(7, 'ACOPLADOS'),
(8, 'AUTODESCARGABLES'),
(9, 'PLATAFORMAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `e-mail` varchar(100) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ixRubro` (`idRubro`),
  ADD KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD CONSTRAINT `maquinaria_ibfk_1` FOREIGN KEY (`idRubro`) REFERENCES `rubro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
