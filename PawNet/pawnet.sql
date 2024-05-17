-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2024 a las 14:32:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pawnet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encontrados`
--

CREATE TABLE `encontrados` (
  `Identificador` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL,
  `foto` longblob NOT NULL,
  `iduser` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encontrados`
--

INSERT INTO `encontrados` (`Identificador`, `fecha`, `tipo`, `ciudad`, `descripcion`, `email`, `telefono`, `foto`, `iduser`) VALUES
(15, '2023-03-03', 'gato', 'Granada', 'He encontrado un gatito atigrado adulto en mi calle. No tiene collar y no se deja acariciar.', 'marta@info.com', 638329583, 0x6761746f636f6d756e6575726f70656f2e61766966, 1),
(16, '2023-10-03', 'gato', 'Valladolid', 'He encontrado un gato negro con collar blanco. Es bueno y se deja acariciar.', 'marta@info.com', 645423532, 0x6761746f6e6567726f2e706e67, 1),
(17, '2023-07-15', 'perro', 'Madrid', 'He encontrado un perro de raza Shar Pei en el lago del Parque del Retiro. Muerde si me acerco, así que la estoy vigilando de lejos.', 'marta@info.com', 948593950, 0x736861727065692e706e67, 1),
(18, '2020-08-07', 'otro', 'Girona', 'He encontrado un hurón en un parque infantil de mi pueblo.', 'pausuarez@gmail.com', 675732829, 0x6875726f6e2e706e67, 14),
(19, '2019-12-01', 'perro', 'Valencia', 'He encontrado un perro marrón cerca de la estación de buses. No tiene collar. Es bueno.', 'juan@correo.com', 693829403, 0x706572726f6d6172726f6e2e706e67, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formcontacto`
--

CREATE TABLE `formcontacto` (
  `Identificador` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `prioridad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formcontacto`
--

INSERT INTO `formcontacto` (`Identificador`, `nombre`, `email`, `asunto`, `mensaje`, `prioridad`) VALUES
(5, 'Jose Luis', 'joseluis@correo.com', 'Funcionamiento de la página', 'Hola, tengo una consulta sobre el funcionamiento de PawNet...', 'baja'),
(6, 'Juana Martinez', 'juana@outlook.com', '¿Cómo publicar?', 'He encontrado un perro perdido y quiero publicarlo, pero no sé cómo.', 'alta'),
(7, 'Merlín Gimenez', 'merling@hotmail.com', 'Se ha perdido mi perro', 'Se ha perdido mi perro y quiero recibir notificaciones cada vez que haya una publicación nueva de perros encontrados.', 'alta'),
(8, 'Gerardo', 'gerardo@hotmail.com', 'Pregunta sobre un perro publicado', 'Quería hacer una consulta sobre un perro publicado', 'media');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `navegacion`
--

CREATE TABLE `navegacion` (
  `Identificador` int(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `navegacion`
--

INSERT INTO `navegacion` (`Identificador`, `item`, `href`) VALUES
(1, 'Inicio', 'index.php'),
(2, 'Encontrados', 'encontrados.php'),
(3, 'Perdidos', 'perdidos.php'),
(5, 'Contacto', 'contacto.php'),
(6, 'Mis publicaciones', 'mispublicaciones.php'),
(7, 'Cerrar sesión', 'main.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perdidos`
--

CREATE TABLE `perdidos` (
  `Identificador` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(5) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL,
  `foto` longblob NOT NULL,
  `iduser` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perdidos`
--

INSERT INTO `perdidos` (`Identificador`, `fecha`, `tipo`, `ciudad`, `descripcion`, `email`, `telefono`, `foto`, `iduser`) VALUES
(7, '2023-03-01', 'perro', 'Malaga', 'He perdido a mi perro galgo negro. Responde al nombre de Night.', 'gerardo@hotmail.com', 948593950, 0x67616c676f6e6567726f2e706e67, 2),
(8, '2021-07-13', 'perro', 'Barcelona', 'He perdido a mi perro Lio, es un caniche negro. No se deja agarrar, sólo llámame si lo ves.', 'juanjohh@gmail.com', 943284293, 0x63616e696368652e706e67, 13),
(9, '2024-01-01', 'otro', 'Murcia', 'He perdido a mi tortuga.', 'marta@correo.com', 693249304, 0x746f72747567612e706e67, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piedepagina`
--

CREATE TABLE `piedepagina` (
  `Identificador` int(255) NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `piedepagina`
--

INSERT INTO `piedepagina` (`Identificador`, `footer`) VALUES
(1, 'PawNet © 2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Identificador` int(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Identificador`, `usuario`, `email`, `contrasena`) VALUES
(1, 'Marta', 'marta@correo.com', 'martapass'),
(2, 'gerardo', 'gerardo@hotmail.com', 'pass'),
(9, 'Juan', 'juan@correo.com', 'juanpass'),
(13, 'juanjouser', 'juanjohh@gmail.com', 'juanjopass'),
(14, 'suarezpau', 'pausuarez@gmail.com', 'pass'),
(15, 'catalinaherrera', 'catalinaherrerasc@gmail.com', 'pass'),
(16, 'jorge', 'jorge@gmail.com', 'pass');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encontrados`
--
ALTER TABLE `encontrados`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `formcontacto`
--
ALTER TABLE `formcontacto`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `navegacion`
--
ALTER TABLE `navegacion`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `perdidos`
--
ALTER TABLE `perdidos`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `piedepagina`
--
ALTER TABLE `piedepagina`
  ADD PRIMARY KEY (`Identificador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encontrados`
--
ALTER TABLE `encontrados`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `formcontacto`
--
ALTER TABLE `formcontacto`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `navegacion`
--
ALTER TABLE `navegacion`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `perdidos`
--
ALTER TABLE `perdidos`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `piedepagina`
--
ALTER TABLE `piedepagina`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Identificador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
