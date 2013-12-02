-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2013 at 02:53 AM
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
  `asistio` tinyint(1) NOT NULL
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
('2014A', '2014-01-01', '2014-03-31'),
('2014B', '2014-08-01', '2014-12-15');

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
(121, 101, '2013-09-02'),
(122, 101, '2013-09-02'),
(123, 101, '2013-09-02'),
(124, 101, '2013-09-02'),
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
-- Table structure for table `diasfestivos`
--

CREATE TABLE IF NOT EXISTS `diasfestivos` (
  `idCiclo` int(11) NOT NULL,
  `diaFestivo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
-- Table structure for table `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `nrc` int(11) NOT NULL,
  `diaSemana` int(11) NOT NULL,
  `numeroHoras` int(11) NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`nrc`, `diaSemana`, `numeroHoras`, `horaInicio`, `horaFin`) VALUES
(100, 1, 2, '07:00:00', '09:00:00'),
(100, 2, 1, '08:00:00', '09:00:00'),
(100, 3, 2, '07:00:00', '09:00:00'),
(100, 4, 1, '08:00:00', '09:00:00'),
(100, 5, 2, '07:00:00', '09:00:00'),
(102, 1, 2, '07:00:00', '09:00:00'),
(102, 3, 2, '07:00:00', '09:00:00'),
(102, 5, 1, '08:00:00', '09:00:00');

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
(100, '1234'),
(200, '1234'),
(300, '1234'),
(301, '1234'),
(302, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `materiasalumno`
--

CREATE TABLE IF NOT EXISTS `materiasalumno` (
  `codigo` int(11) NOT NULL,
  `nrc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  `codigo` int(11) NOT NULL,
  `nombreCompleto` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `correo` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  `idRol` int(11) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `github` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `paginaWeb` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`codigo`, `nombreCompleto`, `idCarrera`, `correo`, `estatus`, `idRol`, `celular`, `github`, `paginaWeb`) VALUES
(100, 'Administrador', 0, '', 0, 10, 0, '', ''),
(200, 'Nancy Michelle', 10, 'michelle@udg.mx', 1, 20, 333101901, '', ''),
(300, 'Omar Valencia', 10, 'omar.val2189@gmail.com', 1, 30, 304734505, 'robin2189', NULL),
(301, 'Juan Perez', 20, 'correo@a.com', 1, 30, 331122354, 'juanillo', 'tuweb.com'),
(302, 'Pepe Pecas', 10, 'email@baca.com', 1, 30, 333111102, 'pepillo', 'miweb.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
