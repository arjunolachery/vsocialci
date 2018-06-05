-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2018 at 06:31 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsocial`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `friend_id` int(255) NOT NULL,
  `time_friend` int(255) NOT NULL,
  `status_friend` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `u_id`, `friend_id`, `time_friend`, `status_friend`) VALUES
(1, 5, 8, 1234567890, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `content` text NOT NULL,
  `timestamp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `u_id`, `content`, `timestamp`) VALUES
(86, 5, 'hi there', 1528116321),
(88, 5, 'ibioiho', 1528118498),
(89, 5, 'hi', 1528121022);

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `auto_login` varchar(1) NOT NULL,
  `welcome_screen` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `u_id`, `auto_login`, `welcome_screen`) VALUES
(1, 5, '1', '0'),
(2, 6, '1', '1'),
(3, 7, '1', '1'),
(4, 8, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `primary_information`
--

CREATE TABLE `primary_information` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `date_birth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_information`
--

INSERT INTO `primary_information` (`id`, `u_id`, `gender`, `date_birth`) VALUES
(1, 5, 'M', '1997-09-14'),
(2, 8, 'M', 'yyyy-mm-dd');

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `profile_pic_file_name` varchar(255) NOT NULL,
  `time_profile_pic` int(255) NOT NULL,
  `caption` text NOT NULL,
  `set_profile_pic` varchar(1) NOT NULL,
  `remove_pic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`id`, `u_id`, `profile_pic_file_name`, `time_profile_pic`, `caption`, `set_profile_pic`, `remove_pic`) VALUES
(274, 5, 'user128.png', 1234567890, 'my pic', '0', 0),
(275, 6, 'user128.png', 1234567890, 'my pic', '1', 0),
(276, 7, 'user128.png', 1234567890, 'my pic', '1', 0),
(277, 8, 'user128.png', 1234567890, 'my pic', '1', 0),
(278, 5, '15281440505431House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000003.jpg', 1528144050, '', '0', 0),
(279, 5, '1528144269520House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000005.jpg', 1528144269, '', '0', 0),
(280, 5, '1528172170553House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000003.jpg', 1528172170, '', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` int(20) NOT NULL,
  `activation` tinyint(1) NOT NULL,
  `activationKey` varchar(255) NOT NULL,
  `activationTime` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `time`, `activation`, `activationKey`, `activationTime`) VALUES
(5, 'Arjun', 'arjun2olachery@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1526611644, 1, '3dc9e81157758ca7a61ab2cf0950e968', 1526875060),
(6, 'user2', 'sasa@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1526611740, 0, '', 0),
(7, 'ohoiuhohoi', 'hoih@yaho.com', 'e80b5017098950fc58aad83c8c14978e', 1526611834, 0, '', 0),
(8, 'arjun new', 'arjun@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1526870278, 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_information`
--
ALTER TABLE `primary_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `primary_information`
--
ALTER TABLE `primary_information`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
