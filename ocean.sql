-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 06 oct. 2018 à 00:40
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ocean`
--

-- --------------------------------------------------------

--
-- Structure de la table `satellite`
--

CREATE TABLE `satellite` (
  `idSatellite` int(11) NOT NULL,
  `name` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `satellite`
--

INSERT INTO `satellite` (`idSatellite`, `name`) VALUES
(1, 'Sentinel-1A'),
(3, 'Sentinel-2A');

-- --------------------------------------------------------

--
-- Structure de la table `tle`
--

CREATE TABLE `tle` (
  `idSatellite` int(11) NOT NULL,
  `INTLDES` char(30) DEFAULT NULL,
  `TLE_LINE1` char(255) DEFAULT NULL,
  `TLE_LINE2` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tle`
--

INSERT INTO `tle` (`idSatellite`, `INTLDES`, `TLE_LINE1`, `TLE_LINE2`) VALUES
(1, '25543U', '1 25543U 88109K   18277.81005412  .00000124  00000-0  49788-3 0  9997', '2 25543   6.8021 274.2452 7188063  17.0384 358.1181  2.29486932171955');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `satellite`
--
ALTER TABLE `satellite`
  ADD PRIMARY KEY (`idSatellite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `satellite`
--
ALTER TABLE `satellite`
  MODIFY `idSatellite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
