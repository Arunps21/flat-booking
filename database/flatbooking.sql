-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2023 at 06:54 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flatbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

DROP TABLE IF EXISTS `apartment`;
CREATE TABLE IF NOT EXISTS `apartment` (
  `aid` int NOT NULL AUTO_INCREMENT,
  `rate` int NOT NULL,
  `aimage` varchar(200) NOT NULL,
  `cid` int NOT NULL,
  `floor` int NOT NULL,
  `astatus` int NOT NULL DEFAULT '1',
  `fid` int NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`aid`, `rate`, `aimage`, `cid`, `floor`, `astatus`, `fid`) VALUES
(1, 6300000, 'cd21d0f6071c80dcaa59e4d574b4716c_88a50132688678c7da4.webp', 2, 5, 1, 1),
(2, 8800000, '447d01c846bcd65ae431dad30ef6cf37_0f975dd120.jpg', 3, 8, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `bdate` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `aid` int NOT NULL,
  `rate` int NOT NULL,
  `advance` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `balance` int NOT NULL,
  `cname` varchar(30) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `bdate`, `email`, `aid`, `rate`, `advance`, `status`, `balance`, `cname`) VALUES
(18, '2023-12-15', 'arun@gmail.com', 2, 8800000, 500000, 2, 5800000, ''),
(17, '2023-12-15', 'arun@gmail.com', 1, 6300000, 500000, 3, 5800000, ''),
(19, '2023-12-15', 'arun@gmail.com', 2, 8800000, 500000, 3, 8300000, ''),
(20, '2023-12-16', 'arun@gmail.com', 1, 6300000, 500000, 2, 5800000, ''),
(21, '2023-12-16', 'arun@gmail.com', 1, 6300000, 500000, 2, 5800000, ''),
(22, '2023-12-16', 'arun@gmail.com', 1, 6300000, 500000, 2, 5800000, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `cname` varchar(30) NOT NULL,
  `cimage` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `cimage`, `status`) VALUES
(1, '1 BHK', 'b04ff049b817528f808f89c2fe137777_5c1bbe9a3c386.jpg', 1),
(2, '2 BHK', 'ded1ee9f0320c3c8b44877666e92d9a5_750af3eaa6cc5435d.jpg', 1),
(3, '3 BHK', '9189fbd038e1b878dca7e1e226dbbfaf_8baf9e4614460c0b680.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

DROP TABLE IF EXISTS `flat`;
CREATE TABLE IF NOT EXISTS `flat` (
  `fid` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `fimage` varchar(200) NOT NULL,
  `flocation` varchar(30) NOT NULL,
  `cid` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`fid`, `fname`, `fimage`, `flocation`, `cid`, `status`) VALUES
(1, 'Green Vistas Prakrriti', '2d88993af83807e52c2d1ff480acb2ce_b48c590fe0f6aeaf80a1.jpg', 'Kakkanad', 2, 1),
(2, 'Vfive Life', '58f15201177176de1a6cc73378e70c43_04a4425b03cb9f3e19.jpeg', 'Trivandrum', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` char(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`userid`, `username`, `email`, `phone`, `password`, `status`) VALUES
(1, 'Anaj Mohan', 'anaj@gmail.com', '9526858956', 'Anaj@123', 1),
(2, 'Arun ps', 'arun@gmail.com', '7034470692', 'Arun@2001', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
