-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2013 at 03:39 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cc409_user102`
--
CREATE DATABASE IF NOT EXISTS `cc409_user102` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `cc409_user102`;

-- --------------------------------------------------------

--
-- Table structure for table `academia`
--

CREATE TABLE IF NOT EXISTS `academia` (
  `idAcademia` int(11) NOT NULL,
  `nombreAcademia` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idAcademia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `academia`
--

INSERT INTO `academia` (`idAcademia`, `nombreAcademia`) VALUES
(1, 'Computacion basica'),
(2, 'Programacion basica'),
(3, 'Estructuras y algoritmos'),
(4, 'Ingenieria de software'),
(5, 'Sistemas de Informacion'),
(6, 'Sistemas Digitales'),
(7, 'Software de Sistemas'),
(8, 'Tecnicas Modernas de Programacion');

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `codigo` int(11) NOT NULL,
  `idDia` int(11) NOT NULL,
  `asistio` tinyint(1) NOT NULL,
  `nrc` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
--

CREATE TABLE IF NOT EXISTS `calificaciones` (
  `codigo` int(11) NOT NULL,
  `idEvaluacion` int(11) NOT NULL,
  `calificacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `idCarrera` int(11) NOT NULL,
  `nombreCarrera` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`idCarrera`, `nombreCarrera`) VALUES
(10, 'Computacion'),
(20, 'Informatica');

-- --------------------------------------------------------

--
-- Table structure for table `cicloescolar`
--

CREATE TABLE IF NOT EXISTS `cicloescolar` (
  `idCiclo` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  PRIMARY KEY (`idCiclo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `cicloescolar`
--

INSERT INTO `cicloescolar` (`idCiclo`, `fechaInicio`, `fechaFin`) VALUES
('2013B', '2013-08-19', '2013-12-14'),
('2014A', '2014-01-01', '2014-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idCurso` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreCurso` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `idAcademia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`idCurso`, `nombreCurso`, `idAcademia`) VALUES
('CC100', 'Introduccion a la Computacion', 1),
('CC101', 'Taller de Introduccion a la Computacion', 1),
('CC102', 'Introduccion a la Programacion', 2),
('CC103', 'Taller de Programacion Estructurada', 2),
('CC108', 'Programacion Estructurada', 2),
('CC109', 'Programacion para Interfaces', 8),
('CC200', 'Programacion Orientada a Objetos', 8),
('CC201', 'Taller de Programacion Orientada a Objetos', 8),
('CC202', 'Estructura de Datos', 3),
('CC203', 'Taller de Estructura de Datos', 3),
('CC204', 'Estructura de Archivos', 3),
('CC205', 'Taller de Estructura de Archivos', 3),
('CC206', 'Programacion de Sistemas', 7),
('CC207', 'Taller de Programacion de Sistemas', 7),
('CC208', 'Lenguajes de Programacion Comparados', 8),
('CC209', 'Teoria de la Computacion', 3),
('CC210', 'Arquitectura de Computadoras', 6),
('CC211', 'Teleinformatica', 6),
('CC212', 'Redes de Computadoras', 6),
('CC213', 'Taller de Redes de Computadoras', 6),
('CC300', 'Sistemas Operativos', 7),
('CC301', 'Taller de Sistemas Operativos', 7),
('CC302', 'Bases de Datos', 5),
('CC303', 'Taller de Bases de Datos', 5),
('CC304', 'Ingenieria de Software I', 4),
('CC305', 'Ingenieria de Software II', 4),
('CC306', 'Taller de Ingenieria de Software II', 4),
('CC307', 'Programacion Logica y Funcional', 8),
('CC308', 'Taller de Programacion Logica y Funcional', 8),
('CC309', 'Bases de Datos Avanzadas', 5),
('CC310', 'Taller de Bases de Datos Avanzadas', 5),
('CC311', 'Graficas por Computadora', 7),
('CC312', 'Taller de Graficas por Computadora', 0),
('CC313', 'Administracion de Bases de Datos', 5),
('CC314', 'Taller de Administracion de Bases de Datos', 5),
('CC315', 'Sistemas de Informacion Administrativos', 5),
('CC316', 'Analisis y Diseno de Algoritmos', 3),
('CC317', 'Compiladores', 0),
('CC318', 'Taller de Compiladores', 7),
('CC319', 'Sistemas Operativos Avanzados', 7),
('CC320', 'Taller de Sistemas Operativos Avanzados', 7),
('CC321', 'Fundamentos de Ingenieria de Software', 4),
('CC322', 'Organizacion de Computadoras I', 6),
('CC323', 'Organizacion de Computadoras II', 6),
('CC324', 'Redes de Computadoras Avanzadas', 6),
('CC325', 'Taller de Redes Avanzadas', 6),
('CC400', 'Sistemas Expertos', 8),
('CC401', 'Programacion de Sistemas Multimedia', 5),
('CC402', 'Taller de Sistemas Multimedia', 5),
('CC403', 'Auditoria de Sistemas', 4),
('CC404', 'Sistemas de Informacion Financieros', 5),
('CC405', 'Sistemas de Informacion para la Manufactura', 5),
('CC406', 'Sistemas de Informacion para la Toma de Decisiones', 5),
('CC407', 'Proyecto Terminal', 4),
('CC408', 'Simulacion de Sistemas Digitales', 6),
('CC409', 'Arquitectura de Computadoras Avanzada', 6),
('CC410', 'Redes Neuronales Artificiales', 8),
('CC411', 'Computacion Tolerante a Fallas', 7),
('CC413', 'Programacion Concurrente y Distribuida', 7),
('CC414', 'Taller de Programacion Concurrente y Distribuida', 7),
('CC415', 'Inteligencia Artificial', 8),
('CC417', 'Topicos Selectos de Computacion I (Robotica Movil)', 7),
('CC417', 'Topicos Selectos de Computacion I (Administracion de Servidores Microsoft)', 7),
('CC417', 'Topicos Selectos de Computacion I (Control de Proyectos)', 4),
('CC418', 'Topicos Selectos de Computacion II (Unix y Linux)', 7),
('CC419', 'Topicos Selectos de Computacion III (Java Avanzado)', 8),
('CC419', 'Topicos Selectos de Computacion III (Programacion Web)', 8),
('CC420', 'Topicos Selectos de Informatica I (Programacion de iPod y iPhone)', 7),
('CC420', 'Topicos Selectos de Informatica I (Interconexion de redes)', 6),
('CC420', 'Topicos Selectos de Informatica I (Comercio Electronico)', 4),
('CC421', 'Topicos Selectos de Informatica II (Programacion de iPod y iPhone)', 7),
('CC421', 'Topicos Selectos de Informatica II', 8),
('CC421', 'Topicos Selectos de Informatica II', 4),
('CC422', 'Topicos Selectos de Informatica III (C#)', 8),
('CC422', 'Topicos Selectos de Informatica III (Software libre)', 7),
('I5882', 'Programacion', 0),
('I5883', 'Seminario de Solucion de Problemas de Programacion', 0),
('I5884', 'Algoritmia', 0),
('I5885', 'Seminario de Solucion de Problemas de Algoritmia', 0),
('I5886', 'Estructuras de Datos I', 0),
('I5887', 'Seminario de Solucion de Problemas de Estructuras de Datos I', 0),
('I5888', 'Estructuras de Datos II', 0),
('I5889', 'Seminario de Solucion de Problemas de Estructuras de Datos II', 0),
('I5890', 'Bases de Datos', 0),
('I5891', 'Seminario de Solucion de Problemas de Bases de Datos', 0),
('I5898', 'Ingenieria de Software I', 0),
('I5899', 'Seminario de Solucion de Problemas de Ingenieria de Software I', 0),
('I5900', 'Ingenieria de Software II', 0),
('I5902', 'Administracion de Bases de Datos', 0),
('I5903', 'Uso, Adaptacion y Explotacion de Sistemas Operativos', 0),
('I5904', 'Seminario de Solucion de Problemas de Uso, Adaptacion y Explotacion de Sistemas Operativos', 0),
('I5905', 'Seguridad de la Informacion', 0),
('I5906', 'Almacenes de Datos (Data Warehouse)', 0),
('I5907', 'Administracion de Redes', 0),
('I5908', 'Administracion de Servidores', 0),
('I5909', 'Programacion para Internet', 0),
('I5910', 'Hypermedia', 0),
('I5911', 'Mineria de Datos', 0),
('I5912', 'Clasificacion Inteligente de Datos', 0),
('I5913', 'Sistemas Basados en Conocimiento', 0),
('I5914', 'Seminario de Solucion de Problemas de Sistemas Basados en Conocimiento', 0),
('I5915', 'Teoria de la Computacion', 0),
('I7022', 'Fundamentos Filosoficos de la Computacion', 0),
('I7023', 'Arquitectura de Computadoras', 0),
('I7024', 'Seminario de Solucion de Problemas de Arquitectura de Computadoras', 0),
('I7025', 'Traductores de Lenguajes I', 0),
('I7026', 'Seminario de Solucion de Problemas de Traductores de Lenguajes I', 0),
('I7027', 'Traductores de Lenguajes II', 0),
('I7028', 'Seminario de Solucion de Problemas de Traductores de Lenguaje II', 0),
('I7029', 'Sistemas Operativos', 0),
('I7030', 'Seminario de Solucion de Problemas de Sistemas Operativos', 0),
('I7031', 'Redes de computadoras y Protocolos de Comunicacion', 0),
('I7032', 'Seminario de Solucion de Problemas de Redes de Computadoras y Protocolos de Comunicacion', 0),
('I7033', 'Sistemas Operativos de Red', 0),
('I7034', 'Seminario de Solucion de Problemas de Sistemas Operativos en Red', 0),
('I7035', 'Sistemas Concurrentes y Distribuidos', 0),
('I7036', 'Computacion tolerante a fallas', 0),
('I7037', 'Seguridad', 0),
('I7038', 'Inteligencia Artificial I', 0),
('I7039', 'Seminario de Solucion de Problemas de Inteligencia Artificial I', 0),
('I7040', 'Inteligencia Artificial II', 0),
('I7041', 'Seminario de Solucion de Problemas de Inteligencia Artificial II', 0),
('I7042', 'Simulacion por Computadora', 0),
('I7609', 'Procesamiento de Bioimagenes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `diasclase`
--

CREATE TABLE IF NOT EXISTS `diasclase` (
  `idDia` int(11) NOT NULL,
  `nrc` int(11) NOT NULL,
  `fechaClase` date NOT NULL,
  PRIMARY KEY (`idDia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `diasclase`
--

INSERT INTO `diasclase` (`idDia`, `nrc`, `fechaClase`) VALUES
(100, 100, '2013-08-19'),
(101, 100, '2013-08-20'),
(102, 100, '2013-08-21'),
(103, 100, '2013-08-22'),
(104, 100, '2013-08-23'),
(105, 100, '2013-08-26'),
(106, 100, '2013-08-27'),
(107, 100, '2013-08-28'),
(108, 100, '2013-08-29'),
(109, 100, '2013-08-30'),
(110, 101, '2013-08-19'),
(111, 101, '2013-08-20'),
(112, 101, '2013-08-21'),
(113, 101, '2013-08-22'),
(114, 101, '2013-08-23'),
(115, 101, '2013-08-26'),
(116, 101, '2013-08-27'),
(117, 101, '2013-08-28'),
(118, 101, '2013-08-29'),
(119, 101, '2013-08-30'),
(120, 101, '2013-09-02'),
(121, 101, '2013-09-03'),
(122, 101, '2013-09-04'),
(123, 101, '2013-09-05'),
(124, 101, '2013-09-06'),
(125, 102, '2013-08-26'),
(126, 102, '2013-08-28'),
(127, 102, '2013-08-30'),
(128, 102, '2013-09-02'),
(129, 102, '2013-09-04'),
(130, 102, '2013-09-06'),
(131, 103, '2013-08-20'),
(132, 103, '2013-08-22'),
(133, 103, '2013-08-27'),
(134, 103, '2013-08-29'),
(135, 104, '2014-01-01'),
(136, 104, '2014-01-02'),
(137, 104, '2014-01-03'),
(138, 104, '2014-01-06'),
(139, 104, '2014-01-07'),
(140, 104, '2014-01-08'),
(141, 104, '2014-01-09'),
(142, 104, '2014-01-10'),
(143, 104, '2014-01-13'),
(144, 104, '2014-01-14'),
(145, 103, '2013-09-03'),
(146, 103, '2013-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `diasemana`
--

CREATE TABLE IF NOT EXISTS `diasemana` (
  `idDia` int(11) NOT NULL,
  `nombreDia` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idDia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `diasemana`
--

INSERT INTO `diasemana` (`idDia`, `nombreDia`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes');

-- --------------------------------------------------------

--
-- Table structure for table `diasfestivos`
--

CREATE TABLE IF NOT EXISTS `diasfestivos` (
  `idCiclo` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `diaFestivo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `diasfestivos`
--

INSERT INTO `diasfestivos` (`idCiclo`, `diaFestivo`) VALUES
('2013B', '2013-08-29'),
('2013B', '2013-09-06'),
('2014A', '2014-01-01'),
('2014A', '2014-12-12'),
('2014B', '2014-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `idEvaluacion` int(11) NOT NULL,
  `nrc` int(11) NOT NULL,
  `rubroCalificacion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `numeroRubro` int(11) NOT NULL,
  `procentajeCalificacion` int(11) NOT NULL,
  PRIMARY KEY (`idEvaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fechas`
--

CREATE TABLE IF NOT EXISTS `fechas` (
  `id` int(11) NOT NULL,
  `Dia` date NOT NULL,
  `Habil` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `fechas`
--

INSERT INTO `fechas` (`id`, `Dia`, `Habil`) VALUES
(0, '0000-00-00', 0),
(1, '2013-08-19', 1),
(2, '2013-08-20', 1),
(3, '2013-08-21', 1),
(4, '2013-08-22', 1),
(5, '2013-08-23', 1),
(6, '2013-08-24', 0),
(7, '2013-08-25', 0),
(8, '2013-08-26', 1),
(9, '2013-08-27', 1),
(10, '2013-08-28', 1),
(11, '2013-08-29', 1),
(12, '2013-08-30', 1),
(13, '2013-08-31', 0),
(14, '2013-09-01', 0),
(15, '2013-09-02', 1),
(16, '2013-09-03', 1),
(17, '2013-09-04', 1),
(18, '2013-09-05', 1),
(19, '2013-09-06', 1),
(20, '2013-09-07', 0),
(21, '2013-09-08', 0),
(22, '2013-09-09', 1),
(23, '2013-09-10', 1),
(24, '2013-09-11', 1),
(25, '2013-09-12', 1),
(26, '2013-09-13', 1),
(27, '2013-09-14', 0),
(28, '2013-09-15', 0),
(29, '2013-09-16', 1),
(30, '2013-09-17', 1),
(31, '2013-09-18', 1),
(32, '2013-09-19', 1),
(33, '2013-09-20', 1),
(34, '2013-09-21', 0),
(35, '2013-09-22', 0),
(36, '2013-09-23', 1),
(37, '2013-09-24', 1),
(38, '2013-09-25', 1),
(39, '2013-09-26', 1),
(40, '2013-09-27', 1),
(41, '2013-09-28', 0),
(42, '2013-09-29', 0),
(43, '2013-09-30', 1),
(44, '2013-10-01', 1),
(45, '2013-10-02', 1),
(46, '2013-10-03', 1),
(47, '2013-10-04', 1),
(48, '2013-10-05', 0),
(49, '2013-10-06', 0),
(50, '2013-10-07', 1),
(51, '2013-10-08', 1),
(52, '2013-10-09', 1),
(53, '2013-10-10', 1),
(54, '2013-10-11', 1),
(55, '2013-10-12', 0),
(56, '2013-10-13', 0),
(57, '2013-10-14', 1),
(58, '2013-10-15', 1),
(59, '2013-10-16', 1),
(60, '2013-10-17', 1),
(61, '2013-10-18', 1),
(62, '2013-10-19', 0),
(63, '2013-10-20', 0),
(64, '2013-10-21', 1),
(65, '2013-10-22', 1),
(66, '2013-10-23', 1),
(67, '2013-10-24', 1),
(68, '2013-10-25', 1),
(69, '2013-10-26', 0),
(70, '2013-10-27', 0),
(71, '2013-10-28', 1),
(72, '2013-10-29', 1),
(73, '2013-10-30', 1),
(74, '2013-10-31', 1),
(75, '2013-11-01', 1),
(76, '2013-11-02', 0),
(77, '2013-11-03', 0),
(78, '2013-11-04', 1),
(79, '2013-11-05', 1),
(80, '2013-11-06', 1),
(81, '2013-11-07', 1),
(82, '2013-11-08', 1),
(83, '2013-11-09', 0),
(84, '2013-11-10', 0),
(85, '2013-11-11', 1),
(86, '2013-11-12', 1),
(87, '2013-11-13', 1),
(88, '2013-11-14', 1),
(89, '2013-11-15', 1),
(90, '2013-11-16', 0),
(91, '2013-11-17', 0),
(92, '2013-11-18', 1),
(93, '2013-11-19', 1),
(94, '2013-11-20', 1),
(95, '2013-11-21', 1),
(96, '2013-11-22', 1),
(97, '2013-11-23', 0),
(98, '2013-11-24', 0),
(99, '2013-11-25', 1),
(100, '2013-11-26', 1),
(101, '2013-11-27', 1),
(102, '2013-11-28', 1),
(103, '2013-11-29', 1),
(104, '2013-11-30', 0),
(105, '2013-12-01', 0),
(106, '2013-12-02', 1),
(107, '2013-12-03', 1),
(108, '2013-12-04', 1),
(109, '2013-12-05', 1),
(110, '2013-12-06', 1),
(111, '2013-12-07', 0),
(112, '2013-12-08', 0),
(113, '2013-12-09', 1),
(114, '2013-12-10', 1),
(115, '2013-12-11', 1),
(116, '2013-12-12', 1),
(117, '2013-12-13', 1),
(118, '2013-12-14', 0),
(119, '2013-12-15', 0),
(120, '2013-12-16', 1),
(121, '2013-12-17', 1),
(122, '2013-12-18', 1),
(123, '2013-12-19', 1),
(124, '2013-12-20', 1),
(125, '2013-12-21', 0),
(126, '2013-12-22', 0),
(127, '2013-12-23', 1),
(128, '2013-12-24', 1),
(129, '2013-12-25', 1),
(130, '2013-12-26', 1),
(131, '2013-12-27', 1),
(132, '2013-12-28', 0),
(133, '2013-12-29', 0),
(134, '2013-12-30', 1),
(135, '2013-12-31', 1),
(136, '2014-01-01', 1),
(137, '2014-01-02', 1),
(138, '2014-01-03', 1),
(139, '2014-01-04', 0),
(140, '2014-01-05', 0),
(141, '2014-01-06', 1),
(142, '2014-01-07', 1),
(143, '2014-01-08', 1),
(144, '2014-01-09', 1),
(145, '2014-01-10', 1),
(146, '2014-01-11', 0),
(147, '2014-01-12', 0),
(148, '2014-01-13', 1),
(149, '2014-01-14', 1),
(150, '2014-01-15', 1),
(151, '2014-01-16', 1),
(152, '2014-01-17', 1),
(153, '2014-01-18', 0),
(154, '2014-01-19', 0),
(155, '2014-01-20', 1),
(156, '2014-01-21', 1),
(157, '2014-01-22', 1),
(158, '2014-01-23', 1),
(159, '2014-01-24', 1),
(160, '2014-01-25', 0),
(161, '2014-01-26', 0),
(162, '2014-01-27', 1),
(163, '2014-01-28', 1),
(164, '2014-01-29', 1),
(165, '2014-01-30', 1),
(166, '2014-01-31', 1),
(167, '2014-02-01', 0),
(168, '2014-02-02', 0),
(169, '2014-02-03', 1),
(170, '2014-02-04', 1),
(171, '2014-02-05', 1),
(172, '2014-02-06', 1),
(173, '2014-02-07', 1),
(174, '2014-02-08', 0),
(175, '2014-02-09', 0),
(176, '2014-02-10', 1),
(177, '2014-02-11', 1),
(178, '2014-02-12', 1),
(179, '2014-02-13', 1),
(180, '2014-02-14', 1),
(181, '2014-02-15', 0),
(182, '2014-02-16', 0),
(183, '2014-02-17', 1),
(184, '2014-02-18', 1),
(185, '2014-02-19', 1),
(186, '2014-02-20', 1),
(187, '2014-02-21', 1),
(188, '2014-02-22', 0),
(189, '2014-02-23', 0),
(190, '2014-02-24', 1),
(191, '2014-02-25', 1),
(192, '2014-02-26', 1),
(193, '2014-02-27', 1),
(194, '2014-02-28', 1),
(195, '2014-03-01', 0),
(196, '2014-03-02', 0),
(197, '2014-03-03', 1),
(198, '2014-03-04', 1),
(199, '2014-03-05', 1),
(200, '2014-03-06', 1),
(201, '2014-03-07', 1),
(202, '2014-03-08', 0),
(203, '2014-03-09', 0),
(204, '2014-03-10', 1),
(205, '2014-03-11', 1),
(206, '2014-03-12', 1),
(207, '2014-03-13', 1),
(208, '2014-03-14', 1),
(209, '2014-03-15', 0),
(210, '2014-03-16', 0),
(211, '2014-03-17', 1),
(212, '2014-03-18', 1),
(213, '2014-03-19', 1),
(214, '2014-03-20', 1),
(215, '2014-03-21', 1),
(216, '2014-03-22', 0),
(217, '2014-03-23', 0),
(218, '2014-03-24', 1),
(219, '2014-03-25', 1),
(220, '2014-03-26', 1),
(221, '2014-03-27', 1),
(222, '2014-03-28', 1),
(223, '2014-03-29', 0),
(224, '2014-03-30', 0),
(225, '2014-03-31', 1),
(226, '2014-04-01', 1),
(227, '2014-04-02', 1),
(228, '2014-04-03', 1),
(229, '2014-04-04', 1),
(230, '2014-04-05', 0),
(231, '2014-04-06', 0),
(232, '2014-04-07', 1),
(233, '2014-04-08', 1),
(234, '2014-04-09', 1),
(235, '2014-04-10', 1),
(236, '2014-04-11', 1),
(237, '2014-04-12', 0),
(238, '2014-04-13', 0),
(239, '2014-04-14', 1),
(240, '2014-04-15', 1),
(241, '2014-04-16', 1),
(242, '2014-04-17', 1),
(243, '2014-04-18', 1),
(244, '2014-04-19', 0),
(245, '2014-04-20', 0),
(246, '2014-04-21', 1),
(247, '2014-04-22', 1),
(248, '2014-04-23', 1),
(249, '2014-04-24', 1),
(250, '2014-04-25', 1),
(251, '2014-04-26', 0),
(252, '2014-04-27', 0),
(253, '2014-04-28', 1),
(254, '2014-04-29', 1),
(255, '2014-04-30', 1),
(256, '2014-05-01', 1),
(257, '2014-05-02', 1),
(258, '2014-05-03', 0),
(259, '2014-05-04', 0),
(260, '2014-05-05', 1),
(261, '2014-05-06', 1),
(262, '2014-05-07', 1),
(263, '2014-05-08', 1),
(264, '2014-05-09', 1),
(265, '2014-05-10', 0),
(266, '2014-05-11', 0),
(267, '2014-05-12', 1),
(268, '2014-05-13', 1),
(269, '2014-05-14', 1),
(270, '2014-05-15', 1),
(271, '2014-05-16', 1),
(272, '2014-05-17', 0),
(273, '2014-05-18', 0),
(274, '2014-05-19', 1),
(275, '2014-05-20', 1),
(276, '2014-05-21', 1),
(277, '2014-05-22', 1),
(278, '2014-05-23', 1),
(279, '2014-05-24', 0),
(280, '2014-05-25', 0),
(281, '2014-05-26', 1),
(282, '2014-05-27', 1),
(283, '2014-05-28', 1),
(284, '2014-05-29', 1),
(285, '2014-05-30', 1),
(286, '2014-05-31', 0),
(287, '2014-06-01', 0),
(288, '2014-06-02', 1),
(289, '2014-06-03', 1),
(290, '2014-06-04', 1),
(291, '2014-06-05', 1),
(292, '2014-06-06', 1),
(293, '2014-06-07', 0),
(294, '2014-06-08', 0),
(295, '2014-06-09', 1),
(296, '2014-06-10', 1),
(297, '2014-06-11', 1),
(298, '2014-06-12', 1),
(299, '2014-06-13', 1),
(300, '2014-06-14', 0),
(301, '2014-06-15', 0),
(302, '2014-06-16', 1),
(303, '2014-06-17', 1),
(304, '2014-06-18', 1),
(305, '2014-06-19', 1),
(306, '2014-06-20', 1),
(307, '2014-06-21', 0),
(308, '2014-06-22', 0),
(309, '2014-06-23', 1),
(310, '2014-06-24', 1),
(311, '2014-06-25', 1),
(312, '2014-06-26', 1),
(313, '2014-06-27', 1),
(314, '2014-06-28', 0),
(315, '2014-06-29', 0),
(316, '2014-06-30', 1),
(317, '2014-07-01', 1),
(318, '2014-07-02', 1),
(319, '2014-07-03', 1),
(320, '2014-07-04', 1),
(321, '2014-07-05', 0),
(322, '2014-07-06', 0),
(323, '2014-07-07', 1),
(324, '2014-07-08', 1),
(325, '2014-07-09', 1),
(326, '2014-07-10', 1),
(327, '2014-07-11', 1),
(328, '2014-07-12', 0),
(329, '2014-07-13', 0),
(330, '2014-07-14', 1),
(331, '2014-07-15', 1),
(332, '2014-07-16', 1),
(333, '2014-07-17', 1),
(334, '2014-07-18', 1),
(335, '2014-07-19', 0),
(336, '2014-07-20', 0),
(337, '2014-07-21', 1),
(338, '2014-07-22', 1),
(339, '2014-07-23', 1),
(340, '2014-07-24', 1),
(341, '2014-07-25', 1),
(342, '2014-07-26', 0),
(343, '2014-07-27', 0),
(344, '2014-07-28', 1),
(345, '2014-07-29', 1),
(346, '2014-07-30', 1),
(347, '2014-07-31', 1),
(348, '2014-08-01', 1),
(349, '2014-08-02', 0),
(350, '2014-08-03', 0),
(351, '2014-08-04', 1),
(352, '2014-08-05', 1),
(353, '2014-08-06', 1),
(354, '2014-08-07', 1),
(355, '2014-08-08', 1),
(356, '2014-08-09', 0),
(357, '2014-08-10', 0),
(358, '2014-08-11', 1),
(359, '2014-08-12', 1),
(360, '2014-08-13', 1),
(361, '2014-08-14', 1),
(362, '2014-08-15', 1),
(363, '2014-08-16', 0),
(364, '2014-08-17', 0),
(365, '2014-08-18', 1),
(366, '2014-08-19', 1),
(367, '2014-08-20', 1),
(368, '2014-08-21', 1),
(369, '2014-08-22', 1),
(370, '2014-08-23', 0),
(371, '2014-08-24', 0),
(372, '2014-08-25', 1),
(373, '2014-08-26', 1),
(374, '2014-08-27', 1),
(375, '2014-08-28', 1),
(376, '2014-08-29', 1),
(377, '2014-08-30', 0),
(378, '2014-08-31', 0),
(379, '2014-09-01', 1),
(380, '2014-09-02', 1),
(381, '2014-09-03', 1),
(382, '2014-09-04', 1),
(383, '2014-09-05', 1),
(384, '2014-09-06', 0),
(385, '2014-09-07', 0),
(386, '2014-09-08', 1),
(387, '2014-09-09', 1),
(388, '2014-09-10', 1),
(389, '2014-09-11', 1),
(390, '2014-09-12', 1),
(391, '2014-09-13', 0),
(392, '2014-09-14', 0),
(393, '2014-09-15', 1),
(394, '2014-09-16', 1),
(395, '2014-09-17', 1),
(396, '2014-09-18', 1),
(397, '2014-09-19', 1),
(398, '2014-09-20', 0),
(399, '2014-09-21', 0),
(400, '2014-09-22', 1),
(401, '2014-09-23', 1),
(402, '2014-09-24', 1),
(403, '2014-09-25', 1),
(404, '2014-09-26', 1),
(405, '2014-09-27', 0),
(406, '2014-09-28', 0),
(407, '2014-09-29', 1),
(408, '2014-09-30', 1),
(409, '2014-10-01', 1),
(410, '2014-10-02', 1),
(411, '2014-10-03', 1),
(412, '2014-10-04', 0),
(413, '2014-10-05', 0),
(414, '2014-10-06', 1),
(415, '2014-10-07', 1),
(416, '2014-10-08', 1),
(417, '2014-10-09', 1),
(418, '2014-10-10', 1),
(419, '2014-10-11', 0),
(420, '2014-10-12', 0),
(421, '2014-10-13', 1),
(422, '2014-10-14', 1),
(423, '2014-10-15', 1),
(424, '2014-10-16', 1),
(425, '2014-10-17', 1),
(426, '2014-10-18', 0),
(427, '2014-10-19', 0),
(428, '2014-10-20', 1),
(429, '2014-10-21', 1),
(430, '2014-10-22', 1),
(431, '2014-10-23', 1),
(432, '2014-10-24', 1),
(433, '2014-10-25', 0),
(434, '2014-10-26', 0),
(435, '2014-10-27', 1),
(436, '2014-10-28', 1),
(437, '2014-10-29', 1),
(438, '2014-10-30', 1),
(439, '2014-10-31', 1),
(440, '2014-11-01', 0),
(441, '2014-11-02', 0),
(442, '2014-11-03', 1),
(443, '2014-11-04', 1),
(444, '2014-11-05', 1),
(445, '2014-11-06', 1),
(446, '2014-11-07', 1),
(447, '2014-11-08', 0),
(448, '2014-11-09', 0),
(449, '2014-11-10', 1),
(450, '2014-11-11', 1),
(451, '2014-11-12', 1),
(452, '2014-11-13', 1),
(453, '2014-11-14', 1),
(454, '2014-11-15', 0),
(455, '2014-11-16', 0),
(456, '2014-11-17', 1),
(457, '2014-11-18', 1),
(458, '2014-11-19', 1),
(459, '2014-11-20', 1),
(460, '2014-11-21', 1),
(461, '2014-11-22', 0),
(462, '2014-11-23', 0),
(463, '2014-11-24', 1),
(464, '2014-11-25', 1),
(465, '2014-11-26', 1),
(466, '2014-11-27', 1),
(467, '2014-11-28', 1),
(468, '2014-11-29', 0),
(469, '2014-11-30', 0),
(470, '2014-12-01', 1),
(471, '2014-12-02', 1),
(472, '2014-12-03', 1),
(473, '2014-12-04', 1),
(474, '2014-12-05', 1),
(475, '2014-12-06', 0),
(476, '2014-12-07', 0),
(477, '2014-12-08', 1),
(478, '2014-12-09', 1),
(479, '2014-12-10', 1),
(480, '2014-12-11', 1),
(481, '2014-12-12', 1),
(482, '2014-12-13', 0),
(483, '2014-12-14', 0),
(484, '2014-12-15', 1),
(485, '2014-12-16', 1),
(486, '2014-12-17', 1),
(487, '2014-12-18', 1),
(488, '2014-12-19', 1),
(489, '2014-12-20', 0),
(490, '2014-12-21', 0),
(491, '2014-12-22', 1),
(492, '2014-12-23', 1),
(493, '2014-12-24', 1),
(494, '2014-12-25', 1),
(495, '2014-12-26', 1),
(496, '2014-12-27', 0),
(497, '2014-12-28', 0),
(498, '2014-12-29', 1),
(499, '2014-12-30', 1),
(500, '2014-12-31', 1),
(501, '2015-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `nrc` int(11) NOT NULL,
  `diaSemana` int(11) NOT NULL,
  `numeroHoras` int(11) NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`nrc`, `diaSemana`, `numeroHoras`, `horaInicio`, `horaFin`, `id`) VALUES
(100, 1, 2, '07:00:00', '09:00:00', 1),
(100, 2, 1, '08:00:00', '09:00:00', 2),
(100, 3, 2, '07:00:00', '09:00:00', 3),
(100, 4, 1, '08:00:00', '09:00:00', 4),
(100, 5, 2, '07:00:00', '09:00:00', 5),
(102, 1, 2, '07:00:00', '09:00:00', 6),
(102, 3, 2, '07:00:00', '09:00:00', 7),
(102, 5, 1, '08:00:00', '09:00:00', 8),
(101, 1, 2, '19:00:00', '21:00:00', 9),
(101, 2, 2, '19:00:00', '21:00:00', 10),
(101, 3, 2, '19:00:00', '21:00:00', 11),
(101, 4, 2, '19:00:00', '21:00:00', 12),
(101, 5, 2, '19:00:00', '21:00:00', 13),
(103, 2, 2, '17:00:00', '19:00:00', 14),
(103, 4, 2, '17:00:00', '19:00:00', 15),
(104, 1, 2, '12:00:00', '14:00:00', 16),
(104, 2, 2, '12:00:00', '14:00:00', 17),
(104, 3, 2, '12:00:00', '14:00:00', 18),
(104, 4, 2, '12:00:00', '14:00:00', 19),
(104, 5, 2, '12:00:00', '14:00:00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `codigo` int(11) NOT NULL,
  `pass` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`codigo`, `pass`) VALUES
(100, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(200, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(300, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(301, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(302, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(303, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(304, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(305, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `materiasalumno`
--

CREATE TABLE IF NOT EXISTS `materiasalumno` (
  `codigo` int(11) NOT NULL,
  `nrc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `materiasalumno`
--

INSERT INTO `materiasalumno` (`codigo`, `nrc`) VALUES
(300, 101),
(300, 102),
(103, 300),
(300, 103),
(301, 101),
(301, 102),
(304, 100),
(305, 100),
(302, 103),
(300, 104),
(301, 104),
(302, 104),
(303, 101),
(303, 102),
(303, 103),
(303, 104),
(303, 105);

-- --------------------------------------------------------

--
-- Table structure for table `nrc`
--

CREATE TABLE IF NOT EXISTS `nrc` (
  `nrc` int(11) NOT NULL,
  `idCiclo` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `idCurso` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `seccionCurso` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`nrc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `nrc`
--

INSERT INTO `nrc` (`nrc`, `idCiclo`, `idCurso`, `seccionCurso`) VALUES
(100, '2013B', 'CC206', 'D01'),
(101, '2013B', 'CC206', 'D02'),
(102, '2013B', 'CC207', 'D01'),
(103, '2013B', 'CC208', 'D01'),
(104, '2014A', 'CC209', 'D01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRol`, `nombreRol`) VALUES
(10, 'administrador'),
(20, 'profesor'),
(30, 'alumno');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCompleto` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `correo` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  `idRol` int(11) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `github` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `paginaWeb` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=314 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`codigo`, `nombreCompleto`, `idCarrera`, `correo`, `estatus`, `idRol`, `celular`, `github`, `paginaWeb`) VALUES
(100, 'Administrador', 0, '', 0, 10, 0, '', ''),
(200, 'Nancy Michelle', 10, 'michelle@udg.mx', 1, 20, 333101901, '', ''),
(300, 'Omar Valencia', 10, 'omar.val2189@gmail.com', 1, 30, 304734505, 'robin2189', NULL),
(301, 'Juan Perez', 20, 'correo@a.com', 1, 30, 331122354, 'juanillo', 'tuweb.com'),
(302, 'Pepe Pecas', 10, 'email@baca.com', 1, 30, 333111102, 'pepillo', 'miweb.com'),
(303, 'Lola Lela', 10, 'lola@baca.com', 1, 30, 333311102, 'lolitayala', 'notengo.com'),
(304, 'Matt Herias', 20, 'mimail@a.com', 1, 30, 2147483647, '', ''),
(305, 'Armando Slam', 20, '', 1, 30, 333122354, 'mandillo', 'armando.yy.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
