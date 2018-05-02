-- phpMyAdmin SQL empty startup file THIS WILL DELETE EVERYTHING IN magazinedb


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazineDB`
--
DROP DATABASE IF EXISTS magazineDB;
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

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `Subscriptionid` int(11),
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
  ADD PRIMARY KEY (`Subscriptionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `magazine`
--
ALTER TABLE `magazine`
  MODIFY `Magazineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Reviewid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `Subscriberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscription`
  MODIFY `Subscriptionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

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
