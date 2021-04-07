-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 03:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pets_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `age` int(11) NOT NULL,
  `fur` varchar(15) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `category`, `breed`, `weight`, `height`, `age`, `fur`, `cost`) VALUES
(1, 'dog', 'labrador', 11.3, 30, 2, 'WHITE', 800),
(2, 'cat', 'labrador', 11.3, 30, 2, 'WHITE', 800),
(3, 'cat', 'sdx', 2, 2, 2, 'qs', 2),
(5, 'cat', 'sdx', 17, 5, 6, 'white', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

CREATE TABLE `birds` (
  `birds_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `type` varchar(25) NOT NULL,
  `noise` varchar(10) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `cs_fname` varchar(10) NOT NULL,
  `cs_minit` varchar(10) NOT NULL,
  `cs_lname` varchar(10) NOT NULL,
  `cs_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `cs_fname`, `cs_minit`, `cs_lname`, `cs_address`) VALUES
(7, 'password', 'bn', 'nb', 'j');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_type` varchar(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `belongs_to` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `p_name`, `p_type`, `cost`, `belongs_to`) VALUES
(1, 'qs', 'sdf', 800, 'dog'),
(2, 'jj', 'nnn', 1, 'gf');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details_animals`
--

CREATE TABLE `sales_details_animals` (
  `sd_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details_birds`
--

CREATE TABLE `sales_details_birds` (
  `sd_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `birds_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'zakaria', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`birds_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `sales_details_animals`
--
ALTER TABLE `sales_details_animals`
  ADD PRIMARY KEY (`sd_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `sales_details_animals_ibfk_3` (`product_id`);

--
-- Indexes for table `sales_details_birds`
--
ALTER TABLE `sales_details_birds`
  ADD PRIMARY KEY (`sd_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `birds_id` (`birds_id`),
  ADD KEY `sales_details_birds_ibfk_3` (`Product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `birds`
--
ALTER TABLE `birds`
  MODIFY `birds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_details_animals`
--
ALTER TABLE `sales_details_animals`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_details_birds`
--
ALTER TABLE `sales_details_birds`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_details_animals`
--
ALTER TABLE `sales_details_animals`
  ADD CONSTRAINT `sales_details_animals_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_details_animals_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_details_animals_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`products_id`);

--
-- Constraints for table `sales_details_birds`
--
ALTER TABLE `sales_details_birds`
  ADD CONSTRAINT `sales_details_birds_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_details_birds_ibfk_2` FOREIGN KEY (`birds_id`) REFERENCES `birds` (`birds_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
