-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2013 at 05:57 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `choice_text` varchar(120) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `poll_id`, `choice_text`, `votes`, `created_at`, `updated_at`) VALUES
(1, 1, 'Windows PC', 0, '2013-07-23 00:00:00', '2013-07-23 00:00:00'),
(2, 1, 'Mac', 0, '2013-07-23 00:00:00', '2013-07-23 00:00:00'),
(3, 1, 'iPad/iPhone', 0, '2013-07-23 00:00:00', '2013-07-23 00:00:00'),
(4, 1, 'Android', 0, '2013-07-23 00:00:00', '2013-07-23 00:00:00'),
(5, 1, 'Others', 0, '2013-07-23 00:00:00', '2013-07-23 00:00:00'),
(6, 2, 'Give you up', 2, '2013-07-23 00:00:00', '2013-07-23 00:00:00'),
(7, 2, 'Let you down', 0, '2013-07-23 00:00:00', '2013-07-23 00:00:00'),
(8, 2, 'Run around', 0, '2013-07-23 00:00:00', '2013-07-23 00:00:00'),
(9, 2, 'Desert you', 0, '2013-07-23 00:00:00', '2013-07-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Where do you usually browse?', 'Im just curious you know.', '2013-07-23 00:00:00', '2013-07-23 00:00:00'),
(2, 'Things Rick Astley Will Never Do', 'Rick Astley will never..', '2013-07-23 00:00:00', '2013-07-23 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
