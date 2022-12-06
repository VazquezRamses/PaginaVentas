-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-12-2022 a las 20:16:03
-- Versión del servidor: 8.0.23
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cliente01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `ID` int NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `eliminado` int NOT NULL DEFAULT '0',
  `rol` int NOT NULL DEFAULT '0',
  `archivo_n` varchar(255) DEFAULT NULL,
  `archivo` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`ID`, `nombre`, `apellidos`, `correo`, `pass`, `status`, `eliminado`, `rol`, `archivo_n`, `archivo`) VALUES
(1, 'Ramses', 'Vazquez', 'ramses@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, 1, 'c57e3fcf88c7faf51c947dd43ed34606.jpg', '43517867-trabajador-perro-manitas-con-el-casco-y-el-pulgar-arriba-bien-y-estoy-de-acuerdo-listo-para-reparar-.jpg'),
(2, 'Vanesa', 'Cervantes', 'Vane@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 1, 0, 1, NULL, NULL),
(3, 'Haled', 'Sanchez', 'haled@gmail.com', '567', 1, 0, 2, NULL, NULL),
(13, 'Erik', 'Galindo', 'ErikGal@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, 1, '', ''),
(14, 'Mara ', 'Galindo', 'MaraGal@gmail.com ', '220466675e31b9d20c051d5e57974150', 1, 0, 1, '', ''),
(15, 'Lucero', 'Morales', 'Lucero@gmail.com', 'd10906c3dac1172d4f60bd41f224ae75', 1, 0, 2, '', ''),
(18, 'Luisa', 'Vazquez', 'TheLui@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 1, '', ''),
(19, 'Emmanuel', 'Galindo', 'Emmanuel@gmail.com', '7ac66c0f148de9519b8bd264312c4d64', 1, 0, 1, '979ee3e3c703661d2078b42d5dc6ea14.jpg', 'anuel-aa89294.jpg'),
(20, 'Luigi', 'Luigi', 'LaLuigi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 1, '38b310859c7f925d5bff88a75c067c16.jpeg', 'LuisaLimpia.jpeg'),
(21, 'Chloe', 'Prueba ', 'Prueba@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 1, 'd51d182dc8ca89d3c8a49b2d3a3449a8.jpeg', 'LuisaAcostada.jpeg'),
(22, 'dsadas', 'dasdsa', 'dasdasdas', 'fe9b79ec2946470aaa1a57be86172022', 1, 0, 1, '9c8612970a1e77ab0030859de3424e56.jpg', 'Principito.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `ID` int NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `archivo` varchar(64) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `eliminado` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`ID`, `nombre`, `archivo`, `status`, `eliminado`) VALUES
(2, '600x200.jpg', 'a003308c501ac7853fa5aa598f69179e.jpg', 1, 0),
(14, '600x200.jpg', 'a003308c501ac7853fa5aa598f69179e.jpg', 1, 1),
(15, '600x200.jpg', 'a003308c501ac7853fa5aa598f69179e.jpg', 1, 1),
(16, 'perro.jpg', 'e31ef791230b28686cf9e0806aa0e82e.jpg', 1, 0),
(17, 'perrito2.jpg', 'ea2970061b45d5143dfe173c0afffa27.jpg', 1, 0),
(18, 'MadeInHeaven.jpg', 'dc5ba6433ad30301b8f83e0f1f0ddb78.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID` int NOT NULL,
  `Fecha` date NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID`, `Fecha`, `usuario`, `status`) VALUES
(1, '2022-05-14', 'Ramses', 1),
(2, '2022-01-23', 'Luigi', 1),
(7, '2022-05-28', ' ', 1),
(8, '2022-05-28', ' ', 1),
(9, '2022-05-28', ' ', 1),
(10, '2022-05-28', ' ', 1),
(11, '2022-05-29', ' ', 1),
(12, '2022-05-29', ' ', 1),
(13, '2022-05-30', ' ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `ID` int NOT NULL,
  `id_pedido` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`ID`, `id_pedido`, `id_producto`, `cantidad`, `precio`) VALUES
(1, 1, 2, 6, 100),
(2, 1, 5, 4, 1200),
(3, 2, 5, 4, 1200),
(12, 10, 2, 6, 100),
(15, 10, 5, 4, 1200),
(16, 10, 3, 1, 1),
(17, 11, 5, 4, 1200),
(18, 11, 6, 2, 130),
(19, 12, 6, 7, 130),
(21, 12, 2, 2, 100),
(22, 12, 5, 4, 1200),
(23, 13, 5, 3, 1200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `codigo` varchar(32) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` double NOT NULL,
  `stock` int NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `eliminado` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `nombre`, `codigo`, `descripcion`, `costo`, `stock`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(2, 'El Principito', '12sdas', '  El principito es una novela corta y la obra más famosa del escritor y aviador francés Antoine de Saint-Exupéry.', 100, 0, '9c8612970a1e77ab0030859de3424e56.jpg', 'Principito.jpg', 1, 0),
(3, 'Prueba', 'Prueba', '    Esto es una prueba\r\nEsto es una prueba\r\nEsto es una prueba\r\nEsto es una pruebaEsto es una prueba da das d as d as d sa d sa d as fsdf  sad  asd  as f asgd gd ds  fasd asf saf sdgfasagsfs a sa f sdf fds', 1, 0, 'ec086ee00c1f5080c02893679233b54b.png', 'BolaAmariila.png', 1, 0),
(5, 'Yo, el gato', 't6544', '   Es un libro sobre un gato y su percepcion sobre la vida.', 1200, 7, '2432a9d68440a4049b7523881977bc01.jpg', 'yo_el_gato.jpg', 1, 0),
(6, 'De la tierra a la luna', '4322', 'De la Tierra a la Luna es una novela «científica» y «satírica» del escritor Julio Verne, publicada en el \"Journal des débats politiques et littéraires\" desde el 14 de septiembre hasta el 14 de octubre de 1865, y como un solo volumen el 25 de octubre de ese mismo año.', 130, 4, '6c5468d45ce12f10b9b6a9d3f676ddcb.jpg', 'tierraluna.jpg', 1, 0),
(7, 'Ready Player One', '123441', 'Ready Player One, el impresionante debut de Ernets Cline, está revolucionando la literatura de género en Estados Unidos. Antes incluso de su publicación, convenció a la Warner Bros, de convertirlo en su próxima gran producción, a agentes y editores del medio mundo deque compraran sus derechos, y cautivó a autores de la talla de Charlaine Harris y Patrick Rothfuss, a quien, según ha confesado, le pareció un libro que fue escrito por él mismo. Desdeentonces, esta novela ha seducido a la crítica y ha alcanzado las listas de más vendidos del New York Time. Durante años, millones de humanos han intentado dar con ellas, sin éxito. De repente, Wade logra resolver el primer rompecabezas del premio, y a partir de ese momento debe competir contra miles de jugadores para conseguir el trofeo. La única forma de sobrevivir es ganar.', 320, 9, '272304731a8fced45c2745f8b3e65f9e.jpg', 'ready.jpg', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
