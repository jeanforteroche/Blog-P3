-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 01 Août 2017 à 12:41
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog-p3`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `idchap` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `auteur` varchar(60) NOT NULL,
  `horodatage` datetime DEFAULT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chapitre`
--

INSERT INTO `chapitre` (`idchap`, `titre`, `auteur`, `horodatage`, `contenu`) VALUES
(1, 'Chapitre 1', 'Jean FORTEROCHE', '2017-07-22 11:50:14', 'Spicy jalapeno bacon ipsum dolor amet pork ribeye ham hock, porchetta tri-tip filet mignon pig pancetta ham sausage bresaola. Beef salami boudin pork chop pork leberkas. Shank corned beef alcatra, cupim short loin short ribs meatloaf. Biltong beef ham hock cow pork chop capicola turducken, pork belly leberkas.\r\n\r\nProsciutto jerky ribeye tri-tip sausage, ball tip spare ribs corned beef swine. Filet mignon rump sausage, doner ground round shank biltong beef ribs cow burgdoggen short loin chuck porchetta. Beef tri-tip ground round beef ribs pork chop. Beef ribs pig venison ground round, bresaola meatball alcatra. Capicola ham shankle bacon tenderloin salami spare ribs leberkas turducken pork. Beef prosciutto beef ribs pancetta, filet mignon ham chicken. Sausage cow kevin tail short ribs, shankle andouille picanha fatback pig pork tenderloin ball tip beef bacon.'),
(2, 'Chapitre 2', 'Jean FORTEROCHE', '2017-07-23 22:56:45', 'Spicy jalapeno bacon ipsum dolor amet pork ribeye ham hock, porchetta tri-tip filet mignon pig pancetta ham sausage bresaola. Beef salami boudin pork chop pork leberkas. Shank corned beef alcatra, cupim short loin short ribs meatloaf. Biltong beef ham hock cow pork chop capicola turducken, pork belly leberkas.\r\n\r\nProsciutto jerky ribeye tri-tip sausage, ball tip spare ribs corned beef swine. Filet mignon rump sausage, doner ground round shank biltong beef ribs cow burgdoggen short loin chuck porchetta. Beef tri-tip ground round beef ribs pork chop. Beef ribs pig venison ground round, bresaola meatball alcatra. Capicola ham shankle bacon tenderloin salami spare ribs leberkas turducken pork. Beef prosciutto beef ribs pancetta, filet mignon ham chicken. Sausage cow kevin tail short ribs, shankle andouille picanha fatback pig pork tenderloin ball tip beef bacon.');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idcom` int(11) NOT NULL,
  `horodatage` datetime DEFAULT NULL,
  `auteur` varchar(100) NOT NULL,
  `contenu` varchar(200) NOT NULL,
  `idchap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`idcom`, `horodatage`, `auteur`, `contenu`, `idchap`) VALUES
(3, NULL, 'Weber', '<p>mon bbq est le meilleur</p>', 2),
(5, NULL, 'Ghost Rider', '<p>&nbsp;ton chapitre manque de flammes !!!!!!!!!!!</p>', 1),
(8, NULL, 'moi tout seul', '<p>test commentaire</p>', 2),
(9, NULL, 'VIKING', '<p>j\'aime ma s&eacute;rie </p>', 2),
(10, NULL, 'WEBER', '<p>le roi du BBQ</p>', 1),
(11, NULL, 'WEBER', '<p>le roi du BBQ</p>', 1),
(12, NULL, 'MOI MEME', '<p>&nbsp;a voir si cela marche a nouveau ???</p>', 2);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Jean FORTEROCHE', 'jean.forteroche@outlook.fr', 'Jean', '126ac9f6149081eb0e97c2e939eaad52');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`idchap`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcom`),
  ADD KEY `fk_com_bil` (`idchap`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `idchap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_com_bil` FOREIGN KEY (`idchap`) REFERENCES `chapitre` (`idchap`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
