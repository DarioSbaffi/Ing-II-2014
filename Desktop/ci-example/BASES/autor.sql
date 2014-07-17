-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2014 a las 23:44:29
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
-- Truncar tablas antes de insertar `autor`
--

TRUNCATE TABLE `autor`;
--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `apellido`) VALUES
(3, 'sergio', 'reynoso'),
(4, 'jorge oscar', 'gianotti'),
(5, 'eusebio', 'apellido'),
(6, 'eusebio jeronimo', 'apellido con'),
(7, 'Gabriel', 'García Marquez'),
(8, 'Bernardo Ariel', 'Fernandez'),
(9, 'alberto', 'Chicote');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
