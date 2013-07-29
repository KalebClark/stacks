-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2013 at 06:41 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stacks`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Unique Book ID',
  `box_id` int(8) NOT NULL,
  `genre_id` int(8) NOT NULL,
  `category` varchar(255) NOT NULL,
  `ext_ref` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `box_id`, `genre_id`, `category`, `ext_ref`, `author`, `book_title`) VALUES
(1, 1, 1, 'History', '1471109259', 'Stephen E. Ambrose', 'Band Of Brothers'),
(3, 3, 1, '', '1854596217', 'William Shakespeare', 'Henry V. EG'),
(4, 4, 1, '', '1439560803', 'Patrick Rothfuss', 'The Name of the Wind'),
(5, 1, 1, '', '1439148503', 'Stephen King', 'Under the Dome'),
(6, 3, 1, '', '0765365278', 'Brandon Sanderson', 'The Way of Kings'),
(7, 4, 1, 'Computers', '0735649715', 'Joyce Cox', 'The Microsoft Office Specialist'),
(8, 1, 1, 'null', '1158082088', 'Source Wikipedia', 'Variables'),
(9, 3, 1, 'Humor', '1452100993', 'Jory John', 'All My Friends Are Dead'),
(10, 4, 1, 'Humor', '1452106967', 'Avery Monsen', 'All My Friends Are Still Dead'),
(11, 3, 1, 'Fiction', '0759516030', 'Douglas Preston', 'The Book of the Dead'),
(12, 1, 1, 'Fiction', '1429997176', 'Robert Jordan', 'A Memory of Light'),
(13, 4, 1, 'Juvenile Fiction', '0307781569', 'Wilson Rawls', 'Where the Red Fern Grows'),
(14, 1, 1, 'Literary Criticism', '0521377986', 'Jack Salzman', 'New Essays on The Catcher in the Rye');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `genre_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stacks`
--

CREATE TABLE `stacks` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `genre_id` int(8) NOT NULL,
  `box_title` varchar(255) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lon` float(9,6) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stacks`
--

INSERT INTO `stacks` (`id`, `genre_id`, `box_title`, `lat`, `lon`, `house_number`, `street_name`, `city_name`, `zip_code`) VALUES
(1, 0, 'Allison''s Books', 38.580177, -121.470421, '', '', 'Sacramento', '95811'),
(3, 1, 'Angry Books', 38.579170, -121.490936, '', '', 'Sacramento', '95811'),
(4, 1, 'Super Fiction', 38.579304, -121.480896, '', '', 'Sacramento', '95811');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `password` char(16) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notes` text,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `userid`, `password`, `fullname`, `email`, `notes`) VALUES
(1, 'kalebc', '*C736AD778BC063A', 'kaleb clark', 'kaleb%40abraxxus.net', 'This is a note'),
(2, 'Username', '*C736AD778BC063A', 'Full Name', 'EmailAddress', 'This is a note'),
(3, 'Username2', '*C736AD778BC063A', 'Full Name', 'EmailAddress', 'This is a note');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
