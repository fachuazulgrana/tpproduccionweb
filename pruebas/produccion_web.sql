-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2020 a las 00:00:10
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
-- Base de datos: `produccion_web`
--

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
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_usuario`, `nombre`, `apellido`, `email`, `user`, `password`, `tipo`, `activo`) VALUES
(1, 'Luis', 'Machin', 'mateo@gmail.com', 'pepito', '123456', 0, 0),
(8, 'Mateo', 'Porcar', 'mateoporcar@gmail.com', 'mateo', '$2y$12$sdgsfgsdfksjfjs5245fdey4PO8f2gLoOZHzDOOLIJohyK8gRybNC', 0, 0),
(9, 'Mateo', 'Machin', 'mateo@mateo.com', 'mateito', '$2y$12$sdgsfgsdfksjfjs5245fdey4PO8f2gLoOZHzDOOLIJohyK8gRybNC', 0, 0),
(10, 'Usuario2', 'user', 'mateoporcar@gmail.com.ar', 'user2', '', 0, 0),
(11, 'Luisewew', 'dfsdfs', 'mateoporcar2@gmail.com', 'sdfsdfs', '$2y$12$sdgsfgsdfksjfjs5245fde.9./KSdGnGqpB6tZjfSjJFz2QWePrOy', 0, 0);

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
(8, 'asd', 'sss@sss', 3, 'sasa', '2023-09-20', '::1', 1, 0),
(9, 'asd', 'asd@asd', 5, 'asd', '2020-09-30', '::1', 9, 1);

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
(4, 'visitante');

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
(2, 4),
(3, 2),
(3, 3),
(4, 2),
(4, 3);

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
(1, 'Agregar usuarios', 'user.add', 'user'),
(2, 'Modificar usuarios', 'user.edit', 'user'),
(3, 'Borrar usuarios', 'user.del', 'user'),
(4, 'Ver usuarios', 'user.see', 'user'),
(5, 'Agregar productos', 'prod.add', 'prod'),
(6, 'Modificar productos', 'prod.edit', 'prod'),
(7, 'Borrar productos', 'prod.del', 'prod'),
(8, 'Ver productos', 'prod.see', 'prod'),
(9, 'Agregar paises', 'prod.add', 'prod'),
(10, 'Modificar paises', 'prod.edit', 'prod'),
(11, 'Borrar paises', 'prod.del', 'prod'),
(12, 'Ver paises', 'prod.see', 'prod'),
(13, 'Agregar continentes', 'prod.add', 'prod'),
(14, 'Modificar continentes', 'prod.edit', 'prod'),
(15, 'Borrar continentes', 'prod.del', 'prod'),
(16, 'Ver continentes', 'prod.see', 'prod'),
(17, 'Agregar comentarios', 'com.add', 'com'),
(18, 'Modificar comentarios', 'com.edit', 'com'),
(19, 'Borrar comentarios', 'com.del', 'com'),
(20, 'Ver comentarios', 'com.see', 'com');

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
(1, 'Madrid', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\r\n   ', 'ESPANIA Aéreos ES/FE/ES  - 04 Noches de alojamiento con régimen según elección. - Traslados In / Out  - City Tour  - Notas: AÉREOS NETOS NO COMISONABLES.  - Consulte a su ejecutivo de ventas por asistencia al viajero.', 1, 58900, 0, 0),
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `usuario` varchar(80) NOT NULL,
  `clave` varchar(300) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `activo`) VALUES
(11, 'geren', '', '', '', '$2y$12$sdgsfgsdfksjfjs5245fde.9./KSdGnGqpB6tZjfSjJ', 1),
(20, 'otro', '', '', '', '$2y$12$sdgsfgsdfksjfjs5245fde.9./KSdGnGqpB6tZjfSjJ', 1),
(27, 'usuariox', '', '', '', '$2y$12$sdgsfgsdfksjfjs5245fdesajytGDhCcHSj4cfQpUiV', 0),
(38, 'admin', '', '', '', '$2y$12$sdgsfgsdfksjfjs5245fdesajytGDhCcHSj4cfQpUiVv7FgtmiC9W', 1),
(39, 'Mateo', '', '', '', '$2y$12$sdgsfgsdfksjfjs5245fdeuST9q1.c3YQPvuBM2hrRudA9ZCs/pva', 0),
(40, 'mateo', 'Porrc', 'mateo.porcar@live.com.ar', 'mateito', '$2y$12$sdgsfgsdfksjfjs5245fdeKxG1ZfaZCOjh92OVQzqgA6MwHYGEaHa', 1),
(41, 'nuevo', 'Porrc', 'mateo.mateo@gmail.com', 'mattte', '$2y$12$sdgsfgsdfksjfjs5245fdey4PO8f2gLoOZHzDOOLIJohyK8gRybNC', 0);

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
(41, 2);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `continentes`
--
ALTER TABLE `continentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`);

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
-- Filtros para la tabla `usuario_perfiles`
--
ALTER TABLE `usuario_perfiles`
  ADD CONSTRAINT `usuario_perfiles_ibfk_2` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `usuario_perfiles_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
