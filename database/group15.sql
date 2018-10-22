-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2018 at 05:27 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group15`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `category_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`category_id`, `description_id`, `name`) VALUES
(1, 1, 'Pull'),
(2, 2, 'shoes'),
(3, 3, 'bic');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `client_id` int(11) NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`client_id`, `email`, `username`, `password`, `firstname`, `lastname`, `delivery_address`, `type`) VALUES
(1, 'admin@gmail.com', 'admin', '$6$rounds=5000$qDkTfHiTaWeaIOgz$Q9IiZgZYSDc5Q..Pnv.jooJIwu66CmB2xTtMumGDv208I3METsYb5XW/Ms/fAbpQtvrktQNVIFlDN0474WZ6w0', 'admin', 'admin', 'nothing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Description`
--

CREATE TABLE `Description` (
  `description_id` int(11) NOT NULL,
  `french` text COLLATE utf8_unicode_ci NOT NULL,
  `english` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Description`
--

INSERT INTO `Description` (`description_id`, `french`, `english`) VALUES
(1, 'pull de qualité supérieure', 'high quality sweater'),
(2, 'chaussures', 'shoes'),
(3, 'stylo', 'bic');

-- --------------------------------------------------------

--
-- Table structure for table `Order_details`
--

CREATE TABLE `Order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `product_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`product_id`, `description_id`, `category_id`, `name`) VALUES
(1, 1, 1, 'pull FACSA'),
(2, 1, 1, 'pull HEC');

-- --------------------------------------------------------

--
-- Table structure for table `Product_order`
--

CREATE TABLE `Product_order` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_price` float NOT NULL,
  `ship_address` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Sku`
--

CREATE TABLE `Sku` (
  `sku_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Sku`
--

INSERT INTO `Sku` (`sku_id`, `price`, `quantity`, `sold`) VALUES
('PULL_FACSA_L', 30, 4, 0),
('PULL_FACSA_M', 30, 8, 0),
('PULL_FACSA_S', 30, 10, 0),
('PULL_FACSA_XL', 35, 5, 0),
('PULL_FACSA_XXL', 35, 2, 0),
('PULL_FACSA_XXXL', 35, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Variant`
--

CREATE TABLE `Variant` (
  `variant_id` int(11) NOT NULL,
  `sku_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Variant`
--

INSERT INTO `Variant` (`variant_id`, `sku_id`, `product_id`, `attribute`, `value`) VALUES
(1, 'PULL_FACSA_S', 1, 'size', 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `description_id` (`description_id`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `mail` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `Description`
--
ALTER TABLE `Description`
  ADD PRIMARY KEY (`description_id`);

--
-- Indexes for table `Order_details`
--
ALTER TABLE `Order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `description_id` (`description_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `Product_order`
--
ALTER TABLE `Product_order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `client_id` (`client_id`);

--
-- Indexes for table `Sku`
--
ALTER TABLE `Sku`
  ADD PRIMARY KEY (`sku_id`);

--
-- Indexes for table `Variant`
--
ALTER TABLE `Variant`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `sku_id` (`sku_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Description`
--
ALTER TABLE `Description`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Order_details`
--
ALTER TABLE `Order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Product_order`
--
ALTER TABLE `Product_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Variant`
--
ALTER TABLE `Variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Category`
--
ALTER TABLE `Category`
  ADD CONSTRAINT `Category_ibfk_1` FOREIGN KEY (`description_id`) REFERENCES `Description` (`description_id`);

--
-- Constraints for table `Order_details`
--
ALTER TABLE `Order_details`
  ADD CONSTRAINT `Order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Product_order` (`order_id`);

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`description_id`) REFERENCES `Description` (`description_id`),
  ADD CONSTRAINT `Product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `Category` (`category_id`);

--
-- Constraints for table `Product_order`
--
ALTER TABLE `Product_order`
  ADD CONSTRAINT `Product_order_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Customer` (`client_id`);

--
-- Constraints for table `Variant`
--
ALTER TABLE `Variant`
  ADD CONSTRAINT `Variant_ibfk_1` FOREIGN KEY (`sku_id`) REFERENCES `Sku` (`sku_id`),
  ADD CONSTRAINT `Variant_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
