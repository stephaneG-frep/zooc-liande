-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 19 juil. 2024 à 19:01
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zoocéliande`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int(11) NOT NULL,
  `race` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `espece` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `race`, `name`, `age`, `description`, `espece`, `image`, `image_id`) VALUES
(1, 'Lion', 'Léon', '33', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'lion.jpg', 4),
(2, 'Perroquet', 'Coco', '12', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'cocos.jpg', NULL),
(3, 'Elise', 'giraffe', '2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'giraffe.jpg', 6),
(4, 'Panda', 'Paul', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'panda.jpeg', 2),
(5, 'jaguar', 'Bob', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'jaguars.jpg', NULL),
(6, 'Orang-outan', 'Barth', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'orang-outan.jpg', NULL),
(7, 'Orang-outan__(femelle)', 'Zoe', '2', 'tesztetevbj', '', '66959c45ae5ea-0-jpg', 1),
(8, 'Elephant', 'Joey', '6', 'it laborum ab, eius fugit doloribus tenetur \r\nfugiat, temporibus enim commodi iusto libero magni deleniti quod quam \r\nconsequuntur! Commodi minima excepturi repudiandae velit hic maxime\r\ndoloremque.', '', 'elephant.jpg', 1),
(9, 'Tigre-(Femelle)', 'Amélie', '4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. ', '', 'wall.jpeg', 1),
(13, 'test', 'test', 'test', 'test', '', '66961d3e89777animation3.jpg', 1),
(14, 'test', 'test', 'test', 'test', '', 'animation4.jpg', 1),
(16, 'Homo-sapience', 'Grud', '83', 'Quaerat provident commodi consectetur veniam similique ad \r\nearum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo \r\nfugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore \r\nsuscipit quas? Nulla, placeat.', '', 'homme3.jpg', NULL),
(17, 'Serpent-bleu', 'Ajax', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem', '', 'serpent.jpg', NULL),
(18, 'Serpent-bleu', 'Ajax', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem', '', 'serpent.jpg', NULL),
(19, 'jaguar__(male)', 'Tesla', '35', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'wall.jpeg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `job` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employers`
--

INSERT INTO `employers` (`id`, `firstname`, `lastname`, `job`, `image`) VALUES
(1, 'Harry', 'Stockath', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', 'homme2.jpg'),
(3, 'Laurent', 'Barre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', 'anim3.jpg'),
(5, 'Stéphane', 'Gaillet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. ', 'comptable.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `name`, `image`) VALUES
(1, ' Harry Stockath Vétérinaire', 'homme2.jpg'),
(2, 'Lisa Maunna animatrice', 'anim2.jpg'),
(3, 'Laurent Barre animatuer', 'anim3.jpg'),
(4, 'Le petit Arthur ', 'bbfélin.jpg'),
(5, 'Eglantine la girafe ', 'giraffe.jpg'),
(6, 'Les enfants et Eglantine', 'giraf.jpg'),
(8, 'test1', 'drole-de-livreur.jpg'),
(9, 'test1', 'drole-de-livreur.jpg'),
(10, 'Gaillet', '0.jpg'),
(11, 'Gaillet Stéphane', 'homme1.jpg'),
(12, 'test1', 'PIZZA.jpg'),
(13, 'hoopscmoi_parrot', 'homme1.jpg'),
(14, 'Amandine la petite jardinière', 'jardi3.jpg'),
(15, 'Pizza', 'PIZZA.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `role`) VALUES
(1, 'homer@simpson.com', '$2y$10$z0RHqBPvz.W3H2BLYAwgmuhMWspP2LHhJYJOeG7EQ4Xf6GLgc41ny', 'Homer', 'Simpson', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Index pour la table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `animaux_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
