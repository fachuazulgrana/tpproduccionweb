-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2020 a las 17:48:38
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `produccion_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campos_dinamicos`
--

CREATE TABLE `campos_dinamicos` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `valores` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `campos_dinamicos`
--

INSERT INTO `campos_dinamicos` (`id`, `producto_id`, `label`, `valores`) VALUES
(10, 137, 'Campo Dinamico', 'Contenido Campo Dinamico'),
(11, 138, 'Campo Dinamico2', 'Contenido Campo Dinamico2'),
(12, 139, 'dddddddddddddddddddddd', 'ssfsfdfs'),
(13, 139, 'Campo Dinamicodef', 'Congfgfdgdgfdg'),
(14, 139, 'OOOOtro cAMPO', 'oOOOOTRO CAMPO Din'),
(20, 1, 'campo mad', 'madmad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tipo` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `borrado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_usuario`, `nombre`, `apellido`, `email`, `user`, `password`, `tipo`, `activo`, `borrado`) VALUES
(1, 'Luis', 'Machin', 'mateo@gmail.com', 'pepito', '$2y$12$sdgsfgsdfksjfjs5245fdesajytGDhCcHSj4cfQpUiVv7FgtmiC9W', 0, 0, 1),
(8, 'Mateo', 'Porcar', 'mateoporcar@gmail.com', 'mateo', '$2y$12$sdgsfgsdfksjfjs5245fdey4PO8f2gLoOZHzDOOLIJohyK8gRybNC', 0, 0, 1),
(9, 'Mateo', 'Machin', 'mateo@mateo.com', 'mateito', '$2y$12$sdgsfgsdfksjfjs5245fdey4PO8f2gLoOZHzDOOLIJohyK8gRybNC', 0, 1, 0),
(10, 'Usuario2', 'user', 'mateoporcar@gmail.com.ar', 'user2', '', 0, 0, 0),
(11, 'Luisewew', 'dfsdfs', 'mateoporcar2@gmail.com', 'sdfsdfs', '$2y$12$sdgsfgsdfksjfjs5245fde.9./KSdGnGqpB6tZjfSjJFz2QWePrOy', 0, 1, 0),
(12, 'Mateo1', 'Porcar1', 'mateo@gggmail.com', 'user3', '$2y$12$sdgsfgsdfksjfjs5245fdey4PO8f2gLoOZHzDOOLIJohyK8gRybNC', 0, 1, 0),
(13, 'Mateo', 'Porcar', 'mateo@gmail.com.ar', 'mateo10', '$2y$12$sdgsfgsdfksjfjs5245fdesajytGDhCcHSj4cfQpUiVv7FgtmiC9W', 0, 1, 0),
(14, 'Mateo', 'fsdfssfds', 'sdfsf@gmail.com', 'sdfsfd', '$2y$12$sdgsfgsdfksjfjs5245fdeF.Ji93nqah47oNhO65JJ0swJ0YSjbt6', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` char(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `calificacion` int(11) NOT NULL,
  `comentario` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `ip` char(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `productos_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `email`, `calificacion`, `comentario`, `fecha`, `ip`, `productos_id`, `activo`) VALUES
(1, 'asd', 'asd@asd', 2, 'asd', '2019-09-20', '100.100.100', 1, 0),
(2, 'sad', 'sad@sad', 5, 'sad', '2019-09-20', '100.100.100', 1, 0),
(23, 'nuevo', 'mateo.mateo@gmail.com', 3, 'fgsfgdfdfgfdgfdg', '2020-11-21', '::1', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_dinamicos`
--

CREATE TABLE `comentarios_dinamicos` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `opcion` text DEFAULT NULL,
  `valor` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios_dinamicos`
--

INSERT INTO `comentarios_dinamicos` (`id`, `label`, `tipo`, `opcion`, `valor`) VALUES
(2, 'Transporte', '3', '1', 'Avion/Tren/Barco'),
(6, 'Te gusto?', '2', '1', ''),
(8, 'Estación del Año', '3', '1', 'Verano/Otoño/Invierno/Primavera'),
(9, 'Comentario Adicional', '1', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_dinamicos_data`
--

CREATE TABLE `comentarios_dinamicos_data` (
  `id` int(11) NOT NULL,
  `comentario_original_id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL,
  `informacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios_dinamicos_data`
--

INSERT INTO `comentarios_dinamicos_data` (`id`, `comentario_original_id`, `comentario_id`, `informacion`) VALUES
(7, 23, 2, 'Tren'),
(8, 23, 6, 'on'),
(9, 23, 8, 'Otoño'),
(10, 23, 9, 'Otro comentario adicional que estoy haciendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_guardar`
--

CREATE TABLE `comentarios_guardar` (
  `comentarios_id` int(11) NOT NULL,
  `comentarios_dinamicos_id` int(11) NOT NULL,
  `valor_ingresado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continentes`
--

CREATE TABLE `continentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `continentes`
--

INSERT INTO `continentes` (`id`, `nombre`, `activo`) VALUES
(1, 'Europa', 1),
(2, 'America del Norte', 1),
(3, 'America del Sur', 0),
(4, 'Asia', 1),
(5, 'Africa', 1),
(6, 'Oceania', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `fecha`) VALUES
(1, 'asd@asd', '2023-09-20'),
(2, 'sss@sss', '2020-09-23'),
(3, 'sad@sad', '2020-09-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `continentes_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`, `continentes_id`, `activo`) VALUES
(1, 'España', 1, 1),
(2, 'Francia', 1, 1),
(3, 'Italia', 1, 1),
(4, 'Alemania', 1, 0),
(5, 'Estados Unidos', 2, 1),
(6, 'Canada', 2, 1),
(7, 'Mexico', 2, 1),
(8, 'Brasil', 3, 1),
(9, 'Argentina', 3, 1),
(10, 'Japon', 4, 1),
(11, 'Corea del Sur', 4, 0),
(12, 'Egipto', 5, 0),
(13, 'Nigeria', 5, 1),
(14, 'Australia', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nombre`) VALUES
(1, 'administrador'),
(2, 'gerencia'),
(3, 'cliente'),
(4, 'visitante'),
(10, 'perfil_clientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_permiso`
--

CREATE TABLE `perfil_permiso` (
  `perfil_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil_permiso`
--

INSERT INTO `perfil_permiso` (`perfil_id`, `permiso_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(2, 5),
(2, 7),
(2, 9),
(2, 11),
(2, 12),
(3, 6),
(3, 7),
(3, 8),
(3, 10),
(3, 11),
(3, 12),
(3, 14),
(3, 15),
(3, 16),
(3, 18),
(3, 19),
(3, 20),
(4, 2),
(4, 3),
(10, 21),
(10, 22),
(10, 23),
(10, 24),
(10, 25),
(10, 26),
(10, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `permisos_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`permisos_id`, `nombre`, `code`, `seccion`) VALUES
(1, 'Agregar Usuarios', 'user.add', 'user'),
(2, 'Modificar Usuarios', 'user.edit', 'user'),
(3, 'Borrar Usuarios', 'user.del', 'user'),
(4, 'Ver Usuarios', 'user.see', 'user'),
(5, 'Agregar productos', 'prod.add', 'prod'),
(6, 'Modificar productos', 'prod.edit', 'prod'),
(7, 'Borrar productos', 'prod.del', 'prod'),
(8, 'Ver productos', 'prod.see', 'prod'),
(9, 'Agregar paises', 'pais.add', 'pais'),
(10, 'Modificar paises', 'pais.edit', 'pais'),
(11, 'Borrar paises', 'pais.del', 'pais'),
(12, 'Ver paises', 'pais.see', 'pais'),
(13, 'Agregar continentes', 'cont.add', 'cont'),
(14, 'Modificar continentes', 'cont.edit', 'cont'),
(15, 'Borrar continentes', 'cont.del', 'cont'),
(16, 'Ver continentes', 'cont.see', 'cont'),
(17, 'Agregar comentarios', 'com.add', 'com'),
(18, 'Modificar comentarios', 'com.edit', 'com'),
(19, 'Borrar comentarios', 'com.del', 'com'),
(20, 'Ver comentarios', 'com.see', 'com'),
(21, 'Agregar perfiles', 'perf.add', 'perf'),
(22, 'Editar perfiles', 'perf.edit', 'perf'),
(23, 'Borrar perfiles', 'perf.del', 'perf'),
(24, 'Ver perfiles', 'perf.see', 'perf'),
(25, 'Ver Clientes', 'cli.see', 'cli'),
(26, 'Editar Clientes', 'cli.edit', 'cli'),
(27, 'Borrar Clientes', 'cli.del', 'cli');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `detalle` text COLLATE utf8_bin NOT NULL,
  `paises_id` int(11) NOT NULL,
  `precio` float NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `destacado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `detalle`, `paises_id`, `precio`, `activo`, `destacado`) VALUES
(1, 'Madrid', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\r\n   ', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 1, 58900, 1, 0),
(2, 'Santiago de Compostela', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 1, 60000, 1, 0),
(3, 'Covadonga', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 1, 55000, 1, 0),
(4, 'La Manjoya', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 1, 53200, 1, 0),
(5, 'Santander', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 1, 68500, 1, 0),
(6, 'Paris', 'VISITANDO: Francia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 2, 68300, 1, 0),
(7, 'Marsella', 'VISITANDO: Francia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 2, 57800, 1, 0),
(8, 'Niza', 'VISITANDO: Francia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 2, 46500, 1, 0),
(9, 'Roma', 'VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 3, 67600, 1, 1),
(10, 'Venecia', 'VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 3, 61800, 1, 0),
(11, 'Milan', 'VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 3, 59600, 1, 0),
(12, 'Florencia', 'VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.,', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 3, 49700, 1, 0),
(13, 'Berlin', 'VISITANDO: Alemania, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 4, 51400, 1, 1),
(14, 'Hamburgo', 'VISITANDO: Alemania, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 4, 45500, 1, 0),
(15, 'Dresde', 'VISITANDO: Alemania, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 4, 42000, 1, 0),
(16, 'Nueva York', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 5, 38900, 1, 0),
(17, 'Chicago', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 5, 38000, 1, 0),
(18, 'San Francisco', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 5, 30500, 1, 0),
(19, 'Washington', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 5, 35000, 1, 0),
(20, 'Los Angeles', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 5, 36900, 1, 0),
(21, 'Ottawa', 'Canada Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 6, 25000, 1, 1),
(22, 'Toronto', 'Canada Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 6, 30000, 1, 0),
(23, 'Ciudad de Mexico', 'Mexico Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 7, 25000, 1, 0),
(24, 'Tulum', 'Mexico Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 7, 22000, 1, 0),
(25, 'Playa del Carmen', 'Mexico Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Estados Unidos Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 7, 28500, 1, 0),
(26, 'Rio de Janeiro', 'INCLUYE: Brasil GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Argentina Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 8, 25000, 1, 1),
(27, 'Florianopolis', 'INCLUYE: Brasil GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Argentina Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 8, 22800, 1, 0),
(28, 'Salvador de Bahia', 'INCLUYE: Brasil GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Argentina Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 8, 60030, 1, 0),
(29, 'Buenos Aires', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Argentina Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 9, 60030, 1, 1),
(30, 'Bariloche', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Argentina Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 9, 60030, 1, 1),
(31, 'Salta', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Argentina Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 9, 60030, 1, 0),
(32, 'Misiones', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Argentina Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 9, 60030, 1, 0),
(33, 'Calafate', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Argentina Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 9, 60030, 1, 0),
(34, 'Mendoza', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 'Argentina Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 9, 60030, 1, 0),
(35, 'Tokio', 'VISITANDO: Japon Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 'Japon Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 10, 36200, 1, 1),
(36, 'Kioto', 'VISITANDO: Japon Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 'Japon Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 10, 6200, 1, 0),
(37, 'Seul', 'VISITANDO: Corea del Sur Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 'Japon Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 11, 36200, 1, 0),
(38, 'Busan', 'VISITANDO: Corea del Sur Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 'Japon Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 11, 36200, 1, 1),
(39, 'El Cairo', 'VISITANDO: Egipto/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 'Egipto Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 12, 36020, 1, 1),
(40, 'Luxor', 'VISITANDO: Egipto/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 'Egipto Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 12, 36020, 1, 0),
(41, 'Alejandria', 'VISITANDO: Egipto/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 'Egipto Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 12, 36020, 1, 0),
(42, 'Lagos', 'VISITANDO: Nigeria/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 'Egipto Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 13, 36550, 1, 0),
(43, 'Sidney', 'VISITANDO: Australia/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', ' Australia Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 14, 360630, 1, 1),
(44, 'Melbourne', 'VISITANDO: Australia/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', ' Australia Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 14, 360630, 1, 0),
(45, 'Brisbane', 'VISITANDO: Australia/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', ' Australia Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección.  - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 14, 360630, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_comentarios_dinamicos`
--

CREATE TABLE `productos_comentarios_dinamicos` (
  `id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `comentarios_dinamicos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_comentarios_dinamicos`
--

INSERT INTO `productos_comentarios_dinamicos` (`id`, `productos_id`, `comentarios_dinamicos_id`) VALUES
(25, 1, 2),
(26, 1, 6),
(27, 1, 8),
(28, 1, 9),
(1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_info`
--

CREATE TABLE `productos_info` (
  `id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `usuario` varchar(80) NOT NULL,
  `clave` varchar(300) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `borrado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `activo`, `borrado`) VALUES
(40, 'mateo', 'Porrc', 'mateo.porcar@live.com.ar', 'mateito', '$2y$12$sdgsfgsdfksjfjs5245fdeKxG1ZfaZCOjh92OVQzqgA6MwHYGEaHa', 1, 1),
(41, 'nuevo', 'Porrc', 'mateo.mateo@gmail.com', 'mattte', '$2y$12$sdgsfgsdfksjfjs5245fdesajytGDhCcHSj4cfQpUiVv7FgtmiC9W', 0, 0),
(42, 'nuevo4443', 'Porcar', 'mateo.porcar2@live.com.ar', 'mateo2', '$2y$12$sdgsfgsdfksjfjs5245fdesajytGDhCcHSj4cfQpUiVv7FgtmiC9W', 0, 1),
(43, 'Mateo', 'Porcar', 'mateo.porcar@gmail.com', 'mateo', '$2y$12$sdgsfgsdfksjfjs5245fdesajytGDhCcHSj4cfQpUiVv7FgtmiC9W', 1, 0),
(44, 'fafa', 'fafa', 'asd@asd', 'asd', '$2y$12$sdgsfgsdfksjfjs5245fdeF.Ji93nqah47oNhO65JJ0swJ0YSjbt6', 0, 1),
(45, 'Perfiles', 'Clientes', 'perfcli@gmail.com', 'perf_cli', '$2y$12$sdgsfgsdfksjfjs5245fdesajytGDhCcHSj4cfQpUiVv7FgtmiC9W', 1, 0),
(46, 'Geren', 'Ger', 'gerencia@gmail.com', 'geren', '$2y$12$sdgsfgsdfksjfjs5245fdesajytGDhCcHSj4cfQpUiVv7FgtmiC9W', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_perfiles`
--

CREATE TABLE `usuario_perfiles` (
  `usuario_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_perfiles`
--

INSERT INTO `usuario_perfiles` (`usuario_id`, `perfil_id`) VALUES
(40, 1),
(40, 2),
(41, 1),
(42, 1),
(42, 2),
(43, 1),
(44, 1),
(45, 10),
(46, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campos_dinamicos`
--
ALTER TABLE `campos_dinamicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodcampos_ibfk_1` (`producto_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `user` (`user`) USING BTREE;

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `productos_id` (`productos_id`);

--
-- Indices de la tabla `comentarios_dinamicos`
--
ALTER TABLE `comentarios_dinamicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios_dinamicos_data`
--
ALTER TABLE `comentarios_dinamicos_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodcom_ibfk_2` (`comentario_id`),
  ADD KEY `coment_ibfk_1` (`comentario_original_id`);

--
-- Indices de la tabla `comentarios_guardar`
--
ALTER TABLE `comentarios_guardar`
  ADD KEY `comentarios_id` (`comentarios_id`,`comentarios_dinamicos_id`),
  ADD KEY `comentarios_dinamicos_id` (`comentarios_dinamicos_id`);

--
-- Indices de la tabla `continentes`
--
ALTER TABLE `continentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `continentes_id` (`continentes_id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `perfil_permiso`
--
ALTER TABLE `perfil_permiso`
  ADD PRIMARY KEY (`perfil_id`,`permiso_id`),
  ADD KEY `permiso_id` (`permiso_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`permisos_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `paises_id` (`paises_id`);

--
-- Indices de la tabla `productos_comentarios_dinamicos`
--
ALTER TABLE `productos_comentarios_dinamicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_id` (`productos_id`,`comentarios_dinamicos_id`),
  ADD KEY `comentarios_dinamicos_id` (`comentarios_dinamicos_id`);

--
-- Indices de la tabla `productos_info`
--
ALTER TABLE `productos_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_id` (`productos_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_perfiles`
--
ALTER TABLE `usuario_perfiles`
  ADD PRIMARY KEY (`usuario_id`,`perfil_id`),
  ADD KEY `perfil_id` (`perfil_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campos_dinamicos`
--
ALTER TABLE `campos_dinamicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `comentarios_dinamicos`
--
ALTER TABLE `comentarios_dinamicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `comentarios_dinamicos_data`
--
ALTER TABLE `comentarios_dinamicos_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `continentes`
--
ALTER TABLE `continentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `productos_comentarios_dinamicos`
--
ALTER TABLE `productos_comentarios_dinamicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos_info`
--
ALTER TABLE `productos_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campos_dinamicos`
--
ALTER TABLE `campos_dinamicos`
  ADD CONSTRAINT `prodcampos_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `comentarios_dinamicos_data`
--
ALTER TABLE `comentarios_dinamicos_data`
  ADD CONSTRAINT `coment_ibfk_1` FOREIGN KEY (`comentario_original_id`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `prodcom_ibfk_2` FOREIGN KEY (`comentario_id`) REFERENCES `comentarios_dinamicos` (`id`);

--
-- Filtros para la tabla `comentarios_guardar`
--
ALTER TABLE `comentarios_guardar`
  ADD CONSTRAINT `comentarios_guardar_ibfk_1` FOREIGN KEY (`comentarios_id`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `comentarios_guardar_ibfk_2` FOREIGN KEY (`comentarios_dinamicos_id`) REFERENCES `comentarios_dinamicos` (`id`);

--
-- Filtros para la tabla `paises`
--
ALTER TABLE `paises`
  ADD CONSTRAINT `paises_ibfk_1` FOREIGN KEY (`continentes_id`) REFERENCES `continentes` (`id`);

--
-- Filtros para la tabla `perfil_permiso`
--
ALTER TABLE `perfil_permiso`
  ADD CONSTRAINT `perfil_permiso_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `perfil_permiso_ibfk_2` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`permisos_id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`paises_id`) REFERENCES `paises` (`id`);

--
-- Filtros para la tabla `productos_comentarios_dinamicos`
--
ALTER TABLE `productos_comentarios_dinamicos`
  ADD CONSTRAINT `productos_comentarios_dinamicos_ibfk_1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `productos_comentarios_dinamicos_ibfk_2` FOREIGN KEY (`comentarios_dinamicos_id`) REFERENCES `comentarios_dinamicos` (`id`);

--
-- Filtros para la tabla `productos_info`
--
ALTER TABLE `productos_info`
  ADD CONSTRAINT `productos_info_ibfk_1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `usuario_perfiles`
--
ALTER TABLE `usuario_perfiles`
  ADD CONSTRAINT `usuario_perfiles_ibfk_2` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `usuario_perfiles_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
