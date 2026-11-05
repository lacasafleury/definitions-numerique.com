-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 17 déc. 2024 à 14:54
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `defnumerique`
--

-- --------------------------------------------------------

--
-- Structure de la table `definitionmodif`
--

CREATE TABLE `definitionmodif` (
  `modid` int(11) NOT NULL,
  `modlettre` varchar(1) NOT NULL,
  `modtitre` varchar(100) NOT NULL,
  `modefinition` varchar(1000) NOT NULL,
  `modauteur` varchar(100) NOT NULL,
  `modate` date NOT NULL,
  `valider` int(1) NOT NULL,
  `modemail` varchar(150) NOT NULL,
  `idorigine` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `definitionmodif`
--

INSERT INTO `definitionmodif` (`modid`, `modlettre`, `modtitre`, `modefinition`, `modauteur`, `modate`, `valider`, `modemail`, `idorigine`) VALUES
(1, 'A', 'Automatique', 'Ensemble des sciences et des techniques consacrees aux dispositifs qui fonctionnent sans intervention du travail humain.', 'aaa', '2024-12-17', 1, 'a@a.aa', 66);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `definitionmodif`
--
ALTER TABLE `definitionmodif`
  ADD PRIMARY KEY (`modid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `definitionmodif`
--
ALTER TABLE `definitionmodif`
  MODIFY `modid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
