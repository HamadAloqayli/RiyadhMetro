-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2020 at 10:44 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riyadh_metro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@ksu.com', '$2y$10$mv9pTXwbgcmbBBRme6WDAO7gJ7lseczsM6Es/NQ5tCvj32/cIWsE2');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userId` int(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  `price` int(10) NOT NULL,
  `Pdate` date NOT NULL,
  `Edate` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `suspend` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `phone`, `date`) VALUES
(1, 'Customer', 'customer@ksu.com', '$2y$10$5XFEoryTONqIsx2hicUeT.PXI.pfXGoXouTOFCdVfX2O6yXhCvJ06', 555555555, '2020-04-02'),
(2, 'Customer1', 'customer1@ksu.com', '$2y$10$hZq5yrNiBoPULcucQDvNQuuR4FLQlLvhnJa9jge2NAHrjMMwx/emu', 555555555, '2020-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `customer_support`
--

DROP TABLE IF EXISTS `customer_support`;
CREATE TABLE IF NOT EXISTS `customer_support` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_support`
--

INSERT INTO `customer_support` (`id`, `name`, `email`, `password`, `rating`) VALUES
(1, 'Customer Support', 'cs@ksu.com', '$2y$10$mv9pTXwbgcmbBBRme6WDAO7gJ7lseczsM6Es/NQ5tCvj32/cIWsE2', '4.6'),
(2, 'Customer Support1', 'cs1@ksu.com', '$2y$10$mv9pTXwbgcmbBBRme6WDAO7gJ7lseczsM6Es/NQ5tCvj32/cIWsE2', '4.2');

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

DROP TABLE IF EXISTS `letter`;
CREATE TABLE IF NOT EXISTS `letter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(10000) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `date` date NOT NULL,
  `sender` varchar(30) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(5000) NOT NULL,
  `title` varchar(5000) NOT NULL,
  `text` varchar(5000) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `title`, `text`, `status`) VALUES
(16, '11-720x504.jpg', '135,000 Concrete Segments', '135,000 Concrete segments shaped the tunnels of Riyadh Metro.   Earlier Prince Faisal Bin Bandar â€“ the Chairman of the Council of the Riyadh Development Authority â€“ had announced the completion of construction of the deep tunnels works by 7 Tunnel Boring Machines after 21 months of work.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fromm` varchar(255) NOT NULL,
  `too` varchar(255) NOT NULL,
  `paths` varchar(255) NOT NULL,
  `class` varchar(15) NOT NULL,
  `nubmerOfTickets` int(10) NOT NULL,
  `price` int(15) NOT NULL,
  `userId` int(10) NOT NULL,
  `role` varchar(30) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
