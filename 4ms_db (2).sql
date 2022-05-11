-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 05:19 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$/f5gomcBAtMfQWf1nVjtkuzH3CLSDzJsq2vpP.jN//mQErdHMXXA2');

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
(49, 11, 1, 2, '2022-05-09 21:53:07'),
(52, 12, 12, 1, '2022-05-11 21:05:27');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `itemid`, `rating`, `comment`, `date`) VALUES
(24, 11, 18, 4, 'The Flower is amazing', '2022-05-05 10:17:18');

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
  `stock` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `image`, `price`, `stock`, `date_added`) VALUES
(1, '3 pcs. Rose Bouquet', 'description', '3rb.jpg', 550, 100, '2022-05-01 22:07:31'),
(2, '6 pcs. Rose Bouquet', '', '6rb.jpg', 1210, 100, '2022-05-01 22:08:45'),
(3, '5 pcs. Rose w/ Tulip Bouquet', '', '5rtp.jpg', 1430, 100, '2022-05-01 22:10:31'),
(4, '3 pcs. Yellow China Rose Bouquet', '', '3ycrb.jpg', 1100, 100, '2022-05-01 22:11:27'),
(5, '3 pcs. Hot Pink Rose Bouquet', '', '3hprb.jpg', 550, 100, '2022-05-01 22:14:53'),
(6, '3 pcs. White Rose Bouquet', '', '3wrb.jpg', 550, 100, '2022-05-01 22:15:58'),
(7, '3 pcs. Rose w/ Sunflower Bouquet', '', '3rsb.jpg', 990, 100, '2022-05-02 01:03:46'),
(8, '3 pcs. Mini Assorted Rose', '', '3mar.jpg', 550, 100, '2022-05-02 01:04:50'),
(9, '6 pcs. White Rose Bouquet', '', '6wrb.jpg', 880, 100, '2022-05-02 01:05:36'),
(10, '6 pcs. Rose Assorted Color Bouquet', '', '6racb.jpg', 880, 100, '2022-05-02 01:06:22'),
(11, 'Mini Bouquet Back Aquadorian Rose', '', 'mbbar.jpg', 770, 97, '2022-05-02 01:07:07'),
(12, '3 pcs. Pomelo Rose Bouquet', '', '3prb.jpg', 550, 100, '2022-05-02 01:08:12'),
(13, '3 pcs. China Rose Bouquet', '', '3crb.jpg', 1100, 100, '2022-05-02 01:08:43'),
(14, '1 Dozen Pomelo Rose Bouquet', '', '1dprb.jpg', 1650, 98, '2022-05-02 01:09:27'),
(15, '3 pcs. Red Rose Bouquet w/ Happy Birthday Balloon', '', '3rrb_hbb.jpg', 715, 96, '2022-05-02 01:10:22'),
(16, 'Balloon Bouquet in Rose', '', 'bbr.jpg', 1650, 100, '2022-05-02 01:11:00'),
(17, '8 pcs. Red Rose Bouquet', '', '8rrb.jpg', 1100, 99, '2022-05-02 01:11:42'),
(18, '6 pcs. Assorted Tulips Bouquet', '', '6atb.jpg', 2420, 95, '2022-05-02 01:12:30');

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
  `date_updated` datetime DEFAULT NULL COMMENT 'This changes when admin accepts or client cancels the order\r\n',
  `ETA` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `date_of_day` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `itemid`, `address`, `date_added`, `status`, `date_updated`, `ETA`, `reason`, `quantity`, `total_price`, `date_of_day`) VALUES
(28, 12, 18, 'Purok 3 Mabolo St New Cabalan Olongapo City            ', '2022-05-11 10:46:35', 'Canceled', NULL, NULL, NULL, 1, 0, '2022-05-11'),
(29, 12, 15, 'Purok 3 Mabolo St New Cabalan Olongapo City            ', '2022-05-11 10:55:08', 'Canceled', '2022-05-11 11:14:17', NULL, NULL, 1, 715, '2022-05-11'),
(30, 12, 14, 'Purok 3 Mabolo St New Cabalan Olongapo City            ', '2022-05-11 11:14:48', 'Finished', '2022-05-11 11:59:26', NULL, NULL, 1, 1650, '2022-05-11'),
(31, 12, 18, 'Purok 3 Mabolo St New Cabalan Olongapo City            ', '2022-05-11 21:00:45', 'Finished', '2022-05-11 21:03:44', NULL, NULL, 1, 2420, '2022-05-11'),
(32, 12, 17, 'Purok 3 Mabolo St New Cabalan Olongapo City            ', '2022-05-11 21:05:37', 'Finished', '2022-05-11 22:59:18', '40', NULL, 1, 1100, '2022-05-11'),
(33, 12, 11, 'Purok 3 Mabolo St New Cabalan Olongapo City            ', '2022-05-11 21:05:37', 'Finished', '2022-05-11 22:59:23', '60', NULL, 3, 2310, '2022-05-11');

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
(7, 'vasg', 'gewh', 'ehw', 24, 'Female', 245, 'weh@gm', 'wegew', 'wegewh11111', 'ewgehe3r', '$2y$10$yMdJYqz8AIg2YN0cdyO7TunICvQikm1DlZJMl4Asw39RZQuz0Ch9m'),
(8, 'asasa', 'aaa', 'aaaaa', 21, 'Male', 1254789632, 'aaaa@gmail.com', 'San Felipe', 'None', 'aaaaaa', '$2y$10$69H1utt3Hqhy2FXgMY8VOOLioQlOWesSX4p6vAvorRKdzonFIXVlC'),
(9, 'sadad', 'ada', 'adada', 21, 'Female', 1234567891, 'sadsad@gmail.com', 'San Felipe, Zambales', 'None', 'eeeeee', '$2y$10$lT8Wew7PPvlmbfy93qSva.PMFaPHCYtxOSKkrK2BgLJezJqsz7KIK'),
(10, 'vewgew', 'ewgw', 'gweg', 2342, 'Male', 35325, '201910550@gordoncollege.edu.ph', 'w3wetew', 'None', 'qwerty', '$2y$10$PoCw965wirEjZK8JfPjJjO/8dvsBe51o10SEatAt3Jcrki6j0sj5K'),
(11, 'w', 'gwegewg', 'wge', 241, 'Male', 342423, 'gew@gwg', 'egegweg', 'None', 'sample', '$2y$10$pYALPRY8s2AiJHz0K.zXve.TZzf5x2Q5KKhCGHQE97aYUeGGMGwnS'),
(12, 'Von Denuelle', 'Liaga', 'Tandoc', 20, 'Male', 9123456587, '201910550@gordoncollege.edu.ph', 'Olongapo City Sports Complex, Gordon College,Philippine, Lungsod ng Olongapo, Zambales', 'Purok 3 Mabolo St New Cabalan Olongapo City', 'vondenuelle', '$2y$10$nWZZLrivG3zrMH63E5nyj.d6cHgSFtCKsyrmLr4s4YZBbIMD1fL8e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `userid` (`userid`),
  ADD KEY `itemid` (`itemid`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  ADD CONSTRAINT `ItemOnComments` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UsersOnComments` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ItemOnOrders` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
