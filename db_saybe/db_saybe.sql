-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2017 a las 09:43:04
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_saybe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id_cliente` int(10) NOT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id_cliente`, `nombre_cliente`, `fecha_registro`) VALUES
(1, 'Alcaldía Municipal del Distrito Central', '2017-08-09 20:09:00'),
(2, 'Universidad Nacional Autónoma de Honduras', '2017-08-09 20:10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_grupo_usuario`
--

CREATE TABLE `tbl_grupo_usuario` (
  `id_grupo_usuario` int(10) NOT NULL,
  `nombre_grupo_usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_grupo_usuario`
--

INSERT INTO `tbl_grupo_usuario` (`id_grupo_usuario`, `nombre_grupo_usuario`, `fecha_registro`, `Activo`) VALUES
(0, 'Administrador', '2017-08-09 11:02:00', 1),
(1, 'Laboratorista en campo', '2017-08-09 16:27:00', 1),
(2, 'Laboratorista', '2017-08-09 16:27:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lab_cilindro_viga_muestra_concreto`
--

CREATE TABLE `tbl_lab_cilindro_viga_muestra_concreto` (
  `id_n_cilindro_viga` int(10) NOT NULL,
  `tipo_cilindro_viga` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `id_fecha_muestra` date NOT NULL,
  `id_n_viaje` int(10) NOT NULL,
  `id_codigo_proyecto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `peso_lbs` float DEFAULT NULL,
  `fecha_ruptura` date DEFAULT NULL,
  `n_dias` int(10) DEFAULT NULL,
  `lectura_lbs` int(10) DEFAULT NULL,
  `resistencia_lbsPulg2` int(10) DEFAULT NULL,
  `fc_lbsPulg2` int(10) DEFAULT NULL,
  `rest_porcentaje` int(4) DEFAULT NULL,
  `tipo_fractura` int(1) DEFAULT NULL,
  `orden_trabajo` int(10) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_eliminado` datetime NOT NULL,
  `id_usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_lab_cilindro_viga_muestra_concreto`
--

INSERT INTO `tbl_lab_cilindro_viga_muestra_concreto` (`id_n_cilindro_viga`, `tipo_cilindro_viga`, `id_fecha_muestra`, `id_n_viaje`, `id_codigo_proyecto`, `peso_lbs`, `fecha_ruptura`, `n_dias`, `lectura_lbs`, `resistencia_lbsPulg2`, `fc_lbsPulg2`, `rest_porcentaje`, `tipo_fractura`, `orden_trabajo`, `fecha_registro`, `fecha_eliminado`, `id_usuario`) VALUES
(1, 'cilindro', '2017-01-30', 3, 'S1702', 27.65, '2017-02-06', 7, 142600, 5500, 5044, 92, 3, 13654, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(1, 'viga', '2017-01-30', 3, 'S1702', NULL, '2017-02-06', 7, 7460, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(2, 'cilindro', '2017-01-30', 3, 'S1702', 28.21, '2017-02-27', 28, 185790, 5500, 6572, 119, 3, 13654, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(2, 'viga', '2017-01-30', 3, 'S1702', NULL, '2017-02-27', 28, 8460, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(3, 'cilindro', '2017-01-30', 6, 'S1702', 28.14, '2017-02-06', 7, 146190, 5500, 5171, 94, 3, 13654, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(3, 'viga', '2017-01-30', 6, 'S1702', NULL, '2017-02-06', 7, 7650, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(4, 'cilindro', '2017-01-30', 6, 'S1702', 28.29, '2017-02-27', 28, 197750, 5500, 6995, 127, 3, 13654, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(4, 'viga', '2017-01-30', 6, 'S1702', NULL, '2017-02-27', 28, 8130, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(5, 'cilindro', '2017-01-30', 9, 'S1702', 28.03, '2017-02-06', 7, 155240, 5500, 5491, 100, 4, 13654, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(5, 'viga', '2017-01-30', 9, 'S1702', NULL, '2017-02-06', 7, 8650, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(6, 'cilindro', '2017-01-30', 9, 'S1702', 28.2, '2017-02-27', 28, 200000, 5500, 7075, 129, 3, 13654, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(6, 'viga', '2017-01-30', 9, 'S1702', NULL, '2017-02-27', 28, 9690, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(7, 'cilindro', '2017-01-31', 3, 'S1702', 27, '2017-02-07', 7, 155520, 5500, 5501, 100, 3, 13657, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(7, 'viga', '2017-01-31', 3, 'S1702', NULL, '2017-02-07', 28, 9690, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(8, 'cilindro', '2017-01-31', 3, 'S1702', 27, '2017-02-28', 28, 190640, 5500, 6744, 123, 3, 13657, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(8, 'viga', '2017-01-31', 3, 'S1702', NULL, '2017-02-28', 28, 9690, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(9, 'cilindro', '2017-01-31', 6, 'S1702', 26.8, '2017-02-06', 7, 135460, 5500, 4792, 87, 4, 13657, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(9, 'viga', '2017-01-31', 6, 'S1702', NULL, '2017-02-07', 28, 9690, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(10, 'cilindro', '2017-01-31', 6, 'S1702', 26.8, '2017-02-06', 28, 180860, 5500, 6398, 116, 4, 13657, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
(10, 'viga', '2017-01-31', 6, 'S1702', NULL, '2017-02-28', 28, 9690, NULL, NULL, NULL, NULL, NULL, '2017-09-12 00:00:00', '0000-00-00 00:00:00', 'richard');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lab_laboratorista_x_muestra`
--

CREATE TABLE `tbl_lab_laboratorista_x_muestra` (
  `id_usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `id_fecha_muestra` date NOT NULL,
  `id_codigo_proyecto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_lab_laboratorista_x_muestra`
--

INSERT INTO `tbl_lab_laboratorista_x_muestra` (`id_usuario`, `id_fecha_muestra`, `id_codigo_proyecto`, `fecha_registro`) VALUES
('richard', '2017-01-30', 'S1702', '2017-09-14 00:00:00'),
('richard', '2017-01-31', 'S1702', '2017-09-14 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lab_muestra_concreto`
--

CREATE TABLE `tbl_lab_muestra_concreto` (
  `id_fecha_muestra` date NOT NULL,
  `id_n_viaje` int(10) NOT NULL,
  `id_codigo_proyecto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `elemento` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cantidad_M3` int(10) DEFAULT NULL,
  `n_camion` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hora_salida_en_planta` time DEFAULT NULL,
  `hora_llegada_proyecto` time DEFAULT NULL,
  `hora_salida_proyecto` time DEFAULT NULL,
  `temperatura` float DEFAULT NULL,
  `rev_pulg` float DEFAULT NULL,
  `aditivo_ml` float DEFAULT NULL,
  `fc_lbsPulg2` int(10) DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish2_ci,
  `fecha_registro` datetime NOT NULL,
  `fecha_eliminado` datetime NOT NULL,
  `id_usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_lab_muestra_concreto`
--

INSERT INTO `tbl_lab_muestra_concreto` (`id_fecha_muestra`, `id_n_viaje`, `id_codigo_proyecto`, `elemento`, `cantidad_M3`, `n_camion`, `hora_salida_en_planta`, `hora_llegada_proyecto`, `hora_salida_proyecto`, `temperatura`, `rev_pulg`, `aditivo_ml`, `fc_lbsPulg2`, `observaciones`, `fecha_registro`, `fecha_eliminado`, `id_usuario`) VALUES
('2017-01-01', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-01', 1, 'S1704', 'Muro Ciclopeo', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-01', 2, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-02', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-03', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-04', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-05', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-06', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-07', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-08', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-09', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-10', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 1, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '12:15:00', '12:30:00', '12:56:00', 26.1, 2.5, 2000, 650, 'Pav. lado izq. 37707 inicio popeyes', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 2, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-02', '12:52:00', '13:14:00', '13:28:00', 26.3, 5, 0, 650, 'Pav. lado izq. 37709', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 3, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-03', '13:44:00', '13:58:00', '14:30:00', 26.1, 7, 0, 650, 'Pav. lado izq. 37704', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 4, 'S1702', 'Pavimento concreto hidraulico', 3, 'cmc-04', '14:03:00', '14:20:00', '14:42:00', 25.7, 6.75, 0, 650, 'Pav. lado izq. 37713', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 5, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '14:16:00', '14:27:00', '15:00:00', 26.9, 5.5, 0, 650, 'Pav. lado izq. 37715', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 6, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-02', '14:39:00', '14:54:00', '15:21:00', 26.9, 4.5, 0, 650, 'Pav. lado izq. 37716', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 7, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-03', '15:07:00', '15:22:00', '16:12:00', 27, 4, 4000, 650, 'Pav. lado izq. 37717', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 8, 'S1702', 'Pavimento concreto hidraulico', 3, 'cmc-04', '15:27:00', '15:45:00', '16:34:00', 25.8, 4.25, 2000, 650, 'Pav. lado izq. 37718', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 9, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-01', '15:51:00', '16:00:00', '17:00:00', 25, 5, 2000, 650, 'Pav. lado izq. 37719', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-30', 10, 'S1702', 'Pavimento concreto hidraulico', 8, 'cmc-02', '16:11:00', '16:25:00', '17:20:00', 25.1, 3.25, 0, 650, 'Pav. lado izq. 37720', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-31', 1, 'S1702', 'Pavimento de concreto hidraulico Est 0+302.53 - 0+384.24 II Carril lado Izq', 7, 'cmc-03', '10:18:00', '10:54:00', '01:05:00', 26.2, 5, NULL, 650, 'Pav. lado izq. hacia America 37735', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-31', 2, 'S1702', 'Pavimento de concreto hidraulico Est 0+302.53 - 0+384.24 II Carril lado Izq', 7, 'cmc-01', '10:57:00', '11:54:00', '11:26:00', 26.5, 6, NULL, 650, 'Pav. lado izq. hacia America 37736', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-31', 3, 'S1702', 'Pavimento de concreto hidraulico Est 0+302.53 - 0+384.24 II Carril lado Izq', 7, 'cmc-02', '11:44:00', '12:02:00', '12:20:00', 27, 5.25, NULL, 650, 'Pav. lado izq. hacia America 37746', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-31', 4, 'S1702', 'Pavimento de concreto hidraulico Est 0+302.53 - 0+384.24 II Carril lado Izq', 8, 'cmc-03', '12:17:00', '12:30:00', '13:00:00', 26.1, 5, NULL, 650, 'Pav. lado izq. hacia America 37747', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-31', 5, 'S1702', 'Pavimento de concreto hidraulico Est 0+302.53 - 0+384.24 II Carril lado Izq', 8, 'cmc-01', '13:21:00', '13:30:00', '13:50:00', 26.2, 6.5, NULL, 650, 'Pav. lado izq. hacia America 37749', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard'),
('2017-01-31', 6, 'S1702', 'Pavimento de concreto hidraulico Est 0+302.53 - 0+384.24 II Carril lado Izq', 8, 'cmc-02', '13:33:00', '13:45:00', '14:20:00', 26.8, 5, NULL, 650, 'Pav. lado izq. hacia America 37750', '2017-08-12 00:00:00', '0000-00-00 00:00:00', 'richard');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permiso`
--

CREATE TABLE `tbl_permiso` (
  `id_permiso_proceso` int(10) NOT NULL,
  `id_grupo_usuario` int(10) NOT NULL,
  `consultar` tinyint(1) NOT NULL,
  `editar` tinyint(1) NOT NULL,
  `nuevo` tinyint(1) NOT NULL,
  `eliminar` tinyint(1) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_permiso`
--

INSERT INTO `tbl_permiso` (`id_permiso_proceso`, `id_grupo_usuario`, `consultar`, `editar`, `nuevo`, `eliminar`, `fecha_registro`) VALUES
(1, 0, 1, 1, 1, 1, '2017-08-09 11:08:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `id_identidad` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_primero` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_segundo` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido_primero` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_segundo` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`id_identidad`, `titulo`, `nombre_primero`, `nombre_segundo`, `apellido_primero`, `apellido_segundo`, `fecha_nacimiento`, `fecha_registro`) VALUES
('0501-1986-04150', 'Ing.', 'Felix', 'Alexander', 'Hernandez', 'Ruiz', '1986-04-08', '2017-08-09 10:55:00'),
('0501-1990-00002', 'Sr.', 'Richard', NULL, 'Ramos', NULL, '1990-08-10', '2017-08-10 09:53:00'),
('0801-1986-14407', 'Lic.', 'Luis', 'Alberto', 'Colindres', 'Romero', '2017-08-09', '2017-08-25 09:45:00'),
('0801-1990-00000', 'Sr.', 'Wilmer', NULL, 'Ramos', NULL, '2017-08-09', '2017-08-09 16:22:00'),
('0801-1990-00001', 'Sr.', 'Hugo', NULL, 'Roches', NULL, '2017-08-09', '2017-08-09 16:23:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proyecto`
--

CREATE TABLE `tbl_proyecto` (
  `id_codigo_proyecto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `nombre_proyecto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_proyecto_abreviado` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_proyecto`
--

INSERT INTO `tbl_proyecto` (`id_codigo_proyecto`, `id_cliente`, `nombre_proyecto`, `nombre_proyecto_abreviado`, `ubicacion`, `fecha_inicio`, `fecha_fin`, `fecha_registro`, `activo`) VALUES
('S1608', 2, 'Construcción Edificio 1847, Ciudad Universitaria', '1847', 'Tegucigalpa, Francisco morazán', NULL, NULL, '2017-08-09 20:45:00', 1),
('S1702', 1, 'Construcción Paso a Desnivel Acceso a Col. América - Bulevar Económica Europea', 'PAD Acceso a Col. America', 'Frente a la Entrada de la Colonia América, Blv. Comunidad Económica europea', NULL, NULL, '2017-08-10 09:50:00', 1),
('S1704', 1, 'Construcción de conexión y Ampliación a dos carriles(Doble sentido) Vía rápida Aeropuerto y obras complementarias', 'Via rapido CAMOSA', NULL, NULL, NULL, '2017-08-09 20:39:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `id_identidad` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `id_identidad`, `contrasena`, `fecha_registro`, `activo`) VALUES
('alexander', '0501-1986-04150', '123', '2017-08-09 10:56:00', 1),
('hugo', '0801-1990-00001', '123', '2017-08-09 16:25:00', 1),
('luiscolindres', '0801-1986-14407', '123', '2017-08-25 09:47:00', 1),
('richard', '0501-1990-00002', '123', '2017-08-10 09:55:00', 1),
('wilmer', '0801-1990-00000', '123', '2017-08-09 16:24:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario_x_grupo_usuario_x_proyecto`
--

CREATE TABLE `tbl_usuario_x_grupo_usuario_x_proyecto` (
  `id_usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `id_grupo_usuario` int(10) NOT NULL,
  `id_codigo_proyecto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_usuario_x_grupo_usuario_x_proyecto`
--

INSERT INTO `tbl_usuario_x_grupo_usuario_x_proyecto` (`id_usuario`, `id_grupo_usuario`, `id_codigo_proyecto`, `fecha_registro`, `activo`) VALUES
('alexander', 1, 'S1702', '2017-08-09 00:00:00', 1),
('alexander', 2, 'S1702', '2017-08-09 00:00:00', 1),
('hugo', 1, 'S1702', '2017-08-09 00:00:00', 1),
('hugo', 1, 'S1704', '2017-08-09 00:00:00', 1),
('luiscolindres', 1, 'S1702', '2017-08-25 09:49:00', 1),
('wilmer', 1, 'S1704', '2017-08-10 00:00:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tbl_grupo_usuario`
--
ALTER TABLE `tbl_grupo_usuario`
  ADD PRIMARY KEY (`id_grupo_usuario`);

--
-- Indices de la tabla `tbl_lab_cilindro_viga_muestra_concreto`
--
ALTER TABLE `tbl_lab_cilindro_viga_muestra_concreto`
  ADD PRIMARY KEY (`id_n_cilindro_viga`,`tipo_cilindro_viga`,`id_codigo_proyecto`),
  ADD KEY `id_codigo_proyecto` (`id_codigo_proyecto`),
  ADD KEY `id_fecha_muestra` (`id_fecha_muestra`),
  ADD KEY `id_n_viaje` (`id_n_viaje`),
  ADD KEY `tbl_lab_cilindro_viga_muestra_concreto_ibfk_3` (`id_fecha_muestra`,`id_n_viaje`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `tbl_lab_laboratorista_x_muestra`
--
ALTER TABLE `tbl_lab_laboratorista_x_muestra`
  ADD PRIMARY KEY (`id_usuario`,`id_fecha_muestra`,`id_codigo_proyecto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_fecha_muestra` (`id_fecha_muestra`),
  ADD KEY `id_codigo_proyecto` (`id_codigo_proyecto`);

--
-- Indices de la tabla `tbl_lab_muestra_concreto`
--
ALTER TABLE `tbl_lab_muestra_concreto`
  ADD PRIMARY KEY (`id_fecha_muestra`,`id_n_viaje`,`id_codigo_proyecto`) USING BTREE,
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_codigo_proyecto` (`id_codigo_proyecto`);

--
-- Indices de la tabla `tbl_permiso`
--
ALTER TABLE `tbl_permiso`
  ADD PRIMARY KEY (`id_permiso_proceso`),
  ADD KEY `id_grupo_usuario` (`id_grupo_usuario`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`id_identidad`);

--
-- Indices de la tabla `tbl_proyecto`
--
ALTER TABLE `tbl_proyecto`
  ADD PRIMARY KEY (`id_codigo_proyecto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_identidad` (`id_identidad`);

--
-- Indices de la tabla `tbl_usuario_x_grupo_usuario_x_proyecto`
--
ALTER TABLE `tbl_usuario_x_grupo_usuario_x_proyecto`
  ADD UNIQUE KEY `id_usuario_2` (`id_usuario`,`id_grupo_usuario`,`id_codigo_proyecto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_grupo_usuario` (`id_grupo_usuario`),
  ADD KEY `id_codigo_proyecto` (`id_codigo_proyecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_grupo_usuario`
--
ALTER TABLE `tbl_grupo_usuario`
  MODIFY `id_grupo_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_permiso`
--
ALTER TABLE `tbl_permiso`
  MODIFY `id_permiso_proceso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_lab_cilindro_viga_muestra_concreto`
--
ALTER TABLE `tbl_lab_cilindro_viga_muestra_concreto`
  ADD CONSTRAINT `tbl_lab_cilindro_viga_muestra_concreto_ibfk_2` FOREIGN KEY (`id_codigo_proyecto`) REFERENCES `tbl_proyecto` (`id_codigo_proyecto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lab_cilindro_viga_muestra_concreto_ibfk_3` FOREIGN KEY (`id_fecha_muestra`,`id_n_viaje`) REFERENCES `tbl_lab_muestra_concreto` (`id_fecha_muestra`, `id_n_viaje`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lab_cilindro_viga_muestra_concreto_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_lab_laboratorista_x_muestra`
--
ALTER TABLE `tbl_lab_laboratorista_x_muestra`
  ADD CONSTRAINT `tbl_lab_laboratorista_x_muestra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lab_laboratorista_x_muestra_ibfk_2` FOREIGN KEY (`id_fecha_muestra`) REFERENCES `tbl_lab_muestra_concreto` (`id_fecha_muestra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lab_laboratorista_x_muestra_ibfk_3` FOREIGN KEY (`id_codigo_proyecto`) REFERENCES `tbl_proyecto` (`id_codigo_proyecto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_lab_muestra_concreto`
--
ALTER TABLE `tbl_lab_muestra_concreto`
  ADD CONSTRAINT `tbl_lab_muestra_concreto_ibfk_1` FOREIGN KEY (`id_codigo_proyecto`) REFERENCES `tbl_proyecto` (`id_codigo_proyecto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lab_muestra_concreto_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_permiso`
--
ALTER TABLE `tbl_permiso`
  ADD CONSTRAINT `tbl_permiso_ibfk_1` FOREIGN KEY (`id_grupo_usuario`) REFERENCES `tbl_grupo_usuario` (`id_grupo_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_proyecto`
--
ALTER TABLE `tbl_proyecto`
  ADD CONSTRAINT `tbl_proyecto_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_identidad`) REFERENCES `tbl_persona` (`id_identidad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuario_x_grupo_usuario_x_proyecto`
--
ALTER TABLE `tbl_usuario_x_grupo_usuario_x_proyecto`
  ADD CONSTRAINT `tbl_usuario_x_grupo_usuario_x_proyecto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_usuario_x_grupo_usuario_x_proyecto_ibfk_2` FOREIGN KEY (`id_grupo_usuario`) REFERENCES `tbl_grupo_usuario` (`id_grupo_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_usuario_x_grupo_usuario_x_proyecto_ibfk_3` FOREIGN KEY (`id_codigo_proyecto`) REFERENCES `tbl_proyecto` (`id_codigo_proyecto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
