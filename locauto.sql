-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 juin 2024 à 13:04
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `locauto`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` varchar(1) NOT NULL,
  `categorie` varchar(256) NOT NULL,
  `prix` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie`, `prix`) VALUES
('', 'Électrique', 0.00),
('A', 'Citadine', 60.00),
('B', 'Economique', 72.00),
('C', 'Compacte', 80.00),
('D', 'Intermediaire', 95.00),
('E', 'Berline', 120.00),
('F', 'Grande berline', 150.00),
('G', 'Sport, SUV', 230.00),
('V', 'Luxe', 350.00);

-- --------------------------------------------------------

--
-- Structure de la table `choixoptions`
--

CREATE TABLE `choixoptions` (
  `id_choix_option` int(11) NOT NULL,
  `id_option` int(11) NOT NULL,
  `id_louer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `id_type_client` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `adresse`, `id_type_client`, `photo`) VALUES
(1, 'Niska', '', 'Essonne', 1, 'callmeifyougetlostid.png'),
(2, 'Ninho', '', 'Essonne', 1, 'callmeifyougetlostid (1).png'),
(3, 'Tiakola', '', 'Seine-Saint-Denis', 1, 'callmeifyougetlostid(4).png'),
(4, 'Koba LaD', '', 'Essonne', 1, 'callmeifyougetlostid (3).png'),
(5, 'Zola', '', 'Essonne', 1, 'callmeifyougetlostid (2).png'),
(6, 'Maître Gims', '', 'Paris', 1, 'callmeifyougetlostid (10).png'),
(7, 'Booba', '', 'Boulogne-Billancourt', 1, 'callmeifyougetlostid (7).png'),
(8, 'Kaaris', '', 'Seine-Saint-Denis', 1, 'callmeifyougetlostid (6).png'),
(9, 'La Fouine', '', 'Trappes', 1, 'callmeifyougetlostid (9).png'),
(10, 'SDM', '', 'Hauts-de-Seine', 1, 'callmeifyougetlostid (5).png'),
(11, 'Nasdas', '', 'Perpignan', 1, 'callmeifyougetlostid (14).png'),
(12, 'PLK', '', 'Paris', 1, 'callmeifyougetlostid (8).png'),
(13, 'Heuss l\'Enfoiré', '', 'Val-de-Marne', 1, 'callmeifyougetlostid(11).png'),
(14, 'Wejdene', '', 'Val-de-Marne', 1, 'callmeifyougetlostid (12).png'),
(15, 'Soolking', ' ', 'Alger', 1, 'callmeifyougetlostid (13).png');

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

CREATE TABLE `louer` (
  `id_louer` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `immatriculation` varchar(16) NOT NULL,
  `date_debut` varchar(10) NOT NULL,
  `date_fin` varchar(10) NOT NULL,
  `compteur_debut` int(11) NOT NULL,
  `compteur_fin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `louer`
--

INSERT INTO `louer` (`id_louer`, `id_client`, `immatriculation`, `date_debut`, `date_fin`, `compteur_debut`, `compteur_fin`) VALUES
(0, 0, 'FERRARI-488-001', '2024-05-31', '2025-05-31', 0, 0),
(1, 1, 'BMW-M3-001', '2024-06-01', '2024-06-07', 1000, 1500),
(2, 2, 'BMW-M4CS-001', '2024-06-01', '2024-06-07', 2000, 2500),
(3, 3, 'BMW-X6M-001', '2024-06-01', '2024-06-07', 1500, 2000),
(4, 4, 'MB-G63-001', '2024-06-01', '2024-06-07', 1500, 2000),
(5, 5, 'MB-GLE63S-001', '2024-06-01', '2024-06-07', 1500, 2000),
(6, 6, 'MB-S680-001', '2024-06-01', '2024-06-07', 1600, 2100),
(7, 7, 'TESLA-3-001', '2024-06-01', '2024-06-07', 500, 1000),
(8, 8, 'BENTLEY-BENTAYGA', '2024-06-01', '2024-06-07', 1200, 1700),
(9, 9, 'RR-SPECTRE-001', '2024-06-01', '2024-06-07', 800, 1300),
(10, 10, 'RR-CULLINAN-001', '2024-06-01', '2024-06-07', 900, 1400),
(11, 11, 'TESLA-S-001', '2024-06-01', '2024-06-07', 500, 1000),
(12, 12, 'TESLA-X-001', '2024-06-01', '2024-06-07', 700, 1200),
(13, 13, 'AUDI-RS3-001', '2024-06-01', '2024-06-07', 1000, 1500),
(14, 14, 'MB-GLE63S-002', '2024-06-04', '2024-11-16', 1500, 2000),
(15, 15, 'PORSCHE-CAYMAN-0', '2024-06-01', '2024-06-07', 1100, 1600);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id_option` int(11) NOT NULL,
  `option` varchar(256) NOT NULL,
  `prix` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id_option`, `option`, `prix`) VALUES
(1, 'Assurance complementaire', 50.00),
(2, 'Nettoyage', 75.00),
(3, 'Complement carburant', 30.00),
(4, 'Retour autre ville', 250.00),
(5, 'Rabais dimanche', -40.00);

-- --------------------------------------------------------

--
-- Structure de la table `typesclient`
--

CREATE TABLE `typesclient` (
  `id_type_client` int(11) NOT NULL,
  `type_client` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `typesclient`
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

CREATE TABLE `voitures` (
  `immatriculation` varchar(16) NOT NULL,
  `marque` varchar(256) NOT NULL,
  `modele` varchar(256) NOT NULL,
  `image` varchar(64) NOT NULL,
  `compteur` int(11) NOT NULL,
  `id_categorie` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`immatriculation`, `marque`, `modele`, `image`, `compteur`, `id_categorie`) VALUES
('ALFA-GIULIA-001', 'Alfa Romeo', 'Giulia', 'OIP (3).jpeg', 0, 'G'),
('AUDI-RS3-001', 'Audi', 'RS3', 'Audi-RS3-Performance-Edition-2023-3.jpg', 1000, 'G'),
('AUDI-RS6-001', 'Audi', 'RS6', 'OIP (4).jpeg', 1200, 'G'),
('AUDI-RS7-001', 'Audi', 'RS7 ABT', 'OIP (1).jpeg', 1500, 'G'),
('BENTLEY-BENTAYGA', 'Bentley', 'Bentayga', 'R (1).jpeg', 1200, 'V'),
('BMW-7-001', 'B.M.W.', 'Série 7', 'OIP (2).jpeg', 1800, 'F'),
('BMW-M3-001', 'B.M.W.', 'M3', 'R (2).jpeg', 1000, 'G'),
('BMW-M4CS-001', 'B.M.W.', 'M4 CS', 'm4.jpeg', 2000, 'G'),
('BMW-X6M-001', 'B.M.W.', 'X6M', 'OIP (5).jpeg', 1500, 'G'),
('FERRARI-488-001', 'Ferrari', '488 Pista', 'ferrari_488_pista_spider_4k-HD.jpg', 500, 'G'),
('FERRARI-PURO-001', 'Ferrari', 'Purosangue', 'puro.jpeg', 0, 'G'),
('LAMB-URS-001', 'Lamborghini', 'Urus', 'R (4).jpeg', 0, 'G'),
('MB-G63-001', 'Mercedes', 'Classe G 63 AMG', 'R (3).jpeg', 1500, 'G'),
('MB-GLE63S-001', 'Mercedes', 'GLE 63 S AMG Coupé', '5fa2e13ea89f51.26828109.jpeg', 1500, 'G'),
('MB-GLE63S-002', 'Mercedes', 'GLE 63S', 'OIP (9).jpeg', 0, 'G'),
('MB-S680-001', 'Mercedes', 'Classe S 680 Maybach', '2021-Mercedes-Maybach-S-Cla-1024x555.jpg', 1600, 'V'),
('PORSCHE-CAYMAN-0', 'Porsche', 'Cayman GT4 RS', '11297_large.jpg', 1100, 'G'),
('RR-CULLINAN-001', 'Rolls Royce', 'Cullinan', '402185-2020-rolls-royce-cullinan.jpg', 900, 'V'),
('RR-SPECTRE-001', 'Rolls Royce', 'Spectre', 'OIP (6).jpeg', 800, 'V'),
('TESLA-3-001', 'Tesla', 'Model 3', 'OIP (7).jpeg', 600, 'B'),
('TESLA-S-001', 'Tesla', 'Model S', 'OIP (8).jpeg', 500, 'B'),
('TESLA-X-001', 'Tesla', 'Model X', 'tesla x.jpeg', 700, 'B'),
('TESLA-X-002', 'Tesla', 'Model X', 'tesla x.jpeg', 0, 'B');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `choixoptions`
--
ALTER TABLE `choixoptions`
  ADD UNIQUE KEY `id_choix_option` (`id_choix_option`),
  ADD KEY `id_option` (`id_option`,`id_louer`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `id_client` (`id_client`),
  ADD KEY `id_type_client` (`id_type_client`);

--
-- Index pour la table `louer`
--
ALTER TABLE `louer`
  ADD UNIQUE KEY `id_louer` (`id_louer`),
  ADD KEY `id_client` (`id_client`,`immatriculation`),
  ADD KEY `immatriculation` (`immatriculation`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD UNIQUE KEY `id_option` (`id_option`);

--
-- Index pour la table `typesclient`
--
ALTER TABLE `typesclient`
  ADD UNIQUE KEY `id_type_client` (`id_type_client`);

--
-- Index pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD UNIQUE KEY `id_voiture` (`immatriculation`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `client_type_client` FOREIGN KEY (`id_type_client`) REFERENCES `typesclient` (`id_type_client`),
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_type_client`) REFERENCES `typesclient` (`id_type_client`);

--
-- Contraintes pour la table `louer`
--
ALTER TABLE `louer`
  ADD CONSTRAINT `louer_voiture` FOREIGN KEY (`immatriculation`) REFERENCES `voitures` (`immatriculation`);

--
-- Contraintes pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD CONSTRAINT `voiture_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
