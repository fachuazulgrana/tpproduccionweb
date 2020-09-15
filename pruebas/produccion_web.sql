-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2020 a las 00:53:36
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
  `paises_id` int(11) NOT NULL,
  `precio` float NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `destacado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `paises_id`, `precio`, `activo`, `destacado`) VALUES
(1, 'Madrid', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.\r\n   ', 1, 58900, 1, 1),
(2, 'Santiago de Compostela', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 1, 60000, 1, 0),
(3, 'Covadonga', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 1, 55000, 1, 0),
(4, 'La Manjoya', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 1, 53200, 1, 0),
(5, 'Santander', 'VISITANDO: España MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 1, 68500, 1, 0),
(6, 'Paris', 'VISITANDO: Francia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 2, 68300, 1, 1),
(7, 'Marsella', 'VISITANDO: Francia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 2, 57800, 1, 0),
(8, 'Niza', 'VISITANDO: Francia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 2, 46500, 1, 0),
(9, 'Roma', 'VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 3, 67600, 1, 1),
(10, 'Venecia', 'VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 3, 61800, 1, 0),
(11, 'Milan', 'VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 3, 59600, 1, 0),
(12, 'Florencia', 'VISITANDO: Italia MADRID, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.,', 3, 49700, 1, 0),
(13, 'Berlin', 'VISITANDO: Alemania, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 4, 51400, 1, 1),
(14, 'Hamburgo', 'VISITANDO: Alemania, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 4, 45500, 1, 0),
(15, 'Dresde', 'VISITANDO: Alemania, SANTIAGO DE COMPOSTELA -RINLO - CABO VIDIO - LA MANJOYA - COVADONGA - CUEVAS DEL SOPLAO - SANTANDER - BILBAO - SAN SEBASTIAN.', 4, 42000, 1, 0),
(16, 'Nueva York', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 5, 38900, 1, 1),
(17, 'Chicago', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 5, 38000, 1, 0),
(18, 'San Francisco', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 5, 30500, 1, 0),
(19, 'Washington', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 5, 35000, 1, 0),
(20, 'Los Angeles', 'Estados Unidos Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 5, 36900, 1, 0),
(21, 'Ottawa', 'Canada Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 6, 25000, 1, 1),
(22, 'Toronto', 'Canada Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 6, 30000, 1, 0),
(23, 'Ciudad de Mexico', 'Mexico Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 7, 25000, 1, 1),
(24, 'Tulum', 'Mexico Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 7, 22000, 1, 0),
(25, 'Playa del Carmen', 'Mexico Visitando: Bsssoston / Quebec / Montreal / Ottawa / Toronto / Niagara Falls - Incluye: boleto por American Airlines. Desayunos Americanos. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 7, 28500, 1, 0),
(26, 'Rio de Janeiro', 'INCLUYE: Brasil GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 8, 25000, 1, 1),
(27, 'Florianopolis', 'INCLUYE: Brasil GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 8, 22800, 1, 0),
(28, 'Salvador de Bahia', 'INCLUYE: Brasil GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 8, 60030, 1, 0),
(29, 'Buenos Aires', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 9, 60030, 1, 1),
(30, 'Bariloche', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 9, 60030, 1, 1),
(31, 'Salta', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 9, 60030, 1, 0),
(32, 'Misiones', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 9, 60030, 1, 0),
(33, 'Calafate', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 9, 60030, 1, 0),
(34, 'Mendoza', 'INCLUYE: Argentina GUÍA: Operado con guía en español e inglés. Pasaje (Latam Airlines).   ALOJAMIENTO: 3 noches de alojamiento en Lima. 1 noche de alojamiento en Paracas. 2 noches de alojamiento en Cusco. 1 noche de alojamiento en Aguas Calientes. ALIMENTACIÓN: Desayuno diario incluidos. Opcional: asistencia CORIS con seguro de cancelación USD 36 por persona.', 9, 60030, 1, 0),
(35, 'Tokio', 'VISITANDO: Japon Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 10, 36200, 1, 1),
(36, 'Kioto', 'VISITANDO: Japon Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 10, 6200, 1, 0),
(37, 'Seul', 'VISITANDO: Corea del Sur Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 11, 36200, 1, 0),
(38, 'Busan', 'VISITANDO: Corea del Sur Vancouver/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 11, 36200, 1, 1),
(39, 'El Cairo', 'VISITANDO: Egipto/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 12, 36020, 1, 1),
(40, 'Luxor', 'VISITANDO: Egipto/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 12, 36020, 1, 0),
(41, 'Alejandria', 'VISITANDO: Egipto/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 12, 36020, 1, 0),
(42, 'Lagos', 'VISITANDO: Nigeria/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 13, 36550, 1, 0),
(43, 'Sidney', 'VISITANDO: Australia/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 14, 360630, 1, 1),
(44, 'Melbourne', 'VISITANDO: Australia/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 14, 360630, 1, 0),
(45, 'Brisbane', 'VISITANDO: Australia/ Hope / Kelowna / Revelstoke / Golden / Columbia Ice Field / Canmore /  Banff / Calgar. Incluye: vuelo por American Airlines (Clase turista).', 14, 360630, 1, 0);

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
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`paises_id`) REFERENCES `paises` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
