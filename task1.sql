-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 11:50 PM
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
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` int(11) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `firstName`, `lastName`, `email`, `password`, `address`, `street`, `town`, `Role`) VALUES
(4, 'Elisea', 'Mizzi', 'sdfd@sdf', '12345', ' 1', ' str', 2, 'Admin'),
(5, 'fea', 'fad', 'sdfa@asdf', '12345', 'adfs', 'sdfa', 1, ''),
(6, 'Mark', 'mangion', 'ms@gmail.com', '12345', 'asd', 'asd', 3, ''),
(7, 'Kaya', 'Mallia', 'kay@ma', '12345', 'asd', 'asd', 2, ''),
(8, 'r4', '44', '4@gmail.com', '12345', '4', '4', 4, ''),
(9, '5', '5', '5@gmail.com', '12345', '5', '5', 3, ''),
(10, 'r', '434', '434@gmail.com', '12345', '434', '434', 2, 'User'),
(11, 'x11', 'x11', 'x11@gmail.com', '12345', 'x11', 'x11', 3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `imageLink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `qty`, `price`, `imageLink`) VALUES
(4, 'Cisk Alcohol FREE x 6 cans 0.0% vol', 5, 12, 'assets/images/cisk.jpg '),
(5, 'Cisk Alcohol FREE x 6 cans 0.0% vol', 0, 12, 'assets/images/cisk.jpg '),
(6, 'Cisk Alcohol FREE x 6 cans 0.0% vol', 0, 12, 'assets/images/cisk.jpg '),
(7, 'Cisk Alcohol FREE x 6 cans 0.0% vol', 4, 12, 'assets/images/cisk.jpg '),
(11, 'Pinta English IPA Pale Ale Beer 5.9% vol', 0, 5, 'assets/images/pinta english.jpg'),
(12, 'Pinta English IPA Pale Ale Beer 5.9% vol', 0, 5, 'assets/images/pinta english.jpg'),
(14, 'Pinta English IPA Pale Ale Beer 5.9% vol', 0, 5, 'assets/images/pinta english.jpg'),
(15, 'Pinta English IPA Pale Ale Beer 5.9% vol', 0, 5, 'assets/images/pinta english.jpg'),
(16, 'Pinta English IPA Pale Ale Beer 5.9% vol', 5, 5, 'assets/images/pinta english.jpg'),
(17, 'Pinta English IPA Pale Ale Beer 5.9% vol', 0, 5, 'assets/images/pinta english.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `imageLink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `imageLink`) VALUES
(1, 'assets/images/profile.png'),
(2, 'assets/images/cart.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `orderProductId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `confirmed` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `bankId` int(40) NOT NULL,
  `cardNumber` int(100) NOT NULL,
  `accountHolder` varchar(255) DEFAULT NULL,
  `cvv` int(3) NOT NULL,
  `expirationDate` date DEFAULT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `imageLink` varchar(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `imageLink`, `productName`, `price`, `qty`) VALUES
(1, 'assets/images/cisk.jpg ', '', 12, 100),
(2, 'assets/images/pinta english.jpg', '', 5, 100),
(3, 'assets/images/pinta german.jpg', 'Pinta German Style Blonde Ale Beer 4.9%', 5, 100),
(4, 'assets/images/Savina Amarettu Almond Liqueur.jpg', 'Savina Amarettu Almond Liqueur', 16.1, 100),
(5, 'assets/images/Savina cherry Liquer with rum.jpg', 'Savina Cherry Liqueur Spiced with Kirsch', 21.8, 100),
(6, 'assets/images/Savina cocinut Liquer with rum.jpg', 'Savina Coconut Liqueur Spiced with Rum', 21.18, 100),
(8, '', 'test', 0, 0),
(9, '', 'test3', 0, 0),
(10, '', 'TEST', 0, 0),
(11, '', 't', 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(3, 'User2'),
(5, 'Subscriberw'),
(9, 'testtt');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `region` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`id`, `name`, `region`) VALUES
(1, 'Mqabba', 1),
(2, 'Zurrieq', 2),
(3, 'Hal Safi', 3),
(4, 'Hal Luqa', 4),
(5, 'Qrendi', 5),
(6, 'Gudja', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `streetId` int(200) NOT NULL,
  `paymentId` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
