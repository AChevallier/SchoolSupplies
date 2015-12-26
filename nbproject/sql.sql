-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2015 at 05:04 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `schoolsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `fourniture`
--

CREATE TABLE `fourniture` (
`id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `group_niveau_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
`id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `libelle` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fourniture`
--
ALTER TABLE `fourniture`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_niveau`
--
ALTER TABLE `group_niveau`
 ADD PRIMARY KEY (`id_fourniture`,`id_niveau`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fourniture`
--
ALTER TABLE `fourniture`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;