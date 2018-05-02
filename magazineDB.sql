-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 02, 2018 at 01:38 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazineDB`
--
DROP DATABASE magazineDB;
CREATE DATABASE magazineDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `magazineDB`;

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE `magazine` (
  `Magazineid` int(11) NOT NULL,
  `Magazinename` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `magazine`
--

INSERT INTO `magazine` (`Magazineid`, `Magazinename`, `Type`, `City`, `State`) VALUES
(1, 'National Enquirer', 'Tabloid', 'New York', 'NY'),
(2, 'Time', 'News', 'New York', 'NY'),
(3, 'People', 'Gossip', 'Los Angeles', 'CA'),
(4, 'Smithsonian', 'History', 'Washington', 'DC');
(5, 'National Geographic', 'History', 'New York', 'NY'),
(6, 'LA Magazine', 'News', 'Los Angeles', 'CA'),
(7, 'Vanity Fair', 'Gossip', 'Hollywood', 'CA'),
(8, 'BluePrint', 'News', 'Los Angeles', 'CA');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Reviewid` int(11) NOT NULL,
  `Magazineid` int(11) DEFAULT NULL,
  `Subscriberid` int(11) DEFAULT NULL,
  `Stars` int(11) NOT NULL,
  `Reviewdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `Subscriberid` int(11) NOT NULL,
  `Subscribersfname` varchar(50) NOT NULL,
  `Subscriberslname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`Subscriberid`, `Subscribersfname`, `Subscriberslname`, `Email`, `City`, `State`) VALUES
(1, 'Ryan', 'Minsk', 'ryan@gwu.edu', 'Sacramento', 'CA'),
(2, 'Jared', 'Kushner', 'jkjk@gwu.edu', 'Los Al', 'CA'),
(3, 'Zach', 'Bass', 'zizi@gwu.edu', 'Miami', 'FL'),
(4, 'Emma', 'Bishop', 'em@gwu.edu', 'San Diego', 'CA');
(5, 'Joe', 'Smith', 'joe@gwu.edu', 'Long Beach', 'CA'),
(6, 'Kiki', 'Jordan', 'kiki@gwu.edu', 'Los Al', 'CA'),
(7, 'Jeff', 'Santos', 'jj@gwu.edu', 'Miami', 'FL'),
(8, 'Isabelle', 'Martinez', 'IM@gwu.edu', 'San Diego', 'CA');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `Magazineid` int(11) NOT NULL DEFAULT '0',
  `Subscriberid` int(11) NOT NULL DEFAULT '0',
  `Subscriptiondate` date NOT NULL,
  `Subscriptionperiod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`Magazineid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Reviewid`),
  ADD KEY `fk3` (`Magazineid`),
  ADD KEY `fk4` (`Subscriberid`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`Subscriberid`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`Magazineid`,`Subscriberid`),
  --ADD KEY `fk2` (`Subscriberid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `Magazineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Reviewid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `Subscriberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`Magazineid`) REFERENCES `magazine` (`Magazineid`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`Subscriberid`) REFERENCES `subscriber` (`Subscriberid`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`Magazineid`) REFERENCES `magazine` (`Magazineid`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`Subscriberid`) REFERENCES `subscriber` (`Subscriberid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
