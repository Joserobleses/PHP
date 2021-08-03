-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2021 a las 12:55:10
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
-- Base de datos: `pizzeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botiga`
--

CREATE TABLE `botiga` (
  `botiga_id` int(11) NOT NULL,
  `botiga_adreça` varchar(45) NOT NULL,
  `botiga_codi_postal` varchar(5) NOT NULL,
  `botiga_localitat` int(11) NOT NULL,
  `botiga_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `botiga`
--

INSERT INTO `botiga` (`botiga_id`, `botiga_adreça`, `botiga_codi_postal`, `botiga_localitat`, `botiga_provincia`) VALUES
(1, 'joan bosco,19', '08015', 1, 1),
(2, 'carrer central, 234', '17005', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_pizza`
--

CREATE TABLE `categoria_pizza` (
  `categoria_pizza_id` int(11) NOT NULL,
  `pizza_pizza_id` int(11) NOT NULL,
  `categoria_pizza_nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_pizza`
--

INSERT INTO `categoria_pizza` (`categoria_pizza_id`, `pizza_pizza_id`, `categoria_pizza_nom`) VALUES
(1, 1, 'clàssica'),
(2, 2, 'especial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_nom` varchar(45) NOT NULL,
  `client_cognoms` varchar(45) NOT NULL,
  `client_adreca` varchar(45) NOT NULL,
  `client_codi_postal` varchar(5) NOT NULL,
  `client_telefon` varchar(9) NOT NULL,
  `client_localitat` int(11) NOT NULL,
  `client_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`client_id`, `client_nom`, `client_cognoms`, `client_adreca`, `client_codi_postal`, `client_telefon`, `client_localitat`, `client_provincia`) VALUES
(1, 'himar', 'fdsljfsd sfdsdfd', 'calle del topo, 45', '08017', '93998', 1, 1),
(2, 'jonas', 'brother', 'avenida del congo belga, 14', '17001', '97223', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE `comanda` (
  `comanda_id` int(11) NOT NULL,
  `comanda_data_i_hora` datetime NOT NULL,
  `client_client_id` int(11) NOT NULL,
  `comanda_botiga` int(11) NOT NULL,
  `empleat_empleat_id` int(11) NOT NULL,
  `domicili_o_recollir_domicili_o_recollir_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comanda`
--

INSERT INTO `comanda` (`comanda_id`, `comanda_data_i_hora`, `client_client_id`, `comanda_botiga`, `empleat_empleat_id`, `domicili_o_recollir_domicili_o_recollir_id`) VALUES
(1, '2021-07-28 19:09:34', 1, 2, 1, 2),
(2, '2021-07-28 19:09:35', 2, 1, 3, 1),
(3, '2021-07-28 19:54:55', 1, 2, 1, 1),
(4, '2021-07-29 11:34:09', 2, 2, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuiner_o_repartidor`
--

CREATE TABLE `cuiner_o_repartidor` (
  `cuiner_o_repartidor_id` int(11) NOT NULL,
  `cuiner_o_repartidor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuiner_o_repartidor`
--

INSERT INTO `cuiner_o_repartidor` (`cuiner_o_repartidor_id`, `cuiner_o_repartidor`) VALUES
(1, 'cuiner'),
(2, 'repartidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicili_o_recollir`
--

CREATE TABLE `domicili_o_recollir` (
  `domicili_o_recollir_id` int(11) NOT NULL,
  `domicili_o_recollir` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicili_o_recollir`
--

INSERT INTO `domicili_o_recollir` (`domicili_o_recollir_id`, `domicili_o_recollir`) VALUES
(1, 'domicili'),
(2, 'recollir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleat`
--

CREATE TABLE `empleat` (
  `empleat_id` int(11) NOT NULL,
  `empleat_nom` varchar(45) NOT NULL,
  `empleat_cognoms` varchar(45) NOT NULL,
  `empleat_nif` varchar(9) NOT NULL,
  `empleat_telefon` varchar(9) NOT NULL,
  `empleat_cuiner_o_repartidor` int(11) NOT NULL,
  `empleat_botiga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleat`
--

INSERT INTO `empleat` (`empleat_id`, `empleat_nom`, `empleat_cognoms`, `empleat_nif`, `empleat_telefon`, `empleat_cuiner_o_repartidor`, `empleat_botiga`) VALUES
(1, 'jose luis', 'dfjsdf', '3432j', '93333', 2, 2),
(2, 'luis jose', 'jutyuy', '98756e', '93333', 1, 2),
(3, 'josmar', 'oreorwe', '4323y', '97255', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localitat`
--

CREATE TABLE `localitat` (
  `localitat_id` int(11) NOT NULL,
  `localitat` varchar(45) NOT NULL,
  `provincia_provincia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localitat`
--

INSERT INTO `localitat` (`localitat_id`, `localitat`, `provincia_provincia_id`) VALUES
(1, 'alella', 1),
(2, 'salt', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza`
--

CREATE TABLE `pizza` (
  `pizza_id` int(11) NOT NULL,
  `pizza_nom` varchar(45) NOT NULL,
  `pizza_descripcio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pizza`
--

INSERT INTO `pizza` (`pizza_id`, `pizza_nom`, `pizza_descripcio`) VALUES
(1, '4 estacions', 'amb gorgonzola, cabra, ovella, castor'),
(2, 'americana', 'carn, salsa barbacoa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preu_total`
--

CREATE TABLE `preu_total` (
  `preu_total_id` int(11) NOT NULL,
  `preu_total` double DEFAULT NULL,
  `comanda_comanda_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producte`
--

CREATE TABLE `producte` (
  `producte_id` int(11) NOT NULL,
  `producte_nom` varchar(45) NOT NULL,
  `producte_pizza` int(11) DEFAULT NULL,
  `producte_tipus_de_producte` int(11) NOT NULL,
  `producte_descripcio` varchar(45) NOT NULL,
  `producte_imatge` varchar(45) NOT NULL,
  `producte_preu` double NOT NULL,
  `producte_quantitat` int(2) NOT NULL,
  `comanda_comanda_id` int(11) NOT NULL,
  `producte_preu_per_quantitat` double GENERATED ALWAYS AS (`producte_quantitat` * `producte_preu`) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producte`
--

INSERT INTO `producte` (`producte_id`, `producte_nom`, `producte_pizza`, `producte_tipus_de_producte`, `producte_descripcio`, `producte_imatge`, `producte_preu`, `producte_quantitat`, `comanda_comanda_id`) VALUES
(6, 'pizza 4 formatges', 1, 1, 'pizza formatjossa', 'imatge2', 10, 1, 1),
(7, 'hamburguesa formatge', NULL, 2, 'hamburguesa formatge', 'imatge1', 8, 3, 2),
(8, 'pizza americana', 2, 1, 'pizza amb salsa barbacoa', 'imatge3', 12, 2, 3),
(9, 'hamburguesa pollastre', NULL, 2, 'hamburguesa pollastre planxa, tomaquet, ceba', 'imatge4', 4, 1, 4),
(10, 'cervessa', NULL, 3, 'beguda alcocholica', 'imatge5', 0, 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `provincia_id` int(11) NOT NULL,
  `provincia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`provincia_id`, `provincia`) VALUES
(1, 'barcelona'),
(2, 'tarragona'),
(3, 'girona'),
(4, 'lleida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus_de_producte`
--

CREATE TABLE `tipus_de_producte` (
  `tipus_de_producte_id` int(11) NOT NULL,
  `tipus_de_producte` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipus_de_producte`
--

INSERT INTO `tipus_de_producte` (`tipus_de_producte_id`, `tipus_de_producte`) VALUES
(1, 'pizza'),
(2, 'hamburguesa'),
(3, 'beguda');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `botiga`
--
ALTER TABLE `botiga`
  ADD PRIMARY KEY (`botiga_id`,`botiga_localitat`,`botiga_provincia`),
  ADD KEY `fk_botiga_provincia1_idx` (`botiga_provincia`),
  ADD KEY `fk_botiga_localitat1_idx` (`botiga_localitat`);

--
-- Indices de la tabla `categoria_pizza`
--
ALTER TABLE `categoria_pizza`
  ADD PRIMARY KEY (`categoria_pizza_id`,`pizza_pizza_id`),
  ADD KEY `fk_categoria_pizza_pizza1_idx` (`pizza_pizza_id`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`,`client_localitat`,`client_provincia`),
  ADD KEY `fk_client_localitat1_idx` (`client_localitat`),
  ADD KEY `fk_client_provincia1_idx` (`client_provincia`);

--
-- Indices de la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`comanda_id`,`client_client_id`,`comanda_botiga`,`empleat_empleat_id`,`domicili_o_recollir_domicili_o_recollir_id`),
  ADD KEY `fk_comanda_client1_idx` (`client_client_id`),
  ADD KEY `fk_comanda_botiga1_idx` (`comanda_botiga`),
  ADD KEY `fk_comanda_empleat1_idx` (`empleat_empleat_id`),
  ADD KEY `fk_comanda_domicili_o_recollir1_idx` (`domicili_o_recollir_domicili_o_recollir_id`);

--
-- Indices de la tabla `cuiner_o_repartidor`
--
ALTER TABLE `cuiner_o_repartidor`
  ADD PRIMARY KEY (`cuiner_o_repartidor_id`);

--
-- Indices de la tabla `domicili_o_recollir`
--
ALTER TABLE `domicili_o_recollir`
  ADD PRIMARY KEY (`domicili_o_recollir_id`);

--
-- Indices de la tabla `empleat`
--
ALTER TABLE `empleat`
  ADD PRIMARY KEY (`empleat_id`,`empleat_cuiner_o_repartidor`,`empleat_botiga`),
  ADD KEY `fk_empleat_cuiner_o_repartidor1_idx` (`empleat_cuiner_o_repartidor`),
  ADD KEY `fk_empleat_botiga1_idx` (`empleat_botiga`);

--
-- Indices de la tabla `localitat`
--
ALTER TABLE `localitat`
  ADD PRIMARY KEY (`localitat_id`,`provincia_provincia_id`);

--
-- Indices de la tabla `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizza_id`);

--
-- Indices de la tabla `preu_total`
--
ALTER TABLE `preu_total`
  ADD PRIMARY KEY (`preu_total_id`,`comanda_comanda_id`),
  ADD KEY `fk_preu_total_comanda1_idx` (`comanda_comanda_id`);

--
-- Indices de la tabla `producte`
--
ALTER TABLE `producte`
  ADD PRIMARY KEY (`producte_id`,`producte_tipus_de_producte`,`comanda_comanda_id`),
  ADD KEY `fk_productes_tipus_de_producte1_idx` (`producte_tipus_de_producte`),
  ADD KEY `fk_producte_pizza1_idx` (`producte_pizza`),
  ADD KEY `fk_producte_comanda1_idx` (`comanda_comanda_id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`provincia_id`);

--
-- Indices de la tabla `tipus_de_producte`
--
ALTER TABLE `tipus_de_producte`
  ADD PRIMARY KEY (`tipus_de_producte_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `botiga`
--
ALTER TABLE `botiga`
  MODIFY `botiga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria_pizza`
--
ALTER TABLE `categoria_pizza`
  MODIFY `categoria_pizza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comanda`
--
ALTER TABLE `comanda`
  MODIFY `comanda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cuiner_o_repartidor`
--
ALTER TABLE `cuiner_o_repartidor`
  MODIFY `cuiner_o_repartidor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `domicili_o_recollir`
--
ALTER TABLE `domicili_o_recollir`
  MODIFY `domicili_o_recollir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleat`
--
ALTER TABLE `empleat`
  MODIFY `empleat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `localitat`
--
ALTER TABLE `localitat`
  MODIFY `localitat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `preu_total`
--
ALTER TABLE `preu_total`
  MODIFY `preu_total_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producte`
--
ALTER TABLE `producte`
  MODIFY `producte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `provincia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipus_de_producte`
--
ALTER TABLE `tipus_de_producte`
  MODIFY `tipus_de_producte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `botiga`
--
ALTER TABLE `botiga`
  ADD CONSTRAINT `fk_botiga_localitat1` FOREIGN KEY (`botiga_localitat`) REFERENCES `localitat` (`localitat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_botiga_provincia1` FOREIGN KEY (`botiga_provincia`) REFERENCES `provincia` (`provincia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categoria_pizza`
--
ALTER TABLE `categoria_pizza`
  ADD CONSTRAINT `fk_categoria_pizza_pizza1` FOREIGN KEY (`pizza_pizza_id`) REFERENCES `pizza` (`pizza_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_localitat1` FOREIGN KEY (`client_localitat`) REFERENCES `localitat` (`localitat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_client_provincia1` FOREIGN KEY (`client_provincia`) REFERENCES `provincia` (`provincia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `fk_comanda_botiga1` FOREIGN KEY (`comanda_botiga`) REFERENCES `botiga` (`botiga_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_client1` FOREIGN KEY (`client_client_id`) REFERENCES `client` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_domicili_o_recollir1` FOREIGN KEY (`domicili_o_recollir_domicili_o_recollir_id`) REFERENCES `domicili_o_recollir` (`domicili_o_recollir_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comanda_empleat1` FOREIGN KEY (`empleat_empleat_id`) REFERENCES `empleat` (`empleat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleat`
--
ALTER TABLE `empleat`
  ADD CONSTRAINT `fk_empleat_botiga1` FOREIGN KEY (`empleat_botiga`) REFERENCES `botiga` (`botiga_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleat_cuiner_o_repartidor1` FOREIGN KEY (`empleat_cuiner_o_repartidor`) REFERENCES `cuiner_o_repartidor` (`cuiner_o_repartidor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preu_total`
--
ALTER TABLE `preu_total`
  ADD CONSTRAINT `fk_preu_total_comanda1` FOREIGN KEY (`comanda_comanda_id`) REFERENCES `comanda` (`comanda_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producte`
--
ALTER TABLE `producte`
  ADD CONSTRAINT `fk_producte_comanda1` FOREIGN KEY (`comanda_comanda_id`) REFERENCES `comanda` (`comanda_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producte_pizza1` FOREIGN KEY (`producte_pizza`) REFERENCES `pizza` (`pizza_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productes_tipus_de_producte1` FOREIGN KEY (`producte_tipus_de_producte`) REFERENCES `tipus_de_producte` (`tipus_de_producte_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
