-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 08:43 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `occupant`
--

CREATE TABLE IF NOT EXISTS `occupant` (
  `cid` int(4) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `room_no` varchar(10) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `address` char(50) DEFAULT NULL,
  `nop` int(2) DEFAULT NULL,
  `oid` int(2) DEFAULT NULL,
  `outdate` date DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupant`
--

INSERT INTO `occupant` (`cid`, `date`, `room_no`, `name`, `address`, `nop`, `oid`, `outdate`) VALUES
(3636, '2016-12-05', '501', 'richu', 'pu', 2, 1, '2016-12-05'),
(32007, '2016-12-05', '402', 'richa kumari', 'pondicherry university', 2, 1, '2016-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_no` varchar(10) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `cost` int(6) DEFAULT NULL,
  `rid` int(2) DEFAULT NULL,
  PRIMARY KEY (`room_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_no`, `type`, `cost`, `rid`) VALUES
('101', 'STANDARD SINGLE', 299, 0),
('102', 'STANDARD SINGLE', 299, 0),
('103', 'STANDARD SINGLE', 299, 0),
('104', 'STANDARD SINGLE', 299, 0),
('201', 'SUPERIOR SINGLE', 399, 0),
('202', 'SUPERIOR SINGLE', 399, 0),
('203', 'SUPERIOR SINGLE', 399, 0),
('301', 'DELUXE DOUBLE', 599, 0),
('302', 'DELUXE DOUBLE', 599, 0),
('401', 'STANDARD TWIN', 699, 0),
('402', 'STANDARD TWIN', 699, 0),
('501', 'DELUXE TWIN', 799, 0),
('502', 'DELUXE TWIN', 799, 0),
('601', 'JUNIOR SUITE', 999, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userentry`
--

CREATE TABLE IF NOT EXISTS `userentry` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `usertype` int(2) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userentry`
--

INSERT INTO `userentry` (`username`, `password`, `usertype`) VALUES
('richa', 'richa', 2),
('rics', 'rics', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
