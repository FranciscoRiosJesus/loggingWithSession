-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-10-2019 a las 20:46:05
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Virtual Reality '),
(2, 'Augmented Reality');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `category_id` int(20) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `price` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `description`, `price`, `img_url`) VALUES
(1, 'Oculus Rift + Touch', 1, 'Kit Oculus Rift + Oculus Touch + 2 Sensores\n\nPantalla OLED 2160Ã—1200 px.\nTasa de refresco de 90 fps.\nAngulo de visiÃ³n: 110Âº.\nÃrea de seguimiento: 1,5 x 3,3 m.\nSensores de funcionamiento: AcelerÃ³metro, giroscopio, magnetÃ³metro y sistema posicional 360 grados.\nPeso: 470g', 89000, ''),
(2, 'htc vive kit', 1, 'Â• Pantalla: OLED\nÂ• Resolucion: 2160 x 1200 px\nÂ• Tasa de refresco: 90Hz\nÂ• Plataforma: SteamVR\nÂ• Campo de visiÃ³n: 110 grados\nÂ• Area de seguimiento: 4.5x4.5 m\nÂ• Audio integrado: Si, conector minijack\nÂ• Microfono integrado: Si\nÂ• Mandos para juegos: Mandos HTC Vive (incluidos) / Mando SteamVR / Cualquier gamepad de PC\nÂ• Sensores: AcelerÃ³metro, girÃ³scopo, doble sistema de posiciÃ³n lÃ¡ser (36 sensores gafas, 24 sensores cada mando), cÃ¡mara frontal\nÂ• Conexiones: HDMI, USB 2.0, USB 3.0', 81900, 'img/htcVive.png'),
(11, 'Oculus Rift S', 1, 'test desptrion', 5000, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `name`, `last_name`, `email`, `pass`) VALUES
(1, 'root', '', 'root@root.inspt', 'password'),
(2, 'Francisco', 'Rios', 'rios@inspt.com', 'password'),
(3, 'Facundo', 'Rios', 'facu@gmail.com', 'pass'),
(6, 'Magali', 'Rios', 'mag@utn.com', 'pass'),
(7, 'Maria', 'Rios', 'mari@utn.com', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
