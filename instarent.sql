-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2015 at 03:37 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instarent`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `first_name`, `surname`, `active`) VALUES
(16, 'arjun@90.com', 'stevengerrard', 'arjun', 'nair', 1),
(17, '', '', '', '', 1),
(18, 'ainan', 'sadasda', 'zidane', 'zine', 1),
(19, 'asdas', 'sadasdas', 'arjun', 'asda', 1),
(20, 'arjun90.nair@gmail.com', 'test', 'jay', 'rodriguez', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_detail_id` int(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `Gender` char(1) NOT NULL,
  `photo_path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `venue_id` int(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `venue_desc` longtext NOT NULL,
  `logo_addr` longtext NOT NULL,
  `no_of_floors` int(11) NOT NULL,
  `floor_area` int(11) NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `no_of_desks` int(11) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `addr` longtext NOT NULL,
  `neighbourhood` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `user_id`, `name`, `type`, `city`, `venue_desc`, `logo_addr`, `no_of_floors`, `floor_area`, `no_of_rooms`, `no_of_desks`, `opening_time`, `closing_time`, `addr`, `neighbourhood`, `telephone`, `email`, `website`) VALUES
(2, '', '', '2', '', 'arjun', '', 2, 2, 2, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(3, '', '', '1', '', 'asmd,asd,a', '', 1, 4, 4, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(4, '', '', '1', '', 'asmd,asd,a', '', 1, 4, 4, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(5, '', '', '1', '', 'asmd,asd,a', '', 1, 4, 4, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(6, '', '', '1', '', 'asmd,asd,a', '', 1, 4, 4, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(7, '', '', '1', 'mumbai', 'asmd,asd,a', '', 1, 4, 4, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(8, '', 'BESt venue', '1', 'mumbai', 'asmd,asd,a', '', 1, 4, 4, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(9, '', '', '1', '', 'asmd,asd,a', '', 1, 4, 4, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(10, '', 'sTART DATA', '2', 'JAIPUT', 'akskndm,asnd', '', 2, 4, 4, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(11, '', 'virat', '', 'nue mumbai', '', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(12, '', 'testkjasdlkas', '', 'kanput', '', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(13, '', 'Mumbia ', '', 'sakdjaslk', '', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(14, '', 'dkl jslka', '', 'skaldj asl', '', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(15, '', 'New rental apartment', '1', 'Koparkhair', 'This is faboulous', '', 1, 1, 1, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(16, '', 'Faboulous restaurant', '', 'koparkhair', '', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(17, '', 'test', '', 'mumbai', '', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(18, '', '', '', 'Multi', '', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', ''),
(19, '', 'asdsada', '', 'dasda', '', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

CREATE TABLE IF NOT EXISTS `workspace` (
  `workspace_id` int(20) NOT NULL,
  `venue_id` int(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `space_name` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `space_desc` longtext NOT NULL,
  `image_path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workspace_pricing`
--

CREATE TABLE IF NOT EXISTS `workspace_pricing` (
  `workspace_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `venue_id` int(20) NOT NULL,
  `hourly_price` int(11) NOT NULL,
  `weekly_price` int(11) NOT NULL,
  `monthy_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_detail_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`),
  ADD UNIQUE KEY `venue_id` (`venue_id`);

--
-- Indexes for table `workspace`
--
ALTER TABLE `workspace`
  ADD PRIMARY KEY (`workspace_id`);

--
-- Indexes for table `workspace_pricing`
--
ALTER TABLE `workspace_pricing`
  ADD PRIMARY KEY (`workspace_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_detail_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `workspace`
--
ALTER TABLE `workspace`
  MODIFY `workspace_id` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
