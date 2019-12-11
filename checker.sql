-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 05 déc. 2019 à 00:40
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `checker`
--

-- --------------------------------------------------------

--
-- Structure de la table `abscence`
--

CREATE TABLE `abscence` (
  `id_absence` int(10) NOT NULL,
  `id_eleve` varchar(10) NOT NULL,
  `date_absence` date NOT NULL,
  `heur_ab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `abscence`
--

INSERT INTO `abscence` (`id_absence`, `id_eleve`, `date_absence`, `heur_ab`) VALUES
(11, '9', '2019-12-27', '9H00');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id_c` int(10) NOT NULL,
  `niveau` int(10) NOT NULL,
  `indice` varchar(256) NOT NULL,
  `section` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id_c`, `niveau`, `indice`, `section`) VALUES
(1, 0, '0', '0'),
(2, 3, '1', 'Eco.Gestion'),
(3, 2, '1', 'sc. Informatique'),
(4, 1, '2', 'letters'),
(5, 2, '1', 'Parcours sciences');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(10) NOT NULL,
  `nom_cours` varchar(256) NOT NULL,
  `niveau` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id_e` int(10) NOT NULL,
  `nom_e` varchar(256) NOT NULL,
  `prenom_e` varchar(256) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `classe_e` varchar(256) NOT NULL,
  `moyenne_e` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id_e`, `nom_e`, `prenom_e`, `uid`, `pwd`, `classe_e`, `moyenne_e`) VALUES
(8, 'souilmi', 'chahin', 'Chahinsouilmi', '$2y$10$upKFNgUBgoMg/CVvyP8HQOXy9TNJ/AUntSqhp3NSGyZwwecPmBibq', '2', '17'),
(9, 'eleve', 'eleve', 'eleve', '$2y$10$R8l1/k2PasxTSNtvOy7Q8ewi9aB4rK0PpBP62xjlazVhL7SASaKiy', '3', '14'),
(10, 'eleve2', 'eleve2', 'eleve2', '$2y$10$oXVtv8FPHMdIn47dZzz69ubJ.1dsyc.hDvsxYXkWgevfkSP2eGXta', '3', '14');

-- --------------------------------------------------------

--
-- Structure de la table `heurs`
--

CREATE TABLE `heurs` (
  `heur_id` int(11) NOT NULL,
  `idc` int(11) NOT NULL,
  `jour` varchar(25) NOT NULL,
  `temps` int(10) NOT NULL,
  `matiere` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `heurs`
--

INSERT INTO `heurs` (`heur_id`, `idc`, `jour`, `temps`, `matiere`) VALUES
(1, 3, 'Lundi', 8, 'arabe'),
(2, 3, 'Lundi', 9, 'arabe'),
(5, 3, 'Lundi', 10, 'francais'),
(6, 3, 'Lundi', 11, 'francais'),
(7, 3, 'Lundi', 14, 'Informatique'),
(8, 3, 'Lundi', 15, 'Informatique'),
(10, 3, 'Lundi', 16, 'Informatique'),
(11, 3, 'Lundi', 17, 'englais'),
(12, 3, 'Mardi', 8, 'Physique');

-- --------------------------------------------------------

--
-- Structure de la table `l_admin`
--

CREATE TABLE `l_admin` (
  `a_id` int(10) NOT NULL,
  `a_uid` varchar(256) NOT NULL,
  `a_pw` varchar(256) NOT NULL,
  `a_nomcomp` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `l_admin`
--

INSERT INTO `l_admin` (`a_id`, `a_uid`, `a_pw`, `a_nomcomp`) VALUES
(1, 'mouwaffek', 'mouwaffek', 'monsieur admin'),
(2, 'admin', 'admin', 'monsieur admin');

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

CREATE TABLE `parent` (
  `p_id` int(11) NOT NULL,
  `p_uid` varchar(256) NOT NULL,
  `p_pw` varchar(256) NOT NULL,
  `p_email` varchar(256) NOT NULL,
  `p_nom` varchar(256) NOT NULL,
  `id_fils` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`p_id`, `p_uid`, `p_pw`, `p_email`, `p_nom`, `id_fils`) VALUES
(2, 'chahin', '$2y$10$qFz70.rq6JTbM8t0XrSvtetZpPGREK3ti9xZZtTtdcIDvkN/Pxl96', 'chahin19980@gmail.com', 'souilmi med chahin', 5),
(3, 'faouzi', '$2y$10$YxgvvEPIlF6k2Jz/n2DhQuHtN612uwFlM2jmKfDyRZKcAc2yBASx.', 'experttic.com@gmail.com', 'faouzi gassoumi', 4);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(10) NOT NULL,
  `numero` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `numero`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, 'labo1'),
(6, 'labo2');

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `nom_sec` varchar(256) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`nom_sec`, `id_classe`) VALUES
('Math', 1),
('letters', 2),
('Eco.Gestion', 3),
('sc. Informatique', 4),
('Sc. Experimentales', 5),
('sc. Techniques', 6),
('Parcours sciences', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abscence`
--
ALTER TABLE `abscence`
  ADD PRIMARY KEY (`id_absence`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_c`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id_e`);

--
-- Index pour la table `heurs`
--
ALTER TABLE `heurs`
  ADD PRIMARY KEY (`heur_id`),
  ADD KEY `fk_foreign_idclasse` (`idc`);

--
-- Index pour la table `l_admin`
--
ALTER TABLE `l_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Index pour la table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`p_id`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_classe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abscence`
--
ALTER TABLE `abscence`
  MODIFY `id_absence` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_c` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id_e` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `heurs`
--
ALTER TABLE `heurs`
  MODIFY `heur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `l_admin`
--
ALTER TABLE `l_admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `parent`
--
ALTER TABLE `parent`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `heurs`
--
ALTER TABLE `heurs`
  ADD CONSTRAINT `fk_foreign_idclasse` FOREIGN KEY (`idc`) REFERENCES `classe` (`id_c`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
