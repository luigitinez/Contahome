-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 08-10-2020 a las 22:05:52
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE contahome;
USE contahome;
--
-- Base de datos: `contahome`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ITV`
--

CREATE TABLE `ITV` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_veh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguros`
--

CREATE TABLE `seguros` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `poliza` varchar(25) NOT NULL,
  `seguro` varchar(15) NOT NULL,
  `banco` varchar(15) NOT NULL,
  `precio` double NOT NULL,
  `id_element` int(11) NOT NULL,
  `type_element` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nick` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `name`, `pass`, `fecha`) VALUES
(1, 'lmgspain@hotmail.com', 'Luis Martinez Gonzalez', 'conejo56', '2020-09-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `modelo` varchar(25) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `marca`, `modelo`, `matricula`, `fecha`) VALUES
(1, 'Yamaha', 'XJ6 Diversion F', '2582HPL', '2019-06-05'),
(2, 'Suzuki', 'Burgman 400', '5660GXZ', '2010-03-23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ITV`
--
ALTER TABLE `ITV`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_veh` (`id_veh`);

--
-- Indices de la tabla `seguros`
--
ALTER TABLE `seguros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ITV`
--
ALTER TABLE `ITV`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguros`
--
ALTER TABLE `seguros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ITV`
--
ALTER TABLE `ITV`
  ADD CONSTRAINT `itv_ibfk_1` FOREIGN KEY (`id_veh`) REFERENCES `vehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;