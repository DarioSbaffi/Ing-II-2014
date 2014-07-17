-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2014 a las 23:46:03
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
-- Truncar tablas antes de insertar `libro_categoria`
--

TRUNCATE TABLE `libro_categoria`;
--
-- Volcado de datos para la tabla `libro_categoria`
--

INSERT INTO `libro_categoria` (`id_libro_categoria`, `id_libro`, `id_categoria`) VALUES
(1, 2, 3),
(2, 2, 4),
(6, 6, 5),
(7, 2, 8),
(8, 7, 22),
(9, 7, 5),
(10, 8, 56),
(11, 8, 57),
(12, 9, 56),
(13, 9, 58),
(14, 10, 59),
(15, 11, 56),
(16, 11, 60),
(17, 12, 56),
(18, 12, 61),
(19, 13, 56),
(20, 13, 62),
(21, 14, 63),
(22, 14, 56),
(23, 15, 64);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
