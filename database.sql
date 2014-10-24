-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2014 at 04:11 PM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `area51p_sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(140) NOT NULL AUTO_INCREMENT,
  `text` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `favicon` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `advertiser` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `from` int(140) NOT NULL,
  `until` int(140) NOT NULL,
  `target` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `frequency` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `text`, `favicon`, `advertiser`, `from`, `until`, `target`, `location`, `frequency`, `url`) VALUES
(3, 'Sample ad', '#', '#', 1, 2147483647, 'everything', 'everywhere', '1', '#');

-- --------------------------------------------------------

--
-- Table structure for table `cms_content`
--

CREATE TABLE IF NOT EXISTS `cms_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(280) NOT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `author` text NOT NULL,
  `approved` text NOT NULL,
  `tags` varchar(24) NOT NULL,
  `private` int(11) NOT NULL,
  `paste` int(11) NOT NULL,
  `noindex` int(11) NOT NULL,
  `featured_img` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_content`
--

INSERT INTO `cms_content` (`id`, `title`, `body`, `author`, `approved`, `tags`, `private`, `paste`, `noindex`, `featured_img`) VALUES
(1, 'You''re now running Pulsir locally.', 'It works!\r\nYou can log in with admin/admin.', 'admin', 'true', 'system-notif', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblInvites`
--

CREATE TABLE IF NOT EXISTS `tblInvites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(750) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblInvites`
--

INSERT INTO `tblInvites` (`id`, `hash`, `username`) VALUES
(3, 'b08a6bd', ''),
(4, 'rycar3', ''),
(5, 'yowzah33', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblSessions`
--

CREATE TABLE IF NOT EXISTS `tblSessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `useragent` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(100) NOT NULL,
  `expon` int(100) NOT NULL,
  `csrf` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `cookieid` varchar(280) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblSessions`
--

INSERT INTO `tblSessions` (`id`, `username`, `ip`, `useragent`, `time`, `expon`, `csrf`) VALUES
(1, 'admin', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1403189678, 1403448878, '$6$h.WEKd5o$fZPoteniKLSs9RRVmlIJJLPd77ynBeyEXwH92UzfnWDIV4AfJjbFGM9Lr2SUlFu8DiupCUs432T3MqQTHY2G8/');

-- --------------------------------------------------------

--
-- Table structure for table `tblUser`
--

CREATE TABLE IF NOT EXISTS `tblUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sidebar` text COLLATE utf8_unicode_ci NOT NULL,
  `gravatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cucss` text COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `rpt` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `verif` tinyint(1) NOT NULL,
  `salt` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=76 ;

--
-- Dumping data for table `tblUser`
--

INSERT INTO `tblUser` (`id`, `username`, `password`, `email`, `pname`, `sidebar`, `gravatar`, `cucss`, `group`, `profile_url`, `rpt`, `verif`, `salt`) VALUES
(75, 'admin', '$2a$07$qVkgiAybRMBCcm4HYE8eGOTe7EOT3P0JtEqYncjooXLGqa71Jss6i', 'admin@localhost', 'admin', '', 'admin@localhost', '', 'creators', '', '', 0, '$2a$07$qVkgiAybRMBCcm4HYE8eGd0snPNoJLU7S96julpfFh');

-- ------------------------------------------------------------

-- Table structure for table `tblTwoFactor`

CREATE TABLE `tblTwoFactor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(140) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `secret` varchar(140) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;



CREATE TABLE IF NOT EXISTS `tblReserved` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(140) DEFAULT NULL,
  `reason` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tblNotifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usr_from` varchar(140) DEFAULT NULL,
  `usr_to` varchar(140) DEFAULT NULL,
  `about` varchar(140) DEFAULT NULL,
  `contid` int(11) DEFAULT NULL,
  `read` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
