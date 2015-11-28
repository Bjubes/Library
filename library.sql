-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2015 at 09:41 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(30) DEFAULT NULL,
  `author` varchar(99) NOT NULL,
  `title` varchar(99) NOT NULL,
  `dewey_decimal` int(15) DEFAULT NULL,
  `edition_info` varchar(99) DEFAULT NULL,
  `summary` longtext,
  `amount` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn10` (`isbn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `author`, `title`, `dewey_decimal`, `edition_info`, `summary`, `amount`) VALUES
(8, '9781561454129', 'Gorman, Carol', 'Stumptown Kid', 0, 'Paperback; 2007-04-30', 'tet', 3),
(12, '9780439336871', 'Creech, Sharon', 'The Wanderer', 0, 'Paperback; 2000', '', 1),
(18, '0062024043', 'Veronica Roth', 'Insurgent', 0, 'Hardcover; 2012-05-01', 'One choice can transform youï¿½or it can destroy you. But every choice has consequences, and as unrest surges in the factions all around her, Tris Prior must continue trying to save those she lovesï¿½and herselfï¿½while grappling with haunting questions of grief and forgiveness, identity and loyalty, politics and love. Tris''s initiation day should have been marked by celebration and victory with her chosen faction; instead, the day ended with unspeakable horrors. War now looms as conflict between the factions and their ideologies grows. And in times of war, sides must be chosen, secrets will emerge, and choices will become even more irrevocableï¿½and even more powerful. Transformed by her own decisions but also by haunting grief and guilt, radical new discoveries, and shifting relationships, Tris must fully embrace her Divergence, even if she does not know what she may lose by doing so. New York Times bestselling author Veronica Roth''s much-anticipated second book of the dystopian Divergent series is another intoxicating thrill ride of a story, rich with hallmark twists, heartbreaks, romance, and powerful insights about human nature.', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
