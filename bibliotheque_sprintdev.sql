-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 déc. 2024 à 05:56
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
-- Base de données : `bibliotheque_sprintdev`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `email`, `date_creation`, `password`, `username`) VALUES
(9, '', '', 'admin1@gmail.com', '2024-12-10 23:24:42', '$2y$12$yt6KhW0jX95cEqSD1t2DE.r92GN0dx8KM2AEhmre9DutakHhIlK86', 'admin1'),
(10, '', '', 'admin2@gmail.com', '2024-12-10 23:31:05', '$2y$12$6bEh66JIyjaUKLOCGdWycuhg1BcgYc7ymJ0B9mz6ufAT8r06QlVYC', 'admin2'),
(11, '', '', 'admin3@gmail.com', '2024-12-10 23:36:47', '$2y$12$PuMSrR.Vd2sFJSLhyV1eLeP4.zmIHyqYU3YE1QZD5q18yUzgPcj7O', 'admin3');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emprunt` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_emprunt` date NOT NULL DEFAULT curdate(),
  `date_retour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `nom`) VALUES
(1, 'Roman'),
(2, 'Manga'),
(3, 'Science-Fiction'),
(4, 'Thriller');

-- --------------------------------------------------------

--
-- Structure de la table `librarian`
--

CREATE TABLE `librarian` (
  `id_bibliothecaire` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp(),
  `telephone` varchar(15) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `librarian`
--

INSERT INTO `librarian` (`id_bibliothecaire`, `nom`, `prenom`, `email`, `password`, `date_inscription`, `telephone`, `username`) VALUES
(1, '', '', 'lucas.ferreira@edu.ece.fr', '$2y$12$oybUoU/NEfTKyjUZ9NN5cusLMXd7nwisDjJKspZf1TyAHSPs3dmHO', '2024-12-10 13:34:44', NULL, 'LucasF');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(10) NOT NULL,
  `nom_livre` varchar(255) DEFAULT NULL,
  `genre_livre` varchar(255) DEFAULT NULL,
  `auteur_livre` varchar(255) DEFAULT NULL,
  `annee_livre` int(10) DEFAULT NULL,
  `tome_livre` int(10) DEFAULT NULL,
  `etat_livre` varchar(255) NOT NULL DEFAULT 'Disponible',
  `date_retour` date DEFAULT (curdate() + interval 7 day),
  `date_emprunt` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `nom_livre`, `genre_livre`, `auteur_livre`, `annee_livre`, `tome_livre`, `etat_livre`, `date_retour`, `date_emprunt`) VALUES
(35, 'Les Misérables', 'Roman', 'Victor Hugo', 2024, 1, 'Indisponible', '2024-12-18', '2024-12-11'),
(55, 'Le Petit Prince', 'Roman', 'Antoine de Saint-Exupéry', 2024, 1, 'Disponible', '2024-12-18', '2024-12-11'),
(57, 'Le Comte de Monte Cristo', 'Roman', 'Alexandre Dumas', 2024, 1, 'Disponible', '2024-12-18', '2024-12-11');

--
-- Déclencheurs `livre`
--
DELIMITER $$
CREATE TRIGGER `set_date_retour` BEFORE INSERT ON `livre` FOR EACH ROW BEGIN
    IF NEW.date_retour IS NULL THEN
        SET NEW.date_retour = NEW.date_emprunt + INTERVAL 7 DAY;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL DEFAULT curdate(),
  `username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `password`, `date_inscription`, `username`) VALUES
(9, '', '', 'lucas.ferreira.pro@outlook.fr', '$2y$12$8ZrHH2eOv7g74yiLFs8yVeMoJRsIEv84KlDKXCcaF/XZWNLZHuC1i', '2024-12-10', 'Lucas'),
(15, '', '', 'presque.precieux.1@gmail.com', '$2y$12$N2j4BySpIUpKsdJSNQ4MPu6NWe5K0AVDxnlq.NEAXcI5/XdjIkzJS', '2024-12-11', 'luluxyz');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunt`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id_bibliothecaire`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id_bibliothecaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
