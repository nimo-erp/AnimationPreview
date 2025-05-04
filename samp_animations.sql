-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 05:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samp_animations`
--

-- --------------------------------------------------------

--
-- Table structure for table `animations`
--

CREATE TABLE `animations` (
  `id` int(11) NOT NULL,
  `library` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `anim_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animations`
--

INSERT INTO `animations` (`id`, `library`, `name`, `anim_id`, `created_at`) VALUES
(1, 'AIRPORT', 'thrw_barl_thrw', 1, '2025-05-04 03:52:57'),
(2, 'AIRPORT', 'lifejump', 2, '2025-05-04 03:52:57'),
(3, 'BEACH', 'bather', 3, '2025-05-04 03:52:57'),
(4, 'BEACH', 'lay_bac_loop', 4, '2025-05-04 03:52:57'),
(5, 'DANCING', 'dance_loop', 5, '2025-05-04 03:52:57'),
(6, 'DANCING', 'dnce_m_a', 6, '2025-05-04 03:52:57'),
(7, 'DANCING', 'dnce_m_b', 7, '2025-05-04 03:52:57'),
(8, 'DANCING', 'dnce_m_c', 8, '2025-05-04 03:52:57'),
(9, 'KNIFE', 'knife_1', 9, '2025-05-04 03:52:57'),
(10, 'KNIFE', 'knife_2', 10, '2025-05-04 03:52:57'),
(11, 'KNIFE', 'knife_3', 11, '2025-05-04 03:52:57'),
(12, 'KNIFE', 'knife_4', 12, '2025-05-04 03:52:57'),
(13, 'POLICE', 'coptraf_away', 13, '2025-05-04 03:52:57'),
(14, 'POLICE', 'coptraf_come', 14, '2025-05-04 03:52:57'),
(15, 'POLICE', 'coptraf_left', 15, '2025-05-04 03:52:57'),
(16, 'POLICE', 'coptraf_stop', 16, '2025-05-04 03:52:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animations`
--
ALTER TABLE `animations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `library_name` (`library`,`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animations`
--
ALTER TABLE `animations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
