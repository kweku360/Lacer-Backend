-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2016 at 03:28 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lacerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE IF NOT EXISTS `courts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `defendants`
--

CREATE TABLE IF NOT EXISTS `defendants` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `suitnumber` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) NOT NULL,
  `email` varchar(233) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `suitnumber` varchar(255) NOT NULL,
  `code` varchar(64) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `datefiled` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `filer` varchar(255) NOT NULL,
  `dataentrypersonid` int(11) NOT NULL,
  `accessstatus` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `documenttypes`
--

CREATE TABLE IF NOT EXISTS `documenttypes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE IF NOT EXISTS `judges` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judgeid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text,
  `email` varchar(255) DEFAULT NULL,
  `court` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `courtnumber` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE IF NOT EXISTS `lawyers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lawyerid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `lawfirmid` int(10) NOT NULL,
  `lawfirmname` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `notificationdetail`
--

CREATE TABLE IF NOT EXISTS `notificationdetail` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `suitnumber` int(13) NOT NULL,
  `notificationId` int(13) NOT NULL,
  `msgstatus` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `msgtxt` text NOT NULL,
  `datetimesent` int(15) NOT NULL,
  `msgid` int(13) NOT NULL,
  `created` int(13) NOT NULL,
  `modified` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documentid` int(13) NOT NULL,
  `documentlink` varchar(255) NOT NULL,
  `filer` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `datetimesent` int(11) NOT NULL,
  `recipients` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `userid` int(12) NOT NULL,
  `code` int(12) NOT NULL,
  `value` int(2) NOT NULL,
  `state` varchar(255) NOT NULL,
  `created` int(12) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `plaintiffs`
--

CREATE TABLE IF NOT EXISTS `plaintiffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suitnumber` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(12) NOT NULL,
  `modified` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `regcode`
--

CREATE TABLE IF NOT EXISTS `regcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `status` varchar(60) NOT NULL,
  `msgstatus` varchar(255) NOT NULL,
  `created` int(20) NOT NULL,
  `modified` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `suitcourts`
--

CREATE TABLE IF NOT EXISTS `suitcourts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suitid` int(11) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `courtid` int(11) NOT NULL,
  `courtname` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suitjudges`
--

CREATE TABLE IF NOT EXISTS `suitjudges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suitid` int(11) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `judgeid` int(11) NOT NULL,
  `judgename` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `suitlawyers`
--

CREATE TABLE IF NOT EXISTS `suitlawyers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suitid` int(11) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `lawyerid` int(11) NOT NULL,
  `lawyertype` varchar(255) NOT NULL,
  `lawyernumber` varchar(255) NOT NULL,
  `lawyername` varchar(255) NOT NULL,
  `registertype` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `suits`
--

CREATE TABLE IF NOT EXISTS `suits` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `suitnumber` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `datefiled` int(11) NOT NULL,
  `suitstatus` varchar(255) NOT NULL,
  `suitaccess` varchar(255) NOT NULL,
  `suitdateid` int(20) DEFAULT NULL,
  `suitcourt` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `dataentryname` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `suitnumber` (`suitnumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selector` char(12) NOT NULL,
  `token` char(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `expires` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Table structure for table `unregisteredlawyers`
--

CREATE TABLE IF NOT EXISTS `unregisteredlawyers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lawfirmid` int(12) NOT NULL,
  `lawfirmname` varchar(255) NOT NULL,
  `created` int(20) NOT NULL,
  `modified` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `phone` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `emailcode` varchar(255) NOT NULL,
  `mobilecode` varchar(16) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
