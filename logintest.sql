-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2017 at 11:12 PM
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
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `industry` enum('it','retail','medical','manual labour','academic','accountancy and finance','architecture/design','childcare','drivers','education/training','graduate','hair and beauty','motor industry') DEFAULT NULL,
  `pwd` varchar(100) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  `position` enum('manager','hr','recruiter','') NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `name`, `username`, `industry`, `pwd`, `userPic`, `position`) VALUES
(1, 'Tesco', 'Mary', 'retail', '1234', '824334.png', 'manager'),
(2, 'SAP', 'Steven', 'it', '12345', '', 'manager'),
(3, 'NCI', 'nci', 'it', '1234', '', 'manager'),
(4, 'Burger King', 'BK', 'retail', '12345', '', 'manager'),
(5, 'Banna', 'bob', 'it', '1234', '', 'manager'),
(6, 'marks', 'bbb', 'it', '1234', '', 'manager'),
(7, 'Bamboo Cafe', 'bamboo', 'retail', '1234', '', ''),
(8, 'ann summers', 'kinky ann', 'retail', 'xxx', '', ''),
(9, 'Subway', 'sub', 'retail', '1234', '', 'hr'),
(10, 'Extra Mart', 'ext', 'retail', '1234', '', 'recruiter'),
(11, 'Little Tots', 'lil tots', '', '1234', '', 'manager'),
(12, 'nci', 'college', '', '1234', '', 'recruiter');

-- --------------------------------------------------------

--
-- Table structure for table `industrytypes`
--

DROP TABLE IF EXISTS `industrytypes`;
CREATE TABLE IF NOT EXISTS `industrytypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `industry` enum('it','retail','medical','manual labour','academic','accountancy and finance','architecture/design','childcare','drivers','education/training','graduate','hair and beauty','motor industry') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industrytypes`
--

INSERT INTO `industrytypes` (`id`, `industry`) VALUES
(1, 'it'),
(2, 'retail'),
(3, 'medical'),
(4, 'academic'),
(5, 'accountancy and finance'),
(6, 'architecture/design'),
(7, 'childcare'),
(8, 'education/training'),
(9, 'graduate'),
(10, 'hair and beauty'),
(11, 'motor industry');

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
  `industry` enum('it','retail','medical','manual labour','academic','accountancy and finance','architecture/design','childcare','drivers','education/training','graduate','hair and beauty','motor industry') DEFAULT NULL,
  `bio` varchar(1000) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  `profile` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`id`, `first`, `last`, `uid`, `pwd`, `email`, `years`, `industry`, `bio`, `userPic`, `profile`) VALUES
(1, 'Joe', 'Gates', 'kince', '1234', '123@gmail.com', 30, 'academic', 'Bill Gates. Bill Gates, in full William Henry Gates III (born October 28, 1955, Seattle, Washington, U.S.), American computer programmer and entrepreneur who cofounded Microsoft Corporation, the world\'s largest personal-computer software company. Gates wrote his first software program at the age of 13.  computer programmer and entrepreneur who cofounded Microsoft Corporation, the worldâ€™s largest personal-computer software company.  Gates wrote his first software program at the age of 13. In high school he helped form a group of programmers who computerized their schoolâ€™s payroll system and founded Traf-O-Data, a company that sold traffic-counting systems to local governments. In 1975 Gates, then a sophomore at Harvard University, joined his hometown friend Paul G. Allen to develop software for the first microcomputers. They began by adapting BASIC, a popular programming language used on large computers, for use on microcomputers. With the success of this project, Gates left Harvard', '416589.jpg', ''),
(2, 'Steven', 'Seagal', 'under seige', '1234', '123@gmail.com', 12, 'medical', ' Blah blah', '', ''),
(3, 'Paul', 'Kinsella', 'king', '1234', '123@gmail.com', 10, 'it', 'Blah Blah ', '670053.png', ''),
(4, 'Jake', 'Jakeson', 'jake', '1234', 'jake@gmail.com', 23, 'academic', '', '', ''),
(5, 'John', 'Murphy', 'JM', '1234', 'jm@123@gmail.com', 4, 'graduate', '', '', ''),
(6, 'Mohamid', 'Islam', 'ala', '1234', 'ala@gmail.com', 7, 'retail', '', '', ''),
(7, 'Tom', 'Shelby', 'TS', '1234', 'ts@gmail.com', 2, 'drivers', 'Son of a Canadian mother and a South African father, Elon Reeve Musk was born on June 28, 1971, in Pretoria, South Africa. He spent his early childhood with his brother Kimbal and sister Tosca in South Africa, and at 10, the introverted Elon developed an interest in computers. During this time, his parents divorced. He taught himself how to program, and when he was 12 he made his first software saleâ€”of a game he created called Blastar. At age 17, in 1989, he moved to Canada to attend Queenâ€™s University and avoid mandatory service in the South African military, but he left in 1992 to study business and physics at the University of Pennsylvania. He graduated with an undergraduate degree in economics and stayed for a second bachelorâ€™s degree in physics.', '299057.jpeg', ''),
(8, 'Paul', 'Hayes', 'ph', '1234', '123@gmail.com', 15, 'education/training', 'education is key', '533184.png', ''),
(9, 'Richie', 'Rich', 'rr', '1234', '123@gmail.com', 10, 'medical', '', '', ''),
(10, 'Elon', 'Musk', 'elon', '1234', 'elon@muck.com', 10, 'it', 'Blah Blah', '860046.png', ''),
(11, 'Nicola', 'Tesla', 'nick', '1234', '123@gmail.com', 12, 'education/training', 'I love elctricity', '247206.jpg', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
