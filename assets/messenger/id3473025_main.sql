-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2018 at 06:03 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3473025_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` bigint(100) NOT NULL,
  `userid` bigint(100) NOT NULL,
  `friendid` bigint(100) NOT NULL,
  `status` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp` bigint(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `userid`, `friendid`, `status`, `time`, `timestamp`) VALUES
(1, 2, 1, '1', '2017-10-14 11:19:35', 1507979993),
(6, 4, 2, '1', '2017-10-28 20:01:32', 1509221329),
(7, 4, 1, '1', '2017-10-28 20:01:58', 1509220934),
(8, 4, 3, '1', '2017-10-28 20:02:04', 1509220949),
(9, 3, 1, '1', '2017-10-28 20:02:35', 1509225065),
(10, 3, 2, '1', '2017-10-28 20:02:40', 1509221324),
(13, 4, 7, '1', '2017-10-29 20:46:55', 1509310029),
(14, 4, 6, '1', '2017-10-29 20:50:11', 1509310312),
(15, 5, 2, '1', '2017-10-29 20:50:30', 1509310243),
(16, 4, 5, '1', '2017-10-29 20:53:02', 1509310393),
(17, 2, 7, '1', '2017-10-29 20:58:32', 1509310724),
(18, 2, 6, '1', '2017-10-29 21:02:01', 1509310932),
(19, 6, 3, '1', '2017-10-29 21:04:56', 1509311105),
(20, 6, 5, '1', '2017-10-29 21:17:15', 1509311847),
(21, 1, 6, '1', '2017-10-30 16:32:11', 1509381143),
(23, 1, 7, '0', '2018-03-02 17:09:39', 1520010579);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` bigint(100) NOT NULL,
  `userid` bigint(100) NOT NULL,
  `friendid` bigint(100) NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `timestamp` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `userid`, `friendid`, `content`, `timestamp`) VALUES
(1, 1, 2, 'hey', 1509210806),
(2, 1, 2, 'how are you', 1509210808),
(3, 1, 2, 'aaa', 1509210822),
(4, 1, 2, 'aaa', 1509210825),
(5, 1, 2, 'a', 1509210828),
(6, 1, 2, 'aaa<br>a', 1509210842),
(7, 1, 2, 'okay', 1509211132),
(8, 1, 2, 'aasas', 1509211133),
(9, 1, 2, 'as', 1509211133),
(10, 1, 2, 'a', 1509211133),
(11, 1, 2, 's', 1509211133),
(12, 1, 2, 'as', 1509211134),
(13, 1, 2, 'a', 1509211134),
(14, 1, 2, 'sa', 1509211134),
(15, 1, 2, 's', 1509211134),
(16, 1, 2, 'a', 1509211134),
(17, 1, 2, 'sa', 1509211134),
(18, 1, 2, 's', 1509211134),
(19, 1, 2, 'a', 1509211135),
(20, 1, 2, 's', 1509211135),
(21, 1, 2, 'sa', 1509211135),
(22, 1, 2, 's', 1509211135),
(23, 1, 2, 'a', 1509211135),
(24, 1, 2, 's', 1509211135),
(25, 1, 2, 'a', 1509211136),
(26, 1, 2, 's', 1509211136),
(27, 1, 2, 'a', 1509211136),
(28, 1, 2, 's', 1509211136),
(29, 1, 2, 'a', 1509211136),
(30, 1, 2, 'sa', 1509211136),
(31, 1, 2, 's', 1509211136),
(32, 1, 2, 'a', 1509211137),
(33, 1, 2, 's', 1509211137),
(34, 1, 2, 'a', 1509211137),
(35, 1, 2, 's', 1509211137),
(36, 1, 2, 'as', 1509211137),
(37, 1, 2, 'as', 1509211138),
(38, 1, 2, 'as', 1509211138),
(39, 1, 2, 'aa', 1509212920),
(40, 1, 2, 'sdasd', 1509212923),
(41, 1, 2, 'hi', 1509213036),
(42, 1, 2, 'hey', 1509213243),
(43, 1, 2, 'app', 1509213253),
(44, 1, 2, 'hi', 1509213760),
(45, 1, 2, 'hi', 1509213761),
(46, 2, 1, 'hi', 1509213863),
(47, 2, 1, 'how are you', 1509213869),
(48, 2, 1, 'good', 1509213930),
(49, 2, 1, 'ok', 1509214016),
(50, 2, 1, 'a', 1509214372),
(51, 2, 1, 'asa', 1509216045),
(52, 2, 1, 'asa', 1509216048),
(53, 2, 1, 'asaas', 1509216049),
(54, 2, 1, 'okay', 1509216058),
(55, 2, 1, 'aa', 1509216161),
(56, 2, 1, 'hey', 1509216171),
(57, 2, 1, 'hey', 1509216172),
(58, 2, 1, 'asa', 1509216174),
(59, 2, 1, 'asa', 1509216174),
(60, 2, 1, 'asa', 1509216175),
(61, 2, 1, 'ok', 1509216178),
(62, 2, 1, 'ooo', 1509216181),
(63, 2, 1, 'o', 1509216183),
(64, 2, 1, 'as', 1509216186),
(65, 2, 1, 'o', 1509216189),
(66, 2, 1, 'asa', 1509216193),
(67, 2, 1, 'as', 1509216208),
(68, 2, 1, 'oo', 1509216211),
(69, 2, 1, 'o', 1509216216),
(70, 2, 1, 'apple', 1509216273),
(71, 2, 1, 'hey', 1509216435),
(72, 2, 1, 'hey', 1509217005),
(73, 2, 1, 'hopw y', 1509217008),
(74, 1, 2, 'how are you', 1509217131),
(75, 1, 2, 'fine?', 1509217136),
(76, 1, 2, 'aaa', 1509217174),
(77, 1, 2, 'ok', 1509217179),
(78, 1, 2, 'aa', 1509217189),
(79, 1, 2, 'aaa', 1509217190),
(80, 1, 2, 'a', 1509217191),
(81, 1, 2, 'a', 1509217192),
(82, 1, 2, 'a', 1509217193),
(83, 1, 2, 'a', 1509217193),
(84, 1, 2, 'hi', 1509217290),
(85, 1, 2, 'asa', 1509217368),
(86, 1, 2, 'how', 1509217371),
(87, 1, 2, 'how', 1509217371),
(88, 1, 2, 'how', 1509217372),
(89, 1, 2, 'ok', 1509217376),
(90, 1, 2, 'hi', 1509217382),
(91, 1, 2, 'asas', 1509217425),
(92, 1, 2, 'a', 1509217427),
(93, 1, 2, 'hi', 1509217458),
(94, 1, 2, 'how are you', 1509217462),
(95, 1, 2, 'hi', 1509217472),
(96, 1, 2, 'how are you', 1509217475),
(97, 1, 2, 'okay', 1509217479),
(98, 1, 2, 'okay', 1509217481),
(99, 1, 2, 'okya', 1509217482),
(100, 1, 2, 'asda', 1509217486),
(101, 1, 2, 'asda', 1509217486),
(102, 1, 2, 'and wher', 1509217489),
(103, 1, 2, 'okay', 1509217522),
(104, 1, 2, 'ok', 1509217545),
(105, 1, 2, 'hi', 1509217606),
(106, 1, 2, 'how are you', 1509217609),
(107, 1, 2, 'good', 1509217612),
(108, 1, 2, 'okay', 1509217613),
(109, 1, 2, 'so where are you now', 1509217618),
(110, 1, 2, 'apple', 1509217654),
(111, 1, 2, 'okat', 1509217656),
(112, 1, 2, 'how are you', 1509217718),
(113, 1, 2, 'hey', 1509218637),
(114, 1, 2, 'hope youre fine', 1509218659),
(115, 1, 2, 'jok==', 1509219505),
(116, 1, 2, 'ok', 1509220182),
(117, 1, 2, 'aa', 1509220184),
(118, 1, 2, 'aa', 1509220522),
(119, 2, 3, 'hey', 1509221353),
(120, 2, 3, 'how are you doing', 1509221356),
(121, 2, 4, 'hey ', 1509221361),
(122, 2, 4, 'how are you doing', 1509221364),
(123, 1, 4, 'hey', 1509225935),
(124, 1, 2, 'ok', 1509226410),
(125, 1, 3, 'hey bill how are you?', 1509308213),
(126, 3, 1, 'hey arjun im good', 1509308370),
(127, 3, 1, 'hows your course going?', 1509308376),
(128, 1, 3, 'its great! thanks for asking', 1509308385),
(129, 3, 1, 'good to hear', 1509308393),
(130, 3, 1, 'this website is really nice', 1509308424),
(131, 1, 3, 'thank you! :)', 1509308439),
(132, 3, 1, 'your welcome', 1509308445),
(133, 3, 1, 'do you need any funding for this', 1509308470),
(134, 3, 1, '?', 1509308472),
(135, 1, 3, 'no its alright ', 1509308483),
(136, 1, 3, 'its self-financed ', 1509308489),
(137, 1, 3, 'thanks for the offer though, much appreciated', 1509308508),
(138, 3, 1, 'alright', 1509308513),
(139, 3, 1, 'hope everything goes well', 1509308521),
(140, 1, 3, 'thank you ', 1509308527),
(141, 1, 3, 'and you too!', 1509308529),
(142, 6, 3, 'hey', 1509311956),
(143, 1, 3, 'helo', 1509347629),
(144, 1, 2, 'helo', 1509347637),
(145, 1, 2, 'hi', 1509381243),
(146, 1, 6, 'test', 1509609818),
(147, 1, 2, 'Test', 1509612095),
(148, 1, 6, 'hi there', 1518037512),
(149, 1, 3, 'hi', 1521539967),
(150, 1, 2, 'hi', 1526280756),
(151, 1, 2, 'hi', 1526280762),
(152, 1, 4, 'hi', 1527830852),
(153, 1, 3, 'hello', 1527830886),
(154, 1, 3, 'hi', 1527830890),
(155, 1, 3, 'hi', 1527831705),
(156, 1, 3, 'hello', 1527831708),
(157, 1, 3, 'sada', 1527831733),
(158, 1, 3, 'hi', 1527831843),
(159, 1, 3, 'hi', 1527831854),
(160, 1, 3, 'hello', 1527832007),
(161, 1, 3, 'hi', 1527832037),
(162, 1, 2, 'as', 1527832952);

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `FIELD1` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD2` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD3` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD4` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD5` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD6` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD7` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD8` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD9` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD10` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD11` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD12` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD13` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `FIELD14` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`FIELD1`, `FIELD2`, `FIELD3`, `FIELD4`, `FIELD5`, `FIELD6`, `FIELD7`, `FIELD8`, `FIELD9`, `FIELD10`, `FIELD11`, `FIELD12`, `FIELD13`, `FIELD14`) VALUES
('b silva', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('delph', '5', '0', '9', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('ederson', '0', '3', '4', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('fernandinho', '0', '0', '12', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('gundogan', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('jesus', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('KDB', '0', '12', '6', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('otamendi', '4', '4', '19', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('sane', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('silva', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('sterling', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('stones', '5', '19', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('walker', '2', '0', '12', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `notification_checked_on`
--

CREATE TABLE `notification_checked_on` (
  `id` bigint(100) NOT NULL,
  `userid` bigint(100) NOT NULL,
  `type` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `timestamp` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `notification_checked_on`
--

INSERT INTO `notification_checked_on` (`id`, `userid`, `type`, `timestamp`) VALUES
(1, 1, 'f', '1507979850'),
(2, 1, 'm', '1507979850'),
(3, 1, 'a', '1507979850'),
(4, 1, 'f', '1507979893'),
(5, 1, 'a', '1507979896'),
(6, 2, 'f', '1507979962'),
(7, 2, 'm', '1507979962'),
(8, 2, 'a', '1507979962'),
(9, 2, 'a', '1507979980'),
(10, 2, 'f', '1507979981'),
(11, 1, 'f', '1507979987'),
(12, 2, 'a', '1507980008'),
(13, 1, 'a', '1508999623'),
(14, 1, 'a', '1509120320'),
(15, 1, 'a', '1509120321'),
(16, 1, 'f', '1509122466'),
(17, 1, 'a', '1509122468'),
(18, 1, 'f', '1509123062'),
(19, 1, 'a', '1509123067'),
(20, 1, 'f', '1509203290'),
(21, 1, 'a', '1509203293'),
(22, 1, 'f', '1509206729'),
(23, 1, 'a', '1509206730'),
(24, 1, 'f', '1509209194'),
(25, 1, 'a', '1509210949'),
(26, 1, 'f', '1509210952'),
(27, 1, 'f', '1509212166'),
(28, 1, 'a', '1509212169'),
(29, 1, 'f', '1509212198'),
(30, 2, 'f', '1509216612'),
(31, 2, 'a', '1509216614'),
(32, 2, 'a', '1509216617'),
(33, 1, 'f', '1509217750'),
(34, 1, 'a', '1509217751'),
(35, 1, 'f', '1509217963'),
(36, 1, 'a', '1509217966'),
(37, 1, 'f', '1509219597'),
(38, 1, 'a', '1509219600'),
(39, 3, 'f', '1509220791'),
(40, 3, 'm', '1509220791'),
(41, 3, 'a', '1509220791'),
(42, 3, 'f', '1509220829'),
(43, 3, 'a', '1509220832'),
(44, 4, 'f', '1509220862'),
(45, 4, 'm', '1509220862'),
(46, 4, 'a', '1509220862'),
(47, 1, 'f', '1509220931'),
(48, 3, 'f', '1509220946'),
(49, 4, 'a', '1509220995'),
(50, 4, 'a', '1509220997'),
(51, 2, 'f', '1509221163'),
(52, 2, 'f', '1509221320'),
(53, 2, 'f', '1509221327'),
(54, 1, 'f', '1509223225'),
(55, 1, 'f', '1509223233'),
(56, 5, 'f', '1509223595'),
(57, 5, 'm', '1509223595'),
(58, 5, 'a', '1509223595'),
(59, 1, 'a', '1509225057'),
(60, 1, 'f', '1509225060'),
(61, 1, 'a', '1509225068'),
(62, 1, 'a', '1509225597'),
(63, 1, 'a', '1509225600'),
(64, 1, 'a', '1509225603'),
(65, 1, 'a', '1509225607'),
(66, 1, 'a', '1509225695'),
(67, 1, 'a', '1509225696'),
(68, 1, 'f', '1509225699'),
(69, 1, 'a', '1509225704'),
(70, 1, 'f', '1509225706'),
(71, 1, 'f', '1509225764'),
(72, 1, 'a', '1509225767'),
(73, 1, 'f', '1509225770'),
(74, 1, 'a', '1509225773'),
(75, 1, 'f', '1509225777'),
(76, 1, 'f', '1509306304'),
(77, 3, 'f', '1509307150'),
(78, 3, 'a', '1509307570'),
(79, 3, 'f', '1509307574'),
(80, 6, 'f', '1509309094'),
(81, 6, 'm', '1509309094'),
(82, 6, 'a', '1509309094'),
(83, 7, 'f', '1509309201'),
(84, 7, 'm', '1509309201'),
(85, 7, 'a', '1509309201'),
(86, 4, 'a', '1509309799'),
(87, 4, 'a', '1509309863'),
(88, 4, 'a', '1509309864'),
(89, 4, 'a', '1509309867'),
(90, 4, 'f', '1509309870'),
(91, 4, 'f', '1509309876'),
(92, 4, 'a', '1509309879'),
(93, 4, 'a', '1509309892'),
(94, 4, 'a', '1509309897'),
(95, 4, 'a', '1509309904'),
(96, 4, 'a', '1509309993'),
(97, 7, 'f', '1509310025'),
(98, 7, 'a', '1509310033'),
(99, 4, 'a', '1509310179'),
(100, 4, 'a', '1509310181'),
(101, 4, 'a', '1509310183'),
(102, 4, 'a', '1509310194'),
(103, 4, 'a', '1509310196'),
(104, 4, 'a', '1509310206'),
(105, 5, 'a', '1509310223'),
(106, 2, 'a', '1509310238'),
(107, 2, 'f', '1509310239'),
(108, 2, 'a', '1509310245'),
(109, 5, 'a', '1509310253'),
(110, 5, 'a', '1509310255'),
(111, 5, 'a', '1509310259'),
(112, 5, 'a', '1509310260'),
(113, 5, 'a', '1509310260'),
(114, 5, 'a', '1509310261'),
(115, 5, 'a', '1509310261'),
(116, 5, 'a', '1509310262'),
(117, 5, 'f', '1509310280'),
(118, 5, 'a', '1509310280'),
(119, 5, 'a', '1509310286'),
(120, 6, 'f', '1509310308'),
(121, 4, 'a', '1509310326'),
(122, 5, 'f', '1509310389'),
(123, 4, 'a', '1509310432'),
(124, 4, 'a', '1509310441'),
(125, 7, 'f', '1509310722'),
(126, 2, 'a', '1509310741'),
(127, 2, 'a', '1509310743'),
(128, 6, 'f', '1509310927'),
(129, 2, 'a', '1509310942'),
(130, 2, 'a', '1509310954'),
(131, 2, 'a', '1509310956'),
(132, 2, 'a', '1509310962'),
(133, 3, 'f', '1509311102'),
(134, 6, 'a', '1509311250'),
(135, 6, 'a', '1509311253'),
(136, 6, 'a', '1509311471'),
(137, 6, 'a', '1509311477'),
(138, 6, 'a', '1509311512'),
(139, 6, 'a', '1509311547'),
(140, 6, 'a', '1509311597'),
(141, 6, 'a', '1509311600'),
(142, 6, 'a', '1509311684'),
(143, 6, 'a', '1509311687'),
(144, 6, 'f', '1509311701'),
(145, 6, 'a', '1509311816'),
(146, 5, 'f', '1509311843'),
(147, 6, 'a', '1509311853'),
(148, 6, 'f', '1509311869'),
(149, 1, 'f', '1509347667'),
(150, 1, 'a', '1509347669'),
(151, 6, 'f', '1509381139'),
(152, 1, 'a', '1509381148'),
(153, 1, 'a', '1509381157'),
(154, 1, 'a', '1509381251'),
(155, 1, 'a', '1509381532'),
(156, 1, 'a', '1509381778'),
(157, 1, 'a', '1509451436'),
(158, 1, 'a', '1509451499'),
(159, 1, 'f', '1509612197'),
(160, 1, 'f', '1509612210'),
(161, 1, 'f', '1509653824'),
(162, 1, 'a', '1509653825'),
(163, 1, 'a', '1518037477'),
(164, 1, 'f', '1518037481'),
(165, 1, 'f', '1518037609'),
(166, 1, 'f', '1518037614'),
(167, 1, 'a', '1518037621'),
(168, 8, 'f', '1519495399'),
(169, 8, 'm', '1519495399'),
(170, 8, 'a', '1519495399'),
(171, 1, 'f', '1519495808'),
(172, 1, 'a', '1519495808'),
(173, 1, 'f', '1521539939'),
(174, 1, 'a', '1521539942'),
(175, 1, 'f', '1521800477'),
(176, 1, 'a', '1521800477'),
(177, 1, 'f', '1521810287'),
(178, 1, 'a', '1521810290'),
(179, 1, 'a', '1521826614'),
(180, 1, 'f', '1521826617'),
(181, 1, 'a', '1521826670'),
(182, 1, 'a', '1524986360'),
(183, 1, 'a', '1525277150'),
(184, 1, 'a', '1525936870'),
(185, 1, 'f', '1526064209'),
(186, 1, 'a', '1526064211'),
(187, 1, 'a', '1526280621');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `pageid` int(200) NOT NULL,
  `userid` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `logged` varchar(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` bigint(30) NOT NULL,
  `userid` bigint(10) NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `hashtags` text COLLATE latin1_general_ci NOT NULL,
  `usertags` text COLLATE latin1_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `anonymous` varchar(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `userid`, `content`, `hashtags`, `usertags`, `time`, `timestamp`, `anonymous`) VALUES
(1, 1, 'hello', '', '', '2017-10-14 11:17:48', '1507979868', ''),
(2, 1, '../uploads/213569033_1175264729161876_2804646331694300520_o.jpg', '', '', '2017-10-14 11:18:58', '1507979938', ''),
(3, 1, 'hi', '', '', '2017-10-28 15:07:55', '1509203275', ''),
(4, 1, '../uploads/4Capture.PNG', '', '', '2017-10-28 16:47:55', '1509209275', ''),
(5, 2, 'hello world\n', '', '', '2017-10-28 18:07:35', '1509214055', ''),
(6, 1, 'hi', '', '', '2017-10-28 19:58:54', '1509220734', ''),
(7, 5, 'hi\n', '', '', '2017-10-28 21:03:11', '1509224591', ''),
(8, 1, '../uploads/820121561_1536598979695114_865010858201447499_o (1).jpg', '', '', '2017-10-29 19:39:14', '1509305954', ''),
(9, 2, 'This app is awesome. Thanks!', '', '', '2017-10-29 19:53:20', '1509306800', ''),
(10, 1, 'hello (:\n', '', '', '2017-10-30 16:44:11', '1509381851', ''),
(11, 2, '../uploads/1120121561_1536598979695114_865010858201447499_o.jpg', '', '', '2017-11-02 08:05:17', '1509609917', ''),
(12, 1, 'hey', '', '', '2018-02-24 18:05:37', '1519495537', ''),
(13, 1, '../uploads/13images (37).jpeg', '', '', '2018-03-02 16:17:46', '1520007466', ''),
(14, 1, 'hi', '', '', '2018-03-23 17:37:42', '1521826662', ''),
(15, 1, 'hey ', '', '', '2018-05-14 06:50:15', '1526280615', ''),
(16, 1, '../uploads/16history.png', '', '', '2018-05-14 06:58:12', '1526281092', '');

-- --------------------------------------------------------

--
-- Table structure for table `primaryinfo`
--

CREATE TABLE `primaryinfo` (
  `userid` bigint(10) NOT NULL,
  `name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `age` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `phonenumber` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(65000) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `primaryinfo`
--

INSERT INTO `primaryinfo` (`userid`, `name`, `email`, `gender`, `age`, `phonenumber`, `address`) VALUES
(1, 'arjun', 'arjun2olachery@gmail.com', 'M', '', '', ''),
(2, 'mark', 'mark@gmail.com', 'M', '', '', ''),
(3, 'bill', 'tom@a.com', 'M', '', '', ''),
(4, 'sergey', 'vineesh@a.com', 'M', '', '', ''),
(5, 'larry', 'suhail@g.vom', 'M', '', '', ''),
(6, 'jeff', 'jeff@amazon.com', '', '', '', ''),
(7, 'elon', 'elon@gmail.com', '', '', '', ''),
(8, 'james', 'james@gmail.com', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

CREATE TABLE `profilepic` (
  `id` bigint(10) NOT NULL,
  `userid` bigint(10) NOT NULL,
  `link` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp` bigint(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`id`, `userid`, `link`, `time`, `timestamp`) VALUES
(1, 1, 'download.png', '2017-10-14 11:17:30', 1507979850),
(2, 1, '../uploads/213569033_1175264729161876_2804646331694300520_o.jpg', '2017-10-14 11:18:03', 1507979883),
(3, 2, 'download.png', '2017-10-14 11:19:22', 1507979962),
(4, 1, '../uploads/4giphy.gif', '2017-10-28 16:46:54', 1509209214),
(5, 1, '../uploads/5Capture2.PNG', '2017-10-28 16:48:21', 1509209301),
(6, 3, 'download.png', '2017-10-28 19:59:51', 1509220791),
(7, 4, 'download.png', '2017-10-28 20:01:02', 1509220862),
(8, 5, 'download.png', '2017-10-28 20:46:35', 1509223595),
(9, 1, '../uploads/914606519_1252349278120087_8406655802349638061_n.jpg', '2017-10-29 19:41:04', 1509306064),
(10, 2, '../uploads/10mark-zuckerberg.jpg', '2017-10-29 19:56:06', 1509306966),
(11, 3, '../uploads/10sergey-brin-4.jpg', '2017-10-29 19:58:59', 1509307139),
(12, 3, '../uploads/1018342229_103552640222041_9062695584582928451_n.jpg', '2017-10-29 20:02:58', 1509307378),
(13, 3, '../uploads/1020280559_10154756882766961_3434466954525858896_o.jpg', '2017-10-29 20:05:08', 1509307508),
(14, 1, '../uploads/1013502935_1175274395827576_1862613772696803217_o.jpg', '2017-10-29 20:24:14', 1509308654),
(15, 1, '../uploads/1014606519_1252349278120087_8406655802349638061_n (1).jpg', '2017-10-29 20:25:44', 1509308744),
(16, 4, '../uploads/1018342229_103552640222041_9062695584582928451_n.jpg', '2017-10-29 20:27:15', 1509308835),
(17, 5, '../uploads/10page-larry_topic.jpg', '2017-10-29 20:30:37', 1509309037),
(18, 6, 'download.png', '2017-10-29 20:31:34', 1509309094),
(19, 6, '../uploads/10UF3cgUk4.jpg', '2017-10-29 20:32:45', 1509309165),
(20, 7, 'download.png', '2017-10-29 20:33:21', 1509309201),
(21, 7, '../uploads/10zDo-gAo0_400x400.jpg', '2017-10-29 20:33:48', 1509309228),
(22, 4, '../uploads/10Sergey Brin.jpg', '2017-10-29 20:37:10', 1509309430),
(23, 4, '../uploads/10Sergey Brin.jpg', '2017-10-29 20:39:15', 1509309555),
(24, 4, '../uploads/10Sergey Brin.jpg', '2017-10-29 20:40:36', 1509309636),
(25, 4, '../uploads/10416x416.jpg', '2017-10-29 20:42:55', 1509309775),
(26, 8, 'download.png', '2018-02-24 18:03:19', 1519495399),
(27, 1, '../uploads/17user128.png', '2018-06-01 05:29:07', 1527830947);

-- --------------------------------------------------------

--
-- Table structure for table `usera`
--

CREATE TABLE `usera` (
  `userid` bigint(10) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `usera`
--

INSERT INTO `usera` (`userid`, `username`, `password`) VALUES
(1, 'arjun', 'password'),
(2, 'mark', 'password'),
(3, 'bill', 'password'),
(4, 'sergey', 'password'),
(5, 'larry', 'password'),
(6, 'jeff', 'password'),
(7, 'elon', 'password'),
(8, 'james', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `vitdetails`
--

CREATE TABLE `vitdetails` (
  `userid` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `regno` text COLLATE latin1_general_ci NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL,
  `block` text COLLATE latin1_general_ci NOT NULL,
  `roomnumber` text COLLATE latin1_general_ci NOT NULL,
  `clubs` text COLLATE latin1_general_ci NOT NULL,
  `cgpa` text COLLATE latin1_general_ci NOT NULL,
  `branch` text COLLATE latin1_general_ci NOT NULL,
  `classes` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `vitdetails`
--

INSERT INTO `vitdetails` (`userid`, `regno`, `email`, `block`, `roomnumber`, `clubs`, `cgpa`, `branch`, `classes`) VALUES
('1', '15BCe0970', 'arjun.olachery2015@vit.ac.in', '', '', '', '', '', ''),
('2', '', '', '', '', '', '', '', ''),
('3', '', '', '', '', '', '', '', ''),
('4', '', '', '', '', '', '', '', ''),
('5', '', '', '', '', '', '', '', ''),
('6', '', '', '', '', '', '', '', ''),
('7', '', '', '', '', '', '', '', ''),
('8', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`FIELD1`);

--
-- Indexes for table `notification_checked_on`
--
ALTER TABLE `notification_checked_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`pageid`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `primaryinfo`
--
ALTER TABLE `primaryinfo`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `profilepic`
--
ALTER TABLE `profilepic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usera`
--
ALTER TABLE `usera`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `vitdetails`
--
ALTER TABLE `vitdetails`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `notification_checked_on`
--
ALTER TABLE `notification_checked_on`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `pageid` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `usera`
--
ALTER TABLE `usera`
  MODIFY `userid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
