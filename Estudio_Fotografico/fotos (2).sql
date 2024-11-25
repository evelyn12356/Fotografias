-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2024 a las 04:02:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fotos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citaaas`
--

CREATE TABLE `citaaas` (
  `id` int(11) NOT NULL,
  `evento` varchar(255) NOT NULL,
  `id_fotografo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citaaas`
--

INSERT INTO `citaaas` (`id`, `evento`, `id_fotografo`, `id_usuario`, `fecha`, `hora_inicio`, `hora_fin`) VALUES
(1, 'boda', 3, 0, '2024-11-28', '17:37:00', '17:36:00'),
(2, 'boda', 3, 0, '2024-11-28', '17:37:00', '17:36:00'),
(3, 'boda', 2, 0, '2024-11-28', '18:56:00', '18:57:00'),
(4, 'boda', 3, 12, '2024-11-29', '18:00:00', '06:59:00'),
(5, 'boda', 3, 4, '2024-11-29', '18:00:00', '06:59:00'),
(6, 'XV', 5, 1, '2024-11-30', '19:36:00', '19:36:00'),
(7, 'evento social', 3, 2, '2024-11-22', '19:41:00', '20:41:00'),
(8, 'evento social', 3, 3, '2024-11-22', '19:41:00', '20:41:00'),
(9, 'boda', 4, 11, '2024-11-15', '20:49:00', '20:49:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_citas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `evento` text NOT NULL,
  `hora_inicio` time(6) DEFAULT NULL,
  `hora_fin` time(6) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_fotografo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografias`
--

CREATE TABLE `fotografias` (
  `id_fotografias` int(11) NOT NULL,
  `id_citas` int(11) NOT NULL,
  `num_fotos` varchar(5000) NOT NULL,
  `precio_foto` decimal(10,0) NOT NULL,
  `material` varchar(1000) NOT NULL,
  `tipo_foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografo`
--

CREATE TABLE `fotografo` (
  `id_fotografo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido_p` varchar(100) NOT NULL,
  `apellido_m` varchar(100) NOT NULL,
  `seguro_social` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fotografo`
--

INSERT INTO `fotografo` (`id_fotografo`, `nombre`, `apellido_p`, `apellido_m`, `seguro_social`, `correo`) VALUES
(1, 'María', 'Fernández', 'Ramírez', '345678912', 'maria.fernandez@example.com'),
(2, 'Carlos', 'Martínez', 'López', '123456789', 'carlos.martinez@example.com'),
(3, 'Laura', 'Pérez', 'Torres', '678912345', 'laura.perez@example.com'),
(4, 'Alejandro', 'Hernández', 'Gómez', '987654321', 'alejandro.hernandez@example.com'),
(5, 'Juan', 'García', 'Sánchez', '567891234', 'juan.garcia@example.com'),
(6, 'Sofía', 'Jiménez', 'Vargas', '912345678', 'sofia.jimenez@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `id_telefono` int(11) NOT NULL,
  `lada_pais` varchar(100) NOT NULL,
  `lada_edo` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_telefono`, `lada_pais`, `lada_edo`, `numero`) VALUES
(1, '', '', ''),
(2, '52', '449', '12345678'),
(3, '52', '449', '222222'),
(4, '52', '449', '1898987'),
(5, '3', '465', '87364764'),
(6, '52', '465', '2345677'),
(7, '52', '449', '12345677'),
(8, '', '', ''),
(9, '52', '449', '12345677'),
(10, '52', '465', '1234567'),
(11, '52', '449', '1234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(100) NOT NULL,
  `apellido_m` varchar(100) NOT NULL,
  `apellido_p` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `id_telefono` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido_m`, `apellido_p`, `correo`, `id_telefono`, `id_usuario`) VALUES
('eve', 'puentes', 'gomez', 'jisselpuentesgomez@gmail.com', 0, 1),
('jissel', 'puentes', 'gomez', 'jisselpuentesgomez@gmail.com', 0, 2),
('', '', '', '', 1, 3),
('Geraldine ', 'de la rosa', 'cuadros', 'ZDVDVDVD@GMAIL.COM', 2, 4),
('manuel', 'gomez', 'puentes', 'jisselpuentesgomez@gmail.com', 3, 5),
('daisy', 'vazquez', 'aguilar', 'hola@gmail.com', 4, 6),
('d', 'd', 'd', 'hola@gmail.com', 5, 7),
('fer', 'martinez', 'narvaez', 'fer@gmail.com', 6, 8),
('guadalupe', 'delgado', 'gonzalez', 'evelyn@gmail.com', 7, 9),
('', '', '', '', 8, 10),
('guadalupe', 'delgado', 'gonzalez', 'evelyn@gmail.com', 9, 11),
('mary', 'medina', 'lopez', 'medina@gmail.com', 10, 12),
('Wendy', 'Garcia', 'Lamas', 'wendy@gmail.com', 11, 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citaaas`
--
ALTER TABLE `citaaas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fotografo` (`id_fotografo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`),
  ADD KEY `id_usuario` (`id_usuario`,`id_fotografo`),
  ADD KEY `id_fotografo` (`id_fotografo`);

--
-- Indices de la tabla `fotografias`
--
ALTER TABLE `fotografias`
  ADD PRIMARY KEY (`id_fotografias`),
  ADD KEY `id_citas` (`id_citas`);

--
-- Indices de la tabla `fotografo`
--
ALTER TABLE `fotografo`
  ADD PRIMARY KEY (`id_fotografo`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id_telefono`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_direccion` (`id_telefono`),
  ADD KEY `id_telefono` (`id_telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citaaas`
--
ALTER TABLE `citaaas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `fotografias`
--
ALTER TABLE `fotografias`
  MODIFY `id_fotografias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotografo`
--
ALTER TABLE `fotografo`
  MODIFY `id_fotografo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id_telefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citaaas`
--
ALTER TABLE `citaaas`
  ADD CONSTRAINT `citaaas_ibfk_1` FOREIGN KEY (`id_fotografo`) REFERENCES `fotografo` (`id_fotografo`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_fotografo`) REFERENCES `fotografo` (`id_fotografo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotografias`
--
ALTER TABLE `fotografias`
  ADD CONSTRAINT `fotografias_ibfk_1` FOREIGN KEY (`id_citas`) REFERENCES `citas` (`id_citas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
