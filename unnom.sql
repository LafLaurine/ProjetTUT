-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 09 Novembre 2017 à 02:50
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `unnom`
--

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `id_universite` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id`, `id_universite`, `nom`) VALUES
(1, 1, 'Code général du secteur administration des affaires\r\n'),
(2, 1, 'Code pluricatégories du secteur administratif des affaires\r\n'),
(3, 1, 'Comptabilité, sciences comptables'),
(4, 1, 'Gestion du personnel'),
(5, 1, 'Gestion et administration des entreprises'),
(6, 1, 'Gestion hôtelière, gestion de restaurant \r\n'),
(7, 1, 'Marketing et achats'),
(8, 1, 'Opération bancaire et finance'),
(9, 1, 'Transports et services publics\r\n'),
(10, 1, 'Art dramatique\r\n'),
(11, 1, 'Arts graphiques (communication graphique)\r\n'),
(12, 1, 'Arts plastiques (peinture, dessin, sculpture)\r\n'),
(13, 1, ' Cinématographie\r\n'),
(14, 1, 'Code général du secteur des beaux-arts et arts appliqués\r\n'),
(15, 1, 'Code pluricatégories du secteur des beaux-arts et arts appliqués'),
(16, 1, 'Code général du secteur bibliothéconomie'),
(17, 1, 'Administration scolaire'),
(18, 1, 'Code général du secteur éducation\r\n'),
(19, 1, 'Code pluricatégories du secteur éducation\r\n'),
(20, 1, 'Didactique des langues, en général et comme langue secondaire'),
(21, 1, 'Enseignement à l’élémentaire, catégorie générale\r\n'),
(22, 1, 'Enseignement collégial, catégorie générale'),
(23, 1, 'Enseignement des sciences (méthodologie et théorie)\r\n'),
(24, 1, 'Enseignement professionnel au secondaire et au collégial\r\n'),
(25, 1, 'Enseignement secondaire, catégorie générale\r\n'),
(26, 1, 'Enseignement, didactique des arts (méthodologie et théorie)\r\n'),
(27, 1, 'Pédagogie'),
(28, 1, 'Administration des affaires\r\n'),
(29, 1, 'Code général du secteur études plurisectorielles\r\n'),
(30, 1, 'Sciences appliquées'),
(31, 1, 'Sciences environnementales '),
(32, 1, 'Code général du secteur ingénierie'),
(33, 1, 'Génie civil, génie de la construction et du transport'),
(34, 1, 'Génie électrique, électron, informatique et des communications'),
(35, 1, 'Génie géologique\r\n'),
(36, 1, 'Génie mécanique'),
(37, 1, ' Anglais'),
(38, 1, 'Code général du secteur lettres'),
(39, 1, 'Français'),
(40, 1, 'Linguistique'),
(41, 1, 'Littérature française, catégorie générale'),
(42, 1, 'Code général du secteur mathématique\r\n'),
(43, 1, 'Philosophie'),
(44, 1, 'Code général du secteur psychologie et étude du comportement\r\n'),
(45, 1, 'Psychoéducation'),
(46, 1, 'Psychologie industrielle'),
(47, 1, 'Écologie'),
(48, 1, 'Informatique de gestion'),
(49, 1, 'Sciences et systèmes de l’informatique\r\n'),
(50, 1, ' Biologie et biochimie médicales\r\n'),
(51, 1, 'Médecine expérimentale \r\n'),
(52, 1, 'Infirmiers'),
(53, 1, 'Physiothérapie'),
(54, 1, 'Chimie'),
(55, 1, 'Géologie'),
(56, 1, 'Sciences et vie de la terre'),
(57, 1, 'Archéologie\r\n'),
(58, 1, 'Géographie\r\n'),
(59, 1, 'Histoire\r\n'),
(60, 1, 'Relations internationales\r\n'),
(61, 1, 'Science politique\r\n'),
(62, 1, 'Sociologie'),
(63, 1, 'Animation sociale ou communautaire\r\n'),
(64, 1, 'Service social\r\n'),
(65, 1, 'Code général du secteur théologie');

-- --------------------------------------------------------

--
-- Structure de la table `universite`
--

CREATE TABLE `universite` (
  `nom` varchar(32) NOT NULL,
  `ville` varchar(64) NOT NULL,
  `id` int(11) NOT NULL,
  `langue` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `universite`
--

INSERT INTO `universite` (`nom`, `ville`, `id`, `langue`) VALUES
('UQAC', 'Chicoutimi', 1, 'Français');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nickname` varchar(42) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `sexe` varchar(6) NOT NULL,
  `ecole` varchar(32) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`nickname`, `pass`, `id`, `email`, `firstName`, `name`, `sexe`, `ecole`, `age`) VALUES
('lll', '9e8bfb3d1a73b03e453fe7315844f3471b0937127b14d24ffae4af47cb1d3d9e', 28, 'lll@l.fr', 'ezez', 'zeez', 'femme', 'aaa', 6),
('lll', '9e8bfb3d1a73b03e453fe7315844f3471b0937127b14d24ffae4af47cb1d3d9e', 27, 'lll@l.fr', 'ezez', 'zeez', 'femme', 'aaa', 6),
('cccc', 'b5b08cc9b8f118decf0e76684be82cea6971b25f', 26, 'ccc@c.fr', 'fdwsqdfhg', 'zaertyuijojhg', 'homme', 'zert', 6),
('ppp', '891e12e156d8c6609c6d5f3e04b2fc8da6d9ff3d7e9f906314c0909da69637eb', 25, 'ppp@p.fr', 'bbb', 'aaa', 'homme', '', 56),
('rrrr', '12b0f0dcaefb10c02a83aa9adb025978ddb5512dc04eb39df6811c6a6bf9770c', 24, 'rrr@r.fr', 'Eleve', 'Eleve', 'homme', '', 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `universite`
--
ALTER TABLE `universite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `universite`
--
ALTER TABLE `universite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
