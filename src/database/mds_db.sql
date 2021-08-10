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
(1, 1, 'asmith', 'This movie…', '2021-07-19 03:27:40'),
(2, 1, 'jbloggs', 'The shark…', '2021-07-19 03:27:40'),
(3, 2, 'jbloggs', 'I didn’t get…', '2021-07-19 03:27:40'),
(4, 3, 'jbloggs', 'Giant smurf!', '2021-07-19 03:27:40');

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
(1, 'Jaws 2', 1978, 'Jeannot Szwarc', 'Peter Benchley, Carl Gottlieb', 116, 'Police chief Brody mu…'),
(2, 'Inception', 2010, 'Christopher Nolan', 'Christopher Nolan', 148, 'In a world where…'),
(3, 'Avatar', 2009, 'James Cameron', 'James Cameron', 162, 'A paraplegic marine…');

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
(1, 'asmith', 6),
(1, 'jbloggs', 8),
(2, 'jbloggs', 4),
(3, 'jbloggs', 7);

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
  `access_level` varchar(10) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `real_name`, `email`, `dob`, `password`, `access_level`) VALUES
('asmith', NULL, 'smith@gmail.com', '1984-04-19', 'Abc123', 'admin'),
('cbaldry', 'craig', 'cbaldry@our.ecu.edu.au', '1986-06-17', '12345', 'admin'),
('jbloggs', 'Joe Bloggs', 'jbloggs@gmail.com', '1984-07-02', 'swordfish99', 'member');

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
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
