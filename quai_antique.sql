-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 22 mai 2023 à 16:03
-- Version du serveur : 8.0.33
-- Version de PHP : 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quai_antique`
--

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `couverts` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `hour` varchar(50) NOT NULL,
  `allergies` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `bookings`
--

INSERT INTO `bookings` (`id`, `date`, `couverts`, `nom`, `hour`, `allergies`) VALUES
(1, '2023-06-03', 5, 'Dupond', '', 'Gluten, sel, poivre'),
(2, '2023-06-03', 2, 'Alex', '', 'Travail'),
(22, '2023-06-03', 4, 'FAFA', '12h15-12h30', 'gggdgd'),
(29, '2023-05-17', 4, 'Alex', '12h00-12h15', '');

-- --------------------------------------------------------

--
-- Structure de la table `dishes`
--

CREATE TABLE `dishes` (
  `id` int NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dishes`
--

INSERT INTO `dishes` (`id`, `category`, `title`, `description`, `price`) VALUES
(3, 'Entrées', 'Le grand large', 'Millefeuille d’avocat, chair de crabe à l’huile d’amande', 19.00),
(4, 'Entrées', 'Saveurs de plantes', 'Feuilleté aux asperges blanches, mousseline raifort et vieux comté', 19.00),
(8, 'Desserts', 'Sacrée Carotte', 'Le Carrot-cake à notre façon', 18.00),
(9, 'Desserts', 'dessert glacé', 'Croustillant aux fraises, glace Fior di Latte', 18.00),
(10, 'Desserts', 'Une petite soupe', 'Soupe de rhubarbe au poivre de Sichuan, brochette fraises-asperges', 18.00),
(11, 'Plats', 'Boeuf et Risotto', 'Pavé de boeuf mariné, risotto crémeux et jus à l’air noir d’Aomori', 31.00),
(12, 'Plats', 'Poulet à la Jurassienne', 'Poulet fermier cuit doucement aux morilles et Savagnin', 31.00),
(13, 'Plats', 'Pour les Vegans', 'Dahl de lentilles corail, riz sauvage et pickles de betteraves', 31.00);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(7, 'alex@123.fr', '$2y$10$Rrtw4XN7cVTCeM.VtzxCZeKrJWVp5EOQ5GH4768eXYcaql5frRSrO', 'admin'),
(18, 'test@test.fr', '$2y$10$Zk1duzzRzRmzEDK/q.ty9.3Yehjrdi4l9bbScDH63wpWUbnwyw9UG', 'client'),
(31, 'zaazza@sdds', '$2y$10$J0IBZ3NYzGFYWdoj.wR4n.Fy6Ypv1UE4zGlTBkBw2rzN3t9w8jqgm', 'client'),
(32, 'sqsq@aza', '$2y$10$xCwj6Y1kAR0RlKbsz919gegiPB4ImPDfoxoy0UmcmG47u3TDMSjMK', 'client'),
(33, 'alex@123.fr', '$2y$10$EhiQcSHJZg9UuXU1u9DPiOwmeyvEQZ3QLY5Mak968IJuDhlGjaoX.', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
