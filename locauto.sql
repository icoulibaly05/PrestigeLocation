-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 27 Février 2014 à 15:27
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `locauto`
--
CREATE DATABASE IF NOT EXISTS `locauto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `locauto`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` varchar(1) NOT NULL,
  `categorie` varchar(256) NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  UNIQUE KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie`, `prix`) VALUES
('A', 'Citadine', '60.00'),
('B', 'Economique', '72.00'),
('C', 'Compacte', '80.00'),
('D', 'Intermediaire', '95.00'),
('E', 'Berline', '120.00'),
('F', 'Grande berline', '150.00'),
('G', 'Sport, SUV', '230.00'),
('V', 'Luxe', '350.00');

-- --------------------------------------------------------

--
-- Structure de la table `choixoptions`
--

CREATE TABLE IF NOT EXISTS `choixoptions` (
  `id_choix_option` int(11) NOT NULL,
  `id_option` int(11) NOT NULL,
  `id_louer` int(11) NOT NULL,
  UNIQUE KEY `id_choix_option` (`id_choix_option`),
  KEY `id_option` (`id_option`,`id_louer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL,
  `id_type_client` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  UNIQUE KEY `id_client` (`id_client`),
  KEY `id_type_client` (`id_type_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

CREATE TABLE IF NOT EXISTS `louer` (
  `id_louer` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `immatriculation` varchar(16) NOT NULL,
  `date_debut` varchar(10) NOT NULL,
  `date_fin` varchar(10) NOT NULL,
  `compteur_debut` int(11) NOT NULL,
  `compteur_fin` int(11) NOT NULL,
  UNIQUE KEY `id_louer` (`id_louer`),
  KEY `id_client` (`id_client`,`immatriculation`),
  KEY `immatriculation` (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id_option` int(11) NOT NULL,
  `option` varchar(256) NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  UNIQUE KEY `id_option` (`id_option`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`id_option`, `option`, `prix`) VALUES
(1, 'Assurance complementaire', '50.00'),
(2, 'Nettoyage', '75.00'),
(3, 'Complement carburant', '30.00'),
(4, 'Retour autre ville', '250.00'),
(5, 'Rabais dimanche', '-40.00');

-- --------------------------------------------------------

--
-- Structure de la table `typesclient`
--

CREATE TABLE IF NOT EXISTS `typesclient` (
  `id_type_client` int(11) NOT NULL,
  `type_client` varchar(256) NOT NULL,
  UNIQUE KEY `id_type_client` (`id_type_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typesclient`
--

INSERT INTO `typesclient` (`id_type_client`, `type_client`) VALUES
(1, 'Particulier'),
(2, 'Entreprise'),
(3, 'Administration'),
(4, 'Association'),
(5, 'Longue duree');

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

CREATE TABLE IF NOT EXISTS `voitures` (
  `immatriculation` varchar(16) NOT NULL,
  `marque` varchar(256) NOT NULL,
  `modele` varchar(256) NOT NULL,
  `image` varchar(64) NOT NULL,
  `compteur` int(11) NOT NULL,
  `id_categorie` varchar(1) NOT NULL,
  UNIQUE KEY `id_voiture` (`immatriculation`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voitures`
--

INSERT INTO `voitures` (`immatriculation`, `marque`, `modele`, `image`, `compteur`, `id_categorie`) VALUES
-- BMW
('BMW-M3-001', 'B.M.W.', 'M3', 'bmw-m3.jpg', 1000, 'G'),
('BMW-M4CS-001', 'B.M.W.', 'M4 CS', 'bmw-m4cs.jpg', 2000, 'G'),
('BMW-X6M-001', 'B.M.W.', 'X6M', 'bmw-x6m.jpg', 1500, 'G'),
('BMW-7-001', 'B.M.W.', 'Série 7', 'bmw-7.jpg', 1800, 'F'),
-- Mercedes
('MB-G63-001', 'Mercedes', 'Classe G 63 AMG', 'mercedes-g63.jpg', 1500, 'G'),
('MB-GLE63S-001', 'Mercedes', 'GLE 63 S AMG Coupé', 'mercedes-gle63s.jpg', 1500, 'G'),
('MB-S680-001', 'Mercedes', 'Classe S 680 Maybach', 'mercedes-s680.jpg', 1600, 'V'),
-- Ferrari
('FERRARI-488-001', 'Ferrari', '488 Pista', 'ferrari-488.jpg', 500, 'G'),
-- Bentley
('BENTLEY-BENTAYGA-001', 'Bentley', 'Bentayga', 'bentley-bentayga.jpg', 1200, 'V'),
-- Rolls Royce
('RR-SPECTRE-001', 'Rolls Royce', 'Spectre', 'rolls-royce-spectre.jpg', 800, 'V'),
('RR-CULLINAN-001', 'Rolls Royce', 'Cullinan', 'rolls-royce-cullinan.jpg', 900, 'V'),
-- Porsche
('PORSCHE-CAYMAN-001', 'Porsche', 'Cayman GT4 RS', 'porsche-cayman.jpg', 1100, 'G'),
-- Alfa Romeo
('ALFA-GIULIA-001', 'Alfa Romeo', 'Giulia', 'alfa-giulia.jpg', 1300, 'G'),
-- Audi
('AUDI-RS3-001', 'Audi', 'RS3', 'audi-rs3.jpg', 1000, 'G'),
('AUDI-RS6-001', 'Audi', 'RS6', 'audi-rs6.jpg', 1200, 'G'),
('AUDI-RS7-001', 'Audi', 'RS7 ABT', 'audi-rs7-abt.jpg', 1500, 'G'),
-- Tesla
('TESLA-S-001', 'Tesla', 'Model S', 'tesla-model-s.jpg', 500, 'V'),
('TESLA-X-001', 'Tesla', 'Model X', 'tesla-model-x.jpg', 700, 'V'),
('TESLA-3-001', 'Tesla', 'Model 3', 'tesla-model-3.jpg', 600, 'V');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `client_type_client` FOREIGN KEY (`id_type_client`) REFERENCES `typesclient` (`id_type_client`);

--
-- Contraintes pour la table `louer`
--
ALTER TABLE `louer`
  ADD CONSTRAINT `louer_voiture` FOREIGN KEY (`immatriculation`) REFERENCES `voitures` (`immatriculation`),
  ADD CONSTRAINT `louer_client` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`);

--
-- Contraintes pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD CONSTRAINT `voiture_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
