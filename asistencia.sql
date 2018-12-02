-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2018 a las 21:23:43
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idcursos` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `creditos` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idcursos`, `nombre`, `creditos`) VALUES
(1, 'programación para web XD', '4'),
(2, 'Kevin de maria eugenia', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_has_estudiantes`
--

CREATE TABLE `cursos_has_estudiantes` (
  `cursos_idcursos` int(11) NOT NULL,
  `estudiantes_idestudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos_has_estudiantes`
--

INSERT INTO `cursos_has_estudiantes` (`cursos_idcursos`, `estudiantes_idestudiantes`) VALUES
(1, 2),
(1, 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idestudiantes` int(11) NOT NULL,
  `contrasena` varchar(11) NOT NULL,
  `primerNombre` varchar(45) NOT NULL,
  `segundoNombre` varchar(45) DEFAULT NULL,
  `primerApellido` varchar(45) NOT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idestudiantes`, `contrasena`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `correo`) VALUES
(2, 'admin', 'johan', 'asasda', 'dadsd', 'ddada', 'dada@hzhdd.com'),
(1234, '1234', 'anderson', NULL, 'hernandez', 'pacheco', 'ande42061@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_asistencia`
--

CREATE TABLE `lista_asistencia` (
  `id_lista_asistencia` int(11) NOT NULL,
  `tema` varchar(45) NOT NULL,
  `cursos_idcursos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lista_asistencia`
--

INSERT INTO `lista_asistencia` (`id_lista_asistencia`, `tema`, `cursos_idcursos`, `fecha`, `hora_inicio`, `hora_final`) VALUES
(3, 'fasfasfasf', 1, '2018-12-12', '02:12:00', '14:12:00'),
(4, 'fasfasfasf', 2, '2018-12-12', '02:12:00', '14:12:00'),
(5, 'fffsf', 1, '2013-03-12', '01:23:00', '14:32:00'),
(6, 'sdghshgdgg', 1, '1232-02-04', '00:12:00', '14:12:00'),
(10, 'sasgsaghsaghsgh', 1, '6252-12-05', '12:21:00', '14:21:00'),
(15, 'dsdsdsds', 1, '2012-02-12', '12:21:00', '00:22:00'),
(16, 'hbsghytftrf', 1, '2016-02-14', '02:25:00', '12:21:00'),
(17, 'hshjdgjsgdjhsgj', 1, '2017-12-12', '00:31:00', '12:29:00'),
(18, 'tetywegyugyt', 1, '1452-04-12', '00:12:00', '00:12:00'),
(19, '1bshjdbjsjhdhsgd', 1, '2017-02-14', '13:21:00', '12:41:00'),
(20, 'qwqdqwd', 1, '2018-12-13', '12:21:00', '14:11:00'),
(21, 'qwqdqwd', 1, '2018-12-13', '12:21:00', '14:11:00'),
(22, 'qwqdqwd', 1, '2018-12-13', '12:21:00', '14:11:00'),
(23, '3141414', 1, '2012-11-11', '12:12:00', '00:12:00'),
(24, '3141414', 1, '2012-11-11', '12:12:00', '00:12:00'),
(25, 'dwdwfcfa', 1, '2018-12-22', '00:12:00', '02:12:00'),
(26, 'adadada', 1, '2018-12-29', '00:21:00', '00:12:00'),
(27, '525612656515', 1, '2017-02-13', '00:31:00', '00:14:00'),
(28, 'qwqeadqe1', 1, '2012-11-01', '00:12:00', '02:12:00'),
(29, 'svaghsghag', 1, '2017-05-12', '12:11:00', '12:21:00'),
(30, 'adeeqweq', 1, '1121-02-21', '02:12:00', '00:12:00'),
(31, 'dytfytyt', 1, '2001-12-12', '00:12:00', '20:18:00'),
(33, 'teres', 1, '2016-02-14', '02:12:00', '14:12:00'),
(34, 'teres', 1, '2016-02-14', '02:12:00', '14:12:00'),
(35, 'ytfwetqtyett', 1, '2018-12-28', '11:12:00', '12:22:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_asistencia_estudiantes`
--

CREATE TABLE `lista_asistencia_estudiantes` (
  `estudiantes_idestudiantes` int(11) NOT NULL,
  `lista_asistencia_id_lista_asistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lista_asistencia_estudiantes`
--

INSERT INTO `lista_asistencia_estudiantes` (`estudiantes_idestudiantes`, `lista_asistencia_id_lista_asistencia`) VALUES
(2, 28),
(2, 34),
(2, 35),
(1234, 27),
(1234, 28),
(1234, 34),
(1234, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idmensajes` int(11) NOT NULL,
  `mensaje` varchar(200) DEFAULT NULL,
  `profesores_idprofesores` int(11) NOT NULL,
  `cursos_idcursos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_estudiante`
--

CREATE TABLE `mensaje_estudiante` (
  `idmensaje` int(11) NOT NULL,
  `mensaje` int(11) NOT NULL,
  `estudiantes_idestudiantes` int(11) NOT NULL,
  `cursos_idcursos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idprofesores` int(11) NOT NULL,
  `primerNombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `primerApellido` varchar(45) NOT NULL,
  `segundoNombre` varchar(45) DEFAULT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `contrasena` varchar(25) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `dia_nacimiento` varchar(45) NOT NULL,
  `mes_nacimiento` varchar(45) NOT NULL,
  `anio_nacimiento` varchar(45) NOT NULL,
  `usuarioFB` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idprofesores`, `primerNombre`, `email`, `primerApellido`, `segundoNombre`, `segundoApellido`, `contrasena`, `direccion`, `telefono`, `dia_nacimiento`, `mes_nacimiento`, `anio_nacimiento`, `usuarioFB`) VALUES
(0, 'johan', 'adn@xd.com', 'perez', 'alfonzo', NULL, 'admin', 'cra2 no 77-90', '4754388', '4', '9', '1980', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores_has_cursos`
--

CREATE TABLE `profesores_has_cursos` (
  `profesores_idprofesores` int(11) NOT NULL,
  `cursos_idcursos` int(11) NOT NULL,
  `salon` varchar(45) NOT NULL,
  `hora` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores_has_cursos`
--

INSERT INTO `profesores_has_cursos` (`profesores_idprofesores`, `cursos_idcursos`, `salon`, `hora`) VALUES
(0, 1, 'sierra - 104', '14:00'),
(0, 2, 'sierra - 103', '13:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcursos`);

--
-- Indices de la tabla `cursos_has_estudiantes`
--
ALTER TABLE `cursos_has_estudiantes`
  ADD PRIMARY KEY (`cursos_idcursos`,`estudiantes_idestudiantes`),
  ADD KEY `fk_cursos_has_estudiantes_estudiantes1_idx` (`estudiantes_idestudiantes`),
  ADD KEY `fk_cursos_has_estudiantes_cursos1_idx` (`cursos_idcursos`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idestudiantes`);

--
-- Indices de la tabla `lista_asistencia`
--
ALTER TABLE `lista_asistencia`
  ADD PRIMARY KEY (`id_lista_asistencia`),
  ADD KEY `fk_lista_asistencia_cursos1_idx` (`cursos_idcursos`);

--
-- Indices de la tabla `lista_asistencia_estudiantes`
--
ALTER TABLE `lista_asistencia_estudiantes`
  ADD PRIMARY KEY (`estudiantes_idestudiantes`,`lista_asistencia_id_lista_asistencia`),
  ADD KEY `fk_lista_asistencia_lista_asistencia1_idx` (`lista_asistencia_id_lista_asistencia`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idmensajes`),
  ADD KEY `fk_mensajes_profesores1_idx` (`profesores_idprofesores`),
  ADD KEY `fk_mensajes_cursos1_idx` (`cursos_idcursos`);

--
-- Indices de la tabla `mensaje_estudiante`
--
ALTER TABLE `mensaje_estudiante`
  ADD PRIMARY KEY (`idmensaje`,`mensaje`),
  ADD KEY `fk_mensaje_estudiante_estudiantes1_idx` (`estudiantes_idestudiantes`),
  ADD KEY `fk_mensaje_estudiante_cursos1_idx` (`cursos_idcursos`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idprofesores`);

--
-- Indices de la tabla `profesores_has_cursos`
--
ALTER TABLE `profesores_has_cursos`
  ADD PRIMARY KEY (`profesores_idprofesores`,`cursos_idcursos`),
  ADD KEY `fk_profesores_has_cursos_cursos1_idx` (`cursos_idcursos`),
  ADD KEY `fk_profesores_has_cursos_profesores_idx` (`profesores_idprofesores`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idcursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lista_asistencia`
--
ALTER TABLE `lista_asistencia`
  MODIFY `id_lista_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idmensajes` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos_has_estudiantes`
--
ALTER TABLE `cursos_has_estudiantes`
  ADD CONSTRAINT `fk_cursos_has_estudiantes_cursos1` FOREIGN KEY (`cursos_idcursos`) REFERENCES `cursos` (`idcursos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cursos_has_estudiantes_estudiantes1` FOREIGN KEY (`estudiantes_idestudiantes`) REFERENCES `estudiantes` (`idestudiantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_asistencia`
--
ALTER TABLE `lista_asistencia`
  ADD CONSTRAINT `fk_lista_asistencia_cursos1` FOREIGN KEY (`cursos_idcursos`) REFERENCES `cursos` (`idcursos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lista_asistencia_estudiantes`
--
ALTER TABLE `lista_asistencia_estudiantes`
  ADD CONSTRAINT `fk_lista_asistencia_estudiantes1` FOREIGN KEY (`estudiantes_idestudiantes`) REFERENCES `estudiantes` (`idestudiantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lista_asistencia_lista_asistencia1` FOREIGN KEY (`lista_asistencia_id_lista_asistencia`) REFERENCES `lista_asistencia` (`id_lista_asistencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_mensajes_cursos1` FOREIGN KEY (`cursos_idcursos`) REFERENCES `cursos` (`idcursos`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mensajes_profesores1` FOREIGN KEY (`profesores_idprofesores`) REFERENCES `profesores` (`idprofesores`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensaje_estudiante`
--
ALTER TABLE `mensaje_estudiante`
  ADD CONSTRAINT `fk_mensaje_estudiante_cursos1` FOREIGN KEY (`cursos_idcursos`) REFERENCES `cursos` (`idcursos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mensaje_estudiante_estudiantes1` FOREIGN KEY (`estudiantes_idestudiantes`) REFERENCES `estudiantes` (`idestudiantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesores_has_cursos`
--
ALTER TABLE `profesores_has_cursos`
  ADD CONSTRAINT `fk_profesores_has_cursos_cursos1` FOREIGN KEY (`cursos_idcursos`) REFERENCES `cursos` (`idcursos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesores_has_cursos_profesores` FOREIGN KEY (`profesores_idprofesores`) REFERENCES `profesores` (`idprofesores`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
