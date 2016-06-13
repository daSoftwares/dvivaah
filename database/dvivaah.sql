-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2015 at 02:21 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bhoi_vivaah`
--

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
('v1tsi4ij2s9lrt195uenhhsru1', 'Config|a:4:{s:9:"userAgent";s:32:"1da9f448bd76c2fa480003e800898152";s:4:"time";i:1423935199;s:9:"countdown";i:10;s:8:"language";s:3:"eng";}', 1423935199),
('d45u0231b0tp6k1sbj8e9neg01', 'Config|a:3:{s:9:"userAgent";s:32:"1da9f448bd76c2fa480003e800898152";s:4:"time";i:1424022204;s:9:"countdown";i:10;}', 1424022204);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE IF NOT EXISTS `tbl_subscription` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_title` varchar(30) NOT NULL,
  `sub_amount` int(5) NOT NULL DEFAULT '0',
  `allow_days` int(5) NOT NULL DEFAULT '11111' COMMENT 'in days, by default free account',
  `allow_profile` int(5) NOT NULL DEFAULT '0' COMMENT 'allow profile to be contacted by user per month',
  `sub_desc` text NOT NULL,
  `is_active` bit(1) NOT NULL DEFAULT b'0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_subscription`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verification_code` text NOT NULL,
  `sub_id` int(11) NOT NULL,
  `allow_days` int(5) NOT NULL,
  `allow_profile` int(5) NOT NULL DEFAULT '0',
  `is_email_verified` bit(1) NOT NULL DEFAULT b'0',
  `is_active` bit(1) NOT NULL DEFAULT b'0',
  `is_sub_on` bit(1) NOT NULL DEFAULT b'0',
  `accept_terms` bit(1) NOT NULL DEFAULT b'0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `password`, `email`, `verification_code`, `sub_id`, `allow_days`, `allow_profile`, `is_email_verified`, `is_active`, `is_sub_on`, `accept_terms`, `date_created`, `date_updated`) VALUES
(18, 'rohit0122', '123456', 'rohit.shrivastava22@gmail.com', '', 1, 30, 0, b'1', b'1', b'1', b'1', '2015-02-15 18:25:16', '2015-02-15 12:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE IF NOT EXISTS `tbl_user_details` (
  `user_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `user_type` bit(1) NOT NULL DEFAULT b'0',
  `dob` varchar(10) NOT NULL,
  `tob` varchar(10) NOT NULL,
  `birth_place` varchar(30) NOT NULL,
  `complextion` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `full_addr` text NOT NULL,
  `native_place` varchar(30) NOT NULL,
  `res_addr` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `mob_no` varchar(10) NOT NULL,
  `cast` varchar(10) NOT NULL DEFAULT 'Dhangar',
  `sub_cast` varchar(10) NOT NULL,
  `alter_mob_no` varchar(10) NOT NULL,
  `tel_no` varchar(12) NOT NULL,
  `sun_shine` varchar(10) NOT NULL,
  `nakshatra` varchar(10) NOT NULL,
  `nadi` varchar(10) NOT NULL,
  `is_manglik` bit(1) NOT NULL,
  `is_handicap` bit(1) NOT NULL,
  `handicap_detail` text NOT NULL,
  `education` varchar(30) NOT NULL,
  `service` varchar(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `annual_income` varchar(15) NOT NULL,
  `total_bro` int(2) NOT NULL,
  `married_bro` int(2) NOT NULL,
  `total_sis` int(2) NOT NULL,
  `married_sis` int(2) NOT NULL,
  `exp_education` varchar(30) NOT NULL,
  `exp_service` varchar(30) NOT NULL,
  `exp_age_diff` int(2) NOT NULL,
  `exp_pref_city` varchar(30) NOT NULL,
  `exp_other` text NOT NULL,
  `exp_annual_income` varchar(15) NOT NULL,
  PRIMARY KEY (`user_detail_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`user_detail_id`, `user_id`, `full_name`, `user_type`, `dob`, `tob`, `birth_place`, `complextion`, `height`, `blood_group`, `full_addr`, `native_place`, `res_addr`, `email`, `marital_status`, `mob_no`, `cast`, `sub_cast`, `alter_mob_no`, `tel_no`, `sun_shine`, `nakshatra`, `nadi`, `is_manglik`, `is_handicap`, `handicap_detail`, `education`, `service`, `occupation`, `annual_income`, `total_bro`, `married_bro`, `total_sis`, `married_sis`, `exp_education`, `exp_service`, `exp_age_diff`, `exp_pref_city`, `exp_other`, `exp_annual_income`) VALUES
(17, 18, 'Rohit Shrivastava', b'1', '02/03/2016', '11 PM', 'Ratlam', 'White', '5.10 feet', 'A+ve', '', 'Kalwan', '', 'rohit.shrivastava22@gmail.com', 'Unmarried', '1234567890', 'Dhangar', 'Dange', '1234567890', '1234567890', 'Libra', 'Kasyap', 'Vaid', b'1', b'0', '', 'M.SC Compu', 'Software Engine', 'Service', '7 Lakhs', 3, 2, 0, 0, 'BE', 'Software Engine', 3, 'Pune', '', '5 Lakhs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_user_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sub_amount` int(5) NOT NULL,
  `payment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_user_payment`
--


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

--
-- Dumping data for table `tbl_user_pics`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_requested_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_user_requested_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `by_user_id` int(11) NOT NULL,
  `for_user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_request_sent` bigint(1) NOT NULL DEFAULT '0',
  `sent_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `on_email` bit(1) NOT NULL DEFAULT b'0',
  `on_sms` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_user_requested_profile`
--

