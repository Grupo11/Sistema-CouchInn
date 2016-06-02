-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2016 a las 11:36:18
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

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
  `id_tipo` int(11) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospedaje`
--

INSERT INTO `hospedaje` (`id`, `id_usuario`, `nombre`, `descripcion`, `id_localidad`, `precio`, `id_tipo`, `foto`) VALUES
(1, 1, 'Hospedaje Carla Minte', 'El hospedaje cuenta con capacidad para 4 personas distribuidas en 2 dormitorios y cocina completa.', 2, 3000, 3, 'img/hospedajes/hosp6.jpg'),
(2, 1, 'Hotel Coandi', 'El hospedaje cuenta con 2 dormitorios', 2, 2500, 1, 'img/hospedajes/hosp1.jpg'),
(3, 1, 'Hotel Ortegal', 'Habitación para 2 personas con cama matrimonial', 4, 1200, 1, 'img/hospedajes/hosp11.jpg'),
(4, 1, 'HS Franco', 'Departamento para 4 personas, con 3 ambientes', 3, 2300, 2, 'img/hospedajes/hosp2.jpg'),
(5, 1, 'Hostel Casa de Mar', 'El hostel cuenta con cocina equipada, comedor, patio, habitaciones con capacidad para 3 y 5 personas', 5, 250, 4, 'img/hospedajes/hosp10.jpg'),
(6, 1, 'INTERPLAZA HOTEL', 'El Interplaza Hotel se encuentra a solo 20 metros de la plaza de San Martín y alberga pileta exterior, centro de ocio y fitness y habitaciones elegantes. Se proporciona WiFi. Todas las mañanas se sirve un desayuno buffet', 6, 940, 3, 'img/hospedajes/hosp13.jpg'),
(7, 1, 'Aloha Habemus Hostel', 'El ALOHA Habemus Hostel ofrece habitaciones con vistas a un patio amplio, proporciona WiFi gratuita y sirve un desayuno diario.\r\nLas habitaciones disponen de servicios prácticos, caja fuerte personal y baño compartido con agua caliente. También incluyen ropa de cama.', 5, 250, 4, 'img/hospedajes/hosp14.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `nombre`) VALUES
(2, 'La Plata'),
(3, 'CABA'),
(4, 'Mar del Plata'),
(5, 'Villa Gesell'),
(6, 'Córdoba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(1, 'Casa'),
(2, 'Departamento'),
(3, 'Hotel'),
(4, 'Hostel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `user` varchar(50) NOT NULL,
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
(1, '1234', 'la plata', 'maranela@hotmail.com', 'male', 'gauto', 1234, 0, 0, ''),
(2, '12345', 'la plata', 'arielsobrado@gmail.com', 'Ariel', 'Sobrado', 1234, 1, 0, ''),
(3, '12345', 'La Plata', 'marianela.gauto@outlook.com', 'Marianela', 'Gauto', 1234, 0, 0, '1689b4af6a6ab51eac1e8de487a48687');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hospedaje`
--
ALTER TABLE `hospedaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_localidad` (`id_localidad`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
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
-- AUTO_INCREMENT de la tabla `hospedaje`
--
ALTER TABLE `hospedaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
