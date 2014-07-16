-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2014 at 12:27 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fourthdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE IF NOT EXISTS `registered` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `imgpath` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`id`, `name`, `password`, `email`, `gender`, `username`, `imgpath`, `role`) VALUES
(1, 'Nainesh Pathak', 'nain1204', 'nainprince@gmail.com', 'male', 'nain12', 'upload/h.jpg', 'admin'),
(2, 'Manoj singh', 'mani1', 'manoj1@rediffmail.com', 'male', 'manoj_12', 'upload/IMG_1465.JPG', 'user'),
(3, 'maggi', 'maggi', 'maggi1@gmail.com', 'female', 'maggi_121', 'upload/01204_tune_1920x1080.jpg', 'user'),
(4, 'Manoj Kumar', 'mani12', 'manoj121@rediffmail.com', 'male', 'manoj12', 'upload/417076_10150583123640674_8526405673_8825178_2037077415_n.jpg', 'user'),
(5, 'Nainesh Kumar', 'nain852828', 'nain121@rediffmail.com', 'male', 'nain_12', '', 'user'),
(6, 'Prince', 'prince123', 'prince123@gmail.com', 'male', 'prince123', 'upload/01287_iceplanet_1920x1080.jpg', 'user'),
(7, 'Amit Mishra', 'amit123', 'amitg12@hotmail.com', 'male', 'amit1', '', 'user'),
(8, 'Arjun Rana', 'arjun1', 'arjun12@hotmail.com', 'male', 'arjun12', 'upload/01355_smoke_1920x1080.jpg', 'user'),
(9, 'Arjun Rana', 'arjun1', 'arjun121@hotmail.com', 'male', 'arjun121', '', 'user'),
(10, 'Anushika', 'anu123', 'anushika1@gmail.com', 'female', 'anu123', '', 'user'),
(11, 'Aarti Singh', 'aarti123', 'aarti12@gmail.com', 'female', 'aarti12', '', 'user'),
(12, 'Saurabh Mishra', 'saurabh1', 'saurabh1990@gmail.com', 'male', 'saurabh12', 'upload/01355_smoke_1920x1080.jpg', 'user'),
(13, 'Neelu Gandhi', 'neelu456', 'neelu.dgirl@gmail.com', 'female', 'neel123', '', 'user'),
(14, 'Cristein', 'krish234', 'krishh@gmail.com', 'female', 'krish12', '', 'user'),
(15, 'Kristein Stewert', 'dgirl', 'kristein@gmail.com', 'female', 'kristein1', '', 'user'),
(16, 'Robert Pattinsion', 'imrobert', 'robert@hotmail.com', 'male', 'robert@12', 'upload/424492_10150629557335674_8526405673_8967634_1975172940_n.jpg', 'user'),
(17, 'Raj Jaiswal', 'rajdhero12', 'raj.o5@gmail.com', 'male', 'raj15', 'upload/27042013282.jpg', 'admin'),
(18, 'Yuvraj Singh', 'yuvi12', 'yuvi12@gmail.com', 'male', 'yuvi12', 'upload/10336726_1432970510316462_7725167730397722008_n.jpg', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` int(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`, `mail`, `address`, `gender`, `course`) VALUES
(1, 'anisoro', 0, 'nainprince@gmail.com', 'kashi', 'male', 'b.sc.'),
(2, 'Prince', 0, 'nain12@gmail.com', 'delhi', 'male', 'b.sc.'),
(3, 'Nainesh', 1204, 'nain12@gmail.com', 'patna', 'male', 'diploma'),
(13, 'Nainesh', 1204, 'nain15@gmail.com', 'patna', 'male', 'diploma'),
(14, 'Nain', 1308, 'nain25@gmail.com', 'noida', 'male', 'b.a.'),
(15, 'Naina', 1212, 'nain28@gmail.com', 'noida', 'female', 'b.a.'),
(16, 'Naincy', 12563, 'naincy28@gmail.com', 'noida', 'female', 'b.sc.'),
(17, 'ankita', 12345, 'anki28@gmail.com', 'surat', 'female', 'b.sc.'),
(20, 'ankita singh', 12345, 'anki175@gmail.com', 'noida', 'female', 'b.sc.'),
(21, 'ankita singh', 123456, 'anki176@gmail.com', 'noida', 'female', 'b.sc.'),
(22, 'ankita singla', 123456, 'anki166@gmail.com', 'noida', 'female', 'b.sc.'),
(23, 'raj', 987, 'raj1@gmail.com', 'noida', 'male', 'b.sc.'),
(24, 'Naina', 12041308, 'naina12@gmail.com', 'kashi', 'female', 'diploma'),
(26, 'Nain', 852828, 'nain121@gmail.com', 'kashi', 'male', 'b.sc.'),
(28, 'Nain', 12045, 'naineshpthk@gmail.com', 'kashi', 'male', 'b.sc.'),
(29, 'Nain', 130812, 'naineshpthk6@gmail.com', 'kashi', 'male', 'b.sc.'),
(30, 'anil', 2147483647, 'anil@rediffmail.com', 'delhi', 'male', 'b.sc.');
