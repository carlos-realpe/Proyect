-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2023 a las 22:52:09
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wanimu`
--
CREATE DATABASE IF NOT EXISTS `wanimu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wanimu`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_user_emisor` int(11) NOT NULL,
  `id_user_receptor` int(11) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_chat`, `id_user_emisor`, `id_user_receptor`, `mensaje`, `fecha`) VALUES
(27, 29, 20, 'hola', '2023-06-26 14:25:21'),
(28, 29, 20, 'mira', '2023-06-26 14:25:28'),
(29, 20, 29, 'que paso', '2023-06-26 14:25:35'),
(30, 29, 20, 'esto', '2023-06-26 14:25:41'),
(31, 20, 29, 'que paso', '2023-06-26 14:27:56'),
(32, 29, 20, 'no lose', '2023-06-26 14:28:05'),
(33, 20, 29, '', '2023-06-26 14:29:19'),
(34, 29, 20, '', '2023-06-26 14:29:27'),
(35, 20, 29, 'sa', '2023-06-26 14:29:32'),
(36, 29, 20, 'oe', '2023-06-26 14:29:39'),
(37, 20, 29, '', '2023-06-26 14:29:45'),
(38, 29, 20, 'mira', '2023-06-26 14:37:15'),
(39, 20, 29, 'mira', '2023-06-26 14:42:11'),
(40, 29, 20, 'que cosa', '2023-06-26 14:43:09'),
(41, 20, 29, '?', '2023-06-26 14:43:13'),
(42, 29, 20, 'ahora', '2023-06-26 14:43:36'),
(43, 20, 29, '?', '2023-06-26 14:46:24'),
(44, 20, 29, 'dime', '2023-06-26 14:49:43'),
(45, 29, 20, 'que paso', '2023-06-26 14:51:58'),
(46, 29, 20, 'probando', '2023-06-26 14:52:46'),
(47, 20, 29, 'que pasoi', '2023-06-26 14:52:55'),
(48, 29, 20, 'no lo se', '2023-06-26 14:52:58'),
(49, 20, 29, 'demora mucho', '2023-06-26 14:53:05'),
(50, 29, 20, 'asi veo', '2023-06-26 14:53:08'),
(51, 29, 20, 'ok', '2023-06-26 15:03:16'),
(52, 29, 20, 'tu que crees', '2023-06-26 15:03:24'),
(53, 29, 21, 'oye', '2023-06-26 15:48:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postular`
--

CREATE TABLE `postular` (
  `id_postular` int(50) NOT NULL,
  `id_fk_registro_trabajo` int(50) NOT NULL,
  `id_fk_usuario` int(50) NOT NULL,
  `estado_solicitud` int(11) NOT NULL COMMENT '0= pendiente; 1=Aceptado; 2=Rechazado;\r\n3=Culmino el trabajo',
  `leido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `postular`
--

INSERT INTO `postular` (`id_postular`, `id_fk_registro_trabajo`, `id_fk_usuario`, `estado_solicitud`, `leido`) VALUES
(91, 70, 23, 3, 1),
(93, 70, 22, 0, 1),
(95, 70, 20, 1, 1),
(96, 71, 22, 0, 0),
(97, 70, 28, 0, 0),
(100, 70, 29, 1, 1),
(101, 104, 21, 1, 0),
(102, 104, 20, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion_user`
--

CREATE TABLE `profesion_user` (
  `id_profesion_user` int(50) NOT NULL,
  `img_profesionuser` varchar(100) NOT NULL,
  `name_profesion_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesion_user`
--

INSERT INTO `profesion_user` (`id_profesion_user`, `img_profesionuser`, `name_profesion_user`) VALUES
(1, 'assets\\img\\imgtrabajosfav\\gasfitero.jpg', 'gafitero'),
(2, 'assets\\img\\imgtrabajosfav\\panadero.jpg', 'panadero'),
(3, 'assets\\img\\imgtrabajosfav\\cuidador.jpg', 'cuidador'),
(4, 'assets\\img\\imgtrabajosfav\\albañil.jpg', 'albanil'),
(5, 'assets\\img\\imgtrabajosfav\\mecanico.jpg', 'mecanico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_trabajo`
--

CREATE TABLE `registro_trabajo` (
  `id_registro_trabajo` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `detalle` varchar(800) NOT NULL,
  `cntd_tiempo` int(11) NOT NULL,
  `lbl_tiempo` varchar(20) NOT NULL,
  `precio` int(11) NOT NULL,
  `vacante` int(11) NOT NULL,
  `lugar-trabajo` varchar(100) NOT NULL,
  `labor_trabajo` varchar(150) NOT NULL,
  `fecha` varchar(150) NOT NULL,
  `longitud` double NOT NULL,
  `latitud` double NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `foto_trabajo` varchar(800) NOT NULL,
  `cantidad_postulantes` int(50) NOT NULL,
  `estado_trabajo` int(11) NOT NULL COMMENT '0=habilitado; 1=eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_trabajo`
--

INSERT INTO `registro_trabajo` (`id_registro_trabajo`, `titulo`, `detalle`, `cntd_tiempo`, `lbl_tiempo`, `precio`, `vacante`, `lugar-trabajo`, `labor_trabajo`, `fecha`, `longitud`, `latitud`, `usuario_id`, `foto_trabajo`, `cantidad_postulantes`, `estado_trabajo`) VALUES
(70, 'panader', 'Los panaderos preparan hornean y elaboran los acabados del pan, los pasteles, las tortas y dem&aacute;s productos de pasteler&iacute;a', 0, '', 6, 10, 'guayaquil', '2', '2023-02-14 23:41:21', -79.88991364970704, -2.185744348493078, 21, 'assets/imgTrabajo/21/trabajo70', 4, 0),
(71, 'albanil', 'dsadasd', 0, '', 5, 0, 'guayaquil', '4', '2023-02-15 01:01:35', -79.91325959697267, -2.187802784870544, 21, 'assets/imgTrabajo/21/albanil.jpg', 1, 0),
(72, 'lechero', 'venbsadads', 0, '', 6, 3, 'guayaquil', '3', '2023-02-15 17:19:03', -79.89197358623048, -2.1866020306601937, 20, 'assets/imgTrabajo/20/chilan.png', 2, 1),
(73, 'panadero', 'hace el pan ', 0, '', 5, 2, 'guayaquil', '1', '2023-02-17 17:19:14', -79.89128694072267, -2.1799120967710985, 23, 'assets/imgTrabajo/23/', 0, 0),
(74, 'cuidador de ni&ntilde;o', 'le da caramelos pa que no chillen', 1, '', 5, 1, 'guayaquil', '3', '2023-02-17 17:19:53', -79.90261659160157, -2.199124134375102, 23, 'assets/imgTrabajo/23/', 0, 0),
(75, 'gafitero', 'este es el que arregla la llave del agua', 0, '', 5, 3, 'guayaquil', '1', '2023-02-17 19:20:33', -79.89163026347657, -2.179569022436045, 20, 'assets/imgTrabajo/20/', 0, 1),
(76, 'dasda', 'sadasd \r\nsadas\r\nsdadasdas', 0, '', 5, 1, 'dasd', '2', '2023-02-24 00:11:13', -79.88648042216798, -2.1805982452066086, 22, 'assets/imgTrabajo/22/', 0, 1),
(77, 'piscina', 'adsdads', 0, '', 5, 1, 'guayaquil', '1', '2023-02-24 00:11:55', -79.8930035544922, -2.1785397989618533, 22, 'assets/imgTrabajo/22/', 0, 1),
(78, 'BUG', 'ESTE ES UN BUG DJASDJ', 0, '', 200, 2, 'Guayaquil', '3', '2023-04-21 12:08:52', -79.88957032695313, -2.1967226431587843, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 1),
(79, 'bugdos', 'bug segunda', 1, 'm', 21, 2, 'Guayaquil', '4', '2023-04-21 12:52:10', -79.88648042216798, -2.1891750742194636, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(80, 'bugtres', 'bug tercecro', 0, '', 50, 1, 'Guayaquil', '3', '2023-04-21 12:54:23', -79.89643678203126, -2.1926057920931608, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(81, 'bugtres', 'bug tercecro', 0, '', 50, 1, 'Guayaquil', '3', '2023-04-21 13:00:09', -79.89643678203126, -2.1926057920931608, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 1),
(82, 'bugcuatro', 'bug es el cuarto', 0, '', 6, 1, 'Guayaquil', '2', '2023-04-21 13:03:43', -79.85901460185548, -2.222452704402397, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(83, 'bugquinto', 'el quinto bug', 0, '', 43, 6, 'Guayaquil', '1', '2023-04-21 13:04:46', -79.92939576640626, -2.2083869928217283, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(84, 'bugsexto', 'este es el sexto bug', 0, '', 100, 2, 'Guayaquil', '3', '2023-04-21 13:08:04', -79.89231690898438, -2.2049563112285164, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(85, 'bugseptimo', 'el septimo bug', 0, '', 700, 10, 'Guayaquil', '4', '2023-04-21 13:19:45', -79.90158662333985, -2.20255482940659, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(86, 'bugseptimo', 'el septimo bug', 0, '', 700, 10, 'Guayaquil', '4', '2023-04-21 13:26:23', -79.90158662333985, -2.20255482940659, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(87, 'BUG', 'dsad', 0, '', 5, 1, 'salinas', '3', '2023-04-21 13:27:19', -79.90158662333985, -2.209416195755567, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(88, 'BUG', 'dsad', 0, '', 5, 1, 'salinas', '3', '2023-04-21 13:27:41', -79.90158662333985, -2.209416195755567, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(89, 'bugasdasldn', 'sadasd', 0, '', 6, 10, 'Guayaquil', '2', '2023-04-21 13:30:31', -79.90879640117188, -2.207357789174962, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(90, 'jesl', 'dsadasd me encanta', 0, '', 100, 10, 'Guayaquil', '1', '2023-04-21 13:32:55', -79.8984967185547, -2.2015256217261423, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(91, 'bug final', 'yeahhhhhh', 0, '', 19, 6, 'Guayaquil', '1', '2023-04-21 13:36:23', -79.89678010478517, -2.228627852572152, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(92, 'gfgdfg', 'gfdgdg', 0, '', 6, 1, 'Guayaquil', '2', '2023-04-21 14:11:47', -79.90158662333985, -2.20324096746521, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(93, 'fin', 'dasda', 0, '', 5, 1, 'Guayaquil', '3', '2023-04-21 14:13:01', -79.92218598857423, -2.207357789174962, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(94, 'tu dsad', 'dsadadsdadsad', 0, '', 534, 7, 'salinas', '2', '2023-04-21 14:19:26', -79.91051301494142, -2.2077008571364134, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(95, 'yaaa', 'dasd', 0, '', 5, 5, 'Guayaquil', '2', '2023-04-21 14:20:30', -79.89952668681642, -2.1956934314553167, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(96, 'pueba jajaja', 'sdasdasd', 0, '', 98, 1, 'Guayaquil', '2', '2023-04-26 17:06:40', -79.8988400413086, -2.205985516537504, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(97, 'generar ofter', 'dsadaa', 0, '', 5, 10, 'Guayaquil', '1', '2023-04-26 17:16:00', -79.89643678203126, -2.202897898475409, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(98, 'detalle', 'dasdasd', 0, '', 523, 10, 'Guayaquil', '1', '2023-04-26 17:20:41', -79.90330323710938, -2.2083869928217283, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(99, 'gen', 'dasdasd', 0, '', 120, 4, 'Guayaquil', '1', '2023-04-26 17:22:57', -79.91016969218751, -2.223481897559618, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(100, 'false', 'adasdads', 0, '', 5, 1, 'Guayaquil', '3', '2023-04-26 17:23:33', -79.91669282451173, -2.211474599483113, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(101, 'cero', 'dasda', 0, '', 512, 2, 'Guayaquil', '3', '2023-04-26 17:26:07', -79.90501985087892, -2.208730060545567, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(102, 'Hellow', 'dadsads', 0, '', 21, 3, 'Guayaquil', '3', '2023-04-26 19:34:10', -79.90364655986329, -2.200153343713369, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(103, 'bad bunny', 'jes', 0, '', 233, 3, 'Guayaquil', '2', '2023-04-26 19:49:02', -79.91909608378907, -2.193291934724502, 21, 'assets/img/perfilBase/trabajoR.jpg', 0, 0),
(104, 'Vendo papas', 'Gratis', 0, '', 5, 1, 'Ga', '2', '2023-05-30 22:30:11', -79.90124330058595, -2.1963795726697333, 29, 'assets/img/perfilBase/trabajoR.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id-usuario` int(11) NOT NULL,
  `foto_perfil` varchar(200) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `id_fk_prfesionuser` varchar(100) NOT NULL,
  `curriculum` varchar(800) NOT NULL,
  `authtk` varchar(255) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id-usuario`, `foto_perfil`, `nombre`, `Apellido`, `telefono`, `cedula`, `email`, `password`, `lugar`, `id_fk_prfesionuser`, `curriculum`, `authtk`, `Estado`) VALUES
(20, 'assets/imgPerfil/20/perfil20', 'eddy', 'ramirez', 983291454, '0123456789', 'carlos_naruto_kun@hotmail.com', '$2y$10$4OsNS5nB84VpYXEDTRtRx.PLnN8urWpzOOY7Edq8qJ4ifAPwzTkYy', 'guayaquil', '1', 'assets/cvPDF/20/use20.pdf', '', 0),
(21, 'assets/imgPerfil/21/perfil21', 'carlos andre', 'realpe mele', 959624263, '0123456789', 'eddie.ramirezb@ug.edu.ec', '$2y$10$pF.pIkCBl918JTRW3DZsLuTbuLzoDud6mURRWxP4U7CbFFR5xqYhS', 'guayaquil', '2', '', '8fe046150422d405bba1c03e39682db540157b9083319b7868672f0725a20a34', 0),
(22, 'assets/img/perfilBase/perfilBase.jpg', 'pruebados', 'sdasda', 959624263, '0999999999', 'carlosrealpemele@gmail.com', 'eddy123', 'Guayaquil', '3', 'assets/cvPDF/22/use22.pdf', 'dfcc9a2af57fbd248417dc5b69aa3a3d41d4ddc9ae3c4089aa3bcabe811f62fd', 0),
(23, 'assets/imgPerfil/23/perfil23', 'mario', 'santos', 959624263, '0123456789', 'mario@hotmail.com', '$2y$10$gN//D1Mq9/dweNe9lHX1u.RQGtIGgtNZwVBRYfoDdyEGjBUlIT3FS', 'Guayaquil', '2', 'assets/cvPDF/23/use23.pdf', '', 0),
(24, 'assets/img/perfilBase/perfilBase.jpg', 'Jesly ', 'Gabriela Gando', 1234567891, '0152614630', 'jesly@hotmail.com', '$2y$10$/V', 'galapagos', '', '', '', 0),
(27, 'assets/img/perfilBase/perfilBase.jpg', 'pb', 'uno', 2147483647, '9999999999', 'pb@hotmail.com', '$2y$10$NBR/5Jyc1nOnW0wNkjZwAefAzLhJLMaHOBSmlJs9fc4jehmF/whta', 'guayaquil', '3', '', '', 0),
(28, 'assets/img/perfilBase/perfilBase.jpg', 'carlos', 'andres', 1234567891, '0910358407', 'eddy123@hotmail.com', '$2y$10$5InfrOKgmNKiluTRb5luae/B5RzCOjCG1HgAavXQoO6FHKYQ/Q4AC', 'Daule', '', '', '', 0),
(29, 'assets/img/perfilBase/perfilBase.jpg', 'Carlos Andres', 'Carlos Andres', 1234567891, '0910358407', 'eddy@hotmail.com', '$2y$10$r5Syf96yX4aJ4Gysf.Vd7ut95ULCpFqVspAvefJ8DBfPkpctlz7yu', 'Daule', '1', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id_rating` int(11) NOT NULL,
  `UsuarioCalifica` int(11) NOT NULL,
  `UserCalificado` int(11) NOT NULL,
  `CalificacionPostulante` int(11) NOT NULL,
  `id_reg_trabajo` int(11) NOT NULL,
  `estado_valoracion` int(11) NOT NULL COMMENT '0=Se agrego, 1=cancelado, 2=termino el trabajo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id_rating`, `UsuarioCalifica`, `UserCalificado`, `CalificacionPostulante`, `id_reg_trabajo`, `estado_valoracion`) VALUES
(17, 21, 20, 3, 70, 0),
(18, 20, 21, 0, 72, 1),
(19, 21, 22, 2, 70, 2),
(20, 21, 22, 2, 71, 2),
(21, 21, 23, 4, 70, 2),
(22, 29, 21, 0, 104, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indices de la tabla `postular`
--
ALTER TABLE `postular`
  ADD PRIMARY KEY (`id_postular`),
  ADD KEY `id_fk_registro_trabajo` (`id_fk_registro_trabajo`),
  ADD KEY `id_fk_usuario` (`id_fk_usuario`);

--
-- Indices de la tabla `profesion_user`
--
ALTER TABLE `profesion_user`
  ADD PRIMARY KEY (`id_profesion_user`);

--
-- Indices de la tabla `registro_trabajo`
--
ALTER TABLE `registro_trabajo`
  ADD PRIMARY KEY (`id_registro_trabajo`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id-usuario`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id_rating`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `postular`
--
ALTER TABLE `postular`
  MODIFY `id_postular` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `profesion_user`
--
ALTER TABLE `profesion_user`
  MODIFY `id_profesion_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_trabajo`
--
ALTER TABLE `registro_trabajo`
  MODIFY `id_registro_trabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id-usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `postular`
--
ALTER TABLE `postular`
  ADD CONSTRAINT `postular_ibfk_1` FOREIGN KEY (`id_fk_usuario`) REFERENCES `usuario` (`id-usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `postular_ibfk_2` FOREIGN KEY (`id_fk_registro_trabajo`) REFERENCES `registro_trabajo` (`id_registro_trabajo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_trabajo`
--
ALTER TABLE `registro_trabajo`
  ADD CONSTRAINT `registro_trabajo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id-usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
