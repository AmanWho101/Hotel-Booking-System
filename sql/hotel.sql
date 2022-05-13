-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2022 at 09:32 AM
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
  `passwords` varchar(100) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `fname`, `email`, `passwords`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `recepid`, `fname`, `lname`, `country`, `city`, `email`, `phone`, `passwords`) VALUES
(12, 1, 'trust ', 'your', 'code', 'Adama', 'amleaz2005@gmail.com', '+251923837212', 'password'),
(13, 3, 'customer1', 'Neguse1', 'Ethiopia', 'Adama', 'amleaz2005@gmail.com', '+251923837212', '12345'),
(14, 3, 'customer5', 'Neguse5', 'Ethiopia', 'Adama', 'amleaz2005@gmail.com', '+251923837212', '123456'),
(15, 3, 'customer5', 'cust', 'Ethiopia', 'Adama', 'amleaz2005@gmail.com', '+251923837212', '12345'),
(16, 4, 'customer5', 'cust', 'Ethiopia', 'Adama', 'amleaz2005@gmail.com', '+251923837212', '12345'),
(17, 3, 'hana', 'legese', 'Ethiopia', 'Adama', 'hana@gmail.com', '+251931250164', '123456'),
(18, 4, 'hana', 'legese', 'Ethiopia', 'Adama', 'hana@gmail.com', '+251931250164', '123456'),
(19, 5, 'hana', 'legese', 'Ethiopia', 'Adama', 'hana@gmail.com', '+251931250164', '123456');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reception`
--

INSERT INTO `reception` (`recepid`, `adminid`, `fname`, `lname`, `email`, `passwords`) VALUES
(4, 1, 'receptionist 12', 'data clerk12', 'amleaz2005@gmail.com', '12345'),
(3, 1, 'receptionist2', 'data clerk2', 'amleaz2005@gmail.com', '123456'),
(5, 1, 'receptionist8', 'data clerk8', 'amleaz2005@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

DROP TABLE IF EXISTS `reserved`;
CREATE TABLE IF NOT EXISTS `reserved` (
  `reservationid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `arrival` varchar(300) NOT NULL,
  `departure` varchar(300) NOT NULL,
  `roomid` int(50) NOT NULL,
  `paid` int(50) NOT NULL,
  PRIMARY KEY (`reservationid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`reservationid`, `customerid`, `arrival`, `departure`, `roomid`, `paid`) VALUES
(1, 13, '2022-05-10 13:45', '2022-05-11 10:50', 20, 5000),
(2, 13, '2022-05-10 13:45', '2022-05-11 10:50', 20, 5000),
(3, 13, '2022-05-10 13:45', '2022-05-11 10:50', 13, 1000),
(4, 14, '2022-05-10 13:45', '2022-05-19 14:50', 13, 1000),
(5, 17, '2022-05-16 12:10', '2022-05-19 14:10', 20, 5000),
(6, 17, '2022-05-10 13:45', '2022-05-19 14:10', 19, 100);

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `adminid`, `roomtype`, `roomNo`, `roomFloor`, `roomPrice`, `images`) VALUES
(20, 1, 'Single_Deluxe_Room', 2, 1, 5000, 'room2.jpg'),
(13, 1, 'Single_Deluxe_Room', 1, 1, 1000, 'room4.jpg'),
(19, 1, 'Economy_Room', 2, 1, 100, 'room1.jpg'),
(23, 1, 'Honeymoon_Suit', 2, 1, 1000, 'about_bg.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
