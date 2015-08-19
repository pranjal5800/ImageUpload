-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 04:33 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ass1`
--
CREATE DATABASE IF NOT EXISTS `ass1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ass1`;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `Event_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Event_name` varchar(50) NOT NULL,
  PRIMARY KEY (`Event_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_Id`, `Event_name`) VALUES
(1, 'Birthday'),
(2, 'Wedding'),
(4, 'Animalys Day Out');

-- --------------------------------------------------------

--
-- Table structure for table `event_list`
--

CREATE TABLE IF NOT EXISTS `event_list` (
  `List_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Event_Id` int(11) NOT NULL,
  `Image_id` int(11) NOT NULL,
  PRIMARY KEY (`List_Id`),
  KEY `Event_Id` (`Event_Id`),
  KEY `Image_id` (`Image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `event_list`
--

INSERT INTO `event_list` (`List_Id`, `Event_Id`, `Image_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 1, 6),
(4, 2, 2),
(5, 2, 5),
(6, 2, 7),
(7, 2, 8),
(12, 4, 1),
(13, 4, 4),
(14, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `img_upload`
--

CREATE TABLE IF NOT EXISTS `img_upload` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `img_upload`
--

INSERT INTO `img_upload` (`Id`, `Path`) VALUES
(1, 'images/55bda6f5ed4aa0.00727472.jpg'),
(2, 'images/55bda31d79fb59.44954788.jpg'),
(4, 'images/55bdaabaa0acb1.01792071.jpg'),
(5, 'images/55bdaac0749105.61684707.jpg'),
(6, 'images/55bdaac5cdff20.65426691.jpg'),
(7, 'images/55bdaacd2d35e2.45637361.jpg'),
(8, 'images/55bdaad35b3200.00601538.jpg'),
(11, 'images/55bde0af76f035.05471975.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE IF NOT EXISTS `reg` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Address` varchar(70) NOT NULL,
  `Email_id` varchar(40) NOT NULL,
  `Hobies` varchar(30) NOT NULL,
  `Img` varchar(50) NOT NULL,
  `Bdate` date NOT NULL,
  `Gender` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`Id`, `UserName`, `Password`, `Address`, `Email_id`, `Hobies`, `Img`, `Bdate`, `Gender`) VALUES
(2, 'Ramesh', '5800', 'djkasjkdsjdk', 'jksdjksadjk', 'Games,Movies', 'images/55be1e0e982861.72989182.jpg', '1992-12-17', 'Male');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_list`
--
ALTER TABLE `event_list`
  ADD CONSTRAINT `img_ctr` FOREIGN KEY (`Image_id`) REFERENCES `img_upload` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ctr` FOREIGN KEY (`Event_Id`) REFERENCES `event` (`Event_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
