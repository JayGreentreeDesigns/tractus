-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2012 at 04:47 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `tractus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tractus_roles`
--

CREATE TABLE `tractus_roles` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tractus_roles`
--

INSERT INTO `tractus_roles` VALUES(1, 'Administrator', 'Full access');
INSERT INTO `tractus_roles` VALUES(2, 'User', 'Userer');

-- --------------------------------------------------------

--
-- Table structure for table `tractus_tickets`
--

CREATE TABLE `tractus_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_assigned` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `category` int(2) DEFAULT NULL,
  `priority` int(2) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `date_received` datetime DEFAULT NULL,
  `date_resolved` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tractus_tickets`
--


-- --------------------------------------------------------

--
-- Table structure for table `tractus_tickets_categories`
--

CREATE TABLE `tractus_tickets_categories` (
  `category_id` int(2) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) DEFAULT NULL,
  `category_colour` varchar(6) DEFAULT NULL,
  `category_icon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tractus_tickets_categories`
--

INSERT INTO `tractus_tickets_categories` VALUES(1, 'Bug', 'cccccc', 'bug.png');

-- --------------------------------------------------------

--
-- Table structure for table `tractus_tickets_comments`
--

CREATE TABLE `tractus_tickets_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tractus_tickets_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `tractus_users`
--

CREATE TABLE `tractus_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role_id` int(2) DEFAULT NULL,
  `summary` text,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tractus_users`
--

