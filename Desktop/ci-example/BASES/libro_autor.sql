-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2014 a las 23:45:35
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
-- Truncar tablas antes de insertar `libro_autor`
--

TRUNCATE TABLE `libro_autor`;
--
-- Volcado de datos para la tabla `libro_autor`
--

INSERT INTO `libro_autor` (`id_libro_autor`, `id_libro`, `id_autor`) VALUES
(1, 2, 5),
(2, 6, 6),
(3, 6, 7),
(4, 7, 4),
(5, 8, 5),
(6, 8, 4),
(7, 9, 5),
(8, 9, 3),
(9, 10, 8),
(10, 10, 5),
(11, 11, 8),
(12, 12, 7),
(13, 13, 7),
(14, 13, 3),
(15, 14, 8),
(16, 14, 6),
(17, 15, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
