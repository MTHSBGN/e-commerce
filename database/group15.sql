-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2018 at 04:39 PM
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
(2, 2, 'books'),
(3, 3, 'drink'),
(4, 4, 'food'),
(5, 5, 'goodies');

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
(2, 'livres', 'books'),
(3, 'stylo', 'bic'),
(4, 'fournitures scolaires', 'furnitures'),
(5, 'gadgets relatifs aux facultés', 'university goodies'),
(6, 'Livre sur l\'histoire de liège', 'Book about Liège history'),
(7, 'Livre sur les événements de Liège', 'Book about events in Liège'),
(8, 'Pins hec', 'Pins hec'),
(9, 'Badge hec', 'Badge hec'),
(10, 'Sac en coton hec', 'Sac en  coton hec'),
(11, 'gourde hec', 'gourde hec'),
(12, 'gourde hec alumni', 'gourde hec alumni'),
(13, 'casquette', 'casquette'),
(14, 'clé usb', 'usb key'),
(15, ' tasses hec', 'mug hec'),
(16, 'bic hec', 'bic hec'),
(17, 'pèse bagage', 'pèse bagage'),
(18, 'bloc note A5 hec', 'bloc note A5 HEC'),
(19, 'bic prodir', 'bic prodir'),
(20, 'farde hec', 'farde hec'),
(21, 'DVD maigret collection', 'DVD maigret collection'),
(22, 'bière curtius', 'curtius beer'),
(23, 'Bouteille de Vin rouge Haut Médoc Les Allées de Charmail 2012', 'Bouteille de Vin rouge Haut Médoc Les Allées de Charmail 2012'),
(24, 'Bouteille de vin brut “l’Insoumise', 'Bouteille de vin brut “l’Insoumise'),
(25, 'champange laurent perrier', 'champange laurent perrier'),
(26, 'bonbon menthe', 'bonbon menthe'),
(27, 'règlette chocolat', 'règlette chocolat');

-- --------------------------------------------------------

--
-- Table structure for table `Order_details`
--

CREATE TABLE `Order_details` (
  `order_id` int(11) NOT NULL,
  `sku_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
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
(2, 1, 1, 'pull HEC'),
(3, 6, 2, 'Histoire de liège'),
(4, 7, 2, 'Liège - Cité d\'événements'),
(5, 8, 5, 'Pins'),
(6, 9, 5, 'Badge'),
(7, 10, 5, 'SAC HEC'),
(8, 11, 5, 'gourde hec'),
(9, 12, 5, 'gourde hec alumni'),
(10, 13, 5, 'Casquette HEC'),
(11, 14, 5, 'usb'),
(12, 15, 5, 'tasse hec'),
(13, 16, 5, 'bic hec'),
(14, 17, 5, 'Pèse bagages'),
(15, 18, 5, 'bloc note A5 HEC'),
(16, 19, 5, 'bic prodir'),
(17, 20, 5, 'farde hec'),
(18, 21, 5, 'DVD maigret'),
(19, 22, 3, 'Curtius'),
(20, 23, 3, 'Haut Médoc'),
(21, 24, 3, 'insoumise'),
(22, 25, 3, 'champagne LP'),
(23, 26, 4, 'bonbon'),
(24, 27, 4, 'chocolat darcis');

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
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `available` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Sku`
--

INSERT INTO `Sku` (`sku_id`, `product_id`, `price`, `available`, `sold`) VALUES
('BADGE_HEC', 6, 0.3, 5, 0),
('BAG_HEC', 7, 3, 5, 0),
('BIC_HEC_BLUE', 13, 0.6, 0, 0),
('BIC_HEC_GREEN', 13, 0.6, 3, 0),
('BIC_HEC_PURPLE', 13, 0.6, 3, 0),
('BIC_HEC_YELLOW', 13, 0.6, 3, 0),
('BONBON_HEC', 23, 1.15, 3, 0),
('BOOK_LG_DE', 3, 50, 5, 0),
('BOOK_LG_EN', 3, 50, 5, 0),
('BOOK_LG_EVENT', 4, 23, 5, 0),
('BOOK_LG_FR', 3, 50, 10, 0),
('BOOK_LG_NL', 3, 50, 5, 0),
('CHAMP_LP', 22, 20, 6, 0),
('CURTIUS_D_PACK', 19, 11, 3, 0),
('DARCIS_10', 24, 7, 10, 0),
('DARCIS_10_DELUXE', 24, 12, 10, 0),
('DARCIS_20_DELUXE', 24, 19, 10, 0),
('FARDE_HEC', 17, 1.05, 4, 0),
('GOURD_HEC_ALUMNI', 9, 3, 5, 0),
('GOURD_HEC_NORMAL', 8, 3, 5, 0),
('HAT_HEC', 10, 7, 5, 0),
('MAIGRET_COLL', 18, 10, 0, 0),
('MUG_HEC_BLACK', 12, 4, 4, 0),
('MUG_HEC_BLUE', 12, 4, 4, 0),
('MUG_HEC_GREEN', 12, 4, 4, 0),
('MUG_HEC_ORANGE', 12, 4, 4, 0),
('MUG_HEC_YELLOW', 12, 4, 4, 0),
('NOTE_HEC_A5', 15, 1.6, 5, 0),
('PINS_HEC', 5, 1.3, 5, 0),
('PRODIR_HEC', 16, 1.45, 5, 0),
('USB_KEY_HEC', 11, 5.65, 5, 0),
('WEIGHT_HEC', 14, 3.75, 5, 0),
('WINE_HM_20012', 20, 15, 12, 0),
('WINE_INSOUMISE', 21, 16, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Variant`
--

CREATE TABLE `Variant` (
  `variant_id` int(11) NOT NULL,
  `sku_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `attribute` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Variant`
--

INSERT INTO `Variant` (`variant_id`, `sku_id`, `attribute`, `value`) VALUES
(3, 'BOOK_LG_FR', 'language', 'francais'),
(4, 'BOOK_LG_EN', 'language', 'english'),
(5, 'BOOK_LG_DE', 'language', 'german'),
(6, 'BOOK_LG_NL', 'language', 'nederland'),
(7, 'BOOK_LG_EVENT', 'language', 'francais');

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
  ADD PRIMARY KEY (`order_id`,`sku_id`),
  ADD KEY `sku_id` (`sku_id`);

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
  ADD PRIMARY KEY (`sku_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `Variant`
--
ALTER TABLE `Variant`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `sku_id` (`sku_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Description`
--
ALTER TABLE `Description`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Product_order`
--
ALTER TABLE `Product_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Variant`
--
ALTER TABLE `Variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `Order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Product_order` (`order_id`),
  ADD CONSTRAINT `Order_details_ibfk_2` FOREIGN KEY (`sku_id`) REFERENCES `Sku` (`sku_id`);

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
-- Constraints for table `Sku`
--
ALTER TABLE `Sku`
  ADD CONSTRAINT `Sku_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`);

--
-- Constraints for table `Variant`
--
ALTER TABLE `Variant`
  ADD CONSTRAINT `Variant_ibfk_1` FOREIGN KEY (`sku_id`) REFERENCES `Sku` (`sku_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
