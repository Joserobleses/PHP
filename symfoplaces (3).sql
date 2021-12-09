-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2021 a las 22:03:37
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `symfoplaces`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `commenttext` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211201094014', '2021-12-01 10:40:56', 36),
('DoctrineMigrations\\Version20211201104208', '2021-12-01 11:42:33', 26),
('DoctrineMigrations\\Version20211201112813', '2021-12-01 12:28:23', 29),
('DoctrineMigrations\\Version20211201113122', '2021-12-01 12:31:40', 26),
('DoctrineMigrations\\Version20211201193752', '2021-12-01 20:39:57', 4698),
('DoctrineMigrations\\Version20211202094634', '2021-12-02 10:47:01', 53),
('DoctrineMigrations\\Version20211202103551', '2021-12-02 11:35:58', 70),
('DoctrineMigrations\\Version20211204120402', '2021-12-04 13:04:43', 3552),
('DoctrineMigrations\\Version20211206165636', '2021-12-06 17:57:00', 7796),
('DoctrineMigrations\\Version20211206170349', '2021-12-06 18:03:57', 988);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `namephoto` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `nom` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionplace` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poblacio` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipus` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valoracio` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `place`
--

INSERT INTO `place` (`id`, `nom`, `descriptionplace`, `foto`, `pais`, `poblacio`, `tipus`, `valoracio`, `user_id`) VALUES
(1, 'VillaAbajo de arriba', 'pueblo bullicioso', '61adfa7eda4c2.jpg', 'francia', 'chaten', 'local', 3, 1),
(2, 'Villarriba de abajo', 'lugar de montaña en la playa', '61ae03f133d61.jpg', 'españa', 'desconocida', 'patrimonio del pueblo', 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `poblacio` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefon` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `poblacio`, `telefon`, `displayname`, `is_verified`) VALUES
(1, 'jrobleses@gmail.com', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$CeB4oNc3dzwz5YMb8giU4OhfZPbPTELBLNfTPdjM1oQFZ.Zti.OTi', 'malgrat', '6979797', 'joseAdmin', 1),
(2, 'juan@gmail.com', '[\"ROLE_USER\"]', '$2y$13$CeB4oNc3dzwz5YMb8giU4OhfZPbPTELBLNfTPdjM1oQFZ.Zti.OTi', NULL, NULL, 'juan', 0),
(3, 'victor@gmail.com', '[\"ROLE_USER\"]', 'password', NULL, NULL, 'victor', 0),
(4, 'manuel@gmail.com', '[\"ROLE_USER\"]', '$2y$13$fKNAxHzJ6puNnaqnIyS23.cx1FFZZS6tRnj1o2KyvL41ywrNI5OYC', NULL, NULL, 'manuel', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CDA6A219` (`place_id`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_14B78418DA6A219` (`place_id`);

--
-- Indices de la tabla `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_741D53CDA76ED395` (`user_id`);

--
-- Indices de la tabla `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CDA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Filtros para la tabla `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_14B78418DA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Filtros para la tabla `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `FK_741D53CDA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
