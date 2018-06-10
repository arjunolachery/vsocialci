-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2018 at 07:27 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 1, 'f', '1528463656'),
(2, 1, '6m', '1528463647'),
(3, 6, '1m', '1528435681'),
(4, 1, '9m', '1528463651'),
(5, 9, '1m', '1528437070'),
(6, 1, 'm', '1528463643'),
(7, 8, '1m', '1528455897'),
(8, 1, '8m', '1528458916');

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
(1, 5, 8, 1234567890, 0),
(2, 1, 3, 1528349722, 0),
(3, 6, 1, 1528435681, 1),
(4, 9, 1, 1528437070, 1),
(6, 9, 8, 1528446958, 0),
(8, 8, 1, 1528458971, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `time_login` int(255) NOT NULL,
  `ip_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 3, 1, 'hi there', 1528350403),
(2, 3, 1, 'how do you do', 1528350414),
(3, 1, 3, 'im good thanks', 1528350426),
(4, 1, 3, 'how do you do?', 1528350432),
(5, 1, 6, 'hey arjun ', 1528353732),
(6, 1, 6, 'hello?', 1528353782),
(7, 6, 1, 'hello', 1528353889),
(8, 1, 6, 'hi', 1528357854),
(9, 1, 6, 'asdas', 1528357860),
(10, 1, 3, 'asas', 1528357867),
(11, 1, 3, 'asdasd', 1528358349),
(12, 1, 6, 'sadasdas', 1528358369),
(13, 1, 3, 'asdadsa', 1528358373),
(14, 1, 6, 'asdad', 1528360288),
(15, 1, 6, 'sad', 1528361525),
(16, 1, 6, '', 1528361528),
(17, 1, 6, 'asd', 1528361530),
(18, 1, 6, 'test', 1528368776),
(19, 1, 3, 'test', 1528368780),
(20, 1, 3, 'asdad', 1528368957),
(21, 1, 3, 'asdfgaf', 1528368959),
(22, 1, 6, 'hello', 1528435736),
(23, 1, 6, 'as', 1528436386),
(24, 1, 9, 'dads', 1528438322),
(25, 1, 6, 'okay', 1528438338),
(26, 1, 9, 'hello', 1528439287),
(27, 1, 6, 'okay', 1528440518),
(28, 9, 1, 'ok', 1528443699),
(29, 9, 1, 'hi', 1528444148),
(30, 9, 1, 'hi Arjun!', 1528446656),
(31, 9, 1, 'asa', 1528446690),
(32, 9, 1, 'asd', 1528446805),
(33, 9, 1, 'asd', 1528446825),
(34, 9, 1, 'asdfs', 1528446931),
(35, 8, 1, 'asdsad', 1528447616),
(36, 8, 1, 'asdad', 1528447725),
(37, 8, 1, 'dasasd', 1528447791),
(38, 8, 1, 'asdad', 1528448204),
(39, 8, 1, 'fada', 1528448271),
(40, 8, 1, 'asdda', 1528448333),
(41, 8, 1, 'sdfsf', 1528448635),
(42, 8, 1, 'dfs', 1528448646),
(43, 8, 1, 'sas', 1528449721),
(44, 8, 1, 'dsasa', 1528450077),
(45, 8, 1, 'dad', 1528450194),
(46, 8, 1, 'dfesa', 1528450492),
(47, 8, 1, 'sdfs', 1528450610),
(48, 8, 1, 'sdas', 1528450765),
(49, 1, 8, 'asd', 1528451741),
(50, 1, 8, 'dfsf', 1528451744),
(51, 8, 1, 'sdff', 1528453629),
(52, 1, 8, 'assd', 1528454671),
(53, 1, 8, 'asds', 1528454948),
(54, 8, 1, 'hi arjun', 1528455901),
(55, 1, 8, '', 1528456060),
(56, 1, 8, 'sda', 1528456422),
(57, 1, 8, 'sad', 1528456426),
(58, 1, 8, 'sad', 1528456570),
(59, 1, 8, 'asda', 1528456573),
(60, 1, 8, '', 1528456577),
(61, 1, 8, 'asdas', 1528456749),
(62, 1, 8, 'sdsa', 1528456751),
(63, 1, 8, 'asdda', 1528456753),
(64, 1, 8, 'asda', 1528456757),
(65, 1, 8, 'dsfs', 1528456758),
(66, 1, 8, 'sdf', 1528456758),
(67, 1, 8, 'sdfd', 1528456760),
(68, 1, 8, 'fdf', 1528456764),
(69, 1, 9, 'hi', 1528456807),
(70, 1, 9, 'hello', 1528456809),
(71, 1, 9, 'sad', 1528456810),
(72, 1, 9, 'as', 1528456810),
(73, 1, 9, 'a', 1528456810),
(74, 1, 9, 'das', 1528456811),
(75, 1, 9, 'd', 1528456811),
(76, 1, 9, 'sd', 1528456811),
(77, 1, 9, 'sd', 1528456811),
(78, 1, 9, 'sds', 1528456812),
(79, 1, 9, 'a', 1528456812),
(80, 1, 9, 'dasd', 1528456812),
(81, 1, 9, 'sa', 1528456812),
(82, 1, 9, 'd', 1528456812),
(83, 1, 9, 'sd', 1528456813),
(84, 1, 9, 'd', 1528456813),
(85, 1, 9, 'sads', 1528456814),
(86, 1, 9, 'da', 1528456814),
(87, 1, 9, 'd', 1528456814),
(88, 1, 9, 'a', 1528456814),
(89, 1, 9, 'asd', 1528456816),
(90, 1, 9, 'sd', 1528456816),
(91, 1, 9, 'a', 1528456816),
(92, 1, 9, 'd', 1528456816),
(93, 1, 9, 'ad', 1528456817),
(94, 1, 8, 'asdsd', 1528456869),
(95, 1, 9, 'asdasd', 1528456873),
(96, 1, 6, 'asdasd', 1528456876),
(97, 1, 8, 'asda', 1528456880),
(98, 1, 8, 'asda', 1528456883),
(99, 1, 8, 'asdad', 1528456896),
(100, 1, 9, 'fdfs', 1528456900),
(101, 1, 6, 'asd', 1528456913),
(102, 1, 9, 'sadadsa', 1528459295);

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
(1, 1, '152843483219user128.png', 'me!', '1528434832', 'timeline'),
(2, 1, '15284550891138user.png', 'my timeline pic', '1528455089', 'timeline');

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
(75, 2, 'asdas', '', 1527077477),
(76, 2, 'hello', '', 1527077802),
(77, 2, 'hi', '', 1527077976),
(92, 1, 'dsdf', '', 1527502158),
(93, 1, 'asdasd', '', 1527502161),
(94, 1, 'asdad', '', 1527502164),
(95, 1, 'asasd', '', 1527505519),
(96, 1, 'aasd', '', 1527505576),
(97, 1, 'asda', '', 1527505996),
(98, 1, 'apple', '', 1527506005),
(103, 1, 'hi there', '', 1527670691),
(105, 1, 'asdasd', '', 1528366221),
(106, 1, 'xzczxc', '', 1528366237),
(107, 1, 'asdasds', '', 1528366241),
(108, 1, 'dfs', '', 1528366243),
(109, 1, 'dsdsd', '', 1528366249),
(110, 1, 'fffff', '', 1528366253),
(111, 1, 'fff', '', 1528366256),
(113, 1, 'aaa', '', 1528366268),
(115, 1, '', '1', 1528434836),
(116, 1, '', '108p', 1528435199),
(117, 1, '', '109p', 1528455072),
(118, 1, '', '2', 1528455096),
(120, 8, 'asadsd', '', 1528460542),
(121, 1, 'asd', '', 1528463623);

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
(1, 1, '1', '0'),
(2, 3, '0', '0'),
(3, 4, '0', '0'),
(4, 5, '0', '0'),
(5, 6, '0', '0'),
(6, 7, '0', '1'),
(7, 8, '0', '0'),
(8, 9, '0', '1');

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
(1, 1, 'M', '1997-09-14'),
(2, 3, 'M', 'yyyy-mm-dd'),
(3, 6, '-', 'yyyy-mm-dd'),
(4, 7, '-', 'yyyy-mm-dd'),
(5, 8, '-', 'yyyy-mm-dd'),
(6, 9, '-', 'yyyy-mm-dd');

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
  `id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `profile_pic_file_name` text NOT NULL,
  `caption` text NOT NULL,
  `time_profile_pic` int(255) NOT NULL,
  `set_profile_pic` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`id`, `u_id`, `profile_pic_file_name`, `caption`, `time_profile_pic`, `set_profile_pic`) VALUES
(1, 1, 'user128.png', '', 123456789, 0),
(2, 1, 'sdad.png', '', 123456789, 0),
(3, 1, 'asdaas.png', '', 123456789, 0),
(4, 1, 'switch-on2.png15278412591374', '', 1527841259, 0),
(5, 1, 'switch-off.png15278412731806', '', 1527841273, 0),
(6, 1, 'user128.png15278412861768', '', 1527841286, 0),
(7, 1, 'switch-on2.png15278417971446', '', 1527841797, 0),
(8, 1, 'switch-off2.png15278418021383', '', 1527841802, 0),
(9, 1, 'switch-on2.png15278419681824', '', 1527841968, 0),
(10, 1, 'switch-off2.png15278419921410', '', 1527841992, 0),
(11, 1, 'up-arrow.png15278420251266', '', 1527842026, 0),
(12, 1, 'settings.png15278420351138', '', 1527842035, 0),
(13, 1, 'switch-on.png15278420411586', '', 1527842041, 0),
(14, 1, 'switch-on2.png15278420481752', '', 1527842049, 0),
(15, 1, 'search4.png15278420621568', '', 1527842062, 0),
(16, 1, 'switch-off2.png15278420701191', '', 1527842070, 0),
(17, 1, 'Untitled-5.ai15278421481669', '', 1527842148, 0),
(18, 1, 'switch-off2.png15278421571854', '', 1527842157, 0),
(19, 1, 'switch-on.png15278421661175', '', 1527842166, 0),
(20, 1, 'switch-on2.png15278422301440', '', 1527842230, 0),
(21, 1, 'success.png15278422441496', '', 1527842244, 0),
(22, 1, 'search4.png15278422561366', '', 1527842256, 0),
(23, 1, 'switch-off2.png15278430611966', '', 1527843061, 0),
(24, 1, 'switch-on2.png1527843151130', '', 1527843151, 0),
(25, 1, 'switch-on2.png15278431811124', '', 1527843181, 0),
(26, 1, 'up-arrow.png15278432301463', '', 1527843230, 0),
(27, 1, 'switch-off2.png15278432631210', '', 1527843263, 0),
(28, 1, 'switch-on2.png15278432851522', '', 1527843285, 0),
(29, 1, 'search2.png15278433231715', '', 1527843323, 0),
(30, 1, 'switch-off.png1527843364136', '', 1527843364, 0),
(31, 1, 'up-arrow.png15278433761875', '', 1527843376, 0),
(32, 1, 'switch-off2.png1527843419131', '', 1527843419, 0),
(33, 1, 'up-arrow.png15278444951838', '', 1527844495, 0),
(34, 1, 'up-arrow.png15278445451832', '', 1527844545, 0),
(35, 1, '15278446251770success.png', '', 1527844625, 0),
(36, 1, '15278446621539photo(1).png', '', 1527844662, 0),
(37, 1, '15278446731267switch-off.png', '', 1527844673, 0),
(38, 1, '15278447701641success.png', '', 1527844770, 0),
(39, 1, '15278447981140switch-off.png', '', 1527844799, 0),
(40, 1, '15278449261502switch-on2.png', '', 1527844926, 0),
(41, 1, '15278449581690speech-bubble2.png', '', 1527844958, 0),
(42, 1, '15278450201479settings.png', '', 1527845020, 0),
(43, 1, '15278451471809switch-off2.png', '', 1527845147, 0),
(44, 1, '15278451651440up-arrow.png', '', 1527845165, 0),
(45, 1, '15278452601174speech-bubble2.png', '', 1527845261, 0),
(46, 1, '15278453051892notificationnn.png', '', 1527845305, 0),
(47, 1, '15278453301659speech-bubble2.png', '', 1527845330, 0),
(48, 1, '15278453521508switch-on.png', '', 1527845352, 0),
(49, 1, '15278454291510up-arrow.png', '', 1527845429, 0),
(50, 1, '15278454401973switch-off.png', '', 1527845440, 0),
(51, 1, '15278454941869success.png', '', 1527845494, 0),
(52, 1, '15278456451397speech-bubble2.png', '', 1527845645, 0),
(53, 1, '15278456591958switch-on.png', '', 1527845659, 0),
(54, 1, '15278456921655success.png', '', 1527845692, 0),
(55, 1, '15278457131744switch-off2.png', '', 1527845713, 0),
(56, 1, '15278457261570notificationnn.png', '', 1527845726, 0),
(57, 1, '15278457521663switch-on2.png', '', 1527845752, 0),
(58, 1, '15278458111675searchicon.png', '', 1527845811, 0),
(59, 1, '15278458241748switch-off.png', '', 1527845824, 0),
(60, 1, '15278458631839switch-off2.png', '', 1527845863, 0),
(61, 1, '15278460811665switch-on2.png', '', 1527846081, 0),
(62, 1, '1527846095115success.png', '', 1527846096, 0),
(63, 1, '15278466221103switch-off.png', '', 1527846622, 0),
(64, 1, '15278469131189success.png', '', 1527846913, 0),
(65, 1, '15278469261800switch-off.png', '', 1527846926, 0),
(66, 1, '15278470721131settings.png', '', 1527847072, 0),
(67, 1, '15278470931439photo(1).png', '', 1527847093, 0),
(68, 1, '1527847103140switch-off2.png', '', 1527847103, 0),
(69, 1, '1527847132135user128.png', '', 1527847133, 0),
(70, 1, '15278471431671upload_arrow.png', '', 1527847143, 0),
(71, 1, '15278471541867speech-bubble.png', '', 1527847154, 0),
(72, 1, '15278471591725up-arrow.png', '', 1527847159, 0),
(73, 1, '15278471661479user128.png', '', 1527847166, 0),
(74, 1, '15278472451268up-arrow.png', '', 1527847245, 0),
(75, 1, '15278472581928switch-off.png', '', 1527847258, 0),
(76, 1, '15278473781909up-arrow.png', '', 1527847378, 0),
(77, 1, '1527847388161switch-on2.png', '', 1527847388, 0),
(78, 1, '15278473951201user128.png', '', 1527847395, 0),
(79, 1, '15278478791406switch-off2.png', '', 1527847879, 0),
(80, 1, '15278479451747switch-on.png', '', 1527847945, 0),
(81, 1, '15278479741207speech-bubble.png', '', 1527847974, 0),
(82, 1, '15278491761744up-arrow.png', '', 1527849176, 0),
(83, 1, '15278491941850switch-off.png', '', 1527849194, 0),
(84, 1, '15278492941538switch-on.png', '', 1527849295, 0),
(85, 1, '1527849541135switch-on2.png', '', 1527849541, 0),
(86, 1, '15281777251876up-arrow.png', '', 1528177725, 0),
(87, 1, '15281777331696up-arrow-2.png', '', 1528177733, 0),
(88, 3, 'user128.png', '', 1234567890, 1),
(89, 1, '15283497371748user128.png', '', 1528349737, 0),
(90, 1, '15283497661121user128.png', '', 1528349766, 0),
(91, 1, '15283502851781user128.png', '', 1528350285, 0),
(92, 6, 'user128.png', '', 1528353509, 0),
(93, 6, '15283536686429up-arrow.png', '', 1528353668, 1),
(94, 7, 'user128.png', '', 1528356997, 1),
(95, 8, 'user128.png', '', 1528357075, 1),
(96, 9, 'user128.png', '', 1528357549, 1),
(97, 1, '15283598911289upload_arrow.png', '', 1528359891, 0),
(98, 1, '15283599071533success.png', '', 1528359907, 0),
(99, 1, '15283599251405switch-on2.png', '', 1528359925, 0),
(100, 1, '1528359950112user128.png', '', 1528359950, 0),
(101, 1, '15283601321882user128.png', '', 1528360132, 0),
(102, 1, '15283602631864user128.png', '', 1528360263, 0),
(103, 1, '15283602731801photo(1).png', '', 1528360273, 0),
(104, 1, '15283684281719switch-on.png', '', 1528368428, 0),
(105, 1, '15284348581146user128.png', '', 1528434858, 0),
(106, 1, '1528434956120user128.png', '', 1528434956, 0),
(107, 1, '15284351231652user128.png', '', 1528435123, 0),
(108, 1, '15284351881764user128.png', 'my new profile pic', 1528435188, 0),
(109, 1, '15284550661321switch-on.png', 'my new pic', 1528455066, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `time` int(20) NOT NULL,
  `activation` tinyint(1) NOT NULL,
  `activationKey` varchar(255) NOT NULL,
  `activationTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `time`, `activation`, `activationKey`, `activationTime`) VALUES
(1, 'arjun2olachery@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Arjun', 1526881048, 1, 'asdas1212asdUDFG', ''),
(2, 'arjun2suji@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Arjun New', 1527069877, 0, '', ''),
(3, 'arjun@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'arjun new 2', 1527161029, 0, '', ''),
(4, 'arjunokay@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'New Arjun', 1528353330, 0, '', ''),
(5, 'arjun1@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'new arjun2', 1528353424, 0, '', ''),
(6, 'arjun3@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'new arjun3', 1528353509, 0, '', ''),
(7, 'arjun2olacheryaa@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'arjun5', 1528356997, 0, '', ''),
(8, 'arjun2olachery9@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'arjun9', 1528357075, 0, '', ''),
(9, 'arjun2olachery79@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'arjun9', 1528357548, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `val` int(255) NOT NULL,
  `time_vote` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `post_id`, `u_id`, `val`, `time_vote`) VALUES
(1, 120, 1, 22, 1528465957),
(2, 120, 2, -1, 0),
(3, 121, 1, 32, 1528465955);

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
-- Indexes for table `logins`
--
ALTER TABLE `logins`
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
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checked_on`
--
ALTER TABLE `checked_on`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `primary_information`
--
ALTER TABLE `primary_information`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
