-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 06:05 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bhoi_vivaah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--
-- in use(#1146 - La table 'bhoi_vivaah.tbl_admin' n'existe pas)
-- Error reading data: (#1146 - La table 'bhoi_vivaah.tbl_admin' n'existe pas)

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sessions`
--

CREATE TABLE IF NOT EXISTS `tbl_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sessions`
--

INSERT INTO `tbl_sessions` (`id`, `data`, `expires`) VALUES
('0stp9dieoupt6nilu2hbb78u67', 'Config|a:3:{s:9:"userAgent";s:32:"a9baa9865bc31e88e5da81d5013fd847";s:4:"time";i:1431035909;s:9:"countdown";i:10;}', 1431035909),
('1r8qi9sopmoqupq56s00d7kjt4', 'Config|a:3:{s:9:"userAgent";s:32:"6f5a4a78eb2eda4049ebf421aa3eabcf";s:4:"time";i:1465848000;s:9:"countdown";i:10;}', 1465848000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shortlisted_profile`
--
-- in use(#1146 - La table 'bhoi_vivaah.tbl_shortlisted_profile' n'existe pas)
-- Error reading data: (#1146 - La table 'bhoi_vivaah.tbl_shortlisted_profile' n'existe pas)

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE IF NOT EXISTS `tbl_subscription` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(30) NOT NULL,
  `sub_amount` int(5) NOT NULL DEFAULT '0',
  `allow_days` int(5) NOT NULL DEFAULT '11111' COMMENT 'in days, by default free account',
  `allow_profile` int(5) NOT NULL DEFAULT '0' COMMENT 'allow profile to be contacted by user per month',
  `sub_desc` text NOT NULL,
  `is_active` bit(1) NOT NULL DEFAULT b'0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`sub_id`, `sub_name`, `sub_amount`, `allow_days`, `allow_profile`, `sub_desc`, `is_active`, `date_created`, `date_updated`) VALUES
(1, 'Free', 0, 30, 0, '', b'1', '2015-03-06 18:55:49', '0000-00-00 00:00:00'),
(2, '3 Months', 300, 90, 4, '', b'1', '2015-03-06 18:55:49', '0000-00-00 00:00:00'),
(3, '6 Months', 500, 180, 4, '', b'1', '2015-03-06 18:57:36', '0000-00-00 00:00:00'),
(4, '12 Months', 800, 365, 4, '', b'1', '2015-03-06 18:57:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--
-- in use(#1146 - La table 'bhoi_vivaah.tbl_user' n'existe pas)
-- Error reading data: (#1146 - La table 'bhoi_vivaah.tbl_user' n'existe pas)

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_user_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sub_amount` int(5) NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `cq_num` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user_payment`
--

INSERT INTO `tbl_user_payment` (`id`, `user_id`, `sub_amount`, `payment_mode`, `bank_name`, `cq_num`, `status`, `date_created`) VALUES
(1, 18, 300, 'pay-by-cheque', 'HDFC', '123456', '', '2014-12-01 23:52:22'),
(2, 18, 300, 'pay-by-online', 'HDFC', '123456', '', '2015-01-16 03:41:35'),
(3, 18, 300, 'pay-by-cheque', 'HDFC', '123456', '', '2015-02-11 20:08:04'),
(4, 18, 300, 'pay-by-cash', 'HDFC', '123456', '', '2015-04-22 11:52:22'),
(5, 18, 500, 'pay-by-cheque', 'HDFC', '123456sdfs', '', '2015-05-04 06:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_pics`
--

CREATE TABLE IF NOT EXISTS `tbl_user_pics` (
  `user_pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_pic` varchar(50) NOT NULL,
  PRIMARY KEY (`user_pic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profile_history`
--
-- in use(#1146 - La table 'bhoi_vivaah.tbl_user_profile_history' n'existe pas)
-- Error reading data: (#1146 - La table 'bhoi_vivaah.tbl_user_profile_history' n'existe pas)

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
