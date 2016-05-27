-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2016 a las 00:21:27
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `couchinn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedaje`
--

CREATE TABLE `hospedaje` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `user` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` int(18) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `token` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `password`, `localidad`, `user`, `nombre`, `apellido`, `telefono`, `admin`, `deleted`, `token`) VALUES
(11, '123', 'La Plata', 'juanma', 'Juan', 'Melichio', 123456677, 0, 0, ''),
(12, 'asdsad', 'asdsad', 'asdad', 'asdad', 'asdad', 13123, 0, 0, ''),
(13, 'r', 'r', 'r', 'r', 'r', 5, 0, 0, ''),
(14, 'f', 'f', 'h', '7', 'g', 0, 0, 0, ''),
(15, 'y', 'o', '6', '5', 'r', 0, 0, 0, ''),
(16, 'Juan', 'Manuel', 'juan', '1', 'La Plata', 12123123, 0, 0, ''),
(17, 'asd', 'asdsad', 'a', '1', 'sdas', 1123213213, 0, 0, ''),
(18, 'asd', 'asdad', 'v', '1', 'asdsad', 123123213, 0, 0, ''),
(19, 'asdad', 'asdsadsad', 'm', '1', 'La Plata', 2147483647, 0, 0, ''),
(20, 'Juan', 'Manuel', 'Juanmanuel', '1234', 'La Plata', 2147483647, 0, 0, ''),
(21, 'asdad', 'asdsad', 'gh', 'luifa20', 'La Plata', 2147483647, 0, 0, ''),
(22, 'asd', 'asdasdsad', 'asd', '123123213', 'La Plata', 1231233123, 0, 0, ''),
(23, 'kk', 'asdsad', 'jj', 'asdsad', 'La Plata', 234234324, 0, 0, ''),
(24, 'luis', 'asdasd', 'pepe', 'asdsad', 'La Plata', 123123213, 0, 0, ''),
(25, '123', 'La Plata', 'lol', 'Juan', 'Melichio', 2147483647, 0, 0, ''),
(26, '12', 'sdasdasd', 'gggg', 'jasdad', 'asdsad', 2147483647, 0, 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hospedaje`
--
ALTER TABLE `hospedaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `ID` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hospedaje`
--
ALTER TABLE `hospedaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hospedaje`
--
ALTER TABLE `hospedaje`
  ADD CONSTRAINT `hospedaje_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`),
  ADD CONSTRAINT `hospedaje_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
