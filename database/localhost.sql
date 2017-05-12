-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2017 at 09:43 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `firmstep`
--
CREATE DATABASE `firmstep` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `firmstep`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_type` varchar(20) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `org_name` text NOT NULL,
  `anonymous` varchar(10) NOT NULL,
  `service` varchar(20) NOT NULL,
  `que_time` time NOT NULL,
  `que_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_type`, `title`, `firstname`, `lastname`, `org_name`, `anonymous`, `service`, `que_time`, `que_date`) VALUES
(1, '', 'Mr.', 'Jon', 'Snow', '', '', 'Missed Bin', '21:27:00', '2017-05-11 20:27:00'),
(2, 'Anonymous', 'Mrs.', '', 'Griffin', '', '', 'Housing', '22:01:07', '2017-05-11 21:01:07'),
(3, 'Citizen', 'Mr.', 'Brian', '', '', 'Anonymous', 'Fly-tipping', '22:08:27', '2017-05-11 21:08:27'),
(4, 'Anonymous', '', 'Brian', '', '', 'Anonymous', '', '22:11:08', '2017-05-11 21:11:08'),
(14, 'Citizen', 'Mr.', 'Jon', 'Snow', '', '', 'Missed Bin', '10:32:41', '2017-05-12 09:32:41'),
(15, 'Citizen', 'Mrs.', 'Lois', 'Griffin', '', '', 'Housing', '10:32:54', '2017-05-12 09:32:54'),
(16, 'Organization', '', '', '', 'Brian', '', 'Fly-tipping', '10:34:48', '2017-05-12 09:34:48'),
(17, 'Anonymous', '', '', '', '', 'Anonymous', 'Fly-tipping', '10:34:58', '2017-05-12 09:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_name` varchar(20) NOT NULL,
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ser_id`, `ser_name`) VALUES
(1, 'Housing'),
(2, 'Benefits'),
(3, 'Council Tax'),
(4, 'Fly-tipping'),
(5, 'Missed Bin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
