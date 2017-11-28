-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2017 at 01:09 PM
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
-- Database: `candidate`
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
  `industry` enum('it','retail','medical','manual labour') NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  `position` enum('manager','hr','recruiter','') NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `name`, `username`, `industry`, `pwd`, `userPic`, `position`) VALUES
(1, 'Tesco', 'Mary', 'retail', '1234', '912285.png', 'manager'),
(2, 'SAP', 'Steven', 'it', '12345', '471712.png', 'manager'),
(3, 'NCI', 'nci', 'it', '1234', '', 'manager'),
(4, 'Burger King', 'BK', 'retail', '12345', '', 'manager'),
(5, 'Banna', 'bob', 'it', '1234', '', 'manager'),
(6, 'marks', 'bbb', 'it', '1234', '', 'manager'),
(7, 'Bamboo Cafe', 'bamboo', 'retail', '1234', '', ''),
(8, 'ann summers', 'kinky ann', 'retail', 'xxx', '', ''),
(9, 'Subway', 'sub', 'retail', '1234', '', 'hr'),
(10, 'Extra Mart', 'ext', 'retail', '1234', '', 'recruiter'),
(11, 'Little Tots', 'lil tots', '', '1234', '', 'manager'),
(12, 'nci', 'college', '', '1234', '', 'recruiter'),
(13, 'Spar', 'spar', 'retail', '1234', '', 'hr'),
(14, 'Marks & Spencer', 'manager1', 'retail', '1234', '', 'manager'),
(15, 'Rockos', 'Edi', 'retail', '1234', '', 'manager'),
(16, 'user1', 'user1', 'it', '$2y$10$L3WLZQ9fN9fo0pPdiofnheBzWQgPQDqvg08yhwGhFTiOuX8biLjD2', 'default.png', 'manager'),
(17, 'vladvlad', 'green', 'it', '$2y$10$wUDm9JM/bjxvbn/Ca1JRduIfT7yUHTb1Pr9I81/V4Ef46U3j5symK', 'default.png', 'manager'),
(18, 'kfsdjkfjsdkfds', 'sdklfjsdfksjdk', 'it', '$2y$10$IesrhuQv2udxdFnerqzXUOnrUczlyDNcxDEZbhx/7fGiYM5cabG1a', 'default.png', 'manager'),
(19, 'ewfsjfklj', 'NewBob', 'it', '$2y$10$InYyVbXjNaTwKzDo7V.rue/rCYBld98xG2nHR7qc7GeIbM/v8hXvO', 'default.png', 'manager'),
(20, 'VV', 'Vladislavs', 'it', '$2y$10$g2ryM61yqokpe8Z5RGErn.n5OeH0w9GtEOLBPk6vFcwjuMVr7mBY2', 'default.png', 'manager'),
(21, 'VV1234', 'Vlad123456', 'it', '$2y$10$LDscasl6OqU77/NlfnnMI.bjD5wvCYMvIuCUJyCyQL83fbxcxhH8y', 'default.png', 'manager'),
(22, 'VV97', 'Vlad97', 'it', '$2y$10$Ge/NfGIGBylkho1/TGDk9OwD5IY/CooZt6m.8UAowHRSrGNsrS9Bq', 'default.png', 'manager');

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
  `user_cv` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`id`, `first`, `last`, `uid`, `pwd`, `email`, `years`, `industry`, `bio`, `userPic`, `user_cv`, `timestamp`) VALUES
(1, 'William', 'Gates', 'kince', '1234', '123@gmail.com', 30, 'academic', 'Bill Gates. Bill Gates, in full William Henry Gates III (born October 28, 1955, Seattle, Washington, U.S.), American computer programmer and entrepreneur who cofounded Microsoft Corporation, the world\'s largest personal-computer software company. Gates wrote his first software program at the age of 13.  computer programmer and entrepreneur who cofounded Microsoft Corporation, the worldâ€™s largest personal-computer software company.  Gates wrote his first software program at the age of 13. In high school he helped form a group of programmers who computerized their schoolâ€™s payroll system and founded Traf-O-Data, a company that sold traffic-counting systems to local governments. In 1975 Gates, then a sophomore at Harvard University, joined his hometown friend Paul G. Allen to develop software for the first microcomputers. They began by adapting BASIC, a popular programming language used on large computers, for use on microcomputers. With the success of this project, Gates left Harvard', '937167.png', 'kince.pdf', '2017-11-14 11:46:47'),
(2, 'Steven', 'Seagal', 'under seige', '1234', '123@gmail.com', 12, 'medical', ' Blah blah', '373950.jpg', '0', '2017-11-14 11:46:47'),
(3, 'Paul', 'Kinsella', 'king', '1234', '123@gmail.com', 10, 'it', 'Blah Blah ', '845093.png', '0', '2017-11-14 11:46:47'),
(4, 'Jake', 'Jakeson', 'jake', '1234', 'jake@gmail.com', 23, 'academic', '', '', '0', '2017-11-14 11:46:47'),
(5, 'John', 'Murphy', 'JM', '1234', 'jm@123@gmail.com', 4, 'academic', 'I am a genius', '953753.png', '0', '2017-11-14 11:46:47'),
(6, 'Mohamid', 'Islam', 'ala', '1234', 'ala@gmail.com', 7, 'retail', 'Under the tree at Spar', '390268.png', '0', '2017-11-14 11:46:47'),
(7, 'Tom', 'Shelby', 'TS', '1234', 'ts@gmail.com', 2, 'drivers', 'Son of a Canadian mother and a South African father, Elon Reeve Musk was born on June 28, 1971, in Pretoria, South Africa. He spent his early childhood with his brother Kimbal and sister Tosca in South Africa, and at 10, the introverted Elon developed an interest in computers. During this time, his parents divorced. He taught himself how to program, and when he was 12 he made his first software saleâ€”of a game he created called Blastar. At age 17, in 1989, he moved to Canada to attend Queenâ€™s University and avoid mandatory service in the South African military, but he left in 1992 to study business and physics at the University of Pennsylvania. He graduated with an undergraduate degree in economics and stayed for a second bachelorâ€™s degree in physics.', '299057.jpeg', '0', '2017-11-14 11:46:47'),
(8, 'Paul', 'Hayes', 'ph', '1234', '123@gmail.com', 15, 'education/training', 'education is key', '533184.png', '0', '2017-11-14 11:46:47'),
(9, 'Richie', 'Rich', 'rr', '1234', '123@gmail.com', 10, 'medical', '', '', '0', '2017-11-14 11:46:47'),
(10, 'Elon', 'Musk', 'elon', '1234', 'elon@muck.com', 10, 'it', 'Blah Blah', '860046.png', '0', '2017-11-14 11:46:47'),
(11, 'Nicola', 'Tesla', 'nick', '1234', '123@gmail.com', 12, 'education/training', 'I love elctricity', '247206.jpg', '0', '2017-11-14 11:46:47'),
(12, 'Lucky', 'Palmer', 'lucky', '1234', '123@gmail.com', 5, 'it', 'Vr Guru', '955072.png', '0', '2017-11-14 11:46:47'),
(13, 'Steven', 'Smith', 'stevey', '1234', 'steve@gmail.com', 12, 'it', 'Web Guru', '942322.png', '0', '2017-11-14 11:46:47'),
(14, 'Mark', 'Lynch', 'ml', '1234', 'markLynch@gmail.com', 5, 'it', 'Java Master', '628093.png', '0', '2017-11-14 11:46:47'),
(15, 'Brian', 'Christmas', 'xmas', '1234', 'xmas@gmail.com', 2, 'it', 'Java Noob', '20673.png', '0', '2017-11-14 11:46:47'),
(16, 'John', 'Cena', 'Cena', '1234', 'cena@gmail.com', 6, 'medical', 'Breaking bones', '965589.png', '0', '2017-11-14 11:46:47'),
(20, 'NAME', 'LAST', 'Test1', '$2y$10$sY2CWuVCVotcN3TdpAj5k.71ROD8wy9odxOcZsIAacpdf0TgmgbzO', '123456@gmail.cm', 1, NULL, 'ekfds', '7798.png', '0', '2017-11-14 11:46:47'),
(21, 'vlad', 'vladislavs', 'bobbob', '$2y$10$pFiEAZzHkYev5/T7EX5tWuSe9EnxeK9EGS66whnRGC.pvcyZFcZNC', 'bobbob@gmail.com', 0, 'academic', 'Bill Gates. Bill Gates, in full William Henry Gates III (born October 28, 1955, Seattle, Washington, U.S.), American computer programmer and entrepreneur who cofounded Microsoft Corporation, the world\'s largest personal-computer software company. Gates wrote his first software program at the age of 13. computer programmer and entrepreneur who cofounded Microsoft Corporation, the worldâ€™s largest personal-computer software company. Gates wrote his first software program at the age of 13. In high school he helped form a group of programmers who computerized their schoolâ€™s payroll system and founded Traf-O-Data, a company that sold traffic-counting systems to local governments. In 1975 Gates, then a sophomore at Harvard University, joined his hometown friend Paul G. Allen to develop software for the first microcomputers. They began by adapting BASIC, a popular programming language used on large computers, for use on microcomputers. With the success of this project, Gates left Harvard', '672722.png', 'bobbob.pdf', '2017-11-14 11:46:47'),
(22, 'kmdsfksdmfknd', 'fksdjfklsdjfksdlfjkl', 'sdkflskflsfsdkjfjds', '$2y$10$21G5yu3FONIt4DhoqG14EO1MbXMhmlJAoXVpN7nUol67YxoQiUZ0i', 'vslfkdslfsdfsdfsd@gmail.com', 21, NULL, 'lfsdjfksdjfds', '7798.png', '0', '2017-11-14 11:46:47'),
(23, 'lfdlsfmsdkfm', 'fksmfklsdfmklsdfwo', 'dslkfsdlfksfmsdkflsd', '$2y$10$fQ1ecUDVj4aHvbY4LJ4.PePr7UMCe04rnz7OkL9kD3D3q8uTHtlS.', 'kdsflfsdfgsdfgsdf@gmailc.om', 1, 'academic', 'fsdklfsd', '7798.png', '0', '2017-11-14 11:46:47'),
(24, 'ksjdskfjdfsdjfsif', 'fjsdfjshfsdijfsdifu', 'disajfisdhfsdif', '$2y$10$1DqIqA0qw8EXexfvM5BsxO1iAwNMfvuAQuMO.A1vbCmeMmtc0bq2.', 'fsdfufhds@gmail.com', 3, 'academic', 'fdskjfiji', '7798.png', '123.pdf', '2017-11-14 11:46:47'),
(25, 'knfgkfdgjfdh', 'qfjkdbsjfsbfhsb', 'fhsjfhsdjfhsdjfbshfds', '$2y$10$boS/rQzLq13b431FiI8R0e1y9bHUY9kMm2ksjqQWECFQwS7MguH2W', 'fsjdkhfjdj@gmail.com', 32, 'academic', 'fsdfl;sdkjfisdojfiosdfiosdfiuosd', '7798.png', '123.pdf', '2017-11-14 11:46:47'),
(26, 'NewBob', 'NewBob', 'NewBob', '$2y$10$iA.4eZ8GWWQK.FZMnBzUd.SUji8QjLoTSmg6z/FKCCZynj3SHHCOG', 'NewBob@gmail.com', 34, 'it', 'NewBob', 'default.png', '123.pdf', '2017-11-16 12:50:01'),
(27, 'NewBob', 'fjsdnfsjdk', 'jdsfnsdjks', '$2y$10$ZYT8t1Ey8aP5f7aTIQu2OukDV4OxlHjtNUbY1wXmTwI/bizAAuBd2', 'fjsdkfsd@gamil.cds', 32, 'it', 'kjdfsjkfnsjd', 'default.png', '123.pdf', '2017-11-16 12:50:27'),
(28, 'newbobob', 'nwewfsk', 'fdskfsdk', '$2y$10$FAds16Y4vcTW6o.ZICoJLuVzk6mtSZXjOTJWLcDIDOeufzrdyZu0O', 'ksdlfsssss@gmail.cop', 32, 'it', 'dfhsd', 'default.png', '123.pdf', '2017-11-16 12:55:05'),
(29, ' vlad1234', ' vlad1234', ' vlad1234', '$2y$10$O8QBwcun0Tl8EBxqBaU6y.Nt8KZY43MKPPV35jtclw6154c0Tq/2O', 'vlad1234@gamo.co', 2, 'it', 'gdfgdf', 'default.png', '123.pdf', '2017-11-16 12:58:17'),
(30, 'Vladis', 'Vladis', 'Vladis', '$2y$10$dvER/kj7lur7.XhkliVbBeHr6wEKAJwRkyou4UdXaWwi8yUpiEryW', 'vladisa@gmail.com', 32, 'it', 'kfsdkf', 'default.png', '123.pdf', '2017-11-16 12:59:41'),
(31, 'jdfj', 'jsklfs', 'cdlksfsjk', '$2y$10$eOHAZU3OcTIPM6eaVDaV2.UBjL0Ap8S3gNo4egkgzCeOH/dkilxA.', 'fdlsfjsd@famc.com', 2, 'academic', 'fkddlsfsd', 'default.png', '123.pdf', '2017-11-16 14:07:23'),
(32, 'jrsdkf', 'dklajsfksl', 'fdklsdjfslk', '$2y$10$KwllyGXrUoZJNb/QMp4Kdehb3nQqNQoAp5kUWLLbROmVUiR0mt5jm', 'fsdfjds@Gamicl.aomc', 2, 'academic', 'fdsks', 'default.png', '123.pdf', '2017-11-16 14:17:36'),
(33, 'vladlvad', 'vslfsldfs', 'vladsalva', '$2y$10$RJ5U4T/ioywJ7ESdO.JTkertFITUVS3pMFMZjjug7AX9B51.E4Lui', 'fslkdfs@gmail.com', 32, 'academic', 'vlsdf', 'default.png', '123.pdf', '2017-11-16 14:50:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
