-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2015 at 12:40 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lacerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `defendants`
--

CREATE TABLE `defendants` (
  `id` int(12) NOT NULL,
  `suitno` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text,
  `phone` int(12) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(12) NOT NULL,
  `code` varchar(64) NOT NULL,
  `typeid` int(12) NOT NULL,
  `type` varchar(255) NOT NULL,
  `suitid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `datefiled` int(11) NOT NULL,
  `format` varchar(255) NOT NULL,
  `pagecount` int(11) NOT NULL,
  `dataentrypersonid` int(11) NOT NULL,
  `accessstatus` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documenttypes`
--

CREATE TABLE `documenttypes` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `phonealt` int(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `phonealt` int(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `datetimesent` int(11) NOT NULL,
  `recipients` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plaintiffs`
--

CREATE TABLE `plaintiffs` (
  `id` int(11) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text,
  `phone` int(12) DEFAULT NULL,
  `created` int(12) NOT NULL,
  `modified` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suitcourts`
--

CREATE TABLE `suitcourts` (
  `id` int(11) NOT NULL,
  `suitid` int(11) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `courtid` int(11) NOT NULL,
  `courtname` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suitjudges`
--

CREATE TABLE `suitjudges` (
  `id` int(11) NOT NULL,
  `suitid` int(11) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `judgeid` int(11) NOT NULL,
  `judgenumber` varchar(255) NOT NULL,
  `judgename` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suitlawyers`
--

CREATE TABLE `suitlawyers` (
  `id` int(11) NOT NULL,
  `suitid` int(11) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `lawyerid` int(11) NOT NULL,
  `lawyertype` varchar(255) NOT NULL,
  `lawyernumber` varchar(255) NOT NULL,
  `lawyername` varchar(255) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suits`
--

CREATE TABLE `suits` (
  `id` int(12) NOT NULL,
  `suitnumber` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `datefiled` int(11) NOT NULL,
  `suitstatus` varchar(255) NOT NULL,
  `suitaccess` varchar(255) NOT NULL,
  `dateofadjournment` int(11) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suits`
--

INSERT INTO `suits` (`id`, `suitnumber`, `title`, `type`, `datefiled`, `suitstatus`, `suitaccess`, `dateofadjournment`, `created`, `modified`) VALUES
(1, 'AA108', '', '', 124324356, 'active', '', NULL, 1440609923, 1440842979),
(2, '', '', '', 0, 'active', '', NULL, 1440686270, 1440686270),
(3, 'Aa023', '', '', 13, 'active', '', NULL, 1440687609, 1440687609),
(4, 'A9/342', 'A Court Case', 'writ of summons', 122324, 'Active', 'Public', 34424323, 0, 1441076031);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `selector` char(12) NOT NULL,
  `token` char(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `expires` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `selector`, `token`, `userid`, `expires`, `created`, `modified`) VALUES
(2, '55e56184c21e', 'NLjC5T0cDBqnNVCwOr8OMUflQ5qedU0B', 12, 1441182468, 1441096068, 1441096068),
(3, '55e5618aa33d', '6RdznyZSLdkl5AzFZo1UQXrchveLo2mu', 12, 1441182474, 1441096074, 1441096074),
(4, '55e5624aed40', '9vhClj4jUooh58bVM4dDWRgsLE2og0T8', 12, 1441182666, 1441096266, 1441096266);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `status`, `picture`, `created`, `modified`) VALUES
(11, 'ssd', 'globalsd', 'omicronsd', 'yoomisa', 'active', 'none', 1440564939, 1440564939),
(13, 'adasda', 'adad', 'none', 'mail', 'active', 'none', 1441094076, 1441094076);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defendants`
--
ALTER TABLE `defendants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documenttypes`
--
ALTER TABLE `documenttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plaintiffs`
--
ALTER TABLE `plaintiffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suitcourts`
--
ALTER TABLE `suitcourts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suitjudges`
--
ALTER TABLE `suitjudges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suitlawyers`
--
ALTER TABLE `suitlawyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suits`
--
ALTER TABLE `suits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suitnumber` (`suitnumber`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `defendants`
--
ALTER TABLE `defendants`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documenttypes`
--
ALTER TABLE `documenttypes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plaintiffs`
--
ALTER TABLE `plaintiffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suitcourts`
--
ALTER TABLE `suitcourts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suitjudges`
--
ALTER TABLE `suitjudges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suitlawyers`
--
ALTER TABLE `suitlawyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suits`
--
ALTER TABLE `suits`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
