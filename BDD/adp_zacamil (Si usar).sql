-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-10-2023 a las 22:22:53
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adp_zacamil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

DROP TABLE IF EXISTS `asignaciones`;
CREATE TABLE IF NOT EXISTS `asignaciones` (
  `Id_Asignacion` int NOT NULL AUTO_INCREMENT,
  `Reporte_Reportes` int DEFAULT NULL,
  `Usuario_Usuarios` int DEFAULT NULL,
  `Fecha_Asignacion` date NOT NULL,
  `Estado_Asignacion` int NOT NULL,
  PRIMARY KEY (`Id_Asignacion`),
  KEY `Reporte_Reportes` (`Reporte_Reportes`),
  KEY `Usuario_Usuarios` (`Usuario_Usuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `Id_Cargo` int NOT NULL AUTO_INCREMENT,
  `Nombre_Cargo` char(60) NOT NULL,
  `Descripcion_Cargo` text NOT NULL,
  PRIMARY KEY (`Id_Cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`Id_Cargo`, `Nombre_Cargo`, `Descripcion_Cargo`) VALUES
(1, 'Jefe de Área', ''),
(2, 'Técnico', ''),
(3, 'Administrador', 'Un usuario con la categoría \"administrador\" (administrador) es un tipo de usuario que posee privilegios y permisos especiales en un sistema, aplicación, sitio web o plataforma. A continuación, se proporciona una descripción general de lo que significa ser un usuario de categoría \"administrador\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `Id_Estado` int NOT NULL AUTO_INCREMENT,
  `Nombre_Estado` char(60) NOT NULL,
  `Descripcion_Estado` text NOT NULL,
  PRIMARY KEY (`Id_Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Id_Estado`, `Nombre_Estado`, `Descripcion_Estado`) VALUES
(1, 'Cuenta Activa', 'La expresión \"cuenta activa\" se refiere a una cuenta o perfil de usuario que está actualmente en uso o habilitada. Indica que la cuenta está activa y disponible para su uso, lo que implica que el usuario puede iniciar sesión, interactuar o realizar acciones relacionadas con esa cuenta en un sistema, plataforma o servicio en línea.'),
(2, 'Cuenta Desactivada', '\r\nLa expresión \"cuenta desactivada\" se refiere a una cuenta de usuario que ha sido inhabilitada o suspendida temporal o permanentemente. Esto implica que el usuario no puede acceder ni utilizar su cuenta en un sistema, plataforma o servicio en línea en ese momento. La desactivación de una cuenta puede deberse a diversas razones, como incumplimiento de normas, inactividad prolongada o por solicitud del usuario. En resumen, una \"cuenta desactivada\" indica que el acceso y las funcionalidades asociadas a esa cuenta están temporalmente o definitivamente restringidas.'),
(3, 'Recuperación de contrasena', 'La expresión \"Recuperación de contrasena\" se refiere a un estado en el que un usuario ha solicitado restablecer la contraseña de su cuenta. Por lo general, esto ocurre cuando el usuario ha olvidado su contraseña actual o tiene dificultades para acceder a su cuenta debido a problemas de seguridad.'),
(4, 'Cuenta en espera de Aprovacion', 'La expresión \"Cuenta en espera de Aprovacion\" se refiere a una cuenta de usuario que ha sido creada pero aún no ha sido activada o habilitada para su pleno uso en un sistema o plataforma en línea. En este estado, la cuenta del usuario ha sido registrada, pero no puede acceder completamente a las funcionalidades del sistema hasta que sea aprobada o verificada por un administrador, moderador o entidad autorizada.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes_reporte`
--

DROP TABLE IF EXISTS `mes_reporte`;
CREATE TABLE IF NOT EXISTS `mes_reporte` (
  `Id_MesReporte` int NOT NULL AUTO_INCREMENT,
  `Reportes_SI_Resuelto_Mes` int DEFAULT NULL,
  `Reportes_NO_Resuelto_Mes` int DEFAULT NULL,
  `Reportes_Total_Mes` int DEFAULT NULL,
  `Reportes_Date_Mes` date DEFAULT NULL,
  PRIMARY KEY (`Id_MesReporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progreso`
--

DROP TABLE IF EXISTS `progreso`;
CREATE TABLE IF NOT EXISTS `progreso` (
  `Id_Progreso` int NOT NULL AUTO_INCREMENT,
  `Reporte_Reportes` int DEFAULT NULL,
  `Titulo_Progreso` int DEFAULT NULL,
  `Descripcion_Progreso` text NOT NULL,
  `Porcentaje_Progreso` int NOT NULL,
  PRIMARY KEY (`Id_Progreso`),
  KEY `Reporte_Reportes` (`Reporte_Reportes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

DROP TABLE IF EXISTS `reportes`;
CREATE TABLE IF NOT EXISTS `reportes` (
  `Id_Reporte` int NOT NULL AUTO_INCREMENT,
  `Usuario_Usuarios` int DEFAULT NULL,
  `Nombre_Equipo_Reporte` char(100) NOT NULL,
  `Marca_Reporte` char(100) NOT NULL,
  `Modelo_Reporte` char(100) NOT NULL,
  `Area_Reporte` char(100) NOT NULL,
  `Serial_Reporte` char(100) NOT NULL,
  `Descripcion_Incidente_Reporte` text NOT NULL,
  `Descripcion_Error_Reporte` text NOT NULL,
  `Anexo_Reporte` text NOT NULL,
  `Estado_Reporte` int NOT NULL,
  PRIMARY KEY (`Id_Reporte`),
  KEY `Usuario_Usuarios` (`Usuario_Usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`Id_Reporte`, `Usuario_Usuarios`, `Nombre_Equipo_Reporte`, `Marca_Reporte`, `Modelo_Reporte`, `Area_Reporte`, `Serial_Reporte`, `Descripcion_Incidente_Reporte`, `Descripcion_Error_Reporte`, `Anexo_Reporte`, `Estado_Reporte`) VALUES
(1, 2, 'Computadora Portátil Dell XPS 15', 'Dell', 'XPS 15', 'Departamento de Desarrollo', 'AXC1-2345', 'La pantalla de la computadora comenzó a parpadear y luego se apagó repentinamente.', 'Se observaron líneas horizontales en la pantalla antes de apagarse. No enciende ni muestra señales de vida.', 'https://drive.google.com/file/d/16PnEFSMh1kD-KRdDbL6E8UiLhHFcXoLi/view?usp=sharing', 0),
(2, 2, 'Laptop Fujitsu', 'Fujitsu', 'T-730', 'Área del edificio 6', '9982212121-2201-88822', 'El cargador fallo', 'No funciona el cargador', 'No hay anexo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_Usuario` int NOT NULL AUTO_INCREMENT,
  `Usuario_Usuario` char(100) NOT NULL,
  `Nombre_Usuario` char(60) NOT NULL,
  `Apellido_Usuario` char(40) NOT NULL,
  `Correo_Usuario` char(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Telefono_Usuario` int NOT NULL,
  `Password_Usuario` text NOT NULL,
  `Estado_Estados` int DEFAULT NULL,
  `BP_Usuario` int DEFAULT NULL,
  `Cargo_Cargos` int DEFAULT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Estado_Estados` (`Estado_Estados`),
  KEY `Cargo_Cargos` (`Cargo_Cargos`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_Usuario`, `Usuario_Usuario`, `Nombre_Usuario`, `Apellido_Usuario`, `Correo_Usuario`, `Telefono_Usuario`, `Password_Usuario`, `Estado_Estados`, `BP_Usuario`, `Cargo_Cargos`) VALUES
(1, 'jonnathan.alexander@zacamil.sv', 'Jonnathan Alexander', 'Urquilla Munoz', 'Jonnathanweltx@gmail.com', 72963923, '1234567890', 1, 0, 2),
(2, 'Carla.Alonso@zacamil.sv', 'Carla Maria', 'Alonso Bautista', 'CarlaMaria@gmail.com', 77943301, '1234567890', 1, NULL, 1),
(3, 'wilmer.Garcia@zacamil.sv', 'Wilmer Ezequiel', 'García Carrero', 'wilmer@gmail.com', 72699332, '1234567890', 1, NULL, 3),
(4, 'jocelyn.jocelyn@zacamil.sv', 'Jocelyn Alexander', 'Apellido Apellido', 'Jocelyn.llanes@gmail.com', 71287345, '1234567890', 1, NULL, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`Reporte_Reportes`) REFERENCES `reportes` (`Id_Reporte`),
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`Usuario_Usuarios`) REFERENCES `usuarios` (`Id_Usuario`);

--
-- Filtros para la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD CONSTRAINT `progreso_ibfk_1` FOREIGN KEY (`Reporte_Reportes`) REFERENCES `reportes` (`Id_Reporte`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`Usuario_Usuarios`) REFERENCES `usuarios` (`Id_Usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Estado_Estados`) REFERENCES `estado` (`Id_Estado`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`Cargo_Cargos`) REFERENCES `cargos` (`Id_Cargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
