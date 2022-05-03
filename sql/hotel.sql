-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2022 at 01:50 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `fname`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comentid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`comentid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `recepid` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `passwords` varchar(100) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `recepid`, `fname`, `lname`, `country`, `city`, `email`, `phone`, `passwords`) VALUES
(12, 1, 'trust ', 'your', 'code', 'Adama', 'amleaz2005@gmail.com', '+251923837212', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

DROP TABLE IF EXISTS `ratting`;
CREATE TABLE IF NOT EXISTS `ratting` (
  `rattingid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `rattingNo` int(50) NOT NULL,
  PRIMARY KEY (`rattingid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

DROP TABLE IF EXISTS `reception`;
CREATE TABLE IF NOT EXISTS `reception` (
  `recepid` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwords` varchar(100) NOT NULL,
  PRIMARY KEY (`recepid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reception`
--

INSERT INTO `reception` (`recepid`, `adminid`, `fname`, `lname`, `email`, `passwords`) VALUES
(1, 1, 'receptionist', 'data clerk', 'receptionist@admin.com', 'admin123@.gimal.com');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `replyid` int(11) NOT NULL AUTO_INCREMENT,
  `comentid` int(11) NOT NULL,
  `recepid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `replymessage` text NOT NULL,
  PRIMARY KEY (`replyid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

DROP TABLE IF EXISTS `reserved`;
CREATE TABLE IF NOT EXISTS `reserved` (
  `reservationid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `recepid` int(11) NOT NULL,
  `arrival` varchar(300) NOT NULL,
  `departure` varchar(300) NOT NULL,
  `room` int(50) NOT NULL,
  `paid` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `roomid` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` int(11) NOT NULL,
  `roomtype` varchar(200) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `roomFloor` int(11) NOT NULL,
  `roomPrice` int(11) NOT NULL,
  `images` varchar(100) NOT NULL,
  PRIMARY KEY (`roomid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `adminid`, `roomtype`, `roomNo`, `roomFloor`, `roomPrice`, `images`) VALUES
(15, 1, 'Economy_Room', 2, 5, 5000, 'room3.jpg'),
(14, 1, 'Honeymoon_Suit', 2, 5, 1000, 'room4.jpg'),
(13, 1, 'Single_Deluxe_Room', 1, 1, 1000, 'room4.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
