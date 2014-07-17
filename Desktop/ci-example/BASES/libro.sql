-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2014 a las 23:45:02
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
-- Truncar tablas antes de insertar `libro`
--

TRUNCATE TABLE `libro`;
--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `isbn`, `titulo`, `precio`, `descripcion`, `stock_minimo`, `stock_actual`) VALUES
(2, 4587, 'UnLibroNuevo', 23.5, '<p>\n	fgeherhewhewrheh</p>\n', 5, 12),
(6, 25321, 'La mil y una maneras de cocinar', 134.8, '<p>\n	Este es un libro de prueba</p>\n', 5, 15),
(7, 35476, 'mititulo', 213, '<p>\n	descripcion del producto</p>\n', 2, 15),
(8, 54678943, 'Hoy cocino yo', 76.5, '<p>\n	Mas de 400 recetas para cocinar ahorrando</p>\n', 5, 46),
(9, 5476854, 'Cocina vegetariana', 143, '<p>\n	Guia completa de alimentaci&oacute;n</p>\n', 5, 76),
(10, 84567323, 'Comer bien a diario', 65.7, '<p>\n	Recetas f&aacute;ciles para una dieta sana a diario</p>\n', 2, 7),
(11, 345354665, 'Tecnicas de cacina para convertirse en un gran chef', 465, '<p>\n	Con mas de 800 tecnicas paso a paso</p>\n', 20, 65),
(12, 45673454, 'Cocina mexicana', 310, '<p>\n	Pr&aacute;ctico recetario con miles de conbinaciones.</p>\n', 7, 70),
(13, 33346578, 'Escuela de cocina', 65.3, '<p>\n	Aprende a cocinar en 24hs.</p>\n', 12, 32),
(14, 4377766, 'Cocina asiática', 350, '<p>\n	La mejor selecci&oacute;n de recetas</p>\n', 10, 90),
(15, 4345678, 'Pesadilla en la cocina', 245, '<p>\n	Cocina sencilla de restaurante que puede hacer en casa.</p>\n', 15, 32);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
