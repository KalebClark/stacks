-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2013 at 05:49 PM
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
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `stack_id` int(8) NOT NULL,
  `genre_id` int(8) NOT NULL,
  `category` varchar(255) NOT NULL,
  `ext_ref` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `active`, `stack_id`, `genre_id`, `category`, `ext_ref`, `author`, `book_title`) VALUES
(1, '1', 1, 1, 'History', '1471109259', 'Stephen E. Ambrose', 'Band Of Brothers'),
(3, '1', 3, 1, '', '1854596217', 'William Shakespeare', 'Henry V. EG'),
(4, '1', 4, 1, '', '1439560803', 'Patrick Rothfuss', 'The Name of the Wind'),
(5, '1', 1, 1, '', '1439148503', 'Stephen King', 'Under the Dome'),
(6, '1', 3, 1, '', '0765365278', 'Brandon Sanderson', 'The Way of Kings'),
(7, '1', 4, 1, 'Computers', '0735649715', 'Joyce Cox', 'The Microsoft Office Specialist'),
(8, '0', 1, 1, 'null', '1158082088', 'Source Wikipedia', 'Variables'),
(9, '1', 3, 1, 'Humor', '1452100993', 'Jory John', 'All My Friends Are Dead'),
(10, '1', 4, 1, 'Humor', '1452106967', 'Avery Monsen', 'All My Friends Are Still Dead'),
(11, '1', 3, 1, 'Fiction', '0759516030', 'Douglas Preston', 'The Book of the Dead'),
(12, '1', 1, 1, 'Fiction', '1429997176', 'Robert Jordan', 'A Memory of Light'),
(13, '1', 4, 1, 'Juvenile Fiction', '0307781569', 'Wilson Rawls', 'Where the Red Fern Grows'),
(14, '1', 1, 1, 'Literary Criticism', '0521377986', 'Jack Salzman', 'New Essays on The Catcher in the Rye'),
(15, '1', 1, 1, 'Fiction', '1101138076', 'Stephen King', 'The Eyes of the Dragon'),
(16, '0', 1, 1, 'null', '1442006161', 'Stephen King', 'The Eyes of the Dragon'),
(17, '0', 1, 1, 'null', '1442006161', 'Stephen King', 'The Eyes of the Dragon'),
(18, '0', 1, 1, 'Juvenile Fiction', '0307976548', 'Billy Wrecks', 'Eye of the Dragon (Marvel: Iron Man)'),
(19, '0', 1, 1, 'Fiction', '038552885X', 'Stephen King', 'The Stand'),
(20, '0', 1, 1, 'Fiction', '038552885X', 'Stephen King', 'The Stand'),
(21, '0', 1, 1, 'Fiction', '038552885X', 'Stephen King', 'The Stand'),
(22, '1', 1, 1, 'Fiction', '038552885X', 'Stephen King', 'The Stand'),
(23, '1', 1, 1, 'Fiction', '038552885X', 'Stephen King', 'The Stand'),
(24, '1', 1, 1, 'Fiction', '038552885X', 'Stephen King', 'The Stand'),
(25, '1', 6, 1, 'Fiction', '038552885X', 'Stephen King', 'The Stand'),
(26, '1', 7, 1, 'Fiction', '038552885X', 'Stephen King', 'The Stand');

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
  `user_id` int(8) NOT NULL,
  `genre_id` int(8) NOT NULL,
  `stack_title` varchar(255) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lon` float(9,6) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stacks`
--

INSERT INTO `stacks` (`id`, `user_id`, `genre_id`, `stack_title`, `lat`, `lon`, `house_number`, `street_name`, `city_name`, `zip_code`) VALUES
(1, 0, 0, 'Allison''s Books', 38.580177, -121.470421, '', '', 'Sacramento', '95811'),
(3, 0, 1, 'Angry Books', 38.579170, -121.490936, '', '', 'Sacramento', '95811'),
(4, 0, 1, 'Super Fiction', 38.579304, -121.480896, '', '', 'Sacramento', '95811'),
(7, 2, 1, 'Scifi Adventure', 38.538197, -121.480034, '3990', 'East Pacific Avenue', 'Sacramento', '95820');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `activated` int(1) NOT NULL DEFAULT '0',
  `confirmation` varchar(35) NOT NULL,
  `reg_date` int(11) NOT NULL,
  `last_login` int(11) NOT NULL DEFAULT '0',
  `group_id` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `activated`, `confirmation`, `reg_date`, `last_login`, `group_id`) VALUES
(1, '0cool', 'c7cac09bfd821835d6ddcc941281a7b1', 'kaleb@abraxxus.net', 1, '', 1375193264, 1375237992, 1),
(2, 'kalebc', 'c4b80071ce1e6405cd0f11e6bf797e2c', 'kaleb@snahc.org', 1, '', 1375248095, 1375277217, 1),
(3, 'test', '3f218c0eb1411fa1a5925760f602ad3a', 'test@test.com', 1, '', 1375277857, 1375277868, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
