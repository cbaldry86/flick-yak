-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 10:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mds_db`
--
CREATE DATABASE IF NOT EXISTS `mds_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mds_db`;

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

DROP TABLE IF EXISTS `discussion`;
CREATE TABLE `discussion` (
  `discussion_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `content` varchar(40000) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `discussion`:
--   `username`
--       `user` -> `username`
--   `movie_id`
--       `movie` -> `movie_id`
--

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`discussion_id`, `movie_id`, `username`, `content`, `post_date`) VALUES
(1, 1, 'lbaldry', 'Cars Cars Cars what is there not to like <3 <3', '2021-07-19 03:27:40'),
(2, 1, 'cbaldry', 'Gotta love that tow truck', '2021-07-19 03:30:40'),
(3, 1, 'mbaldry', 'Not A fan. Cars are so lame :P', '2021-07-19 03:31:40'),
(4, 1, 'rbaldry', 'Same, I will give it a rating of 4', '2021-07-19 03:32:40'),
(5, 1, 'dbaldry', 'Me Three, I\'m such an old lady this movie is lame -_-', '2021-07-19 03:33:40'),
(6, 4, 'rbaldry', 'Bunny!', '2021-07-19 03:33:40'),
(7, 4, 'mbaldry', 'Duck!', '2021-07-19 03:34:40'),
(8, 4, 'rbaldry', 'Bunny!', '2021-07-19 03:35:40'),
(9, 4, 'mbaldry', 'Duck!', '2021-07-19 03:36:40'),
(10, 3, 'cbaldry', 'Good for it\'s time, Im sure the old lady would like :D', '2021-07-19 03:37:40'),
(11, 2, 'dbaldry', 'I Like this one :)', '2021-07-19 03:38:40'),
(12, 2, 'lbaldry', 'Me too!', '2021-07-19 03:39:40'),
(13, 2, 'mbaldry', 'Sea monster nom nom nom!', '2021-07-19 03:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `release_year` int(11) DEFAULT NULL,
  `director` varchar(100) NOT NULL,
  `writers` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `summary` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `movie`:
--

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `release_year`, `director`, `writers`, `duration`, `summary`) VALUES
(1, 'Cars 2', 2011, 'John Lasseter, Bradford Lewis', 'John Lasseter, Bradford Lewis, Dan Fogelman', 106, 'Star race car Lightning McQueen and his pal Mater head overseas to compete in the World Grand Prix race. But the road to the championship becomes rocky as Mater gets caught up in an intriguing adventure of his own: international espionage.'),
(2, 'Luca', 2021, 'Enrico Casarosa', 'Enrico Casarosa, Jesse Andrews, Simon Stephson', 95, 'On the Italian Riviera, an unlikely but strong friendship grows between a human being and a sea monster disguised as a human.'),
(3, 'The Lion king', 1994, 'Roger Allers, Rob Minkoff', 'Irene Mecchi, Jonathan Roberts, Linda Woolverton', 88, 'Lion prince Simba and his father are targeted by his bitter uncle, who wants to ascend the throne himself.'),
(4, 'Toy Story 4', 2019, 'Josh Cooley', 'John Lasseter, Andrew Stanton, Josh Cooley', 100, 'When a new toy called "Forky" joins Woody and the gang, a road trip alongside old and new friends reveals how big the world can be for a toy.');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `movie_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `rating` tinyint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `rating`:
--   `username`
--       `user` -> `username`
--   `movie_id`
--       `movie` -> `movie_id`
--

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`movie_id`, `username`, `rating`) VALUES
(1, 'lbaldry', 9),
(2, 'lbaldry', 9),
(3, 'lbaldry', 6),
(4, 'lbaldry', 6),
(1, 'rbaldry', 4),
(2, 'rbaldry', 7),
(3, 'rbaldry', 5),
(4, 'rbaldry', 8),
(1, 'mbaldry', 4),
(2, 'mbaldry', 8),
(3, 'mbaldry', 7),
(4, 'mbaldry', 9),
(1, 'dbaldry', 4),
(2, 'dbaldry', 9),
(3, 'dbaldry', 6),
(4, 'dbaldry', 8),
(1, 'cbaldry', 6),
(2, 'cbaldry', 8),
(3, 'cbaldry', 8),
(4, 'cbaldry', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `real_name` varchar(100) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` varchar(10) NOT NULL DEFAULT 'member',
  `profile_image` varchar(100) DEFAULT 'profile_placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `real_name`, `email`, `dob`, `password`, `access_level`, `profile_image`) VALUES
('cbaldry', 'Craig Baldry', 'old.man@our.ecu.edu.au', '1986-06-17', '12345', 'admin', 'avatar_1.PNG'),
('dbaldry', 'Daiane Baldry', 'old.lady@gmail.com', '1987-02-18', 'qwert', 'admin', 'profile_placeholder.png'),
('lbaldry', 'Leonardo Baldry', 'leo.b@gmail.com', '2003-06-17', 'asdfg', 'member', 'profile_placeholder.png'),
('rbaldry', 'Aurora Baldry', 'rory.b@gmail.com', '2005-06-14', 'Abc123', 'member', 'profile_placeholder.png'),
('mbaldry', 'Matilda Baldry', 'tilda.b@gmail.com', '2005-06-14', '123ab', 'member', 'profile_placeholder.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussion_id`),
  ADD KEY `username` (`username`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`movie_id`,`username`),
  ADD KEY `username` (`username`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `discussion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
