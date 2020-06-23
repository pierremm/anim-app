-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2020 at 10:21 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `anim_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `animations`
--

CREATE TABLE `animations` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `dateAnim` date DEFAULT NULL,
  `theme` int(11) DEFAULT NULL,
  `projet` int(11) DEFAULT NULL,
  `partenaires` int(11) DEFAULT NULL,
  `etablissement` int(11) DEFAULT NULL,
  `lieu` int(11) DEFAULT NULL,
  `public` int(11) DEFAULT NULL,
  `effectif` int(11) DEFAULT NULL,
  `demiJournees` int(11) DEFAULT NULL,
  `animateurUn` int(11) DEFAULT NULL,
  `animateurDeux` int(11) DEFAULT NULL,
  `AnimateurTrois` int(11) DEFAULT NULL,
  `AnimateurQuatre` int(11) DEFAULT NULL,
  `AnimateurCinq` int(11) DEFAULT NULL,
  `benevoles` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animations`
--

INSERT INTO `animations` (`id`, `nom`, `dateAnim`, `theme`, `projet`, `partenaires`, `etablissement`, `lieu`, `public`, `effectif`, `demiJournees`, `animateurUn`, `animateurDeux`, `AnimateurTrois`, `AnimateurQuatre`, `AnimateurCinq`, `benevoles`, `notes`) VALUES
(1, 'Animation 1   ', '2020-01-01', 1, 1, 1, 1, 1, 1, 1, 6, 1, 1, 1, 1, 1, 1, 'Desc 1'),
(2, 'Animation 2  ', '2020-02-02', 2, 2, 2, 2, 2, 2, 2, 12, 2, 2, 2, 2, 2, 2, 'Desc 2'),
(3, 'Animation 3   ', '2020-03-03', 3, 3, 3, 3, 3, 3, 3, 18, 3, 3, 3, 3, 3, 3, 'Desc 3');

-- --------------------------------------------------------

--
-- Table structure for table `etablissements`
--

CREATE TABLE `etablissements` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etablissements`
--

INSERT INTO `etablissements` (`id`, `nom`, `tel`, `email`, `contact`) VALUES
(1, 'Eatblissement 1', '-', '', 0),
(2, 'Eatblissement 2', '-', '', 0),
(3, 'Eatblissement 3', '-', '', 0),
(4, 'Eatblissement 4', '-', '', 0),
(5, 'Eatblissement 5', '-', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lieux`
--

CREATE TABLE `lieux` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lieux`
--

INSERT INTO `lieux` (`id`, `nom`, `adresse`, `cp`, `ville`, `contact`) VALUES
(1, 'Lieu 1', '', '', '', 0),
(2, 'Lieu 2', '', '', '', 0),
(3, 'Lieu 3', '', '', '', 0),
(4, 'Lieu 4', '', '', '', 0),
(5, 'Lieu 5', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom`, `tel`, `email`, `contact`) VALUES
(1, 'Partenaire 1', '', '', 0),
(2, 'Partenaire 2', '', '', 0),
(3, 'Partenaire 3', '', '', 0),
(4, 'Partenaire 4', '', '', 0),
(5, 'Partenaire 5', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE `projets` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projets`
--

INSERT INTO `projets` (`id`, `nom`) VALUES
(1, 'Projet 1'),
(2, 'Projet 2'),
(3, 'Projet 3'),
(4, 'Projet 4'),
(5, 'Projet 5');

-- --------------------------------------------------------

--
-- Table structure for table `publics`
--

CREATE TABLE `publics` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publics`
--

INSERT INTO `publics` (`id`, `nom`) VALUES
(1, 'Public 1'),
(2, 'Public 2'),
(3, 'Public 3'),
(4, 'Public 4'),
(5, 'Public 5');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `nom`) VALUES
(1, 'Thème 1'),
(2, 'Thème 2'),
(3, 'Thème 3'),
(4, 'Thème 4'),
(5, 'Thème 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animations`
--
ALTER TABLE `animations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `lieux`
--
ALTER TABLE `lieux`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `publics`
--
ALTER TABLE `publics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animations`
--
ALTER TABLE `animations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `etablissements`
--
ALTER TABLE `etablissements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lieux`
--
ALTER TABLE `lieux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publics`
--
ALTER TABLE `publics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
