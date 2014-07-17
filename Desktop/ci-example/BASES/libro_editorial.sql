-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2014 a las 23:46:35
-- Versión del servidor: 5.5.37-cll
-- Versión de PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cientoca_cookbooks`
--

--
-- Truncar tablas antes de insertar `libro_editorial`
--

TRUNCATE TABLE `libro_editorial`;
--
-- Volcado de datos para la tabla `libro_editorial`
--

INSERT INTO `libro_editorial` (`id_libro_editorial`, `id_libro`, `id_editorial`) VALUES
(1, 2, 5),
(2, 6, 6),
(3, 7, 4),
(4, 8, 7),
(5, 9, 4),
(6, 10, 7),
(7, 11, 5),
(8, 12, 4),
(9, 13, 7),
(10, 13, 5),
(11, 14, 4),
(12, 14, 6),
(13, 15, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
