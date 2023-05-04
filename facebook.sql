-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 02:03 PM
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
(15, 'New', 'new123', '8596874585', 'Fb World', 'img/img1574910009.jpeg'),
(19, 'login', 'login123', '6352421125', 'world', 'img/img1588921337.jpg'),
(21, 'Today', 'today123', '7889645132', 'World', 'img/img1589177427.jpg'),
(22, 'August', 'aug123', '4578965412', 'Year', 'img/img1629304486.png');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facebook`
--
ALTER TABLE `facebook`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
