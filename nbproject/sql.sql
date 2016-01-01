-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 01, 2016 at 10:04 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `schoolsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `affectation_classe`
--

CREATE TABLE `affectation_classe` (
  `prof_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affectation_classe`
--

INSERT INTO `affectation_classe` (`prof_id`, `matiere_id`) VALUES
(3, 7),
(3, 8),
(5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `niveau_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id`, `nom`, `niveau_id`) VALUES
(1, '2B', 3),
(15, '3T', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fourniture`
--

CREATE TABLE `fourniture` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `group_niveau_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fourniture`
--

INSERT INTO `fourniture` (`id`, `nom`, `matiere_id`, `group_niveau_id`) VALUES
(3, 'stylo plume', 7, NULL),
(4, 'crayon de couleur', 9, NULL),
(5, 'basket', 10, NULL),
(6, 'violon', 11, NULL),
(8, 'calculette', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_niveau`
--

CREATE TABLE `group_niveau` (
  `id_fourniture` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `link_eleve`
--

CREATE TABLE `link_eleve` (
  `eleve_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_eleve`
--

INSERT INTO `link_eleve` (`eleve_id`, `classe_id`) VALUES
(1, 1),
(7, 15);

-- --------------------------------------------------------

--
-- Table structure for table `link_prof`
--

CREATE TABLE `link_prof` (
  `prof_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_prof`
--

INSERT INTO `link_prof` (`prof_id`, `classe_id`) VALUES
(3, 1),
(5, 1),
(3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `liste`
--

CREATE TABLE `liste` (
`id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `fourniture_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liste`
--

INSERT INTO `liste` (`id`, `prof_id`, `fourniture_id`, `matiere_id`, `quantite`) VALUES
(1, 3, 3, 7, 5),
(2, 3, 8, 8, 6),
(3, 5, 6, 11, 2),
(4, 5, 3, 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`) VALUES
(7, 'Français'),
(8, 'Maths'),
(9, 'Géographie'),
(10, 'Sport'),
(11, 'Musique');

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
`id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `libelle` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`id`, `nom`, `libelle`) VALUES
(1, 'Terminale', 'T'),
(2, 'Second', '2'),
(3, 'Première', '1');

-- --------------------------------------------------------

--
-- Table structure for table `personne`
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
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `dateNaissance`, `estProfesseur`, `login`, `password`, `isAdmin`) VALUES
(1, 'Chevallier', 'Alexandre', '1993-12-28', 0, 'alexandre.chevallier', 'a', 1),
(3, 'Juventin', 'Claire', '1964-04-30', 1, 'claire.juventin', 'a', NULL),
(4, 'laussa', 'didier', '1993-04-10', 0, 'didier.laussa', 'd', NULL),
(5, 'Mirabelle', 'Laura', '1975-05-29', 1, 'laura.mirabelle', 'a', NULL),
(6, 'Woo', 'Binna', '1988-01-21', 1, 'binna.woo', 'alex', NULL),
(7, 'DwarfNeedsTraining', 'Nicole', '1890-01-01', 0, 'nicole.dwarfneedstraining', 'a', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affectation_classe`
--
ALTER TABLE `affectation_classe`
 ADD PRIMARY KEY (`prof_id`,`matiere_id`), ADD KEY `matiere_id` (`matiere_id`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
 ADD PRIMARY KEY (`id`), ADD KEY `niveau_id` (`niveau_id`);

--
-- Indexes for table `fourniture`
--
ALTER TABLE `fourniture`
 ADD PRIMARY KEY (`id`), ADD KEY `matiere_id` (`matiere_id`);

--
-- Indexes for table `group_niveau`
--
ALTER TABLE `group_niveau`
 ADD PRIMARY KEY (`id_fourniture`,`id_niveau`);

--
-- Indexes for table `link_eleve`
--
ALTER TABLE `link_eleve`
 ADD PRIMARY KEY (`eleve_id`,`classe_id`), ADD KEY `classe_id` (`classe_id`);

--
-- Indexes for table `link_prof`
--
ALTER TABLE `link_prof`
 ADD PRIMARY KEY (`prof_id`,`classe_id`), ADD KEY `classe_id` (`classe_id`);

--
-- Indexes for table `liste`
--
ALTER TABLE `liste`
 ADD PRIMARY KEY (`id`,`prof_id`,`fourniture_id`,`matiere_id`), ADD KEY `prof_id` (`prof_id`), ADD KEY `fourniture_id` (`fourniture_id`), ADD KEY `matiere_id` (`matiere_id`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `fourniture`
--
ALTER TABLE `fourniture`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `liste`
--
ALTER TABLE `liste`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `affectation_classe`
--
ALTER TABLE `affectation_classe`
ADD CONSTRAINT `affectation_classe_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `personne` (`id`),
ADD CONSTRAINT `affectation_classe_ibfk_2` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Constraints for table `classe`
--
ALTER TABLE `classe`
ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`);

--
-- Constraints for table `fourniture`
--
ALTER TABLE `fourniture`
ADD CONSTRAINT `fourniture_ibfk_1` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Constraints for table `link_eleve`
--
ALTER TABLE `link_eleve`
ADD CONSTRAINT `link_eleve_ibfk_1` FOREIGN KEY (`eleve_id`) REFERENCES `personne` (`id`),
ADD CONSTRAINT `link_eleve_ibfk_2` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`);

--
-- Constraints for table `link_prof`
--
ALTER TABLE `link_prof`
ADD CONSTRAINT `link_prof_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `personne` (`id`),
ADD CONSTRAINT `link_prof_ibfk_2` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`);

--
-- Constraints for table `liste`
--
ALTER TABLE `liste`
ADD CONSTRAINT `liste_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `personne` (`id`),
ADD CONSTRAINT `liste_ibfk_2` FOREIGN KEY (`fourniture_id`) REFERENCES `fourniture` (`id`),
ADD CONSTRAINT `liste_ibfk_3` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);
