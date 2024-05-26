-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2023 a las 18:53:15
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE  IF NOT EXISTS `area` (
  `id` int(5) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `area`) VALUES
(11, 'Ingenieria de la Informacion'),
(12, 'Telematica'),
(13, 'Sistemas y Automaticas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `id` int(5) NOT NULL,
  `linea` varchar(255) NOT NULL,
  `idprograma` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`id`, `linea`, `idprograma`) VALUES
(43, 'Software Educativo', 12),
(44, 'Guias de Estudio Web', 12),
(45, 'Tutoriales', 12),
(46, 'Juegos Didacticos', 12),
(47, 'Entornos interactivos de enseñanza', 12),
(48, 'Sistemas E-Learning', 12),
(49, 'Soporte Tecnico a Usuarios', 12),
(50, 'Soporte Tecnico a Equipos', 12),
(51, 'Aplicaciones Cliente-Servidor', 13),
(52, 'Servicios de Integracion para Aplicaciones Web', 13),
(53, 'Desarrollo e Implantacion de Sistemas de Informacion', 14),
(54, 'Seguridad Informatica', 14),
(55, 'Auditoria Informatica', 14),
(56, 'Simulacion y Herramientas de Simulacion', 15),
(57, 'Modelos de Transmision de Datos', 15),
(58, 'Aplicaciones con Microcontroladores, Sensores y Elementos Finales de Control', 16),
(59, 'Control por Computadora e Instrumentacion de Procesos', 16),
(60, 'Inteligencia Artificial', 16),
(61, 'Robots y Sistemas Sensoriales', 16),
(62, 'Domotica', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int(5) NOT NULL,
  `programa` varchar(50) NOT NULL,
  `idarea` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id`, `programa`, `idarea`) VALUES
(12, 'Edumatica', 11),
(13, 'Aplicaciones Web', 11),
(14, 'Sistemas de Informacion', 11),
(15, 'Redes y Telecomunicaciones', 12),
(16, 'Sistemas Automaticos de Control ', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `idarea` int(5) NOT NULL,
  `idprograma` int(5) NOT NULL,
  `idtrayecto` int(5) NOT NULL,
  `idlinea` int(5) NOT NULL,
  `titulo` varchar(700) NOT NULL,
  `tutor` varchar(100) NOT NULL,
  `ano` year(4) NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='en esta tabla se alojan todos los proyectos';

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `idarea`, `idprograma`, `idtrayecto`, `idlinea`, `titulo`, `tutor`, `ano`, `pdf`) VALUES
(172, 11, 14, 2, 53, 'SISTEMA DE GESTIÓN PARA EL CONTROL DE PROYECTOS SOCIO PRODUCTIVOS DEL PNFI UPTAG', 'Luis Miguel Pachano', 2023, ''),
(174, 12, 15, 2, 57, 'OPTIMIZACIÓN DE LA RED DE DEPARTAMENTO MISIÓN ROBINSON DE LA ZONA EDUCATIVA DEL ESTADO FALCÓN', 'Yzaimar Colina', 2018, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trayecto`
--

CREATE TABLE `trayecto` (
  `id` int(5) NOT NULL,
  `trayecto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trayecto`
--

INSERT INTO `trayecto` (`id`, `trayecto`) VALUES
(1, 'Trayecto 1'),
(2, 'Trayecto 2'),
(3, 'Trayecto 3'),
(4, 'Trayecto 4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idprogramaa` (`idprograma`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idarea` (`idarea`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idarea` (`idarea`),
  ADD KEY `fk_idprograma` (`idprograma`),
  ADD KEY `fk_idlinea` (`idlinea`),
  ADD KEY `idtrayecto` (`idtrayecto`);

--
-- Indices de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD CONSTRAINT `fk_idprogramaa` FOREIGN KEY (`idprograma`) REFERENCES `programa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `programa_ibfk_1` FOREIGN KEY (`idarea`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_idarea` FOREIGN KEY (`idarea`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idlinea` FOREIGN KEY (`idlinea`) REFERENCES `lineas` (`id`),
  ADD CONSTRAINT `fk_idprograma` FOREIGN KEY (`idprograma`) REFERENCES `programa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`idtrayecto`) REFERENCES `trayecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-03-2023 a las 23:43:17
-- Versión del servidor: 8.0.31-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `oca`

-- Estructura de tabla para la tabla `usuarios`
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(33) COLLATE utf8mb3_spanish_ci NOT NULL UNIQUE,
  `nombre` varchar(33) COLLATE utf8mb3_spanish_ci NOT NULL,
  `clave` varchar(64) COLLATE utf8mb3_spanish_ci NOT NULL,
  `pregunta` varchar(33) COLLATE utf8mb3_spanish_ci NOT NULL,
  `pregunta2` varchar(33) COLLATE utf8mb3_spanish_ci NOT NULL,
  `pregunta3` varchar(33) COLLATE utf8mb3_spanish_ci NOT NULL,
  `respuesta` varchar(64) COLLATE utf8mb3_spanish_ci NOT NULL,
  `respuesta2` varchar(64) COLLATE utf8mb3_spanish_ci NOT NULL,
  `respuesta3` varchar(64) COLLATE utf8mb3_spanish_ci NOT NULL,
  `email` VARCHAR(255) COLLATE utf8mb3_spanish_ci NOT NULL UNIQUE,
  `tipo` TINYINT NOT NULL DEFAULT 3,
  `estado` ENUM('activo', 'bloqueado') NOT NULL DEFAULT 'activo',
  `intentos_fallidos` INT NOT NULL DEFAULT 2,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;


-- Crear variables para contraseña y respuesta cifradas
SET @password = 'admin';
SET @respuestaSecreta = 'verde';
SET @respuestaSecreta2 = 'super man';
SET @respuestaSecreta3 = 'coro';

SET @contrasenaCifrada = SHA2(@password, 256);
SET @respuestaCifrada = SHA2(@respuestaSecreta, 256);
SET @respuestaCifrada2 = SHA2(@respuestaSecreta2, 256);
SET @respuestaCifrada3 = SHA2(@respuestaSecreta3, 256);

-- Insertar el usuario 'admin' con la contraseña y respuesta cifradas
INSERT INTO `usuarios` (`usuario`, `nombre`, `clave`, `pregunta`, `pregunta2`, `pregunta3`, `respuesta`,  `respuesta2`,  `respuesta3`, `email`, `tipo`)
VALUES (
    'admin',
    'administrador',
    @contrasenaCifrada,
    'Color favorito?',
    'Heroe favorito?',
    'Ciudad donde naciste?',
    @respuestaCifrada,
    @respuestaCifrada2,
    @respuestaCifrada3,
    'test@gmail.com',
    1
);

SET @password = 'operario';
SET @respuestaSecreta = 'azul';
SET @respuestaSecreta2 = 'spider man';
SET @respuestaSecreta3 = 'falcon';

SET @contrasenaCifrada = SHA2(@password, 256);
SET @respuestaCifrada = SHA2(@respuestaSecreta, 256);
SET @respuestaCifrada2 = SHA2(@respuestaSecreta2, 256);
SET @respuestaCifrada3 = SHA2(@respuestaSecreta3, 256);

-- Insertar el usuario 'admin' con la contraseña y respuesta cifradas
INSERT INTO `usuarios` (`usuario`, `nombre`, `clave`, `pregunta`, `pregunta2`, `pregunta3`, `respuesta`,  `respuesta2`,  `respuesta3`, `email`, `tipo`)
VALUES (
    'operador',
    'operario',
    @contrasenaCifrada,
    'Color favorito?',
    'Heroe favorito?',
    'Ciudad donde naciste?',
    @respuestaCifrada,
    @respuestaCifrada2,
    @respuestaCifrada3,
    'operador@gmail.com',
    0
);

CREATE TABLE IF NOT EXISTS tokens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  value VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  logout_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  expired_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES usuarios(id_usuario)
);