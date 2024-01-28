-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2024 at 11:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `play_ground`
--

CREATE TABLE `play_ground` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `players` varchar(10) DEFAULT NULL,
  `player_role` tinyint(1) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `play_ground`
--

INSERT INTO `play_ground` (`id`, `room_id`, `players`, `player_role`, `created_on`) VALUES
(1, 1234, 'mani', 1, '2024-01-27 12:07:48'),
(2, 1234, 'maran', 0, '2024-01-27 12:06:36'),
(3, 1234, 'kumar', 0, '2024-01-27 12:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `ground_id` int(11) DEFAULT NULL,
  `points` bigint(10) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `ground_id`, `points`, `created_on`) VALUES
(1, 1, 500, '2024-01-27 11:57:16'),
(2, 2, 1000, '2024-01-27 11:57:23'),
(3, 3, 200, '2024-01-27 11:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_id`, `active`, `created_on`) VALUES
(1, 1234, 1, '2024-01-27 11:56:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `play_ground`
--
ALTER TABLE `play_ground`
  ADD PRIMARY KEY (`id`);

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
