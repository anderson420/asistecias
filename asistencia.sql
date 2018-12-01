-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2018 a las 01:46:14
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

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
(1, 'Programación para la web', '4'),
(2, 'Ingeniería de software', '4'),
(3, 'Ingeniería de software II', '3');

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
(1, 2009214040),
(1, 2015214132),
(1, 2016114057),
(1, 2016114126),
(1, 2016214076),
(2, 2014114054),
(2, 2016214041),
(2, 2016214069),
(2, 2016214082),
(3, 2015214132),
(3, 2016114057),
(3, 2016114126),
(3, 2016214076);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idestudiantes` int(11) NOT NULL,
  `primerNombre` varchar(45) NOT NULL,
  `segundoNombre` varchar(45) DEFAULT NULL,
  `primerApellido` varchar(45) NOT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idestudiantes`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `email`) VALUES
(2008114147, 'Manuel', 'Rodrigo', 'Valdez', 'Lozano', 'manuelvaldezrl@miunimagdalena.edu.co'),
(2009214040, 'Daniel', NULL, 'Sabogal', NULL, 'danielsabogals@miunimagdalena.edu.co'),
(2013214048, 'Kevin', 'Jose', 'Esquea', 'Estrada', 'kevinesqueaje@miunimagdalena.edu.co'),
(2013214057, 'Michael', 'Ferneein', 'Garzon', 'Rodriguez', 'michaelgarzonfr@miunimagdalena.edu.co'),
(2013214092, 'Misael', 'Duban', 'Ortiz', 'Palomino', 'misaelortizdp@miunimagdalena.edu.co'),
(2014114054, 'Karul', 'Andres', 'Ramirez', 'Castillo', 'karulramirezac@miunimagdalena.edu.co'),
(2014114102, 'Tania', 'Margarita', 'Goenaga', 'Raigosa', 'taniagoenagamr@miunimagdalena.edu.co'),
(2014114114, 'Joel', 'David', 'Alvarez', 'Ayola', 'joelalvarezda@miunimagdalena.edu.co'),
(2014114132, 'Julian', 'Andres', 'Rueda', 'Pacheco', 'julianruedaap@miunimagdalena.edu.co'),
(2015214050, 'Yoicer', 'Dilan', 'Galvis', 'Amador', 'yoicergalvisda@miunimagdalena.edu.co'),
(2015214080, 'Keiner', 'Rafael', 'Molina', 'Lemus', 'keinermoliarl@miunimagdalena.edu.co'),
(2015214132, 'Hallel', 'Sarid', 'Vargas', 'Picon', 'hallelvargassp@miunimagdalena.edu.co'),
(2016114057, 'Geraldine', 'De Jesus', 'Granados', 'Buendia', 'geraldinegranadosdb@miunimagdalena.edu.co'),
(2016114126, 'Deiler', 'Galdino', 'Santana', 'Buendia', 'deilersantanagb@miunimagdalena.edu.co'),
(2016214037, 'Jose', 'David', 'Cantillo', 'De la Cruz', 'josecantillodd@miunimagdalena.edu.co'),
(2016214041, 'Yamid', 'Jose', 'Rodriguez', 'Rodriguez', 'yamidrodriguezjr@miunimagdalena.edu.co'),
(2016214052, 'Kevin', 'Johan', 'Velasquez', 'Hernandez', 'kevinvelasquezjh@miunimagdalena.edu.co'),
(2016214069, 'Jose', 'Azadi', 'Restrepo', 'Lopez', 'joserestrepoal@miunimagdalena.edu.co'),
(2016214076, 'Christian', 'David', 'Rodriguez', 'Navia', 'christianrodriguezdn@miunimagdalena.edu.co'),
(2016214082, 'Rodrigo', 'Jose', 'Venegas', 'Vides', 'rodrigovenegasjv@miunimagdalena.edu.co');

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
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `dia_nacimiento` varchar(45) NOT NULL,
  `mes_nacimiento` varchar(45) NOT NULL,
  `anio_nacimiento` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idprofesores`, `primerNombre`, `email`, `primerApellido`, `segundoNombre`, `segundoApellido`, `direccion`, `telefono`, `dia_nacimiento`, `mes_nacimiento`, `anio_nacimiento`, `contrasena`) VALUES
(12094, 'Johan', 'johanrobles@hotmail.com', 'Robles', NULL, 'Solano', 'Ciénaga - Magdalena', '3008007054', '30', 'marzo', '1976', '12321333');

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
(12094, 1, 'Modelado y Simulación', '8:00am - 12:00pm'),
(12094, 2, 'Tecnologías de la Información', '8:00am - 12:00pm'),
(12094, 3, 'Modelado y Simulación', '7:00 - 10:00am');

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
  MODIFY `idcursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos_has_estudiantes`
--
ALTER TABLE `cursos_has_estudiantes`
  ADD CONSTRAINT `fk_cursos_has_estudiantes_cursos1` FOREIGN KEY (`cursos_idcursos`) REFERENCES `cursos` (`idcursos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cursos_has_estudiantes_estudiantes1` FOREIGN KEY (`estudiantes_idestudiantes`) REFERENCES `estudiantes` (`idestudiantes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
