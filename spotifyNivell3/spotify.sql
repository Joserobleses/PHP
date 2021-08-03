-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2021 a las 15:57:54
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
-- Base de datos: `spotify`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_titol` varchar(45) NOT NULL,
  `album_any_publicacio` varchar(4) NOT NULL,
  `album_imatge_portada` varchar(15) NOT NULL,
  `artista_artista_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`album_id`, `album_titol`, `album_any_publicacio`, `album_imatge_portada`, `artista_artista_id`) VALUES
(1, 'locomoco', '2014', 'imatge1', 1),
(2, 'joinders', '2019', 'imatge2', 2),
(3, 'la pescailla', '2020', 'imatge3', 3),
(4, 'qwert', '2021', 'imatge4', 4),
(5, 'the final cuenta atrás', '1999', 'imatge5', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `any_caducitat_tarjeta_credit`
--

CREATE TABLE `any_caducitat_tarjeta_credit` (
  `any_caducitat_tarjeta_credit_id` int(11) NOT NULL,
  `any_caducitat_tarjeta_credit` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `any_caducitat_tarjeta_credit`
--

INSERT INTO `any_caducitat_tarjeta_credit` (`any_caducitat_tarjeta_credit_id`, `any_caducitat_tarjeta_credit`) VALUES
(1, '2021'),
(2, '2022'),
(3, '2023'),
(4, '2024'),
(5, '2025'),
(6, '2026'),
(7, '2027'),
(8, '2028'),
(9, '2029'),
(10, '2030');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `artista_id` int(11) NOT NULL,
  `artista` varchar(45) NOT NULL,
  `artista_imatge` varchar(15) NOT NULL,
  `usuari_usuari_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`artista_id`, `artista`, `artista_imatge`, `usuari_usuari_id`) VALUES
(1, 'yonny', 'imagen1', 3),
(2, 'melvin', 'imagen2', 3),
(3, 'pascualín', 'imagen3', 2),
(4, 'shondra', 'imagen4', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_relacionat`
--

CREATE TABLE `artista_relacionat` (
  `artista_relacionat_id` int(11) NOT NULL,
  `artista_relacionat` varchar(1) NOT NULL,
  `artista_artista_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `artista_relacionat`
--

INSERT INTO `artista_relacionat` (`artista_relacionat_id`, `artista_relacionat`, `artista_artista_id`) VALUES
(1, '1', 1),
(2, '1', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canco`
--

CREATE TABLE `canco` (
  `canco_id` int(11) NOT NULL,
  `canco` varchar(45) NOT NULL,
  `playlist_playlist_id` int(11) NOT NULL,
  `album_album_id` int(11) NOT NULL,
  `canco_numero_reproduccions` varchar(6) DEFAULT NULL,
  `canco_durada` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `canco`
--

INSERT INTO `canco` (`canco_id`, `canco`, `playlist_playlist_id`, `album_album_id`, `canco_numero_reproduccions`, `canco_durada`) VALUES
(4, 'supercalifragilisticoespialidoso', 3, 1, NULL, '5'),
(5, 'highway to jell', 3, 1, NULL, '3'),
(11, 'kukuxumutxu', 2, 1, '231', '2'),
(12, 'kukuxumutxu', 2, 4, '231', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_d_pagament`
--

CREATE TABLE `forma_d_pagament` (
  `forma_d_pagament_id` int(11) NOT NULL,
  `forma_d_pagament` varchar(6) NOT NULL,
  `usuari_paypal_usuari_paypal_id` int(11) NOT NULL,
  `tarjeta_credit_tarjeta_credit_id` int(11) NOT NULL,
  `tarjeta_credit_tarjeta_credit_mes_caducitat_id` int(11) NOT NULL,
  `tarjeta_credit_tarjeta_credit_any_caducitat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `forma_d_pagament`
--

INSERT INTO `forma_d_pagament` (`forma_d_pagament_id`, `forma_d_pagament`, `usuari_paypal_usuari_paypal_id`, `tarjeta_credit_tarjeta_credit_id`, `tarjeta_credit_tarjeta_credit_mes_caducitat_id`, `tarjeta_credit_tarjeta_credit_any_caducitat_id`) VALUES
(1, 'crèdit', 0, 0, 0, 0),
(2, 'paypal', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes_caducitat_tarjeta_credit`
--

CREATE TABLE `mes_caducitat_tarjeta_credit` (
  `mes_caducitat_tarjeta_credit_id` int(11) NOT NULL,
  `mes_caducitat_tarjeta_credit` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mes_caducitat_tarjeta_credit`
--

INSERT INTO `mes_caducitat_tarjeta_credit` (`mes_caducitat_tarjeta_credit_id`, `mes_caducitat_tarjeta_credit`) VALUES
(1, 'gener'),
(2, 'febrer'),
(3, 'març'),
(4, 'abril'),
(5, 'maig'),
(6, 'juny'),
(7, 'juliol'),
(8, 'agost'),
(9, 'setembre'),
(10, 'octubre'),
(11, 'novembre'),
(12, 'desembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagaments`
--

CREATE TABLE `pagaments` (
  `pagaments_id` int(11) NOT NULL,
  `pagaments_data` date NOT NULL,
  `pagaments_numero_ordre` varchar(15) NOT NULL,
  `pagaments_total` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagaments`
--

INSERT INTO `pagaments` (`pagaments_id`, `pagaments_data`, `pagaments_numero_ordre`, `pagaments_total`) VALUES
(1, '2020-03-01', 'pagament001', '300'),
(2, '2019-07-08', 'pagament002', '140'),
(3, '2020-03-10', 'pagament004', '16'),
(4, '2020-01-21', 'pagament003', '109');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE `playlist` (
  `playlist_id` int(11) NOT NULL,
  `playlist_titol` varchar(45) NOT NULL,
  `playlist_numero_cancons` varchar(5) NOT NULL,
  `playlist_id_unic` varchar(5) NOT NULL,
  `playlist_data_creacio` date NOT NULL,
  `usuari_usuari_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`playlist_id`, `playlist_titol`, `playlist_numero_cancons`, `playlist_id_unic`, `playlist_data_creacio`, `usuari_usuari_id`) VALUES
(1, 'new age', '159', 'pl001', '2018-08-01', 1),
(2, 'regae', '254', 'pl002', '2016-02-21', 1),
(3, 'rock', '515', 'pl003', '2014-07-05', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist_eliminada`
--

CREATE TABLE `playlist_eliminada` (
  `playlist_eliminada_id` int(11) NOT NULL,
  `playlist_eliminada` varchar(9) NOT NULL,
  `playlist_eliminada_data` date NOT NULL,
  `playlist_playlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `playlist_eliminada`
--

INSERT INTO `playlist_eliminada` (`playlist_eliminada_id`, `playlist_eliminada`, `playlist_eliminada_data`, `playlist_playlist_id`) VALUES
(1, 'eliminada', '2019-08-21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripcio`
--

CREATE TABLE `subscripcio` (
  `subscripcio_id` int(11) NOT NULL,
  `subscripcio_usuari_id` int(11) NOT NULL,
  `subscripcio_tipus_d_usuari_tipus_d_usuari_id` int(11) NOT NULL,
  `subscripcio_data_inici` date DEFAULT NULL,
  `subscripcio_data_renovacio` date DEFAULT NULL,
  `subscripcio_forma_d_pagament_id` int(11) NOT NULL,
  `pagaments_pagaments_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subscripcio`
--

INSERT INTO `subscripcio` (`subscripcio_id`, `subscripcio_usuari_id`, `subscripcio_tipus_d_usuari_tipus_d_usuari_id`, `subscripcio_data_inici`, `subscripcio_data_renovacio`, `subscripcio_forma_d_pagament_id`, `pagaments_pagaments_id`) VALUES
(1, 1, 1, NULL, NULL, 0, 0),
(2, 2, 2, '2018-07-02', '2019-07-02', 1, 2),
(3, 3, 2, '2020-01-01', '2020-07-01', 2, 1),
(6, 4, 2, '2020-01-01', '2020-05-31', 1, 3),
(7, 4, 2, '2020-02-01', '2020-03-31', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_credit`
--

CREATE TABLE `tarjeta_credit` (
  `tarjeta_credit_id` int(11) NOT NULL,
  `tarjeta_credit_numero` varchar(14) NOT NULL,
  `tarjeta_credit_codi_seguretat` varchar(4) NOT NULL,
  `tarjeta_credit_mes_caducitat_id` int(11) NOT NULL,
  `tarjeta_credit_any_caducitat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarjeta_credit`
--

INSERT INTO `tarjeta_credit` (`tarjeta_credit_id`, `tarjeta_credit_numero`, `tarjeta_credit_codi_seguretat`, `tarjeta_credit_mes_caducitat_id`, `tarjeta_credit_any_caducitat_id`) VALUES
(1, '12345678901234', '1234', 1, 2),
(2, '98765432109876', '4321', 7, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus_d_usuari`
--

CREATE TABLE `tipus_d_usuari` (
  `tipus_d_usuari_id` int(11) NOT NULL,
  `tipus_d_usuari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipus_d_usuari`
--

INSERT INTO `tipus_d_usuari` (`tipus_d_usuari_id`, `tipus_d_usuari`) VALUES
(1, 'free'),
(2, 'premium');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus_playlist`
--

CREATE TABLE `tipus_playlist` (
  `tipus_playlist_id` int(11) NOT NULL,
  `tipus_playlist` varchar(10) NOT NULL,
  `playlist_playlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipus_playlist`
--

INSERT INTO `tipus_playlist` (`tipus_playlist_id`, `tipus_playlist`, `playlist_playlist_id`) VALUES
(1, 'eliminada', 1),
(2, 'activa', 2),
(3, 'activa', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `usuari_id` int(11) NOT NULL,
  `usuari_nom` varchar(45) NOT NULL,
  `usuari_email` varchar(45) NOT NULL,
  `usuari_password` varchar(15) NOT NULL,
  `usuari_data_naixement` date NOT NULL,
  `usuari_sexe` varchar(4) NOT NULL,
  `usuari_pais` varchar(45) NOT NULL,
  `usuari_codi_postal` varchar(5) NOT NULL,
  `tipus_d_usuari_tipus_d_usuari_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`usuari_id`, `usuari_nom`, `usuari_email`, `usuari_password`, `usuari_data_naixement`, `usuari_sexe`, `usuari_pais`, `usuari_codi_postal`, `tipus_d_usuari_tipus_d_usuari_id`) VALUES
(1, 'jose', 'a@b.es', '1234', '2011-01-11', 'home', 'espanya', '08000', 1),
(2, 'florencio', 'a@b.cat', '4321', '2012-03-16', 'home', 'espanya', '08001', 2),
(3, 'estefania', 'estefi@gmail.com', '8484', '2012-10-18', 'dona', 'espanya', '08002', 2),
(4, 'owen', 'owencito@hotmail.es', '5433', '2014-07-11', 'home', 'espanya', '08008', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari_has_album`
--

CREATE TABLE `usuari_has_album` (
  `usuari_usuari_id` int(11) NOT NULL,
  `album_album_id` int(11) NOT NULL,
  `album_artista_artista_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuari_has_album`
--

INSERT INTO `usuari_has_album` (`usuari_usuari_id`, `album_album_id`, `album_artista_artista_id`) VALUES
(1, 2, 2),
(1, 3, 3),
(1, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari_has_canco`
--

CREATE TABLE `usuari_has_canco` (
  `usuari_usuari_id` int(11) NOT NULL,
  `usuari_tipus_d_usuari_tipus_d_usuari_id` int(11) NOT NULL,
  `canco_canco_id` int(11) NOT NULL,
  `usuari_has_canco_data_comparticio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuari_has_canco`
--

INSERT INTO `usuari_has_canco` (`usuari_usuari_id`, `usuari_tipus_d_usuari_tipus_d_usuari_id`, `canco_canco_id`, `usuari_has_canco_data_comparticio`) VALUES
(3, 2, 5, '2020-07-07'),
(4, 2, 4, '2018-08-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari_has_canco1_favorita`
--

CREATE TABLE `usuari_has_canco1_favorita` (
  `usuari_usuari_id` int(11) DEFAULT NULL,
  `canco_canco_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuari_has_canco1_favorita`
--

INSERT INTO `usuari_has_canco1_favorita` (`usuari_usuari_id`, `canco_canco_id`) VALUES
(1, 4),
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari_paypal`
--

CREATE TABLE `usuari_paypal` (
  `usuari_paypal_id` int(11) NOT NULL,
  `usuari_paypal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuari_paypal`
--

INSERT INTO `usuari_paypal` (`usuari_paypal_id`, `usuari_paypal`) VALUES
(1, 'paypalJose'),
(2, 'paypalFlorencio'),
(3, 'paypalEstefania');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`,`artista_artista_id`),
  ADD KEY `fk_album_artista1_idx` (`artista_artista_id`);

--
-- Indices de la tabla `any_caducitat_tarjeta_credit`
--
ALTER TABLE `any_caducitat_tarjeta_credit`
  ADD PRIMARY KEY (`any_caducitat_tarjeta_credit_id`);

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`artista_id`),
  ADD KEY `fk_artista_usuari1_idx` (`usuari_usuari_id`);

--
-- Indices de la tabla `artista_relacionat`
--
ALTER TABLE `artista_relacionat`
  ADD PRIMARY KEY (`artista_relacionat_id`),
  ADD KEY `fk_artista_relacionat_artista1_idx` (`artista_artista_id`);

--
-- Indices de la tabla `canco`
--
ALTER TABLE `canco`
  ADD PRIMARY KEY (`canco_id`,`playlist_playlist_id`,`album_album_id`),
  ADD KEY `fk_canco_playlist1_idx` (`playlist_playlist_id`),
  ADD KEY `fk_canco_album1_idx` (`album_album_id`);

--
-- Indices de la tabla `forma_d_pagament`
--
ALTER TABLE `forma_d_pagament`
  ADD PRIMARY KEY (`forma_d_pagament_id`),
  ADD KEY `fk_forma_d_pagament_usuari_paypal1_idx` (`usuari_paypal_usuari_paypal_id`),
  ADD KEY `fk_forma_d_pagament_tarjeta_credit1_idx` (`tarjeta_credit_tarjeta_credit_id`,`tarjeta_credit_tarjeta_credit_mes_caducitat_id`,`tarjeta_credit_tarjeta_credit_any_caducitat_id`);

--
-- Indices de la tabla `mes_caducitat_tarjeta_credit`
--
ALTER TABLE `mes_caducitat_tarjeta_credit`
  ADD PRIMARY KEY (`mes_caducitat_tarjeta_credit_id`);

--
-- Indices de la tabla `pagaments`
--
ALTER TABLE `pagaments`
  ADD PRIMARY KEY (`pagaments_id`),
  ADD UNIQUE KEY `pagaments_numero_ordre_UNIQUE` (`pagaments_numero_ordre`);

--
-- Indices de la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlist_id`),
  ADD UNIQUE KEY `playlist_id_unic_UNIQUE` (`playlist_id_unic`),
  ADD KEY `fk_playlist_usuari1_idx` (`usuari_usuari_id`);

--
-- Indices de la tabla `playlist_eliminada`
--
ALTER TABLE `playlist_eliminada`
  ADD PRIMARY KEY (`playlist_eliminada_id`),
  ADD KEY `fk_playlist_eliminada_playlist1_idx` (`playlist_playlist_id`);

--
-- Indices de la tabla `subscripcio`
--
ALTER TABLE `subscripcio`
  ADD PRIMARY KEY (`subscripcio_id`,`subscripcio_usuari_id`,`subscripcio_tipus_d_usuari_tipus_d_usuari_id`,`subscripcio_forma_d_pagament_id`,`pagaments_pagaments_id`),
  ADD KEY `fk_subscripcio_usuari1_idx` (`subscripcio_usuari_id`,`subscripcio_tipus_d_usuari_tipus_d_usuari_id`),
  ADD KEY `fk_subscripcio_forma_d_pagament1_idx` (`subscripcio_forma_d_pagament_id`),
  ADD KEY `fk_subscripcio_pagaments1_idx` (`pagaments_pagaments_id`);

--
-- Indices de la tabla `tarjeta_credit`
--
ALTER TABLE `tarjeta_credit`
  ADD PRIMARY KEY (`tarjeta_credit_id`,`tarjeta_credit_mes_caducitat_id`,`tarjeta_credit_any_caducitat_id`),
  ADD KEY `fk_tarjeta_credit_mes_caducitat_tarjeta_credit1_idx` (`tarjeta_credit_mes_caducitat_id`),
  ADD KEY `fk_tarjeta_credit_any_caducitat_tarjeta_credit1_idx` (`tarjeta_credit_any_caducitat_id`);

--
-- Indices de la tabla `tipus_d_usuari`
--
ALTER TABLE `tipus_d_usuari`
  ADD PRIMARY KEY (`tipus_d_usuari_id`);

--
-- Indices de la tabla `tipus_playlist`
--
ALTER TABLE `tipus_playlist`
  ADD PRIMARY KEY (`tipus_playlist_id`,`playlist_playlist_id`),
  ADD KEY `fk_tipus_playlist_playlist1_idx` (`playlist_playlist_id`);

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`usuari_id`,`tipus_d_usuari_tipus_d_usuari_id`),
  ADD KEY `fk_usuari_tipus_d_usuari_idx` (`tipus_d_usuari_tipus_d_usuari_id`);

--
-- Indices de la tabla `usuari_has_album`
--
ALTER TABLE `usuari_has_album`
  ADD PRIMARY KEY (`usuari_usuari_id`,`album_album_id`,`album_artista_artista_id`),
  ADD KEY `fk_usuari_has_album_album1_idx` (`album_album_id`,`album_artista_artista_id`),
  ADD KEY `fk_usuari_has_album_usuari1_idx` (`usuari_usuari_id`);

--
-- Indices de la tabla `usuari_has_canco`
--
ALTER TABLE `usuari_has_canco`
  ADD PRIMARY KEY (`usuari_usuari_id`,`usuari_tipus_d_usuari_tipus_d_usuari_id`,`canco_canco_id`),
  ADD KEY `fk_usuari_has_canco_canco1_idx` (`canco_canco_id`),
  ADD KEY `fk_usuari_has_canco_usuari1_idx` (`usuari_usuari_id`,`usuari_tipus_d_usuari_tipus_d_usuari_id`);

--
-- Indices de la tabla `usuari_has_canco1_favorita`
--
ALTER TABLE `usuari_has_canco1_favorita`
  ADD KEY `fk_usuari_has_canco1_canco1_idx` (`canco_canco_id`),
  ADD KEY `fk_usuari_has_canco1_usuari1_idx` (`usuari_usuari_id`);

--
-- Indices de la tabla `usuari_paypal`
--
ALTER TABLE `usuari_paypal`
  ADD PRIMARY KEY (`usuari_paypal_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `any_caducitat_tarjeta_credit`
--
ALTER TABLE `any_caducitat_tarjeta_credit`
  MODIFY `any_caducitat_tarjeta_credit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `artista_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `artista_relacionat`
--
ALTER TABLE `artista_relacionat`
  MODIFY `artista_relacionat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `canco`
--
ALTER TABLE `canco`
  MODIFY `canco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `forma_d_pagament`
--
ALTER TABLE `forma_d_pagament`
  MODIFY `forma_d_pagament_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mes_caducitat_tarjeta_credit`
--
ALTER TABLE `mes_caducitat_tarjeta_credit`
  MODIFY `mes_caducitat_tarjeta_credit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pagaments`
--
ALTER TABLE `pagaments`
  MODIFY `pagaments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `playlist_eliminada`
--
ALTER TABLE `playlist_eliminada`
  MODIFY `playlist_eliminada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subscripcio`
--
ALTER TABLE `subscripcio`
  MODIFY `subscripcio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarjeta_credit`
--
ALTER TABLE `tarjeta_credit`
  MODIFY `tarjeta_credit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipus_d_usuari`
--
ALTER TABLE `tipus_d_usuari`
  MODIFY `tipus_d_usuari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipus_playlist`
--
ALTER TABLE `tipus_playlist`
  MODIFY `tipus_playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuari`
--
ALTER TABLE `usuari`
  MODIFY `usuari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuari_paypal`
--
ALTER TABLE `usuari_paypal`
  MODIFY `usuari_paypal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_album_artista1` FOREIGN KEY (`artista_artista_id`) REFERENCES `artista` (`artista_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `artista`
--
ALTER TABLE `artista`
  ADD CONSTRAINT `fk_artista_usuari1` FOREIGN KEY (`usuari_usuari_id`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `artista_relacionat`
--
ALTER TABLE `artista_relacionat`
  ADD CONSTRAINT `fk_artista_relacionat_artista1` FOREIGN KEY (`artista_artista_id`) REFERENCES `artista` (`artista_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `canco`
--
ALTER TABLE `canco`
  ADD CONSTRAINT `fk_canco_album1` FOREIGN KEY (`album_album_id`) REFERENCES `album` (`album_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_canco_playlist1` FOREIGN KEY (`playlist_playlist_id`) REFERENCES `playlist` (`playlist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `forma_d_pagament`
--
ALTER TABLE `forma_d_pagament`
  ADD CONSTRAINT `fk_forma_d_pagament_tarjeta_credit1` FOREIGN KEY (`tarjeta_credit_tarjeta_credit_id`,`tarjeta_credit_tarjeta_credit_mes_caducitat_id`,`tarjeta_credit_tarjeta_credit_any_caducitat_id`) REFERENCES `tarjeta_credit` (`tarjeta_credit_id`, `tarjeta_credit_mes_caducitat_id`, `tarjeta_credit_any_caducitat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_forma_d_pagament_usuari_paypal1` FOREIGN KEY (`usuari_paypal_usuari_paypal_id`) REFERENCES `usuari_paypal` (`usuari_paypal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `fk_playlist_usuari1` FOREIGN KEY (`usuari_usuari_id`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `playlist_eliminada`
--
ALTER TABLE `playlist_eliminada`
  ADD CONSTRAINT `fk_playlist_eliminada_playlist1` FOREIGN KEY (`playlist_playlist_id`) REFERENCES `playlist` (`playlist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subscripcio`
--
ALTER TABLE `subscripcio`
  ADD CONSTRAINT `fk_subscripcio_forma_d_pagament1` FOREIGN KEY (`subscripcio_forma_d_pagament_id`) REFERENCES `forma_d_pagament` (`forma_d_pagament_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subscripcio_pagaments1` FOREIGN KEY (`pagaments_pagaments_id`) REFERENCES `pagaments` (`pagaments_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subscripcio_usuari1` FOREIGN KEY (`subscripcio_usuari_id`,`subscripcio_tipus_d_usuari_tipus_d_usuari_id`) REFERENCES `usuari` (`usuari_id`, `tipus_d_usuari_tipus_d_usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarjeta_credit`
--
ALTER TABLE `tarjeta_credit`
  ADD CONSTRAINT `fk_tarjeta_credit_any_caducitat_tarjeta_credit1` FOREIGN KEY (`tarjeta_credit_any_caducitat_id`) REFERENCES `any_caducitat_tarjeta_credit` (`any_caducitat_tarjeta_credit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarjeta_credit_mes_caducitat_tarjeta_credit1` FOREIGN KEY (`tarjeta_credit_mes_caducitat_id`) REFERENCES `mes_caducitat_tarjeta_credit` (`mes_caducitat_tarjeta_credit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipus_playlist`
--
ALTER TABLE `tipus_playlist`
  ADD CONSTRAINT `fk_tipus_playlist_playlist1` FOREIGN KEY (`playlist_playlist_id`) REFERENCES `playlist` (`playlist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD CONSTRAINT `fk_usuari_tipus_d_usuari` FOREIGN KEY (`tipus_d_usuari_tipus_d_usuari_id`) REFERENCES `tipus_d_usuari` (`tipus_d_usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuari_has_album`
--
ALTER TABLE `usuari_has_album`
  ADD CONSTRAINT `fk_usuari_has_album_album1` FOREIGN KEY (`album_album_id`,`album_artista_artista_id`) REFERENCES `album` (`album_id`, `artista_artista_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuari_has_album_usuari1` FOREIGN KEY (`usuari_usuari_id`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuari_has_canco`
--
ALTER TABLE `usuari_has_canco`
  ADD CONSTRAINT `fk_usuari_has_canco_canco1` FOREIGN KEY (`canco_canco_id`) REFERENCES `canco` (`canco_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuari_has_canco_usuari1` FOREIGN KEY (`usuari_usuari_id`,`usuari_tipus_d_usuari_tipus_d_usuari_id`) REFERENCES `usuari` (`usuari_id`, `tipus_d_usuari_tipus_d_usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuari_has_canco1_favorita`
--
ALTER TABLE `usuari_has_canco1_favorita`
  ADD CONSTRAINT `fk_usuari_has_canco1_canco1` FOREIGN KEY (`canco_canco_id`) REFERENCES `canco` (`canco_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuari_has_canco1_usuari1` FOREIGN KEY (`usuari_usuari_id`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
