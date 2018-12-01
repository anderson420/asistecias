CREATE DATABASE  IF NOT EXISTS `asistencia` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `asistencia`;
-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: asistencia
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `idcursos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `creditos` varchar(45) NOT NULL,
  PRIMARY KEY (`idcursos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Programación para la web','4'),(2,'Ingeniería de software','4'),(3,'Ingeniería de software II','3');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos_has_estudiantes`
--

DROP TABLE IF EXISTS `cursos_has_estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos_has_estudiantes` (
  `cursos_idcursos` int(11) NOT NULL,
  `estudiantes_idestudiantes` int(11) NOT NULL,
  PRIMARY KEY (`cursos_idcursos`,`estudiantes_idestudiantes`),
  KEY `fk_cursos_has_estudiantes_estudiantes1_idx` (`estudiantes_idestudiantes`),
  KEY `fk_cursos_has_estudiantes_cursos1_idx` (`cursos_idcursos`),
  CONSTRAINT `fk_cursos_has_estudiantes_cursos1` FOREIGN KEY (`cursos_idcursos`) REFERENCES `cursos` (`idcursos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cursos_has_estudiantes_estudiantes1` FOREIGN KEY (`estudiantes_idestudiantes`) REFERENCES `estudiantes` (`idestudiantes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos_has_estudiantes`
--

LOCK TABLES `cursos_has_estudiantes` WRITE;
/*!40000 ALTER TABLE `cursos_has_estudiantes` DISABLE KEYS */;
INSERT INTO `cursos_has_estudiantes` VALUES (1,2009214040),(1,2015214132),(1,2016114057),(1,2016114126),(1,2016214076),(2,2014114054),(2,2016214041),(2,2016214069),(2,2016214082),(3,2015214132),(3,2016114057),(3,2016114126),(3,2016214076);
/*!40000 ALTER TABLE `cursos_has_estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiantes` (
  `idestudiantes` int(11) NOT NULL,
  `primerNombre` varchar(45) NOT NULL,
  `segundoNombre` varchar(45) DEFAULT NULL,
  `primerApellido` varchar(45) NOT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`idestudiantes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiantes`
--

LOCK TABLES `estudiantes` WRITE;
/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` VALUES (2008114147,'Manuel','Rodrigo','Valdez','Lozano','manuelvaldezrl@miunimagdalena.edu.co'),(2009214040,'Daniel',NULL,'Sabogal',NULL,'danielsabogals@miunimagdalena.edu.co'),(2013214048,'Kevin','Jose','Esquea','Estrada','kevinesqueaje@miunimagdalena.edu.co'),(2013214057,'Michael','Ferneein','Garzon','Rodriguez','michaelgarzonfr@miunimagdalena.edu.co'),(2013214092,'Misael','Duban','Ortiz','Palomino','misaelortizdp@miunimagdalena.edu.co'),(2014114054,'Karul','Andres','Ramirez','Castillo','karulramirezac@miunimagdalena.edu.co'),(2014114102,'Tania','Margarita','Goenaga','Raigosa','taniagoenagamr@miunimagdalena.edu.co'),(2014114114,'Joel','David','Alvarez','Ayola','joelalvarezda@miunimagdalena.edu.co'),(2014114132,'Julian','Andres','Rueda','Pacheco','julianruedaap@miunimagdalena.edu.co'),(2015214050,'Yoicer','Dilan','Galvis','Amador','yoicergalvisda@miunimagdalena.edu.co'),(2015214080,'Keiner','Rafael','Molina','Lemus','keinermoliarl@miunimagdalena.edu.co'),(2015214132,'Hallel','Sarid','Vargas','Picon','hallelvargassp@miunimagdalena.edu.co'),(2016114057,'Geraldine','De Jesus','Granados','Buendia','geraldinegranadosdb@miunimagdalena.edu.co'),(2016114126,'Deiler','Galdino','Santana','Buendia','deilersantanagb@miunimagdalena.edu.co'),(2016214037,'Jose','David','Cantillo','De la Cruz','josecantillodd@miunimagdalena.edu.co'),(2016214041,'Yamid','Jose','Rodriguez','Rodriguez','yamidrodriguezjr@miunimagdalena.edu.co'),(2016214052,'Kevin','Johan','Velasquez','Hernandez','kevinvelasquezjh@miunimagdalena.edu.co'),(2016214069,'Jose','Azadi','Restrepo','Lopez','joserestrepoal@miunimagdalena.edu.co'),(2016214076,'Christian','David','Rodriguez','Navia','christianrodriguezdn@miunimagdalena.edu.co'),(2016214082,'Rodrigo','Jose','Venegas','Vides','rodrigovenegasjv@miunimagdalena.edu.co');
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesores`
--

DROP TABLE IF EXISTS `profesores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `contrasena` varchar(45) NOT NULL,
  PRIMARY KEY (`idprofesores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores`
--

LOCK TABLES `profesores` WRITE;
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
INSERT INTO `profesores` VALUES (12094,'Johan','johanrobles@hotmail.com','Robles',NULL,'Solano','Ciénaga - Magdalena','3008007054','30','marzo','1976','12321333');
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesores_has_cursos`
--

DROP TABLE IF EXISTS `profesores_has_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesores_has_cursos` (
  `profesores_idprofesores` int(11) NOT NULL,
  `cursos_idcursos` int(11) NOT NULL,
  `salon` varchar(45) NOT NULL,
  `hora` varchar(45) NOT NULL,
  PRIMARY KEY (`profesores_idprofesores`,`cursos_idcursos`),
  KEY `fk_profesores_has_cursos_cursos1_idx` (`cursos_idcursos`),
  KEY `fk_profesores_has_cursos_profesores_idx` (`profesores_idprofesores`),
  CONSTRAINT `fk_profesores_has_cursos_cursos1` FOREIGN KEY (`cursos_idcursos`) REFERENCES `cursos` (`idcursos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesores_has_cursos_profesores` FOREIGN KEY (`profesores_idprofesores`) REFERENCES `profesores` (`idprofesores`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesores_has_cursos`
--

LOCK TABLES `profesores_has_cursos` WRITE;
/*!40000 ALTER TABLE `profesores_has_cursos` DISABLE KEYS */;
INSERT INTO `profesores_has_cursos` VALUES (12094,1,'Modelado y Simulación','8:00am - 12:00pm'),(12094,2,'Tecnologías de la Información','8:00am - 12:00pm'),(12094,3,'Modelado y Simulación','7:00 - 10:00am');
/*!40000 ALTER TABLE `profesores_has_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'asistencia'
--

--
-- Dumping routines for database 'asistencia'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-26 22:45:04
