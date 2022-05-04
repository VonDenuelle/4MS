-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 11:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4ms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `itemid`, `quantity`, `date_added`) VALUES
(12, 6, 23, 2, '2022-03-20 17:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` double NOT NULL,
  `color` varchar(255) NOT NULL,
  `custom` tinyint(1) NOT NULL,
  `stock` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `image`, `price`, `color`, `custom`, `stock`, `date_added`) VALUES
(20, 'Red Roses', 'Red is redder than red', 'redroses.jpg', 200, 'red', 0, 100, '2022-03-20 17:25:45'),
(21, 'Bridal Boque', 'marrying for chads', 'bridalboque.jpg', 215, 'white', 0, 100, '2022-03-20 17:26:14'),
(22, 'Pink Rose', 'Pink is the color of your skin', 'pinkrose.jpg', 325, 'pink', 0, 100, '2022-03-20 17:26:52'),
(23, 'Purple China Rose', 'Purple? China? Must be roses', 'purplechinarose.jpg', 185, 'purple', 0, 100, '2022-03-20 17:27:25'),
(24, 'Yellow Roses', 'Escanor\'s Sunshine-desu', 'yellowrose.jpg', 275, 'yellow', 0, 100, '2022-03-20 17:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `address` text NOT NULL,
  `date_added` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `date_updated` datetime DEFAULT NULL,
  `ETA` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `itemid`, `address`, `date_added`, `status`, `date_updated`, `ETA`, `reason`, `quantity`) VALUES
(7, 6, 20, 'sample addreess 1', '2022-03-20 17:30:32', 'Pending', NULL, NULL, NULL, 0),
(8, 6, 24, 'second address', '2022-03-20 17:30:32', 'Pending', NULL, NULL, NULL, 0);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `UpdateItemStock` AFTER UPDATE ON `orders` FOR EACH ROW UPDATE items i 
INNER JOIN orders o
ON i.id = o.itemid
SET i.stock = (i.stock - o.quantity)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL DEFAULT 'None',
  `username` varchar(25) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `age`, `gender`, `phone`, `email`, `address1`, `address2`, `username`, `password`) VALUES
(5, 'wg', 'aeh', 'eahe', 32, 'Male', 325234364, 'he@gmail.com', 'ewahhehe', 'None', 'wqtwhahe', '$2y$10$B4Ws9.c4umbXcDpcT5wffuidt6nqVITqzFh9r/54hCQHHzlAbMaBq'),
(6, 'Von', 'Denuelle', 'Tandoc', 125, 'Male', 9458744092, 'test@gmail.com', 'sample addreess 1', 'second address', 'vonvon', '$2y$10$nq0/2V.9sqdwPjWcOsGpK.0IkNC6uhEOS8oESKvC9y4gCTRQRBxbG'),
(7, 'vasg', 'gewh', 'ehw', 24, 'Female', 245, 'weh@gm', 'wegew', 'wegewh11111', 'ewgehe3r', '$2y$10$yMdJYqz8AIg2YN0cdyO7TunICvQikm1DlZJMl4Asw39RZQuz0Ch9m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`,`itemid`),
  ADD KEY `itemOnCart` (`itemid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemid` (`itemid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `itemOnCart` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userOnCart` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `itemOnComments` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userOnComments` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `itemOnOrder` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userOnOrder` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
