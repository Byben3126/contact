-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 22 oct. 2023 à 20:38
-- Version du serveur : 11.1.2-MariaDB
-- Version de PHP : 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nws`
--

-- --------------------------------------------------------

--
-- Structure de la table `listcontact`
--

CREATE TABLE `listcontact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `number` varchar(11) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `speciality` varchar(30) DEFAULT NULL,
  `lastDiploma` varchar(30) DEFAULT NULL,
  `urlPicture` text DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `listcontact`
--

INSERT INTO `listcontact` (`id`, `name`, `number`, `mail`, `age`, `speciality`, `lastDiploma`, `urlPicture`, `createdAt`) VALUES
(16, 'Hugo Delamare', '0634253647', 'clem@gmail.com', '21', 'dev', 'bac general', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSolF-pVjuCVIq_4LZ4xlwhLNcv827SXyls-g&amp;usqp=CAU', NULL),
(17, 'Tom Dupond', '06756543432', 'test@gmail.com', '18', 'Design', 'Bac pro', '', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `listcontact`
--
ALTER TABLE `listcontact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `listcontact`
--
ALTER TABLE `listcontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
