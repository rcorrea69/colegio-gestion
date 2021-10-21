-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2021 a las 13:54:46
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
  `ctacte_importe` float(10,2) NOT NULL,
  `ctacte_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes_ctacte`
--

INSERT INTO `clientes_ctacte` (`id_ctacte`, `id_cliente`, `ctacteDH`, `factura_recibo`, `ctacte_importe`, `ctacte_fecha`) VALUES
(1, 1, 'D', 10, 2000.00, '2021-09-01'),
(2, 1, 'H', 11, 1000.00, '2021-09-13'),
(3, 2, 'D', 16, 1500.00, '2021-09-15'),
(4, 2, 'D', 17, 250.89, '2021-09-22'),
(5, 2, 'D', 18, 500.00, '2021-09-01'),
(6, 1, 'H', 2, 11.00, '2021-10-02'),
(7, 1, 'H', 3, 450.00, '2021-10-02'),
(8, 1, 'H', 4, 10.00, '2021-10-02'),
(9, 1, 'H', 5, 2.00, '2021-10-02'),
(10, 1, 'H', 6, 2.00, '2021-10-02'),
(11, 1, 'H', 7, 2.00, '2021-10-02'),
(12, 1, 'H', 8, 5.00, '2021-10-02'),
(13, 1, 'H', 9, 18.00, '2021-09-30'),
(14, 1, 'H', 10, 10.00, '2021-10-02'),
(15, 1, 'H', 11, 10.00, '2021-10-02'),
(16, 1, 'H', 12, 600.00, '2021-10-02'),
(17, 1, 'D', 19, 550.89, '2021-10-02'),
(18, 1, 'H', 13, 10.00, '2021-10-04'),
(19, 1, 'H', 14, 11.00, '2021-10-04'),
(20, 1, 'H', 15, 9.89, '2021-10-04'),
(21, 1, 'H', 16, 30.00, '2021-10-04'),
(22, 1, 'H', 17, 20.00, '2021-10-04'),
(23, 1, 'H', 18, 2.00, '2021-10-04'),
(24, 1, 'H', 19, 3.00, '2021-10-04'),
(25, 1, 'H', 20, 2.00, '2021-10-04'),
(26, 1, 'H', 21, 3.00, '2021-10-04'),
(27, 1, 'H', 22, 10.00, '2021-10-04'),
(28, 1, 'H', 23, 10.00, '2021-10-04'),
(29, 1, 'H', 24, 20.00, '2021-10-04'),
(30, 1, 'H', 25, 151.00, '2021-10-04'),
(31, 1, 'H', 26, 151.00, '2021-10-04'),
(32, 1, 'H', 27, 22.00, '2021-10-04'),
(33, 1, 'H', 28, 22.00, '2021-10-04'),
(34, 1, 'H', 29, 4.00, '2021-10-04'),
(35, 1, 'H', 30, 350.00, '2021-10-04'),
(36, 1, 'H', 31, 450.00, '2021-10-07'),
(37, 2, 'H', 32, 450.00, '2021-10-07'),
(38, 1, 'H', 33, 10.00, '2021-10-09'),
(39, 1, 'H', 34, 12.00, '2021-10-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `ga_fecha` date NOT NULL,
  `ga_descripcion` varchar(100) NOT NULL,
  `ga_importe` float NOT NULL,
  `ga_rubro` int(11) NOT NULL,
  `ga_subrubro` int(11) NOT NULL,
  `ga_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gasto`, `id_proveedor`, `ga_fecha`, `ga_descripcion`, `ga_importe`, `ga_rubro`, `ga_subrubro`, `ga_usuario`) VALUES
(3, 1, '2021-10-09', 'Rollos de membrana de alto tránsito x 4 mm', 450, 1, 0, 2),
(4, 2, '2021-10-09', 'mi prueba de codigo si funciona', 450, 1, 0, 2),
(5, 0, '2021-10-09', 'Rollos de membrana de alto tránsito x 4 mm', 600, 2, 0, 2),
(6, 3, '2021-10-09', 'esta es mi prueba un poco mas detallada', 700, 1, 0, 2),
(7, 2, '2021-10-09', 'Rollos de membrana de alto tr?nsito x 4 mm', 999, 2, 0, 2),
(8, 3, '2021-10-09', 'Metros de Membrana autoadhesiva', 600, 3, 0, 2),
(9, 0, '2021-10-13', 'mi primera prueba despues de agregar rubro y subrubro para ver como anda', 99.99, 1, 2, 7),
(10, 0, '2021-10-13', 'mi primera prueba despues de agregar rubro y subrubro para ver como anda', 6666, 2, 6, 7),
(11, 0, '2021-10-13', 'hola mundo', 222, 1, 1, 2);

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
(4, 'Otra ', 'Persona', 'gijjjjjjj', '96969696969');

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

--
-- Volcado de datos para la tabla `proveedores_ctacte`
--

INSERT INTO `proveedores_ctacte` (`id_ctacte`, `id_proveedor`, `ctacteDH`, `factura_recibo`, `ctacte_importe`, `ctacte_fecha`) VALUES
(1, 3, 'H', 6, 700.00, '2021-10-09'),
(2, 2, 'H', 7, 999.00, '2021-10-09'),
(3, 3, 'H', 8, 600.00, '2021-10-09');

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

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`id_recibo`, `id_cliente`, `rec_importe`, `rec_fecha`) VALUES
(1, 1, 350.00, '2021-10-02'),
(2, 1, 11.00, '2021-10-02'),
(3, 1, 450.00, '2021-10-02'),
(4, 1, 10.00, '2021-10-02'),
(5, 1, 2.00, '2021-10-02'),
(6, 1, 2.00, '2021-10-02'),
(7, 1, 2.00, '2021-10-02'),
(8, 1, 5.00, '2021-10-02'),
(9, 1, 18.00, '2021-09-30'),
(10, 1, 10.00, '2021-10-02'),
(11, 1, 10.00, '2021-10-02'),
(12, 1, 600.00, '2021-10-02'),
(13, 1, 10.00, '2021-10-04'),
(14, 1, 11.00, '2021-10-04'),
(15, 1, 9.89, '2021-10-04'),
(16, 1, 30.00, '2021-10-04'),
(17, 1, 20.00, '2021-10-04'),
(18, 1, 2.00, '2021-10-04'),
(19, 1, 3.00, '2021-10-04'),
(20, 1, 2.00, '2021-10-04'),
(21, 1, 3.00, '2021-10-04'),
(22, 1, 10.00, '2021-10-04'),
(23, 1, 10.00, '2021-10-04'),
(24, 1, 20.00, '2021-10-04'),
(25, 1, 151.00, '2021-10-04'),
(26, 1, 151.00, '2021-10-04'),
(27, 1, 22.00, '2021-10-04'),
(28, 1, 22.00, '2021-10-04'),
(29, 1, 4.00, '2021-10-04'),
(30, 1, 350.00, '2021-10-04'),
(31, 1, 450.00, '2021-10-07'),
(32, 2, 450.00, '2021-10-07'),
(33, 1, 10.00, '2021-10-09'),
(34, 1, 12.00, '2021-10-13');

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
  `id_rubro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subrubros`
--

INSERT INTO `subrubros` (`id_subrubro`, `sub_nombre`, `id_rubro`) VALUES
(1, 'DULCE', 1),
(2, 'MIEL', 1),
(3, 'PICKLES Y CHIMI', 1),
(4, 'APICULTURA', 2),
(5, 'AVES', 2),
(6, 'BOVINO', 2),
(7, 'CERDOS', 2),
(8, 'CHACINADOS', 2),
(9, 'GRANJA', 2),
(10, 'CITRUS', 3),
(11, 'HUERTA', 3),
(12, 'VIVERO CITRUS', 3),
(13, 'VIVERO ORNAMENTAL', 3);

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
(17, 2, '2021-09-29', 250.89, 2, 1),
(18, 2, '2021-09-01', 500.00, 2, 1),
(19, 1, '2021-10-02', 550.89, 2, 1),
(20, 0, '2021-10-05', 300.00, 2, 0),
(21, 1, '2021-10-05', 250.89, 2, 0),
(22, 0, '2021-10-06', 2000.00, 2, 0),
(23, 0, '2021-10-09', 250.89, 2, 0),
(24, 0, '2021-10-09', 627.22, 7, 0),
(25, 0, '2021-10-09', 1350.00, 7, 0),
(26, 0, '2021-10-14', 250.89, 7, 0),
(27, 0, '2021-10-14', 927.22, 7, 0);

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

--
-- Volcado de datos para la tabla `ventas_detalles`
--

INSERT INTO `ventas_detalles` (`id_detalle`, `id_venta`, `art_codigo`, `art_detalle`, `art_cantidad`, `importe`) VALUES
(1, 1, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(2, 1, 2, 'DULCE DE ZAPALLO 800 G', 10.00, 300.00),
(3, 2, 4, 'DULCE DE ZAPALLO 1 KG', 1.00, 330.00),
(4, 2, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(5, 3, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(6, 3, 5, 'MERMELADA NARANJA 1/2 KG', 1.00, 200.00),
(7, 3, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(8, 4, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(9, 5, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(10, 5, 3, 'DULCE DE ZAPALLO 1/2 KG', 1.00, 200.00),
(11, 5, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(12, 5, 3, 'DULCE DE ZAPALLO 1/2 KG', 1.00, 200.00),
(13, 5, 4, 'DULCE DE ZAPALLO 1 KG', 1.00, 330.00),
(14, 6, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(15, 6, 28, 'MANDARINA BIN', 2.00, 2000.00),
(16, 7, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(17, 7, 20, 'SALAME X KG', 1.00, 1200.00),
(18, 7, 41, 'PLANTAS', 10.00, 200.00),
(19, 8, 41, 'PLANTAS', 3.00, 200.00),
(20, 9, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(21, 10, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(22, 10, 10, 'MIEL 1/2 KG', 1.00, 200.00),
(23, 10, 39, 'PLANTINES CITRUS', 3.00, 500.00),
(24, 11, 3, 'DULCE DE ZAPALLO 1/2 KG', 1.00, 200.00),
(25, 11, 10, 'MIEL 1/2 KG', 4.00, 200.00),
(26, 12, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(27, 13, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(28, 14, 3, 'DULCE DE ZAPALLO 1/2 KG', 5.00, 200.00),
(29, 15, 41, 'PLANTAS', 4.00, 200.00),
(30, 16, 15, 'POLLO PARRILLERO X KG', 1.00, 300.00),
(31, 16, 19, 'CHORICITOS X KG', 2.00, 600.00),
(32, 17, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(33, 18, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(34, 18, 3, 'DULCE DE ZAPALLO 1/2 KG', 1.00, 200.00),
(35, 19, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(36, 19, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(37, 20, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00),
(38, 21, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(39, 22, 39, 'PLANTINES CITRUS', 4.00, 500.00),
(40, 23, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(41, 24, 1, 'DULCE DE LECHE 1/2 KG Peña', 0.00, 250.89),
(42, 25, 2, 'DULCE DE ZAPALLO 800 G', 5.00, 300.00),
(43, 26, 1, 'DULCE DE LECHE 1/2 KG Peña', 1.00, 250.89),
(44, 27, 1, 'DULCE DE LECHE 1/2 KG Peña', 2.50, 250.89),
(45, 27, 2, 'DULCE DE ZAPALLO 800 G', 1.00, 300.00);

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
-- Estructura Stand-in para la vista `vista_proveedorctacte`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_proveedorctacte` (
`id_ctacte` int(11)
,`id_proveedor` int(11)
,`pe_apellido` varchar(50)
,`pe_nombre` varchar(50)
,`pe_telefono` varchar(15)
,`debe` double(19,2)
,`haber` double(19,2)
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
-- Estructura para la vista `vista_clientectacte`
--
DROP TABLE IF EXISTS `vista_clientectacte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_clientectacte`  AS SELECT `cta`.`id_cliente` AS `id_cliente`, `per`.`pe_apellido` AS `pe_apellido`, `per`.`pe_nombre` AS `pe_nombre`, `per`.`pe_telefono` AS `pe_telefono`, sum(if(`cta`.`ctacteDH` = 'D',`cta`.`ctacte_importe`,0)) AS `Debe`, sum(if(`cta`.`ctacteDH` = 'H',`cta`.`ctacte_importe`,0)) AS `Haber` FROM (`clientes_ctacte` `cta` join `personas` `per` on(`cta`.`id_cliente` = `per`.`id_persona`)) GROUP BY `cta`.`id_cliente` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_proveedorctacte`
--
DROP TABLE IF EXISTS `vista_proveedorctacte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_proveedorctacte`  AS SELECT `pro`.`id_ctacte` AS `id_ctacte`, `pro`.`id_proveedor` AS `id_proveedor`, `p`.`pe_apellido` AS `pe_apellido`, `p`.`pe_nombre` AS `pe_nombre`, `p`.`pe_telefono` AS `pe_telefono`, sum(if(`pro`.`ctacteDH` = 'D',`pro`.`ctacte_importe`,0)) AS `debe`, sum(if(`pro`.`ctacteDH` = 'H',`pro`.`ctacte_importe`,0)) AS `haber` FROM (`proveedores_ctacte` `pro` join `proveedores` `p` on(`pro`.`id_proveedor` = `p`.`id_persona`)) GROUP BY `pro`.`id_proveedor` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_ventasdetalle`
--
DROP TABLE IF EXISTS `vista_ventasdetalle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_ventasdetalle`  AS SELECT `de`.`id_venta` AS `id_venta`, `de`.`art_codigo` AS `art_codigo`, `de`.`art_detalle` AS `art_detalle`, `de`.`art_cantidad` AS `art_cantidad`, `de`.`importe` AS `importe`, `de`.`art_cantidad`* `de`.`importe` AS `subtotal`, `ve`.`vta_fecha` AS `vta_fecha`, `art`.`art_rubro` AS `art_rubro`, `art`.`art_subrubro` AS `art_subrubro` FROM ((`ventas_detalles` `de` left join `articulos` `art` on(`de`.`art_codigo` = `art`.`id_articulo`)) left join `ventas` `ve` on(`de`.`id_venta` = `ve`.`id_venta`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_ventasxrubros`
--
DROP TABLE IF EXISTS `vista_ventasxrubros`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_ventasxrubros`  AS SELECT `ve`.`art_rubro` AS `art_rubro`, `ve`.`art_subrubro` AS `art_subrubro`, `ve`.`vta_fecha` AS `vta_fecha`, `ru`.`ru_nombre` AS `ru_nombre`, sum(`ve`.`subtotal`) AS `subtotal` FROM (`vista_ventasdetalle` `ve` join `rubros` `ru` on(`ve`.`art_rubro` = `ru`.`id_rubro`)) GROUP BY `ve`.`art_rubro`, `ve`.`vta_fecha`, `ve`.`art_subrubro` ;

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
  MODIFY `id_ctacte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores_ctacte`
--
ALTER TABLE `proveedores_ctacte`
  MODIFY `id_ctacte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `ventas_detalles`
--
ALTER TABLE `ventas_detalles`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
