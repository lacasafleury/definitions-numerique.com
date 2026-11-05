-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 10 déc. 2024 à 14:59
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
-- Structure de la table `definitionmod`
--

CREATE TABLE `definitionmod` (
  `defmodid` bigint(100) NOT NULL,
  `defdate` date NOT NULL,
  `defemail` varchar(150) NOT NULL,
  `defid` int(50) NOT NULL,
  `definition` varchar(1000) NOT NULL,
  `deflettre` varchar(1) NOT NULL,
  `deftitre` varchar(100) NOT NULL,
  `valider` int(1) NOT NULL,
  `defauteur` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `definitionmod`
--
ALTER TABLE `definitionmod`
  ADD PRIMARY KEY (`defid`,`defmodid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `definitionmod`
--
ALTER TABLE `definitionmod`
  MODIFY `defmodid` bigint(100) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
