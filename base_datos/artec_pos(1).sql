-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2018 a las 00:15:18
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `artec_pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'EQUIPO ELECTROMECANICO', '2018-07-14 11:20:23'),
(2, 'TALADROS', '2018-07-14 11:20:23'),
(3, 'ANDAMIOS', '2018-07-14 11:21:02'),
(4, 'GENERADOR DE ENERGIA', '2018-07-14 11:21:02'),
(5, 'EQUIPO DE CONTRUCCION', '2018-07-14 11:21:14'),
(6, 'INSUMOS', '2018-07-14 11:50:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `documento` text COLLATE utf8_spanish2_ci NOT NULL,
  `email` text COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `fecha`) VALUES
(2, 'marcelita', '1872629202', 'marcelita@gmail.com', '(22) 2222-2222', 'santa clara 3325', '1929-02-02', 0, '2018-07-16 21:14:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(6, 1, '106', 'Disco Punta Diamante ', 'vistas/img/productos/106/276.jpg', 3, 1000, 1400, 0, '2018-07-13 11:27:13'),
(7, 1, '107', 'Extractor de Aire ', 'vistas/img/productos/107/893.jpg', 20, 1540, 2156, 0, '2018-07-13 11:27:13'),
(10, 1, '110', 'Hidrolavadora Gasolina', 'vistas/img/productos/110/187.png', 900, 2210, 3094, 0, '2018-07-13 11:27:13'),
(11, 1, '111', 'Motobomba a Gasolina', 'vistas/img/productos/111/639.jpg', 9000, 2860, 4004, 0, '2018-07-13 11:27:13'),
(12, 1, '112', 'Motobomba El', 'vistas/img/productos/112/222.jpg', 20, 2400, 3360, 0, '2018-07-13 11:27:13'),
(13, 1, '113', 'Sierra Circular ', 'vistas/img/productos/113/658.jpg', 20, 1100, 1540, 0, '2018-07-13 11:27:13'),
(14, 1, '114', 'Disco de tugsteno para Sierra circular', 'vistas/img/productos/114/967.png', 20, 4500, 6300, 0, '2018-07-13 11:27:13'),
(15, 1, '115', 'Soldador Electrico ', 'vistas/img/productos/115/589.jpg', 20, 1980, 2772, 0, '2018-07-13 11:27:13'),
(16, 1, '116', 'Careta para Soldador', 'vistas/img/productos/116/442.jpg', 20, 4200, 5880, 0, '2018-07-13 11:27:13'),
(17, 1, '117', 'Torre de iluminacion ', 'vistas/img/productos/117/420.png', 20, 1800, 2520, 0, '2018-07-13 11:27:13'),
(18, 2, '201', 'Martillo Demoledor de Piso 110V', 'vistas/img/productos/default/anonymous.png', 20, 5600, 7840, 0, '2018-07-13 11:27:13'),
(19, 2, '202', 'Muela o cincel martillo demoledor piso', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2018-07-13 11:27:13'),
(20, 2, '203', 'Taladro Demoledor de muro 110V', 'vistas/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2018-07-13 11:27:13'),
(21, 2, '204', 'Muela o cincel martillo demoledor muro', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2018-07-13 11:27:13'),
(22, 2, '205', 'Taladro Percutor de 1/2 Madera y Metal', 'vistas/img/productos/default/anonymous.png', 20, 8000, 11200, 0, '2018-07-13 11:27:13'),
(23, 2, '206', 'Taladro Percutor SDS Plus 110V', 'vistas/img/productos/default/anonymous.png', 20, 3900, 5460, 0, '2018-07-13 11:27:13'),
(24, 2, '207', 'Taladro Percutor SDS Max 110V (Mineria)', 'vistas/img/productos/default/anonymous.png', 20, 4600, 6440, 0, '2018-07-13 11:27:13'),
(25, 3, '301', 'Andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1440, 2016, 0, '2018-07-13 11:27:13'),
(26, 3, '302', 'Distanciador andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1600, 2240, 0, '2018-07-13 11:27:13'),
(27, 3, '303', 'Marco andamio modular ', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2018-07-13 11:27:13'),
(28, 3, '304', 'Marco andamio tijera', 'vistas/img/productos/default/anonymous.png', 20, 100, 140, 0, '2018-07-13 11:27:13'),
(29, 3, '305', 'Tijera para andamio', 'vistas/img/productos/default/anonymous.png', 20, 162, 226, 0, '2018-07-13 11:27:13'),
(30, 3, '306', 'Escalera interna para andamio', 'vistas/img/productos/default/anonymous.png', 20, 270, 378, 0, '2018-07-13 11:27:13'),
(31, 3, '307', 'Pasamanos de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 75, 105, 0, '2018-07-13 11:27:13'),
(32, 3, '308', 'Rueda giratoria para andamio', 'vistas/img/productos/default/anonymous.png', 20, 168, 235, 0, '2018-07-13 11:27:13'),
(33, 3, '309', 'Arnes de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 1750, 2450, 0, '2018-07-13 11:27:13'),
(34, 3, '310', 'Eslinga para arnes', 'vistas/img/productos/default/anonymous.png', 20, 175, 245, 0, '2018-07-13 11:27:13'),
(35, 3, '311', 'Plataforma Met', 'vistas/img/productos/default/anonymous.png', 20, 420, 588, 0, '2018-07-13 11:27:13'),
(36, 4, '401', 'Planta Electrica Diesel 6 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3500, 4900, 0, '2018-07-13 11:27:13'),
(37, 4, '402', 'Planta Electrica Diesel 10 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3550, 4970, 0, '2018-07-13 11:27:13'),
(38, 4, '403', 'Planta Electrica Diesel 20 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3600, 5040, 0, '2018-07-13 11:27:13'),
(39, 4, '404', 'Planta Electrica Diesel 30 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3650, 5110, 0, '2018-07-13 11:27:13'),
(40, 4, '405', 'Planta Electrica Diesel 60 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3700, 5180, 0, '2018-07-13 11:27:13'),
(41, 4, '406', 'Planta Electrica Diesel 75 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3750, 5250, 0, '2018-07-13 11:27:13'),
(42, 4, '407', 'Planta Electrica Diesel 100 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3800, 5320, 0, '2018-07-13 11:27:13'),
(43, 4, '408', 'Planta Electrica Diesel 120 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2018-07-13 11:27:13'),
(44, 5, '501', 'Escalera de Tijera Aluminio ', 'vistas/img/productos/default/anonymous.png', 20, 350, 490, 0, '2018-07-13 11:27:13'),
(45, 5, '502', 'Extension Electrica ', 'vistas/img/productos/default/anonymous.png', 20, 370, 518, 0, '2018-07-13 11:27:13'),
(46, 5, '503', 'Gato tensor', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2018-07-13 11:27:13'),
(47, 5, '504', 'Lamina Cubre Brecha ', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2018-07-13 11:27:13'),
(48, 5, '505', 'Llave de Tubo', 'vistas/img/productos/default/anonymous.png', 20, 480, 672, 0, '2018-07-13 11:27:13'),
(49, 5, '506', 'Manila por Metro', 'vistas/img/productos/default/anonymous.png', 20, 600, 840, 0, '2018-07-13 11:27:13'),
(50, 5, '507', 'Polea 2 canales', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2018-07-13 11:27:13'),
(51, 5, '508', 'Tensor', 'vistas/img/productos/default/anonymous.png', 20, 100, 140, 0, '2018-07-13 11:27:13'),
(52, 5, '509', 'Bascula ', 'vistas/img/productos/default/anonymous.png', 20, 130, 182, 0, '2018-07-13 11:27:13'),
(53, 5, '510', 'Bomba Hidrostatica', 'vistas/img/productos/default/anonymous.png', 20, 770, 1078, 0, '2018-07-13 11:27:13'),
(54, 5, '511', 'Chapeta', 'vistas/img/productos/default/anonymous.png', 20, 660, 924, 0, '2018-07-13 11:27:13'),
(55, 5, '512', 'Cilindro muestra de concreto', 'vistas/img/productos/default/anonymous.png', 20, 400, 560, 0, '2018-07-13 11:27:13'),
(56, 5, '513', 'Cizalla de Palanca', 'vistas/img/productos/default/anonymous.png', 20, 450, 630, 0, '2018-07-13 11:27:13'),
(57, 5, '514', 'Cizalla de Tijera', 'vistas/img/productos/default/anonymous.png', 20, 580, 812, 0, '2018-07-13 11:27:13'),
(58, 5, '515', 'Coche llanta neumatica', 'vistas/img/productos/default/anonymous.png', 20, 420, 588, 0, '2018-07-13 11:27:13'),
(59, 5, '516', 'Cono slump', 'vistas/img/productos/default/anonymous.png', 20, 140, 196, 0, '2018-07-13 11:27:13'),
(60, 5, '517', 'Cortadora de Baldosin', 'vistas/img/productos/default/anonymous.png', 20, 930, 1302, 0, '2018-07-13 11:27:13'),
(61, 6, '601', 'ALGO', 'vistas/img/usuarios/default/anonymous.png', 0, 0, 0, 0, '2018-07-14 11:51:42'),
(62, 6, '602', 'pipa', 'vistas/img/productos/default/anonymous.png', 20, 1000, 1500, 0, '2018-07-14 21:33:46'),
(63, 4, '409', 'TURBO', 'vistas/img/productos/default/anonymous.png', 200, 1000, 1500, 0, '2018-07-14 21:42:36'),
(64, 5, '518', 'kv 1500', 'vistas/img/productos/default/anonymous.png', 3, 10000, 14000, 0, '2018-07-14 21:48:30'),
(65, 4, '410', 'MARTILLO CHICO', 'vistas/img/productos/410/679.jpg', 20, 30000, 42000, 0, '2018-07-15 17:38:12'),
(66, 2, '208', 'TURBO 2', 'vistas/img/productos/208/275.jpg', 2, 1000, 1400, 0, '2018-07-15 17:39:18'),
(67, 1, '118', 'sdds', 'vistas/img/productos/118/545.jpg', 322, 1000, 1400, 0, '2018-07-15 18:00:01'),
(68, 2, '209', 'qqqw', 'vistas/img/productos/default/anonymous.png', 22221, 120, 168, 0, '2018-07-15 19:11:19'),
(69, 3, '312', 'TURBO', 'vistas/img/productos/312/677.jpg', 10, 1000, 1400, 0, '2018-07-15 19:27:41'),
(70, 3, '313', 'ss', 'vistas/img/productos/default/anonymous.png', 123, 120, 168, 0, '2018-07-15 20:39:47'),
(71, 3, '314', 'www', 'vistas/img/productos/default/anonymous.png', 123, 120, 168, 0, '2018-07-15 21:02:10'),
(72, 4, '411', 'sssse', 'vistas/img/productos/default/anonymous.png', 123, 102, 143, 0, '2018-07-15 21:07:56'),
(73, 2, '210', 'Taladrillo', 'vistas/img/productos/210/424.jpg', 20, 10000, 14000, 0, '2018-07-16 18:41:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish2_ci NOT NULL,
  `password` text COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish2_ci NOT NULL,
  `foto` text COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL,
  `auxiliar` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`, `auxiliar`) VALUES
(1, 'joshe', 'joshe', '$2a$07$asxx54ahjppf45sd87a5au8KlYAuW6VEAS32h3RUPn8K1EZpGgva.', 'Administrador', 'vistas/img/usuarios/joshe/564.jpg', 1, '2018-07-18 13:59:23', '2018-06-30 01:11:22', ''),
(6, 'david', 'david', 'david', 'Vendedor', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(7, 'wolfman', 'wolfman', 'wolfman', 'Especial', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish2_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`id_cliente`,`id_vendedor`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_vendedor` (`id_vendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_vendedor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
