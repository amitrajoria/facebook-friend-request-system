-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 02:04 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `id` int(5) NOT NULL,
  `accept_id` int(5) NOT NULL,
  `req_id` int(5) NOT NULL,
  `accept_name` varchar(220) DEFAULT NULL,
  `req_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`id`, `accept_id`, `req_id`, `accept_name`, `req_name`, `status`) VALUES
(1, 4, 1, 'Rajat', 'Amit', 'accepted'),
(2, 3, 1, 'Kartik', 'Amit', 'accepted'),
(3, 6, 1, 'System', 'Amit', 'accepted'),
(4, 4, 3, 'Rajat', 'Kartik', 'accepted'),
(5, 4, 6, '', 'System', 'pending'),
(6, 8, 4, 'Raghu', 'Rajat', 'accepted'),
(8, 2, 4, 'Rajoria', 'Rajat', 'accepted'),
(9, 5, 2, NULL, 'Rajoria', 'pending'),
(12, 1, 12, 'Amit', 'Yash', 'accepted'),
(13, 9, 1, NULL, 'Amit', 'pending'),
(14, 3, 9, NULL, 'Rohit', 'pending'),
(15, 12, 4, NULL, 'Rajat', 'pending'),
(16, 12, 9, 'Yash', 'Rohit', 'accepted'),
(17, 8, 9, NULL, 'Rohit', 'pending'),
(18, 6, 12, 'System', 'Yash', 'accepted'),
(19, 6, 11, NULL, 'Subodh', 'pending'),
(20, 5, 6, NULL, 'System', 'pending'),
(21, 4, 5, NULL, 'Hament', 'pending'),
(22, 1, 13, 'Amit', 'Teenu', 'accepted'),
(23, 4, 13, NULL, 'Teenu', 'pending'),
(24, 5, 12, NULL, 'Yash', 'pending'),
(25, 15, 19, NULL, 'login', 'pending'),
(26, 1, 19, 'Amit', 'login', 'accepted'),
(27, 1, 21, 'Amit', 'Today', 'accepted'),
(28, 1, 22, 'Amit', 'august', 'accepted'),
(29, 2, 22, NULL, 'august', 'pending'),
(30, 3, 22, 'Kartik', 'august', 'accepted'),
(31, 4, 22, NULL, 'august', 'pending'),
(32, 2, 1, NULL, 'Amit', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accept_id` (`accept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendship`
--
ALTER TABLE `friendship`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`accept_id`) REFERENCES `facebook` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
