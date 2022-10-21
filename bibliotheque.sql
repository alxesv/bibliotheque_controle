-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 21 oct. 2022 à 13:49
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(10) NOT NULL,
  `nom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`) VALUES
(1, 'J. R. R. Tolkien'),
(2, 'Homère'),
(3, 'Jonathan Stroud'),
(4, 'J. K. Rowling'),
(5, 'Guy de Maupassant'),
(6, 'Christopher Paolini'),
(8, 'Hergé'),
(9, 'Robert Louis Stevenson'),
(10, 'Joseph Delaney');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(10) NOT NULL,
  `libelle` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Fantasy'),
(2, 'Science-fiction'),
(3, 'Aventure'),
(4, 'Fantastique'),
(5, 'Horreur');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(10) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `synopsis` varchar(400) NOT NULL,
  `auteur_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `synopsis`, `auteur_id`) VALUES
(1, 'Le Silmarillion', 'Le Silmarillion raconte la genèse et l\'histoire ancienne d\'Arda, ainsi que la première des guerres...', 1),
(2, 'L\'Odyssée', 'Ulysse, roi d\'Ithaque, veut rentrer chez lui, après la guerre de Troie, dans laquelle il a eu un rôle déterminant, notamment avec la ruse du Cheval de Troie...', 2),
(3, 'L\'amulette de Samarcande', 'Nathaniel, un jeune magicien, invoque le djinn Bartimeus, un célèbre esprit ayant accompli d\'illustres hauts-faits, qui n\'en revient pas d\'être invoqué par un magicien si inexpérimenté...', 3),
(4, 'L\'oeil du Golem', 'Nathaniel, maintenant membre du gouvernement des magiciens, est tâché de mettre fin aux activités de la Résistance, un groupe de non-magiciens luttants contre leur suprémacie, menée par la jeune Kitty...', 3),
(5, 'La Porte de Ptolémée', 'C\'est la crise à Londres, le gouvernement est mal en point, les révoltes éclatent, Nathaniel doit invoquer de nouveau Bartimeus, pour une dernière mission...', 3),
(6, 'Le Seigneur des anneaux', 'Après le 11ème anniversaire de Bilbon, il quitte la Comté et lègue son anneau à son neveu, Frodon. Gandalf vient voir Frodon et lui apprend que cet anneau renferme un mal ancien et qu\'il ne doit surtout pas tomber aux mains de l\'ennemi. Frodon décide ainsi de quitter la Comté, en compagnie de quelques amis...', 1),
(7, 'Harry Potter et la Coupe de feu', 'C\'est le tournoi des sorciers, une compétition entre trois grandes écoles de magie. Harry Potter se retrouve malgré lui embarqué dans ce tournoi, et il n\'est pas sans dangers...', 4),
(8, 'Le Horla', 'Le narrateur perd peu à peu la raison, en ressentant une présence fantôme autour de lui.', 5),
(9, 'Eragon', 'Le jeune Eragon trouve, lors de la chasse, une étrange pierre bleu qu\'il ramène chez lui. Cette pierre s\'avérera être un oeuf de dragon...', 6),
(10, 'Le Hobbit', 'Bilbon est un hobbit qui vit tranquillement dans la Comté, jusqu\'au jour où le magicien Gandalf vient le voir, et l\'embarque dans une aventure pour retrouver un ancien artefact nain...', 1),
(11, 'On a marché sur la Lune', 'Faisant suite à Objectif Lune, cette BD raconte les aventures de Tintin sur la Lune...', 8),
(12, 'Le Secret de La Licorne', 'Tintin achète au marché une maquette de bateau pour l\'offrir au Capitaine Haddock, mais des hommes insistent pour la lui racheter. Il va se rendre compte que cette maquette n\'est pas si anodine que ça...', 8),
(13, 'Le Maître de Ballantrae', 'Deux frères vivants en Ecosse au 18ème siècle se retrouvent pris dans une guerre civile et le ressentiment grandit de plus en plus entre eux...', 9),
(14, 'L\'Apprenti épouvanteur', 'Tom est le septième fils d\'un septième fils, a l\'annversaire de ses 13 ans, on vient le chercher et il va devenir l\'apprenti de l\'épouvanteur, un chasseur de démons et d\'être maléfiques...', 10);

-- --------------------------------------------------------

--
-- Structure de la table `livre_cat`
--

CREATE TABLE `livre_cat` (
  `id_categorie` int(10) NOT NULL,
  `id_livre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre_cat`
--

INSERT INTO `livre_cat` (`id_categorie`, `id_livre`) VALUES
(1, 1),
(1, 9),
(3, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(3, 7),
(4, 8),
(1, 10),
(2, 11),
(3, 12),
(3, 13),
(5, 14);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_auteur` (`auteur_id`);

--
-- Index pour la table `livre_cat`
--
ALTER TABLE `livre_cat`
  ADD KEY `fk_id_cat` (`id_categorie`),
  ADD KEY `fk_id_livre` (`id_livre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
