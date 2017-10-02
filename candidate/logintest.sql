-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2017 at 07:27 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logintest`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `industry` enum('it','retail','medical','manual labour') NOT NULL,
  `pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `username`, `industry`, `pwd`) VALUES
(1, 'Tesco', 'Mary', 'retail', '1234'),
(2, 'SAP', 'Steven', 'it', '12345'),
(3, 'NCI', 'nci', 'it', '1234'),
(4, 'Burger King', 'BK', 'retail', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `newuser`
--

DROP TABLE IF EXISTS `newuser`;
CREATE TABLE IF NOT EXISTS `newuser` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first` varchar(128) NOT NULL,
  `last` varchar(128) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `pwd` varchar(1000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `years` int(11) NOT NULL,
  `industry` enum('it','retail','medical','manual labour') DEFAULT NULL,
  `bio` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`id`, `first`, `last`, `uid`, `pwd`, `email`, `years`, `industry`, `bio`) VALUES
(1, 'Paul', 'Kinsella', 'kince', '1234', '', 0, 'it', 'Paul Kinsella is a content marketing professional at HubSpot, an inbound marketing and sales platform that helps companies attract visitors, convert leads, and close customers. Previously, Rodney worked as a marketing manager for a tech software startup. He graduated with honors from Columbia University with a dual degree in Business Administration and Creative Writing.\"'),
(2, 'Paul', 'Kinsella', 'kince', '1234', '', 0, 'it', ''),
(3, 'John ', 'Smith', 'john', '12345', '', 0, 'it', ''),
(4, 'Karen', 'Gibbons', 'Karen', '0000', '', 0, 'it', ''),
(5, 'John', 'Carpenter', 'JC', '00000', 'JC@gmail.com', 4, 'retail', ''),
(6, 'john', 'smith', 'john', '12345', '', 0, 'it', ''),
(7, 'John', 'Smith', 'john', '12345', '1234@gmail.com', 0, 'it', ''),
(8, 'Paul', 'Kinsella', 'pk', '12345', 'kince23@gmail.com', 0, 'it', ''),
(9, 'Paul', 'Kinsella', 'pk', '12345', 'kince23@gmail.com', 10, 'it', ''),
(10, 'Jenny', 'murphy', 'jm', '12345', '1234@gmail.com', 6, 'it', ''),
(11, 'Jean', 'Clifford', 'JC', '12345', '123@gmail.com', 6, 'it', ''),
(12, 'Paul', 'Kinsella', 'kince', '12345', 'kince23@gmail.com', 15, 'retail', ''),
(13, 'Bob', 'The Builder', 'big brick', '0000', 'bigbrick@gmail.com', 2, 'manual labour', ''),
(14, 'John', 'Smith', 'JS', '1234', '123@gmail.com', 5, 'manual labour', ''),
(15, 'Mike', 'Stevens', 'MS', '00000', 'ms@gmail.com', 10, 'retail', ''),
(16, 'Mark', 'Gibson', 'MG', '1234', 'mg@gmail.com', 2, 'medical', ''),
(17, 'Mark', 'Jayden', 'MJ', '12345', 'mj@gmail.com', 1, 'retail', ''),
(18, 'steven', 'Stevens', 'ss', 'bdbdb', 'ss@gmail.com', 4, 'it', ''),
(19, 'Steven', 'Gerrard', 'SG', 'sg', '123@gmail.com', 5, 'manual labour', ''),
(20, 'Paul', 'Kinsella', 'kince', '12345', 'kince23@gmail.com', 25, 'it', ''),
(21, 'Paul', 'Kinsella', 'kince', '1234', 'kince23@gmail.com', 2, 'retail', ''),
(22, 'Paul', 'Kinsella', 'kince', '1234', 'kince23@gmail.com', 2, 'it', ''),
(23, 'Paul', 'Kinsella', 'kince', '12345', 'kince23@gmail.com', 10, 'retail', ''),
(24, 'jay', 'rooney', 'jr', '12345', 'jr@gmail.com', 10, 'manual labour', ''),
(25, 'jack', 'daniles', 'JD', '$2y$10$Kl1spzuRRBGqHm/bjxSSjed6VW0y5PuKWJmfrvO2JKuskUQfiCV5W', 'JD@gmail.com', 23, 'manual labour', ''),
(26, 'Sarah', 'Marshall', 'msh', '', 'msh@gmail.com', 3, 'retail', ''),
(27, 'John', 'Dixen', 'Johner', 'xxxx', 'johner@gmail.com', 5, 'manual labour', ''),
(28, 'Edi', 'Sirbu', 'SB', '1234', 'sb@gmail.com', 10, 'retail', ''),
(29, 'Jay', 'Kay', 'Cosmic Girl', '1234', 'girl@gmail.com', 20, 'it', ''),
(30, 'John', 'Stones', 'johnner', '12345', 'johner@gmail.com', 5, 'retail', '\r\n            Blah    Blah    Blah    Blah    Blah    Blah    Blah'),
(31, 'Ryan', 'Giggs', 'Giggsy', '1234', '123@gmail.com', 20, 'it', ' LiverPool are shit'),
(32, 'Ryan', 'Giggs', 'RG', '1234', '123@gmail.com', 10, 'medical', ' Liverpool are shit'),
(33, 'Rio', 'Ferdinand', 'Rio15', '1234', '123@gmail.com', 100, 'retail', ' howya');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
