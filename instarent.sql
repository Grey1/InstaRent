-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2015 at 07:34 PM
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
CREATE DATABASE IF NOT EXISTS `instarent` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `instarent`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_detail_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `Gender` char(1) NOT NULL,
  `photo_path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `venue_id` varchar(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `venue_desc` longtext NOT NULL,
  `logo_addr` longtext NOT NULL,
  `no_of_floors` int(11) NOT NULL,
  `floor_area` int(11) NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `no_of_desks` int(11) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

CREATE TABLE IF NOT EXISTS `workspace` (
  `workspace_id` varchar(20) NOT NULL,
  `venue_id` varchar(20) NOT NULL,
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
  `workspace_id` varchar(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `venue_id` varchar(20) NOT NULL,
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
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_detail_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
