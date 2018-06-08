-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2018 at 06:15 AM
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
-- Table structure for table `checked_on`
--

CREATE TABLE `checked_on` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `type_checked_on` varchar(255) NOT NULL,
  `time_checked_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checked_on`
--

INSERT INTO `checked_on` (`id`, `u_id`, `type_checked_on`, `time_checked_on`) VALUES
(1, 5, 'f', '1528430480'),
(6, 5, '10m', '1528430945'),
(7, 10, '5m', '1528430945');

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
(34, 6, 5, 1528398093, 0),
(88, 5, 9, 1528310923, 1),
(93, 5, 7, 1528381983, 0),
(95, 10, 5, 1528430945, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `friend_id` int(255) NOT NULL,
  `content_message` text NOT NULL,
  `time_message` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `u_id`, `friend_id`, `content_message`, `time_message`) VALUES
(1, 5, 6, 'asa', 1528321784),
(2, 5, 6, 'yeah!', 1528321800),
(3, 5, 6, 'hi arjun!', 1528321836),
(4, 5, 9, 'this is great!', 1528321844),
(5, 5, 6, 'asa', 1528321878),
(6, 5, 6, 'wow', 1528321991),
(7, 5, 6, 'cool!', 1528321993),
(8, 5, 6, 'this is nice!', 1528321998),
(9, 5, 9, '', 1528322600),
(10, 5, 9, '', 1528322601),
(11, 5, 6, 'wow', 1528342872),
(12, 5, 6, 'cool!', 1528342874),
(13, 5, 9, '', 1528343305),
(14, 5, 6, 'wow', 1528343310),
(15, 5, 6, 'cool', 1528343567),
(16, 5, 6, 'hello', 1528344159),
(17, 9, 5, 'wow okay', 1528344321),
(18, 9, 5, 'hi there!', 1528344381),
(19, 9, 5, 'this is awesome I think!', 1528344386),
(20, 5, 9, 'yeah so true!', 1528344399),
(21, 5, 9, 'asda', 1528344400),
(22, 5, 9, 'sazd', 1528344400),
(23, 5, 9, 'asd', 1528344547),
(24, 5, 9, 'a', 1528344688),
(25, 5, 9, 'hello', 1528344693),
(26, 9, 5, 'okay', 1528344715),
(27, 9, 5, 'okay', 1528344721),
(28, 5, 9, 'oh', 1528344730),
(29, 5, 9, 'hello', 1528382007),
(30, 5, 9, 'hello!', 1528382201),
(31, 5, 9, 'yeah i agree!', 1528382603),
(32, 5, 10, 'hi there', 1528429177);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `pic_file_name` varchar(255) NOT NULL,
  `image_caption` text NOT NULL,
  `time_pic` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `u_id`, `pic_file_name`, `image_caption`, `time_pic`, `album`) VALUES
(1, 5, '15283911325605House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000001.jpg', '', '1528391132', 'timeline'),
(2, 5, '15283911865344House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000006.jpg', 'hi there', '1528391186', 'timeline'),
(3, 5, '15283914605274House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000004.jpg', 'my favorite pic!', '1528391460', 'timeline'),
(4, 5, '15283947595228001-social-media-4.png', 'my fb logo', '1528394759', 'timeline'),
(5, 5, '15283967275302001-social-media-4.png', 'hello!', '1528396727', 'timeline');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `content` text NOT NULL,
  `picture_id` varchar(255) NOT NULL,
  `timestamp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `u_id`, `content`, `picture_id`, `timestamp`) VALUES
(86, 5, 'hi there', '0', 1528116321),
(88, 5, 'ibioiho', '0', 1528118498),
(89, 5, 'hi', '0', 1528121022),
(90, 9, 'hi there', '0', 1528288303),
(91, 9, 'not much', '0', 1528288578),
(92, 9, 'hi there!\n', '0', 1528288693),
(94, 5, 'hi there', '0', 1528318225),
(99, 5, '', '3', 1528391468),
(102, 5, '', '4', 1528394763),
(103, 5, 'okay\n', '', 1528395126),
(104, 5, '', '298p', 1528395846),
(105, 5, '', '299p', 1528395900),
(108, 5, 'hi there', '', 1528396638),
(109, 5, 'nice post', '', 1528396715),
(110, 5, '', '5', 1528396730),
(111, 5, 'Hi this is the best app ever!\n', '', 1528397176);

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
(4, 8, '1', '1'),
(5, 9, '0', '0'),
(6, 10, '0', '1');

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
(2, 8, 'M', 'yyyy-mm-dd'),
(3, 6, 'M', 'yyyy-mm-dd'),
(4, 7, 'M', 'yyyy-mm-dd'),
(5, 9, 'M', 'yyyy-mm-dd'),
(6, 10, '-', 'yyyy-mm-dd');

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
(280, 5, '1528172170553House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000003.jpg', 1528172170, '', '0', 0),
(281, 5, '15282105365614House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000004.jpg', 1528210536, '', '0', 0),
(282, 9, 'user128.png', 1234567890, 'my profile pic', '0', 0),
(283, 9, '15282885309966Screen Shot 2018-06-04 at 4.07.48 PM.png', 1528288530, '', '1', 0),
(284, 5, '15283181185567House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000001.jpg', 1528318118, '', '0', 0),
(285, 5, '15283826725996House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000005.jpg', 1528382672, '', '0', 0),
(286, 5, '15283829815983House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000002.jpg', 1528382981, '', '0', 0),
(287, 5, '15283830305644House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000005.jpg', 1528383030, 'asd', '0', 0),
(288, 5, '15283830515869House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000004.jpg', 1528383051, 'sda', '0', 0),
(289, 5, '15283840065795House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000004.jpg', 1528384007, 'asda', '0', 0),
(290, 5, '15283840545865House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000005.jpg', 1528384054, '', '0', 0),
(291, 5, '15283842435951House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000003.jpg', 1528384243, '', '0', 0),
(292, 5, '15283842465289House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000005.jpg', 1528384246, '', '0', 0),
(293, 5, '1528384705565House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000008.jpg', 1528384705, '', '0', 0),
(294, 5, '15283847085566House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000009.jpg', 1528384708, '', '0', 0),
(295, 5, '15283898295957House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000005.jpg', 1528389829, 'hi there', '0', 0),
(296, 5, '15283919605915House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000001.jpg', 1528391960, 'my new pic!', '0', 0),
(297, 5, '15283920165678House.of.Cards.2013.S02E04.WEBRip.x264-2HD.mike8n_000007.jpg', 1528392016, 'my new pic!', '0', 0),
(298, 5, '15283958405129news.png', 1528395840, 'my new profile pic!', '0', 0),
(299, 5, '1528395894580005-social-media.png', 1528395894, 'my new picture!', '1', 0),
(300, 10, 'user128.png', 1528421491, '', '1', 0);

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
(8, 'arjun new', 'arjun@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1526870278, 0, '', 0),
(9, 'arjun latest', 'arjunme@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1528288269, 0, '', 0),
(10, 'arjun z', 'arjunz@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1528421491, 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checked_on`
--
ALTER TABLE `checked_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
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
-- AUTO_INCREMENT for table `checked_on`
--
ALTER TABLE `checked_on`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `primary_information`
--
ALTER TABLE `primary_information`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
