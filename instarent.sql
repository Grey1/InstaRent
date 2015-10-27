-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 05:28 PM
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
-- Table structure for table `amenities`
--

CREATE TABLE IF NOT EXISTS `amenities` (
  `amenity_id` int(20) NOT NULL,
  `venue_id` int(20) NOT NULL,
  `workspace_id` int(20) NOT NULL,
  `wifi` varchar(5) NOT NULL,
  `internet` varchar(5) NOT NULL,
  `kitchen` varchar(5) NOT NULL,
  `doorman` varchar(5) NOT NULL,
  `telecom` varchar(5) NOT NULL,
  `elevator` varchar(5) NOT NULL,
  `parking` varchar(5) NOT NULL,
  `essentials` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(30) NOT NULL,
  `user_id` int(20) NOT NULL,
  `host_id` int(20) NOT NULL,
  `confirmation_from_host` int(1) NOT NULL,
  `from_time` time NOT NULL,
  `to-time` time NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `payment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `active` int(1) NOT NULL,
  `user_detail_id` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `first_name`, `surname`, `active`, `user_detail_id`) VALUES
(54, 'h@h.com', 'test123', 'jammy', 'carragher', 1, 30),
(55, 't5est@mas.com', 'test123', 'test123', 'test', 1, 31),
(56, 'arjun90.nair@gmail.com', 'test123', 'arjun', 'niar', 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_detail_id` int(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `gender` int(1) DEFAULT NULL,
  `photo_path` longtext,
  `birth_date` date DEFAULT NULL,
  `contact` int(20) DEFAULT NULL,
  `company_name` varchar(20) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_detail_id`, `user_id`, `gender`, `photo_path`, `birth_date`, `contact`, `company_name`, `address1`, `address2`, `pincode`, `city`) VALUES
(30, 54, 0, '', '0000-00-00', 0, '', '', '', 0, ''),
(31, 55, 0, '', '0000-00-00', 0, '', '', '', 0, ''),
(32, 56, 0, '', '0000-00-00', 0, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `venue_id` int(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `event_type` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(15) NOT NULL,
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
  `email` varchar(80) NOT NULL,
  `website` varchar(100) NOT NULL,
  `workspace_id` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `user_id`, `name`, `event_type`, `city`, `state`, `venue_desc`, `logo_addr`, `no_of_floors`, `floor_area`, `no_of_rooms`, `no_of_desks`, `opening_time`, `closing_time`, `addr`, `neighbourhood`, `telephone`, `email`, `website`, `workspace_id`) VALUES
(1, '18', 'venue1', '1', 'mumbai', 'maharashtra', 'This is the text', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', '', 1),
(2, '18', 'venue2', '1', 'mumbai', 'maharashtra', 'This is the text', '', 0, 0, 0, 0, '00:00:00', '00:00:00', '', '', '', '', '', 2);

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
  `workspace_pricing_id` int(20) NOT NULL,
  `image_1` varchar(50) NOT NULL,
  `image_2` varchar(50) NOT NULL,
  `image_3` varchar(50) NOT NULL,
  `image_4` varchar(50) NOT NULL,
  `image_5` varchar(50) NOT NULL,
  `image_6` varchar(50) NOT NULL,
  `image_7` varchar(50) NOT NULL,
  `image_8` varchar(50) NOT NULL,
  `image_9` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`workspace_id`, `venue_id`, `user_id`, `type`, `space_name`, `capacity`, `space_desc`, `workspace_pricing_id`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`, `image_7`, `image_8`, `image_9`) VALUES
(1, 1, '18', 'test', 'Wonderful', 100, 'jkasdh akjshdkjash dkjsah kjdha skjdh asj hdajs', 1, 'images/detailsquare3', 'images/banner2.jpg', 'images/getinspired1.', 'images/blog.jpg', 'images/blog2.jpg', 'images/blog-avatar.j', 'images/blog-avatar2.', 'images/detailbig1.jp', 'images/detailbig2.jp'),
(2, 2, '', 'test', 'Wonderful', 100, 'jkasdh akjshdkjash dkjsah kjdha skjdh asj hdajs', 2, 'images/banner.jpg', 'images/banner2.jpg', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `workspace_pricing`
--

CREATE TABLE IF NOT EXISTS `workspace_pricing` (
  `workspace_pricing_id` int(20) NOT NULL,
  `workspace_id` int(20) NOT NULL,
  `hourly_price` int(11) NOT NULL,
  `weekly_price` int(11) NOT NULL,
  `monthly_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workspace_pricing`
--

INSERT INTO `workspace_pricing` (`workspace_pricing_id`, `workspace_id`, `hourly_price`, `weekly_price`, `monthly_price`) VALUES
(1, 1, 10, 20, 30),
(2, 2, 10, 20, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`amenity_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `user_detail_id` (`user_detail_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_detail_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  ADD PRIMARY KEY (`workspace_pricing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `amenity_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_detail_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `workspace`
--
ALTER TABLE `workspace`
  MODIFY `workspace_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
