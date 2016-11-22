-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2015 at 04:21 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `friend request` varchar(100) NOT NULL,
  `friends` varchar(100) NOT NULL,
  `theme` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `fname`, `lname`, `email`, `pass`, `dob`, `sex`, `friend request`, `friends`, `theme`) VALUES
(1, 'Pawneet', 'Singh', 'rubalps@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1993-07-09', 'male', 'a:1:{i:0;s:1:"0";}', 'a:2:{i:0;s:1:"0";i:1;s:1:"2";}', 2),
(2, 'Ayushi', 'Gupta', 'ayushigupta2995@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1995-01-29', 'female', 'a:1:{i:0;s:1:"0";}', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
