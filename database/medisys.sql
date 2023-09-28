-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2023 a las 09:16:39
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medisys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(11) NOT NULL,
  `nombre_area` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `nombre_area`, `descripcion`) VALUES
(1, 'Dentista', 'Encargado de ...'),
(2, 'Neurocirujano', 'Profesionista que ...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `codigo` varchar(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_compra` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`codigo`, `nombre`, `precio_compra`, `precio_venta`, `unidad`, `stock`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('B000362', 'Dulvanex', 50, 75, 'cajas', 10, 1, '2017-07-24 16:43:20', 1, '2017-07-26 02:09:06'),
('B000363', 'Controlip', 12, 50, 'cajas', 10, 1, '2017-07-24 16:56:58', 1, '2017-07-26 02:09:28'),
('B000364', 'Quetiazic', 25, 50, 'cajas', 30, 1, '2017-07-25 02:59:48', 1, '2017-07-26 02:09:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionistas`
--

CREATE TABLE `profesionistas` (
  `id_profesionista` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `id_area` int(11) NOT NULL,
  `telefono` text NOT NULL,
  `horario_consulta` text NOT NULL,
  `precios_consulta` text NOT NULL,
  `ubicacion` text NOT NULL,
  `coor` point NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesionistas`
--

INSERT INTO `profesionistas` (`id_profesionista`, `nombre`, `apellidos`, `id_area`, `telefono`, `horario_consulta`, `precios_consulta`, `ubicacion`, `coor`) VALUES
(1, 'Alejandro', 'Perez Garcia', 1, '924 345 3465', '8:00 am - 4:00 pm', '$200', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7609.3125683866565!2d-95.07815253339211!3d17.52391365648031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c1df8522e2cde7%3A0x6dabd04ee7e47f97!2sEstafeta%20Nuevo%20Morelos!5e0!3m2!1ses-419!2smx!4v1695878869307!5m2!1ses-419!2smx', 0x),
(2, 'Oscar', 'Jimenez ochoa', 2, '924 644 6523', '24/7', '$500', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29890.6495138102!2d-97.46914155102404!3d20.533625823062593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85da401a87b6ecf9%3A0x5544966e47801113!2sInstituto%20Tecnol%C3%B3gico%20Superior%20De%20Poza%20Rica!5e0!3m2!1ses-419!2smx!4v1695883011687!5m2!1ses-419!2smx', 0x),
(3, 'Carlos', 'Pereira Garrido', 1, '924 643 4552', '8am - 6pm', '> $400', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59780.84063281146!2d-97.44490875!3d20.53479875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85da155368ebdde9%3A0x6b1092bb56363835!2sHospital%20Regional%20de%20Poza%20Rica!5e0!3m2!1ses-419!2smx!4v1695884015794!5m2!1ses-419!2smx', 0x),
(4, 'Luis', 'Gonzales Hernandez', 1, '924 423 5334', '10am - 9pm', '> $450', 'Oluta', 0x),
(5, 'Marcos', 'Osorio Guzman', 1, '925 454 3534', '10am a 10pm', '> $800', 'Jesus Carranza', 0x),
(6, 'Alexis', 'Gomez Perez', 1, '5540979561', 'Todo el dia', '> $180', 'Matias Romero', 0x);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion_medicamentos`
--

CREATE TABLE `transaccion_medicamentos` (
  `codigo_transaccion` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `numero` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo_transaccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transaccion_medicamentos`
--

INSERT INTO `transaccion_medicamentos` (`codigo_transaccion`, `fecha`, `codigo`, `numero`, `created_user`, `created_date`, `tipo_transaccion`) VALUES
('TM-2017-0000001', '2017-07-26', 'B000362', 5, 1, '2017-07-26 02:09:06', 'Entrada'),
('TM-2017-0000002', '2017-07-26', 'B000363', 10, 1, '2017-07-26 02:09:28', 'Entrada'),
('TM-2017-0000003', '2017-07-26', 'B000364', 5, 1, '2017-07-26 02:09:36', 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `permisos_acceso` enum('Super Admin','Gerente','Almacen') NOT NULL,
  `status` enum('activo','bloqueado') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `name_user`, `password`, `email`, `telefono`, `foto`, `permisos_acceso`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Sistemas Webs', '21232f297a57a5a743894a0e4a801fc3', 'info@sist.com', '7025', 'user-default.png', 'Super Admin', 'activo', '2017-04-01 08:15:15', '2017-07-25 23:35:23'),
(2, 'juan', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'juab@juan.com', '12000', NULL, 'Almacen', 'activo', '2017-07-25 22:34:03', '2017-07-25 22:42:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `profesionistas`
--
ALTER TABLE `profesionistas`
  ADD PRIMARY KEY (`id_profesionista`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `transaccion_medicamentos`
--
ALTER TABLE `transaccion_medicamentos`
  ADD PRIMARY KEY (`codigo_transaccion`),
  ADD KEY `id_barang` (`codigo`),
  ADD KEY `created_user` (`created_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`permisos_acceso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profesionistas`
--
ALTER TABLE `profesionistas`
  MODIFY `id_profesionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD CONSTRAINT `medicamentos_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicamentos_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesionistas`
--
ALTER TABLE `profesionistas`
  ADD CONSTRAINT `profesionistas_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaccion_medicamentos`
--
ALTER TABLE `transaccion_medicamentos`
  ADD CONSTRAINT `transaccion_medicamentos_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `medicamentos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaccion_medicamentos_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
