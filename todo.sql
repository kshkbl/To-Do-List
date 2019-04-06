-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 04:46 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `user` int(11) UNSIGNED NOT NULL,
  `done` tinyint(1) NOT NULL,
  `colour` varchar(20) DEFAULT NULL,
  `subcount` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `user`, `done`, `colour`, `subcount`) VALUES
(162, 'Badrinath trek', 3, 0, 'critical', 7),
(168, 'groceries', 3, 1, 'mediumpriority', 7),
(169, 'visit Arjun', 3, 1, 'priority', 1),
(175, 'tfffhy', 4, 0, 'casual', NULL),
(176, 'gfhfh', 4, 0, 'casual', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subitems`
--

CREATE TABLE `subitems` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) UNSIGNED NOT NULL,
  `subtask` varchar(1000) NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subitems`
--

INSERT INTO `subitems` (`id`, `item_id`, `subtask`, `done`) VALUES
(51, 162, 'buy rucksack', 0),
(52, 162, 'buy first aid kit', 0),
(53, 162, 'buy knife', 0),
(54, 162, 'get meds', 0),
(55, 162, 'study map', 0),
(61, 168, 'bread', 0),
(62, 168, 'meat', 0),
(63, 168, 'veggies', 1),
(64, 168, 'pasta and rice', 0),
(65, 168, 'frozen food', 0),
(66, 168, 'dairy cheese eggs', 1),
(67, 168, 'brown rice', 0),
(68, 169, 'call him up', 1),
(72, 162, 'utfuyfoiy', 0),
(73, 162, 'jyfliygiu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_name`, `user_pwd`) VALUES
(3, 'kaushik', 'bala', 'kb@gmail.com', 'kshkbl', '$2y$10$Yv9Wj52FnKE1RPEabWbKeuTXgeaCz8Wx0SAUnq5iynRyXEGHVSYDa'),
(4, 'abhishek', 'kumar', 'hrfdkfddk@gmail.com', 'abhi', '$2y$10$j3gHq3.XFiVsV56M8GLwv.HSgvNrsdg0fUZyWDkzp4HEHJwWJQ0SW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `subitems`
--
ALTER TABLE `subitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `subitems`
--
ALTER TABLE `subitems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `subitems`
--
ALTER TABLE `subitems`
  ADD CONSTRAINT `subitem` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
