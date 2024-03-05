-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2024 at 12:55 PM
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
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `_character` varchar(25) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `priority` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `_character`, `points`, `priority`) VALUES
(1, 'king', 2000, 1),
(2, 'queen', 1000, 1),
(3, 'thief', 0, 1),
(4, 'police', 500, 1),
(5, 'minister', 750, 0),
(6, 'wizard', 250, 0);

-- --------------------------------------------------------

--
-- Table structure for table `play_ground`
--

CREATE TABLE `play_ground` (
  `id` int(11) NOT NULL,
  `room_id` varchar(7) DEFAULT NULL,
  `players` varchar(10) DEFAULT NULL,
  `player_role` tinyint(1) DEFAULT NULL,
  `player_status` enum('online','offline','waiting','') DEFAULT NULL,
  `character_id` int(11) DEFAULT NULL,
  `_date` date DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `play_ground`
--

INSERT INTO `play_ground` (`id`, `room_id`, `players`, `player_role`, `player_status`, `character_id`, `_date`, `created_on`) VALUES
(1, '1234', 'mani', 1, 'offline', 1, '2024-02-07', '2024-02-13 09:28:14'),
(2, '1234', 'mani maran', 0, 'offline', 2, '2024-02-07', '2024-02-13 09:28:17'),
(3, '1234', 'kumar', 0, 'offline', 3, '2024-02-07', '2024-02-13 09:28:19'),
(4, 'A5737', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:41:32'),
(5, 'A4130', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:43:30'),
(6, 'E3345', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:43:36'),
(7, 'A6866', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:43:57'),
(8, 'E5852', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:43:59'),
(9, 'E9001', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:00'),
(10, 'D2656', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:01'),
(11, 'C4887', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:01'),
(12, 'D8115', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:01'),
(13, 'B7303', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:01'),
(14, 'B4426', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:01'),
(15, 'A4976', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:02'),
(16, 'E9133', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:02'),
(17, 'C1954', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:02'),
(18, 'A6285', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:02'),
(19, 'A8749', 'mani', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:44:02'),
(20, 'C4560', 'test_name', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:46:20'),
(21, 'D2494', 'undefined', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:47:55'),
(22, 'A5955', 'wewewew', 1, 'offline', 0, '2024-02-26', '2024-02-26 10:49:28'),
(23, 'C3549', 'wewewew', 1, 'offline', 0, '2024-02-26', '2024-02-26 11:09:01'),
(24, 'A9298', 'ere', 1, 'offline', 0, '2024-02-26', '2024-02-26 11:09:20'),
(25, 'B4904', 'wew', 1, 'offline', 0, '2024-02-26', '2024-02-26 11:48:39');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_id`, `status`, `_date`, `created_on`) VALUES
(1, '1234', 'open', '2024-01-27', '2024-02-07 12:20:12'),
(2, 'C4247', 'waiting', '2024-02-26', '2024-02-26 10:37:21'),
(3, 'C1600', 'waiting', '2024-02-26', '2024-02-26 10:38:51'),
(4, 'E7646', 'waiting', '2024-02-26', '2024-02-26 10:38:52'),
(5, 'B9112', 'waiting', '2024-02-26', '2024-02-26 10:39:30'),
(6, 'C1209', 'waiting', '2024-02-26', '2024-02-26 10:40:40'),
(7, 'A5737', 'waiting', '2024-02-26', '2024-02-26 10:41:32'),
(8, 'A4130', 'waiting', '2024-02-26', '2024-02-26 10:43:30'),
(9, 'E3345', 'waiting', '2024-02-26', '2024-02-26 10:43:36'),
(10, 'A6866', 'waiting', '2024-02-26', '2024-02-26 10:43:57'),
(11, 'E5852', 'waiting', '2024-02-26', '2024-02-26 10:43:59'),
(12, 'E9001', 'waiting', '2024-02-26', '2024-02-26 10:44:00'),
(13, 'D2656', 'waiting', '2024-02-26', '2024-02-26 10:44:01'),
(14, 'C4887', 'waiting', '2024-02-26', '2024-02-26 10:44:01'),
(15, 'D8115', 'waiting', '2024-02-26', '2024-02-26 10:44:01'),
(16, 'B7303', 'waiting', '2024-02-26', '2024-02-26 10:44:01'),
(17, 'B4426', 'waiting', '2024-02-26', '2024-02-26 10:44:01'),
(18, 'A4976', 'waiting', '2024-02-26', '2024-02-26 10:44:02'),
(19, 'E9133', 'waiting', '2024-02-26', '2024-02-26 10:44:02'),
(20, 'C1954', 'waiting', '2024-02-26', '2024-02-26 10:44:02'),
(21, 'A6285', 'waiting', '2024-02-26', '2024-02-26 10:44:02'),
(22, 'A8749', 'waiting', '2024-02-26', '2024-02-26 10:44:02'),
(23, 'C4560', 'waiting', '2024-02-26', '2024-02-26 10:46:20'),
(24, 'D2494', 'waiting', '2024-02-26', '2024-02-26 10:47:55'),
(25, 'A5955', 'waiting', '2024-02-26', '2024-02-26 10:49:28'),
(26, 'C3549', 'waiting', '2024-02-26', '2024-02-26 11:09:01'),
(27, 'A9298', 'waiting', '2024-02-26', '2024-02-26 11:09:20'),
(28, 'B4904', '', '2024-02-26', '2024-02-26 11:54:38');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
