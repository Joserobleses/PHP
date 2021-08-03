-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2021 a las 13:59:40
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `optica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ulleres`
--

CREATE TABLE `ulleres` (
  `ulleres_id` int(11) NOT NULL,
  `ulleres_graduacio_vidre_esquerra` varchar(4) NOT NULL,
  `ulleres_graduacio_vidre_dret` varchar(4) NOT NULL,
  `ulleres_preu` double NOT NULL,
  `ulleres_marca` int(11) NOT NULL,
  `ulleres_tipus_montura` int(11) NOT NULL,
  `ulleres_color_montura` int(11) NOT NULL,
  `ulleres_color_vidre` int(11) NOT NULL,
  `ulleres_empleat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ulleres`
--

INSERT INTO `ulleres` (`ulleres_id`, `ulleres_graduacio_vidre_esquerra`, `ulleres_graduacio_vidre_dret`, `ulleres_preu`, `ulleres_marca`, `ulleres_tipus_montura`, `ulleres_color_montura`, `ulleres_color_vidre`, `ulleres_empleat`) VALUES
(1, '1.56', '2.34', 250, 4, 1, 5, 2, 1),
(2, '3.12', '0.18', 300, 3, 1, 3, 2, 2),
(3, '2.12', '0.74', 400, 2, 3, 4, 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ulleres`
--
ALTER TABLE `ulleres`
  ADD PRIMARY KEY (`ulleres_id`,`ulleres_marca`,`ulleres_tipus_montura`,`ulleres_color_montura`,`ulleres_color_vidre`,`ulleres_empleat`),
  ADD KEY `fk_ulleres_marca1_idx` (`ulleres_marca`),
  ADD KEY `fk_ulleres_tipus_montura1_idx` (`ulleres_tipus_montura`),
  ADD KEY `fk_ulleres_color_montura1_idx` (`ulleres_color_montura`),
  ADD KEY `fk_ulleres_color_vidre1_idx` (`ulleres_color_vidre`),
  ADD KEY `fk_ulleres_empleat1_idx` (`ulleres_empleat`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ulleres`
--
ALTER TABLE `ulleres`
  MODIFY `ulleres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ulleres`
--
ALTER TABLE `ulleres`
  ADD CONSTRAINT `fk_ulleres_color_montura1` FOREIGN KEY (`ulleres_color_montura`) REFERENCES `color_montura` (`color_montura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ulleres_color_vidre1` FOREIGN KEY (`ulleres_color_vidre`) REFERENCES `color_vidre` (`color_vidre_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ulleres_empleat1` FOREIGN KEY (`ulleres_empleat`) REFERENCES `empleat` (`empleat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ulleres_marca1` FOREIGN KEY (`ulleres_marca`) REFERENCES `marca` (`marca_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ulleres_tipus_montura1` FOREIGN KEY (`ulleres_tipus_montura`) REFERENCES `tipus_montura` (`tipus_montura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
