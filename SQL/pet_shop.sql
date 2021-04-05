-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 avr. 2021 à 14:27
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
-- Base de données : `pet_shop`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `calculations_for_pets` (IN `pid` VARCHAR(9), IN `sid` VARCHAR(9))  NO SQL
BEGIN
DECLARE 
 cpid ,csid int DEFAULT 0;
set cpid=(select cost from pets where pet_id=pid);
set csid=(select total from sales_details where sd_id=sid);
set csid=csid+cpid;
update sales_details set total=csid where sd_id=sid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `calculations_for_product` (IN `ppid` VARCHAR(9), IN `sid` VARCHAR(9), IN `qnty` INT(11))  NO SQL
BEGIN
DECLARE 
 cppid ,csid int DEFAULT 0;
set cppid=(select cost from pet_products where pp_id=ppid);
set csid=(select total from sales_details where sd_id=sid);
set csid=csid+qnty*cppid;
update sales_details set total=csid where sd_id=sid;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `pet_id` varchar(9) NOT NULL,
  `category` int(11) NOT NULL,
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
  `pet_id` varchar(9) NOT NULL,
  `type` varchar(25) NOT NULL,
  `noise` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `cs_id` varchar(9) NOT NULL,
  `cs_fname` varchar(10) NOT NULL,
  `cs_minit` varchar(10) NOT NULL,
  `cs_lname` varchar(10) NOT NULL,
  `cs_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pets`
--

CREATE TABLE `pets` (
  `pet_id` varchar(9) NOT NULL,
  `pet_category` varchar(15) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déclencheurs `pets`
--
DELIMITER $$
CREATE TRIGGER `check_sold` BEFORE UPDATE ON `pets` FOR EACH ROW BEGIN
DECLARE
 checking int;
 set checking=(select count(*) from sold_pets where pet_id=old.pet_id);
  if (checking > 0) then   
        signal sqlstate '45000' set message_text = 'cannot  update sold pet';
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `pet_products`
--

CREATE TABLE `pet_products` (
  `pp_id` varchar(9) NOT NULL,
  `pp_name` varchar(30) NOT NULL,
  `pp_type` varchar(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `belongs_to` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sales_details`
--

CREATE TABLE `sales_details` (
  `sd_id` varchar(9) NOT NULL,
  `cs_id` varchar(9) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sold_pets`
--

CREATE TABLE `sold_pets` (
  `sd_id` varchar(9) NOT NULL,
  `pet_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sold_products`
--

CREATE TABLE `sold_products` (
  `sd_id` varchar(9) NOT NULL,
  `pp_id` varchar(9) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`pet_id`);

--
-- Index pour la table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`pet_id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cs_id`);

--
-- Index pour la table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Index pour la table `pet_products`
--
ALTER TABLE `pet_products`
  ADD PRIMARY KEY (`pp_id`);

--
-- Index pour la table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sd_id`,`cs_id`),
  ADD KEY `cs_id` (`cs_id`);

--
-- Index pour la table `sold_pets`
--
ALTER TABLE `sold_pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `sd_id` (`sd_id`);

--
-- Index pour la table `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`sd_id`,`pp_id`),
  ADD KEY `sold_products_ibfk_2` (`pp_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`pet_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `birds`
--
ALTER TABLE `birds`
  ADD CONSTRAINT `birds_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`pet_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_ibfk_1` FOREIGN KEY (`cs_id`) REFERENCES `customer` (`cs_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sold_pets`
--
ALTER TABLE `sold_pets`
  ADD CONSTRAINT `sold_pets_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`pet_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sold_pets_ibfk_2` FOREIGN KEY (`sd_id`) REFERENCES `sales_details` (`sd_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sold_products`
--
ALTER TABLE `sold_products`
  ADD CONSTRAINT `sold_products_ibfk_1` FOREIGN KEY (`sd_id`) REFERENCES `sales_details` (`sd_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sold_products_ibfk_2` FOREIGN KEY (`pp_id`) REFERENCES `pet_products` (`pp_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
