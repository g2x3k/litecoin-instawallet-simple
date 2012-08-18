-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2012 at 04:18 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-7+squeeze3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `instaltc`
--

CREATE TABLE IF NOT EXISTS `instaltc` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ltcaddress` char(34) NOT NULL,
  `url` char(64) NOT NULL,
  `pin` char(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=412 ;


