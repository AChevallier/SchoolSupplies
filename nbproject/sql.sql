-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 31 Décembre 2015 à 19:04
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `schoolsu`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation_classe`
--

CREATE TABLE `affectation_classe` (
  `prof_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `affectation_classe`
--

INSERT INTO `affectation_classe` (`prof_id`, `matiere_id`) VALUES
(3, 7),
(3, 8),
(5, 11);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `niveau_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id`, `nom`, `niveau_id`) VALUES
(1, '2B', 3),
(15, '3T', 1);

-- --------------------------------------------------------

--
-- Structure de la table `fourniture`
--

CREATE TABLE `fourniture` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `group_niveau_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fourniture`
--

INSERT INTO `fourniture` (`id`, `nom`, `matiere_id`, `group_niveau_id`) VALUES
(3, 'stylo plume', 7, NULL),
(4, 'crayon de couleur', 9, NULL),
(5, 'basket', 10, NULL),
(6, 'violon', 11, NULL),
(8, 'calculette', 8, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `group_niveau`
--

CREATE TABLE `group_niveau` (
  `id_fourniture` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `link_eleve`
--

CREATE TABLE `link_eleve` (
  `eleve_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `link_eleve`
--

INSERT INTO `link_eleve` (`eleve_id`, `classe_id`) VALUES
(1, 1),
(7, 15);

-- --------------------------------------------------------

--
-- Structure de la table `link_prof`
--

CREATE TABLE `link_prof` (
  `prof_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `link_prof`
--

INSERT INTO `link_prof` (`prof_id`, `classe_id`) VALUES
(3, 1),
(5, 1),
(3, 15);

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE `liste` (
`id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `fourniture_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste`
--

INSERT INTO `liste` (`id`, `prof_id`, `fourniture_id`, `matiere_id`, `quantite`) VALUES
(1, 3, 3, 7, 5),
(2, 3, 8, 8, 6),
(3, 5, 6, 11, 2),
(4, 5, 3, 11, 7);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`) VALUES
(7, 'Français'),
(8, 'Maths'),
(9, 'Géographie'),
(10, 'Sport'),
(11, 'Musique');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
`id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `libelle` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`id`, `nom`, `libelle`) VALUES
(1, 'Terminale', 'T'),
(2, 'Second', '2'),
(3, 'Première', '1');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `estProfesseur` tinyint(1) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `dateNaissance`, `estProfesseur`, `login`, `password`, `isAdmin`) VALUES
(1, 'Chevallier', 'Alexandre', '1993-12-28', 0, 'alexandre.chevallier', 'a', 1),
(3, 'Juventin', 'Claire', '1964-04-30', 1, 'claire.juventin', 'a', NULL),
(4, 'laussa', 'didier', '1993-04-10', 0, 'didier.laussa', 'd', NULL),
(5, 'Mirabelle', 'Laura', '1975-05-29', 1, 'laura.mirabelle', 'a', NULL),
(6, 'Woo', 'Binna', '1988-01-21', 1, 'binna.woo', 'alex', NULL),
(7, 'DwarfNeedsTraining', 'Nicole', '1890-01-01', 0, 'nicole.dwarfneedstraining', 'a', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `affectation_classe`
--
ALTER TABLE `affectation_classe`
 ADD PRIMARY KEY (`prof_id`,`matiere_id`), ADD KEY `matiere_id` (`matiere_id`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
 ADD PRIMARY KEY (`id`), ADD KEY `niveau_id` (`niveau_id`);

--
-- Index pour la table `fourniture`
--
ALTER TABLE `fourniture`
 ADD PRIMARY KEY (`id`), ADD KEY `matiere_id` (`matiere_id`);

--
-- Index pour la table `group_niveau`
--
ALTER TABLE `group_niveau`
 ADD PRIMARY KEY (`id_fourniture`,`id_niveau`);

--
-- Index pour la table `link_eleve`
--
ALTER TABLE `link_eleve`
 ADD PRIMARY KEY (`eleve_id`,`classe_id`), ADD KEY `classe_id` (`classe_id`);

--
-- Index pour la table `link_prof`
--
ALTER TABLE `link_prof`
 ADD PRIMARY KEY (`prof_id`,`classe_id`), ADD KEY `classe_id` (`classe_id`);

--
-- Index pour la table `liste`
--
ALTER TABLE `liste`
 ADD PRIMARY KEY (`id`,`prof_id`,`fourniture_id`,`matiere_id`), ADD KEY `prof_id` (`prof_id`), ADD KEY `fourniture_id` (`fourniture_id`), ADD KEY `matiere_id` (`matiere_id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `fourniture`
--
ALTER TABLE `fourniture`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `liste`
--
ALTER TABLE `liste`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `affectation_classe`
--
ALTER TABLE `affectation_classe`
ADD CONSTRAINT `affectation_classe_ibfk_2` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`),
ADD CONSTRAINT `affectation_classe_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`);

--
-- Contraintes pour la table `fourniture`
--
ALTER TABLE `fourniture`
ADD CONSTRAINT `fourniture_ibfk_1` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `link_eleve`
--
ALTER TABLE `link_eleve`
ADD CONSTRAINT `link_eleve_ibfk_1` FOREIGN KEY (`eleve_id`) REFERENCES `personne` (`id`),
ADD CONSTRAINT `link_eleve_ibfk_2` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `link_prof`
--
ALTER TABLE `link_prof`
ADD CONSTRAINT `link_prof_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `personne` (`id`),
ADD CONSTRAINT `link_prof_ibfk_2` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `liste`
--
ALTER TABLE `liste`
ADD CONSTRAINT `liste_ibfk_3` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`),
ADD CONSTRAINT `liste_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `personne` (`id`),
ADD CONSTRAINT `liste_ibfk_2` FOREIGN KEY (`fourniture_id`) REFERENCES `fourniture` (`id`);
