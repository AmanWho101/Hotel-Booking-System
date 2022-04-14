-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2022 at 07:03 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comentid` int(34) NOT NULL AUTO_INCREMENT,
  `customerid` int(34) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(4000) NOT NULL,
  PRIMARY KEY (`comentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

DROP TABLE IF EXISTS `ratting`;
CREATE TABLE IF NOT EXISTS `ratting` (
  `rattingid` int(50) NOT NULL AUTO_INCREMENT,
  `customerid` int(55) NOT NULL,
  `rattingNo` int(55) NOT NULL,
  `tottalNo` int(55) NOT NULL,
  PRIMARY KEY (`rattingid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

DROP TABLE IF EXISTS `reserved`;
CREATE TABLE IF NOT EXISTS `reserved` (
  `reservationid` int(11) NOT NULL,
  `customerid` int(34) NOT NULL,
  `name` varchar(200) NOT NULL,
  `arrival` varchar(300) NOT NULL,
  `departure` varchar(300) NOT NULL,
  `address` varchar(100) NOT NULL,
  `room` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `reservationid` int(11) NOT NULL AUTO_INCREMENT,
  `roomtypeid` int(34) NOT NULL,
  `roomNo` int(50) NOT NULL,
  `roomFloor` int(50) NOT NULL,
  `roomPrice` int(50) NOT NULL,
  PRIMARY KEY (`reservationid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

DROP TABLE IF EXISTS `roomtype`;
CREATE TABLE IF NOT EXISTS `roomtype` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(100) NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

DROP TABLE IF EXISTS `staf`;
CREATE TABLE IF NOT EXISTS `staf` (
  `stafid` int(34) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `privilege` varchar(200) NOT NULL,
  PRIMARY KEY (`stafid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
