-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 03:32 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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

CREATE TABLE `company` (
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `industry` enum('it','retail','medical','manual labour') NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  `position` enum('manager','hr','recruiter','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(22, 'IT tech Repair', 'Vlad97', 'it', '$2y$10$Ge/NfGIGBylkho1/TGDk9OwD5IY/CooZt6m.8UAowHRSrGNsrS9Bq', '889538.png', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `industrytypes`
--

CREATE TABLE `industrytypes` (
  `id` int(11) NOT NULL,
  `industry` enum('it','retail','medical','manual labour','academic','accountancy and finance','architecture/design','childcare','drivers','education/training','graduate','hair and beauty','motor industry') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(11, 'motor industry'),
(18, 'drivers');

-- --------------------------------------------------------

--
-- Table structure for table `newuser`
--

CREATE TABLE `newuser` (
  `id` int(100) NOT NULL,
  `first` varchar(128) NOT NULL,
  `last` varchar(128) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `pwd` varchar(1000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `years` int(11) NOT NULL,
  `industry` enum('It','Retail','Medical','Manual Labour','Academic','Accountancy and Finance','Architecture/Design','Childcare','Drivers','Education/Training','Graduate','Hair and Beauty','Motor Industry') DEFAULT NULL,
  `bio` varchar(1000) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  `user_cv` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` enum('Antrim','Armagh','Carlow','Cavan','Clare','Cork','Derry','Donegal','Down','Dublin','Fermanagh','Galway','Kerry','Kildare','Kilkenny','Laois','Leitrim','Limerick','Longford','Louth','Mayo','Meath','Monaghan','Offaly','Roscommon','Sligo','Tipperary','Tyrone','Waterford','Westmeath','Wexford','Wicklow') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`id`, `first`, `last`, `uid`, `pwd`, `email`, `years`, `industry`, `bio`, `userPic`, `user_cv`, `timestamp`, `location`) VALUES
(1, 'William', 'Gates', 'wgates', '1234', 'wgates@windows.net', 30, 'It', 'Bill Gates. Bill Gates, in full William Henry Gates III (born October 28, 1955, Seattle, Washington, U.S.), American computer programmer and entrepreneur who cofounded Microsoft Corporation, the world\'s largest personal-computer software company. Gates wrote his first software program at the age of 13.  computer programmer and entrepreneur who cofounded Microsoft Corporation, the worldâ€™s largest personal-computer software company.  Gates wrote his first software program at the age of 13. In high school he helped form a group of programmers who computerized their schoolâ€™s payroll system and founded Traf-O-Data, a company that sold traffic-counting systems to local governments. In 1975 Gates, then a sophomore at Harvard University, joined his hometown friend Paul G. Allen to develop software for the first microcomputers. They began by adapting BASIC, a popular programming language used on large computers, for use on microcomputers. With the success of this project, Gates left Harvard', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Laois'),
(2, 'Steven', 'Smith', 'ste_smith', '1234', 'ste@gmail.com', 12, 'Medical', '10 years in medical school, practicing for 5 years', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Dublin'),
(3, 'Kevin ', 'Carmody', 'kevc', '1234', 'kevc@gmail.com', 10, 'It', 'It Graduate from NCI', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Dublin'),
(4, 'Jamie', 'O\'Brien', 'jamieob', '1234', 'jamie@gmail.com', 23, 'Academic', 'Plastic surgeon 15 years', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(5, 'John', 'Murphy', 'JM', '1234', 'jm@123@gmail.com', 4, 'Academic', 'I am a genius', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(6, 'Carl', 'Moylan', 'Cmoylan', '1234', 'cmoylan@gmail.com', 7, 'Retail', 'Under the tree at Spar', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(7, 'Tom', 'Shelby', 'TS', '1234', 'ts@gmail.com', 2, 'Drivers', 'Son of a Canadian mother and a South African father, Elon Reeve Musk was born on June 28, 1971, in Pretoria, South Africa. He spent his early childhood with his brother Kimbal and sister Tosca in South Africa, and at 10, the introverted Elon developed an interest in computers. During this time, his parents divorced. He taught himself how to program, and when he was 12 he made his first software saleâ€”of a game he created called Blastar. At age 17, in 1989, he moved to Canada to attend Queenâ€™s University and avoid mandatory service in the South African military, but he left in 1992 to study business and physics at the University of Pennsylvania. He graduated with an undergraduate degree in economics and stayed for a second bachelorâ€™s degree in physics.', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(8, 'Paul', 'Hayes', 'ph', '1234', '123@gmail.com', 15, 'Education/Training', 'education is key', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(9, 'Richard', 'Murphy', 'rmurphy', '1234', 'richard@gmail.com', 10, 'Medical', '5 years studying and 5 years working', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(10, 'Elon', 'Musk', 'elon', '1234', 'elon@muck.com', 10, 'It', 'Blah Blah', '860046.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Dublin'),
(11, 'Nicola', 'Tesla', 'nick', '1234', '123@gmail.com', 12, 'Education/Training', 'I love elctricity', '247206.jpg', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(12, 'Lucky', 'Palmer', 'lucky', '1234', '123@gmail.com', 5, 'It', 'Vr Guru', '955072.png', '0', '2017-11-14 11:46:47', 'Antrim'),
(13, 'Steven', 'Smith', 'stevey', '1234', 'steve@gmail.com', 12, 'It', 'Web Guru', 'default.png', '123.pdf', '2017-11-14 11:46:47', 'Antrim'),
(14, 'Mark', 'Lynch', 'ml', '1234', 'markLynch@gmail.com', 5, 'It', 'Java Master', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(15, 'Brian', 'Christmas', 'xmas', '1234', 'xmas@gmail.com', 2, 'It', 'Java Noob', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(16, 'John', 'Clark', 'Clark16', '1234', 'cena@gmail.com', 6, 'Medical', 'fixing bones', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(20, 'Paul', 'Kinsella', 'Pkinsella', '$2y$10$sY2CWuVCVotcN3TdpAj5k.71ROD8wy9odxOcZsIAacpdf0TgmgbzO', 'paul.kinsella03@gmail.com', 1, 'It', 'ekfds', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Dublin'),
(21, 'vlad', 'vladislavs', 'vlad21', '$2y$10$pFiEAZzHkYev5/T7EX5tWuSe9EnxeK9EGS66whnRGC.pvcyZFcZNC', 'vlad21@gmail.com', 0, 'Academic', 'education is my mission', '38316.jpg', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(22, 'Kevin', 'O\'Leary', 'oleary22', '$2y$10$21G5yu3FONIt4DhoqG14EO1MbXMhmlJAoXVpN7nUol67YxoQiUZ0i', 'oleary22@gmail.com', 21, 'Retail', 'retail veteran', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(23, 'Paul', 'Larkin', 'larkin23', '$2y$10$fQ1ecUDVj4aHvbY4LJ4.PePr7UMCe04rnz7OkL9kD3D3q8uTHtlS.', 'larkin23@gmail.com', 1, 'Academic', 'Only starting out', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(24, 'Simon', 'Fitzgerald', 'fitz24', '$2y$10$1DqIqA0qw8EXexfvM5BsxO1iAwNMfvuAQuMO.A1vbCmeMmtc0bq2.', 'fitz24@gmail.com', 3, 'Academic', '3 years in the academic industry', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(25, 'Keith', 'Mullagin', 'keith25', '$2y$10$boS/rQzLq13b431FiI8R0e1y9bHUY9kMm2ksjqQWECFQwS7MguH2W', 'keith25@gmail.com', 32, 'Academic', 'teaching a long time', 'default.png', 'samplecv.pdf', '2017-11-14 11:46:47', 'Antrim'),
(26, 'Robert', 'Robertson', 'Robo26', '$2y$10$iA.4eZ8GWWQK.FZMnBzUd.SUji8QjLoTSmg6z/FKCCZynj3SHHCOG', 'robo26@gmail.com', 15, 'It', 'In the IT industry some time', 'default.png', 'samplecv.pdf', '2017-11-16 12:50:01', 'Antrim'),
(27, 'James', 'McDermott', 'james27', '$2y$10$ZYT8t1Ey8aP5f7aTIQu2OukDV4OxlHjtNUbY1wXmTwI/bizAAuBd2', 'james27@gamil.cds', 8, 'It', 'web dev is my passion', 'default.png', 'samplecv.pdf', '2017-11-16 12:50:27', 'Antrim'),
(28, 'John', 'Harper', 'harpo28', '$2y$10$FAds16Y4vcTW6o.ZICoJLuVzk6mtSZXjOTJWLcDIDOeufzrdyZu0O', 'harpo28@gmail.cop', 32, 'It', 'MVC framework expert', 'default.png', 'samplecv.pdf', '2017-11-16 12:55:05', 'Antrim'),
(29, 'Paul', 'Merson', 'merson29', '$2y$10$O8QBwcun0Tl8EBxqBaU6y.Nt8KZY43MKPPV35jtclw6154c0Tq/2O', 'merson29@gamo.co', 2, 'It', 'New graduate', 'default.png', 'samplecv.pdf', '2017-11-16 12:58:17', 'Antrim'),
(30, 'Thomas ', 'Barret', 'barret30', '$2y$10$dvER/kj7lur7.XhkliVbBeHr6wEKAJwRkyou4UdXaWwi8yUpiEryW', 'barret30@gmail.com', 32, 'It', 'Java expert', 'default.png', 'samplecv.pdf', '2017-11-16 12:59:41', 'Antrim'),
(31, 'Fred', 'Smith', 'fred31', '$2y$10$eOHAZU3OcTIPM6eaVDaV2.UBjL0Ap8S3gNo4egkgzCeOH/dkilxA.', 'fred31@famc.com', 2, 'Architecture/Design', 'designing beautiful homes', 'default.png', 'samplecv.pdf', '2017-11-16 14:07:23', 'Antrim'),
(32, 'Gerard', 'Cooney', 'gerad32', '$2y$10$KwllyGXrUoZJNb/QMp4Kdehb3nQqNQoAp5kUWLLbROmVUiR0mt5jm', 'gerard32@Gmail.com', 2, 'Drivers', 'Professional courier', 'default.png', 'samplecv.pdf', '2017-11-16 14:17:36', 'Antrim'),
(33, 'Vlad', 'Jones', 'Vlad33', '$2y$10$RJ5U4T/ioywJ7ESdO.JTkertFITUVS3pMFMZjjug7AX9B51.E4Lui', 'vlad33@gmail.com', 18, 'Motor Industry', 'Second hand car sales man', 'default.png', 'samplecv.pdf', '2017-11-16 14:50:54', 'Antrim'),
(34, 'Paul', 'Kinsella', 'kince23', '$2y$10$RXYVFlflPEtdRqkJAxq3Hu.EdGBePSsaTQm0xtZVACXHt6btHVKQe', 'paul.kinsella03@gmail.com', 21, 'It', 'ha ha', '321992.png', 'kince23\'s CV.pdf', '2017-11-21 14:22:48', 'Dublin'),
(35, 'Sam', 'O\'Conner', 'sam35', '$2y$10$7ISS7Yx0ha/.ANJ.CiDsUu4rg3ZpawH3qPvGnnBJYw8uNnqmN1Voy', 'sam35@gmail.com', 10, 'Medical', 'Boom', 'default.png', 'samplcv.pdf', '2017-11-24 11:25:35', 'Antrim'),
(36, 'Jane', 'Larkin', 'jane1990', '$2y$10$DINHD.CFEl1LUTtNB0nnR.5azMP9WzqyI00XNheyCmRJc33NXvUw2', 'jane90@gmail.com', 2, 'Retail', 'just out of college', 'default.png', 'No CV Added', '2017-11-26 20:37:12', 'Antrim'),
(37, 'Hannah', 'Murphy', 'Hannah87', '$2y$10$syJWH2zBt99Kc88vwU234esnA69MYmLffurhl13gnKEdQF0MpYVNe', 'hannah97@gmail.com', 1, 'Accountancy and Finance', 'college graduate', '126663.png', 'Hannah87\'s CV.pdf', '2017-11-26 20:40:31', 'Antrim'),
(38, 'Lisa', 'Clarke', 'lisac', '$2y$10$2WYN51fofAbuRqWQ02aoauPFMVHQmtTeEQywPNv3XpCBbBpafegX2', 'lisac@gmail.com', 3, 'Academic', 'new teacher', '642980.png', 'No CV Added', '2017-11-26 20:56:35', 'Antrim'),
(39, 'Sam', 'smith', 'smithy', '$2y$10$VfLxNKk4VDqygniJxf2et.GRLn2KeEudaAzELO.icIa8o0R3XMcAm', 'smithy@gmail.com', 3, 'Retail', 'ha ha ha ', 'default.png', '123.pdf', '2017-12-03 18:51:37', 'Antrim'),
(40, 'john', 'smith', 'smith123', '$2y$10$sRinRUppu7Jnxn0WVFQwD.JxLs8aXdauPBmqbJDAm75lPLTH848/G', 'smith@gmail.com', 3, 'Retail', 'ha ha ha ', 'default.png', '123.pdf', '2017-12-03 18:55:09', 'Antrim'),
(41, 'john', 'jones', 'jones123', '$2y$10$yH270rezFUY/BBwEmEDC2uCf6T1IgxaJZwtgNsuVaKJHDbdp9kk8.', 'jones@gmail.com', 3, 'Retail', 'ha ha ha ', 'default.png', '123.pdf', '2017-12-03 18:59:27', ''),
(42, 'rick', 'ross', 'ross123', '$2y$10$iE.LvXew29uadZz910C2FO3lBQBtnP5.Hdxb0/UKcFwTbMQ1Q9LqC', 'rick@gmail.com', 3, 'It', 'ha ha ha ', 'default.png', '123.pdf', '2017-12-03 19:06:16', ''),
(43, 'Karen', 'Gibbons', 'gibbons32', '$2y$10$PJg9ga2t9h50ttF9OfeJF./ksd/K8ExdTAjgHdDOA.JrDXoO8s4zC', 'gibbons@gmail.com', 8, 'Academic', 'hey', 'default.png', '123.pdf', '2017-12-03 19:13:38', ''),
(44, 'Kyle', 'Kinsella', 'kyle', '$2y$10$4mOVnEV8raWd7tKpMfyuOuEQQmZikciu/v5h1YfH3spBrH68ernH2', 'kyle@gmal.com', 10, 'Drivers', 'hey', 'default.png', '123.pdf', '2017-12-03 19:21:45', ''),
(45, 'Kyle', 'Gibbons', 'kyle11', '$2y$10$XlBDwwiaLq8gHWjSGGpniOxM.0OmsOb9nzDT56qr6/E1m8J36A2s6', 'kyleG@gmal.com', 2, 'Academic', 'hey', 'default.png', '123.pdf', '2017-12-03 19:26:13', ''),
(46, 'Sue', 'O\'neil', 'sue123', '$2y$10$2H3jgJ9LcVmDLFcAKfw2q.QM/CeILOCB.Hi8eBNFphilkPIUlmt3.', 'sue@gmail.com', 10, '', 'hey', 'default.png', '123.pdf', '2017-12-03 19:33:40', ''),
(47, 'Ron', 'Jimmy', 'Jimmy123', '$2y$10$Krfo2MlF3W7bTNZaeCZSh.Lt/GOSCpEfMKqODk35Hf07GPsG5Hnnq', 'jimmy@gmail.com', 12, 'It', 'Helo', 'default.png', '123.pdf', '2017-12-04 13:14:46', 'Antrim'),
(48, 'Hannah', 'Mulligan', 'HannahM', '$2y$10$9bNPN1pH7drmT2KMla7xXO2YR7kP/3oSv8h9IPSo8s8N4Mvke72Ia', 'hannah2017@gmail.com', 10, 'Hair and Beauty', 'hey', 'default.png', '123.pdf', '2017-12-04 13:22:43', 'Dublin'),
(49, 'Paddy', 'O\'Shea', 'paddy17', '$2y$10$WcoJzc1C.nVIqIZkjB2eHeR.p/ws.zdo3xpJ9aRfFUnap8LjkjO16', 'paddy17@gmail.com', 2, 'Drivers', 'hey', 'default.png', '123.pdf', '2017-12-05 10:12:53', 'Dublin'),
(50, 'Mikel', 'Mason', 'mason17', '$2y$10$itmM/bfJv5IfzW1NGA34i.m0oWULRNlWVObo2MFfW7TvG1MD9fT0C', 'mason@gmail.com', 5, 'Drivers', 'hey', 'default.png', '123.pdf', '2017-12-05 10:14:30', 'Dublin'),
(51, 'Jack ', 'Mitchell', 'jack17', '$2y$10$d.98tQZBTD7Hd7T17EOMGupUFp/SiU/zUOwAK3iLU8agz654Fc3zW', 'jack@gmail.com', 5, 'It', 'hey', 'default.png', 'samplecv.pdf', '2017-12-05 11:07:36', 'Dublin'),
(52, 'Noah', 'Dunne', 'Noah17', '$2y$10$jjlSYq0/xZp5EWO0.t1F0eroiLM9js9h.RVt2Eb13rp7Fbto31qea', 'noah17@gmail.com', 5, 'Education/Training', 'hey', 'default.png', 'samplecv.pdf', '2017-12-05 11:21:47', 'Dublin');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `newuserid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `industrytypes`
--
ALTER TABLE `industrytypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newuser`
--
ALTER TABLE `newuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `industrytypes`
--
ALTER TABLE `industrytypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `newuser`
--
ALTER TABLE `newuser`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
