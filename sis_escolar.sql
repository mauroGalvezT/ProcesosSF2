SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `alumnos` (
  `idalumnos` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(500) DEFAULT NULL,
  `nombrealumno` varchar(45) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `telefonoa` varchar(45) DEFAULT NULL,
  `direcciona` varchar(45) DEFAULT NULL,
  `tutor` varchar(45) DEFAULT NULL,
  `fecharegistro` date DEFAULT NULL,
  `documentos` varchar(200) DEFAULT NULL,
  `estatus_idestatus` int(11) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `emergencia` varchar(45) NOT NULL,
  PRIMARY KEY (`idalumnos`),
  KEY `fk_alumnos_estatus1_idx` (`estatus_idestatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

CREATE TABLE IF NOT EXISTS `colegiaturas` (
  `idcolegiaturas` int(11) NOT NULL AUTO_INCREMENT,
  `alumnos_idalumnos` int(11) NOT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `fechadepago` date DEFAULT NULL,
  `tipodepago` varchar(45) DEFAULT NULL,
  `semana` varchar(45) DEFAULT NULL,
  `recibo` varchar(100) NOT NULL,
  PRIMARY KEY (`idcolegiaturas`),
  KEY `fk_colegiaturas_alumnos1_idx` (`alumnos_idalumnos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
  `idestatus` int(11) NOT NULL AUTO_INCREMENT,
  `estatuscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idestatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idestatus`, `estatuscol`) VALUES
(1, 'Alta'),
(2, 'Baja');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `privilegios_idprivilegios` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `nombre`, `password`, `privilegios_idprivilegios`) VALUES
(1, 'admin@gmail.com', 'admin', 1);

-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_alumnos_estatus1` FOREIGN KEY (`estatus_idestatus`) REFERENCES `estatus` (`idestatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Filtros para la tabla `colegiaturas`
--
ALTER TABLE `colegiaturas`
  ADD CONSTRAINT `fk_colegiaturas_alumnos1` FOREIGN KEY (`alumnos_idalumnos`) REFERENCES `alumnos` (`idalumnos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
