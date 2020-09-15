-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2020 a las 07:04:18
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estructura de tabla para la tabla `continentes`
--

CREATE TABLE `continentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `continentes`
--

INSERT INTO `continentes` (`id`, `nombre`) VALUES
(1, 'Europa'),
(2, 'America del Norte'),
(3, 'America del Sur'),
(4, 'Asia'),
(5, 'Africa'),
(6, 'Oceania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `continentes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`, `continentes_id`) VALUES
(1, 'España', 1),
(2, 'Francia', 1),
(3, 'Italia', 1),
(4, 'Alemania', 1),
(5, 'Estados Unidos', 2),
(6, 'Canada', 2),
(7, 'Mexico', 2),
(8, 'Brasil', 3),
(9, 'Argentina', 3),
(10, 'Japon', 4),
(11, 'Corea del Sur', 4),
(12, 'Egipto', 5),
(13, 'Nigeria', 5),
(14, 'Australia', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `continentes_id` int(11) NOT NULL,
  `paises_id` int(11) NOT NULL,
  `precio` float NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `destacado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `continentes_id`, `paises_id`, `precio`, `activo`, `destacado`) VALUES
(1, 'Madrid', '\"descripcion\": \"VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n   \"descripcion_details\": [\r\n     \"ESPANIA Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/spain.jpg\"', 1, 1, 45010, 1, 1),
(2, 'Santiago de Compostela', '\"descripcion\": \"VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/spain.jpg\",', 1, 1, 45010, 1, 0),
(3, 'Covadonga', '\"descripcion\": \"VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/spain.jpg\",', 1, 1, 45010, 1, 0),
(4, 'La Manjoya', '\"descripcion\": \"VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/spain.jpg\",', 1, 1, 45010, 1, 0),
(5, 'Santander', '\"descripcion\": \"VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/spain.jpg\",', 1, 1, 45010, 1, 0),
(6, 'Paris', '\"descripcion\": \"VISITANDO: Francia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/cancum.jpg\",', 1, 2, 45020, 1, 1),
(7, 'Marcella', '\"descripcion\": \"VISITANDO: Francia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/cancum.jpg\",', 1, 2, 45020, 1, 0),
(8, 'Niza', '\"descripcion\": \"VISITANDO: Francia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/cancum.jpg\",', 1, 2, 45020, 1, 0),
(9, 'Roma', '\"descripcion\": \"VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/bariloche.jpg\",', 1, 3, 43000, 1, 1),
(10, 'Venecia', '\"descripcion\": \"VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/bariloche.jpg\",', 1, 3, 43000, 1, 0),
(11, 'Milan', '\"descripcion\": \"VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n   \"descripcion_details\": [\r\n     \"ESPANIA Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/bariloche.jpg\",', 1, 3, 43000, 1, 0),
(12, 'Florencia', '\"descripcion\": \"VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/bariloche.jpg\",', 1, 3, 43000, 1, 0),
(13, 'Berlin', '\"descripcion\": \"VISITANDO: Alemania, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n   \"descripcion_details\": [\r\n     \"ESPANIA Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/chubut.jpg\",', 1, 4, 44000, 1, 1),
(14, 'Hamburgo', '\"descripcion\": \"VISITANDO: Alemania, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/chubut.jpg\",', 1, 4, 44000, 1, 0),
(15, 'Dresde', '\"descripcion\": \"VISITANDO: Alemania, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\",\r\n  \"descripcion_details\": [\r\n    \"ESPANIA Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/chubut.jpg\",', 1, 4, 44000, 1, 0),
(16, 'Nueva York', '\"descripcion\": \"Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Estados Unidos Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/estadosunidos.jpg\",', 2, 5, 20000, 1, 1),
(17, 'Chicago', '\"descripcion\": \"Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Estados Unidos Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/estadosunidos.jpg\",', 2, 5, 20000, 1, 0),
(18, 'San Francisco', '\"descripcion\": \"Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Estados Unidos Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/estadosunidos.jpg\",', 2, 5, 20000, 1, 0),
(19, 'Washington', '\"descripcion\": \"Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Estados Unidos Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/estadosunidos.jpg\",', 2, 5, 20000, 1, 0),
(20, 'Los Angeles', '\"descripcion\": \"Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n   \"descripcion_details\": [\r\n     \"Estados Unidos Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/estadosunidos.jpg\",', 2, 5, 20000, 1, 0),
(21, 'Otawa', '\"descripcion\": \"Canada Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n   \"descripcion_details\": [\r\n     \"Estados Unidos Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/canada.jpg\",', 2, 6, 20000, 1, 1),
(22, 'Toronto', '\"descripcion\": \"Canada Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Estados Unidos Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/canada.jpg\",', 2, 6, 20000, 1, 0),
(23, 'Ciudad de Mexico', '\"descripcion\": \"Mexico Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n   \"descripcion_details\": [\r\n     \"Estados Unidos Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/larioja.jpg\",', 2, 7, 20000, 1, 1),
(24, 'Tulum', '\"descripcion\": \"Mexico Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Estados Unidos Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/larioja.jpg\",', 2, 7, 20000, 1, 0),
(25, 'Playa del Carmen', '\"descripcion\": \"Mexico Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Estados Unidos Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/larioja.jpg\",', 2, 7, 20000, 1, 0),
(26, 'Rio de Janeiro', '\"descripcion\": \"INCLUYE: Brasil GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n   \"descripcion_details\": [\r\n     \"Argentina Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/peru.jpg\",', 3, 8, 60030, 1, 1),
(27, 'Florianopolis', '\"descripcion\": \"INCLUYE: Brasil GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Argentina Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/peru.jpg\",', 3, 8, 60030, 1, 0),
(28, 'Salvador de Bahia', '\"descripcion\": \"INCLUYE: Brasil GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Argentina Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/peru.jpg\",', 3, 8, 60030, 1, 0),
(29, 'Buenos Aires', '\"descripcion\": \"INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n   \"descripcion_details\": [\r\n     \"Argentina Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/calafate.jpg\",', 3, 9, 60030, 1, 1),
(30, 'Bariloche', '\"descripcion\": \"INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Argentina Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/calafate.jpg\",', 3, 9, 60030, 1, 1),
(31, 'Salta', '\"descripcion\": \"INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Argentina Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/calafate.jpg\",', 3, 9, 60030, 1, 0),
(32, 'Misiones', '\"descripcion\": \"INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Argentina Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/calafate.jpg\",', 3, 9, 60030, 1, 0),
(33, 'Calafate', '\"descripcion\": \"INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Argentina Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/calafate.jpg\",', 3, 9, 60030, 1, 0),
(34, 'Mendoza', '\"descripcion\": \"INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.\",\r\n  \"descripcion_details\": [\r\n    \"Argentina Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/calafate.jpg\",', 3, 9, 60030, 1, 0),
(35, 'Tokio', '\"descripcion\": \"VISITANDO: Japon Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n   \"descripcion_details\": [\r\n     \"Japon Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/misiones.jpg\",', 4, 10, 36200, 1, 1),
(36, 'Kioto', '\"descripcion\": \"VISITANDO: Japon Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n  \"descripcion_details\": [\r\n    \"Japon Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/misiones.jpg\",', 4, 10, 6200, 1, 0),
(37, 'Seul', '\"descripcion\": \"VISITANDO: Corea del Sur Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n   \"descripcion_details\": [\r\n     \"Japon Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/misiones2.jpg\",', 4, 11, 36200, 1, 0),
(38, 'Busan', '\"descripcion\": \"VISITANDO: Corea del Sur Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n  \"descripcion_details\": [\r\n    \"Japon Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/misiones2.jpg\",', 4, 11, 36200, 1, 1),
(39, 'El Cairo', '\"descripcion\": \"VISITANDO: Egipto/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n   \"descripcion_details\": [\r\n     \"Egipto Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/rio.jpg\",', 5, 12, 36020, 1, 1),
(40, 'Luxor', '\"descripcion\": \"VISITANDO: Egipto/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n  \"descripcion_details\": [\r\n    \"Egipto Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/rio.jpg\",', 5, 12, 36020, 1, 0),
(41, 'Alejandria', '\"descripcion\": \"VISITANDO: Egipto/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n  \"descripcion_details\": [\r\n    \"Egipto Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/rio.jpg\",', 5, 12, 36020, 1, 0),
(42, 'Lagos', '\"descripcion\": \"VISITANDO: Nigeria/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n   \"descripcion_details\": [\r\n     \"Egipto Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/rio2.jpg\",', 5, 13, 36550, 1, 0),
(43, 'Sidney', '\"descripcion\": \"VISITANDO: Australia/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n   \"descripcion_details\": [\r\n     \"Australia Aéreos ES/FE/ES\",\r\n     \"04 Noches de alojamiento con régimen según elección.\",\r\n     \"Traslados In / Out\",\r\n     \"City Tour\",\r\n     \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n     \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n   ],\r\n   \"url\": \"./images/ushuaia.jpg\",', 6, 14, 360630, 1, 1),
(44, 'Melbourne', '\"descripcion\": \"VISITANDO: Australia/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n  \"descripcion_details\": [\r\n    \"Australia Aéreos ES/FE/ES\",\r\n    \"04 Noches de alojamiento con régimen según elección.\",\r\n    \"Traslados In / Out\",\r\n    \"City Tour\",\r\n    \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n    \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n  ],\r\n  \"url\": \"./images/ushuaia.jpg\",', 6, 14, 360630, 1, 0),
(45, 'Brisbane', '\"descripcion\": \"VISITANDO: Australia/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).\",\r\n     \"descripcion_details\": [\r\n       \"Australia Aéreos ES/FE/ES\",\r\n       \"04 Noches de alojamiento con régimen según elección.\",\r\n       \"Traslados In / Out\",\r\n       \"City Tour\",\r\n       \"Notas: AÉREOS NETOS NO COMISONABLES.\",\r\n       \"Consulte a su ejecutivo de ventas por asistencia al viajero.\"\r\n     ],\r\n     \"url\": \"./images/ushuaia.jpg\",', 6, 14, 360630, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `continentes`
--
ALTER TABLE `continentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `continentes_id` (`continentes_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `continentes_id` (`continentes_id`),
  ADD KEY `paises_id` (`paises_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `continentes`
--
ALTER TABLE `continentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paises`
--
ALTER TABLE `paises`
  ADD CONSTRAINT `paises_ibfk_1` FOREIGN KEY (`continentes_id`) REFERENCES `continentes` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`paises_id`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`continentes_id`) REFERENCES `continentes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
