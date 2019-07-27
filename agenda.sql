-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-07-2019 a las 16:21:41
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `FechaIni` date NOT NULL,
  `FechaFin` date DEFAULT NULL,
  `HoraIni` time DEFAULT NULL,
  `HoraFin` time DEFAULT NULL,
  `AllDay` tinyint(1) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `Titulo`, `FechaIni`, `FechaFin`, `HoraIni`, `HoraFin`, `AllDay`, `Usuario`) VALUES
(2, 'primero', '2019-07-26', '2019-07-27', '07:00:00', '07:00:00', 0, 'luis@agenda.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Email` varchar(50) NOT NULL,
  `NombreC` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FechaNac` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Email`, `NombreC`, `Password`, `FechaNac`) VALUES
('luis@agenda.com', 'Luis Lopez Lopez', '$2y$10$ldjNDebbCBonk2028.JX8.qgW4iI8PbJ5oE5TJEHAXgkBmYUsBk6C', '1998-12-25'),
('pedro@agenda.com', 'Pedro Garcia Garcia', '$2y$10$BR/PWgDRooDlZ7do7p23IeeUTNjQoqaUWPJcqAM4jhEkMddoSjZUy', '2001-04-11'),
('juan@agenda.com', 'Juan Martinez Martinez', '$2y$10$tp1.7PpJ80jC7jB4yVQcMewHIc0NAWbOoutSei.gH4G77vDDK7TLq', '1988-09-04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
