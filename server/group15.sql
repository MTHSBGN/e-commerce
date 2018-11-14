-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 14 nov. 2018 à 11:26
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `group15-tmp`
--

-- --------------------------------------------------------

--
-- Structure de la table `Customer`
--

CREATE TABLE `Customer` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Customer`
--

INSERT INTO `Customer` (`id`, `email`, `username`, `password`, `firstname`, `lastname`, `delivery_address`, `type`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 'mathias.beguin@hotmail.com', 'MTHSBGN', '10000$GpVnT/7wALGfer9MPHA5nQ==$33dc7aa4b4f349a47df66b19d1416f2336858a2bb779cfd21f87eb8a24a3de6c', 'Mathias', 'Beguin', 'Rue des Artisans, 17 4632 Soumagne', 0, 'ab9b1947-0993-4626-9e80-4cd90e6b29eb', '2018-11-14 09:41:47', '2018-11-14 09:41:47'),
(2, 'loic.lejoly@gmail.com', 'Briglim', '10000$bWutuPu+ChnTn40GzvP/YQ==$13fac59511aa4b15d6c04e2bb189620cb2f460a6422deee11db2be59b32ab1f8', 'Loic', 'Lejoly', 'Rue Liege', 1, 'ab9b1947-0993-4626-9e80-4cd90e6b29eb', '2018-11-14 10:12:31', '2018-11-14 10:12:31');

-- --------------------------------------------------------

--
-- Structure de la table `CustomerOrder`
--

CREATE TABLE `CustomerOrder` (
  `id` int(11) NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `CustomerOrder`
--

INSERT INTO `CustomerOrder` (`id`, `shipping_address`, `total_price`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, 'Rue Liege', 44, '2018-11-14 10:13:32', '2018-11-14 10:13:32', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Image`
--

CREATE TABLE `Image` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `sku_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Image`
--

INSERT INTO `Image` (`id`, `filename`, `created_at`, `updated_at`, `sku_id`) VALUES
(1, 'badge_hec_01.jpg', '2018-11-14 09:42:54', '2018-11-14 09:42:54', 'BADGE_HEC'),
(2, 'pins_hec_01.png', '2018-11-14 09:43:46', '2018-11-14 09:43:46', 'PINS_HEC'),
(3, 'pins_hec_02.png', '2018-11-14 09:43:46', '2018-11-14 09:43:46', 'PINS_HEC'),
(4, 'weighing_scale_hec_01.png', '2018-11-14 09:44:54', '2018-11-14 09:44:54', 'WEIGHT_HEC'),
(5, 'weighing_scale_hec_02.png', '2018-11-14 09:44:54', '2018-11-14 09:44:54', 'WEIGHT_HEC'),
(6, 'weighing_scale_hec_03.png', '2018-11-14 09:44:54', '2018-11-14 09:44:54', 'WEIGHT_HEC'),
(7, 'bag_hec_01.png', '2018-11-14 09:45:27', '2018-11-14 09:45:27', 'BAG_HEC'),
(8, 'bag_hec_02.jpg', '2018-11-14 09:45:27', '2018-11-14 09:45:27', 'BAG_HEC'),
(9, 'curtius_01.png', '2018-11-14 09:46:14', '2018-11-14 09:46:14', 'CURTIUS_2B'),
(10, 'bonbons_hec_01.png', '2018-11-14 09:47:25', '2018-11-14 09:47:25', 'BONBON_HEC'),
(11, 'bonbons_hec_02.png', '2018-11-14 09:47:25', '2018-11-14 09:47:25', 'BONBON_HEC'),
(12, 'wine_hm_2012_01.jpg', '2018-11-14 09:48:17', '2018-11-14 09:48:17', 'WINE_HM'),
(13, 'wine_hm_2012_02.jpg', '2018-11-14 09:48:17', '2018-11-14 09:48:17', 'WINE_HM'),
(14, 'wine_insoumise_01.jpg', '2018-11-14 09:50:19', '2018-11-14 09:50:19', 'WINE_INSOUMISE'),
(15, 'wine_insoumise_02.jpg', '2018-11-14 09:50:19', '2018-11-14 09:50:19', 'WINE_INSOUMISE'),
(16, 'laurent_perrier_01.jpg', '2018-11-14 09:50:52', '2018-11-14 09:50:52', 'CHAMP_LP'),
(17, 'darcis_01.jpg', '2018-11-14 09:52:08', '2018-11-14 09:52:08', 'DARCIS_10'),
(18, 'darcis_10_01.png', '2018-11-14 09:54:31', '2018-11-14 09:54:31', 'DARCIS_10_BOX'),
(19, 'mug_hec_black_01.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_BLACK'),
(20, 'mug_hec_black_02.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_BLACK'),
(21, 'mug_hec_blue_01.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_BLUE'),
(22, 'mug_hec_blue_02.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_BLUE'),
(23, 'mug_hec_green_01.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_GREEN'),
(24, 'mug_hec_green_02.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_GREEN'),
(25, 'mug_hec_orange_01.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_ORANGE'),
(26, 'mug_hec_orange_02.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_ORANGE'),
(27, 'mug_hec_yelllow_01.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_YELLOW'),
(28, 'mug_hec_yellow_02.jpg', '2018-11-14 10:05:39', '2018-11-14 10:05:39', 'MUG_YELLOW'),
(29, 'bic_hec_prodir_01.png', '2018-11-14 10:16:38', '2018-11-14 10:16:38', 'PRODIR'),
(30, 'note_hec_a5_01.png', '2018-11-14 10:17:10', '2018-11-14 10:17:10', 'BLOC_A5'),
(31, 'note_hec_a5_02.png', '2018-11-14 10:17:10', '2018-11-14 10:17:10', 'BLOC_A5'),
(32, 'fard_hec_01.png', '2018-11-14 10:17:37', '2018-11-14 10:17:37', 'FARD_HEC'),
(33, 'fard_hec_02.jpg', '2018-11-14 10:17:37', '2018-11-14 10:17:37', 'FARD_HEC'),
(34, 'usb_hec_01.png', '2018-11-14 10:19:49', '2018-11-14 10:19:49', 'USB_HEC'),
(35, 'maigret_01.png', '2018-11-14 10:20:25', '2018-11-14 10:20:25', 'MAIGRET'),
(36, 'history_of_liege_de.png', '2018-11-14 10:21:59', '2018-11-14 10:21:59', 'BOOK_LG_DE'),
(37, 'history_of_liege_en.png', '2018-11-14 10:21:59', '2018-11-14 10:21:59', 'BOOK_LG_EN'),
(38, 'history_of_liege_nl.png', '2018-11-14 10:21:59', '2018-11-14 10:21:59', 'BOOK_LG_NL'),
(39, 'liege_cite_evenement_01.png', '2018-11-14 10:22:41', '2018-11-14 10:22:41', 'BOOK_LG_EVENT'),
(40, 'gourd_hec_01.jpg', '2018-11-14 10:23:05', '2018-11-14 10:23:05', 'GOURD'),
(41, 'gourd_hec_alumni_01.jpg', '2018-11-14 10:23:33', '2018-11-14 10:23:33', 'GOURD_ALUMNI'),
(42, 'hat_hec_01.jpg', '2018-11-14 10:23:58', '2018-11-14 10:23:58', 'HAT_HEC'),
(43, 'hat_hec_02.jpg', '2018-11-14 10:23:58', '2018-11-14 10:23:58', 'HAT_HEC');

-- --------------------------------------------------------

--
-- Structure de la table `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `customer_order_id` int(11) DEFAULT NULL,
  `sku_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `OrderDetails`
--

INSERT INTO `OrderDetails` (`id`, `quantity`, `price`, `created_at`, `updated_at`, `customer_order_id`, `sku_id`) VALUES
(1, 1, 3.2, '2018-11-14 10:13:32', '2018-11-14 10:13:32', 1, 'BAG_HEC'),
(2, 3, 11, '2018-11-14 10:13:32', '2018-11-14 10:13:32', 1, 'CURTIUS_2B'),
(3, 2, 4, '2018-11-14 10:13:32', '2018-11-14 10:13:32', 1, 'MUG_BLACK');

-- --------------------------------------------------------

--
-- Structure de la table `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Product`
--

INSERT INTO `Product` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Badges à épingles', '2018-11-14 09:42:54', '2018-11-14 09:42:54'),
(2, 'Pin’s HEC', '2018-11-14 09:43:46', '2018-11-14 09:43:46'),
(3, 'Pèse Bagages', '2018-11-14 09:44:54', '2018-11-14 09:44:54'),
(4, 'Sac en coton', '2018-11-14 09:45:27', '2018-11-14 09:45:27'),
(5, 'Bière Curtius (Coffret 2 bouteilles    1 verre)', '2018-11-14 09:46:13', '2018-11-14 09:46:13'),
(6, 'Boite à bonbons (menthe)', '2018-11-14 09:47:25', '2018-11-14 09:47:25'),
(7, 'Bouteille de Vin rouge Haut Médoc 2012', '2018-11-14 09:48:17', '2018-11-14 09:48:17'),
(8, 'Bouteille de vin brut “l’Insoumise” ', '2018-11-14 09:50:19', '2018-11-14 09:50:19'),
(9, 'Champagne (Laurent Perrier)', '2018-11-14 09:50:52', '2018-11-14 09:50:52'),
(10, 'Réglette Darcis 10 chocolats HEC Liège', '2018-11-14 09:52:08', '2018-11-14 09:52:08'),
(11, 'Chocolat Darcis Coffret personnalisé  avec 10 pralines', '2018-11-14 09:54:31', '2018-11-14 09:54:31'),
(12, 'Mugs HEC Liège', '2018-11-14 10:05:39', '2018-11-14 10:05:39'),
(13, 'Bic PRODIR ', '2018-11-14 10:16:38', '2018-11-14 10:16:38'),
(14, 'Bloc note A5', '2018-11-14 10:17:10', '2018-11-14 10:17:10'),
(15, 'Farde', '2018-11-14 10:17:37', '2018-11-14 10:17:37'),
(16, 'Clé USB', '2018-11-14 10:19:49', '2018-11-14 10:19:49'),
(17, 'DVD Maigret Collection', '2018-11-14 10:20:25', '2018-11-14 10:20:25'),
(18, 'Livre : Histoire de Liège', '2018-11-14 10:21:59', '2018-11-14 10:21:59'),
(19, 'Livre: Liège - Cité d’événements', '2018-11-14 10:22:41', '2018-11-14 10:22:41'),
(20, 'Gourde HEC Liège', '2018-11-14 10:23:05', '2018-11-14 10:23:05'),
(21, 'Gourde HEC Liège  Alumni Network', '2018-11-14 10:23:33', '2018-11-14 10:23:33'),
(22, 'Casquette HEC Liège', '2018-11-14 10:23:58', '2018-11-14 10:23:58');

-- --------------------------------------------------------

--
-- Structure de la table `Sku`
--

CREATE TABLE `Sku` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Sku`
--

INSERT INTO `Sku` (`id`, `description`, `price`, `stock`, `sold`, `created_at`, `updated_at`, `product_id`) VALUES
('BADGE_HEC', 'Badge HEC', 0.3, 5, 0, '2018-11-14 09:42:54', '2018-11-14 09:42:54', 1),
('BAG_HEC', 'Sac en coton HEC', 3.2, 5, 0, '2018-11-14 09:45:27', '2018-11-14 09:45:27', 4),
('BLOC_A5', 'Bloc note A5 HEC', 1.6, 5, 0, '2018-11-14 10:17:10', '2018-11-14 10:17:10', 14),
('BONBON_HEC', 'Bonbons à la menthe', 1.15, 5, 0, '2018-11-14 09:47:25', '2018-11-14 09:47:25', 6),
('BOOK_LG_DE', 'Livre sur l\'histoire de Liège en Allemand', 50, 5, 0, '2018-11-14 10:21:59', '2018-11-14 10:21:59', 18),
('BOOK_LG_EN', 'Livre sur l\'histoire de Liège en Anglais', 50, 5, 0, '2018-11-14 10:21:59', '2018-11-14 10:21:59', 18),
('BOOK_LG_EVENT', 'Livre: Liège - Cité d’événements', 23, 5, 0, '2018-11-14 10:22:41', '2018-11-14 10:22:41', 19),
('BOOK_LG_NL', 'Livre sur l\'histoire de Liège en Néerlandais', 50, 5, 0, '2018-11-14 10:21:59', '2018-11-14 10:21:59', 18),
('CHAMP_LP', 'Bouteille de champagne', 20, 5, 0, '2018-11-14 09:50:52', '2018-11-14 09:50:52', 9),
('CURTIUS_2B', 'Bière Liégeoise', 11, 5, 0, '2018-11-14 09:46:14', '2018-11-14 09:46:14', 5),
('DARCIS_10', 'Réglette Darcis 10 chocolats HEC Liège', 7, 5, 0, '2018-11-14 09:52:08', '2018-11-14 09:52:08', 10),
('DARCIS_10_BOX', 'Chocolat Darcis Coffret personnalisé  avec 10 pralines', 12, 5, 0, '2018-11-14 09:54:31', '2018-11-14 09:54:31', 11),
('FARD_HEC', 'Farde HEC', 1.05, 5, 0, '2018-11-14 10:17:37', '2018-11-14 10:17:37', 15),
('GOURD', 'Gourde HEC Liège', 3, 5, 0, '2018-11-14 10:23:05', '2018-11-14 10:23:05', 20),
('GOURD_ALUMNI', 'Gourde HEC Liège  Alumni Network', 3, 5, 0, '2018-11-14 10:23:33', '2018-11-14 10:23:33', 21),
('HAT_HEC', 'Casquette HEC Liège', 7, 5, 0, '2018-11-14 10:23:58', '2018-11-14 10:23:58', 22),
('MAIGRET', 'DVD Maigret Collection', 10, 5, 0, '2018-11-14 10:20:25', '2018-11-14 10:20:25', 17),
('MUG_BLACK', 'Mugs HEC Liège Noir', 4, 5, 0, '2018-11-14 10:05:39', '2018-11-14 10:05:39', 12),
('MUG_BLUE', 'Mugs HEC Liège Bleu', 4, 5, 0, '2018-11-14 10:05:39', '2018-11-14 10:05:39', 12),
('MUG_GREEN', 'Mugs HEC Liège Vert', 4, 5, 0, '2018-11-14 10:05:39', '2018-11-14 10:05:39', 12),
('MUG_ORANGE', 'Mugs HEC Liège Orange', 4, 5, 0, '2018-11-14 10:05:39', '2018-11-14 10:05:39', 12),
('MUG_YELLOW', 'Mugs HEC Liège Jaune', 4, 5, 0, '2018-11-14 10:05:39', '2018-11-14 10:05:39', 12),
('PINS_HEC', 'Pin\'s HEC', 1.3, 5, 0, '2018-11-14 09:43:46', '2018-11-14 09:43:46', 2),
('PRODIR', 'Bic PRODIR ', 1.45, 5, 0, '2018-11-14 10:16:38', '2018-11-14 10:16:38', 13),
('USB_HEC', 'Clé USB', 5.65, 5, 0, '2018-11-14 10:19:49', '2018-11-14 10:19:49', 16),
('WEIGHT_HEC', 'Pèse bagage HEC', 3.75, 5, 0, '2018-11-14 09:44:54', '2018-11-14 09:44:54', 3),
('WINE_HM', 'Bouteille de vin', 15, 5, 0, '2018-11-14 09:48:17', '2018-11-14 09:48:17', 7),
('WINE_INSOUMISE', 'Bouteille de vin', 16, 30, 0, '2018-11-14 09:50:19', '2018-11-14 09:50:19', 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `CustomerOrder`
--
ALTER TABLE `CustomerOrder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Index pour la table `Image`
--
ALTER TABLE `Image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sku_id` (`sku_id`);

--
-- Index pour la table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_order_id` (`customer_order_id`),
  ADD KEY `sku_id` (`sku_id`);

--
-- Index pour la table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Sku`
--
ALTER TABLE `Sku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `CustomerOrder`
--
ALTER TABLE `CustomerOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Image`
--
ALTER TABLE `Image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `CustomerOrder`
--
ALTER TABLE `CustomerOrder`
  ADD CONSTRAINT `CustomerOrder_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `Image`
--
ALTER TABLE `Image`
  ADD CONSTRAINT `Image_ibfk_1` FOREIGN KEY (`sku_id`) REFERENCES `Sku` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD CONSTRAINT `OrderDetails_ibfk_1` FOREIGN KEY (`customer_order_id`) REFERENCES `CustomerOrder` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `OrderDetails_ibfk_2` FOREIGN KEY (`sku_id`) REFERENCES `Sku` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `Sku`
--
ALTER TABLE `Sku`
  ADD CONSTRAINT `Sku_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
