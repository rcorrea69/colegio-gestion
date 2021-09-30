-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2021 a las 13:47:15
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio-gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `art_nombre` varchar(50) NOT NULL,
  `art_precio` float(10,2) NOT NULL,
  `art_rubro` int(3) NOT NULL,
  `art_subrubro` int(3) NOT NULL,
  `art_activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `art_nombre`, `art_precio`, `art_rubro`, `art_subrubro`, `art_activo`) VALUES
(1, 'DULCE DE LECHE 1/2 KG Peña', 250.89, 1, 1, 1),
(2, 'DULCE DE ZAPALLO 800 G', 300.00, 1, 1, 1),
(3, 'DULCE DE ZAPALLO 1/2 KG', 200.00, 1, 1, 1),
(4, 'DULCE DE ZAPALLO 1 KG', 330.00, 1, 1, 1),
(5, 'MERMELADA NARANJA 1/2 KG', 200.00, 1, 1, 1),
(6, 'DULCE DE MAMON 1/2 KG', 200.00, 1, 1, 1),
(7, 'DULCE DE MAMON KG', 330.00, 1, 1, 1),
(8, 'DULCE DE MAMON 800G', 300.00, 1, 1, 1),
(9, 'MIEL 1 KG', 380.00, 1, 2, 1),
(10, 'MIEL 1/2 KG', 200.00, 1, 2, 1),
(11, 'PICKLES 800G', 300.00, 1, 3, 1),
(12, 'PICKLES 1 KG', 330.00, 1, 3, 1),
(13, 'SAL ESPECIADA 200G', 120.00, 1, 3, 1),
(14, 'MIEL A GRANEL KG', 200.00, 2, 4, 1),
(15, 'POLLO PARRILLERO X KG', 300.00, 2, 5, 1),
(16, 'BOVINO KG', 0.00, 2, 6, 1),
(17, 'LECHON X KG', 450.00, 2, 7, 1),
(18, 'CERDO KG', 0.00, 2, 7, 1),
(19, 'CHORICITOS X KG', 600.00, 2, 8, 1),
(20, 'SALAME X KG', 1200.00, 2, 8, 1),
(21, 'QUESO DE CHANCHO X KG', 500.00, 2, 8, 1),
(22, 'MORCILLA X KG', 500.00, 2, 8, 1),
(23, 'CHIVITO X KG', 400.00, 2, 9, 1),
(24, 'HUEVO MAPLE', 250.00, 2, 9, 1),
(25, 'HUEVO DOCENA', 100.00, 2, 9, 1),
(26, 'CORDERO', 450.00, 2, 9, 1),
(27, 'NARANJA BIN', 2000.00, 3, 10, 1),
(28, 'MANDARINA BIN', 2000.00, 3, 10, 1),
(29, 'KALE X KG', 60.00, 3, 11, 1),
(30, 'ACHICORIA MAZO', 40.00, 3, 11, 1),
(31, 'REPOLLO', 120.00, 3, 11, 1),
(32, 'ACELGA MAZO', 80.00, 3, 11, 1),
(33, 'LECHUGA X KG', 100.00, 3, 11, 1),
(34, 'BROCOLI ', 120.00, 3, 11, 1),
(35, 'BRUSELAS BOLSA', 120.00, 3, 11, 1),
(36, 'PEREJIL MAZO', 60.00, 3, 11, 1),
(37, 'RUCULA MAZO', 70.00, 3, 11, 1),
(38, 'CEBOLLA DE VERDEO X KG', 120.00, 3, 11, 1),
(39, 'PLANTINES CITRUS', 500.00, 3, 12, 1),
(40, 'PLANTINES ', 50.00, 3, 13, 1),
(41, 'PLANTAS', 200.00, 3, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_ctacte`
--

CREATE TABLE `clientes_ctacte` (
  `id_ctacte` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `ctacteDH` text NOT NULL,
  `factura_recibo` int(11) NOT NULL,
  `ctacte_importe` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes_ctacte`
--

INSERT INTO `clientes_ctacte` (`id_ctacte`, `id_cliente`, `ctacteDH`, `factura_recibo`, `ctacte_importe`) VALUES
(1, 1, 'D', 10, 2000.00),
(2, 1, 'H', 11, 1000.00),
(3, 2, 'D', 16, 1500.00),
(4, 2, 'D', 17, 250.89);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `pe_apellido` varchar(50) NOT NULL,
  `pe_nombre` varchar(50) NOT NULL,
  `pe_domicilio` varchar(50) NOT NULL,
  `pe_telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `pe_apellido`, `pe_nombre`, `pe_domicilio`, `pe_telefono`) VALUES
(1, 'Correa', 'Ruben', 'Giribone 2225 1B', '01122735837'),
(2, 'Zambon ', 'Andrea', 'Giribone 2225 1B', '01122735837'),
(3, 'Cracco', 'Claudio', 'en la casa', '6969696969'),
(4, 'Otra ', 'Persona', 'gijjjjjjj', '96969696969');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id_rubro` int(3) NOT NULL,
  `ru_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id_rubro`, `ru_nombre`) VALUES
(1, 'INDUSTRIA'),
(2, 'PRODUCCION ANIMAL'),
(3, 'PRODUCCION VEGETAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subrubros`
--

CREATE TABLE `subrubros` (
  `id_subrubro` int(3) NOT NULL,
  `sub_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subrubros`
--

INSERT INTO `subrubros` (`id_subrubro`, `sub_nombre`) VALUES
(1, 'DULCE'),
(2, 'MIEL'),
(3, 'PICKLES Y CHIMI'),
(4, 'APICULTURA'),
(5, 'AVES'),
(6, 'BOVINO'),
(7, 'CERDOS'),
(8, 'CHACINADOS'),
(9, 'GRANJA'),
(10, 'CITRUS'),
(11, 'HUERTA'),
(12, 'VIVERO CITRUS'),
(13, 'VIVERO ORNAMENTAL'),
(14, 'ruben antonio correa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `usu_usuario` varchar(20) NOT NULL,
  `usu_clave` varchar(15) NOT NULL,
  `usu_nombre` varchar(30) NOT NULL,
  `usu_nivel` int(2) NOT NULL,
  `usu_fecha_alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usu_usuario`, `usu_clave`, `usu_nombre`, `usu_nivel`, `usu_fecha_alta`) VALUES
(1, 'javier', '1234444', 'Javier Peña', 2, '2016-12-21'),
(2, 'ruben', 'Rcorrea', 'Ruben Correa ', 2, '2016-12-21'),
(3, 'miguel', 'miguel', 'Miguel', 1, '2016-12-21'),
(4, 'cande', 'cande123', 'candela correa', 2, '2019-12-05'),
(5, 'agu co', 'agus', 'agustin ', 1, '2019-12-05'),
(6, 'cande', 'cande', 'Cane', 1, '2019-12-10'),
(7, 'usu', 'pas', 'Otro Usuario', 2, '2019-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `vta_cliente` int(11) NOT NULL,
  `vta_fecha` date NOT NULL,
  `vta_importe` double(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `vta_tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `vta_cliente`, `vta_fecha`, `vta_importe`, `id_usuario`, `vta_tipo`) VALUES
(1, 0, '2021-09-27', 3250.89, 2, 0),
(2, 0, '2021-09-27', 630.00, 2, 0),
(3, 0, '2021-09-30', 750.89, 2, 0),
(4, 0, '2021-09-29', 300.00, 2, 0),
(5, 0, '2021-09-06', 1231.78, 2, 0),
(6, 0, '2021-09-30', 4300.00, 2, 0),
(7, 0, '2021-09-27', 3500.00, 2, 0),
(8, 0, '2021-09-28', 600.00, 2, 0),
(9, 1, '2021-09-29', 250.89, 2, 0),
(10, 1, '2021-09-01', 2000.00, 2, 1),
(11, 1, '2021-09-29', 1000.00, 2, 1),
(12, 1, '2021-09-29', 300.00, 2, 0),
(13, 0, '2021-09-29', 250.89, 2, 0),
(14, 0, '2021-09-29', 1000.00, 2, 0),
(15, 0, '2021-09-29', 800.00, 2, 0),
(16, 2, '2021-09-29', 1500.00, 2, 1),
(17, 2, '2021-09-29', 250.89, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalles`
--

CREATE TABLE `ventas_detalles` (
  `id_detalle` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `art_codigo` int(11) NOT NULL,
  `art_detalle` varchar(50) NOT NULL,
  `art_cantidad` int(11) NOT NULL,
  `importe` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas_detalles`
--

INSERT INTO `ventas_detalles` (`id_detalle`, `id_venta`, `art_codigo`, `art_detalle`, `art_cantidad`, `importe`) VALUES
(1, 1, 1, 'DULCE DE LECHE 1/2 KG Peña', 1, 250.89),
(2, 1, 2, 'DULCE DE ZAPALLO 800 G', 10, 300.00),
(3, 2, 4, 'DULCE DE ZAPALLO 1 KG', 1, 330.00),
(4, 2, 2, 'DULCE DE ZAPALLO 800 G', 1, 300.00),
(5, 3, 2, 'DULCE DE ZAPALLO 800 G', 1, 300.00),
(6, 3, 5, 'MERMELADA NARANJA 1/2 KG', 1, 200.00),
(7, 3, 1, 'DULCE DE LECHE 1/2 KG Peña', 1, 250.89),
(8, 4, 2, 'DULCE DE ZAPALLO 800 G', 1, 300.00),
(9, 5, 1, 'DULCE DE LECHE 1/2 KG Peña', 1, 250.89),
(10, 5, 3, 'DULCE DE ZAPALLO 1/2 KG', 1, 200.00),
(11, 5, 1, 'DULCE DE LECHE 1/2 KG Peña', 1, 250.89),
(12, 5, 3, 'DULCE DE ZAPALLO 1/2 KG', 1, 200.00),
(13, 5, 4, 'DULCE DE ZAPALLO 1 KG', 1, 330.00),
(14, 6, 2, 'DULCE DE ZAPALLO 800 G', 1, 300.00),
(15, 6, 28, 'MANDARINA BIN', 2, 2000.00),
(16, 7, 2, 'DULCE DE ZAPALLO 800 G', 1, 300.00),
(17, 7, 20, 'SALAME X KG', 1, 1200.00),
(18, 7, 41, 'PLANTAS', 10, 200.00),
(19, 8, 41, 'PLANTAS', 3, 200.00),
(20, 9, 1, 'DULCE DE LECHE 1/2 KG Peña', 1, 250.89),
(21, 10, 2, 'DULCE DE ZAPALLO 800 G', 1, 300.00),
(22, 10, 10, 'MIEL 1/2 KG', 1, 200.00),
(23, 10, 39, 'PLANTINES CITRUS', 3, 500.00),
(24, 11, 3, 'DULCE DE ZAPALLO 1/2 KG', 1, 200.00),
(25, 11, 10, 'MIEL 1/2 KG', 4, 200.00),
(26, 12, 2, 'DULCE DE ZAPALLO 800 G', 1, 300.00),
(27, 13, 1, 'DULCE DE LECHE 1/2 KG Peña', 1, 250.89),
(28, 14, 3, 'DULCE DE ZAPALLO 1/2 KG', 5, 200.00),
(29, 15, 41, 'PLANTAS', 4, 200.00),
(30, 16, 15, 'POLLO PARRILLERO X KG', 1, 300.00),
(31, 16, 19, 'CHORICITOS X KG', 2, 600.00),
(32, 17, 1, 'DULCE DE LECHE 1/2 KG Peña', 1, 250.89);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_clientectacte`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_clientectacte` (
`id_cliente` int(11)
,`pe_apellido` varchar(50)
,`pe_nombre` varchar(50)
,`pe_telefono` varchar(15)
,`Debe` double(19,2)
,`Haber` double(19,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_ventasdetalle`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_ventasdetalle` (
`id_venta` int(11)
,`art_codigo` int(11)
,`art_detalle` varchar(50)
,`art_cantidad` int(11)
,`importe` double(10,2)
,`subtotal` double(19,2)
,`vta_fecha` date
,`art_rubro` int(3)
,`art_subrubro` int(3)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_clientectacte`
--
DROP TABLE IF EXISTS `vista_clientectacte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_clientectacte`  AS SELECT `cta`.`id_cliente` AS `id_cliente`, `per`.`pe_apellido` AS `pe_apellido`, `per`.`pe_nombre` AS `pe_nombre`, `per`.`pe_telefono` AS `pe_telefono`, sum(if(`cta`.`ctacteDH` = 'D',`cta`.`ctacte_importe`,0)) AS `Debe`, sum(if(`cta`.`ctacteDH` = 'H',`cta`.`ctacte_importe`,0)) AS `Haber` FROM (`clientes_ctacte` `cta` join `personas` `per` on(`cta`.`id_cliente` = `per`.`id_persona`)) GROUP BY `cta`.`id_cliente` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_ventasdetalle`
--
DROP TABLE IF EXISTS `vista_ventasdetalle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_ventasdetalle`  AS SELECT `de`.`id_venta` AS `id_venta`, `de`.`art_codigo` AS `art_codigo`, `de`.`art_detalle` AS `art_detalle`, `de`.`art_cantidad` AS `art_cantidad`, `de`.`importe` AS `importe`, `de`.`art_cantidad`* `de`.`importe` AS `subtotal`, `ve`.`vta_fecha` AS `vta_fecha`, `art`.`art_rubro` AS `art_rubro`, `art`.`art_subrubro` AS `art_subrubro` FROM ((`ventas_detalles` `de` left join `articulos` `art` on(`de`.`art_codigo` = `art`.`id_articulo`)) left join `ventas` `ve` on(`de`.`id_venta` = `ve`.`id_venta`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `clientes_ctacte`
--
ALTER TABLE `clientes_ctacte`
  ADD PRIMARY KEY (`id_ctacte`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`id_rubro`);

--
-- Indices de la tabla `subrubros`
--
ALTER TABLE `subrubros`
  ADD PRIMARY KEY (`id_subrubro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `ventas_detalles`
--
ALTER TABLE `ventas_detalles`
  ADD PRIMARY KEY (`id_detalle`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `clientes_ctacte`
--
ALTER TABLE `clientes_ctacte`
  MODIFY `id_ctacte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id_rubro` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `subrubros`
--
ALTER TABLE `subrubros`
  MODIFY `id_subrubro` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ventas_detalles`
--
ALTER TABLE `ventas_detalles`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
