-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 06:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raja_rani`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `_character` varchar(25) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `priority` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `_character`, `points`, `priority`) VALUES
(1, 'king', 2000, 1),
(2, 'queen', 1000, 1),
(3, 'thief', 0, 1),
(4, 'police', 500, 1),
(5, 'minister', 750, 0),
(6, 'wizard', 250, 0),
(7, 'gardener', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `play_ground`
--

CREATE TABLE `play_ground` (
  `id` int(11) NOT NULL,
  `room_id` varchar(7) DEFAULT NULL,
  `players` varchar(10) DEFAULT NULL,
  `player_role` tinyint(1) DEFAULT NULL,
  `player_status` int(3) DEFAULT NULL,
  `character_id` int(11) DEFAULT NULL,
  `_date` date DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `play_ground`
--

INSERT INTO `play_ground` (`id`, `room_id`, `players`, `player_role`, `player_status`, `character_id`, `_date`, `created_on`) VALUES
(1, '1234', 'mani', 1, 2, 1, '2024-02-07', '2024-02-13 09:28:14'),
(2, '1234', 'mani maran', 0, 2, 2, '2024-02-07', '2024-02-13 09:28:17'),
(3, '1234', 'kumar', 0, 2, 3, '2024-02-07', '2024-02-13 09:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `ground_id` int(11) DEFAULT NULL,
  `points` bigint(10) DEFAULT NULL,
  `_date` date DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `ground_id`, `points`, `_date`, `created_on`) VALUES
(1, 1, 500, '0000-00-00', '2024-02-07 12:29:19'),
(2, 2, 1000, NULL, '2024-01-27 11:57:23'),
(3, 3, 200, NULL, '2024-01-27 11:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_id` varchar(7) DEFAULT NULL,
  `status` enum('open','close','waiting') DEFAULT NULL,
  `_date` date DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_id`, `status`, `_date`, `created_on`) VALUES
(1, '1234', 'open', '2024-01-27', '2024-02-07 12:20:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `play_ground`
--
ALTER TABLE `play_ground`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `play_ground` ADD FULLTEXT KEY `players` (`players`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `play_ground`
--
ALTER TABLE `play_ground`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
