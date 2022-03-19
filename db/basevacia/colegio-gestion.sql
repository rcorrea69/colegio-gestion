-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2022 a las 23:17:16
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
(1, 'DULCE DE LECHE 1/2 KG', 250.89, 1, 1, 1),
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
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id_caja` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `saldo_inicial` float(12,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id_caja`, `nombre`, `saldo_inicial`, `fecha`) VALUES
(1, 'Caja Principal', 0.00, '2022-01-01'),
(2, 'Banco Cta Cte', 0.00, '2022-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id_mov` int(11) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tabla` varchar(30) NOT NULL,
  `nro_com` int(11) NOT NULL,
  `nro_item` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `caja_rub` int(11) NOT NULL,
  `caja_sub` int(11) NOT NULL,
  `importe` float(12,2) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas_mov`
--

CREATE TABLE `cajas_mov` (
  `id_mov` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `caja_envia` int(11) NOT NULL,
  `caja_recibe` int(11) NOT NULL,
  `importe` float(12,2) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(11) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `tipo_gasto` int(1) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `ga_fecha` date NOT NULL,
  `ga_descripcion` varchar(100) NOT NULL,
  `ga_importe` float(12,2) NOT NULL,
  `ga_rubro` int(11) NOT NULL,
  `ga_subrubro` int(11) NOT NULL,
  `ga_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(6, 'correa', 'correa', '', ''),
(7, 'otro clie', 'najaj', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_persona` int(11) NOT NULL,
  `pe_apellido` varchar(50) NOT NULL,
  `pe_nombre` varchar(50) NOT NULL,
  `pe_domicilio` varchar(50) NOT NULL,
  `pe_telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_persona`, `pe_apellido`, `pe_nombre`, `pe_domicilio`, `pe_telefono`) VALUES
(1, 'Correa', 'Ruben', 'Giribone 2225 1B', '01122735837'),
(2, 'Zambon ', 'Andrea', 'Giribone 2225 1B', '01122735837'),
(3, 'Cracco', 'Claudio', 'en la casa', '6969696969'),
(4, 'mi proveedor', 'Persona', 'gijjjjjjj', '96969696969');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores_ctacte`
--

CREATE TABLE `proveedores_ctacte` (
  `id_ctacte` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `ctacteDH` text NOT NULL,
  `factura_recibo` int(11) NOT NULL,
  `ctacte_importe` float(10,2) NOT NULL,
  `ctacte_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id_recibo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `rec_importe` float(10,2) NOT NULL,
  `rec_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `sub_nombre` varchar(50) NOT NULL,
  `id_rubro` int(11) NOT NULL,
  `sub_saldoInicial` float(12,2) NOT NULL,
  `sub_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subrubros`
--

INSERT INTO `subrubros` (`id_subrubro`, `sub_nombre`, `id_rubro`, `sub_saldoInicial`, `sub_fecha`) VALUES
(1, 'DULCE', 1, 0.00, '2022-01-01'),
(2, 'MIEL', 1, 0.00, '2022-02-04'),
(3, 'PICKLES Y CHIMI', 1, 0.00, '2022-01-01'),
(4, 'APICULTURA', 2, 0.00, '2022-01-01'),
(5, 'AVES', 2, 0.00, '2022-01-01'),
(6, 'BOVINO', 2, 0.00, '2022-01-01'),
(7, 'CERDOS', 2, 0.00, '2022-01-01'),
(8, 'CHACINADOS', 2, 0.00, '2022-01-01'),
(9, 'GRANJA', 2, 0.00, '2022-01-01'),
(10, 'CITRUS', 3, 0.00, '2022-01-01'),
(11, 'HUERTA', 3, 0.00, '2022-01-01'),
(12, 'VIVERO CITRUS', 3, 0.00, '2022-01-01'),
(13, 'VIVERO ORNAMENTAL', 3, 0.00, '2022-01-01');

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
(7, 'claudio', 'claudio', 'Claudio Cracco', 2, '2019-12-10');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalles`
--

CREATE TABLE `ventas_detalles` (
  `id_detalle` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `art_codigo` int(11) NOT NULL,
  `art_detalle` varchar(50) NOT NULL,
  `art_cantidad` float(10,2) NOT NULL,
  `importe` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalles_fiado`
--

CREATE TABLE `ventas_detalles_fiado` (
  `id_detalle` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `art_codigo` int(11) NOT NULL,
  `art_detalle` varchar(50) NOT NULL,
  `art_cantidad` float(10,2) NOT NULL,
  `importe` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_fiado`
--

CREATE TABLE `ventas_fiado` (
  `id_venta` int(11) NOT NULL,
  `vta_cliente` int(11) NOT NULL,
  `vta_fecha` date NOT NULL,
  `vta_importe` double(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `vta_tipo` int(1) NOT NULL,
  `factura_fecha` date DEFAULT NULL,
  `factura_nro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_saldos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_saldos` (
`rubro` int(11)
,`caja` int(3)
,`sub_nombre` varchar(50)
,`saldo` double(19,2)
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
,`art_cantidad` float(10,2)
,`importe` float(10,2)
,`subtotal` double(19,2)
,`vta_fecha` date
,`art_rubro` int(3)
,`art_subrubro` int(3)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_ventasxrubros`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_ventasxrubros` (
`art_rubro` int(3)
,`art_subrubro` int(3)
,`vta_fecha` date
,`ru_nombre` varchar(50)
,`subtotal` double(19,2)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_saldos`
--
DROP TABLE IF EXISTS `vista_saldos`;

CREATE  VIEW `vista_saldos`  AS SELECT `sub`.`id_rubro` AS `rubro`, `sub`.`id_subrubro` AS `caja`, `sub`.`sub_nombre` AS `sub_nombre`, (select sum(`ca`.`importe`) AS `saldo` from `cajas` `ca` where `ca`.`caja_sub` = `sub`.`id_subrubro`) + `sub`.`sub_saldoInicial` AS `saldo` FROM `subrubros` AS `sub` WHERE 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_ventasdetalle`
--
DROP TABLE IF EXISTS `vista_ventasdetalle`;

CREATE VIEW `vista_ventasdetalle`  AS SELECT `de`.`id_venta` AS `id_venta`, `de`.`art_codigo` AS `art_codigo`, `de`.`art_detalle` AS `art_detalle`, `de`.`art_cantidad` AS `art_cantidad`, `de`.`importe` AS `importe`, `de`.`art_cantidad`* `de`.`importe` AS `subtotal`, `ve`.`vta_fecha` AS `vta_fecha`, `art`.`art_rubro` AS `art_rubro`, `art`.`art_subrubro` AS `art_subrubro` FROM ((`ventas_detalles` `de` left join `articulos` `art` on(`de`.`art_codigo` = `art`.`id_articulo`)) left join `ventas` `ve` on(`de`.`id_venta` = `ve`.`id_venta`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_ventasxrubros`
--
DROP TABLE IF EXISTS `vista_ventasxrubros`;

CREATE  VIEW `vista_ventasxrubros`  AS SELECT `ve`.`art_rubro` AS `art_rubro`, `ve`.`art_subrubro` AS `art_subrubro`, `ve`.`vta_fecha` AS `vta_fecha`, `ru`.`ru_nombre` AS `ru_nombre`, sum(`ve`.`subtotal`) AS `subtotal` FROM (`vista_ventasdetalle` `ve` join `rubros` `ru` on(`ve`.`art_rubro` = `ru`.`id_rubro`)) GROUP BY `ve`.`art_rubro`, `ve`.`vta_fecha`, `ve`.`art_subrubro` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id_mov`);

--
-- Indices de la tabla `cajas_mov`
--
ALTER TABLE `cajas_mov`
  ADD PRIMARY KEY (`id_mov`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `proveedores_ctacte`
--
ALTER TABLE `proveedores_ctacte`
  ADD PRIMARY KEY (`id_ctacte`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id_recibo`);

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
-- Indices de la tabla `ventas_detalles_fiado`
--
ALTER TABLE `ventas_detalles_fiado`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `ventas_fiado`
--
ALTER TABLE `ventas_fiado`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cajas_mov`
--
ALTER TABLE `cajas_mov`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedores_ctacte`
--
ALTER TABLE `proveedores_ctacte`
  MODIFY `id_ctacte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id_rubro` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subrubros`
--
ALTER TABLE `subrubros`
  MODIFY `id_subrubro` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas_detalles`
--
ALTER TABLE `ventas_detalles`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas_detalles_fiado`
--
ALTER TABLE `ventas_detalles_fiado`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas_fiado`
--
ALTER TABLE `ventas_fiado`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
