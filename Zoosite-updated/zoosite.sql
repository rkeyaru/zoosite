-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2023 at 07:25 PM
-- Server version: 8.0.32
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoosite`
--

-- --------------------------------------------------------

--
-- Table structure for table `Animals`
--

CREATE TABLE `Animals` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` enum('m','f') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'm',
  `active` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `s_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Animals`
--

INSERT INTO `Animals` (`id`, `name`, `gender`, `active`, `s_name`) VALUES
(1, 'Fox           ', 'm', '1', 'Panthrea Leo'),
(2, 'Lion', 'm', '1', 'Panthera leo'),
(3, 'Lion', 'f', '1', 'Panthera leo'),
(4, 'Elephant', 'm', '1', 'Elephas maximus'),
(5, 'Leopard', 'f', '1', 'Panthera pardus'),
(6, 'Deer', 'f', '1', 'Cervidae'),
(7, 'Lion', 'f', '1', 'Bos gaurus'),
(8, '', 'f', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `animal_zoo_map`
--

CREATE TABLE `animal_zoo_map` (
  `zoo_id` int NOT NULL,
  `animal_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `animal_zoo_map`
--

INSERT INTO `animal_zoo_map` (`zoo_id`, `animal_id`) VALUES
(10, 1),
(5, 2),
(3, 3),
(4, 4),
(7, 5),
(7, 6),
(5, 7),
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `userId` int NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `role` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `email`, `password`, `userId`, `active`, `role`) VALUES
('Rahul', 'Kumar', 'rkeyaru@gmail.com', '1234', 1, '1', 'super admin'),
('Rahul', 'Kumar', 'rahulgurial2003@gmail.com', '1234', 2, '1', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zoo`
--

CREATE TABLE `zoo` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `state` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `area` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zoo`
--

INSERT INTO `zoo` (`id`, `name`, `active`, `state`, `city`, `area`) VALUES
(1, 'Arignar Anna Zoological Park ', '1', 'Tamilnadu', 'Chennai', 483),
(2, 'Nandankanan Zoological Park', '1', 'Odisha', 'Bhubneshwar', 234),
(3, 'Indira Gandhi Zoological Park', '1', 'Andhra Pradesh', 'Vishakapatnam', 321),
(4, 'Assam State Zoo cum Botanical Garden', '1', 'Assam', 'Guwahati', 423),
(5, 'Nehru Zoological Park', '1', 'Tailngana', 'Hyderabad', 99),
(6, 'Allen Forest Zoo', '1', 'Uttar Pradesh', 'Kanpur', 383),
(7, 'National Zoological Park', '1', 'New Delhi', 'Delhi', 33),
(8, 'Rajiv Gandhi Zoological Park', '1', 'Maharashtra', 'Pune', 49),
(9, 'Gopalur Zoo', '1', 'Himachal Pradesh', 'Kangra', 38),
(10, 'Himalyan Bird Park', '1', 'Himachal Pradesh', 'Shimla', 83);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Animals`
--
ALTER TABLE `Animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_zoo_map`
--
ALTER TABLE `animal_zoo_map`
  ADD KEY `animal_zoo_map_ibfk_1` (`animal_id`),
  ADD KEY `animal_zoo_map_ibfk_2` (`zoo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zoo`
--
ALTER TABLE `zoo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Animals`
--
ALTER TABLE `Animals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zoo`
--
ALTER TABLE `zoo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
