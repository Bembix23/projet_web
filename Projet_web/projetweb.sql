-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 juin 2020 à 11:13
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `id_annonceur` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `nb_place` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `prix_nuit` int(11) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `id_annonceur`, `titre`, `description`, `nb_place`, `adresse`, `ville`, `prix_nuit`, `latitude`, `longitude`) VALUES
(23, 3, 'AnnonceJules1', 'aaaaaaaaaaaaaaaaaaa', 4, '13 avenue du test', 'Paris', 150, '43,35435', '0,54663'),
(24, 3, 'AnnonceJules2', 'bbbbbbbbbbbbbbbbbbbb', 8, '124 avenue du test', 'Paris', 80, '43,34635', '0,541455'),
(25, 11, 'Appartement', 'Appartement au cœur de Blanquefort', 6, '123 avenue du port du roy', 'Blanquefort', 150, '44.909247', '-0.637636'),
(26, 11, 'Maison2', 'aizfyvbslqucgvebqfisqbupbfiq', 3, '12 avenue du port du roy', 'Blanquefort', 200, '44.913517', '-0.563241'),
(32, 2, 'Maison', 'Maison accueillante avec piscine ', 7, '2 allée mendes france', 'Parempuyre', 159, '44.954424', '-0.599830'),
(33, 2, 'Campagne', 'Maison chaleureuse de Campagne', 5, 'Chemin de pary', 'Nages', 230, '43.676562', '2.778133');

-- --------------------------------------------------------

--
-- Structure de la table `date_de_réservation`
--

CREATE TABLE `date_de_réservation` (
  `date_réservation` date NOT NULL,
  `id_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `date_de_réservation`
--

INSERT INTO `date_de_réservation` (`date_réservation`, `id_chambre`) VALUES
('2020-06-18', 25),
('2020-06-19', 25),
('2020-06-20', 25),
('2020-06-21', 25),
('2020-06-22', 25),
('2020-06-23', 25),
('2020-06-24', 25),
('2020-06-25', 25),
('2020-06-26', 25),
('2020-07-23', 33),
('2020-07-24', 33),
('2020-08-13', 24),
('2020-08-14', 24),
('2020-08-15', 24),
('2020-08-16', 24),
('2020-08-17', 24),
('2020-08-18', 24),
('2020-08-19', 24),
('2020-08-20', 24),
('2020-08-21', 24),
('2020-09-29', 25),
('2020-09-30', 25),
('2020-10-16', 23),
('2020-10-29', 25),
('2020-12-24', 25),
('2021-01-11', 24),
('2021-02-10', 26),
('2021-02-24', 26),
('2021-04-28', 26),
('2021-05-21', 26),
('2021-06-11', 25),
('2021-11-25', 25),
('2037-01-09', 26);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail_adress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `budget` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `nom`, `prenom`, `mail_adress`, `password`, `budget`) VALUES
(2, 'Chancerel', 'Benjamin', 'benjamin.chancerel@ynov.com', '$2y$10$OYRRTuz13Ap0Jp2Z2NZOduBAXcBb9acXfyEcbKt9UZtzIG4YbTc8y', 988900),
(3, 'Dupuis', 'Jules', 'Jules.dupuis@ynov.com', '$2y$10$Z8K55M9P.vFvU0Wphnr1HuoUET55r1pC2quGwUDvzNFBsDl6Rqc1i', 16180),
(11, 'Michon', 'Gauthier', 'gauthier.michon@yahoo.fr', '$2y$10$wTSlqP1CNMM7MbSeGJrOkeJEqhXgfZWhpeDvine0Pb1oN/.Ya3wg.', 2300),
(14, 'Chancerel', 'Stéphane', 'stephandmy@orange.fr', '$2y$10$/Qtu/Vj15qgSY9GsK.oKieOCOgvqr5nnXcpmsWxOlg6WkNR9EbWhe', 998620);

-- --------------------------------------------------------

--
-- Structure de la table `réservation`
--

CREATE TABLE `réservation` (
  `id` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `id_locataire` int(11) NOT NULL,
  `date_arrivé` date NOT NULL,
  `date_départ` date NOT NULL,
  `nb_nuit` int(11) NOT NULL,
  `prix_nuit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `réservation`
--

INSERT INTO `réservation` (`id`, `id_chambre`, `id_locataire`, `date_arrivé`, `date_départ`, `nb_nuit`, `prix_nuit`) VALUES
(27, 25, 2, '2020-06-18', '2020-06-27', 9, 150),
(28, 24, 2, '2021-01-11', '2021-01-12', 1, 80),
(29, 26, 2, '2021-02-10', '2021-02-11', 1, 200),
(30, 26, 2, '2021-04-28', '2021-04-29', 1, 200),
(31, 24, 2, '2020-08-13', '2020-08-22', 9, 80),
(32, 26, 2, '2037-01-09', '2037-01-10', 1, 200),
(33, 26, 2, '2021-05-21', '2021-05-22', 1, 200),
(34, 25, 2, '2020-09-29', '2020-10-01', 2, 150),
(36, 23, 2, '2020-10-16', '2020-10-17', 1, 150),
(37, 25, 2, '2021-06-11', '2021-06-12', 1, 150),
(38, 25, 2, '2021-11-25', '2021-11-26', 1, 150),
(39, 26, 2, '2021-02-24', '2021-02-25', 1, 200),
(40, 33, 14, '2020-07-23', '2020-07-25', 2, 230),
(41, 25, 2, '2020-10-29', '2020-10-30', 1, 150),
(42, 25, 2, '2020-12-24', '2020-12-25', 1, 150);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_annonceur` (`id_annonceur`);

--
-- Index pour la table `date_de_réservation`
--
ALTER TABLE `date_de_réservation`
  ADD PRIMARY KEY (`date_réservation`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `réservation`
--
ALTER TABLE `réservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_locataire` (`id_locataire`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `réservation`
--
ALTER TABLE `réservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`id_annonceur`) REFERENCES `profil` (`id`);

--
-- Contraintes pour la table `réservation`
--
ALTER TABLE `réservation`
  ADD CONSTRAINT `réservation_ibfk_1` FOREIGN KEY (`id_locataire`) REFERENCES `profil` (`id`),
  ADD CONSTRAINT `réservation_ibfk_2` FOREIGN KEY (`id_chambre`) REFERENCES `annonce` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
