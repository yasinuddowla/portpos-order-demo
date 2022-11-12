-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 08:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portpos-payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `street` char(100) NOT NULL,
  `city` char(100) NOT NULL,
  `state` char(100) NOT NULL,
  `zipcode` char(100) NOT NULL,
  `country` char(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `street`, `city`, `state`, `zipcode`, `country`, `created_at`, `updated_at`) VALUES
(1, 'House 1, Road1, Gulshan 1', '', 'Dhaka', '1212', 'Bangladesh', '2022-11-13 00:48:10', '2022-11-13 00:48:10'),
(2, 'House 1, Road1, Gulshan 1', '', 'Dhaka', '1212', 'Bangladesh', '2022-11-13 00:48:53', '2022-11-13 00:48:53'),
(3, 'House 1, Road1, Gulshan 1', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', '2022-11-13 00:49:13', '2022-11-13 00:49:13'),
(4, 'House 1, Road1, Gulshan 1', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', '2022-11-13 00:49:32', '2022-11-13 00:49:32'),
(5, 'House 1, Road1, Gulshan 1', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', '2022-11-13 00:51:16', '2022-11-13 00:51:16'),
(6, 'House 1, Road1, Gulshan 1', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', '2022-11-13 01:08:30', '2022-11-13 01:08:30'),
(7, 'House 1, Road1, Gulshan 1', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', '2022-11-13 01:08:42', '2022-11-13 01:08:42'),
(8, 'House 1, Road1, Gulshan 1', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', '2022-11-13 01:08:48', '2022-11-13 01:08:48'),
(9, 'House 1, Road1, Gulshan 1', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', '2022-11-13 01:09:33', '2022-11-13 01:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `phone` char(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Test name', 'test@gmail.com', '0156789425', '2022-11-12 23:29:29', '2022-11-12 23:29:29'),
(2, 'Test Name', 'test@gmail.com', '01569874685', '2022-11-13 00:13:59', '2022-11-13 00:13:59'),
(3, 'Test Name', 'test@gmail.com', '01569874685', '2022-11-13 00:14:03', '2022-11-13 00:14:03'),
(4, 'Test Name', 'test@gmail.com', '01569874685', '2022-11-13 00:16:35', '2022-11-13 00:16:35'),
(5, 'Test Name', 'test@gmail.com', '01569874685', '2022-11-13 00:22:08', '2022-11-13 00:22:08'),
(6, 'Test Name', 'test@gmail.com', '01569874685', '2022-11-13 00:24:16', '2022-11-13 00:24:16'),
(7, 'Test Name', 'test@gmail.com', '01569874685', '2022-11-13 00:25:15', '2022-11-13 00:25:15'),
(8, 'Test Name', 'test@gmail.com', '01569874685', '2022-11-13 00:29:34', '2022-11-13 00:29:34'),
(9, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 00:35:53', '2022-11-13 00:35:53'),
(10, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 00:48:10', '2022-11-13 00:48:10'),
(11, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 00:48:53', '2022-11-13 00:48:53'),
(12, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 00:49:13', '2022-11-13 00:49:13'),
(13, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 00:49:32', '2022-11-13 00:49:32'),
(14, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 00:51:16', '2022-11-13 00:51:16'),
(15, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 01:08:30', '2022-11-13 01:08:30'),
(16, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 01:08:42', '2022-11-13 01:08:42'),
(17, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 01:08:48', '2022-11-13 01:08:48'),
(18, 'Robbie Amell', 'test@example.com', '801234567893', '2022-11-13 01:09:33', '2022-11-13 01:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`id`, `customer_id`, `address_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 18, 9, 1, '2022-11-13 01:09:33', '2022-11-13 01:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paryment_url` char(255) NOT NULL,
  `status` char(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` char(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Samsung Mobile', 'some details goes here', '2022-11-13 00:25:15', '2022-11-13 00:25:15'),
(2, 'Samsung Mobile', 'some details goes here', '2022-11-13 00:29:34', '2022-11-13 00:29:34'),
(3, 'Samsung Mobile', 'some details goes here', '2022-11-13 00:35:53', '2022-11-13 00:35:53'),
(4, 'Samsung Mobile', 'some details goes here', '2022-11-13 00:51:16', '2022-11-13 00:51:16'),
(5, 'Samsung Mobile', 'some details goes here', '2022-11-13 01:12:30', '2022-11-13 01:12:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_address_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
