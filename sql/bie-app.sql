-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 10, 2019 at 10:33 AM
-- Server version: 5.7.25
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bie_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE `personnes` (
  `id` int(11) NOT NULL,
  `nom` char(50) NOT NULL,
  `prenom` char(50) DEFAULT NULL,
  `tel` char(13) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `qualite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `prenom`, `tel`, `email`, `qualite`) VALUES
(1, 'Merzeau', 'Matthias', '0559391013', 'matthias.merzeau@bie.fr', 2),
(2, 'Boutrois', 'Noëlie', '0559391013', 'noelie.boutrois@bie.fr', 3),
(3, 'Lacroute', 'Elsa', '0559391013', 'contact@bie.fr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qualites`
--

CREATE TABLE `qualites` (
  `id` int(11) NOT NULL,
  `nom` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qualites`
--

INSERT INTO `qualites` (`id`, `nom`) VALUES
(1, 'Animateur BIE'),
(2, 'Expert'),
(3, 'Bénévole'),
(4, 'Membre BIE'),
(5, 'Participant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `qualites`
--
ALTER TABLE `qualites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qualites`
--
ALTER TABLE `qualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
