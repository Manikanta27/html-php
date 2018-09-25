-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 09:06 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `price`, `quantity`, `type`) VALUES
(6, 21, 1, 100, 2, 'tiffin'),
(7, 21, 2, 150, 5, 'tiffin'),
(12, 21, 1, 200, 2, 'room'),
(13, 21, 2, 150, 2, 'room');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `facilities` text NOT NULL,
  `insertedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insertedPersonId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `category`, `price`, `facilities`, `insertedDate`, `insertedPersonId`) VALUES
(1, 'single-room-001', 'single room', 200, 'dimension:10*10 feet\r\n1 bed sheet\r\n1 pillow\r\n1 chair\r\n1 study table \r\n', '2018-09-23 18:02:36', NULL),
(2, 'two-sharing-002', 'two sharing ', 150, '20*20 dimension \r\n2 bed \r\n2 pillow\r\n1 study table \r\n1 chair', '2018-09-23 18:10:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tiffin`
--

CREATE TABLE `tiffin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `facilities` text NOT NULL,
  `inserted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insert_by_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiffin`
--

INSERT INTO `tiffin` (`id`, `name`, `category`, `price`, `facilities`, `inserted_date`, `insert_by_id`) VALUES
(1, 'Veg combo', 'Veg', 100, 'Rice,Dal,2 Sabji,3Roti', '2018-09-23 06:19:00', NULL),
(2, 'NonVeg Combo', 'Non Veg', 150, 'Rice,Dal,Chicken Curry,3Roti', '2018-09-23 06:40:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `amount`, `date`) VALUES
(3, 24, 350, '2018-09-24 19:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `first_name`, `last_name`, `user_email`, `user_password`) VALUES
(1, 'firstname', 'lastname', 'useremail', 'userpassword'),
(2, 'Ahmad', 'Reshad', 'armirazai@gmail.com', '50404'),
(3, 'Ahmad', 'Reshad', 'armirazai@gmail.com', '5089'),
(4, 'Ahmad', 'Reshad', 'armirazai@gmail.com', '5089'),
(5, 'Ahmad', 'Reshad', 'armirazai@gmail.com', '5089'),
(6, 'Ahmad', 'Reshad', 'armirazai@gmail.com', '5089'),
(7, 'jnjshjks', 'k;j;s', 'armirazai@gmail.com', '540'),
(8, 'Thomas', 'daniel', '1232@gmail.com', '8008'),
(9, 'Sanket', 'Kumar', 'armirazai@gmail.com', 'ddc5f5e86d2f85e1b1ff763aff13ce'),
(10, 'Sanket', 'Kumar', 'armirazai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0'),
(11, 'Ahmad', 'Reshad', 'armirazai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0'),
(12, 'Ahmad', 'Reshad', 'armirazai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0'),
(13, 'Ahmad', 'Reshad', 'armirazai@gmail.com', 'a709909b1ea5c2bee24248203b1728'),
(14, 'rev', 'moh', 'revathy.m@mca.christuniversity', 'e53a0a2978c28872a4505bdb51db06'),
(15, 'rev ', 'lalal', 'appu023@test.com', '202cb962ac59075b964b07152d234b'),
(16, 'Ahmad', 'Reshad', 'armirazai@gmail.com', '0c12278389532e91c601af4c8adef7'),
(17, 'Bibek', 'Khushwaha', 'bee.kumar@gmail.com', '1234'),
(18, 'Bibek', 'Khushwaha', 'armirazai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0'),
(19, 'Bibek', 'Khushwaha', 'armirazai@gmail.com', '0c12278389532e91c601af4c8adef7'),
(20, 'Ahmad', 'Reshad', 'armirazai@gmail.com', 'a709909b1ea5c2bee24248203b1728a5'),
(21, 'Sanket', 'Kumar', 'sa@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0'),
(22, 'Sanket', 'Kumar', 'armirazai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(23, 'tony', 'manuew', 'tony@mgail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(24, 'Ahmad', 'Reshad', '1234@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(25, 'Sanket', 'Kumar', 'sanket@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiffin`
--
ALTER TABLE `tiffin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiffin`
--
ALTER TABLE `tiffin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
