-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2015 at 01:19 PM
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
  `buzzer` varchar(5) NOT NULL,
  `elevator` varchar(5) NOT NULL,
  `parking` varchar(5) NOT NULL,
  `essentials` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenity_id`, `venue_id`, `workspace_id`, `wifi`, `internet`, `kitchen`, `doorman`, `buzzer`, `elevator`, `parking`, `essentials`) VALUES
(1, 1, 1, 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES'),
(2, 2, 2, 'NO', 'NO', 'NO', 'NO', 'YES', 'YES', 'NO', 'NO'),
(3, 3, 3, 'NO', 'NO', 'NO', 'NO', 'YES', 'YES', 'NO', 'NO'),
(4, 4, 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(30) NOT NULL,
  `user_id` int(20) NOT NULL,
  `host_id` int(20) NOT NULL,
  `confirmation_from_host` tinyint(1) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `payment_status` int(1) NOT NULL,
  `workspace_id` int(20) NOT NULL,
  `total_amount` double NOT NULL,
  `booking_status` int(11) NOT NULL,
  `team_size` int(11) NOT NULL,
  `rejected_by_host` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `host_id`, `confirmation_from_host`, `from_time`, `to_time`, `from_date`, `to_date`, `payment_status`, `workspace_id`, `total_amount`, `booking_status`, `team_size`, `rejected_by_host`) VALUES
(5, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-15', '2015-11-22', 0, 1, 0, 0, 0, 0),
(6, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-08', 0, 1, 0, 0, 0, 0),
(7, 1, 2, 0, '00:00:00', '00:00:00', '2014-11-04', '2014-11-05', 0, 1, 0, 0, 0, 0),
(8, 1, 2, 0, '00:00:00', '00:00:00', '2014-11-04', '2014-11-05', 0, 2, 0, 0, 0, 0),
(9, 1, 2, 0, '00:00:00', '00:00:00', '2014-11-04', '2014-11-05', 0, 2, 0, 0, 0, 0),
(10, 1, 2, 0, '00:00:00', '00:00:00', '2014-11-04', '2014-11-05', 0, 2, 0, 0, 0, 0),
(11, 0, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-12-09', 0, 3, 696.45161290323, 0, 0, 0),
(12, 0, 2, 0, '00:00:00', '00:00:00', '2015-11-05', '2015-11-06', 0, 3, 160, 0, 0, 0),
(13, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-07', 0, 3, 480, 0, 0, 0),
(14, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-07', 0, 3, 480, 0, 10, 0),
(15, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-17', '2015-11-19', 0, 3, 320, 0, 50, 0),
(16, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-10', '2015-11-12', 0, 3, 320, 0, 50, 0),
(17, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-18', 0, 3, 40, 0, 50, 0),
(18, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-24', 0, 3, 177.14285714286, 0, 80, 0),
(19, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-24', 0, 3, 177.14285714286, 0, 50, 0),
(20, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-25', 0, 3, 60, 0, 50, 0),
(21, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-05', '2015-11-24', 0, 3, 154.28571428571, 0, 80, 0),
(22, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-18', 0, 3, 40, 0, 20, 0),
(23, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-10', '2015-11-12', 0, 3, 320, 0, 20, 0),
(24, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-11', 0, 3, 20, 0, 1, 0),
(25, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-12', 0, 3, 42.857142857143, 0, 5, 0),
(26, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-05', '2015-11-17', 0, 3, 134.28571428571, 0, 50, 0),
(27, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-04', '2015-11-11', 0, 3, 20, 0, 1, 0),
(28, 1, 2, 0, '00:00:00', '00:00:00', '2015-11-11', '2015-11-12', 0, 3, 160, 0, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(20) NOT NULL,
  `booking_id` int(20) NOT NULL,
  `workspace_id` int(20) NOT NULL,
  `host_user_id` int(20) NOT NULL,
  `request_user_id` int(20) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `notification_from_id` int(20) NOT NULL,
  `notification_to_id` int(20) NOT NULL,
  `notification_from_name` varchar(100) NOT NULL,
  `notification_to_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(20) NOT NULL,
  `booking_id` int(20) NOT NULL,
  `workspace_id` int(20) NOT NULL,
  `venue_id` int(20) NOT NULL,
  `stars` int(1) NOT NULL,
  `body` varchar(200) NOT NULL,
  `author_id` int(20) NOT NULL,
  `host_id` int(20) NOT NULL,
  `createdOn` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `booking_id`, `workspace_id`, `venue_id`, `stars`, `body`, `author_id`, `host_id`, `createdOn`) VALUES
(1, 6, 3, 2, 2, 'test 123', 1, 2, '2015-11-20'),
(2, 6, 3, 2, 4, 'test 123', 1, 2, '2015-11-19'),
(3, 6, 2, 2, 4, 'test 123', 1, 2, '2015-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `spacetype`
--

CREATE TABLE IF NOT EXISTS `spacetype` (
  `spacetype_id` int(2) NOT NULL,
  `spacetype_value` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spacetype`
--

INSERT INTO `spacetype` (`spacetype_id`, `spacetype_value`) VALUES
(1, 'Flat'),
(2, 'Garden Office'),
(3, 'Boat'),
(4, 'Classroom'),
(5, 'Garage'),
(6, 'Office'),
(7, 'Outside Space'),
(8, 'Therapy Rooms'),
(9, 'Meeting Rooms'),
(10, 'Others');

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
  `user_detail_id` int(50) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `first_name`, `surname`, `active`, `user_detail_id`, `usertype`, `verified`) VALUES
(1, 'arjun90.nair@gmail.com', 'arjun123', 'Arjun', 'Nair', 1, 1, 'user', 0),
(2, 'arjun@nair.com', 'test12', 'Vighnesh', 'Nair', 1, 2, 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_detail_id` int(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `gender` int(1) NOT NULL,
  `birth_date` date NOT NULL,
  `contact` varchar(20) NOT NULL DEFAULT '0',
  `company_name` varchar(20) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `photo_path` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_detail_id`, `user_id`, `gender`, `birth_date`, `contact`, `company_name`, `address1`, `address2`, `pincode`, `city`, `photo_path`) VALUES
(1, 1, 2, '2015-11-03', '9768019332', 'Greytrix', '', '', 0, '', 'images/detailsquare3.jpg'),
(2, 2, 0, '0000-00-00', '', '', '', '', 0, '', 'images/detailsquare3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `venue_id` int(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `event_type` varchar(10) NOT NULL,
  `city` varchar(300) NOT NULL,
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
  `workspace_id` int(20) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `available_days` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `user_id`, `name`, `event_type`, `city`, `state`, `venue_desc`, `logo_addr`, `no_of_floors`, `floor_area`, `no_of_rooms`, `no_of_desks`, `opening_time`, `closing_time`, `addr`, `neighbourhood`, `telephone`, `email`, `website`, `workspace_id`, `verified`, `available_days`) VALUES
(1, '1', 'My first venue', '2', 'Jordan', '', 'test222', '', 12, 5, 1, 1, '00:00:00', '00:00:00', 'test123', 'test', '9', 't@t', '', 1, 0, 0),
(2, '1', 'My first venue', '2', 'Jordan', '', 'test', '', 1, 1, 1, 1, '00:00:00', '00:00:00', 'test123', 'test', '9', 't@t', '', 2, 0, 0),
(3, '2', 'My first venue', '2', 'Jordan', '', 'test', '', 1, 1, 1, 1, '00:00:00', '00:00:00', 'test123', 'test', '9', 't@t', '', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verification_photos`
--

CREATE TABLE IF NOT EXISTS `verification_photos` (
  `verification_photos_id` int(20) NOT NULL,
  `verification_id` int(20) NOT NULL,
  `verification_name` varchar(50) NOT NULL,
  `image_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

CREATE TABLE IF NOT EXISTS `workspace` (
  `workspace_id` int(20) NOT NULL,
  `venue_id` int(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `type` int(2) NOT NULL,
  `space_name` varchar(20) NOT NULL,
  `similar_workspace` int(10) NOT NULL,
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
  `image_9` varchar(50) NOT NULL,
  `image_10` varchar(50) NOT NULL,
  `listedbyuser` tinyint(1) NOT NULL,
  `verifiedbyadmin` tinyint(1) NOT NULL,
  `accomodates` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`workspace_id`, `venue_id`, `user_id`, `type`, `space_name`, `similar_workspace`, `space_desc`, `workspace_pricing_id`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`, `image_7`, `image_8`, `image_9`, `image_10`, `listedbyuser`, `verifiedbyadmin`, `accomodates`) VALUES
(1, 1, '1', 4, 'test', 3, 'test', 0, 'images/Creative-Office-Space1.jpg', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(2, 2, '2', 1, 'test', 3, 'test', 0, 'images/Creative-Office-Space1.jpg', '', '', '', '', '', '', '', '', '', 1, 0, 0),
(3, 3, '2', 1, 'test', 3, 'test', 0, 'images/Creative-Office-Space1.jpg', '', '', '', '', '', '', '', '', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `workspace_pricing`
--

CREATE TABLE IF NOT EXISTS `workspace_pricing` (
  `workspace_pricing_id` int(20) NOT NULL,
  `workspace_id` int(20) NOT NULL,
  `venue_id` int(20) NOT NULL,
  `hourly_price` int(11) NOT NULL,
  `weekly_price` int(11) NOT NULL,
  `monthly_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workspace_pricing`
--

INSERT INTO `workspace_pricing` (`workspace_pricing_id`, `workspace_id`, `venue_id`, `hourly_price`, `weekly_price`, `monthly_price`) VALUES
(1, 1, 1, 80, 8, 18),
(2, 0, 2, 20, 20, 50),
(3, 0, 3, 20, 20, 50);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `spacetype`
--
ALTER TABLE `spacetype`
  ADD PRIMARY KEY (`spacetype_id`);

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
  MODIFY `amenity_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `spacetype`
--
ALTER TABLE `spacetype`
  MODIFY `spacetype_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_detail_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `workspace`
--
ALTER TABLE `workspace`
  MODIFY `workspace_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `workspace_pricing`
--
ALTER TABLE `workspace_pricing`
  MODIFY `workspace_pricing_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
