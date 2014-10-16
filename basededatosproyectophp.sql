-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2014 a las 16:07:57
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `basededatosproyectophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `id_usuario` int(11) NOT NULL,
  `id_amigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_usuario`, `id_amigo`) VALUES
(7, 1),
(1, 6),
(1, 4),
(1, 2),
(1, 8),
(1, 7),
(1, 5),
(66, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_producto1` varchar(700) NOT NULL,
  `img_producto2` varchar(500) NOT NULL,
  `descripcion_del_producto1` varchar(200) NOT NULL,
  `descripcion_del_producto2` varchar(200) NOT NULL,
  `id_usuarios` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `img_producto1`, `img_producto2`, `descripcion_del_producto1`, `descripcion_del_producto2`, `id_usuarios`) VALUES
(1, '../img/bici.jpg', 'rellenar', 'bici azul', 'bicicleta verde', 1),
(2, '../img/biciamarilla.jpg', 'rellenar', 'bici roja de montaÃ±a amarilla', 'bicicleta roja', 2),
(3, '../img/biciroja.jpg', 'rellenar', 'bici', 'bicicleta amarrilla', 3),
(5, '../img/biciroja.jpg', 'rellenar', 'bici', 'bicicleta rosa', 4),
(8, '../img/biciroja.jpg', 'rellenar', 'bici', '', 5),
(22, '../img/cocherojo.jpg', 'rellear', 'coche rojo Ferrari', 'coche rojo', 6),
(64, 'rellenar', 'rellenar', 'esquis casi nuevos', 'esquis casi nuevos', 7),
(65, '../img/raqueta.jpg', 'rellenar', 'raquetas de tenis', '', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(100) NOT NULL,
  `imagen_avatar` varchar(500) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `mail` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `password`, `imagen_avatar`, `nombre`, `mail`) VALUES
(1, '1234', '../img/admin.png', 'admin', 'admin@a.com'),
(2, '1234', '../img/lore.jpg', 'lore', 'lore@a.com'),
(3, '1234', '../img/andros.jpg', 'andros', 'androsescueladediseyodevalencia@a.com'),
(4, '1234', '../img/rafa.jpg', 'rafa ee aa', 'rafa@a.com'),
(5, '1234', '../img/avatar2.jpg', 'yo', 'fede@a.com'),
(6, '1234', '../img/vero.jpg', 'vero', 'vero@a.com'),
(7, '1234', '../img/laura.jpg', 'laura', 'lau@a.com'),
(8, '1234', '../img/no-picture.png', 'clemente88', 'cle@a.com'),
(67, '1234', '../img/no-picture.png', 'user', 'user@a.com'),
(68, '1234', '../img/no-picture.png', 'user', 'user2@a.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
