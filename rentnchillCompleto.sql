-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2012 at 03:23 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.2-1ubuntu4.17

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rentnchi_masto`
--
CREATE DATABASE `rentnchi_masto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rentnchi_masto`;

-- --------------------------------------------------------

--
-- Table structure for table `md_apartamento`
--

CREATE TABLE IF NOT EXISTS `md_apartamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_locacion_id` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT '0',
  `tipo` enum('comission','fullservice') NOT NULL,
  `md_user_id` int(11) DEFAULT NULL,
  `md_currency_id` int(11) NOT NULL DEFAULT '1',
  `precio_alta` float(18,2) NOT NULL,
  `precio_baja` float(18,2) NOT NULL,
  `cantidad_personas` int(11) NOT NULL DEFAULT '2',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `md_locacion_id_idx` (`md_locacion_id`),
  KEY `md_user_id_idx` (`md_user_id`),
  KEY `md_currency_id_idx` (`md_currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `md_apartamento`
--

INSERT INTO `md_apartamento` (`id`, `md_locacion_id`, `activo`, `tipo`, `md_user_id`, `md_currency_id`, `precio_alta`, `precio_baja`, `cantidad_personas`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'fullservice', 1, 2, 375.00, 175.00, 4, '2012-01-31 23:02:26', '2012-03-15 15:45:01'),
(3, 1, 1, 'comission', 7, 2, 520.00, 240.00, 4, '2012-02-09 18:36:28', '2012-03-21 22:29:39'),
(4, 2, 1, 'comission', 1, 2, 700.00, 600.00, 9, '2012-03-01 16:44:00', '2012-03-01 16:44:00'),
(5, 1, 1, 'comission', 7, 2, 350.00, 150.00, 6, '2012-03-01 18:23:54', '2012-03-21 22:12:09'),
(6, 1, 1, 'comission', 8, 2, 300.00, 150.00, 6, '2012-03-22 18:14:36', '2012-03-22 18:14:36'),
(7, 1, 1, 'comission', 7, 2, 300.00, 150.00, 6, '2012-03-22 19:42:35', '2012-03-22 19:42:35'),
(8, 1, 1, 'comission', 11, 2, 250.00, 100.00, 4, '2012-03-25 16:57:48', '2012-03-26 10:47:54'),
(9, 1, 0, 'fullservice', 12, 2, 120.00, 90.00, 2, '2012-05-08 10:32:07', '2012-05-08 10:32:07'),
(10, 1, 0, 'fullservice', 13, 2, 80.00, 70.00, 2, '2012-06-06 09:08:49', '2012-06-06 09:08:49'),
(11, 1, 1, 'comission', 14, 1, 10.00, 10.00, 2, '2012-07-13 13:26:41', '2012-07-13 13:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `md_apartamento_md_comodidad`
--

CREATE TABLE IF NOT EXISTS `md_apartamento_md_comodidad` (
  `md_apartamento_id` int(11) NOT NULL DEFAULT '0',
  `md_comodidad_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`md_apartamento_id`,`md_comodidad_id`),
  KEY `md_apartamento_md_comodidad_md_comodidad_id_md_comodidad_id` (`md_comodidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_apartamento_md_comodidad`
--

INSERT INTO `md_apartamento_md_comodidad` (`md_apartamento_id`, `md_comodidad_id`) VALUES
(3, 1),
(11, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(2, 3),
(3, 3),
(4, 3),
(6, 3),
(7, 3),
(8, 3),
(11, 3),
(2, 4),
(3, 4),
(6, 4),
(7, 4),
(8, 4),
(11, 4),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(11, 5),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(8, 6),
(11, 6),
(3, 8),
(6, 8),
(7, 8),
(8, 8),
(11, 8),
(4, 9),
(11, 9),
(2, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(8, 10),
(11, 10),
(2, 11),
(3, 11),
(4, 11),
(5, 11),
(11, 11),
(11, 12),
(3, 13),
(4, 13),
(5, 13),
(11, 13),
(3, 14),
(6, 14),
(7, 14),
(11, 14),
(2, 15),
(3, 15),
(4, 15),
(5, 15),
(6, 15),
(7, 15),
(8, 15),
(11, 15),
(4, 16),
(5, 16),
(11, 16),
(3, 17),
(11, 17),
(3, 18),
(6, 18),
(7, 18),
(8, 18),
(2, 19),
(3, 19),
(4, 19),
(5, 19),
(6, 19),
(7, 19),
(8, 19),
(2, 20),
(3, 20),
(4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `md_apartamento_search`
--

CREATE TABLE IF NOT EXISTS `md_apartamento_search` (
  `id` int(11) NOT NULL DEFAULT '0',
  `md_locacion_id` int(11) NOT NULL,
  `precio_alta` float(18,2) NOT NULL,
  `precio_baja` float(18,2) NOT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `tipo_propiedad` enum('apartment','house','bedNbreakfast','cabin','villa','castle','dorm','treehouse','boat','automobile','igloo') DEFAULT NULL,
  `metraje` int(11) DEFAULT NULL,
  `cuartos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_apartamento_search`
--

INSERT INTO `md_apartamento_search` (`id`, `md_locacion_id`, `precio_alta`, `precio_baja`, `cantidad_personas`, `tipo_propiedad`, `metraje`, `cuartos`) VALUES
(2, 1, 288.06, 134.43, 4, 'apartment', 110, 2),
(3, 1, 399.45, 184.36, 4, 'apartment', 100, 2),
(4, 2, 537.72, 460.90, 9, 'house', 200, NULL),
(5, 1, 268.86, 115.23, 6, 'house', 150, NULL),
(6, 1, 230.45, 115.23, 6, 'apartment', 150, NULL),
(7, 1, 230.45, 115.23, 6, 'apartment', 160, NULL),
(8, 1, 192.04, 76.82, 4, 'apartment', 90, 1),
(11, 1, 10.00, 10.00, 2, 'apartment', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `md_apartamento_translation`
--

CREATE TABLE IF NOT EXISTS `md_apartamento_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(200) NOT NULL,
  `copete` text,
  `descripcion` text NOT NULL,
  `lang` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_apartamento_translation`
--

INSERT INTO `md_apartamento_translation` (`id`, `titulo`, `copete`, `descripcion`, `lang`) VALUES
(2, 'Apartamento Graciana', 'Amplio y luminoso apartamento, muy bien ubicado, a pasos del mar y del área comercial. ', 'Este apartamento esta en una típica finca de veraneo de Punta del Este. Esta totalmente reformado y cuenta con un estilo  rústico de la mejor calidad, brindando todo el confort necesario para estadía. \r\nLa cocina es uno de los ambientes que mas se destaca al contar con todo lo necesario para realizar cualquier tipo de comida. Al ser una cocina americana y estar integrada al salón torna el ambiente mas acogedor. Tiene un coqueto balcón y un pequeño patio donde se encuentra la lavadora.\r\nLa habitación  principal tiene una cama king size y es en swuite. La otra habitación tiene dos camas individuales. ', 'es'),
(3, 'Ventisquero', 'Precioso apartamento con la mejor vista, a un paso del mar y del museo de Casapueblo', 'Este apartamento esta ubicado en una zona excepcional, con la mejor vista al mejor atardecer de Punta del este.\r\nApartamento luminoso, funcional, cuenta con una cocina americana integrada al salon y a la terraza frente al mar. \r\nTiene 1 habitacion principal ensuite y otra mas pequeña también ensuite.\r\nLugar ideal para pasar un momento de relax y armonía', 'es'),
(4, 'Casa Pindó', 'Increíble casa sobre el mar, obra del reconocido arquitecto Ravazzani.', 'Esta destacada vivienda en Punta del Diablo, donde no se encuentran muchas como esta, se encuentra en un lugar privilegiado de la zona sobre la duna con vista al mar, ubicada en la Playa de la viuda.\r\nTiene 3 niveles, el nivel inferior es donde se encuentra un gran dormitorio de servicio con living y mesa de ping pong, todo integrado y baño completo. Luego el primer piso que sería la planta baja, encontraremos el salón principal, comedor, cocina totalmente equipada y toilette. En este nivel es donde se encuentra la terraza externa con parrillero y todas las comodidades para disfrutar de un día de playa con el confort de estar en casa. \r\nEl nivel superior cuenta con 3 habitaciones una principal en suite. Otra de invitados  con cama matrimonial, una habitación con 4 camas y un baño completo.Todas las habitaciones tienen su propia estufa a leña.\r\n', 'es'),
(5, 'Chalet Trufa', 'Casa con estilo con vista panorámica al mar en zona muy tranquila.', 'Esta acogedora casa en El Chorro cuenta con una vista panorámica al mar y esta a solo 4 cuadras de la playa. Cuenta con 2 plantas, la inferior donde se encuentran las 3 habitaciones, dos con cama matrimoniales y la otra mas pequeña con una camas individuales. En esta planta también hay un baño completo.\r\nLa planta superior es cómoda y luminosa, tiene una excelente distribución. La cocina esta totalmente equipada y todo esta integrado en un mismo espacio con el comedor y salón principal, donde hay una estufa a leña. Todo este espacio esta rodeado de ventanales de donde puede disfrutar el paisaje, afuera tiene una terraza con parrillero, zona de relax y comedor.\r\nEn el jardín hay un espacio techado con parrilero y otro comedor para festejar cualquier ocasión especial. Esta casa también cuenta con garaje y alarma. ', 'es'),
(6, 'Parquemar I', 'Apartamento en pleno centro de Punta del Este con vistas a la Playa Brava y Playa mansa.\r\n', 'Apartamento muy bien ubicado, a pasos del mar y del centro comercial.\r\nEl apartamento consta de 3 dormitorios, el principal en suite y otro baño mas', 'es'),
(7, 'Parquemar II', 'Apartamento  en la península, en el centro de Punta del Este, mucha luz y vistas a la playa Brava y Mansa.', 'Apartamento muy bien ubicado, cerca del mar y del centro comercial.\r\nA pocos pasos de la estación de autobús, bancos, restaurante, parada de taxi, casinos, etc.\r\nEl apartamento consta de 3 dormitorios, el principal en suite con hidro-masaje. Los otros dormitorios tienen camas individuales y comparten un baño.\r\nAmplio y luminoso gracias a su altura, desde el mismo puede disfrutar de una maravillosa vista de la península.\r\nCocina completa y balcon cerrado de donde puede disfrutar el mar.', 'es'),
(8, 'Cuatro Mares', 'Apartamento en el casco antiguo de Punta del Este con vistas al Faro, zona muy tranquila y cerca del puerto', 'El apartamento consta de 1 habitación con 2 camas, baño, cocina, salòn con sillón cama para 2 personas y terraza con vistas al faro de punta del este y al mar.\r\nLugar ideal para descansar y sentir el ruido del mar, salir a caminar ya que esta a 1 cuadra de la rambla y a 5 del puerto.', 'es'),
(9, 'prueba', '', 'Prueba', 'es'),
(10, 'La serena', '', 'hsjlashfu sah diuahs ishd iuas dfiasñhfd ', 'es'),
(11, 'algo', 'aglo', 'algo', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `md_blocked_users`
--

CREATE TABLE IF NOT EXISTS `md_blocked_users` (
  `md_user_id` int(11) NOT NULL DEFAULT '0',
  `reason` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`md_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_blocked_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_comodidad`
--

CREATE TABLE IF NOT EXISTS `md_comodidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `md_comodidad`
--

INSERT INTO `md_comodidad` (`id`, `imagen`) VALUES
(1, 'aire-acondicionado'),
(2, 'apto-flias'),
(3, 'cable'),
(4, 'calefaccion'),
(5, 'chimenea'),
(6, 'cocina'),
(7, 'desayuno'),
(8, 'discapacitados'),
(9, 'eventos'),
(10, 'fumadores'),
(11, 'garage'),
(12, 'gimnasio'),
(13, 'internet'),
(14, 'jacuzzi'),
(15, 'lavarropa'),
(16, 'mascotas'),
(17, 'piscina'),
(18, 'portero'),
(19, 'tv'),
(20, 'wifi');

-- --------------------------------------------------------

--
-- Table structure for table `md_comodidad_translation`
--

CREATE TABLE IF NOT EXISTS `md_comodidad_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(100) NOT NULL,
  `lang` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_comodidad_translation`
--

INSERT INTO `md_comodidad_translation` (`id`, `nombre`, `lang`) VALUES
(1, 'Aire acondicionado', 'es'),
(2, 'Apto para familias', 'es'),
(3, 'Cable', 'es'),
(4, 'Calefaccion', 'es'),
(5, 'Chimenea', 'es'),
(6, 'Cocina', 'es'),
(7, 'Desayuno', 'es'),
(8, 'Discapacitados', 'es'),
(9, 'Eventos', 'es'),
(10, 'Fumadores', 'es'),
(11, 'Garage', 'es'),
(12, 'Gimnasio', 'es'),
(13, 'Internet', 'es'),
(14, 'Jacuzzi', 'es'),
(15, 'Lavarropa', 'es'),
(16, 'Mascotas', 'es'),
(17, 'Piscina', 'es'),
(18, 'Portero', 'es'),
(19, 'TV', 'es'),
(20, 'WiFi', 'es');

-- --------------------------------------------------------

--
-- Table structure for table `md_content`
--

CREATE TABLE IF NOT EXISTS `md_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_user_id` int(11) NOT NULL,
  `object_class` varchar(128) NOT NULL,
  `object_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `md_user_id_idx` (`md_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=213 ;

--
-- Dumping data for table `md_content`
--

INSERT INTO `md_content` (`id`, `md_user_id`, `object_class`, `object_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'mdUserProfile', 1, '2012-01-19 20:41:32', '2012-01-19 20:41:32'),
(2, 1, 'mdMediaContent', 1, '2012-01-19 21:31:37', '2012-01-19 21:31:37'),
(3, 1, 'mdMediaContent', 2, '2012-01-19 21:32:50', '2012-01-19 21:32:50'),
(4, 1, 'mdMediaContent', 3, '2012-01-19 21:33:35', '2012-01-19 21:33:35'),
(5, 1, 'mdMediaContent', 4, '2012-01-22 18:22:54', '2012-01-22 18:22:54'),
(6, 1, 'mdMediaContent', 5, '2012-01-22 18:23:18', '2012-01-22 18:23:18'),
(7, 1, 'mdMediaContent', 6, '2012-01-22 18:23:44', '2012-01-22 18:23:44'),
(8, 1, 'mdMediaContent', 7, '2012-01-22 18:24:05', '2012-01-22 18:24:05'),
(9, 1, 'mdMediaContent', 8, '2012-01-22 18:24:30', '2012-01-22 18:24:30'),
(10, 1, 'mdMediaContent', 9, '2012-01-22 18:24:53', '2012-01-22 18:24:53'),
(11, 1, 'mdMediaContent', 10, '2012-01-22 18:25:20', '2012-01-22 18:25:20'),
(12, 1, 'mdMediaContent', 11, '2012-01-22 18:25:44', '2012-01-22 18:25:44'),
(13, 1, 'mdMediaContent', 12, '2012-01-22 18:26:01', '2012-01-22 18:26:01'),
(14, 1, 'mdMediaContent', 13, '2012-01-22 18:26:15', '2012-01-22 18:26:15'),
(15, 1, 'mdMediaContent', 14, '2012-01-22 18:26:48', '2012-01-22 18:26:48'),
(18, 1, 'mdMediaContent', 15, '2012-01-31 23:04:41', '2012-01-31 23:04:41'),
(19, 1, 'mdMediaContent', 16, '2012-01-31 23:05:24', '2012-01-31 23:05:24'),
(20, 1, 'mdMediaContent', 17, '2012-01-31 23:06:10', '2012-01-31 23:06:10'),
(21, 1, 'mdMediaContent', 18, '2012-01-31 23:07:06', '2012-01-31 23:07:06'),
(22, 1, 'mdMediaContent', 19, '2012-01-31 23:08:22', '2012-01-31 23:08:22'),
(23, 1, 'mdMediaContent', 20, '2012-01-31 23:10:19', '2012-01-31 23:10:19'),
(24, 1, 'mdMediaContent', 21, '2012-01-31 23:12:50', '2012-01-31 23:12:50'),
(25, 1, 'mdMediaContent', 22, '2012-01-31 23:14:15', '2012-01-31 23:14:15'),
(26, 1, 'mdMediaContent', 23, '2012-02-06 15:25:17', '2012-02-06 15:25:17'),
(27, 1, 'mdMediaContent', 24, '2012-02-06 15:26:57', '2012-02-06 15:26:57'),
(28, 4, 'mdUserProfile', 4, '2012-02-06 16:13:20', '2012-02-06 16:13:20'),
(29, 1, 'mdMediaContent', 25, '2012-02-09 13:50:17', '2012-02-09 13:50:17'),
(30, 1, 'mdMediaContent', 26, '2012-02-09 17:22:39', '2012-02-09 17:22:39'),
(31, 1, 'mdMediaContent', 27, '2012-02-09 17:23:13', '2012-02-09 17:23:13'),
(32, 1, 'mdMediaContent', 28, '2012-02-09 17:27:51', '2012-02-09 17:27:51'),
(33, 1, 'mdMediaContent', 29, '2012-02-09 17:38:16', '2012-02-09 17:38:16'),
(34, 1, 'mdMediaContent', 30, '2012-02-09 17:39:28', '2012-02-09 17:39:28'),
(35, 1, 'mdMediaContent', 31, '2012-02-09 17:46:24', '2012-02-09 17:46:24'),
(36, 1, 'mdMediaContent', 32, '2012-02-09 18:37:24', '2012-02-09 18:37:24'),
(37, 1, 'mdMediaContent', 33, '2012-02-09 18:37:35', '2012-02-09 18:37:35'),
(38, 1, 'mdMediaContent', 34, '2012-02-09 18:37:48', '2012-02-09 18:37:48'),
(39, 1, 'mdMediaContent', 35, '2012-02-09 18:37:59', '2012-02-09 18:37:59'),
(40, 1, 'mdMediaContent', 36, '2012-02-09 18:38:09', '2012-02-09 18:38:09'),
(41, 1, 'mdMediaContent', 37, '2012-02-09 18:38:19', '2012-02-09 18:38:19'),
(42, 1, 'mdMediaContent', 38, '2012-02-09 18:38:30', '2012-02-09 18:38:30'),
(43, 1, 'mdMediaContent', 39, '2012-02-23 17:27:20', '2012-02-23 17:27:20'),
(44, 1, 'mdMediaContent', 40, '2012-02-28 12:19:21', '2012-02-28 12:19:21'),
(45, 1, 'mdMediaContent', 41, '2012-02-29 19:08:29', '2012-02-29 19:08:29'),
(46, 1, 'mdMediaContent', 42, '2012-02-29 19:15:16', '2012-02-29 19:15:16'),
(47, 1, 'mdMediaContent', 43, '2012-02-29 19:18:38', '2012-02-29 19:18:38'),
(48, 1, 'mdMediaContent', 44, '2012-02-29 19:23:11', '2012-02-29 19:23:11'),
(49, 1, 'mdMediaContent', 45, '2012-02-29 20:37:59', '2012-02-29 20:37:59'),
(50, 1, 'mdMediaContent', 46, '2012-02-29 20:51:24', '2012-02-29 20:51:24'),
(51, 1, 'mdMediaContent', 47, '2012-03-01 15:50:43', '2012-03-01 15:50:43'),
(52, 1, 'mdMediaContent', 48, '2012-03-01 15:59:30', '2012-03-01 15:59:30'),
(53, 1, 'mdMediaContent', 49, '2012-03-01 15:59:46', '2012-03-01 15:59:46'),
(54, 1, 'mdMediaContent', 50, '2012-03-01 15:59:54', '2012-03-01 15:59:54'),
(55, 1, 'mdMediaContent', 51, '2012-03-01 15:59:57', '2012-03-01 15:59:57'),
(56, 1, 'mdMediaContent', 52, '2012-03-01 16:10:35', '2012-03-01 16:10:35'),
(57, 1, 'mdMediaContent', 53, '2012-03-01 16:10:40', '2012-03-01 16:10:40'),
(58, 1, 'mdMediaContent', 54, '2012-03-01 16:10:45', '2012-03-01 16:10:45'),
(59, 1, 'mdMediaContent', 55, '2012-03-01 16:44:46', '2012-03-01 16:44:46'),
(60, 1, 'mdMediaContent', 56, '2012-03-01 16:44:51', '2012-03-01 16:44:51'),
(61, 1, 'mdMediaContent', 57, '2012-03-01 16:44:56', '2012-03-01 16:44:56'),
(62, 1, 'mdMediaContent', 58, '2012-03-01 16:45:01', '2012-03-01 16:45:01'),
(63, 1, 'mdMediaContent', 59, '2012-03-01 16:45:06', '2012-03-01 16:45:06'),
(64, 1, 'mdMediaContent', 60, '2012-03-01 16:45:11', '2012-03-01 16:45:11'),
(65, 1, 'mdMediaContent', 61, '2012-03-01 16:45:16', '2012-03-01 16:45:16'),
(66, 1, 'mdMediaContent', 62, '2012-03-01 16:45:21', '2012-03-01 16:45:21'),
(67, 1, 'mdMediaContent', 63, '2012-03-01 16:45:26', '2012-03-01 16:45:26'),
(68, 1, 'mdMediaContent', 64, '2012-03-01 16:45:32', '2012-03-01 16:45:32'),
(69, 1, 'mdMediaContent', 65, '2012-03-01 16:45:36', '2012-03-01 16:45:36'),
(70, 1, 'mdMediaContent', 66, '2012-03-01 16:45:41', '2012-03-01 16:45:41'),
(71, 1, 'mdMediaContent', 67, '2012-03-01 16:45:46', '2012-03-01 16:45:46'),
(72, 1, 'mdMediaContent', 68, '2012-03-01 16:45:51', '2012-03-01 16:45:51'),
(73, 1, 'mdMediaContent', 69, '2012-03-01 16:45:57', '2012-03-01 16:45:57'),
(74, 1, 'mdMediaContent', 70, '2012-03-01 17:10:04', '2012-03-01 17:10:04'),
(75, 1, 'mdMediaContent', 71, '2012-03-01 17:10:09', '2012-03-01 17:10:09'),
(76, 1, 'mdMediaContent', 72, '2012-03-01 17:10:14', '2012-03-01 17:10:14'),
(77, 1, 'mdMediaContent', 73, '2012-03-01 17:10:19', '2012-03-01 17:10:19'),
(78, 1, 'mdMediaContent', 74, '2012-03-01 17:10:20', '2012-03-01 17:10:20'),
(79, 1, 'mdMediaContent', 75, '2012-03-01 17:10:22', '2012-03-01 17:10:22'),
(80, 1, 'mdMediaContent', 76, '2012-03-01 17:10:23', '2012-03-01 17:10:23'),
(81, 1, 'mdMediaContent', 77, '2012-03-01 17:10:25', '2012-03-01 17:10:25'),
(82, 1, 'mdMediaContent', 78, '2012-03-01 17:20:23', '2012-03-01 17:20:23'),
(83, 1, 'mdMediaContent', 79, '2012-03-01 17:20:28', '2012-03-01 17:20:28'),
(84, 1, 'mdMediaContent', 80, '2012-03-01 17:20:32', '2012-03-01 17:20:32'),
(85, 1, 'mdMediaContent', 81, '2012-03-01 17:20:39', '2012-03-01 17:20:39'),
(86, 1, 'mdMediaContent', 82, '2012-03-01 17:20:45', '2012-03-01 17:20:45'),
(87, 1, 'mdMediaContent', 83, '2012-03-01 17:20:52', '2012-03-01 17:20:52'),
(88, 1, 'mdMediaContent', 84, '2012-03-01 17:20:58', '2012-03-01 17:20:58'),
(89, 1, 'mdMediaContent', 85, '2012-03-01 18:24:35', '2012-03-01 18:24:35'),
(90, 1, 'mdMediaContent', 86, '2012-03-01 18:24:37', '2012-03-01 18:24:37'),
(91, 1, 'mdMediaContent', 87, '2012-03-01 18:24:40', '2012-03-01 18:24:40'),
(92, 1, 'mdMediaContent', 88, '2012-03-01 18:24:42', '2012-03-01 18:24:42'),
(93, 1, 'mdMediaContent', 89, '2012-03-02 10:32:05', '2012-03-02 10:32:05'),
(94, 1, 'mdMediaContent', 90, '2012-03-02 20:17:15', '2012-03-02 20:17:15'),
(95, 1, 'mdMediaContent', 91, '2012-03-02 20:17:17', '2012-03-02 20:17:17'),
(96, 1, 'mdMediaContent', 92, '2012-03-02 20:17:19', '2012-03-02 20:17:19'),
(97, 1, 'mdMediaContent', 93, '2012-03-02 20:17:21', '2012-03-02 20:17:21'),
(98, 1, 'mdMediaContent', 94, '2012-03-02 20:17:23', '2012-03-02 20:17:23'),
(99, 1, 'mdMediaContent', 95, '2012-03-02 20:17:25', '2012-03-02 20:17:25'),
(100, 1, 'mdMediaContent', 96, '2012-03-02 20:17:28', '2012-03-02 20:17:28'),
(101, 1, 'mdMediaContent', 97, '2012-03-02 20:17:30', '2012-03-02 20:17:30'),
(102, 1, 'mdMediaContent', 98, '2012-03-02 20:20:49', '2012-03-02 20:20:49'),
(103, 1, 'mdMediaContent', 99, '2012-03-02 20:20:51', '2012-03-02 20:20:51'),
(104, 1, 'mdMediaContent', 100, '2012-03-02 20:28:00', '2012-03-02 20:28:00'),
(105, 1, 'mdMediaContent', 101, '2012-03-02 20:28:02', '2012-03-02 20:28:02'),
(106, 5, 'mdUserProfile', 5, '2012-03-09 11:30:52', '2012-03-09 11:30:52'),
(107, 1, 'mdMediaContent', 102, '2012-03-09 19:35:16', '2012-03-09 19:35:16'),
(108, 1, 'mdMediaContent', 103, '2012-03-09 19:36:16', '2012-03-09 19:36:16'),
(109, 1, 'mdMediaContent', 104, '2012-03-09 19:38:21', '2012-03-09 19:38:21'),
(110, 1, 'mdMediaContent', 105, '2012-03-09 19:39:03', '2012-03-09 19:39:03'),
(111, 1, 'mdMediaContent', 106, '2012-03-09 21:39:50', '2012-03-09 21:39:50'),
(112, 1, 'mdMediaContent', 107, '2012-03-09 21:43:19', '2012-03-09 21:43:19'),
(113, 1, 'mdMediaContent', 108, '2012-03-09 21:43:33', '2012-03-09 21:43:33'),
(115, 7, 'mdUserProfile', 7, '2012-03-21 22:08:59', '2012-03-21 22:08:59'),
(116, 8, 'mdUserProfile', 8, '2012-03-22 18:08:54', '2012-03-22 18:08:54'),
(117, 1, 'mdMediaContent', 109, '2012-03-22 18:54:57', '2012-03-22 18:54:57'),
(118, 1, 'mdMediaContent', 110, '2012-03-22 18:55:44', '2012-03-22 18:55:44'),
(119, 1, 'mdMediaContent', 111, '2012-03-22 18:56:33', '2012-03-22 18:56:33'),
(120, 1, 'mdMediaContent', 112, '2012-03-22 18:57:37', '2012-03-22 18:57:37'),
(121, 1, 'mdMediaContent', 113, '2012-03-22 18:58:27', '2012-03-22 18:58:27'),
(122, 1, 'mdMediaContent', 114, '2012-03-22 18:59:15', '2012-03-22 18:59:15'),
(123, 1, 'mdMediaContent', 115, '2012-03-22 19:00:09', '2012-03-22 19:00:09'),
(124, 1, 'mdMediaContent', 116, '2012-03-22 19:00:46', '2012-03-22 19:00:46'),
(125, 1, 'mdMediaContent', 117, '2012-03-22 19:01:15', '2012-03-22 19:01:15'),
(126, 1, 'mdMediaContent', 118, '2012-03-22 19:02:13', '2012-03-22 19:02:13'),
(127, 1, 'mdMediaContent', 119, '2012-03-22 19:02:55', '2012-03-22 19:02:55'),
(128, 1, 'mdMediaContent', 120, '2012-03-22 19:03:39', '2012-03-22 19:03:39'),
(129, 1, 'mdMediaContent', 121, '2012-03-22 19:04:29', '2012-03-22 19:04:29'),
(130, 1, 'mdMediaContent', 122, '2012-03-22 19:05:23', '2012-03-22 19:05:23'),
(131, 1, 'mdMediaContent', 123, '2012-03-22 19:06:16', '2012-03-22 19:06:16'),
(132, 1, 'mdMediaContent', 124, '2012-03-22 19:07:23', '2012-03-22 19:07:23'),
(133, 1, 'mdMediaContent', 125, '2012-03-25 13:55:44', '2012-03-25 13:55:44'),
(134, 1, 'mdMediaContent', 126, '2012-03-25 13:56:40', '2012-03-25 13:56:40'),
(135, 1, 'mdMediaContent', 127, '2012-03-25 13:57:22', '2012-03-25 13:57:22'),
(136, 1, 'mdMediaContent', 128, '2012-03-25 13:58:04', '2012-03-25 13:58:04'),
(137, 1, 'mdMediaContent', 129, '2012-03-25 13:58:42', '2012-03-25 13:58:42'),
(138, 1, 'mdMediaContent', 130, '2012-03-25 13:59:38', '2012-03-25 13:59:38'),
(139, 1, 'mdMediaContent', 131, '2012-03-25 14:00:18', '2012-03-25 14:00:18'),
(140, 1, 'mdMediaContent', 132, '2012-03-25 14:01:01', '2012-03-25 14:01:01'),
(141, 1, 'mdMediaContent', 133, '2012-03-25 14:01:51', '2012-03-25 14:01:51'),
(142, 1, 'mdMediaContent', 134, '2012-03-25 14:02:40', '2012-03-25 14:02:40'),
(143, 1, 'mdMediaContent', 135, '2012-03-25 14:03:44', '2012-03-25 14:03:44'),
(144, 1, 'mdMediaContent', 136, '2012-03-25 16:40:11', '2012-03-25 16:40:11'),
(145, 1, 'mdMediaContent', 137, '2012-03-25 17:22:42', '2012-03-25 17:22:42'),
(146, 1, 'mdMediaContent', 138, '2012-03-25 17:23:40', '2012-03-25 17:23:40'),
(147, 1, 'mdMediaContent', 139, '2012-03-25 17:24:29', '2012-03-25 17:24:29'),
(148, 1, 'mdMediaContent', 140, '2012-03-25 17:25:38', '2012-03-25 17:25:38'),
(149, 1, 'mdMediaContent', 141, '2012-03-25 17:26:41', '2012-03-25 17:26:41'),
(150, 1, 'mdMediaContent', 142, '2012-03-25 17:27:15', '2012-03-25 17:27:15'),
(151, 1, 'mdMediaContent', 143, '2012-03-25 17:28:07', '2012-03-25 17:28:07'),
(152, 1, 'mdMediaContent', 144, '2012-03-25 17:28:55', '2012-03-25 17:28:55'),
(153, 1, 'mdMediaContent', 145, '2012-03-25 17:29:43', '2012-03-25 17:29:43'),
(154, 1, 'mdMediaContent', 146, '2012-03-25 17:30:27', '2012-03-25 17:30:27'),
(155, 1, 'mdMediaContent', 147, '2012-03-25 17:31:08', '2012-03-25 17:31:08'),
(156, 1, 'mdMediaContent', 148, '2012-03-25 17:31:59', '2012-03-25 17:31:59'),
(157, 1, 'mdMediaContent', 149, '2012-03-25 17:32:44', '2012-03-25 17:32:44'),
(158, 1, 'mdMediaContent', 150, '2012-03-25 17:33:38', '2012-03-25 17:33:38'),
(159, 1, 'mdMediaContent', 151, '2012-03-25 17:58:28', '2012-03-25 17:58:28'),
(160, 1, 'mdMediaContent', 152, '2012-03-25 17:59:21', '2012-03-25 17:59:21'),
(161, 1, 'mdMediaContent', 153, '2012-03-25 18:00:11', '2012-03-25 18:00:11'),
(162, 1, 'mdMediaContent', 154, '2012-03-25 18:00:51', '2012-03-25 18:00:51'),
(163, 1, 'mdMediaContent', 155, '2012-03-25 18:01:31', '2012-03-25 18:01:31'),
(164, 1, 'mdMediaContent', 156, '2012-03-25 18:02:07', '2012-03-25 18:02:07'),
(165, 1, 'mdMediaContent', 157, '2012-03-25 18:02:46', '2012-03-25 18:02:46'),
(166, 1, 'mdMediaContent', 158, '2012-03-25 18:03:35', '2012-03-25 18:03:35'),
(167, 1, 'mdMediaContent', 159, '2012-03-25 18:04:33', '2012-03-25 18:04:33'),
(168, 1, 'mdMediaContent', 160, '2012-03-25 18:05:21', '2012-03-25 18:05:21'),
(169, 1, 'mdMediaContent', 161, '2012-03-25 18:06:09', '2012-03-25 18:06:09'),
(170, 9, 'mdUserProfile', 9, '2012-03-25 18:55:56', '2012-03-25 18:55:56'),
(171, 10, 'mdUserProfile', 10, '2012-03-25 19:19:43', '2012-03-25 19:19:43'),
(172, 11, 'mdUserProfile', 11, '2012-03-26 10:47:17', '2012-03-26 10:47:17'),
(173, 1, 'mdMediaContent', 162, '2012-03-26 14:21:22', '2012-03-26 14:21:22'),
(174, 1, 'mdMediaContent', 163, '2012-03-26 14:33:44', '2012-03-26 14:33:44'),
(175, 1, 'mdMediaContent', 164, '2012-03-26 14:34:05', '2012-03-26 14:34:05'),
(176, 1, 'mdMediaContent', 165, '2012-04-10 18:38:24', '2012-04-10 18:38:24'),
(177, 1, 'mdMediaContent', 166, '2012-04-10 18:38:42', '2012-04-10 18:38:42'),
(178, 1, 'mdMediaContent', 167, '2012-04-10 18:38:59', '2012-04-10 18:38:59'),
(179, 1, 'mdMediaContent', 168, '2012-04-10 18:39:11', '2012-04-10 18:39:11'),
(180, 1, 'mdMediaContent', 169, '2012-04-10 18:39:26', '2012-04-10 18:39:26'),
(181, 1, 'mdMediaContent', 170, '2012-04-10 18:39:40', '2012-04-10 18:39:40'),
(182, 1, 'mdMediaContent', 171, '2012-04-10 18:39:51', '2012-04-10 18:39:51'),
(183, 1, 'mdMediaContent', 172, '2012-04-10 18:40:09', '2012-04-10 18:40:09'),
(184, 1, 'mdMediaContent', 173, '2012-04-10 18:40:26', '2012-04-10 18:40:26'),
(185, 1, 'mdMediaContent', 174, '2012-04-10 18:40:42', '2012-04-10 18:40:42'),
(186, 1, 'mdMediaContent', 175, '2012-04-10 18:40:57', '2012-04-10 18:40:57'),
(187, 1, 'mdMediaContent', 176, '2012-04-10 18:41:17', '2012-04-10 18:41:17'),
(188, 1, 'mdMediaContent', 177, '2012-04-10 18:41:31', '2012-04-10 18:41:31'),
(189, 1, 'mdMediaContent', 178, '2012-04-10 18:41:48', '2012-04-10 18:41:48'),
(190, 1, 'mdMediaContent', 179, '2012-04-10 18:42:06', '2012-04-10 18:42:06'),
(191, 1, 'mdMediaContent', 180, '2012-04-10 18:42:18', '2012-04-10 18:42:18'),
(192, 1, 'mdMediaContent', 181, '2012-04-10 18:42:32', '2012-04-10 18:42:32'),
(193, 1, 'mdMediaContent', 182, '2012-04-10 18:42:44', '2012-04-10 18:42:44'),
(194, 1, 'mdMediaContent', 183, '2012-04-10 18:43:09', '2012-04-10 18:43:09'),
(195, 1, 'mdMediaContent', 184, '2012-04-10 18:43:23', '2012-04-10 18:43:23'),
(196, 1, 'mdMediaContent', 185, '2012-04-10 18:44:06', '2012-04-10 18:44:06'),
(197, 1, 'mdMediaContent', 186, '2012-04-10 18:44:29', '2012-04-10 18:44:29'),
(198, 1, 'mdMediaContent', 187, '2012-04-10 18:44:40', '2012-04-10 18:44:40'),
(199, 1, 'mdMediaContent', 188, '2012-04-10 18:45:29', '2012-04-10 18:45:29'),
(200, 12, 'mdUserProfile', 12, '2012-05-08 10:31:19', '2012-05-08 10:31:19'),
(201, 1, 'mdMediaContent', 189, '2012-05-31 15:31:56', '2012-05-31 15:31:56'),
(202, 1, 'mdMediaContent', 190, '2012-05-31 15:31:59', '2012-05-31 15:31:59'),
(203, 1, 'mdMediaContent', 191, '2012-05-31 15:32:03', '2012-05-31 15:32:03'),
(204, 1, 'mdMediaContent', 192, '2012-05-31 15:32:06', '2012-05-31 15:32:06'),
(205, 1, 'mdMediaContent', 193, '2012-05-31 15:36:07', '2012-05-31 15:36:07'),
(206, 1, 'mdMediaContent', 194, '2012-05-31 15:44:01', '2012-05-31 15:44:01'),
(207, 1, 'mdMediaContent', 195, '2012-05-31 15:44:09', '2012-05-31 15:44:09'),
(208, 1, 'mdMediaContent', 196, '2012-05-31 15:44:29', '2012-05-31 15:44:29'),
(209, 1, 'mdMediaContent', 197, '2012-06-02 22:28:29', '2012-06-02 22:28:29'),
(210, 1, 'mdMediaContent', 198, '2012-06-02 22:28:31', '2012-06-02 22:28:31'),
(211, 13, 'mdUserProfile', 13, '2012-06-06 09:01:08', '2012-06-06 09:01:08'),
(212, 14, 'mdUserProfile', 14, '2012-07-06 13:03:54', '2012-07-06 13:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `md_content_relation`
--

CREATE TABLE IF NOT EXISTS `md_content_relation` (
  `md_content_id_first` int(11) NOT NULL DEFAULT '0',
  `md_content_id_second` int(11) NOT NULL DEFAULT '0',
  `object_class_name` varchar(128) NOT NULL,
  `profile_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`md_content_id_first`,`md_content_id_second`),
  KEY `md_content_relation_md_content_id_second_md_content_id` (`md_content_id_second`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_content_relation`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_currency`
--

CREATE TABLE IF NOT EXISTS `md_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(16) DEFAULT NULL,
  `symbol` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `md_currency`
--

INSERT INTO `md_currency` (`id`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'EUR', '€', '2012-01-19 20:41:32', '2012-01-19 20:41:32'),
(2, 'USD', 'U$S', '2012-01-19 20:41:32', '2012-01-19 20:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `md_currency_convertion`
--

CREATE TABLE IF NOT EXISTS `md_currency_convertion` (
  `currency_from` int(11) NOT NULL DEFAULT '0',
  `currency_to` int(11) NOT NULL DEFAULT '0',
  `ratio` double(18,8) NOT NULL,
  PRIMARY KEY (`currency_from`,`currency_to`),
  KEY `md_currency_convertion_currency_to_md_currency_id` (`currency_to`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_currency_convertion`
--

INSERT INTO `md_currency_convertion` (`currency_from`, `currency_to`, `ratio`) VALUES
(1, 2, 1.30180000),
(2, 1, 0.76816715);

-- --------------------------------------------------------

--
-- Table structure for table `md_currency_translation`
--

CREATE TABLE IF NOT EXISTS `md_currency_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `lang` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_currency_translation`
--

INSERT INTO `md_currency_translation` (`id`, `name`, `lang`) VALUES
(1, 'Euros', 'en'),
(1, 'euros', 'es'),
(2, 'Dolar', 'en'),
(2, 'Dolar', 'es');

-- --------------------------------------------------------

--
-- Table structure for table `md_detalle`
--

CREATE TABLE IF NOT EXISTS `md_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_apartamento_id` int(11) NOT NULL DEFAULT '0',
  `tipo_propiedad` enum('apartment','house','bedNbreakfast','cabin','villa','castle','dorm','treehouse','boat','automobile','igloo') DEFAULT NULL,
  `cuartos` int(11) DEFAULT NULL,
  `banios` int(11) DEFAULT NULL,
  `costo_extra` float(18,2) DEFAULT '0.00',
  `minimo_dias` int(11) DEFAULT '1',
  `barrio` varchar(100) DEFAULT NULL,
  `metraje` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`md_apartamento_id`),
  KEY `md_detalle_md_apartamento_id_md_apartamento_id` (`md_apartamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `md_detalle`
--

INSERT INTO `md_detalle` (`id`, `md_apartamento_id`, `tipo_propiedad`, `cuartos`, `banios`, `costo_extra`, `minimo_dias`, `barrio`, `metraje`) VALUES
(2, 2, 'apartment', 2, 2, 0.00, 2, 'La Brava, Parada 5', '110'),
(3, 3, 'apartment', 2, 2, 0.00, 2, 'Punta Ballena', '100'),
(4, 4, 'house', 4, 4, 0.00, 1, '', '200'),
(5, 5, 'house', 3, 2, 0.00, 3, 'El Chorro', '150'),
(6, 6, 'apartment', 3, 2, 0.00, 2, 'Centro', '150'),
(7, 7, 'apartment', 3, 2, 0.00, 1, 'Centro', '160'),
(8, 8, 'apartment', 1, 1, 0.00, 2, 'Peninsula', '90'),
(9, 11, 'apartment', 2, 1, 0.00, 1, '3', '4');

-- --------------------------------------------------------

--
-- Table structure for table `md_disponibilidad`
--

CREATE TABLE IF NOT EXISTS `md_disponibilidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_apartamento_id` int(11) NOT NULL,
  `fecha_desde` datetime NOT NULL,
  `fecha_hasta` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `md_apartamento_id_idx` (`md_apartamento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_disponibilidad`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_generic_payment`
--

CREATE TABLE IF NOT EXISTS `md_generic_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_class` varchar(128) NOT NULL,
  `object_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `md_generic_payment`
--

INSERT INTO `md_generic_payment` (`id`, `object_class`, `object_id`, `created_at`, `updated_at`) VALUES
(1, 'mdGenericPaymentPaypal', 1, '2012-03-25 18:38:25', '2012-03-25 18:38:25'),
(2, 'mdGenericPaymentPaypal', 2, '2012-03-26 20:06:32', '2012-03-26 20:06:32'),
(3, 'mdGenericPaymentPaypal', 3, '2012-07-06 13:22:12', '2012-07-06 13:22:12'),
(4, 'mdGenericPaymentPaypal', 4, '2012-07-13 11:49:49', '2012-07-13 11:49:49'),
(5, 'mdGenericPaymentPaypal', 5, '2012-07-13 11:51:45', '2012-07-13 11:51:45'),
(6, 'mdGenericPaymentPaypal', 6, '2012-07-13 11:52:27', '2012-07-13 11:52:27'),
(7, 'mdGenericPaymentPaypal', 7, '2012-07-13 11:57:48', '2012-07-13 11:57:48'),
(8, 'mdGenericPaymentPaypal', 8, '2012-07-13 11:58:12', '2012-07-13 11:58:12'),
(9, 'mdGenericPaymentPaypal', 9, '2012-07-13 13:35:09', '2012-07-13 13:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `md_generic_payment_abitab`
--

CREATE TABLE IF NOT EXISTS `md_generic_payment_abitab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_generic_payment_abitab`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_generic_payment_giro_bancario`
--

CREATE TABLE IF NOT EXISTS `md_generic_payment_giro_bancario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_generic_payment_giro_bancario`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_generic_payment_other`
--

CREATE TABLE IF NOT EXISTS `md_generic_payment_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_generic_payment_other`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_generic_payment_paypal`
--

CREATE TABLE IF NOT EXISTS `md_generic_payment_paypal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(128) DEFAULT NULL,
  `payerid` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `md_generic_payment_paypal`
--

INSERT INTO `md_generic_payment_paypal` (`id`, `token`, `payerid`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL),
(4, NULL, NULL),
(5, NULL, NULL),
(6, NULL, NULL),
(7, NULL, NULL),
(8, NULL, NULL),
(9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_generic_payment_western`
--

CREATE TABLE IF NOT EXISTS `md_generic_payment_western` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_generic_payment_western`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_generic_sale`
--

CREATE TABLE IF NOT EXISTS `md_generic_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_user_id` int(11) NOT NULL,
  `price` float(6,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `md_payment_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `md_user_id_idx` (`md_user_id`),
  KEY `md_payment_id_idx` (`md_payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `md_generic_sale`
--

INSERT INTO `md_generic_sale` (`id`, `md_user_id`, `price`, `status`, `md_payment_id`, `created_at`, `updated_at`) VALUES
(1, 7, 900.00, 0, 1, '2012-03-25 18:38:25', '2012-03-25 18:38:25'),
(2, 9, 4000.00, 0, 2, '2012-03-26 20:06:32', '2012-03-26 20:06:32'),
(3, 14, 400.00, 0, 3, '2012-07-06 13:22:12', '2012-07-06 13:22:12'),
(4, 14, 1800.00, 0, 4, '2012-07-13 11:49:49', '2012-07-13 11:49:49'),
(5, 14, 1800.00, 0, 5, '2012-07-13 11:51:45', '2012-07-13 11:51:45'),
(6, 14, 1800.00, 0, 6, '2012-07-13 11:52:27', '2012-07-13 11:52:27'),
(7, 14, 1800.00, 0, 7, '2012-07-13 11:57:48', '2012-07-13 11:57:48'),
(8, 14, 1800.00, 2, 8, '2012-07-13 11:58:12', '2012-07-13 12:00:20'),
(9, 14, 1380.00, 0, 9, '2012-07-13 13:35:09', '2012-07-13 13:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `md_generic_sale_item`
--

CREATE TABLE IF NOT EXISTS `md_generic_sale_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `object_class` varchar(128) NOT NULL,
  `md_generic_sale_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `md_generic_sale_id_idx` (`md_generic_sale_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `md_generic_sale_item`
--

INSERT INTO `md_generic_sale_item` (`id`, `object_id`, `object_class`, `md_generic_sale_id`) VALUES
(1, 1, 'mdReserva', 1),
(2, 2, 'mdReserva', 2),
(3, 3, 'mdReserva', 3),
(4, 4, 'mdReserva', 4),
(5, 5, 'mdReserva', 5),
(6, 6, 'mdReserva', 6),
(7, 7, 'mdReserva', 7),
(8, 8, 'mdReserva', 8),
(9, 9, 'mdReserva', 9);

-- --------------------------------------------------------

--
-- Table structure for table `md_google_map`
--

CREATE TABLE IF NOT EXISTS `md_google_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_class_name` varchar(128) NOT NULL,
  `object_id` int(11) NOT NULL,
  `latitude` decimal(18,4) NOT NULL DEFAULT '0.0000',
  `longitude` decimal(18,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_identifier_index_idx` (`object_class_name`,`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `md_google_map`
--

INSERT INTO `md_google_map` (`id`, `object_class_name`, `object_id`, `latitude`, `longitude`) VALUES
(1, 'mdApartamento', 2, '-34.9419', '-54.9311'),
(2, 'mdApartamento', 5, '-34.9017', '-54.8124'),
(3, 'mdApartamento', 3, '-34.9075', '-55.0448'),
(4, 'mdApartamento', 6, '-34.9562', '-54.9373'),
(5, 'mdApartamento', 7, '-34.9556', '-54.9371'),
(6, 'mdApartamento', 8, '-34.9724', '-54.9520'),
(7, 'mdApartamento', 11, '-34.9471', '-54.9317');

-- --------------------------------------------------------

--
-- Table structure for table `md_locacion`
--

CREATE TABLE IF NOT EXISTS `md_locacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `md_locacion`
--

INSERT INTO `md_locacion` (`id`, `country`) VALUES
(1, 'UY'),
(2, 'UY');

-- --------------------------------------------------------

--
-- Table structure for table `md_locacion_temporada`
--

CREATE TABLE IF NOT EXISTS `md_locacion_temporada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_locacion_id` int(11) NOT NULL,
  `dia_desde` int(11) NOT NULL,
  `mes_desde` int(11) NOT NULL,
  `dia_hasta` int(11) NOT NULL,
  `mes_hasta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `md_locacion_id_idx` (`md_locacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `md_locacion_temporada`
--

INSERT INTO `md_locacion_temporada` (`id`, `md_locacion_id`, `dia_desde`, `mes_desde`, `dia_hasta`, `mes_hasta`) VALUES
(13, 1, 25, 12, 28, 2),
(14, 1, 1, 4, 8, 4),
(15, 2, 25, 12, 28, 2),
(16, 2, 1, 4, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `md_locacion_translation`
--

CREATE TABLE IF NOT EXISTS `md_locacion_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `lang` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_locacion_translation`
--

INSERT INTO `md_locacion_translation` (`id`, `nombre`, `descripcion`, `lang`) VALUES
(1, 'Punta del Este', 'Destino selecto y versátil. La ciudad de Punta del Este, entre otras cosas, es reconocida mundialmente como el más importante y exclusivo balneario de América del Sur. Durante todo el año atrae con su estilo y belleza natural a turistas de todas partes del mundo. \r\nBalneario de verano por excelencia, natural y sofisticado, las playas de Punta del Este se reparten entre la tranquila playa mansa, la fuerza de la playa brava elegida por los surfistas, el encanto de Solanas donde se encuentran los mejores atardeceres y la pintoresca Barra. La Península es una invitación al placer y al regocijo. El puerto con mas de 400 amarras es sede de regatas internacionales, desde allí se pueden realizar paseos a la isla Gorriti y a la isla de Lobos, donde se puede practicar buceo con lobos marinos.\r\nLugares de ocio. A la clásica avenida Gorlero se le suma la Calle 20, repleta de tiendas de marcas internacionales con las últimas tendencias de las capitales de la moda. La propuesta gourmet propone delicias autóctonas y una amplia variedad de sabores de la cocina mundial. La vida nocturna se reparte en discotecas, bares y exclusivas fiestas privadas. Además cuenta con un gran centro de compras, El Punta Shopping que ofrece una gran variedad de productos de calidad. Para los amantes del juego, Punta del Este cuenta con una gran variedad de casinos, destacando se por encima de todos ellos el Conrad Punta del Este Resort & Casino.\r\nCiudad del arte. Comenzando por Casa Pueblo, la mítica escultura-casa del uruguayo Carlos Páez Vilaró, donde usted podrá  visitar su atellier recorriendo su obra de mas de 50 años de trayectoria, también podrá disfrutar en su taberna los mejores atardeceres de la zona. La ruta del arte se esparce en varios puntos de la ciudad, haciendo hincapié en La Barra donde se pueden ver los atelliers y galerías de numerosos artistas.', 'es'),
(2, 'Punta Del Diablo', 'Uruguay ofrece al turismo paradisiacos lugares que jamás olvidaran y en Punta del Diablo, un pintoresco pueblo de pescadores donde los visitantes podrán contactar con la naturaleza y encontrar en ella un verdadero alimento para el alma y el espíritu.\r\nEsta ciudad uruguaya  se está convirtiendo en un destino para todos los gustos turísticos, ya que ofrece una amplia gama de posibilidades para disfrutar, desde el atractivo familiar por su tranquilidad, hasta la aventura que este lugar fuera de lo común ofrece al turismo internacional.\r\nSi bien Punta del Diablo en verano ofrece clubes nocturnos y distracciones citadinas, los visitantes podrán relajarse y descansar en un ambiente pacífico, así como acceder a distintas atracciones históricas como el Fuerte de San Miguel y naturales como el Parque Nacional Santa Teresa.\r\nLa ciudad concentra la mayor afluencia turística entre los meses de diciembre y Febrero, fechas en las que arriban miles de turistas, que si bien no cuentan con hoteles de lujo o restaurantes de alto nivel, el encanto natural y ambiente casual los enamora.\r\nEl alojamiento en Punta del Diablo  se resume a un centro de acogida, el alquiler de cabañas o un apartamento pequeño, todos a un moderado costo económico que se traduce en otro atractivo para el visitante, que cuenta con panadería y supermercado en el centro de la ciudad, para el autoabastecimiento. Así como también si gustan de la pesca pueden conseguir su propia comida gratis o recurrir a los pescadores locales también venden su pescado y marisco frescos.\r\nEntre las actividades deportivas en Punta del Diablo Uruguay se puede optar por el Surf, la pesca, la natación y la exploración del entorno costero caminando o a caballo, que en sí es una hermosa aventura en este maravilloso lugar.', 'es');

-- --------------------------------------------------------

--
-- Table structure for table `md_media`
--

CREATE TABLE IF NOT EXISTS `md_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_class_name` varchar(128) NOT NULL,
  `object_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `md_media_index_idx` (`object_class_name`,`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `md_media`
--

INSERT INTO `md_media` (`id`, `object_class_name`, `object_id`) VALUES
(4, 'mdApartamento', 1),
(3, 'mdApartamento', 2),
(5, 'mdApartamento', 3),
(7, 'mdApartamento', 4),
(8, 'mdApartamento', 5),
(9, 'mdApartamento', 6),
(10, 'mdApartamento', 7),
(11, 'mdApartamento', 8),
(12, 'mdApartamento', 9),
(13, 'mdApartamento', 10),
(14, 'mdApartamento', 11),
(1, 'mdLocacion', 1),
(6, 'mdLocacion', 2);

-- --------------------------------------------------------

--
-- Table structure for table `md_media_album`
--

CREATE TABLE IF NOT EXISTS `md_media_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_media_id` int(11) DEFAULT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` enum('Image','Video','File','Mixed') DEFAULT 'Mixed',
  `deleteallowed` tinyint(1) NOT NULL,
  `md_media_content_id` int(11) DEFAULT NULL,
  `counter_content` bigint(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `md_media_album_title_index_idx` (`md_media_id`,`title`),
  KEY `md_media_content_id_idx` (`md_media_content_id`),
  KEY `md_media_id_idx` (`md_media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `md_media_album`
--

INSERT INTO `md_media_album` (`id`, `md_media_id`, `title`, `description`, `type`, `deleteallowed`, `md_media_content_id`, `counter_content`) VALUES
(1, 1, 'promos', 'Album para los promocionales', 'Mixed', 0, 193, 5),
(2, 1, 'default', '', 'Mixed', 0, 71, 12),
(4, 3, 'default', '', 'Mixed', 0, 178, 17),
(5, 5, 'default', '', 'Mixed', 0, 35, 7),
(6, 6, 'promos', 'Album para los promocionales', 'Mixed', 0, NULL, 0),
(7, 6, 'default', '', 'Mixed', 0, 49, 7),
(8, 7, 'default', '', 'Mixed', 0, 55, 15),
(9, 8, 'default', '', 'Mixed', 0, 86, 15),
(10, 9, 'default', '', 'Mixed', 0, 151, 11),
(11, 10, 'default', '', 'Mixed', 0, 125, 12),
(12, 11, 'default', '', 'Mixed', 0, 137, 12),
(13, 12, 'default', '', 'Mixed', 0, NULL, 0),
(14, 13, 'default', '', 'Mixed', 0, NULL, 0),
(15, 14, 'default', '', 'Mixed', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `md_media_album_content`
--

CREATE TABLE IF NOT EXISTS `md_media_album_content` (
  `md_media_album_id` int(11) NOT NULL DEFAULT '0',
  `md_media_content_id` int(11) NOT NULL DEFAULT '0',
  `object_class_name` varchar(128) NOT NULL,
  `priority` bigint(20) NOT NULL,
  PRIMARY KEY (`md_media_album_id`,`md_media_content_id`),
  KEY `md_media_album_content_index_idx` (`priority`),
  KEY `md_media_album_content_md_media_content_id_md_media_content_id` (`md_media_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_media_album_content`
--

INSERT INTO `md_media_album_content` (`md_media_album_id`, `md_media_content_id`, `object_class_name`, `priority`) VALUES
(1, 193, 'mdMediaImage', 0),
(1, 195, 'mdMediaImage', 0),
(1, 196, 'mdMediaImage', 0),
(1, 197, 'mdMediaImage', 0),
(1, 198, 'mdMediaImage', 0),
(2, 44, 'mdMediaImage', 13),
(2, 70, 'mdMediaImage', 12),
(2, 71, 'mdMediaImage', 11),
(2, 72, 'mdMediaImage', 9),
(2, 73, 'mdMediaImage', 8),
(2, 78, 'mdMediaImage', 6),
(2, 79, 'mdMediaImage', 5),
(2, 80, 'mdMediaImage', 10),
(2, 81, 'mdMediaImage', 7),
(2, 82, 'mdMediaImage', 4),
(2, 83, 'mdMediaImage', 1),
(2, 84, 'mdMediaImage', 2),
(4, 163, 'mdMediaImage', 15),
(4, 164, 'mdMediaImage', 16),
(4, 165, 'mdMediaImage', 17),
(4, 166, 'mdMediaImage', 5),
(4, 167, 'mdMediaImage', 1),
(4, 168, 'mdMediaImage', 10),
(4, 170, 'mdMediaImage', 11),
(4, 171, 'mdMediaImage', 12),
(4, 172, 'mdMediaImage', 13),
(4, 174, 'mdMediaImage', 14),
(4, 175, 'mdMediaImage', 9),
(4, 176, 'mdMediaImage', 8),
(4, 178, 'mdMediaImage', 3),
(4, 180, 'mdMediaImage', 4),
(4, 183, 'mdMediaImage', 2),
(4, 186, 'mdMediaImage', 6),
(4, 187, 'mdMediaImage', 7),
(5, 32, 'mdMediaImage', 7),
(5, 33, 'mdMediaImage', 5),
(5, 34, 'mdMediaImage', 6),
(5, 35, 'mdMediaImage', 1),
(5, 36, 'mdMediaImage', 4),
(5, 37, 'mdMediaImage', 3),
(5, 38, 'mdMediaImage', 2),
(7, 48, 'mdMediaImage', 3),
(7, 49, 'mdMediaImage', 1),
(7, 52, 'mdMediaImage', 2),
(7, 53, 'mdMediaImage', 4),
(7, 54, 'mdMediaImage', 5),
(7, 89, 'mdMediaImage', 0),
(7, 106, 'mdMediaImage', 0),
(8, 55, 'mdMediaImage', 0),
(8, 56, 'mdMediaImage', 0),
(8, 57, 'mdMediaImage', 0),
(8, 58, 'mdMediaImage', 0),
(8, 59, 'mdMediaImage', 0),
(8, 60, 'mdMediaImage', 0),
(8, 61, 'mdMediaImage', 0),
(8, 62, 'mdMediaImage', 0),
(8, 63, 'mdMediaImage', 0),
(8, 64, 'mdMediaImage', 0),
(8, 65, 'mdMediaImage', 0),
(8, 66, 'mdMediaImage', 0),
(8, 67, 'mdMediaImage', 0),
(8, 68, 'mdMediaImage', 0),
(8, 69, 'mdMediaImage', 0),
(9, 85, 'mdMediaImage', 14),
(9, 86, 'mdMediaImage', 1),
(9, 87, 'mdMediaImage', 7),
(9, 88, 'mdMediaImage', 4),
(9, 90, 'mdMediaImage', 3),
(9, 91, 'mdMediaImage', 10),
(9, 92, 'mdMediaImage', 13),
(9, 93, 'mdMediaImage', 12),
(9, 94, 'mdMediaImage', 11),
(9, 95, 'mdMediaImage', 5),
(9, 96, 'mdMediaImage', 8),
(9, 97, 'mdMediaImage', 6),
(9, 98, 'mdMediaImage', 2),
(9, 100, 'mdMediaImage', 0),
(9, 101, 'mdMediaImage', 0),
(10, 151, 'mdMediaImage', 0),
(10, 152, 'mdMediaImage', 0),
(10, 153, 'mdMediaImage', 0),
(10, 154, 'mdMediaImage', 0),
(10, 155, 'mdMediaImage', 0),
(10, 156, 'mdMediaImage', 0),
(10, 157, 'mdMediaImage', 0),
(10, 158, 'mdMediaImage', 0),
(10, 159, 'mdMediaImage', 0),
(10, 160, 'mdMediaImage', 0),
(10, 161, 'mdMediaImage', 0),
(11, 125, 'mdMediaImage', 0),
(11, 126, 'mdMediaImage', 0),
(11, 127, 'mdMediaImage', 0),
(11, 128, 'mdMediaImage', 0),
(11, 129, 'mdMediaImage', 0),
(11, 130, 'mdMediaImage', 0),
(11, 131, 'mdMediaImage', 0),
(11, 132, 'mdMediaImage', 0),
(11, 133, 'mdMediaImage', 0),
(11, 134, 'mdMediaImage', 0),
(11, 135, 'mdMediaImage', 0),
(11, 136, 'mdMediaImage', 0),
(12, 137, 'mdMediaImage', 1),
(12, 138, 'mdMediaImage', 4),
(12, 139, 'mdMediaImage', 13),
(12, 140, 'mdMediaImage', 3),
(12, 141, 'mdMediaImage', 2),
(12, 143, 'mdMediaImage', 10),
(12, 144, 'mdMediaImage', 5),
(12, 145, 'mdMediaImage', 6),
(12, 146, 'mdMediaImage', 8),
(12, 147, 'mdMediaImage', 9),
(12, 148, 'mdMediaImage', 7),
(12, 150, 'mdMediaImage', 14);

-- --------------------------------------------------------

--
-- Table structure for table `md_media_content`
--

CREATE TABLE IF NOT EXISTS `md_media_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_class_name` varchar(128) NOT NULL,
  `object_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `md_media_content_index_idx` (`object_class_name`,`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=199 ;

--
-- Dumping data for table `md_media_content`
--

INSERT INTO `md_media_content` (`id`, `object_class_name`, `object_id`, `created_at`, `updated_at`) VALUES
(32, 'mdMediaImage', 32, '2012-02-09 18:37:24', '2012-02-09 18:37:24'),
(33, 'mdMediaImage', 33, '2012-02-09 18:37:35', '2012-02-09 18:37:35'),
(34, 'mdMediaImage', 34, '2012-02-09 18:37:48', '2012-02-09 18:37:48'),
(35, 'mdMediaImage', 35, '2012-02-09 18:37:59', '2012-02-09 18:37:59'),
(36, 'mdMediaImage', 36, '2012-02-09 18:38:09', '2012-02-09 18:38:09'),
(37, 'mdMediaImage', 37, '2012-02-09 18:38:19', '2012-02-09 18:38:19'),
(38, 'mdMediaImage', 38, '2012-02-09 18:38:30', '2012-02-09 18:38:30'),
(44, 'mdMediaImage', 44, '2012-02-29 19:23:11', '2012-02-29 19:23:11'),
(48, 'mdMediaImage', 48, '2012-03-01 15:59:30', '2012-03-01 15:59:30'),
(49, 'mdMediaImage', 49, '2012-03-01 15:59:46', '2012-03-01 15:59:46'),
(52, 'mdMediaImage', 52, '2012-03-01 16:10:35', '2012-03-01 16:10:35'),
(53, 'mdMediaImage', 53, '2012-03-01 16:10:40', '2012-03-01 16:10:40'),
(54, 'mdMediaImage', 54, '2012-03-01 16:10:45', '2012-03-01 16:10:45'),
(55, 'mdMediaImage', 55, '2012-03-01 16:44:46', '2012-03-01 16:44:46'),
(56, 'mdMediaImage', 56, '2012-03-01 16:44:51', '2012-03-01 16:44:51'),
(57, 'mdMediaImage', 57, '2012-03-01 16:44:56', '2012-03-01 16:44:56'),
(58, 'mdMediaImage', 58, '2012-03-01 16:45:01', '2012-03-01 16:45:01'),
(59, 'mdMediaImage', 59, '2012-03-01 16:45:06', '2012-03-01 16:45:06'),
(60, 'mdMediaImage', 60, '2012-03-01 16:45:11', '2012-03-01 16:45:11'),
(61, 'mdMediaImage', 61, '2012-03-01 16:45:16', '2012-03-01 16:45:16'),
(62, 'mdMediaImage', 62, '2012-03-01 16:45:21', '2012-03-01 16:45:21'),
(63, 'mdMediaImage', 63, '2012-03-01 16:45:26', '2012-03-01 16:45:26'),
(64, 'mdMediaImage', 64, '2012-03-01 16:45:32', '2012-03-01 16:45:32'),
(65, 'mdMediaImage', 65, '2012-03-01 16:45:36', '2012-03-01 16:45:36'),
(66, 'mdMediaImage', 66, '2012-03-01 16:45:41', '2012-03-01 16:45:41'),
(67, 'mdMediaImage', 67, '2012-03-01 16:45:46', '2012-03-01 16:45:46'),
(68, 'mdMediaImage', 68, '2012-03-01 16:45:51', '2012-03-01 16:45:51'),
(69, 'mdMediaImage', 69, '2012-03-01 16:45:57', '2012-03-01 16:45:57'),
(70, 'mdMediaImage', 70, '2012-03-01 17:10:04', '2012-03-01 17:10:04'),
(71, 'mdMediaImage', 71, '2012-03-01 17:10:09', '2012-03-01 17:10:09'),
(72, 'mdMediaImage', 72, '2012-03-01 17:10:14', '2012-03-01 17:10:14'),
(73, 'mdMediaImage', 73, '2012-03-01 17:10:19', '2012-03-01 17:10:19'),
(78, 'mdMediaImage', 78, '2012-03-01 17:20:23', '2012-03-01 17:20:23'),
(79, 'mdMediaImage', 79, '2012-03-01 17:20:28', '2012-03-01 17:20:28'),
(80, 'mdMediaImage', 80, '2012-03-01 17:20:32', '2012-03-01 17:20:32'),
(81, 'mdMediaImage', 81, '2012-03-01 17:20:39', '2012-03-01 17:20:39'),
(82, 'mdMediaImage', 82, '2012-03-01 17:20:45', '2012-03-01 17:20:45'),
(83, 'mdMediaImage', 83, '2012-03-01 17:20:52', '2012-03-01 17:20:52'),
(84, 'mdMediaImage', 84, '2012-03-01 17:20:58', '2012-03-01 17:20:58'),
(85, 'mdMediaImage', 85, '2012-03-01 18:24:35', '2012-03-01 18:24:35'),
(86, 'mdMediaImage', 86, '2012-03-01 18:24:37', '2012-03-01 18:24:37'),
(87, 'mdMediaImage', 87, '2012-03-01 18:24:40', '2012-03-01 18:24:40'),
(88, 'mdMediaImage', 88, '2012-03-01 18:24:42', '2012-03-01 18:24:42'),
(89, 'mdMediaImage', 89, '2012-03-02 10:32:05', '2012-03-02 10:32:05'),
(90, 'mdMediaImage', 90, '2012-03-02 20:17:15', '2012-03-02 20:17:15'),
(91, 'mdMediaImage', 91, '2012-03-02 20:17:17', '2012-03-02 20:17:17'),
(92, 'mdMediaImage', 92, '2012-03-02 20:17:19', '2012-03-02 20:17:19'),
(93, 'mdMediaImage', 93, '2012-03-02 20:17:21', '2012-03-02 20:17:21'),
(94, 'mdMediaImage', 94, '2012-03-02 20:17:23', '2012-03-02 20:17:23'),
(95, 'mdMediaImage', 95, '2012-03-02 20:17:25', '2012-03-02 20:17:25'),
(96, 'mdMediaImage', 96, '2012-03-02 20:17:28', '2012-03-02 20:17:28'),
(97, 'mdMediaImage', 97, '2012-03-02 20:17:30', '2012-03-02 20:17:30'),
(98, 'mdMediaImage', 98, '2012-03-02 20:20:49', '2012-03-02 20:20:49'),
(100, 'mdMediaImage', 100, '2012-03-02 20:28:00', '2012-03-02 20:28:00'),
(101, 'mdMediaImage', 101, '2012-03-02 20:28:02', '2012-03-02 20:28:02'),
(106, 'mdMediaImage', 106, '2012-03-09 21:39:50', '2012-03-09 21:39:50'),
(125, 'mdMediaImage', 125, '2012-03-25 13:55:44', '2012-03-25 13:55:44'),
(126, 'mdMediaImage', 126, '2012-03-25 13:56:40', '2012-03-25 13:56:40'),
(127, 'mdMediaImage', 127, '2012-03-25 13:57:22', '2012-03-25 13:57:22'),
(128, 'mdMediaImage', 128, '2012-03-25 13:58:04', '2012-03-25 13:58:04'),
(129, 'mdMediaImage', 129, '2012-03-25 13:58:42', '2012-03-25 13:58:42'),
(130, 'mdMediaImage', 130, '2012-03-25 13:59:38', '2012-03-25 13:59:38'),
(131, 'mdMediaImage', 131, '2012-03-25 14:00:18', '2012-03-25 14:00:18'),
(132, 'mdMediaImage', 132, '2012-03-25 14:01:01', '2012-03-25 14:01:01'),
(133, 'mdMediaImage', 133, '2012-03-25 14:01:51', '2012-03-25 14:01:51'),
(134, 'mdMediaImage', 134, '2012-03-25 14:02:40', '2012-03-25 14:02:40'),
(135, 'mdMediaImage', 135, '2012-03-25 14:03:44', '2012-03-25 14:03:44'),
(136, 'mdMediaImage', 136, '2012-03-25 16:40:11', '2012-03-25 16:40:11'),
(137, 'mdMediaImage', 137, '2012-03-25 17:22:42', '2012-03-25 17:22:42'),
(138, 'mdMediaImage', 138, '2012-03-25 17:23:40', '2012-03-25 17:23:40'),
(139, 'mdMediaImage', 139, '2012-03-25 17:24:29', '2012-03-25 17:24:29'),
(140, 'mdMediaImage', 140, '2012-03-25 17:25:38', '2012-03-25 17:25:38'),
(141, 'mdMediaImage', 141, '2012-03-25 17:26:41', '2012-03-25 17:26:41'),
(143, 'mdMediaImage', 143, '2012-03-25 17:28:07', '2012-03-25 17:28:07'),
(144, 'mdMediaImage', 144, '2012-03-25 17:28:55', '2012-03-25 17:28:55'),
(145, 'mdMediaImage', 145, '2012-03-25 17:29:43', '2012-03-25 17:29:43'),
(146, 'mdMediaImage', 146, '2012-03-25 17:30:27', '2012-03-25 17:30:27'),
(147, 'mdMediaImage', 147, '2012-03-25 17:31:08', '2012-03-25 17:31:08'),
(148, 'mdMediaImage', 148, '2012-03-25 17:31:59', '2012-03-25 17:31:59'),
(150, 'mdMediaImage', 150, '2012-03-25 17:33:38', '2012-03-25 17:33:38'),
(151, 'mdMediaImage', 151, '2012-03-25 17:58:28', '2012-03-25 17:58:28'),
(152, 'mdMediaImage', 152, '2012-03-25 17:59:21', '2012-03-25 17:59:21'),
(153, 'mdMediaImage', 153, '2012-03-25 18:00:11', '2012-03-25 18:00:11'),
(154, 'mdMediaImage', 154, '2012-03-25 18:00:51', '2012-03-25 18:00:51'),
(155, 'mdMediaImage', 155, '2012-03-25 18:01:31', '2012-03-25 18:01:31'),
(156, 'mdMediaImage', 156, '2012-03-25 18:02:07', '2012-03-25 18:02:07'),
(157, 'mdMediaImage', 157, '2012-03-25 18:02:46', '2012-03-25 18:02:46'),
(158, 'mdMediaImage', 158, '2012-03-25 18:03:35', '2012-03-25 18:03:35'),
(159, 'mdMediaImage', 159, '2012-03-25 18:04:33', '2012-03-25 18:04:33'),
(160, 'mdMediaImage', 160, '2012-03-25 18:05:21', '2012-03-25 18:05:21'),
(161, 'mdMediaImage', 161, '2012-03-25 18:06:09', '2012-03-25 18:06:09'),
(163, 'mdMediaImage', 163, '2012-04-10 18:37:58', '2012-04-10 18:37:58'),
(164, 'mdMediaImage', 164, '2012-04-10 18:38:07', '2012-04-10 18:38:07'),
(165, 'mdMediaImage', 165, '2012-04-10 18:38:24', '2012-04-10 18:38:24'),
(166, 'mdMediaImage', 166, '2012-04-10 18:38:42', '2012-04-10 18:38:42'),
(167, 'mdMediaImage', 167, '2012-04-10 18:38:59', '2012-04-10 18:38:59'),
(168, 'mdMediaImage', 168, '2012-04-10 18:39:11', '2012-04-10 18:39:11'),
(170, 'mdMediaImage', 170, '2012-04-10 18:39:40', '2012-04-10 18:39:40'),
(171, 'mdMediaImage', 171, '2012-04-10 18:39:51', '2012-04-10 18:39:51'),
(172, 'mdMediaImage', 172, '2012-04-10 18:40:09', '2012-04-10 18:40:09'),
(174, 'mdMediaImage', 174, '2012-04-10 18:40:42', '2012-04-10 18:40:42'),
(175, 'mdMediaImage', 175, '2012-04-10 18:40:57', '2012-04-10 18:40:57'),
(176, 'mdMediaImage', 176, '2012-04-10 18:41:17', '2012-04-10 18:41:17'),
(178, 'mdMediaImage', 178, '2012-04-10 18:41:48', '2012-04-10 18:41:48'),
(180, 'mdMediaImage', 180, '2012-04-10 18:42:18', '2012-04-10 18:42:18'),
(183, 'mdMediaImage', 183, '2012-04-10 18:43:09', '2012-04-10 18:43:09'),
(186, 'mdMediaImage', 186, '2012-04-10 18:44:29', '2012-04-10 18:44:29'),
(187, 'mdMediaImage', 187, '2012-04-10 18:44:40', '2012-04-10 18:44:40'),
(193, 'mdMediaImage', 193, '2012-05-31 15:36:07', '2012-05-31 15:36:07'),
(195, 'mdMediaImage', 195, '2012-05-31 15:44:09', '2012-05-31 15:44:09'),
(196, 'mdMediaImage', 196, '2012-05-31 15:44:29', '2012-05-31 15:44:29'),
(197, 'mdMediaImage', 197, '2012-06-02 22:28:29', '2012-06-02 22:28:29'),
(198, 'mdMediaImage', 198, '2012-06-02 22:28:31', '2012-06-02 22:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `md_media_file`
--

CREATE TABLE IF NOT EXISTS `md_media_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `filetype` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_media_file`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_media_image`
--

CREATE TABLE IF NOT EXISTS `md_media_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=199 ;

--
-- Dumping data for table `md_media_image`
--

INSERT INTO `md_media_image` (`id`, `name`, `filename`, `description`, `path`) VALUES
(32, 'IMG_8963.jpg', '3b75fe8e1236f089c05dbe8cc49e4911.jpg', NULL, '/media/mdApartamento/'),
(33, 'IMG_8965.jpg', '893a6db8dbb48b833e933905d53d4e67.jpg', NULL, '/media/mdApartamento/'),
(34, 'IMG_8970.jpg', 'f2bd7be87022bccece65d4437e55e42f.jpg', NULL, '/media/mdApartamento/'),
(35, 'IMG_8973.jpg', '72be14e1dcde3c4030c038e6633b659a.jpg', NULL, '/media/mdApartamento/'),
(36, 'IMG_8976.jpg', '959dc62979e87cf8d69f9a6c02702f59.jpg', NULL, '/media/mdApartamento/'),
(37, 'IMG_8978.jpg', '5ff9a02d33fdeb857ef121cf5019f6c7.jpg', NULL, '/media/mdApartamento/'),
(38, 'IMG_8980.jpg', '0085fa15f3409f3535973e7f35f5594a.jpg', NULL, '/media/mdApartamento/'),
(44, 'Punta atardecer copia.jpg', '66c413e9a340f1e67f5728aac880c907.jpg', NULL, '/media/mdLocacion/'),
(48, 'Captura de pantalla 2012-03-01 a la(s) 18.52.45.png', '443347ea40244d8f4b90aa914e56c1fc.png', NULL, '/media/mdLocacion/'),
(49, 'Captura de pantalla 2012-03-01 a la(s) 18.55.39.png', 'a08c2c41913bf9133651250e0936ecf2.png', NULL, '/media/mdLocacion/'),
(52, 'Captura de pantalla 2012-03-01 a la(s) 19.00.13.png', 'cbcc92fa1f2aa1e8ebd4c6da40685ba6.png', NULL, '/media/mdLocacion/'),
(53, 'Captura de pantalla 2012-03-01 a la(s) 19.00.48.png', '8b91b82922885da5d527b2ea5962a96e.png', NULL, '/media/mdLocacion/'),
(54, 'Captura de pantalla 2012-03-01 a la(s) 19.03.32.png', '41eb1c9f3823b9f24a82add65a9959a3.png', NULL, '/media/mdLocacion/'),
(55, 'Captura de pantalla 2012-03-01 a la(s) 17.19.27.png', '882801e7bd5842061b1f813537b5cda7.png', NULL, '/media/mdApartamento/'),
(56, 'Captura de pantalla 2012-03-01 a la(s) 17.19.47.png', 'f5dd91d50261231b80bd5bcaaf36f6f9.png', NULL, '/media/mdApartamento/'),
(57, 'Captura de pantalla 2012-03-01 a la(s) 17.20.32.png', '9c972ab444c2ee17fd00a28f33fc9329.png', NULL, '/media/mdApartamento/'),
(58, 'Captura de pantalla 2012-03-01 a la(s) 17.20.50.png', '55e48c2b51b97113c609c62916bf0048.png', NULL, '/media/mdApartamento/'),
(59, 'Captura de pantalla 2012-03-01 a la(s) 17.21.13.png', '9345341e0707fa4aa792690a5b0d5cd5.png', NULL, '/media/mdApartamento/'),
(60, 'Captura de pantalla 2012-03-01 a la(s) 17.21.33.png', '5eff2250faa7c1222b489858c3d196ae.png', NULL, '/media/mdApartamento/'),
(61, 'Captura de pantalla 2012-03-01 a la(s) 17.21.44.png', '10dd2b93d02252db557ac9ba95ba989c.png', NULL, '/media/mdApartamento/'),
(62, 'Captura de pantalla 2012-03-01 a la(s) 17.21.55.png', 'fd278c67eecd92ca6d92a31172a278a9.png', NULL, '/media/mdApartamento/'),
(63, 'Captura de pantalla 2012-03-01 a la(s) 17.22.08.png', 'bcd299958bcaa89badc46bc6dc19c6b3.png', NULL, '/media/mdApartamento/'),
(64, 'Captura de pantalla 2012-03-01 a la(s) 17.22.29.png', 'fad2cdf7caab54e5bd28ec28ec56875b.png', NULL, '/media/mdApartamento/'),
(65, 'Captura de pantalla 2012-03-01 a la(s) 17.22.44.png', 'b4e34f09f12c5fb358e2737ecd5a8e72.png', NULL, '/media/mdApartamento/'),
(66, 'Captura de pantalla 2012-03-01 a la(s) 17.22.59.png', '51e70cd2e2c4069497e44b9ba2debd26.png', NULL, '/media/mdApartamento/'),
(67, 'Captura de pantalla 2012-03-01 a la(s) 17.23.15.png', 'b2e785f325436b819100f27a1b3efd81.png', NULL, '/media/mdApartamento/'),
(68, 'Captura de pantalla 2012-03-01 a la(s) 17.23.26.png', '5dbf9ea4bf514f5c0ae2c24a198e4169.png', NULL, '/media/mdApartamento/'),
(69, 'Captura de pantalla 2012-03-01 a la(s) 17.23.41.png', '0937489f5e3950accead312b98195774.png', NULL, '/media/mdApartamento/'),
(70, 'Captura de pantalla 2012-03-01 a la(s) 20.02.38.png', '3254ad5bcc232304e5fe6c36bbeff559.png', NULL, '/media/mdLocacion/'),
(71, 'Captura de pantalla 2012-03-01 a la(s) 20.03.15.png', 'b036c9e2ebf7b53feab55c8ecaa05783.png', NULL, '/media/mdLocacion/'),
(72, 'Captura de pantalla 2012-03-01 a la(s) 20.03.47.png', '42baf6b57e851cb3ce90593ce00a9af8.png', NULL, '/media/mdLocacion/'),
(73, 'Captura de pantalla 2012-03-01 a la(s) 20.04.32.png', '4d693221263cc715a2cf9f92b7227cc9.png', NULL, '/media/mdLocacion/'),
(78, 'Captura de pantalla 2012-03-01 a la(s) 20.10.31.png', 'c83d8447388b188485db173e5af70a49.png', NULL, '/media/mdLocacion/'),
(79, 'Captura de pantalla 2012-03-01 a la(s) 20.11.25.png', '74cc6b23deccd17b1622630bdb58aa31.png', NULL, '/media/mdLocacion/'),
(80, 'Captura de pantalla 2012-03-01 a la(s) 20.12.16.png', 'c7df1bffb9fc70c6dc31a894e0563689.png', NULL, '/media/mdLocacion/'),
(81, 'Captura de pantalla 2012-03-01 a la(s) 20.13.14.png', '891c3d248fa8b7c5bafc1453dcfacdf3.png', NULL, '/media/mdLocacion/'),
(82, 'Captura de pantalla 2012-03-01 a la(s) 20.13.33.png', '47c51a41eb9212221b9fd9ada79cce23.png', NULL, '/media/mdLocacion/'),
(83, 'Captura de pantalla 2012-03-01 a la(s) 20.13.55.png', '996c84bf97590ea97c5a640ceb11794e.png', NULL, '/media/mdLocacion/'),
(84, 'Captura de pantalla 2012-03-01 a la(s) 20.14.38.png', 'c869a4cb3b92bd54f5bc59cc536eec48.png', NULL, '/media/mdLocacion/'),
(85, 'Captura de pantalla 2012-03-01 a la(s) 20.57.56.png', '9a80bef1089b10a6ab9c1d37f8a670bc.png', NULL, '/media/mdApartamento/'),
(86, 'casa.jpg', '80fb83d82751a1ed41602fd5a5b1377c.jpg', NULL, '/media/mdApartamento/'),
(87, 'fardos.jpg', 'ce142c65813dd29df4550e8817ea6958.jpg', NULL, '/media/mdApartamento/'),
(88, 'puerta.jpg', '651f417cf24df8c18141e4a45e755d41.jpg', NULL, '/media/mdApartamento/'),
(89, 'Captura de pantalla 2012-03-02 a la(s) 13.26.43.png', 'a97565d83a97a5136a444c64fdef0607.png', NULL, '/media/mdLocacion/'),
(90, 'arriba afuera.jpg', 'd9f72c8e0836636455a49baa6469e643.jpg', NULL, '/media/mdApartamento/'),
(91, 'baño abajo.jpg', '1bf9ae608c7df6aa42f284179ec5640d.jpg', NULL, '/media/mdApartamento/'),
(92, 'baño arriba.jpg', '08a2eeaffdf2479bbb8c3ee3d259e4ed.jpg', NULL, '/media/mdApartamento/'),
(93, 'cuarto abajo.jpg', '86f4787675d4d0727ac309041df5561c.jpg', NULL, '/media/mdApartamento/'),
(94, 'cuarto principal.jpg', '144cd0a534a1dc5a9518cf5b441aa716.jpg', NULL, '/media/mdApartamento/'),
(95, 'mesa afuera.jpg', 'a6f7e6789d0b326e641f87765f16ad7a.jpg', NULL, '/media/mdApartamento/'),
(96, 'quincho.jpg', '49e43262bb29cbdcd847573f3caee1ba.jpg', NULL, '/media/mdApartamento/'),
(97, 'vista.jpg', '88664c6fb8d64380746a9854d305c1cb.jpg', NULL, '/media/mdApartamento/'),
(98, 'estar abajo.jpg', 'd6cb26c730b30cad5ce07706d9d8cd08.jpg', NULL, '/media/mdApartamento/'),
(100, 'IMG_7555-1 copia.jpg', '7fb1b2b38cee67126ff8706521033ae2.jpg', NULL, '/media/mdApartamento/'),
(101, 'living2.jpg', 'f73df3ab96f7a60998d75ff51b7a0bf3.jpg', NULL, '/media/mdApartamento/'),
(106, 'Captura de pantalla 2012-03-09 a la(s) 22.43.29.png', '6a68441331f438110599cf2a7c65f926.png', NULL, '/media/mdLocacion/'),
(125, '_MG_4665.JPG', '540055430640ee8e50f783e37a5b29ef.JPG', NULL, '/media/mdApartamento/'),
(126, '_MG_4669.JPG', '82f4c9289bf3c154b6c900accfbaae99.JPG', NULL, '/media/mdApartamento/'),
(127, '_MG_4672.JPG', '909691b5ed879c72c92ef08b1343e585.JPG', NULL, '/media/mdApartamento/'),
(128, '_MG_4674.JPG', 'b215d3b182b9afd50e19ab4c4f8d12fb.JPG', NULL, '/media/mdApartamento/'),
(129, '_MG_4677.JPG', '03f75ee324f6946908c398e062fdacc0.JPG', NULL, '/media/mdApartamento/'),
(130, '_MG_4680.JPG', '4a7d10960930428cbe53280167aeb6b9.JPG', NULL, '/media/mdApartamento/'),
(131, '_MG_4684.JPG', 'd95dce30c571db9bcebf666c0f29740f.JPG', NULL, '/media/mdApartamento/'),
(132, '_MG_4686.JPG', '2383b345da7c72253cd531267e727ebd.JPG', NULL, '/media/mdApartamento/'),
(133, '_MG_4694.JPG', '99c64e971007a5cb44aad87cf07a60ed.JPG', NULL, '/media/mdApartamento/'),
(134, 'IMG_4696.JPG', '42d3a89a4e63b0eb58ae35cada5da8e5.JPG', NULL, '/media/mdApartamento/'),
(135, 'IMG_4699.JPG', 'c814d4cbec85eb5f3d2c3f46194bf0a3.JPG', NULL, '/media/mdApartamento/'),
(136, '_MG_4642.JPG', 'c3b3f8eafc639ad115d71b4b0ebc66c3.JPG', NULL, '/media/mdApartamento/'),
(137, '_MG_4704.JPG', 'fa8ae6ee0891b18557447ae11ca540e9.JPG', NULL, '/media/mdApartamento/'),
(138, '_MG_4706.JPG', '87fda8cbb5789676738a557971de7caa.JPG', NULL, '/media/mdApartamento/'),
(139, '_MG_4708.JPG', '2b44133746a078b06a90438d502a8149.JPG', NULL, '/media/mdApartamento/'),
(140, '_MG_4709.JPG', 'fb517b790902dd7c7f5a7c825665065d.JPG', NULL, '/media/mdApartamento/'),
(141, '_MG_4711.JPG', 'f200f187b60535d909d97a15c788e508.JPG', NULL, '/media/mdApartamento/'),
(143, '_MG_4719.JPG', '8a62c614d92090e77485f34502587a9b.JPG', NULL, '/media/mdApartamento/'),
(144, '_MG_4730.JPG', 'eb692c70ab600e5cf8ca992f923b673c.JPG', NULL, '/media/mdApartamento/'),
(145, '_MG_4731.JPG', '26f3eaec2fcc91cd84a6926d4b9c1dc9.JPG', NULL, '/media/mdApartamento/'),
(146, '_MG_4736.JPG', '85be404b93e03a8887dd0f4332553d36.JPG', NULL, '/media/mdApartamento/'),
(147, '_MG_4742.JPG', '099b5a2c88b222d01240e3c986502a7f.JPG', NULL, '/media/mdApartamento/'),
(148, '_MG_4743.JPG', '7cb09c26b319088a1e0338963894bf56.JPG', NULL, '/media/mdApartamento/'),
(150, '_MG_4749.JPG', '3454250cd31386855d88462dcf3ea726.JPG', NULL, '/media/mdApartamento/'),
(151, '_MG_4627.JPG', '50f428b9badc12e4914b5cae48d404b6.JPG', NULL, '/media/mdApartamento/'),
(152, '_MG_4631.JPG', '2105ea0c3d9667a2d0223ae8c8baa830.JPG', NULL, '/media/mdApartamento/'),
(153, '_MG_4635.JPG', 'b01f07afbdab065deb7a04cbce25bb82.JPG', NULL, '/media/mdApartamento/'),
(154, '_MG_4639.JPG', '1d73b3b236b7399736161e47bc47513a.JPG', NULL, '/media/mdApartamento/'),
(155, '_MG_4640.JPG', '69bba038ba7b3ee620cb82f42d642ff9.JPG', NULL, '/media/mdApartamento/'),
(156, '_MG_4642.JPG', 'b83d60c8ff3bc3f42b76b8cb64825b0a.JPG', NULL, '/media/mdApartamento/'),
(157, '_MG_4645.JPG', '42284f8c6f3bb9e870c3462d5b418eeb.JPG', NULL, '/media/mdApartamento/'),
(158, '_MG_4648.JPG', '5e2917d0b954b89961bbaa4153eff5e7.JPG', NULL, '/media/mdApartamento/'),
(159, '_MG_4651.JPG', 'a1e00782e3e4eca1acb5f22b4cfe12c5.JPG', NULL, '/media/mdApartamento/'),
(160, '_MG_4653.JPG', '718b2ef0a17d84af681e760778be92eb.JPG', NULL, '/media/mdApartamento/'),
(161, '_MG_4656.JPG', 'de601b12095eb0a7d9b7aa971eb72eb0.JPG', NULL, '/media/mdApartamento/'),
(163, 'DSC04400.JPG', '18c1bf71f75295a7e13626e6f15059df.JPG', NULL, '/media/mdApartamento/'),
(164, 'DSC04407.JPG', '142c6b8c9972ecdcf7e8c6455c6550bf.JPG', NULL, '/media/mdApartamento/'),
(165, 'DSC04409.JPG', '0d5895f404003e23c038953aee15f810.JPG', NULL, '/media/mdApartamento/'),
(166, 'DSC04427.JPG', '885a0fa3873bf154cc7a465cd3717f13.JPG', NULL, '/media/mdApartamento/'),
(167, 'DSC04430.JPG', '72337c58bcfa2079dfeb25dd66ef8920.JPG', NULL, '/media/mdApartamento/'),
(168, 'DSC04431.JPG', 'b45ea68e9aa2ec1d4417a0443710f1ca.JPG', NULL, '/media/mdApartamento/'),
(170, 'DSC04441.JPG', '5f0783d261ec85e9e07634b7e56a234e.JPG', NULL, '/media/mdApartamento/'),
(171, 'DSC04444.JPG', '2eefbb35bd17a46187a4d311ab5bf6e9.JPG', NULL, '/media/mdApartamento/'),
(172, 'DSC04445.JPG', '1ece1fc8610feb41962911d6ed6e26d7.JPG', NULL, '/media/mdApartamento/'),
(174, 'DSC04451.JPG', '4cc92bb4ef0cbd0c273496d3ff0a47a7.JPG', NULL, '/media/mdApartamento/'),
(175, 'DSC04458.JPG', 'a7417dfbbb65733245c63f15cc0a3893.JPG', NULL, '/media/mdApartamento/'),
(176, 'DSC04460.JPG', '69e3cb0c28968357a8d0900f29f31548.JPG', NULL, '/media/mdApartamento/'),
(178, 'DSC04463.JPG', 'a33978cd8328d1fdb6727fc1e3911987.JPG', NULL, '/media/mdApartamento/'),
(180, 'DSC04467.JPG', '847a811baaac20b8333dcbf906a81049.JPG', NULL, '/media/mdApartamento/'),
(183, 'DSC04475.JPG', '594a248b778e0eb4c930ed27bc25b55f.JPG', NULL, '/media/mdApartamento/'),
(186, 'DSC04490.JPG', 'e01d4c851131a9af3b7630c0b45b1e2c.JPG', NULL, '/media/mdApartamento/'),
(187, 'DSC04493.JPG', 'efbf7e8379748267afdf2f822205f7c5.JPG', NULL, '/media/mdApartamento/'),
(193, 'home1.jpg', '536745ed84d094538df4c560040aea09.jpg', NULL, '/media/mdLocacion/'),
(195, 'Captura de pantalla 2012-03-01 a la(s) 20.12.16.jpg', '2ec4a1b65428c527ab061c83270aa40c.jpg', NULL, '/media/mdLocacion/'),
(196, 'home2.jpg', '1428d2a38ce124c75edbce32caf7743b.jpg', NULL, '/media/mdLocacion/'),
(197, 'fotohome5.jpg', '901a7fd163652f103fb1871fa34d5696.jpg', NULL, '/media/mdLocacion/'),
(198, 'home6.jpg', '1149afb1e8280eb9ce09e5e507963dc2.jpg', NULL, '/media/mdLocacion/');

-- --------------------------------------------------------

--
-- Table structure for table `md_media_issuu_video`
--

CREATE TABLE IF NOT EXISTS `md_media_issuu_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documentid` text NOT NULL,
  `embed_code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_media_issuu_video`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_media_video`
--

CREATE TABLE IF NOT EXISTS `md_media_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `duration` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_media_video`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_media_vimeo_video`
--

CREATE TABLE IF NOT EXISTS `md_media_vimeo_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vimeo_url` varchar(64) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `duration` varchar(64) NOT NULL,
  `description` text,
  `avatar` varchar(255) DEFAULT NULL,
  `avatar_width` tinyint(4) DEFAULT NULL,
  `avatar_height` tinyint(4) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `author_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_media_vimeo_video`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_media_youtube_video`
--

CREATE TABLE IF NOT EXISTS `md_media_youtube_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `src` varchar(255) NOT NULL,
  `code` varchar(64) NOT NULL,
  `duration` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `md_media_youtube_video`
--


-- --------------------------------------------------------

--
-- Table structure for table `md_ocupacion`
--

CREATE TABLE IF NOT EXISTS `md_ocupacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_apartamento_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `md_apartamento_id_idx` (`md_apartamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4607 ;

--
-- Dumping data for table `md_ocupacion`
--

INSERT INTO `md_ocupacion` (`id`, `md_apartamento_id`, `fecha`) VALUES
(2104, 5, '2012-01-30 22:16:51'),
(2105, 5, '2012-01-31 22:16:51'),
(2106, 5, '2012-02-09 22:16:51'),
(2107, 5, '2012-02-01 22:16:51'),
(2108, 5, '2012-02-02 22:16:51'),
(2109, 5, '2012-02-04 22:16:51'),
(2110, 5, '2012-02-12 22:16:51'),
(2111, 5, '2012-02-05 22:16:51'),
(2112, 5, '2012-02-03 22:16:51'),
(2113, 5, '2012-02-10 22:16:51'),
(2114, 5, '2012-02-18 22:16:51'),
(2115, 5, '2012-02-11 22:16:51'),
(2116, 5, '2012-02-08 22:16:51'),
(2117, 5, '2012-02-07 22:16:51'),
(2118, 5, '2012-02-06 22:16:51'),
(2119, 5, '2012-02-21 22:16:51'),
(2120, 5, '2012-02-20 22:16:51'),
(2121, 5, '2012-02-13 22:16:51'),
(2122, 5, '2012-02-14 22:16:51'),
(2123, 5, '2012-02-15 22:16:51'),
(2124, 5, '2012-02-16 22:16:51'),
(2125, 5, '2012-02-17 22:16:51'),
(2126, 5, '2012-02-19 22:16:51'),
(2127, 5, '2012-02-26 22:16:51'),
(2128, 5, '2012-02-27 22:16:51'),
(2129, 5, '2012-02-28 22:16:51'),
(2130, 5, '2012-02-22 22:16:51'),
(2131, 5, '2012-02-23 22:16:51'),
(2132, 5, '2012-02-25 22:16:51'),
(2133, 5, '2012-02-24 22:16:51'),
(2134, 5, '2012-03-01 22:16:51'),
(2135, 5, '2012-03-02 22:16:51'),
(2136, 5, '2012-03-03 22:16:51'),
(2137, 5, '2012-03-04 22:16:51'),
(2138, 5, '2012-03-18 22:16:51'),
(2139, 5, '2012-03-09 22:16:51'),
(2140, 5, '2012-02-29 22:16:51'),
(2141, 5, '2012-03-05 22:16:51'),
(2142, 5, '2012-03-06 22:16:51'),
(2143, 5, '2012-03-07 22:16:51'),
(2144, 5, '2012-03-08 22:16:51'),
(2145, 5, '2012-03-10 22:16:51'),
(2146, 5, '2012-03-11 22:16:51'),
(2147, 5, '2012-03-12 22:16:51'),
(2148, 5, '2012-03-13 22:16:51'),
(2149, 5, '2012-03-29 22:16:51'),
(2150, 5, '2012-03-22 22:16:51'),
(2151, 5, '2012-03-15 22:16:51'),
(2152, 5, '2012-03-17 22:16:51'),
(2153, 5, '2012-03-16 22:16:51'),
(2154, 5, '2012-03-14 22:16:51'),
(2155, 5, '2012-03-21 22:16:51'),
(2156, 5, '2012-03-20 22:16:51'),
(2157, 5, '2012-03-19 22:16:51'),
(2158, 5, '2012-03-26 22:16:51'),
(2159, 5, '2012-03-27 22:16:51'),
(2160, 5, '2012-03-28 22:16:51'),
(2161, 5, '2012-03-25 22:16:51'),
(2162, 5, '2012-03-24 22:16:51'),
(2163, 5, '2012-03-31 22:16:51'),
(2164, 5, '2012-04-01 22:16:51'),
(2165, 5, '2012-03-23 22:16:51'),
(2166, 5, '2012-03-30 22:16:51'),
(2167, 5, '2012-04-07 22:16:51'),
(2168, 5, '2012-04-08 22:16:51'),
(2169, 5, '2012-04-05 22:16:51'),
(2170, 5, '2012-04-06 22:16:51'),
(2171, 5, '2012-04-03 22:16:51'),
(2172, 5, '2012-04-04 22:16:51'),
(2173, 5, '2012-04-02 22:16:51'),
(2174, 5, '2012-04-26 22:16:51'),
(2175, 5, '2012-04-25 22:16:51'),
(2176, 5, '2012-04-17 22:16:51'),
(2177, 5, '2012-04-10 22:16:51'),
(2178, 5, '2012-04-11 22:16:51'),
(2179, 5, '2012-04-12 22:16:51'),
(2180, 5, '2012-04-13 22:16:51'),
(2181, 5, '2012-04-14 22:16:51'),
(2182, 5, '2012-04-15 22:16:51'),
(2183, 5, '2012-04-22 22:16:51'),
(2184, 5, '2012-04-21 22:16:51'),
(2185, 5, '2012-04-19 22:16:51'),
(2186, 5, '2012-04-18 22:16:51'),
(2187, 5, '2012-04-16 22:16:51'),
(2188, 5, '2012-04-09 22:16:51'),
(2189, 5, '2012-04-20 22:16:51'),
(2190, 5, '2012-04-27 22:16:51'),
(2191, 5, '2012-05-04 22:16:51'),
(2192, 5, '2012-05-03 22:16:51'),
(2193, 5, '2012-05-02 22:16:51'),
(2194, 5, '2012-05-01 22:16:51'),
(2195, 5, '2012-04-24 22:16:51'),
(2196, 5, '2012-04-29 22:16:51'),
(2197, 5, '2012-05-06 22:16:51'),
(2198, 5, '2012-05-05 22:16:51'),
(2199, 5, '2012-04-28 22:16:51'),
(2200, 5, '2012-04-30 22:16:51'),
(2201, 5, '2012-04-23 22:16:51'),
(2202, 5, '2012-05-09 22:16:51'),
(2203, 5, '2012-05-16 22:16:51'),
(2204, 5, '2012-05-15 22:16:51'),
(2205, 5, '2012-05-07 22:16:51'),
(2206, 5, '2012-05-08 22:16:51'),
(2207, 5, '2012-05-10 22:16:51'),
(2208, 5, '2012-05-12 22:16:51'),
(2209, 5, '2012-05-11 22:16:51'),
(2210, 5, '2012-05-13 22:16:51'),
(2211, 5, '2012-05-20 22:16:51'),
(2212, 5, '2012-05-19 22:16:51'),
(2213, 5, '2012-05-18 22:16:51'),
(2214, 5, '2012-05-17 22:16:51'),
(2215, 5, '2012-05-14 22:16:51'),
(2216, 5, '2012-05-21 22:16:51'),
(2217, 5, '2012-05-22 22:16:51'),
(2218, 5, '2012-05-23 22:16:51'),
(2219, 5, '2012-05-24 22:16:51'),
(2220, 5, '2012-05-25 22:16:51'),
(2221, 5, '2012-05-26 22:16:51'),
(2222, 5, '2012-05-27 22:16:51'),
(2223, 5, '2012-06-03 22:16:51'),
(2224, 5, '2012-06-10 22:16:51'),
(2225, 5, '2012-06-09 22:16:51'),
(2226, 5, '2012-06-07 22:16:51'),
(2227, 5, '2012-06-06 22:16:51'),
(2228, 5, '2012-06-05 22:16:51'),
(2229, 5, '2012-06-04 22:16:51'),
(2230, 5, '2012-05-28 22:16:51'),
(2231, 5, '2012-05-29 22:16:51'),
(2232, 5, '2012-05-30 22:16:51'),
(2233, 5, '2012-06-02 22:16:51'),
(2234, 5, '2012-05-31 22:16:51'),
(2235, 5, '2012-06-01 22:16:51'),
(2236, 5, '2012-06-08 22:16:51'),
(2237, 5, '2012-06-16 22:16:51'),
(2238, 5, '2012-07-08 22:16:51'),
(2239, 5, '2012-07-01 22:16:51'),
(2240, 5, '2012-06-24 22:16:51'),
(2241, 5, '2012-06-17 22:16:51'),
(2242, 5, '2012-06-12 22:16:51'),
(2243, 5, '2012-06-19 22:16:51'),
(2244, 5, '2012-06-26 22:16:51'),
(2245, 5, '2012-06-28 22:16:51'),
(2246, 5, '2012-07-06 22:16:51'),
(2247, 5, '2012-07-07 22:16:51'),
(2248, 5, '2012-06-30 22:16:51'),
(2249, 5, '2012-06-22 22:16:51'),
(2250, 5, '2012-06-15 22:16:51'),
(2251, 5, '2012-06-14 22:16:51'),
(2252, 5, '2012-06-13 22:16:51'),
(2253, 5, '2012-06-20 22:16:51'),
(2254, 5, '2012-06-21 22:16:51'),
(2255, 5, '2012-06-23 22:16:51'),
(2256, 5, '2012-06-29 22:16:51'),
(2257, 5, '2012-06-27 22:16:51'),
(2258, 5, '2012-06-18 22:16:51'),
(2259, 5, '2012-06-11 22:16:51'),
(2260, 5, '2012-06-25 22:16:51'),
(2261, 5, '2012-07-02 22:16:51'),
(2262, 5, '2012-07-04 22:16:51'),
(2263, 5, '2012-07-03 22:16:51'),
(2264, 5, '2012-07-05 22:16:51'),
(2265, 5, '2012-07-28 22:16:51'),
(2266, 5, '2012-08-04 22:16:51'),
(2267, 5, '2012-08-03 22:16:51'),
(2268, 5, '2012-08-02 22:16:51'),
(2269, 5, '2012-08-01 22:16:51'),
(2270, 5, '2012-07-31 22:16:51'),
(2271, 5, '2012-07-23 22:16:51'),
(2272, 5, '2012-07-24 22:16:51'),
(2273, 5, '2012-07-25 22:16:51'),
(2274, 5, '2012-07-26 22:16:51'),
(2275, 5, '2012-07-27 22:16:51'),
(2276, 5, '2012-07-29 22:16:51'),
(2277, 5, '2012-08-05 22:16:51'),
(2278, 5, '2012-07-22 22:16:51'),
(2279, 5, '2012-07-15 22:16:51'),
(2280, 5, '2012-07-13 22:16:51'),
(2281, 5, '2012-07-12 22:16:51'),
(2282, 5, '2012-07-10 22:16:51'),
(2283, 5, '2012-07-09 22:16:51'),
(2284, 5, '2012-07-16 22:16:51'),
(2285, 5, '2012-07-17 22:16:51'),
(2286, 5, '2012-07-18 22:16:51'),
(2287, 5, '2012-07-19 22:16:51'),
(2288, 5, '2012-07-20 22:16:51'),
(2289, 5, '2012-07-21 22:16:51'),
(2290, 5, '2012-07-14 22:16:51'),
(2291, 5, '2012-07-11 22:16:51'),
(2292, 5, '2012-07-30 22:16:51'),
(2745, 6, '2012-01-31 18:06:53'),
(2746, 6, '2012-02-03 18:06:53'),
(2747, 6, '2012-02-04 18:06:53'),
(2748, 6, '2012-02-05 18:06:53'),
(2749, 6, '2012-02-02 18:06:53'),
(2750, 6, '2012-02-01 18:06:53'),
(2751, 6, '2012-01-30 18:06:53'),
(2752, 6, '2012-02-06 18:06:53'),
(2753, 6, '2012-02-27 18:06:53'),
(2754, 6, '2012-02-20 18:06:53'),
(2755, 6, '2012-02-13 18:06:53'),
(2756, 6, '2012-02-07 18:06:53'),
(2757, 6, '2012-02-08 18:06:53'),
(2758, 6, '2012-02-09 18:06:53'),
(2759, 6, '2012-02-10 18:06:53'),
(2760, 6, '2012-02-11 18:06:53'),
(2761, 6, '2012-02-12 18:06:53'),
(2762, 6, '2012-02-19 18:06:53'),
(2763, 6, '2012-02-26 18:06:53'),
(2764, 6, '2012-02-25 18:06:53'),
(2765, 6, '2012-02-24 18:06:53'),
(2766, 6, '2012-02-21 18:06:53'),
(2767, 6, '2012-02-22 18:06:53'),
(2768, 6, '2012-02-23 18:06:53'),
(2769, 6, '2012-02-16 18:06:53'),
(2770, 6, '2012-02-17 18:06:53'),
(2771, 6, '2012-02-18 18:06:53'),
(2772, 6, '2012-02-15 18:06:53'),
(2773, 6, '2012-02-14 18:06:53'),
(2774, 6, '2012-02-29 18:06:53'),
(2775, 6, '2012-02-28 18:06:53'),
(2776, 6, '2012-03-09 18:06:53'),
(2777, 6, '2012-03-10 18:06:53'),
(2778, 6, '2012-03-11 18:06:53'),
(2779, 6, '2011-12-26 18:06:53'),
(2780, 6, '2011-12-27 18:06:53'),
(2781, 6, '2011-12-28 18:06:53'),
(2782, 6, '2011-12-29 18:06:53'),
(2783, 6, '2011-12-30 18:06:53'),
(2784, 6, '2011-12-31 18:06:53'),
(2785, 6, '2012-01-01 18:06:53'),
(2786, 6, '2012-01-15 18:06:53'),
(2787, 6, '2012-01-29 18:06:53'),
(2788, 6, '2012-01-22 18:06:53'),
(2789, 6, '2012-01-20 18:06:53'),
(2790, 6, '2012-01-18 18:06:53'),
(2791, 6, '2012-01-17 18:06:53'),
(2792, 6, '2012-01-16 18:06:53'),
(2793, 6, '2012-01-23 18:06:53'),
(2794, 6, '2012-01-24 18:06:53'),
(2795, 6, '2012-01-25 18:06:53'),
(2796, 6, '2012-01-26 18:06:53'),
(2797, 6, '2012-01-27 18:06:53'),
(2798, 6, '2012-01-28 18:06:53'),
(2799, 6, '2012-01-21 18:06:53'),
(2800, 6, '2012-01-14 18:06:53'),
(2801, 6, '2012-01-07 18:06:53'),
(2802, 6, '2012-01-08 18:06:53'),
(2803, 6, '2012-01-06 18:06:53'),
(2804, 6, '2012-01-05 18:06:54'),
(2805, 6, '2012-01-03 18:06:54'),
(2806, 6, '2012-01-02 18:06:54'),
(2807, 6, '2012-01-09 18:06:54'),
(2808, 6, '2012-01-10 18:06:54'),
(2809, 6, '2012-01-04 18:06:54'),
(2810, 6, '2012-01-11 18:06:54'),
(2811, 6, '2012-01-12 18:06:54'),
(2812, 6, '2012-01-13 18:06:54'),
(2813, 6, '2012-01-19 18:06:54'),
(3514, 7, '2012-02-08 14:53:16'),
(3515, 7, '2012-02-01 14:53:16'),
(3516, 7, '2012-02-12 14:53:16'),
(3517, 7, '2012-02-10 14:53:16'),
(3518, 7, '2012-02-09 14:53:16'),
(3519, 7, '2012-02-11 14:53:16'),
(3520, 7, '2012-02-19 14:53:16'),
(3521, 7, '2012-02-18 14:53:16'),
(3522, 7, '2012-02-17 14:53:16'),
(3523, 7, '2012-02-16 14:53:16'),
(3524, 7, '2012-02-02 14:53:16'),
(3525, 7, '2012-02-04 14:53:16'),
(3526, 7, '2012-02-05 14:53:16'),
(3527, 7, '2012-02-03 14:53:16'),
(3528, 7, '2012-02-06 14:53:16'),
(3529, 7, '2012-02-07 14:53:16'),
(3530, 7, '2012-02-15 14:53:16'),
(3531, 7, '2012-02-14 14:53:16'),
(3532, 7, '2012-02-13 14:53:16'),
(3533, 7, '2012-02-20 14:53:16'),
(3534, 7, '2012-02-21 14:53:16'),
(3535, 7, '2012-02-22 14:53:16'),
(3536, 7, '2012-02-23 14:53:16'),
(3537, 7, '2012-02-24 14:53:16'),
(3538, 7, '2012-02-25 14:53:16'),
(3539, 7, '2012-02-26 14:53:16'),
(3540, 7, '2012-02-27 14:53:16'),
(3541, 7, '2012-02-28 14:53:16'),
(3542, 7, '2012-02-29 14:53:16'),
(3543, 7, '2012-03-01 14:53:16'),
(3544, 7, '2012-03-02 14:53:16'),
(3545, 7, '2012-03-03 14:53:16'),
(3546, 7, '2012-03-04 14:53:16'),
(3897, 2, '2011-12-26 17:58:18'),
(3898, 2, '2011-12-27 17:58:18'),
(3899, 2, '2011-12-28 17:58:18'),
(3900, 2, '2011-12-29 17:58:18'),
(3901, 2, '2012-01-06 17:58:18'),
(3902, 2, '2011-12-30 17:58:18'),
(3903, 2, '2011-12-31 17:58:18'),
(3904, 2, '2012-01-01 17:58:18'),
(3905, 2, '2012-01-08 17:58:18'),
(3906, 2, '2012-01-02 17:58:18'),
(3907, 2, '2012-01-03 17:58:18'),
(3908, 2, '2012-01-04 17:58:18'),
(3909, 2, '2012-01-05 17:58:18'),
(3910, 2, '2012-01-07 17:58:18'),
(3911, 2, '2012-01-15 17:58:18'),
(3912, 2, '2012-01-14 17:58:18'),
(3913, 2, '2012-01-12 17:58:18'),
(3914, 2, '2012-01-10 17:58:18'),
(3915, 2, '2012-01-09 17:58:18'),
(3916, 2, '2012-01-11 17:58:18'),
(3917, 2, '2012-01-13 17:58:18'),
(3918, 2, '2012-01-16 17:58:18'),
(3919, 2, '2012-01-17 17:58:18'),
(3920, 2, '2012-01-24 17:58:18'),
(3921, 2, '2012-01-31 17:58:18'),
(3922, 2, '2012-01-25 17:58:18'),
(3923, 2, '2012-01-18 17:58:18'),
(3924, 2, '2012-01-26 17:58:18'),
(3925, 2, '2012-01-27 17:58:18'),
(3926, 2, '2012-01-28 17:58:18'),
(3927, 2, '2012-01-29 17:58:18'),
(3928, 2, '2012-01-22 17:58:18'),
(3929, 2, '2012-01-21 17:58:18'),
(3930, 2, '2012-01-20 17:58:18'),
(3931, 2, '2012-01-19 17:58:18'),
(3932, 2, '2012-01-23 17:58:18'),
(3933, 2, '2012-01-30 17:58:18'),
(3934, 2, '2012-02-01 17:58:18'),
(3935, 2, '2012-02-02 17:58:18'),
(3936, 2, '2012-02-04 17:58:18'),
(3937, 2, '2012-02-03 17:58:18'),
(3938, 2, '2012-02-05 17:58:18'),
(3939, 2, '2012-02-12 17:58:18'),
(3940, 2, '2012-02-11 17:58:18'),
(3941, 2, '2012-02-10 17:58:18'),
(3942, 2, '2012-02-09 17:58:18'),
(3943, 2, '2012-02-07 17:58:18'),
(3944, 2, '2012-02-06 17:58:18'),
(3945, 2, '2012-02-08 17:58:18'),
(3946, 2, '2012-02-15 17:58:18'),
(3947, 2, '2012-02-13 17:58:18'),
(3948, 2, '2012-02-20 17:58:18'),
(3949, 2, '2012-02-27 17:58:18'),
(3950, 2, '2012-03-05 17:58:18'),
(3951, 2, '2012-03-07 17:58:18'),
(3952, 2, '2012-03-09 17:58:18'),
(3953, 2, '2012-03-10 17:58:18'),
(3954, 2, '2012-03-11 17:58:18'),
(3955, 2, '2012-03-08 17:58:18'),
(3956, 2, '2012-03-06 17:58:18'),
(3957, 2, '2012-02-21 17:58:18'),
(3958, 2, '2012-02-22 17:58:18'),
(3959, 2, '2012-02-23 17:58:18'),
(3960, 2, '2012-02-24 17:58:18'),
(3961, 2, '2012-02-25 17:58:18'),
(3962, 2, '2012-02-26 17:58:18'),
(3963, 2, '2012-03-04 17:58:18'),
(3964, 2, '2012-03-03 17:58:18'),
(3965, 2, '2012-03-02 17:58:18'),
(3966, 2, '2012-03-01 17:58:18'),
(3967, 2, '2012-02-29 17:58:18'),
(3968, 2, '2012-02-28 17:58:18'),
(3969, 2, '2012-02-14 17:58:18'),
(3970, 2, '2012-02-16 17:58:18'),
(3971, 2, '2012-02-17 17:58:18'),
(3972, 2, '2012-02-18 17:58:18'),
(3973, 2, '2012-02-19 17:58:18'),
(3974, 2, '2012-03-18 17:58:18'),
(3975, 2, '2012-03-17 17:58:18'),
(3976, 2, '2012-03-16 17:58:18'),
(3977, 2, '2012-03-15 17:58:18'),
(3978, 2, '2012-03-14 17:58:18'),
(3979, 2, '2012-03-12 17:58:18'),
(3980, 2, '2012-03-13 17:58:18'),
(3981, 2, '2012-03-27 17:58:18'),
(3982, 2, '2012-04-02 17:58:18'),
(3983, 2, '2012-04-03 17:58:18'),
(3984, 2, '2012-04-05 17:58:18'),
(3985, 2, '2012-04-06 17:58:18'),
(3986, 2, '2012-04-07 17:58:18'),
(3987, 2, '2012-04-08 17:58:18'),
(3988, 2, '2012-04-01 17:58:18'),
(3989, 2, '2012-03-31 17:58:19'),
(3990, 2, '2012-03-30 17:58:19'),
(3991, 2, '2012-03-29 17:58:19'),
(3992, 2, '2012-03-26 17:58:19'),
(3993, 2, '2012-03-19 17:58:19'),
(3994, 2, '2012-03-21 17:58:19'),
(3995, 2, '2012-04-04 17:58:19'),
(3996, 2, '2012-03-23 17:58:19'),
(3997, 2, '2012-03-24 17:58:19'),
(3998, 2, '2012-03-25 17:58:19'),
(3999, 2, '2012-03-22 17:58:19'),
(4000, 2, '2012-03-20 17:58:19'),
(4001, 2, '2012-03-28 17:58:19'),
(4002, 2, '2012-04-16 17:58:19'),
(4003, 2, '2012-04-17 17:58:19'),
(4004, 2, '2012-04-19 17:58:19'),
(4005, 2, '2012-04-21 17:58:19'),
(4006, 2, '2012-04-22 17:58:19'),
(4007, 2, '2012-04-20 17:58:19'),
(4008, 2, '2012-04-18 17:58:19'),
(4009, 2, '2012-04-24 17:58:19'),
(4010, 2, '2012-04-23 17:58:19'),
(4011, 2, '2012-04-26 17:58:19'),
(4012, 2, '2012-04-27 17:58:19'),
(4013, 2, '2012-04-29 17:58:19'),
(4014, 2, '2012-04-28 17:58:19'),
(4015, 2, '2012-04-14 17:58:19'),
(4016, 2, '2012-04-15 17:58:19'),
(4017, 2, '2012-04-13 17:58:19'),
(4018, 2, '2012-04-12 17:58:19'),
(4019, 2, '2012-04-11 17:58:19'),
(4020, 2, '2012-04-10 17:58:19'),
(4021, 2, '2012-04-09 17:58:19'),
(4022, 2, '2012-04-25 17:58:19'),
(4023, 2, '2012-04-30 17:58:19'),
(4024, 2, '2012-05-02 17:58:19'),
(4025, 2, '2012-05-03 17:58:19'),
(4026, 2, '2012-05-06 17:58:19'),
(4027, 2, '2012-05-05 17:58:19'),
(4028, 2, '2012-05-04 17:58:19'),
(4029, 2, '2012-05-01 17:58:19'),
(4030, 2, '2012-05-07 17:58:19'),
(4031, 2, '2012-05-08 17:58:19'),
(4032, 2, '2012-05-09 17:58:19'),
(4033, 2, '2012-05-10 17:58:19'),
(4034, 2, '2012-05-13 17:58:19'),
(4035, 2, '2012-05-27 17:58:19'),
(4036, 2, '2012-05-20 17:58:19'),
(4037, 2, '2012-05-12 17:58:19'),
(4038, 2, '2012-05-11 17:58:19'),
(4039, 2, '2012-05-18 17:58:19'),
(4040, 2, '2012-05-17 17:58:19'),
(4041, 2, '2012-05-16 17:58:19'),
(4042, 2, '2012-05-15 17:58:19'),
(4043, 2, '2012-05-14 17:58:19'),
(4044, 2, '2012-05-28 17:58:19'),
(4045, 2, '2012-05-29 17:58:19'),
(4046, 2, '2012-05-30 17:58:19'),
(4047, 2, '2012-05-19 17:58:19'),
(4048, 2, '2012-06-02 17:58:19'),
(4049, 2, '2012-05-25 17:58:19'),
(4050, 2, '2012-05-22 17:58:19'),
(4051, 2, '2012-05-21 17:58:19'),
(4052, 2, '2012-05-24 17:58:19'),
(4053, 2, '2012-05-23 17:58:19'),
(4054, 2, '2012-05-26 17:58:19'),
(4055, 2, '2012-06-01 17:58:19'),
(4056, 2, '2012-05-31 17:58:19'),
(4057, 2, '2012-06-03 17:58:19'),
(4058, 2, '2012-06-10 17:58:19'),
(4059, 2, '2012-06-09 17:58:19'),
(4060, 2, '2012-06-08 17:58:19'),
(4061, 2, '2012-06-07 17:58:19'),
(4062, 2, '2012-06-06 17:58:19'),
(4063, 2, '2012-06-05 17:58:19'),
(4064, 2, '2012-06-04 17:58:19'),
(4065, 2, '2012-06-11 17:58:19'),
(4066, 2, '2012-06-13 17:58:19'),
(4067, 2, '2012-06-14 17:58:19'),
(4068, 2, '2012-06-16 17:58:19'),
(4069, 2, '2012-06-17 17:58:19'),
(4070, 2, '2012-06-24 17:58:19'),
(4071, 2, '2012-07-01 17:58:19'),
(4072, 2, '2012-07-08 17:58:19'),
(4073, 2, '2012-07-07 17:58:19'),
(4074, 2, '2012-07-05 17:58:19'),
(4075, 2, '2012-07-06 17:58:19'),
(4076, 2, '2012-07-02 17:58:19'),
(4077, 2, '2012-06-25 17:58:19'),
(4078, 2, '2012-06-18 17:58:19'),
(4079, 2, '2012-06-19 17:58:19'),
(4080, 2, '2012-06-12 17:58:19'),
(4081, 2, '2012-06-15 17:58:19'),
(4082, 2, '2012-06-23 17:58:19'),
(4083, 2, '2012-06-22 17:58:19'),
(4084, 2, '2012-06-21 17:58:19'),
(4085, 2, '2012-06-20 17:58:19'),
(4086, 2, '2012-06-27 17:58:19'),
(4087, 2, '2012-06-29 17:58:19'),
(4088, 2, '2012-06-30 17:58:19'),
(4089, 2, '2012-06-28 17:58:19'),
(4090, 2, '2012-07-04 17:58:19'),
(4091, 2, '2012-07-03 17:58:19'),
(4092, 2, '2012-06-26 17:58:19'),
(4093, 2, '2012-07-20 17:58:19'),
(4094, 2, '2012-07-27 17:58:19'),
(4095, 2, '2012-07-28 17:58:19'),
(4096, 2, '2012-07-29 17:58:19'),
(4097, 2, '2012-07-22 17:58:19'),
(4098, 2, '2012-07-15 17:58:19'),
(4099, 2, '2012-07-14 17:58:19'),
(4100, 2, '2012-07-13 17:58:19'),
(4101, 2, '2012-07-12 17:58:19'),
(4102, 2, '2012-07-11 17:58:19'),
(4103, 2, '2012-07-10 17:58:19'),
(4104, 2, '2012-07-09 17:58:19'),
(4105, 2, '2012-07-16 17:58:19'),
(4106, 2, '2012-07-17 17:58:19'),
(4107, 2, '2012-07-18 17:58:19'),
(4108, 2, '2012-07-19 17:58:19'),
(4109, 2, '2012-07-21 17:58:19'),
(4110, 2, '2012-07-23 17:58:19'),
(4111, 2, '2012-07-24 17:58:19'),
(4112, 2, '2012-07-26 17:58:19'),
(4113, 2, '2012-07-25 17:58:19'),
(4114, 2, '2012-08-01 17:58:19'),
(4115, 2, '2012-08-02 17:58:19'),
(4116, 2, '2012-08-03 17:58:19'),
(4117, 2, '2012-08-04 17:58:19'),
(4118, 2, '2012-07-31 17:58:19'),
(4119, 2, '2012-07-30 17:58:19'),
(4120, 2, '2012-08-05 17:58:19'),
(4121, 2, '2012-08-14 17:58:19'),
(4122, 2, '2012-08-30 17:58:19'),
(4123, 2, '2012-09-01 17:58:19'),
(4124, 2, '2012-09-02 17:58:19'),
(4125, 2, '2012-08-26 17:58:19'),
(4126, 2, '2012-08-19 17:58:19'),
(4127, 2, '2012-08-11 17:58:19'),
(4128, 2, '2012-08-07 17:58:19'),
(4129, 2, '2012-08-06 17:58:19'),
(4130, 2, '2012-08-13 17:58:19'),
(4131, 2, '2012-08-20 17:58:19'),
(4132, 2, '2012-08-10 17:58:19'),
(4133, 2, '2012-08-09 17:58:19'),
(4134, 2, '2012-08-08 17:58:19'),
(4135, 2, '2012-08-15 17:58:19'),
(4136, 2, '2012-08-16 17:58:19'),
(4137, 2, '2012-08-17 17:58:19'),
(4138, 2, '2012-08-12 17:58:19'),
(4139, 2, '2012-08-18 17:58:19'),
(4140, 2, '2012-08-25 17:58:19'),
(4141, 2, '2012-08-24 17:58:19'),
(4142, 2, '2012-08-22 17:58:19'),
(4143, 2, '2012-08-21 17:58:19'),
(4144, 2, '2012-08-23 17:58:19'),
(4145, 2, '2012-08-31 17:58:19'),
(4146, 2, '2012-09-07 17:58:19'),
(4147, 2, '2012-09-09 17:58:19'),
(4148, 2, '2012-09-08 17:58:19'),
(4149, 2, '2012-08-27 17:58:19'),
(4150, 2, '2012-08-28 17:58:19'),
(4151, 2, '2012-08-29 17:58:19'),
(4152, 2, '2012-09-06 17:58:19'),
(4153, 2, '2012-09-05 17:58:19'),
(4154, 2, '2012-09-04 17:58:19'),
(4155, 2, '2012-09-03 17:58:19'),
(4156, 2, '2012-09-23 17:58:19'),
(4157, 2, '2012-09-30 17:58:19'),
(4158, 2, '2012-10-07 17:58:19'),
(4159, 2, '2012-10-06 17:58:19'),
(4160, 2, '2012-10-05 17:58:19'),
(4161, 2, '2012-10-04 17:58:19'),
(4162, 2, '2012-10-02 17:58:19'),
(4163, 2, '2012-10-01 17:58:19'),
(4164, 2, '2012-09-24 17:58:19'),
(4165, 2, '2012-09-17 17:58:19'),
(4166, 2, '2012-09-10 17:58:19'),
(4167, 2, '2012-09-11 17:58:19'),
(4168, 2, '2012-09-14 17:58:19'),
(4169, 2, '2012-09-15 17:58:19'),
(4170, 2, '2012-09-16 17:58:19'),
(4171, 2, '2012-09-13 17:58:19'),
(4172, 2, '2012-09-12 17:58:19'),
(4173, 2, '2012-09-19 17:58:19'),
(4174, 2, '2012-09-26 17:58:19'),
(4175, 2, '2012-09-27 17:58:19'),
(4176, 2, '2012-09-28 17:58:19'),
(4177, 2, '2012-09-29 17:58:19'),
(4178, 2, '2012-09-22 17:58:19'),
(4179, 2, '2012-09-21 17:58:19'),
(4180, 2, '2012-09-20 17:58:19'),
(4181, 2, '2012-09-18 17:58:19'),
(4182, 2, '2012-09-25 17:58:19'),
(4183, 2, '2012-10-03 17:58:19'),
(4184, 2, '2012-10-08 17:58:19'),
(4185, 2, '2012-10-09 17:58:19'),
(4186, 2, '2012-10-10 17:58:19'),
(4187, 2, '2012-10-11 17:58:19'),
(4188, 2, '2012-10-12 17:58:19'),
(4189, 2, '2012-10-13 17:58:19'),
(4190, 2, '2012-10-14 17:58:19'),
(4191, 2, '2012-10-21 17:58:19'),
(4192, 2, '2012-10-20 17:58:19'),
(4193, 2, '2012-10-19 17:58:19'),
(4194, 2, '2012-10-18 17:58:19'),
(4195, 2, '2012-10-16 17:58:19'),
(4196, 2, '2012-10-15 17:58:19'),
(4197, 2, '2012-10-17 17:58:19'),
(4198, 2, '2012-10-24 17:58:19'),
(4199, 2, '2012-11-01 17:58:19'),
(4200, 2, '2012-11-03 17:58:19'),
(4201, 2, '2012-11-04 17:58:19'),
(4202, 2, '2012-10-28 17:58:19'),
(4203, 2, '2012-10-27 17:58:19'),
(4204, 2, '2012-10-26 17:58:19'),
(4205, 2, '2012-10-25 17:58:19'),
(4206, 2, '2012-10-23 17:58:19'),
(4207, 2, '2012-10-22 17:58:19'),
(4208, 2, '2012-10-29 17:58:19'),
(4209, 2, '2012-10-30 17:58:19'),
(4210, 2, '2012-10-31 17:58:19'),
(4211, 2, '2012-11-02 17:58:19'),
(4212, 2, '2012-11-09 17:58:19'),
(4213, 2, '2012-11-10 17:58:19'),
(4214, 2, '2012-11-11 17:58:19'),
(4215, 2, '2012-11-05 17:58:19'),
(4216, 2, '2012-11-06 17:58:19'),
(4217, 2, '2012-11-07 17:58:19'),
(4218, 2, '2012-11-08 17:58:19'),
(4219, 2, '2012-11-25 17:58:19'),
(4220, 2, '2012-12-09 17:58:19'),
(4221, 2, '2012-12-02 17:58:19'),
(4222, 2, '2012-11-18 17:58:20'),
(4223, 2, '2012-11-17 17:58:20'),
(4224, 2, '2012-11-16 17:58:20'),
(4225, 2, '2012-11-14 17:58:20'),
(4226, 2, '2012-11-13 17:58:20'),
(4227, 2, '2012-11-12 17:58:20'),
(4228, 2, '2012-11-19 17:58:20'),
(4229, 2, '2012-11-20 17:58:20'),
(4230, 2, '2012-11-21 17:58:20'),
(4231, 2, '2012-11-22 17:58:20'),
(4232, 2, '2012-11-24 17:58:20'),
(4233, 2, '2012-11-23 17:58:20'),
(4234, 2, '2012-11-15 17:58:20'),
(4235, 2, '2012-11-26 17:58:20'),
(4236, 2, '2012-11-27 17:58:20'),
(4237, 2, '2012-11-28 17:58:20'),
(4238, 2, '2012-11-29 17:58:20'),
(4239, 2, '2012-11-30 17:58:20'),
(4240, 2, '2012-12-01 17:58:20'),
(4241, 2, '2012-12-08 17:58:20'),
(4242, 2, '2012-12-07 17:58:20'),
(4243, 2, '2012-12-05 17:58:20'),
(4244, 2, '2012-12-04 17:58:20'),
(4245, 2, '2012-12-03 17:58:20'),
(4246, 2, '2012-12-06 17:58:20'),
(4247, 3, '2011-12-27 16:33:46'),
(4248, 3, '2012-01-03 16:33:46'),
(4249, 3, '2012-01-04 16:33:46'),
(4250, 3, '2011-12-28 16:33:46'),
(4251, 3, '2011-12-26 16:33:46'),
(4252, 3, '2012-01-02 16:33:46'),
(4253, 3, '2012-01-05 16:33:46'),
(4254, 3, '2011-12-29 16:33:46'),
(4255, 3, '2012-01-06 16:33:46'),
(4256, 3, '2012-01-07 16:33:46'),
(4257, 3, '2011-12-30 16:33:46'),
(4258, 3, '2011-12-31 16:33:46'),
(4259, 3, '2012-01-01 16:33:46'),
(4260, 3, '2012-01-08 16:33:46'),
(4261, 3, '2012-01-15 16:33:46'),
(4262, 3, '2012-01-14 16:33:46'),
(4263, 3, '2012-01-13 16:33:46'),
(4264, 3, '2012-01-11 16:33:46'),
(4265, 3, '2012-01-12 16:33:46'),
(4266, 3, '2012-01-10 16:33:46'),
(4267, 3, '2012-01-09 16:33:46'),
(4268, 3, '2012-01-16 16:33:46'),
(4269, 3, '2012-01-17 16:33:46'),
(4270, 3, '2012-01-18 16:33:46'),
(4271, 3, '2012-01-19 16:33:46'),
(4272, 3, '2012-01-20 16:33:46'),
(4273, 3, '2012-01-22 16:33:46'),
(4274, 3, '2012-01-21 16:33:46'),
(4275, 3, '2012-01-29 16:33:46'),
(4276, 3, '2012-01-28 16:33:46'),
(4277, 3, '2012-01-27 16:33:46'),
(4278, 3, '2012-01-26 16:33:46'),
(4279, 3, '2012-01-24 16:33:46'),
(4280, 3, '2012-01-25 16:33:46'),
(4281, 3, '2012-01-23 16:33:46'),
(4282, 3, '2012-01-30 16:33:46'),
(4283, 3, '2012-01-31 16:33:46'),
(4284, 3, '2012-02-01 16:33:46'),
(4285, 3, '2012-02-03 16:33:46'),
(4286, 3, '2012-02-05 16:33:46'),
(4287, 3, '2012-02-04 16:33:46'),
(4288, 3, '2012-02-02 16:33:46'),
(4289, 3, '2012-02-06 16:33:46'),
(4290, 3, '2012-02-08 16:33:46'),
(4291, 3, '2012-02-07 16:33:46'),
(4292, 3, '2012-02-09 16:33:46'),
(4293, 3, '2012-02-10 16:33:46'),
(4294, 3, '2012-02-12 16:33:46'),
(4295, 3, '2012-02-11 16:33:46'),
(4296, 3, '2012-02-19 16:33:46'),
(4297, 3, '2012-02-18 16:33:46'),
(4298, 3, '2012-02-17 16:33:46'),
(4299, 3, '2012-02-16 16:33:46'),
(4300, 3, '2012-02-15 16:33:46'),
(4301, 3, '2012-02-14 16:33:46'),
(4302, 3, '2012-02-13 16:33:46'),
(4303, 3, '2012-02-24 16:33:46'),
(4304, 3, '2012-02-25 16:33:46'),
(4305, 3, '2012-02-26 16:33:46'),
(4306, 3, '2012-02-29 16:33:46'),
(4307, 3, '2012-03-10 16:33:46'),
(4308, 3, '2012-03-11 16:33:46'),
(4309, 3, '2012-03-13 16:33:46'),
(4310, 3, '2012-03-14 16:33:46'),
(4311, 3, '2012-03-15 16:33:46'),
(4312, 3, '2012-03-23 16:33:46'),
(4313, 3, '2012-03-01 16:33:46'),
(4314, 3, '2012-02-28 16:33:46'),
(4315, 3, '2012-03-27 16:33:46'),
(4316, 3, '2012-03-09 16:33:46'),
(4317, 3, '2012-03-08 16:33:46'),
(4318, 3, '2012-03-30 16:33:46'),
(4319, 3, '2012-03-24 16:33:46'),
(4320, 3, '2012-03-25 16:33:46'),
(4321, 3, '2012-03-29 16:33:46'),
(4322, 3, '2012-03-28 16:33:46'),
(4323, 3, '2012-03-26 16:33:46'),
(4324, 3, '2012-03-31 16:33:46'),
(4325, 3, '2012-04-01 16:33:46'),
(4326, 3, '2012-03-12 16:33:46'),
(4327, 3, '2012-04-05 16:33:46'),
(4328, 3, '2012-04-04 16:33:46'),
(4329, 3, '2012-04-03 16:33:46'),
(4330, 3, '2012-04-02 16:33:46'),
(4331, 3, '2012-04-06 16:33:46'),
(4332, 3, '2012-03-04 16:33:46'),
(4333, 3, '2012-03-03 16:33:46'),
(4334, 3, '2012-03-02 16:33:46'),
(4335, 3, '2012-03-07 16:33:46'),
(4336, 3, '2012-03-06 16:33:46'),
(4337, 3, '2012-03-05 16:33:46'),
(4338, 3, '2012-02-27 16:33:46'),
(4339, 3, '2012-02-20 16:33:46'),
(4340, 3, '2012-02-21 16:33:46'),
(4341, 3, '2012-02-23 16:33:46'),
(4342, 3, '2012-02-22 16:33:46'),
(4343, 3, '2012-03-21 16:33:46'),
(4344, 3, '2012-03-22 16:33:46'),
(4345, 3, '2012-03-17 16:33:46'),
(4346, 3, '2012-03-18 16:33:46'),
(4347, 3, '2012-03-16 16:33:46'),
(4348, 3, '2012-03-20 16:33:46'),
(4349, 3, '2012-03-19 16:33:46'),
(4350, 3, '2012-04-07 16:33:46'),
(4351, 3, '2012-04-08 16:33:46'),
(4352, 3, '2012-05-05 16:33:46'),
(4353, 3, '2012-05-03 16:33:46'),
(4354, 3, '2012-05-02 16:33:46'),
(4355, 3, '2012-05-01 16:33:46'),
(4356, 3, '2012-04-30 16:33:46'),
(4357, 3, '2012-04-23 16:33:46'),
(4358, 3, '2012-04-16 16:33:46'),
(4359, 3, '2012-04-09 16:33:46'),
(4360, 3, '2012-04-10 16:33:46'),
(4361, 3, '2012-04-11 16:33:46'),
(4362, 3, '2012-04-12 16:33:46'),
(4363, 3, '2012-04-13 16:33:46'),
(4364, 3, '2012-04-14 16:33:46'),
(4365, 3, '2012-04-15 16:33:46'),
(4366, 3, '2012-04-22 16:33:46'),
(4367, 3, '2012-04-21 16:33:46'),
(4368, 3, '2012-04-19 16:33:46'),
(4369, 3, '2012-04-18 16:33:46'),
(4370, 3, '2012-04-17 16:33:46'),
(4371, 3, '2012-04-24 16:33:46'),
(4372, 3, '2012-04-25 16:33:46'),
(4373, 3, '2012-04-26 16:33:46'),
(4374, 3, '2012-04-27 16:33:46'),
(4375, 3, '2012-04-28 16:33:46'),
(4376, 3, '2012-04-29 16:33:46'),
(4377, 3, '2012-04-20 16:33:46'),
(4378, 3, '2012-05-04 16:33:46'),
(4379, 3, '2012-05-20 16:33:46'),
(4380, 3, '2012-05-27 16:33:46'),
(4381, 3, '2012-05-13 16:33:46'),
(4382, 3, '2012-05-06 16:33:46'),
(4383, 3, '2012-05-12 16:33:46'),
(4384, 3, '2012-05-08 16:33:46'),
(4385, 3, '2012-05-07 16:33:46'),
(4386, 3, '2012-05-14 16:33:46'),
(4387, 3, '2012-05-21 16:33:46'),
(4388, 3, '2012-05-22 16:33:46'),
(4389, 3, '2012-05-23 16:33:46'),
(4390, 3, '2012-05-24 16:33:46'),
(4391, 3, '2012-05-25 16:33:46'),
(4392, 3, '2012-05-26 16:33:46'),
(4393, 3, '2012-05-19 16:33:46'),
(4394, 3, '2012-05-18 16:33:46'),
(4395, 3, '2012-05-16 16:33:46'),
(4396, 3, '2012-05-15 16:33:46'),
(4397, 3, '2012-05-31 16:33:46'),
(4398, 3, '2012-06-09 16:33:46'),
(4399, 3, '2012-06-10 16:33:46'),
(4400, 3, '2012-06-07 16:33:46'),
(4401, 3, '2012-06-06 16:33:46'),
(4402, 3, '2012-06-05 16:33:46'),
(4403, 3, '2012-06-04 16:33:46'),
(4404, 3, '2012-05-28 16:33:46'),
(4405, 3, '2012-05-29 16:33:46'),
(4406, 3, '2012-05-30 16:33:46'),
(4407, 3, '2012-06-08 16:33:46'),
(4408, 3, '2012-06-17 16:33:46'),
(4409, 3, '2012-06-24 16:33:46'),
(4410, 3, '2012-07-01 16:33:46'),
(4411, 3, '2012-07-08 16:33:46'),
(4412, 3, '2012-07-07 16:33:46'),
(4413, 3, '2012-07-06 16:33:46'),
(4414, 3, '2012-07-05 16:33:46'),
(4415, 3, '2012-07-04 16:33:46'),
(4416, 3, '2012-07-03 16:33:46'),
(4417, 3, '2012-07-02 16:33:46'),
(4418, 3, '2012-06-25 16:33:46'),
(4419, 3, '2012-06-18 16:33:46'),
(4420, 3, '2012-06-11 16:33:46'),
(4421, 3, '2012-06-12 16:33:46'),
(4422, 3, '2012-06-13 16:33:46'),
(4423, 3, '2012-06-14 16:33:46'),
(4424, 3, '2012-06-15 16:33:46'),
(4425, 3, '2012-06-16 16:33:46'),
(4426, 3, '2012-06-23 16:33:46'),
(4427, 3, '2012-06-30 16:33:46'),
(4428, 3, '2012-06-29 16:33:46'),
(4429, 3, '2012-06-28 16:33:46'),
(4430, 3, '2012-06-27 16:33:46'),
(4431, 3, '2012-06-26 16:33:46'),
(4432, 3, '2012-06-19 16:33:46'),
(4433, 3, '2012-06-20 16:33:46'),
(4434, 3, '2012-06-21 16:33:46'),
(4435, 3, '2012-06-22 16:33:46'),
(4436, 3, '2012-07-15 16:33:46'),
(4437, 3, '2012-07-22 16:33:46'),
(4438, 3, '2012-07-29 16:33:46'),
(4439, 3, '2012-08-05 16:33:46'),
(4440, 3, '2012-07-09 16:33:46'),
(4441, 3, '2012-07-16 16:33:46'),
(4442, 3, '2012-07-30 16:33:46'),
(4443, 3, '2012-07-23 16:33:46'),
(4444, 3, '2012-07-24 16:33:46'),
(4445, 3, '2012-07-26 16:33:46'),
(4446, 3, '2012-07-27 16:33:46'),
(4447, 3, '2012-07-28 16:33:46'),
(4448, 3, '2012-07-21 16:33:46'),
(4449, 3, '2012-07-14 16:33:46'),
(4450, 3, '2012-07-12 16:33:46'),
(4451, 3, '2012-07-11 16:33:46'),
(4452, 3, '2012-07-10 16:33:46'),
(4453, 3, '2012-07-17 16:33:46'),
(4454, 3, '2012-07-18 16:33:46'),
(4455, 3, '2012-07-19 16:33:46'),
(4456, 3, '2012-07-20 16:33:46'),
(4457, 3, '2012-07-13 16:33:46'),
(4458, 3, '2012-07-25 16:33:46'),
(4459, 3, '2012-07-31 16:33:46'),
(4460, 3, '2012-08-01 16:33:46'),
(4461, 3, '2012-08-02 16:33:46'),
(4462, 3, '2012-08-04 16:33:46'),
(4463, 3, '2012-08-03 16:33:46'),
(4464, 3, '2012-08-12 16:33:46'),
(4465, 3, '2012-08-11 16:33:46'),
(4466, 3, '2012-08-10 16:33:46'),
(4467, 3, '2012-08-09 16:33:46'),
(4468, 3, '2012-08-08 16:33:46'),
(4469, 3, '2012-08-07 16:33:46'),
(4470, 3, '2012-08-06 16:33:46'),
(4471, 3, '2012-08-13 16:33:46'),
(4472, 3, '2012-08-21 16:33:46'),
(4473, 3, '2012-08-29 16:33:46'),
(4474, 3, '2012-08-31 16:33:46'),
(4475, 3, '2012-09-01 16:33:46'),
(4476, 3, '2012-09-02 16:33:46'),
(4477, 3, '2012-08-26 16:33:46'),
(4478, 3, '2012-08-19 16:33:46'),
(4479, 3, '2012-08-18 16:33:46'),
(4480, 3, '2012-08-17 16:33:46'),
(4481, 3, '2012-08-16 16:33:46'),
(4482, 3, '2012-08-15 16:33:46'),
(4483, 3, '2012-08-14 16:33:46'),
(4484, 3, '2012-08-20 16:33:46'),
(4485, 3, '2012-08-27 16:33:46'),
(4486, 3, '2012-08-28 16:33:46'),
(4487, 3, '2012-08-30 16:33:46'),
(4488, 3, '2012-08-23 16:33:46'),
(4489, 3, '2012-08-22 16:33:46'),
(4490, 3, '2012-08-24 16:33:46'),
(4491, 3, '2012-08-25 16:33:46'),
(4492, 3, '2012-09-08 16:33:46'),
(4493, 3, '2012-09-07 16:33:46'),
(4494, 3, '2012-09-06 16:33:46'),
(4495, 3, '2012-09-05 16:33:46'),
(4496, 3, '2012-09-04 16:33:46'),
(4497, 3, '2012-09-03 16:33:46'),
(4498, 3, '2012-09-09 16:33:46'),
(4499, 3, '2012-09-16 16:33:46'),
(4500, 3, '2012-09-15 16:33:46'),
(4501, 3, '2012-09-14 16:33:46'),
(4502, 3, '2012-09-11 16:33:46'),
(4503, 3, '2012-09-19 16:33:46'),
(4504, 3, '2012-09-27 16:33:46'),
(4505, 3, '2012-09-28 16:33:46'),
(4506, 3, '2012-09-29 16:33:46'),
(4507, 3, '2012-09-30 16:33:46'),
(4508, 3, '2012-09-23 16:33:46'),
(4509, 3, '2012-09-22 16:33:46'),
(4510, 3, '2012-09-20 16:33:46'),
(4511, 3, '2012-09-21 16:33:46'),
(4512, 3, '2012-09-13 16:33:46'),
(4513, 3, '2012-09-12 16:33:46'),
(4514, 3, '2012-09-10 16:33:46'),
(4515, 3, '2012-09-17 16:33:46'),
(4516, 3, '2012-09-18 16:33:46'),
(4517, 3, '2012-10-02 16:33:46'),
(4518, 3, '2012-10-01 16:33:46'),
(4519, 3, '2012-09-24 16:33:46'),
(4520, 3, '2012-09-25 16:33:46'),
(4521, 3, '2012-09-26 16:33:46'),
(4522, 3, '2012-10-03 16:33:46'),
(4523, 3, '2012-10-04 16:33:46'),
(4524, 3, '2012-10-05 16:33:46'),
(4525, 3, '2012-10-06 16:33:46'),
(4526, 3, '2012-10-07 16:33:46'),
(4527, 3, '2012-10-08 16:33:47'),
(4528, 3, '2012-10-09 16:33:47'),
(4529, 3, '2012-10-10 16:33:47'),
(4530, 3, '2012-10-11 16:33:47'),
(4531, 3, '2012-10-12 16:33:47'),
(4532, 3, '2012-10-13 16:33:47'),
(4533, 3, '2012-10-14 16:33:47'),
(4534, 3, '2012-10-21 16:33:47'),
(4535, 3, '2012-11-04 16:33:47'),
(4536, 3, '2012-11-10 16:33:47'),
(4537, 3, '2012-11-07 16:33:47'),
(4538, 3, '2012-11-05 16:33:47'),
(4539, 3, '2012-11-06 16:33:47'),
(4540, 3, '2012-10-30 16:33:47'),
(4541, 3, '2012-10-29 16:33:47'),
(4542, 3, '2012-10-22 16:33:47'),
(4543, 3, '2012-10-15 16:33:47'),
(4544, 3, '2012-10-16 16:33:47'),
(4545, 3, '2012-10-18 16:33:47'),
(4546, 3, '2012-10-19 16:33:47'),
(4547, 3, '2012-10-20 16:33:47'),
(4548, 3, '2012-10-27 16:33:47'),
(4549, 3, '2012-11-03 16:33:47'),
(4550, 3, '2012-11-02 16:33:47'),
(4551, 3, '2012-11-01 16:33:47'),
(4552, 3, '2012-10-31 16:33:47'),
(4553, 3, '2012-10-24 16:33:47'),
(4554, 3, '2012-10-17 16:33:47'),
(4555, 3, '2012-10-23 16:33:47'),
(4556, 3, '2012-10-26 16:33:47'),
(4557, 3, '2012-10-25 16:33:47'),
(4558, 3, '2012-10-28 16:33:47'),
(4559, 3, '2012-11-11 16:33:47'),
(4560, 3, '2012-11-09 16:33:47'),
(4561, 3, '2012-11-08 16:33:47'),
(4562, 3, '2012-11-18 16:33:47'),
(4563, 3, '2012-11-17 16:33:47'),
(4564, 3, '2012-11-15 16:33:47'),
(4565, 3, '2012-11-14 16:33:47'),
(4566, 3, '2012-11-13 16:33:47'),
(4567, 3, '2012-11-12 16:33:47'),
(4568, 3, '2012-11-16 16:33:47'),
(4569, 3, '2012-11-23 16:33:47'),
(4570, 3, '2012-11-30 16:33:47'),
(4571, 3, '2012-12-07 16:33:47'),
(4572, 3, '2012-12-08 16:33:47'),
(4573, 3, '2012-12-09 16:33:47'),
(4574, 3, '2012-12-02 16:33:47'),
(4575, 3, '2012-11-25 16:33:47'),
(4576, 3, '2012-11-24 16:33:47'),
(4577, 3, '2012-12-01 16:33:47'),
(4578, 3, '2012-12-06 16:33:47'),
(4579, 3, '2012-11-29 16:33:47'),
(4580, 3, '2012-11-22 16:33:47'),
(4581, 3, '2012-11-21 16:33:47'),
(4582, 3, '2012-11-20 16:33:47'),
(4583, 3, '2012-11-19 16:33:47'),
(4584, 3, '2012-11-26 16:33:47'),
(4585, 3, '2012-12-03 16:33:47'),
(4586, 3, '2012-12-04 16:33:47'),
(4587, 3, '2012-12-05 16:33:47'),
(4588, 3, '2012-11-28 16:33:47'),
(4589, 3, '2012-11-27 16:33:47'),
(4590, 3, '2012-05-17 16:33:47'),
(4591, 3, '2012-05-10 16:33:47'),
(4592, 3, '2012-05-11 16:33:47'),
(4593, 3, '2012-05-09 16:33:47'),
(4594, 6, '2012-07-01 12:00:20'),
(4595, 6, '2012-07-02 12:00:20'),
(4596, 6, '2012-07-03 12:00:20'),
(4597, 6, '2012-07-04 12:00:20'),
(4598, 6, '2012-07-05 12:00:20'),
(4599, 6, '2012-07-06 12:00:20'),
(4600, 6, '2012-07-07 12:00:20'),
(4601, 6, '2012-07-08 12:00:20'),
(4602, 6, '2012-07-09 12:00:20'),
(4603, 6, '2012-07-10 12:00:20'),
(4604, 6, '2012-07-11 12:00:20'),
(4605, 6, '2012-07-12 12:00:20'),
(4606, 6, '2012-07-13 12:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `md_passport`
--

CREATE TABLE IF NOT EXISTS `md_passport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `account_active` tinyint(4) NOT NULL DEFAULT '0',
  `account_blocked` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `md_user_id_idx` (`md_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `md_passport`
--

INSERT INTO `md_passport` (`id`, `md_user_id`, `username`, `password`, `account_active`, `account_blocked`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '202cb962ac59075b964b07152d234b70', 1, 0, '2012-07-13 13:18:22', '2012-01-19 20:41:32', '2012-07-13 13:18:22'),
(4, 4, 'XCZ', '202cb962ac59075b964b07152d234b70', 1, 0, '2012-02-06 16:13:20', '2012-02-06 16:13:20', '2012-02-06 16:13:20'),
(5, 5, 'niko', '202cb962ac59075b964b07152d234b70', 1, 0, '2012-03-15 15:48:12', '2012-03-09 11:30:52', '2012-03-15 15:48:12'),
(7, 7, 'gsosadias', 'f077ead939a834a2a474fc3e16b63c43', 1, 0, '2012-04-10 17:52:45', '2012-03-21 22:08:59', '2012-04-10 17:52:45'),
(8, 8, 'danifmg', 'e4029dff92350495753acb8af649e53d', 1, 0, '2012-03-22 18:08:54', '2012-03-22 18:08:54', '2012-03-22 18:08:54'),
(9, 9, 'lodelucas', '11d770420e9f10ec3d1bb4bd213455dd', 1, 0, '2012-03-26 20:06:11', '2012-03-25 18:55:56', '2012-03-26 20:06:11'),
(10, 10, 'haroldomorelli', 'd9d6ac23b85e163d4237b2c07e1f35cc', 1, 0, '2012-03-25 19:19:43', '2012-03-25 19:19:43', '2012-03-25 19:19:43'),
(11, 11, 'mariainesfolle', '3303825ccaf8628a5d3f3d83e5a41879', 1, 0, '2012-03-26 10:47:17', '2012-03-26 10:47:17', '2012-03-26 10:47:17'),
(12, 12, 'jubenzo', '202cb962ac59075b964b07152d234b70', 1, 0, '2012-05-10 10:15:28', '2012-05-08 10:31:19', '2012-05-10 10:15:28'),
(13, 13, 'lodefabi', 'f2510ef217036be035dc3a3a55a454b8', 1, 0, '2012-06-06 09:01:08', '2012-06-06 09:01:08', '2012-06-06 09:01:08'),
(14, 14, 'rsantellan', '202cb962ac59075b964b07152d234b70', 1, 0, '2012-07-13 11:48:35', '2012-07-06 13:03:52', '2012-07-13 11:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `md_passport_remember_key`
--

CREATE TABLE IF NOT EXISTS `md_passport_remember_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_passport_id` int(11) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `md_passport_id_idx` (`md_passport_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `md_passport_remember_key`
--

INSERT INTO `md_passport_remember_key` (`id`, `md_passport_id`, `remember_key`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'qqo4aihbszk044o0gks0o88sowcgk0w', '186.53.222.118', '2012-02-29 16:57:27', '2012-02-29 16:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `md_reserva`
--

CREATE TABLE IF NOT EXISTS `md_reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md_user_id` int(11) NOT NULL,
  `md_apartamento_id` int(11) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `md_currency_id` int(11) NOT NULL,
  `total` double(18,2) NOT NULL,
  `status` enum('pending','confirm','efective','cancel') NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `md_user_id_idx` (`md_user_id`),
  KEY `md_apartamento_id_idx` (`md_apartamento_id`),
  KEY `md_currency_id_idx` (`md_currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `md_reserva`
--

INSERT INTO `md_reserva` (`id`, `md_user_id`, `md_apartamento_id`, `fecha_desde`, `fecha_hasta`, `cantidad_personas`, `md_currency_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 8, '2012-04-10', '2012-04-19', 8, 2, 900.00, 'pending', '2012-03-25 18:38:25', '2012-03-25 18:38:25'),
(2, 9, 8, '2012-03-28', '2012-05-07', 2, 2, 4000.00, 'pending', '2012-03-26 20:06:31', '2012-03-26 20:06:31'),
(3, 14, 8, '2012-07-10', '2012-07-14', 2, 2, 400.00, 'pending', '2012-07-06 13:22:12', '2012-07-06 13:22:12'),
(4, 14, 6, '2012-07-01', '2012-07-13', 2, 2, 1800.00, 'pending', '2012-07-13 11:49:49', '2012-07-13 11:49:49'),
(5, 14, 6, '2012-07-01', '2012-07-13', 2, 2, 1800.00, 'pending', '2012-07-13 11:51:45', '2012-07-13 11:51:45'),
(6, 14, 6, '2012-07-01', '2012-07-13', 2, 2, 1800.00, 'pending', '2012-07-13 11:52:27', '2012-07-13 11:52:27'),
(7, 14, 6, '2012-07-01', '2012-07-13', 2, 2, 1800.00, 'pending', '2012-07-13 11:57:48', '2012-07-13 11:57:48'),
(8, 14, 6, '2012-07-01', '2012-07-13', 2, 2, 1800.00, 'confirm', '2012-07-13 11:58:11', '2012-07-13 12:00:20'),
(9, 14, 7, '2012-07-01', '2012-07-13', 2, 1, 1380.00, 'pending', '2012-07-13 13:35:09', '2012-07-13 13:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `md_user`
--

CREATE TABLE IF NOT EXISTS `md_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `culture` varchar(2) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `md_user`
--

INSERT INTO `md_user` (`id`, `email`, `super_admin`, `culture`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 1, 'es', NULL, '2012-01-19 20:41:32', '2012-03-20 16:07:46'),
(4, 'XCZ@asd.com', 0, 'es', NULL, '2012-02-06 16:13:20', '2012-02-06 16:13:20'),
(5, 'niko@mauitz.com', 0, 'es', NULL, '2012-03-09 11:30:52', '2012-03-09 11:30:52'),
(7, 'gsosadias@hotmail.com', 0, 'es', NULL, '2012-03-21 22:08:59', '2012-03-21 22:08:59'),
(8, 'danifmg@hotmail.com', 0, 'es', NULL, '2012-03-22 18:08:54', '2012-03-22 18:08:54'),
(9, 'lodelucas@hotmail.com', 0, 'es', NULL, '2012-03-25 18:55:56', '2012-03-25 18:55:56'),
(10, 'haroldomorelli@hotmail.com', 0, 'es', NULL, '2012-03-25 19:19:43', '2012-03-25 19:19:43'),
(11, 'mariainesfolle@hotmail.com', 0, 'es', NULL, '2012-03-26 10:47:17', '2012-03-26 10:47:17'),
(12, 'jubenzo@gmail.com', 0, 'es', NULL, '2012-05-08 10:31:19', '2012-05-08 10:31:19'),
(13, 'lodefabi@hotmail.com', 0, 'es', NULL, '2012-06-06 09:01:08', '2012-06-06 09:01:08'),
(14, 'rsantellan@gmail.com', 0, 'es', NULL, '2012-07-06 13:03:51', '2012-07-06 13:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `md_user_profile`
--

CREATE TABLE IF NOT EXISTS `md_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `country_code` varchar(2) DEFAULT 'UY',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `md_user_profile`
--

INSERT INTO `md_user_profile` (`id`, `name`, `last_name`, `city`, `country_code`) VALUES
(1, 'Admin', 'Admin', '', 'UY'),
(4, 'bfdx', 'admin', NULL, 'UY'),
(5, 'maui', 'nicolas', NULL, 'UY'),
(7, 'Gabriela', 'Sosa Dias', NULL, 'UY'),
(8, 'Daniela ', 'Fraga', NULL, 'UY'),
(9, 'Lucas ', 'Muñoz', NULL, 'UY'),
(10, 'haroldo', 'morelli', NULL, 'UY'),
(11, 'Maria', 'Folle', NULL, 'UY'),
(12, 'Julian', 'Benzo', NULL, 'UY'),
(13, 'Fabiana', 'Muñoz', NULL, 'UY'),
(14, 'rodrigo', 'santellan', NULL, 'UY');

-- --------------------------------------------------------

--
-- Table structure for table `md_user_search`
--

CREATE TABLE IF NOT EXISTS `md_user_search` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `md_user_id` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `country_code` varchar(2) DEFAULT NULL,
  `avatar_src` text,
  `active` tinyint(1) DEFAULT '0',
  `blocked` tinyint(1) DEFAULT '0',
  `admin` tinyint(1) DEFAULT '0',
  `show_email` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username_index_idx` (`username`),
  KEY `email_index_idx` (`email`),
  KEY `last_name_index_idx` (`last_name`),
  KEY `name_index_idx` (`name`),
  KEY `md_user_id_idx` (`md_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `md_user_search`
--

INSERT INTO `md_user_search` (`id`, `md_user_id`, `email`, `username`, `name`, `last_name`, `country_code`, `avatar_src`, `active`, `blocked`, `admin`, `show_email`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin@admin.com', 'admin', 'Admin', 'Admin', 'UY', NULL, 1, 0, 1, 0, '2012-01-19 20:41:32', '2012-01-19 20:41:32'),
(4, 4, 'XCZ@asd.com', 'XCZ', 'bfdx', 'admin', 'UY', NULL, 1, 0, 0, 0, '2012-02-06 16:13:20', '2012-02-06 16:13:20'),
(5, 5, 'niko@mauitz.com', 'niko', 'maui', 'nicolas', 'UY', NULL, 1, 0, 0, 0, '2012-03-09 11:30:52', '2012-03-09 11:30:52'),
(7, 7, 'gsosadias@hotmail.com', 'gsosadias', 'Gabriela', 'Sosa Dias', 'UY', NULL, 1, 0, 0, 0, '2012-03-21 22:08:59', '2012-03-21 22:08:59'),
(8, 8, 'danifmg@hotmail.com', 'danifmg', 'Daniela ', 'Fraga', 'UY', NULL, 1, 0, 0, 0, '2012-03-22 18:08:54', '2012-03-22 18:08:54'),
(9, 9, 'lodelucas@hotmail.com', 'lodelucas', 'Lucas ', 'Muñoz', 'UY', NULL, 1, 0, 0, 0, '2012-03-25 18:55:56', '2012-03-25 18:55:56'),
(10, 10, 'haroldomorelli@hotmail.com', 'haroldomorelli', 'haroldo', 'morelli', 'UY', NULL, 1, 0, 0, 0, '2012-03-25 19:19:43', '2012-03-25 19:19:43'),
(11, 11, 'mariainesfolle@hotmail.com', 'mariainesfolle', 'Maria', 'Folle', 'UY', NULL, 1, 0, 0, 0, '2012-03-26 10:47:17', '2012-03-26 10:47:17'),
(12, 12, 'jubenzo@gmail.com', 'jubenzo', 'Julian', 'Benzo', 'UY', NULL, 1, 0, 0, 0, '2012-05-08 10:31:19', '2012-05-08 10:31:19'),
(13, 13, 'lodefabi@hotmail.com', 'lodefabi', 'Fabiana', 'Muñoz', 'UY', NULL, 1, 0, 0, 0, '2012-06-06 09:01:08', '2012-06-06 09:01:08'),
(14, 14, 'rsantellan@gmail.com', 'rsantellan', 'rodrigo', 'santellan', 'UY', NULL, 1, 0, 0, 0, '2012-07-06 13:03:52', '2012-07-06 13:03:54');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `md_apartamento`
--
ALTER TABLE `md_apartamento`
  ADD CONSTRAINT `md_apartamento_md_currency_id_md_currency_id` FOREIGN KEY (`md_currency_id`) REFERENCES `md_currency` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `md_apartamento_md_locacion_id_md_locacion_id` FOREIGN KEY (`md_locacion_id`) REFERENCES `md_locacion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `md_apartamento_md_user_id_md_user_id` FOREIGN KEY (`md_user_id`) REFERENCES `md_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_apartamento_md_comodidad`
--
ALTER TABLE `md_apartamento_md_comodidad`
  ADD CONSTRAINT `md_apartamento_md_comodidad_md_apartamento_id_md_apartamento_id` FOREIGN KEY (`md_apartamento_id`) REFERENCES `md_apartamento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `md_apartamento_md_comodidad_md_comodidad_id_md_comodidad_id` FOREIGN KEY (`md_comodidad_id`) REFERENCES `md_comodidad` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_apartamento_translation`
--
ALTER TABLE `md_apartamento_translation`
  ADD CONSTRAINT `md_apartamento_translation_id_md_apartamento_id` FOREIGN KEY (`id`) REFERENCES `md_apartamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `md_comodidad_translation`
--
ALTER TABLE `md_comodidad_translation`
  ADD CONSTRAINT `md_comodidad_translation_id_md_comodidad_id` FOREIGN KEY (`id`) REFERENCES `md_comodidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `md_content`
--
ALTER TABLE `md_content`
  ADD CONSTRAINT `md_content_md_user_id_md_user_id` FOREIGN KEY (`md_user_id`) REFERENCES `md_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_content_relation`
--
ALTER TABLE `md_content_relation`
  ADD CONSTRAINT `md_content_relation_md_content_id_first_md_content_id` FOREIGN KEY (`md_content_id_first`) REFERENCES `md_content` (`id`),
  ADD CONSTRAINT `md_content_relation_md_content_id_second_md_content_id` FOREIGN KEY (`md_content_id_second`) REFERENCES `md_content` (`id`);

--
-- Constraints for table `md_currency_convertion`
--
ALTER TABLE `md_currency_convertion`
  ADD CONSTRAINT `md_currency_convertion_currency_from_md_currency_id` FOREIGN KEY (`currency_from`) REFERENCES `md_currency` (`id`),
  ADD CONSTRAINT `md_currency_convertion_currency_to_md_currency_id` FOREIGN KEY (`currency_to`) REFERENCES `md_currency` (`id`);

--
-- Constraints for table `md_currency_translation`
--
ALTER TABLE `md_currency_translation`
  ADD CONSTRAINT `md_currency_translation_id_md_currency_id` FOREIGN KEY (`id`) REFERENCES `md_currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `md_detalle`
--
ALTER TABLE `md_detalle`
  ADD CONSTRAINT `md_detalle_md_apartamento_id_md_apartamento_id` FOREIGN KEY (`md_apartamento_id`) REFERENCES `md_apartamento` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_disponibilidad`
--
ALTER TABLE `md_disponibilidad`
  ADD CONSTRAINT `md_disponibilidad_md_apartamento_id_md_apartamento_id` FOREIGN KEY (`md_apartamento_id`) REFERENCES `md_apartamento` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_generic_sale`
--
ALTER TABLE `md_generic_sale`
  ADD CONSTRAINT `md_generic_sale_md_payment_id_md_generic_payment_id` FOREIGN KEY (`md_payment_id`) REFERENCES `md_generic_payment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `md_generic_sale_md_user_id_md_user_id` FOREIGN KEY (`md_user_id`) REFERENCES `md_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_generic_sale_item`
--
ALTER TABLE `md_generic_sale_item`
  ADD CONSTRAINT `md_generic_sale_item_md_generic_sale_id_md_generic_sale_id` FOREIGN KEY (`md_generic_sale_id`) REFERENCES `md_generic_sale` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_locacion_temporada`
--
ALTER TABLE `md_locacion_temporada`
  ADD CONSTRAINT `md_locacion_temporada_md_locacion_id_md_locacion_id` FOREIGN KEY (`md_locacion_id`) REFERENCES `md_locacion` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_locacion_translation`
--
ALTER TABLE `md_locacion_translation`
  ADD CONSTRAINT `md_locacion_translation_id_md_locacion_id` FOREIGN KEY (`id`) REFERENCES `md_locacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `md_media_album`
--
ALTER TABLE `md_media_album`
  ADD CONSTRAINT `md_media_album_md_media_content_id_md_media_content_id` FOREIGN KEY (`md_media_content_id`) REFERENCES `md_media_content` (`id`),
  ADD CONSTRAINT `md_media_album_md_media_id_md_media_id` FOREIGN KEY (`md_media_id`) REFERENCES `md_media` (`id`);

--
-- Constraints for table `md_media_album_content`
--
ALTER TABLE `md_media_album_content`
  ADD CONSTRAINT `md_media_album_content_md_media_album_id_md_media_album_id` FOREIGN KEY (`md_media_album_id`) REFERENCES `md_media_album` (`id`),
  ADD CONSTRAINT `md_media_album_content_md_media_content_id_md_media_content_id` FOREIGN KEY (`md_media_content_id`) REFERENCES `md_media_content` (`id`);

--
-- Constraints for table `md_ocupacion`
--
ALTER TABLE `md_ocupacion`
  ADD CONSTRAINT `md_ocupacion_md_apartamento_id_md_apartamento_id` FOREIGN KEY (`md_apartamento_id`) REFERENCES `md_apartamento` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_passport`
--
ALTER TABLE `md_passport`
  ADD CONSTRAINT `md_passport_md_user_id_md_user_id` FOREIGN KEY (`md_user_id`) REFERENCES `md_user` (`id`);

--
-- Constraints for table `md_passport_remember_key`
--
ALTER TABLE `md_passport_remember_key`
  ADD CONSTRAINT `md_passport_remember_key_md_passport_id_md_passport_id` FOREIGN KEY (`md_passport_id`) REFERENCES `md_passport` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_reserva`
--
ALTER TABLE `md_reserva`
  ADD CONSTRAINT `md_reserva_md_apartamento_id_md_apartamento_id` FOREIGN KEY (`md_apartamento_id`) REFERENCES `md_apartamento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `md_reserva_md_currency_id_md_currency_id` FOREIGN KEY (`md_currency_id`) REFERENCES `md_currency` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `md_reserva_md_user_id_md_user_id` FOREIGN KEY (`md_user_id`) REFERENCES `md_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `md_user_search`
--
ALTER TABLE `md_user_search`
  ADD CONSTRAINT `md_user_search_md_user_id_md_user_id` FOREIGN KEY (`md_user_id`) REFERENCES `md_user` (`id`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
