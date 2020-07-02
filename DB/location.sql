-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 02 juil. 2020 à 10:19
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location`
--

-- --------------------------------------------------------

--
-- Structure de la table `maisan`
--

CREATE TABLE `maisan` (
  `idmaisan` int(11) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `surface` int(11) NOT NULL,
  `chambre` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `titel` varchar(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `datepub` date DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idville` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `maisan`
--

INSERT INTO `maisan` (`idmaisan`, `adresse`, `surface`, `chambre`, `prix`, `titel`, `description`, `datepub`, `iduser`, `idville`) VALUES
(8, 'Quartier Maarif', 90, 2, 100, 'Location Appartement Meublé Au Quartier Maarif', 'appartement a louer Meublé moderne de haut standing d&#39;une superficie de 110 m dans une résidence sécurisée 24h/24 , il comprend un double salon , deux chambres, deux salle de bain, cuisine bien équipée , une place au garage.\r\nRéf : appartm130', '2020-07-02', 1, 3),
(10, 'quartier racine', 160, 5, 350, 'Location Appartement Terrasse à Racine', 'Appartement à louer d&#39;une superficie de 160 m² dont 20 m² de terrasse dans un très bon emplacement calme au quartier racine, proche ronpoint des sports, il se compose d&#39;un grand salon avec cheminée, trois chambres, deux salles de bains, cuisi', '2020-07-02', 1, 3),
(11, 'htuhtty kuyhjh', 150, 2, 156, 'Bel appartement moderne jamais habité', 'Situé sur le boulevard Mohamed 6, à proximité de l&#39;hivernage et et du Menara Mall, cet appartement tout récemment meublé dispose d&#39;un grand salon avec cuisine americaine et balcon terrasse, une chambre parentale avec sa salle de bain et une d', '2020-07-02', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `idphoto` int(11) NOT NULL,
  `idmaisan` int(11) DEFAULT NULL,
  `urlphoto` varchar(400) DEFAULT NULL,
  `decr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`idphoto`, `idmaisan`, `urlphoto`, `decr`) VALUES
(22, 8, '1593673486905_1_house1.jpg', 'house1'),
(23, 8, '1593673486293_1_house2.jpg', 'house2'),
(24, 8, '1593673486513_1_house3.jpg', 'house3'),
(28, 10, '1593675400114_1_house7.jpg', 'house7'),
(29, 10, '1593675400997_1_house8.jpg', 'house8'),
(30, 10, '159367540020_1_house9.jpg', 'house9'),
(31, 11, '1593677506549_1_house10.jpg', 'house10'),
(32, 11, '1593677506590_1_house11.jpg', 'house11'),
(33, 11, '1593677506215_1_house12.webp', 'house12.'),
(34, 11, '1593677506870_1_house13.jpg', 'house13');

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `idres` int(11) NOT NULL,
  `idmaisan` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`idres`, `idmaisan`, `iduser`, `date_debut`, `date_fin`) VALUES
(12, 8, 1, '2020-01-01', '2020-01-01'),
(14, 10, 1, '2020-01-01', '2020-01-01'),
(15, 8, 1, '2020-07-01', '2020-07-02'),
(16, 11, 1, '2020-01-01', '2020-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `num` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`iduser`, `firstname`, `lastname`, `cin`, `num`, `email`, `password`) VALUES
(1, 'houssam', 'amraoui', 'GM20xxxx', '0670120734', 'houss@live.fr', '123456'),
(2, 'hafsa', 'hafda', 'xxxxxxx', '06xxxxxxx', 'hafsa@live.fr', '123456'),
(3, 'houssam', 'amraoui', 'GM20xxxx', '0670120734', 'houssam@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `idville` int(11) NOT NULL,
  `ville` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`idville`, `ville`) VALUES
(1, 'ouazzane'),
(2, 'tetouan'),
(3, 'martil');

-- --------------------------------------------------------

--
-- Structure de la table `vu`
--

CREATE TABLE `vu` (
  `idvu` int(11) NOT NULL,
  `idmaisan` int(11) DEFAULT NULL,
  `vues` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vu`
--

INSERT INTO `vu` (`idvu`, `idmaisan`, `vues`) VALUES
(7, 8, 15),
(9, 10, 7),
(10, 11, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `maisan`
--
ALTER TABLE `maisan`
  ADD PRIMARY KEY (`idmaisan`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idville` (`idville`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`idphoto`),
  ADD KEY `idmaisan` (`idmaisan`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`idres`),
  ADD KEY `idmaisan` (`idmaisan`),
  ADD KEY `iduser` (`iduser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`idville`);

--
-- Index pour la table `vu`
--
ALTER TABLE `vu`
  ADD PRIMARY KEY (`idvu`),
  ADD KEY `idmaisan` (`idmaisan`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `maisan`
--
ALTER TABLE `maisan`
  MODIFY `idmaisan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `idphoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `reserver`
--
ALTER TABLE `reserver`
  MODIFY `idres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `idville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `vu`
--
ALTER TABLE `vu`
  MODIFY `idvu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `maisan`
--
ALTER TABLE `maisan`
  ADD CONSTRAINT `maisan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`),
  ADD CONSTRAINT `maisan_ibfk_2` FOREIGN KEY (`idville`) REFERENCES `villes` (`idville`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`idmaisan`) REFERENCES `maisan` (`idmaisan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`idmaisan`) REFERENCES `maisan` (`idmaisan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Contraintes pour la table `vu`
--
ALTER TABLE `vu`
  ADD CONSTRAINT `vu_ibfk_1` FOREIGN KEY (`idmaisan`) REFERENCES `maisan` (`idmaisan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
