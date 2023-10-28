-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 28 oct. 2023 à 12:36
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `Matricule` varchar(10) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `DateNais` date NOT NULL,
  `Adrresse` varchar(50) NOT NULL,
  `Niveau` varchar(25) NOT NULL,
  `Sexe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Matricule`, `Nom`, `Prenom`, `DateNais`, `Adrresse`, `Niveau`, `Sexe`) VALUES
('k13', 'FALL', 'amy', '2023-10-10', 'Dakar', '1ere', 'Feminin'),
('l0234', 'Beye', 'Ahmadou', '2023-02-26', 'Richard Tol', '1ere', 'Feminin'),
('l3', 'Diop', 'Ndeye Astou', '1998-06-13', 'Ngaye', '1er', 'Feminin'),
('sdk737', 'Mboup', 'Barrra', '2022-09-21', '', '1ere', 'Masculin');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `Numero` int(11) NOT NULL,
  `NomMat` varchar(25) NOT NULL,
  `VolumeH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`Numero`, `NomMat`, `VolumeH`) VALUES
(2, 'informatique', 16),
(3, 'Francais', 60),
(4, 'Pc', 48),
(5, 'Svt', 32),
(6, 'Eps', 6),
(7, 'Philo', 120),
(8, 'Geographie', 60),
(9, 'Arabe', 10),
(10, 'math', 20),
(13, 'Algorithme', 60),
(20, 'Ecofam', 30);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `matricule` varchar(10) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Matiere` varchar(25) NOT NULL,
  `Niveau` varchar(25) NOT NULL,
  `Sexe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`matricule`, `Nom`, `Prenom`, `Matiere`, `Niveau`, `Sexe`) VALUES
('sdk377', 'Fall', 'Aliou', 'Maths', '2nd', 'M'),
('sdk378', 'Mbaye', 'Illimane', 'Svt', '1er', 'M'),
('sdk379', 'Toure', 'Ngone', 'Arabe', '4e', 'F'),
('sdk380', 'Sy', 'Mamy', 'Espagnole', '4e', 'F'),
('sdk381', 'Mbacke', 'Khady', 'Pc', '5e', 'F'),
('sdk382', 'Faye', 'Mansour', 'Anglais', 'Terminale', 'M'),
('sdk383', 'Gueye', 'Khoudia', 'Francais', 'Terminale', 'F'),
('sdk375', 'Diouf', 'Yacine', 'Anglais', '4e', 'F'),
('sdk384', 'Gaye', 'Maimouna', 'Espagnol', '1er', 'F'),
('', 'Toure', 'Ma awa', 'English', '1ere', 'Feminin'),
('sdk385', 'Mbengue', 'Ibou', 'Espagnol', '1ere', 'Masculin'),
('sdk5623', 'toure', 'Ndoumbe', 'English', '6eme', 'Feminin'),
('kl143', 'diop', 'fallou', '', 'selectionner un niveau', 'Feminin');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `MotPass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `UserName`, `MotPass`) VALUES
(3, 'maguette diagne', 'ctfy66g'),
(5, 'anta fall', 'n8h6u77'),
(6, 'awa ndiaye', 'nug5ry7hg'),
(7, 'ahmed kane', 'uh646vg g'),
(8, 'saliou fall', '756g gy'),
(9, 'ahmadouley', '78huyh66'),
(11, 'rassoulgueye', 'shbciendydubi'),
(14, 'Marieme Diop', 'vnccy65433'),
(15, 'malickfall', 'vx8xcgb nbbv'),
(16, 'ibrahima mbaye', 'cngdcb 556y'),
(25, 'Ndeye Gueye', 'decembre');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`Matricule`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`Numero`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD KEY `matricule` (`matricule`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
