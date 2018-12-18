-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2018 at 01:21 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `active`
--

DROP TABLE IF EXISTS `active`;
CREATE TABLE IF NOT EXISTS `active` (
  `ac_value` int(1) NOT NULL,
  `ac_description` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active`
--

INSERT INTO `active` (`ac_value`, `ac_description`) VALUES
(0, 'Inactive'),
(1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ad_value` int(1) NOT NULL,
  `ad_description` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_value`, `ad_description`) VALUES
(0, 'Regular'),
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

DROP TABLE IF EXISTS `available`;
CREATE TABLE IF NOT EXISTS `available` (
  `av_value` int(1) NOT NULL,
  `av_description` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`av_value`, `av_description`) VALUES
(0, 'Sold'),
(1, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `b_id` int(8) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(32) NOT NULL,
  `b_active` int(1) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`b_id`, `b_name`, `b_active`) VALUES
(1, 'BMW', 1),
(2, 'Mercedes Benz', 1),
(3, 'Porsche', 1),
(4, 'Audi', 1),
(5, 'Koenigsegg', 1),
(6, 'Nissan', 1),
(7, 'Mitsubishi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `c_id` int(8) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(16) NOT NULL,
  `c_description` varchar(256) NOT NULL,
  `c_b_id` int(8) NOT NULL,
  `c_cat_id` int(8) NOT NULL,
  `c_year` int(4) NOT NULL,
  `c_color` varchar(16) NOT NULL,
  `c_seats` int(2) NOT NULL,
  `c_price` int(8) NOT NULL,
  `c_available` int(1) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`c_id`, `c_name`, `c_description`, `c_b_id`, `c_cat_id`, `c_year`, `c_color`, `c_seats`, `c_price`, `c_available`) VALUES
(1, 'M5 Series', 'V8, 4.4L Twin-Turbocharged, 600 HP; 8-Speed Automatic Transmission; AWD.', 1, 1, 2018, 'Electric Blue', 5, 104000, 1),
(2, 'i8 Series', 'V3, Electric Turbo-Charged, 228 HP; 8-Speed Automatic Transmission; AWD.', 1, 2, 2017, 'Cyber Gray', 2, 152000, 1),
(3, 'X6 Series', 'V6, 3.0L, 547 HP; 6-Speed Automatic Transmission; RWD.', 1, 3, 2018, 'Dark Black', 7, 84835, 1),
(4, 'E-Class 300', 'V4, 2.0L Turbo-Charged, 241 HP; 9-Speed Automatic Transmission; RWD.', 2, 1, 2019, 'Cyber Gray', 5, 52950, 1),
(5, 'E-Class 450', 'V6, 3.0L Twin-Turbocharged, 362 HP; 9-Speed Automatic Transmission; RWD.', 2, 2, 2018, 'Cyber Gray', 2, 58900, 1),
(6, 'GLE-Class 43', 'V6, 3.0L Twin-Turbocharged, 385 HP; 9-Speed Automatic Transmission; AWD.', 2, 3, 2018, 'Dark Black', 7, 70500, 1),
(7, 'Panamera', 'V6, 3.6L Turbo-Charged, 330 HP; 7-Speed Automatic Transmission; RWD.', 3, 1, 2017, 'Navy Blue', 5, 147950, 1),
(8, '911 Turbo', 'V6, 3.8L Twin-Turbocharged, 540 HP; 6-Speed Automatic Transmission; AWD.', 3, 2, 2017, 'Fire Red', 4, 159200, 1),
(9, 'Cayenne', 'V6, 3.0L Turbocharged, 340 HP; 8-Speed Automatic Transmission; AWD.', 3, 3, 2018, 'Dark Black', 7, 118100, 1),
(10, 'A5 Sportback', 'V6, 2.0L Turbocharged, 252HP; 6-Speed Automatic Transmission; AWD.', 4, 1, 2018, 'Electric Blue', 5, 43775, 1),
(11, 'TT Coupe', 'V4, 2.0 Turbocharged, 220 HP; 6-Speed Automatic Transmission; FWD.', 4, 2, 2018, 'Silver', 2, 43950, 1),
(12, 'Q7', 'V6, 3.0 Turbocharged, 252 HP; 6-Speed Automatic Transmission; AWD.', 4, 3, 2018, 'White', 7, 50875, 1),
(13, 'Agera RS', 'V8, 5.8L Quad-Turbocharged, 1160 HP; 8-Speed Automatic Transmission; AWD;', 5, 2, 2016, 'Wine Red', 2, 2500000, 1),
(14, 'Maxima', 'V6, 3.0L, 157 HP; 4-Speed Automatic Transmission; FWD.', 6, 1, 2018, 'Dark Black', 5, 33915, 1),
(15, '370Z', 'V6, 3.0 Turbocharged, 337 HP; 5-Speed Automatic Transmission; RWD.', 6, 2, 2017, 'Yellow', 2, 41990, 1),
(16, 'Murano', 'V6, 3.5L, 260 HP; 6-Speed Automatic Transmission; AWD.', 6, 3, 2017, 'Space Gray', 7, 30600, 1),
(17, 'Mirage G4', 'V3, 1.2L, 78 HP; 5-Speed Automatic Transmission; FWD.', 7, 1, 2019, 'White', 5, 17495, 1),
(18, 'Lancer Evo X', 'V6, 2.0L Turbocharged, 295 HP; 5-Speed Automatic Transmission; AWD.', 7, 2, 2017, 'Electric Blue', 4, 17000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(16) NOT NULL,
  `cat_active` int(1) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_active`) VALUES
(1, 'Sedan', 1),
(2, 'Sport', 1),
(3, 'SUV', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(8) NOT NULL AUTO_INCREMENT,
  `com_description` varchar(256) NOT NULL,
  `com_u_id` int(8) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `l_com_id` int(8) NOT NULL,
  `l_u_id` int(8) NOT NULL,
  `l_liked` int(1) NOT NULL,
  `l_active` int(1) NOT NULL,
  UNIQUE KEY `unique_index` (`l_com_id`,`l_u_id`,`l_liked`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `s_id` int(8) NOT NULL AUTO_INCREMENT,
  `s_c_id` int(8) NOT NULL,
  `s_u_id` int(8) NOT NULL,
  `s_date` date NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(8) NOT NULL AUTO_INCREMENT,
  `u_fname` varchar(16) NOT NULL,
  `u_lname` varchar(16) NOT NULL,
  `u_phone` varchar(16) NOT NULL,
  `u_email` varchar(32) NOT NULL,
  `u_username` varchar(16) NOT NULL,
  `u_password` varchar(64) NOT NULL,
  `u_admin` int(1) NOT NULL,
  `u_active` int(1) NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_email` (`u_email`),
  UNIQUE KEY `u_username` (`u_username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_phone`, `u_email`, `u_username`, `u_password`, `u_admin`, `u_active`) VALUES
(1, 'Elio', 'Sarkis', '71441284', 'sarkis.elio@aut.edu', 'eliosarkis', 'Elio13Sarkis', 1, 1),
(2, 'Mario', 'Frem', '76176529', 'frem.mario@aut.edu', 'mariofrem', 'Mario10Frem', 1, 1),
(3, 'Georges', 'Abboudeh', '03410701', 'george.abboudeh@gmail.com', 'georgesabboudeh', 'Georges1', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
