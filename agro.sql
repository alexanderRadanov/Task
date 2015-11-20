-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agro`
--

-- --------------------------------------------------------

--
-- Структура на таблица `estates`
--

CREATE TABLE IF NOT EXISTS `estates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_name` varchar(50) NOT NULL,
  `culture` varchar(50) NOT NULL,
  `area` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estate_name` (`estate_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Схема на данните от таблица `estates`
--

INSERT INTO `estates` (`id`, `estate_name`, `culture`, `area`) VALUES
(1, 'Livadi', 'popcorn', 200),
(2, 'Garg', 'watermelons', 4);

-- --------------------------------------------------------

--
-- Структура на таблица `estates_worked`
--

CREATE TABLE IF NOT EXISTS `estates_worked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `culture` varchar(50) NOT NULL,
  `infoDate` date NOT NULL,
  `tractor` varchar(50) NOT NULL,
  `area` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Схема на данните от таблица `estates_worked`
--

INSERT INTO `estates_worked` (`id`, `name`, `culture`, `infoDate`, `tractor`, `area`) VALUES
(6, 'Livadi', 'popcorn', '2011-08-15', 'Nissan GTR ', 1),
(7, 'Garg', 'watermelons', '2011-08-15', 'Mercedes CLA 45 AMG', 4),
(8, 'Garg', 'watermelons', '2011-08-15', 'Nissan GTR ', 3),
(9, 'Livadi', 'popcorn', '0000-00-00', 'Mercedes CLA 45 AMG', 0);

-- --------------------------------------------------------

--
-- Структура на таблица `tractors`
--

CREATE TABLE IF NOT EXISTS `tractors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Схема на данните от таблица `tractors`
--

INSERT INTO `tractors` (`id`, `name`) VALUES
(1, 'Mercedes CLA 45 AMG'),
(2, 'Nissan GTR ');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'aRadanov', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
