-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2023 at 02:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `green_house` varchar(50) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `job` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `position`, `age`, `full_name`, `address`, `username`, `green_house`, `profile_photo`, `address2`, `city`, `state`, `zipcode`, `phone`, `company`, `job`, `country`) VALUES
(1, 'test@gmail.com', 'test', 'admin', 'Designer', 59, 'Michael Mamman', NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'MICHAELYAK66@GMAIL.COM', 'test', 'investor', 'HR', 45, 'MICHAEL john MAMMAN', '11 DKM JOS', 'test@gmail.com', 'green 1', '6465e91628d52_Nature19.jpg', '11 DKM JOS', 'JOS', 'Plateau', '930272', NULL, NULL, NULL, NULL),
(12, 'MICHAELYAK66@GMAIL.COM', 'test', 'staff', 'Finance', 23, 'MICHAEL john MAMMAN', '11 DKM JOS', 'test@gmail.com', 'green 1', '6465e91628d52_Nature19.jpg', '11 DKM JOS', 'JOS', 'Plateau', '930272', NULL, NULL, NULL, NULL),
(13, 'MICHAELYAK66@GMAIL.COM', 'test', 'staff', 'Finance', 50, 'MICHAEL john MAMMAN', '11 DKM JOS', 'test@gmail.com', 'green 1', '6465e91628d52_Nature19.jpg', '11 DKM JOS', 'JOS', 'Plateau', '930272', NULL, NULL, NULL, NULL),
(14, 'rapha@gmail.com', 'test', 'staff', 'Dynamic Division Officer	', 55, 'Rapha Scody', '236267dshjdfs', 'scody', 'green 1', '6465e91628d52_Nature19.jpg', '11 DKM JOS', 'JOS', 'Plateau', '930272', '456776565', 'Johns and Giles Traders', 'Finance Manager', 'Tokyo'),
(15, 'blessing21@gmail.com', 'test', 'staff', '0', 21, 'Blessing John', '24343, main street', 'blessing21', 'Green House 5', '6465e91628d52_Nature19.jpg', 'Studio', 'Abuja', 'Federal Capital Territory', '3434', NULL, NULL, NULL, NULL),
(16, 'tin@gmail.com', 'test', 'staff', '0', 34, 'Tin Jay', 'dsdsdsds', 'tin', 'Green 7', '6465e91628d52_Nature19.jpg', 'studio', 'kaduba', 'Kaduna', '343434', NULL, NULL, NULL, NULL),
(17, 'Lin@gmail.com', 'test', 'staff', 'HR', 67, 'Lin Woe', 'hong kong', 'lin@gmail.com', 'Green 2', '6465e91628d52_Nature19.jpg', 'Studio', 'Keffi', 'Nassarawa', '43434', NULL, NULL, NULL, NULL),
(39, 'higwong@gmail.com', 'test', 'investor', 'Finance', 45, 'Hig Wong', '1232, main street', 'wong250', 'Green 9', '64668919b2746_Nature19.jpg', 'Studio', 'Jos', 'Plateau', '34343', '07030034134', 'Green and Sretch', 'Finance Manager', 'Ghana'),
(40, 'michaelyak66@gmail.com', '$2y$10$npvipe3Uox5jkmftIY3aEO07XJZxVzUD/8CZj1x83dyNaTwh18H6q', 'admin', 'Administrator', 33, 'Michael Mamman', '1232, manchester', 'admin', 'Green 4', '6467539e31a8f_Nature19.jpg', 'studio', 'FCT', 'Abuja', '223232', '07030034134', 'Green and Strectch', 'System Admin', 'Nigeria'),
(41, 'peter@gmail.com', '$2y$10$dDf9FLl7n2qp0GAqPNaplOZo7f6uO7LruhuTmU.RDQXWO8CVg5CnC', 'staff', 'HR', 56, 'Peter Drury', 'manchester', 'peter25', 'Green 8', '6465e91628d52_Nature19.jpg', 'studio', 'london', 'Enugu', '343434', '08066775544', 'Premeir League', '', 'United Kingdom'),
(42, 'wo@gmail.com', '$2y$10$TKsznDs0YkjPR8X1ws.o8ejYqgmawU9AQgWBfd/wlP8XveJtrBcxa', 'investor', 'investor', 44, 'hiw wo', '1223, street', 'wo230', 'Green 7', '6466b5e05d3d9_Nature30.jpg', 'studio', 'Abuja', 'Federal Capital Territory', '3434', '', '', '', ''),
(43, 'wick@gmail.com', '$2y$10$MSDn5A1x4SMb.w1LwA19QOGyMOdZwvG1vL7gbmQtLfcoXbOIvRBEO', 'staff', 'investor', 50, 'John Wick', 'wick street', 'wick', 'Green 2', '64664cead786f_Nature19.jpg', 'Studio', 'Abuja', 'Federal Capital Territory', '3434', '', 'Greer Middleton Plc', '', ''),
(44, 'dog@gmail.com', '$2y$10$gc0W5yg81P2YNVOWIBEcJ.2Hs3aT.aC2fo12AX4vEtc0IKVySzN1y', 'investor', 'investor', 78, 'dog white', '343434', 'dog55', 'Green 7', '646688aa22c3a_Nature19.jpg', 'studio', 'kaduna', 'Kaduna', '3433443', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
