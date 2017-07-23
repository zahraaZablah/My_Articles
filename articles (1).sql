-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 23, 2017 at 05:55 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `articles`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `articles`
-- 

CREATE TABLE `articles` (
  `id` int(20) NOT NULL auto_increment,
  `author` varchar(30) NOT NULL,
  `post` text NOT NULL,
  `date` date NOT NULL,
  `category` varchar(30) NOT NULL,
  `title` varchar(40) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=147 ;

-- 
-- Dumping data for table `articles`
-- 

INSERT INTO `articles` VALUES (135, 'zahraa', ' This article is about the human condition. For other uses, see Health (disambiguation).\r\nHealth is the level of functional and metabolic efficiency of a living organism. In humans it is the ability of individuals or communities to adapt and self-manage when facing physical, mental, psychological and social changes with environment.[1] The World Health Organization (WHO) defined health in its broader sense in its 1948 constitution as "a state of complete physical, mental, and social well-being and not merely the absence of disease or infirmity."[2][3] This definition has been subject to controversy, in particular as lacking operational value, the ambiguity in developing cohesive health strategies, and because of the problem created by use of the word "complete".[4][5][6] Other definitions have been proposed, among which a recent definition that correlates health and personal satisfaction.[7] [8] Classification systems such as the WHO Family of International Classifications, including the International Classification of Functioning, Disability and Health (ICF) and the International Classification of Diseases (ICD), are commonly used to define and measure the components of health.gttg', '2017-07-15', 'Health', 'health', '08:13:59');
INSERT INTO `articles` VALUES (146, 'zahra2', ' Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include storytelling, discussion, teaching, training, and directed research. Education frequently takes place under the guidance of educators, but learners may also educate themselves.[1] Education can take place in formal or informal settings and any experience that has a formative effect on the way one thinks, feels, or acts may be considered educational. The methodology of teaching is called pedagogy.\r\n\r\nEducation is commonly divided formally into such stages as preschool or kindergarten, primary school, secondary school and then college, university, or apprenticeship.', '2017-07-23', 'Education and Communications', 'Education', '05:49:26');

-- --------------------------------------------------------

-- 
-- Table structure for table `permissions`
-- 

CREATE TABLE `permissions` (
  `perm_id` int(11) NOT NULL auto_increment,
  `perm_desc` varchar(50) NOT NULL,
  PRIMARY KEY  (`perm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `permissions`
-- 

INSERT INTO `permissions` VALUES (1, 'add articles');
INSERT INTO `permissions` VALUES (2, 'delete articles');
INSERT INTO `permissions` VALUES (3, 'add users');
INSERT INTO `permissions` VALUES (8, 'add roles');
INSERT INTO `permissions` VALUES (7, 'update articles');

-- --------------------------------------------------------

-- 
-- Table structure for table `roles`
-- 

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL auto_increment,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`role_id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

-- 
-- Dumping data for table `roles`
-- 

INSERT INTO `roles` VALUES (83, 'admin');
INSERT INTO `roles` VALUES (88, 'admin-');
INSERT INTO `roles` VALUES (87, 'author');
INSERT INTO `roles` VALUES (86, 'author+');

-- --------------------------------------------------------

-- 
-- Table structure for table `role_perm`
-- 

CREATE TABLE `role_perm` (
  `role_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  PRIMARY KEY  (`perm_id`,`role_id`),
  KEY `fk` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `role_perm`
-- 

INSERT INTO `role_perm` VALUES (83, 1);
INSERT INTO `role_perm` VALUES (86, 1);
INSERT INTO `role_perm` VALUES (87, 1);
INSERT INTO `role_perm` VALUES (88, 1);
INSERT INTO `role_perm` VALUES (83, 2);
INSERT INTO `role_perm` VALUES (86, 2);
INSERT INTO `role_perm` VALUES (88, 2);
INSERT INTO `role_perm` VALUES (83, 3);
INSERT INTO `role_perm` VALUES (88, 3);
INSERT INTO `role_perm` VALUES (83, 7);
INSERT INTO `role_perm` VALUES (86, 7);
INSERT INTO `role_perm` VALUES (88, 7);
INSERT INTO `role_perm` VALUES (83, 8);

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (41, 'zahra2', 'c00ac34d91cdffd44c6271e49014a190');
INSERT INTO `users` VALUES (40, 'zahraa', '45502f6b02563050eedcc750e383a0ff');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_role`
-- 

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `user_role`
-- 

INSERT INTO `user_role` VALUES (40, 83);
INSERT INTO `user_role` VALUES (41, 86);
