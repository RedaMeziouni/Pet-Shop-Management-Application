-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 avr. 2021 à 10:43
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pets_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
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

-- --------------------------------------------------------

--
-- Structure de la table `birds`
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
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `cs_fname` varchar(10) NOT NULL,
  `cs_minit` varchar(10) NOT NULL,
  `cs_lname` varchar(10) NOT NULL,
  `cs_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_type` varchar(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `belongs_to` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sales_details_animals`
--

CREATE TABLE `sales_details_animals` (
  `sd_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sales_details_birds`
--

CREATE TABLE `sales_details_birds` (
  `sd_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `birds_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Index pour la table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`birds_id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Index pour la table `sales_details_animals`
--
ALTER TABLE `sales_details_animals`
  ADD PRIMARY KEY (`sd_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `sales_details_birds`
--
ALTER TABLE `sales_details_birds`
  ADD PRIMARY KEY (`sd_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `birds_id` (`birds_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `birds`
--
ALTER TABLE `birds`
  MODIFY `birds_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sales_details_animals`
--
ALTER TABLE `sales_details_animals`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sales_details_birds`
--
ALTER TABLE `sales_details_birds`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sales_details_animals`
--
ALTER TABLE `sales_details_animals`
  ADD CONSTRAINT `sales_details_animals_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_details_animals_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sales_details_birds`
--
ALTER TABLE `sales_details_birds`
  ADD CONSTRAINT `sales_details_birds_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_details_birds_ibfk_2` FOREIGN KEY (`birds_id`) REFERENCES `birds` (`birds_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
