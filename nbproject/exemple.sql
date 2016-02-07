-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 07 Février 2016 à 15:29
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
(19, 31),
(19, 32),
(20, 34),
(20, 35);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `niveau_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id`, `nom`, `niveau_id`) VALUES
(24, '2T', 1),
(25, '1P', 3);

-- --------------------------------------------------------

--
-- Structure de la table `fourniture`
--

CREATE TABLE `fourniture` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `group_niveau_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fourniture`
--

INSERT INTO `fourniture` (`id`, `nom`, `matiere_id`, `group_niveau_id`) VALUES
(11, 'crayon de couleur', 33, NULL),
(12, 'livre 2M Comm', 33, NULL),
(13, 'calculatrice TI 82 ', 32, NULL),
(14, 'tablette samsung', 35, NULL),
(15, 'serveur web', 34, NULL);

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
(12, 24),
(13, 24),
(14, 24),
(15, 25),
(16, 25);

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
(19, 24),
(20, 24),
(19, 25),
(20, 25);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste`
--

INSERT INTO `liste` (`id`, `prof_id`, `fourniture_id`, `matiere_id`, `quantite`) VALUES
(13, 19, 13, 31, 2),
(14, 19, 11, 31, 1),
(15, 19, 12, 32, 1),
(17, 19, 14, 32, 4);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`) VALUES
(31, 'Français'),
(32, 'Mathématiques'),
(33, 'Communication'),
(34, 'Prog Web'),
(35, 'Prog Mobi');

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
(2, 'Seconde', '2'),
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `dateNaissance`, `estProfesseur`, `login`, `password`, `isAdmin`) VALUES
(11, 'admin', 'admin', '1993-02-04', 1, 'admin', 'admin', 1),
(12, 'Dujardin', 'Thomas', '1993-04-12', 0, 'thomas.dujardin', 'Dujardin', 0),
(13, 'Farougia', 'Isabelle', '1996-03-19', 0, 'isabelle.farougia', 'Farougia', 0),
(14, 'Jokier', ' Estan', '1992-03-25', 0, ' estan.jokier', 'Jokier', 0),
(15, 'Guttier', ' Thomas', '1998-04-12', 0, ' thomas.guttier', 'Guttier', 0),
(16, 'Vicky', ' Bastien', '1994-02-14', 0, ' bastien.vicky', 'Vicky', 0),
(19, 'chevallier', 'alexandre', '1993-12-28', 1, 'alexandre.chevallier', 'chevallier', 0),
(20, 'juventon', 'claire', '1978-04-30', 1, 'claire.juventon', 'juventon', 0);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `fourniture`
--
ALTER TABLE `fourniture`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `liste`
--
ALTER TABLE `liste`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `affectation_classe`
--
ALTER TABLE `affectation_classe`
ADD CONSTRAINT `affectation_classe_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `personne` (`id`),
ADD CONSTRAINT `affectation_classe_ibfk_2` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

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
ADD CONSTRAINT `liste_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `personne` (`id`),
ADD CONSTRAINT `liste_ibfk_2` FOREIGN KEY (`fourniture_id`) REFERENCES `fourniture` (`id`),
ADD CONSTRAINT `liste_ibfk_3` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);
