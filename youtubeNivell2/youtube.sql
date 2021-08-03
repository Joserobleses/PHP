-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2021 a las 14:16:39
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
-- Base de datos: `youtube`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canal`
--

CREATE TABLE `canal` (
  `canal_id` int(11) NOT NULL,
  `canal_nom` varchar(45) NOT NULL,
  `canal_descripcio` varchar(45) NOT NULL,
  `canal_data_creacio` date NOT NULL,
  `usuari_usuari_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `canal`
--

INSERT INTO `canal` (`canal_id`, `canal_nom`, `canal_descripcio`, `canal_data_creacio`, `usuari_usuari_id`) VALUES
(1, 'canalUno', 'canal sobre cosas', '2021-07-04', 1),
(2, 'canalDOS', 'canal que se encarga de todo y de nada', '2021-07-02', 1),
(3, 'canalTRES', 'canal noctambulo', '2021-07-29', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentari`
--

CREATE TABLE `comentari` (
  `comentari_id` int(11) NOT NULL,
  `comentari_text` varchar(1000) NOT NULL,
  `comentari_data_hora` datetime NOT NULL,
  `usuari_usuari_id` int(11) NOT NULL,
  `video_video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentari`
--

INSERT INTO `comentari` (`comentari_id`, `comentari_text`, `comentari_data_hora`, `usuari_usuari_id`, `video_video_id`) VALUES
(3, 'de lo bueno lo mejor, de lo mejor lo superior', '2021-07-30 12:13:33', 3, 1),
(4, 'me dormi y tuve pesadillas', '2021-07-30 12:13:33', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estat_del_like_o_dislike`
--

CREATE TABLE `estat_del_like_o_dislike` (
  `estat_del_like_o_dislike_id` int(11) NOT NULL,
  `estat_del_like_o_dislike` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estat_del_like_o_dislike`
--

INSERT INTO `estat_del_like_o_dislike` (`estat_del_like_o_dislike_id`, `estat_del_like_o_dislike`) VALUES
(1, 'like'),
(2, 'dislike');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estat_playlist`
--

CREATE TABLE `estat_playlist` (
  `estat_playlist_id` int(11) NOT NULL,
  `estat_playlist` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estat_playlist`
--

INSERT INTO `estat_playlist` (`estat_playlist_id`, `estat_playlist`) VALUES
(1, 'pública'),
(2, 'privada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estat_video`
--

CREATE TABLE `estat_video` (
  `estat_video_id` int(11) NOT NULL,
  `estat_video` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estat_video`
--

INSERT INTO `estat_video` (`estat_video_id`, `estat_video`) VALUES
(1, 'public'),
(2, 'ocult'),
(3, 'privat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `etiqueta_id` int(11) NOT NULL,
  `etiqueta_nom` varchar(45) DEFAULT NULL,
  `video_video_id` int(11) NOT NULL,
  `video_estat_video_estat_video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`etiqueta_id`, `etiqueta_nom`, `video_video_id`, `video_estat_video_estat_video_id`) VALUES
(1, 'western', 1, 0),
(2, 'documental', 2, 0),
(3, 'cine negro', 0, 0),
(4, 'aburrido', 0, 0),
(5, 'divertido', 2, 0),
(6, 'técnico', 0, 0),
(7, 'acción', 0, 0),
(8, 'bélica', 1, 0),
(9, 'romántica', 0, 0),
(10, 'terror', 0, 0),
(11, 'gore', 1, 0),
(12, 'tragicomedia', 0, 0),
(13, 'basada en hechos reales', 0, 0),
(14, 'para adultos', 0, 0),
(15, 'infantil', 0, 0),
(16, 'magia', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_dislike`
--

CREATE TABLE `like_dislike` (
  `like_dislike_id` int(11) NOT NULL,
  `estat_del_like_o_dislike_estat_del_like_o_dislike_id` int(11) NOT NULL,
  `usuari_usuari_id` int(11) NOT NULL,
  `video_video_id` int(11) NOT NULL,
  `registre_de_likes_registre_de_likes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `like_dislike`
--

INSERT INTO `like_dislike` (`like_dislike_id`, `estat_del_like_o_dislike_estat_del_like_o_dislike_id`, `usuari_usuari_id`, `video_video_id`, `registre_de_likes_registre_de_likes_id`) VALUES
(1, 1, 3, 1, 0),
(2, 2, 4, 2, 0),
(5, 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_dislike_comentari`
--

CREATE TABLE `like_dislike_comentari` (
  `like_dislike_comentari_id` int(11) NOT NULL,
  `estat_del_like_o_dislike_estat_del_like_o_dislike_id` int(11) NOT NULL,
  `comentari_comentari_id` int(11) NOT NULL,
  `registre_likes_comentari_registre_likes_comentari_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `like_dislike_comentari`
--

INSERT INTO `like_dislike_comentari` (`like_dislike_comentari_id`, `estat_del_like_o_dislike_estat_del_like_o_dislike_id`, `comentari_comentari_id`, `registre_likes_comentari_registre_likes_comentari_id`) VALUES
(1, 1, 3, 1),
(2, 2, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_videos_playlist`
--

CREATE TABLE `listado_videos_playlist` (
  `listado_videos_playlist` int(11) NOT NULL,
  `video_video_id` int(11) NOT NULL,
  `playlist_playlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `listado_videos_playlist`
--

INSERT INTO `listado_videos_playlist` (`listado_videos_playlist`, `video_video_id`, `playlist_playlist_id`) VALUES
(3, 1, 1),
(4, 2, 2),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE `playlist` (
  `playlist_id` int(11) NOT NULL,
  `playlist_nom` varchar(45) NOT NULL,
  `playlist_data_creacio` date NOT NULL,
  `usuari_usuari_id` int(11) NOT NULL,
  `estat_playlist_estat_playlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`playlist_id`, `playlist_nom`, `playlist_data_creacio`, `usuari_usuari_id`, `estat_playlist_estat_playlist_id`) VALUES
(1, 'musica clasica', '2021-07-19', 3, 2),
(2, 'tecno', '2021-07-28', 3, 1),
(3, 'regae', '2021-07-01', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicar_video`
--

CREATE TABLE `publicar_video` (
  `publicar_video_id` int(11) NOT NULL,
  `publicar_video_usuari` int(11) NOT NULL,
  `publicar_video_data_i_hora` datetime NOT NULL,
  `video_video_id` int(11) NOT NULL,
  `video_estat_video_estat_video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicar_video`
--

INSERT INTO `publicar_video` (`publicar_video_id`, `publicar_video_usuari`, `publicar_video_data_i_hora`, `video_video_id`, `video_estat_video_estat_video_id`) VALUES
(1, 1, '2021-07-29 15:23:41', 1, 0),
(2, 2, '2021-07-29 15:23:41', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registre_de_likes`
--

CREATE TABLE `registre_de_likes` (
  `registre_de_likes_id` int(11) NOT NULL,
  `registre_de_likes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registre_de_likes`
--

INSERT INTO `registre_de_likes` (`registre_de_likes_id`, `registre_de_likes`) VALUES
(3, '2021-07-30 10:55:25'),
(4, '2021-07-30 10:55:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registre_likes_comentari`
--

CREATE TABLE `registre_likes_comentari` (
  `registre_likes_comentari_id` int(11) NOT NULL,
  `registre_likes_comentaricol` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registre_likes_comentari`
--

INSERT INTO `registre_likes_comentari` (`registre_likes_comentari_id`, `registre_likes_comentaricol`) VALUES
(1, '2021-07-30 12:45:20'),
(2, '2021-07-29 12:45:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripcions`
--

CREATE TABLE `subscripcions` (
  `subscripcions_id` int(11) NOT NULL,
  `canal_canal_id` int(11) NOT NULL,
  `usuari_usuari_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subscripcions`
--

INSERT INTO `subscripcions` (`subscripcions_id`, `canal_canal_id`, `usuari_usuari_id`) VALUES
(21, 0, 0),
(23, 1, 3),
(24, 2, 3),
(25, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `usuari_id` int(11) NOT NULL,
  `usuari_email` varchar(45) NOT NULL,
  `usuari_password` varchar(45) NOT NULL,
  `usuari_nom` varchar(45) NOT NULL,
  `usuari_data_naixament` date NOT NULL,
  `usuari_sexe` varchar(10) NOT NULL,
  `usuari_pais` varchar(45) NOT NULL,
  `usuari_codi_postal` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`usuari_id`, `usuari_email`, `usuari_password`, `usuari_nom`, `usuari_data_naixament`, `usuari_sexe`, `usuari_pais`, `usuari_codi_postal`) VALUES
(1, 'a@b.es', '1234', 'jose', '2011-07-12', 'home', 'espanya', '08001'),
(2, 'micaela@gmail.com', '2345', 'micaela', '2013-06-10', 'dona', 'espanya', '08002'),
(3, 'a@b.cat', '4321', 'florencio', '2014-07-08', 'home', 'espanya', '08003'),
(4, 'fdfds@dfe.k', '543', 'ohaor', '2011-01-26', 'bi', 'espanya', '08006');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `video_titol` varchar(45) NOT NULL,
  `video_descripcio` varchar(45) DEFAULT NULL,
  `video_tamany` varchar(15) NOT NULL,
  `video_nom_arxiu` varchar(45) NOT NULL,
  `video_durada` varchar(15) NOT NULL,
  `video_thumbnail` varchar(45) NOT NULL,
  `video_numero_reproduccions` bigint(8) NOT NULL,
  `video_numero_likes` bigint(8) NOT NULL,
  `video_numero_dislikes` bigint(8) NOT NULL,
  `estat_video_estat_video_id` int(11) NOT NULL,
  `playlist_playlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`video_id`, `video_titol`, `video_descripcio`, `video_tamany`, `video_nom_arxiu`, `video_durada`, `video_thumbnail`, `video_numero_reproduccions`, `video_numero_likes`, `video_numero_dislikes`, `estat_video_estat_video_id`, `playlist_playlist_id`) VALUES
(1, 'amanecer oscuro', 'drama a tope', '20200', 'amanosc.avi', '25', 'thumbnail1', 6, 1, 1, 0, 0),
(2, 'castaña pilonga', 'documental', '1200', 'casta.avi', '12', 'thumbnail2', 1, 0, 1, 0, 0),
(3, 'terminatore en la bella italia', 'friki', '2345', 'termi.avi', '2', 'thumbnail5', 4, 0, 0, 2, 2),
(4, 'yipiyaikeiHP', 'distrito 99', '342', 'yipi', '1', 'thumbnail6', 2, 1, 0, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canal`
--
ALTER TABLE `canal`
  ADD PRIMARY KEY (`canal_id`,`usuari_usuari_id`),
  ADD KEY `fk_canal_usuari1_idx` (`usuari_usuari_id`);

--
-- Indices de la tabla `comentari`
--
ALTER TABLE `comentari`
  ADD PRIMARY KEY (`comentari_id`,`usuari_usuari_id`,`video_video_id`),
  ADD KEY `fk_comentari_usuari1_idx` (`usuari_usuari_id`),
  ADD KEY `fk_comentari_video1_idx` (`video_video_id`);

--
-- Indices de la tabla `estat_del_like_o_dislike`
--
ALTER TABLE `estat_del_like_o_dislike`
  ADD PRIMARY KEY (`estat_del_like_o_dislike_id`);

--
-- Indices de la tabla `estat_playlist`
--
ALTER TABLE `estat_playlist`
  ADD PRIMARY KEY (`estat_playlist_id`);

--
-- Indices de la tabla `estat_video`
--
ALTER TABLE `estat_video`
  ADD PRIMARY KEY (`estat_video_id`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`etiqueta_id`,`video_video_id`,`video_estat_video_estat_video_id`),
  ADD KEY `fk_etiqueta_video1_idx` (`video_video_id`,`video_estat_video_estat_video_id`);

--
-- Indices de la tabla `like_dislike`
--
ALTER TABLE `like_dislike`
  ADD PRIMARY KEY (`like_dislike_id`,`estat_del_like_o_dislike_estat_del_like_o_dislike_id`,`usuari_usuari_id`,`video_video_id`,`registre_de_likes_registre_de_likes_id`),
  ADD UNIQUE KEY `usuari_usuari_id_UNIQUE` (`usuari_usuari_id`),
  ADD KEY `fk_like_dislike_usuari1_idx` (`usuari_usuari_id`),
  ADD KEY `fk_like_dislike_video1_idx` (`video_video_id`),
  ADD KEY `fk_like_dislike_estat_del_like_o_dislike1_idx` (`estat_del_like_o_dislike_estat_del_like_o_dislike_id`),
  ADD KEY `fk_like_dislike_registre_de_likes1_idx` (`registre_de_likes_registre_de_likes_id`);

--
-- Indices de la tabla `like_dislike_comentari`
--
ALTER TABLE `like_dislike_comentari`
  ADD PRIMARY KEY (`like_dislike_comentari_id`,`estat_del_like_o_dislike_estat_del_like_o_dislike_id`,`comentari_comentari_id`,`registre_likes_comentari_registre_likes_comentari_id`),
  ADD KEY `fk_like_dislike_comentari_estat_del_like_o_dislike1_idx` (`estat_del_like_o_dislike_estat_del_like_o_dislike_id`),
  ADD KEY `fk_like_dislike_comentari_registre_likes_comentari1_idx` (`registre_likes_comentari_registre_likes_comentari_id`),
  ADD KEY `fk_like_dislike_comentari_comentari1_idx` (`comentari_comentari_id`);

--
-- Indices de la tabla `listado_videos_playlist`
--
ALTER TABLE `listado_videos_playlist`
  ADD PRIMARY KEY (`listado_videos_playlist`,`video_video_id`,`playlist_playlist_id`),
  ADD KEY `fk_listado_videos_playlist_video1_idx` (`video_video_id`),
  ADD KEY `fk_listado_videos_playlist_playlist1_idx` (`playlist_playlist_id`);

--
-- Indices de la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlist_id`,`usuari_usuari_id`,`estat_playlist_estat_playlist_id`),
  ADD KEY `fk_playlist_usuari1_idx` (`usuari_usuari_id`),
  ADD KEY `fk_playlist_estat_playlist1_idx` (`estat_playlist_estat_playlist_id`);

--
-- Indices de la tabla `publicar_video`
--
ALTER TABLE `publicar_video`
  ADD PRIMARY KEY (`publicar_video_id`,`publicar_video_usuari`,`video_video_id`,`video_estat_video_estat_video_id`),
  ADD KEY `fk_publicar_video_usuari_idx` (`publicar_video_usuari`),
  ADD KEY `fk_publicar_video_video1_idx` (`video_video_id`,`video_estat_video_estat_video_id`);

--
-- Indices de la tabla `registre_de_likes`
--
ALTER TABLE `registre_de_likes`
  ADD PRIMARY KEY (`registre_de_likes_id`);

--
-- Indices de la tabla `registre_likes_comentari`
--
ALTER TABLE `registre_likes_comentari`
  ADD PRIMARY KEY (`registre_likes_comentari_id`);

--
-- Indices de la tabla `subscripcions`
--
ALTER TABLE `subscripcions`
  ADD PRIMARY KEY (`subscripcions_id`,`canal_canal_id`,`usuari_usuari_id`),
  ADD KEY `fk_subscripcions_usuari1_idx` (`usuari_usuari_id`),
  ADD KEY `fk_subscripcions_canal1_idx` (`canal_canal_id`);

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`usuari_id`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`,`estat_video_estat_video_id`,`playlist_playlist_id`),
  ADD KEY `fk_video_estat_video1_idx` (`estat_video_estat_video_id`),
  ADD KEY `fk_video_playlist1_idx` (`playlist_playlist_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canal`
--
ALTER TABLE `canal`
  MODIFY `canal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentari`
--
ALTER TABLE `comentari`
  MODIFY `comentari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estat_del_like_o_dislike`
--
ALTER TABLE `estat_del_like_o_dislike`
  MODIFY `estat_del_like_o_dislike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estat_playlist`
--
ALTER TABLE `estat_playlist`
  MODIFY `estat_playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estat_video`
--
ALTER TABLE `estat_video`
  MODIFY `estat_video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `etiqueta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `like_dislike`
--
ALTER TABLE `like_dislike`
  MODIFY `like_dislike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `like_dislike_comentari`
--
ALTER TABLE `like_dislike_comentari`
  MODIFY `like_dislike_comentari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `listado_videos_playlist`
--
ALTER TABLE `listado_videos_playlist`
  MODIFY `listado_videos_playlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `publicar_video`
--
ALTER TABLE `publicar_video`
  MODIFY `publicar_video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registre_de_likes`
--
ALTER TABLE `registre_de_likes`
  MODIFY `registre_de_likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registre_likes_comentari`
--
ALTER TABLE `registre_likes_comentari`
  MODIFY `registre_likes_comentari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subscripcions`
--
ALTER TABLE `subscripcions`
  MODIFY `subscripcions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuari`
--
ALTER TABLE `usuari`
  MODIFY `usuari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canal`
--
ALTER TABLE `canal`
  ADD CONSTRAINT `fk_canal_usuari1` FOREIGN KEY (`usuari_usuari_id`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentari`
--
ALTER TABLE `comentari`
  ADD CONSTRAINT `fk_comentari_usuari1` FOREIGN KEY (`usuari_usuari_id`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentari_video1` FOREIGN KEY (`video_video_id`) REFERENCES `video` (`video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD CONSTRAINT `fk_etiqueta_video1` FOREIGN KEY (`video_video_id`,`video_estat_video_estat_video_id`) REFERENCES `video` (`video_id`, `estat_video_estat_video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `like_dislike`
--
ALTER TABLE `like_dislike`
  ADD CONSTRAINT `fk_like_dislike_estat_del_like_o_dislike1` FOREIGN KEY (`estat_del_like_o_dislike_estat_del_like_o_dislike_id`) REFERENCES `estat_del_like_o_dislike` (`estat_del_like_o_dislike_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_like_dislike_registre_de_likes1` FOREIGN KEY (`registre_de_likes_registre_de_likes_id`) REFERENCES `registre_de_likes` (`registre_de_likes_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_like_dislike_usuari1` FOREIGN KEY (`usuari_usuari_id`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_like_dislike_video1` FOREIGN KEY (`video_video_id`) REFERENCES `video` (`video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `like_dislike_comentari`
--
ALTER TABLE `like_dislike_comentari`
  ADD CONSTRAINT `fk_like_dislike_comentari_comentari1` FOREIGN KEY (`comentari_comentari_id`) REFERENCES `comentari` (`comentari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_like_dislike_comentari_estat_del_like_o_dislike1` FOREIGN KEY (`estat_del_like_o_dislike_estat_del_like_o_dislike_id`) REFERENCES `estat_del_like_o_dislike` (`estat_del_like_o_dislike_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_like_dislike_comentari_registre_likes_comentari1` FOREIGN KEY (`registre_likes_comentari_registre_likes_comentari_id`) REFERENCES `registre_likes_comentari` (`registre_likes_comentari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `listado_videos_playlist`
--
ALTER TABLE `listado_videos_playlist`
  ADD CONSTRAINT `fk_listado_videos_playlist_playlist1` FOREIGN KEY (`playlist_playlist_id`) REFERENCES `playlist` (`playlist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_listado_videos_playlist_video1` FOREIGN KEY (`video_video_id`) REFERENCES `video` (`video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `fk_playlist_estat_playlist1` FOREIGN KEY (`estat_playlist_estat_playlist_id`) REFERENCES `estat_playlist` (`estat_playlist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_playlist_usuari1` FOREIGN KEY (`usuari_usuari_id`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicar_video`
--
ALTER TABLE `publicar_video`
  ADD CONSTRAINT `fk_publicar_video_usuari` FOREIGN KEY (`publicar_video_usuari`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicar_video_video1` FOREIGN KEY (`video_video_id`,`video_estat_video_estat_video_id`) REFERENCES `video` (`video_id`, `estat_video_estat_video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subscripcions`
--
ALTER TABLE `subscripcions`
  ADD CONSTRAINT `fk_subscripcions_canal1` FOREIGN KEY (`canal_canal_id`) REFERENCES `canal` (`canal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subscripcions_usuari1` FOREIGN KEY (`usuari_usuari_id`) REFERENCES `usuari` (`usuari_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_video_estat_video1` FOREIGN KEY (`estat_video_estat_video_id`) REFERENCES `estat_video` (`estat_video_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_video_playlist1` FOREIGN KEY (`playlist_playlist_id`) REFERENCES `playlist` (`playlist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
