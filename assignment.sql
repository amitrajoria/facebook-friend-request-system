-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 02:05 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
-- Table structure for table `facebook`
--

CREATE TABLE `facebook` (
  `id` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facebook`
--

INSERT INTO `facebook` (`id`, `username`, `password`, `contact`, `city`, `img`) VALUES
(1, 'Amit', '123', '6359856214', 'california', 'img/img1567441183.jpg'),
(2, 'Rajoria', '111', '9854120154', 'Los angeles', 'img/img1567441301.jpg'),
(3, 'Kartik', '222', '0158963247', 'Banglore', 'img/img1567441350.jpg'),
(4, 'Rajat', '333', '3215654879', 'Hydrabad', 'img/img1567441397.jpg'),
(5, 'Hament', '333', '8957486256', 'Facebook', 'img/img1567479253.png'),
(6, 'System', '000', '9856895478', 'B2E', 'img/img1567479294.jpg'),
(7, 'Lucky', '0123', '6589654775', 'Agra', 'img/img1567480150.jpg'),
(8, 'Raghu', '....', '5214875962', 'Delhi', 'img/img1567564905.jpg'),
(9, 'Rohit', '999', '5689574123', 'Noida', 'img/img1567564964.jpg'),
(10, 'shivam', '999', '5896475852', 'DEI', 'img/img1568021654.jpg'),
(11, 'Subodh', '555', '6589745523', 'Agra', 'img/img1568022074.jpg'),
(12, 'Yash', 'yash', '5241236598', 'Laptop', 'img/img1568908192.jpg'),
(13, 'Teenu', 'teenu', '5847859642', 'MI', 'img/img1570456876.jpg'),
(14, 'Jatin', '000', '9878565458', 'Dubai', 'img/img1573487416.jpg'),
(15, 'New', 'new123', '8596874585', 'Fb World', 'img/img1574910009.jpeg');

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
(12, 1, 12, NULL, 'Yash', 'pending'),
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
(23, 4, 13, NULL, 'Teenu', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `gst` int(5) DEFAULT NULL,
  `img_url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `name`, `gst`, `img_url`) VALUES
(1, 'Amit', 4, 'img/img.jpg'),
(2, 'Rajoria', 12, 'img/img2.jpg'),
(3, 'kartikeya', 5, 'img/img3.jpg'),
(4, 'Rajat', 8, 'img/img4.jpg'),
(5, 'Rohit', 14, 'img/img5.jpg'),
(7, 'Hament', 3, 'img/img7.jpg'),
(9, 'Mohan', 89, 'img/img.jpg'),
(11, 'mohan', 56, 'img/img1564643129.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facebook`
--
ALTER TABLE `facebook`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `img` (`img`);

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accept_id` (`accept_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facebook`
--
ALTER TABLE `facebook`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `friendship`
--
ALTER TABLE `friendship`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
