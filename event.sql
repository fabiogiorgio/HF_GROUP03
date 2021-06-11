-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 04:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Manager customer';

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `password`, `created_at`, `email`) VALUES
(4, 'admin', '$2y$10$kvUIzSoiXRgsKpdPD0j8G.f6rBOOUEeD/Aq24EuEAser3ayIAgIcC', '2021-05-28 15:06:57', 'admin@gmail.com'),
(5, 'Chien Le', '$2y$10$6eMNGbwHYs1bJlt8Hs/hm.6S2v2YuQ575Wjt/Iz.ZbOsVvod2Cr0O', '2021-05-28 15:26:44', 'chien@gmail.com'),
(6, 'Luan Nguyen', '$2y$10$.aHvKFhWZvZPKFxzmCFJqen6sg/vqEyiTOTPACw7j3TrWQd5eQHfC', '2021-05-30 10:24:02', 'nguyenhuuluan17@gmail.com'),
(7, 'Luan Nguyen', '$2y$10$CVKy.jm4hx91ETmoA1524enNJsa.MAN9CU1vq35Od9.YeOz7ExMDe', '2021-05-30 19:52:17', 'luannh@magenest.com'),
(8, 'Hy Quynh', '$2y$10$ZzTt6ZiucJx2xa4mBj5iLeCI4HqlLNIy/2b0a53IU7WW8bDX2RB4i', '2021-05-30 19:57:15', 'hyquynh123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `qty` int(10) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `ticket_id` int(10) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `order_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `status`, `qty`, `price`, `ticket_id`, `customer_id`, `created_at`, `order_code`) VALUES
(1, 1, 1, 450, 16, 6, '2021-05-30 19:50:29', 'ch_1IwueWCeFtqBD4AqteOq6Voa'),
(2, 2, 1, 50, 14, 7, '2021-05-30 19:56:09', 'ch_1Iwuk0CeFtqBD4Aqr8uQLuSf'),
(3, 1, 1, 450, 16, 8, '2021-05-30 19:58:54', 'ch_1IwumfCeFtqBD4Aqafh6ssH1'),
(4, 0, 1, 450, 16, 6, '2021-05-31 06:24:28', 'ch_1Ix4Y4CeFtqBD4AqSLoL47s5'),
(5, 1, 1, 1000, 26, 6, '2021-06-01 14:35:30', 'ch_1IxYgnHcvrzMwowCiTMndtvH');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(10) NOT NULL,
  `category` int(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `from` datetime DEFAULT NULL,
  `to` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ticket';

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `category`, `image`, `price`, `title`, `description`, `from`, `to`, `qty`, `location`, `session`, `created_at`) VALUES
(1, 1, '2021_05_30_15_06_28brand3.png', 50, 'Gare du Nord', 'sdf', '2021-07-01 22:00:00', '2021-07-28 22:00:00', 200, 'sdf', 'sdf', '2021-05-25 15:45:39'),
(2, 2, '2021_05_30_15_05_49brand1.png', 150, 'sdf', 'description', '2021-08-17 22:00:00', '2021-11-08 22:00:00', 100, 'Patronaat Main Hall', 'sdf', '2021-05-25 15:50:53'),
(3, 3, '2021_05_30_15_06_42brand4.png', 50, '#000000 - Ultra Black', 'asds', '2021-05-30 22:00:00', '2021-05-31 22:00:00', 200, 'Patronaat Main Hall', 'asde', '2021-05-25 15:51:41'),
(4, 1, '2021_05_30_15_06_55brand5.png', 50, 'Gare du Nord', '', '2021-05-30 22:00:00', '2021-05-31 22:00:00', 123, 'Patronaat Main Hall', '12a', '2021-05-27 14:54:33'),
(5, 1, '2021_05_30_15_07_12brand6.png', 123, 'Gare du Nord', '', '2021-05-30 22:00:00', '2021-05-31 22:00:00', 123, 'Patronaat Main Hall', 'sdas', '2021-05-27 14:58:48'),
(6, 1, '2021_05_30_15_07_29Tiktok.png', 50, 'Gare du Nord', '', '2021-05-30 22:00:00', '2021-05-31 22:00:00', 123, 'Patronaat Main Hall', 'sdf', '2021-05-27 15:02:17'),
(7, 1, '2021_05_30_15_07_43gn.png', 91, 'Gare du Nord', '', '2021-05-30 22:00:00', '2021-05-31 22:00:00', 16, 'test', 'test', '2021-05-27 15:07:08'),
(8, 1, '2021_05_30_15_08_34mb.jpg', 50, 'Gare du Nord', 'test', '2021-05-30 22:00:00', '2021-05-31 22:00:00', 123, 'test', 'test', '2021-05-27 15:09:36'),
(9, 2, '2021_05_30_15_08_47Zing mp3.png', 50, 'sdf', 'description', '2021-05-30 22:00:00', '2021-05-31 22:00:00', 100, 'Patronaat Main Hall', 'sdf', '2021-05-25 15:50:53'),
(10, 2, '2021_05_30_15_09_06nct.png', 50, 'sdf', 'description', '2021-05-30 22:00:00', '2021-05-31 22:00:00', 100, 'Patronaat Main Hall', 'sdf', '2021-05-25 15:50:53'),
(14, 2, '2021_05_27_22_07_17download (1).png', 50, 'sdf', 'description', '2021-05-31 22:00:00', '2021-06-05 22:00:00', 99, 'Patronaat Main Hall', 'sdf', '2021-05-25 15:50:53'),
(16, 3, '2021_05_28_21_49_47download (1).png', 450, 'Rectangle', 'This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', '2021-05-31 22:00:00', '2021-06-03 22:00:00', 119, 'asda', 'asd', '2021-05-28 14:49:47'),
(24, 1, '2021_05_30_15_04_55brand2.png', 100, 'Ticket', 'Ticket is wonderful', '2021-05-30 19:57:00', '2021-05-31 19:57:00', 100, 'Italia', '10', '2021-05-30 12:57:59'),
(25, 2, '2021_05_30_22_02_211.jpg', 10000, 'Shoes event', 'abc', '2021-05-31 03:02:00', '2021-06-05 03:02:00', 100, 'American', 'abc', '2021-05-30 20:02:21'),
(26, 1, '2021_06_01_16_31_34brand3.png', 1000, 'All Access Pass', '123', '2021-07-01 22:31:00', '2021-07-19 21:31:00', 99, 'abc', 'abc', '2021-06-01 14:31:34'),
(27, 2, '2021_06_01_16_32_42brand5.png', 1000, 'All Access Pass', '100', '2021-08-01 21:32:00', '2021-08-03 21:32:00', 100, 'abc', 'abc', '2021-06-01 14:32:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TicketOrder` (`ticket_id`),
  ADD KEY `FK_CustomerOrder` (`customer_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_CustomerOrder` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `FK_TicketOrder` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
