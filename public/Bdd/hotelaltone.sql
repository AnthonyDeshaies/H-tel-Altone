-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 oct. 2021 à 14:21
-- Version du serveur : 5.7.14
-- Version de PHP : 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotelaltone`
--

-- --------------------------------------------------------

--
-- Structure de la table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_amenity` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_amenity` longtext COLLATE utf8mb4_unicode_ci,
  `img_amenity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category_dishes`
--

DROP TABLE IF EXISTS `category_dishes`;
CREATE TABLE IF NOT EXISTS `category_dishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_contact` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name_contact` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_contact` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `discoveries`
--

DROP TABLE IF EXISTS `discoveries`;
CREATE TABLE IF NOT EXISTS `discoveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_discovery` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptiondiscovery` longtext COLLATE utf8mb4_unicode_ci,
  `img_discovery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_discovery` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinates_discovery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dishes`
--

DROP TABLE IF EXISTS `dishes`;
CREATE TABLE IF NOT EXISTS `dishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_dish` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_dish` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_dish` decimal(6,2) NOT NULL,
  `category_dishes_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_584DD35D673D014A` (`category_dishes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210928122046', '2021-09-28 12:21:35', 78),
('DoctrineMigrations\\Version20210929083525', '2021-09-29 08:36:12', 272),
('DoctrineMigrations\\Version20210929084925', '2021-09-29 08:49:32', 111),
('DoctrineMigrations\\Version20210929085615', '2021-09-29 08:56:22', 178),
('DoctrineMigrations\\Version20210929101853', '2021-09-29 10:18:58', 282),
('DoctrineMigrations\\Version20210929102539', '2021-09-29 10:25:45', 173),
('DoctrineMigrations\\Version20210929122149', '2021-09-29 12:21:55', 203);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_fournisseur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fournisseur` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_fournisseur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) DEFAULT NULL,
  `name_menu` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_menu` decimal(6,2) NOT NULL,
  `description_menu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_727508CFB1E7706E` (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description_restaurant` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_restaurant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_starter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_main_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_dessert` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_drink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_room` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_room` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_place` int(11) NOT NULL,
  `price_room` decimal(10,2) NOT NULL,
  `view_room` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_type_room` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_room_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7CA11A967C361F66` (`type_room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_supplier` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_supplier` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress_supplier` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_supplier` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_supplier` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_supplier` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_supplier` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_room`
--

DROP TABLE IF EXISTS `type_room`;
CREATE TABLE IF NOT EXISTS `type_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_type` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `FK_584DD35D673D014A` FOREIGN KEY (`category_dishes_id`) REFERENCES `category_dishes` (`id`);

--
-- Contraintes pour la table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `FK_727508CFB1E7706E` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`);

--
-- Contraintes pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `FK_7CA11A967C361F66` FOREIGN KEY (`type_room_id`) REFERENCES `type_room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
